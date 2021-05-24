<?php
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include('w34CombinedData.php'); include('settings1.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 Windspeed Almanac Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/windalmanac.<?php echo $theme; ?>.css?version=<?php echo filemtime('css/windalmanac.' . $theme . '.css'); ?>" rel="stylesheet prefetch">

<div class="weather34darkbrowser" url="Windspeed Almanac"></div>

<main class="grid">
  

<article>
   <div class=actualt>Max Today </div>
   <?php
	if ($weather["wind_units"]=='kts'){$weather["wind_units"]="kn";}
	// wind day km/h
	if ($weather["wind_units"]=='km/h' && $weather["winddmax"]>=60)  {
	echo "<div class='windtoday60'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["winddmax"]>=40)  {
	echo "<div class='windtoday40'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["winddmax"]>=30)  {
	echo "<div class='windtoday30'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["winddmax"]>=10)  {
	echo "<div class='windtoday10'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["winddmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["winddmax"] . "</value>";}

	//mph
	if ($weather["wind_units"]=='mph' && $weather["winddmax"]>=37.2)  {
	echo "<div class='windtoday60'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["winddmax"]>=24.85)  {
	echo "<div class='windtoday40'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["winddmax"]>=18.64)  {
	echo "<div class='windtoday30'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["winddmax"]>=6.2)  {
	echo "<div class='windtoday10'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["winddmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["winddmax"] . "</value>";}

	//kts
	if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=32.40)  {
	echo "<div class='windtoday60'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=21.60)  {
	echo "<div class='windtoday40'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=16.20)  {
	echo "<div class='windtoday30'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=5.40)  {
	echo "<div class='windtoday10'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["winddmax"] . "</value>";}

	//ms
	if ($weather["wind_units"]=='m/s' && $weather["winddmax"]>=16.66)  {
	echo "<div class='windtoday60'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["winddmax"]>=11.11)  {
	echo "<div class='windtoday40'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["winddmax"]>=8.33)  {
	echo "<div class='windtoday30'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["winddmax"]>=2.77)  {
	echo "<div class='windtoday10'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["winddmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["winddmax"] . "</value>";}
	echo "<smalluvunit>".$weather["wind_units"]."</smalluvunit>";

?>
<div></div>

<div class='w34convertrain'>
<?php //convert rain
if($weather["wind_units"] =='km/h'){echo number_format($weather["winddmax"]*0.621371,1)." <smalluvunit>mph</smalluvunit";}
if($weather["wind_units"] =='mph'){ echo number_format($weather["winddmax"]*1.60934,1)."<smalluvunit>km/h</smalluvunit>";}
if($weather["wind_units"] =='m/s'){ echo number_format($weather["winddmax"]*3.5999988862317131577,1)."<smalluvunit>km/h</smalluvunit>";}
if($weather["wind_units"] =='kn'){ echo number_format($weather["winddmax"]*1.8519994254280931489,1)."<smalluvunit>km/h</smalluvunit>";}
?>
</div>

<div class="hitempy">
Max Recorded <blue><?php echo $weather["winddmaxtime"];?></blue></div>
</smalluvunit>
</article>

 <article>
   <div class=actualt>Max Yesterday </div>
   <?php
	// wind yesterday km/h
	if ($weather["wind_units"]=='km/h' && $weather["windydmax"]>=60)  {
	echo "<div class='windtoday60'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windydmax"]>=40)  {
	echo "<div class='windtoday40'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windydmax"]>=30)  {
	echo "<div class='windtoday30'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windydmax"]>=10)  {
	echo "<div class='windtoday10'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windydmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windydmax"] . "</value>";}

	//mph
	if ($weather["wind_units"]=='mph' && $weather["windydmax"]>=37.2)  {
	echo "<div class='windtoday60'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windydmax"]>=24.85)  {
	echo "<div class='windtoday40'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windydmax"]>=18.64)  {
	echo "<div class='windtoday30'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windydmax"]>=6.2)  {
	echo "<div class='windtoday10'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windydmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windydmax"] . "</value>";}
	
	//kts
	if ($weather["wind_units"]=='kn' && $weather["windydmax"]>=32.40)  {
	echo "<div class='windtoday60'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["windydmax"]>=21.60)  {
	echo "<div class='windtoday40'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["windydmax"]>=16.20)  {
	echo "<div class='windtoday30'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["windydmax"]>=5.40)  {
	echo "<div class='windtoday10'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["windydmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windydmax"] . "</value>";}

	//ms
	if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=16.66)  {
	echo "<div class='windtoday60'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=11.11)  {
	echo "<div class='windtoday40'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=8.33)  {
	echo "<div class='windtoday30'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=2.77)  {
	echo "<div class='windtoday10'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windydmax"] . "</value>";}
	echo "<smalluvunit>".$weather["wind_units"]."</smalluvunit>";

