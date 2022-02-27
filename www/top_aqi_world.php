<body>
<?php  include('shared.php');include('common.php');include('serverdata/archivedata.php');
$pm25 = $pm25avg24;

function pm25_to_aqi($pm25){
	if ($pm25 > 500.5) {
	  $aqi = 500;
	} else if ($pm25 > 350.5 && $pm25 <= 500.5 ) {
	  $aqi = map($pm25, 350.5, 500.5, 400, 500);
	} else if ($pm25 > 250.5 && $pm25 <= 350.5 ) {
	  $aqi = map($pm25, 250.5, 350.5, 300, 400);
	} else if ($pm25 > 150.5 && $pm25 <= 250.5 ) {
	  $aqi = map($pm25, 150.5, 250.5, 200, 300);
	} else if ($pm25 > 55.5 && $pm25 <= 150.5 ) {
	  $aqi = map($pm25, 55.5, 150.5, 150, 200);
	} else if ($pm25 > 35.5 && $pm25 <= 55.5 ) {
	  $aqi = map($pm25, 35.5, 55.5, 100, 150);
	} else if ($pm25 > 12 && $pm25 <= 35.5 ) {
	  $aqi = map($pm25, 12, 35.5, 50, 100);
	} else if ($pm25 > 0 && $pm25 <= 12 ) {
	  $aqi = map($pm25, 0, 12, 0, 50);
	}
	return $aqi;
}

function pm25now_to_aqi($pm25now){
	if ($pm25now > 500.5) {
	  $now = 500;
	} else if ($pm25now > 350.5 && $pm25now <= 500.5 ) {
	  $now = map($pm25now, 350.5, 500.5, 400, 500);
	} else if ($pm25now > 250.5 && $pm25now <= 350.5 ) {
	  $now = map($pm25now, 250.5, 350.5, 300, 400);
	} else if ($pm25now > 150.5 && $pm25now <= 250.5 ) {
	  $now = map($pm25now, 150.5, 250.5, 200, 300);
	} else if ($pm25now > 55.5 && $pm25now <= 150.5 ) {
	  $now = map($pm25now, 55.5, 150.5, 150, 200);
	} else if ($pm25now > 35.5 && $pm25now <= 55.5 ) {
	  $now = map($pm25now, 35.5, 55.5, 100, 150);
	} else if ($pm25now > 12 && $pm25now <= 35.5 ) {
	  $now = map($pm25now, 12, 35.5, 50, 100);
	} else if ($pm25now > 0 && $pm25now <= 12 ) {
	  $now = map($pm25now, 0, 12, 0, 50);
	}
	return $now;
}

function map($value, $fromLow, $fromHigh, $toLow, $toHigh){
    $fromRange = $fromHigh - $fromLow;
    $toRange = $toHigh - $toLow;
    $scaleFactor = $toRange / $fromRange;

    // Re-zero the value within the from range
    $tmpValue = $value - $fromLow;
    // Rescale the value to the to range
    $tmpValue *= $scaleFactor;
    // Re-zero back to the to range
    return $tmpValue + $toLow;
}
$aqiweather["aqi"]       = number_format(pm25_to_aqi($pm25),0);
$aqiweather["now"]       = number_format(pm25now_to_aqi($pm25now),0);
//$aqiweather["now"]       = "205";


?>
<div class="topmin">
<?php //rolling 24hr AQI  
if ($aqiweather["aqi"] >300){echo "<topdaqi9>",$aqiweather["aqi"] ; $aqiweather["band"]= "Hazardous"; } 
 else if ($aqiweather["aqi"] >200){echo "<topdaqi10>",$aqiweather["aqi"] ; $aqiweather["band"]= "V Unhealthy"; }
 else if ($aqiweather["aqi"] >150){echo "<topdaqi8>",$aqiweather["aqi"] ; $aqiweather["band"]= "Unhealthy"; }
 else if ($aqiweather["aqi"] >100){echo "<topdaqi6>",$aqiweather["aqi"] ; $aqiweather["band"]= "UnhealthySI"; }
 else if ($aqiweather["aqi"] >50){echo "<topdaqi5>",$aqiweather["aqi"] ; $aqiweather["band"]= "Moderate"; }
 else if ($aqiweather["aqi"] >=0){echo "<topdaqi2>",$aqiweather["aqi"] ; $aqiweather["band"]= "Good"; } 

?></div>  
</div></smalluvunit>
<a alt="AQI air quality info" title="AQI air quality info" href="pop_aqinfo.php" data-lity>
<div class="yearwordbig"><?php echo "AQI"?></div>
<?php //small title AQI

 if ($aqiweather["aqi"]>100){echo '<div class="minword">AQI';}
 else if ($aqiweather["aqi"]>=0){echo '<div class="minwordlow">AQI';}
  ?>

</div></div>

<div class="mintimedate"><?php echo $aqiweather["band"]?>
</div> 

<div class="topmax">
<?php //rolling Now  
if ($aqiweather["now"] >300){echo "<topdaqi9>",$aqiweather["now"] ; $aqiweather["band"]= "Hazardous"; } 
 else if ($aqiweather["now"] >200){echo "<topdaqi10>",$aqiweather["now"] ; $aqiweather["band"]= "V Unhealthy"; }
 else if ($aqiweather["now"] >150){echo "<topdaqi8>",$aqiweather["now"] ; $aqiweather["band"]= "Unhealthy"; }
 else if ($aqiweather["now"] >100){echo "<topdaqi6>",$aqiweather["now"] ; $aqiweather["band"]= "UnhealthySI"; }
 else if ($aqiweather["now"] >50){echo "<topdaqi5>",$aqiweather["now"] ; $aqiweather["band"]= "Moderate"; }
 else if ($aqiweather["now"] >=0){echo "<topdaqi2>",$aqiweather["now"] ; $aqiweather["band"]= "Good"; } 

?></div>  
</div></smalluvunit>
<!--<a alt="Air Quality Information" title="Air Quality Information" href="aqipopup.php" data-lity > -->


<?php //small title NOW

 if ($aqiweather["now"]>100){echo '<div class="maxword">Now';}
 else if ($aqiweather["now"]>=0){echo '<div class="maxwordlow">Now';}
  ?>

</div></div>

<div class="maxtimedate"><?php echo $aqiweather["band"]?>
</div>

</body>



