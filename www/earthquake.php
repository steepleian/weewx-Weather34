<?php include('w34CombinedData.php');include('common.php');date_default_timezone_set($TZ);$json_string=file_get_contents('jsondata/eq.txt');$parsed_json=json_decode($json_string,true);
$software    = 'Cumulus <span>Software</span>';
$designedfor    = '<br>For Cumulus';

$magnitude=number_format(explode(" ", str_replace("  ", "", $parsed_json['rss']['channel']['item'][0]['emsc:magnitude']))[1],1);
$eqtitle=explode(" ", str_replace("  ", "", $parsed_json['rss']['channel']['item'][0]['title']),3)[2];
$time=$parsed_json['rss']['channel']['item'][0]['emsc:time'];
$lati=$parsed_json['rss']['channel']['item'][0]['geo:lat'];
$longi=$parsed_json['rss']['channel']['item'][0]['geo:long'];
$eventime=date($timeFormatShort,strtotime("$time"));

$magnitude1=number_format(explode(" ", str_replace("  ", "", $parsed_json['rss']['channel']['item'][1]['emsc:magnitude']))[1],1);
$eqtitle1=explode(" ", str_replace("  ", "", $parsed_json['rss']['channel']['item'][1]['title']),3)[2];
$time1=$parsed_json['rss']['channel']['item'][1]['emsc:time'];
$lati1=$parsed_json['rss']['channel']['item'][1]['geo:lat'];
$longi1=$parsed_json['rss']['channel']['item'][1]['geo:long'];
$eventime1=date($timeFormatShort,strtotime("$time1"));

$magnitude2=number_format(explode(" ", str_replace("  ", "", $parsed_json['rss']['channel']['item'][2]['emsc:magnitude']))[1],1);
$eqtitle2=explode(" ", str_replace("  ", "", $parsed_json['rss']['channel']['item'][2]['title']),3)[2];
$time2=$parsed_json['rss']['channel']['item'][2]['emsc:time'];
$lati2=$parsed_json['rss']['channel']['item'][2]['geo:lat'];
$long21=$parsed_json['rss']['channel']['item'][2]['geo:long'];
$eventime2=date($timeFormatShort,strtotime("$time2"));

$magnitude3=number_format(explode(" ", str_replace("  ", "", $parsed_json['rss']['channel']['item'][3]['emsc:magnitude']))[1],1);
$eqtitle3=explode(" ", str_replace("  ", "", $parsed_json['rss']['channel']['item'][3]['title']),3)[2];
$time3=$parsed_json['rss']['channel']['item'][3]['emsc:time'];
$lati3=$parsed_json['rss']['channel']['item'][3]['geo:lat'];
$longi3=$parsed_json['rss']['channel']['item'][3]['geo:long'];
$eventime3=date($timeFormatShort,strtotime("$time3"));?>


 <?php
// CALCULATE THE DISTANCE OF LATEST EARTHQUAKE //
// FROM LOCATION OF HOMEWEATHER STATION //
// Brian Underdown July 28th 2016 updated May 25th 2017//
$eqdist;
if ($weather["wind_units"] == 'mph') {
	$eqdist = round(distance($lat, $lon, $lati, $longi) * 0.621371) . " mi";} else {$eqdist = round(distance($lat, $lon, $lati, $longi)) . " km";}
	
$eqdist1;
if ($weather["wind_units"] == 'mph') {
	$eqdist1 = round(distance($lat, $lon, $lati1, $longi1) * 0.621371) . " mi";} else {$eqdist1 = round(distance($lat, $lon, $lati1, $longi1)) . " km";}	
	
$eqdist2;
if ($weather["wind_units"] == 'mph') {
	$eqdist2 = round(distance($lat, $lon, $lati2, $longi2) * 0.621371) . " mi";} else {$eqdist2 = round(distance($lat, $lon, $lati2, $longi2)) . " km";}
	
$eqdist3;
if ($weather["wind_units"] == 'mph') {
	$eqdist3 = round(distance($lat, $lon, $lati3, $longi3) * 0.621371) . " mi";} else {$eqdist3 = round(distance($lat, $lon, $lati3, $longi3)) . " km";}		
				
	
  ?>
