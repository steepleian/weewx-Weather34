<?php include('w34CombinedData.php');header('Content-type: text/html; charset=utf-8');date_default_timezone_set($TZ);?>
<div class="topmin">
<?php //temperture min year
 if ($weather["temp_units"]=='C' && $weather["tempymin"]>30){echo "<topred1>",$weather["tempymin"]  ;echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 else if ($weather["temp_units"]=='C' && $weather["tempymin"]>=24){echo "<toporange1>",$weather["tempymin"]  ;echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 else if ($weather["temp_units"]=='C' && $weather["tempymin"]>18){echo "<topyellow1>",$weather["tempymin"]  ;echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 else if ($weather["temp_units"]=='C' && $weather["tempymin"]>12){echo "<topyellow2>",$weather["tempymin"]  ;echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 else if ($weather["temp_units"]=='C' && $weather["tempymin"]>=10){ echo "<topgreen1>", $weather["tempymin"]  ;echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 else if ($weather["temp_units"]=='C' && $weather["tempymin"]>-50){ echo "<topblue1>", $weather["tempymin"]  ;echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 //non metric
 if ($weather["temp_units"]=='F' && $weather["tempymin"]>86){echo "<topred1>",$weather["tempymin"];echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 else if ($weather["temp_units"]=='F' && $weather["tempymin"]>=75){echo "<toporange1>",$weather["tempymin"];echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 else if ($weather["temp_units"]=='F' && $weather["tempymin"]>=64){echo "<topyellow1>",$weather["tempymin"];echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 else if ($weather["temp_units"]=='F' && $weather["tempymin"]>53.6){echo "<topyellow2>",$weather["tempymin"];echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 else if ($weather["temp_units"]=='F' && $weather["tempymin"]>=42.8){ echo "<topgreen1>", $weather["tempymin"];echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 else if ($weather["temp_units"]=='F' && $weather["tempymin"]>-50){ echo "<topblue1>", $weather["tempymin"];echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 ?>
</div></smalluvunit>

<div class="yearwordbig"><?php echo date('Y')?></div>


<div class="minword">Min</div></div>
<div class="mintimedate"><?php echo $weather["tempymintime2"]?>
</div>  
<div class="topmax">
<?php //temperture max year celsius
 if ($weather["temp_units"]=='C' && $weather["tempymax"]>30){echo "<topred1>",$weather["tempymax"]  ;echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 else if ($weather["temp_units"]=='C' && $weather["tempymax"]>=24){echo "<toporange1>",$weather["tempymax"]  ;echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 else if ($weather["temp_units"]=='C' && $weather["tempymax"]>18){echo "<topyellow1>",$weather["tempymax"]  ;echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 else if ($weather["temp_units"]=='C' && $weather["tempymax"]>12){echo "<topyellow2>",$weather["tempymax"]  ;echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 else if ($weather["temp_units"]=='C' && $weather["tempymax"]>=10){ echo "<topgreen1>", $weather["tempymax"]  ;echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 else if ($weather["temp_units"]=='C' && $weather["tempymax"]>-50){ echo "<topblue1>", $weather["tempymax"]  ;echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
  //non metric
 if ($weather["temp_units"]=='F' && $weather["tempymax"]>86){echo "<topred1>",$weather["tempymax"]  ;echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 else if ($weather["temp_units"]=='F' && $weather["tempymax"]>=75){echo "<toporange1>",$weather["tempymax"]  ;echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 else if ($weather["temp_units"]=='F' && $weather["tempymax"]>=64){echo "<topyellow1>",$weather["tempymax"]  ;echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 else if ($weather["temp_units"]=='F' && $weather["tempymax"]>53.6){echo "<topyellow2>",$weather["tempymax"]  ;echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 else if ($weather["temp_units"]=='F' && $weather["tempymax"]>=42.8){ echo "<topgreen1>", $weather["tempymax"]  ;echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 else if ($weather["temp_units"]=='F' && $weather["tempymax"]>-50){ echo "<topblue1>", $weather["tempymax"]  ;echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 ?>
</div></smalluvunit>
<div class="maxword">Max</div></div>
<div class="maxtimedate"><?php echo $weather["tempymaxtime2"]?></oorange></div> 
