<?php
//###################################################################################################################
//	weewx-Weather34 Template maintained by Ian Millard (Steepleian)
//
//  Contains original legacy code (by agreement) created and developed by Brian Underdown (https://weather34.com)
//  for the (now superseeded) original Weather34 Template which is no longer maintained by its creator
//  © weather34.com original CSS/SVG/PHP 2015-2019
//
//  Contains original code by Ian Millard and collaborators
//  © claydonsweather.org.uk original CSS/SVG/PHP 2020-2021
//
// 	Issues for weewx-Weather34 template should be addressed to https://github.com/steepleian/weewx-Weather34/issues
//
//###################################################################################################################
if (!file_exists("settings1.php")) {
    copy("initial_settings1.php", "settings1.php");
}
include_once "w34CombinedData.php";
include_once "common.php";
include_once "webserver_ip_address.php";
include "settings1.php";
include "settings.php";
date_default_timezone_set($TZ);
$cloud_region = explode("/", $TZ);
?>
<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $stationlocation; ?> Weather Station</title> 
<meta content="Home weather station providing current weather conditions for <?php echo $stationlocation; ?>" name="description">
<!--Google / Search Engine Tags -->
<meta itemprop="name" content="Home Weather Station <?php echo $stationlocation; ?>">
<meta itemprop="description" content="Home weather station providing current weather conditions for <?php echo $stationlocation; ?>">
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
<link href="css/main.<?php echo $theme; ?>.css?version=<?php echo filemtime(
    "css/main." . $theme . ".css"
); ?>" rel="stylesheet prefetch">
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
  <div class="weather34box clock">  <div class="title"><?php echo $info; ?> <?php echo $position1title; ?> </div><div class="value"><div id="position1"></div></div></div>
   <!-- position2--->
  <div class="weather34box indoor"> <div class="title"><?php echo $info; ?> <?php echo $position2title; ?> </div><div class="value"><div id="position2"></div></div></div>
  <!-- position3--->
  <div class="weather34box earthquake"> <div class="title"><?php echo $info; ?> <?php echo $position3title; ?> </div><div class="value"><div id="position3"></div></div></div>
  <!-- position4--->
  <!-- <div class="weather34box alert" style="color: <?php echo $meteoalert; ?>"><div class="alertBackdrop" style="border: 10px solid <?php echo $meteoalert; ?>; width: 236px; margin-top: 15px; margin-left: -5px; height: 61px; color: black; "></div> -->
    <!--<div class="title"><?php echo $info; ?> <?php echo $position4title; ?> </div><div class="value"><div id="position4"></div></div></div>-->
  <div class="weather34box alert"><div class="title"><?php echo $info; ?> <?php echo $position4title; ?> </div><div class="value"><div id="position4"></div></div></div>
</div></div></div></div>
<!--end position section for homeweatherstation template-->

<!--begin outside/station data section for homeweatherstation template-->
<!--begin outside/station data section for homeweatherstation template-->
<div class="weather-container"><div class="weather-item"><div class="chartforecast">
<!--<span <span class="yearpopup">  <a alt="temp charts" title="temp charts" href="pop_tempalmanac.php" data-lity ><?php echo $menucharticonpage; ?> Temperature Almanac and Derived Charts</a></span>-->
  
