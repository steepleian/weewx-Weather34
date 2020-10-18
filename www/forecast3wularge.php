<?php include_once('w34CombinedData.php');error_reporting(0); date_default_timezone_set($TZ);
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
	####################################################################################################
	#	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2016-17-18-19                                 #
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at https://weather34.com/homeweatherstation/           # 
	# 	LARGE DAY WU WEATHER FORECAST:  original MAR 2019			   		                           #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
if ($windunit=='kts'){$windunit="kn";}
//start the wu output
$json='jsondata/wuforecast.txt';
$weather34wuurl=file_get_contents($json);
$parsed_weather34wujson = json_decode($weather34wuurl,false);
{    if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){
	 $wuskydayIcon=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[1];$wuskydayTime = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[1];	
	 $wuskydayTempHigh = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[1];$wuskydayTempLow = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[1];	 
	 $wuskydayWindGust = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[1];$wuskydayWinddir = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[1];
	 $wuskydayWinddircardinal = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[1];$wuskydayacumm = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[1];
	 $wuskydayPrecipType = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[1];$wuskydayprecipIntensity = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[1];
	 $wuskydayPrecipProb = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[1];$wuskydayUV = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[1];
	 $wuskydayUVdesc = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[1];$wuskydaysnow = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[1];
	 $wuskydaysummary = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[1];$wuskydaynight = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[1];
	 $wuskydesc = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[1];$wuskythunder = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[1];
	 $wuskyhumidity = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[1];
	 $wuskyheatindex = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[1];
	 $wuskywindchill = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[1];
	 }	 
	 else {
	 $wuskydayIcon=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0];$wuskydayTime = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[0];	
	 $wuskydayTempHigh = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[0];$wuskydayTempLow = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[0];	 
	 $wuskydayWindGust = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[0];$wuskydayWinddir = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[0];
	 $wuskydayWinddircardinal = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[0];$wuskydayacumm = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[0];
	 $wuskydayPrecipType = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[0];$wuskydayprecipIntensity = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[0];
	 $wuskydayPrecipProb = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[0];$wuskydayUV = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[0];
	 $wuskydayUVdesc = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[0];$wuskydaysnow = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[0];
	 $wuskydaysummary = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[0];$wuskydaynight = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[0];
	 $wuskydesc = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[0];$wuskythunder = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[0];
	 $wuskyhumidity = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[0];
	 $wuskyheatindex = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[0];
	 $wuskywindchill = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[0];
	 }
	 //thunder
	 $wuskythunder1 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[1];
	 $wuskythunder2 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[2];
	 $wuskythunder3 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[3];
	 $wuskythunder4 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[4];
	 $wuskythunder5 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[5];
	 $wuskythunder6 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[6];
	 $wuskythunder7 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[7];
	 $wuskythunder8 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[8];
	 $wuskythunder9 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[9];
	 $wuskythunder10 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[10];
	 //period
	 $wuskydayTime1 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[1];
	 $wuskydayTime2 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[2];
	 $wuskydayTime3 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[3];
	 $wuskydayTime4 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[4];
	 $wuskydayTime5 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[5];
	 $wuskydayTime6 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[6];
	 $wuskydayTime7 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[7];
	 $wuskydayTime8 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[8];
	 $wuskydayTime9 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[9];
	 $wuskydayTime10 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[10];
	 //rain
	 $wuskyrain1 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[1];
	 $wuskyrain2 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[2];
	 $wuskyrain3 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[3];
	 $wuskyrain4 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[4];
	 $wuskyrain5 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[5];
	 $wuskyrain6 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[6];
	 $wuskyrain7 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[7];
	 $wuskyrain8 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[8];
	 $wuskyrain9 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[9];
	 $wuskyrain10 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[10];
			 
	 //snow
	 $wuskysnow1 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[1];
	 $wuskysnow2 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[2];
	 $wuskysnow3 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[3];
	 $wuskysnow4 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[4];
	 $wuskysnow5 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[5];
	 $wuskysnow6 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[6];
	 $wuskysnow7 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[7]; 
	 $wuskysnow8 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[8];
	 $wuskysnow9 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[9];
	 $wuskysnow10 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[10];
	  //heatindex
	 $wuskyheatindex1 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[1];
	 $wuskyheatindex2 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[2];
	 $wuskyheatindex3 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[3];
	 $wuskyheatindex4 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[4];
	 $wuskyheatindex5 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[5];
	 $wuskyheatindex6 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[6];
	 $wuskyheatindex7 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[7];
	
	  //uv index
	 $wuskydayUV1 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[1];
	 $wuskydayUV2 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[2];
	 $wuskydayUV3 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[3];
	 $wuskydayUV4 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[4];
	 $wuskydayUV5 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[5];
	 $wuskydayUV6 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[6];
	 $wuskydayUV7 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[7];
	 $wuskydayUV8 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[8];
	 
	 }?>