?>
<div></div>
<div class='w34convertrain'>
<?php //convert rain
if($weather["wind_units"] =='km/h'){echo number_format($weather["windydmax"]*0.621371,1)." <smalluvunit>mph</smalluvunit";}
if($weather["wind_units"] =='mph'){ echo number_format($weather["windydmax"]*1.60934,1)."<smalluvunit>km/h</smalluvunit>";}
if($weather["wind_units"] =='m/s'){ echo number_format($weather["windydmax"]*3.5999988862317131577,1)."<smalluvunit>km/h</smalluvunit>";}
if($weather["wind_units"] =='kn'){ echo number_format($weather["windydmax"]*1.8519994254280931489,1)."<smalluvunit>km/h</smalluvunit>";}
?>
</div>

<div class="hitempy">
Max Recorded <br><blue><?php echo $weather["windydmaxtime"];?></blue></div>

</article>



  <article>
  <div class=actualt>Max <?php echo date('F Y')?> </div>
    <?php
	// wind month km/h
	if ($weather["wind_units"]=='km/h' && $weather["windmmax"]>=60)  {
	echo "<div class='windtoday60'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windmmax"]>=40)  {
	echo "<div class='windtoday40'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windmmax"]>=30)  {
	echo "<div class='windtoday30'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windmmax"]>=10)  {
	echo "<div class='windtoday10'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windmmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windmmax"] . "</value>";}

	//mph
	if ($weather["wind_units"]=='mph' && $weather["windmmax"]>=37.2)  {
	echo "<div class='windtoday60'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windmmax"]>=24.85)  {
	echo "<div class='windtoday40'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windmmax"]>=18.64)  {
	echo "<div class='windtoday30'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windmmax"]>=6.2)  {
	echo "<div class='windtoday10'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windmmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windmmax"] . "</value>";}

	//kts
	if ($weather["wind_units"]=='kn' && $weather["windmmax"]>=32.40)  {
	echo "<div class='windtoday60'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["windmmax"]>=21.60)  {
	echo "<div class='windtoday40'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["windmmax"]>=16.20)  {
	echo "<div class='windtoday30'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["windmmax"]>=5.40)  {
	echo "<div class='windtoday10'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["windmmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windmmax"] . "</value>";}

	//ms
	if ($weather["wind_units"]=='m/s' && $weather["windmmax"]>=16.66)  {
	echo "<div class='windtoday60'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windmmax"]>=11.11)  {
	echo "<div class='windtoday40'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windmmax"]>=8.33)  {
	echo "<div class='windtoday30'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windmmax"]>=2.77)  {
	echo "<div class='windtoday10'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windmmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windmmax"] . "</value>";}
	echo "<smalluvunit>".$weather["wind_units"]."</smalluvunit>";

?>
<div></div>
<div class='w34convertrain'>
<?php //convert rain
if($weather["wind_units"] =='km/h'){echo number_format($weather["windmmax"]*0.621371,1)." <smalluvunit>mph</smalluvunit";}
if($weather["wind_units"] =='mph'){ echo number_format($weather["windmmax"]*1.60934,1)."<smalluvunit>km/h</smalluvunit>";}
if($weather["wind_units"] =='m/s'){ echo number_format($weather["windmmax"]*3.5999988862317131577,1)."<smalluvunit>km/h</smalluvunit>";}
if($weather["wind_units"] =='kn'){ echo number_format($weather["windmmax"]*1.8519994254280931489,1)."<smalluvunit>km/h</smalluvunit>";}
?>
</div>

<div class="hitempy">
Max Recorded <br><blue><?php echo $weather["windmmaxtime"];?></blue></div>

</article>


   <article>
   <div class=actualt>Max <?php echo date('Y')?> </div>
   <?php
	// wind year km/h
	if ($weather["wind_units"]=='km/h' && $weather["windymax"]>=60)  {
	echo "<div class='windtoday60'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windymax"]>=40)  {
	echo "<div class='windtoday40'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windymax"]>=30)  {
	echo "<div class='windtoday30'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windymax"]>=10)  {
	echo "<div class='windtoday10'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windymax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windymax"] . "</value>";}

	//mph
	if ($weather["wind_units"]=='mph' && $weather["windymax"]>=37.2)  {
	echo "<div class='windtoday60'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windymax"]>=24.85)  {
	echo "<div class='windtoday40'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windymax"]>=18.64)  {
	echo "<div class='windtoday30'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windymax"]>=6.2)  {
	echo "<div class='windtoday10'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windymax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windymax"] . "</value>";}

	//kts
	if ($weather["wind_units"]=='kn' && $weather["windymax"]>=32.40)  {
	echo "<div class='windtoday60'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["windymax"]>=21.60)  {
	echo "<div class='windtoday40'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["windymax"]>=16.20)  {
	echo "<div class='windtoday30'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["windymax"]>=5.40)  {
	echo "<div class='windtoday10'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["windymax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windymax"] . "</value>";}

	//ms
	if ($weather["wind_units"]=='m/s' && $weather["windymax"]>=16.66)  {
	echo "<div class='windtoday60'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windymax"]>=11.11)  {
	echo "<div class='windtoday40'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windymax"]>=8.33)  {
	echo "<div class='windtoday30'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windymax"]>=2.77)  {
	echo "<div class='windtoday10'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windymax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windymax"] . "</value>";}
	echo "<smalluvunit>".$weather["wind_units"]."</smalluvunit>";

