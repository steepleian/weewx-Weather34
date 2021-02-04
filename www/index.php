<?php //original weather34 script original css/svg/php by weather34 2015-2019 // 
 include_once('w34CombinedData.php');include_once('common.php');include_once('webserver_ip_address.php');include('settings1.php');date_default_timezone_set($TZ);
?>
<?php header('Content-type: text/html; charset=utf-8');error_reporting(0);
function downloadfromgit($filename) {
    if (!is_readable($filename) || filesize($filename) < 100) {
        //Download $filename if it doesn't exist
        $fileopen = fopen($filename, 'w');
        $options  = array(
            CURLOPT_FILE => $fileopen,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_URL => 'https://github.com/steepleian/weewx-Weather34/blob/master/www/settings1.default.php'
        );
        $ch       = curl_init();
        curl_setopt_array($ch, $options);
        curl_exec($ch);
        curl_close($ch);
        $fstat = fstat($fileopen);
        fclose($fileopen);
        if (!file_exists($filename) || $fstat['size'] < 100) {
            echo ($filename . " did not download properly, please visit <a href='https://raw.githubusercontent.com/steepleian/weewx-Weather34/master/www/settings1.default.php?token=AEMVT7U4QB6O67Z35VADMUK6QGMRM' target='_blank'>https://raw.githubusercontent.com/steepleian/weewx-Weather34/master/www/settings1.default.php?token=AEMVT7U4QB6O67Z35VADMUK6QGMRM</a>, right click anywhere on the page and choose to save the file. Then copy the file into the root of your website (where you downloaded the website files to on your server).<br/>");
            die();
        }
    }
}
function loadSettings($file) {
    if (basename($file) != 'settings1.default.php' && !file_exists($file)) {
        return [];
    } else if (basename($file) == 'settings1.default.php' && filesize($file) < 100) {
        downloadfromgit($file);
    }
    require $file;
    unset($file);
    return get_defined_vars();
}
$s1d   = loadSettings('./settings1.default.php');
$s1    = loadSettings('./settings1.php');
$check = array_diff_key($s1d, $s1);
if (!empty($check)) {
    //check if dir is writable
    if (!is_writable(".")) {
        echo ("<p>Unable to write to the website's folder. Make sure the root of the website is writable by your webserver.<br/>If you're using Apache on linux, Apache should be running as user 'www-data' and group 'www-data'. If so, run these commands or adjust them for Apache's user:group <br/><br/><i>find . -type d -exec sudo chown www-data:www-data {} \; -exec sudo chmod 2775 {} \;</i> <br/><br/>and <br/><br/><i>find . -type f -exec sudo chown www-data:www-data {} \; -exec sudo chmod 664 {} \;</i> <br/><br/>from within the root of your website's folder, probably located in '/var/www/example.com/html/pws.'<br/><br/><br/>or, do yourself a huge favor and navigate into your 'html' folder and use these 3 commands to automatically set the permissions on all files and folders created inside it:<br/><br/><i>chmod g+s .</i><br/><br/><i>setfacl -d -m g::rwx .</i><br/><br/><i>setfacl -d -m o::rx .</i></p>");
        die();
    }
    $s1   = array_merge($s1d, $s1);
    $line = '$theme = isset($theme) ? $theme : "dark";';
    $line1 = '$theme1 = $theme;';
    $code = '<?php' . "\n".$line."\n".$line1."\n";
    foreach ($s1 as $var => $value) {
        /// ${var} = "{value}";\n
        $code .= '$' . $var . ' = ' . var_export($value, true) . ";\n";
    }
    file_put_contents('./settings1.php', $code);
}
####################################################################################################
# HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2017-2018-2019                    			   #
# CREATED FOR HOMEWEATHERSTATION TEMPLATE at                									   #
#   https://weather34.com/homeweatherstation/index.html                                            #
#  WEATHER STATION TEMPLATE 2017-2018-2019 Meteobridge.     									   #
#  Weatherflow Meteobridge Version  April 2019  									               #
#   https://github.com/weather34/Weather34-Weatherflow                                             #
####################################################################################################
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $stationlocation; ?> Weather Station</title> 
<meta content="Home weather station providing current weather conditions for <?php echo $stationlocation;?>" name="description">
<!--Google / Search Engine Tags -->
<meta itemprop="name" content="Home Weather Station <?php echo $stationlocation;?>">
<meta itemprop="description" content="Home weather station providing current weather conditions for <?php echo $stationlocation;?>">
<meta itemprop="image" content="img/weather34_meta.png">
<meta content="place" property="og:type">
<meta content="weather34" name="author">
    <meta content="INDEX,FOLLOW" name="robots">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name=apple-mobile-web-app-title content="HOME WEATHER STATION">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, viewport-fit=cover">
