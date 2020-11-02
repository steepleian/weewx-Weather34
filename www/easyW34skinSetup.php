<?php
include('settings1.php');
$iicon = '<svg id="i-info" viewBox="0 0 32 32" width="10" height="10" fill="rgba(24, 25, 27, 0.8)" stroke="rgba(24, 25, 27, 0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16.25%">
<path d="M16 14 L16 23 M16 8 L16 10" />
<circle cx="16" cy="16" r="14" />
</svg>';
$oiicon = '<svg id="i-info" viewBox="0 0 32 32" width="10" height="10" fill="#FF793A" stroke="#FF793A" stroke-linecap="round" stroke-linejoin="round" stroke-width="16.25%">
<path d="M16 14 L16 23 M16 8 L16 10" /><circle cx="16" cy="16" r="14" /></svg>';
$rightchevron = '<svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
<path d="M12 30 L24 16 12 2" />
</svg>';
$downchevron = '<svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
<path d="M30 12 L16 24 2 12" />
</svg>';
$_POST["showDate"] = "false";



// HOMEWEATHERSTATION EASY SETUP AUGUST 2016 //
 // SIMPLE EASY PHP BASED AND CSS //
 // DEVELOPED BY BRIAN UNDERDOWN //
 // RELEASED NOVEMBER 2016 //
 // Meteobridge //
 //original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
 //This version adapted for WeeWX by Ian Millard 2020



IF (ISSET($_POST["Submit"])) {

$string = '<?php
$weatherflowID = "'. $_POST["wfid"]. '";
$weatherflowoption   = "'. $_POST["weatherflowoption"]. '";
$weatherflowlightning = "'. $_POST["wfli"]. '";
$weatherflowmapzoom   = "'. $_POST["weatherflowmapzoom"]. '";
$purpleairhardware   = "'. $_POST["purpleairhardware"]. '";
$TZ = "'. $_POST["TZ"]. '";
$UTC = "'. $_POST["UTC"]. '";
$lon = '. $_POST["lon"]. ';
$lat = '. $_POST["lat"]. ';
$stationlocation = "'. $_POST["stationlocation"]. '";
$stationName = "'. $_POST["stationName"]. '";
$moonadj = "'. $_POST["moonadj"]. '";
$unit = "'. $_POST["unit"]. '";
$metric = '. $_POST["metric"]. ';
$elevation = "'. $_POST["elevation"]. '";
$uk = '. $_POST["uk"]. ';
$usa = '. $_POST["usa"]. ';
$scandinavia = '. $_POST["scandinavia"]. ';
$restoftheworld = '. $_POST["restoftheworld"]. ';
$windunit = "'. $_POST["windunit"]. '";
$distanceunit = "'. $_POST["distanceunit"]. '";
$tempunit = "'. $_POST["tempunit"]. '";
$rainunit  = "'. $_POST["rainunit"]. '";
$rainrate = "'. $_POST["rainrate"]. '";
$pressureunit  = "'. $_POST["pressureunit"]. '";
$livedataFormat = "'. $_POST["livedataFormat"]. '";
$livedata   = "'. $_POST["livedata"]. '";
$chartsource   = "'. $_POST["chartsource"]. '";
$extralinks   = "'. $_POST["extralinks"]. '";
$languages   = "'. $_POST["languages"]. '";
$dateFormat   = "'. $_POST["dateFormat"]. '";
$timeFormat    = "'. $_POST["timeFormat"]. '";
$timeFormatShort    = "'. $_POST["timeFormatShort"]. '";
$clockformat    = "'. $_POST["clockformat"]. '";
$showDate = '. $_POST["showDate"]. ';
$temperaturemodule   = "'. $_POST["temperaturemodule"]. '";
$position1   = "'. $_POST["position1"]. '";
$position2   = "'. $_POST["position2"]. '";
$position3   = "'. $_POST["position3"]. '";
$position4   = "'. $_POST["position4"]. '";
$position1title   = "'. $_POST["position1title"]. '";
$position2title   = "'. $_POST["position2title"]. '";
$position3title   = "'. $_POST["position3title"]. '";
$position4title   = "'. $_POST["position4title"]. '";
$position6title   = "'. $_POST["position6title"]. '";
$position6   = "'. $_POST["position6"]. '";
$position12title   = "'. $_POST["position12title"]. '";
$position12   = "'. $_POST["position12"]. '";
$positionlastmoduletitle   = "'. $_POST["positionlastmoduletitle"]. '";
$positionlastmodule   = "'. $_POST["positionlastmodule"]. '";
$webcamurl   = "'. $_POST["webcamurl"]. '";
$videoWeatherCamURL  = "'.$_POST["videoWeatherCamURL"].'";
$email    = "'. $_POST["email"]. '";
$twitter   = "'. $_POST["twitter"]. '";
$theme1   = "'. $_POST["theme1"]. '";
$since    = "'. $_POST["since"]. '";
$weatherhardware   = "'.$_POST["weatherhardware"]. '";
$davis   = "'.$_POST["davis"]. '";
$sunoption = "'. $_POST["sunoption"]. '";
$hemisphere   = "'. $_POST["hemisphere"]. '";
$metar   = "'. $_POST["metar"]. '";
$icao1   = "'. $_POST["icao1"]. '";
$airport1   = "'. $_POST["airport1"]. '";
$airport1dist   = "'. $_POST["airport1dist"]. '";
$defaultlanguage   = "'.$_POST["defaultlanguage"]. '";
$language    = "'.$_POST['language']. '";
$password    = "'.$_POST['password']. '";
$flag   = "'.$_POST["flag"]. '";
$dshourly   = "'.$_POST["dshourly"].'";
$manifestShortName = "'.$_POST["manifestShortName"].'";
$notifications = "'. $_POST["notifications"]. '";
$notifyWind = "'. $_POST["notifyWind"]. '";
$notifyEarthquake = "'. $_POST["notifyEarthquake"]. '";
$notifyMagnitude = '. $_POST["notifyMagnitude"]. ';
$linkWU = "'. $_POST["linkWU"]. '";
$linkWUNew = "'. $_POST["linkWUNew"]. '";
$id = "'. $_POST["id"]. '";
$linkCWOPID = "'. $_POST["linkCWOPID"]. '";
$linkFindUID = "'. $_POST["linkFindUID"]. '";
$linkNOAA = "'. $_POST["linkNOAA"]. '";
$linkMADIS = "'. $_POST["linkMADIS"]. '";
$linkMesoWest = "'. $_POST["linkMesoWest"]. '";
$linkWeatherCloudID = "'. $_POST["linkWeatherCloudID"]. '";
$linkWindyID = "'. $_POST["linkWindyID"]. '";
$linkAWEKASID = "'. $_POST["linkAWEKASID"]. '";
$linkAmbientWeatherID = "'. $_POST["linkAmbientWeatherID"]. '";
$linkPWSWeatherID = "'. $_POST["linkPWSWeatherID"]. '";
$linkMetOfficeID = "'. $_POST["linkMetOfficeID"]. '";
$linkCustom1Title = "'. $_POST["linkCustom1Title"]. '";
$linkCustom1URL = "'. $_POST["linkCustom1URL"]. '";
$linkCustom2Title = "'. $_POST["linkCustom2Title"]. '";
$linkCustom2URL = "'. $_POST["linkCustom2URL"]. '";
$USAWeatherFinder = "'. $_POST["USAWeatherFinder"]. '";
$extraLinkTitle = "'. $_POST["extraLinkTitle"]. '";
$extraLinkColor = "'. $_POST["extraLinkColor"]. '";
$extraLinkURL = "'. $_POST["extraLinkURL"]. '";
?>';

$fn = FOPEN('languages/lang.'.$defaultlanguage.'.php', 'r') or die("Cannot read input file ".'languages/lang.'.$defaultlanguage.'.php');
$rWrite = FOPEN('languages/translations.js', 'w') or die("Cannot write output file ".'languages/translations.js');
FWRITE( $rWrite, "var translations = {" . PHP_EOL);
while($row = fgets($fn)) {
    if ((strpos($row, "#") == 0) && (strpos($row, "span") == 0) && (strpos($row, "=") > 0)){
      $row = str_replace(array("'", "]", ";", "\$lang["), "", $row);
      $row = str_replace("'", '"', $row);
      if (strpos($row, "//") > 0) $row = substr($row, 0, strpos($row, "//"));
      list($key, $value ) = explode( "=", $row );
      FWRITE($rWrite, "'".trim($key)."': "."'".trim($value)."',\n");}}
FWRITE($rWrite,"};" . PHP_EOL);
FCLOSE($fn);
FCLOSE($rWrite);
$fp = FOPEN("settings1.php", "w") or die("Unable to open settings1.php file check file permissions !");
FWRITE($fp, $string);
FCLOSE($fp);

}
?>
<html>
<head>
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
<link href="favicon.ico" rel="icon" type="image/x-icon">
<script src="js/jquery.js"></script>
<link href="css/easyweathersetup.css" rel="stylesheet prefetch">
 </head>

    <body>



<div class="loginformarea">
<?php
	//lets secure the homeweatherstation easy setup ///
function showForm($error="LOGIN"){
?> <?php echo $error; ?>

  <div class="login_screen" style="width:60%;max-width:600px;margin:0 auto;color:rgba(24, 25, 27, 1.000);border:solid 1px grey;padding:10px;border-radius:4px;">  <?php echo 'Your Current PHP version is :<span style="color:rgba(236, 87, 27, 1.000);"> ' . phpversion(), '</span> <br/>(PHP 5.6 or higher PHP 7+ is  advised if you are not already using these versions)'; ?>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="pwd" >
   Enter Your Password For Meteobridge Setup Screen Below
<center> <div class="modal-buttons">
     <input name="passwd" type="password" class="input-button"/>  <input type="submit" name="submit_pwd" value="Login " class="modal-button" />
         </form>
     </center>
      <?php echo "2015-" ;?><?php echo date('Y');?> &copy;</a> WEATHER34 HC-IMJD</span></span></span>
      <br/><br/>





<?php
}
?>
</div>


  <div span style="width:auto;margin:0 auto;text-align:center;color:#fff;background:0;font-family:arial;padding:20px;border-radius:4px;">
