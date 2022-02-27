<?php include('w34CombinedData.php');header('Content-type: text/html; charset=utf-8');

//current eq
date_default_timezone_set($TZ);
$json_string=file_get_contents('jsondata/eq.txt');
$parsed_json=json_decode($json_string,true);

$eqtitle = $parsed_json['features'][0]['properties']['flynn_region'];
$magnitude = $parsed_json['features'][0]['properties']['mag'];
$depth = $parsed_json['features'][0]['properties']['depth'];
$time       = $parsed_json['features'][0]['properties']['time'];
$lati=$parsed_json['features'][0]['properties']['lat'];
$longi=$parsed_json['features'][0]['properties']['lon'];
$eventime=date("H:i:s j M y", strtotime($time) );
$eqdist = round(distance($lat, $lon, $lati, $longi)) ;
?>
<?php
// CALCULATE THE DISTANCE OF LATEST EARTHQUAKE //
// de LOCATION OF HOMEWEATHER STATION //
// Brian Underdown July 28th 2016 //
$eqdist;if ($weather["wind_units"] == 'mph') {$eqdist = round(distance($lat, $lon, $lati, $longi) * 0.621371) ."mi";} else {$eqdist = round(distance($lat, $lon, $lati, $longi)) ."km";}
$eqdista;if ($weather["wind_units"] == 'mph') {$eqdista = round(distance($lat, $lon, $lati, $longi)) ."<smallrainunit>km";} else {$eqdista = round(distance($lat, $lon, $lati, $longi) * 0.621371) ."<smallrainunit>mi";} ?>  
<div class="updatedtime">
<span><?php 
$updated=filemtime('jsondata/eq.txt');
echo  $online, " ",date($timeFormat, $updated);?></span>
</div>
<div class="rainconverter">
<?php //chuck
if($eqdista <= 200){echo "<div class=tempconvertercirclered>".$eqdista ;}
else if($eqdista <= 500){echo "<div class=tempconvertercircleorange>".$eqdista ;}
else if($magnitude <=1000){echo "<div class=tempconvertercircleyellow>".$eqdista;}
else if($magnitude >= 1000){echo "<div class=tempconvertercirclegreen>".$eqdista ;}
?></smalltempunit2></div></div><br>
<div class='eqcontainer1'>
<!-- EQ homeweather station earthquakes now with value values 27th July 2016--> 
<?php
// EQ Latest earthquake 
if ($magnitude < 4.0) {
    echo "<div class='eqcaution'>Magnitude</div><div class=eqtoday1-3>${magnitude}</div>	
        <div class='eqt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Minor</div></div><div class=\"eqtext\"><value> $eqtitle <br><value>$eventime<br><depth>Depth:";
        if ($weather["wind_units"] == 'mph') echo round($depth * 0.621371)."mi"; else echo "$depth km"; echo "</depth><br>
        Epicenter: <value><maxred>$eqdist</maxred>  <valueearthquake>From: $stationlocation</valueearthquake></value></div>";
} else if ($magnitude < 5.0) {
    echo "<div class='eqcaution'>Magnitude</div><div class=eqtoday4-5>${magnitude}</div>	
	<div class='eqt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Light</div></div><div class=\"eqtext\"><value> $eqtitle <br><value>$eventime<br><depth>Depth:";
        if ($weather["wind_units"] == 'mph') echo round($depth * 0.621371)."mi"; else echo "$depth km"; echo "</depth><br>
	Epicenter: <value><maxred>$eqdist</maxred>  <valueearthquake>From: $stationlocation</valueearthquake></value></div>";
} else if ($magnitude < 6.0) {
    echo "<div class='eqcaution'>Magnitude</div><div class=eqtoday6-8>${magnitude}</div>	
	<div class='eqt'>&nbsp;&nbsp;Moderate</div></div><div class=\"eqtext\"><value> $eqtitle <br><value>$eventime<br><depth>Depth:";
        if ($weather["wind_units"] == 'mph') echo round($depth * 0.621371)."mi"; else echo "$depth km"; echo "</depth><br>
	Epicenter: <value><maxred>$eqdist</maxred>  <valueearthquake>From: $stationlocation</valueearthquake></value></div>";
} else if ($magnitude < 7.0) {
    echo "<div class='eqcaution'>Magnitude</div><div class=eqtoday6-8>${magnitude}</div>	
	<div class='eqt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Strong</div></div><div class=\"eqtext\"><value> $eqtitle <br><value>$eventime<br><depth>Depth:";
        if ($weather["wind_units"] == 'mph') echo round($depth * 0.621371)."mi"; else echo "$depth km"; echo "</depth><br>
	Epicenter: <value><maxred>$eqdist</maxred> <valueearthquake>From: $stationlocation</valueearthquake></value></div>";
} else if ($magnitude < 8.0) {
    echo "<div class='eqcaution'>Magnitude</div><div class=eqtoday9-10>${magnitude}</div>	
	<div class='eqt'>&nbsp;&nbsp;Great</div></div><div class=\"eqtext\"><value> $eqtitle <br><value>$eventime<br><depth>Depth:";
        if ($weather["wind_units"] == 'mph') echo round($depth * 0.621371)."mi"; else echo "$depth km"; echo "</depth><br>
	Epicenter: <value><maxred>$eqdist</maxred></maxred> <valueearthquake>From: $stationlocation</valueearthquake></value></div>";
} else if ($magnitude > 8.0) {
    echo "<div class='eqcaution'>Magnitude</div><div class=eqtoday9-10>${magnitude}</div>	
	<div class='eqt'>&nbsp;&nbsp;Major</div></div><div class=\"eqtext\"><value> $eqtitle <br><value>$eventime<br><depth>Depth:";
        if ($weather["wind_units"] == 'mph') echo round($depth * 0.621371)."mi"; else echo "$depth km"; echo "</depth><br>
	Epicenter: <value><maxred>$eqdist</maxred></maxred> <valueearthquake>From: $stationlocation</valueearthquake></value></div>";
}

?></div>
