<!DOCTYPE html>
<title>weather34 current conditions</title>
<style>
uppercase{ text-transform:capitalize;}
</style>
<?php
include('settings1.php');
include('w34CombinedData.php');
$iconset = "icon2";
$cloud_region = explode("/", $TZ);
error_reporting(0);

$json_visibility             = file_get_contents("jsondata/awc.txt");
$parsed_visibility            = json_decode($json_visibility, true);

if ($windunit =='mph'){
$visibility              = round($parsed_visibility['response'][0]['periods'][0]['visibilityMI'],0,PHP_ROUND_HALF_UP)."mi";
}
else
{
$visibility              = round($parsed_visibility['response'][0]['periods'][0]['visibilityKM'],0,PHP_ROUND_HALF_UP)."km";
}
if ($cloud_region[0] !== "Europe"){$weather["cloud_cover"]  = $parsed_visibility['response'][0]['periods'][0]['sky'];}
?>
<div class="updatedtimecurrent">
<?php $forecastime=filemtime('jsondata/awc.txt');$weather34wuurl = file_get_contents("jsondata/awc.txt");if(filesize('jsondata/awc.txt')<10){echo  $online;}
else echo $online,"";echo " ",	date($timeFormat,$forecastime);	?></div>
<div class="cloudconverter">
<?php //cloudbase-weather34
$cloudcoverunit = '%';
$clouds = "Cloudbase";
if ($windunit =='mph' ||  $windunit =='kts'){$distance="ft";}
else if ($windunit =='km/h' ||  $windunit =='m/s'){$distance="m";}
if ($weather["cloudbase3"]>0){
if ($windunit =='mph' ||  $windunit =='kts' && $weather["cloudbase3"]>=1999){echo "<div class=cloudconvertercircle2000>".$clouds."<tyellow> ".$weather["cloudbase3"]."</tyellow><smalltempunit2> ".$distance."</tblue><smalltempunit2>" ;}
else if ($windunit =='mph' ||  $windunit =='kts' && $weather["cloudbase3"]<1999){echo "<div class=cloudconvertercircle>".$clouds."<tblue> ".$weather["cloudbase3"]."</tblue><smalltempunit2> ".$distance."</tblue><smalltempunit2>" ;}
else if ($windunit =='km/h' ||  $windunit =='m/s' && $weather["cloudbase3"]>=609){echo "<div class=cloudconvertercircle2000>".$clouds."<tyellow> ".$weather["cloudbase3"]."</tyellow><smalltempunit2> ".$distance."</tblue><smalltempunit2>" ;}
else if ($windunit =='km/h' ||  $windunit =='m/s' && $weather["cloudbase3"]<609){echo "<div class=cloudconvertercircle>".$clouds."<tblue> ".$weather["cloudbase3"]."</tblue><smalltempunit2> ".$distance."</tblue><smalltempunit2>" ;}
}?></div></div>
<div class="darkskyiconcurrent"><span1>
<?php 
//homeweatherstation weather34 current conditions using hardware values
if ($windunit=='kts'){$windunit="kn";}       
//rain-weather34
if($weather["rain_rate"]>0 && $weather["wind_speed_avg"]>15){echo "<img rel='prefetch' src='css/svg/umbrella-wind.svg' width='60px' height='55px' alt='weather34 windy rain icon'>";}
else if($weather["rain_rate"]>10){echo "<img rel='prefetch' src='css/svg/umbrella-wind-alt.svg' width='70px' height='60px' alt='weather34 heavy rain icon'>";}
else if($weather["rain_rate"]>0){echo "<img rel='prefetch' src='css/svg/rain.svg' width='70px' height='60px' alt='weather34 rain icon'>";}
//fog-weather34
else if($weather["temp"] -$weather["dewpoint"] <0.8  && $dayPartNatural == "night" && $weather["temp"]>5){echo "<img rel='prefetch' src='css/svg/fog-night.svg' width='70px' height='60px' alt='weather34 fog icon'>";}
else if($weather["temp"] -$weather["dewpoint"] <0.8  && $weather["temp"]>5){echo "<img rel='prefetch' src='css/svg/fog-day.svg' width='70px' height='60px' alt='weather34 fog'>";}
//windy moderate-weather34
else if($weather["wind_speed_avg"]>=15 && $dayPartNatural == "night" && $weather["cloud_cover"]<20){echo "<img rel='prefetch' src='css/svg/wind.svg' width='70px' height='60px' alt='weather34 windy icon'>";}
else if($weather["wind_speed_avg"]>=15 && $weather["cloud_cover"]<20){echo "<img rel='prefetch' src='css/svg/wind.svg' width='70px' height='60px' alt='weather34 windy icon'>";}
//windy moderate-weather34
else if($weather["wind_speed_avg"]>=15 && $dayPartNatural == "night"){echo "<img rel='prefetch' src='css/svg/wind.svg' width='70px' height='60px' alt='weather34 windy icon'>";}
else if($weather["wind_speed_avg"]>=15){echo "<img rel='prefetch' src='css/svg/wind.svg' width='70px' height='60px' alt='weather34 windy icon'>";}

