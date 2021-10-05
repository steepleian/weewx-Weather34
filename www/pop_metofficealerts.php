<?php
//original claydons weather script original css/svg/php by claydons weather 2021 clearly marked as original by claydons weather//
include ('w34CombinedData.php');
include ('settings1.php');
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8">
  
  <title>MetOffice Alerts</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="css/popup.<?php echo $theme; ?>.css?version=<?php echo filemtime('css/popup.' . $theme . '.css'); ?>" rel="stylesheet prefetch">

<body>
<?php
$forecastime = filemtime('jsondata/uk.txt'); ?>
<div class="weather34darkbrowser" style="color:<?php echo $text1 ?>;" url="Weather Alerts for <?php echo $stationName ?>
                                         <?php echo '&nbsp;';
echo "Risk Level Updated &nbsp;" . date($timeFormatShort, $forecastime); ?>"></div>  
 
<?php
$json = 'jsondata/uk.txt';
$json = file_get_contents($json);
$parsed_json = json_decode($json, true);
if (($parsed_json['rss']['channel']['item'][0]['description']) !== null)
{
    $data = "multi";
    $datastream = "multi";
}
else if (($parsed_json['rss']['channel']['item']['description']) !== null)
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
            $cnt = count($parsed_json['rss']['channel']['item']);
        }
        for ($i = 0;$i < $cnt;$i++)
        {
            if ($data === "single")
            {
                $description[$i] = $parsed_json['rss']['channel']['item']['description'];
            }
            else if ($data === "multi")
            {
                $description[$i] = $parsed_json['rss']['channel']['item'][$i]['description'];
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
                $warnimage[$i] = "css/wrnImagesuk/icon-warning-wind-yellow.svg";
            }
            else if ($alertlevel[$i] == 'orange' && strpos($description[$i], "wind") !== false)
            {
                $alerttype[$i] = 'Wind';
                $warnimage[$i] = "css/wrnImagesuk/icon-warning-wind-orange.svg";
            }
            else if ($alertlevel[$i] == 'red' && strpos($description[$i], "wind") !== false)
            {
                $alerttype[$i] = 'Wind';
                $warnimage[$i] = "css/wrnImagesuk/icon-warning-wind-red.svg";
            }
            else if ($alertlevel[$i] == 'yellow' && strpos($description[$i], "snow") !== false)
            {
                $alerttype[$i] = 'Snow/Ice';
                $warnimage[$i] = "css/wrnImagesuk/icon-warning-snow-yellow.svg";
            }
            else if ($alertlevel[$i] == 'orange' && strpos($description[$i], "snow") !== false)
            {
                $alerttype[$i] = 'Snow/Ice';
                $warnimage[$i] = "css/wrnImagesuk/icon-warning-snow-orange.svg";
            }
            else if ($alertlevel[$i] == 'red' && strpos($description[$i], "snow") !== false)
            {
                $alerttype[$i] = 'Snow/Ice';
                $warnimage[$i] = "css/wrnImagesuk/icon-warning-snow-red.svg";
            }
            else if ($alertlevel[$i] == 'yellow' && strpos($description[$i], "ice") !== false)
            {
                $alerttype[$i] = 'Snow/Ice';
                $warnimage[$i] = "css/wrnImagesuk/icon-warning-ice-yellow.svg";
            }
            else if ($alertlevel[$i] == 'orange' && strpos($description[$i], "ice") !== false)
            {
                $alerttype[$i] = 'Snow/Ice';
                $warnimage[$i] = "css/wrnImagesuk/icon-warning-ice-orange.svg";
            }
            else if ($alertlevel[$i] == 'red' && strpos($description[$i], "ice") !== false)
            {
                $alerttyp[$i] = 'Snow/Ice';
                $warnimage[$i] = "css/wrnImagesuk/icon-warning-ice-red.svg";
            }
            else if ($alertlevel[$i] == 'yellow' && strpos($description[$i], "fog") !== false)
            {
                $alerttype[$i] = 'Fog';
                $warnimage[$i] = "css/wrnImagesuk/icon-warning-flood-yellow.svg";
            }
            else if ($alertlevel[$i] == 'orange' && strpos($description[$i], "fog") !== false)
            {
                $alerttype[$i] = 'Fog';
                $warnimage[$i] = "css/wrnImagesuk/icon-warning-flood-orange.svg";
            }
            else if ($alertlevel[$i] == 'red' && strpos($description[$i], "fog") !== false)
            {
                $alerttype[$i] = 'Fog';
                $warnimage[$i] = "css/wrnImagesuk/icon-warning-flood-red.svg";
            }
            else if ($alertlevel[$i] == 'yellow' && strpos($description[$i], "thunderstorm") !== false)
            {
                $alerttype[$i] = 'Thunderstorms';
                $warnimage[$i] = "css/wrnImagesuk/icon-warning-lightning-yellow.svg";
            }
            else if ($alertlevel[$i] == 'orange' && strpos($description[$i], "thunderstorm") !== false)
            {
                $alerttype[$i] = 'Thunderstorms';
                $warnimage[$i] = "css/wrnImagesuk/icon-warning-lightning-orange.svg";
            }
            else if ($alertlevel[$i] == 'red' && strpos($description[$i], "thunderstorm") !== false)
            {
                $alerttype[$i] = 'Thunderstorms';
                $warnimage[$i] = "css/wrnImagesuk/icon-warning-lightning-red.svg";
            }
            else if ($alertlevel[$i] == 'yellow' && strpos($description[$i], "rain") !== false)
            {
                $alerttype[$i] = 'Rain';
                $warnimage[$i] = "css/wrnImagesuk/icon-warning-rain-yellow.svg";
            }
            else if ($alertlevel[$i] == 'orange' && strpos($description[$i], "rain") !== false)
            {
                $alerttype[$i] = 'Rain';
                $warnimage[$i] = "css/wrnImagesuk/icon-warning-rain-orange.svg";
            }
            else if ($alertlevel[$i] == 'red' && strpos($description[$i], "rain") !== false)
            {
                $alerttype[$i] = 'Rain';
                $warnimage[$i] = "css/wrnImagesuk/icon-warning-rain-red.svg";
            }
            else if ($alertlevel[$i] == 'yellow' && strpos($description[$i], "heat") !== false)
            {
                $alerttype[$i] = 'Extreme Heat';
                $warnimage[$i] = "css/wrnImagesuk/icon-warning-heat-yellow.svg";
            }
            else if ($alertlevel[$i] == 'orange' && strpos($description[$i], "heat") !== false)
            {
                $alerttype[$i] = 'Extreme Heat';
                $warnimage[$i] = "css/wrnImagesuk/icon-warning-heat-orange.svg";
            }
            else if ($alertlevel[$i] == 'red' && strpos($description[$i], "heat") !== false)
            {
                $alerttype[$i] = 'Extreme Heat';
                $warnimage[$i] = "css/wrnImagesuk/icon-warning-heat-red.svg";
            }

?>
<main class="grid_MET"><articlegraph_MET class="alert-row-narrow" style="font-size:11px; background-color:<?php echo $alertlevel[$i] ?>">
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
    
<p><main class="grid3"><articlegraph3 class="alert-row-narrow" style="background-color:white; font-size:11px;"><img src="css/wrnImagesuk/icon-warning-generic-white.svg" style="width:75px; height:75px;"><?php
        echo "There are no weather alerts in force for this location at the present time. The weather alerts used by this website are provided by The UK Metoffice An explanation of the severity of the alerts can be found in the Glossary below.";
?></articlegraph3>
    <main class="grid1"><articlegraph class="alert-row-narrow" style="background-color:teal; font-size:14px;color:white;height:20px"><?php
        echo "<b>Glossary</b>";
?></articlegraph>

    
      
    <main class="grid3"><articlegraph3 class="alert-row-narrow" style="background-color:yellow; font-size:11px;"><img src="css/wrnImagesuk/icon-warning-generic-yellow.svg" style="width:75px; height:75px;"><?php
        echo "Alert Level Yellow. The weather is potentially dangerous. The weather phenomena that have been forecast are not unusual, but be attentive if you intend to practice activities exposed to meteorological risks. Keep informed about the expected meteorological conditions and do not take any avoidable risk.";
?></articlegraph3>
    
    <main class="grid3"><articlegraph3 class="alert-row-narrow" style="background-color:orange; font-size:11px;"><img src="css/wrnImagesuk/icon-warning-generic-orange.svg" style="width:75px; height:75px;"><?php
        echo "Alert Level Amber. The weather is dangerous. Unusual meteorological phenomena have been forecast. Damage and casualties are likely to happen. Be very vigilant and keep regularly informed about the detailed expected meteorological conditions. Be aware of the risks that might be unavoidable. Follow any advice given by your authorities.";
?></articlegraph3>
      
    <main class="grid3"><articlegraph3 class="alert-row-narrow" style="background-color:red; font-size:11px;"><img src="css/wrnImagesuk/icon-warning-generic-red.svg" style="width:75px; height:75px;"><?php
        echo "Alert Level Red. The weather is very dangerous. Exceptionally intense meteorological phenomena have been forecast. Major damage and accidents are likely, in many cases with threat to life and limb, over a wide area. Keep frequently informed about detailed expected meteorological conditions and risks. Follow orders and any advice given by your authorities under all circumstances, be prepared for extraordinary measures.";
?></articlegraph3>
<?php
        break;

    }
?>
<main class="grid_FT">
<articlegraph_FT style="height:15px">  
  <div class="lotemp">
   <?php echo $info ?> CSS/SVG/PHP scripts by claydonsweather.org.uk &copy; 2021-<?php echo date('Y'); ?>  -  <a href="https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings#" title="MetOffice" target="_blank">Data © <?php echo date('Y'); ?>UK MetOffice</a></span>
  </div>   
    
     
  </articlegraph_FT>
  
</main>



</body>
</html>