?>
<div></div>
<div class='w34convertrain'>
<?php //convert rain
if($weather["wind_units"] =='km/h'){echo number_format($weather["windymax"]*0.621371,1)." <smalluvunit>mph</smalluvunit";}
if($weather["wind_units"] =='mph'){ echo number_format($weather["windymax"]*1.60934,1)."<smalluvunit>km/h</smalluvunit>";}
if($weather["wind_units"] =='m/s'){ echo number_format($weather["windymax"]*3.5999988862317131577,1)."<smalluvunit>km/h</smalluvunit>";}
if($weather["wind_units"] =='kn'){ echo number_format($weather["windymax"]*1.8519994254280931489,1)."<smalluvunit>km/h</smalluvunit>";}
?>
</div>

<div class="hitempy">
Max Recorded <br><blue><?php echo $weather["windymaxtime"];?></blue></div>

</article>



 <article>
   <div class=actualt>Max All-Time</div>
   <?php
	// wind year km/h
	if ($weather["wind_units"]=='km/h' && $weather["windamax"]>=60)  {
	echo "<div class='windtoday60'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windamax"]>=40)  {
	echo "<div class='windtoday40'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windamax"]>=30)  {
	echo "<div class='windtoday30'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windamax"]>=10)  {
	echo "<div class='windtoday10'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windamax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windamax"] . "</value>";}

	//mph
	if ($weather["wind_units"]=='mph' && $weather["windamax"]>=37.2)  {
	echo "<div class='windtoday60'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windamax"]>=24.85)  {
	echo "<div class='windtoday40'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windamax"]>=18.64)  {
	echo "<div class='windtoday30'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windamax"]>=6.2)  {
	echo "<div class='windtoday10'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windamax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windamax"] . "</value>";}

	//kts
	if ($weather["wind_units"]=='kn' && $weather["windamax"]>=32.40)  {
	echo "<div class='windtoday60'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["windamax"]>=21.60)  {
	echo "<div class='windtoday40'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["windamax"]>=16.20)  {
	echo "<div class='windtoday30'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["windamax"]>=5.40)  {
	echo "<div class='windtoday10'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["windamax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windamax"] . "</value>";}

	//ms
	if ($weather["wind_units"]=='m/s' && $weather["windamax"]>=16.66)  {
	echo "<div class='windtoday60'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windamax"]>=11.11)  {
	echo "<div class='windtoday40'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windamax"]>=8.33)  {
	echo "<div class='windtoday30'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windamax"]>=2.77)  {
	echo "<div class='windtoday10'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windamax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windamax"] . "</value>";}
	echo "<smalluvunit>".$weather["wind_units"]."</smalluvunit>";

?>
<div></div>
<div class='w34convertrain'>
<?php //convert rain
if($weather["wind_units"] =='km/h'){echo number_format($weather["windamax"]*0.621371,1)." <smalluvunit>mph</smalluvunit";}
if($weather["wind_units"] =='mph'){ echo number_format($weather["windamax"]*1.60934,1)."<smalluvunit>km/h</smalluvunit>";}
if($weather["wind_units"] =='m/s'){ echo number_format($weather["windamax"]*3.5999988862317131577,1)."<smalluvunit>km/h</smalluvunit>";}
if($weather["wind_units"] =='kn'){ echo number_format($weather["windamax"]*1.8519994254280931489,1)."<smalluvunit>km/h</smalluvunit>";}
?>
</div>

<div class="hitempy">
Max Recorded <br><blue><?php echo $weather["windamaxtime"];?></blue></div>

</article>  
</main>

 <main class="grid1">
    
  <articlegraph> 
  <!--<div class=actualt>12 Monthly Wind (<?php echo $weather["wind_units"]?>)</div> //--> 
  <iframe  src="w34highcharts/<?php echo $theme1?>-charts.html?chart='windsmallplot'&span='yearly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>
   
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
