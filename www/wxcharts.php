<?php
//###################################################################################################################
//	weewx-Weather34 Template maintained by Ian Millard (Steepleian)                                 				#
//	                                                                                                				#
//  Contains original legacy code (by agreement) created and developed by Brian Underdown (https://weather34.com)   #
//  for the (now superseeded) original Weather34 Template which is no longer maintained by its creator              #
//  © weather34.com original CSS/SVG/PHP 2015-2019                                                                  #
// 	                                                                                                				#
//  Contains original code by Ian Millard and collaborators															#
//  © claydonsweather.org.uk original CSS/SVG/PHP 2020-2021                                                         #
// 	                                                                                                				#
// 	Issues for weewx-Weather34 template should be addressed to https://github.com/steepleian/weewx-Weather34/issues #                                                                                              #
// 	                                                                                                				#
//###################################################################################################################
include_once ('w34CombinedData.php');
include_once ('common.php');
include_once ('webserver_ip_address.php');
include ('settings1.php');include ('settings.php');
include ('serverdata/celestialValues.php');
date_default_timezone_set($TZ);
?>
<?php header('Content-type: text/html; charset=utf-8');
error_reporting(0);
function downloadfromgit($filename)
{
    if (!is_readable($filename) || filesize($filename) < 100)
    {
        //Download $filename if it doesn't exist
        $fileopen = fopen($filename, 'w');
        $options = array(
            CURLOPT_FILE => $fileopen,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_URL => 'https://github.com/steepleian/weewx-Weather34/blob/master/www/settings1.default.php'
        );
        $ch = curl_init();
        curl_setopt_array($ch, $options);
        curl_exec($ch);
        curl_close($ch);
        $fstat = fstat($fileopen);
        fclose($fileopen);
        if (!file_exists($filename) || $fstat['size'] < 100)
        {
            echo ($filename . " did not download properly, please visit <a href='https://raw.githubusercontent.com/steepleian/weewx-Weather34/master/www/settings1.default.php?token=AEMVT7U4QB6O67Z35VADMUK6QGMRM' target='_blank'>https://raw.githubusercontent.com/steepleian/weewx-Weather34/master/www/settings1.default.php?token=AEMVT7U4QB6O67Z35VADMUK6QGMRM</a>, right click anywhere on the page and choose to save the file. Then copy the file into the root of your website (where you downloaded the website files to on your server).<br/>");
            die();
        }
    }
}
function loadSettings($file)
{
    if (basename($file) != 'settings1.default.php' && !file_exists($file))
    {
        return [];
    }
    else if (basename($file) == 'settings1.default.php' && filesize($file) < 100)
    {
        downloadfromgit($file);
    }
    require $file;
    unset($file);
    return get_defined_vars();
}
$s1d = loadSettings('./settings1.default.php');
$s1 = loadSettings('./settings1.php');
$check = array_diff_key($s1d, $s1);
if (!empty($check))
{
    //check if dir is writable
    if (!is_writable("."))
    {
        echo ("<p>Unable to write to the website's folder. Make sure the root of the website is writable by your webserver.<br/>If you're using Apache on linux, Apache should be running as user 'www-data' and group 'www-data'. If so, run these commands or adjust them for Apache's user:group <br/><br/><i>find . -type d -exec sudo chown www-data:www-data {} \; -exec sudo chmod 2775 {} \;</i> <br/><br/>and <br/><br/><i>find . -type f -exec sudo chown www-data:www-data {} \; -exec sudo chmod 664 {} \;</i> <br/><br/>from within the root of your website's folder, probably located in '/var/www/example.com/html/pws.'<br/><br/><br/>or, do yourself a huge favor and navigate into your 'html' folder and use these 3 commands to automatically set the permissions on all files and folders created inside it:<br/><br/><i>chmod g+s .</i><br/><br/><i>setfacl -d -m g::rwx .</i><br/><br/><i>setfacl -d -m o::rx .</i></p>");
        die();
    }
    $s1 = array_merge($s1d, $s1);
    $line = '$theme = isset($theme) ? $theme : "dark";';
    $line1 = '$theme1 = $theme;';
    $code = '<?php' . "\n" . $line . "\n" . $line1 . "\n";
    foreach ($s1 as $var => $value)
    {
        /// ${var} = "{value}";\n
        $code .= '$' . $var . ' = ' . var_export($value, true) . ";\n";
    }
    file_put_contents('./settings1.php', $code);
}

