#!/usr/bin/env python
# -*- coding: utf-8 -*-

from datetime import date  
from math import radians as rad, degrees as deg
from ephem import Sun, Observer, pi, hours
import datetime
import pytz
import ephem
import json

# 1. Please change the timezone to your own location !
target_time_zone = pytz.timezone('Europe/London') # timezone
t = datetime.datetime.now(target_time_zone).replace(microsecond = 0) # used to calculate solar time, lunar time

# 2. Please change these four items to your own location !
# this is for the text output next to the Astroclock :-)
location = 'Steeple Claydon, UK' # keep your location name short like two words, it's not good if you live here ==> "Llanfairpwllgwyngyllgogerychwyrndrobwllllantysiliogogogoch"  North Wales ! :-)
latitude = '51.940'
longitude = '-0.987'
elevation = '110'


home = ephem.Observer()

# 3. Please change these three items to your own location !
home.lat = rad(51.06728920273504)   
home.long = rad(13.767345965293318) 
home.elevation = 120.81746673583984

# Please do not change anything below this line and go directly to the bottom of the script to change the export path !
home.pressure = 1010
home.temperature = 20
home.horizon = '0:00'
ra, dec = home.radec_of('0', '-90')

moon = ephem.Moon() # used for Lunar time
moon.compute(t)

sun = ephem.Sun() # used for Solar time
sun.compute(t)

solstice = str(ephem.next_solstice(t))
equinox = str(ephem.next_equinox(t))

# Solar time
stime = json.dumps(str(hours((ra - sun.ra) % (2 * pi)))).strip('\"')
# Lunar time
mtime = json.dumps(str(hours((ra - moon.ra) % (2 * pi)))).strip('\"')

sun = ephem.Sun()
sun.compute(home)
sun_alt = json.dumps(deg(sun.alt))
    
sun = ephem.Sun()
sun.compute(home)
hours_arc = json.dumps((sun.ha) % 360)     

moon = ephem.Moon()
moon.compute(home)
hourMoon = json.dumps(deg(moon.ha))

moon = ephem.Moon()
moon.compute(home)
moonphase = json.dumps(moon.phase)

sun = ephem.Sun()
sun.compute(home)
hourSun = json.dumps((deg(sun.ha) + 180) % 360)     

sun = ephem.Sun()
sun.compute(home)
lmst = json.dumps((deg(sun.ha) / 15) + deg(sun.ra) / 15)       

sun = ephem.Sun()
sun.compute(home)
lmst = (deg(sun.ha) / 15) + (deg(sun.ra) / 15) 

Lha = (lmst * 15) - 90

hourAries = json.dumps(rad(Lha))



astroclock = [

	{"astroclock": {"Sunalt": sun_alt, "hoursarc": hours_arc, "hourmoon": hourMoon, "hoursun": hourSun, "Lmst": lmst, "hourAries": hourAries, "SolarTime": stime, "LunarTime": mtime, "Moonphase": moonphase, "Solstice": solstice, "Equinox": equinox, "Location": location, "Latitude": latitude, "Longitude": longitude, "Elevation": elevation }}

]

print(astroclock)

# 4. Please change the export path to suit your own server path !
with open("/var/www/html/weather34/jsondata/astroclock.json", "w", encoding ='utf8') as f:
	json.dump(astroclock, f)
f.close()