<?php
$Password = $password;
if (isset($_POST['submit_pwd'])){    $pass = isset($_POST['passwd']) ? $_POST['passwd'] : '';
   if ($pass != $Password) {
      showForm("Dashboard Meteobridge EASY SETUP");
      exit();
   }
} else {
   showForm("Dashboard Meteobridge EASY SETUP");
   exit();
}
?>
 

</div>
<div span style="width:390px;margin:0 auto;margin-top:10px;text-align:center;color:#4a636f;background:0;font-family:arial;padding:20px;border-radius:4px;border:1px solid rgba(74, 99, 111, 0.4);">
<img src='img/easyweathersetupweather34.svg' width='120px'>
<img src='img/icon-weewx.svg' width='120px' style="float:none;">

  


  <input type="hidden" name="ds_url" value="https://api.forecast.io/forecast/$apikey/$lat,$lon?lang=$language&units=$darkskyunit"/><br/>
  
 
         

Welcome you have logged into the WeeWX WEATHER34 Skin setup screen <?php echo date("M jS Y H:i"); ?>
</span>
</div>
</div></div>
</div></div>
<div class="theframe1">
<div class="theframe">


<form action="" method="post" name="install" id="install">

<!--##########################################################################################
    #########                        Start of Easy Password Sidebar                  #########
    ##########################################################################################-->

<div class="weatheroptionssidebar">
<?php echo $iicon;?> Please setup and password protect this page for later use it is for your privacy and protection.
</div>

<!--##########################################################################################
    #########                        Start of Easy Password Section                  #########
    ##########################################################################################-->

<div class="weatheroptions">
  <div class="weathersectiontitle">
   <svg id="i-settings" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M13 2 L13 6 11 7 8 4 4 8 7 11 6 13 2 13 2 19 6 19 7 21 4 24 8 28 11 25 13 26 13 30 19 30 19 26 21 25 24 28 28 24 25 21 26 19 30 19 30 13 26 13 25 11 28 8 24 4 21 7 19 6 19 2 Z" />
    <circle cx="16" cy="16" r="4" />
</svg>
  Setup Unique Easysetup Password</div><br/>


  <div class="stationvalue">  Set Easysetup Password it is for your privacy & protection</div>
<svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>
  <input name="password" type="password" id="password" value="<?php echo $password ;?>" class="choose">


   </div>
   <br/>


<!--##########################################################################################
    #########                        Start of Language Sidebar                       #########
    ##########################################################################################-->

<div class="weatheroptionssidebar">
<?php echo $iicon;?>  Setup the default language

<div class="weatherbottominfo">
<svg id="i-checkmark" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M2 20 L12 28 30 4" />
</svg>

check languages</div>
</div>

<!--##########################################################################################
    #########                        Start of Language Section                       #########
    ##########################################################################################-->

   <div class="weatheroptions">
<div class="weathersectiontitle">
Choose the default Language to display and use</div>


<br/>
      <div class="stationvalue">
      Template Language (lowercase)</div>
      <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="#F05E40" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>

       <label name="defaultlanguage"></label>
        <select id="defaultlanguage" name="defaultlanguage" class="choose1">
           <option><?php echo $defaultlanguage ;?></option>
            <option>en</option>
           <option>can</option>
           <option>cat</option>
           <option>dk</option>
           <option>dl</option>
           <option>fi</option>
           <option>fr</option>
           <option>gr</option>
           <option>hu</option>
           <option>it</option>
           <option>nl</option>
           <option>pl</option>
           <option>sk</option>
           <option>sp</option>
           <option>sw</option>
           <option>tr</option>
           <option>us</option>
        </select>
        <br/>

 <div class="stationvalue">
      Your Country Flag</div>
      <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="#F05E40" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>

       <label name="flag"></label>
        <select id="flag" name="flag" class="choose1">
           <option><?php echo $flag ;?></option>
           <option>ar</option>
           <option>aus</option>
           <option>en</option>
           <option>can</option>
           <option>cat</option>
           <option>ch</option>
           <option>dk</option>
           <option>dl</option>
           <option>fi</option>
           <option>fr</option>
           <option>gr</option>
           <option>hu</option>
           <option>iom</option>
           <option>ire</option>
           <option>it</option>
           <option>mi</option>
           <option>nl</option>
           <option>no</option>
           <option>nz</option>
           <option>pl</option>
           <option>sa</option>
           <option>scot</option>
           <option>singapore</option>
           <option>sk</option>
           <option>sp</option>
           <option>sw</option>
           <option>tr</option>
           <option>us</option>
           <option>wal</option>
        </select>
        <br/>
  <div class="stationvalue">DARK SKY Forecast Language  full list here <a href="https://darksky.net/dev/docs" title="https://darksky.net/dev/docs" target="_blank"><white>https://darksky.net/dev/docs</white></a></div>
    <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="#F05E40" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>

 <label name="language"></label>
      <select id="language" name="language" class="choose1">
           <option><?php echo $language ;?></option>
           <option>en</option>
           <option>bg</option>
           <option>bs</option>
           <option>ca</option>
           <option>da</option>
           <option>de</option>
           <option>el</option>
           <option>es</option>
           <option>fi</option>
           <option>fr</option>
           <option>hu</option>
           <option>it</option>
           <option>nl</option>
           <option>pl</option>
           <option>sv</option>
           <option>tr</option>





        </select>
  </div>
  <br/>

<!--##########################################################################################
    #########                        Start of MB Sidebar                             #########
    ##########################################################################################-->

   <div class="weatheroptionssidebar">
   <?php echo $iicon;?>  Hardware

     <br/><br/>

<svg id="i-checkmark" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M2 20 L12 28 30 4" />
</svg>

check path to data file
<br/><br/>
<span style="color:rgba(86, 95, 103, 1.000)">
     <?php echo $iicon;?> getting the path correct is essential for live realtime data display <span style="color:#FF793A"> example (/var/www/html/weewx/weather34/serverdata/w34realtime.txt)</span></span><br/><br/>
     <?php echo $iicon;?> getting the jsondata folder path correct is essential for API Web Services <span style="color:#FF793A">example (/var/www/html/weewx/weather34/jsondata)</span></span>
<div class="weatherbottominfo"></div>
</div>

<!--##########################################################################################
    #########                        Start of MB Section                             #########
    ##########################################################################################-->

   <div class="weatheroptions">
<div class="weathersectiontitle">
<svg id="i-code" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M10 9 L3 17 10 25 M22 9 L29 17 22 25 M18 7 L14 27" />
</svg>

WeeWX Software Paths to Data files</div><br/>
      <div class="stationvalue">Data Type</div>
      <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
 <label name="livedataFormat"></label>
        <select id="livedataFormat" name="livedataFormat" class="choose1">
            <option>WeeWX-W34</option>
        </select>
        <br/>

   

    <div class="stationvalue">Add Your Path to data file</div>
    <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
        <path d="M12 30 L24 16 12 2" />
    </svg>
    <svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" /></svg>

  <input name="livedata" type="text" id="livedata" value="<?php echo $livedata ;?>" class="chooseapi">
  <br/>
  <span style='color:red'>Do not change unless you know what you're doing</span>
    
  <br/> 
     
 <div class="stationvalue">Add Your Path to jsondata folder</div>
    <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
        <path d="M12 30 L24 16 12 2" />
    </svg>
    <svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" /></svg>

     <div class="stationvalue">WeeWX Chart Data</div>
      <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
 <label name="chartsource"></label>
        <select id="chartsource" name="chartsource" class="choose1">
            <option>w34highcharts</option>

        </select>
    <br/>
    <span style="color:red">(Fixed Option WU history charts no longer supported)</span>
</div>
<br/>

<!--##########################################################################################
    #########                        Start of Hardware Section                       #########
    ##########################################################################################-->

<div class="weatheroptions">
<div class="weathersectiontitle">
<svg id="i-code" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M10 9 L3 17 10 25 M22 9 L29 17 22 25 M18 7 L14 27" />
</svg>

Hardware Options</div><br/>
      <div class="stationvalue">
     Using Davis Hardware?</div>
      <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="#F05E40" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>

       <label name="davis"></label>
        <select id="davis" name="davis" class="choose1">
           <option><?php echo $davis ;?></option>
           <option>Yes</option>
           <option>No</option>
          </select>
        <br/>


      <div class="stationvalue"> Your Weather Station Hardware</div>
      <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="#F05E40" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>

       <label name="weatherhardware"></label>
        <select id="weatherhardware" name="weatherhardware" class="chooseapi">
           <option><?php echo $weatherhardware ;?></option>
           <option>Davis Vantage Pro2</option>
           <option>Davis Vantage Pro2 Plus</option>
           <option>Davis Vantage Pro2 Plus+FARS</option>
           <option>Davis Vantage Pro2 FARS</option>
           <option>Davis Vantage Pro2 Solar</option>
           <option>Davis Vantage Pro2 UV</option>
           <option>Davis Vantage Vue</option>
           <option>Davis Envoy8x</option>
           <option>Davis Cabled Vantage Pro2</option>
           <option>Davis Cabled Vantage Pro2 Plus</option>
           <option>Davis Vantage Pro1</option>
           <option>Davis Vantage Pro1+Solar/UV</option>
           <option>Davis Vantage Pro1+Solar/UV/FARS</option>
           <option>Davis Vantage Pro1+FARS</option>
           <option>Davis Cabled Vantage Pro1</option>
           <option>Davis Cabled Vantage Pro1+Solar/UV</option>
           <option>Davis Cabled Vantage Pro1+Solar/UV/FARS</option>
           <option>Davis Cabled Vantage Pro1+FARS</option>
           <option>Oregon Scientific WMR-100</option>
           <option>Oregon Scientific WMR-200</option>
           <option>Oregon Scientific WMR-300</option>
           <option>Oregon Scientific WMR-100</option>
           <option>Oregon Scientific WMR-88</option>
           <option>Oregon Scientific WMR-968</option>
           <option>Oregon Scientific WMR-969</option>
           <option>Oregon Scientific WMR-100</option>
           <option>Ambient Weather Observer-IP</option>
           <option>Ambient Weather WS-12-IP</option>
           <option>Ambient Weather WS-1000</option>
           <option>Fine Offset WH-1080</option>
           <option>Fine Offset WH-2080</option>
           <option>Fine Offset WH-3080</option>
           <option>Fine Offset WH-1080</option>
           <option>Ecowitt GW1000</option>
           <option>Accurite</option>
           <option>La Crosse</option>
           <option>Weatherflow Air-Sky</option>
           <option>Lufft WS10</option>
           <option>Lufft WS100</option>
           <option>Lufft WS200 UMB</option>
           <option>Lufft WS300 UMB</option>
           <option>Lufft WS301 UMB</option>
           <option>Lufft WS302 UMB</option>
           <option>Lufft WS303 UMB</option>
           <option>Lufft WS304 UMB</option>
           <option>Lufft WS310 UMB</option>
           <option>Lufft WS400 UMB</option>
           <option>Lufft WS401 UMB</option>
           <option>Lufft WS500 UMB</option>
           <option>Lufft WS501 UMB</option>
           <option>Lufft WS502 UMB</option>
           <option>Lufft WS503 UMB</option>
           <option>Lufft WS504 UMB</option>
           <option>Lufft WS510 UMB</option>
           <option>Lufft WS600 UMB</option>
           <option>Lufft WS601 UMB</option>
           <option>Lufft WS700 UMB</option>
           <option>Lufft WS800 UMB</option>
           <option>Lufft WS3100 UMB</option>
           <option>None of above</option>
        </select>
        <br/>


      



  </div>
  <br/>


