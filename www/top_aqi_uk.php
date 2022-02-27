<?php  include('shared.php');include('common.php');include('serverdata/archivedata.php');
error_reporting(-1);
$aqiweather["pm_units"] = "μg/㎥";
$aqiweather["pm10"]       =   round($pm10now,0);
$aqiweather["pm25"]       =   round($pm25now,0);

//$aqiweather["pm25"]       =   "45";
//$aqiweather["pm10"]       =   "35";


?>
<div class="topmin">
  
<?php //rolling 24hr pm2.5

 if ($aqiweather["pm25"]>70){echo "<topdaqi10>",$aqiweather["pm25"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]="Very Hi 10";}
 else if ($aqiweather["pm25"]>64){echo "<topdaqi9>",$aqiweather["pm25"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]="High 9";}
 else if ($aqiweather["pm25"]>58){echo "<topdaqi8>",$aqiweather["pm25"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]="High 8";}
 else if ($aqiweather["pm25"]>53){echo "<topdaqi7>",$aqiweather["pm25"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]="High 7";}
 else if ($aqiweather["pm25"]>48){echo "<topdaqi6>",$aqiweather["pm25"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]="Mod 6";}
 else if ($aqiweather["pm25"]>42){echo "<topdaqi5>",$aqiweather["pm25"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]="Mod 5";}
 else if ($aqiweather["pm25"]>36){echo "<topdaqi4>",$aqiweather["pm25"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]="Mod 4";}
 else if ($aqiweather["pm25"]>=24){echo "<topdaqi3>",$aqiweather["pm25"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]="Low 3";}
 else if ($aqiweather["pm25"]>=12){echo "<topdaqi2>",$aqiweather["pm25"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]="Low 2";}
 else if ($aqiweather["pm25"]>=0){echo "<topdaqi1>",$aqiweather["pm25"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]="Low 1";}
  
  ?>
  
</div></smalluvunit>
<!--<a alt="Air Quality Information" title="Air Quality Information" href="aqipopup.php" data-lity > -->
<a alt="DAQI air quality info" title="DAQI air quality info" href="pop_aqinfo.php" data-lity>
<div class="yearwordbig"><?php echo "DAQI" ?></div>
<?php //small title PM2.5

 if ($aqiweather["pm25"]>48){echo '<div class="minword">PM<sub>2.5</sub>';}
 else if ($aqiweather["pm25"]>=0){echo '<div class="minwordlow">PM<sub>2.5</sub>';}
  ?>

</div></div>

<div class="mintimedate"><?php echo $aqiweather["band"]?>
</div>  
<div class="topmax">
<!--<a alt="DAQI air quality info" title="DAQI air quality info" href="daqi.php" data-lity>-->
<?php //rolling 24hr PM10
 if ($aqiweather["pm10"]>70){echo "<topdaqi10>",$aqiweather["pm10"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]="Very Hi 10";}
 else if ($aqiweather["pm10"]>64){echo "<topdaqi9>",$aqiweather["pm10"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]="High 9";}
 else if ($aqiweather["pm10"]>58){echo "<topdaqi8>",$aqiweather["pm10"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]="High 8";}
 else if ($aqiweather["pm10"]>53){echo "<topdaqi7>",$aqiweather["pm10"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]="High 7";}
 else if ($aqiweather["pm10"]>48){echo "<topdaqi6>",$aqiweather["pm10"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]="Mod 6";}
 else if ($aqiweather["pm10"]>42){echo "<topdaqi5>",$aqiweather["pm10"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]="Mod 5";}
 else if ($aqiweather["pm10"]>36){echo "<topdaqi4>",$aqiweather["pm10"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]="Mod 4";}
 else if ($aqiweather["pm10"]>=24){echo "<topdaqi3>",$aqiweather["pm10"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]="Low 3";}
 else if ($aqiweather["pm10"]>=12){echo "<topdaqi2>",$aqiweather["pm10"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]="Low 2";}
 else if ($aqiweather["pm10"]>=0){echo "<topdaqi1>",$aqiweather["pm10"]."<smallwindunit>".$aqiweather["pm_units"] ; $aqiweather["band"]="Low 1";} ?>
</div></smalluvunit>

<?php //small title PM10

 if ($aqiweather["pm10"]>48){echo '<div class="maxword">PM<sub>10</sub>';}
 else if ($aqiweather["pm10"]>=0){echo '<div class="maxwordlow">PM<sub>10</sub>';}
  ?>
</div></div>
<div class="maxtimedate"><?php echo $aqiweather["band"]?></oorange></div> 