<div class="eqcirclehomeregional">
<div class="eqtexthomeregional">
<?php ;
//compiled on May 25th 2017 weather earthquake the last 4 regional earthquakes will take priority //


//regional >
//+5.5
 if ($eqdist<$notifyDistEQ && $magnitude>5){echo "<div class=\"eqcircle1home\"><spanredmag>${magnitude}
 <svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>
 
 
 </spanredmag></eqcircle1home></div>
 <div class =\"spane\"> ".$lang['RegionalE']."  <regionalstrong>".$lang['StrongE']."</regionalstrong></div>
<div class=\"eqtexthome\"> $eqtitle <br> Time: $eventime <br> Distance<colordist>".$eqdist."</colordist> </div>";}

else if ($eqdist1<$notifyDistEQ && $magnitude1>5){echo "<div class=\"eqcircle1home\"><spanredmag>${magnitude1}
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>


</spanredmag></eqcircle1home></div>
 <div class =\"spane\"> ".$lang['Regional']."  <regionalstrong>".$lang['Strong']."</regionalstrong></div>
<div class=\"eqtexthome\"> $eqtitle1 <br> Time: $eventime1 <br> Distance<colordist>".$eqdist1."</colordist> </div>";}


else if($eqdist2<$notifyDistEQ && $magnitude2>5){echo "<div class=\"eqcircle1home\"><spanredmag>${magnitude2}
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spanredmag></eqcircle1home></div>
 <div class =\"spane\"> ".$lang['RegionalE']."  <regionalstrong>".$lang['StrongE']."</regionalstrong></div>
<div class=\"eqtexthome\"> $eqtitle2 <br> Time: $eventime2 <br> Distance<colordist>".$eqdist2."</colordist> </div>";}


else if ($eqdist3<$notifyDistEQ && $magnitude3>5){echo "<div class=\"eqcircle1home\"><spanredmag>${magnitude3}
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spanredmag></eqcircle1home></div>
 <div class =\"spane\"> ".$lang['RegionaEl']." <regionalstrong>".$lang['StrongE']."</regionalstrong></div>
<div class=\"eqtexthome\"> $eqtitle3 <br> Time: $eventime3 <br> Distance<colordist>".$eqdist3."</colordist> </div>";}


// regional +4
 else if ($eqdist<$notifyDistEQ && $magnitude4>4){echo "<div class=\"eqcircle1home\"><spanyellowmag>${magnitude}
 <svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>
 
 
 </spanyellowmag></eqcircle1home></div>
 <div class =\"spane\">".$lang['RegionalE']." <regionalmoderate>".$lang['ModerateE']."</regionalmoderate></div>
<div class=\"eqtexthome\"> $eqtitle <br> Time: $eventime <br> Distance<colordist>".$eqdist."</colordist> </div>";}

else if ($eqdist1<$notifyDistEQ && $magnitude1>4){echo "<div class=\"eqcircle1home\"><spanyellowmag>${magnitude1}

<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spanyellowmag></eqcircle1home></div>
 <div class =\"spane\">".$lang['RegionalE']." <regionalmoderate>".$lang['ModerateE']."</regionalmoderate></div>
<div class=\"eqtexthome\"> $eqtitle1 <br> Time: $eventime1 <br> Distance<colordist>".$eqdist1."</colordist> </div>";}


else if($eqdist2<$notifyDistEQ && $magnitude2>4){echo "<div class=\"eqcircle1home\"><spanyellowmag>${magnitude2}
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spanyellowmag></eqcircle1home></div>
 <div class =\"spane\">".$lang['RegionalE']." <regionalmoderate>".$lang['ModerateE']."</regionalmoderate></div>
<div class=\"eqtexthome\"> $eqtitle2 <br> Time: $eventime2 <br> Distance<colordist>".$eqdist2."</colordist> </div>";}


else if ($eqdist3<$notifyDistEQ && $magnitude3>4){echo "<div class=\"eqcircle1home\"><spanyellowmag>${magnitude3}
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>


</spanyellowmag></eqcircle1home></div>
 <div class =\"spane\">".$lang['RegionalE']." <regionalmoderate>".$lang['ModerateE']."</regionalmoderate></div>
<div class=\"eqtexthome\"> $eqtitle3 <br> Time: $eventime3 <br> Distance<colordist>".$eqdist3."</colordist> </div>";}


