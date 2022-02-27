<?php
//###################################################################################################################
//	weewx-Weather34 Template maintained by Ian Millard (Steepleian)                                 				#
//	                                                                                                				#
//  Contains original code by Ian Millard and collaborators															#
//  © claydonsweather.org.uk original CSS/SVG/PHP 2020-2021                                                            #
// 	                                                                                                				#
// 	Issues for weewx-Weather34 template should be addressed to https://github.com/steepleian/weewx-Weather34/issues #                                                                                              #
// 	                                                                                                				#
//###################################################################################################################
include_once ('settings.php');
include ('w34CombinedData.php');
date_default_timezone_set($TZ);
if ($theme === "dark")
{
    echo '<style>.demo{border:0 solid #aaa;border-collapse:collapse;padding:50px;font-family:arial,helvetica,verdana,sans-serif;font-size:10px;margin-bottom:50px;margin-top:50px margin-left:50%;margin-right:-50%;width:100%;color:silver}.demo th{border-bottom:.5px solid #aaa;/*! border-top:1px solid #aaa; */
 padding:5px;color:silver}.demo td{border:0 solid #aaa;padding:0;background:0;text-align:center}.demo td#CELL1{background-color:transparent;color:#000}.demo td#CELL2{background-color:#9cff9c}.demo td#CELL3{background-color:#31ff00}.demo td#CELL4{background-color:#31cf00}.demo td#CELL5{background-color:#ff0}.demo td#CELL6{background-color:#ffcf00}.demo td#CELL7{background-color:#ff9a00}.demo td#CELL8{background-color:#ff6464}.demo td#CELL9{background-color:red;color:#fff}.demo td#CELL10{background-color:#900;color:#fff}.demo td#CELL11{background-color:#ce30ff;color:#fff}img{margin-left:10px;margin-right:10px;width:60px;background-color:transparent}.alert-row{display:flex;flex-direction:row;height:120px;padding:10px 0;background-color:whitesmoke}.alert-row-narrow{display:flex;flex-direction:row;height:60px;padding:10px 0;background-color:whitesmoke;font-size:12px}.alert-row-info{display:flex;flex-direction:row;height:120px;padding:10px 0;background-color:whitesmoke}.alert-text-container{font-family:Arial,Helvetica,sans-serif;font-size:11px;display:flex;flex-direction:column;justify-content:center;margin-right:10px;color:#000}.alert-text-container-narrow{font-family:Arial,Helvetica,sans-serif;font-size:14px;display:flex;flex-direction:column;justify-content:center;margin-right:10px}body{background-image:url();margin-left:8px;margin-top:8px;margin-right:8px;margin-bottom:8px;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px;color:#fff;font-weight:400;background-color:rgba(33,34,39,.8)}html{margin:0;padding:0}a:link{color:#fff}a:visited{color:#fff}a:hover{color:#fff}a:active{color:#fff}.LegendText2{font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px;color:#fff;font-weight:400}.Ebene3Header{font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px}table{font-size:11px;vertical-align:bottom;width:auto}.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));grid-gap:5px;align-items:stretch;color:#f5f7fc;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid>article{border:1px solid #212428;box-shadow:2px 2px 6px 0 rgba(0,0,0,.3);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid1{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:5px;color:#000}.grid2{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:0;color:#000}.grid3{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:20px;color:#000}.grid1>articlegraph{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100%}.grid2>articlegraph2{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100%}.grid3>articlegraph3{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.grid1>articlegraph_lg{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:lightgreen;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:80px}.grid3>articlegraph3{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:0;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.grid3>articlegraphText{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#f5f7fc;color:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.grid1>articlegraph_te{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:teal;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:15px}.grid1>articlegraph_ye{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:yellow;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:80px}.grid1>articlegraph_or{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:orange;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90px}.grid1>articlegraph_re{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:red;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100px}.grid_FT{display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));grid-gap:1px;align-items:stretch;color:#f5f7fc;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid_FT>articlegraph_FT{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;color:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:15px}.grid_MET{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:5px;color:#000}.grid_MET>articlegraph_MET{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.weather34darkbrowser{position:relative;width:97%;height:30px;margin:auto;margin-top:-5px;margin-left:0;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px;color:#fff}.weather34darkbrowser[url]:after{content:attr(url);font-size:14px;text-align:center;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;font-family:arial;height:20px}.actualt{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:teal;padding:5px;font-family:Arial,Helvetica,sans-serif;width:790px;height:.8em;font-size:.8rem;padding-top:2px;color:#fff;border-bottom:2px solid rgba(56,56,60,1);align-items:center;justify-content:center;margin-bottom:0;top:0}blue{color:#01a4b4}orange{color:#009bb4}orange1{color:rgba(255,131,47,1)}green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#cc0}purple{color:#916392}.roundcornerframe{position:relative;width:790px;border-radius:5px;overflow:hidden;margin:0 auto 0 auto}.ol_time{margin-top:-15px;margin-right:6px;color:#d65b4a;font:700 10px arial,sans-serif;line-height:10px;float:right}.left{float:left;width:80px;padding-left:2px;height:160px;border:none}.right{float:left;width:80px;padding-right:2px;height:160px;border:none}.middle{float:left;width:140px;position:relative;height:160px;border:none}.2_high{height:80px;vertical-align:middle}.3_high{height:53px;vertical-align:middle}.4_high{height:40px;vertical-align:middle}.uv{color:#000}.webcamlarge{-webkit-border-radius:4px;-moz-border-radius:4px;-o-border-radius:4px;-ms-border-radius:4px;border-radius:4px;border:solid RGBA(84,85,86,1) 2px;width:98%;height:380px}
    </style>';
}
else if ($theme === "light")
{
    echo '<style>.demo{border:0 solid #aaa;border-collapse:collapse;padding:50px;font-family:arial,helvetica,verdana,sans-serif;font-size:10px;margin-bottom:50px;margin-top:50px margin-left:50%;margin-right:-50%;width:100%;color:#000}.demo th{border-bottom:1px solid #aaa;/*! border-top:1px solid #aaa; */
 padding:5px;color:#000}.demo td{border:0 solid #aaa;padding:0;background:#FFF;text-align:center}.demo td#CELL1{background-color:transparent;color:#000}.demo td#CELL2{background-color:#9cff9c}.demo td#CELL3{background-color:#31ff00}.demo td#CELL4{background-color:#31cf00}.demo td#CELL5{background-color:#ff0}.demo td#CELL6{background-color:#ffcf00}.demo td#CELL7{background-color:#ff9a00}.demo td#CELL8{background-color:#ff6464}.demo td#CELL9{background-color:red;color:#fff}.demo td#CELL10{background-color:#900;color:#fff}.demo td#CELL11{background-color:#ce30ff;color:#fff}img{margin-left:10px;margin-right:10px;width:60px;background-color:transparent}.alert-row{display:flex;flex-direction:row;height:120px;padding:10px 0;background-color:whitesmoke}.alert-row-narrow{display:flex;flex-direction:row;height:60px;padding:10px 0;background-color:whitesmoke;font-size:12px}.alert-row-info{display:flex;flex-direction:row;height:120px;padding:10px 0;background-color:whitesmoke}.alert-text-container{font-family:Arial,Helvetica,sans-serif;font-size:11px;display:flex;flex-direction:column;justify-content:center;margin-right:10px;color:#000}.alert-text-container-narrow{font-family:Arial,Helvetica,sans-serif;font-size:14px;display:flex;flex-direction:column;justify-content:center;margin-right:10px}body{background-image:url();margin-left:8px;margin-top:8px;margin-right:8px;margin-bottom:8px;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px;color:#fff;font-weight:400;background-color:#fff}html{margin:0;padding:0}a:link{color:#000}a:visited{color:#000}a:hover{color:#000}a:active{color:#000}.LegendText2{font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px;color:#000;font-weight:400}.Ebene3Header{font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px}table{font-size:11px;vertical-align:bottom;width:auto}.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));grid-gap:5px;align-items:stretch;color:#f5f7fc;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid>article{border:1px solid #212428;box-shadow:2px 2px 6px 0 rgba(0,0,0,.3);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid1{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:5px;color:#000}.grid2{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:0;color:#000}.grid3{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:20px;color:#000}.grid1>articlegraph{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100%}.grid2>articlegraph2{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100%}.grid3>articlegraph3{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.grid3>articlegraph4{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.grid1>articlegraph_lg{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:lightgreen;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:80px}.grid1>articlegraph_te{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:teal;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:15px}.grid1>articlegraph_ye{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:yellow;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:80px}.grid1>articlegraph_or{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:orange;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90px}.grid1>articlegraph_re{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:red;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100px}.grid_FT{display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));grid-gap:1px;align-items:stretch;color:#f5f7fc;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid_FT>articlegraph_FT{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;color:#000;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:15px}.grid_MET{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:5px;color:#000}.grid_MET>articlegraph_MET{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.weather34darkbrowser{position:relative;width:97%;height:30px;margin:auto;margin-top:-5px;margin-left:0;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px;color:#000}.weather34darkbrowser[url]:after{content:attr(url);font-size:14px;text-align:center;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;font-family:arial;height:20px}.actualt{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:teal;padding:5px;font-family:Arial,Helvetica,sans-serif;width:790px;height:.8em;font-size:.8rem;padding-top:2px;color:#fff;border-bottom:2px solid rgba(56,56,60,1);align-items:center;justify-content:center;margin-bottom:0;top:0}blue{color:#01a4b4}orange{color:#009bb4}orange1{color:rgba(255,131,47,1)}green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#cc0}purple{color:#916392}.roundcornerframe{position:relative;width:790px;border-radius:5px;overflow:hidden;margin:0 auto 0 auto}.webcamlarge{-webkit-border-radius:4px;-moz-border-radius:4px;-o-border-radius:4px;-ms-border-radius:4px;border-radius:4px;border:solid RGBA(84,85,86,1) 2px;width:97%;height:480px}
    </style>';
}
$forecastTime[0] = "0";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hourly Forecast</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php
$jsonLookup = 'jsondata/lookupTable.json';
$jsonLookup = file_get_contents($jsonLookup);
$parsed_lookup = json_decode($jsonLookup, true);
$forecastime = filemtime('jsondata/no.txt');
$json = 'jsondata/no.txt';
$json = file_get_contents($json);
$parsed_json = json_decode($json, true);
for ($k = 0;$k < 24;$k++)
{   $pngicon[$k] = $parsed_json['properties']['timeseries'][$k]['data']['next_1_hours']['summary']['symbol_code'];
    $forecastIcon[$k] = $parsed_lookup[$pngicon[$k]]['icon'];
    $forecastSummary[$k] = $parsed_lookup[$pngicon[$k]]['summary'];
    $forecastTime[$k] = date("H:i", strtotime($parsed_json['properties']['timeseries'][$k]['time']." UTC"));
    $forecastTempHigh[$k] = $parsed_json['properties']['timeseries'][$k]['data']['instant']['details']['air_temperature'];
    
    
    $forecastWindSpeedMax[$k] = $parsed_json['properties']['timeseries'][$k]['data']['instant']['details']['wind_speed'];
    

    $forecastWindDir[$k] = $parsed_json['properties']['timeseries'][$k]['data']['instant']['details']['wind_from_direction'];
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
    $forecastprecipIntensity[$k] = $parsed_json['properties']['timeseries'][$k]['data']['next_1_hours']['details']['precipitation_amount'];
    $forecastPrecipProb[$k] = $parsed_json['response'][0]['periods'][$k]['pop'];
    $forecastUV[$k] = $parsed_json['properties']['timeseries'][$k]['data']['instant']['details']['ultraviolet_index_clear_sky'];
    if ($forecastUV[$k] === 0 or $forecastUV[$k] === null)
    {
        $forecastUV[$k] = "-";
        $colorUV[$k] = "<greyt>";
    } 
    $forecastsnow[$k] = $parsed_json['response'][0]['periods'][$k]['snowCM'];
    $forecastsummary[$k] = $parsed_json['response'][0]['periods'][$k]['weather'];
    $forecastnight[$k] = $parsed_json['response'][0]['periods'][$k]['isDay'];
    $forecastdesc[$k] = $parsed_json['response'][0]['periods'][$k]['weather'];
    $forecastheatindex[$k] = $parsed_json['response'][0]['periods'][$k]['avgFeelslikeC'];
    $forecasthumidity[$k] = $parsed_json['properties']['timeseries'][$k]['data']['instant']['details']['relative_humidity'];
    if ($forecastUV[$k] === 0 or $forecastUV[$k] === null)
    {
        $forecastUV[$k] = "-";
        $colorUV[$k] = "<greyt>";
    } 

    if ($tempunit == 'F')
    {
        $forecastTempHigh[$k] = round(($forecastTempHigh[$k] * 9 / 5) + 32, 0);
    }

    //heatindex
    if ($tempunit == 'F')
    {
        $forecastheatindex[$k] = round(($forecastheatindex[$k] * 9 / 5) + 32, 0);
    }

    //rain mm to in
    if ($forecastprecipIntensity[$k] === 0)
    {
        $forecastPrecip[$k] = "-";
    }
    else if ($rainunit == 'in')
    {
        $forecastprecipIntensity[$k] = round(($forecastprecipIntensity[$k] * 0.0393701) , 2);
    }
    else if ($rainunit == 'mm')
    {

        $forecastPrecip[$k] = "<bluet>" . $forecastprecipIntensity[$k] . $rainunit;
    }

    //m/s to km/h
    if ($windunit == 'km/h')
    {
        $forecastWindSpeedMax[$k] = round((number_format($forecastWindSpeedMax[$k], 1) * 0.277778) , 0);
        $forecastWindSpeedMin[$k] = round((number_format($forecastWindSpeedMin[$k], 1) * 0.277778) , 0);
    }
    //m/s to mph
    if ($windunit == 'mph')
    {
        $forecastWindSpeedMax[$k] = round((number_format($forecastWindSpeedMax[$k], 1) * 2.23694) , 0);
        $forecastWindSpeedMin[$k] = round((number_format($forecastWindSpeedMin[$k], 1) * 2.23694) , 0);
    }

    if ($forecastnight[$k] !== false)
    {
        $forecastnight[$k] = "D";
    }
    else $forecastnight[$k] = "N";

    if ($forecastUV[$k] > 10)
    {
        $colorUV[$k] = "<purplet>";
    }
    else if ($forecastUV[$k] > 7)
    {
        $colorUV[$k] = "<redt>";
    }
    else if ($forecastUV[$k] > 5)
    {
        $colorUV[$k] = "<oranget>";
    }
    else if ($forecastUV[$k] > 2)
    {
        $colorUV[$k] = "<yellowt>";
    }
    else if ($forecastUV[$k] > 0)
    {
        $colorUV[$k] = "<greent>";
    }

    if ($forecasthumidity[$k] >= 70)
    {
        $colorHumidity[$k] = "<bluet>";
    }
    else if ($forecasthumidity[$k] > 50)
    {
        $colorHumidity[$k] = "<yellowt>";
    }
    else if ($forecasthumidity[$k] > 40)
    {
        $colorHumidity[$k] = "<greent>";
    }
    else if ($forecasthumidity[$k] > 0)
    {
        $colorHumidity[$k] = "<redt>";
    }
    if ($tempunit == 'F' && $forecastTempHigh[$k] < 44.6)
    {
        $colorTempHigh[$k] = "<bluet>";
    }
    else if ($tempunit == 'F' && $forecastTempHigh[$k] > 80.6)
    {
        $colorTempHigh[$k] = "<redt>";
    }
    else if ($tempunit == 'F' && $forecastTempHigh[$k] > 64.4)
    {
        $colorTempHigh[$k] = "<oranget>";
    }
    else if ($tempunit == 'F' && $forecastTempHigh[$k] > 55)
    {
        $colorTempHigh[$k] = "<yellowt>";
    }
    else if ($tempunit == 'F' && $forecastTempHigh[$k] >= 44.6)
    {
        $colorTempHigh[$k] = "<greent>";
    }
    else if ($forecastTempHigh[$k] < 7)
    {
        $colorTempHigh[$k] = "<bluet>";
    }
    else if ($forecastTempHigh[$k] > 27)
    {
        $colorTempHigh[$k] = "<redt>";
    }
    else if ($forecastTempHigh[$k] > 19)
    {
        $colorTempHigh[$k] = "<oranget>";
    }
    else if ($forecastTempHigh[$k] > 12.7)
    {
        $colorTempHigh[$k] = "<yellowt>";
    }
    else if ($forecastTempHigh[$k] >= 7)
    {
        $colorTempHigh[$k] = "<greent>";
    }

    if ($forecastnight[$k] !== false)
    {
        $forecastnight[$k] = "D";
    }
    else $forecastnight[$k] = "N";

?>



 
<?php
} ?>