$paddingtop = $percentage;
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
<link href="css/main.<?php echo $theme; ?>.css?version=<?php echo filemtime('css/main.' . $theme . '.css'); ?>" rel="stylesheet prefetch">
  <style>
    .lity-iframe-container {
  display: flex;
  width: 100%;
  max-width: 820px;
  height: 0;
  padding-top: <?php echo $paddingtop; ?>;
  overflow: auto;
  pointer-events: auto;
  -webkit-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-overflow-scrolling: touch;
  align-items: center;
  justify-content: center;
  text-align: center;
  margin: 0 auto;
  margin-left: 0px
}
.weather2-container {
    -ms-text-size-adjust: 100%;
    -moz-font-smoothing: antialiased;
    -webkit-font-smoothing: antialiased;
    font-smoothing: antialiased;
    background: 0;
    display: -webkit-box;
    display: -moz-box;
    display: flex;
    width: 1280px;
    height: 100px;
    background-color: 0;
    margin: 50px auto -20px;
}
  .weather-container {
    display: flex;
    list-style: none;
    width: 1280px;
    height: 200px;
    overflow: hidden;
    margin: 2px auto;
    background: 0;
}
.weather-item {
    width: 24.6%;
    height: 195px;
    border: 0;
        border-bottom-color: currentcolor;
        border-bottom-style: none;
        border-bottom-width: 0px;
    border-bottom: 18px solid rgba(97, 106, 114, .1);
    -webkit-box-shadow: inset 0 20px rgba(97, 106, 114, .1);
    box-shadow: inset 0 20px rgba(97, 106, 114, .1);
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    font-size: 1em;
    margin: 2px;
    padding: 0;
    background: rgba(33, 34, 39, .8);
}
.weatherfooter-container {
    display: flex;
    width: 1280px;
    margin: 0 auto 2px;
}  
</style>
</head>
<body>
<!-- begin top layout for homeweatherstation template-->
<div class="weather2-container">
<div class="container weather34box-toparea">


<!-- position1 main clock--->
  <div class="weather34box clock">
    <div class="title"><svg viewBox='0 0 32 32' width=10 height=10 fill=none stroke=currentcolor stroke-linecap=round stroke-linejoin=round stroke-width=6.25%>
<path d='M16 14 L16 23 M16 8 L16 10' />
<circle cx=16 cy=16 r=14 />
</svg> <?php echo $position1title ;?> </div>
    <div class="value"><div id="position1"></div></div></div>



<!-- position2--->
  <div class="weather34box indoor">
    <div class="title"><svg viewBox='0 0 32 32' width=10 height=10 fill=none stroke=currentcolor stroke-linecap=round stroke-linejoin=round stroke-width=6.25%>
<path d='M16 14 L16 23 M16 8 L16 10' />
<circle cx=16 cy=16 r=14 />
</svg> <span> <?php echo $position2title ;?> </span></div>
    <div class="value"><div id="position2"></div></div></div>
  
 
 
 <!-- position3--->
  <div class="weather34box alert">
    <div class="title"><svg viewBox="0 0 32 32" width=10 height=10 fill=none stroke=currentcolor stroke-linecap=round stroke-linejoin=round stroke-width=6.25%><path d="M16 14 L16 23 M16 8 L16 10" /><circle cx=16 cy=16 r=14 /></svg> <?php echo $position3title ;?> </div>
    <div class="value">
    <div id="position3"></div></div></div>
 
 
  <!-- position4--->   
  <div class="weather34box earthquake">
    <div class="title">
    <svg viewBox="0 0 32 32" width=10 height=10 fill=none stroke=currentcolor stroke-linecap=round stroke-linejoin=round stroke-width=6.25%><path d="M16 14 L16 23 M16 8 L16 10" /><circle cx=16 cy=16 r=14 /></svg> <?php echo $position4title ;?></div>
    <div class="value"><div id="position4"></div></div></div>
  
    
  </div></div></div></div>
<!--end position section for homeweatherstation template-->
<!--Top Row 1 Box 1-->
<div class="weather-container"><div class="weather-item"><div class="chartforecast">
<!--<span <span class="yearpopup">  <a alt="temp charts" title="temp charts" href="pop_tempalmanac.php" data-lity ><?php echo $menucharticonpage ?> Temperature Almanac and Derived Charts</a></span>-->
  
