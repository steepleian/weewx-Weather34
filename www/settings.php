<?php
include "settings1.php";
error_reporting(0);
####################################################################################################
#	HOME WEATHER STATION TEMPLATE SETUP please set up and check thoroughly                         #
#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at https://weather34.com/homeweatherstation/index.html #
# 	   FILE= SETTINGS.PHP                                                                          #
# 	                                                                                               #
# 	WEATHER34 HOMEWEATHER METEOBRIDGE MYSQL                                                        #
#   https://www.weather34.com 	                                                                   #
####################################################################################################

###########################################################################
# THE SETIINGS BELOW MUST BE LEFT UNTOUCHED UNLESS YOU REALLY NEED  #######
# TO MAKE THE CHANGES HERE TO MAKE IT WORK ON YOUR SERVER// ###############
# TAKE THE TIME TO STUDY THEM DONT TAKE IT FOR GRANTED      ###############
# USE THE EASY SETUP PANEL TO MAKE CHANGES IN THE TEMPLATE  ###############
###########################################################################

$TZconf = $TZ; // PLEASE LEAVE it is fixed
$UTC_offset = timezone_offset_get(timezone_open($TZ), new DateTime()) / 3600; // DO NOT CHANGE
$api2 = "xxx"; // optional Weather Underground api key developer key '1234567890'
$rise_zenith = 90 + 40 / 60; // try 50/60 or something/60 until it matches correctly to your sunrise .this allows you to fine tune the sunrise
$set_zenith = 90 + 36 / 60; // try 50/60 or something/60 until it matches correctly to your sunset .this allows you to fine tune the sunset
$forecastlocation = $stationlocation; //
$version = $livedataFormat; // template version and type of source: Clientraw, MeteoBridge, Cumulus, etc (for display only)
$emailform = $email; // PLEASE LEAVE FIXED
$timeFormatShort = "H:i"; // time format to use when showing times ('g:i a' for '5:34 pm'; 'H:i' for '09:28')
$showFeelsLike = true; // whether to always show either the heat index (when temp > 80F/27C) or real feel (when temp between 50F/10C and 80F/27C) even when no concern
$lightLeft = true; // shows amount of light/darkness left rather than total amount per day in the moon display
$theme = $theme1;
$charttheme = $theme;
$livedata = "serverdata/w34realtime.txt";
####################################################################################################
// Refresh Data Main Page  //																	   #
// Automatic refresh times (in seconds) of each panel on the main dashboard						   #
####################################################################################################
$copyYear = 2015;
$curYear = date("Y");
$copyrightcredit =
    "&copy; weather34.com original CSS/SVG/PHP " .
    $copyYear .
    ($copyYear != $curYear ? "-" . $curYear : "Copyright");
$indoorRefresh = 600; // 10 minutes
$advisoryRefresh = 60; // 60 seconds
$tempRefresh = 60; // 60 seconds
$skyRefresh = 600; // 10 minutes
$windSpeedRefresh = 04; // 4 seconds
$baroRefresh = 300; // 5 minutes
$windDirRefresh = 04; // 4 seconds
$solarRefresh = 300; // 10 minutes
$moonRefresh = 300; // 30 minutes
$rainRefresh = 60; // 60 seconds
$p12Refresh = 600; // 10 minutes        Position 12 refresh (if not webcam)
$p13Refresh = 600; // 10 minutes        Last Postion refresh (if not webcam)
$moonphaseRefresh = 600; // 10 minutes
$eqRefresh = 600; // 10 minutes
$forecastRefresh = 900; // 15 minutes
$notificationcenterRefresh = 300; // 5 minutes set refresh time for notification of earthquakes default 5 minutes
$wuupdate = 1800; // 30 minutes
$wfupdate = 60; // weatherflow api 60 seconds
$camRefresh = 60; // 1 minute refresh on camera popup
// Thresholds for warnings or notifications
$notifyDistEQ = 300; // miles if $windunit is mph otherwise km
$notifyEQMag = 5; // set this to minimum magnitude of earthquake for notifications, typically 5 or 6, or you can set to 12 to switch off if not required
$notifyWindGust = 22; // knots; 22 knots, which is 40.7 km/h, 35 = 40.2 mph, 40 = 20.5  m/s
$notifyHeatIndex = 30; // degrees C, default is 30 celsius which is 86 degrees F
$notifyWindchill = 3; // degrees C, default is 10 celsius which is 50 degrees F
$notifyFeelslike = 3; // degrees C, default is 10 celsius which is 50 degrees F
$notifyDewpointcold = 3; // degrees C, default is 8 celsius 46.4 degrees F OR WHATEVER MAKES YOU FEEL COLDER
$notifyRainRate = 7.62; // millimeters, default is 10 which is 0.4 in"
$notifyDewPoint = 21; // dewpoint comfortable zone alert 22 degrees C or 71.6 degrees F OR WHATEVER MAKES YOU FEEL UNCOMFORTABLY HOT
$notifyFlooding = 25.4; // dewpoint comfortable zone alert 22 degrees C or 71.6 degrees F OR WHATEVER MAKES YOU FEEL UNCOMFORTABLY HOT

