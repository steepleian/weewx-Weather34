<?php header('Content-type: text/html; charset=utf-8');
	####################################################################################################
	#	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2015-2016-2017-18-19                          #
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at 													   #
	#   https://weather34.com/homeweatherstation/index.html 										   # 
	# 	WEATHER STATION TEMPLATE 2015-2017    wxcharts.php 											   #
	# 	  updated 11-04-2019                                                                           #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################

include('w34CombinedData.php');include('common.php');include('settings1.php');
date_default_timezone_set($TZ);?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $stationlocation; ?> Home Weather Station WX CHARTS PAGE</title>
    <meta content="Home weather station providing current weather conditions for <?php echo $stationlocation;?>" name="description">
    <meta content="website" property="og:type">
    
    <meta content="7 days" name="revisit-after">
    <meta content="web" name="distribution">
    <meta content="<?php echo "${stationlocation} \n";?> weather station" property="og:title">
    <meta content="<?php echo "${stationlocation} \n";?> weather station" property="og:site_name">
    <meta content="" property="og:url">
    <meta content="Home weather station providing current weather conditions for <?php echo $stationlocation;?>" property="og:description">
    <meta content="img/weather34.jpg" property="og:image">
    <meta content="" property="fb:app_id">
    <meta content="place" property="og:type">
    <meta content="brian underdown" name="author">
    <meta content="INDEX,FOLLOW" name="robots">
    <meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name=apple-mobile-web-app-title content="HOMEWEATHERSTATION">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
<link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="img/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="img/manifest.json">
<meta name="theme-color" content="#ffffff">
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
<link href="favicon.ico" rel="icon" type="image/x-icon">
<link href="css/main.<?php echo $theme; ?>.css" rel="stylesheet prefetch">
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
<div class="weather-container">
<div class="weather-item">
<div class="chartforecast">

<!--Insert link to pop up module here-->
         <a rel='prefetch' href="http://www.meteociel.fr/modeles/ecmwf/runs/<?php echo date('Ymd')?>00/ECM0-0.GIF" data-lity  >
 <!--end Insert link to pop up module here-->  
       
         <svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
         <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg>
            <?php echo 'Meteociel Temp 850hpa Europe'; ?></span> </a>
         
      </div>
  
         <div id="wxchartbox1" style="border-radius:4px; border:solid 1px RGBA(46, 46, 46, 0.3);padding-top:2px;margin-top:23px;">  
         
         <!--Insert link to source image or iframe keep width at 290px height 165px-->
         <img rel='prefetch' src="http://www.meteociel.fr/modeles/ecmwf/runs/<?php echo date('Ymd')?>00/ECM0-0.GIF"  width="290px" height="145px">
         <!--end Insert link to source image or iframe-->
         
         </div><br>
  </div>
  <!--end Top Row 1 Box 1-->
  
  <!--Top Row 1 Box 2-->
  <div class="weather-item">
  <div class="chartforecast">
  
  <!--Insert link to pop up module here-->
         <a rel='prefetch' href="http://modeles.meteociel.fr/modeles/gfs/runs/<?php echo date('Ymd')?>00/gfs-2-18.png" data-lity >
	<!-- end Insert link to pop up module here-->	
     
		 <svg id="i-external" viewBox="0 0 32 32" width="10" height="10" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="6.25%">
         <path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg> <?php echo 'Meteociel Precipitation Europe';?></span> </a>
          
      </div>
  <div id="wxchartbox2" style="border-radius:4px; border:solid 1px RGBA(46, 46, 46, 0.3);padding-top:2px;margin-top:23px;">  
  
  <!--Insert link to source image or iframe keep width at 290px height 165px-->
  <img rel='prefetch' src="http://modeles.meteociel.fr/modeles/gfs/runs/<?php echo date('Ymd')?>00/gfs-2-18.png"  width="290px" height="145px">
  <!--end Insert link to source image or iframe-->
  
  </div><br>
  </div>
  <!--end Top Row 1 Box 2-->
  
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
  <!--footer area for homeweatherstation template warning dont mess with this below this line unless you really know what you are doing-->