<link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
<link rel="manifest" href="manifest.php">
<meta name="theme-color" content="#ffffff">
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
<link href="favicon.ico" rel="icon" type="image/x-icon">
<link rel="preload" href="css/fonts/clock3-webfont.woff" as="font" type="font/woff" crossorigin>
<link rel="preload" href="css/fonts/verbatim-regular.woff" as="font" type="font/woff" crossorigin>
<link href="css/main.<?php echo $theme;?>.css?version=<?php echo filemtime('css/main.'.$theme.'.css');?>" rel="stylesheet prefetch">
 <script>
if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('sw.js')
    .then(registration => {
      console.log('SW registered with scope:', registration.scope);
    })
    .catch(err => {
      console.error('Registration failed:', err);
    });
  });
}
</script>   
</head>
<body>
<!-- begin top layout for homeweatherstation template-->
<div class="weather2-container">
<div class="container weather34box-toparea">
  <!-- position1 --->
  <div class="weather34box clock">  <div class="title"><?php echo $info?> <?php echo $position1title ;?> </div><div class="value"><div id="position1"></div></div></div>
   <!-- position2--->
  <div class="weather34box indoor"> <div class="title"><?php echo $info?> <?php echo $position2title ;?> </div><div class="value"><div id="position2"></div></div></div>
  <!-- position3--->
  <div class="weather34box earthquake"> <div class="title"><?php echo $info?> <?php echo $position3title ;?> </div><div class="value"><div id="position3"></div></div></div>
  <!-- position4--->
  <!-- <div class="weather34box alert" style="color: <?php echo $meteoalert;?>"><div class="alertBackdrop" style="border: 10px solid <?php echo $meteoalert;?>; width: 236px; margin-top: 15px; margin-left: -5px; height: 61px; color: black; "></div> -->
    <!--<div class="title"><?php echo $info;?> <?php echo $position4title ;?> </div><div class="value"><div id="position4"></div></div></div>-->
  <div class="weather34box alert"><div class="title"><?php echo $info;?> <?php echo $position4title ;?> </div><div class="value"><div id="position4"></div></div></div>
</div></div></div></div>
<!--end position section for homeweatherstation template-->
<!--begin outside/station data section for homeweatherstation template-->
<!--begin outside/station data section for homeweatherstation template-->
<div class="weather-container"><div class="weather-item"><div class="chartforecast">
<span class="yearpopup">  <a alt="almanac temperature" title="almanac temperature" href="w34tempalmanac.php" data-lity > <?php echo $chartinfo?> Almanac </a></span>
<span class="yearpopup">  <a alt="yearly temperature" title="yearly temperature" href="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='temperatureplot'&span='yearly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" data-lity ><?php echo $menucharticonpage?> Yearly</a></span>
<a alt="yearly Feels" title="yearly Feels" href="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='tempderivedplot'&span='yearly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" data-lity > <?php echo '| Feels';?> </a></span>
<a alt="yearly humidity" title="yearly humidity" href="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='humidityplot'&span='yearly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" data-lity > <?php echo '| Hum';?> </a></span>  
<span class="todaypopup"> <a alt="weekly temperature" title="weekly temperature" href="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='tempallplot'&span='weekly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" data-lity >  <?php echo $menucharticonpage?> Weekly </a></span>
<a alt="weekly Feels" title="weekly Feels" href="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='tempderivedplot'&span='weekly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" data-lity > <?php echo '| Feels';?> </a></span>
<a alt="weekly humidity" title="weekly humidity" href="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='humidityplot'&span='weekly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" data-lity > <?php echo '| Hum';?> </a></span>
      </div>
