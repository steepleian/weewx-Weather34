#
# This program is free software; you can redistribute it and/or modify it under
# the terms of the GNU General Public License as published by the Free Software
# Foundation; either version 2 of the License, or (at your option) any later
# version.
#
# This program is distributed in the hope that it will be useful, but WITHOUT
# ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
# FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
# details.
#
# Search List Extension classes to support generation of JSON data file for
# use by w34highcharts to plot weewx observations.
#
# Version: 0.2.1                                    Date: 16 May 2017
#
# Revision History
#   16 May 2017         v0.2.1
#       - Fixed bug with day/week windrose getSqlVectors call that resulted in 
#         'IndexError: list index out of range' error on line 962.
#   4 May 2017          v0.2.0
#       - Removed hard coding of weeWX-WD bindings for appTemp and Insolation
#         data. Now attempts to otain bindings for each from weeWX-WD, if
#         weeWX-WD is not installed bindings are sought in weewx.conf
#         [StdReport][[w34highcharts]]. If no binding can be found appTemp and
#         insolation data is omitted.
#   22 November 2016    v0.1.0
#       - initial implementation
#

import calendar
import datetime
import json
import time
import weewx
import math
import weeutil.weeutil

from weewx.units import getStandardUnitType, ValueTuple
from datetime import date
from weewx.cheetahgenerator import SearchList
from weewx.units import ValueTuple, getStandardUnitType, convert, _getUnitGroup
from weeutil.weeutil import TimeSpan, genMonthSpans, startOfInterval, option_as_list, startOfDay

try:
    # Test for new-style weewx logging by trying to import weeutil.logger
    import weeutil.logger
    import logging
    log = logging.getLogger(__name__)

    def logdbg(msg):
        log.debug(msg)

    def logdbg2(msg):
        if weewx.debug >= 2:
            log.debug(msg)

    def loginf(msg):
        log.info(msg)

    def logerr(msg):
        log.error(msg)

except ImportError:
    # Old-style weewx logging
    import syslog

    def logmsg(level, msg):
        syslog.syslog(level, 'w34highchartsSearchX: %s' % msg)

    def logdbg(msg):
        logmsg(syslog.LOG_DEBUG, msg)

    def logdbg2(msg):
        if weewx.debug >= 2:
            logmsg(syslog.LOG_DEBUG, msg)

    def loginf(msg):
        logmsg(syslog.LOG_INFO, msg)

    def logerr(msg):
        logmsg(syslog.LOG_ERR, msg)

def roundNone(value, places):
    """Round value to 'places' places but also permit a value of None."""

    if value is not None:
        try:
            value = round(value, places)
        except Exception as e:
            value = None
    return value

def roundInt(value, places):
    """Round value to 'places' but return as an integer if places=0."""

    if places == 0:
        value = int(round(value, 0))
    else:
        value = round(value, places)
    return value

def _max(values):
    return max([v for v in values if v is not None])

def _min(values):
    return min([v for v in values if v is not None])

def get_ago(dt, d_years=0, d_months=0):
    """ Function to return date object holding date d_years and d_months ago.

       If we try to return an invalid date due to differing month lengths
       (eg 30 Feb or 31 Sep) then just return the end of month (ie 28 Feb
       (if not a leap year else 29 Feb) or 30 Sep).
    """

    # Get year number, month number and day number applying offset as required
    _y, _m, _d = dt.year + d_years, dt.month + d_months, dt.day
    # Calculate actual month number taking into account EOY rollover
    _a, _m = divmod(_m - 1, 12)
    # Calculate and return date object
    _eom = calendar.monthrange(_y + _a, _m + 1)[1]
    return date(_y + _a, _m + 1, _d if _d <= _eom else _eom)
    
def getDaySummaryVectors(db_manager, sql_type, timespan, agg_list='max'):
    """ Return a vector of specified stats from weewx daily summaries.

        Parameters:
          db_manager: A database manager object for the weewx archive.

          sql_type:   A statistical type, such as 'outTemp' 'barometer' etc.

          startstamp: The start time of the vector required.

          stopstamp:  The stop time of the vector required.

          agg_list:   A list of the aggregates required eg ['max', 'min'].
                      Member elements can be any of 'min', 'max', 'mintime',
                      'maxtime', 'gustdir', 'sum', 'count', 'avg', 'rms',
                      'vecavg' or 'vecdir'.
       """

    # Get our interpolation dictionary for the query
    interDict = {'start'        : weeutil.weeutil.startOfDay(timespan.start),
                 'stop'         : timespan.stop,
                 'table_name'   : 'archive_day_%s' % sql_type}
    # Setup up a list of lists for our vectors
    _vec = [list() for x in range(len(agg_list))]
    # Initialise each list in the list of lists
    for agg in agg_list:
        _vec[agg_list.index(agg)] = list()
    # Setup up our time vector list
    _time_vec = list()
    # Initialise a dictionary for our results
    _return = {}
    # Get the unit system in use
    _row = db_manager.getSql("SELECT usUnits FROM %s LIMIT 1;" % db_manager.table_name)
    std_unit_system = _row[0] if _row is not None else None
    # Get a cursor object for our query
    _cursor=db_manager.connection.cursor()
    try:
        # Put together our SQL query string
        sql_str = "SELECT * FROM %(table_name)s  WHERE dateTime >= %(start)s AND dateTime < %(stop)s" % interDict
        # Loop through each record our query returns
        for _rec in _cursor.execute(sql_str):
            # Loop through each aggregate we have been asked for
            for agg in agg_list:
                # Calculate the aggregate
                if agg == 'min':
                    _result = _rec[1]
                elif agg == 'max':
                    _result = _rec[3]
                elif agg == 'sum':
                    _result = _rec[5]
                elif agg == 'gustdir':
                    _result = _rec[7]
                elif agg == 'mintime':
                    _result = int(_rec[2]) if _rec[2] else None
                elif agg == 'maxtime':
                    _result = int(_rec[4]) if _rec[4] else None
                elif agg == 'count':
                    _result = int(_rec[6]) if _rec[6] else None
                elif agg == 'avg' :
                    _result = _rec[5]/_rec[6] if (_rec[5] and _rec[6]) else None
                elif agg == 'rms' :
                    _result =  math.sqrt(_rec[10]/_rec[11]) if (_rec[10] and _rec[11]) else None
                elif agg == 'vecavg' :
                    _result = math.sqrt((_rec[8]**2 + _rec[9]**2) / _rec[6]**2) if (_rec[6] and _rec[8] and _rec[9]) else None
                elif agg == 'vecdir' :
                    if _rec[8] == 0.0 and _rec[9] == 0.0:
                        _result = None
                    elif _rec[8] and _rec[9]:
                        #deg = 90.0 - math.degrees(math.atan2(_rec[9], _rec[8]))
                        #_result = deg if deg >= 0.0 else deg + 360.0
                        _result = _rec[9]
                    else:
                        _result = None
                # If we have not found it then return None
                else:
                    _result = None
                # Add the aggregate to our vector
                _vec[agg_list.index(agg)].append(_result)
            # Add the time to our time vector
            _time_vec.append(_rec[0])
    finally:
        # Close our cursor
        _cursor.close()
    # Get unit type and group for time
    (_time_type, _time_group) = weewx.units.getStandardUnitType(std_unit_system, 'dateTime')
    # Loop through each aggregate we were asked for getting unit and group and producing a ValueTuple
    # and adding to our result dictionary
    for agg in agg_list:
        (t,g) = weewx.units.getStandardUnitType(std_unit_system, sql_type, agg)
        _return[agg]=ValueTuple(_vec[agg_list.index(agg)], t, g)
    # Return our time vector and dictionary of aggregate vectors
    return (ValueTuple(_time_vec, _time_type, _time_group), _return)
        
class w34highcharts_temp_week(SearchList):
    """SearchList to generate JSON vectors for w34highcharts week plots."""

    def __init__(self, generator):
        SearchList.__init__(self, generator)
        self.search_list_extension = None
        try:
                self.numDays = int(self.generator.skin_dict['Extras'].get('numDays', '0'))
        except:
                self.numDays = 0 

    def get_extension_list(self, timespan, db_lookup):
        """Generate the JSON vectors and return as a list of dictionaries."""

        if (self.search_list_extension != None):
                return [self.search_list_extension]
        
        t1 = time.time()

        # Get UTC offset
        stop_struct = time.localtime(timespan.stop)
        utc_offset = (calendar.timegm(stop_struct) - calendar.timegm(time.gmtime(time.mktime(stop_struct))))/60

        # Get our start time, 7 days ago but aligned with start of day
        # first get the start of today
        _ts = startOfDay(timespan.stop)
        # then go back 7 days
        _ts_dt = datetime.datetime.fromtimestamp(_ts)
        _start_dt = _ts_dt - datetime.timedelta(days=7)
        _start_ts = time.mktime(_start_dt.timetuple())

        if (self.numDays != 0):
                _start_ts = time.mktime((_ts_dt - datetime.timedelta(days=int(self.numDays/2))).timetuple())
                _end_ts = time.mktime((_ts_dt + datetime.timedelta(days=int(self.numDays/2))).timetuple())
                timespan = TimeSpan(_start_ts, _end_ts)
                                
        # Get our temperature vector
        (time_start_vt, time_stop_vt, outTemp_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop),'outTemp')
        # Convert our temperature vector
        outTemp_vt = self.generator.converter.convert(outTemp_vt)
        # Can't use ValueHelper so round our results manually
        # Get the number of decimal points
        tempRound = int(self.generator.skin_dict['Units']['StringFormats'].get(outTemp_vt[1], "1f")[-2])
        # Do the rounding
        outTempRound_vt =  [roundNone(x,tempRound) for x in outTemp_vt[0]]
        # Get our time vector in ms (w34highcharts requirement)
        # Need to do it for each getSqlVectors result as they might be different
        outTemp_time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]
        
        # Get our dewpoint vector
        (time_start_vt, time_stop_vt, dewpoint_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop),'dewpoint')
        dewpoint_vt = self.generator.converter.convert(dewpoint_vt)
        # Can't use ValueHelper so round our results manually
        # Get the number of decimal points
        dewpointRound = int(self.generator.skin_dict['Units']['StringFormats'].get(dewpoint_vt[1], "1f")[-2])
        # Do the rounding
        dewpointRound_vt =  [roundNone(x,dewpointRound) for x in dewpoint_vt[0]]
        # Get our time vector in ms (w34highcharts requirement)
        # Need to do it for each getSqlVectors result as they might be different
        dewpoint_time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]

        # Get our humidity vector
        (time_start_vt, time_stop_vt, outHumidity_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop),'outHumidity')
        # Can't use ValueHelper so round our results manually
        # Get the number of decimal points
        outHumidityRound = int(self.generator.skin_dict['Units']['StringFormats'].get(outHumidity_vt[1], "1f")[-2])
        # Do the rounding
        outHumidityRound_vt =  [roundNone(x,outHumidityRound) for x in outHumidity_vt[0]]
        # Get our time vector in ms (w34highcharts requirement)
        # Need to do it for each getSqlVectors result as they might be different
        outHumidity_time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]
        # Format our vectors in json format. Need the zip() to get time/value pairs
        # Assumes all vectors have the same number of elements
        outTemp_json = json.dumps(list(zip(outTemp_time_ms, outTempRound_vt)))
        dewpoint_json = json.dumps(list(zip(dewpoint_time_ms, dewpointRound_vt)))
        outHumidity_json = json.dumps(list(zip(outHumidity_time_ms, outHumidityRound_vt)))
        # Put into a dictionary to return
        self.search_list_extension = {
                                 'outTempWeekjson' : outTemp_json,
                                 'dewpointWeekjson' : dewpoint_json,
                                 'outHumidityWeekjson' : outHumidity_json,
                                 'utcOffset': utc_offset,
                                 'weekPlotStart' : _start_ts * 1000,
                                 'weekPlotEnd' : timespan.stop * 1000}
        t2 = time.time()
        logdbg2("w34highcharts_temp_week SLE executed in %0.3f seconds" % (t2 - t1))

        # Return our json data
        return [self.search_list_extension]

