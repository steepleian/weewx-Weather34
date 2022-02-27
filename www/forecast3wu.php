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
$jsonfile="jsondata/wu.txt";if(!file_exists($jsonfile)) {return;}
?>
<div class="updatedtime1"><?php $forecastime=filemtime('jsondata/wu.txt');$forecasturl = file_get_contents("jsondata/wu.txt");if(filesize('jsondata/wu.txt')<1){echo "".$offline. "";}else echo $online,"";echo " ",	date($timeFormat,$forecastime);	?></div>
<div class="darkskyforecasthome" ><div class="darkskydiv">
<?php //begin wu stuff 
$forecasturl=file_get_contents($jsonfile);$parsed_forecastjson = json_decode($forecasturl,false);$wucount = 0;
for ($k=0;$k<=4;$k++) {if(empty($parsed_forecastjson->{'daypart'}[0]->{'iconCode'}[$k])) { continue; }if($wucount > 3) {break; }
	 $forecastdayIcon=$parsed_forecastjson->{'daypart'}[0]->{'iconCode'}[$k];$forecastdayTime = $parsed_forecastjson->{'daypart'}[0]->{'daypartName'}[$k];	
	 $forecastdayTempHigh = $parsed_forecastjson->{'daypart'}[0]->{'temperature'}[$k];$forecastdayTempLow = $parsed_forecastjson->{'daypart'}[0]->{'temperatureWindChill'}[$k];	 
	 $forecastdayWindGust = $parsed_forecastjson->{'daypart'}[0]->{'windSpeed'}[$k];$forecastdayWinddir = $parsed_forecastjson->{'daypart'}[0]->{'windDirection'}[$k];
	 $forecastdayWinddircardinal = $parsed_forecastjson->{'daypart'}[0]->{'windDirectionCardinal'}[$k]; $forecastdayacumm = $parsed_forecastjson->{'daypart'}[0]->{'snowRange'}[$k];
	 $forecastdayPrecipType = $parsed_forecastjson->{'daypart'}[0]->{'precipType'}[$k];$forecastdayprecipIntensity = $parsed_forecastjson->{'daypart'}[0]->{'qpf'}[$k];
	 $forecastdayPrecipProb = $parsed_forecastjson->{'daypart'}[0]->{'precipChance'}[$k];$forecastdayUV = $parsed_forecastjson->{'daypart'}[0]->{'uvIndex'}[$k];
	 $forecastdayUVdesc = $parsed_forecastjson->{'daypart'}[0]->{'uvDescription'}[$k];$forecastdaysnow = $parsed_forecastjson->{'daypart'}[0]->{'qpfSnow'}[$k];
	 $forecastdaysummary = $parsed_forecastjson->{'daypart'}[0]->{'narrative'}[$k];$forecastdaynight = $parsed_forecastjson->{'daypart'}[0]->{'dayOrNight'}[$k];	 
	 $forecastdesc = $parsed_forecastjson->{'daypart'}[0]->{'wxPhraseShort'}[$k];$forecastthunder = $parsed_forecastjson->{'daypart'}[0]->{'thunderIndex'}[$k];	 
	//wu convert temps-rain-wind
	//metric to F
	if ($tempunit=='F' && $wuapiunit=='m' ){$forecastdayTempHigh=($forecastdayTempHigh*9/5)+32;}
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$forecastdayTempHigh=($forecastdayTempHigh*9/5)+32;}
	// ms non metric to c Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$forecastdayTempHigh=($forecastdayTempHigh*9/5)+32;}
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$forecastdayTempHigh=($forecastdayTempHigh-32)/1.8;}
	//wind
	// mph to kmh US
	if ($windunit=='km/h' && $wuapiunit=='e' ){$forecastdayWindGust=(number_format($forecastdayWindGust,1)*1.60934);}
	// mph to kmh UK
	if ($windunit=='km/h' && $wuapiunit=='h' ){$forecastdayWindGust=(number_format($forecastdayWindGust,1)*1.60934);}
	//mph to ms US
	if ($windunit=='m/s' && $wuapiunit=='e' ){$forecastdayWindGust=(number_format($forecastdayWindGust,1)*0.44704);}
	//mph to ms uk
	if ($windunit=='m/s' && $wuapiunit=='h' ){$forecastdayWindGust=(number_format($forecastdayWindGust,1)*0.44704);}
	//kmh to ms
	if ($windunit=='m/s' && $wuapiunit=='m' ){$forecastdayWindGust=(number_format($forecastdayWindGust,1)*0.277778);}
	//kmh to mph
	if ($windunit=='mph' && $wuapiunit=='m' ){$forecastdayWindGust=(number_format($forecastdayWindGust,1)*0.621371);}	
	//rain inches to mm
	if ($rainunit=='mm' && $wuapiunit=='e' ){$forecastdayprecipIntensity=$forecastdayprecipIntensity*25.4;}
	//rain mm to inches scandinavia
	if ($rainunit=='in' && $wuapiunit=='s' ){$forecastdayprecipIntensity=$forecastdayprecipIntensity*0.0393701;}
	//rain mm to inches uk
	if ($rainunit=='in' && $wuapiunit=='h' ){$forecastdayprecipIntensity=$forecastdayprecipIntensity*0.0393701;}
	//rain mm to inches metric
	if ($rainunit=='in' && $wuapiunit=='m' ){$forecastdayprecipIntensity=$forecastdayprecipIntensity*0.0393701;}
	//convert lightning index shorter phrases
	if ( $forecastthunder==0 ){$forecastthunder='';}else if ( $forecastthunder==1 ){$forecastthunder=$lightningalert4.' Thunder Risk';}else if ( $forecastthunder==2 ){$forecastthunder=$lightningalert4.' Thunder';}else if ( $forecastthunder>=3 ){$forecastthunder=$lightningalert4.' Severe Tstorm';}	
	//icon + day
	echo '<div class="darkskyforecastinghome">';echo '<div class="darkskyweekdayhome">'.$forecastdayTime.'</div><div class=darkskyhomeicons>';
	if ($forecastdaynight=='D'){echo '<img src="css/wuicons/'.$forecastdayIcon.'.svg" width="40px" height="35px" ></img>';}
	if ($forecastdaynight=='N'){echo '<img src="css/wuicons/nt_'.$forecastdayIcon.'.svg" width="40px" height="35px"></img>';}	
	echo '</div><div class=darkskytempdesc>'.$forecastdesc.'</div>';
	//temp non metric
	if($tempunit=='F' && $forecastdayTempHigh<44.6){echo '<darkskytemphihome><bluet>'.number_format($forecastdayTempHigh,0).'°</bluet></darkskytemphihome>';}
	else if($tempunit=='F' && $forecastdayTempHigh>104){echo '<darkskytemphihome><purplet>'.number_format($forecastdayTempHigh,0).'°</purplet></darkskytemphihome>';}
	else if($tempunit=='F' && $forecastdayTempHigh>80.6){echo '<darkskytemphihome><redt>'.number_format($forecastdayTempHigh,0).'°</redt></darkskytemphihome>';}
	else if($tempunit=='F' && $forecastdayTempHigh>64.4){echo '<darkskytemphihome><oranget>'.number_format($forecastdayTempHigh,0).'°</oranget></darkskytemphihome>';}
	else if($tempunit=='F' && $forecastdayTempHigh>55){echo '<darkskytemphihome><yellowt>'.number_format($forecastdayTempHigh,0).'°</yellowt></darkskytemphihome>';}
	else if($tempunit=='F' && $forecastdayTempHigh>=44.6){echo '<darkskytemphihome><greent>'.number_format($forecastdayTempHigh,0).'°</greent></darkskytemphihome>';}
	//temp metric
	else if($forecastdayTempHigh<7){echo '<darkskytemphihome><bluet>'.number_format($forecastdayTempHigh,0).'°</bluet></darkskytemphihome>';}
	else if($forecastdayTempHigh>40){echo '<darkskytemphihome><purplet>'.number_format($forecastdayTempHigh,0).'°</purplet></darkskytemphihome>';}
	else if($forecastdayTempHigh>27){echo '<darkskytemphihome><redt>'.number_format($forecastdayTempHigh,0).'°</redt></darkskytemphihome>';}
	else if($forecastdayTempHigh>18){echo '<darkskytemphihome><oranget>'.number_format($forecastdayTempHigh,0).'°</oranget></darkskytemphihome>';}
	else if($forecastdayTempHigh>12.7){echo '<darkskytemphihome><yellowt>'.number_format($forecastdayTempHigh,0).'°</yellowt></darkskytemphihome>';}
	else if($forecastdayTempHigh>=7){echo '<darkskytemphihome><greent>'.number_format($forecastdayTempHigh,0).'°</greent></darkskytemphihome>';}
	//wind
	echo "<div class='darkskywindspeedicon'>";
	echo $forecastdayWinddircardinal; 
	echo " ".number_format($forecastdayWindGust,0)," <valuewindunit>".$windunit;echo  '</div>';'<br>';
	//snow
	if ( $forecastdaysnow>0 && $rainunit=='in'){ echo '<precip>'.$snowflakesvg.'&nbsp;<darkskytempwindhome><span><oblue>&nbsp;'.$forecastdaysnow.'</oblue><valuewindunit> in</valuewindunit></darkskywindhome></span></precip>';}
	else if ( $forecastdaysnow>0 && $rainunit=='mm'){ echo '<precip>'.$snowflakesvg.'&nbsp;<darkskytempwindhome><span><oblue>&nbsp;'.$forecastdaysnow.'</oblue><valuewindunit> cm</valuewindunit></darkskywindhome></span></precip>';}
	
	
	//rain
	else if ($forecastdayPrecipType='rain' && $rainunit=='in'){echo '<precip>'.$rainsvg.'&nbsp;<darkskytempwindhome><span><oblue>&nbsp;'. number_format($forecastdayprecipIntensity,2).'</oblue>&nbsp;<valuewindunit>'.$rainunit.'</valuewindunit></darkskywindhome></span></precip>';}
	else if ($forecastdayPrecipType='rain' && $rainunit=='mm'){echo '<precip>'.$rainsvg.'&nbsp;<darkskytempwindhome><span><oblue>&nbsp;'. number_format($forecastdayprecipIntensity,2).'</oblue>&nbsp;<valuewindunit>'.$rainunit.'</valuewindunit></darkskywindhome></span></precip>';}
	//uvi
if ($forecastdaynight=='D'){echo '<br><darkskytemplohome><uv>UV <uvspan>';if ($forecastdayUV>=10){echo "<purpleu>".$forecastdayUV. '</purpleu><greyu> '.$forecastdayUVdesc;}else  if ($forecastdayUV>=7){echo "<redu>".$forecastdayUV. '</redu><greyu> '.$forecastdayUVdesc;}else if ($forecastdayUV>5){ echo "<orangeu>".$forecastdayUV. '</orangeu><greyu> '.$forecastdayUVdesc;}else if ($forecastdayUV>2){  echo "<yellowu>".$forecastdayUV. '</yellowu><greyu> '.$forecastdayUVdesc;}else if ($forecastdayUV>=0){ echo "<greenu>".$forecastdayUV. '</greenu><greyu> '.$forecastdayUVdesc;}echo '</uvspan></uv>';}
	//lightning
	echo '<thunder>'.$forecastthunder;echo '</darkskytemplohome></div>';
} // end for loop for icons
?>
</div></div></div>
