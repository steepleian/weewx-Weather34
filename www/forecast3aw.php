<?php 

//###################################################################################################################
//	weewx-Weather34 Template maintained by Ian Millard (Steepleian)                                 				#
//	                                                                                                				#
//  Contains original legacy code (by agreement) created and developed by Brian Underdown (https://weather34.com)   # 
//  for the (now superseeded) original Weather34 Template which is no longer developed or maintained by its creator              #
//  © weather34.com original CSS/SVG/PHP 2015-2019                                                                  #
// 	                                                                                                				#
//  Contains original code by Ian Millard and collaborators															#
//  © claydonsweather.org original CSS/SVG/PHP 2020-2021                                                            #
// 	                                                                                                				#
// 	Issues for weewx-Weather34 template should be addressed to https://github.com/steepleian/weewx-Weather34/issues #                                                                                              #
// 	                                                                                                				#
//###################################################################################################################


include_once('w34CombinedData.php');
$iconset = "icon2";
error_reporting(0); date_default_timezone_set($TZ);
header('Content-type: text/html; charset=UTF-8');
if ($windunit=='kts'){$windunit="kn";}
$jsonfile="jsondata/awd.txt";if(!file_exists($jsonfile)) {return;}
?>


<div class="updatedtime1"><?php $forecastime=filemtime('jsondata/awd.txt');

