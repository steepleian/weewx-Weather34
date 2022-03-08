<?php
//###################################################################################################################
//	weewx-Weather34 Template maintained by Ian Millard (Steepleian)                                 				#
//	                                                                                                				#
//  Contains original legacy code (by agreement) created and developed by Brian Underdown (https://weather34.com)   # 
//  for the (now superseeded) original Weather34 Template which is no longer maintained by its creator              #
//  © weather34.com original CSS/SVG/PHP 2015-2019                                                                  #
// 	                                                                                                				#
//  Contains original code by Ian Millard and collaborators															#
//  © claydonsweather.org original CSS/SVG/PHP 2020-2021                                                            #
// 	                                                                                                				#
// 	Issues for weewx-Weather34 template should be addressed to https://github.com/steepleian/weewx-Weather34/issues #                                                                                              #
// 	                                                                                                				#
//###################################################################################################################

include_once('settings.php');
include_once('w34CombinedData.php');
error_reporting(0);
date_default_timezone_set($TZ);
//start the  output
$jsonIcon = 'jsondata/lookupTable.json';
$jsonIcon = file_get_contents($jsonIcon);
$parsed_icon = json_decode($jsonIcon, true);
$json        = 'jsondata/awd.txt';
$forecasturl = file_get_contents($json);
$parsed_json = json_decode($forecasturl, true);
$pngicon = $parsed_json['response'][0]['periods'][0]['icon'];
$forecastIcon = $parsed_icon[$pngicon]['icon1'];

$Time     = date("H", $parsed_json['response'][0]['periods'][0]['timestamp']);
$forecastTempHigh = $parsed_json['response'][0]['periods'][0]['maxTempC'];
$forecastTempLow  = $parsed_json['response'][0]['periods'][0]['minTempC'];
if ($forecastTempHigh === null) {
    $forecastTempHigh = $forecastTempLow;
}
$forecastWindGust = $parsed_json['response'][0]['periods'][0]['windSpeedKPH'];

$forecastWinddircardinal = $parsed_json['response'][0]['periods'][0]['windDir'];
$forecastacumm           = $parsed_json->{'daypart'}[0]->{'snowRange'}[0];

$forecastprecipIntensity = $parsed_json['response'][0]['periods'][0]['precipMM'];
$forecastPrecipProb      = $parsed_json['response'][0]['periods'][0]['pop'];
$forecastUV              = $parsed_json['response'][0]['periods'][0]['uvi'];
$forecastUVdesc          = $parsed_json->{'daypart'}[0]->{'uvDescription'}[0];

$forecastsummary = $parsed_json['response'][0]['periods'][0]['weather'];
$daynight        = $parsed_forecastjson['response'][0]['periods'][0]['isDay'];
if ($Time === "07") {
    $forecastTime = "Today'";
} else if ($Time === "19") {
    $forecastTime = "Tonight'";
}
$forecastdesc = $parsed_json['response'][0]['periods'][0]['weatherPrimary'];

$forecasthumidity  = $parsed_json['response'][0]['periods'][0]['humidity'];
$forecastheatindex = $parsed_json['response'][0]['periods'][0]['avgFeelslikeC'];

?>
<div class="updatedtime1"><?php
$forecastime = filemtime('jsondata/awd.txt');
$forecasturl = file_get_contents("jsondata/awd.txt");
if (filesize('jsondata/awd.txt') < 1) {
    echo "" . $offline . "";
} else
    echo $online, "";
