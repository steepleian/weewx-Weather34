<?php 
    $weewxfile = fopen("../weewxserverinfo.txt", "r");
    $weewxdata = fgets($weewxfile);
    fclose($weewxfile);
    if (strlen($weewxdata)){
      $data = explode(":", $weewxdata);
      $weewxserver_address = trim($data[0]);
      $weewxserver_port = trim($data[1]);
      try {
          $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
          if (socket_connect($socket, $weewxserver_address, $weewxserver_port)){
            sleep(0.1);
            @socket_close($socket);
          }else
            error_log("Cannot connect to weewx server at ".$weewxserver_address.":".$weewxserver_port);
      }catch(Exception $e){
         error_log("Cannot connect to weewx server at ".$weewxserver_address.":".$weewxserver_port." ".$e);
      }
    }
?> 

