<?php
include_once ('settings.php');
include ('w34CombinedData.php');
date_default_timezone_set($TZ);
//###################################################################################################
// MetOffice Waeather Codes
//	Value	Description
// NA	Not available
// 0	Clear night clear-night.svg
// 1	Sunny day clear-day.svg
// 2	Partly cloudy (night) partly-cloudy-night.svg
// 3	Partly cloudy (day) partly-cloudy-day.svg
// 4	Not used
// 5	Mist mist.svg
// 6	Fog fog.svg
// 7	Cloudy cloudy.svg
// 8	Overcast overcast.svg
// 9	Light rain shower (night)  	partly-cloudy-night-drizzle.svg
// 10	Light rain shower (day)  	partly-cloudy-day-drizzle.svg
// 11	Drizzle drizzle.svg
// 12	Light rain drizzle.svg
// 13	Heavy rain shower (night) partly-cloudy-night-rain.svg
// 14	Heavy rain shower (day) partly-cloudy-day-rain.svg
// 15	Heavy rain rain.svg
// 16	Sleet shower (night)
// 17	Sleet shower (day)
// 18	Sleet sleet.svg
// 19	Hail shower (night) partly-cloudy-night-hail.svg 
// 20	Hail shower (day) partly-cloudy-day-hail.svg
// 21	Hail hail.svg
// 22	Light snow shower (night) partly-cloudy-night-snow.svg
// 23	Light snow shower (day) partly-cloudy-day-snow.svg
// 24	Light snow snow.svg
// 25	Heavy snow shower (night) partly-cloudy-night-snow.svg
// 26	Heavy snow shower (day) partly-cloudy-day-snow.svg
// 27	Heavy snow snow.svg
// 28	Thunder shower (night) thunderstorms-night-rain.svg
// 29	Thunder shower (day) thunderstorms-day-rain.svg
// 30	Thunder thunderstorms.svg			               #
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
  <title>UK MetOffice Hourly Forecast</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--<link href="css/popup.light.css?version=<?php echo filemtime('css/popup.light.css'); ?>" rel="stylesheet prefetch">//-->

<body>
<?php 
$forecastime = filemtime ('jsondata/mo.txt');?>
<div class="weather34darkbrowser" style="color:<?php echo $text1 ?>;" url="Hourly Forecast for <?php echo $stationName ?>
                                         <?php echo '&nbsp;';echo "Updated &nbsp;".date( $timeFormatShort, $forecastime);?>"></div>  
 
  
<main class="grid">
  <?php
