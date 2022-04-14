# Highcharts for Weather34 (requires WeeWX 3.9.2 or later)

Credits: -

Gary (gjr80) whose WeeWX Highcharts extension (https://github.com/gjr80/weewx-highcharts) provided motivation and a start point for this project.
            
Jerry Dietrich who did 99% of the heavy lifting by engaging and volunteering his ideas, vision and coding skill at an early stage of this project. This project would certainly not have reached this point without his massive input. Thank you Jerry.

This repository contains the instructions and code to enable Highcharts to be used with the WeeWX version of Weather34 skin as an alternative to the default CanvasJS.

The following charts have been created: - Temperature, Humidity, Dewpoint, Temp/Hum/Dew, Indoor Temp, Windchill/HeatIndex, Barometer, Wind Speed, Wind Direction, Windrose, Wind Speed/Wind Gust/Wind Direction, UV, Radiation, Radiation/UV, Rainfall, Rainfall Monthly, Luminosity, Lightning, Barometer/Temp/Wind.

Most charts have both weekly (1hour, 6hours, 12hours, 24hours, 36hours and 7days) and yearly (1day, 1week, 1month, 6months and 1year) spans. Please note, the 6month button is only functional when there is at least 6 months data in the database.

The following charts have radial views: Temp, Dewpoint, Humidity, Barometer, Indoor, Derived, Wind Speed

Most charts can change from yearly to weekly to daily by clicking the "hook point" on the graph. If there is no hook point then that chart cannot change. For example Windrose chart does not switch.

Different dates can be compared with some charts. If there is a compare dates option in the menu dropdown (context menu, top right) then choosing this option will display a chart that compares the two dates in the From and To fields of the chart.

Charts can be reloaded by choosing the reload option in the context menu.

Some charts can have realtime updates by choosing the realtime update option in the context menu.

Some charts can be display as radial charts by choosing the radial chart option in the context menu.

Most charts can be automatically updated at a 1 minute interval by choosing the Auto Update option in the context menu.

Changing the dates in From and To fields will change what is displayed based on what the span is. Most useful when displaying charts with yearly spans

Holding the left mouse down allows the chart to be scrolled left to right within the chosen span. Using this feature with the zoom selector allows a user to drill down into the chart.

# Setup Instructions for Weather34 Highcharts Option

1. You must select the 'w34highcharts' option for the WeeWX Chart Data field in the Weather34 settings page.
2. Setting the correct paths. Go to 'w34highcharts/scripts' in the root of your WX-HWS installation and edit the file 'plots_config.js'. The path settings are in the first few lines: -

        var pathweewx = '/weewx/'             //Path from web server home location to weewx directory
        var pathpws   = '/weather34/'               //Path from web server home location to weather34 directory
        var pathweewxbin ='/home/weewx/bin'  //Physical path to weewx include files for wee_report_w34 if setup.py installed WeeWX
        //var pathweewxbin ='/usr/share/weewx'  //Physical path to weewx include files for wee_report_w34 if DEB installed WeeWX

        var realtimefile =  pathweewx   + "w34realtime.txt";    //Location of real-time data from web server
        var pathjsonfiles = pathpws + "w34highcharts/json/";                    //Location weewx report output json files from home             location of weewx. DO NOT CHANGE UNLESS YOU CHANGE SKIN DIRECTORY.

        var dayplotsurl =   pathpws   + "w34highcharts/getDayChart.php"; //Location of day reports php file from home location of pws.
        var pathjsondayfiles = "json_day/";                         //Location day report output json files from home location of where         wee_report_34 run. DO NOT CHANGE UNLESS YOU CHANGE SKIN DIRECTORY.
        var weereportcmd = "./wee_reports_w34";                     //Command to run wee_report_34. DO NOT CHANGE.
        
Ensure that these paths are correct for your installation.        

3. Finally make sure that you have ownership of your weather34 root folder and it contents. From the command line: -

            sudo chown username:www-data -R /your_path_to_weather34_root_folder. 
            (as an example sudo chown www-data:www-data -R /var/www/html)
            
4. Re-start WeeWX. Wait for the first archive period to elapse. Additional folders 'json' and 'json_day' should now have been created in the 'w34highcharts folder'. These contain the day, week and year json data files which are updated every archive period and the json_day files which are updated when you click through data points on the charts. Please note that the json_day/day report feature is not currently available with a local WeeWX remote webserver setup.
5. Open your website page and click on any of the chart links and a new chart will be displayed.
6. You will find additional controls which allows you change the time frame and zoom-in on data etc. 
7. Apart from the many features metioned earlier, the context menu (button top right in each chart) allows the charts to be displayed full screen, printed or saved.
            
8. You will notice that not all of the available charts are represented in the links on the alternative index page. If you wish to add or change the links the following format must be used, where '[chart_ID]' is the name of the chart e.g. 'humidityplot and '[time_frame]' is either 'weekly' or 'yearly': -

            href="<?php echo $chartsource;?>/highcharts.html?chart='[chart_ID]'&span='[time_frame]'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" data-lity >
            
# Further Details for Weather34 Highcharts Option

On a normal setup (WeeWX and webserver on the same machine) the getDayChart.php code uses the info found in weewxserverinfo.txt (located in the weewx directory) to establish a socket connection to weather34.py to send the modified WeeWX config file along with a timestamp so that the WeeWX report engine can generate the report and write it to the json_day folder.

If the socket connection fails the the getDayChart.php code uses the location of the weewx system found in weewxserverinfo.txt to set the pythonpath and then run w34_reports. In this case weather34.py is not used, but the output follows the same path as before.

If weewxserverinfo.txt is not there then the php falls back to hardcoded WeeWX paths in the getDayChart.php to execute w34_reports.  If WeeWX is still not found the errors are logged in the webserver log file.

As a side note the w34_reports command is always logged into the webserver error log for reference. This is why next to the syslog log this is the most important log followed by the browser console log.

If using a remote webserver then the setup is different and now rsync needs to be used since the python path will not work and the file w34_reports is a noop now and weather34.py is the only path.

The user must setup keys and the transfer in the WeeWX config to to rsync for any transfers to work from a WeeWX server to a remote webserver.

Note in the plots_config.js you can turn off all day plots using the info  var disable_day_plots = false; //Disable day plots by changing this setting to true. This is useful to suppress pop-up error messages when the configuration is unable to use day plots. 

To summarise there are multiple ways for day plots to work with local setups, with each level down getting a little more brittle. With remote machines there is only one way and everything must be setup correctly.

Any problems, please raise an Issue in this repository attaching a debug report (see here for details http://www.weewx.com/docs/utilities.htm#wee_debug_utility), your skin.conf files and a syslog tail report covering at least two archive cycles from startup.