<!--##########################################################################################
    #########                        Start of Station Name Sidebar                   #########
    ##########################################################################################-->

  <div class="weatheroptionssidebar"> try and keep these short dont include full country try a short code
  <br/><br/>
  <svg id="i-alert" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M16 3 L30 29 2 29 Z M16 11 L16 19 M16 23 L16 25" /> </svg>
    Web App Name should be less than 10 characters long. If you exceed 10 characters, the excess will be replaced with ... on Android or iPhone.
  </div>
  <div class="weatherbottominfo"></div>

<!--##########################################################################################
    #########                        Start of Station Name Section                   #########
    ##########################################################################################-->

 <div class="weatheroptions">
<div class="weathersectiontitle">
<svg id="i-location" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <circle cx="16" cy="11" r="4" />
    <path d="M24 15 C21 22 16 30 16 30 16 30 11 22 8 15 5 8 10 2 16 2 22 2 27 8 24 15 Z" />
</svg>

Station Names</div><br/>
<div class="stationvalue">  Station Location</div>
<svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>

  <input name="stationlocation" type="text" id="stationlocation" value="<?php echo $stationlocation ;?>" class="chooseapi">
  <br/>

<div class="stationvalue">  Station Name</div>
<svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>

  <input name="stationName" type="text" id="stationName" value="<?php echo $stationName ;?>" class="chooseapi">
   <br/>

   <div class="stationvalue">Web App Name</div>
<svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>

  <input name="manifestShortName" type="text" id="manifestShortName" value="<?php echo $manifestShortName ;?>" class="chooseapi">

   </div>
 <br/>

<!--##########################################################################################
    #########                        Start of Location Info Section                  #########
    ##########################################################################################-->

   <div class="weatheroptionssidebar">Here is the area where you set your Lat/Lon with timezone + UTC offset , for timezone you can check
   <a href="http://php.net/manual/en/timezones.php" title="http://php.net/manual/en/timezones.php" target="_blank"> the official php timezone documented page</a>
   <br/><br/>

<strong>Lat</strong> 54.00000  <strong>Lon</strong> -22.00000<br/><br/>

<strong>UTC</strong> offset use single number  like -2,-4,1,2,3,4 etc <br/>do not use -01,0-04,01 ,02,03, 04 etc <br/>

   </div>

<!--##########################################################################################
    #########                        Start of Location Info Section                  #########
    ##########################################################################################-->

<div class="weatheroptions">
<div class="weathersectiontitle">
<svg id="i-location" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <circle cx="16" cy="11" r="4" />
    <path d="M24 15 C21 22 16 30 16 30 16 30 11 22 8 15 5 8 10 2 16 2 22 2 27 8 24 15 Z" />
</svg>
Location Information
</div><br/>

<div class="stationvalue">Timezone</div>
 <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>


 <input name="TZ" type="text" id="TZ" value="<?php echo $TZ ;?>" class="choose">


 <div class="stationvalue">UTC Offset</div>
   <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>

<input name="UTC" type="text" id="UTC" value="<?php echo $UTC ;?>" class="choose">




<br/>
	<div class="stationvalue">Latitude</div>
    <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>

    <input name="lat" type="text" id="lat" value="<?php echo $lat ;?>" class="choose">

   <div class="stationvalue">Longitude</div>
   <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>

    <input name="lon" type="lon" id="lon" value="<?php echo $lon ;?>" class="choose">
     <br/>
   <div class="stationvalue">Elevation</div>
<svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>
    <input name="elevation" type="text" id="elevation" value="<?php echo $elevation ;?>" class="choose">




</div>

  <br/>
  <br/><br/><br/>

<!--##########################################################################################
    #########                        Start of Units Sidebar                          #########
    ##########################################################################################-->

   <div class="weatheroptionssidebar"><svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg> Set the units for the main page display and modules it is connected to the
   unit selector in the menu

   <div class="weatherbottominfo">
<svg id="i-checkmark" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M2 20 L12 28 30 4" />
</svg>

double check again
</div>

   </div>

<!--##########################################################################################
    #########                        Start of Units Section                          #########
    ##########################################################################################-->

<div class="weatheroptions">

  <div class="weathersectiontitle">
  <svg id="i-settings" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M13 2 L13 6 11 7 8 4 4 8 7 11 6 13 2 13 2 19 6 19 7 21 4 24 8 28 11 25 13 26 13 30 19 30 19 26 21 25 24 28 28 24 25 21 26 19 30 19 30 13 26 13 25 11 28 8 24 4 21 7 19 6 19 2 Z" />
    <circle cx="16" cy="16" r="4" />
</svg>
  Units Selection</div><br/>

  <label name="unit"></label>
  <div class="stationvalue">Units</div> <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <select id="unit" name="unit" class="choose1">
        	<option><?php echo $unit ;?></option>
            <option>metric</option>
            <option>english</option>
        </select>

        <label name="metric"></label>
        <div class="stationvalue">Metric</div> <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <select id="metric" name="metric" class="choose1">
            <option <?php if($metric=="false") echo "selected"; ?> >false</option>
            <option <?php if($metric=="true") echo "selected"; ?> >true</option>
            </select>
       <span style="color:#777;"> set: <?php echo $iicon;?> true=metric , <?php echo $iicon;?> false=non metric</span>
    <br/>

     <label name="windunit"></label>
    <div class="stationvalue">Wind Unit</div> <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <select id="windunit" name="windunit" class="choose1">
       <option><?php echo $windunit ;?></option>
           <option>km/h</option>
            <option>mph</option>
            <option>m/s</option>
            <option>kts</option>

        </select>

        <label name="tempunit"></label>
        <div class="stationvalue">Temperature Unit</div> <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <select id="tempunit" name="tempunit" class="choose1">
        <option><?php echo $tempunit ;?></option>
            <option>C</option>
            <option>F</option>

        </select>
        <br/>
        <label name="rainunit"></label>
        <div class="stationvalue">Rain Unit&nbsp;</div> <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <select id="rainunit" name="rainunit" class="choose1">
         <option><?php echo $rainunit ;?></option>
            <option>mm</option>
            <option>in</option>


        </select>


        <label name="rainrate"></label>
        <div class="stationvalue">Rain Rate (per Hr/Min)</div> <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <select id="rainrate" name="rainrate" class="choose1">
        <option><?php echo $rainrate ;?></option>
            <option>/h</option>
            <option>/m</option>

        </select>
        <br/>
        <label name="pressureunit"></label>
        <div class="stationvalue">Barometer Unit</div> <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <select id="pressureunit" name="pressureunit" class="choose1">
         <option><?php echo $pressureunit ;?></option>
            <option>mb</option>
            <option>hPa</option>
            <option>inHg</option>

        </select>

        <br/>

        <label name="distanceunit"></label>
        <div class="stationvalue">Distance unit measured miles or kilometres</div> <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <select id="distanceunit" name="distanceunit" class="choose1">
        <option><?php echo $distanceunit ;?></option>
            <option>mi</option>
            <option>km</option>

        </select>
     </div>

    <br/>

<!--##########################################################################################
    #########                        Start of Theming Sidebar                        #########
    ##########################################################################################-->

   <div class="weatheroptionssidebar"><svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg> Here you can set (2 choices)the default theme dark or light option<br />
   and set the default display unit

   <div class="weatherbottominfo">
<svg id="i-checkmark" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M2 20 L12 28 30 4" />
</svg>

check unit(s)
</div>

   </div>

<!--##########################################################################################
    #########                        Start of Theming Section                        #########
    ##########################################################################################-->

