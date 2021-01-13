# To use add the following to the end of weewx services user.w34_db_backup.W34_DB_Backup
# Next setup the following variables below DATABASES, BACKUPS, BACKUP_TIME or add the following section to weewx config 
# CANNOT HAVE A BACKUP DATABASE FILENAME weewx.sdb weewx.frm, weewx.myi, weewx.myd.
# If multiple databases are to be backup then databases and backups are strings with comma between each filename.
# The number of database filenames must match the number of backup filenames
# [W34_DB_Backup]
#    databases = <Location(s) of your active databases (can be a comma separated string)>
#    backups = <Location(s) for your backups (can be a comma separated string)>
#    backup_time = <time to run backup each day>

import os
import time
import threading
import subprocess
from datetime import datetime

import weewx
from weewx.wxengine import StdService

VERSION = "1.0"

DATABASES   = "/var/lib/weewx/weewx.sdb"
BACKUPS     = "/media/pi/usb_drive/weewx_backup.sdb"
BACKUP_TIME = "23:55"

try:
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
    import syslog

    def logmsg(level, msg):
        syslog.syslog(level, 'W34_DB_Backup: %s' % msg)

    def logdbg(msg):
        logmsg(syslog.LOG_DEBUG, msg)

    def loginf(msg):
        logmsg(syslog.LOG_INFO, msg)

    def logerr(msg):
        logmsg(syslog.LOG_ERR, msg)

class W34_DB_Backup(StdService):
    
    def __init__(self, engine, config_dict):
        super(W34_DB_Backup, self).__init__(engine, config_dict)
        loginf("Version is %s" % VERSION) 
        try: self.databases = config_dict['W34_DB_Backup'].get('databases', DATABASES).split(",")
        except: self.databases = DATABASES.split(",")
        try: self.backupsb = config_dict['W34_DB_Backup'].get('backups', BACKUPS).split(",")
        except: self.backups = BACKUPS.split(",")
        try: self.backup_time = config_dict['W34_DB_Backup'].get('backup_time', BACKUP_TIME)
        except: self.backup_time = BACKUP_TIME 
        if len(self.databases) != len(self.backups): 
            logerr("Number of databases does not match number of backups")
            return
        for i in range(len(self.databases)):
            loginf("database " + self.databases[i] + " will be backup to " + self.backups[i])
            if self.databases[i] == self.backups[i]: 
                logerr("Cannot have the same filename for both database and backup")
                return
            basename = os.path.basename(self.backups[i])
            if basename == 'weewx.sdb' or basename == 'weewx.myi' or basename == 'weewx.myd' or basename == 'weewx.frm': 
                logerr("Cannot use a backup filename that is weewx.(sdr,myi,myd,frm). !!!MAKE SURE THAT THE FILENAMES ARE CORRECT!!!")
                return
        self.bind(weewx.NEW_ARCHIVE_RECORD, self.newArchiveRecord)
        loginf("Backup time is %s " % self.backup_time) 
        self.backup_in_progress = False

    def newArchiveRecord(self, _event):
        if ":".join(str(datetime.now().time()).split(":", 2)[:2]) == self.backup_time: 
            if not self.backup_in_progress:
                self.backup_in_progress = True
                thread = threading.Thread(target = self.do_backup)
                thread.daemon = True
                thread.start()
    
    def do_backup(self):
        try:
            time.sleep(10)
            loginf("Backup started")
            for i in range(len(self.databases)):
                subprocess.Popen("sudo cp -a " + self.databases[i] + " " + self.backups[i], shell=True, stdout=subprocess.PIPE, stderr=subprocess.PIPE).wait()
            loginf("Backup complete")
        except Exception as err:
            logerr("Backup Error: " + err)
        finally:
            self.backup_in_progress = False
 
