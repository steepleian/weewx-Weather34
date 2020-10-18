import syslog
import time

from weewx.cheetahgenerator import SearchList
from weewx.units import ValueHelper


"""
#    reused massively from wdSearchX3.py in weewx-wd 1.0 at Gary's suggestion
#
#    some code also reused_from/stolen_from/insulting weewx station.py
#    per Tom's suggestion
#
#    credit/thanks to them, please direct blame/bug-reports/requests to me alone
"""

class lastRainTags(SearchList):
    
            
        

    def logdbg(self,message):
        """Syslog a debug message
            This function didn't come from weewx-wd, just forcing
            a routine to use the normal syslogging weewx uses
            in case we need it someday below
        """

        syslog.syslog(syslog.LOG_DEBUG, message)

    def __init__(self, generator):
        SearchList.__init__(self, generator)

    def get_extension_list(self, timespan, db_lookup):
        """Returns a search list extension with datetime of last rain and secs since then.
        Parameters:
          timespan: An instance of weeutil.weeutil.TimeSpan. This will
                    hold the start and stop times of the domain of 
                    valid times.
          db_lookup: This is a function that, given a data binding
                     as its only parameter, will return a database manager
                     object.
        Returns:
          last_rain:            A ValueHelper containing the datetime of the last rain
          time_since_last_rain: A ValueHelper containing the seconds since last rain
        """

        ##
        ## Get date and time of last rain
        ##
        ## Returns unix epoch of archive period of last rain
        ##
        ## Result is returned as a ValueHelper so standard Weewx formatting
        ## is available eg $last_rain.format("%d %m %Y")
        ##

        # Get ts for day of last rain from statsdb
        # Value returned is ts for midnight on the day the rain occurred
        _row = db_lookup().getSql("SELECT MAX(dateTime) FROM archive_day_rain WHERE sum > 0")

        last_rain_ts = _row[0]
        # Now if we found a ts then use it to limit our search on the archive 
        # so we can find the last archive record during which it rained. Wrap
        # in a try statement just in case

        if last_rain_ts is not None:
            try:
                _row = db_lookup().getSql("SELECT MAX(dateTime) FROM archive WHERE rain > 0 AND dateTime > ? AND dateTime <= ?", (last_rain_ts, last_rain_ts + 86400))
                last_rain_ts = _row[0]
            except:
                last_rain_ts = None
        else:
            # the dreaded you should never reach here block
            # intent is to belt'n'suspender for a new db with no rain recorded yet
            last_rain_ts = None

        # Wrap our ts in a ValueHelper
        last_rain_vt = (last_rain_ts, 'unix_epoch', 'group_time')
        last_rain_vh = ValueHelper(last_rain_vt, formatter=self.generator.formatter, converter=self.generator.converter)

        # next idea stolen with thanks from weewx station.py
        # note this is delta time from 'now' not the last weewx db time
        #  - weewx used time.time() but weewx-wd suggests timespan.stop()
        delta_time = time.time() - last_rain_ts if last_rain_ts else None

        # Wrap our ts in a ValueHelper
        delta_time_vt = (delta_time, 'second', 'group_deltatime')
        delta_time_vh = ValueHelper(delta_time_vt, formatter=self.generator.formatter, converter=self.generator.converter)

        # Create a small dictionary with the tag names (keys) we want to use
        search_list_extension = {'last_rain' : last_rain_vh,  'time_since_last_rain' :  delta_time_vh }

        # uncomment to enable debugging
        #### logdbg("last_rain  = %s" % last_rain_ts )
        #### logdbg("delta_time = %s" % delta_time   )

        return [search_list_extension]
