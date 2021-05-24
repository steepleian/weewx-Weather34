<?php include ('settings.php');
include ('w34CombinedData.php');
error_reporting(0);

####################################################################################################
#	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2015-18                                       #
#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at https://weather34.com/homeweatherstation/index.html #
# 	                                                                                               #
# 	                                                                                               #
# 	WEATHER34 EARTHQUAKES LISTING: 7th Feb 2018   	                                               #
# 	                                                                                               #
#   https://www.weather34.com 	                                                                   #
####################################################################################################

?>

<?php //current eqlist
date_default_timezone_set($TZ);
$json_string = file_get_contents('jsondata/bg.txt');
$parsed_json = json_decode($json_string, true);
$magnitude = array();
$eqtitle = array();
$depth = array();
$time = array();
$lati = array();
$longi = array();
$eventime = array();
$eqdist = array();
$eqdista = array();
$cnt = count($parsed_json['rss']['channel']['item']);
for ($i = 0;$i < $cnt;$i++)
{
    
  
$title_array = explode(":", $parsed_json['rss']['channel']['item'][$i]['title']);
$eqtitle_array = explode(",", $title_array[2]);
if($eqtitle_array[1]===" Mon" or $eqtitle_array[1]===" Tue" or $eqtitle_array[1]===" Wed" or $eqtitle_array[1]===" Thu" or $eqtitle_array[1]===" Fri" or $eqtitle_array[1]===" Sat" or $eqtitle_array[1]===" Sun"){$eqtitle_array[1]="";}  
$eqtitle[$i] = $eqtitle_array[0].", ".$eqtitle_array[1];
$description       = $parsed_json['rss']['channel']['item'][$i]['description'];
$descript_array = explode(";", $description);
$magnitude_array = explode(":", $descript_array[4]);
$magnitude[$i] = number_format($magnitude_array[1],1);
$depth_array = explode(" ", $descript_array[3]);
$depth[$i] = $depth_array[2];
$lati[$i]=$parsed_json['rss']['channel']['item'][$i]['geo:lat'];
$longi[$i]=$parsed_json['rss']['channel']['item'][$i]['geo:long'];
$eventime[$i]=$parsed_json['rss']['channel']['item'][$i]['pubDate'];;
$eqdist[$i] = round(distance($lat, $lon, $lati[$i], $longi[$i]));

  
  
  
  
  

}  
  