class w34highcharts_bar_rain_week(SearchList):
    """SearchList to generate JSON vectors for w34highcharts week plots."""

    def __init__(self, generator):
        SearchList.__init__(self, generator)
        self.search_list_extension = None
        try:
                self.numDays = int(self.generator.skin_dict['Extras'].get('numDays', '0'))
        except:
                self.numDays =0 
                
    def get_extension_list(self, timespan, db_lookup):
        """Generate the JSON vectors and return as a list of dictionaries."""

        if (self.search_list_extension != None):
                return [self.search_list_extension]
        
        t1 = time.time()

        # Get UTC offset
        stop_struct = time.localtime(timespan.stop)
        utc_offset = (calendar.timegm(stop_struct) - calendar.timegm(time.gmtime(time.mktime(stop_struct))))/60

        # Get our start time, 7 days ago but aligned with start of day
        # first get the start of today
        _ts = startOfDay(timespan.stop)
        # then go back 7 days
        _ts_dt = datetime.datetime.fromtimestamp(_ts)
        _start_dt = _ts_dt - datetime.timedelta(days=7)
        _start_ts = time.mktime(_start_dt.timetuple())

        if (self.numDays != 0):
                _start_ts = time.mktime((_ts_dt - datetime.timedelta(days=int(self.numDays/2))).timetuple())
                _end_ts = time.mktime((_ts_dt + datetime.timedelta(days=int(self.numDays/2))).timetuple())
                timespan = TimeSpan(_start_ts, _end_ts)
                
        # Get our barometer vector
        (time_start_vt, time_stop_vt, barometer_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop),
                                                                                'barometer')
        barometer_vt = self.generator.converter.convert(barometer_vt)
        # Can't use ValueHelper so round our results manually
        # Get the number of decimal points
        barometerRound = int(self.generator.skin_dict['Units']['StringFormats'].get(barometer_vt[1], "1f")[-2])
        # Do the rounding
        barometerRound_vt =  [roundNone(x,barometerRound) for x in barometer_vt[0]]
        # Get our time vector in ms (w34highcharts requirement)
        # Need to do it for each getSqlVectors result as they might be different
        barometer_time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]

        # Get our rain vector, need to sum over the hour
        (time_start_vt, time_stop_vt, rain_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop),'rain')
        (time_start_vt, time_stop_vt, rainRate_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop),'rainRate')
        # Check if we have a partial hour at the end
        # If we do then set the last time in the time vector to the hour
        # Avoids display issues with the column chart
        # Need to make sure we have at least 2 records though
        #if len(time_stop_vt[0]) > 1:
        #   if time_stop_vt[0][-1] < time_stop_vt[0][-2] + 3600:
        #        time_stop_vt[0][-1] = time_stop_vt[0][-2] + 3600
        # Convert our rain vector
        rain_vt = self.generator.converter.convert(rain_vt)
        rainRate_vt = self.generator.converter.convert(rainRate_vt)
        # Can't use ValueHelper so round our results manually
        # Get the number of decimal points
        rainRound = int(self.generator.skin_dict['Units']['StringFormats'].get(rain_vt[1], "1f")[-2])
        rainRateRound = int(self.generator.skin_dict['Units']['StringFormats'].get(rainRate_vt[1], "1f")[-2])
        # Do the rounding
        rainRound_vt =  [roundNone(x,rainRound) for x in rain_vt[0]]
        rainRateRound_vt =  [roundNone(x,rainRateRound) for x in rainRate_vt[0]]
        # Get our time vector in ms (w34highcharts requirement)
        # Need to do it for each getSqlVectors result as they might be different
        timeRain_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]

        # Format our vectors in json format. Need the zip() to get time/value pairs
        # Assumes all vectors have the same number of elements
        barometer_json = json.dumps(list(zip(barometer_time_ms, barometerRound_vt)))
        rain_json = json.dumps(list(zip(timeRain_ms, rainRound_vt)))
        rainRate_json = json.dumps(list(zip(timeRain_ms, rainRateRound_vt)))

        # Create energy json
        try:
                (time_start_vt, time_stop_vt, energy_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop), 'lightning_energy')
                energyRound = int(self.generator.skin_dict['Units']['StringFormats'].get(energy_vt[1], "1f")[-2])
                energyRound_vt = [roundNone(x,energyRound) if x != None else 0 for x in energy_vt[0]]
                energyTime_ms = [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]
                energy_json = json.dumps(list(zip(energyTime_ms, energyRound_vt)))
        except:
                energy_json = None
                
        # Create distance json
        try:
                (time_start_vt, time_stop_vt, distance_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop), 'lightning_distance')
                distanceRound = int(self.generator.skin_dict['Units']['StringFormats'].get(distance_vt[1], "1f")[-2])
                distanceRound_vt =  [roundNone(x,distanceRound) if x != None else 0 for x in distance_vt[0]]
                distanceTime_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]
                distance_json = json.dumps(list(zip(distanceTime_ms, distanceRound_vt)))
        except:
                distance_json = None
                
        # Create strike count json
        try:
                (time_start_vt, time_stop_vt, strike_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop), 'lightning_strike_count')
                strikeRound = int(self.generator.skin_dict['Units']['StringFormats'].get(strike_vt[1], "1f")[-2])
                strikeRound_vt =  [roundNone(x,strikeRound) if x != None else 0 for x in strike_vt[0]]
                strikeTime_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]
                strikeCount_json = json.dumps(list(zip(strikeTime_ms, strikeRound_vt)))
        except Exception as e:
                strikeCount_json = None

        # Create noise count json
        try:
                (time_start_vt, time_stop_vt, noise_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop), 'lightning_noise_count')
                noiseRound = int(self.generator.skin_dict['Units']['StringFormats'].get(noise_vt[1], "1f")[-2])
                noiseRound_vt =  [roundNone(x,noiseRound) if x != None else 0 for x in noise_vt[0]]
                noiseTime_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]
                noiseCount_json = json.dumps(list(zip(noiseTime_ms, noiseRound_vt)))
        except Exception as e:
                noiseCount_json = None

        # Create disturber count json
        try:
                (time_start_vt, time_stop_vt, disturber_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop), 'lightning_disturber_count')
                disturberRound = int(self.generator.skin_dict['Units']['StringFormats'].get(disturber_vt[1], "1f")[-2])
                disturberRound_vt =  [roundNone(x,disturberRound) if x != None else 0 for x in disturber_vt[0]]
                disturberTime_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]
                disturberCount_json = json.dumps(list(zip(disturberTime_ms, disturberRound_vt)))
        except Exception as e:
                disturberCount_json = None

        # Put into a dictionary to return
        self.search_list_extension = {
                                 'barometerWeekjson' : barometer_json,
                                 'rainWeekjson' : rain_json,
                                 'rainRateWeekjson' : rainRate_json,
                                 'strikeCountWeek_json' : strikeCount_json,
                                 'noiseCountWeek_json' : noiseCount_json,
                                 'disturberCountWeek_json' : disturberCount_json,
                                 'distanceWeek_json' : distance_json,
                                 'energyWeek_json' : energy_json,
                                 'utcOffset': utc_offset,
                                 'weekPlotStart' : _start_ts * 1000,
                                 'weekPlotEnd' : timespan.stop * 1000}

        t2 = time.time()
        logdbg2("w34highcharts_bar_rain_week SLE executed in %0.3f seconds" % (t2 - t1))

        # Return our json data
        return [self.search_list_extension]
  
class w34highcharts_wind_week(SearchList):
    """SearchList to generate JSON vectors for w34highcharts week plots."""

    def __init__(self, generator):
        SearchList.__init__(self, generator)
        self.search_list_extension = None
        try:
                self.numDays = int(self.generator.skin_dict['Extras'].get('numDays', '0'))
        except:
                self.numDays =0 

    def get_extension_list(self, timespan, db_lookup):
        """Generate the JSON vectors and return as a list of dictionaries."""

        if (self.search_list_extension != None):
                return [self.search_list_extension]
        
        t1 = time.time()

        # Get UTC offset
        stop_struct = time.localtime(timespan.stop)
        utc_offset = (calendar.timegm(stop_struct) - calendar.timegm(time.gmtime(time.mktime(stop_struct))))/60

        # Get our start time, 7 days ago but aligned with start of day
        # first get the start of today
        _ts = startOfDay(timespan.stop)
        # then go back 7 days
        _ts_dt = datetime.datetime.fromtimestamp(_ts)
        _start_dt = _ts_dt - datetime.timedelta(days=7)
        _start_ts = time.mktime(_start_dt.timetuple())

        if (self.numDays != 0):
                _start_ts = time.mktime((_ts_dt - datetime.timedelta(days=int(self.numDays/2))).timetuple())
                _end_ts = time.mktime((_ts_dt + datetime.timedelta(days=int(self.numDays/2))).timetuple())
                timespan = TimeSpan(_start_ts, _end_ts)
        
        # Get our wind speed vector
        (time_start_vt, time_stop_vt, windSpeed_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop),
                                                                                'windSpeed')
        windSpeed_vt = self.generator.converter.convert(windSpeed_vt)
        # Can't use ValueHelper so round our results manually
        # Get the number of decimal points
        windspeedRound = int(self.generator.skin_dict['Units']['StringFormats'].get(windSpeed_vt[1], "1f")[-2])
        # Do the rounding
        windSpeedRound_vt =  [roundNone(x,windspeedRound) for x in windSpeed_vt[0]]
        # Get our time vector in ms (w34highcharts requirement)
        # Need to do it for each getSqlVectors result as they might be different
        windSpeed_time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]

        # Get our wind gust vector
        (time_start_vt, time_stop_vt, windGust_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop),
                                                                               'windGust')
        windGust_vt = self.generator.converter.convert(windGust_vt)
        # Can't use ValueHelper so round our results manually
        # Get the number of decimal points
        windgustRound = int(self.generator.skin_dict['Units']['StringFormats'].get(windGust_vt[1], "1f")[-2])
        # Do the rounding
        windGustRound_vt =  [roundNone(x,windgustRound) for x in windGust_vt[0]]
        # Get our time vector in ms (w34highcharts requirement)
        # Need to do it for each getSqlVectors result as they might be different
        windGust_time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]

        # Get our wind direction vector
        (time_start_vt, time_stop_vt, windDir_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop),'windDir')
        # Can't use ValueHelper so round our results manually
        # Get the number of decimal points
        windDirRound = int(self.generator.skin_dict['Units']['StringFormats'].get(windDir_vt[1], "1f")[-2])
        # Do the rounding
        windDirRound_vt =  [roundNone(x,windDirRound) for x in windDir_vt[0]]
        # Get our time vector in ms (w34highcharts requirement)
        # Need to do it for each getSqlVectors result as they might be different
        windDir_time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]

        # Format our vectors in json format. Need the zip() to get time/value pairs
        # Assumes all vectors have the same number of elements
        windSpeed_json = json.dumps(list(zip(windSpeed_time_ms, windSpeedRound_vt)))
        windGust_json = json.dumps(list(zip(windGust_time_ms, windGustRound_vt)))
        windDir_json = json.dumps(list(zip(windDir_time_ms, windDirRound_vt)))

        # Put into a dictionary to return
        self.search_list_extension = {
                                 'windSpeedWeekjson' : windSpeed_json,
                                 'windGustWeekjson' : windGust_json,
                                 'windDirWeekjson' : windDir_json,
                                 'utcOffset': utc_offset,
                                 'weekPlotStart' : _start_ts * 1000,
                                 'weekPlotEnd' : timespan.stop * 1000}

        t2 = time.time()
        logdbg2("w34highcharts_wind_week SLE executed in %0.3f seconds" % (t2 - t1))

        # Return our json data
        return [self.search_list_extension]
        
