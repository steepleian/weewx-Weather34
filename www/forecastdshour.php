<?php
include_once('settings.php');include('w34CombinedData.php');header('Content-type: text/html; charset=utf-8');
	####################################################################################################
	#	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2016                                          #
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at http://weather34.com/homeweatherstation/index.html  # 
	# 	Hourly Darksky 	updated 11 March 2019						 	                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title><?php echo "${stationName}";?> <?php echo 'Hourly Forecast' ;
		$result = date_sun_info(time(), $lat, $lon);
$sunr=date_sunrise(time(), SUNFUNCS_RET_STRING, $lat, $lon, $rise_zenith, $UTC);
$suns=date_sunset(time(), SUNFUNCS_RET_STRING, $lat, $lon, $set_zenith, $UTC);
$sunr1=date_sunrise(strtotime('+1 day', time()), SUNFUNCS_RET_STRING, $lat, $lon, $rise_zenith, $UTC);
$suns1=date_sunset(strtotime('+1 day', time()), SUNFUNCS_RET_STRING, $lat, $lon, $set_zenith, $UTC);
$tw=date_sunrise(strtotime('+1 day', time()), SUNFUNCS_RET_STRING, $lat, $lon, 96, $UTC);
$twe=date_sunset(strtotime('+1 day', time()), SUNFUNCS_RET_STRING, $lat, $lon, 96, $UTC);
$suns2 =date('G.i', $result['sunset']);
$sunr2 =date('G.i', $result['sunrise']);
$suns3 =date('G.i', $result['sunset']);
$sunr3 =date('G.i', $result['sunrise']);
$sunrisehour =date('G', $result['sunrise']);
$sunsethour =date('G', $result['sunset']);
$twighlight_begin =date('G:i', $result['civil_twilight_begin']);
$twighlight_end =date('G:i', $result['civil_twilight_end']);
$now =date('G.i');		
?> </title>
		
		
 <style>body{background:rgba(11, 12, 12, 0.4)}
 @font-face{font-family:weathertext2;src:url(css/fonts/verbatim-regular.woff) format("woff"),url(css/fonts/verbatim-regular.woff2) format("woff2"),url(css/fonts/verbatim-regular.ttf) format("truetype")}
