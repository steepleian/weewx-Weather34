<?php 
//weather34 weatherflow uv module 27th September 2018 //

include_once('w34CombinedData.php');header('Content-type: text/html; charset=utf-8');
$file1 = 'jsondata/weatherflow.txt';
$url = $file1;
$content = file_get_contents($url);
$json = json_decode($content, true);    
foreach($json['obs'] as $item)
//foreach($json['station_units'] as $item2) 
{
  
   $weatherflow['solar']  = $item['solar_radiation'];
   $weatherflow['uv']  = $item['uv'];
   $weatherflow['lux']  = $item['brightness'];  
}

$section1 = file_get_contents('https://swd.weatherflow.com/swd/rest/observations/station/'.$weatherflowID.'?api_key='.$somethinggoeshere.'');file_put_contents('jsondata/weatherflow.txt',$section1);
?>

<div class="updatedtime"><span><?php if(file_exists($file1)&&time()- filemtime($file1)>900)echo '
<svg id=i-info viewBox="0 0 32 32" width=7 height=7 fill=#ff8841 stroke=#ff8841 stroke-linecap=round stroke-linejoin=round stroke-width=6.25%><path d="M16 14 L16 23 M16 8 L16 10" /><circle cx=16 cy=16 r=14 /></svg><offline> Offline </offline>';else echo '<svg id=i-info viewBox="0 0 32 32" width=7 height=7 fill=#9aba2f stroke=#9aba2f stroke-linecap=round stroke-linejoin=round stroke-width=6.25%><path d="M16 14 L16 23 M16 8 L16 10" /><circle cx=16 cy=16 r=14 />
</svg>';?></span> <?php echo date($timeFormat,$weatherflow["time"]);?></div>
<div class="weather34solarword">W/m&sup2 </div><div class="weather34solarvalue">
<div class="solartodaycontainer1"><?php if ($weatherflow["solar"]>=0){echo "<div class=solarluxtoday>".$weatherflow["solar"];}?></div></div></div>
<div class="solarluxtodayword">Solar Radiation</div>
<div class="solarwrap"></div>
 <div class="weather34-solarrate-bar" >
 <svg id="weather34 solar radiation svg" width="60pt" height="80pt" viewBox="0 0 44 84" version="27-09-2018" >
<path fill="<?php if($weatherflow["solar"]>1000){echo "rgba(237, 73, 71, 0.8)";} else echo "currentcolor"?>"   d=" M 7.00 8.01 C 17.00 8.00 27.00 8.00 80.00 8.00 C 80.00 8.75 80.00 10.25 80.00 11.00 C 27.00 11.00 17.00 11.00 7.00 11.00 C 7.00 10.25 7.00 8.75 7.00 8.01 Z" />
<path fill="<?php if($weatherflow["solar"]>900){echo "rgba(237, 73, 71, 0.8)";} else echo "currentcolor"?>"   d=" M 7.00 12.00 C 17.00 12.00 27.00 12.00 80.00 12.00 C 80.00 13.67 80.00 15.33 80.00 17.00 C 27.00 17.00 17.00 17.00 7.00 17.00 C 7.00 15.33 7.00 13.67 7.00 12.00 Z" />
<path fill="<?php if($weatherflow["solar"]>800){echo " rgba(237, 73, 71, 0.8)";} else echo "currentcolor"?>"   d=" M 7.00 18.00 C 17.00 18.00 27.00 18.00 80.00 18.00 C 80.00 19.67 80.00 21.33 80.00 23.00 C 27.00 23.00 17.00 23.00 7.00 23.00 C 7.00 21.33 7.00 19.67 7.00 18.00 Z" />
<path fill="<?php if($weatherflow["solar"]>700){echo " #f5650a";} else echo "currentcolor"?>"   d=" M 7.00 24.00 C 17.00 24.00 27.00 24.00 80.00 24.00 C 80.00 25.67 80.00 27.33 80.00 29.00 C 27.00 29.00 17.00 29.00 7.00 29.00 C 7.00 27.33 7.00 25.67 7.00 24.00 Z" />
<path fill="<?php if($weatherflow["solar"]>600){echo " #f5650a";} else echo "currentcolor"?>"   d=" M 7.00 30.00 C 17.00 30.00 27.00 30.00 80.00 30.00 C 80.00 31.67 80.00 33.33 80.00 35.00 C 27.00 35.00 17.00 35.00 7.00 35.00 C 7.00 33.33 7.00 31.67 7.00 30.00 Z" />
<path fill="<?php if($weatherflow["solar"]>500){echo " #f5650a";} else echo "currentcolor"?>"   d=" M 7.00 36.00 C 17.00 36.00 27.00 36.00 80.00 36.00 C 80.00 37.67 80.00 39.33 80.00 41.00 C 27.00 41.00 17.00 41.00 7.00 41.00 C 7.00 39.33 7.00 37.67 7.00 36.00 Z" />
<path fill="<?php if($weatherflow["solar"]>400){echo " #ff8841";} else echo "currentcolor"?>"   d=" M 7.00 42.00 C 17.00 41.99 27.00 42.00 80.00 42.00 C 80.00 43.67 80.00 45.33 80.00 47.00 C 27.00 47.00 17.00 47.00 7.00 47.00 C 7.00 45.33 7.00 43.67 7.00 42.00 Z" />
<path fill="<?php if($weatherflow["solar"]>300){echo " #ff8841";} else echo "currentcolor"?>"   d=" M 7.00 48.00 C 17.00 48.00 27.00 48.00 80.00 48.00 C 80.00 49.67 80.00 51.33 80.00 53.00 C 27.00 53.00 17.00 53.00 7.00 53.00 C 7.00 51.33 7.00 49.67 7.00 48.00 Z" />
<path fill="<?php if($weatherflow["solar"]>200){echo " #ff8841";} else echo "currentcolor"?>"   d=" M 7.00 54.00 C 17.00 54.00 27.00 54.00 80.00 54.00 C 80.00 55.67 80.00 57.33 80.00 59.00 C 27.00 59.00 17.00 59.00 7.00 59.00 C 7.00 57.33 7.00 55.67 7.00 54.00 Z" />
<path fill="<?php if($weatherflow["solar"]>100){echo " #ff8841";} else echo "currentcolor"?>"   d=" M 7.00 60.00 C 17.00 60.00 27.00 60.00 80.00 60.00 C 80.00 61.67 80.00 63.33 80.00 65.00 C 27.00 65.00 17.00 65.00 7.00 65.00 C 7.00 63.33 7.00 61.67 7.00 60.00 Z" />
<path fill="<?php if($weatherflow["solar"]>50){echo " #ff8841";} else echo "currentcolor"?>"   d=" M 7.00 66.00 C 17.00 66.00 27.00 66.00 80.00 66.00 C 80.00 67.67 80.00 69.33 80.00 71.00 C 27.00 71.00 17.00 71.00 7.00 71.00 C 7.00 69.33 7.00 67.67 7.00 66.00 Z" />
<path fill="<?php if($weatherflow["solar"]>0){echo " #ff8841";} else echo "currentcolor"?>"   d=" M 7.00 72.00 C 17.00 72.00 27.00 72.00 80.00 72.00 C 80.00 73.67 80.00 75.33 80.00 77.00 C 27.00 77.00 17.00 77.00 7.00 77.00 C 7.00 75.33 7.00 73.67 7.00 72.00 Z" /></svg>
</svg></div>