<!--<span class="yearpopup">  <a alt="yearly temperature" title="yearly temperature" href="<?php echo $chartsource; ?>/<?php echo $theme1; ?>-charts.html?chart='temperatureplot'&span='yearly'&temp='<?php echo $weather['temp_units']; ?>'&pressure='<?php echo $weather['barometer_units']; ?>'&wind='<?php echo $weather['wind_units']; ?>'&rain='<?php echo $weather['rain_units'] ?>" data-lity ><?php echo $menucharticonpage ?> Yearly</a></span>-->
<span <span class="yearpopup">  <a alt="temp charts" title="temp charts" href="pop_menu_temperature.php" data-lity ><?php echo $menucharticonpage ?> Temperature Almanac and Derived Charts</a></span>

  <!--<a alt="yearly Feels" title="yearly Feels" href="<?php echo $chartsource; ?>/<?php echo $theme1; ?>-charts.html?chart='tempderivedplot'&span='yearly'&temp='<?php echo $weather['temp_units']; ?>'&pressure='<?php echo $weather['barometer_units']; ?>'&wind='<?php echo $weather['wind_units']; ?>'&rain='<?php echo $weather['rain_units'] ?>" data-lity > <?php echo '| Feels'; ?> </a></span>-->
<!--<a alt="yearly humidity" title="yearly humidity" href="<?php echo $chartsource; ?>/<?php echo $theme1; ?>-charts.html?chart='humidityplot'&span='yearly'&temp='<?php echo $weather['temp_units']; ?>'&pressure='<?php echo $weather['barometer_units']; ?>'&wind='<?php echo $weather['wind_units']; ?>'&rain='<?php echo $weather['rain_units'] ?>" data-lity > <?php echo '| Hum'; ?> </a></span> --> 
<!--<span class="todaypopup"> <a alt="weekly temperature" title="weekly temperature" href="<?php echo $chartsource; ?>/<?php echo $theme1; ?>-charts.html?chart='tempallplot'&span='weekly'&temp='<?php echo $weather['temp_units']; ?>'&pressure='<?php echo $weather['barometer_units']; ?>'&wind='<?php echo $weather['wind_units']; ?>'&rain='<?php echo $weather['rain_units'] ?>" data-lity >  <?php echo $menucharticonpage ?> Weekly </a></span>-->
<!--<a alt="weekly Feels" title="weekly Feels" href="<?php echo $chartsource; ?>/<?php echo $theme1; ?>-charts.html?chart='tempderivedplot'&span='weekly'&temp='<?php echo $weather['temp_units']; ?>'&pressure='<?php echo $weather['barometer_units']; ?>'&wind='<?php echo $weather['wind_units']; ?>'&rain='<?php echo $weather['rain_units'] ?>" data-lity > <?php echo '| Feels'; ?> </a></span>-->
<!--<a alt="weekly humidity" title="weekly humidity" href="<?php echo $chartsource; ?>/<?php echo $theme1; ?>-charts.html?chart='humidityplot'&span='weekly'&temp='<?php echo $weather['temp_units']; ?>'&pressure='<?php echo $weather['barometer_units']; ?>'&wind='<?php echo $weather['wind_units']; ?>'&rain='<?php echo $weather['rain_units'] ?>" data-lity > <?php echo '| Hum'; ?> </a></span>-->
      </div>
<span class='moduletitle'> <?php echo $lang['Temperature']; ?> (<valuetitleunit>&deg;<?php echo $weather["temp_units"]; ?></valuetitleunit>) </span><br /></span>
<div id="temperature"></div>
  <!--end Top Row 1 Box 1-->
  
  <!--Top Row 1 Box 2-->
  <div class="weather-container"><div class="weather-item"><div class="chartforecast">
<!--<span <span class="yearpopup">  <a alt="temp charts" title="temp charts" href="pop_tempalmanac.php" data-lity ><?php echo $menucharticonpage ?> Temperature Almanac and Derived Charts</a></span>-->
  
