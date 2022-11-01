<?php
//###################################################################################################################
//	weewx-Weather34 Template maintained by Ian Millard (Steepleian)                                 				#
//	                                                                                                				#
//  Contains original code by Ian Millard and collaborators															#
//  © claydonsweather.org.uk original CSS/SVG/PHP 2020-2021                                                         #
// 	                                                                                                				#
// 	Issues for weewx-Weather34 template should be addressed to https://github.com/steepleian/weewx-Weather34/issues #
// 	                                                                                                				#
//###################################################################################################################
include "w34CombinedData.php";
include ('settings1.php');
error_reporting(0);
if ($theme === "dark")
{
    echo '<style>.demo{border:0 solid #aaa;border-collapse:collapse;padding:50px;font-family:arial,helvetica,verdana,sans-serif;font-size:10px;margin-bottom:50px;margin-top:50px margin-left:50%;margin-right:-50%;width:100%;color:silver}.demo th{border-bottom:.5px solid #aaa;/*! border-top:1px solid #aaa; */
 padding:5px;color:silver}.demo td{border:0 solid #aaa;padding:0;background:0;text-align:center}.demo td#CELL1{background-color:transparent;color:#000}.demo td#CELL2{background-color:#9cff9c}.demo td#CELL3{background-color:#31ff00}.demo td#CELL4{background-color:#31cf00}.demo td#CELL5{background-color:#ff0}.demo td#CELL6{background-color:#ffcf00}.demo td#CELL7{background-color:#ff9a00}.demo td#CELL8{background-color:#ff6464}.demo td#CELL9{background-color:red;color:#fff}.demo td#CELL10{background-color:#900;color:#fff}.demo td#CELL11{background-color:#ce30ff;color:#fff}img{margin-left:10px;margin-right:10px;width:60px;background-color:transparent}.alert-row{display:flex;flex-direction:row;height:120px;padding:10px 0;background-color:whitesmoke}.alert-row-narrow{display:flex;flex-direction:row;height:60px;padding:10px 0;background-color:whitesmoke;font-size:12px}.alert-row-info{display:flex;flex-direction:row;height:120px;padding:10px 0;background-color:whitesmoke}.alert-text-container{font-family:Arial,Helvetica,sans-serif;font-size:11px;display:flex;flex-direction:column;justify-content:center;margin-right:10px;color:#000}.alert-text-container-narrow{font-family:Arial,Helvetica,sans-serif;font-size:14px;display:flex;flex-direction:column;justify-content:center;margin-right:10px}body{background-image:url();margin-left:8px;margin-top:8px;margin-right:8px;margin-bottom:8px;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px;color:#fff;font-weight:400;background-color:rgba(33,34,39,.8)}html{margin:0;padding:0}a:link{color:#fff}a:visited{color:#fff}a:hover{color:#fff}a:active{color:#fff}.LegendText2{font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px;color:#fff;font-weight:400}.Ebene3Header{font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px}table{font-size:11px;vertical-align:bottom;width:auto}.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));grid-gap:5px;align-items:stretch;color:#f5f7fc;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid>article{border:1px solid #212428;box-shadow:2px 2px 6px 0 rgba(0,0,0,.3);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid1{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:5px;color:#000}.grid2{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:0;color:#000}.grid3{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:20px;color:#000}.grid1>articlegraph{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100%}.grid2>articlegraph2{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100%}.grid3>articlegraph3{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.grid1>articlegraph_lg{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:lightgreen;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:80px}.grid3>articlegraph3{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:0;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.grid3>articlegraphText{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#f5f7fc;color:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.grid1>articlegraph_te{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:teal;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:15px}.grid1>articlegraph_ye{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:yellow;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:80px}.grid1>articlegraph_or{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:orange;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90px}.grid1>articlegraph_re{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:red;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100px}.grid_FT{display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));grid-gap:1px;align-items:stretch;color:#f5f7fc;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid_FT>articlegraph_FT{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;color:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:15px}.grid_MET{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:5px;color:#000}.grid_MET>articlegraph_MET{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.weather34darkbrowser{position:relative;width:97%;height:30px;margin:auto;margin-top:-5px;margin-left:0;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px;color:#fff}.weather34darkbrowser[url]:after{content:attr(url);font-size:14px;text-align:center;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;font-family:arial;height:20px}.actualt{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:teal;padding:5px;font-family:Arial,Helvetica,sans-serif;width:790px;height:.8em;font-size:.8rem;padding-top:2px;color:#fff;border-bottom:2px solid rgba(56,56,60,1);align-items:center;justify-content:center;margin-bottom:0;top:0}blue{color:#01a4b4}orange{color:#009bb4}orange1{color:rgba(255,131,47,1)}green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#cc0}purple{color:#916392}.roundcornerframe{position:relative;width:790px;border-radius:5px;overflow:hidden;margin:0 auto 0 auto}.ol_time{margin-top:-15px;margin-right:6px;color:#d65b4a;font:700 10px arial,sans-serif;line-height:10px;float:right}.left{float:left;width:80px;padding-left:2px;height:160px;border:none}.right{float:left;width:80px;padding-right:2px;height:160px;border:none}.middle{float:left;width:140px;position:relative;height:160px;border:none}.2_high{height:80px;vertical-align:middle}.3_high{height:53px;vertical-align:middle}.4_high{height:40px;vertical-align:middle}.uv{color:#000}.webcamlarge{-webkit-border-radius:4px;-moz-border-radius:4px;-o-border-radius:4px;-ms-border-radius:4px;border-radius:4px;border:solid RGBA(84,85,86,1) 2px;width:98%;height:380px}
    </style>';
}
elseif ($theme === "light")
{
    echo '<style>.demo{border:0 solid #aaa;border-collapse:collapse;padding:50px;font-family:arial,helvetica,verdana,sans-serif;font-size:10px;margin-bottom:50px;margin-top:50px margin-left:50%;margin-right:-50%;width:100%;color:#000}.demo th{border-bottom:1px solid #aaa;/*! border-top:1px solid #aaa; */
 padding:5px;color:#000}.demo td{border:0 solid #aaa;padding:0;background:#FFF;text-align:center}.demo td#CELL1{background-color:transparent;color:#000}.demo td#CELL2{background-color:#9cff9c}.demo td#CELL3{background-color:#31ff00}.demo td#CELL4{background-color:#31cf00}.demo td#CELL5{background-color:#ff0}.demo td#CELL6{background-color:#ffcf00}.demo td#CELL7{background-color:#ff9a00}.demo td#CELL8{background-color:#ff6464}.demo td#CELL9{background-color:red;color:#fff}.demo td#CELL10{background-color:#900;color:#fff}.demo td#CELL11{background-color:#ce30ff;color:#fff}img{margin-left:10px;margin-right:10px;width:60px;background-color:transparent}.alert-row{display:flex;flex-direction:row;height:120px;padding:10px 0;background-color:whitesmoke}.alert-row-narrow{display:flex;flex-direction:row;height:60px;padding:10px 0;background-color:whitesmoke;font-size:12px}.alert-row-info{display:flex;flex-direction:row;height:120px;padding:10px 0;background-color:whitesmoke}.alert-text-container{font-family:Arial,Helvetica,sans-serif;font-size:11px;display:flex;flex-direction:column;justify-content:center;margin-right:10px;color:#000}.alert-text-container-narrow{font-family:Arial,Helvetica,sans-serif;font-size:14px;display:flex;flex-direction:column;justify-content:center;margin-right:10px}body{background-image:url();margin-left:8px;margin-top:8px;margin-right:8px;margin-bottom:8px;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px;color:#fff;font-weight:400;background-color:#fff}html{margin:0;padding:0}a:link{color:#000}a:visited{color:#000}a:hover{color:#000}a:active{color:#000}.LegendText2{font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px;color:#000;font-weight:400}.Ebene3Header{font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px}table{font-size:11px;vertical-align:bottom;width:auto}.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));grid-gap:5px;align-items:stretch;color:#f5f7fc;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid>article{border:1px solid #212428;box-shadow:2px 2px 6px 0 rgba(0,0,0,.3);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid1{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:5px;color:#000}.grid2{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:0;color:#000}.grid3{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:20px;color:#000}.grid1>articlegraph{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100%}.grid2>articlegraph2{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100%}.grid3>articlegraph3{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.grid3>articlegraph4{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.grid1>articlegraph_lg{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:lightgreen;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:80px}.grid1>articlegraph_te{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:teal;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:15px}.grid1>articlegraph_ye{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:yellow;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:80px}.grid1>articlegraph_or{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:orange;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90px}.grid1>articlegraph_re{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:red;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100px}.grid_FT{display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));grid-gap:1px;align-items:stretch;color:#f5f7fc;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid_FT>articlegraph_FT{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;color:#000;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:15px}.grid_MET{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:5px;color:#000}.grid_MET>articlegraph_MET{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.weather34darkbrowser{position:relative;width:97%;height:30px;margin:auto;margin-top:-5px;margin-left:0;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px;color:#000}.weather34darkbrowser[url]:after{content:attr(url);font-size:14px;text-align:center;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;font-family:arial;height:20px}.actualt{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:teal;padding:5px;font-family:Arial,Helvetica,sans-serif;width:790px;height:.8em;font-size:.8rem;padding-top:2px;color:#fff;border-bottom:2px solid rgba(56,56,60,1);align-items:center;justify-content:center;margin-bottom:0;top:0}blue{color:#01a4b4}orange{color:#009bb4}orange1{color:rgba(255,131,47,1)}green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#cc0}purple{color:#916392}.roundcornerframe{position:relative;width:790px;border-radius:5px;overflow:hidden;margin:0 auto 0 auto}.webcamlarge{-webkit-border-radius:4px;-moz-border-radius:4px;-o-border-radius:4px;-ms-border-radius:4px;border-radius:4px;border:solid RGBA(84,85,86,1) 2px;width:97%;height:480px}
    </style>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8">
  
  <title>AerisWeather Alerts</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="/var/www/html/weewx/weather34/css/popup.<?php echo $theme; ?>.css?version=<?php echo filemtime('/var/www/html/weewx/weather34/css/popup.' . $theme . '.css'); ?>" rel="stylesheet prefetch">

<body>
<?php
$forecastime = filemtime('/var/www/html/weewx/weather34/jsondata/uk.txt'); ?>
<div class="weather34darkbrowser" style="color:<?php echo $text1 ?>;" url="Weather Alerts for <?php echo $stationName ?>
                                         <?php echo '&nbsp;';
echo "Risk Level Updated &nbsp;" . date($timeFormatShort, $forecastime); ?>"></div>  
 
<?php
$json_icon = file_get_contents("/var/www/html/weewx/weather34/jsondata/lookupTable.json");
$parsed_icon = json_decode($json_icon, true);
$xml = simplexml_load_file("/var/www/html/weewx/weather34/jsondata/uk.txt") or die("Error: Cannot create object");
$jsonData = json_encode($xml, JSON_PRETTY_PRINT);
$parsed_json = json_decode($jsonData, true);
if (($parsed_json['channel']['item'][0]['description']) !== null)
{
    $data = "multi";
    $datastream = "multi";
}
else if (($parsed_json['channel']['item']['description']) !== null)
{
    $data = "single";
    $datastream = "multi";
}
else $datastream = "none";
$favcolor = $datastream;

switch ($favcolor)
{

    case "multi":
        if ($data === "single")
        {
            $cnt = 1;
        }
        else if ($data === "multi")
        {
            $cnt = count($parsed_json['channel']['item']);
        }
        for ($i = 0;$i < $cnt;$i++)
        {
            if ($data === "single")
            {
                $description[$i] = $parsed_json['channel']['item']['description'];
            }
            else if ($data === "multi")
            {
                $description[$i] = $parsed_json['channel']['item'][$i]['description'];
            }
            $url[$i] = "https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings#";
            $validpos = strpos($description[$i], "valid");
            $validtext = substr($description[$i], $validpos);
            $datestring = explode(" ", $validtext);
            $hourFrom = substr($datestring[2], 0, 2);
            $hourTo = substr($datestring[7], 0, 2);
            $minFrom = substr($datestring[2], 2, 2);
            $minTo = substr($datestring[7], 2, 2);
            $dayFrom = substr($datestring[4], 0, 2);
            $dayTo = substr($datestring[9], 0, 2);
            $monthFrom = substr($datestring[5], 0, 3);
            $monthTo = substr($datestring[10], 0, 3);
            $fromTime = $hourFrom . ":" . $minFrom . " " . $dayFrom . " " . $monthFrom . " " . date("Y");
            $toTime = $hourTo . ":" . $minTo . " " . $dayTo . " " . $monthTo . " " . date("Y");
            $fromTimeStamp = strtotime($fromTime);
            $toTimeStamp = strtotime($toTime);

            $from = date_create($fromTime, new DateTimeZone("GMT"))->setTimezone(new DateTimeZone("Europe/London"))
                ->format("H:i l j F");
            $to = date_create($toTime, new DateTimeZone("GMT"))->setTimezone(new DateTimeZone("Europe/London"))
                ->format("H:i l j F");

            $fromto[$i] = "Valid from " . "$from" . " to " . "$to" . " ";

            $description[$i] = substr($description[$i], 0, ($validpos - 1)) . ".";

            if (strpos($description[$i], "Red") === 0)

            {
                $alertlevel[$i] = "red";
                $warntext = "The weather is very dangerous. Exceptionally intense meteorological phenomena have been forecast. Major damage and accidents are likely, in many cases with threat to life and limb, over a wide area. Keep frequently informed about detailed expected meteorological conditions and risks. Follow orders and any advice given by your authorities under all circumstances, be prepared for extraordinary measures.";
            }

            else if (strpos($description[$i], "Amber") === 0)
            {
                $alertlevel[$i] = "orange";
                $warntext = "The weather is dangerous. Unusual meteorological phenomena have been forecast. Damage and casualties are likely to happen. Be very vigilant and keep regularly informed about the detailed expected meteorological conditions. Be aware of the risks that might be unavoidable. Follow any advice given by your authorities.";
            }

            else if (strpos($description[$i], "Yellow") === 0)
            {
                $alertlevel[$i] = "yellow";
                $warntext = "The weather is potentially dangerous. The weather phenomena that have been forecast are not unusual, but be attentive if you intend to practice activities exposed to meteorological risks. Keep informed about the expected meteorological conditions and do not take any avoidable risk.";
            }

            if ($alertlevel[$i] == 'yellow' && strpos($description[$i], "wind") !== false)
            {
                $alerttype[$i] = 'Wind';

            }
            else if ($alertlevel[$i] == 'orange' && strpos($description[$i], "wind") !== false)
            {
                $alerttype[$i] = 'Wind';

            }
            else if ($alertlevel[$i] == 'red' && strpos($description[$i], "wind") !== false)
            {
                $alerttype[$i] = 'Wind';

            }
            else if ($alertlevel[$i] == 'yellow' && strpos($description[$i], "snow") !== false)
            {
                $alerttype[$i] = 'Snow';

            }
            else if ($alertlevel[$i] == 'orange' && strpos($description[$i], "snow") !== false)
            {
                $alerttype[$i] = 'Snow';

            }
            else if ($alertlevel[$i] == 'red' && strpos($description[$i], "snow") !== false)
            {
                $alerttype[$i] = 'Snow';

            }
            else if ($alertlevel[$i] == 'yellow' && strpos($description[$i], "ice") !== false)
            {
                $alerttype[$i] = 'Ice';

            }
            else if ($alertlevel[$i] == 'orange' && strpos($description[$i], "ice") !== false)
            {
                $alerttype[$i] = 'Ice';

            }
            else if ($alertlevel[$i] == 'red' && strpos($description[$i], "ice") !== false)
            {
                $alerttyp[$i] = 'Ice';

            }
            else if ($alertlevel[$i] == 'yellow' && strpos($description[$i], "fog") !== false)
            {
                $alerttype[$i] = 'Fog';

            }
            else if ($alertlevel[$i] == 'orange' && strpos($description[$i], "fog") !== false)
            {
                $alerttype[$i] = 'Fog';

            }
            else if ($alertlevel[$i] == 'red' && strpos($description[$i], "fog") !== false)
            {
                $alerttype[$i] = 'Fog';

            }
            else if ($alertlevel[$i] == 'yellow' && strpos($description[$i], "thunderstorm") !== false)
            {
                $alerttype[$i] = 'Thunderstorms';

            }
            else if ($alertlevel[$i] == 'orange' && strpos($description[$i], "thunderstorm") !== false)
            {
                $alerttype[$i] = 'Thunderstorms';

            }
            else if ($alertlevel[$i] == 'red' && strpos($description[$i], "thunderstorm") !== false)
            {
                $alerttype[$i] = 'Thunderstorms';

            }
            else if ($alertlevel[$i] == 'yellow' && strpos($description[$i], "rain") !== false)
            {
                $alerttype[$i] = 'Rain';

            }
            else if ($alertlevel[$i] == 'orange' && strpos($description[$i], "rain") !== false)
            {
                $alerttype[$i] = 'Rain';

            }
            else if ($alertlevel[$i] == 'red' && strpos($description[$i], "rain") !== false)
            {
                $alerttype[$i] = 'Rain';

            }
            else if ($alertlevel[$i] == 'yellow' && strpos($description[$i], "heat") !== false)
            {
                $alerttype[$i] = 'Extreme heat';

            }
            else if ($alertlevel[$i] == 'orange' && strpos($description[$i], "heat") !== false)
            {
                $alerttype[$i] = 'Extreme heat';

            }
            else if ($alertlevel[$i] == 'red' && strpos($description[$i], "heat") !== false)
            {
                $alerttype[$i] = 'Extreme heat';

            }
            $warnimage[$i] = "css/svg/" . $parsed_icon[$alertlevel[$i]][$alerttype[$i]];

?>
<main class="grid_MET"><articlegraph_MET class="alert-row-narrow" style="font-size:10px; background-color:<?php echo $alertlevel[$i] ?>">
                            <div class="alert-row" style="background-color:<?php echo $alertlevel[$i] ?>">
    <img src="<?php echo $warnimage[$i] ?>"style="width:70px; height:70px;">
    <div class="alert-text-container">
      <div><?php echo $fromto[$i] ?></br></br><?php echo $description[$i] ?></br></br><?php echo $warntext ?></a></div>
        
    
        
    </div>
</div>
</articlegraph_MET>
<?php
        }
        break;
    case "none": ?>
    
<p><main class="grid3"><articlegraph3 class="alert-row-narrow" style="background-color:white; font-size:10px;"><img src="css/svg/icon-warning-noalert-white.svg" style="width:75px; height:75px;"><ul><li><?php
        echo "NO WEATHER ALERTS in force for this location at the present time."
?></li></br><li><?php echo "The weather alerts used by this website are provided by AerisWeather using data supplied to them by meteoalarm.org and metoffice.gov.uk. An explanation of the severity of the alerts can be found in the Glossary below.";
?></li></ul></articlegraph3>
    <main class="grid1"><articlegraph class="alert-row-narrow" style="background-color:teal; font-size:12px;color:white;height:20px"><?php
        echo "<b>Glossary</b>";
?></articlegraph>

    
      
    <main class="grid3"><articlegraph3 class="alert-row-narrow" style="background-color:yellow; font-size:10px;"><img src="css/svg/icon-warning-generic-yellow.svg" style="width:75px; height:75px;"><ul><li><?php
        echo "YELLOW ALERT. Yellow warnings can be issued for a range of weather situations."
?></li></br><li><?php echo "It is important to read the content of yellow warnings to determine which weather situation is being covered by the warning.";
?></li></ul></articlegraph3>
    
    <main class="grid3"><articlegraph3 class="alert-row-narrow" style="background-color:orange; font-size:10px;"><img src="css/svg/icon-warning-generic-orange.svg" style="width:75px; height:75px;"><ul><li><?php
        echo "AMBER ALERT. There is an increased likelihood of impacts from severe weather, which could potentially disrupt your plans."
?></li></br><li><?php echo "This means there is the possibility of travel delays, road and rail closures, power cuts and the potential risk to life and property.";
?></li></ul></articlegraph3>
      
    <main class="grid3"><articlegraph3 class="alert-row-narrow" style="background-color:red; font-size:10px; color:white;"><img src="css/svg/icon-warning-generic-red.svg" style="width:75px; height:75px;"><ul><li><?php
        echo "RED ALERT. Dangerous weather is expected and, if you have not done so already, you should take action now to keep yourself and others safe from the impact of the severe weather."
?></li></br><li><?php echo "It is very likely that there will be a risk to life, with substantial disruption to travel, energy supplies and possibly widespread damage to property and infrastructure.";
?></li></ul></articlegraph3>
<?php
        break;

    }
?>
<main class="grid_FT">
<articlegraph_FT style="height:15px">  
  <div class="lotemp">
   <?php echo $info ?> CSS/SVG/PHP scripts by claydonsweather.org.uk &copy; 2021-<?php echo date('Y'); ?>  -  <a href="https://www.aerisweather.com/support/docs/api/reference/endpoints/alerts/" title="AerisWeather" target="_blank">Data © <?php echo date('Y'); ?>AerisWeather</a></span>
  </div>   
    
     
  </articlegraph_FT>
  
</main>



</body>
</html>