<div class="uvcontainer1"><?php 
if ($weatherflow["uv"]>10) {echo '<div class=uvtoday11>'.number_format($weatherflow["uv"],1)."<smalluvunit> &nbsp;UVI";}
else if ($weatherflow["uv"]>8) {echo '<div class=uvtoday9-10>'.number_format($weatherflow["uv"],1)."<smalluvunit> &nbsp;UVI";}
else if ($weatherflow["uv"]>5) {echo '<div class=uvtoday6-8>'.number_format($weatherflow["uv"],1)."<smalluvunit> &nbsp;UVI";}
else if ($weatherflow["uv"]>3) {echo '<div class=uvtoday4-5>'.number_format($weatherflow["uv"],1)."<smalluvunit> &nbsp;UVI";}
else if ($weatherflow["uv"]>=0) {echo '<div class=uvtoday1-3>'.number_format($weatherflow["uv"],1)."<smalluvunit> &nbsp;UVI";}
?></smallrainunit></div></div>
<div class="uvtrend"><?php echo "UV INDEX"?></div>  
<div class="uvcaution"><?php if ($weatherflow["uv"]>10) {echo '&nbsp;Extreme UVI';}else if ($weatherflow["uv"]>8) {echo '&nbsp;Very High UVI';}else if ($weatherflow["uv"]>5) {echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;High UVI';}
else if ($weatherflow["uv"]>3) {echo '&nbsp; Moderate UVI';}else if ($weatherflow["uv"]>=0) {echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Low UVI';}?></div>



<?php $lux = number_format($weatherflow["solar"]/0.0084555,0, '.', '');?>
<div class="weather34luxword">Lux</div> <div class="weather34luxvalue"><div class="luxtodaycontainer1">
<?php if ($weather["lux"]>99999) {echo "<div class=luxtoday>".number_format($lux/1000,0). "K";}else echo "<div class=luxtoday>".$lux;?> 
</div></div></div> 
<div class="luxtodayword">Brightness</div>
<div class="luxwrap"></div>
<div class="weather34-luxrate-bar"> 
<svg id="weather34 lux rate svg" width="60pt" height="80pt" viewBox="0 0 44 84" version="27-09-2018" >
<path fill="<?php if($lux>110000){echo " rgba(237, 73, 71, 0.8)";} else echo "currentcolor"?>"   d=" M 7.00 8.01 C 17.00 8.00 27.00 8.00 80.00 8.00 C 80.00 8.75 80.00 10.25 80.00 11.00 C 27.00 11.00 17.00 11.00 7.00 11.00 C 7.00 10.25 7.00 8.75 7.00 8.01 Z" />
<path fill="<?php if($lux>90000){echo " rgba(237, 73, 71, 0.8)";} else echo "currentcolor"?>"   d=" M 7.00 12.00 C 17.00 12.00 27.00 12.00 80.00 12.00 C 80.00 13.67 80.00 15.33 80.00 17.00 C 27.00 17.00 17.00 17.00 7.00 17.00 C 7.00 15.33 7.00 13.67 7.00 12.00 Z" />
<path fill="<?php if($lux>80000){echo " rgba(237, 73, 71, 0.8)";} else echo "currentcolor"?>"   d=" M 7.00 18.00 C 17.00 18.00 27.00 18.00 80.00 18.00 C 80.00 19.67 80.00 21.33 80.00 23.00 C 27.00 23.00 17.00 23.00 7.00 23.00 C 7.00 21.33 7.00 19.67 7.00 18.00 Z" />
<path fill="<?php if($lux>70000){echo " #f5650a";} else echo "currentcolor"?>"   d=" M 7.00 24.00 C 17.00 24.00 27.00 24.00 80.00 24.00 C 80.00 25.67 80.00 27.33 80.00 29.00 C 27.00 29.00 17.00 29.00 7.00 29.00 C 7.00 27.33 7.00 25.67 7.00 24.00 Z" />
<path fill="<?php if($lux>60000){echo " #f5650a";} else echo "currentcolor"?>"   d=" M 7.00 30.00 C 17.00 30.00 27.00 30.00 80.00 30.00 C 80.00 31.67 80.00 33.33 80.00 35.00 C 27.00 35.00 17.00 35.00 7.00 35.00 C 7.00 33.33 7.00 31.67 7.00 30.00 Z" />
<path fill="<?php if($lux>50000){echo " #f5650a";} else echo "currentcolor"?>"   d=" M 7.00 36.00 C 17.00 36.00 27.00 36.00 80.00 36.00 C 80.00 37.67 80.00 39.33 80.00 41.00 C 27.00 41.00 17.00 41.00 7.00 41.00 C 7.00 39.33 7.00 37.67 7.00 36.00 Z" />
<path fill="<?php if($lux>40000){echo " #ff8841";} else echo "currentcolor"?>"   d=" M 7.00 42.00 C 17.00 41.99 27.00 42.00 80.00 42.00 C 80.00 43.67 80.00 45.33 80.00 47.00 C 27.00 47.00 17.00 47.00 7.00 47.00 C 7.00 45.33 7.00 43.67 7.00 42.00 Z" />
<path fill="<?php if($lux>30000){echo " #ff8841";} else echo "currentcolor"?>"   d=" M 7.00 48.00 C 17.00 48.00 27.00 48.00 80.00 48.00 C 80.00 49.67 80.00 51.33 80.00 53.00 C 27.00 53.00 17.00 53.00 7.00 53.00 C 7.00 51.33 7.00 49.67 7.00 48.00 Z" />
<path fill="<?php if($lux>20000){echo " #ff8841";} else echo "currentcolor"?>"   d=" M 7.00 54.00 C 17.00 54.00 27.00 54.00 80.00 54.00 C 80.00 55.67 80.00 57.33 80.00 59.00 C 27.00 59.00 17.00 59.00 7.00 59.00 C 7.00 57.33 7.00 55.67 7.00 54.00 Z" />
<path fill="<?php if($lux>10000){echo " #ff8841";} else echo "currentcolor"?>"   d=" M 7.00 60.00 C 17.00 60.00 27.00 60.00 80.00 60.00 C 80.00 61.67 80.00 63.33 80.00 65.00 C 27.00 65.00 17.00 65.00 7.00 65.00 C 7.00 63.33 7.00 61.67 7.00 60.00 Z" />
<path fill="<?php if($lux>5000){echo " #ff8841";} else echo "currentcolor"?>"   d=" M 7.00 66.00 C 17.00 66.00 27.00 66.00 80.00 66.00 C 80.00 67.67 80.00 69.33 80.00 71.00 C 27.00 71.00 17.00 71.00 7.00 71.00 C 7.00 69.33 7.00 67.67 7.00 66.00 Z" />
<path fill="<?php if($lux>0){echo " #ff8841";} else echo "currentcolor"?>"   d=" M 7.00 72.00 C 17.00 72.00 27.00 72.00 80.00 72.00 C 80.00 73.67 80.00 75.33 80.00 77.00 C 27.00 77.00 17.00 77.00 7.00 77.00 C 7.00 75.33 7.00 73.67 7.00 72.00 Z" /></svg>
 </div>
 