<!--<span class="yearpopup">  <a alt="yearly temperature" title="yearly temperature" href="<?php echo $chartsource; ?>/<?php echo $theme1; ?>-charts.html?chart='temperatureplot'&span='yearly'&temp='<?php echo $weather['temp_units']; ?>'&pressure='<?php echo $weather['barometer_units']; ?>'&wind='<?php echo $weather['wind_units']; ?>'&rain='<?php echo $weather['rain_units'] ?>" data-lity ><?php echo $menucharticonpage ?> Yearly</a></span>-->
<span <span class="yearpopup">  <a alt="temp charts" title="temp charts" href="pop_menu_temperature.php" data-lity ><?php echo $menucharticonpage ?> Temperature Almanac and Derived Charts</a></span>

  <!--<a alt="yearly Feels" title="yearly Feels" href="<?php echo $chartsource; ?>/<?php echo $theme1; ?>-charts.html?chart='tempderivedplot'&span='yearly'&temp='<?php echo $weather['temp_units']; ?>'&pressure='<?php echo $weather['barometer_units']; ?>'&wind='<?php echo $weather['wind_units']; ?>'&rain='<?php echo $weather['rain_units'] ?>" data-lity > <?php echo '| Feels'; ?> </a></span>-->
<!--<a alt="yearly humidity" title="yearly humidity" href="<?php echo $chartsource; ?>/<?php echo $theme1; ?>-charts.html?chart='humidityplot'&span='yearly'&temp='<?php echo $weather['temp_units']; ?>'&pressure='<?php echo $weather['barometer_units']; ?>'&wind='<?php echo $weather['wind_units']; ?>'&rain='<?php echo $weather['rain_units'] ?>" data-lity > <?php echo '| Hum'; ?> </a></span> --> 
<!--<span class="todaypopup"> <a alt="weekly temperature" title="weekly temperature" href="<?php echo $chartsource; ?>/<?php echo $theme1; ?>-charts.html?chart='tempallplot'&span='weekly'&temp='<?php echo $weather['temp_units']; ?>'&pressure='<?php echo $weather['barometer_units']; ?>'&wind='<?php echo $weather['wind_units']; ?>'&rain='<?php echo $weather['rain_units'] ?>" data-lity >  <?php echo $menucharticonpage ?> Weekly </a></span>-->
<!--<a alt="weekly Feels" title="weekly Feels" href="<?php echo $chartsource; ?>/<?php echo $theme1; ?>-charts.html?chart='tempderivedplot'&span='weekly'&temp='<?php echo $weather['temp_units']; ?>'&pressure='<?php echo $weather['barometer_units']; ?>'&wind='<?php echo $weather['wind_units']; ?>'&rain='<?php echo $weather['rain_units'] ?>" data-lity > <?php echo '| Feels'; ?> </a></span>-->
<!--<a alt="weekly humidity" title="weekly humidity" href="<?php echo $chartsource; ?>/<?php echo $theme1; ?>-charts.html?chart='humidityplot'&span='weekly'&temp='<?php echo $weather['temp_units']; ?>'&pressure='<?php echo $weather['barometer_units']; ?>'&wind='<?php echo $weather['wind_units']; ?>'&rain='<?php echo $weather['rain_units'] ?>" data-lity > <?php echo '| Hum'; ?> </a></span>-->
      </div>
<span class='moduletitle'> <?php echo $lang['Temperature']; ?> (<valuetitleunit>&deg;<?php echo $weather["temp_units"]; ?></valuetitleunit>) </span><br /></span>
  <div id="temperature"></div><br></div></div>
  <!--end Top Row 1 Box 2-->
  <!--Bottom Row 3 Box 8-->
  <div class="weather-item">
  <div class="chartforecast">
  
  <!--Insert link to pop up module here-->  
    <a rel='prefetch' href="http://wxcharts.eu/charts/gfs/europe/00/850temp_anom_024.jpg?<?php echo date('Ymd')?>00" data-lity >
  <!--end Insert link to pop up module here-->  
    
    <svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
     <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg> <?php echo 'wxcharts.eu 850hPa Anomaly Temp Europe'; ?></span> </a>
     
    </div>
 <div id="wxchartbox8" style="border:solid 1px RGBA(46, 46, 46, 0.3);padding-top:2px;border-radius:4px;margin-top:23px">  
 
 <!--Box 8 Insert link to source image or iframe keep width at 290px height 165px-->
 <img rel="prefetch" src=img/iframe.jpg title="weather34 logo" width="295px" height="145px">
 <!--end Insert link to source image or iframe-->
 
 </div><br>
  </div>
   <!--end Bottom Row 3 Box 8-->
  <!--Top Row 1 Box 3-->
  <div class="weather-item">
   <div class="chartforecast">
      
      <!--Insert link to pop up module here--> 
       <a rel='prefetch' href="https://www.mgm.gov.tr/FTPDATA/uzal/radar/ist/istmax15.jpg" data-lity >
	  <!--end Insert link to pop up module here--> 
		 
		 <svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
         <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg> <?php echo 'mgm.gov.tr Istanbul Radar (UTC)' ;?></span> </a>
      </div>
  <div id="wxchartbox3" style="border-radius:4px; border:solid 1px RGBA(46, 46, 46, 0.3);padding:2px;margin-top:23px;">  
  
  <!--Box 3 Insert link to source image or iframe keep width at 290px height 165px-->
  <img rel='prefetch' src="https://www.mgm.gov.tr/FTPDATA/uzal/radar/ist/istmax15.jpg"  width="290px" height="145px">
  <!--end Insert link to source image or iframe-->
  
  </div><br>
            </div>
 </div>
  <!--end Top Row 1 Box 3-->
 <!--Middle Row 2 Box 4-->