//cloud-icon
else if ($weather["cloud_cover"]<7 and $weather["cloud_cover"]>0) {
if ($dayPartNatural == "night" ){echo "<img rel='prefetch' src='css/svg/clear-night.svg' width='70px' height='60px' alt='weather34 windy icon'>";} 
else echo "<img rel='prefetch' src='css/svg/clear-day.svg' width='70px' height='60px' alt='weather34 windy icon'>"; 
} 
else if ($weather["cloud_cover"]<32) {
if ($dayPartNatural == "night" ){echo "<img rel='prefetch' src='css/svg/mostly-clear-night.svg' width='70px' height='60px' alt='weather34 windy icon'>";} 
else echo "<img rel='prefetch' src='css/svg/mostly-clear-day.svg' width='70px' height='60px' alt='weather34 windy icon'>"; 
}
else if ($weather["cloud_cover"]<70) {
if ($dayPartNatural == "night" ){echo "<img rel='prefetch' src='css/svg/partly-cloudy-night.svg' width='70px' height='60px' alt='weather34 windy icon'>";} 
else echo "<img rel='prefetch' src='css/svg/partly-cloudy-day.svg' width='70px' height='60px' alt='weather34 windy icon'>"; 
}
else if ($weather["cloud_cover"]<95) {
if ($dayPartNatural == "night" ){echo "<img rel='prefetch' src='css/svg/overcast-night.svg' width='70px' height='60px' alt='weather34 windy icon'>";} 
else echo "<img rel='prefetch' src='css/svg/overcast-day.svg' width='70px' height='60px' alt='weather34 windy icon'>"; 
}
else if($weather["cloud_cover"]>=95) {
if ($dayPartNatural == "night" ){echo "<img rel='prefetch' src='css/svg/overcast.svg' width='70px' height='60px' alt='weather34 windy icon'>";} 
else echo "<img rel='prefetch' src='css/svg/overcast.svg' width='70px' height='60px' alt='weather34 windy icon'>"; 
}