####################################################################################################
// Probably won't have to change anything past this line IF SO BE VER VERY CAREFUL!!!!!!		   #
####################################################################################################
$scriptcredits =
    "Original CSS/SVG ICONS/PHP scripts by <a href='https://weather34.com' title='weather34.com' target='_blank'>weather34.com 2015 - " .
    date("Y") .
    ""; // for modules
$creditsEnabled = "true"; // for chart pages only
$creditsmysql = "Weather Data Recorded from $stationName Database"; //for chart pages only
$wucredits = "Data provided by Weather Underground"; // for chart pages only
$chartsource = "w34highcharts";
$creditsURL = ""; // for chart pages only
$credits = "Data Supplied via Weather Underground"; // for chart pages only
$templateinfo = ""; // template information page
$templateversion = "W34-<maxblue>4.3.0</maxblue>";

$software = "WeeWX <span>Hardware</span> Users";
$designedfor = "<br>For WeeWX Users";
$chartversion = "(WUDATACHARTS)";
$somethinggoeshere = "d4586dec-e7a2-47ae-99b6-25527b2563c9";
$chartversionmysql = "(DATACHARTS WeeWX Database Version)";
if (
    array_key_exists("theme", $_GET) &&
    ($_GET["theme"] == "dark" || $_GET["theme"] == "light")
) {
    SetCookie("theme", $_GET["theme"], time() + 15552000);
    $theme = $_GET["theme"];
} elseif (
    array_key_exists("theme", $_COOKIE) &&
    ($_COOKIE["theme"] == "dark" || $_COOKIE["theme"] == "light")
) {
    $theme = $_COOKIE["theme"];
}
$units = "";
if (array_key_exists("units", $_COOKIE)) {
    $units = $_COOKIE["units"];
}
ini_set("session.use_cookies", "0");
if (
    array_key_exists("units", $_GET) &&
    ($_GET["units"] == "default" || $_GET["units"] == "")
) {
    SetCookie("units", $_GET["units"], time() - 86400); //86400 = 1 day, negative time erases cookie
    $units = "";
} elseif (
    array_key_exists("units", $_GET) &&
    ($_GET["units"] == "us" ||
        $_GET["units"] == "ca" ||
        $_GET["units"] == "uk" ||
        $_GET["units"] == "metric" ||
        $_GET["units"] == "scandinavia")
) {
    SetCookie("units", $_GET["units"], time() + 15552000);
    $units = $_GET["units"];
}
if ($units == "uk") {
    $cloudcoverunit = "%";
    $windunit = "mph";
    $tempunit = "C";
    $rainunit = "mm";
    $pressureunit = "hPa";
    $windconv = "0.621371";
    $rainfallconv = "10";
    $pressureinterval = "0.5";
    $rainfallconvmm = "10";
} elseif ($units == "scandinavia") {
    $windunit = "m/s";
    $tempunit = "C";
    $rainunit = "mm";
    $pressureunit = "hPa";
    $windconv = "0.277778";
    $rainfallconv = "10";
    $pressureinterval = "0.5";
    $rainfallconvmm = "10";
} elseif ($units == "metric") {
    $windunit = "km/h";
    $tempunit = "C";
    $rainunit = "mm";
    $pressureunit = "hPa";
    $windconv = "1";
    $rainfallconv = "10";
    $pressureinterval = "0.5";
    $rainfallconvmm = "10";
} elseif ($units == "ca") {
    $windunit = "km/h";
    $tempunit = "C";
    $rainunit = "mm";
    $pressureunit = "kPa";
    $windconv = "1";
    $rainfallconv = "10";
    $pressureinterval = "0.5";
    $rainfallconvmm = "10";
} elseif ($units == "us") {
    $windunit = "mph";
    $tempunit = "F";
    $rainunit = "in";
    $pressureunit = "inHg";
    $windconv = "1";
    $rainfallconv = "1";
    $pressureinterval = "0.5";
    $rainfallconvmm = "1";
}
?>