<!--<span class="yearpopup">  <a alt="yearly temperature" title="yearly temperature" href="<?php echo $chartsource; ?>/<?php echo $theme1; ?>-charts.html?chart='temperatureplot'&span='yearly'&temp='<?php echo $weather[
    "temp_units"
]; ?>'&pressure='<?php echo $weather[
    "barometer_units"
]; ?>'&wind='<?php echo $weather["wind_units"]; ?>'&rain='<?php echo $weather[
    "rain_units"
]; ?>" data-lity ><?php echo $menucharticonpage; ?> Yearly</a></span>-->
<span <span class="yearpopup">  <a alt="temp charts" title="temp charts" href="pop_menu_temperature.php" data-lity ><?php echo $menucharticonpage; ?> Temperature Almanac and Derived Charts</a></span>

  <!--<a alt="yearly Feels" title="yearly Feels" href="<?php echo $chartsource; ?>/<?php echo $theme1; ?>-charts.html?chart='tempderivedplot'&span='yearly'&temp='<?php echo $weather[
    "temp_units"
]; ?>'&pressure='<?php echo $weather[
    "barometer_units"
]; ?>'&wind='<?php echo $weather["wind_units"]; ?>'&rain='<?php echo $weather[
    "rain_units"
]; ?>" data-lity > <?php echo "| Feels"; ?> </a></span>-->
<!--<a alt="yearly humidity" title="yearly humidity" href="<?php echo $chartsource; ?>/<?php echo $theme1; ?>-charts.html?chart='humidityplot'&span='yearly'&temp='<?php echo $weather[
    "temp_units"
]; ?>'&pressure='<?php echo $weather[
    "barometer_units"
]; ?>'&wind='<?php echo $weather["wind_units"]; ?>'&rain='<?php echo $weather[
    "rain_units"
]; ?>" data-lity > <?php echo "| Hum"; ?> </a></span> --> 
<!--<span class="todaypopup"> <a alt="weekly temperature" title="weekly temperature" href="<?php echo $chartsource; ?>/<?php echo $theme1; ?>-charts.html?chart='tempallplot'&span='weekly'&temp='<?php echo $weather[
    "temp_units"
]; ?>'&pressure='<?php echo $weather[
    "barometer_units"
]; ?>'&wind='<?php echo $weather["wind_units"]; ?>'&rain='<?php echo $weather[
    "rain_units"
]; ?>" data-lity >  <?php echo $menucharticonpage; ?> Weekly </a></span>-->
<!--<a alt="weekly Feels" title="weekly Feels" href="<?php echo $chartsource; ?>/<?php echo $theme1; ?>-charts.html?chart='tempderivedplot'&span='weekly'&temp='<?php echo $weather[
    "temp_units"
]; ?>'&pressure='<?php echo $weather[
    "barometer_units"
]; ?>'&wind='<?php echo $weather["wind_units"]; ?>'&rain='<?php echo $weather[
    "rain_units"
]; ?>" data-lity > <?php echo "| Feels"; ?> </a></span>-->
<!--<a alt="weekly humidity" title="weekly humidity" href="<?php echo $chartsource; ?>/<?php echo $theme1; ?>-charts.html?chart='humidityplot'&span='weekly'&temp='<?php echo $weather[
    "temp_units"
]; ?>'&pressure='<?php echo $weather[
    "barometer_units"
]; ?>'&wind='<?php echo $weather["wind_units"]; ?>'&rain='<?php echo $weather[
    "rain_units"
]; ?>" data-lity > <?php echo "| Hum"; ?> </a></span>-->
      </div>
<span class='moduletitle'> <?php echo $lang[
    "Temperature"
]; ?> (<valuetitleunit>&deg;<?php echo $weather[
     "temp_units"
 ]; ?></valuetitleunit>) </span><br /></span>
  <div id="temperature"></div><br></div>
  <!--forecast for homeweatherstation template-->
<?php $percentage = "98%"; ?>
<div class="weather-item"><div class="chartforecast">
<span class="yearpopup">
  
<?php if (
    $position6 == "forecast3wu.php" ||
    $position6 == "forecast3wularge.php"
) {
    echo ' <a alt="wu weather forecast" title="weather underground forecast" href="pop_outlookwu.php" data-lity>' .
        $chartinfo .
        " Daily F.cast </a>";
} ?>
<?php if (
    $position6 == "forecast3aw.php" ||
    $position6 == "forecast3awlarge.php"
) {
    echo ' <a alt="Forecasts" title="Forecasts" href="pop_menu_forecast.php" data-lity style="padding-top:98%">' .
        $chartinfo .
        " Forecasts </a>";
} ?>

<?php if (
    $position6 == "forecast3awlarge.php" &&
    $position4 == "top_advisory_eu.php"
) {
    echo '<a alt="Europe Alerts" title="Europe Alerts" href="pop_europealerts.php"  data-lity>&nbsp;' .
        $chartinfo .
        " Weather Alerts</a>";
} ?></span>
<?php if (
    $position6 == "forecast3awlarge.php" &&
    $position4 == "top_advisory_uk.php"
) {
    echo '<a alt="MetOffice Warnings" title="MetOffice Warnings" href="pop_ukalerts.php"  data-lity>&nbsp;' .
        $chartinfo .
        " Weather Alerts</a>";
} ?></span>
<?php if (
    $position6 == "forecast3awlarge.php" &&
    $position4 == "top_advisory_au.php"
) {
    echo '<a alt="BOM warnings" title="BOM Warnings" href="pop_bom_alerts.php"  data-lity>&nbsp;' .
        $chartinfo .
        " Australian BOM Alerts</a>";
} ?></span>

