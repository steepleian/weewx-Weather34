<?php
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include ('w34CombinedData.php');include ('settings1.php');
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8">
  
  <title>Weather34 Solar Almanac Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/solaralmanac.<?php echo $theme; ?>.css?version=<?php echo filemtime('css/solaralmanac.' . $theme . '.css'); ?>" rel="stylesheet prefetch">

<div class="weather34darkbrowser" url="Solar Almanac"></div>
  
<main class="grid">
  <article>  
   <div class=actualt>Today </div>        
   <div class="temperaturecontainer">
	
             <?php
// Solar Today
if ($weather["solardmax"] >= 1000)
{
    echo "<div class='uvtoday9-10'>", $weather["solardmax"] . "</value>";
}
else if ($weather["solardmax"] >= 500)
{
    echo "<div class='uvtoday6-8'>", $weather["solardmax"] . "</value>";
}
else if ($weather["solardmax"] >= 300)
{
    echo "<div class='uvtoday4-5'>", $weather["solardmax"] . "</value>";
}
else if ($weather["solardmax"] >= - 0)
{
    echo "<div class='uvtoday1'>", $weather["solardmax"] . "</value>";
}
echo "<smalluvunit> W/m<sup>2</sup></smalluvunit>"
?>

</div>

<div class="higust">Maximum Recorded <br><blue><?php echo $weather["solardmaxtime"]; ?></blue></div>



</article>  

 <article> 
  <div class=actualt>Yesterday </div>        
   <div class="temperaturecontainer">
	
             <?php
// Solar month
if ($weather["solarydmax"] >= 1000)
{
    echo "<div class='uvtoday9-10'>", $weather["solarydmax"] . "</value>";
}
else if ($weather["solarydmax"] >= 500)
{
    echo "<div class='uvtoday6-8'>", $weather["solarydmax"] . "</value>";
}
else if ($weather["solarydmax"] >= 300)
{
    echo "<div class='uvtoday4-5'>", $weather["solarymax"] . "</value>";
}
else if ($weather["solarydmax"] >= - 0)
{
    echo "<div class='uvtoday1'>", $weather["solarydmax"] . "</value>";
}
echo "<smalluvunit> W/m<sup>2</sup></smalluvunit>"
?>

</div>

<div class="higust">Maximum Recorded <br><blue><?php echo $weather["solarydmaxtime"]; ?></blue></div>



</article>  
  
  <article> 
  <div class=actualt><?php echo date('F Y') ?> </div>        
   <div class="temperaturecontainer">
	
             <?php
// Solar month
if ($weather["solarmmax"] >= 1000)
{
    echo "<div class='uvtoday9-10'>", $weather["solarmmax"] . "</value>";
}
else if ($weather["solarmmax"] >= 500)
{
    echo "<div class='uvtoday6-8'>", $weather["solarmmax"] . "</value>";
}
else if ($weather["solarmmax"] >= 300)
{
    echo "<div class='uvtoday4-5'>", $weather["solarmmax"] . "</value>";
}
else if ($weather["solarmmax"] >= - 0)
{
    echo "<div class='uvtoday1'>", $weather["solarmmax"] . "</value>";
}
echo "<smalluvunit> W/m<sup>2</sup></smalluvunit>"
?>

</div>

<div class="higust">Maximum Recorded <br><blue><?php echo $weather["solarmmaxtime"]; ?></blue></div>



</article>  
  
  
  
    <article> 
  <div class=actualt><?php echo date('Y') ?> </div>        
   <div class="temperaturecontainer">
	
             <?php
// Solar year
if ($weather["solarymax"] >= 1000)
{
    echo "<div class='uvtoday9-10'>", $weather["solarymax"] . "</value>";
}
else if ($weather["solarymax"] >= 500)
{
    echo "<div class='uvtoday6-8'>", $weather["solarymax"] . "</value>";
}
else if ($weather["solarydmax"] >= 300)
{
    echo "<div class='uvtoday4-5'>", $weather["solarYmax"] . "</value>";
}
else if ($weather["solarymax"] >= - 0)
{
    echo "<div class='uvtoday1'>", $weather["solarymax"] . "</value>";
}
echo "<smalluvunit> W/m<sup>2</sup></smalluvunit>"
?>

</div>

<div class="higust">Maximum Recorded <br><blue><?php echo $weather["solarymaxtime"]; ?></blue></div>



</article> 
  <article> 
  <div class=actualt>All-Time</div>        
   <div class="temperaturecontainer">
	
             <?php
// Solar alltime
if ($weather["solaramax"] >= 1000)
{
    echo "<div class='uvtoday9-10'>", $weather["solaramax"] . "</value>";
}
else if ($weather["solaramax"] >= 500)
{
    echo "<div class='uvtoday6-8'>", $weather["solaramax"] . "</value>";
}
else if ($weather["solaradmax"] >= 300)
{
    echo "<div class='uvtoday4-5'>", $weather["solaramax"] . "</value>";
}
else if ($weather["solaramax"] >= - 0)
{
    echo "<div class='uvtoday1'>", $weather["solaramax"] . "</value>";
}
echo "<smalluvunit> W/m<sup>2</sup></smalluvunit>"
?>

</div>

<div class="higust">Maximum Recorded <br><blue><?php echo $weather["solaramaxtime"]; ?></blue></div>



</article> 
 </main>
<main class="grid1">
  <articlegraph> 
     <iframe  src="w34highcharts/<?php echo $theme1;?>-charts.html?chart='radsmallplot'&span='yearly'&temp='<?php echo $weather['temp_units']; ?>'&pressure='<?php echo $weather['barometer_units']; ?>'&wind='<?php echo $weather['wind_units']; ?>'&rain='<?php echo $weather['rain_units'] ?>" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>
 
  </articlegraph> 
  
  
  
</articlegraph> 
  
    <articlegraph style="height:30px">  
  <div class="lotemp">
  <?php echo $info?> 
<a href="https://highcharts.com" title="https://highcharts.com" target="_blank" style="font-size:8px;"> Charts rendered and compiled using Highcharts </a></span>
  </div>   
    
  <div class="lotemp">
  <?php echo $info?> Adapted by Steepleian for the WeeWX Weather34 skin from the original CSS/SVG/PHP scripts by weather34.com &copy; 2015-<?php echo date('Y');?>
  </a></div>
   
       </articlegraph>
  
</main>
<script type="text/javascript">(function(){if(typeof EzConsentCallback==="function"){var c=a("ezCMPCookieConsent");var g={necessary:0,preferences:0,statistics:0,marketing:0};if(c!==""){var e=c.split("|");for(var d=0;d<e.length;d++){var b=e[d].split("=");if(b.length!==2){break}var f=b[1]=="1"?true:false;switch(b[0]){case"1":g.necessary=f;break;case"2":g.preferences=f;break;case"3":g.statistics=f;break;case"4":g.marketing=f;break}}}EzConsentCallback(g);function a(k){var j=k+"=";var m=decodeURIComponent(document.cookie);var h=m.split(";");for(var l=0;l<h.length;l++){var n=h[l];while(n.charAt(0)==" "){n=n.substring(1)}if(n.indexOf(j)==0){return n.substring(j.length,n.length)}}return""}}})();</script>
<script type="text/javascript"  async src="/utilcave_com/inc/ezcl.webp?cb=4"></script>