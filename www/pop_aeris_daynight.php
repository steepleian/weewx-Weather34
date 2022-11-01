<?php
//###################################################################################################################
//	weewx-Weather34 Template maintained by Ian Millard (Steepleian)                                 				#
//	                                                                                                				#
//  Contains original legacy code (by agreement) created and developed by Brian Underdown (https://weather34.com)   #
//  for the (now superseeded) original Weather34 Template which is no longer maintained by its creator              #
//  © weather34.com original CSS/SVG/PHP 2015-2019                                                                  #
// 	                                                                                                				#
//  Contains original code by Ian Millard and collaborators															#
//  © claydonsweather.org.uk original CSS/SVG/PHP 2020-2021                                                         #
// 	                                                                                                				#
// 	Issues for weewx-Weather34 template should be addressed to https://github.com/steepleian/weewx-Weather34/issues #                                                                                              #
// 	                                                                                                				#
//###################################################################################################################
include_once ('settings.php');
include ('w34CombinedData.php');
$iconset = "icon2";
//start the aw output

if($theme==="dark"){echo '<style>@font-face{font-family:weathertext2;src:url(css/fonts/verbatim-regular.woff) format("woff"),url(css/fonts/verbatim-regular.woff2) format("woff2"),url(css/fonts/verbatim-regular.ttf) format("truetype")}html,body{font-size:13px;font-family:"weathertext2",Helvetica,Arial,sans-serif;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));grid-gap:5px;align-items:stretch;color:#f5f7fc}.grid>article{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:hsla(233,12%,13%,.5)}.grid>article img{max-width:100%}.grid>article rainsnow{vertical-align:bottom;float:right}.grid>article actualt{vertical-align:top;-webkit-border-radius:2px;border-radius:2px;background:0;font-family:Arial,Helvetica,sans-serif;padding:1px 3px 1px 3px;width:max-content;font-size:.9rem;color:#fff;align-items:center;justify-content:center;margin-bottom:10px;top:-2px;display:flex}.grid>article actualtn{vertical-align:top;-webkit-border-radius:2px;border-radius:2px;background:0;font-family:Arial,Helvetica,sans-serif;padding:1px 3px 1px 3px;width:max-content;font-size:.9rem;color:#fff;align-items:center;justify-content:center;margin-bottom:10px;top:-2px;display:flex}.grid>article tempicon{vertical-align:top;float:right;font-size:1.1em;margin-top:-20px;margin-right:20px}.grid>article .summarytext{font-size:.9em;color:#aaa;margin-bottom:0;height:50px;line-height:10px;font-family:Arial,Helvetica,sans-serif}a{color:#aaa;text-decoration:none}.weather34darkbrowser{position:relative;background:0;width:97%;height:30px;margin:auto;margin-top:-5px;margin-left:0;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px}.weather34darkbrowser[url]:after{content:attr(url);color:#fff;font-size:14px;text-align:center;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;font-family:arial;height:20px}blue{color:#01a4b4}orange{color:#009bb4}orange1{color:rgba(255,131,47,1)}green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#cc0}purple{color:#916392}smalluvunit{font-size:.6rem;font-family:Arial,Helvetica,system}.hitempy{position:relative;background:rgba(61,64,66,.5);color:#fff;font-size:12px;width:110px;padding:1px;-webit-border-radius:2px;border-radius:2px;margin-top:-44px;margin-left:72px;padding:2px;line-height:10px;font-size:9px}.svgimage{background:rgba(0,155,171,1);-webit-border-radius:2px;border-radius:2px}orange1{color:#aaa}.greydesc{color:#fff;margin-left:60px;margin-top:-35px;position:absolute;font-size:1em}.none{float:none;margin-top:10px;position:absolute}spantemp{font-size:.75em;color:#fff;font-family:weathertext2}.tempicon{position:relative;font-family:weathertext2;margin-top:4px;margin-left:125px}.uvforecast{font-size:.8rem;color:#fff;font-family:Arial,Helvetica;line-height:auto;margin-top:-15px;margin-bottom:5px}.storm{font-size:.8rem;color:silver;font-family:Arial,Helvetica;line-height:auto;margin-top:5px;margin-bottom:2px}.iconpos{margin-top:-4px;margin-bottom:0}bluer{color:#fff;border-radius:2px;padding:0 2px 0 2px;align-items:center;justify-content:center;background:rgba(0,155,180,.6)}bluet,blueu{background:#01a4b5}yellowt,yellowu{background:#e6a141}oranget,orangeu{background:#d05f2d}greent{background:#90b12a}greenu{background:#565f67}redt,redu{background:#cd5245}purplet,purpleu{background:rgba(151,88,190,.8)}bluet,yellowt,oranget,greent,redt,purplet{-webkit-border-radius:2px;border-radius:2px;padding:2px;height:.9rem}blueu,yellowu,orangeu,greenu,redu,purpleu{color:#fff;border-radius:2px;padding:0 3px 0 3px;align-items:center;justify-content:center}summary{font-size:.9em;color:#aaa;display:none}blue1{color:#009bb4}value{font-size:.95em;color:#aaa}valuer{color:#fff;font-size:.9em}thunder{font-size:.9em;color:#aaa}wind{color:#fff;font-size:.9em}.grid>article_small{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:hsla(233,12%,13%,.5)}</style>';}
else if($theme==="light"){echo '<style>@font-face{font-family:weathertext2;src:url(css/fonts/verbatim-regular.woff) format("woff"),url(css/fonts/verbatim-regular.woff2) format("woff2"),url(css/fonts/verbatim-regular.ttf) format("truetype")}html,body{background-color:#fff;font-size:13px;font-family:"weathertext2",Helvetica,Arial,sans-serif;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));grid-gap:5px;align-items:stretch;color:#f5f7fc}.grid>article{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:hsla(233,12%,13%,.5);background-color:#fff;color:#000}.grid>article img{max-width:100%}.grid>article rainsnow{vertical-align:bottom;float:right}.grid>article actualt{vertical-align:top;-webkit-border-radius:2px;border-radius:2px;background:0;font-family:Arial,Helvetica,sans-serif;padding:1px 3px 1px 3px;width:max-content;font-size:.9rem;color:#fff;align-items:center;justify-content:center;margin-bottom:10px;top:-2px;display:flex}.grid>article actualtn{vertical-align:top;-webkit-border-radius:2px;border-radius:2px;background:0;font-family:Arial,Helvetica,sans-serif;padding:1px 3px 1px 3px;width:max-content;font-size:.9rem;color:#fff;align-items:center;justify-content:center;margin-bottom:10px;top:-2px;display:flex}.grid>article tempicon{vertical-align:top;float:right;font-size:1.1em;margin-top:-20px;margin-right:20px}.grid>article .summarytext{font-size:.9em;color:#aaa;margin-bottom:0;height:50px;line-height:10px;font-family:Arial,Helvetica,sans-serif}a{color:#aaa;text-decoration:none}.weather34darkbrowser{position:relative;background:0;width:97%;height:30px;margin:auto;margin-top:-5px;margin-left:0;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px}.weather34darkbrowser[url]:after{content:attr(url);color:#000;font-size:14px;text-align:center;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;font-family:arial;height:20px}blue{color:#01a4b4}orange{color:#009bb4}orange1{color:rgba(255,131,47,1)}green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#cc0}purple{color:#916392}smalluvunit{font-size:.6rem;font-family:Arial,Helvetica,system}.hitempy{position:relative;background:rgba(61,64,66,.5);color:#fff;font-size:12px;width:110px;padding:1px;-webit-border-radius:2px;border-radius:2px;margin-top:-44px;margin-left:72px;padding:2px;line-height:10px;font-size:9px}.svgimage{background:rgba(0,155,171,1);-webit-border-radius:2px;border-radius:2px}orange1{color:#aaa}.greydesc{color:#000;margin-left:60px;margin-top:-35px;position:absolute;font-size:1em}.none{float:none;margin-top:10px;position:absolute}spantemp{font-size:.75em;color:#fff;font-family:weathertext2}.tempicon{position:relative;font-family:weathertext2;margin-top:4px;margin-left:125px}.uvforecast{font-size:.8rem;color:#000;font-family:Arial,Helvetica;line-height:auto;margin-top:-15px;margin-bottom:5px}.storm{font-size:.8rem;color:silver;font-family:Arial,Helvetica;line-height:auto;margin-top:5px;margin-bottom:2px}.iconpos{margin-top:-4px;margin-bottom:0}bluer{color:#fff;border-radius:2px;padding:0 2px 0 2px;align-items:center;justify-content:center;background:rgba(0,155,180,.6)}bluet,blueu{background:#01a4b5}yellowt,yellowu{background:#e6a141}oranget,orangeu{background:#d05f2d}greent{background:#90b12a}greenu{background:#565f67}redt,redu{background:#cd5245}purplet,purpleu{background:rgba(151,88,190,.8)}bluet,yellowt,oranget,greent,redt,purplet{-webkit-border-radius:2px;border-radius:2px;padding:2px;height:.9rem}blueu,yellowu,orangeu,greenu,redu,purpleu{color:#fff;border-radius:2px;padding:0 3px 0 3px;align-items:center;justify-content:center}summary{font-size:.9em;color:#aaa;display:none}blue1{color:#009bb4}value{font-size:.95em;color:#aaa}valuer{color:#000;font-size:.9em}thunder{font-size:.9em;color:#aaa}wind{color:#000;font-size:.9em}.gridw{display:grid;grid-template-columns:repeat(auto-fill,minmax(600px,1fr));grid-gap:5px;align-items:stretch;color:#f5f7fc}.gridw>articlew{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:hsla(233,12%,13%,.5);background-color:#fff;color:#000}</style>';}
?>


