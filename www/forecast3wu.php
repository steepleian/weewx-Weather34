<?php include_once('w34CombinedData.php');
error_reporting(0); date_default_timezone_set($TZ);
header('Content-type: text/html; charset=UTF-8');

//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
	####################################################################################################
	#	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2016-17-18-19 
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at https://weather34.com/homeweatherstation/
	#
	#
	# 	3 DAY WU WEATHER FORECAST:  original FEB 2019
	#      https://www.weather34.com
	#
	# 	Code simplified by ktrue - 30-Mar-2019
	####################################################################################################
if ($windunit=='kts'){$windunit="kn";}
$jsonfile="jsondata/wuforecast.txt";if(!file_exists($jsonfile)) {return;}
?>
<div class="updatedtime1"><?php $forecastime=filemtime('jsondata/wuforecast.txt');$weather34wuurl = file_get_contents("jsondata/wuforecast.txt");if(filesize('jsondata/wuforecast.txt')<1){echo "".$offline. "";}else echo $online,"";echo " ",	date($timeFormat,$forecastime);	?></div>
<div class="darkskyforecasthome" ><div class="darkskydiv">
<?php //begin wu stuff 
$weather34wuurl=file_get_contents($jsonfile);$parsed_weather34wujson = json_decode($weather34wuurl,false);$wucount = 0;
for ($k=0;$k<=4;$k++) {if(empty($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[$k])) { continue; }if($wucount > 3) {break; }
	 $wuskydayIcon=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[$k];$wuskydayTime = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[$k];	
	 $wuskydayTempHigh = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[$k];$wuskydayTempLow = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[$k];	 
	 $wuskydayWindGust = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[$k];$wuskydayWinddir = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[$k];
	 $wuskydayWinddircardinal = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[$k]; $wuskydayacumm = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[$k];
	 $wuskydayPrecipType = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[$k];$wuskydayprecipIntensity = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[$k];
	 $wuskydayPrecipProb = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[$k];$wuskydayUV = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[$k];
	 $wuskydayUVdesc = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[$k];$wuskydaysnow = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[$k];
	 $wuskydaysummary = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[$k];$wuskydaynight = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[$k];	 
	 $wuskydesc = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseShort'}[$k];$wuskythunder = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[$k];	 
	//wu convert temps-rain-wind
	//metric to F
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh=($wuskydayTempHigh*9/5)+32;}
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh=($wuskydayTempHigh*9/5)+32;}
	// ms non metric to c Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh=($wuskydayTempHigh*30);}
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh=($wuskydayTempHigh-32)/1.8;}
	//wind
	// mph to kmh US
	if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*1.60934);}
	// mph to kmh UK
	if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*1.60934);}
	//mph to ms US
	if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*0.44704);}
	//mph to ms uk
	if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*0.44704);}
	//kmh to ms
	if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*0.277778);}
	//kmh to mph
	if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*0.621371);}	
	//rain inches to mm
	if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity=$wuskydayprecipIntensity*25.4;}
	//rain mm to inches scandinavia
	if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity=$wuskydayprecipIntensity*0.0393701;}
	//rain mm to inches uk
	if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity=$wuskydayprecipIntensity*0.0393701;}
	//rain mm to inches metric
	if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity=$wuskydayprecipIntensity*0.0393701;}
	//convert lightning index shorter phrases
	if ( $wuskythunder==0 ){$wuskythunder='';}else if ( $wuskythunder==1 ){$wuskythunder=$lightningalert4.' Thunder Risk';}else if ( $wuskythunder==2 ){$wuskythunder=$lightningalert4.' Thunder';}else if ( $wuskythunder>=3 ){$wuskythunder=$lightningalert4.' Severe Tstorm';}	
	//icon + day
	echo '<div class="darkskyforecastinghome">';echo '<div class="darkskyweekdayhome">'.$wuskydayTime.'</div><div class=darkskyhomeicons>';
	if ($wuskydaynight=='D'){echo '<img src="css/wuicons/'.$wuskydayIcon.'.svg" width="40px" height="35px" ></img>';}
	if ($wuskydaynight=='N'){echo '<img src="css/wuicons/nt_'.$wuskydayIcon.'.svg" width="40px" height="35px"></img>';}	
	echo '</div><div class=darkskytempdesc>'.$wuskydesc.'</div>';
	//temp non metric
	if($tempunit=='F' && $wuskydayTempHigh<44.6){echo '<darkskytemphihome><bluet>'.number_format($wuskydayTempHigh,0).'°</bluet></darkskytemphihome>';}
	else if($tempunit=='F' && $wuskydayTempHigh>104){echo '<darkskytemphihome><purplet>'.number_format($wuskydayTempHigh,0).'°</purplet></darkskytemphihome>';}
	else if($tempunit=='F' && $wuskydayTempHigh>80.6){echo '<darkskytemphihome><redt>'.number_format($wuskydayTempHigh,0).'°</redt></darkskytemphihome>';}
	else if($tempunit=='F' && $wuskydayTempHigh>64.4){echo '<darkskytemphihome><oranget>'.number_format($wuskydayTempHigh,0).'°</oranget></darkskytemphihome>';}
	else if($tempunit=='F' && $wuskydayTempHigh>55){echo '<darkskytemphihome><yellowt>'.number_format($wuskydayTempHigh,0).'°</yellowt></darkskytemphihome>';}
	else if($tempunit=='F' && $wuskydayTempHigh>=44.6){echo '<darkskytemphihome><greent>'.number_format($wuskydayTempHigh,0).'°</greent></darkskytemphihome>';}
	//temp metric
	else if($wuskydayTempHigh<7){echo '<darkskytemphihome><bluet>'.number_format($wuskydayTempHigh,0).'°</bluet></darkskytemphihome>';}
	else if($wuskydayTempHigh>40){echo '<darkskytemphihome><purplet>'.number_format($wuskydayTempHigh,0).'°</purplet></darkskytemphihome>';}
	else if($wuskydayTempHigh>27){echo '<darkskytemphihome><redt>'.number_format($wuskydayTempHigh,0).'°</redt></darkskytemphihome>';}
	else if($wuskydayTempHigh>18){echo '<darkskytemphihome><oranget>'.number_format($wuskydayTempHigh,0).'°</oranget></darkskytemphihome>';}
	else if($wuskydayTempHigh>12.7){echo '<darkskytemphihome><yellowt>'.number_format($wuskydayTempHigh,0).'°</yellowt></darkskytemphihome>';}
	else if($wuskydayTempHigh>=7){echo '<darkskytemphihome><greent>'.number_format($wuskydayTempHigh,0).'°</greent></darkskytemphihome>';}
	//wind
	echo "<div class='darkskywindspeedicon'>";
	echo $wuskydayWinddircardinal; 
	echo " ".number_format($wuskydayWindGust,0)," <valuewindunit>".$windunit;echo  '</div>';'<br>';
	//snow
	if ( $wuskydaysnow>0 && $rainunit=='in'){ echo '<precip>'.$snowflakesvg.'&nbsp;<darkskytempwindhome><span><oblue>&nbsp;'.$wuskydaysnow.'</oblue><valuewindunit> in</valuewindunit></darkskywindhome></span></precip>';}
	else if ( $wuskydaysnow>0 && $rainunit=='mm'){ echo '<precip>'.$snowflakesvg.'&nbsp;<darkskytempwindhome><span><oblue>&nbsp;'.$wuskydaysnow.'</oblue><valuewindunit> cm</valuewindunit></darkskywindhome></span></precip>';}
	
	
	//rain
	else if ($wuskydayPrecipType='rain' && $rainunit=='in'){echo '<precip>'.$rainsvg.'&nbsp;<darkskytempwindhome><span><oblue>&nbsp;'. number_format($wuskydayprecipIntensity,2).'</oblue>&nbsp;<valuewindunit>'.$rainunit.'</valuewindunit></darkskywindhome></span></precip>';}
	else if ($wuskydayPrecipType='rain' && $rainunit=='mm'){echo '<precip>'.$rainsvg.'&nbsp;<darkskytempwindhome><span><oblue>&nbsp;'. number_format($wuskydayprecipIntensity,2).'</oblue>&nbsp;<valuewindunit>'.$rainunit.'</valuewindunit></darkskywindhome></span></precip>';}
	//uvi
if ($wuskydaynight=='D'){echo '<br><darkskytemplohome><uv>UV <uvspan>';if ($wuskydayUV>=10){echo "<purpleu>".$wuskydayUV. '</purpleu><greyu> '.$wuskydayUVdesc;}else  if ($wuskydayUV>=7){echo "<redu>".$wuskydayUV. '</redu><greyu> '.$wuskydayUVdesc;}else if ($wuskydayUV>5){ echo "<orangeu>".$wuskydayUV. '</orangeu><greyu> '.$wuskydayUVdesc;}else if ($wuskydayUV>2){  echo "<yellowu>".$wuskydayUV. '</yellowu><greyu> '.$wuskydayUVdesc;}else if ($wuskydayUV>=0){ echo "<greenu>".$wuskydayUV. '</greenu><greyu> '.$wuskydayUVdesc;}echo '</uvspan></uv>';}
	//lightning
	echo '<thunder>'.$wuskythunder;echo '</darkskytemplohome></div>';
} // end for loop for icons
?>
</div></div></div>