<?php if (
    $position6 == "forecast3aw.php" &&
    $position4 == "top_advisory_eu.php"
) {
    echo '<a alt="Europe Alerts" title="Europe Alerts" href="pop_europealerts.php"  data-lity>&nbsp;' .
        $chartinfo .
        " Weather Alerts</a>";
} ?></span>
<?php if (
    $position6 == "forecast3aw.php" &&
    $position4 == "top_advisory_uk.php"
) {
    echo '<a alt="MetOffice Warnings" title="MetOffice Warnings" href="pop_ukalerts.php"  data-lity>&nbsp;' .
        $chartinfo .
        " Weather Alerts</a>";
} ?></span>
<?php if (
    $position6 == "forecast3aw.php" &&
    $position4 == "top_advisory_au.php"
) {
    echo '<a alt="BOM warnings" title="BOM Warnings" href="pop_bom_alerts.php"  data-lity>&nbsp;' .
        $chartinfo .
        " Australian BOM Alerts</a>";
} ?></span>
<?php if (
    $position6 == "forecast3aw.php" &&
    $position4 == "top_advisory_nws.php"
) {
    echo '<a alt="NWS warnings" title="NWS Warnings" href="pop_nwsalerts.php"  data-lity>&nbsp;' .
        $chartinfo .
        " USA NWS Alerts</a>";
} ?></span>
  
      </div>
  <span class='moduletitle'>
    <?php echo $position6title; ?>  (<valuetitleunit>&deg;<?php echo $weather[
      "temp_units"
  ]; ?></valuetitleunit>)  </span><br />
  <div id="currentfore"></div></div>
  <!--currentsky for homeweatherstation template-->
  <div class="weather-item"><div class="chartforecast">
         <!-- HOURLY & Outlook for homeweather station-->
  <span class="yearpopup"> <a alt="nearby metar station" title="nearby metar station" href="pop_metarnearby.php" data-lity><?php echo $chartinfo; ?> <?php echo "Nearby Metar"; ?> <?php if (
     filesize("jsondata/me.txt") < 160
 ) {
     echo "(<ored>Offline</ored>)";
 } else {
     echo "";
 } ?></a></span>
  <span class="monthpopup"><a href="pop_windyradar.php" title="Windy.com Radar" alt="Windy.com Radar" data-lity><?php echo $chartinfo; ?> Radar</a></span>
  <span class="monthpopup"><a href="pop_windywind.php" title="Windy.com Wind Map" alt="Windy.com Wind Map" data-lity><?php echo $chartinfo; ?> Wind Map</a></span>

  <span class="todaypopup">

<a alt="cloud cover" title="cloud cover" href="<?php echo $chartsource; ?>/<?php echo $theme1; ?>-charts.html?chart='cloudcoverplot'&span='weekly'&temp='<?php echo $weather[
    "temp_units"
]; ?>'&pressure='<?php echo $weather[
    "barometer_units"
]; ?>'&wind='<?php echo $weather["wind_units"]; ?>'&rain='<?php echo $weather[
    "rain_units"
]; ?>" data-lity ><?php echo $menucharticonpage; ?> Cloud Cover</a></span>
</span>
  
  </div>
  <span class='moduletitle'><?php echo $lang["Currentsky"]; ?></span><br />
  <div id="currentsky"></div></div></div>
 <!--windspeed for homeweatherstation template-->
<?php if ($weather["wind_units"] == "kts") {
    $weather["wind_units"] = "kn";
} ?>
<div class="weather-container"><div class="weather-item"><div class="chartforecast">
<span class="yearpopup">  <a alt="wind charts" title="wind charts" href="pop_menu_wind.php" data-lity ><?php echo $menucharticonpage; ?> Wind Almanac and Charts</a></span>
      </div>
  <span class='moduletitle'><?php echo $lang[
      "Direction"
  ]; ?> | <?php echo $lang["Windspeed"],
     " (<valuetitleunit>",
     $weather["wind_units"]; ?></valuetitleunit>)</span><br />
         <div id="windspeed"></div></div>
       <!--barometer for homeweatherstation template-->
  <div class="weather-item"><div class="chartforecast" >
