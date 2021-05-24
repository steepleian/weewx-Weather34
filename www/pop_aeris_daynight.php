<?php
include_once ('settings.php');
include ('w34CombinedData.php');

//###################################################################################################
//	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2016-18-19                                    #
//	CREATED FOR HOMEWEATHERSTATION TEMPLATE https://weather34.com/homeweatherstation/index.html    #
// 	                                                                                               #
// 	                                                                                               #
// 	FORECAST WU WEATHER FORECAST: Original FEB 2019	(Updated Gen 2021)  			               #
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
  <title>AerisWeather Hourly Forecast</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--<link href="css/popup.light.css?version=<?php echo filemtime('css/popup.light.css'); ?>" rel="stylesheet prefetch">//-->

<body>
<?php 
$forecastime = filemtime ('jsondata/ad.txt');?>
<div class="weather34darkbrowser" style="color:<?php echo $text1 ?>;" url="Day and Night Forecast for <?php echo $stationName ?>
                                         <?php echo '&nbsp;';echo "Updated &nbsp;".date( $timeFormatShort, $forecastime);?>"></div>  
 
  
<main class="grid">
  <?php
$forecastime = filemtime('jsondata/ad.txt');
$json = 'jsondata/ad.txt';
$json = file_get_contents($json);
$parsed_json = json_decode($json, true);
for ($k = 0; $k < 12; $k++) {
	$pngicon = explode(".", ($parsed_json['response'][0]['periods'][$k]['icon']));
    $forecastIcon[$k] = $pngicon[0].".svg";
    $Time[$k] = date("H", $parsed_json['response'][0]['periods'][$k]['timestamp']);
  	$nameDay[$k] = date("l", $parsed_json['response'][0]['periods'][$k]['timestamp']);
    //for ($l = 3; $l < 12; $l++) {$nameDay[$l] = date("l", $parsed_json['response'][0]['periods'][$l]['timestamp']);
  //} 
  	if($Time[0] ==="07"){$forecastTime[0] = "Today"; $forecastTime[1] = "Tonight"; $forecastTime[2] = "Tomorrow";$forecastTime[3] = "Tomorrow Night";
    $forecastTime[4] = $nameDay[4];$forecastTime[5] = $nameDay[5]." Night";$forecastTime[6] = $nameDay[6];$forecastTime[7] = $nameDay[7]." Night";
    $forecastTime[8] = $nameDay[8];$forecastTime[9] = $nameDay[9]." Night";$forecastTime[10] = $nameDay[10];$forecastTime[11] = $nameDay[11]." Night";                     
                        }
	 else if($Time[0] ==="19"){$forecastTime[0] = "Tonight"; $forecastTime[1] = "Tomorrow"; $forecastTime[2] = "Tomorrow Night";$forecastTime[3] = $nameDay[3];
    $forecastTime[4] = $nameDay[4]." Night";$forecastTime[5] = $nameDay[5];$forecastTime[6] = $nameDay[6]." Night";$forecastTime[7] = $nameDay[7];
    $forecastTime[8] = $nameDay[8]." Night";$forecastTime[9] = $nameDay[9];$forecastTime[10] = $nameDay[10]." Night";$forecastTime[11] = $nameDay[11];
                              }

	$forecastTempHigh[$k] = $parsed_json['response'][0]['periods'][$k]['maxTempC'];
	$forecastTempLow[$k] = $parsed_json['response'][0]['periods'][$k]['minTempC'];  
	//$forecastWindSpeed[$k] = $parsed_json['response'][0]['periods'][$k]['windSpeedKPH'];
    $forecastWindGust[$k] = $parsed_json['response'][0]['periods'][$k]['windSpeedKPH'];
	         
	$forecastWinddircardinal[$k] = $parsed_json['response'][0]['periods'][$k]['windDir'];
	         //$forecastacumm = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[0];
	         //$forecastPrecipType = $parsed_weather34wujson['response'][0]['periods'][0]['xxxxxxx'];
	$forecastprecipIntensity[$k] = $parsed_json['response'][0]['periods'][$k]['precipMM'];
	$forecastPrecipProb[$k] = $parsed_json['response'][0]['periods'][$k]['pop'];
	$forecastUV[$k] = $parsed_json['response'][0]['periods'][$k]['uvi'];
	$forecastsnow[$k] = $parsed_json['response'][0]['periods'][$k]['snowCM'];
	$forecastsummary[$k] = $parsed_json['response'][0]['periods'][$k]['weather'];
	$forecastnight[$k] = $parsed_json['response'][0]['periods'][$k]['isDay'];
	$forecastdesc[$k] = $parsed_json['response'][0]['periods'][$k]['weather'];
	$forecastheatindex[$k] = $parsed_json['response'][0]['periods'][$k]['avgFeelslikeC'];
	$forecasthumidity[$k] = $parsed_json['response'][0]['periods'][$k]['humidity'];
    if ($forecastTempHigh[$k]===null) {$forecastTempHigh[$k] = $forecastTempLow[$k];} 
	 //aw convert temps-rain
	//metric to F
	if ($tempunit == 'F') {
		$forecastTempHigh[$k] = round(($forecastTempHigh[$k] * 9 / 5) + 32, 0);
	}
  
	//heatindex
	if ($tempunit == 'F') {
		$forecastheatindex[$k] = ($forecastheatindex[$k] * 9 / 5) + 32;
	}	
	
	//rain inches to mm
	if ($rainunit == 'in') {
		$forecastprecipIntensity[$k] = $forecastprecipIntensity[$k] * 0.0393701;
	}
		
	
	
	
//kmh to ms
	if ($windunit == 'm/s') {
		$forecastWindGust[$k] = round((number_format($forecastWindGust[$k], 1) * 0.277778), 0); 
        $forecastWindSpeed[$k] = round((number_format($forecastWindSpeed[$k], 1) * 0.277778), 0);
	}
//kmh to mph
	if ($windunit == 'mph') {
		$forecastWindGust[$k] = round((number_format($forecastWindGust[$k], 1) * 0.621371), 0);
        $forecastWindSpeed[$k] = round((number_format($forecastWindSpeed[$k], 1) * 0.621371), 0);
	}

	if ($forecastnight[$k] !== false) {
		$forecastnight[$k] = "D";
	} else $forecastnight[$k] = "N";
     
  


?>


  <article>  
   <actualt>
 <?php //0  detailed forecast
//temp

if ($tempunit == 'F' && $forecastTempHigh[$k] < 44.6)
{
    echo "<bluet>" . $forecastTime[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[$k] > 80.6)
{
    echo "<redt>" . $forecastTime[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[$k] > 64.4)
{
    echo "<oranget>" . $forecastTime[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[$k] > 55)
{
    echo "<yellowt>" . $forecastTime[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[$k] >= 44.6)
{
    echo "<greent>" . $forecastTime[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($forecastTempHigh[$k] < 7)
{
    echo "<bluet>" . $forecastTime[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($forecastTempHigh[$k] > 27)
{
    echo "<redt>" . $forecastTime[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($forecastTempHigh[$k] > 19)
{
    echo "<oranget>" . $forecastTime[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($forecastTempHigh[$k] > 12.7)
{
    echo "<yellowt>" . $forecastTime[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($forecastTempHigh[$k] >= 7)
{
    echo "<greent>" . $forecastTime[$k] . "&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
echo "°" . $tempunit . "</actualt>";

//high temp icon
if ($forecastnight == 'D')
{
    if ($tempunit == 'F' && $forecastTempHigh[$k] >= 82)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
    else if ($tempunit == 'C' && $forecastTempHigh[$k] >= 28)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
}
if ($forecastnight == 'N')
{
    if ($tempunit == 'F' && $forecastTempHigh[$k] >= 71)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
    if ($tempunit == 'C' && $forecastTempHigh[$k] >= 22)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
}

//icon
echo "<div class=iconpos> ";

if ($forecastnight[$k] == 'D')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[$k] . '" width="35" class="iconpos"></img></div>';
}
if ($forecastnight[$k] == 'N')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[$k] . '" width="35" class="iconpos"></img></div>';
}

//summary of icon
echo '<div class=greydesc>' . $wuskydesc[$k] . '</div><br>';
//humidity night
if ($forecastnight[$k] == 'N')
{
    echo '<div class=uvforecast><grey>';
    echo "Humidity ";
    if ($forecasthumidity[$k] >= 70)
    {
        echo "<blueu>" . $forecasthumidity[$k] . '%</blueu>';
    }
    else if ($forecasthumidity[$k] > 50)
    {
        echo "<yellowu>" . $forecasthumidity[$k] . '%</yellowu>';
    }
    else if ($forecasthumidity[$k] > 40)
    {
        echo "<greenu>" . $forecasthumidity[$k] . '%</greenu>';
    }
    else if ($forecasthumidity[$k] > 0)
    {
        echo "<redu>" . $forecasthumidity[$k] . '%</redu>';
    }
}
//uvi
else if ($forecastUV[$k] > 0)
{
    echo '<div class=uvforecast><grey>' . $sunlight2 . ' UVI ';
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
//snow
if ($forecastacumm[$k] > 0)
{
    echo '&nbsp;' . $snowflakesvg[$k] . '<valuer>Snow  <bluer>' . $forecastacumm[$k] . 'cm</bluer>';
}
//rain
else if ($forecastPrecipType[$k] = 'rain' && $rainunit == 'in')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[$k], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[$k] . '%</bluer>';
}
//mm
else if ($forecastPrecipType[$k] = 'rain')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[$k], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[$k] . '%</bluer>';
}
echo "</div>";
//wind/gusts
if ($windunit == 'mph' && $forecastWindGust[$k] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[$k];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[$k] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'mph' && $forecastWindGust[$k] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[$k];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[$k] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
//kts
if ($windunit == 'kts' && $forecastWindGust[$k] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[$k];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[$k] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[$k] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[$k];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[$k] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[$k] >= 0)
{
    echo "<wind>Wind <orangeu>";
    echo $forecastWinddircardinal[$k];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[$k] * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}
else if ($forecastWindGust[$k] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[$k];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[$k] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($forecastWindGust[$k] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[$k];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[$k] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($forecastWindGust[$k] < 25)
{
    echo "<wind> Wind <orangeu>";
    echo $forecastWinddircardinal[$k];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[$k], 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}

?>  
</article>
<?php } ?>
  <!-- copyright needs to be kept please be ethical--->
  <article>
    <span style="font-size:9px;color:<?php echo $text1 ?>;">
  <?php echo $knfo ?> CSS/SVG/PHP original scripts were developed by <a href="https://weather34.com" title="weather34.com" target="_blank" style="font-size:8px;">weather34.com</a>  for use in the weather34 template &copy; 2015-<?php echo date('Y'); ?></span> <br>
    </article>
  <article>
    <span style="font-size:9px;color:<?php echo $text1 ?>;">
  <?php echo $knfo ?> CSS/SVG/PHP these scripts were adapted by <a href="https://claydonsweather.org.uk" title="Steepleian" target="_blank" style="font-size:8px;">Steepleian</a>  for use in the weewx-Weather34 skin &copy; 2015-<?php echo date('Y'); ?></span> <br>
    </article>
  <article>
    <span style="font-size:9px;color:<?php echo $text1 ?>;">
  <?php echo $knfo ?> Data for Forecast provided by <a href="https://www.aerisweather.com/develop/api/" title="AerisWeather API" target="_blank">AerisWeather</a></span>
  </article>
</main>
  </div>
  </body>
  </html>
