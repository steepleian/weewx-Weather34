# Installation Guide

**The installer now defaults to overwrite mode, settings1.php will not be overwritten as it does not exist in the package. However, it is essential that any customisations you may have been made are backed up before running the install.**

This installation guide assumes that you are already reasonably familiar with WeeWX and that it is already installed on your computer along with a webserver, php and curl.

If you have not already done so, you must update your WeeWX installation to version 4.1.1 or later. This is required to facillitate nested copying during the skin install process. Follow the various installation type links on this page http://weewx.com/docs/usersguide.htm#installation_methods for instructions on updating. This version of Weather34 is compatible with WeeWX 4.1.1/Python2.7 or Python3.x. 

If you are carrying out a fresh install of WeeWX, my own personal preference is to use the setup.py method (http://www.weewx.com/docs/setup.htm). However, this increases the chances of requiring more path edits in the configuration files. Alternatively use one of the dedicated packaged installs (http://weewx.com/docs/debian.htm, http://weewx.com/docs/redhat.htm, http://weewx.com/docs/suse.htm or http://weewx.com/docs/macos.htm).

* Please familiarise yourself with the location of your WeeWX system files inhttp://weewx.com/docs/cluding your bin/user folder, skins folder and weewx.conf file. If you are unsure where to find these, please refer to the installation processes here: - http://www.weewx.com/docs/setup.htm which shows various WeeWX installation scenarios.

IMPORTANT. Installing PHP; please make sure you install all the PHP modules appropriate for your version of PHP. Failure to due so may mean that forecasts and current conditions fail to update. This is an example for PHP7.3 modules on a Debian based distribution: -

	sudo apt install php7.4
	sudo apt install php7.4-cli php7.4-fpm php7.4-json php7.4-sqlite3 php7.4-zip php7.4-gd  php7.4-mbstring php7.4-curl php7.4-xml php7.4-bcmath
	sudo apt install libapache2-mod-php7.4
	sudo a2enmod php7.4
	sudo systemctl restart apache2

* Install PyePhem (https://rhodesmill.org/pyephem/). From the command line depending on the version of Python you use: -

        sudo apt install python2-ephem or sudo sudo apt install python3-ephem

* If you are going to use the optional enhancement to convert RSS XML feeds to json data for Web Services, the following Python library must be installed: -

	sudo pip3 install xmltodict (if using Python3.x) or sudo pip install xmltodict (for users still using Python2.x)

Once completed, make sure you save weewx.conf

* If you have have the CRT extension (Cumulus Real-Time) extension installed, unless you require it for another purpose, you can remove it now. (sudo ./wee_extension --uninstall crt)

* This install process assumes that your are using one of the officially documented WeeWX installs and a typical Apache2 web server configuration of /var/www/html. In this instance, at the end of the installation process your path to thw Weather34 skin will be /var/www/html/weewx/weather34. If your installation deviates from this, you will need to adjust the paths in your weewx.conf file after the installation process has taken place.

* The default WeeWX extension installer (wee_extension) was not really intended to deal with monolithic structure of the Weather34 skin. It is possible to configure an install package to use wee_extension, but it is a difficult and tedious process to maintain for this skin. I am very gratefully to Jerry Dietrich for writing a new installer specially for Weather34. This installer copies everything to the correct places and automatically configures the correct web server ownerships, permissions and groups etc. The whole process is very fast and your skin will be up and running without having to wait till the end of the first archive cycle. By using the supplied configuration files, setup.py, packaged or MacOS installed versions of WeeWX can be catered for.

* Go to https://steepleian.github.io/weewx-Weather34 to complete the pre-install web services settings which which generates 'services.txt' in your default Download folder. IMPORTANT the unit codes that you select for the Weather Underground and DarkSky forecast APIs must be identical to those that you select in the post-install settings page. Failure to do so will possibly produce some bizzare data.

* From the command line: - 
                
		cd [path_to_your_Download_folder]
		sudo git clone https://github.com/steepleian/weewx-Weather34.git
		sudo cp services.txt weewx-Weather34
		cd weewx-Weather34
		sudo python w34_installer.py or sudo python3 w34_installer.py (if you are running Python3)
		
		
		    You will be prompted for the config file for your WeeWX install type.
		    Select packaged if your WeeWX was installed by Debian, RedHat or Suse methods [default option]
		    or
		    Select setup_py. if your WeeWX was installed by setup.py method
		    or
		    Select macos if your WeeWX was installed by MacOS method
		
* Alternative install method : -

		Download weewx-Weather34-master.zip from https://github.com/steepleian/weewx-Weather34/edit/master/ into your Download folder
		cd [path_to_your_Download_folder]
		unzip weewx-Weather34-master.zip
		sudo cp services.txt weewx-Weather34-master
		cd weewx-Weather34-master
		sudo python w34_installer.py or sudo python3 w34_installer.py (if you are running Python3)
		
		    You will be prompted for the config file for your WeeWX install type.
		    Select packaged if your WeeWX was installed by Debian, RedHat or Suse methods [default option]
		    or
		    Select setup_py. if your WeeWX was installed by setup.py method
		    or
		    Select macos if your WeeWX was installed by MacOS method
		


* Restart WeeWX.

* You can now test that the template is working by opening it up in your browser. Initially you will see random demo data. Click on the menu button at the top-left corner and select settings. This will open up a web form in which you apply your own settings. The default password is '12345'. Please change this to your own unique password for your own protection. Pay particular attention to the location of the w34realtime.txt file being generated on a loop cycle by weeWX. The default location is “/[html_root]/weewx/w34weather/serverdata/w34realtime.txt” (for example /var/www/html/weewx/w34weather/serverdata/w34realtime.txt). IMPORTANT the unit codes that you select for the Weather Underground and DarkSky forecast APIs must be identical to those that you select in the pre-install settings process. Failure to do so will possibly produce some bizzare data.

* Automatic database backup module. This module has not yet been integrated fully into the install process so you will need to make some changes manually.

    Copy the w34_db_backup.py file into /home/weewx/bin/user (or /usr/share/weewx/user for a DEB install)

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