<span class="yearpopup">  <a alt="barometer charts" title="barometer charts" href="pop_menu_barometer.php" data-lity ><?php echo $menucharticonpage; ?> Barometer Almanac and Charts</a></span>
      </div>
  <span class='moduletitle'><?php echo $lang["Barometer"],
      " (<valuetitleunit>",
      $weather["barometer_units"]; ?></valuetitleunit>)</span><br />
         <div id="barometer"></div></div>
      <!--moonphase for homeweatherstation template includes reverse for southern hemisohere-->
<div class=weather-item><div class=chartforecast>
<?php if ($purpleairhardware == "yes") {
    echo ""; ?>
  <span class="yearpopup">
<a alt="moonphase" title="moonphase" href=mooninfo.php data-lity><?php echo $chartinfo; ?> <?php echo $lang[
    "Moon"
],
     "Info";
} ?></a></span>  
<span class="yearpopup"><a alt="meteor showers" title="meteor showers" href="pop_meteorshowers.php" data-lity><?php echo $meteorinfo; ?> &nbsp;<?php if (
     $meteor_default == "No Meteor"
 ) {
     echo "Meteor Showers";
 } else {
     echo $meteor_default;
 } ?></a></span>
<span class="yearpopup"><a alt="aurora information" title="aurora information" href=pop_aurora.php data-lity><?php echo $info; ?> Aurora <?php if (
     $kp >= 5
 ) {
     echo "<oorange>Active</oorange>";
 } else {
     echo "";
 } ?></a></span>
</div>
<span class='moduletitle'><?php echo $lang["Daylight"] .
    " | " .
    $lang["Darkness"]; ?></span><br />
  <div id="moonphase"></div> </div></div></div>
 <!--rainfall for homeweatherstation template-->
<div class="weather-container"><div class="weather-item"><div class="chartforecast" >
<span class="yearpopup">  <a alt="rain charts" title="rain charts" href="pop_menu_rain.php" data-lity ><?php echo $menucharticonpage; ?> Rainfall Almanac and Charts</a></span>      </div>
  <span class='moduletitle'><?php echo $lang["Rainfalltoday"],
      " (<valuetitleunit>" .
          $weather["rain_units"]; ?></valuetitleunit>)</span><br />
         <div id="rainfall"></div></div>       
         
  <!--position 12th module (second to last) for homeweatherstation template-->
  <div class="weather-item"><div class="chartforecast" >
  <span class="yearpopup">
<?php
if ($position12 == "webcamsmall.php" && $dayPartCivil == "night") {
    $position12 = "moonphase.php";
    $position12title = "Moonphase";
}
if (
    $position12 == "webcamsmall.php" or
    $position12 == "indoortemperature.php" or
    $position12 == "moonphase.php"
) {
    echo '<span class="yearpopup"><a alt="Webcam " title="Webcam " href="pop_cam.php" data-lity>' .
        $webcamicon .
        ' Time Lapse Camera </a></span>
  <span class="yearpopup"> <a alt="Indoor Guide" title="Indoor Guide" href="pop_homeindoor.php" data-lity>' .
        $chartinfo .
        ' Indoor Guide </a></span>
  <span class="yearpopup"> <a alt="Moon Info" title="Moon Info" href="pop_mooninfo.php" data-lity>' .
        $chartinfo .
        " Moon Info </a></span>";
}
if ($position12 == "airqualitymodule.php") {
    echo ' <span class="yearpopup"><a alt="air quality information" title="air quality information" href="purpleair.php" data-lity>' .
        $chartinfo .
        " Air Quality | Cloudbase </a></span>";
}
if ($position12 == "weather34uvsolar.php") {
    echo ' <span class="yearpopup"><a alt="solar" title="UV Guide" href="pop_menu_solar.php" data-lity>' .
        $chartinfo .
        " UV and Solar Almanacs and Guides  </a></span>";
}
if ($position12 == "solaruvwu.php") {
    echo ' <span class="yearpopup"><a alt="UV Guide" title="UV Guide" href="uvindexwu.php" data-lity>' .
        $chartinfo .
        " UV Guide </a></span>";
}
if ($position12 == "solaruvwu.php") {
    echo ' <span class="yearpopup"><a alt="Solar Almanac" title="Solar Almanac" href="wpop_solaralmanac.php" data-lity>' .
        $chartinfo .
        " Solar Almanac </a></span>";
}
if ($position12 == "solaruvwu.php") {
    echo ' <span class="yearpopup"><a alt="Solar Chart" title="Solar Chart" href="<?php echo $chartsource ;?>/todaysolar.php" data-lity>&nbsp;' .
        $menucharticonpage .
        " Solar chart </a></span>";
}
if ($position12 == "lightning34.php") {
    echo '<span class="yearpopup"><a 
alt="Lightning Strike Almanac" title="Almanac 
Lightning"href="pop_lightningalmanac.php". data-lity>' .
        $chartinfo .
        " Strike Almanac </a></span>";
}
if ($position12 == "eq.php") {
    echo ' <span class="yearpopup"><a alt="Earthquakes Worldwide" title="Earthquakes Worldwide" href="pop_eqlist.php" data-lity>' .
        $chartinfo .
        " Worldwide Earthquakes </a></span>";
}
if ($position12 == "eq_uk.php") {
    echo ' <span class="yearpopup" scrolling="no"><a alt="Earthquakes UK" title="Earthquakes UK" href="pop_eqlist.php" data-lity>' .
        $chartinfo .
        " UK Earthquakes </a></span>";
}
?>
</div><span class='moduletitle'><a alt="Position12 Switcher" title="Position12 Switcher" href="updatesection.php?pos=position12"><img src="img/lightningalert.svg" width="10" height="10" align="right"/></a><?php echo $position12title; ?></span></span><div id="solar"></div></div>
 <!--position last module for homeweatherstation template-->
  <div class="weather-item"><div class="chartforecast" >
  <span class="yearpopup">
