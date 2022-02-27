<?php include('w34CombinedData.php');header('Content-type: text/html; charset=utf-8');date_default_timezone_set($TZ);?>
<body>
<div class="yesterdaymax">
<?php 
 //weather34 temperture indoor celsius
 
 if ($weather["temp_units"]=='C' && $weather["tempdmax"]>27){echo "<div class=\"circleyestemperature\"><div class='maxyesterday'>Max</div><red>", $weather["tempdmax"] ;
 echo "&deg;  <spaneindoortemp> ".$weatherunitc."<yesterdaytimemax> ".$weather["tempdmaxtime"]."</yesterdaytimemax></spaneindoortemp> </div><div class='yesterdaytempword'> Temp</div>" ;}

 else if ($weather["temp_units"]=='C' && $weather["tempdmax"]>18){echo "<div class=\"circleyestemperature\"><div class='maxyesterday'>Max</div><orange>", $weather["tempdmax"] ;
 echo "&deg;  <spaneindoortemp> ".$weatherunitc."<yesterdaytimemax> ".$weather["tempdmaxtime"]."</yesterdaytimemax></spaneindoortemp> </div><div class='yesterdaytempword'> Temp</div>" ;}
 
 else if ($weather["temp_units"]=='C' && $weather["tempdmax"]>10){echo "<div class=\"circleyestemperature\"><div class='maxyesterday'>Max</div><green>", $weather["tempdmax"] ;
 echo "&deg;  <spaneindoortemp> ".$weatherunitc."<yesterdaytimemax> ".$weather["tempdmaxtime"]."</yesterdaytimemax></spaneindoortemp> </div><div class='yesterdaytempword'> Temp</div>" ;}
 
 else if ($weather["temp_units"]=='C' && $weather["tempdmax"]>-50){echo "<div class=\"circleyestemperature\"><div class='maxyesterday'>Max</div><blue>", $weather["tempdmax"] ;
 echo "&deg;  <spaneindoortemp> ".$weatherunitc."<yesterdaytimemax> ".$weather["tempdmaxtime"]."</yesterdaytimemax></spaneindoortemp> </div><div class='yesterdaytempword'> Temp</div>" ;}
 
 //weather34 fahrenheit
if ($weather["temp_units"]=='F' && $weather["tempdmax"]>90){echo "<div class=\"circleyestemperature\"><div class='maxyesterday'>Max</div><red>", $weather["tempdmax"] ;
 echo "&deg;  <spaneindoortemp> ".$weatherunitf."<yesterdaytimemax> ".$weather["tempdmaxtime"]."</yesterdaytimemax></spaneindoortemp> </div><div class='yesterdaytempword'> Temp</div>" ;}

 else if ($weather["temp_units"]=='F' && $weather["tempdmax"]>80){echo "<div class=\"circleyestemperature\"><div class='maxyesterday'>Max</div><orange>", $weather["tempdmax"] ;
 echo "&deg;  <spaneindoortemp> ".$weatherunitf."<yesterdaytimemax> ".$weather["tempdmaxtime"]."</yesterdaytimemax></spaneindoortemp> </div><div class='yesterdaytempword'> Temp</div>" ;}
 
 else if ($weather["temp_units"]=='F' && $weather["tempdmax"]>47){echo "<div class=\"circleyestemperature\"><div class='maxyesterday'>Max</div><green>", $weather["tempdmax"] ;
 echo "&deg;  <spaneindoortemp> ".$weatherunitf."<yesterdaytimemax> ".$weather["tempdmaxtime"]."</yesterdaytimemax></spaneindoortemp> </div><div class='yesterdaytempword'> Temp</div>" ;}
 
 else if ($weather["temp_units"]=='F' && $weather["tempdmax"]>-50){echo "<div class=\"circleyestemperature\"><div class='maxyesterday'>Max</div><blue>", $weather["tempdmax"] ;
 echo "&deg;  <spaneindoortemp> ".$weatherunitf."<yesterdaytimemax> ".$weather["tempdmaxtime"]."</yesterdaytimemax></spaneindoortemp> </div><div class='yesterdaytempword'> Temp</div>" ;}
