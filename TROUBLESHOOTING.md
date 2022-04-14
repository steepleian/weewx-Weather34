# Troubleshooting Guide

* Issues can be submitted here https://github.com/steepleian/weewx-Weather34/issues

* Before sumitting a new issue, please look through the open and closed issue logs to see if there is previous history of the problem you encountered.
* When submitting an issue it will help us to deal with your problem more quickly if you can supply the following information and run the listed procedures: -
* Make sure you have rebooted the machine running weewx and the machine running your webserver (if your webserver machine is different than your weewx machine).
        
    1. Is your WeeWX installation and webserver on the same machine?

    2. cd to your w34highcharts/scripts folder and run     cat plots_config.js
    
    3. run     cat /var/log/syslog | grep weewx
    
    4. run cat on  your webserver error log
  
    5. cd to your webserver /weewx folder and run      ls -l weather34
    
    6. cd to your /weather34 folder and run     ls -lR w34highcharts
    
    7. run     ls -l /home/weewx/bin    (or      ls -l /usr/share/weewx     or     ls -l /Users/Shared/weewx/bin/     depending on your WeeWX setup)
    
    8. cd to your /skins folder and run    ls -lR "\*34\*"
        
    9. run     ./wee_debug --output    This will generate weewx.debug report which includes weewx.conf with all sensitive information like passwords and keys removed. The default location for the output is /var/tmp/weewx.debug. More details can be found here http://www.weewx.com/docs/utilities.htm#wee_debug_utility

   10. need error console output from your browser  

    There is no need to save the various outputs to a file, just cut and paste each one in to seperate issue log comment windows indicating the type of output. 
        
* Remember Github is all about collaboration. Be precise as possible in the issues you raise or respond to. By being open and transparent we help each other to help ourselves.