<body>
<?php  include('shared.php');include('common.php');include('serverdata/airqualitydata.php');
$pm25 = $pm2_5_now_ecowitt;

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

$a="";if($aqiweather["aqi"]==$a){$aqiweather["aqi"] = "0" ;}
?>
<div class="updatedtime"><span><?php if(file_exists('serverdata/airqualitydata.php') && time() - filemtime('serverdata/airqualitydata.php')<1800) {
  echo $online." ".date($timeFormat, filemtime('serverdata/airqualitydata.php'));
  } else {
  echo $offline. '<offline> Offline </offline>';
  }?></div> 
<div class="airqualitywordbig">AQI</div>
<div class="tempconverter2">
<?php //WEATHER34 AIR QAULITY SVG
if ($aqiweather["aqi"]>200){echo "<div class=tempconvertercirclepurple>PM2.5"; }

else if ($aqiweather["aqi"]>150){echo "<div class=tempconvertercirclered>PM2.5" ; }
else if ($aqiweather["aqi"]>100){echo "<div class=tempconvertercircleorange>PM2.5" ; }
else if ($aqiweather["aqi"]>50){echo "<div class=tempconvertercircleyellow>PM2.5" ; }
else if ($aqiweather["aqi"]>=0){echo "<div class=tempconvertercirclegreen>PM2.5" ; }
?>


</div></div></div>

<div class="airqualitymoduleposition">
<div class="tempcontainer">
<?php //WEATHER34 AIR QAULITY SVG
if ($aqiweather["aqi"]>300){echo "<div class=air300><img src='css/aqi/hazair.svg?ver=1.4' width='110px' height='100px' alt='weather34 hazardous air quality' title='weather34 hazardous air quality' "; }
else if ($aqiweather["aqi"]>200){echo "<div class=air200><img src='css/aqi/vhair.svg?ver=1.4' width='110px' height='100px' alt='weather34 very unhealthy air quality' title='weather34 very unhealthy air quality'" ; }
else if ($aqiweather["aqi"]>150){echo "<div class=air150><img src='css/aqi/uhair.svg?ver=1.4' width='110px' height='100px' alt='weather34 unhealthy air quality' title='weather34 unhealthy air quality'" ; }
else if ($aqiweather["aqi"]>100){echo "<div class=air100><img src='css/aqi/uhfsair.svg?ver=1.4' width='110px' height='100px'  alt='weather34 unhealthy for some air quality' title='weather34 unhealthy for some air quality'" ; }
else if ($aqiweather["aqi"]>50){echo "<div class=air50><img src='css/aqi/modair.svg?ver=1.4' width='110px' height='100px' alt='weather34 moderate air quality' title='weather34 moderate air quality'" ; }
else if ($aqiweather["aqi"]>=0){echo "<div class=air0><img src='css/aqi/goodair.svg?ver=1.4' width='110px' height='100px' alt='weather34 good air quality' title='weather34 good air quality'" ; }

?>
</div></div></div>
  
<div class="airsvg">
<?php 
if ($aqiweather["aqi"]>300){echo "<div class=dottedcirclered>" ; }
else if ($aqiweather["aqi"]>200){echo "<div class=dottedcirclepurple>" ; }
else if ($aqiweather["aqi"]>150){echo "<div class=dottedcirclered>" ; }
else if ($aqiweather["aqi"]>100){echo "<div class=dottedcircleorange>" ; }
else if ($aqiweather["aqi"]>50){echo "<div class=dottedcircleyellow>" ; }
else if ($aqiweather["aqi"]>=0){echo "<div class=dottedcirclegreen>" ; }
?>
<div class="airvalue">
<?php //WEATHER34 AIR QAULITY VALUE
 if ($aqiweather["aqi"] >300){echo $aqiweather["aqi"] ;echo "" ; } 
 else if ($aqiweather["aqi"] >200){echo $aqiweather["aqi"] ;echo "" ; }
 else if ($aqiweather["aqi"] >150){echo $aqiweather["aqi"] ;echo "" ; }
 else if ($aqiweather["aqi"] >100){echo $aqiweather["aqi"] ;echo "" ; }
 else if ($aqiweather["aqi"] >50){echo $aqiweather["aqi"] ;echo "" ; }
 else if ($aqiweather["aqi"] >=0){echo $aqiweather["aqi"] ;echo "" ; }
 //WEATHER34 air quality description
 if ($aqiweather["aqi"]>300){echo "<br><airdescription><indoorred>&nbsp;".$lang['Hazordous']."</airdescription>";}
 else if ($aqiweather["aqi"]>200){echo "<br><airdescription><indoorpurple>".$lang['VeryUnhealthy']."</airdescription>  ";}
 else if ($aqiweather["aqi"]>150){echo "<br><airdescription><indoorred>&nbsp;".$lang['Unhealthy']."</airdescription>";}
 else if ($aqiweather["aqi"]>100){echo "<br><airdescription><indoororange>".$lang['UnhealthyFS']."</airdescription>";} 
 else if ($aqiweather["aqi"]>50){echo "<br><airdescription><indooryellow>&nbsp;".$lang['Moderate']."</airdescription>";} 
 else if ($aqiweather["aqi"]>=0){echo "<br><airdescription><indoorgreen>&nbsp; &nbsp;".$lang['Good']."</airdescription>";} 
 ?>
</div></div></div>
<div class="airwarning"><?php 
if($aqiweather["aqi"]>300)echo $airalertred ;
else if($aqiweather["aqi"]>200)echo $airalertpurple ;
else if($aqiweather["aqi"]>150)echo $airalertred ;
else if($aqiweather["aqi"]>100)echo $airalertorange ;
else if($aqiweather["aqi"]>50)echo $airokyellow ;
else echo $airok ;?></div>


</body>