<div class=weatherfooter-container><div class=weatherfooter-item> 
<div class=hardwarelogo1>
<a href="https://www.meteobridge.com/wiki/index.php/Home" alt="https://www.meteobridge.com/wiki/index.php/Home" title="https://www.meteobridge.com/wiki/index.php/Home">
<?php
if ($mbplatform== "Meteobridge NanoSD"){echo '<img src="img/nano.svg" alt="Davis Instruments-Meteobridge" title="Davis Instruments-Meteobridge"  width="140px" height="45px" ><div class=hardwarelogo1text>Meteobridge NanoSD</div>';}
else if ($mbplatform== "Meteobridge Nano"){echo '<img src="img/nano.svg" alt="Davis Instruments-Meteobridge" title="Davis Instruments-Meteobridge"  width="140px" height="45px" ><div class=hardwarelogo1text>Meteobridge Nano</div>';}
else if ($mbplatform== "Meteobridge Pro"){echo '<img src="img/MeteobridgePRO.svg" alt="Davis Instruments-Meteobridge" title="Davis Instruments-Meteobridge"  width="140px" height="45px" ><div class=hardwarelogo1text>Meteobridge Pro</div>';}
else if ($mbplatform== "MB TP-Link"){echo '<img src="img/TP-LINK.svg" alt="Meteobridge TP-LINK" title="Meteobridge TP-LINK"  width="140px" height="45px" ><div class=hardwarelogo1text>Meteobridge TP-LINK</div>';}
else if ($mbplatform== "MB D-Link"){echo '<img src="img/meteobridge.svg" alt="Meteobridge D-LINK" title="Meteobridge D-LINK"  width="140px" height="45px" ><div class=hardwarelogo1text>Meteobridge D-LINK</div>';}
else if ($mbplatform== "MB Asus"){echo '<img src="img/meteobridge.svg" alt="Meteobridge Asus" title="Meteobridge Asus"  width="140px" height="45px" ><div class=hardwarelogo1text>Meteobridge Asus</div>';}
else if ($mbplatform== "Meteobridge"){echo '<img src="img/meteobridge.svg" alt="Meteobridge TP-LINK" title="Meteobridge TP-LINK"  width="140px" height="45px" ><div class=hardwarelogo1text></div>';}




?></a> </div>
<div class=hardwarelogo2 ><?php
if ($weatherhardware== "Davis Vantage Vue"){echo '<img src="img/designedfordavisvue.svg" alt="Davis Instruments-Meteobridge" title="Davis Instruments-Meteobridge"  width="160px" height="65px" >';}
else if ($weatherhardware== "Davis Envoy8x"){echo '<img src="img/designedfordavisenvoy8x.svg" alt="Davis Instruments-Meteobridge" title="Davis Instruments-Meteobridge"  width="160px" height="65px" >';}
else if ($davis=="Yes"){echo '<img src="img/designedfor-1.svg" alt="Davis Instruments-Meteobridge" title="Davis Instruments-Meteobridge"  width="160px" height="65px" >';}else if ($weatherhardware=='Weatherflow Air-Sky'){echo '<a href="http://weatherflow.com/" title="http://weatherflow.com/" target="_blank"><img src="img/wflogo.svg" width="125px" height=65px alt="http://weatherflow.com/" ></a>';}
else echo '<a href="https://weather34.com/homeweatherstation/" title="https://weather34.com/homeweatherstation/" target="_blank"><br><img src="img/iframe.jpg" width="40px" alt="https://weather34.com/homeweatherstation/" class="homeweatherstationlogo" ><weather34>designed by weather34 2015-'.date('Y').'</weather34></a>';?> </div>

<div class=footertext>
&nbsp;<?php echo $info?>&nbsp;(<value><?php echo $templateversion?></value>)&nbsp;
<?php echo $mbplatform;?>-(<value><maxred><?php echo $weather["swversion"];echo "</maxred>-",$weather["build"]?></value>)&nbsp;
<?php echo $info."&nbsp;".$weatherhardware;?></div> 
<div class=footertext><?php echo $info;?>&nbsp;<?php echo $stationlocation ;?> Weather Station &nbsp; <img src="img/flags/<?php echo $flag ;?>.svg" width="20px" ></div>

</div></div>
<div id=lightningalert></div></body><?php include_once('updater.php');include_once('menu.php')?></html>