<div class="weatheroptions">
    <div class="weathersectiontitle">
    <svg id="i-settings" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
        <path d="M13 2 L13 6 11 7 8 4 4 8 7 11 6 13 2 13 2 19 6 19 7 21 4 24 8 28 11 25 13 26 13 30 19 30 19 26 21 25 24 28 28 24 25 21 26 19 30 19 30 13 26 13 25 11 28 8 24 4 21 7 19 6 19 2 Z" />
        <circle cx="16" cy="16" r="4" />
    </svg>
    Theme Selection</div><br/>
     <div class="stationvalue"> Default Theme Colour</div>
        <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>

        <label name="theme1"></label>
        <select id="theme1" name="theme1" class="choose1">
            <option><?php echo $theme1 ;?></option>
            <option>dark</option>
            <option>light</option>

        </select>
        <span style="color:#777;"> set: <svg id="i-info" viewBox="0 0 32 32" width="10" height="10" fill="#25292D" stroke="rgba(230, 232, 239, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16.25%">
     <path d="M16 14 L16 23 M16 8 L16 10" /><circle cx="16" cy="16" r="14" /></svg> dark, <svg id="i-info" viewBox="0 0 32 32" width="10" height="10" fill="rgba(144, 177, 42, 1.000)" stroke="rgba(230, 232, 239, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16.25%">
     <path d="M16 14 L16 23 M16 8 L16 10" /><circle cx="16" cy="16" r="14" /></svg> light</span>
     </div>

    <br/>
<!--##########################################################################################
    #########                        Start of Notify Sidebar                         #########
    ##########################################################################################-->

<div class="weatheroptionssidebar">
    <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
        <path d="M12 30 L24 16 12 2" />
    </svg>
    Selection which notifications to show
    <br/><br/>
    <svg id="i-info" viewBox="0 0 32 32" width="10" height="10" fill="rgba(102, 188, 199, 1.000)" stroke="rgba(102, 188, 199, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16.25%">
        <path d="M16 14 L16 23 M16 8 L16 10" />
        <circle cx="16" cy="16" r="14" />
    </svg>
    yes to show a notification
    <br/>
    <svg id="i-info" viewBox="0 0 32 32" width="10" height="10" fill="#FF793A" stroke="#FF793A" stroke-linecap="round" stroke-linejoin="round" stroke-width="16.25%">
        <path d="M16 14 L16 23 M16 8 L16 10" />
        <circle cx="16" cy="16" r="14" />
    </svg>
    no to disable a notification
    <div class="weatherbottominfo"></div>
</div>

<!--##########################################################################################
    #########                        Start of Notify Section                         #########
    ##########################################################################################-->
  
  

<div class="weatheroptions">
    <div class="weathersectiontitle">
        <svg id="i-settings" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
            <path d="M13 2 L13 6 11 7 8 4 4 8 7 11 6 13 2 13 2 19 6 19 7 21 4 24 8 28 11 25 13 26 13 30 19 30 19 26 21 25 24 28 28 24 25 21 26 19 30 19 30 13 26 13 25 11 28 8 24 4 21 7 19 6 19 2 Z" />
            <circle cx="16" cy="16" r="4" />
        </svg>
        Notification Settings
    </div>
    <br/>
    <div class="stationvalue">Notifications&nbsp;</div>
    <svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="rgba(86, 95, 103, 1.000)" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
        <path d="M30 12 L16 24 2 12" />
    </svg>
    <select id="notifications" name="notifications" class="choose1">
        <option><?php echo $notifications;?></option>
        <?php if ($notifications == 'yes'){?>
            <option>no</option>
        <?php } else {?>
            <option>yes</option>
        <?php }?>
    </select>
    <br/>
    <div class="stationvalue">Earthquakes</div>
    <svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="rgba(86, 95, 103, 1.000)" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
        <path d="M30 12 L16 24 2 12" />
    </svg>
    <select id="notifyEarthquake" name="notifyEarthquake" class="choose1">
        <option><?php echo $notifyEarthquake;?></option>
        <?php if ($notifyEarthquake == 'yes'){?>
            <option>no</option>
        <?php } else {?>
            <option>yes</option>
        <?php }?>
    </select>&nbsp;&nbsp;&nbsp;
    <div class="stationvalue">Minimum Magnitude</div>
    <svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="rgba(86, 95, 103, 1.000)" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
        <path d="M30 12 L16 24 2 12" />
    </svg>
    <select id="notifyMagnitude" name="notifyMagnitude" class="choose1">
        <option><?php echo $notifyMagnitude;?></option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
    </select>
    <br/>
    <div class="stationvalue">Wind Alerts&nbsp;&nbsp;</div>
    <svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="rgba(86, 95, 103, 1.000)" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
        <path d="M30 12 L16 24 2 12" />
    </svg>
    <select id="notifyWind" name="notifyWind" class="choose1">
        <option><?php echo $notifyWind;?></option>
        <?php if ($notifyWind == 'yes'){?>
            <option>no</option>
        <?php } else {?>
            <option>yes</option>
        <?php }?>
    </select>
</div>


    <br/>

<!--##########################################################################################
    #########                        Ignore this old section                         #########
    ##########################################################################################-->

<div class="weatheroptions">
       <div class="weathersectiontitle">

       <svg id="i-location" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <circle cx="16" cy="11" r="4" />
    <path d="M24 15 C21 22 16 30 16 30 16 30 11 22 8 15 5 8 10 2 16 2 22 2 27 8 24 15 Z" />
</svg>
       This section is deprecated, you can ignore it
    </div><br/>
        <label name="uk"></label>
        <div class="stationvalue">Are you in the UK</div> <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <select id="uk" name="uk" class="choose1">
            <option <?php if($uk=="false") echo "selected"; ?> >false</option>
            <option <?php if($uk=="true") echo "selected"; ?> >true</option>
        </select>

        <label name="usa"></label>
        <div class="stationvalue">Are you in the USA</div> <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <select id="usa" name="usa" class="choose1">
            <option <?php if($usa=="false") echo "selected"; ?> >false</option>
            <option <?php if($usa=="true") echo "selected"; ?> >true</option>
        </select>
        <br/>
        <label name="scandinavia"></label>
        <div class="stationvalue">Are you in Scandinavia</div> <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <select id="scandinavia" name="scandinavia" class="choose1">
            <option <?php if($scandinavia=="false") echo "selected"; ?> >false</option>
            <option <?php if($scandinavia=="true") echo "selected"; ?> >true</option>
        </select>

         <label name="restoftheworld"></label>
        <div class="stationvalue">Are you not in any of others</div> <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <select id="restoftheworld" name="restoftheworld" class="choose1">
            <option <?php if($restoftheworld=="false") echo "selected"; ?> >false</option>
            <option <?php if($restoftheworld=="true") echo "selected"; ?> >true</option>
        </select>

   </div>
<br/>

<!--##########################################################################################
    #########                        Start of Email and Twitter Sidebar              #########
    ##########################################################################################-->

   <div class="weatheroptionssidebar"><svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>
Email and Twitter options for links in your about page

<div class="weatherbottominfo">
<svg id="i-checkmark" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M2 20 L12 28 30 4" />
</svg>

you are nearly there :-) keep going</div>

</div>

<!--##########################################################################################
    #########                        Start of Email and Twitter Section              #########
    ##########################################################################################-->

<div class="weatheroptions">
   <div class="weathersectiontitle">
   <svg id="i-settings" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M13 2 L13 6 11 7 8 4 4 8 7 11 6 13 2 13 2 19 6 19 7 21 4 24 8 28 11 25 13 26 13 30 19 30 19 26 21 25 24 28 28 24 25 21 26 19 30 19 30 13 26 13 25 11 28 8 24 4 21 7 19 6 19 2 Z" />
    <circle cx="16" cy="16" r="4" />
</svg>
   Email and Twitter
    </div>

    <br/>





    <div class="stationvalue">Email</div>

    <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>
<input name="email" type="text" id="email" value="<?php echo $email ;?>" class="choose">
    <div class="stationvalue">Twitter Name</div>
    <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>
<input name="twitter" type="text" id="twitter" value="<?php echo $twitter ;?>" class="choose">
    <br/>
    <div class="stationvalue">Year your weather station was installed</div>
    <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>
<input name="since" type="text" id="since" value="<?php echo $since ;?>" class="choose">


</div>
  <br/>

<!--##########################################################################################
    #########                        Start of Module Sidebar                         #########
    ##########################################################################################-->

<div class="weatheroptionssidebar"><svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>
General template settings with options to choose which type of module to display ,basic station information

<br/><br/>
<svg id="i-checkmark" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M2 20 L12 28 30 4" />
</svg> Make sure you have a <strong><span style="color:#F8712E;"><a href="https://www.wunderground.com/member/api-keys" title="https://www.wunderground.com/member/api-keys" target="_blank"><strong>*NEW*</strong> Weather Underground Developer API KEY</a></span></strong> ..

<br/><br/>
<svg id="i-checkmark" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M2 20 L12 28 30 4" />
</svg> Options to use UVINDEX forecast data if you <strong>DO NOT</strong> have UVINDEX hardware ..
<br/><br/>
<svg id="i-checkmark" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M2 20 L12 28 30 4" />
</svg> Moonset offset times can be adjusted here to align with your location it is measured in hours ,please adjust by hours to correct the output you may have to adjust when clocks move with annually daylight saving times ..


</div>

<!--##########################################################################################
    #########                        Start of Module Section                         #########
    ##########################################################################################-->

  <div class="weatheroptions">
    <div class="weathersectiontitle">Template Modules</div><br/>

  <span style="color:rgba(236, 87, 27, 1.000);"><svg id="i-info" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M16 14 L16 23 M16 8 L16 10" />
    <circle cx="16" cy="16" r="14" />