<div class="weather-container">
  <div class="weather-item">
  <div class="chartforecast">
  <!--Insert link to pop up module here-->
   <a href="https://www.windy.com/?clouds,<?php echo $lat ;?>,<?php echo $lon ;?>,8" data-lity>
	<!--end Insert link to pop up module here-->	 
		 
		 <svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
         <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg> <?php echo 'Windy Cloud Cover';?></span> </a>
      </div>
   <div id="wxchartbox4" style="border-radius:4px; border:solid 1px RGBA(46, 46, 46, 0.3);padding-top:2px;margin-top:23px;">  
   
   <!--Box 4 Insert link to source image or iframe keep width at 290px height 165px-->
   <iframe width="290" height="145" src="https://embed.windy.com/embed2.html?lat=<?php echo $lat ;?>&lon=<?php echo $lon ;?>&zoom=6&level=surface&overlay=clouds&menu=&message=&marker=&forecast=12&calendar=now&location=coordinates&type=map&actualGrid=&metricWind=kt&metricTemp=%C2%B0C" frameborder="0"></iframe>
   <!--end Insert link to source image or iframe-->
   
   </div><br>
      </div>
      <!--end Middle Row 2 Box 4-->
   <!--Bottom Row 3 Box 8-->
  <div class="weather-item">
  <div class="chartforecast">
  
  <!--Insert link to pop up module here-->  
    <a rel='prefetch' href="http://wxcharts.eu/charts/gfs/europe/00/850temp_anom_024.jpg?<?php echo date('Ymd')?>00" data-lity >
  <!--end Insert link to pop up module here-->  
    
    <svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
     <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg> <?php echo 'wxcharts.eu 850hPa Anomaly Temp Europe'; ?></span> </a>
     
    </div>
 <div id="wxchartbox8" style="border:solid 1px RGBA(46, 46, 46, 0.3);padding-top:2px;border-radius:4px;margin-top:23px">  
 
 <!--Box 8 Insert link to source image or iframe keep width at 290px height 165px-->
 <img rel="prefetch" src=img/iframe.jpg title="weather34 logo" width="295px" height="145px">
 <!--end Insert link to source image or iframe-->
 
 </div><br>
  </div>
   <!--end Bottom Row 3 Box 8-->   
       <!--Middle Row 2 Box 5-->
  <div class="weather-item">
   <div class="chartforecast">
   
   <!--Insert link to pop up module here-->
         <a href="https://www.windy.com/?rain,<?php echo $lat ;?>,<?php echo $lon ;?>,8" lity-iframe>
	<!--end Insert link to pop up module here-->	 
		 
		 <svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
         <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg> <?php echo 'Windy Rain';?></span> </a>
         
      </div>
  <div id="wxchartbox5" style="border:solid 1px RGBA(46, 46, 46, 0.3);padding-top:2px;border-radius:4px;margin-top:23px">  
  
  <!--Box 5 Insert link to source image or iframe keep width at 290px height 165px-->
  <iframe width="290" height="145" src="https://embed.windy.com/embed2.html?lat=<?php echo $lat ;?>&lon=<?php echo $lon ;?>&zoom=6&level=surface&overlay=rain&menu=&message=&marker=&forecast=12&calendar=now&location=coordinates&type=map&actualGrid=&metricWind=kt&metricTemp=%C2%B0C" frameborder="0"></iframe>
  <!--end Insert link to source image or iframe-->
  
  </div><br>
  </div>
  <!--end Middle Row 2 Box 5-->
  
       <!--Middle Row 2 Box 6-->
  <div class="weather-item">
  <div class="chartforecast">
  
  <!--Insert link to pop up module here-->
  <a rel='prefetch' href="https://www.windy.com/?temp,<?php echo $lat ;?>,<?php echo $lon ;?>,8" data-lity >  
  <!--end Insert link to pop up module here-->
  
         <svg id="i-info" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M16 14 L16 23 M16 8 L16 10" />
    <circle cx="16" cy="16" r="14" />
