from zipfile import ZipFile
import distutils.file_util
import distutils.dir_util
import traceback
import platform
import time
import sys
import os
import re

services_file = "../services.txt"
class w34_installer:
    def change_permissions_recursive(self, path_list, uid_gid):
        import grp,pwd
        uid = pwd.getpwnam(uid_gid[0]).pw_uid
        gid = grp.getgrnam(uid_gid[1]).gr_gid
        for p in path_list:
            os.chmod(p, 0o755)
            os.chown(p, uid, gid)
            for root, dirs, files in os.walk(p, topdown=False):
                for directory in [os.path.join(root,d) for d in dirs]:
                    os.chmod(directory, 0o755)
                    os.chown(directory, uid, gid)
                    if "json_day" in directory:
                        os.chmod(directory, 0o777)
                for filename in [os.path.join(root, f) for f in files]:
                    os.chmod(filename, (0o777 if "w34_reports" in filename else 0o755))
                    os.chown(filename, uid, gid)
    
    def find_replace(self, d, k, v, do_overwrite, append = False, delete = False):
        found = k in d
        if found:
            if do_overwrite or v not in d[k]:
                if delete:
                    del d[k]
                elif append:
                    if not v in d[k]:
                        if d[k][-1] == ",":
                            d[k] += " " + v
                        else:
                            d[k] += ", " + v
                else:
                    d[k] = eval(v)
            else:
                print("Config entry " + k + " already exists and over_write is set to False")
        else:
            for value in d.values():
                if isinstance(value, dict):
                    found = self.find_replace(value, k, v, do_overwrite, append, delete)
                if found: break
        return found
    
    def __init__(self, conf_file):
        conf_files = {}
        try:
            ver = platform.python_version()
            try:
                response = raw_input("!!! THIS INSTALL IS USING PYTHON VERSION " + ver + " IS THIS CORRECT? (Yes/No) ").strip()
            except:
                response = input("!!! THIS INSTALL IS USING PYTHON VERSION " + ver + " IS THIS CORRECT? (Yes/No) ").strip()
            if not response.upper().startswith("Y"):
                print("User terminated install due to Python Version " + ver) 
                sys.exit(1)
            print ("Install will continue with Python Version " + ver + "\n")
            try:
                import ephem
                print("PYTHON EPHEM VERSION " + ephem.__version__ + " INSTALLED") 
            except:
                print("!!!NO VALID PYTHON EPHEM FOUND INSTALL CANNOT CONTINUE. PLEASE READ INSTALL README!!!") 
                sys.exit(1)
            try:
                import xmltodict
                print("PYTHON XMLTODICT VERSION " + xmltodict.__version__ + " INSTALLED\n") 
            except:
                print("!!!NO VALID PYTHON XMLTODICT FOUND INSTALL CANNOT CONTINUE. PLEASE READ INSTALL README!!!") 
                sys.exit(1)
            try:
                php = os.system('php --version')
                #print("!!!PHP NOT INSTALLED!!!" if php !=0 else "PHP INSTALLED " + php)
            except:
                print("!!!PHP NOT INSTALLED!!!")
            try:
                with open(services_file) as infile:
                    pass
            except:
                print("Cannot find " + services_file + " file INSTALL ABORTED")
                sys.exit(1)
            from configobj import ConfigObj
            if conf_file == None:
                file_count = 1
                files = [f for f in os.listdir('.') if os.path.isfile(f) and f.endswith(".conf")]
                for f in files:
                    with open(f) as infile:
                        try:
                            d = eval(re.sub(".*\"##.*\n",'', infile.read()).replace("\n", "").replace("\t", ""))
                            if os.path.isdir(list(d["copy_paths"].split(","))[0]):
                                conf_files[file_count] = f   
                                file_count += 1   
                        except Exception as e:
                            pass
                if len(conf_files) == 1:
                    conf_file = conf_files[1]
                else:
                    if file_count > 1:
                        print("\nList of found w34_installer conf files to install that have existing weewx paths") 
                        for f in range(len(conf_files)):
                            print(str(f+1) + " -> " + conf_files[f+1])
                        response = 0
                        while response == 0 or response > len(conf_files):
                            try:
                                response = int(raw_input("Enter the NUMBER of the installer config file ").strip())
                            except:
                                response = int(input("Enter the NUMBER of the installer config file ").strip())
                        conf_file = conf_files[response]
                    else:
                        print("!!! NO VALID W34_INSTALLER CONFIG FILE. INSTALL ABORTED!!!")
                        sys.exit(1)
            print("w34_installer Config file " + conf_file + " was chosen.")
            try:
                response = raw_input("IS THIS CORRECT? (Yes/No) ").strip()
            except:
                response = input("IS THIS CORRECT? (Yes/No) ").strip()
            if not response.upper().startswith("Y"):
                print("User terminated") 
                sys.exit(1)
            with open(conf_file) as infile:
                d = eval(re.sub(".*\"##.*\n",'', infile.read()).replace("\n", "").replace("\t", ""))
            copy_list = list(d["copy_paths"].split(","))
            weewx_config_file = d["weewx_config_file"]
            locations = {copy_list[i+1]:copy_list[i] for i in range(0, len(copy_list), 2)}
            config_data = ConfigObj(weewx_config_file, encoding='utf8', list_values=False,write_empty_values=True)
            www_path = locations["www"].split('weather34')[0][:-1]
            if www_path != config_data['StdReport'].get('HTML_ROOT'):
                print("!!! WEEWX HTML ROOT  " + config_data['StdReport'].get('HTML_ROOT') + "  DOES NOT MATCH W34_INSTALLER www PATH.  " + www_path + "  INSTALL ABORTED!!!") 
                sys.exit(1)
            with open(services_file) as infile:
                d.update(eval(re.sub(".*\"##.*\n",'', infile.read()).replace("\n", "").replace("\t", "")))
            do_overwrite = True if d["over_write"] == "True" else False
            extract_path = d["extract_to_path"]
            if extract_path == None or len(extract_path) == 0:
                extract_path = "temp"
            zip_file = d["zip_file"]
            if len(zip_file) > 0:
                with ZipFile(zip_file, 'r') as zip_file:
                    if not os.path.exists(extract_path):
                        os.makedirs(extract_path)
                    else:
                        if not do_overwrite:
                            print ("Extract path exists and overwrite set to False")
                            try:
                                response = raw_input("Do you want to abort the install!!! (Yes/No) ").strip()
                            except:
                                response = input("Do you want to abort the install!!! (Yes/No) ").strip()
                            if response.upper().startswith("Y"):
                                return
                    print('Extracting all the files to ' + extract_path)
                    zip_file.extractall(extract_path)
                    print('Files extracted')
            try:
                try:
                    for i in range(0, len(copy_list), 2):
                        distutils.dir_util.copy_tree(os.path.join(extract_path, copy_list[i+1].strip()), copy_list[i].strip(), update = do_overwrite)
                except:
                    for i in range(0, len(copy_list), 2):
                        distutils.dir_util.copy_tree(os.path.join(extract_path, copy_list[i+1].strip()), copy_list[i].strip(), update = do_overwrite)
                self.change_permissions_recursive([locations["www"]], d["uid_gid"].split(","))
            except Exception as e: 
                print(e)
            if d["delete_extracted_files"] == "True":
                if extract_path != os.getcwd():
                    distutils.dir_util.remove_tree(extract_path)
            distutils.file_util.copy_file(weewx_config_file, weewx_config_file + "." + str(int(time.time())))
            print('Updating weewx config')
            for i in d:
                if i.startswith("config_entries"):
                    if "delete" in i:
                        key = d[i].split(":", 1)[1].strip()
                        if not self.find_replace(config_data, key, None, do_overwrite, False, True):
                            print("Delete key skipped because key " + key + " was not found")
                    elif "append" in i:
                        parts = d[i].split("=", 1)
                        if not self.find_replace(config_data, parts[0].strip(), parts[1], do_overwrite, True):
                            print("Append to key " + parts[0] + " skipped because key was not found")
                    else:
                        comments = ['#\n################################################################################\n']
                        parts = d[i].split("=", 1)
                        zpath = parts[0]
                        parts = parts[1].split(":", 1)
                        if "$" in parts[1]:
                            if len(d['lat']) == 0 or len(d['lon']) == 0:
                                d["lat"] = config_data['Station'].get('latitude')
                                d["lon"] = config_data['Station'].get('longitude')
                            for field in d['sub_fields'].split(","):
                                parts[1] = parts[1].replace("$"+field, d[field])                                
                        if "# " in parts[1].strip():
                            parts1 = parts[1].split("{",)
                            comments.append(parts1[0].replace('"',''))
                            parts[1] = "{" + parts1[1]
                        key = parts[0].replace("'", "").strip()
                        status = self.find_replace(config_data, key, parts[1], do_overwrite)
                        if not status or status and do_overwrite:
                            if zpath == None or len(zpath) == 0:
                                config_data[key] = eval(parts[1])
                                config_data.comments[key] = comments
                            else:
                                config_data[zpath][key] = eval(parts[1])
                                config_data[zpath].comments[key] = comments
            if config_data['Engine']['Services'].get('data_services') == ',':
                config_data['Engine']['Services']['data_services'] = '""'
            config_data.write()
            print('Done! Will Need To Restart Weewx For Changes To Be Active')
        except Exception as e:
            traceback.print_exc()
            print (e)
            
if __name__ == '__main__':
    w34_installer(sys.argv[1] if len(sys.argv) > 1 else None)
