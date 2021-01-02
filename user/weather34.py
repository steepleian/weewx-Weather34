# $Id: weather34.py mofied for Weather34 by Ian Millard based on crt.py by mwall $
# Weather34 WebServices added by Jerry Dietrich
# Copyright 2013-2016 Matthew Wall

"""Emit loop data to file in Weather34 realtime format.

Put this file in bin/user , then add this to your weewx.conf:


[Engine]
    [[Services]]
        archive_services = ..., user.weather34.Weather34RealTime

If no unit_system is specified, the units will be those of the database.
Units and other parameters may be specified:

[Weather34RealTime]
    unit_system = (US | METRIC | METRICWX)
    wind_units = (meter_per_second | mile_per_hour | km_per_hour | knot)
    temperature_units = (degree_C | degree_F)
    pressure_units = (hPa | hPa | inHg)
    rain_units = (mm | inch)
    cloudbase_units = (foot | meter)

Note that most of the code in this file is to calculate/lookup data that
are not directly provided by weewx in a LOOP packet.

"""

# FIXME: consider in-memory caching so that database queries are not
#        necessary after the first invocation

import math
import gc
import os
import re
import sys
import time
import weeutil.rsyncupload
from distutils.version import StrictVersion
try:
     import urllib2 as urllib
except ImportError:
     import urllib.request as urllib
try:
    from PIL import Image
except ImportError:
    pass
import functools
import threading
import socket
import subprocess

import weewx
import weewx.almanac
import weewx.manager
import weewx.wxformulas
import weeutil.weeutil
import weedb
from weewx.engine import StdService

try:
    # Test for new-style weewx logging by trying to import weeutil.logger
    import weeutil.logger
    import logging
    log = logging.getLogger(__name__)

    def logdbg(msg):
        log.debug(msg)

    def loginf(msg):
        log.info(msg)

    def logerr(msg):
        log.error(msg)

except ImportError:
    # Old-style weewx logging
    import syslog

    def logmsg(level, msg):
        syslog.syslog(level, 'w34rt: %s' % msg)

    def logdbg(msg):
        logmsg(syslog.LOG_DEBUG, msg)

    def loginf(msg):
        logmsg(syslog.LOG_INFO, msg)

    def logerr(msg):
        logmsg(syslog.LOG_ERR, msg)

VERSION = "0.0.5"

REQUIRED_WEEWX = "3.9.2"
if StrictVersion(weewx.__version__) < StrictVersion(REQUIRED_WEEWX):
    raise weewx.UnsupportedFeature("weewx %s or greater is required, found %s"
                                   % (REQUIRED_WEEWX, weewx.__version__))

COMPASS_POINTS = ['N', 'NNE', 'NE', 'ENE', 'E', 'ESE', 'SE', 'SSE',
                  'S', 'SSW', 'SW', 'WSW', 'W', 'WNW', 'NW', 'NNW', 'N']

# map weewx unit names to weather34 unit names
UNITS_PRES = {'inHg': 'in', 'mbar': 'mb', 'hPa': 'hPa'}
UNITS_TEMP = {'degree_C': 'C', 'degree_F': 'F'}
UNITS_RAIN = {'inch': 'in', 'mm': 'mm'}
UNITS_WIND = {'mile_per_hour': 'mph',
              'meter_per_second': 'm/s',
              'km_per_hour': 'km/h',
              'knot': 'kts'}
UNITS_CLOUDBASE = {'foot': 'ft', 'meter': 'm'}
# categorize the weewx-to-weather34 unit mappings
UNITS = {'pressure': UNITS_PRES,
         'temperature': UNITS_TEMP,
         'rain': UNITS_RAIN,
         'wind': UNITS_WIND,
         'cloudbase': UNITS_CLOUDBASE}
SPEED_TO_RUN = {'mile_per_hour': 'mile',
                'meter_per_second': 'km',
                'km_per_hour': 'km',
                'knot': 'mile'}

def _convert(from_v, from_units, to_units, group):
    """Given a value, units and unit group convert to different units."""
    vt = (from_v, from_units, group)
    return weewx.units.convert(vt, to_units)[0]

def _convert_us(from_v, from_us, to_units, obs, group):
    """Given obs type, value, unit system and unit group convert to units."""
    from_units = weewx.units.getStandardUnitType(from_us, obs)[0]
    return _convert(from_v, from_units, to_units, group)

def clamp_degrees(x):
    """Convert a bearing to a Weather34 bearing.
    
    weewx uses 0.0 inclusive to 360.0 (exclusive) bearings whilst Weather34 
    uses 0.0 (exclusive) to 360.0 (inclusive) bearings. When the wind is 
    calm Weather34 emits a wind direction of 0 degrees.
    """
    if x is not None:
        return x if x != 0.0 else 360.0
    return None

def degree_to_compass(x):
    try:
        if x is None:
            return '---'
        idx = int((x + 11.25) / 22.5)
        return COMPASS_POINTS[idx]
    except:
        return '---'

def get_db_units(dbm):
    val = dbm.getSql("SELECT usUnits FROM %s LIMIT 1" % dbm.table_name)
    return val[0] if val is not None else None

def calc_avg_windspeed(dbm, ts, interval=600):
    sts = ts - interval
    val = dbm.getSql("SELECT AVG(windSpeed) FROM %s "
                     "WHERE dateTime>? AND dateTime<=?" % dbm.table_name,
                     (sts, ts))
    return val[0] if val is not None else None

def calc_avg_winddir(dbm, ts, interval=600):
    sts = ts - interval
    val = dbm.getSql("SELECT AVG(windDir) FROM %s "
                     "WHERE dateTime>? AND dateTime<=?" % dbm.table_name,
                     (sts, ts))
    return clamp_degrees(val[0]) if val is not None else None

def calc_max_gust_10min(dbm, ts):
    sts = ts - 600
    val = dbm.getSql("SELECT MAX(windGust) FROM %s "
                     "WHERE dateTime>? AND dateTime<=?" % dbm.table_name,
                     (sts, ts))
    return val[0] if val is not None else None

def calc_avg_gust_10min(dbm, ts):
    sts = ts - 600
    val = dbm.getSql("SELECT AVG(windGust) FROM %s "
                     "WHERE dateTime>? AND dateTime<=?" % dbm.table_name,
                     (sts, ts))
    return val[0] if val is not None else None

def calc_avg_winddir_10min(dbm, ts):
    sts = ts - 600
    val = dbm.getSql("SELECT AVG(windDir) FROM %s "
                     "WHERE dateTime>? AND dateTime<=?" % dbm.table_name,
                     (sts, ts))
    return clamp_degrees(val[0]) if val is not None else None