</svg>  <?php echo 'Windy Temperature';?></span> </a>

      </div>
 <div id="wxchartbox6" style="border:solid 1px RGBA(46, 46, 46, 0.3);padding-top:2px;border-radius:4px;margin-top:23px">  
 
 <!--Box 6 Insert link to source image or iframe keep width at 290px height 165px-->
 <iframe width="290" height="145" src="https://embed.windy.com/embed2.html?lat=<?php echo $lat ;?>&lon=<?php echo $lon ;?>8&zoom=6&level=surface&overlay=temp&menu=&message=true&marker=&forecast=12&calendar=now&location=coordinates&type=map&actualGrid=&metricWind=km%2Fh&metricTemp=%C2%B0C" frameborder="0"></iframe>
 <!--end Insert link to source image or iframe-->
 
 </div><br>
         </div></div>
    <!--end Middle Row 2 Box 6-->  
 <!--Middle Row 2 Box 4-->
<div class="weather-container">
  <div class="weather-item">
  <div class="chartforecast">
  <!--Insert link to pop up module here-->
   <a href="https://www.windy.com/?clouds,<?php echo $lat ;?>,<?php echo $lon ;?>,8" data-lity>
	<!--end Insert link to pop up module here-->	 
		 
		 <svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
         <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg> <?php echo 'Windy Cloud Cover';?></span> </a>
      </div>
   <div id="wxchartbox4" style="border-radius:4px; border:solid 1px RGBA(46, 46, 46, 0.3);padding-top:2px;margin-top:23px;">  
   
   <!--Box 4 Insert link to source image or iframe keep width at 290px height 165px-->
   <iframe width="290" height="145" src="https://embed.windy.com/embed2.html?lat=<?php echo $lat ;?>&lon=<?php echo $lon ;?>&zoom=6&level=surface&overlay=clouds&menu=&message=&marker=&forecast=12&calendar=now&location=coordinates&type=map&actualGrid=&metricWind=kt&metricTemp=%C2%B0C" frameborder="0"></iframe>
   <!--end Insert link to source image or iframe-->
   
   </div><br>
      </div>
      <!--end Middle Row 2 Box 4-->
   <!--Bottom Row 3 Box 8-->
  <div class="weather-item">
  <div class="chartforecast">
  
  <!--Insert link to pop up module here-->  
    <a rel='prefetch' href="http://wxcharts.eu/charts/gfs/europe/00/850temp_anom_024.jpg?<?php echo date('Ymd')?>00" data-lity >
  <!--end Insert link to pop up module here-->  
    
    <svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
     <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg> <?php echo 'wxcharts.eu 850hPa Anomaly Temp Europe'; ?></span> </a>
     
    </div>
 <div id="wxchartbox8" style="border:solid 1px RGBA(46, 46, 46, 0.3);padding-top:2px;border-radius:4px;margin-top:23px">  
 
 <!--Box 8 Insert link to source image or iframe keep width at 290px height 165px-->
 <img rel="prefetch" src=img/iframe.jpg title="weather34 logo" width="295px" height="145px">
 <!--end Insert link to source image or iframe-->
 
 </div><br>
  </div>
   <!--end Bottom Row 3 Box 8-->   
       <!--Middle Row 2 Box 5-->
  <div class="weather-item">
   <div class="chartforecast">
   
   <!--Insert link to pop up module here-->
         <a href="https://www.windy.com/?rain,<?php echo $lat ;?>,<?php echo $lon ;?>,8" lity-iframe>
	<!--end Insert link to pop up module here-->	 
		 
		 <svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
         <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg> <?php echo 'Windy Rain';?></span> </a>
         
      </div>
  <div id="wxchartbox5" style="border:solid 1px RGBA(46, 46, 46, 0.3);padding-top:2px;border-radius:4px;margin-top:23px">  
  
  <!--Box 5 Insert link to source image or iframe keep width at 290px height 165px-->
  <iframe width="290" height="145" src="https://embed.windy.com/embed2.html?lat=<?php echo $lat ;?>&lon=<?php echo $lon ;?>&zoom=6&level=surface&overlay=rain&menu=&message=&marker=&forecast=12&calendar=now&location=coordinates&type=map&actualGrid=&metricWind=kt&metricTemp=%C2%B0C" frameborder="0"></iframe>
  <!--end Insert link to source image or iframe-->
  
  </div><br>
  </div>
  <!--end Middle Row 2 Box 5-->
  
       <!--Middle Row 2 Box 6-->
  <div class="weather-item">
  <div class="chartforecast">
  
  <!--Insert link to pop up module here-->
  <a rel='prefetch' href="https://www.windy.com/?temp,<?php echo $lat ;?>,<?php echo $lon ;?>,8" data-lity >  
  <!--end Insert link to pop up module here-->
  
         <svg id="i-info" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M16 14 L16 23 M16 8 L16 10" />
    <circle cx="16" cy="16" r="14" />
