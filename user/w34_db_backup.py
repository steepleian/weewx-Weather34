# To use add the following to the end of process_services user.w34_db_backup.W34_DB_Backup
# Next setup the following variables below DATABASES, BACKUPS, BACKUP_TIMES or add the following section to weewx config 
# CANNOT HAVE A BACKUP DATABASE FILENAME weewx.sdb weewx.frm, weewx.myi, weewx.myd.
# If multiple databases are to be backup then databases and backups and backup_times are strings with comma between each filename.
# The number of database filenames must match the number of backup filenames and backup times
# [W34_DB_Backup]
#    databases = <Location(s) of your active databases (can be a comma separated string)>
#    backups = <Location(s) for your backups (can be a comma separated string)>
#    backup_times = <Time(s) to run backup each day (can be a comma separated string)>

import os
import time
import threading
import subprocess
from datetime import datetime

import weewx
from weewx.wxengine import StdService

VERSION = "1.0"

DATABASES    = ["/var/lib/weewx/weewx.sdb"]
BACKUPS      = ["/media/pi/usb_drive/weewx_backup.sdb"]
BACKUP_TIMES = ["23:59"]

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
        try: self.databases = config_dict['W34_DB_Backup'].get('databases', DATABASES)
        except: self.databases = DATABASES
        self.databases = [s.strip() for s in self.databases]
        try: self.backups = config_dict['W34_DB_Backup'].get('backups', BACKUPS)
        except: self.backups = BACKUPS
        self.backups = [s.strip() for s in self.backups]
        try: self.backup_times = config_dict['W34_DB_Backup'].get('backup_times', BACKUP_TIMES)
        except: self.backup_times = BACKUP_TIMES 
        self.backup_times = [s.strip() for s in self.backup_times]
        if len(self.databases) != len(self.backups) or len(self.databases) != len(self.backup_times): 
            logerr("Number of databases does not match number of backups or number of backup times")
            return
        for i in range(len(self.databases)):
            loginf("database " + self.databases[i] + " will be backup to " + self.backups[i] + " at time " + self.backup_times[i])
            if self.databases[i] == self.backups[i]: 
                logerr("Cannot have the same filename for both database and backup")
                return
            basename = os.path.basename(self.backups[i])
            if basename == 'weewx.sdb' or basename == 'weewx.myi' or basename == 'weewx.myd' or basename == 'weewx.frm': 
                logerr("Cannot use a backup filename that is weewx.(sdr,myi,myd,frm). !!!MAKE SURE THAT THE FILENAMES ARE CORRECT!!!")
                return
        self.bind(weewx.NEW_ARCHIVE_RECORD, self.newArchiveRecord)
        self.backups_in_progress = 0 

    def newArchiveRecord(self, _event):
        if self.backups_in_progress <= 0:
            current_time =  ":".join(str(datetime.now().time()).split(":", 2)[:2])
            for i in range(len(self.backup_times)):
                if current_time == self.backup_times[i]: 
                    self.backups_in_progress += 1 
                    threading.Timer(10, self.do_backup, args = (self.databases[i], self.backups[i])).start()
    
    def do_backup(self, database, backup):
        try:
            loginf("Backup of database " + database + " to " + backup + " has started.")
            subprocess.Popen("sudo cp -a " + database + " " + backup, shell=True).wait()
            loginf("Backup of database " + database + " to " + backup + " has completed.")
        except Exception as err:
            logerr("Backup Error: " + str(err))
        finally:
            self.backups_in_progress -= 1
 
