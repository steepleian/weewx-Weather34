# To use add the following to the end of weewx services user.w34_db_backup.W34_DB_Backup
# Next setup the following variables below WEEWX_DB, BACKUP_DB, BACKUP_TIME or add the following section to weewx config 
# CANNOT HAVE A BACKUP DATABASE FILENAME weewx.sdb.
# [W34_DB_Backup]
#    weewx_db = <Location of your active weewx database>
#    backup_db = <Location of your backup database>
#    backup_time = <time to run backup each day>

import os
import time
import threading
import subprocess
from datetime import datetime

import weewx
from weewx.wxengine import StdService

VERSION = "1.0"

WEEWX_DB    = "/var/lib/weewx/weewx.sdb"
BACKUP_DB   = "/media/pi/usb_drive/weewx_backup.sdb"
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
        try: self.weewx_db = config_dict['W34_DB_Backup'].get('weewx_db', WEEWX_DB)
        except: self.weewx_db = WEEWX_DB
        try: self.backup_db = config_dict['W34_DB_Backup'].get('backup_db', BACKUP_DB)
        except: self.backup_db = BACKUP_DB
        try: self.backup_time = config_dict['W34_DB_Backup'].get('backup_time', BACKUP_TIME)
        except: self.backup_time = BACKUP_TIME 
        loginf("weewx database " + self.weewx_db + " will be backup to " + self.backup_db)
        if self.weewx_db == self.backup_db: 
            logerr("Cannot have the same filename for both weewx_db and backup_db")
            return
        if os.path.basename(self.backup_db) == 'weewx.sdb': 
            logerr("Cannot use a backup database filename weewx.sdb. !!!MAKE SURE THAT THE DATABASE FILENAMES ARE CORRECT!!!")
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
            subprocess.Popen("sudo cp -a " + self.weewx_db + " " + self.backup_db, shell=True, stdout=subprocess.PIPE, stderr=subprocess.PIPE).wait()
            loginf("Backup complete")
        except Exception as err:
            logerr("Backup Error: " + err)
        finally:
            self.backup_in_progress = False
 
