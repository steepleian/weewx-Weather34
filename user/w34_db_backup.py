# To use add the following to the end of process_services user.w34_db_backup.W34_DB_Backup
# Next setup the following variables below DATABASES, BACKUPS, BACKUP_TIMES or add the following section to weewx config 
# CANNOT HAVE A BACKUP DATABASE FILENAME weewx.sdb weewx.frm, weewx.myi, weewx.myd.
# If multiple databases are to be backup then databases and backups and backup_times are strings with comma between each entry.
# The number of database filenames must match the number of backup filenames and backup times
# [W34_DB_Backup]
#    databases = <Location(s) of your active databases (can be a comma separated string)>
#    backups = <Location(s) for your backups (can be a comma separated string)>
#    backup_times = <Time(s) to run backup each day (can be a comma separated string) MUST BE A TIME THAT A WEEWX ARCHIVE EVENT HAPPEENS>

import os
import time
import threading
import subprocess
from datetime import datetime

import weewx
from weewx.wxengine import StdService

VERSION = "2.0"

DATABASES    = ["/var/lib/weewx/weewx.sdb"]
BACKUPS      = ["/media/pi/usb_drive/weewx_backup.sdb"]
BACKUP_TIMES = ["23:55"]

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
            if self.databases[i] == self.backups[i]: 
                logerr("Cannot have the same filename for both database " + self.databases[i] + " and backup" + self.backups[i])
                return
            basename = os.path.basename(self.backups[i])
            if basename == 'weewx.sdb' or basename == 'weewx.myi' or basename == 'weewx.myd' or basename == 'weewx.frm': 
                logerr("Cannot use a backup filename that is weewx.(sdr,myi,myd,frm). !!!MAKE SURE THAT THE FILENAMES ARE CORRECT!!!")
                return
            loginf("database " + self.databases[i] + " will be backup to " + self.backups[i] + " at time " + self.backup_times[i])
        self.run_backups = threading.Event()
        t = threading.Thread(target = self.do_backup)
        t.daemon = True
        t.start() 
        self.bind(weewx.NEW_ARCHIVE_RECORD, self.newArchiveRecord)

    def newArchiveRecord(self, _event):
        if not self.run_backups.is_set():
            self.run_backups.set()
    
    def do_backup(self):
        while True:
            try:
                self.run_backups.wait()
                current_time =  ":".join(str(datetime.now().time()).split(":", 2)[:2])
                time.sleep(10)
                procs = []
                for i in range(len(self.backup_times)):
                    if current_time == self.backup_times[i]:
                        loginf("Backup of database " + self.databases[i] + " to " + self.backups[i] + " has started.")
                        procs.append((subprocess.Popen("sudo cp -a " + self.databases[i] + " " + self.backups[i], shell=True, stdout=subprocess.PIPE, stderr=subprocess.STDOUT), i))
                for p in procs:
                    out, err = p[0].communicate()
                    loginf("Backup of database " + self.databases[p[1]] + " to " + self.backups[p[1]] + " has completed.")
                    logdbg("Standard Output = " + (out if out != None else "NO OUTPUT"))
                    logdbg("Standard Error  = " + (err if err != None else "NO OUTPUT"))
            except Exception as err:
                logerr("Backup Error: " + str(err))
            finally:
                self.run_backups.clear() 

