<?php
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include('w34CombinedData.php');include('settings1.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 Temperature Almanac Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/tempalmanac.<?php echo $theme; ?>.css?version=<?php echo filemtime('css/tempalmanac.' . $theme . '.css'); ?>" rel="stylesheet prefetch">

<div class="weather34darkbrowser" url="Temperature - Dew Point - Humidity Almanac"></div>
<main class="grid">
  <article>
   <div class=actualt>&nbsp;Today </div>
   <div class="temperaturecontainer1">

			  <?php
	////temp max today
	if ($weather["tempdmax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["tempdmax"] . "</value>";}
	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Temp Max</b></span><br><?php echo $weather["tempdmaxtime"];?></span></div>
	</div>	
<div class="temperaturecontainer2">
 <?php
	//temp min today
	if ($weather["tempdmin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["tempdmin"] . "</value>";}

	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Temp Min</b></span><br><?php echo $weather["tempdmintime"];?></span></div>
</div>  
  
   <div class="temperaturecontainer1">

			  <?php
	////dew max today
	if ($tempunit=='C' && $weather["dewmax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["dewmax"] . "</value>";}
	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Dew Max</b></span><br><?php echo $weather["dewmaxtime"];?></span></div>
	</div>
<div class="temperaturecontainer2">
 <?php
	//dew min today
	if ($weather["dewmin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["dewmin"] . "</value>";}

	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Dew Min</b></span><br><?php echo $weather["dewmintime"];?></span></div>
</div>
<div class="temperaturecontainer1">

			  <?php
	////humidity max today
	if ($weather["humidity_max"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["humidity_max"] . "</value>";}
	echo "<smalluvunit>%</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Hum Max</b></span><br><?php echo $weather["humidity_maxtime"];?></span></div>
</div>		
<div class="temperaturecontainer2">
 <?php
	//humidity min today
	if ($weather["humidity_min"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["humidity_min"] . "</value>";}

	echo "<smalluvunit>%</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Hum Min</b></span><br><?php echo $weather["humidity_mintime"];?></span></div>
</div>  
</article>

 <article>
   <div class=actualt>&nbsp;Yesterday </div>
   <div class="temperaturecontainer1">

			  <?php
	////temp max yesterday
	if ($tempunit=='C' && $weather["tempydmax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["tempydmax"] . "</value>";}
	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Temp Max</b></span><br><?php echo $weather["tempydmaxtime"];?></span></div>
	</div>
<div class="temperaturecontainer2">
 <?php
	//temp min yesterday
	if ($weather["tempydmin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["tempydmin"] . "</value>";}

	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Temp Min</b></span><br><?php echo $weather["tempydmintime"];?></span></div>
  </div>
  
   <div class="temperaturecontainer1">

			  <?php
	////dew max yesterday
	if ($tempunit=='C' && $weather["dewydmax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["dewydmax"] . "</value>";}
	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Dew Max</b></span><br><?php echo $weather["dewydmaxtime"];?></span></div>
	</div>
<div class="temperaturecontainer2">
 <?php
	//dew min tyesterday
	if ($weather["dewydmin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["dewydmin"] . "</value>";}

	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Dew Min</b></span><br><?php echo $weather["dewydmintime"];?></span></div>
</div>
<div class="temperaturecontainer1">

			  <?php
	////humidity max yesterday
	if ($weather["humidity_ydmax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["humidity_ydmax"] . "</value>";}
	echo "<smalluvunit>%</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Hum Max</b></span><br><?php echo $weather["humidity_ydmaxtime"];?></span></div>
	</div>	
<div class="temperaturecontainer2">
 <?php
	//humidity min yesterday
	if ($weather["humidity_ydmin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["humidity_ydmin"] . "</value>";}

	echo "<smalluvunit>%</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Hum Min</b></span><br><?php echo $weather["humidity_ydmintime"];?></span></div>
</div>
</article>


  <article>
  <div class=actualt>&nbsp;<?php echo date('F Y')?> </div>
   <div class="temperaturecontainer1">

			  <?php
	////temp max month
	if ($tempunit=='C' && $weather["tempmmax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["tempmmax"] . "</value>";}
	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Temp Max</b></span><br><?php echo $weather["tempmmaxtime"];?></span></div>
	</div>
<div class="temperaturecontainer2">
 <?php
	//temp min month
	if ($weather["tempmmin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["tempmmin"] . "</value>";}

	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Temp Min</b></span><br><?php echo $weather["tempmmintime"];?></span></div>
  </div>
  
   <div class="temperaturecontainer1">

			  <?php
	////dew max month
	if ($tempunit=='C' && $weather["dewmmax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["dewmmax"] . "</value>";}
	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Dew Max</b></span><br><?php echo $weather["dewmmaxtime"];?></span></div>
	</div>
<div class="temperaturecontainer2">
 <?php
	//dew min month
	if ($weather["dewmmin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["dewmmin"] . "</value>";}

	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Dew Min</b></span><br><?php echo $weather["dewmmintime"];?></span></div>
</div>
<div class="temperaturecontainer1">

			  <?php
	////humidity max month
	if ($weather["humidity_mmax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["humidity_mmax"] . "</value>";}
	echo "<smalluvunit>%</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Hum Max</b></span><br><?php echo $weather["humidity_mmaxtime"];?></span></div>
	</div>	
<div class="temperaturecontainer2">
 <?php
	//humidity min month
	if ($weather["humidity_mmin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["humidity_mmin"] . "</value>";}

	echo "<smalluvunit>%</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Hum Min</b></span><br><?php echo $weather["humidity_mmintime"];?></span></div>
</div>
</article>


   <article>
   <div class=actualt>&nbsp;<?php echo date('Y')?> </div>
   <div class="temperaturecontainer1">

			  <?php
	////temp max year
	if ($tempunit=='C' && $weather["tempymax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["tempymax"] . "</value>";}
	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Temp Max</b></span><br><?php echo $weather["tempymaxtime"];?></span></div>
	</div>
<div class="temperaturecontainer2">
 <?php
	//temp min year
	if ($weather["tempymin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["tempymin"] . "</value>";}

	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Temp Min</b></span><br><?php echo $weather["tempymintime"];?></span></div>
  </div>
  
   <div class="temperaturecontainer1">

			  <?php
	////dew max year
	if ($tempunit=='C' && $weather["dewymax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["dewymax"] . "</value>";}
	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Dew Max</b></span><br><?php echo $weather["dewymaxtime"];?></span></div>
	</div>
<div class="temperaturecontainer2">
 <?php
	//dew min year
	if ($weather["dewymin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["dewymin"] . "</value>";}

	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Dew Min</b></span><br><?php echo $weather["dewymintime"];?></span></div>
</div>
<div class="temperaturecontainer1">

			  <?php
	////humidity max year
	if ($weather["humidity_ymax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["humidity_ymax"] . "</value>";}
	echo "<smalluvunit>%</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Hum Max</b></span><br><?php echo $weather["humidity_ymaxtime"];?></span></div>
	</div>	
<div class="temperaturecontainer2">
 <?php
	//humidity min year
	if ($weather["humidity_ymin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["humidity_ymin"] . "</value>";}

	echo "<smalluvunit>%</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Hum Min</b></span><br><?php echo $weather["humidity_ymintime"];?></span></div>
</div>
</article>


<article>
   <div class=actualt>&nbsp;All-Time </div>
   <div class="temperaturecontainer1">

			  <?php
	////temp max all
	if ($tempunit=='C' && $weather["tempamax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["tempamax"] . "</value>";}
	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Temp Max</b></span><br><?php echo $weather["tempamaxtime"];?></span></div>
	</div>
<div class="temperaturecontainer2">
 <?php
	//temp min all
	if ($weather["tempamin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["tempamin"] . "</value>";}

	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Temp Min</b></span><br><?php echo $weather["tempamintime"];?></span></div>
  </div>
  
   <div class="temperaturecontainer1">

			  <?php
	////dew max all
	if ($tempunit=='C' && $weather["dewamax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["dewamax"] . "</value>";}
	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Dew Max</b></span><br><?php echo $weather["dewamaxtime"];?></span></div>
	</div>
<div class="temperaturecontainer2">
 <?php
	//dew min all
	if ($weather["dewamin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["dewamin"] . "</value>";}

	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Dew Min</b></span><br><?php echo $weather["dewamintime"];?></span></div>
</div>
<div class="temperaturecontainer1">

			  <?php
	////humidity max all
	if ($weather["humidity_amax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["humidity_amax"] . "</value>";}
	echo "<smalluvunit>%</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Hum Max</b></span><br><?php echo $weather["humidity_amaxtime"];?></span></div>
	</div>	
<div class="temperaturecontainer2">
 <?php
	//humidity min all
	if ($weather["humidity_amin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["humidity_amin"] . "</value>";}

	echo "<smalluvunit>%</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Hum Min</b></span><br><?php echo $weather["humidity_amintime"];?></span></div>
</div>
</article>
</article>   
  </main>
  <main class="grid1">
  <articlegraph> 
     <iframe  src="w34highcharts/<?php echo $theme1?>-charts.html?chart='tempsmallplot'&span='yearly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" frameborder="0" scrolling="no" width="99.5%" height="100%"></iframe>   
  </articlegraph> 
<!--<articlegraph style="height:15px">  
 
  
    
  <div class="lotemp">
  <?php echo $info?> Adapted by Steepleian for the WeeWX Weather34 skin from the original CSS/SVG/PHP scripts by weather34.com &copy; 2015-<?php echo date('Y');?>
  </a></div>
   
  </articlegraph>//--> 
   </main>