</svg>
</svg> Options for Top Row 4 Modules + *new Position 6 and 12 module &amp; + Last module<span style="color:#777;"></span> <br/>
       <div class="stationvalue"> Position 1 </div>
       <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
       <label name="position1"></label>
        <select id="position1" name="position1" class="choose">
          <option><?php echo $position1 ;?></option>

            <option>temperatureyear.php</option>
            <option>weather34clock.php</option>
            <option>windgustyear.php</option>
            </select>

        <div class="stationvalue"> Position 1 Title</div>
       <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <label name="position1title"></label>
        <input name="position1title" type="text" id="position1title" value="<?php echo $position1title ;?>" class="choose">



        <br/>

        <div class="stationvalue"> Position 2 </div>
       <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <label name="position2"></label>
        <select id="position2" name="position2" class="choose">
            <option><?php echo $position2 ;?></option>
            <option>rainfallf-year-month.php</option>
            <option>windgustyear.php</option>
            <option>temperatureyear.php</option>
            <option>wflightning.php</option>
            <option>daqitop.php</option>
            <option>worldaqitop.php</option>
           </select>


        <div class="stationvalue"> Position 2 Title</div>
       <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <label name="position2title"></label>
       <input name="position2title" type="text" id="position2title" value="<?php echo $position2title ;?>" class="choose">

        <br/>

        <div class="stationvalue"> Position 3 </div>
       <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>

        <label name="position3"></label>
        <select id="position3" name="position3" class="choose">
            <option><?php echo $position3 ;?></option>
            <option>rainfallf-year-month.php</option>
            <option>windgustyear.php</option>
            <option>temperatureyear.php</option>
            <option>wflightning.php</option>
            <option>daqitop.php</option>
            <option>worldaqitop.php</option>
            </select>
     <div class="stationvalue"> Position 3 Title</div>
       <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <label name="position3title"></label>
        <input name="position3title" type="text" id="position3title" value="<?php echo $position3title ;?>" class="choose">

        <br/>


        <div class="stationvalue"> Position 4 </div>
       <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <label name="position4"></label>
        <select id="position4" name="position4" class="choose">
            <option><?php echo $position4 ;?></option>
            <option>temperatureyear.php</option>
            <option>davisconsoleoutlook.php</option>
           <option>advisory.php</option>
          <option>advisory_extended.php</option>
                     </select>



        <div class="stationvalue"> Position 4 Title</div>
       <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <label name="position4title"></label>
       <input name="position4title" type="text" id="position4title" value="<?php echo $position4title ;?>" class="choose">


        </select>
        <br/>

         <div class="stationvalue"> *Position 6 </div>
       <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <label name="position6"></label>
        <select id="position6" name="position6" class="choose">
            <option><?php echo $position6 ;?></option>
            <option>forecast3ds.php</option>
            <option>forecast3wu.php</option>
            <option>forecast3wularge.php</option>
                     </select>



        <div class="stationvalue"> Position 6 Title</div>
       <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <label name="position6title"></label>
       <input name="position6title" type="text" id="position6title" value="<?php echo $position6title;?>" class="choose">


        </select>
        <br/>










         <div class="stationvalue"> *Position 12</div>
       <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <label name="position12"></label>
        <select id="position12" name="position12" class="choose">
            <option><?php echo $position12 ;?></option>
            <option>indoortemperature.php</option>
            <option>airqualitymodule.php</option>
            <option>purpleairqualitymodule.php</option>
            <option>webcamsmall.php</option>
            <option>moonphase.php</option>
            <option>weather34uvsolar.php</option>
            <option>solaruvds.php</option>
            <option>solaruvwu.php</option>
            <option>eq.php</option>
            <option>lightning34.php</option>
                     </select>



        <div class="stationvalue"> Position 12 Title</div>
       <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <label name="position12title"></label>
       <input name="position12title" type="text" id="position12title" value="<?php echo $position12title ;?>" class="choose">


        </select>
        <br/>



         <div class="stationvalue"> *Last Module</div>
       <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <label name="positionlastmodule"></label>
        <select id="positionlastmodule" name="positionlastmodule" class="choose">
            <option><?php echo $positionlastmodule ;?></option>
            <option>indoortemperature.php</option>
            <option>airqualitymodule.php</option>
            <option>webcamsmall.php</option>
            <option>moonphase.php</option>
            <option>weather34uvsolar.php</option>
            <option>solaruvds.php</option>
             <option>solaruvwu.php</option>
            <option>eq.php</option>
            <option>lightning34.php</option>
                     </select>



        <div class="stationvalue">Last Title</div>
       <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
        <label name="positionlastmoduletitle"></label>
       <input name="positionlastmoduletitle" type="text" id="positionlastmoduletitle" value="<?php echo $positionlastmoduletitle ;?>" class="choose">


        </select>
        <br/>







      <strong> <span style="color:rgba(86, 95, 103, 1.000);">options Top 4 positions</span></strong><br/>

       <span style="color:#777;"><?php echo $iicon;?><span style="color:#777;"> rainfallf-year-month.php</span> Totals <span style="color:rgba(24, 25, 27, 0.8)">YEARLY-MONTHLY</span> Rainfall<br/></span>


        <span style="color:#777;"><?php echo $iicon;?><span style="color:#777;"> weather34clock.php</span> Station  <span style="color:rgba(24, 25, 27, 0.8)">Time</span><br/>

     <span style="color:#777;"><?php echo $iicon;?><span style="color:#777;"> windgustyear.php</span> *English only<span style="color:rgba(24, 25, 27, 0.8)"> Current Monthly / Yearly max Gust </span> <br/>


     <span style="color:#777;"><?php echo $iicon;?><span style="color:#777;"> temperatureyear.php</span> *English only<span style="color:rgba(24, 25, 27, 0.8)"> Current Monthly / Yearly Temperature </span>  <br/>

     <span style="color:#777;"><?php echo $iicon;?><span style="color:#777;"> davisconsoleoutlook.php <span style="color:rgba(24, 25, 27, 0.8)">Davis Hardware Console users only</span> <br/></span>


     <span style="color:#777;"><?php echo $iicon;?><span style="color:#777;"> wflightning.php <span style="color:rgba(24, 25, 27, 0.8)">Weatherflow users only uses direct weatherflow API not meteobridge data must add station ID below in the weatherflow section </span> <br/></span>



      <br/></span></span>
         <strong> <span style="color:rgba(86, 95, 103, 1.000);">options Positions 6 and 12 + last module</span></strong><br/>
        <span style="color:#777;"><?php echo $iicon;?><span style="color:#777;"> indoortemperature.php <span style="color:rgba(236, 87, 27, 1.000);">display indoor temperature</span><br/></span>
     <span style="color:#777;"><?php echo $iicon;?><span style="color:#777;"> airqualitymodule.php <span style="color:rgba(236, 87, 27, 1.000);">display airquality</span><br/></span>
     <span style="color:#777;"><?php echo $iicon;?><span style="color:#777;"> webcamsmall.php</span> <span style="color:rgba(236, 87, 27, 1.000);">display webcam</span>.*
     add your url/path to wecam image using option below <br/></span>
     <span style="color:#777;"><?php echo $iicon;?><span style="color:#777;"> mooonphase.php</span> <span style="color:rgba(236, 87, 27, 1.000);">display moonphase</span><br/></span>
     <span style="color:#777;"><?php echo $iicon;?><span style="color:#777;"> weather34uvsolar.php</span> <span style="color:rgba(236, 87, 27, 1.000);">display uv and solar radiation if you have hardware</span> <br/></span>
     <span style="color:#777;"><?php echo $iicon;?><span style="color:#777;"> solaruvds.php</span> <span style="color:rgba(236, 87, 27, 1.000);">display Darksky UV forecast and if you have only solar radiation </span> <br/></span>
     <span style="color:#777;"><?php echo $iicon;?><span style="color:#777;"> solaruvwu.php</span> <span style="color:rgba(236, 87, 27, 1.000);">display Weather Underground Day UV forecast and if you have only solar radiation </span> <br/></span>
     <span style="color:#777;"><?php echo $iicon;?><span style="color:#777;"> eq.php</span> <span style="color:rgba(236, 87, 27, 1.000);">display last earthquake from earthquakereport.com</span>   <br/>
     <span style="color:#777;"><?php echo $iicon;?><span style="color:#777;"> forecas3ds.php</span> <span style="color:rgba(236, 87, 27, 1.000);">display 3 day forecast from DARK SKY</span>   <br/>
     </span>

   <span style="color:#777;"><?php echo $iicon;?><span style="color:#777;"> forecas3wu.php</span> <span style="color:rgba(236, 87, 27, 1.000);">display 3 period day/night forecast from Weather Underground</span>   <br/>
     </span>


     <span style="color:#777;"><?php echo $iicon;?><span style="color:#777;"> forecas3wularge.php</span> <span style="color:rgba(236, 87, 27, 1.000);">large display of current period day/night forecast from Weather Underground</span>   <br/>
     </span>


        <span style="color:#777;"><?php echo $iicon;?><span style="color:#777;"> lightning34.php</span> <span style="color:rgba(236, 87, 27, 1.000);">Lightning for those using weatherflow direct with meteobridge</span>   <br/>
     </span>
    </div>
    <br/>

<!--##########################################################################################
    #########                        Start of Webcam Section                         #########
    ##########################################################################################-->

    <div class="weatheroptions">
   <div class="weathersectiontitle">Webcam</div>
   <br/>
   <div class="stationvalue">Path/Url to your webcam <b>image</b></div>
   <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>

  <input name="webcamurl" type="text" id="webcamurl" value="<?php echo $webcamurl ;?>" class="chooseapi"><br/>
    <?php echo $iicon;?>
    <b><span style="color:rgba(236, 87, 27, 1.000);">Leave blank to hide link within menu</span></b><br/>

    <?php echo $iicon;?>
    <span style="color:rgba(86, 95, 103, 1.000);">Should be an image url, possibly ending in <b>jpg</b>/<b>jpeg</b>/<b>png</b></span><br/>

    <div class="stationvalue">Path/Url to your webcam <b>video</b></div>
    <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>

  <input name="videoWeatherCamURL" type="text" id="videoWeatherCamURL" value="<?php echo $videoWeatherCamURL ;?>" class="chooseapi"><br/>
    <?php echo $iicon;?>
    <b><span style="color:rgba(236, 87, 27, 1.000);">Leave blank to use the Static Weather Camera image instead</span></b><br/>

    <?php echo $iicon;?>
    <span style="color:rgba(86, 95, 103, 1.000);">Add the url to your Weather Camera's live video feed to include it in the Weather Camera popup</span><br/>

    <?php echo $iicon;?>
    <span style="color:rgba(86, 95, 103, 1.000);">If your video doesn't work here, but you can view it by putting it in the URL bar, <a href="https://github.com/lightmaster/Meteobridge-Weather34-Template/issues/new?assignees=lightmaster&labels=enhancement&template=feature_request.md&title=" title="Add a Feature | HWS GitHub" target="_blank"><span style="color:rgba(236, 87, 27, 1.000);">start a new issue on the GitHub page</span></a> and I'll try to add support for your video.</span><br/>
