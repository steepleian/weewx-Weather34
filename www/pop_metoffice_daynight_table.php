<?php
include_once ('settings.php');
include ('w34CombinedData.php');
date_default_timezone_set($tz);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hourly Forecast</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="css/popup.<?php echo $theme; ?>.css?version=<?php echo filemtime('css/popup.' . $theme . '.css'); ?>" rel="stylesheet prefetch">

<?php


$json        = 'jsondata/md.txt';
$forecasturl = file_get_contents($json);
$parsed_forecastjson = json_decode($forecasturl,true);
$timeString = $parsed_forecastjson['features'][0]['properties']['timeSeries'][0]['time']; echo $timeString."</br>";
$timeEpoch = strtotime($timeString);
$timeHourGMT = gmdate("H",$timeEpoch);
$timeHourLocal = date("H",$timeEpoch);
$forecastHour = date("H:i",$timeEpoch);
$timeDifferencePlus = ($timeHourLocal) - ($timeHourGMT);
$timeDifferenceMinus = ($timeHourGMT) - ($timeHourLocal);
if ($timeDifferencePlus === 0){$count=0;}    
else if ($timeDifferencePlus === 1){$count=1;}
else if ($timeDifferencePlus === 2){$count=2;}
else if ($timeDifferencePlus === 3){$count=3;}
else if ($timeDifferencePlus === 4){$count=4;}
else if ($timeDifferencePlus === 5){$count=5;}
else if ($timeDifferencePlus === 6){$count=6;}
else if ($timeDifferencePlus === 7){$count=7;}
else if ($timeDifferencePlus === 8){$count=8;}
else if ($timeDifferencePlus === 9){$count=9;}
else if ($timeDifferencePlus === 10){$count=10;}
else if ($timeDifferencePlus === 11){$count=11;}
else if ($timeDifferencePlus === 12){$count=12;}
else if ($timeDifferenceMinus === 23){$count=1;}
else if ($timeDifferenceMinus === 22){$count=2;}
else if ($timeDifferenceMinus === 21){$count=3;}
else if ($timeDifferenceMinus === 20){$count=4;}
else if ($timeDifferenceMinus === 19){$count=5;}
else if ($timeDifferenceMinus === 18){$count=6;}
else if ($timeDifferenceMinus === 17){$count=7;}
else if ($timeDifferenceMinus === 16){$count=8;}
else if ($timeDifferenceMinus === 15){$count=9;}
else if ($timeDifferenceMinus === 14){$count=10;}
else if ($timeDifferenceMinus === 13){$count=11;}
else if ($timeDifferenceMinus === 12){$count=12;}

?>



 



<div class="weather34darkbrowser" url="Hourly Forecast for <?php echo $stationName ?>
                                         <?php echo '&nbsp;';echo "Updated &nbsp;".date( $timeFormatShort, $forecastime);?>"></div>
<main class="grid3" style="height:560px; width:700px;">
  <articlegraph3> 
<table class="demo" style="width: 98%; height: 90%; text-center: left; overflow: auto;">
    
 <tr style="border-bottom: 0px grey solid; ">
