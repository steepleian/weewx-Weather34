<!DOCTYPE html>
<title>weather34 current conditions</title>
<style>
uppercase{ text-transform:capitalize;}
</style>
<?php
//###################################################################################################################
//	weewx-Weather34 Template maintained by Ian Millard (Steepleian)                                 				#
//	                                                                                                				#
//  Contains some original legacy code (by agreement) created and developed by Brian Underdown (https://weather34.com)   # 
//  for the (now superseeded) original Weather34 Template which is no longer maintained by its creator              #
//  © weather34.com original CSS/SVG/PHP 2015-2019                                                                  #
// 	                                                                                                				#
//  Contains some original code by Ian Millard and collaborators															#
//  © claydonsweather.org.uk original CSS/SVG/PHP 2020-2021                                                         #
// 	                                                                                                				#
// 	Issues for weewx-Weather34 template should be addressed to https://github.com/steepleian/weewx-Weather34/issues #                                                                                              #
// 	                                                                                                				#
//###################################################################################################################
include('metar34get.php');include('serverdata/archivedata.php');include('serverdata/celestialValues.php');include('settings1.php');
$iconset = "icon1";
$dayPart = $dayPartCivil;
error_reporting(0);
$jsonIcon = 'jsondata/lookupTable.json';
$jsonIcon = file_get_contents($jsonIcon);
$parsed_icon = json_decode($jsonIcon, true);
$json_string             = file_get_contents("jsondata/me.txt");
$parsed_json             = json_decode($json_string, true);
$sky_code                = $parsed_json['data'][0]['clouds'][0]['code'];
if ($windunit =='mph' ||  $windunit =='kts'){$weather["cloudbase3"]   = $parsed_json['data'][0]['clouds'][0]['feet'];}
else if ($windunit =='km/h' ||  $windunit =='m/s'){$weather["cloudbase3"]   = $parsed_json['data'][0]['clouds'][0]['meters'];} 



?>
<div class="updatedtimecurrent">
<?php $forecastime=filemtime('jsondata/me.txt');$weather34wuurl = file_get_contents("jsondata/me.txt");if(filesize('jsondata/me.txt')<10){echo  $online;}
else echo $online,"";echo " ",	date($timeFormat,$forecastime);	?></div>
<div class="cloudconverter">
<?php //cloudbase-weather34
$cloudcoverunit = '%';
$clouds = "Cloudbase";
//$weather["cloud_cover"]=0;
if ($windunit =='mph' ||  $windunit =='kts'){$distance="ft";}
else if ($windunit =='km/h' ||  $windunit =='m/s'){$distance="m";}
if ($sky_code == 'CLR'){$weather["cloudbase3"]="No Cloud Base";$clouds="";$distance="";}
if ($windunit =='mph' ||  $windunit =='kts' && $weather["cloudbase3"]>=1999){echo "<div class=cloudconvertercircle2000>".$clouds."<tyellow> ".$weather["cloudbase3"]."</tyellow><smalltempunit2> ".$distance."</tblue><smalltempunit2>" ;}
else if ($windunit =='mph' ||  $windunit =='kts' && $weather["cloudbase3"]<1999){echo "<div class=cloudconvertercircle>".$clouds."<tblue> ".$weather["cloudbase3"]."</tblue><smalltempunit2> ".$distance."</tblue><smalltempunit2>" ;}
else if ($windunit =='km/h' ||  $windunit =='m/s' && $weather["cloudbase3"]>=609){echo "<div class=cloudconvertercircle2000>".$clouds."<tyellow> ".$weather["cloudbase3"]."</tyellow><smalltempunit2> ".$distance."</tblue><smalltempunit2>" ;}
else if ($windunit =='km/h' ||  $windunit =='m/s' && $weather["cloudbase3"]<609){echo "<div class=cloudconvertercircle>".$clouds."<tblue> ".$weather["cloudbase3"]."</tblue><smalltempunit2> ".$distance."</tblue><smalltempunit2>" ;}
?></div></div>
<div class="darkskyiconcurrent"><span1>
<?php 
//homeweatherstation weather34 current conditions using hardware values
if ($windunit=='kts'){$windunit="kn";}       
//rain-weather34

  if($weather["rain_rate"]>0 && $dayPart==="night" && $weather["wind_speed_avg"]>15){$pngIcon="rainwn.png"; $icon="css/svg/".$parsed_icon[$pngIcon][$iconset]; echo "<img rel='prefetch' src=$icon width='60px' height='55px' alt='weather34 windy rain icon'>";}
