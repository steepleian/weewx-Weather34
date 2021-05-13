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
$forecastime = filemtime('jsondata/ah.txt');
$json = 'jsondata/ah.txt';
$json = file_get_contents($json);
$parsed_json = json_decode($json, true);
for ($k = 0;$k < 15;$k++)
{
    $pngicon = explode(".", ($parsed_json['response'][0]['periods'][$k]['icon']));
    $forecastIcon[$k] = $pngicon[0] . ".svg";
    $forecastTime[$k] = date("H:i", $parsed_json['response'][0]['periods'][$k]['timestamp']);
    $forecastTempHigh[$k] = $parsed_json['response'][0]['periods'][$k]['avgTempC'];

    $forecastWindGust[$k] = $parsed_json['response'][0]['periods'][$k]['windSpeedKPH'];

    $forecastWinddircardinal[$k] = $parsed_json['response'][0]['periods'][$k]['windDir'];

    $forecastprecipIntensity[$k] = $parsed_json['response'][0]['periods'][$k]['precipMM'];
    $forecastPrecipProb[$k] = $parsed_json['response'][0]['periods'][$k]['pop'];
    $forecastUV[$k] = $parsed_json['response'][0]['periods'][$k]['uvi'];
    $forecastsnow[$k] = $parsed_json['response'][0]['periods'][$k]['snowCM'];
    $forecastsummary[$k] = $parsed_json['response'][0]['periods'][$k]['weather'];
    $forecastnight[$k] = $parsed_json['response'][0]['periods'][$k]['isDay'];
    $wuskydesc[$k] = $parsed_json['response'][0]['periods'][$k]['weather'];
    $wuskyheatindex[$k] = $parsed_json['response'][0]['periods'][$k]['avgFeelslikeC'];
    $wuskyhumidity[$k] = $parsed_json['response'][0]['periods'][$k]['humidity'];

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

    //kmh to ms
    if ($windunit == 'm/s')
    {
        $forecastWindGust[$k] = round((number_format($forecastWindGust[$k], 1) * 0.277778) , 0);
        $forecastWindSpeed[$k] = round((number_format($forecastWindSpeed[$k], 1) * 0.277778) , 0);
    }
    //kmh to mph
    if ($windunit == 'mph')
    {
        $forecastWindGust[$k] = round((number_format($forecastWindGust[$k], 1) * 0.621371) , 0);
        $forecastWindSpeed[$k] = round((number_format($forecastWindSpeed[$k], 1) * 0.621371) , 0);
    }

    if ($forecastnight[$k] !== false)
    {
        $forecastnight[$k] = "D";
    }
    else $forecastnight[$k] = "N";

}
?>


<link href="css/forecast.<?php echo $theme; ?>.css?version=<?php echo filemtime('css/forecast.' . $theme . '.css'); ?>" rel="stylesheet prefetch">

<script src="js/jquery.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>AerisWeather Forecast For <?php
echo $stationlocation
?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


<body>
  <?php if ($theme === "dark")
{
    $text1 = "white";
}
else if ($theme === "light")
{
    $text1 = "black";
    $background1 = "white";
}
$forecastime = filemtime('jsondata/ad.txt'); ?>

<div class="weather34darkbrowser" url="Hourly Forecast <?php
echo $stationName
?>
<?php
echo '&nbsp;';
echo "-&nbsp;" . date($timeFormatShort, $forecastime);
?>
  ">
</div>  
<main class="grid">
  <article>  
   <actualt><?php
echo $forecastTime[0] ?></actualt>
 <?php //0  detailed forecast