</div>
<br/>

<!--##########################################################################################
    #########                        Start of Moon Section                           #########
    ##########################################################################################-->
     <div class="weatheroptions">
   <div class="weathersectiontitle">Moonrise/set option</div> <br/>


   <div class="stationvalue">
   Fine Tune the Moonrise/Set *if needed or leave as default if unsure</div>
   <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>
<input name="moonadj" type="text" id="moonadj" value="<?php echo $moonadj ;?>" class="choose">
<br/>
<svg id="i-info" viewBox="0 0 32 32" width="10" height="10" fill="rgba(24, 25, 27, 0.8)" stroke="rgba(24, 25, 27, 0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16.25%">
    <path d="M16 14 L16 23 M16 8 L16 10" />
    <circle cx="16" cy="16" r="14" />
</svg>
        <strong> <span style="color:rgba(86, 95, 103, 1.000);">adjust the moonrise/set to your location in hours </span></strong>
<br/>

   <div class="stationvalue">
   Reverse the moonphase for southern hemisphere (i.e. Australia etc..)</div>
   <svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
<select id="hemisphere" name="hemisphere" class="choose1">
         <option><?php echo $hemisphere ;?></option>
            <option>0</option>
            <option>180</option>


        </select>
<br/>
        <?php echo $iicon;?> <strong> <span style="color:rgba(236, 87, 27, 1.000);">set to 0 for Northern hemisphere</span></strong><br/>
         <?php echo $iicon;?> <strong> <span style="color:rgba(86, 95, 103, 1.000);">set to 180 for Southern hemisphere (180 degrees reversed)</span></strong><br/>


     <div class="stationvalue">
   Sun Position Module</div>
   <svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="rgba(86, 95, 103, 1.000)" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
<select id="sunoption" name="sunoption" class="choose1">
         <option><?php echo $sunoption ;?></option>
            <option>sun3.php</option>
            <option>sun4.php</option>
        </select>
        <br/>
        <?php echo $iicon;?> <span style="color:rgba(86, 95, 103, 1.000);"><strong>two options sun3.php works northern latitudes, sun4.php is for southern hemisphere only ..</strong></span><br/>

     </div>
    <br/>

<!--##########################################################################################
    #########                        Start of Time Format Section                    #########
    ##########################################################################################-->

    <div class="weatheroptions">
   <svg id="i-clock" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <circle cx="16" cy="16" r="14" />
    <path d="M16 8 L16 16 20 20" />
</svg> <div class="weathersectiontitle">Time format options</div><br/>
     <div class="stationvalue">Set the Date Format</div> <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>

   <label name="dateFormat"></label>
        <select id="dateFormat" name="dateFormat" class="choose1">
            <option><?php echo $dateFormat ;?></option>
            <option>d-m-Y</option>
            <option>m-d-Y</option>
            <option>Y-m-d</option>

        </select>


        <div class="stationvalue">Set the Main Clock Format</div> <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>

   <label name="clockformat"></label>
        <select id="clockformat" name="clockformat" class="choose1">
            <option><?php echo $clockformat ;?></option>
            <option>24</option>
            <option>12</option>
        </select>



        <br/>

     <div class="stationvalue">Set the Time Format</div> <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>

   <label name="timeFormat"></label>
        <select id="timeFormat" name="timeFormat" class="choose1">
            <option><?php echo $timeFormat ;?></option>
             <option>H:i:s</option>
             <option>g:i:s a</option>
              <option>g:i:s</option>
            </select>

        &nbsp;

        <div class="stationvalue">Set the Short Time Format</div> <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>

   <label name="timeFormatShort"></label>
        <select id="timeFormatShort" name="timeFormatShort" class="choose1">
            <option><?php echo $timeFormatShort ;?></option>
            <option>H:i</option>
            <option>g:i</option>


        </select>

         &nbsp;<br/><br/>



        <span style="color:#777;font-weight:600;">Date format<br/></span>
        <span style="color:rgba(86, 95, 103, 1.000);font-weight:normal;"><?php echo $iicon;?> d-m-Y <span style="color:#777;">for DAY MONTH YEAR format (12-03-2017)</span></span><br/>
        <span style="color:rgba(86, 95, 103, 1.000);"><?php echo $oiicon;?> m-d-Y <span style="color:#777;">for MONTH DAY YEAR format (03-12-2017)</span></span><br/>
     <span style="color:rgba(86, 95, 103, 1.000);"><?php echo $oiicon;?> m-d-Y <span style="color:#777;">for YEAR MONTH DAY format (2017-12-03)</span></span><br/>
     <br/>


     <span style="color:#777;font-weight:600;">Main Clock format<br/></span>
        <span style="color:rgba(86, 95, 103, 1.000);font-weight:normal;"><?php echo $iicon;?> 24 <span style="color:#777;">Main Clock output example 17:32:12 </span></span><br/>
        <span style="color:rgba(86, 95, 103, 1.000);"><?php echo $oiicon;?> 12 <span style="color:#777;">Main Clock output example 5:32:12 pm</span></span><br/> <br/>

      <span style="color:#777;font-weight:600;">Time format<br/></span>
       <span style="color:rgba(86, 95, 103, 1.000);font-weight:normal;"><?php echo $iicon;?> H:i:s <span style="color:#777;"> 17:34:22 format</span> </span><br/>

     <span style="color:rgba(86, 95, 103, 1.000);"><?php echo $oiicon;?> g:i:s a <span style="color:#777;"> 05:34:22 am format</span></span><br/>

     <span style="color:rgba(86, 95, 103, 1.000);"><?php echo $oiicon;?> g:i:s  <span style="color:#777;"> 05:34:22 format</span></span><br/> <br/>


      <span style="color:#777;font-weight:600;">Short Time format used for Sunrise/Set & Moonrise/Set areas<br/></span>
      <span style="color:rgba(86, 95, 103, 1.000);font-weight:normal;"><?php echo $iicon;?> H:i <span style="color:#777;">17:34 format</span></span><br/>

     <span style="color:rgba(86, 95, 103, 1.000);"><?php echo $oiicon;?> g:i a  <span style="color:#777;">05:34 am format</span></span><br/>

     <span style="color:rgba(86, 95, 103, 1.000);"><?php echo $oiicon;?> g:i   <span style="color:#777;">05:34 format</span></span><br/>
     <br/>

  

   
     </div>
    <br/>

<!--##########################################################################################
    #########                        Start of Menu Options Sidebar                   #########
    ##########################################################################################-->

<div class="weatheroptionssidebar">
    <span style="color:#777;">
        <?php echo $iicon;?>
        Select <span style="font-weight:bold;color:rgba(236, 87, 27, 1.000);">no</span> or leave the IDs blank to hide any link.
        <br/>
        <br/>
        <?php echo $iicon;?>
        Select whether to display WU link and if you want to use the new or old site. <span style="color:red">Map does not work on old site.</span>
        <br/>
        <br/>
        <?php echo $iicon;?>
        <a href="http://www.findu.com/citizenweather/cw_form.html" title="CWOP Sign-UP">Sign up for CWOP here</a>. Type in your ID for CWOP and FindU. Starting letter is either <span style="font-weight:bold;color:rgba(236, 87, 27, 1.000);">F</span>/<span style="font-weight:bold;color:rgba(236, 87, 27, 1.000);">D</span>/<span style="font-weight:bold;color:rgba(236, 87, 27, 1.000);">E</span>/<span style="font-weight:bold;color:rgba(236, 87, 27, 1.000);">C</span>.
        <br/>
        <?php echo $iicon;?>
        CWOP looks like <span style="font-weight:bold;color:rgba(236, 87, 27, 1.000);">F</span>0000
        <br/>
        <?php echo $iicon;?>
        FindU looks like <span style="font-weight:bold;color:rgba(236, 87, 27, 1.000);">FW</span>0000.
        <br/>
        <?php echo $iicon;?>
        <orange><b>NOAA</b></orange>, <orange><b>MADIS</b></orange>, and <orange><b>MesoWest</b></orange> all use your CWOP ID, so you don't have to enter it again.
        <br/>
        <?php echo $iicon;?>
        Go to <a href="https://app.weathercloud.net" title="WeatherCloud" target="_blank">WeatherCloud</a>, the ID is the last part of the url (<orange><b>d0123456789</b></orange>).
        <br/>
        <?php echo $iicon;?>
        Go to <a href="https://www.awekas.at/en/login_pruefung.php?rd=station" title="AWEKAS" target="_blank">AWEKAS</a>, after logging in, your ID will be at the end of the url (<orange><b>12345</b></orange>)
        <br/>
        <?php echo $iicon;?>
        Go to <a href="https://dashboard.ambientweather.net/devices" title="Ambient Weaher" target="_blank">Ambient Weatehr</a> and click the green share button for your station. Click to make your station public, then copy the last section of your url (<orange><b>0123456789abcdef<br/>0123456789abcdef</b></orange>).
        <br/>
        <?php echo $iicon;?>
        Go to <a href="https://www.pwsweather.com/stationlist.php" title="PWS Weather Stations" target="_blank">PWS Weather Station List</a> and find the "station ID" in the first column.
        <br/>
        <?php echo $iicon;?>
        Go to <a href="http://wow.metoffice.gov.uk/sites" title="MetOffice" target="_blank">MetOffice/WoW</a>. Your ID is the last part of your URL, following "site-ID=".
        <br/>
        <br/>
        <?php echo $iicon;?>
        Custom links - Make sure to set the title and url
        <br/>
        <?php echo $iicon;?>
        Extra Menu Link is a link that shows up outside of the flyout menu
        <br/>
        <?php echo $iicon;?>
        Create an Account at <a href="https://usaweatherfinder.com/index.php?a=join" title="USA Weather Finder" target="_blank">USA Weather Finder</a>. Secret Code is <orange><b>CUMULUS</orange></b>. Your username is the code for tracking.
    </span>