<div class="updatedtime1"><?php $forecastime=filemtime('jsondata/wuforecast.txt');$weather34wuurl = file_get_contents("jsondata/wuforecast.txt");if(filesize('jsondata/wuforecast.txt')<1){echo "".$offline. "";}else echo $online,"";echo " ",date($timeFormat,$forecastime);	?></div>
<div class="wulargeforecasthome"><div class="wulargediv">
<?php //begin wu stuff 
//convert lightning index
if ( $wuskythunder==0 ){$wuskythunder=$lightningalert8.' &nbsp;No Thunder Storm';}else if ( $wuskythunder==1 ){$wuskythunder=$lightningalert8.' &nbsp;Thunder Storm Risk';}
else if ( $wuskythunder==2 ){$wuskythunder=$lightningalert8.' &nbsp;Thunder Storm';}else if ( $wuskythunder>=3 ){$wuskythunder=$lightningalert8.' &nbsp;Severe Thunderstorm';}
//wu convert temps-rain-wind
//metric to F
if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh=($wuskydayTempHigh*9/5)+32;}
if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex=($wuskyheatindex*9/5)+32;}
if ($tempunit=='F' && $wuapiunit=='m' ){$wuskywindchill=($wuskywindchill*9/5)+32;}
// metric to F UK
if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh=($wuskydayTempHigh*9/5)+32;}
if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex=($wuskyheatindex*9/5)+32;}
if ($tempunit=='F' && $wuapiunit=='h' ){$wuskywindchill=($wuskywindchill*9/5)+32;}
// ms non metric to c Scandinavia 
if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh=($wuskydayTempHigh*30);}
if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex=($wuskyheatindex*30);}
if ($tempunit=='F' && $wuapiunit=='s'){$wuskywindchill=($wuskywindchill*30);}
// non metric to c US
if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh=($wuskydayTempHigh-32)/1.8;}
if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex=($wuskyheatindex-32)/1.8;}
if ($tempunit=='C' && $wuapiunit=='e' ){$wuskywindchill=($wuskywindchill-32)/1.8;}
//wind
if ($windunit=='kts'){$windunit=='kn';}
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
if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity2=$wuskydayprecipIntensity2*0.0393701;}
//rain mm to inches metric
if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity=$wuskydayprecipIntensity*0.0393701;}
//icon + day wu
echo '<div class="wulargeforecastinghome">';echo '<div class="wulargeweekdayhome">'.$wuskydayTime.'s Forecast</div><div class=wulargehomeicons>';
if ($wuskydaynight=='D'){echo '<img src="css/wuicons/'.$wuskydayIcon.'.svg" width="50" height="40" alt="'.$wuskydesc.'" title="'.$wuskydesc.'"></img>';}
if ($wuskydaynight=='N'){echo '<img src="css/wuicons/nt_'.$wuskydayIcon.'.svg" width="50" height="40" alt="'.$wuskydesc.'" title="'.$wuskydesc.'"></img>';}
echo '</div><wulargetempdesc><value>'.$wuskydesc.'<value></wulargetempdesc><br>';
//temp non metric wu
if($tempunit=='F' && $wuskydayTempHigh<44.6){echo '<wulargetemphihome><bluewu>'.number_format($wuskydayTempHigh,0).'°<wuunits>F</wuunits></bluewu></wulargetemphihome>';}
else if($tempunit=='F' && $wuskydayTempHigh>104){echo '<wulargetemphihome><purplewu>'.number_format($wuskydayTempHigh,0).'°<wuunits>F</wuunits></purplewu></wulargetemphihome>';}
else if($tempunit=='F' && $wuskydayTempHigh>80.6){echo '<wulargetemphihome><redwu>'.number_format($wuskydayTempHigh,0).'°<wuunits>F</wuunits></redwu></wulargetemphihome>';}
else if($tempunit=='F' && $wuskydayTempHigh>64.4){echo '<wulargetemphihome><orangewu>'.number_format($wuskydayTempHigh,0).'°<wuunits>F</wuunits></orangewu></wulargetemphihome>';}
else if($tempunit=='F' && $wuskydayTempHigh>55){echo '<wulargetemphihome><yellowwu>'.number_format($wuskydayTempHigh,0).'°<wuunits>F</wuunits></yellowwu></wulargetemphihome>';}
else if($tempunit=='F' && $wuskydayTempHigh>=44.6){echo '<wulargetemphihome><greenwu>'.number_format($wuskydayTempHigh,0).'°<wuunits>F</wuunits></greenwu></wulargetemphihome>';}
//temp metric wu
else if($wuskydayTempHigh<7){echo '<wulargetemphihome><bluewu>'.number_format($wuskydayTempHigh,0).'°<wuunits>C</wuunits></bluewu></wulargetemphihome>';}
else if($wuskydayTempHigh>40){echo '<wulargetemphihome><purplewu>'.number_format($wuskydayTempHigh,0).'°<wuunits>C</wuunits></purplewu></wulargetemphihome>';}
else if($wuskydayTempHigh>27){echo '<wulargetemphihome><redwu>'.number_format($wuskydayTempHigh,0).'°<wuunits>C</wuunits></redwu></wulargetemphihome>';}
else if($wuskydayTempHigh>18){echo '<wulargetemphihome><orangewu>'.number_format($wuskydayTempHigh,0).'°<wuunits>C</wuunits></orangewu></wulargetemphihome>';}
else if($wuskydayTempHigh>12.7){echo '<wulargetemphihome><yellowwu>'.number_format($wuskydayTempHigh,0).'°<wuunits>C</wuunits></yellowwu></wulargetemphihome>';}
else if($wuskydayTempHigh>=7){echo '<wulargetemphihome><greenwu>'.number_format($wuskydayTempHigh,0).'°<wuunits>C</wuunits></greenwu></wulargetemphihome>';}
//wind wu