class w34highcharts_solar_week(SearchList):
    """SearchList to generate JSON vectors for w34highcharts week plots."""

    def __init__(self, generator):
        SearchList.__init__(self, generator)
        self.search_list_extension = None
        try:
                self.numDays = int(self.generator.skin_dict['Extras'].get('numDays', '0'))
        except:
                self.numDays =0 
                
        # maxSolarRad. First try to get the binding from weewx-WD if installed
        try:
            self.insolation_binding = generator.config_dict['Weewx-WD']['Supplementary'].get('data_binding')
        except KeyError:
            # Likely weewx-WD is not installed so set to None
            self.insolation_binding = None
        if self.insolation_binding is None:
            # Try [StdReport][[w34highcharts]]
            try:
                self.insolation_binding = generator.config_dict['StdReport']['w34highcharts'].get('insolation_binding')
                # Just in case insolation_binding is included but not set
                if self.insolation_binding == '':
                    self.insolation_binding = None
            except KeyError:
                # Should only occur if the user chnaged the name of
                # [[w34highcharts]] in [StdReport]
                self.insolation_binding = None
        try:
            self.db_field = generator.config_dict['Weather34CloudCover'].get('db_field')
        except:
            self.db_field = None

    def get_extension_list(self, timespan, db_lookup):
        """Generate the JSON vectors and return as a list of dictionaries."""

        if (self.search_list_extension != None):
                return [self.search_list_extension]
        
        t1 = time.time()

        # Get UTC offset
        stop_struct = time.localtime(timespan.stop)
        utc_offset = (calendar.timegm(stop_struct) - calendar.timegm(time.gmtime(time.mktime(stop_struct))))/60

        # Get our start time, 7 days ago but aligned with start of day
        # first get the start of today
        _ts = startOfDay(timespan.stop)
        # then go back 7 days
        _ts_dt = datetime.datetime.fromtimestamp(_ts)
        _start_dt = _ts_dt - datetime.timedelta(days=7)
        _start_ts = time.mktime(_start_dt.timetuple())
        
        if (self.numDays != 0):
                _start_ts = time.mktime((_ts_dt - datetime.timedelta(days=int(self.numDays/2))).timetuple())
                _end_ts = time.mktime((_ts_dt + datetime.timedelta(days=int(self.numDays/2))).timetuple())
                timespan = TimeSpan(_start_ts, _end_ts)
                
        # Get our radiation vector
        (time_start_vt, time_stop_vt, radiation_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop),
                                                                                'radiation')
        # Can't use ValueHelper so round our results manually
        # Get the number of decimal points
        radiationRound = int(self.generator.skin_dict['Units']['StringFormats'].get(radiation_vt[1], "1f")[-2])
        # Do the rounding
        radiationRound_vt =  [roundNone(x,radiationRound) for x in radiation_vt[0]]
        # Get our time vector in ms (w34highcharts requirement)
        # Need to do it for each getSqlVectors result as they might be different
        radiation_time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]

        # Get our insolation vector. Insolation data is not normally archived
        # so only try to get it if we have a binding for it. Wrap in a
        # try..except to catch any errors. If we don't have a binding then set
        # the vector to None
        if self.insolation_binding is not None:
            try:
                (time_start_vt, time_stop_vt, insolation_vt) = db_lookup(self.insolation_binding).getSqlVectors(TimeSpan(_start_ts, timespan.stop),
                                                                                                                'maxSolarRad')
                # Can't use ValueHelper so round our results manually
                # Get the number of decimal points
                insolationRound = int(self.generator.skin_dict['Units']['StringFormats'].get(radiation_vt[1], "1f")[-2])
                # Do the rounding
                insolationRound_vt =  [roundNone(x,insolationRound) for x in insolation_vt[0]]
                # Get our time vector in ms (w34highcharts requirement)
                # Need to do it for each getSqlVectors result as they might be different
                insolation_time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]
            except weewx.UnknownBinding:
                raise
        else:
            insolationRound_vt = None

        # Get our UV vector
        (time_start_vt, time_stop_vt, uv_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop), 'UV')
        # Can't use ValueHelper so round our results manually
        # Get the number of decimal points
        uvRound = int(self.generator.skin_dict['Units']['StringFormats'].get(uv_vt[1], "1f")[-2])
        # Do the rounding
        uvRound_vt =  [roundNone(x,uvRound) for x in uv_vt[0]]
        # Get our time vector in ms (w34highcharts requirement)
        # Need to do it for each getSqlVectors result as they might be different
        UV_time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]

        # Format our vectors in json format. Need the zip() to get time/value pairs
        # Assumes all vectors have the same number of elements
        radiation_json = json.dumps(list(zip(radiation_time_ms, radiationRound_vt)))
        # convert our insolation vector to JSON, if we don't have one then set
        # it to None
        if insolationRound_vt is not None:
            insolation_json = json.dumps(list(zip(insolation_time_ms, insolationRound_vt)))
        else:
            insolation_json = None
        uv_json = json.dumps(list(zip(UV_time_ms, uvRound_vt)))

        # Create uva json
        try:
                (time_start_vt, time_stop_vt, uva_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop), 'uva')
                uvaRound = int(self.generator.skin_dict['Units']['StringFormats'].get(uva_vt[1], "1f")[-2])
                uvaRound_vt =  [roundNone(x,uvaRound) if x != None else 0 for x in uva_vt[0]]
                uva_time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]
                uva_json = json.dumps(list(zip(uva_time_ms, uvaRound_vt)))
        except:
                uva_json = None
                
        # Create uvb json
        try:
                (time_start_vt, time_stop_vt, uvb_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop), 'uvb')
                uvbRound = int(self.generator.skin_dict['Units']['StringFormats'].get(uvb_vt[1], "1f")[-2])
                uvbRound_vt =  [roundNone(x,uvbRound) if x != None else 0 for x in uvb_vt[0]]
                uvb_time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]
                uvb_json = json.dumps(list(zip(uvb_time_ms, uvbRound_vt)))
        except:
                uvb_json = None
                
        # Create uvaWm json
        try:
                (time_start_vt, time_stop_vt, uvaWm_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop), 'uvaWm')
                uvaWmRound = int(self.generator.skin_dict['Units']['StringFormats'].get(uvaWm_vt[1], "1f")[-2])
                uvaWmRound_vt =  [roundNone(x,uvaWmRound) if x != None else 0 for x in uvaWm_vt[0]]
                uvaWm_time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]
                uvaWm_json = json.dumps(list(zip(uvaWm_time_ms, uvaWmRound_vt)))
        except:
                uvaWm_json = None
                
        # Create uvbWm json
        try:
                (time_start_vt, time_stop_vt, uvbWm_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop), 'uvbWm')
                uvbWmRound = int(self.generator.skin_dict['Units']['StringFormats'].get(uvbWm_vt[1], "1f")[-2])
                uvbWmRound_vt =  [roundNone(x,uvbWmRound) if x != None else 0 for x in uvbWm_vt[0]]
                uvbWm_time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]
                uvbWm_json = json.dumps(list(zip(uvbWm_time_ms, uvbWmRound_vt)))
        except:
                uvbWm_json = None
                
        # Create full spectrum json
        try:
                (time_start_vt, time_stop_vt, spectrum_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop), 'full_spectrum')
                spectrumRound = int(self.generator.skin_dict['Units']['StringFormats'].get(spectrum_vt[1], "1f")[-2])
                spectrumRound_vt =  [roundNone(x,spectrumRound) if x != None else 0 for x in spectrum_vt[0]]
                spectrum_time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]
                spectrum_json = json.dumps(list(zip(spectrum_time_ms, spectrumRound_vt)))
        except:
                spectrum_json = None    
 
         # Create lux json
        try:
                (time_start_vt, time_stop_vt, lux_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop), 'lux')
                luxRound = int(self.generator.skin_dict['Units']['StringFormats'].get(lux_vt[1], "1f")[-2])
                luxRound_vt =  [roundNone(x,luxRound) if x != None else 0 for x in lux_vt[0]]
                lux_time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]
                lux_json = json.dumps(list(zip(lux_time_ms, luxRound_vt)))
        except:
                lux_json = None  
                  
        # Create infrared json
        try:
                (time_start_vt, time_stop_vt, infrared_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop), 'infrared')
                infraredRound = int(self.generator.skin_dict['Units']['StringFormats'].get(infrared_vt[1], "1f")[-2])
                infraredRound_vt =  [roundNone(x,infraredRound) if x != None else 0 for x in infrared_vt[0]]
                infrared_time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]
                infrared_json = json.dumps(list(zip(infrared_time_ms, infraredRound_vt)))
        except:
                infrared_json = None    
                                                       
        # Create cloudcover json
        try:
                (time_start_vt, time_stop_vt, cloudcover_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop), self.db_field)
                cloudcoverRound = int(self.generator.skin_dict['Units']['StringFormats'].get(cloudcover_vt[1], "1f")[-2])
                cloudcoverRound_vt =  [roundNone(x,cloudcoverRound) if x != None else 0 for x in cloudcover_vt[0]]
                cloudcover_time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]
                cloudcover_json = json.dumps(list(zip(cloudcover_time_ms, cloudcoverRound_vt)))
        except Exception as e:
                cloudcover_json = None    
                                                       
        # Create air quality pm2_5
        try:
                (time_start_vt, time_stop_vt, pm2_5_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop), 'pm2_5')
                pm2_5Round = int(self.generator.skin_dict['Units']['StringFormats'].get(pm2_5_vt[1], "1f")[-2])
                pm2_5Round_vt =  [roundNone(x,pm2_5Round) if x != None else 0 for x in pm2_5_vt[0]]
                pm2_5time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]
                pm2_5_json = json.dumps(list(zip(pm2_5time_ms, pm2_5Round_vt)))
        except:
               pm2_5_json = None    
                                                       
        # Create air quality pm10_0
        try:
                (time_start_vt, time_stop_vt, pm10_0_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop), 'pm10_0')
                pm10_0Round = int(self.generator.skin_dict['Units']['StringFormats'].get(pm10_0_vt[1], "1f")[-2])
                pm10_0Round_vt =  [roundNone(x,pm10_0Round) if x != None else 0 for x in pm10_0_vt[0]]
                pm10_0time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]
                pm10_0_json = json.dumps(list(zip(pm10_0time_ms, pm10_0Round_vt)))
        except:
               pm10_0_json = None    
                                                       
        # Put into a dictionary to return
        self.search_list_extension = {
                                 'radiationWeekjson' : radiation_json,
                                 'insolationWeekjson' : insolation_json,
                                 'uvaWeek_json' : uva_json,
                                 'uvbWeek_json' : uvb_json,
                                 'uvaWmWeek_json' : uvaWm_json,
                                 'uvbWmWeek_json' : uvbWm_json,
                                 'uvWeekjson' : uv_json,
                                 'full_spectrumWeek_json' : spectrum_json,
                                 'luxWeek_json' : lux_json,
                                 'infraredWeek_json' : infrared_json,
                                 'cloudcoverWeek_json' : cloudcover_json,
                                 'pm2_5Week_json' : pm2_5_json,
                                 'pm10_0Week_json' : pm10_0_json,
                                 'utcOffset': utc_offset,
                                 'weekPlotStart' : _start_ts * 1000,
                                 'weekPlotEnd' : timespan.stop * 1000}

        t2 = time.time()
        logdbg2("w34highcharts_solar_week SLE executed in %0.3f seconds" % (t2 - t1))

        # Return our json data
        return [self.search_list_extension]
     