//regional <4
else if ($eqdist<$notifyDistEQ && $magnitude<4){echo "<div class=\"eqcircle1home\"><spangreenmag>${magnitude} 
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spangreenmag></eqcircle1home></div>
 <div class =\"spane\"> ".$lang['RegionalE']."  <regionalminor>".$lang['MinorE']."</regionalminor></div>
<div class=\"eqtexthome\"> $eqtitle <br> Time: $eventime <br> Distance<colordist>".$eqdist."</colordist> </div>";}

else if ($eqdist1<$notifyDistEQ && $magnitude1<4){echo "<div class=\"eqcircle1home\"><spangreenmag>${magnitude1}
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spangreenmag></eqcircle1home></div>
 <div class =\"spane\"> ".$lang['RegionalE']."  <regionalminor>".$lang['MinorE']."</regionalminor></div>
<div class=\"eqtexthome\"> $eqtitle1 <br> Time: $eventime1 <br> Distance<colordist>".$eqdist1."</colordist> </div>";}

else if($eqdist2<$notifyDistEQ && $magnitude2<4){echo "<div class=\"eqcircle1home\"><spangreenmag>${magnitude2}
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spangreenmag></eqcircle1home></div>
 <div class =\"spane\"> ".$lang['RegionalE']."  <regionalminor>".$lang['MinorE']."</regionalminor></div>
<div class=\"eqtexthome\"> $eqtitle2 <br> Time: $eventime2 <br> Distance<colordist>".$eqdist2."</colordist> </div>";}

else if ($eqdist3<$notifyDistEQ && $magnitude3<4){echo "<div class=\"eqcircle1home\"><spangreenmag>${magnitude3}
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spangreenmag></eqcircle1home></div>
 <div class =\"spane\"> ".$lang['RegionalE']."  <regionalminor>".$lang['MinorE']."</minorregional></div>
<div class=\"eqtexthome\"> $eqtitle3 <br> Time: $eventime3 <br> Distance<colordist>".$eqdist3."</colordist> </div>";}




//worldwide will appear if no regional earthquakes are listed or detected 
//minor
else if ($magnitude<4){echo "<div class=\"eqcircle1home\"><spangreenmag>${magnitude} 
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spangreenmag></eqcircle1home></div>
 <div class =\"spane\"> <regionalminor>".$lang['MinorE']."</regionalminor> </div>
<div class=\"eqtexthome\"> $eqtitle <br> Time: $eventime <br> Distance<colordist>".$eqdist."</colordist> </div>";}
//moderate
else if ($magnitude<5){echo "<div class=\"eqcircle1home\"><spanyellowmag>${magnitude}
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spanyellowmag></eqcircle1home></div>
<div class =\"spane\"> <regionalmoderate>".$lang['ModerateE']."</regionalmoderate> </div>
<div class=\"eqtexthome\"> $eqtitle <br> Time: $eventime <br> Distance<colordist>".$eqdist."</colordist> </div>";}
//strong
else if ($magnitude<7){echo "<div class=\"eqcircle1home\"><spanredmag>${magnitude}
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spanredmag> </eqcircle1home></div>
<div class =\"spane\"> <regionalstrong>".$lang['StrongE']."</regionalstrong> </div>
<div class=\"eqtexthome\"> $eqtitle <br> Time: $eventime <br> Distance<colordist>".$eqdist."</colordist> </div>";}
//very strong
else if ($magnitude<10){echo "<div class=\"eqcircle1home\"><spanredmag>${magnitude}
<svgearthquake>
<svg id='i-activity' viewBox='0 0 32 32' width='10' height='10' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
    <path d='M4 16 L11 16 14 29 18 3 21 16 28 16' />
</svg><svgearthquake>

</spanredmag> </eqcircle1home></div>
<div class =\"spane\"> Very <regionalstrong>".$lang['StrongE']."</regionalstrong> !!</div>
<div class=\"eqtexthome\"> $eqtitle <br> Time: $eventime <br> Distance<colordist>".$eqdist."</colordist> </div>";}
?>