else if($weather["rain_rate"]>0 && $dayPart==="day" && $weather["wind_speed_avg"]>15){$pngIcon="rainw.png"; $icon="css/svg/".$parsed_icon[$pngIcon][$iconset]; echo "<img rel='prefetch' src=$icon width='60px' height='55px' alt='weather34 windy rain icon'>";}
else if($weather["rain_rate"]>10){$pngIcon="rainh.png"; $icon="css/svg/".$parsed_icon[$pngIcon][$iconset]; echo "<img rel='prefetch' src=$icon width='60px' height='55px' alt='weather34 heavy rain icon'>";}
else if($weather["rain_rate"]>0){$pngIcon="rainn.png"; $icon="css/svg/".$parsed_icon[$pngIcon][$iconset]; echo "<img rel='prefetch' src=$icon width='60px' height='55px' alt='weather34 rain icon'>";}
//fog-weather34
else if($weather["temp"] -$weather["dewpoint"] <0.8  && $dayPart==="night" && $weather["temp"]>5){$pngIcon="fogn.png"; $icon="css/svg/".$parsed_icon[$pngIcon][$iconset]; echo "<img rel='prefetch' src=$icon width='60px' height='55px' alt='weather34 fog icon'>";}
else if($weather["temp"] -$weather["dewpoint"] <0.8  && $dayPart==="day" && $weather["temp"]>5){$pngIcon="fog.png"; $icon="css/svg/".$parsed_icon[$pngIcon][$iconset]; echo "<img rel='prefetch' src=$icon width='60px' height='55px' alt='weather34 fog icon'>";}

//windy moderate-weather34
else if($weather["wind_speed_avg"]>=15 && $dayPart==="night" && $weather["cloud_cover"]<20){$pngIcon="sunnywn.png"; $icon="css/svg/".$parsed_icon[$pngIcon][$iconset]; echo "<img rel='prefetch' src=$icon width='60px' height='55px' alt='weather34 windy icon'>";}
else if($weather["wind_speed_avg"]>=15 && $dayPart==="day" && $weather["cloud_cover"]<20){$pngIcon="sunnyw.png"; $icon="css/svg/".$parsed_icon[$pngIcon][$iconset]; echo "<img rel='prefetch' src=$icon width='60px' height='55px' alt='weather34 windy icon'>";}

//windy moderate-weather34
else if($weather["wind_speed_avg"]>=15 && $dayPart==="night" ){$pngIcon="wind.png"; $icon="css/svg/".$parsed_icon[$pngIcon][$iconset]; echo "<img rel='prefetch' src=$icon width='60px' height='55px' alt='weather34 windy icon'>";}
else if($weather["wind_speed_avg"]>=15 && $dayPart==="day" ){$pngIcon="wind.png"; $icon="css/svg/".$parsed_icon[$pngIcon][$iconset]; echo "<img rel='prefetch' src=$icon width='60px' height='55px' alt='weather34 windy icon'>";}