echo " ", date($timeFormat, $forecastime);
?></div>
<div class="wulargeforecasthome"><div class="wulargediv">
<?php //begin aw stuff 
//convert lightning index
if ($forecastthunderidx == 0) {
    $forecastthunder = $lightningalert8 . ' &nbsp;No Thunder Storm';
} else if ($forecastthunderidx == 1) {
    $forecastthunder = $lightningalert8 . ' &nbsp;Thunder Storm Risk';
} else if ($forecastthunderidx == 2) {
    $forecastthunder = $lightningalert8 . ' &nbsp;Thunder Storm';
} else if ($forecastthunderidx >= 3) {
    $forecastthunder = $lightningalert8 . ' &nbsp;Severe Thunderstorm';
}
//aw convert temps-rain-wind
//metric to F
	//aw convert temps-rain
    //metric to F
    if ($tempunit == 'F')
    {
        $forecastTempHigh = round(($forecastTempHigh * 9 / 5) + 32, 0);
    }

    //heatindex
    if ($tempunit == 'F')
    {
        $forecastheatindex = ($forecastheatindex * 9 / 5) + 32;
    }

    //rain inches to mm
    if ($rainunit == 'in')
    {
        $forecastprecipIntensity = $forecastprecipIntensity * 0.0393701;
    }

    //kmh to ms
    if ($windunit == 'm/s')
    {
        $forecastWindGust = round((number_format($forecastWindGust, 1) * 0.277778) , 0);
        $forecastWindSpeed = round((number_format($forecastWindSpeed, 1) * 0.277778) , 0);
    }
    //kmh to mph
    if ($windunit == 'mph')
    {
        $forecastWindGust = round((number_format($forecastWindGust, 1) * 0.621371) , 0);
        $forecastWindSpeed = round((number_format($forecastWindSpeed, 1) * 0.621371) , 0);
    }	//convert lightning index shorter phrases