$forecastime = filemtime('jsondata/mo.txt');
$json = 'jsondata/mo.txt';
$json = file_get_contents($json);
$parsed_json = json_decode($json, true);
for ($k = 0;$k < 15;$k++)
{
     $forecastcode[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['significantWeatherCode'];
    $forecastIcon[$k] = $forecastcode[$k] . ".svg";
    if ($forecastcode[$k] === "NA"){$forecastdesc[$k] = "Not available";}
    else if ($forecastcode[$k] === 0){$forecastdesc[$k] = "Clear";}
    else if ($forecastcode[$k] === 1){$forecastdesc[$k] = "Sunny";}
    else if ($forecastcode[$k] === 2){$forecastdesc[$k] = "Partly cloudy";}
    else if ($forecastcode[$k] === 3){$forecastdesc[$k] = "Partly cloudy";}
    else if ($forecastcode[$k] === 5){$forecastdesc[$k] = "Mist";}
    else if ($forecastcode[$k] === 6){$forecastdesc[$k] = "Fog";}
    else if ($forecastcode[$k] === 7){$forecastdesc[$k] = "Cloudy";}
    else if ($forecastcode[$k] === 8){$forecastdesc[$k] = "Overcast";}
    else if ($forecastcode[$k] === 9){$forecastdesc[$k] = "Light rain shower";}
    else if ($forecastcode[$k] === 10){$forecastdesc[$k] = "Light rain shower";}
    else if ($forecastcode[$k] === 11){$forecastdesc[$k] = "Drizzle";}
    else if ($forecastcode[$k] === 12){$forecastdesc[$k] = "Light rain";}
    else if ($forecastcode[$k] === 13){$forecastdesc[$k] = "Heavy rain shower";}
    else if ($forecastcode[$k] === 14){$forecastdesc[$k] = "Heavy rain shower";}
    else if ($forecastcode[$k] === 15){$forecastdesc[$k] = "Heavy rain";}
    else if ($forecastcode[$k] === 16){$forecastdesc[$k] = "Sleet shower";}
    else if ($forecastcode[$k] === 17){$forecastdesc[$k] = "Sleet shower";}
    else if ($forecastcode[$k] === 18){$forecastdesc[$k] = "Sleet";}
    else if ($forecastcode[$k] === 19){$forecastdesc[$k] = "Hail shower";}
    else if ($forecastcode[$k] === 20){$forecastdesc[$k] = "Hail shower";}
    else if ($forecastcode[$k] === 21){$forecastdesc[$k] = "Hail";}
    else if ($forecastcode[$k] === 22){$forecastdesc[$k] = "Light snow shower";}
    else if ($forecastcode[$k] === 23){$forecastdesc[$k] = "Light snow shower";}
    else if ($forecastcode[$k] === 24){$forecastdesc[$k] = "Light snow";}
    else if ($forecastcode[$k] === 25){$forecastdesc[$k] = "Heavy snow shower";}
    else if ($forecastcode[$k] === 26){$forecastdesc[$k] = "Heavy snow shower";}
    else if ($forecastcode[$k] === 27){$forecastdesc[$k] = "Heavy snow";}
    else if ($forecastcode[$k] === 28){$forecastdesc[$k] = "Thunder shower";}
    else if ($forecastcode[$k] === 29){$forecastdesc[$k] = "Thunder shower";}
    else if ($forecastcode[$k] === 30){$forecastdesc[$k] = "Thunder";}

    $forecastTime[$k] = date("H:i", strtotime($parsed_json['features'][0]['properties']['timeSeries'][$k]['time']));
    $forecastTempHigh[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['screenTemperature'];

    $forecastWindGust[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['windSpeed10m'];


    $forecastWindDir[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['windDirectionFrom10m'];
    if ($forecastWindDir[$k] >= 0 && $forecastWindDir[$k] < 11.25){$forecastWinddircardinal[$k] = "N";}
    else if ($forecastWindDir[$k] >= 11.25 && $forecastWindDir[$k] < 33.75){$forecastWinddircardinal[$k] = "NNE";}
    else if ($forecastWindDir[$k] >= 33.75 && $forecastWindDir[$k] < 56.25){$forecastWinddircardinal[$k] = "NE";}
    else if ($forecastWindDir[$k] >= 56.25 && $forecastWindDir[$k] < 78.75){$forecastWinddircardinal[$k] = "ENE";}
    else if ($forecastWindDir[$k] >= 78.75 && $forecastWindDir[$k] < 101.25){$forecastWinddircardinal[$k] = "E";}
    else if ($forecastWindDir[$k] >= 101.25 && $forecastWindDir[$k] < 123.75){$forecastWinddircardinal[$k] = "ESE";}
    else if ($forecastWindDir[$k] >= 123.75 && $forecastWindDir[$k] < 146.25){$forecastWinddircardinal[$k] = "SE";}
    else if ($forecastWindDir[$k] >= 146.25 && $forecastWindDir[$k] < 168.75){$forecastWinddircardinal[$k] = "SSE";}
    else if ($forecastWindDir[$k] >= 168.75 && $forecastWindDir[$k] < 191.25){$forecastWinddircardinal[$k] = "S";}
    else if ($forecastWindDir[$k] >= 191.25 && $forecastWindDir[$k] < 213.75){$forecastWinddircardinal[$k] = "SSW";}
    else if ($forecastWindDir[$k] >= 213.75 && $forecastWindDir[$k] < 236.25){$forecastWinddircardinal[$k] = "SW";}
    else if ($forecastWindDir[$k] >= 236.25 && $forecastWindDir[$k] < 258.75){$forecastWinddircardinal[$k] = "WSW";}
    else if ($forecastWindDir[$k] >= 258.75 && $forecastWindDir[$k] < 281.25){$forecastWinddircardinal[$k] = "W";}
    else if ($forecastWindDir[$k] >= 281.25 && $forecastWindDir[$k] < 303.75){$forecastWinddircardinal[$k] = "WNW";}
    else if ($forecastWindDir[$k] >= 303.75 && $forecastWindDir[$k] < 326.25){$forecastWinddircardinal[$k] = "NW";}
    else if ($forecastWindDir[$k] >= 326.25 && $forecastWindDir[$k] < 348.75){$forecastWinddircardinal[$k] = "NNW";}
    else if ($forecastWindDir[$k] >= 348.75 && $forecastWindDir[$k] <= 360){$forecastWinddircardinal[$k] = "N";}






    $forecastprecipIntensity[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['totalPrecipAmount'];
    $forecastPrecipProb[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['probOfPrecipitation'];
    $forecastUV[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['uvIndex'];
    $forecastacumm[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['totalSnowAmount'];
    $forecastsummary[$k] = $forecastdesc[$k];
    //$forecastnight[$k] = $parsed_json['response'][0]['periods'][$k]['isDay'];
    //$forecastdesc[$k] = $parsed_json['response'][0]['periods'][$k]['weather'];
    $forecastheatindex[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['feelsLikeTemperature'];
    $humidity[$k] = $parsed_json['features'][0]['properties']['timeSeries'][$k]['screenRelativeHumidity'];
    $forecasthumidity[$k] = round($humidity[$k],0,PHP_ROUND_HALF_UP);
    
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
        $forecastWindGust[$k] = round((number_format($forecastWindGust[$k], 1) * 3.6) , 0);
        $forecastWindSpeed[$k] = round((number_format($forecastWindSpeed[$k], 1) * 3.6) , 0);
    }
    //m/s to mph
    if ($windunit == 'mph')
    {
        $forecastWindGust[$k] = round((number_format($forecastWindGust[$k], 1) * 2.23694) , 0);
        $forecastWindSpeed[$k] = round((number_format($forecastWindSpeed[$k], 1) * 2.23694) , 0);
    }

    if ($forecastUV[$k] > 0)
    {
        $forecastnight[$k] = "D";
    }
    else $forecastnight[$k] = "N";


?>



  <article>  
   <actualtn>
 <?php //0  detailed forecast
//temp

if ($tempunit == 'F' && $forecastTempHigh[$k] < 44.6)
{
    echo "<bluet>" . $forecastTime[$k] . "h&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[$k] > 80.6)
{
    echo "<redt>" . $forecastTime[$k] . "h&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[$k] > 64.4)
{
    echo "<oranget>" . $forecastTime[$k] . "h&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[$k] > 55)
{
    echo "<yellowt>" . $forecastTime[$k] . "h&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[$k] >= 44.6)
{
    echo "<greent>" . $forecastTime[$k] . "h&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($forecastTempHigh[$k] < 7)
{
    echo "<bluet>" . $forecastTime[$k] . "h&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($forecastTempHigh[$k] > 27)
{
    echo "<redt>" . $forecastTime[$k] . "h&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($forecastTempHigh[$k] > 19)
{
    echo "<oranget>" . $forecastTime[$k] . "h&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($forecastTempHigh[$k] > 12.7)
{
    echo "<yellowt>" . $forecastTime[$k] . "h&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
else if ($forecastTempHigh[$k] >= 7)
{
    echo "<greent>" . $forecastTime[$k] . "h&nbsp;&nbsp;   " . number_format($forecastTempHigh[$k], 0);
}
echo "°" . $tempunit . "</actualtn>";

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
    echo '<img src="css/metofficeicons/' . $forecastIcon[$k] . '" width="35" class="iconpos"></img></div>';
}
if ($forecastnight[$k] == 'N')
{
    echo '<img src="css/metofficeicons/' . $forecastIcon[$k] . '" width="35" class="iconpos"></img></div>';
}

//summary of icon
echo '<div class=greydesc>' . $forecastdesc[$k] . '</div><br>';
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
  <?php echo $knfo ?> Data for Forecast provided by <a href="https://metoffice.apiconnect.ibmcloud.com/metoffice/production/" title="UK MetOffice Weather Data Hub" target="_blank">UK MetOffice Weather Data Hub</a></span>
  </article>
</main>
  </div>
  </body>
  </html>