//temp
echo "<tempicon>";
if ($tempunit == 'F' && $forecastTempHigh[0] < 44.6)
{
    echo "<bluet>" . number_format($forecastTempHigh[0], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[0] > 80.6)
{
    echo "<redt>" . number_format($forecastTempHigh[0], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[0] > 64.4)
{
    echo "<oranget>" . number_format($forecastTempHigh[0], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[0] > 55)
{
    echo "<yellowt>" . number_format($forecastTempHigh[0], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[0] >= 44.6)
{
    echo "<greent>" . number_format($forecastTempHigh[0], 0);
}
else if ($forecastTempHigh[0] < 7)
{
    echo "<bluet>" . number_format($forecastTempHigh[0], 0);
}
else if ($forecastTempHigh[0] > 27)
{
    echo "<redt>" . number_format($forecastTempHigh[0], 0);
}
else if ($forecastTempHigh[0] > 19)
{
    echo "<oranget>" . number_format($forecastTempHigh[0], 0);
}
else if ($forecastTempHigh[0] > 12.7)
{
    echo "<yellowt>" . number_format($forecastTempHigh[0], 0);
}
else if ($forecastTempHigh[0] >= 7)
{
    echo "<greent>" . number_format($forecastTempHigh[0], 0);
}
echo "°<spantemp>" . $tempunit . "</spantemp></tempicon>";

//high temp icon
if ($forecastnight == 'D')
{
    if ($tempunit == 'F' && $forecastTempHigh[0] >= 82)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
    else if ($tempunit == 'C' && $forecastTempHigh[0] >= 28)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
}
if ($forecastnight == 'N')
{
    if ($tempunit == 'F' && $forecastTempHigh[0] >= 71)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
    if ($tempunit == 'C' && $forecastTempHigh[0] >= 22)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
}

//icon
echo "<div class=iconpos> ";

if ($forecastnight[0] == 'D')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[0] . '" width="35" class="iconpos"></img></div>';
}
if ($forecastnight[0] == 'N')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[0] . '" width="35" class="iconpos"></img></div>';
}

//summary of icon
echo '<div class=greydesc>' . $wuskydesc[0] . '</div><br>';
//humidity night
if ($forecastnight[0] == 'N')
{
    echo '<div class=uvforecast><grey>';
    echo "Humidity ";
    if ($wuskyhumidity[0] >= 70)
    {
        echo "<blueu>" . $wuskyhumidity[0] . '%</blueu>';
    }
    else if ($wuskyhumidity[0] > 50)
    {
        echo "<yellowu>" . $wuskyhumidity[0] . '%</yellowu>';
    }
    else if ($wuskyhumidity[0] > 40)
    {
        echo "<greenu>" . $wuskyhumidity[0] . '%</greenu>';
    }
    else if ($wuskyhumidity[0] > 0)
    {
        echo "<redu>" . $wuskyhumidity[0] . '%</redu>';
    }
}
//uvi
else if ($forecastUV[0] > 0)
{
    echo '<div class=uvforecast><grey>' . $sunlight2 . ' UVI ';
}
if ($forecastUV[0] > 10)
{
    echo "<purpleu>" . $forecastUV[0] . '</purpleu><grey> ';
}
else if ($forecastUV[0] > 7)
{
    echo "<redu>" . $forecastUV[0] . '</redu><grey> ';
}
else if ($forecastUV[0] > 5)
{
    echo "<orangeu>" . $forecastUV[0] . '</orangeu><grey> ';
}
else if ($forecastUV[0] > 2)
{
    echo "<yellowu>" . $forecastUV[0] . '</yellowu><grey> ';
}
else if ($forecastUV[0] > 0)
{
    echo "<greenu>" . $forecastUV[0] . '</greenu><grey> ';
}
//snow
if ($forecastacumm[0] > 0)
{
    echo '&nbsp;' . $snowflakesvg[0] . '<valuer>Snow  <bluer>' . $forecastacumm[0] . 'cm</bluer>';
}
//rain
else if ($forecastPrecipType[0] = 'rain' && $rainunit == 'in')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[0], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[0] . '%</bluer>';
}
//mm
else if ($forecastPrecipType[0] = 'rain')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[0], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[0] . '%</bluer>';
}
echo "</div>";
//wind/gusts
if ($windunit == 'mph' && $forecastWindGust[0] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[0];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[0] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'mph' && $forecastWindGust[0] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[0];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[0] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
//kts
if ($windunit == 'kts' && $forecastWindGust[0] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[0];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[0] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[0] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[0];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[0] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[0] >= 0)
{
    echo "<wind>Wind <orangeu>";
    echo $forecastWinddircardinal[0];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[0] * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}
else if ($forecastWindGust[0] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[0];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[0] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($forecastWindGust[0] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[0];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[0] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($forecastWindGust[0] < 25)
{
    echo "<wind> Wind <orangeu>";
    echo $forecastWinddircardinal[0];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[0], 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}

?>  
</article>
  <article>  
   <actualt><?php
echo $forecastTime[1] ?></actualt>
 <?php //0  detailed forecast
//temp
echo "<tempicon>";
if ($tempunit == 'F' && $forecastTempHigh[1] < 44.6)
{
    echo "<bluet>" . number_format($forecastTempHigh[1], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[1] > 80.6)
{
    echo "<redt>" . number_format($forecastTempHigh[1], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[1] > 64.4)
{
    echo "<oranget>" . number_format($forecastTempHigh[1], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[1] > 55)
{
    echo "<yellowt>" . number_format($forecastTempHigh[1], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[1] >= 44.6)
{
    echo "<greent>" . number_format($forecastTempHigh[1], 0);
}
else if ($forecastTempHigh[1] < 7)
{
    echo "<bluet>" . number_format($forecastTempHigh[1], 0);
}
else if ($forecastTempHigh[1] > 27)
{
    echo "<redt>" . number_format($forecastTempHigh[1], 0);
}
else if ($forecastTempHigh[1] > 19)
{
    echo "<oranget>" . number_format($forecastTempHigh[1], 0);
}
else if ($forecastTempHigh[1] > 12.7)
{
    echo "<yellowt>" . number_format($forecastTempHigh[1], 0);
}
else if ($forecastTempHigh[1] >= 7)
{
    echo "<greent>" . number_format($forecastTempHigh[1], 0);
}
echo "°<spantemp>" . $tempunit . "</spantemp></tempicon>";

//high temp icon
if ($forecastnight == 'D')
{
    if ($tempunit == 'F' && $forecastTempHigh[1] >= 82)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
    else if ($tempunit == 'C' && $forecastTempHigh[1] >= 28)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
}
if ($forecastnight == 'N')
{
    if ($tempunit == 'F' && $forecastTempHigh[1] >= 71)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
    if ($tempunit == 'C' && $forecastTempHigh[1] >= 22)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
}

//icon
echo "<div class=iconpos> ";
if ($forecastnight[1] == 'D')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[1] . '" width="35" class="iconpos"></img></div>';
}
if ($forecastnight[1] == 'N')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[1] . '" width="35" class="iconpos"></img></div>';
}
//summary of icon
echo '<div class=greydesc>' . $wuskydesc[1] . '</div><br>';
//humidity night
if ($forecastnight[1] == 'N')
{
    echo '<div class=uvforecast><grey>';
    echo "Humidity ";
    if ($wuskyhumidity[1] >= 70)
    {
        echo "<blueu>" . $wuskyhumidity[1] . '%</blueu>';
    }
    else if ($wuskyhumidity[1] > 50)
    {
        echo "<yellowu>" . $wuskyhumidity[1] . '%</yellowu>';
    }
    else if ($wuskyhumidity[1] > 40)
    {
        echo "<greenu>" . $wuskyhumidity[1] . '%</greenu>';
    }
    else if ($wuskyhumidity[1] > 0)
    {
        echo "<redu>" . $wuskyhumidity[1] . '%</redu>';
    }
}
//uvi
else if ($forecastUV[1] > 0)
{
    echo '<div class=uvforecast><grey>' . $sunlight2 . ' UVI ';
}
if ($forecastUV[1] > 10)
{
    echo "<purpleu>" . $forecastUV[1] . '</purpleu><grey> ';
}
else if ($forecastUV[1] > 7)
{
    echo "<redu>" . $forecastUV[1] . '</redu><grey> ';
}
else if ($forecastUV[1] > 5)
{
    echo "<orangeu>" . $forecastUV[1] . '</orangeu><grey> ';
}
else if ($forecastUV[1] > 2)
{
    echo "<yellowu>" . $forecastUV[1] . '</yellowu><grey> ';
}
else if ($forecastUV[1] > 0)
{
    echo "<greenu>" . $forecastUV[1] . '</greenu><grey> ';
}
//snow
if ($forecastacumm[1] > 0)
{
    echo '&nbsp;' . $snowflakesvg[1] . '<valuer>Snow  <bluer>' . $forecastacumm[1] . 'cm</bluer>';
}
//rain
else if ($forecastPrecipType[1] = 'rain' && $rainunit == 'in')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[1], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[1] . '%</bluer>';
}
//mm
else if ($forecastPrecipType[1] = 'rain')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[1], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[1] . '%</bluer>';
}
echo "</div>";
//wind/gusts
if ($windunit == 'mph' && $forecastWindGust[1] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[1];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[1] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'mph' && $forecastWindGust[1] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[1];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[1] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
//kts
if ($windunit == 'kts' && $forecastWindGust[1] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[1];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[1] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[1] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[1];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[1] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[1] >= 0)
{
    echo "<wind>Wind <orangeu>";
    echo $forecastWinddircardinal[1];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[1] * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}
else if ($forecastWindGust[1] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[1];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[1] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($forecastWindGust[1] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[1];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[1] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($forecastWindGust[1] < 25)
{
    echo "<wind> Wind <orangeu>";
    echo $forecastWinddircardinal[1];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[1], 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}

?>  
</article>  
<article>  
   <actualt><?php
echo $forecastTime[2] ?></actualt>
 <?php //0  detailed forecast
//temp
echo "<tempicon>";
if ($tempunit == 'F' && $forecastTempHigh[2] < 44.6)
{
    echo "<bluet>" . number_format($forecastTempHigh[2], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[2] > 80.6)
{
    echo "<redt>" . number_format($forecastTempHigh[2], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[2] > 64.4)
{
    echo "<oranget>" . number_format($forecastTempHigh[2], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[2] > 55)
{
    echo "<yellowt>" . number_format($forecastTempHigh[2], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[2] >= 44.6)
{
    echo "<greent>" . number_format($forecastTempHigh[2], 0);
}
else if ($forecastTempHigh[2] < 7)
{
    echo "<bluet>" . number_format($forecastTempHigh[2], 0);
}
else if ($forecastTempHigh[2] > 27)
{
    echo "<redt>" . number_format($forecastTempHigh[2], 0);
}
else if ($forecastTempHigh[2] > 19)
{
    echo "<oranget>" . number_format($forecastTempHigh[2], 0);
}
else if ($forecastTempHigh[2] > 12.7)
{
    echo "<yellowt>" . number_format($forecastTempHigh[2], 0);
}
else if ($forecastTempHigh[2] >= 7)
{
    echo "<greent>" . number_format($forecastTempHigh[2], 0);
}
echo "°<spantemp>" . $tempunit . "</spantemp></tempicon>";

//high temp icon
if ($forecastnight == 'D')
{
    if ($tempunit == 'F' && $forecastTempHigh[2] >= 82)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
    else if ($tempunit == 'C' && $forecastTempHigh[2] >= 28)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
}
if ($forecastnight == 'N')
{
    if ($tempunit == 'F' && $forecastTempHigh[2] >= 71)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
    if ($tempunit == 'C' && $forecastTempHigh[2] >= 22)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
}

//icon
echo "<div class=iconpos> ";
if ($forecastnight[2] == 'D')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[2] . '" width="35" class="iconpos"></img></div>';
}
if ($forecastnight[2] == 'N')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[2] . '" width="35" class="iconpos"></img></div>';
}
//summary of icon
echo '<div class=greydesc>' . $wuskydesc[2] . '</div><br>';
//humidity night
if ($forecastnight[2] == 'N')
{
    echo '<div class=uvforecast><grey>';
    echo "Humidity ";
    if ($wuskyhumidity[2] >= 70)
    {
        echo "<blueu>" . $wuskyhumidity[2] . '%</blueu>';
    }
    else if ($wuskyhumidity[2] > 50)
    {
        echo "<yellowu>" . $wuskyhumidity[2] . '%</yellowu>';
    }
    else if ($wuskyhumidity[2] > 40)
    {
        echo "<greenu>" . $wuskyhumidity[2] . '%</greenu>';
    }
    else if ($wuskyhumidity[2] > 0)
    {
        echo "<redu>" . $wuskyhumidity[2] . '%</redu>';
    }
}
//uvi
else if ($forecastUV[2] > 0)
{
    echo '<div class=uvforecast><grey>' . $sunlight2 . ' UVI ';
}
if ($forecastUV[2] > 10)
{
    echo "<purpleu>" . $forecastUV[2] . '</purpleu><grey> ';
}
else if ($forecastUV[2] > 7)
{
    echo "<redu>" . $forecastUV[2] . '</redu><grey> ';
}
else if ($forecastUV[2] > 5)
{
    echo "<orangeu>" . $forecastUV[2] . '</orangeu><grey> ';
}
else if ($forecastUV[2] > 2)
{
    echo "<yellowu>" . $forecastUV[2] . '</yellowu><grey> ';
}
else if ($forecastUV[2] > 0)
{
    echo "<greenu>" . $forecastUV[2] . '</greenu><grey> ';
}
//snow
if ($forecastacumm[2] > 0)
{
    echo '&nbsp;' . $snowflakesvg[2] . '<valuer>Snow  <bluer>' . $forecastacumm[2] . 'cm</bluer>';
}
//rain
else if ($forecastPrecipType[2] = 'rain' && $rainunit == 'in')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[2], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[2] . '%</bluer>';
}
//mm
else if ($forecastPrecipType[2] = 'rain')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[2], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[2] . '%</bluer>';
}
echo "</div>";
//wind/gusts
if ($windunit == 'mph' && $forecastWindGust[2] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[2];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[2] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'mph' && $forecastWindGust[2] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[2];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[2] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
//kts
if ($windunit == 'kts' && $forecastWindGust[2] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[2];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[2] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[2] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[2];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[2] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[2] >= 0)
{
    echo "<wind>Wind <orangeu>";
    echo $forecastWinddircardinal[2];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[2] * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}
else if ($forecastWindGust[2] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[2];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[2] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($forecastWindGust[2] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[2];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[2] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($forecastWindGust[2] < 25)
{
    echo "<wind> Wind <orangeu>";
    echo $forecastWinddircardinal[2];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[2], 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}

?>  
</article>  
  <article>  
   <actualt><?php
echo $forecastTime[3] ?></actualt>
 <?php //0  detailed forecast
//temp
echo "<tempicon>";
if ($tempunit == 'F' && $forecastTempHigh[3] < 44.6)
{
    echo "<bluet>" . number_format($forecastTempHigh[3], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[3] > 80.6)
{
    echo "<redt>" . number_format($forecastTempHigh[3], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[3] > 64.4)
{
    echo "<oranget>" . number_format($forecastTempHigh[3], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[3] > 55)
{
    echo "<yellowt>" . number_format($forecastTempHigh[3], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[3] >= 44.6)
{
    echo "<greent>" . number_format($forecastTempHigh[3], 0);
}
else if ($forecastTempHigh[3] < 7)
{
    echo "<bluet>" . number_format($forecastTempHigh[3], 0);
}
else if ($forecastTempHigh[3] > 27)
{
    echo "<redt>" . number_format($forecastTempHigh[3], 0);
}
else if ($forecastTempHigh[3] > 19)
{
    echo "<oranget>" . number_format($forecastTempHigh[3], 0);
}
else if ($forecastTempHigh[3] > 12.7)
{
    echo "<yellowt>" . number_format($forecastTempHigh[3], 0);
}
else if ($forecastTempHigh[3] >= 7)
{
    echo "<greent>" . number_format($forecastTempHigh[3], 0);
}
echo "°<spantemp>" . $tempunit . "</spantemp></tempicon>";

//high temp icon
if ($forecastnight == 'D')
{
    if ($tempunit == 'F' && $forecastTempHigh[3] >= 82)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
    else if ($tempunit == 'C' && $forecastTempHigh[3] >= 28)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
}
if ($forecastnight == 'N')
{
    if ($tempunit == 'F' && $forecastTempHigh[3] >= 71)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
    if ($tempunit == 'C' && $forecastTempHigh[3] >= 22)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
}

//icon
echo "<div class=iconpos> ";
if ($forecastnight[3] == 'D')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[3] . '" width="35" class="iconpos"></img></div>';
}
if ($forecastnight[3] == 'N')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[3] . '" width="35" class="iconpos"></img></div>';
}
//summary of icon
echo '<div class=greydesc>' . $wuskydesc[3] . '</div><br>';
//humidity night
if ($forecastnight[3] == 'N')
{
    echo '<div class=uvforecast><grey>';
    echo "Humidity ";
    if ($wuskyhumidity[3] >= 70)
    {
        echo "<blueu>" . $wuskyhumidity[3] . '%</blueu>';
    }
    else if ($wuskyhumidity[3] > 50)
    {
        echo "<yellowu>" . $wuskyhumidity[3] . '%</yellowu>';
    }
    else if ($wuskyhumidity[3] > 40)
    {
        echo "<greenu>" . $wuskyhumidity[3] . '%</greenu>';
    }
    else if ($wuskyhumidity[3] > 0)
    {
        echo "<redu>" . $wuskyhumidity[3] . '%</redu>';
    }
}
//uvi
else if ($forecastUV[3] > 0)
{
    echo '<div class=uvforecast><grey>' . $sunlight2 . ' UVI ';
}
if ($forecastUV[3] > 10)
{
    echo "<purpleu>" . $forecastUV[3] . '</purpleu><grey> ';
}
else if ($forecastUV[3] > 7)
{
    echo "<redu>" . $forecastUV[3] . '</redu><grey> ';
}
else if ($forecastUV[3] > 5)
{
    echo "<orangeu>" . $forecastUV[3] . '</orangeu><grey> ';
}
else if ($forecastUV[3] > 2)
{
    echo "<yellowu>" . $forecastUV[3] . '</yellowu><grey> ';
}
else if ($forecastUV[3] > 0)
{
    echo "<greenu>" . $forecastUV[3] . '</greenu><grey> ';
}
//snow
if ($forecastacumm[3] > 0)
{
    echo '&nbsp;' . $snowflakesvg[3] . '<valuer>Snow  <bluer>' . $forecastacumm[3] . 'cm</bluer>';
}
//rain
else if ($forecastPrecipType[3] = 'rain' && $rainunit == 'in')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[3], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[3] . '%</bluer>';
}
//mm
else if ($forecastPrecipType[3] = 'rain')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[3], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[3] . '%</bluer>';
}
echo "</div>";
//wind/gusts
if ($windunit == 'mph' && $forecastWindGust[3] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[3];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[3] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'mph' && $forecastWindGust[3] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[3];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[3] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
//kts
if ($windunit == 'kts' && $forecastWindGust[3] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[3];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[3] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[3] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[3];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[3] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[3] >= 0)
{
    echo "<wind>Wind <orangeu>";
    echo $forecastWinddircardinal[3];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[3] * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}
else if ($forecastWindGust[3] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[3];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[3] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($forecastWindGust[3] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[3];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[3] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($forecastWindGust[3] < 25)
{
    echo "<wind> Wind <orangeu>";
    echo $forecastWinddircardinal[3];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[3], 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}

?>  
</article>  
  <article>  
   <actualt><?php
echo $forecastTime[4] ?></actualt>
 <?php //0  detailed forecast
//temp
echo "<tempicon>";
if ($tempunit == 'F' && $forecastTempHigh[4] < 44.6)
{
    echo "<bluet>" . number_format($forecastTempHigh[4], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[4] > 80.6)
{
    echo "<redt>" . number_format($forecastTempHigh[4], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[4] > 64.4)
{
    echo "<oranget>" . number_format($forecastTempHigh[4], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[4] > 55)
{
    echo "<yellowt>" . number_format($forecastTempHigh[4], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[4] >= 44.6)
{
    echo "<greent>" . number_format($forecastTempHigh[4], 0);
}
else if ($forecastTempHigh[4] < 7)
{
    echo "<bluet>" . number_format($forecastTempHigh[4], 0);
}
else if ($forecastTempHigh[4] > 27)
{
    echo "<redt>" . number_format($forecastTempHigh[4], 0);
}
else if ($forecastTempHigh[4] > 19)
{
    echo "<oranget>" . number_format($forecastTempHigh[4], 0);
}
else if ($forecastTempHigh[4] > 12.7)
{
    echo "<yellowt>" . number_format($forecastTempHigh[4], 0);
}
else if ($forecastTempHigh[4] >= 7)
{
    echo "<greent>" . number_format($forecastTempHigh[4], 0);
}
echo "°<spantemp>" . $tempunit . "</spantemp></tempicon>";

//high temp icon
if ($forecastnight == 'D')
{
    if ($tempunit == 'F' && $forecastTempHigh[4] >= 82)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
    else if ($tempunit == 'C' && $forecastTempHigh[4] >= 28)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
}
if ($forecastnight == 'N')
{
    if ($tempunit == 'F' && $forecastTempHigh[4] >= 71)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
    if ($tempunit == 'C' && $forecastTempHigh[4] >= 22)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
}

//icon
echo "<div class=iconpos> ";
if ($forecastnight[4] == 'D')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[4] . '" width="35" class="iconpos"></img></div>';
}
if ($forecastnight[4] == 'N')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[4] . '" width="35" class="iconpos"></img></div>';
}
//summary of icon
echo '<div class=greydesc>' . $wuskydesc[4] . '</div><br>';
//humidity night
if ($forecastnight[4] == 'N')
{
    echo '<div class=uvforecast><grey>';
    echo "Humidity ";
    if ($wuskyhumidity[4] >= 70)
    {
        echo "<blueu>" . $wuskyhumidity[4] . '%</blueu>';
    }
    else if ($wuskyhumidity[4] > 50)
    {
        echo "<yellowu>" . $wuskyhumidity[4] . '%</yellowu>';
    }
    else if ($wuskyhumidity[4] > 40)
    {
        echo "<greenu>" . $wuskyhumidity[4] . '%</greenu>';
    }
    else if ($wuskyhumidity[4] > 0)
    {
        echo "<redu>" . $wuskyhumidity[4] . '%</redu>';
    }
}
//uvi
else if ($forecastUV[4] > 0)
{
    echo '<div class=uvforecast><grey>' . $sunlight2 . ' UVI ';
}
if ($forecastUV[4] > 10)
{
    echo "<purpleu>" . $forecastUV[4] . '</purpleu><grey> ';
}
else if ($forecastUV[4] > 7)
{
    echo "<redu>" . $forecastUV[4] . '</redu><grey> ';
}
else if ($forecastUV[4] > 5)
{
    echo "<orangeu>" . $forecastUV[4] . '</orangeu><grey> ';
}
else if ($forecastUV[4] > 2)
{
    echo "<yellowu>" . $forecastUV[4] . '</yellowu><grey> ';
}
else if ($forecastUV[4] > 0)
{
    echo "<greenu>" . $forecastUV[4] . '</greenu><grey> ';
}
//snow
if ($forecastacumm[4] > 0)
{
    echo '&nbsp;' . $snowflakesvg[4] . '<valuer>Snow  <bluer>' . $forecastacumm[4] . 'cm</bluer>';
}
//rain
else if ($forecastPrecipType[4] = 'rain' && $rainunit == 'in')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[4], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[4] . '%</bluer>';
}
//mm
else if ($forecastPrecipType[4] = 'rain')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[4], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[4] . '%</bluer>';
}
echo "</div>";
//wind/gusts
if ($windunit == 'mph' && $forecastWindGust[4] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[4];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[4] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'mph' && $forecastWindGust[4] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[4];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[4] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
//kts
if ($windunit == 'kts' && $forecastWindGust[4] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[4];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[4] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[4] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[4];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[4] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[4] >= 0)
{
    echo "<wind>Wind <orangeu>";
    echo $forecastWinddircardinal[4];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[4] * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}
else if ($forecastWindGust[4] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[4];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[4] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($forecastWindGust[4] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[4];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[4] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($forecastWindGust[4] < 25)
{
    echo "<wind> Wind <orangeu>";
    echo $forecastWinddircardinal[4];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[4], 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}

?>  
</article>  
<article>  
   <actualt><?php
echo $forecastTime[5] ?></actualt>
 <?php //0  detailed forecast
//temp
echo "<tempicon>";
if ($tempunit == 'F' && $forecastTempHigh[5] < 44.6)
{
    echo "<bluet>" . number_format($forecastTempHigh[5], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[5] > 80.6)
{
    echo "<redt>" . number_format($forecastTempHigh[5], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[5] > 64.4)
{
    echo "<oranget>" . number_format($forecastTempHigh[5], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[5] > 55)
{
    echo "<yellowt>" . number_format($forecastTempHigh[5], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[5] >= 44.6)
{
    echo "<greent>" . number_format($forecastTempHigh[5], 0);
}
else if ($forecastTempHigh[5] < 7)
{
    echo "<bluet>" . number_format($forecastTempHigh[5], 0);
}
else if ($forecastTempHigh[5] > 27)
{
    echo "<redt>" . number_format($forecastTempHigh[5], 0);
}
else if ($forecastTempHigh[5] > 19)
{
    echo "<oranget>" . number_format($forecastTempHigh[5], 0);
}
else if ($forecastTempHigh[5] > 12.7)
{
    echo "<yellowt>" . number_format($forecastTempHigh[5], 0);
}
else if ($forecastTempHigh[5] >= 7)
{
    echo "<greent>" . number_format($forecastTempHigh[5], 0);
}
echo "°<spantemp>" . $tempunit . "</spantemp></tempicon>";

//high temp icon
if ($forecastnight == 'D')
{
    if ($tempunit == 'F' && $forecastTempHigh[5] >= 82)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
    else if ($tempunit == 'C' && $forecastTempHigh[5] >= 28)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
}
if ($forecastnight == 'N')
{
    if ($tempunit == 'F' && $forecastTempHigh[5] >= 71)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
    if ($tempunit == 'C' && $forecastTempHigh[5] >= 22)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
}

//icon
echo "<div class=iconpos> ";
if ($forecastnight[5] == 'D')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[5] . '" width="35" class="iconpos"></img></div>';
}
if ($forecastnight[5] == 'N')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[5] . '" width="35" class="iconpos"></img></div>';
}
//summary of icon
echo '<div class=greydesc>' . $wuskydesc[5] . '</div><br>';
//humidity night
if ($forecastnight[5] == 'N')
{
    echo '<div class=uvforecast><grey>';
    echo "Humidity ";
    if ($wuskyhumidity[5] >= 70)
    {
        echo "<blueu>" . $wuskyhumidity[5] . '%</blueu>';
    }
    else if ($wuskyhumidity[5] > 50)
    {
        echo "<yellowu>" . $wuskyhumidity[5] . '%</yellowu>';
    }
    else if ($wuskyhumidity[5] > 40)
    {
        echo "<greenu>" . $wuskyhumidity[5] . '%</greenu>';
    }
    else if ($wuskyhumidity[5] > 0)
    {
        echo "<redu>" . $wuskyhumidity[5] . '%</redu>';
    }
}
//uvi
else if ($forecastUV[5] > 0)
{
    echo '<div class=uvforecast><grey>' . $sunlight2 . ' UVI ';
}
if ($forecastUV[5] > 10)
{
    echo "<purpleu>" . $forecastUV[5] . '</purpleu><grey> ';
}
else if ($forecastUV[5] > 7)
{
    echo "<redu>" . $forecastUV[5] . '</redu><grey> ';
}
else if ($forecastUV[5] > 5)
{
    echo "<orangeu>" . $forecastUV[5] . '</orangeu><grey> ';
}
else if ($forecastUV[5] > 2)
{
    echo "<yellowu>" . $forecastUV[5] . '</yellowu><grey> ';
}
else if ($forecastUV[5] > 0)
{
    echo "<greenu>" . $forecastUV[5] . '</greenu><grey> ';
}
//snow
if ($forecastacumm[5] > 0)
{
    echo '&nbsp;' . $snowflakesvg[5] . '<valuer>Snow  <bluer>' . $forecastacumm[5] . 'cm</bluer>';
}
//rain
else if ($forecastPrecipType[5] = 'rain' && $rainunit == 'in')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[5], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[5] . '%</bluer>';
}
//mm
else if ($forecastPrecipType[5] = 'rain')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[5], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[5] . '%</bluer>';
}
echo "</div>";
//wind/gusts
if ($windunit == 'mph' && $forecastWindGust[5] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[5];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[5] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'mph' && $forecastWindGust[5] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[5];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[5] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
//kts
if ($windunit == 'kts' && $forecastWindGust[5] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[5];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[5] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[5] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[5];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[5] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[5] >= 0)
{
    echo "<wind>Wind <orangeu>";
    echo $forecastWinddircardinal[5];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[5] * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}
else if ($forecastWindGust[5] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[5];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[5] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($forecastWindGust[5] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[5];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[5] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($forecastWindGust[5] < 25)
{
    echo "<wind> Wind <orangeu>";
    echo $forecastWinddircardinal[5];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[5], 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}

?>  
</article>  
<article>  
   <actualt><?php
echo $forecastTime[6] ?></actualt>
 <?php //0  detailed forecast
//temp
echo "<tempicon>";
if ($tempunit == 'F' && $forecastTempHigh[6] < 44.6)
{
    echo "<bluet>" . number_format($forecastTempHigh[6], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[6] > 80.6)
{
    echo "<redt>" . number_format($forecastTempHigh[6], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[6] > 64.4)
{
    echo "<oranget>" . number_format($forecastTempHigh[6], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[6] > 55)
{
    echo "<yellowt>" . number_format($forecastTempHigh[6], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[6] >= 44.6)
{
    echo "<greent>" . number_format($forecastTempHigh[6], 0);
}
else if ($forecastTempHigh[6] < 7)
{
    echo "<bluet>" . number_format($forecastTempHigh[6], 0);
}
else if ($forecastTempHigh[6] > 27)
{
    echo "<redt>" . number_format($forecastTempHigh[6], 0);
}
else if ($forecastTempHigh[6] > 19)
{
    echo "<oranget>" . number_format($forecastTempHigh[6], 0);
}
else if ($forecastTempHigh[6] > 12.7)
{
    echo "<yellowt>" . number_format($forecastTempHigh[6], 0);
}
else if ($forecastTempHigh[6] >= 7)
{
    echo "<greent>" . number_format($forecastTempHigh[6], 0);
}
echo "°<spantemp>" . $tempunit . "</spantemp></tempicon>";

//high temp icon
if ($forecastnight == 'D')
{
    if ($tempunit == 'F' && $forecastTempHigh[6] >= 82)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
    else if ($tempunit == 'C' && $forecastTempHigh[6] >= 28)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
}
if ($forecastnight == 'N')
{
    if ($tempunit == 'F' && $forecastTempHigh[6] >= 71)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
    if ($tempunit == 'C' && $forecastTempHigh[6] >= 22)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
}

//icon
echo "<div class=iconpos> ";
if ($forecastnight[6] == 'D')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[6] . '" width="35" class="iconpos"></img></div>';
}
if ($forecastnight[6] == 'N')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[6] . '" width="35" class="iconpos"></img></div>';
}
//summary of icon
echo '<div class=greydesc>' . $wuskydesc[6] . '</div><br>';
//humidity night
if ($forecastnight[6] == 'N')
{
    echo '<div class=uvforecast><grey>';
    echo "Humidity ";
    if ($wuskyhumidity[6] >= 70)
    {
        echo "<blueu>" . $wuskyhumidity[6] . '%</blueu>';
    }
    else if ($wuskyhumidity[6] > 50)
    {
        echo "<yellowu>" . $wuskyhumidity[6] . '%</yellowu>';
    }
    else if ($wuskyhumidity[6] > 40)
    {
        echo "<greenu>" . $wuskyhumidity[6] . '%</greenu>';
    }
    else if ($wuskyhumidity[6] > 0)
    {
        echo "<redu>" . $wuskyhumidity[6] . '%</redu>';
    }
}
//uvi
else if ($forecastUV[6] > 0)
{
    echo '<div class=uvforecast><grey>' . $sunlight2 . ' UVI ';
}
if ($forecastUV[6] > 10)
{
    echo "<purpleu>" . $forecastUV[6] . '</purpleu><grey> ';
}
else if ($forecastUV[6] > 7)
{
    echo "<redu>" . $forecastUV[6] . '</redu><grey> ';
}
else if ($forecastUV[6] > 5)
{
    echo "<orangeu>" . $forecastUV[6] . '</orangeu><grey> ';
}
else if ($forecastUV[6] > 2)
{
    echo "<yellowu>" . $forecastUV[6] . '</yellowu><grey> ';
}
else if ($forecastUV[6] > 0)
{
    echo "<greenu>" . $forecastUV[6] . '</greenu><grey> ';
}
//snow
if ($forecastacumm[6] > 0)
{
    echo '&nbsp;' . $snowflakesvg[6] . '<valuer>Snow  <bluer>' . $forecastacumm[6] . 'cm</bluer>';
}
//rain
else if ($forecastPrecipType[6] = 'rain' && $rainunit == 'in')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[6], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[6] . '%</bluer>';
}
//mm
else if ($forecastPrecipType[6] = 'rain')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[6], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[6] . '%</bluer>';
}
echo "</div>";
//wind/gusts
if ($windunit == 'mph' && $forecastWindGust[6] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[6];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[6] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'mph' && $forecastWindGust[6] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[6];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[6] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
//kts
if ($windunit == 'kts' && $forecastWindGust[6] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[6];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[6] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[6] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[6];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[6] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[6] >= 0)
{
    echo "<wind>Wind <orangeu>";
    echo $forecastWinddircardinal[6];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[6] * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}
else if ($forecastWindGust[6] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[6];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[6] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($forecastWindGust[6] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[6];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[6] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($forecastWindGust[6] < 25)
{
    echo "<wind> Wind <orangeu>";
    echo $forecastWinddircardinal[6];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[6], 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}
?>  
</article> 
  <article>  
   <actualt><?php
echo $forecastTime[7] ?></actualt>
 <?php //0  detailed forecast
//temp
echo "<tempicon>";
if ($tempunit == 'F' && $forecastTempHigh[7] < 44.6)
{
    echo "<bluet>" . number_format($forecastTempHigh[7], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[7] > 80.6)
{
    echo "<redt>" . number_format($forecastTempHigh[7], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[7] > 64.4)
{
    echo "<oranget>" . number_format($forecastTempHigh[7], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[7] > 55)
{
    echo "<yellowt>" . number_format($forecastTempHigh[7], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[7] >= 44.6)
{
    echo "<greent>" . number_format($forecastTempHigh[7], 0);
}
else if ($forecastTempHigh[7] < 7)
{
    echo "<bluet>" . number_format($forecastTempHigh[7], 0);
}
else if ($forecastTempHigh[7] > 27)
{
    echo "<redt>" . number_format($forecastTempHigh[7], 0);
}
else if ($forecastTempHigh[7] > 19)
{
    echo "<oranget>" . number_format($forecastTempHigh[7], 0);
}
else if ($forecastTempHigh[7] > 12.7)
{
    echo "<yellowt>" . number_format($forecastTempHigh[7], 0);
}
else if ($forecastTempHigh[7] >= 7)
{
    echo "<greent>" . number_format($forecastTempHigh[7], 0);
}
echo "°<spantemp>" . $tempunit . "</spantemp></tempicon>";

//high temp icon
if ($forecastnight == 'D')
{
    if ($tempunit == 'F' && $forecastTempHigh[7] >= 82)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
    else if ($tempunit == 'C' && $forecastTempHigh[7] >= 28)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
}
if ($forecastnight == 'N')
{
    if ($tempunit == 'F' && $forecastTempHigh[7] >= 71)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
    if ($tempunit == 'C' && $forecastTempHigh[7] >= 22)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
}

//icon
echo "<div class=iconpos> ";
if ($forecastnight[7] == 'D')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[7] . '" width="35" class="iconpos"></img></div>';
}
if ($forecastnight[7] == 'N')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[7] . '" width="35" class="iconpos"></img></div>';
}
//summary of icon
echo '<div class=greydesc>' . $wuskydesc[7] . '</div><br>';
//humidity night
if ($forecastnight[7] == 'N')
{
    echo '<div class=uvforecast><grey>';
    echo "Humidity ";
    if ($wuskyhumidity[7] >= 70)
    {
        echo "<blueu>" . $wuskyhumidity[7] . '%</blueu>';
    }
    else if ($wuskyhumidity[7] > 50)
    {
        echo "<yellowu>" . $wuskyhumidity[7] . '%</yellowu>';
    }
    else if ($wuskyhumidity[7] > 40)
    {
        echo "<greenu>" . $wuskyhumidity[7] . '%</greenu>';
    }
    else if ($wuskyhumidity[7] > 0)
    {
        echo "<redu>" . $wuskyhumidity[7] . '%</redu>';
    }
}
//uvi
else if ($forecastUV[7] > 0)
{
    echo '<div class=uvforecast><grey>' . $sunlight2 . ' UVI ';
}
if ($forecastUV[7] > 10)
{
    echo "<purpleu>" . $forecastUV[7] . '</purpleu><grey> ';
}
else if ($forecastUV[7] > 7)
{
    echo "<redu>" . $forecastUV[7] . '</redu><grey> ';
}
else if ($forecastUV[7] > 5)
{
    echo "<orangeu>" . $forecastUV[7] . '</orangeu><grey> ';
}
else if ($forecastUV[7] > 2)
{
    echo "<yellowu>" . $forecastUV[7] . '</yellowu><grey> ';
}
else if ($forecastUV[7] > 0)
{
    echo "<greenu>" . $forecastUV[7] . '</greenu><grey> ';
}
//snow
if ($forecastacumm[7] > 0)
{
    echo '&nbsp;' . $snowflakesvg[7] . '<valuer>Snow  <bluer>' . $forecastacumm[7] . 'cm</bluer>';
}
//rain
else if ($forecastPrecipType[7] = 'rain' && $rainunit == 'in')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[7], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[7] . '%</bluer>';
}
//mm
else if ($forecastPrecipType[7] = 'rain')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[7], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[7] . '%</bluer>';
}
echo "</div>";
//wind/gusts
if ($windunit == 'mph' && $forecastWindGust[7] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[7];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[7] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'mph' && $forecastWindGust[7] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[7];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[7] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
//kts
if ($windunit == 'kts' && $forecastWindGust[7] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[7];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[7] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[7] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[7];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[7] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[7] >= 0)
{
    echo "<wind>Wind <orangeu>";
    echo $forecastWinddircardinal[7];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[7] * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}
else if ($forecastWindGust[7] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[7];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[7] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($forecastWindGust[7] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[7];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[7] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($forecastWindGust[7] < 25)
{
    echo "<wind> Wind <orangeu>";
    echo $forecastWinddircardinal[7];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[7], 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}

?>  
</article>  
<article>  
   <actualt><?php
echo $forecastTime[8] ?></actualt>
 <?php //0  detailed forecast
//temp
echo "<tempicon>";
if ($tempunit == 'F' && $forecastTempHigh[8] < 44.6)
{
    echo "<bluet>" . number_format($forecastTempHigh[8], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[8] > 80.6)
{
    echo "<redt>" . number_format($forecastTempHigh[8], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[8] > 64.4)
{
    echo "<oranget>" . number_format($forecastTempHigh[8], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[8] > 55)
{
    echo "<yellowt>" . number_format($forecastTempHigh[8], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[8] >= 44.6)
{
    echo "<greent>" . number_format($forecastTempHigh[8], 0);
}
else if ($forecastTempHigh[8] < 7)
{
    echo "<bluet>" . number_format($forecastTempHigh[8], 0);
}
else if ($forecastTempHigh[8] > 27)
{
    echo "<redt>" . number_format($forecastTempHigh[8], 0);
}
else if ($forecastTempHigh[8] > 19)
{
    echo "<oranget>" . number_format($forecastTempHigh[8], 0);
}
else if ($forecastTempHigh[8] > 12.7)
{
    echo "<yellowt>" . number_format($forecastTempHigh[8], 0);
}
else if ($forecastTempHigh[8] >= 7)
{
    echo "<greent>" . number_format($forecastTempHigh[8], 0);
}
echo "°<spantemp>" . $tempunit . "</spantemp></tempicon>";

//high temp icon
if ($forecastnight == 'D')
{
    if ($tempunit == 'F' && $forecastTempHigh[8] >= 82)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
    else if ($tempunit == 'C' && $forecastTempHigh[8] >= 28)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
}
if ($forecastnight == 'N')
{
    if ($tempunit == 'F' && $forecastTempHigh[8] >= 71)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
    if ($tempunit == 'C' && $forecastTempHigh[8] >= 22)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
}

//icon
echo "<div class=iconpos> ";
if ($forecastnight[8] == 'D')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[8] . '" width="35" class="iconpos"></img></div>';
}
if ($forecastnight[8] == 'N')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[8] . '" width="35" class="iconpos"></img></div>';
}
//summary of icon
echo '<div class=greydesc>' . $wuskydesc[8] . '</div><br>';
//humidity night
if ($forecastnight[8] == 'N')
{
    echo '<div class=uvforecast><grey>';
    echo "Humidity ";
    if ($wuskyhumidity[8] >= 70)
    {
        echo "<blueu>" . $wuskyhumidity[8] . '%</blueu>';
    }
    else if ($wuskyhumidity[8] > 50)
    {
        echo "<yellowu>" . $wuskyhumidity[8] . '%</yellowu>';
    }
    else if ($wuskyhumidity[8] > 40)
    {
        echo "<greenu>" . $wuskyhumidity[8] . '%</greenu>';
    }
    else if ($wuskyhumidity[8] > 0)
    {
        echo "<redu>" . $wuskyhumidity[8] . '%</redu>';
    }
}
//uvi
else if ($forecastUV[8] > 0)
{
    echo '<div class=uvforecast><grey>' . $sunlight2 . ' UVI ';
}
if ($forecastUV[8] > 10)
{
    echo "<purpleu>" . $forecastUV[8] . '</purpleu><grey> ';
}
else if ($forecastUV[8] > 7)
{
    echo "<redu>" . $forecastUV[8] . '</redu><grey> ';
}
else if ($forecastUV[8] > 5)
{
    echo "<orangeu>" . $forecastUV[8] . '</orangeu><grey> ';
}
else if ($forecastUV[8] > 2)
{
    echo "<yellowu>" . $forecastUV[8] . '</yellowu><grey> ';
}
else if ($forecastUV[8] > 0)
{
    echo "<greenu>" . $forecastUV[8] . '</greenu><grey> ';
}
//snow
if ($forecastacumm[8] > 0)
{
    echo '&nbsp;' . $snowflakesvg[8] . '<valuer>Snow  <bluer>' . $forecastacumm[8] . 'cm</bluer>';
}
//rain
else if ($forecastPrecipType[8] = 'rain' && $rainunit == 'in')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[8], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[8] . '%</bluer>';
}
//mm
else if ($forecastPrecipType[8] = 'rain')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[8], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[8] . '%</bluer>';
}
echo "</div>";
//wind/gusts
if ($windunit == 'mph' && $forecastWindGust[8] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[8];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[8] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'mph' && $forecastWindGust[8] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[8];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[8] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
//kts
if ($windunit == 'kts' && $forecastWindGust[8] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[8];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[8] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[8] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[8];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[8] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[8] >= 0)
{
    echo "<wind>Wind <orangeu>";
    echo $forecastWinddircardinal[8];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[8] * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}
else if ($forecastWindGust[8] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[8];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[8] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($forecastWindGust[8] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[8];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[8] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($forecastWindGust[8] < 25)
{
    echo "<wind> Wind <orangeu>";
    echo $forecastWinddircardinal[8];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[8], 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}

?>  
</article>  
<article>  
   <actualt><?php
echo $forecastTime[9] ?></actualt>
 <?php //0  detailed forecast
//temp
echo "<tempicon>";
if ($tempunit == 'F' && $forecastTempHigh[9] < 44.6)
{
    echo "<bluet>" . number_format($forecastTempHigh[9], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[9] > 80.6)
{
    echo "<redt>" . number_format($forecastTempHigh[9], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[9] > 64.4)
{
    echo "<oranget>" . number_format($forecastTempHigh[9], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[9] > 55)
{
    echo "<yellowt>" . number_format($forecastTempHigh[9], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[9] >= 44.6)
{
    echo "<greent>" . number_format($forecastTempHigh[9], 0);
}
else if ($forecastTempHigh[9] < 7)
{
    echo "<bluet>" . number_format($forecastTempHigh[9], 0);
}
else if ($forecastTempHigh[9] > 27)
{
    echo "<redt>" . number_format($forecastTempHigh[9], 0);
}
else if ($forecastTempHigh[9] > 19)
{
    echo "<oranget>" . number_format($forecastTempHigh[9], 0);
}
else if ($forecastTempHigh[9] > 12.7)
{
    echo "<yellowt>" . number_format($forecastTempHigh[9], 0);
}
else if ($forecastTempHigh[9] >= 7)
{
    echo "<greent>" . number_format($forecastTempHigh[9], 0);
}
echo "°<spantemp>" . $tempunit . "</spantemp></tempicon>";

//high temp icon
if ($forecastnight == 'D')
{
    if ($tempunit == 'F' && $forecastTempHigh[9] >= 82)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
    else if ($tempunit == 'C' && $forecastTempHigh[9] >= 28)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
}
if ($forecastnight == 'N')
{
    if ($tempunit == 'F' && $forecastTempHigh[9] >= 71)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
    if ($tempunit == 'C' && $forecastTempHigh[9] >= 22)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
}

//icon
echo "<div class=iconpos> ";
if ($forecastnight[9] == 'D')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[9] . '" width="35" class="iconpos"></img></div>';
}
if ($forecastnight[9] == 'N')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[9] . '" width="35" class="iconpos"></img></div>';
}
//summary of icon
echo '<div class=greydesc>' . $wuskydesc[9] . '</div><br>';
//humidity night
if ($forecastnight[9] == 'N')
{
    echo '<div class=uvforecast><grey>';
    echo "Humidity ";
    if ($wuskyhumidity[9] >= 70)
    {
        echo "<blueu>" . $wuskyhumidity[9] . '%</blueu>';
    }
    else if ($wuskyhumidity[9] > 50)
    {
        echo "<yellowu>" . $wuskyhumidity[9] . '%</yellowu>';
    }
    else if ($wuskyhumidity[9] > 40)
    {
        echo "<greenu>" . $wuskyhumidity[9] . '%</greenu>';
    }
    else if ($wuskyhumidity[9] > 0)
    {
        echo "<redu>" . $wuskyhumidity[9] . '%</redu>';
    }
}
//uvi
else if ($forecastUV[9] > 0)
{
    echo '<div class=uvforecast><grey>' . $sunlight2 . ' UVI ';
}
if ($forecastUV[9] > 10)
{
    echo "<purpleu>" . $forecastUV[9] . '</purpleu><grey> ';
}
else if ($forecastUV[9] > 7)
{
    echo "<redu>" . $forecastUV[9] . '</redu><grey> ';
}
else if ($forecastUV[9] > 5)
{
    echo "<orangeu>" . $forecastUV[9] . '</orangeu><grey> ';
}
else if ($forecastUV[9] > 2)
{
    echo "<yellowu>" . $forecastUV[9] . '</yellowu><grey> ';
}
else if ($forecastUV[9] > 0)
{
    echo "<greenu>" . $forecastUV[9] . '</greenu><grey> ';
}
//snow
if ($forecastacumm[9] > 0)
{
    echo '&nbsp;' . $snowflakesvg[9] . '<valuer>Snow  <bluer>' . $forecastacumm[9] . 'cm</bluer>';
}
//rain
else if ($forecastPrecipType[9] = 'rain' && $rainunit == 'in')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[9], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[9] . '%</bluer>';
}
//mm
else if ($forecastPrecipType[9] = 'rain')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[9], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[9] . '%</bluer>';
}
echo "</div>";
//wind/gusts
if ($windunit == 'mph' && $forecastWindGust[9] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[9];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[9] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'mph' && $forecastWindGust[9] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[9];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[9] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
//kts
if ($windunit == 'kts' && $forecastWindGust[9] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[9];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[9] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[9] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[9];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[9] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[9] >= 0)
{
    echo "<wind>Wind <orangeu>";
    echo $forecastWinddircardinal[9];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[9] * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}
else if ($forecastWindGust[9] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[9];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[9] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($forecastWindGust[9] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[9];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[9] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($forecastWindGust[9] < 25)
{
    echo "<wind> Wind <orangeu>";
    echo $forecastWinddircardinal[9];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[9], 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}

//thunder
//echo'</grey><rainsnow>';
//if ($wuskythunder>0){ echo $lightningalert4.' <thunder>Thunderstorms </thunder></grey>	 </value></div>';}
//else if ($forecastnight=="D" && $tempunit=='C' && $wuskyheatindex>=30){ echo $lightningalert4.' <thunder>Heat Index '.$wuskyheatindex.'°<spantemp>' .$tempunit. '</spantemp></thunder></grey>	 </value></div>';}
//else if ($forecastnight=="D" && $tempunit=='F' && $wuskyheatindex>=84.2){ echo $lightningalert4.' <thunder>Heat Index'.$wuskyheatindex.'°<spantemp>' .$tempunit. '</spantemp></thunder></grey>	 </value></div>';}

?>  
</article>  
<article>  
   <actualt><?php
echo $forecastTime[10] ?></actualt>
 <?php //0  detailed forecast
//temp
echo "<tempicon>";
if ($tempunit == 'F' && $forecastTempHigh[10] < 44.6)
{
    echo "<bluet>" . number_format($forecastTempHigh[10], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[10] > 80.6)
{
    echo "<redt>" . number_format($forecastTempHigh[10], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[10] > 64.4)
{
    echo "<oranget>" . number_format($forecastTempHigh[10], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[10] > 55)
{
    echo "<yellowt>" . number_format($forecastTempHigh[10], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[10] >= 44.6)
{
    echo "<greent>" . number_format($forecastTempHigh[10], 0);
}
else if ($forecastTempHigh[10] < 7)
{
    echo "<bluet>" . number_format($forecastTempHigh[10], 0);
}
else if ($forecastTempHigh[10] > 27)
{
    echo "<redt>" . number_format($forecastTempHigh[10], 0);
}
else if ($forecastTempHigh[10] > 19)
{
    echo "<oranget>" . number_format($forecastTempHigh[10], 0);
}
else if ($forecastTempHigh[10] > 12.7)
{
    echo "<yellowt>" . number_format($forecastTempHigh[10], 0);
}
else if ($forecastTempHigh[10] >= 7)
{
    echo "<greent>" . number_format($forecastTempHigh[10], 0);
}
echo "°<spantemp>" . $tempunit . "</spantemp></tempicon>";

//high temp icon
if ($forecastnight == 'D')
{
    if ($tempunit == 'F' && $forecastTempHigh[10] >= 82)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
    else if ($tempunit == 'C' && $forecastTempHigh[10] >= 28)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
}
if ($forecastnight == 'N')
{
    if ($tempunit == 'F' && $forecastTempHigh[10] >= 71)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
    if ($tempunit == 'C' && $forecastTempHigh[10] >= 22)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
}

//icon
echo "<div class=iconpos> ";
if ($forecastnight[10] == 'D')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[10] . '" width="35" class="iconpos"></img></div>';
}
if ($forecastnight[10] == 'N')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[10] . '" width="35" class="iconpos"></img></div>';
}
//summary of icon
echo '<div class=greydesc>' . $wuskydesc[10] . '</div><br>';
//humidity night
if ($forecastnight[10] == 'N')
{
    echo '<div class=uvforecast><grey>';
    echo "Humidity ";
    if ($wuskyhumidity[10] >= 70)
    {
        echo "<blueu>" . $wuskyhumidity[10] . '%</blueu>';
    }
    else if ($wuskyhumidity[10] > 50)
    {
        echo "<yellowu>" . $wuskyhumidity[10] . '%</yellowu>';
    }
    else if ($wuskyhumidity[10] > 40)
    {
        echo "<greenu>" . $wuskyhumidity[10] . '%</greenu>';
    }
    else if ($wuskyhumidity[10] > 0)
    {
        echo "<redu>" . $wuskyhumidity[10] . '%</redu>';
    }
}
//uvi
else if ($forecastUV[10] > 0)
{
    echo '<div class=uvforecast><grey>' . $sunlight2 . ' UVI ';
}
if ($forecastUV[10] > 10)
{
    echo "<purpleu>" . $forecastUV[10] . '</purpleu><grey> ';
}
else if ($forecastUV[10] > 7)
{
    echo "<redu>" . $forecastUV[10] . '</redu><grey> ';
}
else if ($forecastUV[10] > 5)
{
    echo "<orangeu>" . $forecastUV[10] . '</orangeu><grey> ';
}
else if ($forecastUV[10] > 2)
{
    echo "<yellowu>" . $forecastUV[10] . '</yellowu><grey> ';
}
else if ($forecastUV[10] > 0)
{
    echo "<greenu>" . $forecastUV[10] . '</greenu><grey> ';
}
//snow
if ($forecastacumm[10] > 0)
{
    echo '&nbsp;' . $snowflakesvg[10] . '<valuer>Snow  <bluer>' . $forecastacumm[10] . 'cm</bluer>';
}
//rain
else if ($forecastPrecipType[10] = 'rain' && $rainunit == 'in')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[10], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[10] . '%</bluer>';
}
//mm
else if ($forecastPrecipType[10] = 'rain')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[10], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[10] . '%</bluer>';
}
echo "</div>";
//wind/gusts
if ($windunit == 'mph' && $forecastWindGust[10] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[10];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[10] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'mph' && $forecastWindGust[10] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[10];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[10] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
//kts
if ($windunit == 'kts' && $forecastWindGust[10] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[10];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[10] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[10] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[10];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[10] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[10] >= 0)
{
    echo "<wind>Wind <orangeu>";
    echo $forecastWinddircardinal[10];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[10] * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}
else if ($forecastWindGust[10] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[10];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[10] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($forecastWindGust[10] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[10];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[10] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($forecastWindGust[10] < 25)
{
    echo "<wind> Wind <orangeu>";
    echo $forecastWinddircardinal[10];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[10], 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}

?>  
</article>  
<article>  
   <actualt><?php
echo $forecastTime[11] ?></actualt>
 <?php //0  detailed forecast
//temp
echo "<tempicon>";
if ($tempunit == 'F' && $forecastTempHigh[11] < 44.6)
{
    echo "<bluet>" . number_format($forecastTempHigh[11], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[11] > 80.6)
{
    echo "<redt>" . number_format($forecastTempHigh[11], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[11] > 64.4)
{
    echo "<oranget>" . number_format($forecastTempHigh[11], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[11] > 55)
{
    echo "<yellowt>" . number_format($forecastTempHigh[11], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[11] >= 44.6)
{
    echo "<greent>" . number_format($forecastTempHigh[11], 0);
}
else if ($forecastTempHigh[11] < 7)
{
    echo "<bluet>" . number_format($forecastTempHigh[11], 0);
}
else if ($forecastTempHigh[11] > 27)
{
    echo "<redt>" . number_format($forecastTempHigh[11], 0);
}
else if ($forecastTempHigh[11] > 19)
{
    echo "<oranget>" . number_format($forecastTempHigh[11], 0);
}
else if ($forecastTempHigh[11] > 12.7)
{
    echo "<yellowt>" . number_format($forecastTempHigh[11], 0);
}
else if ($forecastTempHigh[11] >= 7)
{
    echo "<greent>" . number_format($forecastTempHigh[11], 0);
}
echo "°<spantemp>" . $tempunit . "</spantemp></tempicon>";

//high temp icon
if ($forecastnight == 'D')
{
    if ($tempunit == 'F' && $forecastTempHigh[11] >= 82)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
    else if ($tempunit == 'C' && $forecastTempHigh[11] >= 28)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
}
if ($forecastnight == 'N')
{
    if ($tempunit == 'F' && $forecastTempHigh[11] >= 71)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
    if ($tempunit == 'C' && $forecastTempHigh[11] >= 22)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
}

//icon
echo "<div class=iconpos> ";
if ($forecastnight[11] == 'D')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[11] . '" width="35" class="iconpos"></img></div>';
}
if ($forecastnight[11] == 'N')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[11] . '" width="35" class="iconpos"></img></div>';
}
//summary of icon
echo '<div class=greydesc>' . $wuskydesc[11] . '</div><br>';
//humidity night
if ($forecastnight[11] == 'N')
{
    echo '<div class=uvforecast><grey>';
    echo "Humidity ";
    if ($wuskyhumidity[11] >= 70)
    {
        echo "<blueu>" . $wuskyhumidity[11] . '%</blueu>';
    }
    else if ($wuskyhumidity[11] > 50)
    {
        echo "<yellowu>" . $wuskyhumidity[11] . '%</yellowu>';
    }
    else if ($wuskyhumidity[11] > 40)
    {
        echo "<greenu>" . $wuskyhumidity[11] . '%</greenu>';
    }
    else if ($wuskyhumidity[11] > 0)
    {
        echo "<redu>" . $wuskyhumidity[11] . '%</redu>';
    }
}
//uvi
else if ($forecastUV[11] > 0)
{
    echo '<div class=uvforecast><grey>' . $sunlight2 . ' UVI ';
}
if ($forecastUV[11] > 10)
{
    echo "<purpleu>" . $forecastUV[11] . '</purpleu><grey> ';
}
else if ($forecastUV[11] > 7)
{
    echo "<redu>" . $forecastUV[11] . '</redu><grey> ';
}
else if ($forecastUV[11] > 5)
{
    echo "<orangeu>" . $forecastUV[11] . '</orangeu><grey> ';
}
else if ($forecastUV[11] > 2)
{
    echo "<yellowu>" . $forecastUV[11] . '</yellowu><grey> ';
}
else if ($forecastUV[11] > 0)
{
    echo "<greenu>" . $forecastUV[11] . '</greenu><grey> ';
}
//snow
if ($forecastacumm[11] > 0)
{
    echo '&nbsp;' . $snowflakesvg[11] . '<valuer>Snow  <bluer>' . $forecastacumm[11] . 'cm</bluer>';
}
//rain
else if ($forecastPrecipType[11] = 'rain' && $rainunit == 'in')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[11], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[11] . '%</bluer>';
}
//mm
else if ($forecastPrecipType[11] = 'rain')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[11], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[11] . '%</bluer>';
}
echo "</div>";
//wind/gusts
if ($windunit == 'mph' && $forecastWindGust[11] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[11];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[11] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'mph' && $forecastWindGust[11] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[11];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[11] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
//kts
if ($windunit == 'kts' && $forecastWindGust[11] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[11];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[11] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[11] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[11];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[11] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[11] >= 0)
{
    echo "<wind>Wind <orangeu>";
    echo $forecastWinddircardinal[11];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[11] * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}
else if ($forecastWindGust[11] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[11];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[11] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($forecastWindGust[11] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[11];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[11] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($forecastWindGust[11] < 25)
{
    echo "<wind> Wind <orangeu>";
    echo $forecastWinddircardinal[11];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[11], 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}

//thunder
//echo'</grey><rainsnow>';
//if ($wuskythunder>0){ echo $lightningalert4.' <thunder>Thunderstorms </thunder></grey>	 </value></div>';}
//else if ($forecastnight=="D" && $tempunit=='C' && $wuskyheatindex>=30){ echo $lightningalert4.' <thunder>Heat Index '.$wuskyheatindex.'°<spantemp>' .$tempunit. '</spantemp></thunder></grey>	 </value></div>';}
//else if ($forecastnight=="D" && $tempunit=='F' && $wuskyheatindex>=84.2){ echo $lightningalert4.' <thunder>Heat Index'.$wuskyheatindex.'°<spantemp>' .$tempunit. '</spantemp></thunder></grey>	 </value></div>';}

?>  
</article>
<article>  
   <actualt><?php
echo $forecastTime[12] ?></actualt>
 <?php //0  detailed forecast
//temp
echo "<tempicon>";
if ($tempunit == 'F' && $forecastTempHigh[12] < 44.6)
{
    echo "<bluet>" . number_format($forecastTempHigh[12], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[12] > 80.6)
{
    echo "<redt>" . number_format($forecastTempHigh[12], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[12] > 64.4)
{
    echo "<oranget>" . number_format($forecastTempHigh[12], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[12] > 55)
{
    echo "<yellowt>" . number_format($forecastTempHigh[12], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[12] >= 44.6)
{
    echo "<greent>" . number_format($forecastTempHigh[12], 0);
}
else if ($forecastTempHigh[12] < 7)
{
    echo "<bluet>" . number_format($forecastTempHigh[12], 0);
}
else if ($forecastTempHigh[12] > 27)
{
    echo "<redt>" . number_format($forecastTempHigh[12], 0);
}
else if ($forecastTempHigh[12] > 19)
{
    echo "<oranget>" . number_format($forecastTempHigh[12], 0);
}
else if ($forecastTempHigh[12] > 12.7)
{
    echo "<yellowt>" . number_format($forecastTempHigh[12], 0);
}
else if ($forecastTempHigh[12] >= 7)
{
    echo "<greent>" . number_format($forecastTempHigh[12], 0);
}
echo "°<spantemp>" . $tempunit . "</spantemp></tempicon>";

//high temp icon
if ($forecastnight == 'D')
{
    if ($tempunit == 'F' && $forecastTempHigh[12] >= 82)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
    else if ($tempunit == 'C' && $forecastTempHigh[12] >= 28)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
}
if ($forecastnight == 'N')
{
    if ($tempunit == 'F' && $forecastTempHigh[12] >= 71)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
    if ($tempunit == 'C' && $forecastTempHigh[12] >= 22)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
}

//icon
echo "<div class=iconpos> ";
if ($forecastnight[12] == 'D')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[12] . '" width="35" class="iconpos"></img></div>';
}
if ($forecastnight[12] == 'N')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[12] . '" width="35" class="iconpos"></img></div>';
}
//summary of icon
echo '<div class=greydesc>' . $wuskydesc[12] . '</div><br>';
//humidity night
if ($forecastnight[12] == 'N')
{
    echo '<div class=uvforecast><grey>';
    echo "Humidity ";
    if ($wuskyhumidity[12] >= 70)
    {
        echo "<blueu>" . $wuskyhumidity[12] . '%</blueu>';
    }
    else if ($wuskyhumidity[12] > 50)
    {
        echo "<yellowu>" . $wuskyhumidity[12] . '%</yellowu>';
    }
    else if ($wuskyhumidity[12] > 40)
    {
        echo "<greenu>" . $wuskyhumidity[12] . '%</greenu>';
    }
    else if ($wuskyhumidity[12] > 0)
    {
        echo "<redu>" . $wuskyhumidity[12] . '%</redu>';
    }
}
//uvi
else if ($forecastUV[12] > 0)
{
    echo '<div class=uvforecast><grey>' . $sunlight2 . ' UVI ';
}
if ($forecastUV[12] > 10)
{
    echo "<purpleu>" . $forecastUV[12] . '</purpleu><grey> ';
}
else if ($forecastUV[12] > 7)
{
    echo "<redu>" . $forecastUV[2] . '</redu><grey> ';
}
else if ($forecastUV[12] > 5)
{
    echo "<orangeu>" . $forecastUV[12] . '</orangeu><grey> ';
}
else if ($forecastUV[12] > 2)
{
    echo "<yellowu>" . $forecastUV[12] . '</yellowu><grey> ';
}
else if ($forecastUV[12] > 0)
{
    echo "<greenu>" . $forecastUV[12] . '</greenu><grey> ';
}
//snow
if ($forecastacumm[12] > 0)
{
    echo '&nbsp;' . $snowflakesvg[12] . '<valuer>Snow  <bluer>' . $forecastacumm[12] . 'cm</bluer>';
}
//rain
else if ($forecastPrecipType[12] = 'rain' && $rainunit == 'in')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[12], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[12] . '%</bluer>';
}
//mm
else if ($forecastPrecipType[12] = 'rain')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[12], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[12] . '%</bluer>';
}
echo "</div>";
//wind/gusts
if ($windunit == 'mph' && $forecastWindGust[12] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[12];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[12] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'mph' && $forecastWindGust[12] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[12];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[12] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
//kts
if ($windunit == 'kts' && $forecastWindGust[12] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[12];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[12] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[12] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[12];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[12] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[12] >= 0)
{
    echo "<wind>Wind <orangeu>";
    echo $forecastWinddircardinal[12];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[12] * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}
else if ($forecastWindGust[12] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[12];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[12] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($forecastWindGust[12] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[12];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[12] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($forecastWindGust[12] < 25)
{
    echo "<wind> Wind <orangeu>";
    echo $forecastWinddircardinal[12];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[12], 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}

?>  
</article>
  <article>  
   <actualt><?php
echo $forecastTime[13] ?></actualt>
 <?php //0  detailed forecast
//temp
echo "<tempicon>";
if ($tempunit == 'F' && $forecastTempHigh[13] < 44.6)
{
    echo "<bluet>" . number_format($forecastTempHigh[13], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[13] > 80.6)
{
    echo "<redt>" . number_format($forecastTempHigh[13], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[13] > 64.4)
{
    echo "<oranget>" . number_format($forecastTempHigh[13], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[13] > 55)
{
    echo "<yellowt>" . number_format($forecastTempHigh[13], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[13] >= 44.6)
{
    echo "<greent>" . number_format($forecastTempHigh[13], 0);
}
else if ($forecastTempHigh[13] < 7)
{
    echo "<bluet>" . number_format($forecastTempHigh[13], 0);
}
else if ($forecastTempHigh[13] > 27)
{
    echo "<redt>" . number_format($forecastTempHigh[13], 0);
}
else if ($forecastTempHigh[13] > 19)
{
    echo "<oranget>" . number_format($forecastTempHigh[13], 0);
}
else if ($forecastTempHigh[13] > 12.7)
{
    echo "<yellowt>" . number_format($forecastTempHigh[13], 0);
}
else if ($forecastTempHigh[13] >= 7)
{
    echo "<greent>" . number_format($forecastTempHigh[13], 0);
}
echo "°<spantemp>" . $tempunit . "</spantemp></tempicon>";

//high temp icon
if ($forecastnight == 'D')
{
    if ($tempunit == 'F' && $forecastTempHigh[13] >= 82)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
    else if ($tempunit == 'C' && $forecastTempHigh[13] >= 28)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
}
if ($forecastnight == 'N')
{
    if ($tempunit == 'F' && $forecastTempHigh[13] >= 71)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
    if ($tempunit == 'C' && $forecastTempHigh[13] >= 22)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
}

//icon
echo "<div class=iconpos> ";
if ($forecastnight[13] == 'D')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[13] . '" width="35" class="iconpos"></img></div>';
}
if ($forecastnight[13] == 'N')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[13] . '" width="35" class="iconpos"></img></div>';
}
//summary of icon
echo '<div class=greydesc>' . $wuskydesc[13] . '</div><br>';
//humidity night
if ($forecastnight[13] == 'N')
{
    echo '<div class=uvforecast><grey>';
    echo "Humidity ";
    if ($wuskyhumidity[13] >= 70)
    {
        echo "<blueu>" . $wuskyhumidity[13] . '%</blueu>';
    }
    else if ($wuskyhumidity[13] > 50)
    {
        echo "<yellowu>" . $wuskyhumidity[13] . '%</yellowu>';
    }
    else if ($wuskyhumidity[13] > 40)
    {
        echo "<greenu>" . $wuskyhumidity[13] . '%</greenu>';
    }
    else if ($wuskyhumidity[13] > 0)
    {
        echo "<redu>" . $wuskyhumidity[13] . '%</redu>';
    }
}
//uvi
else if ($forecastUV[13] > 0)
{
    echo '<div class=uvforecast><grey>' . $sunlight2 . ' UVI ';
}
if ($forecastUV[13] > 10)
{
    echo "<purpleu>" . $forecastUV[13] . '</purpleu><grey> ';
}
else if ($forecastUV[13] > 7)
{
    echo "<redu>" . $forecastUV[13] . '</redu><grey> ';
}
else if ($forecastUV[13] > 5)
{
    echo "<orangeu>" . $forecastUV[13] . '</orangeu><grey> ';
}
else if ($forecastUV[13] > 2)
{
    echo "<yellowu>" . $forecastUV[13] . '</yellowu><grey> ';
}
else if ($forecastUV[13] > 0)
{
    echo "<greenu>" . $forecastUV[13] . '</greenu><grey> ';
}
//snow
if ($forecastacumm[13] > 0)
{
    echo '&nbsp;' . $snowflakesvg[13] . '<valuer>Snow  <bluer>' . $forecastacumm[13] . 'cm</bluer>';
}
//rain
else if ($forecastPrecipType[13] = 'rain' && $rainunit == 'in')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[13], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[13] . '%</bluer>';
}
//mm
else if ($forecastPrecipType[13] = 'rain')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[13], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[13] . '%</bluer>';
}
echo "</div>";
//wind/gusts
if ($windunit == 'mph' && $forecastWindGust[13] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[13];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[13] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'mph' && $forecastWindGust[13] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[13];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[13] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
//kts
if ($windunit == 'kts' && $forecastWindGust[13] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[13];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[13] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[13] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[13];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[13] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[13] >= 0)
{
    echo "<wind>Wind <orangeu>";
    echo $forecastWinddircardinal[13];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[13] * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}
else if ($forecastWindGust[13] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[13];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[13] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($forecastWindGust[13] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[13];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[13] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($forecastWindGust[13] < 25)
{
    echo "<wind> Wind <orangeu>";
    echo $forecastWinddircardinal[13];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[13], 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}
?>  
</article>
  <article>  
   <actualt><?php
echo $forecastTime[14] ?></actualt>
 <?php //0  detailed forecast
//temp
echo "<tempicon>";
if ($tempunit == 'F' && $forecastTempHigh[14] < 44.6)
{
    echo "<bluet>" . number_format($forecastTempHigh[14], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[14] > 80.6)
{
    echo "<redt>" . number_format($forecastTempHigh[14], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[14] > 64.4)
{
    echo "<oranget>" . number_format($forecastTempHigh[14], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[14] > 55)
{
    echo "<yellowt>" . number_format($forecastTempHigh[14], 0);
}
else if ($tempunit == 'F' && $forecastTempHigh[14] >= 44.6)
{
    echo "<greent>" . number_format($forecastTempHigh[14], 0);
}
else if ($forecastTempHigh[14] < 7)
{
    echo "<bluet>" . number_format($forecastTempHigh[14], 0);
}
else if ($forecastTempHigh[14] > 27)
{
    echo "<redt>" . number_format($forecastTempHigh[14], 0);
}
else if ($forecastTempHigh[14] > 19)
{
    echo "<oranget>" . number_format($forecastTempHigh[14], 0);
}
else if ($forecastTempHigh[14] > 12.7)
{
    echo "<yellowt>" . number_format($forecastTempHigh[14], 0);
}
else if ($forecastTempHigh[14] >= 7)
{
    echo "<greent>" . number_format($forecastTempHigh[14], 0);
}
echo "°<spantemp>" . $tempunit . "</spantemp></tempicon>";

//high temp icon
if ($forecastnight == 'D')
{
    if ($tempunit == 'F' && $forecastTempHigh[14] >= 82)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
    else if ($tempunit == 'C' && $forecastTempHigh[14] >= 28)
    {
        echo "<img src='css/aqi/daywarm.svg' width='40px' class='tempalerticon'> ";
    }
}
if ($forecastnight == 'N')
{
    if ($tempunit == 'F' && $forecastTempHigh[14] >= 71)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
    if ($tempunit == 'C' && $forecastTempHigh[14] >= 22)
    {
        echo "<img src='css/aqi/nightwarm.svg' width='40px' class='tempalerticon'> ";
    }
}

//icon
echo "<div class=iconpos> ";
if ($forecastnight[14] == 'D')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[14] . '" width="35" class="iconpos"></img></div>';
}
if ($forecastnight[14] == 'N')
{
    echo '<img src="css/aerisicons/' . $forecastIcon[14] . '" width="35" class="iconpos"></img></div>';
}
//summary of icon
echo '<div class=greydesc>' . $wuskydesc[14] . '</div><br>';
//humidity night
if ($forecastnight[14] == 'N')
{
    echo '<div class=uvforecast><grey>';
    echo "Humidity ";
    if ($wuskyhumidity[14] >= 70)
    {
        echo "<blueu>" . $wuskyhumidity[14] . '%</blueu>';
    }
    else if ($wuskyhumidity[14] > 50)
    {
        echo "<yellowu>" . $wuskyhumidity[14] . '%</yellowu>';
    }
    else if ($wuskyhumidity[14] > 40)
    {
        echo "<greenu>" . $wuskyhumidity[14] . '%</greenu>';
    }
    else if ($wuskyhumidity[14] > 0)
    {
        echo "<redu>" . $wuskyhumidity[14] . '%</redu>';
    }
}
//uvi
else if ($forecastUV[14] > 0)
{
    echo '<div class=uvforecast><grey>' . $sunlight2 . ' UVI ';
}
if ($forecastUV[14] > 10)
{
    echo "<purpleu>" . $forecastUV[14] . '</purpleu><grey> ';
}
else if ($forecastUV[14] > 7)
{
    echo "<redu>" . $forecastUV[14] . '</redu><grey> ';
}
else if ($forecastUV[14] > 5)
{
    echo "<orangeu>" . $forecastUV[14] . '</orangeu><grey> ';
}
else if ($forecastUV[14] > 2)
{
    echo "<yellowu>" . $forecastUV[14] . '</yellowu><grey> ';
}
else if ($forecastUV[14] > 0)
{
    echo "<greenu>" . $forecastUV[14] . '</greenu><grey> ';
}
//snow
if ($forecastacumm[14] > 0)
{
    echo '&nbsp;' . $snowflakesvg[14] . '<valuer>Snow  <bluer>' . $forecastacumm[14] . 'cm</bluer>';
}
//rain
else if ($forecastPrecipType[14] = 'rain' && $rainunit == 'in')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[14], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[14] . '%</bluer>';
}
//mm
else if ($forecastPrecipType[14] = 'rain')
{
    echo '&nbsp;' . $rainsvg . '<valuer>Rain <bluer>' . number_format($forecastprecipIntensity[14], 1) . '&nbsp;' . $rainunit . '&nbsp;' . $forecastPrecipProb[14] . '%</bluer>';
}
echo "</div>";
//wind/gusts
if ($windunit == 'mph' && $forecastWindGust[14] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[14];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[14] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'mph' && $forecastWindGust[14] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[14];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[14] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
//kts
if ($windunit == 'kts' && $forecastWindGust[14] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[14];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[14] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[14] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[14];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[14] * 1.625 * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($windunit == 'kts' && $forecastWindGust[14] >= 0)
{
    echo "<wind>Wind <orangeu>";
    echo $forecastWinddircardinal[14];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[14] * 0.868976, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}
else if ($forecastWindGust[14] >= 30)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[14];
    echo "</orangeu>&nbsp;<redu>" . number_format($forecastWindGust[14] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></redu></wind>';
}
else if ($forecastWindGust[14] >= 25)
{
    echo "<wind>Gust <orangeu>";
    echo $forecastWinddircardinal[14];
    echo "</orangeu>&nbsp;<orangeu>" . number_format($forecastWindGust[14] * 1.625, 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></orangeu></wind>';
}
else if ($forecastWindGust[14] < 25)
{
    echo "<wind> Wind <orangeu>";
    echo $forecastWinddircardinal[14];
    echo "</orangeu>&nbsp;<blueu>" . number_format($forecastWindGust[14], 0) , "&nbsp;<wuunits>" . $windunit;
    echo '</wuunits></blueu></wind>';
}
?>  
</article>
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