</div>

<!--##########################################################################################
    #########                        Start of Menu Options Section                   #########
    ##########################################################################################-->

<div class="weatheroptions">
    <svg id="i-menu" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
        <path d="M4 8 L28 8 M4 16 L28 16 M4 24 L28 24" />
    </svg>
    <div class="weathersectiontitle">Menu options</div>
    <br/>
    <!-- Display Languages -->
    <div class="stationvalue">Display Languages in Menu</div>
    <?php echo $rightchevron.$downchevron;?>
    <label name="languages"></label>
    <select id="languages" name="languages" class="choose1" >
        <option><?php echo ($languages?$languages:'no');?></option>
        <option><?php echo ($languages=='no'||empty($languages)?'yes':'no');?></option>
    </select>
    <br/>
    <!-- To show some extra links -->
    <div class="stationvalue">Display Extra links in Menu</div>
    <?php echo $rightchevron.$downchevron;?>
    <label name="extralinks"></label>
    <select id="extralinks" name="extralinks" class="choose1" >
    <option><?php echo ($extralinks?$extralinks:'no');?></option>
        <option><?php echo ($extralinks=='no'||empty($extralinks)?'yes':'no');?></option>
    </select>
    <br/>
    <!-- WU Link -->
    <div class="stationvalue">Display Wunderground Link</div>
    <?php echo $rightchevron.$downchevron;?>
    <label name="linkWU"></label>
    <select id="linkWU" name="linkWU" class="choose1">
        <option><?php echo ($linkWU?$linkWU:'no');?></option>
        <option><?php echo ($linkWU=='no'||empty($linkWU)?'yes':'no');?></option>
    </select>
    <!-- Use new or old WU Site -->
    <div class="stationvalue">New WU Site</div>
    <?php echo $rightchevron.$downchevron;?>
    <label name="linkWUNew"></label>
    <select id="linkWUNew" name="linkWUNew" class="choose1">
        <option><?php echo ($linkWUNew?$linkWUNew:'yes');?></option>
        <option><?php echo ($linkWUNew=='yes'||empty($linkWUNew)?'no':'yes');?></option>
    </select>
    <br/>
  <!-- WU id -->
  <div class="stationvalue">Weather Underground ID</div>
    <?php echo $rightchevron;?>
    <label name="id"></label>
    <input name="id" type="text" id="id" value="<?php echo $id;?>" class="choose">
    
    <br/>
    <!-- CWOP Link -->
    <div class="stationvalue">Display CWOP Link</div>
    <?php echo $rightchevron;?>
    <label name="linkCWOPID"></label>
    <input name="linkCWOPID" type="text" id="linkCWOPID" value="<?php echo $linkCWOPID;?>" class="choose">
    <span style="color:#777;">(<orange><b>F0000</b></orange>)</span>
    <br/>
    <!-- FindU Link -->
    <div class="stationvalue">Display FindU Link&nbsp;&nbsp;</div>
    <?php echo $rightchevron;?>
    <label name="linkFindUID"></label>
    <input name="linkFindUID" type="text" id="linkFindUID" value="<?php echo $linkFindUID;?>" class="choose">
    <span style="color:#777;">(<orange><b>FW0000</b></orange>)</span>
    <br/>
    <!-- NOAA Link -->
    <div class="stationvalue">Display NOAA Link&nbsp;</div>
    <?php echo $rightchevron.$downchevron;?>
    <label name="linkNOAA"></label>
    <select id="linkNOAA" name="linkNOAA" class="choose1">
        <option><?php echo ($linkNOAA?$linkNOAA:'no');?></option>
        <option><?php echo ($linkNOAA=='no'||empty($linkNOAA)?'yes':'no');?></option>
    </select>
    <br/>
    <!-- MADIS Link -->
    <div class="stationvalue">Display MADIS Link</div>
    <?php echo $rightchevron.$downchevron;?>
    <label name="linkMADIS"></label>
    <select id="linkMADIS" name="linkMADIS" class="choose1">
        <option><?php echo ($linkMADIS?$linkMADIS:'no');?></option>
        <option><?php echo ($linkMADIS=='no'||empty($linkMADIS)?'yes':'no');?></option>
    </select>
    <br/>
    <!-- MesoWest Link -->
    <div class="stationvalue">Display MesoWest Link</div>
    <?php echo $rightchevron.$downchevron;?>
    <label name="linkMesoWest"></label>
    <select id="linkMesoWest" name="linkMesoWest" class="choose1">
        <option><?php echo ($linkMesoWest?$linkMesoWest:'no');?></option>
        <option><?php echo ($linkMesoWest=='no'||empty($linkMesoWest)?'yes':'no');?></option>
    </select>
    <br/>
    <!-- MesoWest Link -->
    <div class="stationvalue">Display WeatherCloud Link</div>
    <?php echo $rightchevron;?>
    <label name="linkWeatherCloudID"></label>
    <input name="linkWeatherCloudID" type="text" id="linkWeatherCloudID" value="<?php echo $linkWeatherCloudID;?>" class="choose">
    <span style="color:#777;">(<orange><b>d0123456789</b></orange>)</span>
    <br/>
    <!-- MesoWest Link -->
    <div class="stationvalue">Display Windy.com Link</div>
    <?php echo $rightchevron;?>
    <label name="linkWindyID"></label>
    <input name="linkWindyID" type="text" id="linkWindyID" value="<?php echo $linkWindyID;?>" class="choose">
    <span style="color:#777;">(<orange><b>f0123456</b></orange>)</span>
    <br/>
    <!-- AWEKAS Link -->
    <div class="stationvalue">Display AWEKAS Link</div>
    <?php echo $rightchevron;?>
    <label name="linkAWEKASID"></label>
    <input name="linkAWEKASID" type="text" id="linkAWEKASID" value="<?php echo $linkAWEKASID;?>" class="choose">
    <span style="color:#777;">(<orange><b>14782</b></orange>)</span>
    <br/>
    <!-- Ambient Link -->
    <div class="stationvalue">Display Ambient Link</div>
    <?php echo $rightchevron;?>
    <label name="linkAmbientWeatherID"></label>
    <input name="linkAmbientWeatherID" type="text" id="linkAmbientWeatherID" value="<?php echo $linkAmbientWeatherID;?>" class="chooseapi">
    <span style="color:#777;">(<orange><b>0123456789abcdef0123456789abcdef</b></orange>)</span>
    <br/>
    <!-- PWS Weather Link -->
    <div class="stationvalue">Display PWS Weather Link</div>
    <?php echo $rightchevron;?>
    <label name="linkPWSWeatherID"></label>
    <input name="linkPWSWeatherID" type="text" id="linkPWSWeatherID" value="<?php echo $linkPWSWeatherID;?>" class="choose">
    <br/>
    <!-- MetOffice Link -->
    <div class="stationvalue">Display MetOffice/WoW Link</div>
    <?php echo $rightchevron;?>
    <label name="linkMetOfficeID"></label>
    <input name="linkMetOfficeID" type="text" id="linkMetOfficeID" value="<?php echo $linkMetOfficeID;?>" class="chooseapi">
    <br/>
    <!-- USA Weather Finder Link -->
    <div class="stationvalue">USA Weather Finder Username</div>
    <?php echo $rightchevron;?>
    <label name="USAWeatherFinder"></label>
    <input name="USAWeatherFinder" type="text" id="USAWeatherFinder" value="<?php echo $USAWeatherFinder;?>" class="choose">
    <br/>
    <orange>This is for USA based stations only.</orange>
    <br/>
    <br/>
    <!-- Custom Link 1 -->
    <div class="weathersectiontitle">Custom Links</div>
    <br/>
    <div class="stationvalue">1st Title&nbsp;</div>
    <?php echo $rightchevron;?>
    <label name="linkCustom1Title"></label>
    <input name="linkCustom1Title" type="text" id="linkCustom1Title" value="<?php echo $linkCustom1Title;?>" class="choose">
    <div class="stationvalue">1st URL&nbsp;</div>
    <?php echo $rightchevron;?>
    <label name="linkCustom1URL"></label>
    <input name="linkCustom1URL" type="text" id="linkCustom1URL" value="<?php echo $linkCustom1URL;?>" class="chooseapi">
    <br/>
    <!-- Custom Link 2 -->
    <div class="stationvalue">2nd Title</div>
    <?php echo $rightchevron;?>
    <label name="linkCustom2Title"></label>
    <input name="linkCustom2Title" type="text" id="linkCustom2Title" value="<?php echo $linkCustom2Title;?>" class="choose">
    <div class="stationvalue">2nd URL</div>
    <?php echo $rightchevron;?>
    <label name="linkCustom2URL"></label>
    <input name="linkCustom2URL" type="text" id="linkCustom2URL" value="<?php echo $linkCustom2URL;?>" class="chooseapi">
    <br/>
    <br/>
    <!-- Extra Menu's Custom Link -->
    <div class="weathersectiontitle">Extra Menu - Custom Link</div>
    <br/>
    <div class="stationvalue">Title&nbsp;&nbsp;</div>
    <?php echo $rightchevron;?>&nbsp;&nbsp;&nbsp;
    <label name="extraLinkTitle"></label>
    <input name="extraLinkTitle" type="text" id="extraLinkTitle" value="<?php echo $extraLinkTitle;?>" class="choose">
    <div class="stationvalue">URL&nbsp;</div>
    <?php echo $rightchevron;?>
    <label name="extraLinkURL"></label>
    <input name="extraLinkURL" type="text" id="extraLinkURL" value="<?php echo $extraLinkURL;?>" class="chooseapi">
    <br/>
    <div class="stationvalue">Color</div>
    <?php echo $rightchevron.$downchevron;?>
    <label name="extraLinkColor"></label>
    <select id="extraLinkColor" name="extraLinkColor" class="choose1">
        <?php echo ($extraLinkColor?'<option>'.$extraLinkColor.'</option>':'<option value="">Blank - No value</option>');?>
        <?php echo ($extraLinkColor=='white'?'':'<option>white</option>');?>
        <?php echo ($extraLinkColor=='red'?'':'<option>red</option>');?>
        <?php echo ($extraLinkColor=='grey'?'':'<option>grey</option>');?>
        <?php echo ($extraLinkColor=='green'?'':'<option>green</option>');?>
        <?php echo ($extraLinkColor=='yellow'?'':'<option>yellow</option>');?>
        <?php echo ($extraLinkColor=='blue'?'':'<option>blue</option>');?>
        <?php echo ($extraLinkColor=='orange'?'':'<option>orange</option>');?>
        <?php echo (!empty($extraLinkColor)?'<option value="">Blank - No value</option>':'');?>
    </select>