</svg>  <?php echo 'Windy Temperature';?></span> </a>

      </div>
 <div id="wxchartbox6" style="border:solid 1px RGBA(46, 46, 46, 0.3);padding-top:2px;border-radius:4px;margin-top:23px">  
 
 <!--Box 6 Insert link to source image or iframe keep width at 290px height 165px-->
 <iframe width="290" height="145" src="https://embed.windy.com/embed2.html?lat=<?php echo $lat ;?>&lon=<?php echo $lon ;?>8&zoom=6&level=surface&overlay=temp&menu=&message=true&marker=&forecast=12&calendar=now&location=coordinates&type=map&actualGrid=&metricWind=km%2Fh&metricTemp=%C2%B0C" frameborder="0"></iframe>
 <!--end Insert link to source image or iframe-->
 
 </div><br>
         </div></div>
    <!--end Middle Row 2 Box 6-->     
     
 <!--Bottom Row 3 Box 7-->
<div class="weather-container">
  <div class="weather-item">
  <div class="chartforecast">
  
  <!--Insert link to pop up module here-->
         <a rel='prefetch' href="http://wxcharts.eu/charts/arpege/europe/00/850temp_003.jpg?<?php echo date('Ymd')?>00" data-lity >
	<!--end Insert link to pop up module here-->	 
		 
		 <svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
         <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg> <?php echo 'wxcharts.eu 850hPa Temp Europe';?></span> </a>
         
      </div>
  <div id="wxchartbox7" style="border:solid 1px RGBA(46, 46, 46, 0.3);padding-top:2px;border-radius:4px;margin-top:23px">  
  
  <!-- Box 7 Insert link to source image or iframe keep width at 290px height 165px-->
  <img rel="prefetch" src=img/iframe.jpg title="weather34 logo" width="295px" height="145px">
  <!--end Insert link to source image or iframe-->
  
  
  </div><br>
      </div>
     <!--end Bottom Row 3 Box 7--> 
     
  <!--Bottom Row 3 Box 8-->
  <div class="weather-item">
  <div class="chartforecast">
  
  <!--Insert link to pop up module here-->  
    <a rel='prefetch' href="http://wxcharts.eu/charts/gfs/europe/00/850temp_anom_024.jpg?<?php echo date('Ymd')?>00" data-lity >
  <!--end Insert link to pop up module here-->  
    
    <svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
     <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg> <?php echo 'wxcharts.eu 850hPa Anomaly Temp Europe'; ?></span> </a>
     
    </div>
 <div id="wxchartbox8" style="border:solid 1px RGBA(46, 46, 46, 0.3);padding-top:2px;border-radius:4px;margin-top:23px">  
 
 <!--Box 8 Insert link to source image or iframe keep width at 290px height 165px-->
 <img rel="prefetch" src=img/iframe.jpg title="weather34 logo" width="295px" height="145px">
 <!--end Insert link to source image or iframe-->
 
 </div><br>
  </div>
   <!--end Bottom Row 3 Box 8-->
  <!--Bottom Row 3 Box 8-->
  <div class="weather-item">
  <div class="chartforecast">
  
  <!--Insert link to pop up module here-->  
    <a rel='prefetch' href="http://wxcharts.eu/charts/gfs/europe/00/850temp_anom_024.jpg?<?php echo date('Ymd')?>00" data-lity >
  <!--end Insert link to pop up module here-->  
    
    <svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
     <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg> <?php echo 'wxcharts.eu 850hPa Anomaly Temp Europe'; ?></span> </a>
     
    </div>
 <div id="wxchartbox8" style="border:solid 1px RGBA(46, 46, 46, 0.3);padding-top:2px;border-radius:4px;margin-top:23px">  
 
 <!--Box 8 Insert link to source image or iframe keep width at 290px height 165px-->
 <img rel="prefetch" src=img/iframe.jpg title="weather34 logo" width="295px" height="145px">
 <!--end Insert link to source image or iframe-->
 
 </div><br>
  </div>
   <!--end Bottom Row 3 Box 8--> 
  <!--Bottom Row 3 Box 9 last one-->
  <div class="weather-item">
  <div class="chartforecast">
  
  <!--Insert link to pop up module here-->
        <a rel='prefetch' href="img/iframe.jpg" width="775px" height="420px" data-lity >
        <!--edit Insert link to pop up module here-->
    <svg id="i-activity" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
    <path d="M4 16 L11 16 14 29 18 3 21 16 28 16" />
    </svg> <?php echo 'Web-Cam Test';?>   </span></a>