?>


</div></div>



<div class="yesterdaymin">
<?php 
 //weather34 temperture indoor celsius
 if ($weather["temp_units"]=='C' && $weather["tempdmin"]>27){echo "<div class=\"circleyestemperature\"><div class='maxyesterday'>Min</div><red>", $weather["tempdmin"] ;
 echo "&deg;  <spaneindoortemp> ".$weatherunitc."<yesterdaytimemax> ".$weather["tempdmintime"]."</yesterdaytimemax></spaneindoortemp> </div><div class='yesterdaytempword'> Temp</div>" ;}

 else if ($weather["temp_units"]=='C' && $weather["tempdmin"]>18){echo "<div class=\"circleyestemperature\"><div class='maxyesterday'>Min</div><orange>", $weather["tempdmin"] ;
 echo "&deg;  <spaneindoortemp> ".$weatherunitc."<yesterdaytimemax> ".$weather["tempdmintime"]."</yesterdaytimemax></spaneindoortemp> </div><div class='yesterdaytempword'> Temp</div>" ;}
 
 else if ($weather["temp_units"]=='C' && $weather["tempdmin"]>10){echo "<div class=\"circleyestemperature\"><div class='maxyesterday'>Min</div><green>", $weather["tempdmin"] ;
 echo "&deg;  <spaneindoortemp> ".$weatherunitc."<yesterdaytimemax> ".$weather["tempdmintime"]."</yesterdaytimemax></spaneindoortemp> </div><div class='yesterdaytempword'> Temp</div>" ;}
 
 else if ($weather["temp_units"]=='C' && $weather["tempdmin"]>-50){echo "<div class=\"circleyestemperature\"><div class='maxyesterday'>Min</div><blue>", $weather["tempdmin"] ;
 echo "&deg;  <spaneindoortemp> ".$weatherunitc."<yesterdaytimemax> ".$weather["tempdmintime"]."</yesterdaytimemax></spaneindoortemp> </div><div class='yesterdaytempword'> Temp</div>" ;}
 
 //weather34 fahrenheit
 if ($weather["temp_units"]=='F' && $weather["tempdmin"]>90){echo "<div class=\"circleyestemperature\"><div class='maxyesterday'>Min</div><red>", $weather["tempdmin"] ;
 echo "&deg;  <spaneindoortemp> ".$weatherunitf."<yesterdaytimemax> ".$weather["tempdmintime"]."</yesterdaytimemax></spaneindoortemp> </div><div class='yesterdaytempword'> Temp</div>" ;}

 else if ($weather["temp_units"]=='F' && $weather["tempdmin"]>80){echo "<div class=\"circleyestemperature\"><div class='maxyesterday'>Min</div><orange>", $weather["tempdmin"] ;
 echo "&deg;  <spaneindoortemp> ".$weatherunitf."<yesterdaytimemax> ".$weather["tempdmintime"]."</yesterdaytimemax></spaneindoortemp> </div><div class='yesterdaytempword'> Temp</div>" ;}
 
 else if ($weather["temp_units"]=='F' && $weather["tempdmin"]>47){echo "<div class=\"circleyestemperature\"><div class='maxyesterday'>Min</div><green>", $weather["tempdmin"] ;
 echo "&deg;  <spaneindoortemp> ".$weatherunitf."<yesterdaytimemax> ".$weather["tempdmintime"]."</yesterdaytimemax></spaneindoortemp> </div><div class='yesterdaytempword'> Temp</div>" ;}
 
 else if ($weather["temp_units"]=='F' && $weather["tempdmin"]>-50){echo "<div class=\"circleyestemperature\"><div class='maxyesterday'>Min</div><blue>", $weather["tempdmin"] ;
 echo "&deg;  <spaneindoortemp> ".$weatherunitf."<yesterdaytimemax> ".$weather["tempdmintime"]."</yesterdaytimemax></spaneindoortemp> </div><div class='yesterdaytempword'> Temp</div>" ;}
?>
</div>
