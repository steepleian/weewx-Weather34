<?php
include_once('settings.php');include('w34CombinedData.php');
	####################################################################################################
	#	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2016-2019                                     #
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at https://weather34.com/homeweatherstation/index.html # 
	# 	                                                                                               #
	# 	                                                                                               #
	# 	FORECAST WEATHER UNDERGROUND WEATHER FORECAST: FEB 2109  			                           #
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
	//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title><?php echo "${stationName}";?> <?php echo 'Forecast' ;?> </title>
		
		<style>
		@font-face{font-family:system;font-style:normal;src:local(".SFNSText-Light"),local("Arial")}
		@font-face{font-family:weathertext2;src:url(css/fonts/verbatim-regular.woff) format("woff"),url(css/fonts/verbatim-regular.woff2) format("woff2"),url(css/fonts/verbatim-regular.ttf) format("truetype")}
body{background:rgba(11, 12, 12, 0.4)}		
.darkskyforecasting{float:left;display:block;margin-right:0;width:40%;border-radius:4px;margin:2px;margin-top:5px;font-family:weathertext2;margin-left:5px;height:210px;padding:5px;background-color:rgba(253, 166, 16, 1.000);border:1px solid rgba(153,155,156,0.3);color:#aaa;font-size:0.6rem;color:#aaa;font-family:weathertext2;line-height:12px}
darkskyweekday{position:absolute;margin:3px;background-color:rgba(253, 166, 16, 1.000);text-align:center;padding:5px;color:#aaa;font-family:weathertext2;font-size:11px;margin-bottom:20px;border-radius:4px;font-size:0.6rem;color:#aaa;font-family:weathertext2;line-height:15px}darkskytemphi{margin-top:5px;font-size:0.6rem;color:rgba(255,124,57,1);font-family:weathertext2;margin-left:10%}darkskytemphi span{font-size:0.6rem;color:#aaa}darkskytemplo{margin-top:5px;font-size:10px;color:#00a4b4;font-family:weathertext2}darkskytemplo span{font-size:10px;color:#aaa;font-family:weathertext2}darkskysummary{font-size:0.5rem;color:#aaa;font-family:weathertext2;line-height:11px}darkskywindspeed{font-size:10px;color:#aaa;font-family:weathertext2;line-height:11px}.darkskywindspeedicon{position:absolute;font-size:0.6rem;color:#aaa;font-family:weathertext2;line-height:11px;margin-top:-55px;margin-left:67px}.darkskywindgust{position:absolute;font-size:0.6rem;color:#aaa;font-family:weathertext2;line-height:11px;margin-top:-55px;margin-left:97px}.darkskydiv{position:relative;width:700px;overflow:hidden!important;height:365px;float:none;margin-left:2%;margin-top:5px}
.darkskyforecastinghome{font-size:10px;float:left;display:inline;margin-right:0;width:21%;border-radius:4px;margin:5px;font-family:weathertext2,system;margin-left:0;height:160px;padding:5px;
background: rgba(29, 32, 34, 1.000);background: linear-gradient(to bottom, rgba(97, 106, 114, 1.000) 12%,rgba(29, 32, 34, 0) 11%,rgba(29, 32, 34, 0) 100%,rgba(229, 77, 11, 0) 0%);
background: -webkit-linear-gradient(to bottom, rgba(97, 106, 114, 1.000) 12%,rgba(29, 32, 34, 0) 11%,rgba(29, 32, 34,0) 100%,rgba(229, 77, 11, 0) 0%);
background: -moz-linear-gradient(to bottom, rgba(97, 106, 114, 1.000) 12%,rgba(29, 32, 34, 0) 11%,rgba(29, 32, 34, 0) 100%,rgba(229, 77, 11, 0) 0%);
background: -o-linear-gradient(to bottom, rgba(97, 106, 114, 1.000) 12%,rgba(29, 32, 34,0) 11%,rgba(29, 32, 34, 0) 100%,rgba(229, 77, 11, 0) 0%);
border:0;color:#aaa;overflow:hidden!important;margin-bottom:5px;border:solid 1px #444;border-bottom:solid 1px #444;border-top:1px solid rgba(97, 106, 114, 1.000);}
.darkskyweekdayhome{postion:absolutue;text-align:center;padding:0;color:#fff;font-family:weathertext2;font-size:0.6rem;margin:0;background:0;margin-bottom:12px;}
.darkskyforecasthome darkskytemphihome{font-size:0.6rem;color:#ff7c39;font-family:weathertext2;line-height:10px}.darkskyforecasthome darkskytemphihome span{font-size::0.6rem;color:#ff7c39;font-family:weathertext2;line-height:10px}.darkskyforecasthome darkskytemplohome{font-size:0.6rem;color:#ff7c39;font-family:weathertext2;line-height:10px}.darkskyforecasthome darkskytemplohome span{font-size:0.6rem;color:#01a4b5;font-family:weathertext2}.darkskyforecasthome darkskytempwindhome{font-size:10px;color:#aaa;font-family:weathertext2;line-height:10px}.darkskyforecasthome darkskytempwindhome span{font-size:0.6rem;color:#aaa;font-family:weathertext2;line-height:10px}.darkskyforecasthome darkskytempwindhome span2{font-size:0.6rem;color:#aaa;font-family:weathertext2;line-height:10px;margin-top:3px}.darkskyiconcurrent img{position:relative;width:80px;margin-top:-50px;margin-left:0;margin-bottom:-10px;margin-right:0;padding-right:0;float:left}.darkskynexthours{line-height:12px}.darkskynexthours span2{line-height:12px}body{line-height:11px}grey{color:#aaa}blue1{color:#01a4b5;text-transform:capitalize}orange1{color:#ff7c39}green{color:rgba(144,177,42,1)}a{font-size:10px;color:#aaa;text-decoration:none!important;font-family:weathertext2}.forecastupdated{position:absolute;font-size:10px;color:#aaa;font-family:weathertext2;bottom:25px;float:right;margin-left:575px}	
.weather34darkbrowser{font-family:weathertext2, Helvetica, sans-serif;position:relative;background:0;width:103%;max-height:30px;margin:auto;margin-top:-15px;margin-left:-20px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:45px;background-image:radial-gradient(circle,#EB7061 6px,transparent 8px),radial-gradient(circle,#F5D160 6px,transparent 8px),radial-gradient(circle,#81D982 6px,transparent 8px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),linear-gradient(to bottom,rgba(59,60,63,0.4) 40px,transparent 0);background-position:left top,left top,left top,right top,right top,right top,0 0;background-size:50px 45px,90px 45px,130px 45px,50px 30px,50px 45px,50px 60px,100%;background-repeat:no-repeat,no-repeat}
.weather34darkbrowser[url]:after{content:attr(url);color:#aaa;font-size:11px;position:absolute;left:0;right:0;top:0;padding:5px 15px;margin:11px 50px 0 90px;border-radius:3px;background:rgba(97, 106, 114, 0.3);height:20px;box-sizing:border-box}precip{position:relative;top:5px;padding:2px;border-radius:3px;background:rgba(97,106,114,0.2);}value{font-size:.8em;font-family:weathertext2}value1{font-size:1em;font-family:weathertext2}
bluetds,greentds,orangetds,purpletds,redtds,yellowtds{color:#fff;text-transform:capitalize;border-radius:2px;width:35px;padding:0 3px;font-size:11px;}
bluetds{background:#01a4b5}yellowtds{background:#e6a141}orangetds{background:#d05f2d}greentds{background:#90b12a}redtds{background:-webkit-linear-gradient(90deg,#d86858,rgba(211,93,78,.7));background:linear-gradient(90deg,#d86858,rgba(211,93,78,.7))}purpletds{background:-webkit-linear-gradient(90deg,#d86858,rgba(157,59,165,.4));background:linear-gradient(90deg,#d86858,rgba(157,59,165,.4))}
blueu,greenu,orangeu,purpleu,redu,yellowu,zerou{color:#fff;border-radius:2px;width:35px;font-size:11px;padding:0 3px}
blueu{background:#01a4b5}zerou{color:#777}yellowu{background:#e6a141}orangeu{background:#d05f2d}greenu{background:#90b12a}redu{background:#cd5245}purpleu{background:#b600b0}zerou{background:#4a636f}

</style>
</head>
<body>
<div class="weather34darkbrowser" url="<?php echo "${stationName} \n";?> Forecast  (<?php echo $weather["temp_units"]?>&deg;)"></div>
		<div style="position:absolute;width:725px;background:none;margin:0 auto;margin-left:7%;margin-top:5px;">
			
        <br>
		<script src="js/jquery.js"></script>
		 <div class="darkskyforecasthome">
		<div class="darkskydiv"><value>
<?php
if ($windunit=='kts'){$windunit="kn";}        
        foreach ($darkskydayCond as $cond) {
            $darkskydayTime = $cond['time'];
            $darkskydaySummary = $cond['summary'];
            $darkskydayIcon = $cond['icon'];
            if ($weather["temp_units"]=='F'){ $darkskydayTempHigh = round(32 +(9*$cond['temperatureMax']/5));}else $darkskydayTempHigh = round($cond['temperatureMax']);
			if ($weather["temp_units"]=='F'){ $darkskydayTempLow = round(32 +(9*$cond['temperatureMin']/5));}else $darkskydayTempLow = round($cond['temperatureMin']);
			$darkskydayWinddir = $cond['windBearing'];
			$darkskydayClouds = $cond['cloudCover']*100;
            $darkskydayHumidity = $cond['humidity']*100;
			$darkskydayUV = $cond['uvIndex'];
			$darkskydayPrecipProb = $cond['precipProbability']*100;
			
           if (isset($cond['precipType'])){$darkskydayPrecipType = $cond['precipType'];}
if ($rainunit=='in'){ $darkskydayprecipIntensity=number_format($cond['precipIntensity'],2);} 
else $darkskydayprecipIntensity = number_format($cond['precipIntensity']*25.4,1);
if ($rainunit=='in'){$darkskydayacumm=round($cond['precipAccumulation']*0.393701,1);}
else {$darkskydayacumm=round($cond['precipAccumulation'],1);}
//convert all the scenarios
if ($weather["temp_units"]=='C' && $darkskyunit=='us'){ $darkskydayTempHigh = round($cond['temperatureMax']-32)*5/9;}
else if ($weather["temp_units"]=='F' && $darkskyunit=='si'){ $darkskydayTempHigh = round(32 +(9*$cond['temperatureMax']/5));}
else if ($weather["temp_units"]=='F' && $darkskyunit=='uk2'){ $darkskydayTempHigh = round(32 +(9*$cond['temperatureMax']/5));}
else if ($weather["temp_units"]=='F' && $darkskyunit=='ca'){ $darkskydayTempHigh = round(32 +(9*$cond['temperatureMax']/5));}
else $darkskydayTempHigh = round($cond['temperatureMax']);
if ($weather["temp_units"]=='C' && $darkskyunit=='us'){ $darkskydayTempLow = round($cond['temperatureMin']-32)*5/9;}
else if ($weather["temp_units"]=='F' && $darkskyunit=='si'){ $darkskydayTempLow = round(32 +(9*$cond['temperatureMin']/5));}
else if ($weather["temp_units"]=='F' && $darkskyunit=='uk2'){ $darkskydayTempLow = round(32 +(9*$cond['temperatureMin']/5));}
else if ($weather["temp_units"]=='F' && $darkskyunit=='ca'){ $darkskydayTempLow = round(32 +(9*$cond['temperatureMin']/5));}
else $darkskydayTempLow = round($cond['temperatureMin']);


   //si wind is m/s
if ($weather["wind_units"] == 'mph' && $darkskyunit=='si') {$windspeedconversion =2.23694;} 
else if ($weather["wind_units"] == 'km/h' && $darkskyunit=='si') {$windspeedconversion = 3.6000059687997;} 
else if ($weather["wind_units"] == 'm/s' && $darkskyunit=='si') {$windspeedconversion = 1;}
//ca wind is m/s
if ($weather["wind_units"] == 'mph' && $darkskyunit=='ca') {$windspeedconversion = 2.23694;} 
else if ($weather["wind_units"] == 'km/h' && $darkskyunit=='ca') {$windspeedconversion = 3.6000059687997;} 
else if ($weather["wind_units"] == 'm/s' && $darkskyunit=='ca') {$windspeedconversion = 1;} 
//us wind is mph
if ($weather["wind_units"] == 'mph' && $darkskyunit=='us') {$windspeedconversion =1;} 
else if ($weather["wind_units"] == 'km/h' && $darkskyunit=='us') {$windspeedconversion = 1.6093466682922179523;} 
else if ($weather["wind_units"] == 'm/s' && $darkskyunit=='us') {$windspeedconversion = 0.4470407411923185137;} 
//uk2 wund is mph
if ($weather["wind_units"] == 'mph' && $darkskyunit=='uk2') {$windspeedconversion =1;} 
else if ($weather["wind_units"] == 'km/h' && $darkskyunit=='uk2') {$windspeedconversion = 1.6093466682922179523;} 
else if ($weather["wind_units"] == 'm/s' && $darkskyunit=='uk2') {$windspeedconversion = 0.4470407411923185137;}     
$darkskydayWindSpeed = round($cond['windGust']*$windspeedconversion,0);
$darkskydayWindGust = round($cond['windGust']*$windspeedconversion,0);
            	  echo '<div class="darkskyforecastinghome">';  
                  echo '<div class="darkskyweekdayhome">'.strftime("%a %b %e", $darkskydayTime).'</div>';  
				  if ($darkskydayacumm>0 ){echo '<img src="css/darkskyicons/snow.svg" width="40"></img><br>';} 
				  else if ($darkskydayIcon == 'partly-cloudy-night'){echo '<img src="css/darkskyicons/partly-cloudy-day.svg" width="40"></img><br>';}  
				  else echo '<img src="css/darkskyicons/'.$darkskydayIcon.'.svg" width="40"></img><br>';	  
				  
				  echo '<darkskytemphihome><span>';
				  
				   echo " <hilo> </hilo>";
if($tempunit=='F' && $darkskydayTempHigh<44.6){echo '<bluetds>'.number_format($darkskydayTempHigh,0).'°</bluetds>';}
else if($tempunit=='F' && $darkskydayTempHigh>104){echo '<purpletds>'.number_format($darkskydayTempHigh,0).'°</purpletds>';}
else if($tempunit=='F' && $darkskydayTempHigh>80.6){echo '<darkskytemphihome><redtds>'.number_format($darkskydayTempHigh,0).'°</redtds>';}
else if($tempunit=='F' && $darkskydayTempHigh>64){echo '<darkskytemphihome><orangetds>'.number_format($darkskydayTempHigh,0).'°</orangetds>';}
else if($tempunit=='F' && $darkskydayTempHigh>55){echo '<darkskytemphihome><yellowtds>'.number_format($darkskydayTempHigh,0).'°</yellowtds>';}
else if($tempunit=='F' && $darkskydayTempHigh>=44.6){echo '<darkskytemphihome><greentds>'.number_format($darkskydayTempHigh,0).'°</greentds>';}
//temp metric
else if($darkskydayTempHigh<7){echo '<bluetds>'.number_format($darkskydayTempHigh,0).'°</bluet>';}
else if($darkskydayTempHigh>40){echo '<purpletsd>'.number_format($darkskydayTempHigh,0).'°</purpletds';}
else if($darkskydayTempHigh>27){echo '<redtds>'.number_format($darkskydayTempHigh,0).'°</redtds>';}
else if($darkskydayTempHigh>17.7){echo '<orangetds>'.number_format($darkskydayTempHigh,0).'°</orangetds>';}
else if($darkskydayTempHigh>12.7){echo '<yellowtds>'.number_format($darkskydayTempHigh,0).'°</yellowtds>';}
else if($darkskydayTempHigh>=7){echo '<greentds>'.number_format($darkskydayTempHigh,0).'°</greentds>';}

'°<grey> | </grey></span></darkskytemphihome>';
				   
				   
				   
				  echo '<darkskytemplohome><span>';
				  
			 echo " <hilo> </hilo>";
if($tempunit=='F' && $darkskydayTempLow<44.6){echo '<bluetds>'.number_format($darkskydayTempLow,0).'°</bluetds>';}
else if($tempunit=='F' && $darkskydayTempLow>104){echo '<purpletds>'.number_format($darkskydayTempLow,0).'°</purpletds>';}
else if($tempunit=='F' && $darkskydayTempLow>80.6){echo '<darkskytemphihome><redtds>'.number_format($darkskydayTempLow,0).'°</redtds>';}
else if($tempunit=='F' && $darkskydayTempLow>64){echo '<darkskytemphihome><orangetds>'.number_format($darkskydayTempLow,0).'°</orangetds>';}
else if($tempunit=='F' && $darkskydayTempLow>55){echo '<darkskytemphihome><yellowtds>'.number_format($darkskydayTempLow,0).'°</yellowtds>';}
else if($tempunit=='F' && $darkskydayTempLow>=44.6){echo '<darkskytemphihome><greentds>'.number_format($darkskydayTempLow,0).'°</greentds>';}
//temp metric
else if($darkskydayTempLow<7){echo '<bluetds>'.number_format($darkskydayTempLow,0).'°</bluet>';}
else if($darkskydayTempLow>40){echo '<purpletsd>'.number_format($darkskydayTempLow,0).'°</purpletds';}
else if($darkskydayTempLow>27){echo '<redtds>'.number_format($darkskydayTempLow,0).'°</redtds>';}
else if($darkskydayTempLow>17.7){echo '<orangetds>'.number_format($darkskydayTempLow,0).'°</orangetds>';}
else if($darkskydayTempLow>12.7){echo '<yellowtds>'.number_format($darkskydayTempLow,0).'°</yellowtds>';}
else if($darkskydayTempLow>=7){echo '<greentds>'.number_format($darkskydayTempLow,0).'°</greentds>';}

echo '</span></darkskytemplohome>';  
//uvindex
echo '<darkskytemplohome><grey> '.$sunlight.' UVI <orange1>';
if ($darkskydayUV>=10){echo "<purpleu>".$darkskydayUV;}
else if ($darkskydayUV>7){echo "<redu>".$darkskydayUV;}
else if ($darkskydayUV>5){echo "<orangeu>".$darkskydayUV;}
else if ($darkskydayUV>2){echo "<yellowu>".$darkskydayUV;}
else if ($darkskydayUV>0){echo "<greenu>".$darkskydayUV;}	
else if ($darkskydayUV==0){echo "<zerou>".$darkskydayUV;}				  
echo '</orange1></grey></darkskytemplohome><br>';  
//wind			  
echo "<br><div class='darkskywindspeedicon'><img src = 'css/windicons/avgw.svg' width='20' style='-webkit-transform:rotate(".$darkskydayWinddir."deg);-moz-transform:rotate(".$darkskydayWinddir."deg);-o-transform:rotate(".$darkskydayWinddir."deg);transform:rotate(".$darkskydayWinddir."deg)'>					   
				   ";			
				   
				   echo '&nbsp;&nbsp;&nbsp;';
				 if ($darkskydayWinddir <15 ) echo 'North';
				  elseif ($darkskydayWinddir <45 ) echo 'NNE';
				  elseif ($darkskydayWinddir <90 ) echo 'ENE';
				  elseif ($darkskydayWinddir <110 ) echo 'East';
				  elseif ($darkskydayWinddir <150 )  echo 'SE';
				  elseif ($darkskydayWinddir <170 )  echo 'SSE';
				  elseif ($darkskydayWinddir <190 ) echo 'South';
				  elseif ($darkskydayWinddir <220 ) echo 'SSW';
				  elseif ($darkskydayWinddir <250 ) echo 'SW';
				  elseif ($darkskydayWinddir <270 ) echo 'West';
				  elseif ($darkskydayWinddir <300 ) echo 'NW';
				  elseif ($darkskydayWinddir <340 ) echo 'NWN';
				  elseif ($darkskydayWinddir <360 ) echo 'North';
				  echo  '</div>';					   	 
				  echo "<div class='darkskywindgust'>".$darkskydayWindSpeed	." ".$windunit."</div>";
				  echo '<darkskytempwindhome><span>'.$darkskydaySummary.' </darkskywindhome></span><br>';
				  if ( $darkskydayacumm>0 && $weather['temp_units']=='F'){
				  echo ''.$snowflakesvg.'&nbsp;<darkskytempwindhome><span>Snow <blue1>&nbsp;'.$darkskydayacumm.'</blue1> in</darkskywindhome><br></span>';}  
				  else if ( $darkskydayacumm>0 && $weather['temp_units']=='C'){
				  echo ''.$snowflakesvg.'&nbsp;<darkskytempwindhome><span>Snow <blue1>&nbsp;'.$darkskydayacumm.'</blue1> cm</darkskywindhome><br></span>';}  				  
				  else if ($darkskydayPrecipType='rain'){
				  echo ''.$rainsvg.'&nbsp;<darkskytempwindhome><span>Rain <blue1>&nbsp;'. $darkskydayprecipIntensity.'</blue1>&nbsp;'.$weather["rain_units"].'&nbsp;<blue1>'.$darkskydayPrecipProb.'</blue1>%</darkskywindhome></span>';}  
				   
				  echo  '</div>';}?></div></div></div>                
                  
 <div style="position:absolute;bottom:5px;z-index:9999;font-weight:normal;font-size:10px;color:#aaa;text-decoration:none !important;float:right;font-family:weathertext2;">
  
   &nbsp;&nbsp;data provided by <a href="https://darksky.net/about" title="https://darksky.net/about" target="_blank">DarkSky</a> -- <?php echo $info;?><a href="https://weather34.com" title="weather34.com" target="_blank">weather34 original CSS/SVG/PHP Script</a></div>
  </body>
  </html>