$forecasturl = file_get_contents("jsondata/awd.txt");
if(filesize('jsondata/awd.txt')<1){echo "".$offline. "";}
else echo $online,"";echo " ",	date($timeFormat,$forecastime);	?></div>
<div class="darkskyforecasthome" ><div class="darkskydiv">
<?php //begin ad stuff 
$jsonIcon = 'jsondata/lookupTable.json';
$jsonIcon = file_get_contents($jsonIcon);
$parsed_icon = json_decode($jsonIcon, true);
$forecasturl=file_get_contents($jsonfile);
$parsed_forecastjson = json_decode($forecasturl,true);
$wucount = 0;
for ($k=0;$k<=2;$k++) 
{
     $pngicon[$k] = $parsed_forecastjson['response'][0]['periods'][$k]['icon'];
     $forecastIcon[$k] = $parsed_icon[$pngicon[$k]][$iconset];
     $Time[$k] = date("H", $parsed_forecastjson['response'][0]['periods'][$k]['timestamp']);
     if($Time[0] ==="07"){$forecastdayTime[0] = "Today"; $forecastdayTime[1] = "Tonight"; $forecastdayTime[2] = "Tomorrow";}
	 else if($Time[0] ==="19"){$forecastdayTime[0] = "Tonight"; $forecastdayTime[1] = "Tomorrow"; $forecastdayTime[2] = "Tomorrow Night";}
     $forecastdayTempHigh = $parsed_forecastjson['response'][0]['periods'][$k]['maxTempC'];
     $forecastdayTempLow = $parsed_forecastjson['response'][0]['periods'][$k]['minTempC'];
     $forecastHumidity = $parsed_forecastjson['response'][0]['periods'][$k]['maxHumidity'].'%';
     if($forecastdayTempHigh ===null){$forecastdayTempHigh = $forecastdayTempLow;}
     $forecastdayWindGust = $parsed_forecastjson['response'][0]['periods'][$k]['windSpeedKPH'];
     //$forecastdayWinddir = $parsed_forecastjson->{'daypart'}[0]->{'windDirection'}[$k];
	 $forecastdayWinddircardinal = $parsed_forecastjson['response'][0]['periods'][$k]['windDir']; 
     //$forecastdayacumm = $parsed_forecastjson->{'daypart'}[0]->{'snowRange'}[$k];
	 //$forecastdayPrecipType = $parsed_forecastjson->{'daypart'}[0]->{'precipType'}[$k];
     $forecastdayprecipIntensity = $parsed_forecastjson['response'][0]['periods'][$k]['precipMM'];
	 $forecastdayPrecipProb = $parsed_forecastjson['response'][0]['periods'][$k]['pop'];
     $forecastdayUV = $parsed_forecastjson['response'][0]['periods'][$k]['uvi'];
	 //$forecastdayUVdesc = $parsed_forecastjson->{'daypart'}[0]->{'uvDescription'}[$k];
     //$forecastdaysnow = $parsed_forecastjson->{'daypart'}[0]->{'qpfSnow'}[$k];
	 $forecastdaysummary = $parsed_forecastjson['response'][0]['periods'][$k]['weatherPrimary'];
     $daynight = $parsed_forecastjson['response'][0]['periods'][$k]['isDay'];
     if ($daynight !== false)
    {
        $forecastdaynight = "D";
    }
    else $forecastdaynight = "N";
	//metric to F
	//aw convert temps-rain
    //metric to F
    if ($tempunit == 'F')
    {
        $forecastdayTempHigh = round(($forecastdayTempHigh * 9 / 5) + 32, 0);
    }

    //heatindex
    if ($tempunit == 'F')
    {
        $wuskyheatindex = ($wuskyheatindex * 9 / 5) + 32;
    }

    //rain inches to mm
    if ($rainunit == 'in')
    {
        $forecastdayprecipIntensity = $forecastdayprecipIntensity * 0.0393701;
    }

    //kmh to ms
    if ($windunit == 'm/s')
    {
        $forecastdayWindGust = round((number_format($forecastdayWindGust, 1) * 0.277778) , 0);
        $forecastdayWindSpeed = round((number_format($forecastdayWindSpeed, 1) * 0.277778) , 0);
    }
    //kmh to mph
    if ($windunit == 'mph')
    {
        $forecastdayWindGust = round((number_format($forecastdayWindGust, 1) * 0.621371) , 0);
        $forecastdayWindSpeed = round((number_format($forecastdayWindSpeed, 1) * 0.621371) , 0);
    }	//convert lightning index shorter phrases
	if ( $forecastthunder==0 ){$forecastthunder='';}else if ( $forecastthunder==1 ){$forecastthunder=$lightningalert4.' Thunder Risk';}else if ( $forecastthunder==2 ){$forecastthunder=$lightningalert4.' Thunder';}else if ( $forecastthunder>=3 ){$forecastthunder=$lightningalert4.' Severe Tstorm';}	
	//icon + day
	echo '<div class="darkskyforecastinghome" style="border:0px">';echo '<div class="darkskyweekdayhome">'.$forecastdayTime[$k].'</div><div class=darkskyhomeicons>';
	echo '<img src="css/svg/' . $forecastIcon[$k] . '" width="45%" ></img>';	
	echo '</div><div class="darkskytempdesc" style="font-size: 0.53rem"}>'.$forecastdaysummary.'</div>';
	//temp non metric
	if($tempunit=='F' && $forecastdayTempHigh<44.6){echo '<darkskytemphihome><bluet>'.number_format($forecastdayTempHigh,0).'°'.$tempunit.'</bluet></darkskytemphihome>';}
	else if($tempunit=='F' && $forecastdayTempHigh>104){echo '<darkskytemphihome><purplet>'.number_format($forecastdayTempHigh,0).'°'.$tempunit.'</purplet></darkskytemphihome>';}
	else if($tempunit=='F' && $forecastdayTempHigh>80.6){echo '<darkskytemphihome><redt>'.number_format($forecastdayTempHigh,0).'°'.$tempunit.'</redt></darkskytemphihome>';}
	else if($tempunit=='F' && $forecastdayTempHigh>64.4){echo '<darkskytemphihome><oranget>'.number_format($forecastdayTempHigh,0).'°'.$tempunit.'</oranget></darkskytemphihome>';}
	else if($tempunit=='F' && $forecastdayTempHigh>55){echo '<darkskytemphihome><yellowt>'.number_format($forecastdayTempHigh,0).'°'.$tempunit.'</yellowt></darkskytemphihome>';}
	else if($tempunit=='F' && $forecastdayTempHigh>=44.6){echo '<darkskytemphihome><greent>'.number_format($forecastdayTempHigh,0).'°</greent></darkskytemphihome>';}
	//temp metric
	else if($forecastdayTempHigh<7){echo '<darkskytemphihome><bluet>'.number_format($forecastdayTempHigh,0).'°'.$tempunit.'</bluet></darkskytemphihome>';}
	else if($forecastdayTempHigh>40){echo '<darkskytemphihome><purplet>'.number_format($forecastdayTempHigh,0).'°'.$tempunit.'</purplet></darkskytemphihome>';}
	else if($forecastdayTempHigh>27){echo '<darkskytemphihome><redt>'.number_format($forecastdayTempHigh,0).'°'.$tempunit.'</redt></darkskytemphihome>';}
	else if($forecastdayTempHigh>18){echo '<darkskytemphihome><oranget>'.number_format($forecastdayTempHigh,0).'°'.$tempunit.'</oranget></darkskytemphihome>';}
	else if($forecastdayTempHigh>12.7){echo '<darkskytemphihome><yellowt>'.number_format($forecastdayTempHigh,0).'°'.$tempunit.'</yellowt></darkskytemphihome>';}
	else if($forecastdayTempHigh>=7){echo '<darkskytemphihome><greent>'.number_format($forecastdayTempHigh,0).'°'.$tempunit.'</greent></darkskytemphihome>';}
	//wind
	echo "<div class='darkskywindspeedicon'>";
	echo $windalert2." ".$forecastdayWinddircardinal; 
	echo " ".number_format($forecastdayWindGust,0)," <valuewindunit>".$windunit;echo  '</div>';'<br>';
	//snow
	if ( $forecastdaysnow>0 && $rainunit=='in'){ echo '<precip>'.$snowflakesvg.'&nbsp;<darkskytempwindhome><span><oblue>&nbsp;'.$forecastdaysnow.'</oblue><valuewindunit> in</valuewindunit></darkskywindhome></span></precip>';}
	else if ( $forecastdaysnow>0 && $rainunit=='mm'){ echo '<precip>'.$snowflakesvg.'&nbsp;<darkskytempwindhome><span><oblue>&nbsp;'.$forecastdaysnow.'</oblue><valuewindunit> cm</valuewindunit></darkskywindhome></span></precip>';}
	
	
	//rain
	else if ($forecastdayPrecipType='rain' && $rainunit=='in'){echo '<precip>'.$rainsvg.'&nbsp;<darkskytempwindhome><span><oblue>&nbsp;'. number_format($forecastdayprecipIntensity,2).'</oblue>&nbsp;<valuewindunit>'.$rainunit.'</valuewindunit></darkskywindhome></span></precip>';}
	else if ($forecastdayPrecipType='rain' && $rainunit=='mm'){echo '<precip>'.$rainsvg.'&nbsp;<darkskytempwindhome><span><oblue>&nbsp;'. number_format($forecastdayprecipIntensity,2).'</oblue>&nbsp;<valuewindunit>'.$rainunit.'</valuewindunit></darkskywindhome></span></precip>';}
	//uvi
if ($forecastdaynight=='D'){echo '<br><wuuvicon>&#9788;</wuuvicon>&nbsp;<darkskytemplohome><uv>UVI <uvspan>';if ($forecastdayUV>=10){echo "<purpleu>".$forecastdayUV. '</purpleu><greyu> '.$forecastdayUVdesc;}else  if ($forecastdayUV>=7){echo "<redu>".$forecastdayUV. '</redu><greyu> '.$forecastdayUVdesc;}else if ($forecastdayUV>5){ echo "<orangeu>".$forecastdayUV. '</orangeu><greyu> '.$forecastdayUVdesc;}else if ($forecastdayUV>2){  echo "<yellowu>".$forecastdayUV. '</yellowu><greyu> '.$forecastdayUVdesc;}else if ($forecastdayUV>=0){ echo "<greenu>".$forecastdayUV. '</greenu><greyu> '.$forecastdayUVdesc;}echo '</uvspan></uv>';}
else if ($forecastdaynight=='N'){echo '<br><blueu>'.$humidity.'&nbsp;<darkskytemplohome><uv>Hum <uvspan>'.$forecastHumidity. '</blueu>';}
	//lightning
	echo '<thunder>'.$forecastthunder;echo '</darkskytemplohome></div>';
} // end for loop for icons
?>
</div></div></div>
