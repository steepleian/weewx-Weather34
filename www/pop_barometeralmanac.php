<?php
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include('w34CombinedData.php');include('settings1.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 Barometer Almanac Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/baromalmanac.<?php echo $theme; ?>.css?version=<?php echo filemtime('css/baromalmanac.' . $theme . '.css'); ?>" rel="stylesheet prefetch">

<div class="weather34darkbrowser" url="Barometer Almanac"></div>

<main class="grid">
  <article>
   <div class=actualt>&nbsp;Barometer Today </div>
   <div class="temperaturecontainer1">

			  <?php
	////pressure max today
	if ($weather["thb0seapressmmax"]>=0)  {
	echo "<div class='temperaturetoday24'>",$weather["barometer_max"] . "</value>";}
	echo "<smalluvunit>".$weather["barometer_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Max</b></span><br><?php echo $weather["thb0seapressmaxtime"];?></span></div>
	</div>
<div class="temperaturecontainer2">
 <?php
	//pressure min today
	if ($weather["barometer_min"]>=0)  {
	echo "<div class='temperaturetoday0'>",$weather["barometer_min"] . "</value>";}

	echo "<smalluvunit>".$weather["barometer_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Min</b></span><br><?php echo $weather["thb0seapressmintime"];?></span></div>
</article>

 <article>
   <div class=actualt>&nbsp;Barometer Yesterday </div>
   <div class="temperaturecontainer1">

			  <?php
	////pressure max yesterday
	if ($weather["thb0seapressydmax"]>=0)  {
	echo "<div class='temperaturetoday24'>",$weather["thb0seapressydmax"] . "</value>";}
	echo "<smalluvunit>".$weather["barometer_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Max</b></span><br> <?php echo $weather["thb0seapressydmaxtime"];?></span></div>
			</div>


<div class="temperaturecontainer2">
 <?php
	//pressure min yesterday
	if ($weather["thb0seapressydmin"]>=0)  {
	echo "<div class='temperaturetoday0'>",$weather["thb0seapressydmin"] . "</value>";}

	echo "<smalluvunit>".$weather["barometer_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Min</b></span><br> <?php echo $weather["thb0seapressydmintime"];?></span></div>

</article>



  <article>
  <div class=actualt>&nbsp;Barometer <?php echo date('F Y')?> </div>
   <div class="temperaturecontainer1">
  <?php
	////pressure max month
	if ($weather["thb0seapressmmax"]>=0)  {
	echo "<div class='temperaturetoday24'>",$weather["thb0seapressmmax"] . "</value>";}
	echo "<smalluvunit>".$weather["barometer_units"]."</smalluvunit>"
	?> </div>
    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Max</b></span><br> <?php echo $weather["thb0seapressmonthmaxtime"];?></span>
    </div>
	</div>
<div class="temperaturecontainer2">
   <?php
	//pressure min month
	if ($weather["thb0seapressmmin"]>=0)  {
	echo "<div class='temperaturetoday0'>",$weather["thb0seapressmmin"] . "</value>";}
	echo "<smalluvunit>".$weather["barometer_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Min</b></span><br> <?php echo $weather["thb0seapressmonthmintime"];?></span>
</div>	</div>
</article>


   <article>
   <div class=actualt>&nbsp;Barometer <?php echo date('Y')?> </div>
   <div class="temperaturecontainer1">

			  <?php
	////pressure max year
	if ($weather["thb0seapressymax"]>=0)  {
	echo "<div class='temperaturetoday24'>",$weather["thb0seapressymax"] . "</value>";}
	echo "<smalluvunit>".$weather["barometer_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend1"><span style='color:rgba(255, 124, 57, 1.000)'><b>Max</b></span><br> <?php echo $weather["thb0seapressyearmaxtime"];?></span></div>
			</div>


<div class="temperaturecontainer2">
 <?php
	//pressure min year
	if ($weather["thb0seapressymin"]>=0)  {
	echo "<div class='temperaturetoday0'>",$weather["thb0seapressymin"] . "</value>";}

	echo "<smalluvunit>".$weather["barometer_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend1"><span style='color:rgba(68, 166, 181, 1.000)'><b>Min</b></span><br> <?php echo $weather["thb0seapressyearmintime"];?></span></div>

</article>


<article>
   <div class=actualt>&nbsp;Barometer All-Time </div>
   <div class="temperaturecontainer1">

			  <?php
	////pressure max year
	if ($weather["thb0seapressamax"]>=0)  {
	echo "<div class='temperaturetoday24'>",$weather["thb0seapressamax"] . "</value>";}
	echo "<smalluvunit>".$weather["barometer_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend1"><span style='color:rgba(255, 124, 57, 1.000)'><b>Max</b></span><br><?php echo $weather["thb0seapressamaxtime"];?></span></div>
			</div>


<div class="temperaturecontainer2">
 <?php
	//pressure min year
	if ($weather["thb0seapressamin"]>=0)  {
	echo "<div class='temperaturetoday0'>",$weather["thb0seapressamin"] . "</value>";}

	echo "<smalluvunit>".$weather["barometer_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend1"><span style='color:rgba(68, 166, 181, 1.000)'><b>Min</b></span><br><?php echo $weather["thb0seapressamintime"];?></span></div>

</article>   
  </main>
  <main class="grid1">
  <articlegraph> 
  <!--<div class=actualt><?php echo date('Y')?> Barometer Chart</div>  //-->
  <iframe  src="w34highcharts/<?php echo $theme1;?>-charts.html?chart='barsmallplot'&span='yearly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>
   
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
  
   </main>
