import os
import resource

import weewx
from weewx.wxengine import StdService

import syslog

def logmsg(level, msg):
    syslog.syslog(level, 'w34rt: %s' % msg)

def logdbg(msg):
    logmsg(syslog.LOG_DEBUG, msg)

def loginf(msg):
    logmsg(syslog.LOG_INFO, msg)

def logerr(msg):
    logmsg(syslog.LOG_ERR, msg)

class Memory(StdService):
    
    def __init__(self, engine, config_dict):
        super(Memory, self).__init__(engine, config_dict)
        self.page_size = resource.getpagesize()
        self.bind(weewx.NEW_ARCHIVE_RECORD, self.newArchiveRecord)

    def newArchiveRecord(self, event):
        
        procfile = "/proc/%s/statm" % os.getpid() 
        try:
            with open(procfile) as fd:
                mem_tuple = fd.read().split()
        except IOError:
            return
         
        (size, resident, share, text, lib, data, dt) = mem_tuple
        mb = 1024 * 1024
        logdbg("Total memory(mb) size in use   " + str(float(size) * self.page_size / mb))
        logdbg("Total resident(mb) size in use " + str(float(resident) * self.page_size / mb))
        logdbg("Total share size(mb) in use    " + str(float(share) * self.page_size / mb))

