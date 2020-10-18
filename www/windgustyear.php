<?php include('w34CombinedData.php');header('Content-type: text/html; charset=utf-8');date_default_timezone_set($TZ);?>
<div class="topmin">


<?php 
 if ($weather["wind_units"]=='kts'){$weather["wind_units"]="kn";}
 //wind max month
 if ($weather["wind_units"]=='km/h' && $weather["windmmax"]>60){echo "<topred1>",$weather["windmmax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='km/h' && $weather["windmmax"]>40){echo "<toporange1>",$weather["windmmax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='km/h' && $weather["windmmax"]>30){echo "<topyellow1>",$weather["windmmax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='km/h' && $weather["windmmax"]>10){ echo "<topgreen1>", $weather["windmmax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='km/h' && $weather["windmmax"]>0){ echo "<topblue1>", $weather["windmmax"]."<smallwindunit>".$weather["wind_units"] ; }
 //wind  mph
 if ($weather["wind_units"]=='mph' && $weather["windmmax"]>40){echo "<topred1>",$weather["windmmax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='mph' && $weather["windmmax"]>24){echo "<toporange1>",$weather["windmmax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='mph' && $weather["windmmax"]>18){echo "<topyellow1>",$weather["windmmax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='mph' && $weather["windmmax"]>6){ echo "<topgreen1>", $weather["windmmax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='mph' && $weather["windmmax"]>-50){ echo "<topblue1>", $weather["windmmax"]."<smallwindunit>".$weather["wind_units"] ; }
 //wind  ms
 if ($weather["wind_units"]=='m/s' && $weather["windmmax"]>16.6){echo "<topred1>",$weather["windmmax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='m/s' && $weather["windmmax"]>11){echo "<toporange1>",$weather["windmmax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='m/s' && $weather["windmmax"]>8.3){echo "<topyellow1>",$weather["windmmax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='m/s' && $weather["windmmax"]>2.7){ echo "<topgreen1>", $weather["windmmax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='m/s' && $weather["windmmax"]>-50){ echo "<topblue1>", $weather["windmmax"]."<smallwindunit>".$weather["wind_units"] ; }
 //wind  kts
 
 if ($weather["wind_units"]=='kn' && $weather["windmmax"]>32.40){echo "<topred1>",$weather["windmmax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='kn' && $weather["windmmax"]>21.60){echo "<toporange1>",$weather["windmmax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='kn' && $weather["windmmax"]>16.20){echo "<topyellow1>",$weather["windmmax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='kn' && $weather["windmmax"]>5.40){ echo "<topgreen1>", $weather["windmmax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='kn' && $weather["windmmax"]>-0){ echo "<topblue1>", $weather["windmmax"]."<smallwindunit>".$weather["wind_units"] ; }

?>
</div></smalluvunit>

<div class="minword"><?php echo date('M')?></div></div>

<div class="mintimedate"><?php echo $weather["windmmaxtime2"]?>
</div>  
<div class="yearwordbig"><?php echo date('Y')?></div>

<div class="topmax">
<?php //wind max year
 if ($weather["wind_units"]=='km/h' && $weather["windymax"]>60){echo "<topred1>",$weather["windymax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='km/h' && $weather["windymax"]>40){echo "<toporange1>",$weather["windymax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='km/h' && $weather["windymax"]>30){echo "<topyellow1>",$weather["windymax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='km/h' && $weather["windymax"]>10){ echo "<topgreen1>", $weather["windymax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='km/h' && $weather["windymax"]>0){ echo "<topblue1>", $weather["windymax"]."<smallwindunit>".$weather["wind_units"] ; }
 //wind mph
 if ($weather["wind_units"]=='mph' && $weather["windymax"]>40){echo "<topred1>",$weather["windymax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='mph' && $weather["windymax"]>24){echo "<toporange1>",$weather["windymax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='mph' && $weather["windymax"]>18){echo "<topyellow1>",$weather["windymax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='mph' && $weather["windymax"]>6){ echo "<topgreen1>", $weather["windymax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='mph' && $weather["windymax"]>-50){ echo "<topblue1>", $weather["windymax"]."<smallwindunit>".$weather["wind_units"] ; }
 //wind  ms
 if ($weather["wind_units"]=='m/s' && $weather["windymax"]>16.6){echo "<topred1>",$weather["windymax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='m/s' && $weather["windymax"]>11){echo "<toporange1>",$weather["windymax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='m/s' && $weather["windymax"]>8.3){echo "<topyellow1>",$weather["windymax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='m/s' && $weather["windymax"]>2.7){ echo "<topgreen1>", $weather["windymax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='m/s' && $weather["windymax"]>-50){ echo "<topblue1>", $weather["windymax"]."<smallwindunit>".$weather["wind_units"] ; }
 //wind kts
 if ($weather["wind_units"]=='kn' && $weather["windymax"]>32.4){echo "<topred1>",$weather["windymax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='kn' && $weather["windymax"]>21.6){echo "<toporange1>",$weather["windymax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='kn' && $weather["windymax"]>16.2){echo "<topyellow1>",$weather["windymax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='kn' && $weather["windymax"]>5.4){ echo "<topgreen1>", $weather["windymax"]."<smallwindunit>".$weather["wind_units"] ; }
 else if ($weather["wind_units"]=='kn' && $weather["windymax"]>-0){ echo "<topblue1>", $weather["windymax"]."<smallwindunit>".$weather["wind_units"] ; }
?>
</div></smalluvunit>
<div class="maxword"><?php echo date('Y')?></div></div>
<div class="maxtimedate"><?php echo $weather["windymaxtime2"]?>
</div>  

 