<?php 
include('shared.php');include('settings.php');
// K-INDEX & SOLAR DATA FOR HOMEWEATHERSTATION TEMPLATE RADIO HAMS REJOICE :-) //
$str = file_get_contents('jsondata/ki.txt');
$json = array_reverse(json_decode($str,false));
$kp =  $json[1][1];


	####################################################################################################
	#	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2015-18                                       #
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at https://weather34.com/homeweatherstation/index.html # 
	# 	                                                                                               #
	# 	                                                                                               #
	# 	WEATHER34 AURORA SUN INDEX: 25th January 2018   	                                           #
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 Radio Aurora/ Northern Lights<br>s</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  
<link href="css/meteorshowers.<?php echo $theme; ?>.css?version=<?php echo filemtime('css/meteorshowers.' . $theme . '.css'); ?>" rel="stylesheet prefetch">

  <div class="weather34darkbrowser" url="Radio Aurora | Northern Lights"></div> 
  
<main class="grid">
  <article>       
 <div class="kpcontainer1"><?php 
if ($kp>6) {echo '<div class=kptoday7>'.number_format($kp,1)."<smalluvunit> &nbsp;KP-Index";}
else if ($kp>5) {echo '<div class=kptoday6>'.number_format($kp,1)."<smalluvunit> &nbsp;KP-Index";}
else if ($kp>4) {echo '<div class=kptoday4>'.number_format($kp,1)."<smalluvunit> &nbsp;KP-Index";}
else if ($kp>0) {echo '<div class=kptoday1>'.number_format($kp,1)."<smalluvunit> &nbsp;KP-Index";}
?></smalluvunit></div></div>
    <div class="kpcaution"><?php 
if ($kp>6) {echo 'Storm';}
else if ($kp>5) {echo 'Active';}
else if ($kp>4) {echo 'Active';}
else if ($kp>=0) {echo 'Quiet';}
?><br></div><br>
<?php echo " \n";if($kp>=9){echo "<red>G5 Geomagnetic Severe Storm</span><br>";echo 'KP-PLANETARY INDEX';}else if($kp>=8){echo "<red>G4 Geomagnetic Major Storm</span><br>";echo 'KP-PLANETARY INDEX';}else if($kp>=7){echo "<red>G3 Geomagnetic Major Storm</span><br>";echo 'KP-PLANETARY INDEX';}else if($kp>=6){echo "<red>G2 Geomagnetic Storm</span><br>";echo 'KP-PLANETARY INDEX';}else if($kp>=5){echo "<orange>G1 Geomagnetic Storm</span><br>";echo 'KP-PLANETARY INDEX';}else if($kp>=4){echo "<orange>Minor G1 Geomagnetic Storm</span><br>";echo 'KP-PLANETARY INDEX';}else if($kp>=3.5){echo "<green>Weak Geomagnetic Storm</span><br>";echo 'KP-PLANETARY INDEX';}else if($kp>=0){echo "<green> Quiet No Geomagnetic Storm</span><br>";echo 'KP-PLANETARY INDEX';}?>

</div>               
</article>  
  
  <article>
<div class="kpcontainer1"><?php 
if ($kp>8.9) {echo '<div class=kptoday7>400<smalluvunit> &nbsp;A-Index';}
else if ($kp>7.9) {echo '<div class=kptoday7>208<smalluvunit> &nbsp;A-Index';}
else if ($kp>6.9) {echo '<div class=kptoday7>132<smalluvunit> &nbsp;A-Index';}
else if ($kp>6) {echo '<div class=kptoday7>80<smalluvunit> &nbsp;A-Index';}
else if ($kp>4.9) {echo '<div class=kptoday4>'.number_format($kp*6,0)."<smalluvunit> &nbsp;A-Index";}
else if ($kp>3.9) {echo '<div class=kptoday4>'.number_format($kp*5,0)."<smalluvunit> &nbsp;A-Index";}
else if ($kp>0) {echo '<div class=kptoday1>'.number_format($kp*2,0)."<smalluvunit> &nbsp;A-Index";}
?></smalluvunit></div></div>
    <div class="kpcaution"><?php 
if ($kp>6) {echo 'Storm';}
else if ($kp>5) {echo 'Active';}
else if ($kp>4) {echo 'Active';}
else if ($kp>=0) {echo 'Quiet';}
?></div>    
<br>
<?php echo " \n";if($kp>=9){echo "<red>G5 Severe Storm</span><br>";echo 'RADIO AURORA <orange>ACTIVE</orange>';}else if($kp>=8){echo "<red>G4 Major Storm</span><br>";echo 'RADIO AURORA <orange>ACTIVE</orange>';}else if($kp>=7){echo "<red>G3 Major Storm</span><br>";echo 'RADIO AURORA <orange>ACTIVE</orange>';}else if($kp>=6){echo "<red>G2 Storm</span><br>";echo 'RADIO AURORA <orange>ACTIVE</orange>';}else if($kp>=5){echo "<orange>G1 Storm</span><br>";echo 'RADIO AURORA <orange>ACTIVE</orange>';}else if($kp>=4){echo "<orange>Minor G1 Storm</span><br>";echo 'RADIO AURORA <orange>ACTIVE</orange>';}else if($kp>=3.5){echo "<green>Weak Storm</span><br>";echo 'RADIO AURORA <orange>ACTIVE</orange>';}else if($kp>0){echo "<green>Quiet No Storms</span><br>";echo 'NOT ACTIVE';}?></span>
          


  </article> 
  
  <article>  
   <?php echo $info ;?> <orange>Guide</orange><br><green>KP-INDEX</green> figure provides a good indicator of viewing the <green>Aurora Borealis</green> or <green>Northern Lights</green> The greater the KP-Index the higher probability of viewing .The Estimated 3-hour Planetary Kp-index data is collected from ground-based magnetometers. </article> 
   
    <article>
   <?php echo $info ;?> <orange>Guide</orange><br><green>A-INDEX</green> is an indicator of possible enhanced VHF radio signal communication at a range of upto 1000 miles or more. During strong solar activity frequencies from 28 to 433MHZ or higher allowing radio communications to be possible at mid to high latitudes .
 
              
  </article>  
  
  <article>
   <?php echo $info ;?> <orange>Radio Ham Guide</orange><br>Aurora communications can be used by Ham Radio VHF enthusiasts. Using Aurora scatter propagation enables ham radio enthusiasts communications.
Aurora scatter communications using specialised operating techniques allows communications distances up to 2000 km or more at frequencies of 28MHz/50MHz/144MHz/433MHz .<br>
 
 
              
  </article> 
  <article>
  <div class=actualt>&nbsp;&nbsp &copy; Information</div>  
  <?php echo $info?> Adapted by Steepleian for the WeeWX Weather34 skin from the original CSS/SVG/PHP scripts by weather34.com &copy; 2015-<?php echo date('Y');?>
  <br><br><?php echo $info ;?> Data Provided by <a href="https://www.swpc.noaa.gov/products/station-k-and-indices" title="https://www.swpc.noaa.gov/products/station-k-and-indices" target="_blank"><br>NATIONAL OCEANIC AND ATMOSPHERIC ADMINISTRATION</a> 
  
        <br>  <br> <br>     
 <?php echo '<svg viewBox="0 0 32 32" width=7 height=7 fill=#9aba2f stroke=#9aba2f stroke-linecap=round stroke-linejoin=round stroke-width=6.25%><path d="M16 14 L16 23 M16 8 L16 10" /><circle cx=16 cy=16 r=14 /></svg>';
; echo " Last Updated: ".date("H:i:s",filemtime('jsondata/ki.txt'));?>

</article> 

</main>
