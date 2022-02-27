<?php
include_once ('settings.php');
include ('w34CombinedData.php');
date_default_timezone_set($TZ);
              #
// 	                                                                                               #
// 	ChangeLog:                                                                                     #
// 		[30-01-21] <Leosirth>																	   #
//			Merged with latest version															   #
//			Fixed alerting																		   #
//			Added Humidity																		   #
//			Added HeatIndex																		   #
//			Fixed Gust	                                                                           #
// 	    [01-04-21] <Steepleian>                                                                    #
//          Adapted for use with Aeris Daily                                                      #
//   https://www.weather34.com 	                                                                   #
//###################################################################################################
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
//start the aw output
?>
<link href="css/forecast.<?php echo $theme; ?>.css?version=<?php echo filemtime('css/forecast.' . $theme . '.css'); ?>" rel="stylesheet prefetch">

<script src="js/jquery.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>UK MetOffice Day Night Forecast</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--<link href="css/popup.light.css?version=<?php echo filemtime('css/popup.light.css'); ?>" rel="stylesheet prefetch">//-->

<body>
<?php 
$forecastime = filemtime ('jsondata/md.txt');?>
<div class="weather34darkbrowser" style="color:<?php echo $text1 ?>;" url="Day and Night Forecast for <?php echo $stationName ?>
                                         <?php echo '&nbsp;';echo "Updated &nbsp;".date( $timeFormatShort, $forecastime);?>"></div>  
 
  
<main class="grid">
  <?php