<th style="font-size: 9px;">Time</th>
<th colspan="2" style="font-size: 9px;">Summary</th>
<th style="font-size: 9px;">Temp</th>
<th style="font-size: 9px;">Feels</th>
<th style="font-size: 9px;">Pressure</th>
<th style="font-size: 9px;">Precip</th>
<th style="font-size: 9px;">Wind</th>
<th style="font-size: 9px;">Gust</th>
<th style="font-size: 9px;">Dir</th>
<th style="font-size: 9px;">UVI</th>
<th style="font-size: 9px;">Humidity</th>
<th style="font-size: 9px;">Visibility</th>
</tr>
<?php  for ($k = $count; $k < 18+$count; $k++) {
$timeString = $parsed_forecastjson['features'][0]['properties']['timeSeries'][$k]['time'];
$timeEpoch = strtotime($timeString);
$timeHourGMT = gmdate("H",$timeEpoch);
$timeHourLocal = date("H",$timeEpoch);
$forecastHour = date("H:i",$timeEpoch); 
$forecastCode[$k] = $parsed_forecastjson['features'][0]['properties']['timeSeries'][$k]['significantWeatherCode'];
$forecastWindDir[$k] = round($parsed_forecastjson['features'][0]['properties']['timeSeries'][$k]['windDirectionFrom10m'],1,PHP_ROUND_HALF_UP);
$forecastWindSpeed[$k] = round($parsed_forecastjson['features'][0]['properties']['timeSeries'][$k]['windSpeed10m'],1,PHP_ROUND_HALF_UP);
$forecastWindGust[$k] = round($parsed_forecastjson['features'][0]['properties']['timeSeries'][$k]['windGustSpeed10m'],1,PHP_ROUND_HALF_UP);
$forecastTemperature[$k] = round($parsed_forecastjson['features'][0]['properties']['timeSeries'][$k]['screenTemperature'],0,PHP_ROUND_HALF_UP);
$forecastFeelsLike[$k] = round($parsed_forecastjson['features'][0]['properties']['timeSeries'][$k]['feelsLikeTemperature'],0,PHP_ROUND_HALF_UP);
$forecastPressure[$k] = round(($parsed_forecastjson['features'][0]['properties']['timeSeries'][$k]['mslp']/100),0,PHP_ROUND_HALF_UP);
$forecastUVI[$k] = round($parsed_forecastjson['features'][0]['properties']['timeSeries'][$k]['uvIndex'],0,PHP_ROUND_HALF_UP);
$forecastHumidity[$k] = round($parsed_forecastjson['features'][0]['properties']['timeSeries'][$k]['screenRelativeHumidity'],0,PHP_ROUND_HALF_UP)."%";
$forecastPrecipitationRate[$k] = $parsed_forecastjson['features'][0]['properties']['timeSeries'][$k]['precipitationRate']."mm/h"; 
$forecastPrecipitationAmount[$k] = $parsed_forecastjson['features'][0]['properties']['timeSeries'][$k]['totalPrecipAmount'];
$forecastPrecipitationSnow[$k] = $parsed_forecastjson['features'][0]['properties']['timeSeries'][$k]['totalSnowAmount']."cm";
$forecastPrecipitationProb[$k] = $parsed_forecastjson['features'][0]['properties']['timeSeries'][$k]['probOfPrecipitation']."% Risk";
$forecastVisibility[$k] = $parsed_forecastjson['features'][0]['properties']['timeSeries'][$k]['visibility'];
if ($forecastWindDir[$k] >= 0 && $forecastWindDir[$k] < 11.25){$forecastWindCardinal[$k] = "N";}
    else if ($forecastWindDir[$k] >= 11.25 && $forecastWindDir[$k] < 33.75){$forecastWindCardinal[$k] = "NNE";}
    else if ($forecastWindDir[$k] >= 33.75 && $forecastWindDir[$k] < 56.25){$forecastWindCardinal[$k] = "NE";}
    else if ($forecastWindDir[$k] >= 56.25 && $forecastWindDir[$k] < 78.75){$forecastWindCardinal[$k] = "ENE";}
    else if ($forecastWindDir[$k] >= 78.75 && $forecastWindDir[$k] < 101.25){$forecastWindCardinal[$k] = "E";}
    else if ($forecastWindDir[$k] >= 101.25 && $forecastWindDir[$k] < 123.75){$forecastWindCardinal[$k] = "ESE";}
    else if ($forecastWindDir[$k] >= 123.75 && $forecastWindDir[$k] < 146.25){$forecastWindCardinal[$k] = "SE";}
    else if ($forecastWindDir[$k] >= 146.25 && $forecastWindDir[$k] < 168.75){$forecastWindCardinal[$k] = "SSE";}
    else if ($forecastWindDir[$k] >= 168.75 && $forecastWindDir[$k] < 191.25){$forecastWindCardinal[$k] = "S";}
    else if ($forecastWindDir[$k] >= 191.25 && $forecastWindDir[$k] < 213.75){$forecastWindCardinal[$k] = "SSW";}
    else if ($forecastWindDir[$k] >= 213.75 && $forecastWindDir[$k] < 236.25){$forecastWindCardinal[$k] = "SW";}
    else if ($forecastWindDir[$k] >= 236.25 && $forecastWindDir[$k] < 258.75){$forecastWindCardinal[$k] = "WSW";}
    else if ($forecastWindDir[$k] >= 258.75 && $forecastWindDir[$k] < 281.25){$forecastWindCardinal[$k] = "W";}
    else if ($forecastWindDir[$k] >= 281.25 && $forecastWindDir[$k] < 303.75){$forecastWindCardinal[$k] = "WNW";}
    else if ($forecastWindDir[$k] >= 303.75 && $forecastWindDir[$k] < 326.25){$forecastWindCardinal[$k] = "NW";}
    else if ($forecastWindDir[$k] >= 326.25 && $forecastWindDir[$k] < 348.75){$forecastWindCardinal[$k] = "NNW";}
    else if ($forecastWindDir[$k] >= 348.75 && $forecastWindDir[$k] <= 360){$forecastWindCardinal[$k] = "N";}
   
    
   
  


  
    if ($forecastCode[$k] === "NA"){$forecastDescription[$k] = "Not available";}
    else if ($forecastCode[$k] === 0){$forecastDescription[$k] = "Clear";}
    else if ($forecastCode[$k] === 1){$forecastDescription[$k] = "Sunny";}
    else if ($forecastCode[$k] === 2){$forecastDescription[$k] = "Partly cloudy";}
    else if ($forecastCode[$k] === 3){$forecastDescription[$k] = "Partly cloudy";}
    else if ($forecastCode[$k] === 5){$forecastDescription[$k] = "Mist";}
    else if ($forecastCode[$k] === 6){$forecastDescription[$k] = "Fog";}
    else if ($forecastCode[$k] === 7){$forecastDescription[$k] = "Cloudy";}
    else if ($forecastCode[$k] === 8){$forecastDescription[$k] = "Overcast";}
    else if ($forecastCode[$k] === 9){$forecastDescription[$k] = "Light rain shower";}
    else if ($forecastCode[$k] === 10){$forecastDescription[$k] = "Light rain shower";}
    else if ($forecastCode[$k] === 11){$forecastDescription[$k] = "Drizzle";}
    else if ($forecastCode[$k] === 12){$forecastDescription[$k] = "Light rain";}
    else if ($forecastCode[$k] === 13){$forecastDescription[$k] = "Heavy rain shower";}
    else if ($forecastCode[$k] === 14){$forecastDescription[$k] = "Heavy rain shower";}
    else if ($forecastCode[$k] === 15){$forecastDescription[$k] = "Heavy rain";}
    else if ($forecastCode[$k] === 16){$forecastDescription[$k] = "Sleet shower";}
    else if ($forecastCode[$k] === 17){$forecastDescription[$k] = "Sleet shower";}
    else if ($forecastCode[$k] === 18){$forecastDescription[$k] = "Sleet";}
    else if ($forecastCode[$k] === 19){$forecastDescription[$k] = "Hail shower";}
    else if ($forecastCode[$k] === 20){$forecastDescription[$k] = "Hail shower";}
    else if ($forecastCode[$k] === 21){$forecastDescription[$k] = "Hail";}
    else if ($forecastCode[$k] === 22){$forecastDescription[$k] = "Light snow shower";}
    else if ($forecastCode[$k] === 23){$forecastDescription[$k] = "Light snow shower";}
    else if ($forecastCode[$k] === 24){$forecastDescription[$k] = "Light snow";}
    else if ($forecastCode[$k] === 25){$forecastDescription[$k] = "Heavy snow shower";}
    else if ($forecastCode[$k] === 26){$forecastDescription[$k] = "Heavy snow shower";}
    else if ($forecastCode[$k] === 27){$forecastDescription[$k] = "Heavy snow";}
    else if ($forecastCode[$k] === 28){$forecastDescription[$k] = "Thunder shower";}
    else if ($forecastCode[$k] === 29){$forecastDescription[$k] = "Thunder shower";}
    else if ($forecastCode[$k] === 30){$forecastDescription[$k] = "Thunder";}
    
    if ($tempunit === 'F') {
		$forecastTemperature[$k] = round(($forecastTemperature[$k] * 9 / 5) + 32, 0)."°".$tempunit;
        $forecastFeelsLike[$k] = round(($forecastFeelsLike[$k] * 9 / 5) + 32, 0)."°".$tempunit;
	}
    if ($tempunit === 'C') {
		$forecastTemperature[$k] = round($forecastTemperature[$k] , 0)."°".$tempunit;
        $forecastFeelsLike[$k] = round($forecastFeelsLike[$k] , 0)."°".$tempunit;
	}
    //rain mm to in
  
  	if ($rainunit === 'in') {
		$forecastPrecipitationAmount[$k] = round(($forecastPrecipitationAmount[$k] * 0.0393701), 3,PHP_ROUND_HALF_UP).$rainunit;
	}
    else {$forecastPrecipitationAmount[$k] = $forecastPrecipitationAmount[$k].$rainunit;}
  
    
    
     // m/s to mph
	if ($windunit === 'mph') {
		$forecastWindSpeed[$k] = round(($forecastWindSpeed[$k] * 2.23694), 0).$windunit; 
        $forecastWindGust[$k] = round(($forecastWindGust[$k] * 2.23694), 0).$windunit;
	}
    // m/s to km/h
	else if ($windunit === 'km/h') {
		$forecastWindSpeed[$k] = round((number_format($forecastWindSpeed[$k], 1) * 3.6), 0).$windunit; 
        $forecastWindGust[$k] = round((number_format($forecastWindGust[$k], 1) * 3.6), 0).$windunit;
	}
    else {
		$forecastWindSpeed[$k] = round(number_format($forecastWindSpeed[$k], 1), 0).$windunit; 
        $forecastWindGust[$k] = round(number_format($forecastWindGust[$k], 1), 0).$windunit;
	} 
  
    // meters to miles 0.000621371
    if ($windunit === 'mph') {
		$forecastVisibility[$k] = round(($forecastVisibility[$k] * 0.000621371), 2)."mi"; 
	}
    else $forecastVisibility[$k] = round(($forecastVisibility[$k] /1000), 2)."km";
  
  
    // hPa to inHg
    if ($pressureunit === 'inHg') {
		$forecastPressure[$k] = round(($forecastPressure[$k] * 0.03 ), 2).$pressureunit; 
        
	}
    else if ($pressureunit === 'hPa') {
		$forecastPressure[$k] = round($forecastPressure[$k]).$pressureunit; 
        
	}
 

  
?>
<tr style="border-bottom: 1px grey solid; ">
<td><span style="font-size: 9px;";><?php echo $forecastHour; ?></span></td>
<td><?php echo '<img src="css/metofficeicons/' . $forecastCode[$k] . '.svg" width="30px" height="25px"  ></img>';?></td>
<td><span style="font-size: 9px;";><?php echo  $forecastDescription[$k];?></span></td>
<td><span style="font-size: 9px;";><?php echo $colorTempHigh[$k]; ?><?php echo  $forecastTemperature[$k];?></span></td>
<td><span style="font-size: 9px;";><?php echo $colorTempHigh[$k]; ?><?php echo  $forecastFeelsLike[$k];?></span></td>
<td><span style="font-size: 9px;";><?php echo $colorTempHigh[$k]; ?><?php echo  $forecastPressure[$k];?></span></td>
<td><span style="font-size: 9px; ";><?php echo  $forecastPrecipitationProb[$k];?></span></td>
<td><span style="font-size: 9px; ";><?php echo  $forecastWindSpeed[$k];?><small></small></span></td>
<td><span style="font-size: 9px; ";><?php echo  $forecastWindGust[$k];?><small></small></span></td>
<td><span style="font-size: 9px; ";><?php echo  $forecastWindCardinal[$k];?><small></small></span></td>
<td><span style="font-size: 9px; ";><?php echo $colorUV[$k]; ?><?php echo  $forecastUVI[$k];?></span></td>
<td><span style="font-size: 9px;";><?php echo $colorHumidity[$k]; ?><?php echo  $forecastHumidity[$k];?><small></small></span></td>
<td><span style="font-size: 9px; ";><?php echo $forecastVisibility[$k]; ?></span></td>  
</tr>
  <?php } ?>
<tr><td  colspan="9">
<span style="float: right; font-size: 10px;"><a href="https://metoffice.gov.uk/" target="_blank" style="color: grey">
Forecast data supplied by:&nbsp;&nbsp;The MetOffice </a></span>
</tr>

</table>
    </articlegraph3>

          
  
   </main>