def calc_windrun(dbm, ts, db_us):
    """Calculate windrun since midnight.  returns a value in the distance units
    of the database (thus the temporal normalization).
    """
    run = 0
    sod_ts = weeutil.weeutil.startOfDay(ts)
    for row in dbm.genSql("SELECT `interval`,windSpeed FROM %s "
                          "WHERE dateTime>? AND dateTime<=?" % dbm.table_name,
                          (sod_ts, ts)):
        if row[1] is not None:
            inc = row[1] * row[0]
            if db_us == weewx.METRICWX:
                inc *= 60.0
            else:
                inc /= 60.0
            run += inc
    return run

def get_trend(label, dbm, ts, n=3):
    """Calculate the trend over past n hours, default to 3 hour window."""
    lastts = ts - n * 3600
    old_val = dbm.getSql("SELECT %s FROM %s "
                         "WHERE dateTime>? AND dateTime<=?" %
                         (label, dbm.table_name), (lastts, ts))
    if old_val is None or old_val[0] is None:
        return None
    return old_val[0]

def calc_trend(newval, oldval):
    if newval is None or oldval is None:
        return None
    return newval - oldval

def calc_rain_hour(dbm, ts):
    sts = ts - 3600
    val = dbm.getSql("SELECT SUM(rain) FROM %s "
                     "WHERE dateTime>? AND dateTime<=?" % dbm.table_name,
                     (sts, ts))
    return val[0] if val is not None else None

def calc_rain_month(dbm, ts):
    span = weeutil.weeutil.archiveMonthSpan(ts)
    val = dbm.getSql("SELECT SUM(rain) FROM %s "
                     "WHERE dateTime>? AND dateTime<=?" % dbm.table_name,
                     (span.start, ts))
    return val[0] if val is not None else None

def calc_rain_year(dbm, ts):
    span = weeutil.weeutil.archiveYearSpan(ts)
    val = dbm.getSql("SELECT SUM(rain) FROM %s "
                     "WHERE dateTime>? AND dateTime<=?" % dbm.table_name,
                     (span.start, ts))
    return val[0] if val is not None else None

def calc_rain_yesterday(dbm, ts):
    ts = weeutil.weeutil.startOfDay(ts)
    sts = ts - 3600 * 24
    val = dbm.getSql("SELECT SUM(rain) FROM %s "
                     "WHERE dateTime>? AND dateTime<=?" % dbm.table_name,
                     (sts, ts))
    return val[0] if val is not None else None

def calc_rain_day(dbm, ts):
    sts = weeutil.weeutil.startOfDay(ts)
    val = dbm.getSql("SELECT SUM(rain) FROM %s "
                     "WHERE dateTime>? AND dateTime<=?" % dbm.table_name, 
                     (sts, ts))
    return val[0] if val is not None else None

def calc_ET_today(dbm, ts):
    sts = weeutil.weeutil.startOfDay(ts)
    val = dbm.getSql("SELECT SUM(ET) FROM %s "
                     "WHERE dateTime>? AND dateTime<=?" % dbm.table_name,
                     (sts, ts))
    return val[0] if val is not None else None

def calc_minmax(label, dbm, ts, minmax='MAX'):
    sts = weeutil.weeutil.startOfDay(ts)
    val = dbm.getSql("SELECT %s(%s) FROM %s "
                     "WHERE dateTime>? AND dateTime<=?" %
                     (minmax, label, dbm.table_name), (sts, ts))
    if val is None:
        return None, None
    t = dbm.getSql("SELECT dateTime FROM %s "
                   "WHERE dateTime>? AND dateTime<=? AND %s=?" %
                   (dbm.table_name, label), (sts, ts, val[0]))
    if t is None:
        return None, None
    tstr = time.strftime("%H:%M", time.localtime(t[0]))
    return val[0], tstr

def calc_is_daylight(alm):
    sunrise = alm.sunrise.raw
    sunset = alm.sunset.raw
    if sunrise < alm.time_ts < sunset:
        return 1
    return 0

def calc_daylight_hours(alm):
    sunrise = alm.sunrise.raw
    sunset = alm.sunset.raw
    if alm.time_ts <= sunrise:
        return 0
    elif alm.time_ts < sunset:
        return (alm.time_ts - sunrise) / 3600.0
    return (sunset - sunrise) / 3600.0

def calc_is_sunny(rad, max_rad, threshold):
    if not rad or not max_rad:
        return 0
    if rad <= threshold * max_rad:
        return 0
    return 1

# indication of sensor contact depens on the weather station.  if the station
# has more than one indicator, then indicate failure if contact is lost with
# any one of them.
#
# Vantage
#   packet['rxCheckPercent'] == 0
#
# FineOffset
#   packet['status'] & 0x40
#
# TE923
#   packet['sensorX_state'] == STATE_MISSING_LINK
#   packet['wind_state'] == STATE_MISSING_LINK
#   packet['rain_state'] == STATE_MISSING_LINK
#   packet['uv_state'] == STATE_MISSING_LINK
#
# WMR100
# WMR200
# WMR9x8
#
# WS28xx
#   packet['rxCheckPercent'] == 0
#
# WS23xx
#   packet['cn'] == 'lost'
#
def lost_sensor_contact(packet):
    if 'rxCheckPercent' in packet and packet['rxCheckPercent'] == 0:
        return 1
    if 'cn' in packet and packet['cn'] == 'lost':
        return 1
    if (('windspeed_state' in packet and packet['windspeed_state'] == 'no_link') or
        ('rain_state' in packet and packet['rain_state'] == 'no_link') or
        ('uv_state' in packet and packet['uv_state'] == 'no_link') or
        ('h_1_state' in packet and packet['h_1_state'] == 'no_link') or
        ('h_2_state' in packet and packet['h_2_state'] == 'no_link') or
        ('h_3_state' in packet and packet['h_3_state'] == 'no_link') or
        ('h_4_state' in packet and packet['h_4_state'] == 'no_link') or
        ('h_5_state' in packet and packet['h_5_state'] == 'no_link')):
        return 1
    return 0

def do_file_transfer(mode, rpath, conn, address, lpath, user):
    try:
        if mode == 'rsync':
            weeutil.rsyncupload.RsyncUpload(
                local_root=rpath if lpath == None else lpath,
                remote_root=rpath,
                server=address,
                user=user,
                port=None,
                ssh_options= None,
                compress=False,
                delete=False,
                log_success=True if weewx.debug >= 1 else False).run()
            logdbg("do_file_transfer: Rsync complete")
        elif mode == 'socket':
            with open(rpath, 'r') as f:
                conn.sendall(f.read())
    except IOError as e:
        logerr("do_file_transfer " + str(e))
    finally:
        try:
            if conn != None:
                conn.close()
        except Exception as e:
            logdbg("do_file_transfer " + str(e))

