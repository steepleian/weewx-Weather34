<?php
include('settings.php');
include('settings1.php');
include('common.php');
date_default_timezone_set($TZ);
error_reporting(0);
$force_stale=(array_key_exists('force', $_GET) && $_GET['force'] == $password);
# overwrites password...
include('meteoalarmsettings.php');
function file_stale($filename, $max_age=0) {
  global $force_stale; if($force_stale)return true;
  global $wuupdate; if($max_age==0)$max_age=$wuupdate*0.8;
  return !(file_exists($filename)&&(time()-filemtime($filename))<$max_age);
}
function update_file($ch, $filename) {
  global $lang;
  $fp = fopen($filename, 'wb');
  if(!$fp){curl_close($ch); return;}
  curl_setopt($ch, CURLOPT_FILE, $fp);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  if(curl_exec($ch))
    echo $filename.' '.$lang['Updated']."<br>";
  else
    echo $filename.' - ERR: '.curl_error($ch)."\n";
  curl_close($ch);
  fclose($fp);
}
?>
<?php
$metarapikey=trim($metarapikey);
$icao1=trim($icao1);
$filename2 = 'jsondata/metar34.txt';
if($metarapikey && $icao1 && file_stale($filename2)) {
$w34header= array("X-API-KEY:".$metarapikey."",);
$complete_save_loc2 = $filename2;
$ch = curl_init("https://api.checkwx.com/metar/".$icao1."/decoded");
curl_setopt($ch, CURLOPT_HTTPHEADER, $w34header);
update_file($ch, $complete_save_loc2);
}
?>
<?php
if ($position6=="forecast3ds.php" || $position6=='forecast3wu.php' || $position6=='forecast3wularge.php' || $position4 == "advisory.php"){
// weather34 darksky  curl based
$apikey=trim($apikey);
$filename4a = 'jsondata/darksky.txt';
if($apikey && file_stale($filename4a, 3600*0.8)){
$url4a = 'https://api.forecast.io/forecast/'.$apikey.'/'.$lat.','.$lon.'?lang='.$language.'&units='.$darkskyunit ;
$ch4a = curl_init($url4a);
$complete_save_loc4a = $filename4a;
update_file($ch4a, $complete_save_loc4a);
}}?>
<?php
if ($position6=="forecast3wu.php" || $position6=="forecast3wularge.php"){
// weather34 weather underground  curl based
$wuapikey=trim($wuapikey);
$filename4c = 'jsondata/wuforecast.txt';
if($wuapikey && file_stale($filename4c)){
$url4c = 'https://api.weather.com/v3/wx/forecast/daily/5day?geocode='.$lat.','.$lon.'&language=en-US&format=json&units='.$wuapiunit.'&apiKey='.$wuapikey ;
$ch4c = curl_init($url4c);
$complete_save_loc4c = $filename4c;
update_file($ch4c, $complete_save_loc4c);
}}?>
<?php // weather34 earthquakes curl based
$filename1 = 'jsondata/eqnotification.txt';
if(file_stale($filename1)){
$url1 = 'https://earthquake-report.com/feeds/recent-eq?json';
$ch1 = curl_init($url1);
$complete_save_loc1 = $filename1;
update_file($ch1, $complete_save_loc1);
}
?>
<?php //k-index curl based
$filename2a = 'jsondata/kindex.txt';
if(file_stale($filename2a)){
$url2a = 'https://services.swpc.noaa.gov/products/geospace/planetary-k-index-dst.json';
$ch2a = curl_init($url2a);
$complete_save_loc2a = $filename2a;
update_file($ch2a, $complete_save_loc2a);
}
?>

<?php // weather34 purple air quality  curl based
if($purpleairhardware=='yes'){
$filename4 = 'jsondata/purpleair.txt';
if(file_stale($filename4)){
$url4 = 'https://www.purpleair.com/json?show='.$purpleairID.'';
$ch4 = curl_init($url4);
$complete_save_loc4 = $filename4;
update_file($ch4, $complete_save_loc4);
}
}
?>


<?php // weather34 aqicn air quality  curl based
if($purpleairhardware=='no'){
$url3 = "https://api.waqi.info/feed/geo:'.$lat.';'.$lon.'/?token='.$aqitoken.'"; 
$ch3 = curl_init($url3);
$filename3 = 'jsondata/aqi.txt';
$complete_save_loc3 = $filename3; 
$fp3 = fopen($complete_save_loc3, 'wb'); 
curl_setopt($ch3, CURLOPT_FILE, $fp3);
curl_setopt($ch3, CURLOPT_HEADER, 0);
curl_exec($ch3);
curl_close($ch3);
fclose($fp3);}
?>
