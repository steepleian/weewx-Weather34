<!DOCTYPE html>
<title>weather34 current conditions</title>
<style>
uppercase{ text-transform:capitalize;}
</style>
<?php 
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
//This version for WeeWX by Ian Millard 01-09.2021//
include('metar34get.php');include('serverdata/archivedata.php'); error_reporting(0);$weather["cloudbase3"] = round((anyToC($weather["temp"]) - anyToC($weather["dewpoint"])) * 1000 /2.4444) ;
$result = date_sun_info(time(), $lat, $lon);$sunr=date_sunrise(time(), SUNFUNCS_RET_STRING, $lat, $lon, $rise_zenith, $UTC);$suns=date_sunset(time(), SUNFUNCS_RET_STRING, $lat, $lon, $set_zenith, $UTC);
$sunr1=date_sunrise(strtotime('+1 day', time()), SUNFUNCS_RET_STRING, $lat, $lon, $rise_zenith, $UTC);$suns1=date_sunset(strtotime('+1 day', time()), SUNFUNCS_RET_STRING, $lat, $lon, $set_zenith, $UTC);
$tw=date_sunrise(strtotime('+1 day', time()), SUNFUNCS_RET_STRING, $lat, $lon, 96, $UTC);$twe=date_sunset(strtotime('+1 day', time()), SUNFUNCS_RET_STRING, $lat, $lon, 96, $UTC);
$suns2 =date('G.i', $result['sunset']);$sunr2 =date('G.i', $result['sunrise']);$suns3 =date('G.i', $result['sunset']);$sunr3 =date('G.i', $result['sunrise']);$sunrisehour =date('G', $result['sunrise']);
$sunsethour =date('G', $result['sunset']);$twighlight_begin =date('G:i', $result['civil_twilight_begin']);$twighlight_end =date('G:i', $result['civil_twilight_end']);$now =date('G.i');
$json_string             = file_get_contents("jsondata/me.txt");
$parsed_json             = json_decode($json_string, true);
$sky_desc                = $parsed_json['data'][0]['clouds'][0]['text'];
$sky_code                = $parsed_json['data'][0]['clouds'][0]['code'];
if ($windunit =='mph' ||  $windunit =='kts'){$weather["cloudbase3"]   = $parsed_json['data'][0]['clouds'][0]['feet'];}
else if ($windunit =='km/h' ||  $windunit =='m/s'){$weather["cloudbase3"]   = $parsed_json['data'][0]['clouds'][0]['meters'];} 
?>
<div class="updatedtimecurrent">
<?php $forecastime=filemtime('jsondata/me.txt');$weather34wuurl = file_get_contents("jsondata/me.txt");if(filesize('jsondata/me.txt')<10){echo  $online;}
else echo $online,"";echo " ",	date($timeFormat,$forecastime);	?></div>
<div class="cloudconverter">
<?php //cloudbase-weather34
if ($sky_code == 'CLR' || $sky_code == 'HZY'){echo "<div class=cloudconvertercircle>No Cloud Base" ;}
else if ($windunit =='mph' ||  $windunit =='kts' && $weather["cloudbase3"]>=1999){echo "<div class=cloudconvertercircle2000>Cloudbase<tyellow> ".$weather["cloudbase3"]."</tyellow><smalltempunit2> ft</tblue><smalltempunit2>" ;}
else if ($windunit =='mph' ||  $windunit =='kts' && $weather["cloudbase3"]<1999){echo "<div class=cloudconvertercircle>Cloudbase<tblue> ".$weather["cloudbase3"]."</tblue><smalltempunit2> ft</tblue><smalltempunit2>" ;}
else if ($windunit =='km/h' ||  $windunit =='m/s' && $weather["cloudbase3"]>=609){echo "<div class=cloudconvertercircle2000>Cloudbase<tyellow> ".$weather["cloudbase3"]."</tyellow><smalltempunit2> m</tblue><smalltempunit2>" ;}
else if ($windunit =='km/h' ||  $windunit =='m/s' && $weather["cloudbase3"]<609){echo "<div class=cloudconvertercircle>Cloudbase<tblue> ".$weather["cloudbase3"]."</tblue><smalltempunit2> m</tblue><smalltempunit2>" ;}
 ?></div></div>