</div>
<br/>

<!--##########################################################################################
    #########                        Start of WU/DarkSky Section                     #########
    ##########################################################################################-->

     <div class="weatheroptions">
   <div class="weathersectiontitle">WU/Darksky Options</div><br/><br/>

<div class="stationvalue">
<img src="img/darksky.svg" width="100" /> DarkSky Hourly Forecast (If using WU Weekly)</div>
 <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="#F05E40" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>
    <label name="dshourly"></label>
        <select id="dshourly" name="dshourly" value="<?php echo $dshourly ;?>" class="choose1" >
          <option><?php echo $dshourly ;?></option>
            <option>yes</option>
            <option>no</option>
            </select>

<br/>
 Whether or not to show the DarkSky Hourly Forecast when using WeatherUnderground's Weekly Forecast
    </div>
    <br/>

<!--##########################################################################################
    #########                        Start of WeatherFlow Sidebar                    #########
    ##########################################################################################-->

    <div class="weatheroptionssidebar">
        <span style="color:rgba(236, 87, 27, 1);"><strong>Only</strong> select yes if your <strong>WeatherFlow Station</strong> is not directly connected to your <strong>MB</strong>.</span>
    </div>

<!--##########################################################################################
    #########                        Start of WeatherFlow Section                    #########
    ##########################################################################################-->

    <div class="weatheroptions">
   <div class="weathersectiontitle"><img src="img/wflogo.svg" width="200px"/></div> <br/>


<div class="stationvalue">Do you have Weatherflow Station</div> <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>

   <label name="weatherflowoption"></label>
        <select id="weatherflowoption" name="weatherflowoption" class="choose1" >
            <option><?php echo $weatherflowoption ;?></option>
            <option>yes</option>
            <option>no</option>
            </select>
            <br/>
            <span style="color:#777;"><strong> Select <span style="color:rgba(24, 25, 27, 0.8);">Yes</span> or <span style="color:rgba(86, 95, 103, 1.000);">No</span></strong><br/>

  <br/>
        <strong> <span style="color:rgba(236, 87, 27, 1.000);">*important</span> only select yes if your weatherflow hardware is not connected directly to meteobridge and want to use weatherflow hardware alongside existing hardware connected to meteobridge..this option uses weatherflow API data for UV,SOLAR and lightning only </strong></span><br/>



     <div class="stationvalue"> Weather-Flow STATION ID</div>
    <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>

    <input name="wfid" type="text" id="wfid" value="<?php echo $weatherflowID ;?>" class="choose">





    <br/> <svg id="i-info" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M16 14 L16 23 M16 8 L16 10" />
    <circle cx="16" cy="16" r="14" />
</svg> <span style="color:#777;">enter your <strong>WeatherFlow </strong> station id example <strong><span style="color:rgba(86, 95, 103, 1.000);"> 1200</strong></span></span>

    <br/>
        <div class="stationvalue"> Weather-Flow Lightning module </div>
    <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>

    <input name="wfli" type="text" id="wfli" value="<?php echo $weatherflowlightning ;?>" class="choose">





    <br/> <svg id="i-info" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M16 14 L16 23 M16 8 L16 10" />
    <circle cx="16" cy="16" r="14" />
</svg> <span style="color:#777;">(option works when available weatherflow is connected to meteobridge) select yes if you wish to display lightning module </span></span>

<br/>

<div class="stationvalue">
Weatherflow Map Zoom</div>
 <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="#F05E40" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>
    <label name="weatherflowmapzoom"></label>
        <select id="weatherflowmapzoom" name="weatherflowmapzoom" value="<?php echo $weatherflowmapzoom ;?>" class="choose1" >
          <option><?php echo $weatherflowmapzoom ;?></option>
            <option>5</option>
            <option>6</option>
             <option>7</option>
             <option>8</option>
             <option>9</option>
             <option>10</option>
             <option>11</option>
            </select>

<br/> <?php echo $iicon;?> <span style="color:#777;"><green>Select Map Zoom level</green> 5-11</span>

</div>
    <br/>

<!--##########################################################################################
    #########                        Start of Temp Module Section                    #########
    ##########################################################################################-->

     <div class="weatheroptions">
   <div class="weathersectiontitle">Temperature Module</div><span style="color:#777;"> <br/>
       <div class="stationvalue"> Options </div>
       <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg><svg id="i-chevron-bottom" viewBox="0 0 32 32" width="10" height="10" fill="#777" stroke="#777" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M30 12 L16 24 2 12" />
</svg>
       <label name="temperaturemodule"></label>
        <select id="temperaturemodule" name="temperaturemodule" class="choose">
          <option><?php echo $temperaturemodule ;?></option>
            <option>temperature.php</option>
            <option>temperaturein.php</option>
           </select>
           <br/></span>
           <span style="color:#777;">
            <?php echo $iicon;?> *option temperature.php default without indoor temperature displayed <br/>
    <?php echo $iicon;?> *temperaturein.php shows indoor temp icon<br/></span>
    </div>
    <br/>

<!--##########################################################################################
    #########                        Start of Purple Air Section                     #########
    ##########################################################################################-->

     <div class="weatheroptions">
   <div class="weathersectiontitle"> <img src=img/purpleair.svg width=25px > Purple Air</div><br/>
    <span style="color:rgba(236, 87, 27, 1.000);"> * <span style="color:#777;">Important<span style="color:rgba(236, 87, 27, 1.000);"> for Purple Air owners only</span></span></span> <br/>




    <div class="stationvalue"> <img src=img/purpleair.svg width=25px > Do you have Purple Air Quality Hardware (yes or no) </div>
    <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>

    <input name="purpleairhardware" type="text" id="purpleairhardware" value="<?php echo $purpleairhardware ;?>" class="choose">
    <br/> <span style="color:#777;">enter yes or no(lowercase)</span>
    <br/>


    
    </div>
    <br/>
       
<!--##########################################################################################
    #########                        Start of Air Quality Section                     #########
    ##########################################################################################-->
   

<!--##########################################################################################
    #########                        Start of METAR Section                          #########
    ##########################################################################################-->

     <div class="weatheroptions">
   <div class="weathersectiontitle">Nearby Metar Aviation Weather Options</div><br/>
<span style="color:rgba(236, 87, 27, 1.000);">
    <br/>


<div class="stationvalue"> Display Nearby Metar (yes or no) *English Only </div>
    <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>

    <input name="metar" type="text" id="metar" value="<?php echo $metar ;?>" class="choose">
    <br/> <span style="color:#777;">enter yes or no(lowercase) *note it only supports english language</span>

    <br/>
    <div class="stationvalue"> ICAO Code for  Metar Station 1  </div>
    <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>

    <input name="icao1" type="text" id="icao1" value="<?php echo $icao1 ;?>" class="choose">
    <br/> <span style="color:#777;">enter your nearby METAR stations  For example station 1 <span style="color:rgba(236, 87, 27, 1.000);">LTBA</span> in capitals
    <br/>

    <div class="stationvalue"> ICAO Location  for  Metar Station 1  </div>
    <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>

    <input name="airport1" type="text" id="airport1" value="<?php echo $airport1 ;?>" class="choose">
     <br/> <span style="color:#777;">enter your nearby METAR station 1 location for example <span style="color:rgba(236, 87, 27, 1.000);">Istanbul,Turkey</span>
        <br/>


    <div class="stationvalue"> ICAO Aprox Distance  for  Metar Station 1 from your location  </div>
    <svg id="i-chevron-right" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M12 30 L24 16 12 2" />
</svg>

    <input name="airport1dist" type="text" id="airport1dist" value="<?php echo $airport1dist ;?>" class="choose">
    <br/> <span style="color:#777;">enter your nearby METAR stations distance for example <span style="color:rgba(236, 87, 27, 1.000);">26</span> or <span style="color:rgba(236, 87, 27, 1.000);">5</span> do not enter any letters km or m
</div>
<br/>
  

  
 
  
<!--##########################################################################################
    #########                        Start of Submit Button Section                  #########
    ##########################################################################################-->

<div class="weatheroptions">
  

    <input type="submit" name="Submit" value="Save Configuration" class="button"><br/><br/><span style="color:#777;font-size:12px;padding:5px;line-height:16px;">
  <svg id="i-alert" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="rgba(86, 95, 103, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M16 3 L30 29 2 29 Z M16 11 L16 19 M16 23 L16 25" /> </svg> Click "save configuration" if everything looks ok and dont forget to set the password. <span style="color:rgba(236, 87, 27, 1.000);">As some of the settings in this setup page affect weewx.conf you
  <br/>must restart WeeWX after you have saved the configuration.</span>

  </div>
  <br/>


    <span style="font-size:12px;color:#777;"><svg id="i-info" viewBox="0 0 32 32" width="12" height="12" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M16 14 L16 23 M16 8 L16 10" />
    <circle cx="16" cy="16" r="14" />
</svg> WeeWX Weather34 Skin EASY SETUP &copy; 2015-<?php echo date('Y');?> Dashboard W34-HC-IMJD</span><br/>
<center><a href="http://weewx.com" title="http://weewx.com" target="_blank"><img src="img/icon-weewx.svg" width="120" /></a></center><br/>

  

  



 
</form>