def do_rsync_transfer(webserver_addresses, rpath, lpath, user):
    if len(webserver_addresses) > 0:
        for web_address in webserver_addresses:
            threading.Thread(target=do_file_transfer, args=("rsync", rpath, None, socket.gethostbyname(web_address), lpath, user)).start()
             
def get_website_data(url, header, lfilename):
    try:
        response = urllib.urlopen(urllib.Request(url, None, header), timeout=10)
        try:
            with open(lfilename, 'w+') as file_handle:
                file_handle.write(str(response.read().decode('utf-8')))
        except Exception as err:
            logerr("Error writing web service file: %s, Error: %s" % (lfilename, err))
    except Exception as err:
        logerr("Failed getting web service data. URL: %s Header: %s, Error: %s" % (url, header, err))
    finally:
        try: response.close()
        except: pass

class ZambrettiForecast():
    DEFAULT_FORECAST_BINDING = 'forecast_binding'
    DEFAULT_BINDING_DICT = {
        'database': 'forecast_sqlite',
        'manager': 'weewx.manager.Manager',
        'table_name': 'archive',
        'schema': 'user.forecast.schema'}

    def __init__(self, config_dict):
        self.forecasting_installed = False
        self.db_max_tries = 3
        self.db_retry_wait = 3
        try:
            self.dbm_dict = weewx.manager.get_manager_dict(
                config_dict['DataBindings'],
                config_dict['Databases'],
                ZambrettiForecast.DEFAULT_FORECAST_BINDING,
                default_binding_dict=ZambrettiForecast.DEFAULT_BINDING_DICT)
            weewx.manager.open_manager(self.dbm_dict)
            self.forecasting_installed = True
        except (weedb.DatabaseError, weewx.UnsupportedFeature,
                weewx.UnknownBinding, KeyError):
            pass

    def is_installed(self):
        return self.forecasting_installed

    def get_zambretti_code(self):
        if not self.forecasting_installed:
            return 0

        # FIXME: add api to forecast instead of doing all the work here
        with weewx.manager.open_manager(self.dbm_dict) as dbm:
            sql = "select dateTime,zcode from %s where method = 'Zambretti' order by dateTime desc limit 1" % dbm.table_name
#            sql = "select zcode from %s where method = 'Zambretti' and dateTime = (select max(dateTime) from %s where method = 'Zambretti')" % (dbm.table_name, dbm.table_name)
            for count in range(self.db_max_tries):
                try:
                    record = dbm.getSql(sql)
                    if record is not None:
                        return ZambrettiForecast.alpha_to_number(record[1])
                except Exception as e:
                    logerr('get zambretti failed (attempt %d of %d): %s' %
                           ((count + 1), self.db_max_tries, e))
                    logdbg('waiting %d seconds before retry' %
                           self.db_retry_wait)
                    time.sleep(self.db_retry_wait)
        return 0

    # given a zambretti letter code A-Z, convert to digit 1-26
    @staticmethod
    def alpha_to_number(x):
        return ord(x) - 64
      
class ForecastData():    
    def __init__(self, config_dict, webserver_addresses):
        self.html_root = config_dict['StdReport']['Weather34Report'].get('HTML_ROOT', '')
        self.remote_html_root = config_dict['Weather34RealTime'].get('HTML_ROOT', self.html_root)
        if len(self.remote_html_root) == 0:
            self.remote_html_root = self.html_root
        self.webserver_addresses = webserver_addresses
        user = config_dict['StdReport']['RSYNC'].get('user', None) 
        settings_dict = config_dict.get('Weather34WebServices', {})
        if len(settings_dict) == 0:
            return
        services_str = settings_dict.get("services")
        if not services_str == None and len(services_str) > 0:
            try:
                thread = threading.Thread(target = self.monitor_webservices, args = (services_str, settings_dict, user))
                thread.daemon = True
                thread.start()
            except Exception as err:
                logerr("Failed to start monitor_webservices thread: Error: " + err)

    def monitor_webservices(self, services_str, settings_dict, user):
        try:
            self.webservices = services_str.split(".")
            first_time = True
            while True:
                time.sleep(60)
                while self.webservices:
                    service = self.webservices.pop(0)
                    url = settings_dict.get(service + "_url")
                    header = settings_dict.get(service + "_header", "User-Agent:Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_4; en-US) AppleWebKit/534.3 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/534.3").split(":")
                    header = {header[0]:":".join(header[1:])}
                    threading.Timer(60 if first_time else int(settings_dict.get(service + "_interval", "3600")), self.create_webservice_process, (service, url, header, user)).start()
                first_time = False
        except Exception as err:
            logerr("Failed to start service process: %s, Error: %s" % (service, err))
    
    def create_webservice_process(self, service, url, header, user):
        try:
            if url == None or header == None:
                logerr("Error Invalid Webservice Data: %s, %s" % (url, header))
                return
            if isinstance(url, list):
                url = ",".join(url)
            filename = os.path.join(self.html_root, "jsondata", service + ".txt")
            lfilename = filename if len(self.webserver_addresses) == 0 else os.path.join("/tmp/weather34/jsondata", os.path.basename(filename)) 
            if len(self.webserver_addresses) > 0  and not os.path.exists(os.path.dirname(lfilename)):
                os.mkdir(os.path.dirname(lfilename), 0o777)
            loginf("Web Service: %s is running" % (service,))
            get_website_data(url, header, lfilename)
            do_rsync_transfer(self.webserver_addresses, os.path.join(self.remote_html_root, "jsondata/"), os.path.dirname(lfilename), user)
        except:
            logerr("Failed to create webservice process: %s, Error: %s" % (service, err)) 
        finally:
            gc.collect()
            self.webservices.append(service)
        