<main class="grid3" style="height:420px; width:700px; overflow: hidden;">
  <articlegraph3> 
<table class="demo" style="width: 98%; height: 98%; text-center: left; overflow-y: scroll;">
    
 <tr style="border-bottom: 0px grey solid; ">
<th style="font-size: 9px;">Time</th>
<th colspan="2" style="font-size: 10px;">Conditions</th>
<th style="font-size: 9px;">Temperature</th>
<th style="font-size: 9px;">Precipitation</th>
<th style="font-size: 9px;">Wind Speed</th>
<th style="font-size: 9px;">Direction</th>
<th style="font-size: 9px;">UV Index</th>
<th style="font-size: 9px;">Humidity</th>
</tr>
<?php for ($k = 0;$k < 24;$k++)
{ ?>
<tr style="border-top: 0.125px grey solid; ">
<td><span style="font-size: 9px;";><?php echo $forecastTime[$k]; ?></span></td>
<td><img src="css/svg/<?php echo $forecastIcon[$k]; ?>" width="50" height="19" alt="mc_day" style="display: block; margin-left: auto; margin-right: auto;"></td>
<td><span style="font-size: 9px;";><?php echo $forecastSummary[$k]; ?></span></td>
<td><span style="font-size: 9px;";><?php echo $colorTempHigh[$k]; ?><?php echo $forecastTempHigh[$k] . "&deg" . $tempunit; ?></span></td>
<td><span style="font-size: 9px; ";><?php echo $forecastPrecip[$k]; ?>
</td>
<td><span style="font-size: 9px; ";><?php echo $forecastWindSpeedMax[$k]; ?><small><?php echo $windunit; ?></small></span></td>
<td><?php echo $forecastWindCardinal[$k]; ?></td>
<td><span style="font-size: 9px; ";><?php echo $colorUV[$k]; ?><?php echo $forecastUV[$k]; ?></span></td>
<td><span style="font-size: 9px;";><?php echo $colorHumidity[$k]; ?><?php echo $forecasthumidity[$k]; ?><small>%</small></span></td>
</tr>
  <?php
} ?>


</table>
    </articlegraph3>

          
  
   </main>
