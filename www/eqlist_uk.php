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
for ($i = 0;$i < 25;$i++)
{
    
  
  $title_array = explode(":", $parsed_json['rss']['channel']['item'][$i]['title']);
$eqtitle_array = explode(",", $title_array[2]);
$eqtitle[$i] = $eqtitle_array[0].", ".$eqtitle_array[1].", UK";
$description       = $parsed_json['rss']['channel']['item'][$i]['description'];
$descript_array = explode(";", $description);
$magnitude_array = explode(":", $descript_array[4]);
$magnitude[$i] = number_format($magnitude_array[1],1);
$depth_array = explode(" ", $descript_array[3]);
$depth[$i] = $depth_array[2];
$time1       = $parsed_json['rss']['channel']['item'][$i]['pubDate'];
$lati[$i]=$parsed_json['rss']['channel']['item'][$i]['geo:lat'];
$longi[$i]=$parsed_json['rss']['channel']['item'][$i]['geo:long'];
$eventime[$i]=date( $dateFormat . " " . $timeFormatShort, strtotime("$time1") );

  
  
  
  
  

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
<style>
@font-face{font-family:weathertext2;src:url(css/fonts/verbatim-regular.woff) format("woff"),url(fonts/verbatim-regular.woff2) format("woff2"),url(fonts/verbatim-regular.ttf) format("truetype")}
html,body{font-size:13px;font-family: "weathertext2", Helvetica, Arial, sans-serif;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;}
.weather34darkbrowser {
  background-color: #eee;
  width: 200px;
  height: 100px;
  border: 1px dotted black;
  overflow-y: scroll; /* Add the ability to scroll */
}

/* Hide scrollbar for Chrome, Safari and Opera */
.weather34darkbrowser::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.weather34darkbrowser {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
  .grid { 
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 2fr));
  grid-gap: 10px;
  align-items: stretch;
  color:#f5f7fc;
    
  }
.grid > article {
 border: 1px solid rgba(245, 247, 252,.02);
  box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.6);
  padding:20px;
  font-size:0.8em;
  -webkit-border-radius:4px;
  border-radius:4px;
  background:0;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;
  
}
.grid > article img {
  max-width: 100%;
}
/* unvisited link */
a:link {
  color: silver;
}

/* visited link */
a:visited {
  color: silver;
}

/* mouse over link */
a:hover {
  color: silver;
}