class CloudCover():
    def __init__(self, weewx_dict):
        if weewx_dict.get('Weather34CloudCover').get('enable') != 'True':
            raise Exception("Not Enabled")
        self.cloud_cover_percent = 0.0
        try:
            self.cloud_field = weewx_dict.get('Weather34CloudCover').get('db_field')
            thread = threading.Thread(target = self.calculate_cloud_cover, args = (weewx_dict.get('Weather34CloudCover'),))
            thread.daemon = True
            thread.start()
            logdbg("CloudCover service has started")
        except Exception as err:
            raise Exception(err)

    def update_cloud_cover(self, event):
        try:
            event.record[self.cloud_field] = self.cloud_cover_percent
            logdbg("CloudCover: Percent value is " + str(self.cloud_cover_percent))
        except Exception as e:
            logerr("CloudCover: Cannot read value: %s" % e)
    
    def calculate_cloud_cover(self, settings_dict):
        try:
            url1 = settings_dict.get('cc1_url')
            parts = url1.split("=")
            lat = parts[2].split("&")[0]
            lon = parts[3].split("&")[0]
            url2 = settings_dict.get('cc2_url')
            file1 = "/tmp/weather34/sat1.png"
            file2 = "/tmp/weather34/sat2.png"
            time_interval = int(settings_dict.get('cc_interval', 600))
            logdbg("CloudCover Url 1 " + url1)
            logdbg("CloudCover Url 2 " + url2)
            logdbg("CloudCover File 1 " + file1)
            logdbg("CloudCover File 2 " + file2)
            while True:
                logdbg("CloudCover url1 exit code " + str(os.system("wget -r -O " + "'" + file1 + "'" + " '" + url1 + "'")))
                os.chmod(file1, 0o666)
                logdbg("CloudCover url2 exit code " + str(os.system("wget -r -O " + "'" + file2 + "'" + " '" + url2 + "'")))
                os.chmod(file2, 0o666)
                if os.stat(file1).st_size > 5000 and os.stat(file2).st_size > 5000:
                    alt = weewx.almanac.Almanac(time.time(), float(lat), float(lon)).sun.alt
                    pixarray = []
                    if alt > 5:
                        f = open(file1, 'rb')
                        im = Image.open(f)
                        xpos1 = 149
                        xpos2 = 155
                        ypos1 = 145
                        ypos2 = 155
                        min = 80
                        max = 250
                    else:
                        f = open(file2, 'rb')
                        im = Image.open(f)
                        xpos1 = 148
                        xpos2 = 152
                        ypos1 = 148
                        ypos2 = 152
                        min = 100
                        max = 250
                    pix = im.convert('L').load()
                    f.close()
                    for y in range(ypos1,ypos2):
                        for x in range(xpos1,xpos2):
                            pixarray.append(pix[x,y])
                    pixavg = sum(pixarray) / float(len(pixarray))
                    self.cloud_cover_percent = (pixavg - min)*100 / (max - min)
                    if self.cloud_cover_percent < 1:
                        self.cloud_cover_percent = 1
                    if self.cloud_cover_percent > 99:
                        self.cloud_cover_percent = 99
                    pix = None 
                time.sleep(time_interval)
        except Exception as e:
            logdbg("CloudCover:calculate_cloud_cover " + str(e))
               
class Webserver():
    def __init__(self, config_dict, webserver_addresses):
        self.webserver_addresses = webserver_addresses
        thread = threading.Thread(target=self.listen_data_requests, args=(int(config_dict['Weather34RealTime'].get('weewx_port', '25252')), config_dict['Weather34RealTime'].get('weewxserver_address', '')))
        thread.daemon = True
        thread.start()

    def listen_data_requests(self, port, host):
        #Wait for system startup before getting host ip address
        time.sleep(10)
        while True:
            try:
                if len(host) < 5:
                    host = socket.gethostbyname(socket.gethostname())
                    if host.startswith('127.'):
                        host = subprocess.check_output(['hostname', '-s', '-I']).split(b" ")[0].decode()
                else:
                    host = socket.gethostbyname(host)
                s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
                s.bind((host, port))
                s.listen(2)
                logdbg("Webserver: weewx host ip " + host + " listening on port " + str(port))
                break
            except:
                time.sleep(5)
        while True:
            try:
                conn, address = s.accept()
                webserver_address = str(address).split(",")[0][1:].replace("'","")
                if webserver_address != host:
                    self.webserver_addresses[webserver_address] = conn
                    logdbg("Webserver: webserver ip " + webserver_address)
                recv_data = conn.recv(256)
                if len(recv_data) > 0:
                    thread = threading.Thread(target=self.execute_report, args=(recv_data.split(" "), conn, webserver_address))
                    thread.daemon = True
                    thread.start()
                else:
                    conn.close();
            except Exception as e:
                if not "time" in str(e):
                    logdbg(e)
    
    def execute_report(self, args, conn, address):
        import weecfg
        import weewx.station
        import weewx.reportengine
        try:
            _config_path, config_dict = weecfg.read_config(None, None)
            ts = float(args[1])
            html_root = args[3]
            stn_info = weewx.station.StationInfo(**config_dict['Station'])
            save_entries = ["SKIN_ROOT","HTML_ROOT","RSYNC","data_binding","log_success","log_failure","w34Highcharts"]
            for key in config_dict['StdReport']:
                if key not in save_entries:
                    del config_dict['StdReport'][key]
            config_dict['StdReport']['w34Highcharts']['skin'] = 'w34Highcharts-day'
            config_dict['StdReport']['w34Highcharts']['CheetahGenerator'] =  {'search_list_extensions': 'user.w34highchartsSearchX.w34highcharts_' + args[2].split('/')[-1].split('.')[0], 'encoding': 'strict_ascii', 'ToDate': {'DayJSON': {'template': args[2],'HTML_ROOT': html_root}}}
            try:
                binding = config_dict['StdArchive']['data_binding']
            except KeyError:
                binding = 'wx_binding'
            with weewx.manager.DBBinder(config_dict) as db_binder:
                db_manager = db_binder.get_manager(binding)
                for _ in range(1500):
                    record = db_manager.getRecord(ts)
                    if record == None:
                        ts = ts + 60
                    else:
                        break;
                if record == None:
                    ts = db_manager.firstGoodStamp()
                    record = db_manager.getRecord(ts)
                weewx.reportengine.StdReportEngine(config_dict, stn_info, record=record, gen_ts=ts).run()
                logdbg("Webserver: Report complete")
                do_file_transfer(args[4], os.path.join(html_root,args[2].split(".tmpl")[0]), conn, address, None, config_dict['StdReport']['RSYNC'].get('user',None))
        except Exception as e:
            logerr("Webserver Error: " + str(e))
       