$eqalert = '<svg id="i-activity" viewBox="0 0 32 32" width="52" height="52" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M4 16 L11 16 14 29 18 3 21 16 28 16" />
</svg>';
$eqalert6 = '<svg id="i-activity" viewBox="0 0 32 32" width="28" height="28" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M4 16 L11 16 14 29 18 3 21 16 28 16" />
</svg>';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 Recent UK Earthquakes Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/eqlist.<?php echo $theme; ?>.css?version=<?php echo filemtime('css/eqlist.' . $theme . '.css'); ?>" rel="stylesheet prefetch">
<?php if($theme==="dark"){$text1="white";}
else if($theme==="light"){$text1="black";$background1="white";}
$forecastime = filemtime ('jsondata/eq.txt');?>
<div class="weather34darkbrowser" style="color:<?php echo $text1 ?>;"url="Recent UK Seismic Events"></div>  
<main class="grid">
<?php
for ($j = 0;$j < $cnt;$j++)
{
    echo "<article>";
    echo "<div class=actualt>&nbsp;&nbsp".$eventime[$j]." </div> ";
    if ($magnitude[$j] >= 7)
    {
        echo "<div class=mag9-10>", $magnitude[$j], "";
    }
    else if ($magnitude[$j] >= 5.8)
    {
        echo "<div class=mag9-10>", $magnitude[$j], "";
    }
    else if ($magnitude[$j] >= 5)
    {
        echo "<div class=mag6-8>", $magnitude[$j], "";
    }
    else if ($magnitude[$j] >= 4)
    {
        echo "<div class=mag4-5>", $magnitude[$j], "";
    }
    else if ($magnitude[$j] >= 2)
    {
        echo "<div class=mag1-3>", $magnitude[$j], "";
    }
    else
    {
        echo "<div class=mag1-3>", $magnitude[$j], "";
    }
    echo '<span style="font-size:8px;">';
    if ($magnitude[$j] <= 4.2)
    {
        echo "<div style='position:relative; top:6px;'>&nbsp;&nbsp;Minor</div></span>";
    }
    else if ($magnitude[$j] <= 5)
    {
        echo "<div style='position:relative; top:6px;'>&nbsp;&nbsp;Moderate</div></span>";
    }
    else if ($magnitude[$j] <= 6)
    {
        echo "<div style='position:relative; top:6px;'>&nbsp;&nbsp;Strong</div></span>";
    }
    else if ($magnitude[$j] <= 10)
    {
        echo "<div style='position:relative; top:6px;'>&nbsp;&nbsp;Very Strong</div></span>";
    }
    echo "<div></div>";
    echo '<div class="hitempy">';
    echo "";

    // EQ Latest earthquake
    if ($windunit == 'mph' && $eqdist[$j] < 1300)
    {
        
        echo "<teal>".$eqtitle[$j]."</teal>";
    }
    else if ($windunit == 'km/h' && $eqdist[$j] < 2100)
    {
        
        echo "<teal>".$eqtitle[$j]."</teal>";
    }
    else
    {
       
        echo "<teal>".$eqtitle[$j]."</teal>";
    }

    echo "<br>";

    if ($windunit == 'mph' && $depth[$j] < 200)
    {
        echo "Depth<teal> ", round($depth[$j] * 0.621371) . " </teal>Miles<br>";
    }

    else if ($windunit == 'km/h' && $eqdist[$j] < 320)
    {
        echo "Depth<teal> ", round($depth[$j]) . " </teal>Km<br>";
    }

    else if ($windunit == 'mph')
    {
        echo round($depth[$j] * 0.621371) . " Miles<br>";
    }
    else
    {
        echo $depth[$j] . " Km<br> $";
    }
  echo "";

    if ($windunit == 'mph' && $eqdist[$j] < 200)
    {
        echo "Epicenter<teal> ", round($eqdist[$j] * 0.621371) . " </teal>Miles from<br> $stationlocation";
    }

    else if ($windunit == 'km/h' && $eqdist[$j] < 320)
    {
        echo "Epicenter<teal> ", round($eqdist[$j]) . " </teal>Km from<br> $stationlocation";
    }

    else if ($windunit == 'mph')
    {
        echo "Epicenter<teal> ",round($eqdist[$j] * 0.621371) . " </teal>Miles from<br> $stationlocation";
    }
    else
    {
        echo "Epicenter<teal> ",$eqdist[$j] . " </teal>Km from<br> $stationlocation";
    }
    echo "";

    echo "</div>";
    echo "</smalluvunit>";
    echo "</article> ";
} ?>

  <article>
    <span style="font-size:9px;color:<?php echo $text1 ?>;">
  <?php echo $info?> CSS/SVG/PHP original scripts were developed by <a href="https://weather34.com" title="weather34.com" target="_blank" style="font-size:8px;">weather34.com</a>  for use in the weather34 template &copy; 2015-<?php echo date('Y');?></span> <br>
    </article>
  <article>
    <span style="font-size:9px;color:<?php echo $text1 ?>;">
  <?php echo $info?> Adapted by Steepleian and JD for the WeeWX Weather34 skin from the original CSS/SVG/PHP scripts by weather34.com &copy; 2015-<?php echo date('Y');?>
    </article>
  <article>
    <span style="font-size:9px;color:<?php echo $text1 ?>;">
  <?php echo $info ?>  
<a href="http://earthquakes.bgs.ac.uk" title="earthquakes.bgs.ac.u" target="_blank">Data © <?php echo date('Y'); ?> BGS Seismology team</a></span>
  </article>
</main>
<script type="text/javascript">(function(){if(typeof EzConsentCallback==="function"){var c=a("ezCMPCookieConsent");var g={necessary:0,preferences:0,statistics:0,marketing:0};if(c!==""){var e=c.split("|");for(var d=0;d<e.length;d++){var b=e[d].split("=");if(b.length!==2){break}var f=b[1]=="1"?true:false;switch(b[0]){case"1":g.necessary=f;break;case"2":g.preferences=f;break;case"3":g.statistics=f;break;case"4":g.marketing=f;break}}}EzConsentCallback(g);function a(k){var j=k+"=";var m=decodeURIComponent(document.cookie);var h=m.split(";");for(var l=0;l<h.length;l++){var n=h[l];while(n.charAt(0)==" "){n=n.substring(1)}if(n.indexOf(j)==0){return n.substring(j.length,n.length)}}return""}}})();</script>
<script type="text/javascript"  async src="/utilcave_com/inc/ezcl.webp?cb=4"></script>