<script src="js/jquery.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>AerisWeather Day and Night Forecast</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


<body>
<?php
$forecastime = filemtime('jsondata/awd.txt'); ?>
 
  
<main class="grid">
  <?php
$jsonIcon = 'jsondata/lookupTable.json';
$jsonIcon = file_get_contents($jsonIcon);
$parsed_icon = json_decode($jsonIcon, true);
$forecastime = filemtime('jsondata/awd.txt');
$json = 'jsondata/awd.txt';
$json = file_get_contents($json);
$parsed_json = json_decode($json, true);
for ($k = 0;$k < 12;$k++)
{
	$pngicon[$k] = $parsed_json['response'][0]['periods'][$k]['icon'];
    $forecastIcon[$k] = $parsed_icon[$pngicon[$k]][$iconset];
    $Time[$k] = date("H", $parsed_json['response'][0]['periods'][$k]['timestamp']);
    $nameDay[$k] = date("l", $parsed_json['response'][0]['periods'][$k]['timestamp']);
    //for ($l = 3; $l < 12; $l++) {$nameDay[$l] = date("l", $parsed_json['response'][0]['periods'][$l]['timestamp']);
    //}
    if ($Time[0] === "07")
    {
        $forecastTime[0] = "Today";
        $forecastTime[1] = "Tonight";
        $forecastTime[2] = "Tomorrow";
        $forecastTime[3] = "Tomorrow Night";
        $forecastTime[4] = $nameDay[4];
        $forecastTime[5] = $nameDay[5] . " Night";
        $forecastTime[6] = $nameDay[6];
        $forecastTime[7] = $nameDay[7] . " Night";
        $forecastTime[8] = $nameDay[8];
        $forecastTime[9] = $nameDay[9] . " Night";
        $forecastTime[10] = $nameDay[10];
        $forecastTime[11] = $nameDay[11] . " Night";
    }
    else if ($Time[0] === "19")
    {
        $forecastTime[0] = "Tonight";
        $forecastTime[1] = "Tomorrow";
        $forecastTime[2] = "Tomorrow Night";
        $forecastTime[3] = $nameDay[3];
        $forecastTime[4] = $nameDay[4] . " Night";
        $forecastTime[5] = $nameDay[5];
        $forecastTime[6] = $nameDay[6] . " Night";
        $forecastTime[7] = $nameDay[7];
        $forecastTime[8] = $nameDay[8] . " Night";
        $forecastTime[9] = $nameDay[9];
        $forecastTime[10] = $nameDay[10] . " Night";
        $forecastTime[11] = $nameDay[11];
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
    if ($forecastTempHigh[$k] === null)
    {
        $forecastTempHigh[$k] = $forecastTempLow[$k];
    }
    //aw convert temps-rain
    //metric to F
    if ($tempunit == 'F')
    {
        $forecastTempHigh[$k] = round(($forecastTempHigh[$k] * 9 / 5) + 32, 0);
    }

    //heatindex
    if ($tempunit == 'F')
    {
        $forecastheatindex[$k] = ($forecastheatindex[$k] * 9 / 5) + 32;
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
        echo '<img src="css/svg/' . $forecastIcon[$k] . '" width="19%" class="iconpos"></img></div>';
    }
    if ($forecastnight[$k] == 'N')
    {
        echo '<img src="css/svg/' . $forecastIcon[$k] . '" width="19%" class="iconpos"></img></div>';
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
<?php
} ?>
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
  <?php echo $knfo ?> Data for Forecast provided by <a href="https://www.aerisweather.com/develop/api/" title="AerisWeather API" target="_blank">AerisWeather</a></span></br>
    <span style="font-size:9px;color:<?php echo $text1 ?>;">
  <?php echo $knfo ?> Icons for Forecast provided by <a href="https://github.com/nrkno/yr-weather-symbols/tree/master/dist/svg" title="YR" target="_blank">Yr.no</a></span>
 
    </article>
</main>
  </div>
  </body>
  </html>
