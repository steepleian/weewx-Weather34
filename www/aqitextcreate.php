 <?php

$json = "/var/www/html/weewx/weather34/jsondata/aqi.txt";


$jsonobj = file_get_contents($json);

$arr = json_decode($jsonobj, true);

$pm25 = $arr["pm25"];
$pm10 = $arr["pm10"];
 
  
$myfile = fopen("/var/www/html/weewx/weather34/serverdata/aqidata.txt", "w") or die("Unable to open file!");
$txt = "pm25 = $pm25\n";
fwrite($myfile, $txt);
$txt = "pm10 = $pm10";
fwrite($myfile, $txt);
fclose($myfile);
?> 