class Weather34RealTime(StdService):
    """Service retains previous loop packet values updating any value that isn't None from new
    packets. It then replaces the original packet with a new packet that contains all of the values; 
    the original unmodified packet will be stored on the event in a property named 'originalPacket'."""

    def __init__(self, engine, config_dict):
        super(Weather34RealTime, self).__init__(engine, config_dict)
        loginf("service version is %s" % VERSION)
        self.altitude_m = weewx.units.convert(engine.stn_info.altitude_vt, "meter")[0]
        self.latitude = engine.stn_info.latitude_f
        self.longitude = engine.stn_info.longitude_f
        self.config_dict = config_dict 
        self.html_root = config_dict['StdReport']['Weather34Report'].get('HTML_ROOT', '')
        self.remote_html_root = config_dict['Weather34RealTime'].get('HTML_ROOT', self.html_root)
        if len(self.remote_html_root) == 0:
            self.remote_html_root = self.html_root
        self.sunny_threshold = 0.75
        self.nonesub = 'NULL'
        loginf("'None' values will be displayed as %s" % self.nonesub)
        self.prev_archive_time = time.time()
        weewx_file_transfer = config_dict['Weather34RealTime'].get('weewx_file_transfer', '')
        weewxserver_ip = config_dict['Weather34RealTime'].get('weewxserver_address', '')
        if len(weewxserver_ip) == 0:
            weewxserver_ip = socket.gethostbyname(socket.gethostname())
        try:
            if weewxserver_ip.startswith('127.'):
                weewxserver_ip = subprocess.check_output(['hostname', '-s', '-I']).split(b" ")[0].decode()
        except:
            s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
            try:
                s.connect(('10.255.255.255', 1))
                weewxserver_ip = s.getsockname()[0]
            except:
                logerr("Cannot get local IP of weewx machine.")
            finally:
                s.close() 
        bin_path = os.path.dirname(os.path.realpath(__file__)).split("/user")[0]
        # source unit system is the database unit system
        self.db_us = None
        # initialise packet unit system
        self.pkt_us = None

        # get the unit system for display
        us = None
        us_label = config_dict['Weather34RealTime'].get('unit_system', None)
        if us_label is not None:
            if us_label in weewx.units.unit_constants:
                loginf("units will be displayed as %s" % us_label)
                us = weewx.units.unit_constants[us_label]
            else:
                logerr("unknown unit_system %s" % us_label)
        self.unit_system = us

        # get any overrides to the display units
        self.units = dict()
        for x in UNITS:
            ukey = '%s_units' % x
            if ukey in config_dict['Weather34RealTime']:
                if config_dict['Weather34RealTime'][ukey] in UNITS[x]:
                    loginf("%s units will be displayed as %s" % (x, config_dict['Weather34RealTime'][ukey]))
                    self.units[x] = config_dict['Weather34RealTime'][ukey]
                else:
                    logerr("unknown unit '%s' for %s" % (config_dict['Weather34RealTime'][ukey], ukey))

        # configure forecasting
        self.forecast = ZambrettiForecast(config_dict)
        loginf("zambretti forecast: %s" % self.forecast.is_installed())
    
        try:
            self.webserver_addresses = {}
            if len(self.webserver_addresses) == 0:
                addresses = config_dict['Weather34RealTime'].get('webserver_address')
                if len(addresses) > 0 and not isinstance(addresses,list):
                    addresses = [addresses]
                if len(addresses) > 0:
                    for address in addresses:
                        self.webserver_addresses[address] = 0
            if len(self.webserver_addresses) > 0 and len(weewx_file_transfer) < 5:
                weewx_file_transfer = 'rsync'
            self.webserver_addresses = Webserver(config_dict, self.webserver_addresses).webserver_addresses
        except Exception as e:
            logdbg("Weather34Realtime: Cannot get webserver addresses at startup due to error " + str(e))

        try:
            ForecastData(config_dict, self.webserver_addresses)
        except Exception as e:
            logerr(str(e))
        
        try:
            self.cc = CloudCover(self.config_dict)
        except Exception as e:
            self.cc = None
            loginf("CloudCover: not installed")
            logdbg("CloudCover: due to error " + str(e))

        try:
            self.chk_lightning_cnt = True if config_dict['Weather34RealTime'].get('chk_lightning_cnt') == 'True' else False; 
        except:
            self.chk_lightning_cnt = False

        try:
            self.cache_debug = True if config_dict['Weather34RealTime'].get('cache_debug') == 'True' else False; 
        except:
            self.cache_debug = False

        try:
            lfilename = os.path.join(self.html_root, "serverdata","weewxserverinfo.txt") if len(self.webserver_addresses) == 0 else '/tmp/weather34/serverdata/weewxserverinfo.txt'
            data = str(weewxserver_ip) + ":" + str(config_dict['Weather34RealTime'].get('weewx_port', '25252')) + ":" + weewx_file_transfer + ":" + bin_path
            if len(self.webserver_addresses) > 0 and not os.path.exists(os.path.dirname(lfilename)):
                os.mkdir(os.path.dirname(lfilename), 0o777)
            with open(lfilename, 'w') as f:
                f.write(data)
            do_rsync_transfer(self.webserver_addresses, os.path.join(self.remote_html_root, "serverdata/"), os.path.dirname(lfilename), self.config_dict['StdReport']['RSYNC'].get('user', None))
        except Exception as e:
            loginf("Cannot write to weewxserverinfo.txt due to error " + str(e))
        loginf("Check lightning Strike Count: " + str(self.chk_lightning_cnt))
        # setup caching
        self.cache_enable = False 
        self.cache_stale_time = 900
        self.cache_file = '/tmp/weather34/RetainedLoopValues.txt'
        self.retainedLoopValues = {}
        self.excludeFields = set([])
        if not os.path.exists(os.path.dirname(self.cache_file)):
            os.mkdir(os.path.dirname(self.cache_file), 0o777)
        if 'Weather34RealTime' in config_dict:
            if 'cache_enable' in config_dict['Weather34RealTime']:
                self.cache_enable = True if config_dict['Weather34RealTime'].get('cache_enable') == 'True' else False; 
            if 'cache_stale_time' in config_dict['Weather34RealTime']:
                self.cache_stale_time = int(config_dict['Weather34RealTime'].get('cache_stale_time')) 
            if 'cache_directory' in config_dict['Weather34RealTime']:
                path = config_dict['Weather34RealTime'].get('cache_directory') 
                if os.path.isdir(path):
                    self.cache_file = os.path.join(path, 'Weather34RealTimeRetainedLoopValues.txt')
                else:
                    logerr('Invalid cache_directory using default location tmp/weather34')	
            if 'exclude_fields' in config_dict['Weather34RealTime']:
                self.excludeFields = set(weeutil.weeutil.option_as_list(config_dict['Weather34RealTime'].get('exclude_fields', [])))
                logdbg("excluding fields: %s" % (self.excludeFields,))
        loginf("Weather34 Weather34RealTime in cache is: %s" % self.cache_enable)

        # configure the binding
        self.bind(weewx.NEW_ARCHIVE_RECORD, self.handle_new_archive)
        self.bind(weewx.NEW_LOOP_PACKET, self.handle_new_loop)

    def handle_new_archive(self, event):
        if self.prev_archive_time + 50 < time.time():
            self.prev_archive_time = time.time()
            do_rsync_transfer(self.webserver_addresses, os.path.join(self.remote_html_root, "w34Highcharts", "json/"), os.path.join(self.config_dict['StdReport']['w34Highcharts'].get('HTML_ROOT'), 'json/'), self.config_dict['StdReport']['RSYNC'].get('user', None))
            do_rsync_transfer(self.webserver_addresses, os.path.join(self.remote_html_root, "serverdata/"), os.path.join(self.config_dict['StdReport']['Weather34Report'].get('HTML_ROOT'), 'serverdata/') if len(self.webserver_addresses) == 0 else '/tmp/weather34/serverdata/', self.config_dict['StdReport']['RSYNC'].get('user', None))
        if self.cc != None:
            self.cc.update_cloud_cover(event)

    def handle_new_loop(self, event):
        if self.cache_enable:
            self.newLoopPacket(event)
        self.handle_data(event.packet)

    def newLoopPacket(self, event):
        if self.retainedLoopValues == None or len(self.retainedLoopValues) == 0:
            try:
                if (time.time() - os.path.getmtime(self.cache_file)) < self.cache_stale_time: 
                    with open(self.cache_file, 'r') as in_file:
                        self.retainedLoopValues = eval(in_file.read())
                else:
                    loginf("Cache values not use since they are past the sell by date")	
            except Exception as e:
                logerr(str(e))	
        #event.originalPacket = event.packet
        if self.cache_debug:
            logdbg("Event packet before: %s" % (event.packet,))
        # replace the values in the retained packet if they have a value other than None or the field is listed in excludeFields
        self.retainedLoopValues.update( dict((k,v) for k,v in event.packet.items() if (v is not None or k in self.excludeFields)) )
        # if the new packet doesn't contain one of the excludeFields then remove it from the retainedLoopValues
        for k in self.excludeFields - set(event.packet.keys()):
            if k in self.retainedLoopValues:
                self.retainedLoopValues.pop(k)
        event.packet = self.retainedLoopValues.copy()
        try:
            with open(self.cache_file, 'w') as out_file:
                out_file.write(str(self.retainedLoopValues))
        except Exception as e:
            logerr(str(e))	
        if self.chk_lightning_cnt and event.packet['lightning_strike_count'] == 0:
            event.packet['lightning_distance'] = None
            event.packet['lightning_energy'] = None
        if self.cache_debug:
            logdbg("Event packet after: %s" % (event.packet,))

    def handle_data(self, event_data):
        try:
            dbm = self.engine.db_binder.get_manager('wx_binding')
            data = self.calculate(event_data, dbm)
            self.write_data(data)
        except Exception as e:
            logdbg("w34rt: Exception while handling data: %s" % e)
            weeutil.weeutil.log_traceback('crt: **** ')
            raise

    def write_data(self, data):
        data = self.create_realtime_string(data)
        try:
            lfilename = os.path.join(self.html_root, "serverdata", "w34realtime.txt") if len(self.webserver_addresses) == 0 else "/tmp/weather34/serverdata/w34realtime.txt"
            if len(self.webserver_addresses) > 0  and not os.path.exists(os.path.dirname(lfilename)):
                os.mkdir(os.path.dirname(lfilename), 0o777)
            with open(lfilename, 'w') as f:
                f.write(data + "\n")
            do_rsync_transfer(self.webserver_addresses, os.path.join(self.remote_html_root, "serverdata/"), os.path.dirname(lfilename), self.config_dict['StdReport']['RSYNC'].get('user', None))
        except Exception as err:
            logerr("Error writing file: Error: %s" % (err,))

    # convert from database unit system to specified units
    def _cvt(self, from_v, to_units, obs, group):
        if self.db_us is None:
            return None
        return _convert_us(from_v, self.db_us, to_units, obs, group)

    # convert from database unit system to specified unit system
    def _cvt_us(self, from_v, to_us, obs, group):
        to_units = weewx.units.getStandardUnitType(to_us, obs)[0]
        return self._cvt(from_v, to_units, obs, group)

    # convert observation in group pressure
    def _cvt_p(self, obs, packet, unit):
        return _convert_us(packet.get(obs), self.pkt_us, unit, 
                           obs, 'group_pressure')

    # convert observation in group temperature
    def _cvt_t(self, obs, packet, unit):
        return _convert_us(packet.get(obs), self.pkt_us, unit, 
                           obs, 'group_temperature')

    # convert observation in group rainrate
    def _cvt_rr(self, obs, packet, unit):
        return _convert_us(packet.get(obs), self.pkt_us, unit, 
                           obs, 'group_rainrate')

    # convert observation in group speed
    def _cvt_w(self, obs, packet, unit):
        return _convert_us(packet.get(obs), self.pkt_us, unit, 
                           obs, 'group_speed')

    # convert observation group altitude
    def _cvt_a(self, obs, packet, unit):
        return _convert_us(packet.get(obs), self.pkt_us, unit, 
                           obs, 'group_altitude')

    # calculate the data elements that that weewx does not provide directly.
    def calculate(self, packet, dbm):
        ts = packet.get('dateTime')

        # the 'from' unit system is whatever the database is using.  get it
        # from the database once then cache it for use in conversions.  if
        # there is not yet a database, return an empty dict and we'll get it
        # the next time around.
        if self.db_us is None:
            try:
                self.db_us = get_db_units(dbm)
            except weedb.DatabaseError as e:
                logerr("cannot determine database units: %s" % e)
                return dict()

        # the 'to' unit system defaults to the unit system of the packet
        # (typically the same unit system as the database, but it might not
        # be), but if a different unit system is specified, use that...
        self.pkt_us = packet.get('usUnits')
        if self.unit_system is not None and self.unit_system != self.pkt_us:
            packet = weewx.units.to_std_system(packet, self.unit_system)
            self.pkt_us = self.unit_system

        # ... then get any other specialized units.
        p_u = self.units.get(
            'pressure',
            weewx.units.getStandardUnitType(self.pkt_us, 'barometer')[0])
        t_u = self.units.get(
            'temperature',
            weewx.units.getStandardUnitType(self.pkt_us, 'outTemp')[0])
        r_u = self.units.get(
            'rain',
            weewx.units.getStandardUnitType(self.pkt_us, 'rain')[0])
        w_u = self.units.get(
            'wind',
            weewx.units.getStandardUnitType(self.pkt_us, 'windSpeed')[0])
        cb_u = self.units.get(
            'cloudbase',
            weewx.units.getStandardUnitType(self.pkt_us, 'altitude')[0])

        # weather34 does not use cm for rain, but weewx might
        if r_u == 'cm':
            r_u = 'mm'
        # infer rain rate units from rain units
        rr_u = '%s_per_hour' % r_u
        # infer windrun units from wind units
        wr_u = SPEED_TO_RUN.get(w_u, 'mile')

        # now create the dictionary of data
        data = dict(packet)
        data['units_wind'] = UNITS_WIND.get(w_u, w_u)
        data['units_temperature'] = UNITS_TEMP.get(t_u, t_u)
        data['units_pressure'] = UNITS_PRES.get(p_u, p_u)
        data['units_rain'] = UNITS_RAIN.get(r_u, r_u)
        data['units_cloudbase'] = UNITS_CLOUDBASE.get(cb_u, cb_u)

        data['barometer'] = self._cvt_p('barometer', packet, p_u)
        data['inTemp'] = self._cvt_t('inTemp', packet, t_u)
        data['outTemp'] = self._cvt_t('outTemp', packet, t_u)
        data['dewpoint'] = self._cvt_t('dewpoint', packet, t_u)
        data['heatindex'] = self._cvt_t('heatindex', packet, t_u)
        data['humidex'] = self._cvt_t('humidex', packet, t_u)
        data['windchill'] = self._cvt_t('windchill', packet, t_u)
        data['appTemp'] = self._cvt_t('appTemp', packet, t_u)
        data['windSpeed'] = self._cvt_w('windSpeed', packet, w_u)
        data['rainRate'] = self._cvt_rr('rainRate', packet, rr_u)
        data['weather34_windDir'] = clamp_degrees(packet.get('windDir'))
        data['windDir_compass'] = degree_to_compass(packet.get('windDir'))
        data['windSpeed_avg'] = self._cvt(
            calc_avg_windspeed(dbm, ts), w_u, 'windSpeed', 'group_speed')
        v = _convert_us(packet.get('windSpeed'), self.pkt_us, 'knot',
                        'windSpeed', 'group_speed')
        data['windSpeed_beaufort'] = weewx.wxformulas.beaufort(v)
        wr = calc_windrun(dbm, ts, self.db_us)
        data['windrun'] = self._cvt(wr, wr_u, 'windrun', 'group_distance')
        # weewx does not know of nautical miles so if wind speed units are knot
        # then we have a windrun in miles and we need to manually convert it to
        # nautical miles
        if w_u == 'knot' and data['windrun'] is not None:
            data['windrun'] /= 1.15077945
        data['cloudbase'] = self._cvt_a('cloudbase', packet, cb_u)
        p1 = packet.get('barometer')
        p2 = get_trend('barometer', dbm, ts)
        p2 = self._cvt_us(p2, self.pkt_us, 'barometer', 'group_pressure')
        data['pressure_trend'] = calc_trend(p1, p2)
        t1 = packet.get('outTemp')
        t2 = get_trend('outTemp', dbm, ts)
        t2 = self._cvt_us(t2, self.pkt_us, 'outTemp', 'group_temperature')
        data['temperature_trend'] = calc_trend(t1, t2)

        data['rain_month'] = self._cvt(
            calc_rain_month(dbm, ts), r_u, 'rain', 'group_rain')
        data['rain_year'] = self._cvt(
            calc_rain_year(dbm, ts), r_u, 'rain', 'group_rain')
        data['rain_yesterday'] = self._cvt(
            calc_rain_yesterday(dbm, ts), r_u, 'rain', 'group_rain')
        data['dayRain'] = self._cvt(
            calc_rain_day(dbm, ts), r_u, 'rain', 'group_rain')

        v, t = calc_minmax('outTemp', dbm, ts, 'MAX')
        data['outTemp_max'] = self._cvt(
            v, t_u, 'outTemp', 'group_temperature')
        data['outTemp_max_time'] = t
        v, t = calc_minmax('outTemp', dbm, ts, 'MIN')
        data['outTemp_min'] = self._cvt(
            v, t_u, 'outTemp', 'group_temperature')
        data['outTemp_min_time'] = t
        v, t = calc_minmax('barometer', dbm, ts, 'MAX')
        data['pressure_max'] = self._cvt(
            v, p_u, 'barometer', 'group_pressure')
        data['pressure_max_time'] = t
        v, t = calc_minmax('barometer', dbm, ts, 'MIN')
        data['pressure_min'] = self._cvt(
            v, p_u, 'barometer', 'group_pressure')
        data['pressure_min_time'] = t
        v, t = calc_minmax('windSpeed', dbm, ts, 'MAX')
        data['windSpeed_max'] = self._cvt(
            v, w_u, 'windSpeed', 'group_speed')
        data['windSpeed_max_time'] = t
        v, t = calc_minmax('windGust', dbm, ts, 'MAX')
        data['windGust_max'] = self._cvt(
            v, w_u, 'windGust', 'group_speed')
        data['windGust_max_time'] = t

        data['10min_high_gust'] = self._cvt(
            calc_max_gust_10min(dbm, ts), w_u, 'windSpeed', 'group_speed')

        data['10min_avg_gust'] = self._cvt(
            calc_avg_gust_10min(dbm, ts), w_u, 'windSpeed', 'group_speed')

        data['10min_avg_wind_bearing'] = calc_avg_winddir_10min(dbm, ts)
        data['avg_wind_dir'] = degree_to_compass(v)

        data['rain_hour'] = self._cvt(
            calc_rain_hour(dbm, ts), r_u, 'rain', 'group_rain')

        data['ET_today'] = calc_ET_today(dbm, ts)
        data['lost_sensors_contact'] = lost_sensor_contact(packet)

        t_C = _convert_us(packet.get('outTemp'), self.pkt_us, 'degree_C',
                          'outTemp', 'group_temperature')
        p_mbar = _convert_us(packet.get('barometer'), self.pkt_us, 'mbar',
                             'barometer', 'group_pressure')
        alm = weewx.almanac.Almanac(ts, self.latitude, self.longitude,
                                    self.altitude_m, t_C, p_mbar)
        data['is_daylight'] = calc_is_daylight(alm)
        data['sunshine_hours'] = calc_daylight_hours(alm)
        data['is_sunny'] = calc_is_sunny(data.get('radiation'),
                                         data.get('max_rad'),
                                         self.sunny_threshold)
        data['zambretti_code'] = self.forecast.get_zambretti_code()
        return data

    def format(self, data, label, places=None):
        value = data.get(label)
        if value is None:
            value = self.nonesub
        elif places is not None:
            try:
                v = float(value)
                fmt = "%%.%df" % places
                value = fmt % v
            except ValueError:
                pass
        return str(value)

    # the * indicates a field that is not part of a typical LOOP packet
    # the ## indicates calculation is not yet implemented
    def create_realtime_string(self, data):
        fields = []
        p_dp = 2 if data['units_pressure'] == 'in' else 1
        r_dp = 2 if data['units_rain'] == 'in' else 1
        datefmt = "%%d%s%%m%s%%y" % ("/", "/")
        tstr = time.strftime(datefmt, time.localtime(data['dateTime']))
        fields.append(tstr)                                           # 1
        tstr = time.strftime("%H:%M:%S", time.localtime(data['dateTime']))
        fields.append(tstr)                                           # 2
        fields.append(self.format(data, 'outTemp', 1))                # 3
        fields.append(self.format(data, 'outHumidity', 0))            # 4
        fields.append(self.format(data, 'dewpoint', 1))               # 5
        fields.append(self.format(data, 'windSpeed_avg', 1))          # 6  *
        fields.append(self.format(data, 'windSpeed', 1))              # 7
        fields.append(self.format(data, 'weather34_windDir', 0))      # 8
        fields.append(self.format(data, 'rainRate', r_dp))            # 9
        fields.append(self.format(data, 'dayRain', r_dp))             # 10
        fields.append(self.format(data, 'barometer', p_dp))           # 11
        fields.append(self.format(data, 'windDir_compass'))           # 12 *
        fields.append(self.format(data, 'windSpeed_beaufort'))        # 13 *
        fields.append(self.format(data, 'units_wind'))                # 14 *
        fields.append(self.format(data, 'units_temperature'))         # 15 *
        fields.append(self.format(data, 'units_pressure'))            # 16 *
        fields.append(self.format(data, 'units_rain'))                # 17 *
        fields.append(self.format(data, 'windrun', 1))                # 18 *
        fields.append(self.format(data, 'pressure_trend', p_dp))      # 19 *
        fields.append(self.format(data, 'rain_month', r_dp))          # 20 *
        fields.append(self.format(data, 'rain_year', r_dp))           # 21 *
        fields.append(self.format(data, 'rain_yesterday', r_dp))      # 22 *
        fields.append(self.format(data, 'inTemp', 1))                 # 23
        fields.append(self.format(data, 'inHumidity', 0))             # 24
        fields.append(self.format(data, 'windchill', 1))              # 25
        fields.append(self.format(data, 'temperature_trend', 1))      # 26 *
        fields.append(self.format(data, 'outTemp_max', 1))            # 27 *
        fields.append(self.format(data, 'outTemp_max_time'))          # 28 *
        fields.append(self.format(data, 'outTemp_min', 1))            # 29 *
        fields.append(self.format(data, 'outTemp_min_time'))          # 30 *
        fields.append(self.format(data, 'windSpeed_max', 1))          # 31 *
        fields.append(self.format(data, 'windSpeed_max_time'))        # 32 *
        fields.append(self.format(data, 'windGust_max', 1))           # 33 *
        fields.append(self.format(data, 'windGust_max_time'))         # 34 *
        fields.append(self.format(data, 'pressure_max', p_dp))        # 35 *
        fields.append(self.format(data, 'pressure_max_time'))         # 36 *
        fields.append(self.format(data, 'pressure_min', p_dp))        # 37 *
        fields.append(self.format(data, 'pressure_min_time'))         # 38 *
        fields.append('%s' % weewx.__version__)                       # 39
        fields.append('0')                                            # 40
        fields.append(self.format(data, '10min_high_gust', 1))        # 41 *
        fields.append(self.format(data, 'heatindex', 1))              # 42 *
        fields.append(self.format(data, 'humidex', 1))                # 43 *
        fields.append(self.format(data, 'UV', 1))                     # 44
        fields.append(self.format(data, 'ET_today', r_dp))            # 45 *
        fields.append(self.format(data, 'radiation', 0))              # 46
        fields.append(self.format(data, '10min_avg_wind_bearing', 0)) # 47 *
        fields.append(self.format(data, 'rain_hour', r_dp))           # 48 *
        fields.append(self.format(data, 'zambretti_code'))            # 49 *
        fields.append(self.format(data, 'is_daylight'))               # 50 *
        fields.append(self.format(data, 'lost_sensors_contact'))      # 51 *
        fields.append(self.format(data, 'avg_wind_dir'))              # 52 *
        fields.append(self.format(data, 'cloudbase', 0))              # 53 *
        fields.append(self.format(data, 'units_cloudbase'))           # 54 *
        fields.append(self.format(data, 'appTemp', 1))                # 55 *
        fields.append(self.format(data, 'sunshine_hours', 1))         # 56 *
        fields.append(self.format(data, 'maxSolarRad', 1))            # 57
        fields.append(self.format(data, 'lightning_distance'))        # 58 *
        fields.append(self.format(data, 'lightning_energy'))          # 59 *
        fields.append(self.format(data, 'lightning_strike_count'))    # 60 *
        fields.append(self.format(data, 'lightning_noise_count'))     # 61 *
        fields.append(self.format(data, 'lightning_disturber_count')) # 62 *
        fields.append(self.format(data, '10min_avg_gust', 1))         # 63 *
        return ' '.join(fields)
      
      