//metar with darksky fallback-weather34
else if(filesize('jsondata/me.txt')<160){
echo "<img rel='prefetch' src='css/icons/offline.svg'width='70px' height='60px' alt='weather34 offline icon'>";} 	
else echo "<img rel='prefetch' src='css/svg/".$sky_icon."' width='70px' height='60px'>";
?></div>
<div class="darkskysummary"><span>
<?php echo '';
if ($windunit=='kts'){$windunit="kn";}
//rain-weather34
if($weather["rain_rate"]>0 && $weather["wind_speed_avg"]>15){echo "Rain Showers"; echo '<br>';echo "Windy Conditions";}
else if($weather["rain_rate"]>=20){echo "Heavy Rain"; echo '<br>';echo "Flooding Possible";}
else if($weather["rain_rate"]>=10){echo "Heavy Rain"; echo '<br>Showers';}
else if($weather["rain_rate"]>=5){echo "Moderate Rain"; echo '<br>Showers';}
else if($weather["rain_rate"]>=1){echo "Steady Rain";echo '<br>Showers';}
else if($weather["rain_rate"]>0){echo "Light Rain";echo '<br>Showers';}
//fog-weather34
else if($weather["temp"] -$weather["dewpoint"] <0.5  && $dayPartNatural == "night" && $weather["temp"]>5){echo "Misty Fog<br>Conditions ".$alert."";}
else if($weather["temp"] -$weather["dewpoint"] <0.5  && $weather["temp"]>5){echo "Misty Fog<br>Conditions ".$alert."";}
//misty-weather34
else if($weather["temp"] -$weather["dewpoint"] <0.8  && $dayPartNatural == "night" && $weather["temp"]>5){echo "Fog Hazy<br>Conditions";}
else if($weather["temp"] -$weather["dewpoint"] <0.8  && $weather["temp"]>5){echo "Misty Hazy<br>Conditions";}
//windy-weather34
else if($weather["wind_speed_avg"]>=40){echo "Strong Wind ".$alert."<br>Conditions" ;}
else if($weather["wind_speed_avg"]>=30){echo "Very Windy ".$alert."<br>Conditions";}
else if($weather["wind_speed_avg"]>=22){echo "Moderate Wind <br>Conditions";}
else if($weather["wind_speed_avg"]>=15){echo "Breezy <br>Conditions";}
//cloud-description
else if($weather["cloud_cover"]<7 and $weather["cloud_cover"]>0) {echo "Clear <br>Conditions";}
else if ($weather["cloud_cover"]<7 and $weather["cloud_cover"]>0) {
if ($dayPartNatural == "night" ){echo "Clear <br>Conditions";} 
else echo "Sunny <br>Conditions"; 
} 
else if ($weather["cloud_cover"]<32) {
if ($dayPartNatural == "night" ){echo "Mostly Clear <br>Conditions";} 
else echo "Mostly Sunny <br>Conditions"; 
}
else if($weather["cloud_cover"]<70) {echo "Partly Cloudy <br>Conditions";}
else if($weather["cloud_cover"]<95) {echo "Mostly Cloudy <br>Conditions";}
else if($weather["cloud_cover"]>=95) {echo "Overcast <br>Conditions";}
else if(filesize('jsondata/me.txt')<160){echo "<uppercase>Conditions<br>Not Available</uppercase>";}
//oktas
if($weather["cloud_cover"]<5 and $weather["cloud_cover"]>0) {$weather["cloud_oktas"]="0 oktas";}
else if($weather["cloud_cover"]<=12.5) {$weather["cloud_oktas"]="1 okta";}
else if($weather["cloud_cover"]<=25) {$weather["cloud_oktas"]="2 oktas";}
else if($weather["cloud_cover"]<=37.5) {$weather["cloud_oktas"]="3 oktas";}
else if($weather["cloud_cover"]<=50) {$weather["cloud_oktas"]="4 oktas";}
else if($weather["cloud_cover"]<=62.5) {$weather["cloud_oktas"]="5 oktas";}
else if($weather["cloud_cover"]<=75) {$weather["cloud_oktas"]="6 oktas";}
else if($weather["cloud_cover"]<=87.5) {$weather["cloud_oktas"]="7 oktas";}
else if($weather["cloud_cover"]<=100) {$weather["cloud_oktas"]="8 oktas";}
//metar conditions-weather34

?>
</span></div>
 <!-- weather34 generated Data--> 
<div class="darkskynexthours" style="margin: 60px auto auto">
<?php //weather34 average station data
//echo "Average <oblue>Cloud Cover</oblue> last 5 minutes <ogreen>" .$weather["cloud_cover"]."</ogreen><valuetext>".$cloudcoverunit. "(".$weather["cloud_oktas"].")";

