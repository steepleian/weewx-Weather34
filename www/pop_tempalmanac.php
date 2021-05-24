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

<div class="weather34darkbrowser" url="Temperature Almanac"></div>

<main class="grid">
  <article>
   <div class=actualt>Temperature Today </div>
   <div class="temperaturecontainer">
	 <?php
	//temp max today
	if ($tempunit=='C' && $weather["tempdmax"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmax"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmax"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmax"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmax"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmax"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmax"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmax"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmax"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmax"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmax"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmax"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempdmax"] . "</value>";}

	//f
	//temp max today
	if ($tempunit=='F' && $weather["tempdmax"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmax"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmax"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmax"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmax"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmax"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmax"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmax"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmax"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmax"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmax"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmax"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempdmax"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div>
    <div class="temperaturetrend"><?php echo $weather["tempdmaxtime"];?></span></div>

    <div class="temperaturecontainer">
	 <?php
	//temp min today
	if ($tempunit=='C' && $weather["tempdmin"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmin"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmin"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmin"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmin"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmin"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmin"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmin"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmin"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmin"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmin"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmin"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempdmin"] . "</value>";}

	//f
	//temp min today
	if ($tempunit=='F' && $weather["tempdmin"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmin"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmin"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmin"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmin"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmin"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmin"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmin"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmin"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmin"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmin"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmin"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempdmin"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div></div>
    <div class="temperaturetrend"><?php echo $weather["tempdmintime"];?></span></div>

<div class=hitempypos>
 <div class="hitempd" >Dew Max<orange><?php echo "&nbsp;".$weather["dewmax"],"</orange>&deg;",$weather["temp_units"]," ",$weather["dewmaxtime"];?></span><br></div>
 <div class="hitempd" style="margin-top:-5px;">Dew Min<blue><?php echo "&nbsp;".$weather["dewmin"],"</blue>&deg;",$weather["temp_units"]," ",$weather["dewmintime"];?></span><br></div>
</div>

 <div class=hitempypos>
<div class="hitempd1" style="margin-top:25px;">Hum Max<orange><?php echo "&nbsp;".$weather["humidity_max"],"</orange>%  ",$weather["humidity_maxtime"];?></span><br></div><br>
<div class="hitempd1" style="margin-top:30px;">Hum Min<blue><?php echo "&nbsp;".$weather["humidity_min"],"</blue>%  ",$weather["humidity_mintime"];?></span><br></div><br>
</div>
</div>
</article>

<article>
   <div class=actualt>Temperature Yesterday </div>
   <div class="temperaturecontainer">
	 <?php
	//temp max yesterday
	if ($tempunit=='C' && $weather["tempydmax"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmax"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmax"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmax"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmax"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmax"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmax"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmax"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmax"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmax"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmax"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmax"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempydmax"] . "</value>";}

	//f
	//temp max yesterday
	if ($tempunit=='F' && $weather["tempydmax"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmax"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmax"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmax"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmax"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmax"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmax"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmax"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmax"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmax"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmax"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmax"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempydmax"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div>
    <div class="temperaturetrend"><?php echo $weather["tempydmaxtime"];?></span></div>

    <div class="temperaturecontainer">
	 <?php
	//temp min yesterday
	if ($tempunit=='C' && $weather["tempydmin"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmin"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmin"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmin"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmin"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmin"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmin"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmin"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmin"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmin"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmin"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmin"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempydmin"] . "</value>";}

	//f
	//temp min yesterday
	if ($tempunit=='F' && $weather["tempydmin"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmin"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmin"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmin"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmin"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmin"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmin"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmin"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmin"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmin"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmin"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmin"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempydmin"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div></div>
    <div class="temperaturetrend"><?php echo $weather["tempydmintime"];?></span></div>

<div class=hitempypos>
 <div class="hitempd" >Dew Max<orange><?php echo "&nbsp;".$weather["dewydmax"],"</orange>&deg;",$weather["temp_units"]," ",$weather["dewydmaxtime"];?></span><br></div>
 <div class="hitempd" style="margin-top:-5px;">Dew Min<blue><?php echo "&nbsp;".$weather["dewydmin"],"</blue>&deg;",$weather["temp_units"]," ",$weather["dewydmintime"];?></span><br></div>
</div>

 <div class=hitempypos>
<div class="hitempd1" style="margin-top:25px;">Hum Max<orange><?php echo "&nbsp;".$weather["humidity_ydmax"],"</orange>%  ",$weather["humidity_ydmaxtime"];?></span><br></div><br>
<div class="hitempd1" style="margin-top:30px;">Hum Min<blue><?php echo "&nbsp;".$weather["humidity_ydmin"],"</blue>%  ",$weather["humidity_ydmintime"];?></span><br></div><br>
</div>
</article>




  <article>
   <div class="temperaturecontainer">
	 <?php
	//temp max month
	if ($tempunit=='C' && $weather["tempmmax"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmax"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmax"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmax"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmax"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmax"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmax"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmax"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmax"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmax"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmax"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmax"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempmmax"] . "</value>";}

	//f
	//temp max month
	if ($tempunit=='F' && $weather["tempmmax"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmax"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmax"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmax"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmax"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmax"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmax"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmax"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmax"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmax"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmax"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmax"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempmmax"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div>
    <div class="temperaturetrend1"><?php echo $weather["tempmmaxtime"];?></span></div>

    <div class="temperaturecontainer">
	 <?php
	//temp min month
	if ($tempunit=='C' && $weather["tempmmin"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmin"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmin"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmin"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmin"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmin"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmin"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmin"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmin"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmin"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmin"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmin"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempmmin"] . "</value>";}

	//f
	//temp min month
	if ($tempunit=='F' && $weather["tempmmin"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmin"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmin"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmin"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmin"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmin"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmin"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmin"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmin"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmin"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmin"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmin"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempmmin"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div></div>
    <div class="temperaturetrend1"><?php echo $weather["tempmmintime"];?></span></div>

<div class=hitempypos>
 <div class="hitempd" >Dew Max<orange><?php echo "&nbsp;".$weather["dewmmax"],"</orange>&deg;",$weather["temp_units"]," ",$weather["dewmmaxtime"];?></span><br></div>
 <div class="hitempd" style="margin-top:-5px;">Dew Min<blue><?php echo "&nbsp;".$weather["dewmmin"],"</blue>&deg;",$weather["temp_units"]," ",$weather["dewmmintime"];?></span><br></div>
</div>

 <div class=hitempypos>
<div class="hitempd1" style="margin-top:25px;">Hum Max<orange><?php echo "&nbsp;".$weather["humidity_mmax"],"</orange>%  ",$weather["humidity_mmaxtime"];?></span><br></div><br>
<div class="hitempd1" style="margin-top:30px;">Hum Min<blue><?php echo "&nbsp;".$weather["humidity_mmin"],"</blue>%  ",$weather["humidity_mmintime"];?></span><br></div><br>
</div>
</article>


   <article>
  <div class=actualt>Temperature <?php echo date('Y')?> </div>
   <div class="temperaturecontainer">
	 <?php
	//temp max year
	if ($tempunit=='C' && $weather["tempymax"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymax"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymax"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymax"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymax"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymax"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymax"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymax"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymax"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymax"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymax"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymax"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempymax"] . "</value>";}

	//f
	//temp max year
	if ($tempunit=='F' && $weather["tempymax"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymax"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymax"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymax"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymax"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymax"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymax"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymax"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymax"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymax"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymax"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymax"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempymax"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div>
    <div class="temperaturetrend1"><?php echo $weather["tempymaxtime"];?></span></div>

    <div class="temperaturecontainer">
	 <?php
	//temp min year
	if ($tempunit=='C' && $weather["tempymin"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymin"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymin"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymin"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymin"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymin"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymin"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymin"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymin"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymin"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymin"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymin"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempymin"] . "</value>";}

	//f
	//temp min year
	if ($tempunit=='F' && $weather["tempymin"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymin"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymin"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymin"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymin"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymin"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymin"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymin"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymin"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymin"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymin"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymin"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempymin"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div></div>
    <div class="temperaturetrend1"><?php echo $weather["tempymintime"];?></span></div>

 <div class=hitempypos>
 <div class="hitempd" >Dew Max<orange><?php echo "&nbsp;".$weather["dewymax"],"</orange>&deg;",$weather["temp_units"]," ",$weather["dewymaxtime"];?></span><br></div>
 <div class="hitempd" style="margin-top:-5px;">Dew Min<blue><?php echo "&nbsp;".$weather["dewymin"],"</blue>&deg;",$weather["temp_units"]," ",$weather["dewymintime"];?></span><br></div>
</div>

 <div class=hitempypos>
<div class="hitempd1" style="margin-top:25px;">Hum Max<orange><?php echo "&nbsp;".$weather["humidity_ymax"],"</orange>%  ",$weather["humidity_ymaxtime"];?></span><br></div><br>
<div class="hitempd1" style="margin-top:30px;">Hum Min<blue><?php echo "&nbsp;".$weather["humidity_ymin"],"</blue>%  ",$weather["humidity_ymintime"];?></span><br></div><br>
</div>
</article>






 <article  style="height:105px;">
  <div class=actualt>Temperature All-Time </div>
   <div class="temperaturecontainer">
	 <?php
	//temp max year
	if ($tempunit=='C' && $weather["tempamax"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamax"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamax"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamax"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamax"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamax"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamax"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamax"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamax"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamax"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamax"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamax"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempamax"] . "</value>";}

	//f
	//temp max year
	if ($tempunit=='F' && $weather["tempamax"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamax"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamax"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamax"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamax"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamax"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamax"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamax"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamax"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamax"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamax"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamax"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempamax"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div>


    <div class="temperaturecontainer">
	 <?php
	//temp min year
	if ($tempunit=='C' && $weather["tempamin"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamin"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamin"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamin"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamin"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamin"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamin"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamin"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamin"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamin"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamin"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamin"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempamin"] . "</value>";}

	//f
	//temp min year
	if ($tempunit=='F' && $weather["tempamin"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamin"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamin"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamin"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamin"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamin"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamin"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamin"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamin"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamin"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamin"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamin"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempamin"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div></div>


  <div class=hitempypos>
 <div class="hitempd2" ><?php echo $weather["tempamaxtime"];?></span><br></div>
 <div class="hitempd2" style="margin-top:25px;"><?php echo $weather["tempamintime"];?></div>
</div>

</article>

<article  style="height:105px;">
  <div class=actualt>Dewpoint All-Time </div>
   <div class="temperaturecontainer">
	 <?php
	//temp max year
	if ($tempunit=='C' && $weather["dewamax"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamax"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamax"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamax"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamax"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamax"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamax"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamax"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamax"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamax"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamax"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamax"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["dewamax"] . "</value>";}

	//f
	//temp max year
	if ($tempunit=='F' && $weather["dewamax"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamax"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamax"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamax"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamax"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamax"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamax"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamax"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamax"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamax"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamax"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamax"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["dewamax"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div>



    <div class="temperaturecontainer">
	 <?php
	//temp min year
	if ($tempunit=='C' && $weather["dewamin"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamin"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamin"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamin"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamin"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamin"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamin"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamin"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamin"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamin"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamin"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamin"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["dewamin"] . "</value>";}

	//f
	//temp min year
	if ($tempunit=='F' && $weather["dewamin"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamin"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamin"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamin"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamin"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamin"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamin"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamin"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamin"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamin"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamin"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamin"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["dewamin"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div></div>
   <div class=hitempypos>
 <div class="hitempd2" ><?php echo $weather["dewamaxtime"];?></span><br></div>
 <div class="hitempd2" style="margin-top:25px;"><?php echo $weather["dewamintime"];?></div>
</div>




</article> 
 </main>
<main class="grid1">
  <articlegraph> 
  <iframe  src="w34highcharts/dark-charts.html?chart='tempsmallplot'&span='yearly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>
   
  </articlegraph> 
  
  
  
<articlegraph style="height:30px">  
  <div class="lotemp">
  <?php echo $info?> 
<a href="https://highcharts.com" title="https://highcharts.com" target="_blank" style="font-size:8px;"> Charts rendered and compiled using Highcharts </a></span>
  </div>   
    
  <div class="lotemp">
  <?php echo $info?> <a href="https://weather34.com" title="weather34.com" target="_blank" style="font-size:9px;">CSS/SVG/PHP scripts were developed by weather34.com  for use in the weather34 template &copy; 2015-<?php echo date('Y');?>
  </a></div>
   
  </articlegraph> 
  
</main>
