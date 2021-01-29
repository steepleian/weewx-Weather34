<?php include('w34CombinedData.php');header('Content-type: text/html; charset=utf-8');

//current eq
date_default_timezone_set($TZ);
$json_string=file_get_contents('jsondata/eq.txt');
$parsed_json=json_decode($json_string,true);
$eqtitle=explode(" ", $parsed_json['rss']['channel']['item'][0]['title'],3)[2];
$magnitude1=explode(" ", $parsed_json['rss']['channel']['item'][0]['emsc:magnitude'])[1];
$magnitude=number_format($magnitude1,1);
$depth=$parsed_json['rss']['channel']['item'][0]['depth'];
$time1=$parsed_json['rss']['channel']['item'][0]['emsc:time'];
$lati=$parsed_json['rss']['channel']['item'][0]['geo:lat'];
$longi=$parsed_json['rss']['channel']['item'][0]['geo:long'];
$eventime=date( $dateFormat . " " . $timeFormatShort, strtotime("$time1") );
$shorttime=date( $timeFormatShort, strtotime("$time1") );
?>
<?php
// CALCULATE THE DISTANCE OF LATEST EARTHQUAKE //
// de LOCATION OF HOMEWEATHER STATION //
// Brian Underdown July 28th 2016 //
$eqdist;if ($weather["wind_units"] == 'mph') {$eqdist = round(distance($lat, $lon, $lati, $longi) * 0.621371) ."mi";} else {$eqdist = round(distance($lat, $lon, $lati, $longi)) ."km";}
$eqdista;if ($weather["wind_units"] == 'mph') {$eqdista = round(distance($lat, $lon, $lati, $longi) * 0.621371) ."<smallrainunit>mi";} else {$eqdista = round(distance($lat, $lon, $lati, $longi)) ."<smallrainunit>km";} ?>  
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
if ($magnitude <= 0) {
    echo "<div class='eqcaution'>Magnitude</div><div class=eqtoday1-3>${magnitude}</div>	
	<div class=\"eqtext\"><value>  $eqtitle <br><value>$eventime</value><br>	Epicenter: <value><grey>$eqdist <valueearthquake>from<br> $stationlocation</valueearthquake></value></div>";
	
} else if ($magnitude <= 4.2) {
    echo "<div class='eqcaution'>Magnitude</div><div class=eqtoday4-5>${magnitude}</div>	
	<div class='eqt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Minor</div></div><div class=\"eqtext\"><value> $eqtitle <br><value>$eventime<br>
	Epicenter: <value><maxred>$eqdist</maxred>  <valueearthquake>from<br> $stationlocation</valueearthquake></value></div>";
} else if ($magnitude <= 5) {
    echo "<div class='eqcaution'>Magnitude</div><div class=eqtoday4-5>${magnitude}</div>	
	
	<div class='eqt'>&nbsp;&nbsp;Moderate</div></div><div class=\"eqtext\"><value> $eqtitle <br><value>$eventime<br>
	Epicenter: <value><maxred>$eqdist</maxred>  <valueearthquake>from<br> $stationlocation</valueearthquake></value></div>";
} else if ($magnitude<= 6) {
    echo "<div class='eqcaution'>Magnitude</div><div class=eqtoday6-8>${magnitude}</div>	
	
	<div class='eqt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Strong</div></div><div class=\"eqtext\"><value> $eqtitle <br><value>$eventime<br>
	<value><maxred>$eqdist</maxred> <valueearthquake>from<br> $stationlocation</valueearthquake></value></div>";
} else if ($magnitude <= 10) {
    echo "<div class='eqcaution'>Magnitude</div><div class=eqtoday9-10>${magnitude}</div>	
	
	<div class='eqt'>&nbsp;&nbsp;Very Strong</div></div><div class=\"eqtext\"><value> $eqtitle <br><value>$eventime<br><depth>depth:$depth km</depth><br>
	Epicenter: <value><maxred>$eqdist</maxred></maxred> <valueearthquake>from<br> $stationlocation</valueearthquake></value></div>";
}

?></div>