class w34highcharts_indoor_derived_week(SearchList):
    """SearchList to generate JSON vectors for w34highcharts week plots."""

    def __init__(self, generator):
        SearchList.__init__(self, generator)
        self.search_list_extension = None
        try:
                self.numDays = int(self.generator.skin_dict['Extras'].get('numDays', '0'))
        except:
                self.numDays =0 
                
    def get_extension_list(self, timespan, db_lookup):
        """Generate the JSON vectors and return as a list of dictionaries."""

        if (self.search_list_extension != None):
                return [self.search_list_extension]
        
        t1 = time.time()

        # Get UTC offset
        stop_struct = time.localtime(timespan.stop)
        utc_offset = (calendar.timegm(stop_struct) - calendar.timegm(time.gmtime(time.mktime(stop_struct))))/60

        # Get our start time, 7 days ago but aligned with start of day
        # first get the start of today
        _ts = startOfDay(timespan.stop)
        # then go back 7 days
        _ts_dt = datetime.datetime.fromtimestamp(_ts)
        _start_dt = _ts_dt - datetime.timedelta(days=7)
        _start_ts = time.mktime(_start_dt.timetuple())

        if (self.numDays != 0):
                _start_ts = time.mktime((_ts_dt - datetime.timedelta(days=int(self.numDays/2))).timetuple())
                _end_ts = time.mktime((_ts_dt + datetime.timedelta(days=int(self.numDays/2))).timetuple())
                timespan = TimeSpan(_start_ts, _end_ts)
        
        # Get our temperature vector
        (time_start_vt, time_stop_vt, inTemp_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop),'inTemp')
        inTemp_vt = self.generator.converter.convert(inTemp_vt)
        tempRound = int(self.generator.skin_dict['Units']['StringFormats'].get(inTemp_vt[1], "1f")[-2])
        inTempRound_vt =  [roundNone(x,tempRound) for x in inTemp_vt[0]]
        inTemp_time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]

        try:
            (time_start_vt, time_stop_vt, appTemp_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop), 'appTemp')
            appTemp_vt = self.generator.converter.convert(appTemp_vt)
            apptempRound = int(self.generator.skin_dict['Units']['StringFormats'].get(appTemp_vt[1], "1f")[-2])
            appTempRound_vt =  [roundNone(x,apptempRound) for x in appTemp_vt[0]]
            appTemp_time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]
            appTemp_json = json.dumps(list(zip(appTemp_time_ms, appTempRound_vt)))
        except:
            appTemp_json = None

        # Get our wind chill vector
        (time_start_vt, time_stop_vt, windchill_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop),'windchill')
        windchill_vt = self.generator.converter.convert(windchill_vt)
        # Can't use ValueHelper so round our results manually
        # Get the number of decimal points
        windchillRound = int(self.generator.skin_dict['Units']['StringFormats'].get(windchill_vt[1], "1f")[-2])
        # Do the rounding
        windchillRound_vt =  [roundNone(x,windchillRound) for x in windchill_vt[0]]
        # Get our time vector in ms (w34highcharts requirement)
        # Need to do it for each getSqlVectors result as they might be different
        windchill_time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]

        # Get our heat index vector
        (time_start_vt, time_stop_vt, heatindex_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop),
                                                                                'heatindex')
        heatindex_vt = self.generator.converter.convert(heatindex_vt)
        # Can't use ValueHelper so round our results manually
        # Get the number of decimal points
        heatindexRound = int(self.generator.skin_dict['Units']['StringFormats'].get(heatindex_vt[1], "1f")[-2])
        # Do the rounding
        heatindexRound_vt =  [roundNone(x,heatindexRound) for x in heatindex_vt[0]]
        # Get our time vector in ms (w34highcharts requirement)
        # Need to do it for each getSqlVectors result as they might be different
        heatindex_time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]

        # Get our humidity vector
        (time_start_vt, time_stop_vt, inHumidity_vt) = db_lookup().getSqlVectors(TimeSpan(_start_ts, timespan.stop),'inHumidity')
        # Can't use ValueHelper so round our results manually
        # Get the number of decimal points
        inHumidityRound = int(self.generator.skin_dict['Units']['StringFormats'].get(inHumidity_vt[1], "1f")[-2])
        # Do the rounding
        inHumidityRound_vt =  [roundNone(x,inHumidityRound) for x in inHumidity_vt[0]]
        # Get our time vector in ms (w34highcharts requirement)
        # Need to do it for each getSqlVectors result as they might be different
        inHumidity_time_ms =  [time_stop_vt[0][0] if (x == 0) else time_stop_vt[0][x] - time_stop_vt[0][0] for x in range(len(time_stop_vt[0]))]

        # Format our vectors in json format. Need the zip() to get time/value pairs
        # Assumes all vectors have the same number of elements
        inTemp_json = json.dumps(list(zip(inTemp_time_ms, inTempRound_vt)))
        windchill_json = json.dumps(list(zip(windchill_time_ms, windchillRound_vt)))
        heatindex_json = json.dumps(list(zip(heatindex_time_ms, heatindexRound_vt)))
        inHumidity_json = json.dumps(list(zip(inHumidity_time_ms, inHumidityRound_vt)))

        # Put into a dictionary to return
        self.search_list_extension = {
                                 'inTempWeekjson' : inTemp_json,
                                 'appTempWeekjson' : appTemp_json,
                                 'windchillWeekjson' : windchill_json,
                                 'heatindexWeekjson' : heatindex_json,
                                 'inHumidityWeekjson' : inHumidity_json,
                                 'utcOffset': utc_offset,
                                 'weekPlotStart' : _start_ts * 1000,
                                 'weekPlotEnd' : timespan.stop * 1000}

        t2 = time.time()
        logdbg2("w34highcharts_indoor_derived_week SLE executed in %0.3f seconds" % (t2 - t1))

        # Return our json data
        return [self.search_list_extension]
     