<div class="darkskyiconcurrent"><span1>
<?php 
//homeweatherstation weather34 current conditions using hardware values
//rain-weather34
if($weather["rain_rate"]>0 && $weather["wind_speed_avg"]>15){echo "<img rel='prefetch' src='css/icons/windyrain.svg' width='60px' height='55px' alt='weather34 windy rain icon'>";}
else if($weather["rain_rate"]>10){echo "<img rel='prefetch' src='css/icons/rain.svg' width='70px' height='60px' alt='weather34 heavy rain icon'>";}
else if($weather["rain_rate"]>0){echo "<img rel='prefetch' src='css/icons/rain.svg' width='70px' height='60px' alt='weather34 rain icon'>";}
else if($weather["rain_rate2"]>10){echo "<img rel='prefetch' src='css/icons/rain.svg' width='70px' height='60px' alt='weather34 heavy rain icon'>";}
else if($weather["rain_rate2"]>0){echo "<img rel='prefetch' src='css/icons/rain.svg' width='70px' height='60px' alt='weather34 rain icon'>";}
//fog-weather34
else if($weather["temp"] -$weather["dewpoint"] <0.8  && $now >$suns2 && $weather["temp"]>5){echo "<img rel='prefetch' src='css/icons/nt_fog.svg' width='70px' height='60px' alt='weather34 fog icon'>";}
else if($weather["temp"] -$weather["dewpoint"] <0.8  && $now <$sunr2 && $weather["temp"]>5){echo "<img rel='prefetch' src='css/icons/nt_fog.svg' width='70px' height='60px' alt='weather34 fog icon'>";}
else if($weather["temp"] -$weather["dewpoint"] <0.8  && $weather["temp"]>5){echo "<img rel='prefetch' src='css/icons/fog.svg' width='70px' height='60px' alt='weather34 fog'>";}
//windy moderate-weather34
else if($weather["wind_speed_avg"]>=15 && $now >$suns2 && $sky_icon=='clear' ){echo "<img rel='prefetch' src='css/icons/nt_windyclear.svg' width='70px' height='60px' alt='weather34 windy icon'>";}
else if($weather["wind_speed_avg"]>=15 && $now <$sunr2 && $sky_icon=='clear'){echo "<img rel='prefetch' src='css/icons/nt_windyclear.svg' width='70px' height='60px' alt='weather34 windy icon'>";}
else if($weather["wind_speed_avg"]>=15 && $sky_icon=='clear'){echo "<img rel='prefetch' src='css/icons/windyclear.svg' width='70px' height='60px' alt='weather34 windy icon'>";}
//windy moderate-weather34
else if($weather["wind_speed_avg"]>=15 && $now >$suns2){echo "<img rel='prefetch' src='css/icons/nt_windy.svg' width='70px' height='60px' alt='weather34 windy icon'>";}
else if($weather["wind_speed_avg"]>=15 && $now <$sunr2){echo "<img rel='prefetch' src='css/icons/nt_windy.svg' width='70px' height='60px' alt='weather34 windy icon'>";}
else if($weather["wind_speed_avg"]>=15){echo "<img rel='prefetch' src='css/icons/windy.svg' width='70px' height='60px' alt='weather34 windy icon'>";}
//metar with darksky fallback-weather34
else if(filesize('jsondata/me.txt')<160){
echo "<img rel='prefetch' src='css/icons/offline.svg'width='70px' height='60px' alt='weather34 offline icon'>";} 	
else echo "<img rel='prefetch' src='css/icons/".$sky_icon."' width='70px' height='60px'>";
?></div>
<div class="darkskysummary"><span>
<?php echo '';