if ($visibility!==0){echo "</br>Visibility <oorange>".$visibility."</oorange></br>";}
if (strpos($weather["cloud_cover"],"N/A") == false){
echo "<oblue>Cloud Cover</oblue><ogreen> " .$weather["cloud_cover"]."</ogreen><valuetext>".$cloudcoverunit. " (".$weather["cloud_oktas"].")";
}


echo "<br>Average <oorange>Temperature</oorange> last 60 minutes ";if($weather["temp_avg"]>=20){echo "<oorange>" .$weather["temp_avg"]."</oorange>°<valuetext>".$tempunit;} else if($weather["temp_avg"]<=10){echo "<oblue>" .$weather["temp_avg"]."</oblue>°<valuetext>".$tempunit;}else if($weather["temp_avg"]<20){echo "<ogreen>" .$weather["temp_avg"]."</ogreen>°<valuetext>".$tempunit;}echo "</valuetext><br>";
echo  "Max <oblue>Wind Gust</oblue> ";
if ($windunit=='kts'){$windunit="kn";}
if($weather["wind_gust_60min"]>=50){echo "<ored>" ,number_format(round($weather["wind_gust_60min"],1))."</ored> ".$windunit;}
else if($weather["wind_gust_60min"]>=30){echo "<oorange>" ,number_format(round($weather["wind_gust_60min"],1))."</oorange><valuetext> ".$windunit;}
else if($weather["wind_gust_60min"]>=0){echo "<ogreen>" ,number_format(round($weather["wind_gust_60min"],1))."</ogreen><valuetext> ".$windunit;}echo " </valuetext>last 60 minutes ";
echo  " <br>Average <oblue>Wind Speed</oblue> last 10 minutes ";if($weather["wind_speed_avg"]>=30){echo "<ored>" ,number_format(round($weather["wind_speed_avg"]))."</ored> ".$windunit;}else if($weather["wind_speed_avg"]>=20){echo "<oorange>" .$weather["wind_speed_avg"]."</oorange><valuetext> ".$windunit;}
else if($weather["wind_speed_avg"]>=0){echo "<ogreen>" ,number_format(round($weather["wind_speed_avg"]))."</ogreen><valuetext> ".$windunit;}
echo "</valuetext>";
if($weather["wind_direction_avg"]>0){echo "<br>Average Direction <oorange>"; if($weather["wind_direction_avg"]<=11.25){echo "North";}else if($weather["wind_direction_avg"]<=33.75){echo "NNE";}else if($weather["wind_direction_avg"]<=56.25){echo "NE";}else if($weather["wind_direction_avg"]<=78.75){echo "ENE";}else if($weather["wind_direction_avg"]<=101.25){echo "East";}else if($weather["wind_direction_avg"]<=123.75){echo "ESE";}else if($weather["wind_direction_avg"]<=146.25){echo "SE";}
else if($weather["wind_direction_avg"]<=168.75){echo "SSE";}else if($weather["wind_direction_avg"]<=191.25){echo "South";}else if($weather["wind_direction_avg"]<=213.75){echo "SSW";}else if($weather["wind_direction_avg"]<=236.25){echo "SW";}else if($weather["wind_direction_avg"]<=258.75){echo "WSW";}else if($weather["wind_direction_avg"]<=281.25){echo "West";}else if($weather["wind_direction_avg"]<=303.75){echo "WNW";}else if($weather["wind_direction_avg"]<=326.25){echo "NW";}else if($weather["wind_direction_avg"]<=348.75){echo "NNW";}else{echo "North";}
echo " </oorange><oblue> ".$weather["wind_direction_avg"]."</oblue>°";}
echo "</oorange><br><oblue>Rainfall</oblue> for the last 3 hours <oblue> " .$weather["rain_last3hours"]."</oblue><valuetext> " .$rainunit;
?></valuetext></div></div></div>