/* selected link */
a:active {
  color: white;
}
.weather34darkbrowser{position:relative;background:0;width:97%;height:30px;margin:auto;margin-top:-5px;margin-left:0px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px;}
.weather34darkbrowser[url]:after{content:attr(url);color:#aaa;font-size:14px;text-align: center;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;font-family:arial;height:20px;}
 blue{color:#01a4b4}orange{color:#009bb4}green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#CC0}purple{color:#916392}

smalluvunit{font-size:.6rem;font-family:Arial,Helvetica,system;}
smallmagunit{font-size:.55rem;font-family:Arial,Helvetica,system;font-weight:500}
.magcontainer1{left:70px;top:0}
.mag1,.mag1-3,.mag11,.mag4-5,.mag6-8,.mag9-10{
font-family:weathertext2,Arial,Helvetica,system;width:4.5rem;height:2rem;
-webkit-border-radius:2px;-moz-border-radius:2px;-o-border-radius:2px;
font-size:1.2rem;padding-top:12px;color:#fff;border-bottom:11px solid rgba(56,56,60,1);
align-items:center;justify-content:center;text-align:center;}

.magcaution,.magtrend{position:absolute;font-size:1rem}
.mag1-3{background:#9aba2f}
.mag4-5{background:rgba(230,161,65,1)}
.mag6-8{background:rgba(255,124,57,.8)}
.mag9-10{background:rgba(211,93,78,.8)}
.mag11{background:rgba(204,135,248,.7)}
.magcaution{margin-left:120px;margin-top:105px;font-family:weathertext2}
.magtrend{margin-left:135px;margin-top:40px;z-index:1;color:#fff}


.almanac{font-size:1.25em;margin-top:30px;color:rgba(56, 56, 60, 1.000);width:12em}
metricsblue{color:#44a6b5;font-family:"weathertext2",Helvetica, Arial, sans-serif;background:rgba(86, 95, 103, 0.5);-webkit-border-radius:2px;border-radius:2px;align-items:center;justify-content:center;font-size:.9em;left:10px;padding:0 3px 0 3px;}
.w34convertrain{position:relative;font-size:.5em;top:9px;color:#c0c0c0;margin-left:5px}
.hitempy{position:relative;background:rgba(61, 64, 66, 0.5);color:#fff;font-size:12px;width:110px;padding:1px;-webit-border-radius:2px;border-radius:2px;
margin-top:-48px;margin-left:72px;padding:5px;line-height:10px;font-size:9px}

.actualt{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74, 99, 111, 0.1);
padding:5px;font-family:Arial, Helvetica, sans-serif;width:100px;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;
align-items:center;justify-content:center;margin-bottom:10px;top:-15px}
.actualw{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74, 99, 111, 0.1);
padding:5px;font-family:Arial, Helvetica, sans-serif;width:100px;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;border-bottom:2px solid rgba(56,56,60,1);
align-items:center;justify-content:center;margin-bottom:10px;top:0}
.svgimage{background:rgba(0, 155, 171, 1.000);-webit-border-radius:2px;border-radius:2px;}
orange1{color:rgba(255, 131, 47, 1.000);}
</style>
<div class="weather34darkbrowser" url="Recent UK Earthquakes" scrolling="no"></div>  
<main class="grid">
<?php
for ($j = 0;$j < 25;$j++)
{
    echo "<article>";
    echo "<div class=actualt>&nbsp;&nbsp Recent Earthquake </div> ";
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
        echo "<div style='position:relative; top:10px;'>&nbsp;&nbsp;Minor</div></span>";
    }
    else if ($magnitude[$j] <= 5)
    {
        echo "<div style='position:relative; top:10px;'>&nbsp;&nbsp;Moderate</div></span>";
    }
    else if ($magnitude[$j] <= 6)
    {
        echo "<div style='position:relative; top:10px;'>&nbsp;&nbsp;Strong</div></span>";
    }
    else if ($magnitude[$j] <= 10)
    {
        echo "<div style='position:relative; top:10px;'>&nbsp;&nbsp;Very Strong</div></span>";
    }
    echo "<div></div>";
    echo '<div class="hitempy">';
    echo "";

    // EQ Latest earthquake
    if ($windunit == 'mph' && $eqdist[$j] < 1300)
    {
        echo "<div class='time'><orange1>*Regional</orange1> <span> " . $eventime[$j] . "</div></span>";
        echo $eqtitle[$j];
    }
    else if ($windunit == 'km/h' && $eqdist[$j] < 2100)
    {
        echo "<div class='time'><orange1>*Regional</orange1> <span> " . $eventime[$j] . "</div></span>";
        echo $eqtitle[$j];
    }
    else
    {
        echo "<div class='time'><span>", $eventime[$j], "</div></span>";
        echo $eqtitle[$j];
    }

    echo "<br>";

    if ($windunit == 'mph' && $eqdist[$j] < 200)
    {
        echo "<orange>", round($eqdist[$j] * 0.621371) . " </orange>Miles from<br> $stationlocation";
    }

    else if ($windunit == 'km/h' && $eqdist[$j] < 320)
    {
        echo "<orange>", round($eqdist[$j]) . " </orange>Km from<br> $stationlocation";
    }

    else if ($windunit == 'mph')
    {
        echo round($eqdist[$j] * 0.621371) . " Miles from<br> $stationlocation";
    }
    else
    {
        echo $eqdist[$j] . " Km from<br> $stationlocation";
    }
    echo "";

    echo "</div>";
    echo "</smalluvunit>";
    echo "</article> ";
} ?>

  <article>
   <div class=actualt>&nbsp;&nbsp &copy; Information</div>
   <span style="font-size:8px;">  
  <?php echo $info ?> CSS/SVG/PHP scripts were developed by <a href="https://weather34.com" title="weather34.com" target="_blank" style="font-size:9px;">weather34.com</a>  for use in the weather34 template &copy; 2015-<?php echo date('Y'); ?>
  
  <br>
  <br>
  <?php echo $info ?>  
<a href="http://www.emsc-csem.org" title="emsc-csem.org" target="_blank">Data © <?php echo date('Y'); ?> EMSC-CSEM</a></span>

  
  </article> 
</main>
<script type="text/javascript">(function(){if(typeof EzConsentCallback==="function"){var c=a("ezCMPCookieConsent");var g={necessary:0,preferences:0,statistics:0,marketing:0};if(c!==""){var e=c.split("|");for(var d=0;d<e.length;d++){var b=e[d].split("=");if(b.length!==2){break}var f=b[1]=="1"?true:false;switch(b[0]){case"1":g.necessary=f;break;case"2":g.preferences=f;break;case"3":g.statistics=f;break;case"4":g.marketing=f;break}}}EzConsentCallback(g);function a(k){var j=k+"=";var m=decodeURIComponent(document.cookie);var h=m.split(";");for(var l=0;l<h.length;l++){var n=h[l];while(n.charAt(0)==" "){n=n.substring(1)}if(n.indexOf(j)==0){return n.substring(j.length,n.length)}}return""}}})();</script>
<script type="text/javascript"  async src="/utilcave_com/inc/ezcl.webp?cb=4"></script>