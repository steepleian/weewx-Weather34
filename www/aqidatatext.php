<?php

$pm25 = json_decode(file_get_contents("jsondata/aqi.txt"), true)["pm25"];
$pm10 = json_decode(file_get_contents("jsondata/aqi.txt"), true)["pm10"];
 
  
$myfile = fopen("serverdata/aqidata.txt", "w") or die("Unable to open file!");
$txt = "pm25 = $pm25\n";
fwrite($myfile, $txt);
$txt = "pm10 = $pm10";
fwrite($myfile, $txt);
fclose($myfile);
?> 