//rain-weather34
if($weather["rain_rate"]>0 && $weather["wind_speed_avg"]>15){echo "Rain Showers"; echo '<br>';echo "Windy Conditions";}
else if($weather["rain_rate"]>=20){echo "Heavy Rain"; echo '<br>';echo "Flooding Possible";}
else if($weather["rain_rate"]>=10){echo "Heavy Rain"; echo '<br>Showers';}
else if($weather["rain_rate"]>=5){echo "Moderate Rain"; echo '<br>Showers';}
else if($weather["rain_rate"]>=1){echo "Steady Rain";echo '<br>Showers';}
else if($weather["rain_rate"]>0){echo "Light Rain";echo '<br>Showers';}
//fog-weather34
else if($weather["temp"] -$weather["dewpoint"] <0.5  && $now >$suns2 && $weather["temp"]>5){echo "Misty Fog<br>Conditions ".$alert."";}
else if($weather["temp"] -$weather["dewpoint"] <0.5  && $now <$sunr2 && $weather["temp"]>5) {echo "Misty Fog<br>Conditions ".$alert."";}
else if($weather["temp"] -$weather["dewpoint"] <0.5  && $weather["temp"]>5){echo "Misty Fog<br>Conditions ".$alert."";}
//misty-weather34
else if($weather["temp"] -$weather["dewpoint"] <0.8  && $now >$suns2 && $weather["temp"]>5){echo "Fog Hazy<br>Conditions";}
else if($weather["temp"] -$weather["dewpoint"] <0.8  && $now <$sunr2 && $weather["temp"]>5) {echo " Misty Hazy<br>Conditions";}
else if($weather["temp"] -$weather["dewpoint"] <0.8  && $weather["temp"]>5){echo "Misty Hazy<br>Conditions";}
//windy-weather34
else if($weather["wind_speed_avg"]>=40){echo "Strong Wind ".$alert."<br>Conditions" ;}
else if($weather["wind_speed_avg"]>=30){echo "Very Windy ".$alert."<br>Conditions";}
else if($weather["wind_speed_avg"]>=22){echo "Moderate Wind <br>Conditions";}
else if($weather["wind_speed_avg"]>=15){echo "Breezy <br>Conditions";}
else if(filesize('jsondata/me.txt')<160){echo "<uppercase>Conditions<br>Not Available</uppercase>";} 
//metar conditions-weather34
else echo '<uppercase>',$sky_desc.'</uppercase><br>'; 
?>
</span></div>
 <!-- weather34 WeeWX generated Data--> 
<div class="darkskynexthours">
<?php //weather34 average station data 
echo "Average <oorange>Temperature</oorange> last 60 minutes ";if($weather["temp_avg"]>=20){echo "<oorange>" .$weather["temp_avg"]."</oorange>°<valuetext>".$tempunit;} else if($weather["temp_avg"]<=10){echo "<oblue>" .$weather["temp_avg"]."</oblue>°<valuetext>".$tempunit;}else if($weather["temp_avg"]<20){echo "<ogreen>" .$weather["temp_avg"]."</ogreen>°<valuetext>".$tempunit;}echo "</valuetext><br>";
echo  "Max <oblue>Wind Speed</oblue> ";
if($weather["wind_speed_max"]>=50){echo "<ored>" .$weather["wind_speed_max"]."</ored> ".$windunit;}
else if($weather["wind_speed_max"]>=30){echo "<oorange>" .$weather["wind_speed_max"]."</oorange><valuetext> ".$windunit;}
else if($weather["wind_speed_max"]>=0){echo "<ogreen>" .$weather["wind_speed_max"]."</ogreen><valuetext> ".$windunit;}echo " </valuetext>last 10 minutes ";
echo  " <br>Average <oblue>Wind Speed</oblue> last 60 minutes ";if($weather["wind_speed_avg"]>=30){echo "<ored>" .$weather["wind_speed_avg"]."</ored> ".$windunit;}else if($weather["wind_speed_avg"]>=20){echo "<oorange>" .$weather["wind_speed_avg"]."</oorange><valuetext> ".$windunit;}
else if($weather["wind_speed_avg"]>=0){echo "<ogreen>" .$weather["wind_speed_avg"]."</ogreen><valuetext> ".$windunit;}
echo  "</valuetext><br>Average Direction <oorange>";
if($weather["wind_direction_avg"]<=11.25){echo "North";}else if($weather["wind_direction_avg"]<=33.75){echo "NNE";}else if($weather["wind_direction_avg"]<=56.25){echo "NE";}else if($weather["wind_direction_avg"]<=78.75){echo "ENE";}else if($weather["wind_direction_avg"]<=101.25){echo "East";}else if($weather["wind_direction_avg"]<=123.75){echo "ESE";}else if($weather["wind_direction_avg"]<=146.25){echo "SE";}
else if($weather["wind_direction_avg"]<=168.75){echo "SSE";}else if($weather["wind_direction_avg"]<=191.25){echo "South";}else if($weather["wind_direction_avg"]<=213.75){echo "SSW";}else if($weather["wind_direction_avg"]<=236.25){echo "SW";}else if($weather["wind_direction_avg"]<=258.75){echo "WSW";}else if($weather["wind_direction_avg"]<=281.25){echo "West";}else if($weather["wind_direction_avg"]<=303.75){echo "WNW";}else if($weather["wind_direction_avg"]<=326.25){echo "NW";}else if($weather["wind_direction_avg"]<=348.75){echo "NNW";}else{echo "North";}
echo " </oorange><oblue> ".$weather["wind_direction_avg"]."</oblue>°";
echo "</oorange><br><oblue>Rainfall</oblue> for the last hour <oblue> " .$weather["rain_lasthour"]."</oblue><valuetext> " .$rainunit;
?></valuetext></div></div></div>