class CachedValues(object):
    """Dictionary of value-timestamp pairs.  Each timestamp indicates when the
    corresponding value was last updated."""

    def __init__(self):
        self.unit_system = None
        self.values = dict()

    def update(self, packet, ts):
        # update the cache with values from the specified packet, using the
        # specified timestamp.
        for k in packet:
            if k is None:
                # well-formed packets do not have None as key, but just in case
                continue
            elif k == 'dateTime':
                # do not cache the timestamp
                continue
            elif k == 'usUnits':
                # assume unit system of first packet, then enforce consistency
                if self.unit_system is None:
                    self.unit_system = packet['usUnits']
                elif packet['usUnits'] != self.unit_system:
                    raise ValueError("Mixed units encountered in cache. %s vs %s" % \
                                     (self.unit_sytem, packet['usUnits']))
            elif packet[k] is None:
                # FIXME: the cache should not check for values of None.
                # however, if we blindly accept None as a possible value, then
                # any partial packet will break the cache.  the fix probably
                # requires changes to the StdWXCalculate service and the
                # drivers themselves.  if a driver knows a sensor has a bad
                # value, only then it should use a value of None.  if a driver
                # sends partial packets, it should send only the observed
                # values, not a full packet with None in the unobserved fields.
                # similarly for calculate service.  if the service does not
                # have all the inputs for a given derived, it should not insert
                # a derived with value of None.  it should insert a value of
                # None only if all the inputs exist and the result is None.
                continue
            else:
                # cache each value, associating it with the it was cached
                self.values[k] = {'value': packet[k], 'ts': ts}

    def get_value(self, k, ts, stale_age):
        # get the value for the specified key.  if the value is older than
        # stale_age (seconds) then return None.
        if k in self.values and ts - self.values[k]['ts'] < stale_age:
            return self.values[k]['value']
        return None

    def get_packet(self, ts=None, stale_age=960):
        if ts is None:
            ts = int(time.time() + 0.5)
        pkt = {'dateTime': ts, 'usUnits': self.unit_system}
        for k in self.values:
            pkt[k] = self.get_value(k, ts, stale_age)
        return pkt

