<?php
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include('w34CombinedData.php');include('settings1.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weather34 Rainfall Almanac Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="css/rainalmanac.<?php echo $theme; ?>.css?version=<?php echo filemtime('css/rainalmanac.' . $theme . '.css'); ?>" rel="stylesheet prefetch">

<div class="weather34darkbrowser" url="Rainfall Almanac"></div>

<main class="grid">
    <article>
     <div class=actualt>Rainfall Today</div>
    <?php // rain today
echo "<div class='rainfalltoday1'>",$weather["rain_today"] . "</value>";echo "<smalluvunit>".$weather["rain_units"]."</smalluvunit>"?>
<div class='w34convertrain'>
<?php //convert rain
if($weather["rain_units"] =='mm'){ echo number_format($weather["rain_today"]*0.0393701,2)."<smalluvunit>in</smalluvunit>";}
elseif($weather["rain_units"] =='in'){ echo number_format($weather["rain_today"]*25.400013716,2)."<smalluvunit>mm</smalluvunit>";}
?>
<div></div>

<div class="hitempy"><?php echo $raininfo . "Last Hour<blue> ", $weather["rain_lasthour"]."</blue> " .$weather["rain_units"] ?></div>
</article>

 <article>
        <div class=actualt>Rainfall Yesterday</div>
    <?php // rain yesterday
echo "<div class='rainfalltoday1'>",$weather["rainydmax"] . "</value>";echo "<smalluvunit>".$weather["rain_units"]."</smalluvunit>"?>
<div class='w34convertrain'>
<?php //convert rain
if($weather["rain_units"] =='mm'){ echo number_format($weather["rainydmax"]*0.0393701,2)."<smalluvunit>in</smalluvunit>";}
elseif($weather["rain_units"] =='in'){ echo number_format($weather["rainydmax"]*25.400013716,2)."<smalluvunit>mm</smalluvunit>";}
?>
<div></div>

<div class="hitempy"><?php echo $raininfo;?>Last 24 Hours<br/><blue><?php echo $weather["rain_24hrs"];?></blue> <?php echo $weather["rain_units"] ?></div>
</article>


    <article>
    <div class=actualt>Rainfall <?php echo date('M Y')?> </div>
    <?php // rain month
echo "<div class='rainfalltoday1'>",$weather["rain_month"] . "</value>";echo "<smalluvunit>".$weather["rain_units"]."</smalluvunit>"?>
<div class='w34convertrain'>
<?php //convert rain
if($weather["rain_units"] =='mm'){ echo number_format($weather["rain_month"]*0.0393701,2)."<smalluvunit>in</smalluvunit>";}
elseif($weather["rain_units"] =='in'){ echo number_format($weather["rain_month"]*25.400013716,2)."<smalluvunit>mm</smalluvunit>";}
?>
<div></div>

<div class="hitempy">
    <?php echo $raininfo;?>Last Rainfall<br/>
    <blue><?php if ($meteobridgeapi[124]=='--'){
        echo "Unknown";
    } else if ($rainlasttime == date("jS M Y ")) {
        echo 'Today';
    } else {
        echo $rainlasttime;
    }?></blue>
</div>
</article>


     <article>
     <div class=actualt>Rainfall <?php echo date("Y");?> </div>
    <?php // rain year
echo "<div class='rainfalltoday1'>",$weather["rain_year"] . "</value>";echo "<smalluvunit>".$weather["rain_units"]."</smalluvunit>"?>
<div class='w34convertrain'>
<?php //convert rain
if($weather["rain_units"] =='mm'){ echo number_format($weather["rain_year"]*0.0393701,2)."<smalluvunit>in</smalluvunit>";}
elseif($weather["rain_units"] =='in'){ echo number_format($weather["rain_year"]*25.400013716,2)."<smalluvunit>mm</smalluvunit>";}
?>
<div></div>

<div class="hitempy"><?php echo $raininfo;?><!--<blue>Rainfall</blue>-->Since<br/>
    <blue>Jan <?php echo date('Y');?></blue>
</div>
</article>

<article>
 <div class=actualt>&nbsp;Rainfall All-Time </div>
    <?php
    if ($weather["rain_alltime"]==''){echo "<div class='rainfalltoday1'>N/A</value>";}
 // rain alltime
else {echo "<div class='rainfalltoday1'>",$weather["rain_alltime"] . "</value>";
echo "<smalluvunit>".$weather["rain_units"]."</smalluvunit>";}?>
<div class='w34convertrain'>
<?php //convert rain
if ($weather["rain_alltime"]==''){echo '';}
else{
if($weather["rain_units"] =='mm'){ echo number_format($weather["rain_alltime"]*0.0393701,2)." <smalluvunit>in</smalluvunit>";}
elseif($weather["rain_units"] =='in'){ echo number_format($weather["rain_alltime"]*25.400013716,2,'.','')."<smalluvunit>mm</smalluvunit>";}
}
?>
<div></div>

<div class="hitempy"><?php echo $raininfo;?><!--<blue>Rainfall</blue>-->Since<br/>
    <blue><?php echo $weather['rainStartTime'];?></blue>
</div>
</article> </main>



 <main class="grid1">
    <articlegraph> 
   
  <iframe  src="w34highcharts/<?php echo $theme1;?>-charts.html?chart='rainsmallplot'&span='yearly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" frameborder="0" scrolling="no" width="100%"  height="100%"></iframe>
   
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