<?php
if ($positionlastmodule == "webcamsmall.php" && $dayPartCivil == "night") {
    $positionlastmodule = "moonphase.php";
    $positionlastmoduletitle = "Moonphase";
}
if (
    $positionlastmodule == "webcamsmall.php" or
    $positionlastmodule == "indoortemperature.php" or
    $positionlastmodule == "moonphase.php"
) {
    if (!(empty($webcamurl) && empty($videoWeatherCamURL))) {
        echo '<span class="yearpopup"><a alt="Webcam " title="Webcam " href="pop_cam.php" data-lity>' .
            $webcamicon .
            " Timelapse Camera </a></span>";
    }
    echo '  <span class="yearpopup"> <a alt="Indoor Guide" title="Indoor Guide" href="pop_homeindoor.php" data-lity>' .
        $chartinfo .
        ' Indoor Guide </a></span>
  <span class="yearpopup"> <a alt="Moon Info" title="Moon Info" href="pop_mooninfo.php" data-lity>' .
        $chartinfo .
        " Moon Info </a></span>";
}
if ($positionlastmodule == "airqualitymodule.php") {
    echo ' <span class="yearpopup"><a alt="air quality" title="air quality" href="aqipopup.php" data-lity>' .
        $chartinfo .
        " Air Quality | Cloudbase </a></span>";
}
if (
    $positionlastmodule == "purpleairqualitymodule.php" or
    $positionlastmodule == "ew_airqualitymodule.php"
) {
    echo ' <span class="yearpopup"><a alt="air quality" title="air quality" href="pop_airqualityinfo.php" data-lity>' .
        $chartinfo .
        " Air Quality | Cloudbase </a></span>";
}
if ($positionlastmodule == "weather34uvsolar.php") {
    echo ' <span class="yearpopup"><a alt="solar" title="UV Guide" href="pop_menu_solar.php" data-lity>' .
        $chartinfo .
        " UV and Solar Almanacs and Guides  </a></span>";
}
if ($positionlastmodule == "solaruvwu.php") {
    echo ' <span class="yearpopup"><a alt="UV Guide" title="UV Guide" href="uvindexwu.php" data-lity>' .
        $chartinfo .
        " UV Guide </a></span>";
}
if ($positionlastmodule == "solaruvwu.php") {
    echo ' <span class="yearpopup"><a alt="Solar Alamanac" title="Solar Alamanac" href="w34solaralmanac.php" data-lity>' .
        $chartinfo .
        " Solar Alamanac </a></span>";
}
if ($positionlastmodule == "solaruvwu.php") {
    echo ' <span class="yearpopup"><a alt="Solar Chart" title="Solar Chart" href="<?php echo $chartsource ;?>/todaysolar.php" data-lity>&nbsp;' .
        $menucharticonpage .
        " Solar chart </a></span>";
}
if ($positionlastmodule == "lightning34.php") {
    echo '<span class="yearpopup"><a 
alt="Lightning Strike Almanac" title="Almanac 
Lightning"href="pop_lightningalmanac.php". data-lity>' .
        $chartinfo .
        " Strike Almanac </a></span>";
}
if ($positionlastmodule == "eq.php") {
    echo ' <span class="yearpopup"><a alt="Earthquakes Worldwide" title="Earthquakes Worldwide" href="pop_eqlist.php" data-lity>' .
        $chartinfo .
        " Worldwide Earthquakes </a></span>";
}
if ($positionlastmodule == "eq_uk.php") {
    echo ' <span class="yearpopup"><a alt="Earthquakes UK" title="Earthquakes UK" href="pop_eqlist_uk.php" data-lity>' .
        $chartinfo .
        " UK Earthquakes </a></span>";
}
if ($positionlastmodule == "purpleairqualitymodule.php") {
    echo '<span class="yearpopup"><a alt="Earthquakes Worldwide" title="Earthquakes Worldwide" href="eqlist.php" data-lity>' .
        $chartinfo .
        " Worldwide Earthquakes </a></span>";
}
?>
    
