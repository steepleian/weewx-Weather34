# Installation Guide

**The installer now defaults to overwrite mode, settings1.php will not be overwritten as it does not exist in the package. However, it is essential that any customisations you may have been made are backed up before running the install.**

IMPORTANT. If you are making a completley clean install of WeeWX and Weather34 Template it is strongly recommended that you allow the WeeWX database to establish itself for 24hours before attempting installing the template.

This installation guide assumes that you are already reasonably familiar with WeeWX and that it is already installed on your computer along with a webserver, php and curl.

If you have not already done so, you must update your WeeWX installation to version 4.6.0 or later. This is required to facillitate nested copying during the skin install process. Follow the various installation type links on this page http://weewx.com/docs/usersguide.htm#installation_methods for instructions on updating. This version of Weather34 is compatible with WeeWX 4.6.0/Python3.x.

If you have not already done so update your WeeWX database to the wview_extended.schema (standard from WeeWX 4 onwards). Follow the directions in the section *Adding a new type to the database* (https://www.weewx.com/docs/customizing.htm#add_archive_type), except skip step #1 and in step #2, specify *schemas.wview_extended.schema* as the schema. 

If you are carrying out a fresh install of WeeWX, my own personal preference is to use the setup.py method (http://www.weewx.com/docs/setup.htm). However, this increases the chances of requiring more path edits in the configuration files. Alternatively use one of the dedicated packaged installs (http://weewx.com/docs/debian.htm, http://weewx.com/docs/redhat.htm, http://weewx.com/docs/suse.htm or http://weewx.com/docs/macos.htm).

* Please familiarise yourself with the location of your WeeWX system files inhttp://weewx.com/docs/cluding your bin/user folder, skins folder and weewx.conf file. If you are unsure where to find these, please refer to the installation processes here: - http://www.weewx.com/docs/setup.htm which shows various WeeWX installation scenarios.

IMPORTANT. Installing PHP; please make sure you install all the PHP modules appropriate for your version of PHP. Failure to due so may mean that forecasts and current conditions fail to update. This is an example for PHP8.0 modules on a Debian based distribution: -

	sudo apt install php8.1
	sudo apt install php8.1-cli php8.1-fpm php8.1-sqlite3 php8.1-zip php8.1-gd  php8.1-mbstring php8.1-curl php8.1-xml php8.1-bcmath
	sudo apt install libapache2-mod-php8.1
	sudo a2enmod php8.1
	sudo systemctl restart apache2

* Install Ephem (https://rhodesmill.org/pyephem/). It is important that you install the latest version as versions prior to 4.1.3 are missing crucial libraries in the install package. It is also important that any previous versions are removed before hand. From the command line (if your version of Python is 2.x, use pip2 and python2 instead): -

        sudo pip3 uninstall pyephem
		sudo apt purge python3-ephem
		sudo pip3 install ephem

Once completed, make sure you save weewx.conf

* If you have have the CRT extension (Cumulus Real-Time) extension installed, unless you require it for another purpose, you can remove it now. (sudo ./wee_extension --uninstall crt)

* This install process assumes that your are using one of the officially documented WeeWX installs and a typical Apache2 web server configuration of /var/www/html. In this instance, at the end of the installation process your path to thw Weather34 skin will be /var/www/html/weewx/weather34. If your installation deviates from this, you will need to adjust the paths in your weewx.conf file after the installation process has taken place.

* I am very gratefully to Jerry Dietrich for writing a new installer specially for Weather34. This installer copies everything to the correct places and automatically configures the correct web server ownerships, permissions and groups etc. The whole process is very fast and your skin will be up and running in no time. By using the supplied configuration files, setup.py, packaged or MacOS installed versions of WeeWX can be catered for.

* Go to https://steepleian.github.io/weewx-Weather34 to complete the pre-install web services settings which which generates 'services.txt' in your default Download folder. 

* From the command line: - 
                
		Download weewx-Weather34-main.zip from https://github.com/steepleian/weewx-Waether34/edit/main/ into your Download folder alongside the services.txt file
		cd [path_to_your_Download_folder]
		unzip weewx-Weather34-main.zip
		cd weewx-Weather34-main
		sudo python w34_installer.py or sudo python3 w34_installer.py (if you are running Python3)
		
		    You will be prompted for the config file for your WeeWX install type.
		    Select packaged if your WeeWX was installed by Debian, RedHat or Suse methods [default option]
		    or
		    Select setup_py. if your WeeWX was installed by setup.py method
		    or
		    Select macos if your WeeWX was installed by MacOS method
		


* Restart WeeWX and from command line run: -
            	
		sudo python3 ./[YOUR OWN PATH TO]/wee_reports

This will allow some of the required variable data to be generated immediately without having to wait for the next report generation interval.

* You can now test that the template is working by opening it up in your browser. Initially you will see random demo data. Click on the menu button at the top-left corner and select settings. This will open up a web form in which you apply your own settings. The default password is '12345'. Please change this to your own unique password for your own protection. Pay particular attention to the location of the w34realtime.txt file being generated on a loop cycle by weeWX. The default location is “/[html_root]/weewx/w34weather/serverdata/w34realtime.txt” (for example /var/www/html/weewx/w34weather/serverdata/w34realtime.txt). IMPORTANT the unit codes that you select for the Weather Underground and DarkSky forecast APIs must be identical to those that you select in the pre-install settings process. Failure to do so will possibly produce some bizzare data.

* Using a RAM Disk for w34realtime.txt. The default location is hard-coded but can be changed: -

	Edit the [Weather34Realtime] stanza in weewx.conf

			[Weather34RealTime]
    
    				realtime_path_only = /[your path to your ram disk] # no trailing /

        Edit line 33 in weather34/settings.php
    				
				$livedata = "/[your path to ram disk]/w34realtime.txt";

  These edited settings may not be persistent after an update / re-install so you may need to re-edit the above files.

* Automatic database backup module. 

    Open your weewx.conf file and find the [[Services]] section in the [Engine] stanza. Find the line that starts with process_services. At the end of that line add:-

			,user.w34_db_backup.W34_DB_Backup
			
   Then at the end of the file add this stanza: -

			[W34_DB_Backup]
				
				# database path(s) seperated by , rename this/these database(s) to match your own
    				databases = /home/weewx/archive/weewx.sdb,/home/weewx/archive/another.sdb
				
				# backup path(s) comma seperated 
    				backups = [your_backup_path]/weewx_backup.sdb,[your_backup_path]/home/pi/another_backup.sdb
				
				# set the daily time to backup comma seperated for multiple databases
				# the time must be set an to archive time so it runs immediately after the archive interval processes are complete
    				backup_times = 00:00,00:00
				
* Save and restart WeeWX

* Any problems, please raise an Issue in this repository attaching a debug report (see here for details http://www.weewx.com/docs/utilities.htm#wee_debug_utility), your skin.conf files and a syslog tail report covering at least two archive cycles from startup.

* There is further guide of how to install weewx_Weather34 on a remote server here: - https://github.com/steepleian/weewx-Weather34/blob/main/REMOTE_SERVER.md and an excellent online guide by User Chris Alemany at https://www.chrisalemany.ca/2021/02/24/installing-the-weather34-skin-on-weewx-with-remote-web-server-2021-edition/