$forecastime = filemtime('jsondata/md.txt');
$json = 'jsondata/md.txt';
$json = file_get_contents($json);
$parsed_json = json_decode($json, true);
$startDay = date("l", strtotime($parsed_json['features'][0]['properties']['timeSeries'][0]['time']));
$currentDay = date("l");                
if ($startDay === $currentDay){$countStart = "0";}
else if ($startDay !== $currentDay){$countStart = "1";}                
for ($k = $countStart;$k < 7;$k++)
{
     $forecastcodeDay[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['daySignificantWeatherCode'];
     
     $forecastIconDay[$k] = $forecastcodeDay[$k] . ".svg";
    if ($forecastcodeDay[$k] === "NA"){$forecastdescDay[$k] = "Not available";}
    else if ($forecastcodeDay[$k] === 0){$forecastdescDay[$k] = "Clear";}
    else if ($forecastcodeDay[$k] === 1){$forecastdescDay[$k] = "Sunny";}
    else if ($forecastcodeDay[$k] === 2){$forecastdescDay[$k] = "Partly cloudy";}
    else if ($forecastcodeDay[$k] === 3){$forecastdescDay[$k] = "Partly cloudy";}
    else if ($forecastcodeDay[$k] === 5){$forecastdescDay[$k] = "Mist";}
    else if ($forecastcodeDay[$k] === 6){$forecastdescDay[$k] = "Fog";}
    else if ($forecastcodeDay[$k] === 7){$forecastdescDay[$k] = "Cloudy";}
    else if ($forecastcodeDay[$k] === 8){$forecastdescDay[$k] = "Overcast";}
    else if ($forecastcodeDay[$k] === 9){$forecastdescDay[$k] = "Light rain shower";}
    else if ($forecastcodeDay[$k] === 10){$forecastdescDay[$k] = "Light rain shower";}
    else if ($forecastcodeDay[$k] === 11){$forecastdescDay[$k] = "Drizzle";}
    else if ($forecastcodeDay[$k] === 12){$forecastdescDay[$k] = "Light rain";}
    else if ($forecastcodeDay[$k] === 13){$forecastdescDay[$k] = "Heavy rain shower";}
    else if ($forecastcodeDay[$k] === 14){$forecastdescDay[$k] = "Heavy rain shower";}
    else if ($forecastcodeDay[$k] === 15){$forecastdescDay[$k] = "Heavy rain";}
    else if ($forecastcodeDay[$k] === 16){$forecastdescDay[$k] = "Sleet shower";}
    else if ($forecastcodeDay[$k] === 17){$forecastdescDay[$k] = "Sleet shower";}
    else if ($forecastcodeDay[$k] === 18){$forecastdescDay[$k] = "Sleet";}
    else if ($forecastcodeDay[$k] === 19){$forecastdescDay[$k] = "Hail shower";}
    else if ($forecastcodeDay[$k] === 20){$forecastdescDay[$k] = "Hail shower";}
    else if ($forecastcodeDay[$k] === 21){$forecastdescDay[$k] = "Hail";}
    else if ($forecastcodeDay[$k] === 22){$forecastdescDay[$k] = "Light snow shower";}
    else if ($forecastcodeDay[$k] === 23){$forecastdescDay[$k] = "Light snow shower";}
    else if ($forecastcodeDay[$k] === 24){$forecastdescDay[$k] = "Light snow";}
    else if ($forecastcodeDay[$k] === 25){$forecastdescDay[$k] = "Heavy snow shower";}
    else if ($forecastcodeDay[$k] === 26){$forecastdescDay[$k] = "Heavy snow shower";}
    else if ($forecastcodeDay[$k] === 27){$forecastdescDay[$k] = "Heavy snow";}
    else if ($forecastcodeDay[$k] === 28){$forecastdescDay[$k] = "Thunder shower";}
    else if ($forecastcodeDay[$k] === 29){$forecastdescDay[$k] = "Thunder shower";}
    else if ($forecastcodeDay[$k] === 30){$forecastdescDay[$k] = "Thunder";}
  
    $forecastcodeNight[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['nightSignificantWeatherCode'];
  	$forecastTimeDay[$k] = $forecastTimeDay[$k]."&nbsp;&nbsp;   Maximum";  
  	$forecastTimeNight[$k] = $forecastTimeNight[$k]." Night&nbsp;&nbsp;   Minimum";
    $forecastIconNight[$k] = $forecastcodeNight[$k] . ".svg";
    if ($forecastcodeNight[$k] === "NA"){$forecastdescNight[$k] = "Not available";}
    else if ($forecastcodeNight[$k] === 0){$forecastdescNight[$k] = "Clear";}
    else if ($forecastcodeNight[$k] === 1){$forecastdescNight[$k] = "Sunny";}
    else if ($forecastcodeNight[$k] === 2){$forecastdescNight[$k] = "Partly cloudy";}
    else if ($forecastcodeNight[$k] === 3){$forecastdescNight[$k] = "Partly cloudy";}
    else if ($forecastcodeNight[$k] === 5){$forecastdescNight[$k] = "Mist";}
    else if ($forecastcodeNight[$k] === 6){$forecastdescNight[$k] = "Fog";}
    else if ($forecastcodeNight[$k] === 7){$forecastdescNight[$k] = "Cloudy";}
    else if ($forecastcodeNight[$k] === 8){$forecastdescNight[$k] = "Overcast";}
    else if ($forecastcodeNight[$k] === 9){$forecastdescNight[$k] = "Light rain shower";}
    else if ($forecastcodeNight[$k] === 10){$forecastdescNight[$k] = "Light rain shower";}
    else if ($forecastcodeNight[$k] === 11){$forecastdescNight[$k] = "Drizzle";}
    else if ($forecastcodeNight[$k] === 12){$forecastdescNight[$k] = "Light rain";}
    else if ($forecastcodeNight[$k] === 13){$forecastdescNight[$k] = "Heavy rain shower";}
    else if ($forecastcodeNight[$k] === 14){$forecastdescNight[$k] = "Heavy rain shower";}
    else if ($forecastcodeNight[$k] === 15){$forecastdescNight[$k] = "Heavy rain";}
    else if ($forecastcodeNight[$k] === 16){$forecastdescNight[$k] = "Sleet shower";}
    else if ($forecastcodeNight[$k] === 17){$forecastdescNight[$k] = "Sleet shower";}
    else if ($forecastcodeNight[$k] === 18){$forecastdescNight[$k] = "Sleet";}
    else if ($forecastcodeNight[$k] === 19){$forecastdescNight[$k] = "Hail shower";}
    else if ($forecastcodeNight[$k] === 20){$forecastdescNight[$k] = "Hail shower";}
    else if ($forecastcodeNight[$k] === 21){$forecastdescNight[$k] = "Hail";}
    else if ($forecastcodeNight[$k] === 22){$forecastdescNight[$k] = "Light snow shower";}
    else if ($forecastcodeNight[$k] === 23){$forecastdescNight[$k] = "Light snow shower";}
    else if ($forecastcodeNight[$k] === 24){$forecastdescNight[$k] = "Light snow";}
    else if ($forecastcodeNight[$k] === 25){$forecastdescNight[$k] = "Heavy snow shower";}
    else if ($forecastcodeNight[$k] === 26){$forecastdescNight[$k] = "Heavy snow shower";}
    else if ($forecastcodeNight[$k] === 27){$forecastdescNight[$k] = "Heavy snow";}
    else if ($forecastcodeNight[$k] === 28){$forecastdescNight[$k] = "Thunder shower";}
    else if ($forecastcodeNight[$k] === 29){$forecastdescNight[$k] = "Thunder shower";}
    else if ($forecastcodeNight[$k] === 30){$forecastdescNight[$k] = "Thunder";}

    $forecastTimeDay[$k] = date("l", strtotime($parsed_json['features'][0]['properties']['timeSeries'][$k]['time']));
    $forecastTimeNight[$k] = date("l", strtotime($parsed_json['features'][0]['properties']['timeSeries'][$k]['time']));
    $forecastTimeDay[$k] = $forecastTimeDay[$k]." &nbsp;&nbsp;   Maximum";
  	$forecastTimeNight[$k] = $forecastTimeNight[$k]." Night&nbsp;&nbsp;   Minimum";
    $forecastTempHigh[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['dayMaxScreenTemperature'];
    $forecastTempLow[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['nightMinScreenTemperature'];
	$forecastWindSpeedDay[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['midday10MWindSpeed'];
    $forecastWindGustDay[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['midday10MWindGust'];
    $forecastWindDirDay[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['midday10MWindDirection'];

    
    if ($forecastWindDirDay[$k] >= 0 && $forecastWindDirDay[$k] < 11.25){$forecastWindDirDay[$k] = "N";}
    else if ($forecastWindDirDay[$k] >= 11.25 && $forecastWindDirDay[$k] < 33.75){$forecastWindDirDay[$k] = "NNE";}
    else if ($forecastWindDirDay[$k] >= 33.75 && $forecastWindDirDay[$k] < 56.25){$forecastWindDirDay[$k] = "NE";}
    else if ($forecastWindDirDay[$k] >= 56.25 && $forecastWindDirDay[$k] < 78.75){$forecastWindDirDay[$k] = "ENE";}
    else if ($forecastWindDirDay[$k] >= 78.75 && $forecastWindDirDay[$k] < 101.25){$forecastWindDirDay[$k] = "E";}
    else if ($forecastWindDirDay[$k] >= 101.25 && $forecastWindDirDay[$k] < 123.75){$forecastWindDirDay[$k] = "ESE";}
    else if ($forecastWindDirDay[$k] >= 123.75 && $forecastWindDirDay[$k] < 146.25){$forecastWindDirDay[$k] = "SE";}
    else if ($forecastWindDirDay[$k] >= 146.25 && $forecastWindDirDay[$k] < 168.75){$forecastWindDirDay[$k] = "SSE";}
    else if ($forecastWindDirDay[$k] >= 168.75 && $forecastWindDirDay[$k] < 191.25){$forecastWindDirDay[$k] = "S";}
    else if ($forecastWindDirDay[$k] >= 191.25 && $forecastWindDirDay[$k] < 213.75){$forecastWindDirDay[$k] = "SSW";}
    else if ($forecastWindDirDay[$k] >= 213.75 && $forecastWindDirDay[$k] < 236.25){$forecastWindDirDay[$k] = "SW";}
    else if ($forecastWindDirDay[$k] >= 236.25 && $forecastWindDirDay[$k] < 258.75){$forecastWindDirDay[$k] = "WSW";}
    else if ($forecastWindDirDay[$k] >= 258.75 && $forecastWindDirDay[$k] < 281.25){$forecastWindDirDay[$k] = "W";}
    else if ($forecastWindDirDay[$k] >= 281.25 && $forecastWindDirDay[$k] < 303.75){$forecastWindDirDay[$k] = "WNW";}
    else if ($forecastWindDirDay[$k] >= 303.75 && $forecastWindDirDay[$k] < 326.25){$forecastWindDirDay[$k] = "NW";}
    else if ($forecastWindDirDay[$k] >= 326.25 && $forecastWindDirDay[$k] < 348.75){$forecastWindDirDay[$k] = "NNW";}
    else if ($forecastWindDirDay[$k] >= 348.75 && $forecastWindDirDay[$k] <= 360){$forecastWindDirDay[$k] = "N";}
    
    $forecastWindSpeedNight[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['midnight10MWindSpeed'];
    $forecastWindGustNight[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['midnight10MWindGust'];
    $forecastWindDirNight[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['midnight10MWindDirection'];

    
    if ($forecastWindDirNight[$k] >= 0 && $forecastWindDirNight[$k] < 11.25){$forecastWindDirNight[$k] = "N";}
    else if ($forecastWindDirNight[$k] >= 11.25 && $forecastWindDirNight[$k] < 33.75){$forecastWindDirNight[$k] = "NNE";}
    else if ($forecastWindDirNight[$k] >= 33.75 && $forecastWindDirNight[$k] < 56.25){$forecastWindDirNight[$k] = "NE";}
    else if ($forecastWindDirNight[$k] >= 56.25 && $forecastWindDirNight[$k] < 78.75){$forecastWindDirNight[$k] = "ENE";}
    else if ($forecastWindDirNight[$k] >= 78.75 && $forecastWindDirNight[$k] < 101.25){$forecastWindDirNight[$k] = "E";}
    else if ($forecastWindDirNight[$k] >= 101.25 && $forecastWindDirNight[$k] < 123.75){$forecastWindDirNight[$k] = "ESE";}
    else if ($forecastWindDirNight[$k] >= 123.75 && $forecastWindDirNight[$k] < 146.25){$forecastWindDirNight[$k] = "SE";}
    else if ($forecastWindDirNight[$k] >= 146.25 && $forecastWindDirNight[$k] < 168.75){$forecastWindDirNight[$k] = "SSE";}
    else if ($forecastWindDirNight[$k] >= 168.75 && $forecastWindDirNight[$k] < 191.25){$forecastWindDirNight[$k] = "S";}
    else if ($forecastWindDirNight[$k] >= 191.25 && $forecastWindDirNight[$k] < 213.75){$forecastWindDirNight[$k] = "SSW";}
    else if ($forecastWindDirNight[$k] >= 213.75 && $forecastWindDirNight[$k] < 236.25){$forecastWindDirNight[$k] = "SW";}
    else if ($forecastWindDirNight[$k] >= 236.25 && $forecastWindDirNight[$k] < 258.75){$forecastWindDirNight[$k] = "WSW";}
    else if ($forecastWindDirNight[$k] >= 258.75 && $forecastWindDirNight[$k] < 281.25){$forecastWindDirNight[$k] = "W";}
    else if ($forecastWindDirNight[$k] >= 281.25 && $forecastWindDirNight[$k] < 303.75){$forecastWindDirNight[$k] = "WNW";}
    else if ($forecastWindDirNight[$k] >= 303.75 && $forecastWindDirNight[$k] < 326.25){$forecastWindDirNight[$k] = "NW";}
    else if ($forecastWindDirNight[$k] >= 326.25 && $forecastWindDirNight[$k] < 348.75){$forecastWindDirNight[$k] = "NNW";}
    else if ($forecastWindDirNight[$k] >= 348.75 && $forecastWindDirNight[$k] <= 360){$forecastWindDirNight[$k] = "N";}

    $forecastTempHigh[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['dayMaxScreenTemperature'];
    $forecastTempLow[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['nightMinScreenTemperature'];
    $forecastPrecipProbDay[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['dayProbabilityOfPrecipitation'];
    $forecastPrecipProbNight[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['nightProbabilityOfPrecipitation'];
    $forecastUV[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['maxUvIndex'];
    $humidityDay[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['middayRelativeHumidity'];
    $humidityNight[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['midnightRelativeHumidity'];
    $forecasthumidityDay[$k] = round($humidityDay[$k],0,PHP_ROUND_HALF_UP);
  	$forecasthumidityNight[$k] = round($humidityNight[$k],0,PHP_ROUND_HALF_UP);
    
    if ($countStart === "0"){$forecastTimeDay[0] = "Today&nbsp;&nbsp;Maximum"; $forecastTimeNight[0] = "Tonight&nbsp;&nbsp;Minimum";$forecastTimeDay[1] = "Tomorrow&nbsp;&nbsp;Maximum";$forecastTimeNight[1] = "Tomorrow Night&nbsp;&nbsp;Minimum";}
    else if ($countStart === "1"){$forecastTimeDay[1] = "Today&nbsp;&nbsp;Maximum"; $forecastTimeNight[1] = "Tonight&nbsp;&nbsp;Minimum";$forecastTimeDay[2] = "Tomorrow&nbsp;&nbsp;Maximum";$forecastTimeNight[2] = "Tomorrow Night&nbsp;&nbsp;Minimum";}    
    
    //aw convert temps-rain
    //metric to F
    if ($tempunit == 'F')
    {
        $forecastTempHigh[$k] = round(($forecastTempHigh[$k] * 9 / 5) + 32, 0);
    }

    //heatindex
    if ($tempunit == 'F')
    {
        $wuskyheatindex[$k] = ($wuskyheatindex[$k] * 9 / 5) + 32;
    }

    //rain inches to mm
    if ($rainunit == 'in')
    {
        $forecastprecipIntensity[$k] = $forecastprecipIntensity[$k] * 0.0393701;
    }

    //ms to kmh
    if ($windunit == 'kmh')
    {
        $forecastWindGustDay[$k] = round((number_format($forecastWindGustDay[$k], 1) * 3.6) , 0);
        $forecastWindSpeedDay[$k] = round((number_format($forecastWindSpeedDay[$k], 1) * 3.6) , 0);
    }
    //m/s to mph
    if ($windunit == 'mph')
    {
        $forecastWindGustDay[$k] = round((number_format($forecastWindGustDay[$k], 1) * 2.23694) , 0);
        $forecastWindSpeedDay[$k] = round((number_format($forecastWindSpeedDay[$k], 1) * 2.23694) , 0);
    }

    

?>



  <article>  
   <actualtn>
 <?php //0  detailed forecast day
//temp

if ($tempunit == 'F' && $forecastTempHigh[$k] < 44.6)
{
    echo "<bluet>" . $forecastTimeDay[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[$k] > 80.6)
{
    echo "<redt>" . $forecastTimeDay[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[$k] > 64.4)
{
    echo "<oranget>" . $forecastTimeDay[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[$k] > 55)
{
    echo "<yellowt>" . $forecastTimeDay[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[$k] >= 44.6)
{
    echo "<greent>" . $forecastTimeDay[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($forecastTempHigh[$k] < 7)
{
    echo "<bluet>" . $forecastTimeDay[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($forecastTempHigh[$k] > 27)
{
    echo "<redt>" . $forecastTimeDay[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($forecastTempHigh[$k] > 19)
{
    echo "<oranget>" . $forecastTimeDay[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($forecastTempHigh[$k] > 12.7)
{
    echo "<yellowt>" . $forecastTimeDay[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($forecastTempHigh[$k] >= 7)
{
    echo "<greent>" . $forecastTimeDay[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
echo "°" . $tempunit . "</actualtn>";

//high temp icon

    if ($tempunit == 'F' && $forecastTempHigh[$k] >= 82)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
    else if ($tempunit == 'C' && $forecastTempHigh[$k] >= 28)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }


    if ($tempunit == 'F' && $forecastTempLow[$k] >= 71)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
    if ($tempunit == 'C' && $forecastTempLow[$k] >= 22)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }


//icon
echo "<div class=iconpos> ";


    echo '<img src="css/metofficeicons/' . $forecastIconDay[$k] . '" width="35" class="iconpos"></img></div>';


//summary of icon
echo '<div class=greydesc>' . $forecastdescDay[$k] . '</div><br>';
// humidity  
echo '<div class=uvforecast><grey>';
    echo "Humidity ";
    if ($forecasthumidityDay[$k] >= 70)
    {
        echo "<blueu>" . $forecasthumidityDay[$k] . '%</blueu>';
    }
    else if ($forecasthumidityDay[$k] > 50)
    {
        echo "<yellowu>" . $forecasthumidityDay[$k] . '%</yellowu>';
    }
    else if ($forecasthumidityDay[$k] > 40)
    {
        echo "<greenu>" . $forecasthumidityDay[$k] . '%</greenu>';
    }
    else if ($forecasthumidityDay[$k] > 0)
    {
        echo "<redu>" . $forecasthumidityDay[$k] . '%</redu>';
    }  
  

//snow
if ($forecastacumm[$k] > 0)
{
    echo '&nbsp;' . $snowflakesvg[$k] . '<valuer>Snow  <bluer>' . $forecastacumm[$k] . 'cm</bluer>';
}
//rain
else if ($forecastPrecipType[$k] = 'rain' && $rainunit == 'in')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Chance of Rain <bluer>' . $forecastPrecipProbDay[$k] . '%</bluer>';
}
//mm
else if ($forecastPrecipType[$k] = 'rain')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Chance of Rain <bluer>' . $forecastPrecipProbDay[$k] . '%</bluer>';
}
echo "</div>";
//wind/gusts
if ($windunit == 'mph' && $forecastWindGustDay[$k] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWindDirDay[$k];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGustDay[$k] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'mph' && $forecastWindGustDay[$k] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWindDirDay[$k];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGustDay[$k] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
//kts
if ($windunit == 'kts' && $forecastWindGustDay[$k] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWindDirDay[$k];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGustDay[$k] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGustDay[$k] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWindDirDay[$k];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGustDay[$k] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGustDay[$k] >= 0)
{
    echo "<wind>Wind <orangeu>";
    echo $forecastWindDirDay[$k];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGustDay[$k] * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}
else if ($forecastWindGustDay[$k] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWindDirDay[$k];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGustDay[$k] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($forecastWindGustDay[$k] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWindDirDay[$k];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGustDay[$k] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($forecastWindGustDay[$k] < 25)
{
    echo "<wind> Wind <orangeu>";
    echo $forecastWindDirDay[$k];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGustDay[$k], 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}
//UVI

if ($forecastUV[$k] > 0)
{
    echo '<grey>' . $sunlight2 . ' UVI ';
}
if ($forecastUV[$k] > 10)
{
    echo "<purpleu>" . $forecastUV[$k] . '</purpleu><grey> ';
}
else if ($forecastUV[$k] > 7)
{
    echo "<redu>" . $forecastUV[$k] . '</redu><grey> ';
}
else if ($forecastUV[$k] > 5)
{
    echo "<orangeu>" . $forecastUV[$k] . '</orangeu><grey> ';
}
else if ($forecastUV[$k] > 2)
{
    echo "<yellowu>" . $forecastUV[$k] . '</yellowu><grey> ';
}
else if ($forecastUV[$k] > 0)
{
    echo "<greenu>" . $forecastUV[$k] . '</greenu><grey> ';
}
?>  
</article>
    
    <article>  
   <actualtn>
 <?php //0  detailed forecast night
//temp

if ($tempunit == 'F' && $forecastTempLow[$k] < 44.6)
{
    echo "<bluet>" . $forecastTimeNight[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempLow[$k], 0);
}
else if ($tempunit == 'F' && $forecastTempLow[$k] > 80.6)
{
    echo "<redt>" . $forecastTimeNight[$k] . "&nbsp;&nbsp;  " . number_format($forecastTempLow[$k], 0);
}
else if ($tempunit == 'F' && $forecastTempLow[$k] > 64.4)
{
    echo "<oranget>" . $forecastTimeNight[$k] . "&nbsp;&nbsp;    " . number_format($forecastTempLow[$k], 0);
}
else if ($tempunit == 'F' && $forecastTempLow[$k] > 55)
{
    echo "<yellowt>" . $forecastTimeNight[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempLow[$k], 0);
}
else if ($tempunit == 'F' && $forecastTempLow[$k] >= 44.6)
{
    echo "<greent>" . $forecastTimeNight[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempLow[$k], 0);
}
else if ($forecastTempLow[$k] < 7)
{
    echo "<bluet>" . $forecastTimeNight[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempLow[$k], 0);
}
else if ($forecastTempLow[$k] > 27)
{
    echo "<redt>" . $forecastTimeNight[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempLow[$k], 0);
}
else if ($forecastTempLow[$k] > 19)
{
    echo "<oranget>" . $forecastTimeNight[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempLow[$k], 0);
}
else if ($forecastTempLow[$k] > 12.7)
{
    echo "<yellowt>" . $forecastTimeNight[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempLow[$k], 0);
}
else if ($forecastTempLow[$k] >= 7)
{
    echo "<greent>" . $forecastTimeNight[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempLow[$k], 0);
}
echo "°" . $tempunit . "</actualtn>";

//high temp icon

    if ($tempunit == 'F' && $forecastTempLow[$k] >= 82)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
    else if ($tempunit == 'C' && $forecastTempLow[$k] >= 28)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }


//icon
echo "<div class=iconpos> ";


    echo '<img src="css/metofficeicons/' . $forecastIconNight[$k] . '" width="35" class="iconpos"></img></div>';


//summary of icon
echo '<div class=greydesc>' . $forecastdescNight[$k] . '</div><br>';

//humidity night

    echo '<div class=uvforecast><grey>';
    echo "Humidity ";
    if ($forecasthumidityNight[$k] >= 70)
    {
        echo "<blueu>" . $forecasthumidityNight[$k] . '%</blueu>';
    }
    else if ($forecasthumidityNight[$k] > 50)
    {
        echo "<yellowu>" . $forecasthumidityNight[$k] . '%</yellowu>';
    }
    else if ($forecasthumidityNight[$k] > 40)
    {
        echo "<greenu>" . $forecasthumidityNight[$k] . '%</greenu>';
    }
    else if ($forecasthumidityNight[$k] > 0)
    {
        echo "<redu>" . $forecasthumidityNight[$k] . '%</redu>';
    }

//snow
if ($forecastacumm[$k] > 0)
{
    echo '&nbsp;' . $snowflakesvg[$k] . '<valuer>Snow  <bluer>' . $forecastacumm[$k] . 'cm</bluer>';
}
//rain
else if ($forecastPrecipType[$k] = 'rain' && $rainunit == 'in')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Chance of Rain <bluer>' . $forecastPrecipProbNight[$k] . '%</bluer>';
}
//mm
else if ($forecastPrecipType[$k] = 'rain')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Chance of Rain <bluer>' . $forecastPrecipProbNight[$k] . '%</bluer>';
}
echo "</div>";
//wind/gusts
if ($windunit == 'mph' && $forecastWindGustNight[$k] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWindDirNight[$k];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGustNight[$k] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'mph' && $forecastWindGustNight[$k] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWindDirNight[$k];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGustNight[$k] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
//kts
if ($windunit == 'kts' && $forecastWindGustNight[$k] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWindDirNight[$k];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGustNight[$k] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGustNight[$k] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWindDirNight[$k];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGustNight[$k] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGustNight[$k] >= 0)
{
    echo "<wind>Wind <orangeu>";
    echo $forecastWindDirNight[$k];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGustNight[$k] * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}
else if ($forecastWindGustNight[$k] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWindDirNight[$k];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGustNight[$k] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($forecastWindGustNight[$k] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWindDirNight[$k][$k];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGustNight[$k] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($forecastWindGustNight[$k] < 25)
{
    echo "<wind> Wind <orangeu>";
    echo $forecastWindDirNight[$k];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGustNight[$k], 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}

?>
     </article>
<?php } ?>
  <!-- copyright needs to be kept please be ethical--->
  
      <article>
    <span style="font-size:10px;color:<?php echo $text1 ?>;">
    <?php echo $knfo ?>Global forecast data <a href="https://metoffice.apiconnect.ibmcloud.com/metoffice/production/" title="UK MetOffice Weather Data Hub" target="_blank">UK MetOffice Weather Data Hub</a></span>
</article>
      <article>
    <span style="font-size:8px;color:<?php echo $text1 ?>;">
  <?php echo $knfo ?> CSS/SVG/PHP original scripts were developed by <a href="https://weather34.com" title="weather34.com" target="_blank" style="font-size:8px;">weather34.com</a> &copy; 2015-<?php echo date('Y'); ?>
  </a></span>
</article>
<article>
    <span style="font-size:8px;color:<?php echo $text1 ?>;">
  <?php echo $knfo ?> These scripts were adapted by <a href="https://claydonsweather.org.uk" title="Steepleian" target="_blank" style="font-size:8px;">Steepleian</a>  for use in the weewx-Weather34 template &copy; 2015-<?php echo date('Y'); ?>
  </a></span>
</article>  
</main>
  </div>
  </body>
  </html>