</div><span class='moduletitle'><?php echo $positionlastmoduletitle; ?></span></span><div id="dldata"></div>
</div></div>
 <!--end outdoor data for homeweatherstation template-->
  <!--footer area for homeweatherstation template warning dont mess with this below this line unless you really know what you are doing-->
<div class=weatherfooter-container><div class=weatherfooter-item> 
<div class=hardwarelogo1>
<a href="http://weewx.com" alt="http://weewx.com" title="http://weewx.com">
  <?php echo '<img src="img/icon-weewx.svg" alt="WeeWX" title="WeeWX"  width="150px" height="55px" ><div class=hardwarelogo1text></div>'; ?></a> </div>
<div class=hardwarelogo2 ><?php if ($weatherhardware == "Davis Vantage Vue") {
    echo '<img src="img/designedfordavisvue.svg" alt="Davis Instruments-Meteobridge" title="Davis Instruments-Meteobridge"  width="160px" height="65px" >';
} elseif ($sta["hardware"] == "Davis Envoy8x") {
    echo '<img src="img/designedfordavisenvoy8x.svg" alt="Davis Instruments-Meteobridge" title="Davis Instruments-Meteobridge"  width="160px" height="65px" >';
} elseif (strpos($sta["hardware"], "Davis") !== false) {
    echo '<img src="img/designedfor-1.svg" alt="Davis Instruments-Meteobridge" title="Davis Instruments-Meteobridge"  width="160px" height="65px" >';
} elseif ($sta["hardware"] == "Weatherflow Air-Sky") {
    echo '<a href="http://weatherflow.com/" title="http://weatherflow.com/" target="_blank"><img src="img/wflogo.svg" width="125px" height=65px alt="http://weatherflow.com/" ></a>';
} else {
    echo '<a href="https://weather34.com/homeweatherstation/" title="https://weather34.com/homeweatherstation/" target="_blank"><br><img src="img/weather34logo.svg" width="40px" alt="https://weather34.com/homeweatherstation/" class="homeweatherstationlogo" ><weather34>designed by weather34 2015-' .
        date("Y") .
        "</weather34></a>";
} ?> </div>
<div class=footertext>
&nbsp;<?php echo $info; ?>&nbsp;(<value><?php echo $templateversion; ?></value>)&nbsp;
<?php echo "WeeWX"; ?>-(<value><maxred><?php echo $weather[
    "swversion"
]; ?></value>)&nbsp;
<?php echo $info . "&nbsp;" . $sta["hardware"]; ?></div> 
<div class=footertext><a href="https://github.com/steepleian/weewx-Weather34"><?php echo $github; ?>&nbsp; WeeWX Version Repository at https://github.com/steepleian/weewx-Weather34 &nbsp; <img src="img/flags/<?php echo $flag; ?>.svg" width="20px" ></a></div>
  <div class=footertext><a href="https://hjelp.yr.no/hc/en-us/articles/203786121-Weather-symbols-on-Yr">Weather Symbols by <img src="img/yr.svg" width="14px" ></a></div>

</div></div>
<div id=lightningalert></div></body><?php
include_once "updater.php";
include_once "menu.php";
?></html>