class w34highchartsYear(SearchList):
    """SearchList to generate JSON vectors for w34highcharts week plots.""""""SearchList to generate JSON vectors for w34highcharts year plots."""

    def __init__(self, generator):
        SearchList.__init__(self, generator)
        self.search_list_extension = None
        
        try:
            self.db_field = generator.config_dict['Weather34CloudCover'].get('db_field')
        except:
            self.db_field = None


    def get_extension_list(self, timespan, db_lookup):
        """Generate the JSON vectors and return as a list of dictionaries.

        Parameters:
          timespan: An instance of weeutil.weeutil.TimeSpan. This will
                    hold the start and stop times of the domain of
                    valid times.

          db_lookup: This is a function that, given a data binding
                     as its only parameter, will return a database manager
                     object.
         """
        if (self.search_list_extension != None):
                return [self.search_list_extension]
        
        try:
                numYears = int(self.generator.skin_dict['Extras'].get('numYears', '1'))
        except:
                numYears = 1 
                
        t1 = time.time()

        # Get UTC offset
        stop_struct = time.localtime(timespan.stop)
        utc_offset = (calendar.timegm(stop_struct) - calendar.timegm(time.gmtime(time.mktime(stop_struct))))/60

        # Our start time is one year ago from midnight at the start of today
        # first get the start of today
        _ts = startOfDay(timespan.stop)
        # then go back 1 year
        _ts_dt = datetime.datetime.fromtimestamp(_ts)
        try:
            _start_dt = _ts_dt.replace(year=_ts_dt.year-numYears)
        except ValueError:
            _start_dt = _ts_dt.replace(year=_ts_dt.year-numYears, day=_ts_dt.day-1)
        _start_ts = time.mktime(_start_dt.timetuple())
        _timespan = TimeSpan(_start_ts, timespan.stop)

         # Get our outTemp vectors
        (outTemp_time_vt, outTemp_dict) = getDaySummaryVectors(db_lookup(), 'outTemp', _timespan, ['min', 'max', 'avg'])
        (inTemp_time_vt, inTemp_dict) = getDaySummaryVectors(db_lookup(), 'inTemp', _timespan, ['min', 'max', 'avg'])
        # Get our vector ValueTuple out of the dictionary and convert it
        outTempMin_vt = self.generator.converter.convert(outTemp_dict['min'])
        outTempMax_vt = self.generator.converter.convert(outTemp_dict['max'])
        outTempAvg_vt = self.generator.converter.convert(outTemp_dict['avg'])

        inTempMin_vt = self.generator.converter.convert(inTemp_dict['min'])
        inTempMax_vt = self.generator.converter.convert(inTemp_dict['max'])
        inTempAvg_vt = self.generator.converter.convert(inTemp_dict['avg'])
        
        tempPlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(outTempMin_vt[1], "1f")[-2])
         # Get our dewpoint vectors
        (dewpoint_time_vt, dewpoint_dict) = getDaySummaryVectors(db_lookup(), 'dewpoint', _timespan, ['min', 'max', 'avg'])
        # Get our vector ValueTuple out of the dictionary and convert it
        dewpointMin_vt = self.generator.converter.convert(dewpoint_dict['min'])
        dewpointMax_vt = self.generator.converter.convert(dewpoint_dict['max'])
        dewpointAvg_vt = self.generator.converter.convert(dewpoint_dict['avg'])

        # Get our windchill vector
        (windchill_time_vt, windchill_dict) = getDaySummaryVectors(db_lookup(),
                                                                   'windchill',
                                                                   _timespan,
                                                                   ['min', 'max', 'avg'])
        # Get our vector ValueTuple out of the dictionary and convert it
        windchillAvg_vt = self.generator.converter.convert(windchill_dict['avg'])
        windchillMin_vt = self.generator.converter.convert(windchill_dict['min'])
        windchillMax_vt = self.generator.converter.convert(windchill_dict['max'])

        # Get our heatindex vector
        (heatindex_time_vt, heatindex_dict) = getDaySummaryVectors(db_lookup(),
                                                                   'heatindex',
                                                                   _timespan,
                                                                   ['min', 'max', 'avg'])
        # Get our vector ValueTuple out of the dictionary and convert it
        heatindexAvg_vt = self.generator.converter.convert(heatindex_dict['avg'])
        heatindexMin_vt = self.generator.converter.convert(heatindex_dict['min'])
        heatindexMax_vt = self.generator.converter.convert(heatindex_dict['max'])
        # Get our humidity vectors
        (outHumidity_time_vt, outHumidity_dict) = getDaySummaryVectors(db_lookup(),'outHumidity',_timespan,['min', 'max', 'avg'])
        (inHumidity_time_vt, inHumidity_dict) = getDaySummaryVectors(db_lookup(),'inHumidity',_timespan,['min', 'max', 'avg'])

        # Get our barometer vectors
        (barometer_time_vt, barometer_dict) = getDaySummaryVectors(db_lookup(),
                                                                   'barometer',
                                                                   _timespan,
                                                                   ['min', 'max', 'avg'])
        # Get our vector ValueTuple out of the dictionary and convert it
        barometerMin_vt = self.generator.converter.convert(barometer_dict['min'])
        barometerMax_vt = self.generator.converter.convert(barometer_dict['max'])
        barometerAvg_vt = self.generator.converter.convert(barometer_dict['avg'])

        # Get our wind vectors
        (wind_time_vt, wind_dict) = getDaySummaryVectors(db_lookup(),
                                                         'wind',
                                                         _timespan,
                                                         ['max', 'avg'])
        # Get our vector ValueTuple out of the dictionary and convert it
        windMax_vt = self.generator.converter.convert(wind_dict['max'])
        windAvg_vt = self.generator.converter.convert(wind_dict['avg'])

        # Get our windSpeed vectors
        (windSpeed_time_vt, windSpeed_dict) = getDaySummaryVectors(db_lookup(),
                                                                   'windSpeed',
                                                                   _timespan,
                                                                   ['min', 'max', 'avg'])
        # Get our vector ValueTuple out of the dictionary and convert it
        windSpeedMax_vt = self.generator.converter.convert(windSpeed_dict['max'])
        windSpeedAvg_vt = self.generator.converter.convert(windSpeed_dict['avg'])

        # Get our windDir vectors
        (windDir_time_vt, windDir_dict) = getDaySummaryVectors(db_lookup(),'wind',_timespan,['vecdir'])
        # Get our rain vectors
        (rain_time_vt, rain_dict) = getDaySummaryVectors(db_lookup(),
                                                         'rain',
                                                         _timespan,
                                                         ['sum'])
        # Get our vector ValueTuple out of the dictionary and convert it
        rainSum_vt = self.generator.converter.convert(rain_dict['sum'])

        # Get our radiation vectors
        (radiation_time_vt, radiation_dict) = getDaySummaryVectors(db_lookup(),
                                                                   'radiation',
                                                                   _timespan,
                                                                   ['min', 'max', 'avg'])

        # Get our UV vectors
        (uv_time_vt, uv_dict) = getDaySummaryVectors(db_lookup(),
                                                     'UV',
                                                     _timespan,
                                                     ['min', 'max', 'avg'])
        
        # Get no of decimal places to use when formatting results
        outHumidityPlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(outHumidity_dict['min'][1], "1f")[-2])
        inHumidityPlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(inHumidity_dict['min'][1], "1f")[-2])
        barometerPlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(barometerMin_vt[1], "1f")[-2])
        windPlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(windMax_vt[1], "1f")[-2])
        windSpeedPlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(windSpeedMax_vt[1], "1f")[-2])
        windDirPlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(windDir_dict['vecdir'][1], "1f")[-2])
        rainPlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(rainSum_vt[1], "1f")[-2])
        radiationPlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(radiation_dict['max'][1], "1f")[-2])
        uvPlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(uv_dict['max'][1], "1f")[-2])

        # Get our time vector in ms
        time_ms =  [outTemp_time_vt[0][0] if (x == 0) else outTemp_time_vt[0][x] - outTemp_time_vt[0][0] for x in range(len(outTemp_time_vt[0]))]
        #time_ms =  [float(x) * 1000 for x in outTemp_time_vt[0]]

        # Create lightning Sum json
        try:
            (lightning_time_vt, lightning_dict) = getDaySummaryVectors(db_lookup(), 'lightning_strike_count', _timespan, ['sum'])
            lightningSum_vt = self.generator.converter.convert(lightning_dict['sum'])
            lightningPlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(lightningSum_vt[1], "1f")[-2])
            lightningSumRound = [roundNone(x,lightningPlaces) for x in lightningSum_vt[0]]
            lightningSum_json = json.dumps(list(zip(time_ms, lightningSumRound)))
        except:
            lightningSum_json = None

        # Round our values from our ValueTuples
        outTempMinRound = [roundNone(x,tempPlaces) for x in outTempMin_vt[0]]
        outTempMaxRound = [roundNone(x,tempPlaces) for x in outTempMax_vt[0]]
        outTempAvgRound = [roundNone(x,tempPlaces) for x in outTempAvg_vt[0]]
        inTempMinRound = [roundNone(x,tempPlaces) for x in inTempMin_vt[0]]
        inTempMaxRound = [roundNone(x,tempPlaces) for x in inTempMax_vt[0]]
        inTempAvgRound = [roundNone(x,tempPlaces) for x in inTempAvg_vt[0]]
        dewpointMinRound = [roundNone(x,tempPlaces) for x in dewpointMin_vt[0]]
        dewpointMaxRound = [roundNone(x,tempPlaces) for x in dewpointMax_vt[0]]
        dewpointAvgRound = [roundNone(x,tempPlaces) for x in dewpointAvg_vt[0]]
        windchillMinRound = [roundNone(x,tempPlaces) for x in windchillMin_vt[0]]
        windchillMaxRound = [roundNone(x,tempPlaces) for x in windchillMax_vt[0]]
        windchillAvgRound = [roundNone(x,tempPlaces) for x in windchillAvg_vt[0]]
        heatindexMinRound = [roundNone(x,tempPlaces) for x in heatindexMin_vt[0]]
        heatindexMaxRound = [roundNone(x,tempPlaces) for x in heatindexMax_vt[0]]
        heatindexAvgRound = [roundNone(x,tempPlaces) for x in heatindexAvg_vt[0]]
        outHumidityMinRound = [roundNone(x,outHumidityPlaces) for x in outHumidity_dict['min'][0]]
        outHumidityMaxRound = [roundNone(x,outHumidityPlaces) for x in outHumidity_dict['max'][0]]
        outHumidityAvgRound = [roundNone(x,outHumidityPlaces) for x in outHumidity_dict['avg'][0]]
        inHumidityMinRound = [roundNone(x,inHumidityPlaces) for x in inHumidity_dict['min'][0]]
        inHumidityMaxRound = [roundNone(x,inHumidityPlaces) for x in inHumidity_dict['max'][0]]
        inHumidityAvgRound = [roundNone(x,inHumidityPlaces) for x in inHumidity_dict['avg'][0]]
        barometerMinRound = [roundNone(x,tempPlaces) for x in barometerMin_vt[0]]
        barometerMaxRound = [roundNone(x,tempPlaces) for x in barometerMax_vt[0]]
        barometerAvgRound = [roundNone(x,tempPlaces) for x in barometerAvg_vt[0]]
        windMaxRound = [roundNone(x,windPlaces) for x in windMax_vt[0]]
        windAvgRound = [roundNone(x,windPlaces) for x in windAvg_vt[0]]
        windSpeedMaxRound = [roundNone(x,windSpeedPlaces) for x in windSpeedMax_vt[0]]
        windSpeedAvgRound = [roundNone(x,windSpeedPlaces) for x in windSpeedAvg_vt[0]]
        windDirRound = [roundNone(x,windDirPlaces) for x in windDir_dict['vecdir'][0]]
        rainSumRound = [roundNone(x,rainPlaces) for x in rainSum_vt[0]]
        radiationMinRound = [roundNone(x,radiationPlaces) for x in radiation_dict['min'][0]]
        radiationMaxRound = [roundNone(x,radiationPlaces) for x in radiation_dict['max'][0]]
        radiationAvgRound = [roundNone(x,radiationPlaces) for x in radiation_dict['avg'][0]]
        uvMinRound = [roundNone(x,uvPlaces) for x in uv_dict['min'][0]]
        uvMaxRound = [roundNone(x,uvPlaces) for x in uv_dict['max'][0]]
        uvAvgRound = [roundNone(x,uvPlaces) for x in uv_dict['avg'][0]]

        # Produce our JSON strings
        outTempMinMax_json = json.dumps(list(zip(time_ms, outTempMinRound, outTempMaxRound)))
        outTempMin_json = json.dumps(list(zip(time_ms, outTempMinRound)))
        outTempMax_json = json.dumps(list(zip(time_ms, outTempMaxRound)))
        outTempAvg_json = json.dumps(list(zip(time_ms, outTempAvgRound)))
        inTempMinMax_json = json.dumps(list(zip(time_ms, inTempMinRound, inTempMaxRound)))
        inTempMin_json = json.dumps(list(zip(time_ms, inTempMinRound)))
        inTempMax_json = json.dumps(list(zip(time_ms, inTempMaxRound)))
        inTempAvg_json = json.dumps(list(zip(time_ms, inTempAvgRound)))
        dewpointMinMax_json = json.dumps(list(zip(time_ms, dewpointMinRound, dewpointMaxRound)))
        dewpointMin_json = json.dumps(list(zip(time_ms, dewpointMinRound)))
        dewpointMax_json = json.dumps(list(zip(time_ms, dewpointMaxRound)))
        dewpointAvg_json = json.dumps(list(zip(time_ms, dewpointAvgRound)))
        windchillMinMax_json = json.dumps(list(zip(time_ms, windchillMinRound, windchillMaxRound)))
        windchillMin_json = json.dumps(list(zip(time_ms, windchillMinRound)))
        windchillMax_json = json.dumps(list(zip(time_ms, windchillMaxRound)))
        windchillAvg_json = json.dumps(list(zip(time_ms, windchillAvgRound)))
        heatindexMinMax_json = json.dumps(list(zip(time_ms, heatindexMinRound, heatindexMaxRound)))
        heatindexMin_json = json.dumps(list(zip(time_ms, heatindexMinRound)))
        heatindexMax_json = json.dumps(list(zip(time_ms, heatindexMaxRound)))
        heatindexAvg_json = json.dumps(list(zip(time_ms, heatindexAvgRound)))
        outHumidityMinMax_json = json.dumps(list(zip(time_ms, outHumidityMinRound, outHumidityMaxRound)))
        outHumidityMin_json = json.dumps(list(zip(time_ms, outHumidityMinRound)))
        outHumidityMax_json = json.dumps(list(zip(time_ms, outHumidityMaxRound)))
        outHumidityAvg_json = json.dumps(list(zip(time_ms, outHumidityAvgRound)))
        inHumidityMinMax_json = json.dumps(list(zip(time_ms, inHumidityMinRound, inHumidityMaxRound)))
        inHumidityMin_json = json.dumps(list(zip(time_ms, inHumidityMinRound)))
        inHumidityMax_json = json.dumps(list(zip(time_ms, inHumidityMaxRound)))
        inHumidityAvg_json = json.dumps(list(zip(time_ms, inHumidityAvgRound)))
        barometerMinMax_json = json.dumps(list(zip(time_ms, barometerMinRound, barometerMaxRound)))
        barometerMin_json = json.dumps(list(zip(time_ms, barometerMinRound)))
        barometerMax_json = json.dumps(list(zip(time_ms, barometerMaxRound)))
        barometerAvg_json = json.dumps(list(zip(time_ms, barometerAvgRound)))
        windMax_json = json.dumps(list(zip(time_ms, windMaxRound)))
        windAvg_json = json.dumps(list(zip(time_ms, windAvgRound)))
        windSpeedMax_json = json.dumps(list(zip(time_ms, windSpeedMaxRound)))
        windSpeedAvg_json = json.dumps(list(zip(time_ms, windSpeedAvgRound)))
        windDir_json = json.dumps(list(zip(time_ms, windDirRound)))
        rainSum_json = json.dumps(list(zip(time_ms, rainSumRound)))
        radiationMax_json = json.dumps(list(zip(time_ms, radiationMaxRound)))
        radiationAvg_json = json.dumps(list(zip(time_ms, radiationAvgRound)))
        uvMax_json = json.dumps(list(zip(time_ms, uvMaxRound)))
        uvAvg_json = json.dumps(list(zip(time_ms, uvAvgRound)))

        # Create appTemp json
        try:
            (appTemp_time_vt, appTemp_dict) = getDaySummaryVectors(db_lookup(), 'appTemp', _timespan, ['min', 'max', 'avg'])
            appTempMin_vt = self.generator.converter.convert(appTemp_dict['min'])
            appTempMax_vt = self.generator.converter.convert(appTemp_dict['max'])
            appTempAvg_vt = self.generator.converter.convert(appTemp_dict['avg'])
            appTempMinRound = [roundNone(x,tempPlaces) for x in appTempMin_vt[0]]
            appTempMaxRound = [roundNone(x,tempPlaces) for x in appTempMax_vt[0]]
            appTempAvgRound = [roundNone(x,tempPlaces) for x in appTempAvg_vt[0]]
            appTempMinMax_json = json.dumps(list(zip(time_ms, appTempMinRound, appTempMaxRound)))
            appTempMin_json = json.dumps(list(zip(time_ms, appTempMinRound)))
            appTempMax_json = json.dumps(list(zip(time_ms, appTempMaxRound)))
            appTempAvg_json = json.dumps(list(zip(time_ms, appTempAvgRound)))
        except Exception as e:
            appTempMinMax_json = None
            appTempMin_json = None
            appTempMax_json = None
            appTempAvg_json = None

        # Create uva json
        try:
                (uva_time_vt, uva_dict) = getDaySummaryVectors(db_lookup(), 'uva', timespan,['max', 'avg'])
                time_ms = [uva_time_vt[0][0] if (x == 0) else uva_time_vt[0][x] - uva_time_vt[0][0] for x in range(len(uva_time_vt[0]))]
                uvaPlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(uva_dict['max'][1], "1f")[-2])
                uvaMaxRound = [roundNone(x,uvaPlaces) for x in uva_dict['max'][0]]
                uvaAvgRound = [roundNone(x,uvaPlaces) for x in uva_dict['avg'][0]]
                uvaMax_json = json.dumps(list(zip(time_ms, uvaMaxRound)))
                uvaAvg_json = json.dumps(list(zip(time_ms, uvaAvgRound)))
        except:
                uvaMax_json = None
                uvaAvg_json = None
                
        # Create uvb json
        try:
                (uvb_time_vt, uvb_dict) = getDaySummaryVectors(db_lookup(), 'uvb', timespan,['max', 'avg'])
                time_ms = [uvb_time_vt[0][0] if (x == 0) else uvb_time_vt[0][x] - uvb_time_vt[0][0] for x in range(len(uvb_time_vt[0]))]
                uvbPlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(uvb_dict['max'][1], "1f")[-2])
                uvbMaxRound = [roundNone(x,uvbPlaces) for x in uvb_dict['max'][0]]
                uvbAvgRound = [roundNone(x,uvbPlaces) for x in uvb_dict['avg'][0]]
                uvbMax_json = json.dumps(list(zip(time_ms, uvbMaxRound)))
                uvbAvg_json = json.dumps(list(zip(time_ms, uvbAvgRound)))
        except:
                uvbMax_json = None
                uvbAvg_json = None
                
        # Create uvaWm json
        try:
                (uvaWm_time_vt, uvaWm_dict) = getDaySummaryVectors(db_lookup(), 'uvaWm', timespan,['max', 'avg'])
                time_ms = [uvaWm_time_vt[0][0] if (x == 0) else uvaWm_time_vt[0][x] - uvaWm_time_vt[0][0] for x in range(len(uvaWm_time_vt[0]))]
                uvaWmPlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(uvaWm_dict['max'][1], "1f")[-2])
                uvaWmMaxRound = [roundNone(x,uvaWmPlaces) for x in uvaWm_dict['max'][0]]
                uvaWmAvgRound = [roundNone(x,uvaWmPlaces) for x in uvaWm_dict['avg'][0]]
                uvaWmMax_json = json.dumps(list(zip(time_ms, uvaWmMaxRound)))
                uvaWmAvg_json = json.dumps(list(zip(time_ms, uvaWmAvgRound)))
        except:
                uvaWmMax_json = None
                uvaWmAvg_json = None
                
        # Create uvbWm json
        try:
                (uvbWm_time_vt, uvbWm_dict) = getDaySummaryVectors(db_lookup(), 'uvbWm', timespan,['max', 'avg'])
                time_ms = [uvbWm_time_vt[0][0] if (x == 0) else uvbWm_time_vt[0][x] - uvbWm_time_vt[0][0] for x in range(len(uvbWm_time_vt[0]))]
                uvbWmPlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(uvbWm_dict['max'][1], "1f")[-2])
                uvbWmMaxRound = [roundNone(x,uvbWmPlaces) for x in uvbWm_dict['max'][0]]
                uvbWmAvgRound = [roundNone(x,uvbWmPlaces) for x in uvbWm_dict['avg'][0]]
                uvbWmMax_json = json.dumps(list(zip(time_ms, uvbWmMaxRound)))
                uvbWmAvg_json = json.dumps(list(zip(time_ms, uvbWmAvgRound)))
        except:
                uvbWmMax_json = None
                uvbWmAvg_json = None
                                            
        # Create energy json
        try:
                (energy_time_vt, energy_dict) = getDaySummaryVectors(db_lookup(), 'lightning_energy', timespan,['max', 'avg'])
                time_ms = [energy_time_vt[0][0] if (x == 0) else energy_time_vt[0][x] - energy_time_vt[0][0] for x in range(len(energy_time_vt[0]))]
                energyPlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(energy_dict['max'][1], "1f")[-2])
                energyMaxRound = [roundNone(x,energyPlaces) for x in energy_dict['max'][0]]
                energyAvgRound = [roundNone(x,energyPlaces) for x in energy_dict['avg'][0]]
                energyMax_json = json.dumps(list(zip(time_ms, energyMaxRound)))
                energyAvg_json = json.dumps(list(zip(time_ms, energyAvgRound)))
        except:
                energyMax_json = None
                energyAvg_json = None
                
        # Create distance json
        try:
                (distance_time_vt, distance_dict) = getDaySummaryVectors(db_lookup(), 'lightning_distance', timespan,['max', 'avg'])
                time_ms = [distance_time_vt[0][0] if (x == 0) else distance_time_vt[0][x] - distance_time_vt[0][0] for x in range(len(distance_time_vt[0]))]
                distancePlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(distance_dict['max'][1], "1f")[-2])
                distanceMaxRound = [roundNone(x,distancePlaces) for x in distance_dict['max'][0]]
                distanceAvgRound = [roundNone(x,distancePlaces) for x in distance_dict['avg'][0]]
                distanceMax_json = json.dumps(list(zip(time_ms, distanceMaxRound)))
                distanceAvg_json = json.dumps(list(zip(time_ms, distanceAvgRound)))
        except:
                distanceMax_json = None
                distanceAvg_json = None
                
        # Create strike count json
        try:
                (strike_time_vt, strike_dict) = getDaySummaryVectors(db_lookup(), 'lightning_strike_count', timespan,['sum'])
                time_ms = [strike_time_vt[0][0] if (x == 0) else strike_time_vt[0][x] - strike_time_vt[0][0] for x in range(len(strike_time_vt[0]))]
                strikePlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(strike_dict['sum'][1], "1f")[-2])
                strikeCountRound = [roundNone(x,strikePlaces) for x in strike_dict['sum'][0]]
                strikeCount_json = json.dumps(list(zip(time_ms, strikeCountRound)))
        except Exception as e:
                strikeCount_json = None

        # Create noise count json
        try:
                (noise_time_vt, noise_dict) = getDaySummaryVectors(db_lookup(), 'lightning_noise_count', timespan,['sum'])
                time_ms = [noise_time_vt[0][0] if (x == 0) else noise_time_vt[0][x] - noise_time_vt[0][0] for x in range(len(noise_time_vt[0]))]
                noisePlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(noise_dict['sum'][1], "1f")[-2])
                noiseCountRound = [roundNone(x,noisePlaces) for x in noise_dict['sum'][0]]
                noiseCount_json = json.dumps(list(zip(time_ms, noiseCountRound)))
        except Exception as e:
                noiseCount_json = None

        # Create disturber count json
        try:
                (disturber_time_vt, disturber_dict) = getDaySummaryVectors(db_lookup(), 'lightning_disturber_count', timespan,['sum'])
                time_ms = [disturber_time_vt[0][0] if (x == 0) else disturber_time_vt[0][x] - disturber_time_vt[0][0] for x in range(len(disturber_time_vt[0]))]
                disturberPlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(disturber_dict['sum'][1], "1f")[-2])
                disturberCountRound = [roundNone(x,disturberPlaces) for x in disturber_dict['sum'][0]]
                disturberCount_json = json.dumps(list(zip(time_ms, disturberCountRound)))
        except Exception as e:
                disturberCount_json = None

        # Create full_spectrum json
        try:
                (full_spectrum_time_vt, full_spectrum_dict) = getDaySummaryVectors(db_lookup(), 'full_spectrum', timespan,['max', 'avg'])
                time_ms = [full_spectrum_time_vt[0][0] if (x == 0) else full_spectrum_time_vt[0][x] - full_spectrum_time_vt[0][0] for x in range(len(full_spectrum_time_vt[0]))]
                full_spectrumPlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(full_spectrum_dict['max'][1], "1f")[-2])
                full_spectrumMaxRound = [roundNone(x,full_spectrumPlaces) for x in full_spectrum_dict['max'][0]]
                full_spectrumAvgRound = [roundNone(x,full_spectrumPlaces) for x in full_spectrum_dict['avg'][0]]
                full_spectrumMax_json = json.dumps(list(zip(time_ms, full_spectrumMaxRound)))
                full_spectrumAvg_json = json.dumps(list(zip(time_ms, full_spectrumAvgRound)))
        except:
                full_spectrumMax_json = None
                full_spectrumAvg_json = None
                
        # Create lux json
        try:
                (lux_time_vt, lux_dict) = getDaySummaryVectors(db_lookup(), 'lux', timespan,['max', 'avg'])
                time_ms = [lux_time_vt[0][0] if (x == 0) else lux_time_vt[0][x] - lux_time_vt[0][0] for x in range(len(lux_time_vt[0]))]
                luxPlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(lux_dict['max'][1], "1f")[-2])
                luxMaxRound = [roundNone(x,luxPlaces) for x in lux_dict['max'][0]]
                luxAvgRound = [roundNone(x,luxPlaces) for x in lux_dict['avg'][0]]
                luxMax_json = json.dumps(list(zip(time_ms, luxMaxRound)))
                luxAvg_json = json.dumps(list(zip(time_ms, luxAvgRound)))
        except:
                luxMax_json = None
                luxAvg_json = None

        # Create infrared json
        try:
                (infrared_time_vt, infrared_dict) = getDaySummaryVectors(db_lookup(), 'infrared', timespan,['max', 'avg'])
                time_ms = [infrared_time_vt[0][0] if (x == 0) else infrared_time_vt[0][x] - infrared_time_vt[0][0] for x in range(len(infrared_time_vt[0]))]
                infraredPlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(infrared_dict['max'][1], "1f")[-2])
                infraredMaxRound = [roundNone(x,infraredPlaces) for x in infrared_dict['max'][0]]
                infraredAvgRound = [roundNone(x,infraredPlaces) for x in infrared_dict['avg'][0]]
                infraredMax_json = json.dumps(list(zip(time_ms, infraredMaxRound)))
                infraredAvg_json = json.dumps(list(zip(time_ms, infraredAvgRound)))
        except:
                infraredMax_json = None
                infraredAvg_json = None
                
        # Create cloudcover json
        try:
                (cloudcover_time_vt, cloudcover_dict) = getDaySummaryVectors(db_lookup(), self.db_field, timespan,['max', 'avg'])
                time_ms = [cloudcover_time_vt[0][0] if (x == 0) else cloudcover_time_vt[0][x] - cloudcover_time_vt[0][0] for x in range(len(cloudcover_time_vt[0]))]
                cloudcoverPlaces = int(self.generator.skin_dict['Units']['StringFormats'].get(cloudcover_dict['max'][1], "1f")[-2])
                cloudcoverMaxRound = [roundNone(x,cloudcoverPlaces) for x in cloudcover_dict['max'][0]]
                cloudcoverAvgRound = [roundNone(x,cloudcoverPlaces) for x in cloudcover_dict['avg'][0]]
                cloudcoverMax_json = json.dumps(list(zip(time_ms, cloudcoverMaxRound)))
                cloudcoverAvg_json = json.dumps(list(zip(time_ms, cloudcoverAvgRound)))
        except:
                cloudcoverMax_json = None
                cloudcoverAvg_json = None
                
        # Create pm2_5 json
        try:
                (pm2_5_time_vt, pm2_5_dict) = getDaySummaryVectors(db_lookup(), 'pm2_5', timespan,['max', 'avg'])
                time_ms = [pm2_5_time_vt[0][0] if (x == 0) else pm2_5_time_vt[0][x] - pm2_5_time_vt[0][0] for x in range(len(pm2_5_time_vt[0]))]
                pm2_5Places = int(self.generator.skin_dict['Units']['StringFormats'].get(pm2_5_dict['max'][1], "1f")[-2])
                pm2_5MaxRound = [roundNone(x,pm2_5Places) for x in pm2_5_dict['max'][0]]
                pm2_5AvgRound = [roundNone(x,pm2_5Places) for x in pm2_5_dict['avg'][0]]
                pm2_5Max_json = json.dumps(list(zip(time_ms, pm2_5MaxRound)))
                pm2_5Avg_json = json.dumps(list(zip(time_ms, pm2_5AvgRound)))
        except:
                pm2_5Max_json = None
                pm2_5Avg_json = None
                
        # Create pm10_0 json
        try:
                (pm10_0_time_vt, pm10_0_dict) = getDaySummaryVectors(db_lookup(), 'pm10_0', timespan,['max', 'avg'])
                time_ms = [pm10_0_time_vt[0][0] if (x == 0) else pm10_0_time_vt[0][x] - pm10_0_time_vt[0][0] for x in range(len(pm10_0_time_vt[0]))]
                pm10_0Places = int(self.generator.skin_dict['Units']['StringFormats'].get(pm10_0_dict['max'][1], "1f")[-2])
                pm10_0MaxRound = [roundNone(x,pm10_0Places) for x in pm10_0_dict['max'][0]]
                pm10_0AvgRound = [roundNone(x,pm10_0Places) for x in pm10_0_dict['avg'][0]]
                pm10_0Max_json = json.dumps(list(zip(time_ms, pm10_0MaxRound)))
                pm10_0Avg_json = json.dumps(list(zip(time_ms, pm10_0AvgRound)))
        except:
                pm10_0Max_json = None
                pm10_0Avg_json = None
                
        # Put into a dictionary to return
        self.search_list_extension = {'outTempMinMax_json' : outTempMinMax_json,
                                 'outTempAvg_json' : outTempAvg_json,
                                 'inTempMinMax_json' : inTempMinMax_json,
                                 'inTempAvg_json' : inTempAvg_json,
                                 'appTempMinMax_json' : appTempMinMax_json,
                                 'appTempMin_json' : appTempMin_json,
                                 'appTempMax_json' : appTempMax_json,
                                 'appTempAvg_json' : appTempAvg_json,
                                 'dewpointMinMax_json' : dewpointMinMax_json,
                                 'dewpointAvg_json' : dewpointAvg_json,
                                 'windchillMinMax_json' : windchillMinMax_json,
                                 'windchillAvg_json' : windchillAvg_json,
                                 'heatindexMinMax_json' : heatindexMinMax_json,
                                 'heatindexAvg_json' : heatindexAvg_json,
                                 'outHumidityMinMax_json' : outHumidityMinMax_json,
                                 'outHumidityMin_json' : outHumidityMin_json,
                                 'outHumidityMax_json' : outHumidityMax_json,
                                 'outHumidityAvg_json' : outHumidityAvg_json,
                                 'inHumidityMinMax_json' : inHumidityMinMax_json,
                                 'inHumidityMin_json' : inHumidityMin_json,
                                 'inHumidityMax_json' : inHumidityMax_json,
                                 'inHumidityAvg_json' : inHumidityAvg_json,
                                 'barometerMinMax_json' : barometerMinMax_json,
                                 'barometerMin_json' : barometerMin_json,
                                 'barometerMax_json' : barometerMax_json,
                                 'barometerAvg_json' : barometerAvg_json,
                                 'windMax_json' : windMax_json,
                                 'windAvg_json' : windAvg_json,
                                 'windSpeedMax_json' : windSpeedMax_json,
                                 'windSpeedAvg_json' : windSpeedAvg_json,
                                 'windDir_json' : windDir_json,
                                 'rainSum_json' : rainSum_json,
                                 'radiationMax_json' : radiationMax_json,
                                 'radiationAvg_json' : radiationAvg_json,
                                 'uvMax_json' : uvMax_json,
                                 'uvAvg_json' : uvAvg_json,
                                 'uvaMax_json' : uvaMax_json,
                                 'uvaAvg_json' : uvaAvg_json,
                                 'uvbMax_json' : uvbMax_json,
                                 'uvbAvg_json' : uvbAvg_json,
                                 'uvaWmMax_json' : uvaWmMax_json,
                                 'uvaWmAvg_json' : uvaWmAvg_json,
                                 'uvbWmMax_json' : uvbWmMax_json,
                                 'uvbWmAvg_json' : uvbWmAvg_json,
                                 'strikeCount_json' : strikeCount_json,
                                 'noiseCount_json' : noiseCount_json,
                                 'disturberCount_json' : disturberCount_json,
                                 'distanceMax_json' : distanceMax_json ,
                                 'distanceAvg_json' : distanceAvg_json,
                                 'energyMax_json' : energyMax_json,
                                 'energyAvg_json' : energyAvg_json,
                                 'lightningSum_json' : lightningSum_json,
                                 'full_spectrumMax_json' : full_spectrumMax_json,
                                 'full_spectrumAvg_json' : full_spectrumAvg_json,
                                 'luxMax_json' : luxMax_json,
                                 'luxAvg_json' : luxAvg_json,
                                 'infraredMax_json' : infraredMax_json,
                                 'infraredAvg_json' : infraredAvg_json,
                                 'cloudcoverMax_json' : cloudcoverMax_json,
                                 'cloudcoverAvg_json' : cloudcoverAvg_json,
                                 'pm2_5Max_json' : pm2_5Max_json,
                                 'pm2_5Avg_json' : pm2_5Avg_json,
                                 'pm10_0Max_json' : pm10_0Max_json,
                                 'pm10_0Avg_json' : pm10_0Avg_json,
                                 'utcOffset': utc_offset,
                                 'yearPlotStart' : _timespan.start * 1000,
                                 'yearPlotEnd' : _timespan.stop * 1000}
        t2 = time.time()
        logdbg2("w34highchartsYear SLE executed in %0.3f seconds" % (t2 - t1))

        # Return our json data
        return [self.search_list_extension]