<span class='moduletitle'> <?php echo $lang['Temperature']; ?> (<valuetitleunit>&deg;<?php echo $weather["temp_units"] ;?></valuetitleunit>) </span><br /></span>
  <div id="temperature"></div><br></div>
  <!--forecast for homeweatherstation template-->
<div class="weather-item"><div class="chartforecast">
<span class="yearpopup">
<?php if ($position6=='forecast3ds.php'){echo'<a alt="Dark Sky Forecast " title="Dark Sky Forecast " href="outlookds.php" data-lity>'. $chartinfo. " Daily Forecast </a>";}?>
<?php if ($position6=='forecast3wu.php' || $position6=='forecast3wularge.php') {echo ' <a alt="weather underground forecast" title="weather underground forecast" href="outlookwu.php" data-lity>'. $chartinfo. " Daily F.cast </a>";}?>
<?php if ($position6=='forecast3ds.php' || ($dshourly=='yes' && $apikey!= '11111111111111' && ($position6=='forecast3wu.php' || $position6=='forecast3wularge.php'))) {echo '<a alt="Hourly Forecast" title="Hourly Forecast" href="forecastdshour.php" data-lity>&nbsp;'. $chartinfo. " Hourly F.cast</a>";}?></span>
<?php if ($position6=='forecast3ds.php' || ($dshourly=='yes' && $apikey!= '11111111111111' && ($position6=='forecast3wu.php' || $position6=='forecast3wularge.php') && ($position4=='advisory_rw.php'))) {echo '<a alt="Alerts" title="Alerts" href="darkskyalerts.php"  data-lity>&nbsp;'. $chartinfo. " Alerts</a>";}?></span>
<?php if ($position6=='forecast3ds.php' || ($dshourly=='yes' && $apikey!= '11111111111111' && ($position6=='forecast3wu.php' || $position6=='forecast3wularge.php') && ($position4=='advisory_eu.php'))) {echo '<a alt="Meteoalarm" title="Meteoalarm" href="meteoalarmalerts.php"  data-lity>&nbsp;'. $chartinfo. " Alerts</a>";}?></span>
<?php if ($position6=='forecast3ds.php' || ($dshourly=='yes' && $apikey!= '11111111111111' && ($position6=='forecast3wu.php' || $position6=='forecast3wularge.php') && ($position4=='advisory_uk.php'))) {echo '<a alt="MetOffice Warnings" title="MetOffice Warnings" href="metofficealerts.php"  data-lity>&nbsp;'. $chartinfo. " Alerts</a>";}?></span>

  
      </div>
  <span class='moduletitle'>
    <?php echo $position6title ;?>  (<valuetitleunit>&deg;<?php echo $weather["temp_units"] ;?></valuetitleunit>)  </span><br />
  <div id="currentfore"></div></div>
  <!--currentsky for homeweatherstation template-->
  <div class="weather-item"><div class="chartforecast">
         <!-- HOURLY & Outlook for homeweather station-->
  <span class="yearpopup"> <a alt="nearby metar station" title="nearby metar station" href="metarnearby.php" data-lity><?php echo $chartinfo?> <?php echo 'Nearby Metar';?> <?php if(filesize('jsondata/me.txt')<160){echo "(<ored>Offline</ored>)";}else echo "" ?></a></span>
  <span class="monthpopup"><a href="windyradar.php" title="Windy.com Radar" alt="Windy.com Radar" data-lity><?php echo $chartinfo?> Radar</a></span>
  <span class="monthpopup"><a href="windywind.php" title="Windy.com Wind Map" alt="Windy.com Wind Map" data-lity><?php echo $chartinfo?> Wind Map</a></span>
  <span class="todaypopup"><a alt="cloud cover" title="cloud cover" href="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='cloudcoverplot'&span='weekly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" data-lity ><?php echo $menucharticonpage?> Cloud Cover</a></span>

  
  </div>
  <span class='moduletitle'><?php echo $lang['Currentsky'];?></span><br />
  <div id="currentsky"></div></div></div>
 <!--windspeed for homeweatherstation template-->
