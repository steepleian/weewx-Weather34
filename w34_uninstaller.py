from configobj import ConfigObj
import distutils.file_util
import traceback
import shutil
import time
import sys
import os
import re

KEYS_TO_DELETE   = ['Weather34RealTime','Weather34WebServices','Weather34CloudCover','W34_DB_Backup','StdReport:w34Highcharts','StdReport:Weather34Report','StdReport:w34skinReport']
VALUES_TO_DELETE = ['Engine:Services:process_services:user.w34_db_backup.W34_DB_Backup','Engine:Services:process_services:user.weather34.Weather34RealTime']
DIRS_TO_DELETE   = ['www:','skins:Weather34','skins:w34Highcharts','skins:w34Highcharts-day']
FILES_TO_DELETE  = ['user:w34highchartsSearchX.py','user:weather34.py','user:w34_db_backup.py','user:lastrain.py','user:ml.py','user:stats.py']
  
class w34_uninstaller:
    def __init__(self, conf_file):
        try:
            try:
                response = raw_input("Do you want to UNinstall w34 Template Yes/No? ").strip().upper()
            except:
                response = input("Do you want to UNinstall w34 Template Yes/No? ").strip().upper()
            if response != "YES":
                sys.exit(0)
            print ("!!!!!!!!!!!!UNINSTALLING W34 TEMPLATE!!!!!!!!!!!!!!")
            try:
                response = raw_input("Are you SURE you want to UNinstall w34 Template Yes/No? ").strip().upper()
            except:
                response = input("Are you SURE you want to UNinstall w34 Template Yes/No? ").strip().upper()
            if response != "YES":
                sys.exit(0)
            conf_files = {}
            if conf_file == None:
                file_count = 1
                files = [f for f in os.listdir('.') if os.path.isfile(f) and f.endswith(".conf")]
                for f in files:
                    conf_files[file_count] = f
                    print(str(file_count) + " -> " + f)
                    file_count += 1
                response = 0
                while response == 0 or response > len(conf_files):
                    try:
                        response = int(raw_input("Enter the NUMBER of the config file that the w34_installer used? ").strip())
                    except:
                        response = int(input("Enter the NUMBER of the config file that the w34_installer used? ").strip())
                conf_file = conf_files[response]
            print("Installer Config file " + conf_file + " was chosen.")
            with open(conf_file) as infile:
                d = eval(re.sub(".*\"##.*\n",'', infile.read()).replace("\n", "").replace("\t", ""))
            copy_list = list(d["copy_paths"].split(","))
            path_list = {copy_list[i+1]:copy_list[i] for i in range(0, len(copy_list), 2)}
            for f in DIRS_TO_DELETE:
                parts = f.split(':')
                path = os.path.join(path_list[parts[0]], parts[1])
                try: shutil.rmtree(path)
                except: print("Directory Not Found " + path)
            for f in FILES_TO_DELETE:
                parts = f.split(':')
                path = os.path.join(path_list[parts[0]], parts[1])
                try: os.remove(path)
                except: print("File Not Found " + path)
            weewx_config_file = d["weewx_config_file"]
            distutils.file_util.copy_file(weewx_config_file, weewx_config_file + "." + str(int(time.time())))
            print('Updating weewx config')
            config_data = ConfigObj(weewx_config_file, encoding='utf8', list_values=False,write_empty_values=True)
            for k in KEYS_TO_DELETE:
                try:
                    if ":" in k:
                        parts = k.split(":")
                        del config_data.get(parts[0])[parts[1]]
                    else:
                        del config_data[k]
                    config_data.write()
                except Exception as e:
                    print('Key not found:' + k)
            for k in VALUES_TO_DELETE:
                try:
                    parts = k.split(":")
                    section = config_data
                    for i in range(len(parts)-2):
                        section = section.get(parts[i])
                    data = section.get(parts[-2])
                    if parts[-1] in data:
                        section[parts[-2]] = data.replace(parts[-1], "")
                        config_data.write()
                    else:
                        print('Value not found:' + k) 
                except Exception as e:
                    print (e)  
            print('Done! Will Need To Restart Weewx For Changes To Be Active')
        except Exception as e:
            traceback.print_exc()
            print (e)
            
if __name__ == '__main__':
    w34_uninstaller(sys.argv[1] if len(sys.argv) > 1 else None)
