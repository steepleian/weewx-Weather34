<?php include('shared.php');
// K-INDEX & SOLAR DATA FOR HOMEWEATHERSTATION TEMPLATE RADIO HAMS REJOICE :-) //
$str = file_get_contents('jsondata/kindex.txt');
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
  
  
<style>
@font-face{font-family:weathertext2;src:url(css/fonts/verbatim-regular.woff) format("woff"),url(fonts/verbatim-regular.woff2) format("woff2"),url(fonts/verbatim-regular.ttf) format("truetype")}
html,body{font-size:13px;font-family: "weathertext2", Helvetica, Arial, sans-serif;}
.grid { 
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  grid-gap: 20px;
  align-items: stretch;
  color:#f5f7fc
  }
.grid > article {
  border: 1px solid #212428;
  box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
  padding:20px;
  font-size:0.8em;
  -webkit-border-radius:4px;
  border-radius:4px;
}
.grid > article img {
  max-width: 100%;
}
 .weather34chart-btn.close:after,.weather34chart-btn.close:before{color:#ccc;position:absolute;font-size:14px;font-family:Arial,Helvetica,sans-serif;font-weight:600}.weather34browser-header{flex-basis:auto;height:35px;background:#ebebeb;background:0;border-bottom:0;display:flex;margin-top:-20px;width:100%;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-moz-border-radius-topleft:5px;-moz-border-radius-topright:5px;border-top-left-radius:5px;border-top-right-radius:5px}.weather34browser-footer{flex-basis:auto;height:35px;background:#ebebeb;background:rgba(56,56,60,1);border-bottom:0;display:flex;bottom:-20px;width:97.4%;-webkit-border-bottom-right-radius:5px;-webkit-border-bottom-left-radius:5px;-moz-border-radius-bottomright:5px;-moz-border-radius-bottomleft:5px;border-bottom-right-radius:5px;border-bottom-left-radius:5px}.weather34chart-btns{position:absolute;height:35px;display:inline-block;padding:0 10px;line-height:38px;width:55px;flex-basis:auto;top:5px}.weather34chart-btn{width:14px;height:14px;border:1px solid rgba(0,0,0,.15);border-radius:6px;display:inline-block;margin:1px}.weather34chart-btn.close{background-color: rgba(255, 124, 57, 1.000)}.weather34chart-btn.close:before{content:"x";margin-top:-14px;margin-left:2px}.weather34chart-btn.close:after{content:"close window";margin-top:-13px;margin-left:15px;width:300px}a{color:#aaa;text-decoration:none}
.weather34darkbrowser{position:relative;background:0;width:100%;max-height:30px;margin:auto;margin-top:-15px;margin-left:0px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:45px;background-image:radial-gradient(circle,#EB7061 6px,transparent 8px),radial-gradient(circle,#F5D160 6px,transparent 8px),radial-gradient(circle,#81D982 6px,transparent 8px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),linear-gradient(to bottom,rgba(59,60,63,0.4) 40px,transparent 0);background-position:left top,left top,left top,right top,right top,right top,0 0;background-size:50px 45px,90px 45px,130px 45px,50px 30px,50px 45px,50px 60px,100%;background-repeat:no-repeat,no-repeat}.weather34darkbrowser[url]:after{content:attr(url);color:#aaa;font-size:10px;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 50px 0 90px;border-radius:3px;background:rgba(97, 106, 114, 0.3);height:20px;box-sizing:border-box}
 blue{color:#01a4b4}orange{color:#009bb4}orange1{position:relative;color:#009bb4;margin:0 auto;text-align:center;margin-left:5%;font-size:1.1rem}green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#CC0}purple{color:#916392}meteotextshowertext{font-size:1.2rem;color:#009bb4}meteorsvgicon{color:#f5f7fc}  
.moonphasetext{font-size:1.1rem;color:#f5f7fc;position:absolute;display:inline;left:140px;top:80px}
moonphaseriseset{font-size:.9rem;}credit{position:relative;font-size:.8em;top:10%}



smalluvunit{font-size:.9rem;font-family:Arial,Helvetica,system;font-weight:600}
.kpcontainer1{left:100px;top:0}.kptoday1,.kptoday11,.kptoday4,.kptoday6,.kptoday7{font-family:weathertext2,Arial,Helvetica,system;width:8rem;height:3rem;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;display:flex}.kptoday1,.kptoday11,.kptoday4,.kptoday6,.kptoday7{font-size:1.5rem;padding-top:7px;color:#fff;border-bottom:15px solid rgba(56,56,60,1);align-items:center;justify-content:center;border-radius:3px}
.kpcaution,.uvtrend{position:absolute;font-size:.8rem}
.kptoday1{background:#9aba2f}.kptoday4{background:rgba(230,161,65,1)}.kptoday6{background:rgba(255,124,57,.8)}.kptoday7{background:rgba(211,93,78,.8)}.kptoday11{background:rgba(204,135,248,.7)}
.kpcaution{margin-left:38px;margin-top:-14px;font-family:Arial,Helvetica,system}.kptrend{margin-left:135px;margin-top:48px;z-index:1;color:#fff}
.actualt{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74, 99, 111, 0.1);
padding:5px;font-family:Arial, Helvetica, sans-serif;width:100px;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;border-bottom:2px solid rgba(56,56,60,1);
align-items:center;justify-content:center;margin-bottom:10px;top:0}
.actualw{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74, 99, 111, 0.1);
padding:5px;font-family:Arial, Helvetica, sans-serif;width:100px;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;border-bottom:2px solid rgba(56,56,60,1);
align-items:center;justify-content:center;margin-bottom:10px;top:0}
</style>
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
  <?php echo $info?> CSS/SVG/PHP scripts were developed by <a href="https://weather34.com" title="weather34.com" target="_blank" style="font-size:9px;">weather34.com</a>  for use in the weather34 template &copy; 2015-<?php echo date('Y');?></span>
  <br><br><?php echo $info ;?> Data Provided by <a href="https://www.swpc.noaa.gov/products/station-k-and-indices" title="https://www.swpc.noaa.gov/products/station-k-and-indices" target="_blank"><br>NATIONAL OCEANIC AND ATMOSPHERIC ADMINISTRATION</a> 
  
        <br>  <br> <br>     
 <?php echo '<svg viewBox="0 0 32 32" width=7 height=7 fill=#9aba2f stroke=#9aba2f stroke-linecap=round stroke-linejoin=round stroke-width=6.25%><path d="M16 14 L16 23 M16 8 L16 10" /><circle cx=16 cy=16 r=14 /></svg>';
; echo " Last Updated: ".date("H:i:s",filemtime('jsondata/kindex.txt'));?>

</article> 

</main>