class w34highcharts_wind_rose_week(SearchList):
    """SearchList to generate JSON vectors for w34highcharts windrose plots."""

    def __init__(self, generator):
        # Call our superclass' __init__
        SearchList.__init__(self, generator)
        self.sle_dict = None

        # Get a dictionary of ous skin settings
        self.windrose_dict = self.generator.skin_dict['Extras']['WindRose']
        # Look for plot title, if not defined then set a default
        try:
            self.title = self.windrose_dict['title'].strip()
        except KeyError:
            self.title = 'Wind Rose'

        self.source_list =[('windSpeed','windDir'), ('windGust', 'windGustDir')]
            
        # Look for aggregate type
        try:
            self.agg_type = self.windrose_dict['aggregate_type'].strip().lower()
            if self.agg_type not in [None, 'avg', 'max', 'min']:
                self.agg_type = None
        except KeyError:
            self.agg_type = None
        # Look for aggregate interval
        try:
            self.agg_interval = int(self.windrose_dict['aggregate_interval'])
            if self.agg_interval == 0:
                self.agg_interval = None
        except (KeyError, TypeError, ValueError):
            self.agg_interval = None
        # Look for speed band boundaries, if not defined then set some defaults
        try:
            self.speedfactor = self.windrose_dict['speedfactor']
            self.speedfactor = [float(i) for i in self.speedfactor]
        except KeyError:
            self.speedfactor = [0.0, 0.1, 0.2, 0.3, 0.5, 0.7, 1.0]
        if len(self.speedfactor) != 7 or _max(self.speedfactor) > 1.0 or _min(self.speedfactor) <0.0:
            self.speedfactor = [0.0, 0.1, 0.2, 0.3, 0.5, 0.7, 1.0]
        # Look for petal colours, if not defined then set some defaults
        try:
            self.petal_colours = self.windrose_dict['petal_colors']
        except KeyError:
            self.petal_colours = ['lightblue', 'blue', 'midnightblue',
                                  'forestgreen', 'limegreen', 'green',
                                  'greenyellow']
        if len(self.petal_colours) != 7:
            self.petal_colours = ['lightblue', 'blue', 'midnightblue',
                                  'forestgreen', 'limegreen', 'green',
                                  'greenyellow']
        for x in range(len(self.petal_colours)-1):
            if self.petal_colours[x][0:2] == '0x':
                self.petal_colours[x] = '#' + self.petal_colours[x][2:]
        # Look for number of petals, if not defined then set a default
        try:
            self.petals = int(self.windrose_dict['petals'])
        except KeyError:
            self.petals = 8
        if self.petals == None or self.petals == 0:
            self.petals = 8
        # Set our list of direction based on number of petals
        if self.petals == 16:
            self.directions = ['N', 'NNE', 'NE', 'ENE',
                               'E', 'ESE', 'SE', 'SSE',
                               'S', 'SSW', 'SW', 'WSW',
                               'W', 'WNW', 'NW', 'NNW']
        elif self.petals == 8:
            self.directions = ['N', 'NE', 'E', 'SE',
                               'S', 'SW', 'W', 'NW']
        elif self.petals == 4:
            self.directions = ['N', 'E', 'S', 'W']
        # Look for legend title, if not defined then set True
        try:
            self.legend_title = self.windrose_dict['legend_title'].strip().lower() == 'true'
        except KeyError:
            self.legend_title = True
        # Look for band percent, if not defined then set True
        try:
            self.band_percent = self.windrose_dict['band_percent'].strip().lower() == 'true'
        except KeyError:
            self.band_percent = True
        # Look for % precision, if not defined then set a default
        try:
            self.precision = int(self.windrose_dict['precision'])
        except KeyError:
            self.precision = 1
        if self.precision == None:
            self.precision = 1
        # Look for bullseye diameter, if not defined then set a default
        try:
            self.bullseye_size = int(self.windrose_dict['bullseye_size'])
        except KeyError:
            self.bullseye_size = 3
        if self.bullseye_size == None:
            self.bullseye_size = 3
        # Look for bullseye colour, if not defined then set some defaults
        try:
            self.bullseye_colour = self.windrose_dict['bullseye_color']
        except KeyError:
            self.bullseye_colour = 'white'
        if self.bullseye_colour == None:
            self.bullseye_colour = 'white'
        if self.bullseye_colour[0:2] == '0x':
            self.bullseye_colour = '#' + self.bullseye_colour[2:]
        # Look for 'calm' upper limit ie the speed below which we consider aggregate
        # wind speeds to be 'calm' (or 0)
        try:
            self.calm_limit = float(self.windrose_dict['calm_limit'])
        except:
            self.calm_limit = 0.1

    def calcWindRose(self, timespan, db_lookup, period, source, dir):
        """Function to calculate windrose JSON data for a given timespan."""

        # Initialise a dictionary for our results
        wr_dict = {}
        if period <= 604800: # Week or less, get our vectors from archive via getSqlVectors
            # Get our wind speed vector
            (time_vec_speed_start_vt, time_vec_speed_vt, speed_vec_vt) = db_lookup().getSqlVectors(TimeSpan(timespan.stop-period + 1, timespan.stop),
                                                                                                   source,
                                                                                                   None,
                                                                                                   None)
            # Convert it
            speed_vec_vt = self.generator.converter.convert(speed_vec_vt)
            # Get our wind direction vector
            (time_vec_dir_start_vt, time_vec_dir_stop_vt, direction_vec_vt) = db_lookup().getSqlVectors(TimeSpan(timespan.stop-period + 1, timespan.stop),
                                                                                                        dir,
                                                                                                        None,
                                                                                                        None)
        else: # Get our vectors from daily summaries using custom getStatsVectors
            # Get our data tuples for speed
            (time_vec_speed_vt, speed_dict) = getDaySummaryVectors(db_lookup(),
                                                                   ('wind' if source == 'windSpeed' else 'windGust'),
                                                                   TimeSpan(timespan.stop - period, timespan.stop),
                                                                   ['avg'])
            # Get our vector ValueTuple out of the dictionary and convert it
            speed_vec_vt = self.generator.converter.convert(speed_dict['avg'])
            # Get our data tuples for direction
            (time_vec_dir_vt, dir_dict) = getDaySummaryVectors(db_lookup(),
                                                               'wind',
                                                               TimeSpan(timespan.stop - period, timespan.stop),
                                                               ['vecdir'])
            # Get our vector ValueTuple out of the dictionary, no need to convert
            direction_vec_vt = dir_dict['vecdir']
        
        # To get a better display we will set our upper speed to a multiple of 10
        # Find maximum speed from our data
        maxSpeed = _max(speed_vec_vt[0])
        # Set upper speed range for our plot
        maxSpeedRange = (int(maxSpeed/10.0) + 1) * 10
        # Setup a list to hold the cutoff speeds for our stacked columns on our
        # wind rose.
        speedList = [0 for x in range(7)]
        # Setup a list to hold the legend item text for each of our speed bands
        # (or legend labels)
        legendLabels = ["" for x in range(7)]
        legendNoLabels = ["" for x in range(7)]
        i = 1
        while i<7:
            speedList[i] = self.speedfactor[i]*maxSpeedRange
            i += 1
        # Setup 2D list for wind direction
        # windBin[0][0..self.petals] holds the calm or 0 speed counts for each
        # of self.petals (usually 16) compass directions ([0][0] for N, [0][1]
        # for ENE (or NE oe E depending self.petals) etc).
        # windBin[1][0..self.petals] holds the 1st speed band speed counts for
        # each of self.petals (usually 16) compass directions ([1][0] for
        # N, [1][1] for ENE (or NE oe E depending self.petals) etc).
        windBin = [[0 for x in range(self.petals)] for x in range(7)]
        # Setup a list to hold sample count (speed>0) for each direction. Used
        # to aid in bullseye scaling
        dirBin = [0 for x in range(self.petals)]
        # Setup list to hold obs counts for each speed range (irrespective of
        # direction)
        # [0] = calm
        # [1] = >0 and < 1st speed
        # [2] = >1st speed and <2nd speed
        # .....
        # [6] = >4th speed and <5th speed
        # [7] = >5th speed and <6th speed
        speedBin = [0 for x in range(7)]
        # How many obs do we have?
        samples = len(time_vec_speed_vt[0])
        # Calc factor to be applied to convert counts to %
        pcentFactor = 100.0/samples
        #loginf(str(samples));
        # Loop through each sample and increment direction counts
        # and speed ranges for each direction as necessary. 'None'
        # direction is counted as 'calm' (or 0 speed) and
        # (by definition) no direction and are plotted in the
        # 'bullseye' on the plot
        i = 0
        while i < samples:
            if (speed_vec_vt[0][i] is None) or (direction_vec_vt[0][i] is None):
                speedBin[0] +=1
            else:
                bin = int((direction_vec_vt[0][i]+11.25)/22.5)%self.petals
                if speed_vec_vt[0][i] <= self.calm_limit:
                    speedBin[0] +=1
                elif speed_vec_vt[0][i] > speedList[5]:
                    windBin[6][bin] += 1
                elif speed_vec_vt[0][i] > speedList[4]:
                    windBin[5][bin] += 1
                elif speed_vec_vt[0][i] > speedList[3]:
                    windBin[4][bin] += 1
                elif speed_vec_vt[0][i] > speedList[2]:
                    windBin[3][bin] += 1
                elif speed_vec_vt[0][i] > speedList[1]:
                    windBin[2][bin] += 1
                elif speed_vec_vt[0][i] > 0:
                    windBin[1][bin] += 1
                else:
                    windBin[0][bin] += 1
            i += 1
        i=0
        # Our windBin values are counts, need to change them to % of total samples
        # and round them to self.precision decimal places.
        # At the same time, to help with bullseye scaling lets count how many
        # samples we have (of any speed>0) for each direction
        while i<7:
            j=0
            while j<self.petals:
                dirBin[j] += windBin[i][j]
                windBin[i][j] = round(pcentFactor * windBin[i][j],self.precision)
                j += 1
            i += 1
        # Bullseye diameter is specified in skin.conf as a % of y axis range on
        # polar plot. To make space for bullseye we start the y axis at a small
        # -ve number. We supply w34highcharts with the -ve value in y axis units
        # and w34highcharts and some javascript takes care of the rest. # First we
        # need to work out our y axis max and the use skin.conf bullseye size
        # value to calculate the -ve value for our y axis min.
        maxDirPercent = round(pcentFactor * _max(dirBin),self.precision) # the
            # size of our largest 'rose petal'
        maxYaxis = 10.0 * (1 + int(maxDirPercent/10.0)) # the y axis max value
        bullseyeRadius = maxYaxis * self.bullseye_size/100.0 # our bullseye
            # radius in y axis units
        # Need to get the counts for each speed band. To get this go through
        # each speed band and then through each petal adding the petal speed
        # 'count' to our total for each band and add the speed band counts to
        # the relevant speedBin. Values are already %.
        j = 0
        while j<7:
            i = 0
            while i<self.petals:
                speedBin[j] += windBin[j][i]
                i += 1
            j += 1
        # Determine our legend labels. Need to determine actual speed band
        # ranges, add unit and if necessary add % for that band
        calmPercent_str = str(round(speedBin[0] * pcentFactor,self.precision)) + "%"
        if self.band_percent:
            legendLabels[0]="Calm (" + calmPercent_str + ")"
            legendNoLabels[0]="Calm (" + calmPercent_str + ")"
        else:
            legendLabels[0]="Calm"
            legendNoLabels[0]="Calm"
        i=1
        while i<7:
            if self.band_percent:
                legendLabels[i] = str(roundInt(speedList[i-1],0)) + "-" + \
                    str(roundInt(speedList[i],0)) + " (" + \
                    str(round(speedBin[i] * pcentFactor,self.precision)) + "%)"
                legendNoLabels[i] = str(roundInt(speedList[i-1],0)) + "-" + \
                    str(roundInt(speedList[i],0)) + " (" + \
                    str(round(speedBin[i] * pcentFactor,self.precision)) + "%)"
            else:
                legendLabels[i] = str(roundInt(speedList[i-1],0)) + "-" + \
                    str(roundInt(speedList[i],0))
                legendNoLabels[i] = str(roundInt(speedList[i-1],0)) + "-" + \
                    str(roundInt(speedList[i],0))
            i += 1
        # Build up our JSON result string
        jsonResult_str = '[{"name": "' + legendLabels[6] + '", "data": ' + \
            json.dumps(windBin[6]) + '}'
        jsonResultNoLabel_str = '[{"name": "' + legendNoLabels[6] + \
            '", "data": ' + json.dumps(windBin[6]) + '}'
        i=5
        while i>0:
            jsonResult_str += ', {"name": "' + legendLabels[i] + '", "data": ' + \
                json.dumps(windBin[i]) + '}'
            jsonResultNoLabel_str += ', {"name": "' + legendNoLabels[i] + \
                '", "data": ' + json.dumps(windBin[i]) + '}'
            i -= 1
        # Add ] to close our json array
        jsonResult_str += ']'
        # Fill our results dictionary
        wr_dict['windrosejson'] = jsonResult_str
        jsonResultNoLabel_str += ']'
        wr_dict['windrosenolabeljson'] = jsonResultNoLabel_str
        # Get our xAxis categories in json format
        wr_dict['xAxisCategoriesjson'] = json.dumps(self.directions)
        # Get our yAxis min/max settings
        wr_dict['yAxisjson'] = '{"max": %f, "min": %f}' % (maxYaxis, -1.0 * bullseyeRadius)
        # Get our stacked column colours in json format
        wr_dict['samples'] = str(samples)
        wr_dict['coloursjson'] = json.dumps(self.petal_colours)
        # Manually construct our plot title in json format
        wr_dict['titlejson'] = "[\"" + self.title + "\"]"
        # Manually construct our legend title in json format
        # Set to null if not required
        if self.legend_title:
            if source == 'windSpeed':
                legend_title_json = "[\"Wind Speed\"]"
                legend_title_no_label_json = "[\"Wind Speed<br>(" + ")\"]"
            else:
                legend_title_json = "[\"Wind Gust\"]"
                legend_title_no_label_json = "[\"Wind Gust<br>(" + ")\"]"
        else:
            legend_title_json = "[null]"
            legend_title_no_label_json = "[null]"
        wr_dict['legendTitlejson'] = legend_title_json
        wr_dict['legendTitleNoLabeljson'] = legend_title_no_label_json
        wr_dict['bullseyejson'] = '{"radius": %f, "color": "%s", "text": "%s"}' % (bullseyeRadius,
                                                                                   self.bullseye_colour,
                                                                                   calmPercent_str)

        return wr_dict

    def get_extension_list(self, timespan, db_lookup):
        """Generate the JSON vectors and return as a list of dictionaries.

        Parameters:
          timespan: An instance of weeutil.weeutil.TimeSpan. This will
                    hold the start and stop times of the domain of
                    valid times.

          db_lookup: This is a function that, given a data binding
                     as its only parameter, will return a database manager
                     object.
         """
        if (self.sle_dict != None):
                return [self.sle_dict]
        
        t1 = time.time()

        # Look for plot period, if not defined then set a default
        try:
            _period_list = option_as_list(self.windrose_dict['period'])
        except (KeyError, TypeError):
            _period_list = ['day']  # 24 hours
        if _period_list is None:
            return Non
        elif hasattr(_period_list, '__iter__') and len(_period_list) > 0:
            sle_dict ={}
            for source in self.source_list:
                for _period_raw in _period_list:
                    _period = _period_raw.strip().lower()
                    if _period == 'day':
                        # normally this will be 86400 sec but it could be a daylight
                        # savings changeover day
                        # first get our stop time as a dt object so we can do some
                        # dt maths
                        _stop_dt = datetime.datetime.fromtimestamp(timespan.stop)
                        # then go back 1 day to get our start
                        _start_dt = _stop_dt - datetime.timedelta(days=1)
                        period = time.mktime(_stop_dt.timetuple()) - time.mktime(_start_dt.timetuple())
                    elif _period == 'week':
                        # normally this will be 604800 sec but it could be a daylight
                        # savings changeover week
                        # first get our stop time as a dt object so we can do some
                        # dt maths
                        _stop_dt = datetime.datetime.fromtimestamp(timespan.stop)
                        # then go back 7 days to get our start
                        _start_dt = _stop_dt - datetime.timedelta(days=7)
                        period = time.mktime(_stop_dt.timetuple()) - time.mktime(_start_dt.timetuple())
                    elif _period == 'month':
                        # Our start time is midnight one month ago
                        # Get a time object for midnight
                        _mn_time = datetime.time(0)
                        # Get a datetime object for our end datetime
                        _day_date = datetime.datetime.fromtimestamp(timespan.stop)
                        # Calculate our start timestamp by combining date 1 month
                        # ago and midnight time
                        _start_ts  = int(time.mktime(datetime.datetime.combine(get_ago(_day_date,0,-1),_mn_time).timetuple()))
                        # So our period is
                        period = timespan.stop - _start_ts
                    elif _period == 'year':
                        # Our start time is midnight one year ago
                        # Get a time object for midnight
                        _mn_time = datetime.time(0)
                        # Get a datetime object for our end datetime
                        _day_date = datetime.datetime.fromtimestamp(timespan.stop)
                        # Calculate our start timestamp by combining date 1 year
                        # ago and midnight time
                        _start_ts  = int(time.mktime(datetime.datetime.combine(get_ago(_day_date, -1, 0),_mn_time).timetuple()))
                        period = timespan.stop - _start_ts
                    elif _period == 'alltime' or _period == 'all':
                        _start_ts = startOfDay(db_lookup().firstGoodStamp())
                        period = timespan.stop - _start_ts
                    else:
                        try:
                            period = int(_period)
                        except:
                            # default to 1 day but it could be a daylight savings
                            # changeover day
                            # first get our stop time as a dt object so we can do some
                            # dt maths
                            _stop_dt = datetime.datetime.fromtimestamp(timespan.stop)
                            # then go back 1 day to get our start
                            _start_dt = _stop_dt - datetime.timedelta(days=1)
                            period = time.mktime(_stop_dt.timetuple()) - time.mktime(_start_dt.timetuple())
                    # Set any aggregation types/intervals if we have a period > 1 week
                    if period >= 2678400: # nominal month
                        if self.agg_type == None:
                            self.agg_type = 'avg'
                        if self.agg_interval == None:
                            self.agg_interval = 86400
                    elif period >= 604800: # nominal week:
                        if self.agg_interval == None:
                            self.agg_interval = 3600
                    else:
                            self.agg_interval = 60
                    # Can now get our windrose data
                    _suffix = str(period) if _period not in ['day', 'week', 'month', 'year', 'all', 'alltime'] else str(_period)
                    sle_dict['wr' + _suffix + ("" if source[0] == 'windSpeed' else "Gust")] = self.calcWindRose(timespan, db_lookup, period, source[0], source[1])
              
        self.sle_dict = sle_dict
        t2 = time.time()
        logdbg2("w34highchartsWindRose SLE executed in %0.3f seconds" % (t2 - t1))

        # Return our json data
        return [sle_dict]