//cloud-icon
else if ($weather["cloud_cover"]<5 and $weather["cloud_cover"]>0) {
if ($dayPart==="night" ){$pngIcon="sunnyn.png"; $icon="css/svg/".$parsed_icon[$pngIcon][$iconset]; echo "<img rel='prefetch' src=$icon width='60px' height='55px' alt='weather34 windy icon'>";} 
else if ($dayPart==="day" ){$pngIcon="sunny.png"; $icon="css/svg/".$parsed_icon[$pngIcon][$iconset]; echo "<img rel='prefetch' src=$icon width='60px' height='55px' alt='weather34 windy icon'>";} 
}
else if ($weather["cloud_cover"]<20) {
if ($dayPart==="night"){$pngIcon="fairn.png"; $icon="css/svg/".$parsed_icon[$pngIcon][$iconset]; echo "<img rel='prefetch' src=$icon width='60px' height='55px' alt='weather34 windy icon'>";} 
else if ($dayPart==="day"){$pngIcon="fair.png"; $icon="css/svg/".$parsed_icon[$pngIcon][$iconset]; echo "<img rel='prefetch' src=$icon width='60px' height='55px' alt='weather34 windy icon'>";}

}
else if ($weather["cloud_cover"]<40) {
if ($dayPart==="night"  ){$pngIcon="fairn.png"; $icon="css/svg/".$parsed_icon[$pngIcon][$iconset]; echo "<img rel='prefetch' src=$icon width='60px' height='55px' alt='weather34 windy icon'>";} 
else if ($dayPart==="day" ){$pngIcon="fair.png"; $icon="css/svg/".$parsed_icon[$pngIcon][$iconset]; echo "<img rel='prefetch' src=$icon width='60px' height='55px' alt='weather34 windy icon'>";} 
 
}
else if ($weather["cloud_cover"]<60) {
if ($dayPart==="night"  ){$pngIcon="pcloudyn.png"; $icon="css/svg/".$parsed_icon[$pngIcon][$iconset]; echo "<img rel='prefetch' src=$icon width='60px' height='55px' alt='weather34 windy icon'>";} 
else if ($dayPart==="day"){$pngIcon="pcloudy.png"; $icon="css/svg/".$parsed_icon[$pngIcon][$iconset]; echo "<img rel='prefetch' src=$icon width='60px' height='55px' alt='weather34 windy icon'>";} 
 
}
else if ($weather["cloud_cover"]<80) {
if ($dayPart==="night" ){$pngIcon="mcloudyn.png"; $icon="css/svg/".$parsed_icon[$pngIcon][$iconset]; echo "<img rel='prefetch' src=$icon width='60px' height='55px' alt='weather34 windy icon'>";} 
else if ($dayPart==="day" ){$pngIcon="mcloudy.png"; $icon="css/svg/".$parsed_icon[$pngIcon][$iconset]; echo "<img rel='prefetch' src=$icon width='60px' height='55px' alt='weather34 windy icon'>";} 
 
}
else if($weather["cloud_cover"]>=80) {
if ($dayPart==="night" ){$pngIcon="cloudywn.png"; $icon="css/svg/".$parsed_icon[$pngIcon][$iconset]; echo "<img rel='prefetch' src=$icon width='60px' height='55px' alt='weather34 windy icon'>";} 
else if ($dayPart==="day"){$pngIcon="cloudyw.png"; $icon="css/svg/".$parsed_icon[$pngIcon][$iconset]; echo "<img rel='prefetch' src=$icon width='60px' height='55px' alt='weather34 windy icon'>";} 
else echo "<img rel='prefetch' src='css/svg/04.svg' width='70px' height='60px' alt='weather34 windy icon'>"; 
}

//metar with darksky fallback-weather34
else if(filesize('jsondata/me.txt')<160){
echo "<img rel='prefetch' src='css/svg/offline.svg'width='70px' height='60px' alt='weather34 offline icon'>";} 	

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
//cloud-description
else if($weather["cloud_cover"]<5 and $weather["cloud_cover"]>0) {echo "Clear <br>Conditions";}
else if($weather["cloud_cover"]<20) {echo "Mostly Clear <br>Conditions";}
else if($weather["cloud_cover"]<40) {echo "Scattered <br>Clouds";}
else if($weather["cloud_cover"]<60) {echo "Partly Cloudy <br>Conditions";}
else if($weather["cloud_cover"]<80) {echo "Mostly Cloudy <br>Conditions";}
else if($weather["cloud_cover"]>=80) {echo "Overcast <br>Conditions";}
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
<div class="darkskynexthours">
<?php //weather34 average station data
//echo "Average <oblue>Cloud Cover</oblue> last 5 minutes <ogreen>" .$weather["cloud_cover"]."</ogreen><valuetext>".$cloudcoverunit. "(".$weather["cloud_oktas"].")";

