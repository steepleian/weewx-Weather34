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
include ('settings.php');
include ('w34CombinedData.php');
error_reporting(0);
if ($theme === "dark")
{
    echo '<style>@font-face{font-family:weathertext2;src:url(css/fonts/verbatim-regular.woff)format("woff"),url(fonts/verbatim-regular.woff2)format("woff2"),url(fonts/verbatim-regular.ttf)format("truetype")}
html,body{font-size:13px;font-family:"weathertext2",Helvetica,Arial,sans-serif;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}
body{-ms-overflow-style:none;scrollbar-width:none;overflow-y:scroll}
body::-webkit-scrollbar{display:none}.weather34darkbrowser{background-color:#eee;width:200px;height:100px;border:1px dotted black;overflow-y:scroll}.weather34darkbrowser::-webkit-scrollbar{display:none}.weather34darkbrowser{-ms-overflow-style:none;scrollbar-width:none}.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,2fr));grid-gap:10px;align-items:stretch;color:#f5f7fc}.grid>article{border:1px solid rgba(245,247,252,0.02);box-shadow:2px 2px 6px 0px rgba(0,0,0,0.6);padding:20px;font-size:0.8em;-webkit-border-radius:4px;border-radius:4px;background:0;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid>article img{max-width:100%}
a:link{color:silver}
a:visited{color:silver}
a:hover{color:silver}
a:active{color:white}.weather34darkbrowser{position:relative;background:0;width:97%;height:30px;margin:auto;margin-top:-5px;margin-left:0px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px}.weather34darkbrowser[url]:after{content:attr(url);color:white;font-size:14px;text-align:center;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;font-family:arial;height:20px}
blue{color:#01a4b4}
orange{color:#009bb4}
green{color:#aaa}
red{color:#f37867}
red6{color:#d65b4a}
value{color:#fff}
yellow{color:#cc0}
purple{color:#916392}
smalluvunit{font-size:0.6rem;font-family:Arial,Helvetica,system}
smallmagunit{font-size:0.55rem;font-family:Arial,Helvetica,system;font-weight:500}.magcontainer1{left:70px;top:0}.mag1,.mag1-3,.mag11,.mag4-5,.mag6-8,.mag9-10{font-family:weathertext2,Arial,Helvetica,system;width:4.5rem;height:2rem;-webkit-border-radius:2px;-moz-border-radius:2px;-o-border-radius:2px;font-size:1.2rem;padding-top:12px;color:#fff;border-bottom:11px solid #555;align-items:center;justify-content:center;text-align:center}.magcaution,.magtrend{position:absolute;font-size:1rem}.mag1-3{background:#9aba2f}.mag4-5{background:rgba(230,161,65,1)}.mag6-8{background:rgba(255,124,57,0.8)}.mag9-10{background:rgba(211,93,78,0.8)}.mag11{background:rgba(204,135,248,0.7)}.magcaution{margin-left:120px;margin-top:105px;font-family:weathertext2}.magtrend{margin-left:135px;margin-top:40px;z-index:1;color:#fff}.almanac{font-size:1.25em;margin-top:30px;color:rgba(56,56,60,1);width:12em}
metricsblue{color:#44a6b5;font-family:"weathertext2",Helvetica,Arial,sans-serif;background:rgba(86,95,103,0.5);-webkit-border-radius:2px;border-radius:2px;align-items:center;justify-content:center;font-size:0.9em;left:10px;padding:0 3px 0 3px}.w34convertrain{position:relative;font-size:0.5em;top:9px;color:#c0c0c0;margin-left:5px}.hitempy{position:relative;background:rgba(61,64,66,0.5);color:#fff;font-size:12px;width:110px;padding:1px;-webit-border-radius:2px;border-radius:2px;margin-top:-48px;margin-left:72px;padding:5px;line-height:10px;font-size:9px}.actualt{position:relative;left:0px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:#555;padding:5px;font-family:Arial,Helvetica,sans-serif;width:max-content;height:0.8em;font-size:0.8rem;padding-top:2px;color:white;align-items:center;justify-content:center;margin-bottom:10px;top:-15px}.actualw{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74,99,111,0.1);padding:5px;font-family:Arial,Helvetica,sans-serif;width:100px;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;border-bottom:2px solid #555;align-items:center;justify-content:center;margin-bottom:10px;top:0}.svgimage{background:rgba(0,155,171,1);-webit-border-radius:2px;border-radius:2px}
orange1{color:rgba(255,131,47,1)}
teal{color:yellow}    
    </style>';
}
else if ($theme === "light")
{
    echo '<style>@font-face{font-family:weathertext2;src:url(css/fonts/verbatim-regular.woff)format("woff"),url(fonts/verbatim-regular.woff2)format("woff2"),url(fonts/verbatim-regular.ttf)format("truetype")}
html,body{background-color:white;font-size:13px;font-family:"weathertext2",Helvetica,Arial,sans-serif;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;scrollbar-width:none;overflow-y:scroll}
body::-webkit-scrollbar{display:none}.weather34darkbrowser{width:200px;height:100px;overflow-y:hidden}.weather34darkbrowser::-webkit-scrollbar{display:none}.weather34darkbrowser{-ms-overflow-style:none;scrollbar-width:none}.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,2fr));grid-gap:10px;align-items:stretch;color:black}.grid>article{border:1px solid rgba(245,247,252,0.02);box-shadow:2px 2px 6px 0px rgba(0,0,0,0.6);padding:20px;font-size:0.8em;-webkit-border-radius:4px;border-radius:4px;background:0;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid>article img{max-width:100%}
a:link{color:black}
a:visited{color:darkgrey}
a:hover{color:black}
a:active{color:grey}.weather34darkbrowser{position:relative;background:0;width:97%;height:30px;margin:auto;margin-top:-5px;margin-left:0px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px}.weather34darkbrowser[url]:after{content:attr(url);color:black;font-size:14px;text-align:center;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;font-family:arial;height:20px}
blue{color:#01a4b4}
orange{color:#009bb4}
green{color:#aaa}
red{color:#f37867}
red6{color:#d65b4a}
value{color:#fff}
yellow{color:#cc0}
purple{color:#916392}
smalluvunit{font-size:0.6rem;font-family:Arial,Helvetica,system}
smallmagunit{font-size:0.55rem;font-family:Arial,Helvetica,system;font-weight:500}.magcontainer1{left:70px;top:0}.mag1,.mag1-3,.mag11,.mag4-5,.mag6-8,.mag9-10{font-family:weathertext2,Arial,Helvetica,system;width:4.5rem;height:2rem;-webkit-border-radius:2px;-moz-border-radius:2px;-o-border-radius:2px;font-size:1.2rem;padding-top:12px;color:#fff;border-bottom:11px solid #555;align-items:center;justify-content:center;text-align:center}.magcaution,.magtrend{position:absolute;font-size:1rem}.mag1-3{background:#9aba2f}.mag4-5{background:rgba(230,161,65,1)}.mag6-8{background:rgba(255,124,57,0.8)}.mag9-10{background:rgba(211,93,78,0.8)}.mag11{background:rgba(204,135,248,0.7)}.magcaution{margin-left:120px;margin-top:105px;font-family:weathertext2}.magtrend{margin-left:135px;margin-top:40px;z-index:1;color:#fff}.almanac{font-size:1.25em;margin-top:30px;color:rgba(56,56,60,1);width:12em}
metricsblue{color:#44a6b5;font-family:"weathertext2",Helvetica,Arial,sans-serif;background:rgba(86,95,103,0.5);-webkit-border-radius:2px;border-radius:2px;align-items:center;justify-content:center;font-size:0.9em;left:10px;padding:0 3px 0 3px}.w34convertrain{position:relative;font-size:0.5em;top:9px;color:#c0c0c0;margin-left:5px}.hitempy{position:relative;background:rgba(61,64,66,0.5);color:black;font-size:12px;width:120px;padding:1px;-webit-border-radius:2px;border-radius:2px;background-color:lightgray;margin-top:-48px;margin-left:72px;padding:5px;line-height:10px;font-size:9px}.actualt{position:relative;left:0px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:#555;padding:5px;font-family:Arial,Helvetica,sans-serif;width:max-content;height:0.8em;font-size:0.8rem;padding-top:2px;color:white;align-items:center;justify-content:center;margin-bottom:10px;top:-15px}.actualw{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74,99,111,0.1);padding:5px;font-family:Arial,Helvetica,sans-serif;width:150px;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;border-bottom:2px solid #555;align-items:center;justify-content:center;margin-bottom:10px;top:0}.svgimage{background:rgba(0,155,171,1);-webit-border-radius:2px;border-radius:2px}
orange1{color:red}
teal{color:green}    
    </style>';
}


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