<?php if ($weather["wind_units"]=='kts'){$weather["wind_units"]="kn";} ?>
<div class="weather-container"><div class="weather-item"><div class="chartforecast">
<span class="yearpopup">  <a alt="windspeed almanac" title="windspeed almanac" href="w34windalmanac.php" data-lity ><?php echo $chartinfo?> Almanac </a></span>
<span class="yearpopup">  <a alt="yearly windspeed" title="yearly windspeed" href="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='windplot'&span='yearly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" data-lity ><?php echo $menucharticonpage?> Yearly</a></span>
<!--<span class="monthpopup"> <a alt="monthly windspeed" title="monthly windspeed"href="<?php echo $chartsource ;?>/monthlywindspeedgust.php" data-lity><?php echo $menucharticonpage?> <?php echo strftime(" %b") ;?> </a></span>-->
<span class="todaypopup"> <a alt="weekly windspeed" title="weekly windspeed" href="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='windallplot'&span='weekly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" data-lity ><?php echo $menucharticonpage?> Weekly</a></span>
<a alt="weekly wind all" title="weekly windall" href="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='windbarbplot'&span='weekly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" data-lity > <?php echo '| Wind Gust Barb';?> </a></span>
  <span class="todaypopup"> <a alt="weekly wind rose" title="weekly wind rose" href="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='windroseplot'&span='weekly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" data-lity ><?php echo $menucharticonpage?> Rose</a></span>
      </div>
  <span class='moduletitle'><?php echo $lang['Direction'];?> | <?php echo $lang['Windspeed'] ," (<valuetitleunit>",$weather["wind_units"];?></valuetitleunit>)</span><br />
         <div id="windspeed"></div></div>
       <!--barometer for homeweatherstation template-->
  <div class="weather-item"><div class="chartforecast" >
  <span class="yearpopup">  <a alt="barometer almanac" title="barometer almanac" href="w34barometeralmanac.php" data-lity ><?php echo $chartinfo?> Almanac</a></span>
<span class="yearpopup">  <a alt="yearly barometer" title="yearly barometer" href="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='barometerplot'&span='yearly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" data-lity ><?php echo $menucharticonpage?> Yearly </a></span>
<span class="todaypopup"> <a alt="weekly barometer" title="weekly barometer" href="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='barometerplot'&span='weekly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" data-lity ><?php echo $menucharticonpage?> Weekly </a></span>
      </div>
  <span class='moduletitle'><?php echo $lang['Barometer']," (<valuetitleunit>",$weather["barometer_units"]; ?></valuetitleunit>)</span><br />
         <div id="barometer"></div></div>
      <!--moonphase for homeweatherstation template includes reverse for southern hemisohere-->
<div class=weather-item><div class=chartforecast>
<?php if ($purpleairhardware=='yes'){echo''?>
  <span class="yearpopup">
<a alt="moonphase" title="moonphase" href=mooninfo.php data-lity><?php echo $chartinfo?> <?php echo $lang['Moon'],"Info";}?></a></span>  
<span class="yearpopup"><a alt="meteor showers" title="meteor showers" href="meteorshowers.php" data-lity><?php echo $meteorinfo;?> &nbsp;<?php if ($meteor_default=='No Meteor') {echo "Meteor Showers";} else {	echo $meteor_default;}?></a></span>
<span class="yearpopup"><a alt="aurora information" title="aurora information" href=aurora.php data-lity><?php echo $info;?> Aurora <?php if ($kp>=5) {echo '<oorange>Active</oorange>';}else {echo "";}?></a></span>


</div>
<span class='moduletitle'><?php echo $lang['Daylight']. " | ". $lang['Darkness'];?></span><br />
  <div id="moonphase"></div> </div></div></div>
 <!--rainfall for homeweatherstation template-->
