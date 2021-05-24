<?php 
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include('w34CombinedData.php');include('settings1.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 UV-INDEX Almanac Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/uvalmanac.<?php echo $theme; ?>.css?version=<?php echo filemtime('css/uvalmanac.' . $theme . '.css'); ?>" rel="stylesheet prefetch">

<div class="weather34darkbrowser" url="UV-INDEX Almanac"></div>
  
<main class="grid">
  <article>  
   <div class=actualt>Today </div>        
   <div class="temperaturecontainer">
	
             <?php
	// UV INDEX
	if ($weather["uvdmax"]>=10)  {
	echo "<div class='uvtoday11'>",$weather["uvdmax"] . "</value>";} 	
	else if ($weather["uvdmax"]>=8)  {
	echo "<div class='uvtoday9-10'>",$weather["uvdmax"] . "</value>";}
	else if ($weather["uvdmax"]>=5)  {
	echo "<div class='uvtoday6-8'>",$weather["uvdmax"] . "</value>";}
	else if ($weather["uvdmax"]>=3)  {
	echo "<div class='uvtoday4-5'>",$weather["uvdmax"] . "</value>";} 		
	else if ($weather["uvdmax"]>=-0) {
	echo "<div class='uvtoday1'>",$weather["uvdmax"] . "</value>";}		
	echo "<smalluvunit> UVI</smalluvunit>"
?>

</div>

<div class="higust">Maximum Recorded<br><blue><?php echo $weather["uvdmaxtime"];?></blue></div>



</article> 

 <article> 
  <div class=actualt>Yesterday </div>        
   <div class="temperaturecontainer">
	
            <?php
	// UV INDEX
	if ($weather["uvydmax"]>=10)  {
	echo "<div class='uvtoday11'>",$weather["uvydmax"] . "</value>";} 	
	else if ($weather["uvydmax"]>=8)  {
	echo "<div class='uvtoday9-10'>",$weather["uvydmax"] . "</value>";}
	else if ($weather["uvydmax"]>=5)  {
	echo "<div class='uvtoday6-8'>",$weather["uvydmax"] . "</value>";}
	else if ($weather["uvydmax"]>=3)  {
	echo "<div class='uvtoday4-5'>",$weather["uvydmax"] . "</value>";} 		
	else if ($weather["uvydmax"]>=-0) {
	echo "<div class='uvtoday1'>",$weather["uvydmax"] . "</value>";}		
	echo "<smalluvunit> UVI</smalluvunit>"
?>

</div>

<div class="higust">Maximum Recorded<br><blue><?php echo $weather["uvydmaxtime"];?></blue></div>



</article>  
  
 
  
  <article> 
  <div class=actualt><?php echo date('M Y')?> </div>        
   <div class="temperaturecontainer">
	
            <?php
	// UV INDEX
	if ($weather["uvmmax"]>=10)  {
	echo "<div class='uvtoday11'>",$weather["uvmmax"] . "</value>";} 	
	else if ($weather["uvmmax"]>=8)  {
	echo "<div class='uvtoday9-10'>",$weather["uvmmax"] . "</value>";}
	else if ($weather["uvmmax"]>=5)  {
	echo "<div class='uvtoday6-8'>",$weather["uvmmax"] . "</value>";}
	else if ($weather["uvmmax"]>=3)  {
	echo "<div class='uvtoday4-5'>",$weather["uvmmax"] . "</value>";} 		
	else if ($weather["uvmmax"]>=-0) {
	echo "<div class='uvtoday1'>",$weather["uvmmax"] . "</value>";}		
	echo "<smalluvunit> UVI</smalluvunit>"
?>

</div>

<div class="higust">Maximum Recorded <br><blue><?php echo $weather["uvmmaxtime"];?></blue></div>



</article>  
  
  
    <article> 
  <div class=actualt><?php echo date('Y')?> </div>        
   <div class="temperaturecontainer">
	
            <?php
	// UV INDEX
	if ($weather["uvymax"]>=10)  {
	echo "<div class='uvtoday11'>",$weather["uvymax"] . "</value>";} 	
	else if ($weather["uvymax"]>=8)  {
	echo "<div class='uvtoday9-10'>",$weather["uvymax"] . "</value>";}
	else if ($weather["uvymax"]>=5)  {
	echo "<div class='uvtoday6-8'>",$weather["uvymax"] . "</value>";}
	else if ($weather["uvymax"]>=3)  {
	echo "<div class='uvtoday4-5'>",$weather["uvymax"] . "</value>";} 		
	else if ($weather["uvymax"]>=-0) {
	echo "<div class='uvtoday1'>",$weather["uvymax"] . "</value>";}		
	echo "<smalluvunit> UVI</smalluvunit>"
?>

</div>

<div class="higust">Maximum Recorded <br><blue><?php echo $weather["uvymaxtime"];?></blue></div>


</article>
  <article> 
  <div class=actualt><?php echo 'All-Time';?> </div>        
   <div class="temperaturecontainer">
	
            <?php
	// UV INDEX
	if ($weather["uvamax"]>=10)  {
	echo "<div class='uvtoday11'>",$weather["uvamax"] . "</value>";} 	
	else if ($weather["uvamax"]>=8)  {
	echo "<div class='uvtoday9-10'>",$weather["uvamax"] . "</value>";}
	else if ($weather["uvymax"]>=5)  {
	echo "<div class='uvtoday6-8'>",$weather["uvamax"] . "</value>";}
	else if ($weather["uvamax"]>=3)  {
	echo "<div class='uvtoday4-5'>",$weather["uvamax"] . "</value>";} 		
	else if ($weather["uvamax"]>=-0) {
	echo "<div class='uvtoday1'>",$weather["uvamax"] . "</value>";}		
	echo "<smalluvunit> UVI</smalluvunit>"
?>

</div>

<div class="higust">Maximum Recorded <br><blue><?php echo $weather["uvamaxtime"];?></blue></div>


</article>
</main>
 <main class="grid1">
  <articlegraph> 
  <!--<div class=actualt>Today <span style="color:#ff9350">UV-INDEX</div>  //-->
  <iframe  src="w34highcharts/<?php echo $theme1;?>-charts.html?chart='uvsmallplot'&span='yearly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>
 
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