body{background:rgba(11, 12, 12, 0.4)}	
.darkskyforecasting{float:left;display:block;margin-right:0;width:50%;border-radius:4px;margin:2px;margin-top:5px;font-family:Arial;margin-left:5px;height:350px;padding:5px;background-color:#3d3d3d;border:1px solid rgba(153,155,156,1);color:#777}darkskyweekday{position:absolute;margin:3px;background-color:#494a4b;text-align:center;padding:5px;color:#aaa;font-family:Arial;font-size:12px;margin-bottom:15px;border-radius:4px}darkskytemphi{margin-top:5px;font-size:13px;color:#ff7c39;font-family:Arial;margin-left:10%}darkskytemphi span{font-size:13px;color:#aaa}darkskytemplo{margin-top:5px;font-size:13px;color:#00a4b4;font-family:Arial}darkskytemplo span{font-size:13px;color:#aaa;font-family:Arial}darkskysummary{font-size:12px;color:#aaa;font-family:Arial}darkskywindspeed{font-size:12px;color:#ff7c39;font-family:Arial;line-height:10px}.darkskydiv{position:relative;width:650px;overflow:hidden!important;height:375px;float:none;margin-left:7%;margin-top:1%}.darkskyforecasthome darkskytemphihome{margin-top:5px;font-size:12px;color:#ff7c39;font-family:Arial;margin-left:5%;width:200px}.darkskyforecasthome darkskytemphihome span{font-size:12px;font-family:Arial;color:#ff7c39;width:300px}.darkskyforecasthome darkskytemplohome{font-size:12px;color:#01a4b5;font-family:Arial}.darkskyforecasthome darkskytemplohome span{font-size:12px;color:#01a4b5;font-family:Arial}.darkskyforecasthome darkskytempwindhome{position:absolute;font-size:12px;color:#aaa;font-family:Arial;margin-top:40px}.darkskyforecasthome darkskyrainhome{position:absolute;font-size:12px;color:#aaa;font-family:Arial;margin-top:5px;margin-left:30px;line-height:11px}.darkskyforecasthome darkskyrainhome1{position:absolute;font-size:12px;color:#aaa;font-family:Arial;margin-top:8px;margin-left:15px;line-height:11px;width:200px}.darkskyforecasthome darkskytempwindhome span{font-size:12px;color:#01a4b5;font-family:Arial;margin-top:30px;text-transform:capitalize}.darkskyforecasthome darkskytempwindhome span2{font-size:12px;color:#ff7c39;font-family:Arial;margin-top:30px;margin-left:5px}darkskyiconcurrent{margin-left:30px;position:absolute;margin-top:5px;margin-bottom:30px}.darkskyiconcurrent span1{font-size:12px;color:#ff7c39;margin-left:10px;display:block}.darkskyiconcurrent span2{font-size:12px;color:#01a4b5;margin-left:10px}.darkskyiconcurrent img{position:relative;width:110px;margin-top:-40px;margin-left:40%;margin-bottom:-10px;margin-right:0;padding-right:0;float:left}.darkskynexthours{postion:absolute;margin-top:30px;font-family:arial,sans-serif;text-rendering:optimizeLegibility;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;-moz-font-smoothing:antialiased;-o-font-smoothing:antialiased;-ms-font-smoothing:antialiased;font-size:12px;line-height:10px;margin-left:0}.darkskynexthours span2{font-size:12px;color:#00a4b4;margin-left:0;margin-top:-5px;padding:0}body{line-height:11px}grey{color:#aaa}blue1{color:rgba(0,154,170,1.000);line-height:11px}orange{color:#ff7c39}green{color:rgba(144,177,42,1.000)}gust{color:#ff7c39;line-height:11px}unit{color:#aaa;font-size:.8em;font-family:weathertext2;}windunit{color:#aaa;font-size:10px}a{font-size:10px;color:#aaa;text-decoration:none!important;font-family:arial}.forecastupdated{position:absolute;font-size:10px;color:#aaa;font-family:arial;bottom:5px;float:right;margin-left:575px}
.darkskyforecastinghome{
float:left;display:inline;margin-right:0;width:15%;border-radius:4px;margin:5px;font-family:Arial;margin-left:0;height:140px;padding:5px;
background:rgba(11, 12, 12, 0.4);
background: linear-gradient(to bottom, rgba(97, 106, 114, 1.000) 12%,rgba(29, 32, 34, 1.000) 11%,rgba(29, 32, 34, 1.000) 100%,rgba(229, 77, 11, 0) 0%);
background: -webkit-linear-gradient(to bottom, rgba(97, 106, 114, 1.000) 12%,rgba(29, 32, 34, 1.000) 11%,rgba(29, 32, 34, 1.000) 100%,rgba(229, 77, 11, 0) 0%);
background: -moz-linear-gradient(to bottom, rgba(97, 106, 114, 1.000) 12%,rgba(29, 32, 34, 1.000) 11%,rgba(29, 32, 34, 1.000) 100%,rgba(229, 77, 11, 0) 0%);
background: -o-linear-gradient(to bottom, rgba(97, 106, 114, 1.000) 12%,rgba(29, 32, 34, 1.000) 11%,rgba(29, 32, 34, 1.000) 100%,rgba(229, 77, 11, 0) 0%);
border:0;color:#aaa;overflow:hidden!important;margin-bottom:5px;border:solid 1px #444;border-bottom:solid 1px #444;border-top:1px solid rgba(97, 106, 114, 1.000);}
.darkskyweekdayhome{postion:absolutue;text-align:center;padding:0;color:#fff;font-family:Arial;font-size:11px;margin:0;background:0;margin-bottom:12px;}

.weather34darkbrowser{font-family:Arial, Helvetica, sans-serif;position:relative;background:0;width:103%;max-height:30px;margin:auto;margin-top:-15px;margin-left:-20px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:45px;background-image:radial-gradient(circle,#EB7061 6px,transparent 8px),radial-gradient(circle,#F5D160 6px,transparent 8px),radial-gradient(circle,#81D982 6px,transparent 8px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),linear-gradient(to bottom,rgba(59,60,63,0.4) 40px,transparent 0);background-position:left top,left top,left top,right top,right top,right top,0 0;background-size:50px 45px,90px 45px,130px 45px,50px 30px,50px 45px,50px 60px,100%;background-repeat:no-repeat,no-repeat}
.weather34darkbrowser[url]:after{content:attr(url);color:#aaa;font-size:14px;position:absolute;left:0;right:0;top:0;padding:5px 15px;margin:11px 50px 0 90px;border-radius:3px;background:rgba(97, 106, 114, 0.3);height:20px;box-sizing:border-box}value{font-size:.8em;font-family:weathertext2}value1{font-size:1em;font-family:weathertext2}
blue{color:#3b9cac;}green{color:#90b12a;}yellow{color:#e6a141}

zerotds,bluetds,greentds,orangetds,purpletds,redtds,yellowtds{color:#fff;text-transform:capitalize;border-radius:2px;width:35px;padding:0 3px}
bluetds{background:#01a4b5}yellowtds{background:#e6a141}orangetds{background:#d05f2d}greentds{background:#90b12a}redtds{background:-webkit-linear-gradient(90deg,#d86858,rgba(211,93,78,.7));background:linear-gradient(90deg,#d86858,rgba(211,93,78,.7))}purpletds{background:-webkit-linear-gradient(90deg,#d86858,rgba(157,59,165,.4));background:linear-gradient(90deg,#d86858,rgba(157,59,165,.4))}zerotds{background:#4a636f}
</style>
</head>
<body>
<div class="weather34darkbrowser" url="<?php echo "${stationName} \n";?> Hourly Forecast  (<?php echo $weather["temp_units"]?>&deg;)"> </div>
		<div style="position:absolute;width:725px;background:none;margin:0 auto;margin-left:7%;margin-top:5px;">
			
		<script src="js/jquery.js"></script>
		 <div class="darkskyforecasthome">
		<div class="darkskydiv">
		  <?php
  if ($weather["wind_units"]=='kts'){$weather["wind_units"]="kn";}
		 date_default_timezone_set($TZ);
        $hi = 0;
      foreach ($darkskyhourlyCond as $cond) {     
            $darkskyhourlyTime = $cond['time'];
            $darkskyhourlySummary = $cond['summary'];
            $darkskyhourlyIcon = $cond['icon'];
			
			//convert all the scenarios
if ($weather["temp_units"]=='C' && $darkskyunit=='us'){ $darkskyhourlyTemp = round($cond['temperature']-32)*5/9;}
else if ($weather["temp_units"]=='F' && $darkskyunit=='si'){ $darkskyhourlyTemp = round(32 +(9*$cond['temperature']/5));}
else if ($weather["temp_units"]=='F' && $darkskyunit=='uk2'){ $darkskyhourlyTemp = round(32 +(9*$cond['temperature']/5));}
else if ($weather["temp_units"]=='F' && $darkskyunit=='ca'){ $darkskyhourlyTemp = round(32 +(9*$cond['temperature']/5));}
else $darkskyhourlyTemp = round($cond['temperature']);

			
			
            //$darkskyhourlyTemp = round($cond['temperature']);
            //$darkskyhourlyTempLow = round($cond['temperatureMin']);
			$darkskyhourlyWinddir = $cond['windBearing'];
			$darkskyhourlyuv = $cond['uvIndex'];
			$darkskyhourlyClouds = $cond['cloudCover']*100;
            $darkskyhourlyHumidity = $cond['humidity']*100;
            $darkskyhourlyPrecipProb = $cond['precipProbability']*100;
            if (isset($cond['precipType'])){
            $darkskyhourlyPrecipType = $cond['precipType'];}			
			if ($rainunit=='in' && $darkskyunit=='si'){ $darkskyhourlyprecipIntensity=number_format($cond['precipIntensity']*0.0393701,2);}
			else if ($rainunit=='mm' && $darkskyunit=='si'){ $darkskyhourlyprecipIntensity=number_format($cond['precipIntensity']*1,1);}	
			
			if ($rainunit=='in' && $darkskyunit=='ca'){ $darkskyhourlyprecipIntensity=number_format($cond['precipIntensity']*0.0393701,2);}
			else if ($rainunit=='mm' && $darkskyunit=='ca'){ $darkskyhourlyprecipIntensity=number_format($cond['precipIntensity']*10,1);}	
			
			if ($rainunit=='in' && $darkskyunit=='us'){ $darkskyhourlyprecipIntensity=number_format($cond['precipIntensity']*1);}
			else if ($rainunit=='mm' && $darkskyunit=='us'){ $darkskyhourlyprecipIntensity=number_format($cond['precipIntensity']*10,1);}	
			
			if ($rainunit=='in' && $darkskyunit=='uk2'){ $darkskyhourlyprecipIntensity=number_format($cond['precipIntensity']*0.0393701,2);}
			else if ($rainunit=='mm' && $darkskyunit=='uk2'){ $darkskyhourlyprecipIntensity=number_format($cond['precipIntensity']*1,1);}	
			
			
			
						
			else $darkskyhourlyprecipIntensity = number_format($cond['precipIntensity'],1);		
if ($weather["wind_units"] == 'kts'){$weather["wind_units"] = "kn";}
        //si wind is m/s
if ($weather["wind_units"] == 'mph' && $darkskyunit=='si') {$windspeedconversion =2.23694;} 
else if ($weather["wind_units"] == 'km/h' && $darkskyunit=='si') {$windspeedconversion = 3.6;} 
else if ($weather["wind_units"] == 'm/s' && $darkskyunit=='si') {$windspeedconversion = 1;}
//ca wind is m/s
if ($weather["wind_units"] == 'mph' && $darkskyunit=='ca') {$windspeedconversion = 2.23694;} 
else if ($weather["wind_units"] == 'km/h' && $darkskyunit=='ca') {$windspeedconversion = 1;} 
else if ($weather["wind_units"] == 'm/s' && $darkskyunit=='ca') {$windspeedconversion = 3.6;} 
//us wind is mph
if ($weather["wind_units"] == 'mph' && $darkskyunit=='us') {$windspeedconversion =1;} 
else if ($weather["wind_units"] == 'km/h' && $darkskyunit=='us') {$windspeedconversion = 1.6093466682922179523;} 
else if ($weather["wind_units"] == 'm/s' && $darkskyunit=='us') {$windspeedconversion = 0.4470407411923185137;} 
//uk2 wund is mph
if ($weather["wind_units"] == 'mph' && $darkskyunit=='uk2') {$windspeedconversion =1;} 
else if ($weather["wind_units"] == 'km/h' && $darkskyunit=='uk2') {$windspeedconversion = 1.6093466682922179523;} 
else if ($weather["wind_units"] == 'm/s' && $darkskyunit=='uk2') {$windspeedconversion = 0.4470407411923185137;}  

			       
            $darkskyhourlyWindSpeed = round($cond['windSpeed']*$windspeedconversion,0);
			$darkskyhourlyWindGust = round($cond['windGust']*$windspeedconversion,0);
			  if ($hi++ == 10) break; 
            	  echo '<div class="darkskyforecastinghome"><value>';  
                  echo '<div class="darkskyweekdayhome"><value>'.date("H:i", $darkskyhourlyTime).'</div>';  
				  echo '<darkskytemphihome><value>
				  
				  <span><value>';
				  if($tempunit=='F' && $darkskyhourlyTemp<44.6){echo '<darkskytemphihome><bluetds>'.number_format($darkskyhourlyTemp,0).'°</bluetds></darkskytemphihome>';}
else if($tempunit=='F' && $darkskyhourlyTemp>104){echo '<darkskytemphihome><purpletds>'.number_format($darkskyhourlyTemp,0).'°</purpletds></darkskytemphihome>';}
else if($tempunit=='F' && $darkskyhourlyTemp>80.6){echo '<darkskytemphihome><redtds>'.number_format($darkskyhourlyTemp,0).'°</redtds></darkskytemphihome>';}
else if($tempunit=='F' && $darkskyhourlyTemp>64){echo '<darkskytemphihome><orangetds>'.number_format($darkskyhourlyTemp,0).'°</orangetds></darkskytemphihome>';}
else if($tempunit=='F' && $darkskyhourlyTemp>55){echo '<darkskytemphihome><yellowtsd>'.number_format($darkskyhourlyTemp,0).'°</yellowtds></darkskytemphihome>';}
else if($tempunit=='F' && $darkskyhourlyTemp>=44.6){echo '<darkskytemphihome><greentds>'.number_format($darkskyhourlyTemp,0).'°</greentds></darkskytemphihome>';}
				  
else if($darkskyhourlyTemp<7){echo '<darkskytemphihome><bluetds>'.number_format($darkskyhourlyTemp,0).'°</bluet></darkskytemphihome>';}
else if($darkskyhourlyTemp>40){echo '<darkskytemphihome><purpletsd>'.number_format($darkskyhourlyTemp,0).'°</purpletds></darkskytemphihome>';}
else if($darkskyhourlyTemp>27){echo '<darkskytemphihome><redtds>'.number_format($darkskyhourlyTemp,0).'°</redtds></darkskytemphihome>';}
else if($darkskyhourlyTemp>17.7){echo '<darkskytemphihome><orangetds>'.number_format($darkskyhourlyTemp,0).'°</orangetds></darkskytemphihome>';}
else if($darkskyhourlyTemp>12.7){echo '<darkskytemphihome><yellowtds>'.number_format($darkskyhourlyTemp,0).'°</yellowtds></darkskytemphihome>';}
else if($darkskyhourlyTemp>=7){echo '<darkskytemphihome><greentds>'.number_format($darkskyhourlyTemp,0).'°</greentds></darkskytemphihome>';}
				  
				  
				  echo '<grey> '.$weather["temp_units"].'</grey> </span>';
				  
				  echo '<value1><grey>&nbsp;UVI:</grey>&nbsp;';
				  
				  if ($darkskyhourlyuv>10){echo '<purpletsd>' .$darkskyhourlyuv;}
				  else if ($darkskyhourlyuv>7){echo '<redtds>' .$darkskyhourlyuv;}
				  else if ($darkskyhourlyuv>5){echo '<orangetds>' .$darkskyhourlyuv;}
				  else if ($darkskyhourlyuv>2){echo '<yellowtds>' .$darkskyhourlyuv;}
				  else if ($darkskyhourlyuv>0){echo '<greentds>' .$darkskyhourlyuv;}
				  else if ($darkskyhourlyuv==0){echo '<zerotds>' .$darkskyhourlyuv;}
				  
				  echo '</orange></darkskytemphihome><br>';  
				  
				  
				  
				  if ($windunit=='kts'){$windunit="kn";}
				  if (date("G", $darkskyhourlyTime) >$suns2){echo '<darkskyiconcurrent><img src="css/darkskyicons/nt_'. $darkskyhourlyIcon.'.svg" width="40"></img></darkskyiconcurrent>';}
			      else if (date("G", $darkskyhourlyTime) <$sunr2){echo '<darkskyiconcurrent><img src="css/darkskyicons/nt_'. $darkskyhourlyIcon.'.svg" width="40"></img></darkskyiconcurrent>';}			  
				  else  echo '<darkskyiconcurrent><img src="css/darkskyicons/'.$darkskyhourlyIcon.'.svg" width="40" ></img></darkskyiconcurrent>';
				  echo '<darkskytempwindhome><span2 style="color:#d05f2d;"><value>';				 			 
				  echo "<img src = 'css/windicons/avgw.svg' width='15' style='-webkit-transform:rotate(".$darkskyhourlyWinddir."deg);-moz-transform:rotate(".$darkskyhourlyWinddir."deg);-o-transform:rotate(".$darkskyhourlyWinddir."deg);transform:rotate(".$darkskyhourlyWinddir."deg)'></span>";				 
				  echo  '</span2><span4><value> '.$darkskyhourlyWindSpeed.' | <gust>'.$darkskyhourlyWindGust.'</gust></span4> <windunit>'.$windunit.'</windunit><br>';				 		 
				  echo '&nbsp;<darkskyrainhome><span><value>'.$darkskyhourlyPrecipType.' </darkskyrainhome><br><darkskyrainhome1><value>'. $darkskyhourlyPrecipProb.'% <blue1>'.$rainsvg.' '. $darkskyhourlyprecipIntensity.'</blue1><unit> '.$rainunit.'</unit></darkskyrainhome1></span>';
				  echo  '</div>';}?></div></div>
 <div style="position:absolute;bottom:5px;z-index:9999;font-weight:normal;font-size:10px;color:#aaa;text-decoration:none !important;float:right;font-family:arial;">
  
   &nbsp;&nbsp;data provided by <a href="https://darksky.net/about" title="https://darksky.net" target="_blank">https://darksky.net/</a> -- CSS/PHP scripts by <a href="https://weather34.com" title="weather34.com" target="_blank">weather34.com</a>  &copy;<?php echo date('Y');?>
  </div>
  </body>
  </html>
