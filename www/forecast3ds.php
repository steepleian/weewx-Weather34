<?php include_once('w34CombinedData.php');error_reporting(0); date_default_timezone_set($TZ);
	####################################################################################################
	#	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2016-17-18-19                                 #
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at https://weather34.com/homeweatherstation/           # 
	# 	                                                                                               #
	# 	                                                                                               #
	# 	Darksky 3 DAY WEATHER FORECAST:  December 2017  	 			   		                       #
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
?>

<style>hilo{font-size:.8em}</style>
<div class="updatedtime1"><?php $forecastime=filemtime('jsondata/darksky.txt');$weather34wuurl = file_get_contents("jsondata/darksky.txt");if(filesize('jsondata/darksky.txt')<1){echo "".$offline. " Offline<br>";}else echo $online,"";echo " ",	date($timeFormat,$forecastime);	?></div>
<div class="darkskyforecasthome"><div class="darkskydiv">
<?php //begin darksky stuff
if ($windunit=='kts'){$windunit="kn";}
foreach ($darkskydayCond as $cond) {
$darkskydayTime = $cond['time'];$darkskydaySummary = $cond['summary'];$darkskydayIcon = $cond['icon'];

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
$darkskydayWinddir = $cond['windBearing'];$darkskydayClouds = $cond['cloudCover']*100;$darkskydayHumidity = $cond['humidity']*100;$darkskydayUV = $cond['uvIndex'];$darkskydayPrecipProb = $cond['precipProbability']*100;
//rain darksky
if (isset($cond['precipType'])){$darkskydayPrecipType = $cond['precipType'];}
if ($rainunit=='in'){ $darkskydayprecipIntensity=number_format($cond['precipIntensity'],2);} 
else $darkskydayprecipIntensity = number_format($cond['precipIntensity']*25.4,1);
if ($rainunit=='in'){$darkskydayacumm=round($cond['precipAccumulation']*0.393701,1);}
else {$darkskydayacumm=round($cond['precipAccumulation'],1);}
//si wind is m/s
if ($weather["wind_units"] == 'mph' && $darkskyunit=='si') {$windspeedconversion =2.23694;} 
else if ($weather["wind_units"] == 'km/h' && $darkskyunit=='si') {$windspeedconversion = 3.6;} 
else if ($weather["wind_units"] == 'm/s' && $darkskyunit=='si') {$windspeedconversion = 1;}
//ca wind is m/s
if ($weather["wind_units"] == 'mph' && $darkskyunit=='ca') {$windspeedconversion = 2.23694;} 
else if ($weather["wind_units"] == 'km/h' && $darkskyunit=='ca') {$windspeedconversion = 3.6;} 
else if ($weather["wind_units"] == 'm/s' && $darkskyunit=='ca') {$windspeedconversion = 1;} 
//us wind is mph
if ($weather["wind_units"] == 'mph' && $darkskyunit=='us') {$windspeedconversion =1;} 
else if ($weather["wind_units"] == 'km/h' && $darkskyunit=='us') {$windspeedconversion = 1.6093466682922179523;} 
else if ($weather["wind_units"] == 'm/s' && $darkskyunit=='us') {$windspeedconversion = 0.4470407411923185137;} 
//uk2 wind is mph
if ($weather["wind_units"] == 'mph' && $darkskyunit=='uk2') {$windspeedconversion =1;} 
else if ($weather["wind_units"] == 'km/h' && $darkskyunit=='uk2') {$windspeedconversion = 1.6093466682922179523;} 
else if ($weather["wind_units"] == 'm/s' && $darkskyunit=='uk2') {$windspeedconversion = 0.4470407411923185137;}      
$darkskydayWindSpeed = round($cond['windSpeed']*$windspeedconversion,0);
$darkskydayWindGust = round($cond['windGust']*$windspeedconversion,0);
//begin darksky
echo '<div class="darkskyforecastinghome">';echo '<div class="darkskyweekdayhome">'.strftime("%a %b %e", $darkskydayTime).'</div>';if ($darkskydayacumm>0 ){echo '<img src="css/darkskyicons/snow.svg" width="40rem" height="38rem"></img><br>';} 
else if ($darkskydayIcon == 'partly-cloudy-night'){echo '<img src="css/darkskyicons/partly-cloudy-day.svg" width="40rem" height="38rem"></img><br>';}else echo '<img src="css/darkskyicons/'.$darkskydayIcon.'.svg" width="40rem" height="38rem"></img><br>';
//Hi temp non metric
echo " <hilo> </hilo>";
if($tempunit=='F' && $darkskydayTempHigh<44.6){echo '<darkskytemphihome><bluetds>'.number_format($darkskydayTempHigh,0).'°</bluetds></darkskytemphihome>';}
else if($tempunit=='F' && $darkskydayTempHigh>104){echo '<darkskytemphihome><purpletds>'.number_format($darkskydayTempHigh,0).'°</purpletds></darkskytemphihome>';}
else if($tempunit=='F' && $darkskydayTempHigh>80.6){echo '<darkskytemphihome><redtds>'.number_format($darkskydayTempHigh,0).'°</redtds></darkskytemphihome>';}
else if($tempunit=='F' && $darkskydayTempHigh>64){echo '<darkskytemphihome><orangetds>'.number_format($darkskydayTempHigh,0).'°</orangetds></darkskytemphihome>';}
else if($tempunit=='F' && $darkskydayTempHigh>55){echo '<darkskytemphihome><yellowtds>'.number_format($darkskydayTempHigh,0).'°</yellowtds></darkskytemphihome>';}
else if($tempunit=='F' && $darkskydayTempHigh>=44.6){echo '<darkskytemphihome><greentds>'.number_format($darkskydayTempHigh,0).'°</greentds></darkskytemphihome>';}
//temp metric
else if($darkskydayTempHigh<7){echo '<darkskytemphihome><bluetds>'.number_format($darkskydayTempHigh,0).'°</bluet></darkskytemphihome>';}
else if($darkskydayTempHigh>40){echo '<darkskytemphihome><purpletds>'.number_format($darkskydayTempHigh,0).'°</purpletds></darkskytemphihome>';}
else if($darkskydayTempHigh>27){echo '<darkskytemphihome><redtds>'.number_format($darkskydayTempHigh,0).'°</redtds></darkskytemphihome>';}
else if($darkskydayTempHigh>17.7){echo '<darkskytemphihome><orangetds>'.number_format($darkskydayTempHigh,0).'°</orangetds></darkskytemphihome>';}
else if($darkskydayTempHigh>12.7){echo '<darkskytemphihome><yellowtds>'.number_format($darkskydayTempHigh,0).'°</yellowtds></darkskytemphihome>';}
else if($darkskydayTempHigh>=7){echo '<darkskytemphihome><greentds>'.number_format($darkskydayTempHigh,0).'°</greentds></darkskytemphihome>';}
echo " <hilo> </hilo>";
//low
if($tempunit=='F' && $darkskydayTempLow<44.6){echo '<darkskytemphihome><bluetds>'.number_format($darkskydayTempLow,0).'°</bluetds></darkskytemphihome>';}
else if($tempunit=='F' && $darkskydayTempLow>104){echo '<darkskytemphihome><purpletds>'.number_format($darkskydayTempLow,0).'°</purpletds></darkskytemphihome>';}
else if($tempunit=='F' && $darkskydayTempLow>80.6){echo '<darkskytemphihome><redtds>'.number_format($darkskydayTempLow,0).'°</red></darkskytemphihome>';}
else if($tempunit=='F' && $darkskydayTempLow>64){echo '<darkskytemphihome><orangetds>'.number_format($darkskydayTempLow,0).'°</orangetds></darkskytemphihome>';}
else if($tempunit=='F' && $darkskydayTempLow>55){echo '<darkskytemphihome><yellowtds>'.number_format($darkskydayTempLow,0).'°</yellowtds></darkskytemphihome>';}
else if($tempunit=='F' && $darkskydayTempLow>=44.6){echo '<darkskytemphihome><greentds>'.number_format($darkskydayTempLow,0).'°</greentds></darkskytemphihome>';}
//temp metric
else if($darkskydayTempLow<7){echo '<darkskytemphihome><bluetds>'.number_format($darkskydayTempLow,0).'°</bluetds></darkskytemphihome>';}
else if($darkskydayTempLow>40){echo '<darkskytemphihome><purpletds>'.number_format($darkskydayTempLow,0).'°</purpletds></darkskytemphihome>';}
else if($darkskydayTempLow>27){echo '<darkskytemphihome><redtds>'.number_format($darkskydayTempLow,0).'°</redtds></darkskytemphihome>';}
else if($darkskydayTempLow>17.7){echo '<darkskytemphihome><orangetds>'.number_format($darkskydayTempLow,0).'°</orangetds></darkskytemphihome>';}
else if($darkskydayTempLow>12.7){echo '<darkskytemphihome><yellowtds>'.number_format($darkskydayTempLow,0).'°</yellowtds></darkskytemphihome>';}
else if($darkskydayTempLow>=7){echo '<darkskytemphihome><greentds>'.number_format($darkskydayTempLow,0).'°</greentds></darkskytemphihome>';}				  
 echo '<br></oblue>'; 
//wind
echo "<div class='darkskywindspeedicon'>";if ($darkskydayWinddir <15 ) echo 'North';elseif ($darkskydayWinddir <45 ) echo 'NNE';elseif ($darkskydayWinddir <90 ) echo 'ENE';elseif ($darkskydayWinddir <110 ) echo 'East';elseif ($darkskydayWinddir <150 )  echo 'SE';elseif ($darkskydayWinddir <170 )  echo 'SSE';elseif ($darkskydayWinddir <190 ) echo 'South';elseif ($darkskydayWinddir <220 ) echo 'SSW'; elseif ($darkskydayWinddir <250 ) echo 'SW';elseif ($darkskydayWinddir <270 ) echo 'West'; elseif ($darkskydayWinddir <300 ) echo 'NW'; elseif ($darkskydayWinddir <340 ) echo 'NWN';elseif ($darkskydayWinddir <360 ) echo 'North'; 
if ($weather["wind_units"] == 'km/h' && $darkskydayWindGust>=45){echo "<gustorange> ".$darkskydayWindGust,"</gustorange><valuewindunit> ".$windunit;}else if ($weather["wind_units"] == 'mph' && $darkskydayWindGust>=30){echo "<gustorange> ".$darkskydayWindGust,"</gustorange><valuewindunit> ".$windunit;}else echo " ".$darkskydayWindGust," <valuewindunit>".$windunit;echo  '</div>';'<br>';
//rain-snow
if ( $darkskydayacumm>0 && $rainunit=='in'){ echo '<precip>'.$snowflakesvg.'&nbsp;<darkskytempwindhome><span>Snow<br> <oblue>&nbsp;'.$darkskydayacumm.'</oblue> in</darkskywindhome></span></precip>';}
else if ( $darkskydayacumm>0 && $rainunit=='mm'){ echo '<precip>'.$snowflakesvg.'&nbsp;<darkskytempwindhome><span>Snow<br> <oblue>&nbsp;'.$darkskydayacumm.'</oblue> cm</darkskywindhome></span></precip>';}

else if ($darkskydayPrecipType='rain'){echo '<precip>'.$rainsvg.'&nbsp;<darkskytempwindhome><span>Rain <oblue>&nbsp;'. $darkskydayprecipIntensity.'</oblue>&nbsp;<valuewindunit>'.$rainunit.'</valuewindunit>&nbsp;<oblue>'.$darkskydayPrecipProb.'</oblue><valuewindunit>%</valuewindunit></darkskywindhome></span></precip>';}
//uv
echo '<br><darkskytemplohome><uv>UVI <uvspan>';
if ($darkskydayUV>=10){echo "<purpleu>".$darkskydayUV;}else if ($darkskydayUV>7){echo "<redu>".$darkskydayUV;}else if ($darkskydayUV>5){echo "<orangeu>".$darkskydayUV;}else if ($darkskydayUV>2){echo "<yellowu>".$darkskydayUV;}else if ($darkskydayUV>0){echo "<greenu>".$darkskydayUV;}else if ($darkskydayUV==0){echo "<zerou>".$darkskydayUV;}echo '</uvspan></uv></darkskytemplohome></div>';}?>
</div></div></div>