<?php  include('shared.php');include('common.php');
$json_string             = file_get_contents("jsondata/aq.txt");
$parsed_json             = json_decode($json_string, true);
$aqiweather["aqi"]       = $parsed_json['data']['aqi'];
$aqiweather["aqiozone"]  = 'N/A';
$aqiweather["time"]     = date($timeFormat,$parsed_json['data']['time']['v']);
$aqiweather["city"]      = $parsed_json['data']['city']['name'];

?>
<div class="updatedtime"><span><?php if(file_exists('jsondata/aq.txt') && time() - filemtime('jsondata/aq.txt')<1800) {
  echo $online." ".date($timeFormat, filemtime('jsondata/aq.txt'));
  } else {
  echo $offline. '<offline> Offline </offline>';
  }?></div> 
<div class="airqualitywordbig">Air Quality</div>
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