//icon + day aw
echo '<div class="wulargeforecastinghome">';
echo '<div class="wulargeweekdayhome">' . $forecastTime . 's Forecast</div><div class=wulargehomeicons>';
echo '<img src="css/svg/'.$forecastIcon.'" width="52px" height="41px"  ></img>';
echo '</div><wulargetempdesc><value>' . $forecastdesc . '<value></wulargetempdesc><br><br>';
//temp non metric aw
if ($tempunit == 'F' && $forecastTempHigh < 44.6) {
    echo '<wulargetemphihome><bluewu>' . number_format($forecastTempHigh, 0) . '°<wuunits>F</wuunits></bluewu></wulargetemphihome>';
} else if ($tempunit == 'F' && $forecastTempHigh > 104) {
    echo '<wulargetemphihome><purplewu>' . number_format($forecastTempHigh, 0) . '°<wuunits>F</wuunits></purplewu></wulargetemphihome>';
} else if ($tempunit == 'F' && $forecastTempHigh > 80.6) {
    echo '<wulargetemphihome><redwu>' . number_format($forecastTempHigh, 0) . '°<wuunits>F</wuunits></redwu></wulargetemphihome>';
} else if ($tempunit == 'F' && $forecastTempHigh > 64.4) {
    echo '<wulargetemphihome><orangewu>' . number_format($forecastTempHigh, 0) . '°<wuunits>F</wuunits></orangewu></wulargetemphihome>';
} else if ($tempunit == 'F' && $forecastTempHigh > 55) {
    echo '<wulargetemphihome><yellowwu>' . number_format($forecastTempHigh, 0) . '°<wuunits>F</wuunits></yellowwu></wulargetemphihome>';
} else if ($tempunit == 'F' && $forecastTempHigh >= 44.6) {
    echo '<wulargetemphihome><greenwu>' . number_format($forecastTempHigh, 0) . '°<wuunits>F</wuunits></greenwu></wulargetemphihome>';
}
//temp metric wu
else if ($forecastTempHigh < 7) {
    echo '<wulargetemphihome><bluewu>' . number_format($forecastTempHigh, 0) . '°<wuunits>C</wuunits></bluewu></wulargetemphihome>';
} else if ($forecastTempHigh > 40) {
    echo '<wulargetemphihome><purplewu>' . number_format($forecastTempHigh, 0) . '°<wuunits>C</wuunits></purplewu></wulargetemphihome>';
} else if ($forecastTempHigh > 27) {
    echo '<wulargetemphihome><redwu>' . number_format($forecastTempHigh, 0) . '°<wuunits>C</wuunits></redwu></wulargetemphihome>';
} else if ($forecastTempHigh > 18) {
    echo '<wulargetemphihome><orangewu>' . number_format($forecastTempHigh, 0) . '°<wuunits>C</wuunits></orangewu></wulargetemphihome>';
} else if ($forecastTempHigh > 12.7) {
    echo '<wulargetemphihome><yellowwu>' . number_format($forecastTempHigh, 0) . '°<wuunits>C</wuunits></yellowwu></wulargetemphihome>';
} else if ($forecastTempHigh >= 7) {
    echo '<wulargetemphihome><greenwu>' . number_format($forecastTempHigh, 0) . '°<wuunits>C</wuunits></greenwu></wulargetemphihome>';
}
//wind aw
echo "<div class='wulargewindspeedicon'> Winds from  <blueu>";
echo $forecastWinddircardinal;
echo " </blueu>at " . $windalert2 . " <div class=wuwindspeed> " . number_format($forecastWindGust, 0), "&nbsp;<wuunits>" . $windunit;
echo '</wuunits></div></div>';
'<br><br>';
echo "<div class='wulargerain'>";
//snow aw
if ($forecastsnow > 0 && $rainunit == 'in') {
    echo ' Snowfall Accumulation ' . $snowflakesvg . '&nbsp;<wulargetempwindhome><oblue>&nbsp;' . $forecastsnow . '</oblue><wuunits> in</wuunits>';
} else if ($forecastsnow > 0 && $rainunit == 'mm') {
    echo 'Snowfall Accumulation ' . $snowflakesvg . '&nbsp;<wulargetempwindhome><oblue>&nbsp;' . $forecastsnow . '</oblue><wuunits> cm</wuunits>';
}
//rain aw
else if ($forecastPrecipType = 'rain' && $rainunit == 'in') {
    echo 'Rainfall Accumulation ' . $rainsvg . '&nbsp;<div class=wurainfall>' . number_format($forecastprecipIntensity, 2) . '&nbsp;<wuunits>' . $rainunit . '</wuunits></div>';
} else if ($forecastPrecipType = 'rain' && $rainunit == 'mm') {
    echo 'Rainfall Accumulation ' . $rainsvg . '&nbsp;<div class=wurainfall>' . number_format($forecastprecipIntensity, 1) . '&nbsp;<wuunits>' . $rainunit . '</wuunits></div>';
}
//uvindex aw
echo '<br><div class=wulargeuvindex>UV Index &nbsp;<wuuvicon>&#9788;</wuuvicon>';
if ($forecastUV >= 10) {
    echo "<purplewuv>" . $forecastUV . '</purplewuv><wuinfo>' . $forecastUVdesc;
} else if ($forecastUV > 7) {
    echo "<redwuv>" . $forecastUV . '</redwuv><wuinfo> ' . $forecastUVdesc;
} else if ($forecastUV > 5) {
    echo "<orangewuv>" . $forecastUV . '</orangewuv><wuinfo> ' . $forecastUVdesc;
} else if ($forecastUV > 2) {
    echo "<yellowwuv>" . $forecastUV . '</yellowwuv><wuinfo> ' . $forecastUVdesc;
} else if ($forecastUV > 0) {
    echo "<greenwuv>" . $forecastUV . '</greenwuv><wuinfo>' . $forecastUVdesc;
} else if ($forecastUV == 0) {
    echo "<greywuv>" . $forecastUV . '</greywuv><wuinfo> No Caution';
}
echo '</div>';
///awheat index F
echo "<div class=wulargeheatindex>";
if ($tempunit == 'F' && $forecastheatindex >= 84.2) {
    echo "Heat Index " . $heatindexwu . "<heatindexwu>" . number_format($forecastheatindex, 0) . '°<wuunits>F</wuunits></heatindexwu>';
}
//aw heat index C
if ($tempunit == 'C' && $forecastheatindex >= 29) {
    echo "Heat Index " . $heatindexwu . " <heatindexwu>" . number_format($forecastheatindex, 0) . '°<wuunits>C</wuunits></heatindexwu>';
}
//lightning aw
echo '</div><div class=wulargeheatindex style="margin-top:27px;width:16em;margin-left:98px">';
if ($forecastthunderidx > 0) {
    echo 'Thunderstorms expected ' . $forecastTime . ' </wuthunder2>';
} else if ($forecastthunderidx1 > 0) {
    echo $infowu . '<ored>Thunder</ored> ' . $forecastTime1 . '&nbsp;' . $lightningalert8 . '';
} else if ($forecastthunderidx2 > 0) {
    echo $infowu . '<ored>Thunder</ored> ' . $forecastTime2 . '&nbsp;' . $lightningalert8 . '';
} else if ($forecastthunderidx3 > 0) {
    echo $infowu . '<ored>Thunder</ored> ' . $forecastTime3 . '&nbsp;' . $lightningalert8 . '';
} else if ($forecastthunderidx4 > 0) {
    echo $infowu . '<ored>Thunder</ored> ' . $forecastTime4 . '&nbsp;' . $lightningalert8 . '';
} else if ($forecastthunderidx5 > 0) {
    echo $infowu . '<ored>Thunder</ored> ' . $forecastTime5 . '&nbsp;' . $lightningalert8 . '';
} else if ($forecastthunderidx6 > 0) {
    echo $infowu . '<ored>Thunder</ored> ' . $forecastTime6 . '&nbsp;' . $lightningalert8 . '';
} else if ($forecastthunderidx7 > 0) {
    echo $infowu . '<ored>Thunder</ored> ' . $forecastTime7 . '&nbsp;' . $lightningalert8 . '';
} else if ($forecastthunderidx8 > 0) {
    echo $infowu . '<ored>Thunder</ored> ' . $forecastTime8 . '&nbsp;' . $lightningalert8 . '';
} else if ($forecastthunderidx9 > 0) {
    echo $infowu . '<ored>Thunder</ored> ' . $forecastTime9 . '&nbsp;' . $lightningalert8 . '';
} else if ($forecastthunderidx10 > 0) {
    echo $infowu . '<ored>Thunder</ored> ' . $forecastTime10 . '&nbsp;' . $lightningalert8 . '';
}
//snowfall aw
else if ($forecastsnow > 0) {
    echo $infowu . '<blue>Snow</blue> ' . $forecastTime . '&nbsp;' . $freezing . '';
} else if ($forecastsnow1 > 0) {
    echo $infowu . '<blue>Snow</blue> ' . $forecastTime1 . '&nbsp;' . $freezing . '';
} else if ($forecastsnow2 > 0) {
    echo $infowu . '<blue>Snow</blue> ' . $forecastTime2 . '&nbsp;' . $freezing . '';
} else if ($forecastsnow3 > 0) {
    echo $infowu . '<blue>Snow</blue> ' . $forecastTime3 . '&nbsp;' . $freezing . '';
} else if ($forecastsnow4 > 0) {
    echo $infowu . '<blue>Snow</blue> ' . $forecastTime4 . '&nbsp;' . $freezing . '';
} else if ($forecastsnow5 > 0) {
    echo $infowu . '<blue>Snow</blue> ' . $forecastTime5 . '&nbsp;' . $freezing . '';
} else if ($forecastsnow6 > 0) {
    echo $infowu . '<blue>Snow</blue> ' . $forecastTime6 . '&nbsp;' . $freezing . '';
} else if ($forecastsnow7 > 0) {
    echo $infowu . '<blue>Snow</blue> ' . $forecastTime7 . '&nbsp;' . $freezing . '';
} else if ($forecastsnow8 > 0) {
    echo $infowu . '<blue>Snow</blue> ' . $forecastTime8 . '&nbsp;' . $freezing . '';
} else if ($forecastsnow9 > 0) {
    echo $infowu . '<blue>Snow</blue> ' . $forecastTime9 . '&nbsp;' . $freezing . '';
} else if ($forecastsnow10 > 0) {
    echo $infowu . '<blue>Snow</blue> ' . $forecastTime10 . '&nbsp;' . $freezing . '';
}
//rainfall aw
else if ($forecastrain > 0) {
    echo $infowu . '<blue>Rain</blue> ' . $forecastTime . '&nbsp;' . $rainfallalert8 . '';
} else if ($forecastrain1 > 0) {
    echo $infowu . '<blue>Rain</blue> ' . $forecastTime1 . '&nbsp;' . $rainfallalert8 . '';
} else if ($forecastrain2 > 0) {
    echo $infowu . '<blue>Rain</blue> ' . $forecastTime2 . '&nbsp;' . $rainfallalert8 . '';
} else if ($forecastrain3 > 0) {
    echo $infowu . '<blue>Rain</blue> ' . $forecastTime3 . '&nbsp;' . $rainfallalert8 . '';
} else if ($forecastrain4 > 0) {
    echo $infowu . '<blue>Rain</blue> ' . $forecastTime4 . '&nbsp;' . $rainfallalert8 . '';
} else if ($forecastrain5 > 0) {
    echo $infowu . '<blue>Rain</blue> ' . $forecastTime5 . '&nbsp;' . $rainfallalert8 . '';
} else if ($forecastrain6 > 0) {
    echo $infowu . '<blue>Rain</blue> ' . $forecastTime6 . '&nbsp;' . $rainfallalert8 . '';
} else if ($forecastrain7 > 0) {
    echo $infowu . '<blue>Rain</blue> ' . $forecastTime7 . '&nbsp;' . $rainfallalert8 . '';
} else if ($forecastrain8 > 0) {
    echo $infowu . '<blue>Rain</blue> ' . $forecastTime8 . '&nbsp;' . $rainfallalert8 . '';
} else if ($forecastrain9 > 0) {
    echo $infowu . '<blue>Rain</blue> ' . $forecastTime9 . '&nbsp;' . $rainfallalert8 . '';
} else if ($forecastrain10 > 0) {
    echo $infowu . '<blue>Rain</blue> ' . $forecastTime10 . '&nbsp;' . $rainfallalert8 . '';
}
//heat index today caution aw
else if ($tempunit == 'C' && $forecastheatindex > 29) {
    echo $infowu . '<wuheatindex>Heat Index </wuheatindex>High ' . $forecastTime . '&nbsp;' . $lightningalert8 . '';
} else if ($tempunit == 'F' && $forecastheatindex > 84) {
    echo $infowu . '<wuheatindex>Heat Index </wuheatindex>High ' . $forecastTime . '&nbsp;' . $lightningalert8 . '';
}
//uv index aw
else if ($forecastUV1 > 6) {
    echo $infowu . '<ored>High UV </ored> ' . $forecastTime1 . '&nbsp;' . $lightningalert8 . '';
} else if ($forecastUV2 > 6) {
    echo $infowu . '<ored>High UV </ored> ' . $forecastTime2 . '&nbsp;' . $lightningalert8 . '';
} else if ($forecastUV3 > 6) {
    echo $infowu . '<ored>High UV </ored> ' . $forecastTime3 . '&nbsp;' . $lightningalert8 . '';
} else if ($forecastUV4 > 6) {
    echo $infowu . '<ored>High UV </ored> ' . $forecastTime4 . '&nbsp;' . $lightningalert8 . '';
} else if ($forecastUV5 > 6) {
    echo $infowu . '<ored>High UV </ored> ' . $forecastTime5 . '&nbsp;' . $lightningalert8 . '';
} else if ($forecastUV6 > 6) {
    echo $infowu . '<ored>High UV </ored> ' . $forecastTime6 . '&nbsp;' . $lightningalert8 . '';
} else if ($forecastUV7 > 6) {
    echo $infowu . '<ored>High UV </ored> ' . $forecastTime7 . '&nbsp;' . $lightningalert8 . '';
} else if ($forecastUV8 > 6) {
    echo $infowu . '<ored>High UV </ored> ' . $forecastTime8 . '&nbsp;' . $lightningalert8 . '';
} 
//else
//    echo $lightningalert8 . "&nbsp;No Cautions";
echo '</div>';
?></div></div></div>