<div class="weather-container"><div class="weather-item"><div class="chartforecast" >
<span class="yearpopup">  <a alt="almanac rainfall" title="almanac rainfall" href="w34rainfallalmanac.php" data-lity ><?php echo $chartinfo?> Almanac </a></span>
<span class="yearpopup">  <a alt="yearly rainfall" title="yearly rainfall" href="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='rainplot'&span='yearly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" data-lity ><?php echo $menucharticonpage?> Yearly </a></span>
<span class="todaypopup"> <a alt="monthly rainfall" title="monthly
rainfall" href="<?php echo $chartsource;?>/<?php echo
$theme1;?>-charts.html?chart='rainmonthplot'&span='weekly'&temp='<?php
echo $weather['temp_units'];?>'&pressure='<?php echo
$weather['barometer_units'];?>'&wind='<?php echo
$weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>"
data-lity ><?php echo $menucharticonpage?> Monthly </a></span>
  <span class="todaypopup"> <a alt="weekly rainfall" title="weekly rainfall" href="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='rainplot'&span='weekly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" data-lity ><?php echo $menucharticonpage?> Weekly </a></span>
      </div>
  <span class='moduletitle'><?php echo $lang['Rainfalltoday']," (<valuetitleunit>".$weather["rain_units"]?></valuetitleunit>)</span><br />
         <div id="rainfall"></div></div>       
         
  <!--position 12th module (second to last) for homeweatherstation template-->
  <div class="weather-item"><div class="chartforecast" >
  <span class="yearpopup">
