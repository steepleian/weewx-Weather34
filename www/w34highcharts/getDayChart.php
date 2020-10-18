<?php 
    function socket_transfer($socket, $cmd, $s_file){
      try {
        socket_write($socket, $cmd, strlen($cmd));
        if (!isset($weewx_file_transfer) || $weewx_file_transfer == 'rsync'){
          socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, array("sec" => 10, "usec" =>0));
          @socket_read($socket, 1, PHP_NORMAL_READ);
        }
        else {
          $file_hd = fopen($s_file,"w");
          while (socket_recv($socket, $buf, 4096, MSG_WAITALL) != 0)
            fwrite($file_hd,$buf);
          fclose($file_hd);
        }
        @socket_close($socket);
      }catch(Exception $e){
        error_log($e);
        shell_exec(escapeshellcmd($cmd));
      }
    }
    $plot_info = explode(",",$_GET['plot_info']);
    $filenames = explode(":", $plot_info[1]);
    $weewxfile = fopen("../serverdata/weewxserverinfo.txt", "r");
    $weewxdata = fgets($weewxfile);
    fclose($weewxfile);
    if (strlen($weewxdata)){
      $data = explode(":", $weewxdata);
      $weewxserver_address = trim($data[0]);
      $weewxserver_port = trim($data[1]);
      $weewx_file_transfer = trim($data[2]);
      putenv("PYTHONPATH=".trim($data[3]));
    }
    else{
      putenv("PYTHONPATH="."/usr/share/weewx:/home/weewx/bin:/Users/Shared/weewx/bin");
      error_log("WARNING weewxserverinfo.txt was not found using default value may not work");
    }
    for ($i = 0; $i < sizeof($filenames); $i++){ 
      if (isset($weewxserver_address)){
        try {
          $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
          if (!socket_connect($socket, $weewxserver_address, $weewxserver_port)){
            $weewxserver_port = NULL;
            $weewxserver_address = NULL;
          }
        }catch(Exception $e){
          error_log($e);
          $weewxserver_port = NULL;
          $weewxserver_address = NULL;
        }
      }
      $filename = $plot_info[0].$filenames[$i];
      if (file_exists($filename))
        unlink($filename);
      $cmd = $plot_info[2]." ".$_GET['epoch']." ".$filename.".tmpl ".getcwd()." ".$weewx_file_transfer;
      error_log("NOT AN ERROR ".$cmd);
      if (isset($_GET['epoch1'])){
        $s_file1 = explode(".", $filename)[0]."1.json";
        if (file_exists($s_file1))
          unlink($s_file1);
        if (isset($weewxserver_address))
          socket_transfer($socket, $cmd, $filename);
        else
          shell_exec(escapeshellcmd($cmd));
        rename($filename, $s_file1);
        $cmd = $plot_info[2]." ".$_GET['epoch1']." ".$filename.".tmpl ".getcwd()." ".$weewx_file_transfer;
        error_log("NOT AN ERROR ".$cmd);
        if (isset($weewxserver_address)){
          try {
            $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
            if(socket_connect($socket, $weewxserver_address, $weewxserver_port))
              socket_transfer($socket, $cmd, $filename);
            else
              shell_exec(escapeshellcmd($cmd));
          }catch(Exception $e){
            error_log($e);
            shell_exec(escapeshellcmd($cmd));
          }
        }
        else
          shell_exec(escapeshellcmd($cmd));
      }
      else {
        if (isset($weewxserver_address))
          socket_transfer($socket, $cmd, $filename);
        else
          shell_exec(escapeshellcmd($cmd));
      }
    }
?> 

