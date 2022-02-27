<?php
//###################################################################################################################
//	weewx-Weather34 Template maintained by Ian Millard (Steepleian)                                 				#
//	                                                                                                				#
//  Contains original legacy code (by agreement) created and developed by Brian Underdown (https://weather34.com)   #
//  for the (now superseeded) original Weather34 Template which is no longer maintained by its creator              #
//  © weather34.com original CSS/SVG/PHP 2015-2019                                                                  #
// 	                                                                                                				#
//  Contains original code by Ian Millard and collaborators															#
//  © claydonsweather.org.uk original CSS/SVG/PHP 2020-2021                                                         #
// 	                                                                                                				#
// 	Issues for weewx-Weather34 template should be addressed to https://github.com/steepleian/weewx-Weather34/issues #                                                                                              #
// 	                                                                                                				#
//###################################################################################################################
include ('shared.php');
include ('settings.php');
// K-INDEX & SOLAR DATA FOR HOMEWEATHERSTATION TEMPLATE RADIO HAMS REJOICE :-) //
$str = file_get_contents('jsondata/ki.txt');
$json = array_reverse(json_decode($str, false));
$kp = $json[1][1];
if ($theme === "dark")
{
    echo '<style>@font-face{font-family:weathertext;src:url(css/fonts/verbatim-regular.woff) format("woff"),url(fonts/verbatim-regular.woff2) format("woff2"),url(fonts/verbatim-regular.ttf) format("truetype")}html,body{font-size:13px;font-family:"weathertext",Helvetica,Arial,sans-serif;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;color:#000}.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,2fr));grid-gap:5px;align-items:stretch;color:#f5f7fc}.grid>article{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:0;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid>article img{max-width:100%}a:link{color:silver}a:visited{color:silver}a:hover{color:silver}a:active{color:#fff}.weather34darkbrowser{color:#000;position:relative;background:0;width:97%;height:30px;margin:auto;margin-top:-5px;margin-left:0;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px;color:#000}.weather34darkbrowser[url]:after{content:attr(url);color:#fff;font-size:14px;text-align:center;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;font-family:arial;height:20px}blue{color:#01a4b4}orange{color:#009bb4}orange1{position:relative;color:#009bb4;margin:0 auto;text-align:center;margin-left:5%;font-size:1.1rem}green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#cc0}purple{color:#916392}meteotextshowertext{font-size:1.2rem;color:#009bb4}meteorsvgicon{color:#f5f7fc}.moonphasetext{font-size:1.1rem;color:#f5f7fc;position:absolute;display:inline;left:140px;top:80px}moonphaseriseset{font-size:.9rem}credit{position:relative;font-size:.8em;top:10%}.actualt{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74,99,111,.1);padding:5px;font-family:Arial,Helvetica,sans-serif;width:100px;height:.8em;font-size:.8rem;padding-top:2px;color:#aaa;align-items:center;justify-content:center;margin-bottom:10px;top:0}.actualw{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74,99,111,.1);padding:5px;font-family:Arial,Helvetica,sans-serif;width:100px;height:.8em;font-size:.8rem;padding-top:2px;color:#aaa;border-bottom:2px solid rgba(56,56,60,1);align-items:center;justify-content:center;margin-bottom:10px;top:0}
    </style>';
}
else if ($theme === "light")
{
    echo '<style>@font-face{font-family:weathertext;src:url(css/fonts/verbatim-regular.woff) format("woff"),url(fonts/verbatim-regular.woff2) format("woff2"),url(fonts/verbatim-regular.ttf) format("truetype")}html,body{font-size:13px;font-family:"weathertext",Helvetica,Arial,sans-serif;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;background-color:#fff}.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,2fr));grid-gap:5px;align-items:stretch;color:#000}.grid>article{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:0;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid>article img{max-width:100%}a:link{color:#000}a:visited{color:#000}a:hover{color:#000}a:active{color:#000}.weather34darkbrowser{position:relative;background:0;width:97%;height:30px;margin:auto;margin-top:-5px;margin-left:0;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px}.weather34darkbrowser[url]:after{content:attr(url);color:#000;font-size:14px;text-align:center;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;font-family:arial;height:20px}blue{color:#01a4b4}orange{color:teal}orange1{position:relative;color:teal;margin:0 auto;text-align:center;margin-left:5%;font-size:1.1rem}green{color:blue}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#cc0}purple{color:#916392}meteotextshowertext{font-size:1.2rem;color:teal}meteorsvgicon{color:#f5f7fc}.moonphasetext{font-size:1.1rem;color:#f5f7fc;position:absolute;display:inline;left:140px;top:80px}moonphaseriseset{font-size:.9rem}credit{position:relative;font-size:.8em;top:10%}.actualt{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:teal;padding:5px;font-family:Arial,Helvetica,sans-serif;width:100px;height:.8em;font-size:.8rem;padding-top:2px;color:#fff;align-items:center;justify-content:center;margin-bottom:10px;top:0}.actualw{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74,99,111,.1);padding:5px;font-family:Arial,Helvetica,sans-serif;width:100px;height:.8em;font-size:.8rem;padding-top:2px;color:#aaa;border-bottom:2px solid rgba(56,56,60,1);align-items:center;justify-content:center;margin-bottom:10px;top:0}
    </style>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 Radio Aurora/ Northern Lights<br>s</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  

  <div class="weather34darkbrowser" url="Radio Aurora | Northern Lights"></div> 
  
<main class="grid">
  <article>       
 <div class="kpcontainer1"><?php
if ($kp > 6)
{
    echo '<div class=kptoday7>' . number_format($kp, 1) . "<smalluvunit> &nbsp;KP-Index";
}
else if ($kp > 5)
{
    echo '<div class=kptoday6>' . number_format($kp, 1) . "<smalluvunit> &nbsp;KP-Index";
}
else if ($kp > 4)
{
    echo '<div class=kptoday4>' . number_format($kp, 1) . "<smalluvunit> &nbsp;KP-Index";
}
else if ($kp > 0)
{
    echo '<div class=kptoday1>' . number_format($kp, 1) . "<smalluvunit> &nbsp;KP-Index";
}
?></smalluvunit></div></div>
    <div class="kpcaution"><?php
if ($kp > 6)
{
    echo 'Storm';
}
else if ($kp > 5)
{
    echo 'Active';
}
else if ($kp > 4)
{
    echo 'Active';
}
else if ($kp >= 0)
{
    echo 'Quiet';
}
?><br></div><br>
<?php echo " \n";
if ($kp >= 9)
{
    echo "<red>G5 Geomagnetic Severe Storm</span><br>";
    echo 'KP-PLANETARY INDEX';
}
else if ($kp >= 8)
{
    echo "<red>G4 Geomagnetic Major Storm</span><br>";
    echo 'KP-PLANETARY INDEX';
}
else if ($kp >= 7)
{
    echo "<red>G3 Geomagnetic Major Storm</span><br>";
    echo 'KP-PLANETARY INDEX';
}
else if ($kp >= 6)
{
    echo "<red>G2 Geomagnetic Storm</span><br>";
    echo 'KP-PLANETARY INDEX';
}
else if ($kp >= 5)
{
    echo "<orange>G1 Geomagnetic Storm</span><br>";
    echo 'KP-PLANETARY INDEX';
}
else if ($kp >= 4)
{
    echo "<orange>Minor G1 Geomagnetic Storm</span><br>";
    echo 'KP-PLANETARY INDEX';
}
else if ($kp >= 3.5)
{
    echo "<green>Weak Geomagnetic Storm</span><br>";
    echo 'KP-PLANETARY INDEX';
}
else if ($kp >= 0)
{
    echo "<green> Quiet No Geomagnetic Storm</span><br>";
    echo 'KP-PLANETARY INDEX';
} ?>

</div>               
</article>  
  
  <article>
<div class="kpcontainer1"><?php
if ($kp > 8.9)
{
    echo '<div class=kptoday7>400<smalluvunit> &nbsp;A-Index';
}
else if ($kp > 7.9)
{
    echo '<div class=kptoday7>208<smalluvunit> &nbsp;A-Index';
}
else if ($kp > 6.9)
{
    echo '<div class=kptoday7>132<smalluvunit> &nbsp;A-Index';
}
else if ($kp > 6)
{
    echo '<div class=kptoday7>80<smalluvunit> &nbsp;A-Index';
}
else if ($kp > 4.9)
{
    echo '<div class=kptoday4>' . number_format($kp * 6, 0) . "<smalluvunit> &nbsp;A-Index";
}
else if ($kp > 3.9)
{
    echo '<div class=kptoday4>' . number_format($kp * 5, 0) . "<smalluvunit> &nbsp;A-Index";
}
else if ($kp > 0)
{
    echo '<div class=kptoday1>' . number_format($kp * 2, 0) . "<smalluvunit> &nbsp;A-Index";
}
?></smalluvunit></div></div>
    <div class="kpcaution"><?php
if ($kp > 6)
{
    echo 'Storm';
}
else if ($kp > 5)
{
    echo 'Active';
}
else if ($kp > 4)
{
    echo 'Active';
}
else if ($kp >= 0)
{
    echo 'Quiet';
}
?></div>    
<br>
<?php echo " \n";
if ($kp >= 9)
{
    echo "<red>G5 Severe Storm</span><br>";
    echo 'RADIO AURORA <orange>ACTIVE</orange>';
}
else if ($kp >= 8)
{
    echo "<red>G4 Major Storm</span><br>";
    echo 'RADIO AURORA <orange>ACTIVE</orange>';
}
else if ($kp >= 7)
{
    echo "<red>G3 Major Storm</span><br>";
    echo 'RADIO AURORA <orange>ACTIVE</orange>';
}
else if ($kp >= 6)
{
    echo "<red>G2 Storm</span><br>";
    echo 'RADIO AURORA <orange>ACTIVE</orange>';
}
else if ($kp >= 5)
{
    echo "<orange>G1 Storm</span><br>";
    echo 'RADIO AURORA <orange>ACTIVE</orange>';
}
else if ($kp >= 4)
{
    echo "<orange>Minor G1 Storm</span><br>";
    echo 'RADIO AURORA <orange>ACTIVE</orange>';
}
else if ($kp >= 3.5)
{
    echo "<green>Weak Storm</span><br>";
    echo 'RADIO AURORA <orange>ACTIVE</orange>';
}
else if ($kp > 0)
{
    echo "<green>Quiet No Storms</span><br>";
    echo 'NOT ACTIVE';
} ?></span>
          


  </article> 
  
  <article>  
   <?php echo $info; ?> <orange>Guide</orange><br><green>KP-INDEX</green> figure provides a good indicator of viewing the <green>Aurora Borealis</green> or <green>Northern Lights</green> The greater the KP-Index the higher probability of viewing .The Estimated 3-hour Planetary Kp-index data is collected from ground-based magnetometers. </article> 
   
    <article>
   <?php echo $info; ?> <orange>Guide</orange><br><green>A-INDEX</green> is an indicator of possible enhanced VHF radio signal communication at a range of upto 1000 miles or more. During strong solar activity frequencies from 28 to 433MHZ or higher allowing radio communications to be possible at mid to high latitudes .
 
              
  </article>  
  
  <article>
   <?php echo $info; ?> <orange>Radio Ham Guide</orange><br>Aurora communications can be used by Ham Radio VHF enthusiasts. Using Aurora scatter propagation enables ham radio enthusiasts communications.
Aurora scatter communications using specialised operating techniques allows communications distances up to 2000 km or more at frequencies of 28MHz/50MHz/144MHz/433MHz .<br>
 
 
              
  </article> 
  <article>
  <div class=actualt>&nbsp;&nbsp &copy; Information</div>  
  <?php echo $info ?> Adapted by Steepleian for the WeeWX Weather34 skin from the original CSS/SVG/PHP scripts by weather34.com &copy; 2015-<?php echo date('Y'); ?>
  <br><br><?php echo $info; ?> Data Provided by <a href="https://www.swpc.noaa.gov/products/station-k-and-indices" title="https://www.swpc.noaa.gov/products/station-k-and-indices" target="_blank"><br>NATIONAL OCEANIC AND ATMOSPHERIC ADMINISTRATION</a> 
  
        <br>  <br> <br>     
 <?php echo '<svg viewBox="0 0 32 32" width=7 height=7 fill=#9aba2f stroke=#9aba2f stroke-linecap=round stroke-linejoin=round stroke-width=6.25%><path d="M16 14 L16 23 M16 8 L16 10" /><circle cx=16 cy=16 r=14 /></svg>';;
echo " Last Updated: " . date("H:i:s", filemtime('jsondata/ki.txt')); ?>

</article> 

</main>