echo "<div class='wulargewindspeedicon'> Winds from  <blueu>";
echo $wuskydayWinddircardinal; 
echo " </blueu>at ".$windalert2." <div class=wuwindspeed> ".number_format($wuskydayWindGust,0),"&nbsp;<wuunits>".$windunit;echo  '</wuunits></div></div>';'<br><br>';
echo "<div class='wulargerain'>";
//snow wu
if ( $wuskydaysnow>0 && $rainunit=='in'){ echo ' Snowfall Accumulation '.$snowflakesvg.'&nbsp;<wulargetempwindhome><oblue>&nbsp;'.$wuskydaysnow.'</oblue><wuunits> in</wuunits>';}
else if ( $wuskydaysnow>0 && $rainunit=='mm'){ echo 'Snowfall Accumulation '.$snowflakesvg.'&nbsp;<wulargetempwindhome><oblue>&nbsp;'.$wuskydaysnow.'</oblue><wuunits> cm</wuunits>';}
//rain wu
else if ($wuskydayPrecipType='rain' && $rainunit=='in'){echo 'Rainfall Accumulation '.$rainsvg.'&nbsp;<div class=wurainfall>'. number_format($wuskydayprecipIntensity,2).'&nbsp;<wuunits>'.$rainunit.'</wuunits></div>';}
else if ($wuskydayPrecipType='rain' && $rainunit=='mm'){echo 'Rainfall Accumulation '.$rainsvg.'&nbsp;<div class=wurainfall>'. number_format($wuskydayprecipIntensity,1).'&nbsp;<wuunits>'.$rainunit.'</wuunits></div>';}
//uvindex wu
echo '<br><div class=wulargeuvindex>UV Index &nbsp;<wuuvicon>&#9788;</wuuvicon>';
if ($wuskydayUV>=10){echo 	"<purplewuv>".$wuskydayUV. '</purplewuv><wuinfo>'.$wuskydayUVdesc;}
else  if ($wuskydayUV>7){echo 	"<redwuv>".$wuskydayUV. '</redwuv><wuinfo> '.$wuskydayUVdesc;}
else if ($wuskydayUV>5){echo 	"<orangewuv>".$wuskydayUV. '</orangewuv><wuinfo> '.$wuskydayUVdesc;}
else if ($wuskydayUV>2){echo 	"<yellowwuv>".$wuskydayUV. '</yellowwuv><wuinfo> '.$wuskydayUVdesc;}
else if ($wuskydayUV>0){echo 	"<greenwuv>".$wuskydayUV. '</greenwuv><wuinfo>'.$wuskydayUVdesc;}	
else if ($wuskydayUV==0){echo 	"<greywuv>".$wuskydayUV. '</greywuv><wuinfo> No Caution';}echo '</div>';
///wuheat index F
echo "<div class=wulargeheatindex>";
if ($tempunit=='F' && $wuskyheatindex>=84.2){echo "Heat Index ".$heatindexwu."<heatindexwu>".number_format($wuskyheatindex,0). '°<wuunits>F</wuunits></heatindexwu>';}
//wu heat index C
if ($tempunit=='C' && $wuskyheatindex>=29){echo "Heat Index ".$heatindexwu." <heatindexwu>".number_format($wuskyheatindex,0). '°<wuunits>C</wuunits></heatindexwu>';}
//lightning wu
echo '</div><div class=wulargeheatindex style="margin-top:27px;width:16em;margin-left:98px">';
if ($wuskythunder>0 )  {echo 'Thunderstorms expected '.$wuskydayTime.' </wuthunder2>';}
else if ($wuskythunder1>0 )  {echo $infowu.'<ored>Thunder</ored> '.$wuskydayTime1. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder2>0 )  {echo $infowu.'<ored>Thunder</ored> '.$wuskydayTime2. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder3>0 )  {echo $infowu.'<ored>Thunder</ored> '.$wuskydayTime3. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder4>0 )  {echo $infowu.'<ored>Thunder</ored> '.$wuskydayTime4. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder5>0 )  {echo $infowu.'<ored>Thunder</ored> '.$wuskydayTime5. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder6>0 )  {echo $infowu.'<ored>Thunder</ored> '.$wuskydayTime6. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder7>0 )  {echo $infowu.'<ored>Thunder</ored> '.$wuskydayTime7. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder8>0 )  {echo $infowu.'<ored>Thunder</ored> '.$wuskydayTime8. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder9>0 )  {echo $infowu.'<ored>Thunder</ored> '.$wuskydayTime9. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder10>0 )  {echo $infowu.'<ored>Thunder</ored> '.$wuskydayTime10. '&nbsp;'.$lightningalert8.'';}
//snowfall wu
else if ($wuskysnow>0 )  {echo $infowu.'<blue>Snow</blue> '.$wuskydayTime. '&nbsp;'.$freezing.'';}
else if ($wuskysnow1>0 )  {echo $infowu.'<blue>Snow</blue> '.$wuskydayTime1. '&nbsp;'.$freezing.'';}
else if ($wuskysnow2>0 )  {echo $infowu.'<blue>Snow</blue> '.$wuskydayTime2. '&nbsp;'.$freezing.'';}
else if ($wuskysnow3>0 )  {echo $infowu.'<blue>Snow</blue> '.$wuskydayTime3. '&nbsp;'.$freezing.'';}
else if ($wuskysnow4>0 )  {echo $infowu.'<blue>Snow</blue> '.$wuskydayTime4. '&nbsp;'.$freezing.'';}
else if ($wuskysnow5>0 )  {echo $infowu.'<blue>Snow</blue> '.$wuskydayTime5. '&nbsp;'.$freezing.'';}
else if ($wuskysnow6>0 )  {echo $infowu.'<blue>Snow</blue> '.$wuskydayTime6. '&nbsp;'.$freezing.'';}
else if ($wuskysnow7>0 )  {echo $infowu.'<blue>Snow</blue> '.$wuskydayTime7. '&nbsp;'.$freezing.'';}
else if ($wuskysnow8>0 )  {echo $infowu.'<blue>Snow</blue> '.$wuskydayTime8. '&nbsp;'.$freezing.'';}
else if ($wuskysnow9>0 )  {echo $infowu.'<blue>Snow</blue> '.$wuskydayTime9. '&nbsp;'.$freezing.'';}
else if ($wuskysnow10>0 )  {echo $infowu.'<blue>Snow</blue> '.$wuskydayTime10. '&nbsp;'.$freezing.'';}
//rainfall wu
else if ($wuskyrain>0 )  {echo $infowu.'<blue>Rain</blue> '.$wuskydayTime. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain1>0 )  {echo $infowu.'<blue>Rain</blue> '.$wuskydayTime1.'&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain2>0 )  {echo $infowu.'<blue>Rain</blue> '.$wuskydayTime2.'&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain3>0 )  {echo $infowu.'<blue>Rain</blue> '.$wuskydayTime3. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain4>0 )  {echo $infowu.'<blue>Rain</blue> '.$wuskydayTime4. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain5>0 )  {echo $infowu.'<blue>Rain</blue> '.$wuskydayTime5. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain6>0 )  {echo $infowu.'<blue>Rain</blue> '.$wuskydayTime6. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain7>0 )  {echo $infowu.'<blue>Rain</blue> '.$wuskydayTime7. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain8>0 )  {echo $infowu.'<blue>Rain</blue> '.$wuskydayTime8. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain9>0 )  {echo $infowu.'<blue>Rain</blue> '.$wuskydayTime9. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain10>0 )  {echo $infowu.'<blue>Rain</blue> '.$wuskydayTime10. '&nbsp;'.$rainfallalert8.'';}
//heat index today caution wu
else if ($tempunit=='C' && $wuskyheatindex>29 )  {echo $infowu.'<wuheatindex>Heat Index </wuheatindex>High '.$wuskydayTime. '&nbsp;'.$lightningalert8.'';}
else if ($tempunit=='F' && $wuskyheatindex>84 )  {echo $infowu.'<wuheatindex>Heat Index </wuheatindex>High '.$wuskydayTime. '&nbsp;'.$lightningalert8.'';}
//uv index wu
else if ($wuskydayUV1>6 )  {echo $infowu.'<ored>High UV </ored> '.$wuskydayTime1.'&nbsp;'.$lightningalert8.'';}
else if ($wuskydayUV2>6 )  {echo $infowu.'<ored>High UV </ored> '.$wuskydayTime2.'&nbsp;'.$lightningalert8.'';}
else if ($wuskydayUV3>6 )  {echo $infowu.'<ored>High UV </ored> '.$wuskydayTime3. '&nbsp;'.$lightningalert8.'';}
else if ($wuskydayUV4>6 )  {echo $infowu.'<ored>High UV </ored> '.$wuskydayTime4. '&nbsp;'.$lightningalert8.'';}
else if ($wuskydayUV5>6 )  {echo $infowu.'<ored>High UV </ored> '.$wuskydayTime5. '&nbsp;'.$lightningalert8.'';}
else if ($wuskydayUV6>6 )  {echo $infowu.'<ored>High UV </ored> '.$wuskydayTime6. '&nbsp;'.$lightningalert8.'';}
else if ($wuskydayUV7>6 )  {echo $infowu.'<ored>High UV </ored> '.$wuskydayTime7. '&nbsp;'.$lightningalert8.'';}
else if ($wuskydayUV8>6 )  {echo $infowu.'<ored>High UV </ored> '.$wuskydayTime8. '&nbsp;'.$lightningalert8.'';}
else echo $lightningalert8. "&nbsp;No Cautions";
echo '</div>';?></div></div></div>