<?php if ($position12=='webcamsmall.php' OR $position12=='indoortemperature.php' OR $position12=='moonphase.php'){echo'<span class="yearpopup"><a alt="Webcam " title="Webcam " href="cam.php" data-lity>'. $webcamicon. ' Live Webcam </a></span>
  <span class="yearpopup"> <a alt="Indoor Guide" title="Indoor Guide" href="homeindoor.php" data-lity>'. $chartinfo. ' Indoor Guide </a></span>
  <span class="yearpopup"> <a alt="Moon Info" title="Moon Info" href="mooninfo.php" data-lity>'. $chartinfo. ' Moon Info </a></span>';}
if ($position12=='airqualitymodule.php') {echo ' <span class="yearpopup"><a alt="air quality information" title="air quality information" href="purpleair.php" data-lity>'. $chartinfo. " Air Quality | Cloudbase </a></span>";}
if ($position12=='weather34uvsolar.php') {echo ' <span class="yearpopup"><a alt="UV Guide" title="UV Guide" href="uvindex.php" data-lity>'. $chartinfo. " UV Guide  </a></span>";} 
if ($position12=='weather34uvsolar.php') {echo ' <span class="yearpopup"><a alt="UV Almanac" title="UV Almanac" href="w34uvalmanac.php" data-lity>&nbsp;'. $chartinfo. " UV Almanac </a></span>";}
if ($position12=='weather34uvsolar.php') {echo '<span class="yearpopup"> <a alt="Solar Almanac" title="Solar Almanac" href="w34solaralmanac.php" data-lity>'. $chartinfo. " Solar Almanac </a></span>";}
if ($position12=='solaruvds.php') {echo ' <span class="yearpopup"><a alt="UV Guide" title="UV Guide" href="uvindexds.php" data-lity>'. $chartinfo. " UV Guide </a></span>";}
if ($position12=='solaruvds.php') {echo ' <span class="yearpopup"><a alt="Solar Almanac" title="Solar Almanac" href="w34solaralmanac.php" data-lity>'. $chartinfo. " Solar Almanac </a></span>";}
if ($position12=='solaruvwu.php') {echo ' <span class="yearpopup"><a alt="UV Guide" title="UV Guide" href="uvindexwu.php" data-lity>'. $chartinfo. " UV Guide </a></span>";}
if ($position12=='solaruvwu.php') {echo ' <span class="yearpopup"><a alt="Solar Almanac" title="Solar Almanac" href="w34solaralmanac.php" data-lity>'. $chartinfo. " Solar Almanac </a></span>";}
if ($position12=='solaruvwu.php') {echo ' <span class="yearpopup"><a alt="Solar Chart" title="Solar Chart" href="<?php echo $chartsource ;?>/todaysolar.php" data-lity>&nbsp;'. $menucharticonpage. " Solar chart </a></span>";}
if ($position12=='eq.php') {echo ' <span class="yearpopup"><a alt="Earthquakes Worldwide" title="Earthquakes Worldwide" href="eqlist.php" data-lity>'. $chartinfo. " Worldwide Earthquakes </a></span>";}?>
</div><span class='moduletitle'><a alt="Position12 Switcher" title="Position12 Switcher" href="updatesection.php?pos=position12"><img src="img/lightningalert.svg" width="10" height="10" align="right"/></a><?php echo $position12title?></span></span><div id="solar"></div></div>
 <!--position last module for homeweatherstation template-->
  <div class="weather-item"><div class="chartforecast" >
  <span class="yearpopup">
<?php if ($positionlastmodule=='webcamsmall.php' OR $positionlastmodule=='indoortemperature.php' OR $positionlastmodule=='moonphase.php'){
if(!(empty($webcamurl)&&empty($videoWeatherCamURL))) { echo'<span class="yearpopup"><a alt="Webcam " title="Webcam " href="cam.php" data-lity>'. $webcamicon. ' Live Webcam </a></span>';}
echo'  <span class="yearpopup"> <a alt="Indoor Guide" title="Indoor Guide" href="homeindoor.php" data-lity>'. $chartinfo. ' Indoor Guide </a></span>
  <span class="yearpopup"> <a alt="Moon Info" title="Moon Info" href="mooninfo.php" data-lity>'. $chartinfo. ' Moon Info </a></span>';}
if ($positionlastmodule=='airqualitymodule.php') {echo ' <span class="yearpopup"><a alt="air quality" title="air quality" href="aqipopup.php" data-lity>'. $chartinfo. " Air Quality | Cloudbase </a></span>";}
if ($positionlastmodule=='purpleairqualitymodule.php') {echo ' <span class="yearpopup"><a alt="air quality" title="air quality" href="purpleair.php" data-lity>'. $chartinfo. " Air Quality | Cloudbase </a></span>";}
if ($positionlastmodule=='weather34uvsolar.php') {echo ' <span class="yearpopup"><a alt="UV Guide" title="UV Guide" href="uvindex.php" data-lity>'. $chartinfo. " UV Guide  </a></span>";}
if ($positionlastmodule=='weather34uvsolar.php') {echo ' <span class="yearpopup"><a alt="UV Alamanac" title="UV Alamanac" href="w34uvalmanac.php" data-lity>&nbsp;'. $chartinfo. " UV Alamanac </a></span>";}
if ($positionlastmodule=='weather34uvsolar.php') {echo '<span class="yearpopup"> <a alt="Solar Alamanac" title="Solar Alamanac" href="w34solaralmanac.php" data-lity>'. $chartinfo. " Solar Alamanac </a></span>";}
if ($positionlastmodule=='solaruvds.php') {echo ' <span class="yearpopup"><a alt="UV Guide" title="UV Guide" href="uvindexds.php" data-lity>'. $chartinfo. " UV Guide </a></span>";}
if ($positionlastmodule=='solaruvds.php') {echo ' <span class="yearpopup"><a alt="Solar Alamanac" title="Solar Alamanac" href="w34solaralmanac.php" data-lity>'. $chartinfo. " Solar Alamanac </a></span>";}
if ($positionlastmodule=='solaruvwu.php') {echo ' <span class="yearpopup"><a alt="UV Guide" title="UV Guide" href="uvindexwu.php" data-lity>'. $chartinfo. " UV Guide </a></span>";}
if ($positionlastmodule=='solaruvwu.php') {echo ' <span class="yearpopup"><a alt="Solar Alamanac" title="Solar Alamanac" href="w34solaralmanac.php" data-lity>'. $chartinfo. " Solar Alamanac </a></span>";}
if ($positionlastmodule=='solaruvwu.php') {echo ' <span class="yearpopup"><a alt="Solar Chart" title="Solar Chart" href="<?php echo $chartsource ;?>/todaysolar.php" data-lity>&nbsp;' .$menucharticonpage. " Solar chart </a></span>";}
if ($positionlastmodule=='eq.php') {echo ' <span class="yearpopup"><a alt="Earthquakes Worldwide" title="Earthquakes Worldwide" href="eqlist.php" data-lity>'. $chartinfo. " Worldwide Earthquakes </a></span>";}
if ($positionlastmodule=='airqualitymodule.php') {echo '<span class="yearpopup"><a alt="Earthquakes Worldwide" title="Earthquakes Worldwide" href="eqlist.php" data-lity>'. $chartinfo. " Worldwide Earthquakes </a></span>";}
if ($positionlastmodule=='purpleairqualitymodule.php') {echo '<span class="yearpopup"><a alt="Earthquakes Worldwide" title="Earthquakes Worldwide" href="eqlist.php" data-lity>'. $chartinfo. " Worldwide Earthquakes </a></span>";}?>
</div><span class='moduletitle'><?php echo $positionlastmoduletitle?></span></span><div id="dldata"></div>
</div></div>
 <!--end outdoor data for homeweatherstation template-->
  <!--footer area for homeweatherstation template warning dont mess with this below this line unless you really know what you are doing-->
<div class=weatherfooter-container><div class=weatherfooter-item> 
<div class=hardwarelogo1>
<a href="http://weewx.com" alt="http://weewx.com" title="http://weewx.com">
  <?php
if ($livedataFormat== "WeeWX-W34"){echo '<img src="img/icon-weewx.svg" alt="WeeWX" title="WeeWX"  width="150px" height="55px" ><div class=hardwarelogo1text></div>';}
?></a> </div>
<div class=hardwarelogo2 ><?php
if ($weatherhardware== "Davis Vantage Vue"){echo '<img src="img/designedfordavisvue.svg" alt="Davis Instruments-Meteobridge" title="Davis Instruments-Meteobridge"  width="160px" height="65px" >';}
else if ($weatherhardware== "Davis Envoy8x"){echo '<img src="img/designedfordavisenvoy8x.svg" alt="Davis Instruments-Meteobridge" title="Davis Instruments-Meteobridge"  width="160px" height="65px" >';}
else if ($davis=="Yes"){echo '<img src="img/designedfor-1.svg" alt="Davis Instruments-Meteobridge" title="Davis Instruments-Meteobridge"  width="160px" height="65px" >';}else if ($weatherhardware=='Weatherflow Air-Sky'){echo '<a href="http://weatherflow.com/" title="http://weatherflow.com/" target="_blank"><img src="img/wflogo.svg" width="125px" height=65px alt="http://weatherflow.com/" ></a>';}
else echo '<a href="https://weather34.com/homeweatherstation/" title="https://weather34.com/homeweatherstation/" target="_blank"><br><img src="img/weather34logo.svg" width="40px" alt="https://weather34.com/homeweatherstation/" class="homeweatherstationlogo" ><weather34>designed by weather34 2015-'.date('Y').'</weather34></a>';?> </div>
<div class=footertext>
&nbsp;<?php echo $info?>&nbsp;(<value><?php echo $templateversion?></value>)&nbsp;
<?php echo "WeeWX";?>-(<value><maxred><?php echo $weather["swversion"];?></value>)&nbsp;
<?php echo $info."&nbsp;".$weatherhardware;?></div> 
<div class=footertext><?php echo $github;?>&nbsp;<?php echo "WeeWX Version Repository at https://github.com/steepleian/weewx-Weather34";?>  &nbsp; <img src="img/flags/<?php echo $flag ;?>.svg" width="20px" ></div>   
</div></div>
<div id=lightningalert></div></body><?php include_once('updater.php');include_once('menu.php')?></html>