</div>
   <div id="wxchartbox9" style="border-radius:4px; border:solid 1px RGBA(46, 46, 46, 0.3);padding:2px;margin-top:23px">  
   
   <!--Box 9 Insert link to source image or iframe keep width at 290px height 165px-->
 <img rel="prefetch" src=img/iframe.jpg title="weather34 logo" width="295px" height="145px">
   
   <!--end Insert link to source image or iframe-->
   
   </div><br>   
   </div>
  <!--end Bottom Row 3 Box 9 last one-->
  </div>
 <!--end outdoor data for homeweatherstation template-->
  <!--footer area for homeweatherstation template warning don't mess with this below this line unless you really know what you are doing-->
<div class=weatherfooter-container><div class=weatherfooter-item> 
<div class=hardwarelogo1>
<a href="http://weewx.com" alt="http://weewx.com" title="http://weewx.com">
  <?php
echo '<img src="img/icon-weewx.svg" alt="WeeWX" title="WeeWX"  width="150px" height="55px" ><div class=hardwarelogo1text></div>';
?></a> </div>
<div class=hardwarelogo2 ><?php
if ($weatherhardware == "Davis Vantage Vue")
{
    echo '<img src="img/designedfordavisvue.svg" alt="Davis Instruments-Meteobridge" title="Davis Instruments-Meteobridge"  width="160px" height="65px" >';
}
else if ($weatherhardware == "Davis Envoy8x")
{
    echo '<img src="img/designedfordavisenvoy8x.svg" alt="Davis Instruments-Meteobridge" title="Davis Instruments-Meteobridge"  width="160px" height="65px" >';
}
else if ($davis == "Yes")
{
    echo '<img src="img/designedfor-1.svg" alt="Davis Instruments-Meteobridge" title="Davis Instruments-Meteobridge"  width="160px" height="65px" >';
}
else if ($weatherhardware == 'Weatherflow Air-Sky')
{
    echo '<a href="http://weatherflow.com/" title="http://weatherflow.com/" target="_blank"><img src="img/wflogo.svg" width="125px" height=65px alt="http://weatherflow.com/" ></a>';
}
else echo '<a href="https://weather34.com/homeweatherstation/" title="https://weather34.com/homeweatherstation/" target="_blank"><br><img src="img/weather34logo.svg" width="40px" alt="https://weather34.com/homeweatherstation/" class="homeweatherstationlogo" ><weather34>designed by weather34 2015-' . date('Y') . '</weather34></a>'; ?> </div>
<div class=footertext>
&nbsp;<?php echo $info ?>&nbsp;(<value><?php echo $templateversion ?></value>)&nbsp;
<?php echo "WeeWX"; ?>-(<value><maxred><?php echo $weather["swversion"]; ?></value>)&nbsp;
<?php echo $info . "&nbsp;" . $weatherhardware; ?></div> 
<div class=footertext><a href="https://github.com/steepleian/weewx-Weather34"><?php echo $github; ?>&nbsp; WeeWX Version Repository at https://github.com/steepleian/weewx-Weather34 &nbsp; <img src="img/flags/<?php echo $flag; ?>.svg" width="20px" ></a></div>
  <div class=footertext><a href="https://hjelp.yr.no/hc/en-us/articles/203786121-Weather-symbols-on-Yr">Weather Symbols by <img src="img/yr.svg" width="14px" ></a></div>

</div></div>
<div id=lightningalert></div></body><?php include_once ('updater.php');
include_once ('menu.php') ?></html>
