<?php  include('shared.php');include('common.php');include('serverdata/archivedata.php');
error_reporting(-1);
$aqiweather["pm_units"] = "μg/㎥";
$json_string             = file_get_contents("jsondata/aq.txt");
$parsed_json             = json_decode($json_string, true);
$aqiweather["pm25"]      = $parsed_json['data']['iaqi']['pm25']['v'];
$aqiweather["pm10"]      = $parsed_json['data']['iaqi']['pm10']['v'];
$aqiweather["time"]      = date($timeFormat,$parsed_json['data']['time']['v']);
$aqiweather["city"]      = $parsed_json['data']['city']['name'];


?>
<div class="topmin">
  
<?php //pm2.5



if ($aqiweather["pm25"] >300){echo "<topdaqi9>",$aqiweather["pm25"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]= "Hazardous"; } 
 else if ($aqiweather["pm25"] >200){echo "<topdaqi10>",$aqiweather["pm25"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]= "V Unhealthy"; }
 else if ($aqiweather["pm25"] >150){echo "<topdaqi8>",$aqiweather["pm25"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]= "Unhealthy"; }
 else if ($aqiweather["pm25"] >100){echo "<topdaqi6>",$aqiweather["pm25"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]= "UnhealthySI"; }
 else if ($aqiweather["pm25"] >50){echo "<topdaqi5>",$aqiweather["pm25"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]= "Moderate"; }
 else if ($aqiweather["pm25"] >=0){echo "<topdaqi2>",$aqiweather["pm25"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]= "Good"; }


  
  ?>
  
</div></smalluvunit>
<!--<a alt="Air Quality Information" title="Air Quality Information" href="aqipopup.php" data-lity > -->
<a alt="DAQI air quality info" title="AQI air quality info" href="pop_aqinfo.php" data-lity>
<div class="yearwordbig"><?php echo "WAQI" ?></div>
<?php //small title PM2.5

 if ($aqiweather["pm25"]>48){echo '<div class="minword">PM<sub>2.5</sub>';}
 else if ($aqiweather["pm25"]>=0){echo '<div class="minwordlow">PM<sub>2.5</sub>';}
  ?>

</div></div>

<div class="mintimedate"><?php echo $aqiweather["band"]?>
</div>  
<div class="topmax">

<?php //PM10
 if ($aqiweather["pm10"] >300){echo "<topdaqi9>",$aqiweather["pm10"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]= "Hazardous"; } 
 else if ($aqiweather["pm10"] >200){echo "<topdaqi10>",$aqiweather["pm10"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]= "V Unhealthy"; }
 else if ($aqiweather["pm10"] >150){echo "<topdaqi8>",$aqiweather["pm10"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]= "Unhealthy"; }
 else if ($aqiweather["pm10"] >100){echo "<topdaqi6>",$aqiweather["pm10"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]= "UnhealthySI"; }
 else if ($aqiweather["pm10"] >50){echo "<topdaqi5>",$aqiweather["pm10"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]= "Moderate"; }
 else if ($aqiweather["pm10"] >=0){echo "<topdaqi2>",$aqiweather["pm10"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]= "Good"; } ?>
</div></smalluvunit>

<?php //small title PM10

 if ($aqiweather["pm10"]>48){echo '<div class="maxword">PM<sub>10</sub>';}
 else if ($aqiweather["pm10"]>=0){echo '<div class="maxwordlow">PM<sub>10</sub>';}
  ?>
</div></div>
<div class="maxtimedate"><?php echo $aqiweather["band"]?></oorange></div> 