if (strpos($weather["cloud_cover"],"N/A") == false){
echo "<oblue>Cloud Cover</oblue><ogreen> " .$weather["cloud_cover"]."</ogreen><valuetext>".$cloudcoverunit. " (".$weather["cloud_oktas"].")";
}
echo "<br>Average <oorange>Temperature</oorange> last 60min ";if($weather["temp_avg"]>=20){echo "<oorange>" .$weather["temp_avg"]."</oorange>°<valuetext>".$tempunit;} else if($weather["temp_avg"]<=10){echo "<oblue>" .$weather["temp_avg"]."</oblue>°<valuetext>".$tempunit;}else if($weather["temp_avg"]<20){echo "<ogreen>" .$weather["temp_avg"]."</ogreen>°<valuetext>".$tempunit;}echo "</valuetext><br>";
echo  "Max <oblue>Wind Gust</oblue> ";
if ($windunit=='kts'){$windunit="kn";}
//if ($windunit=='kn'){$weather["wind_gust_60min"] = number_format(1.94384*$weather["wind_gust_60min"], 1);}
//else if ($windunit=='km/h'){$weather["wind_gust_60min"] = number_format(3.6*$weather["wind_gust_60min"], 1);}
//else if ($windunit=='mph'){$weather["wind_gust_60min"] = number_format(2.236936*$weather["wind_gust_60min"], 1);}
if($weather["wind_gust_60min"]>=50){echo "<ored>" ,number_format(round($weather["wind_gust_60min"],1))."</ored> ".$windunit;}
else if($weather["wind_gust_60min"]>=30){echo "<oorange>" ,number_format(round($weather["wind_gust_60min"],1))."</oorange><valuetext> ".$windunit;}
else if($weather["wind_gust_60min"]>=0){echo "<ogreen>" ,number_format(round($weather["wind_gust_60min"],1))."</ogreen><valuetext> ".$windunit;}echo " </valuetext>last 60min ";
echo  " <br>Average <oblue>Wind Speed</oblue> last 10min ";if($weather["wind_speed_avg"]>=30){echo "<ored>" ,number_format(round($weather["wind_speed_avg"]))."</ored> ".$windunit;}else if($weather["wind_speed_avg"]>=20){echo "<oorange>" .$weather["wind_speed_avg"]."</oorange><valuetext> ".$windunit;}
else if($weather["wind_speed_avg"]>=0){echo "<ogreen>" ,number_format(round($weather["wind_speed_avg"]))."</ogreen><valuetext> ".$windunit;}
echo "</valuetext>";
if($weather["wind_direction_avg"]>0){echo "<br>Average Direction <oorange>"; if($weather["wind_direction_avg"]<=11.25){echo "North";}else if($weather["wind_direction_avg"]<=33.75){echo "NNE";}else if($weather["wind_direction_avg"]<=56.25){echo "NE";}else if($weather["wind_direction_avg"]<=78.75){echo "ENE";}else if($weather["wind_direction_avg"]<=101.25){echo "East";}else if($weather["wind_direction_avg"]<=123.75){echo "ESE";}else if($weather["wind_direction_avg"]<=146.25){echo "SE";}
else if($weather["wind_direction_avg"]<=168.75){echo "SSE";}else if($weather["wind_direction_avg"]<=191.25){echo "South";}else if($weather["wind_direction_avg"]<=213.75){echo "SSW";}else if($weather["wind_direction_avg"]<=236.25){echo "SW";}else if($weather["wind_direction_avg"]<=258.75){echo "WSW";}else if($weather["wind_direction_avg"]<=281.25){echo "West";}else if($weather["wind_direction_avg"]<=303.75){echo "WNW";}else if($weather["wind_direction_avg"]<=326.25){echo "NW";}else if($weather["wind_direction_avg"]<=348.75){echo "NNW";}else{echo "North";}
echo " </oorange><oblue> ".$weather["wind_direction_avg"]."</oblue>°";}
echo "</oorange><br><oblue>Rainfall</oblue> for the last 3 hours <oblue> " .$weather["rain_last3hours"]."</oblue><valuetext> " .$rainunit;
?></valuetext></div></div></div>
