<?php 
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include('w34CombinedData.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 Solar Almanac Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@font-face{font-family:weathertext2;src:url(css/fonts/verbatim-regular.woff) format("woff"),url(fonts/verbatim-regular.woff2) format("woff2"),url(fonts/verbatim-regular.ttf) format("truetype")}
html,body{font-size:13px;font-family: "weathertext2", Helvetica, Arial, sans-serif;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;}
.grid { 
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(160px, 2fr));
  grid-gap: 10px;
  align-items: stretch;
  color:#f5f7fc;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;
 
  }
.grid > article {
  border: 1px solid #212428;
  box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
  padding:20px;
  font-size:0.8em;
  -webkit-border-radius:4px;
  border-radius:4px;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;
  height:90px
}
.grid1 { 
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(100%, 1fr));
  grid-gap: 5px;
  align-items: stretch;
  color:#f5f7fc;
  margin-top:5px
  
  }

.grid1 > articlegraph {
   border: 1px solid rgba(245, 247, 252,.02);
  box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.6);
  padding:5px;
  font-size:0.8em;
  -webkit-border-radius:4px;
  border-radius:4px;
  background:0;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;
  height:210px  
}
  
  
  
 .weather34chart-btn.close:after,.weather34chart-btn.close:before{color:#ccc;position:absolute;font-size:14px;font-family:Arial,Helvetica,sans-serif;font-weight:600}
 .weather34browser-header{flex-basis:auto;height:35px;background:#ebebeb;background:0;border-bottom:0;display:flex;margin-top:-20px;width:99%;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-moz-border-radius-topleft:5px;-moz-border-radius-topright:5px;border-top-left-radius:5px;border-top-right-radius:5px}.weather34browser-footer{flex-basis:auto;height:35px;background:#ebebeb;background:rgba(56,56,60,1);border-bottom:0;display:flex;bottom:-20px;width:97.4%;-webkit-border-bottom-right-radius:5px;-webkit-border-bottom-left-radius:5px;-moz-border-radius-bottomright:5px;-moz-border-radius-bottomleft:5px;border-bottom-right-radius:5px;border-bottom-left-radius:5px}.weather34chart-btns{position:absolute;height:35px;display:inline-block;padding:0 10px;line-height:38px;width:55px;flex-basis:auto;top:5px}.weather34chart-btn{width:14px;height:14px;border:1px solid rgba(0,0,0,.15);border-radius:6px;display:inline-block;margin:1px}.weather34chart-btn.close{background-color: rgba(255, 124, 57, 1.000)}.weather34chart-btn.close:before{content:"x";margin-top:-14px;margin-left:2px}.weather34chart-btn.close:after{content:"close window";margin-top:-13px;margin-left:15px;width:300px}a{color:#aaa;text-decoration:none}
.weather34darkbrowser{position:relative;background:0;width:100%;max-height:30px;margin:auto;margin-top:-15px;margin-left:0px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:45px;background-image:radial-gradient(circle,#EB7061 6px,transparent 8px),radial-gradient(circle,#F5D160 6px,transparent 8px),radial-gradient(circle,#81D982 6px,transparent 8px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),linear-gradient(to bottom,rgba(59,60,63,0.4) 40px,transparent 0);background-position:left top,left top,left top,right top,right top,right top,0 0;background-size:50px 45px,90px 45px,130px 45px,50px 30px,50px 45px,50px 60px,100%;background-repeat:no-repeat,no-repeat}.weather34darkbrowser[url]:after{content:attr(url);color:#aaa;font-size:10px;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 50px 0 90px;border-radius:3px;background:rgba(97, 106, 114, 0.3);height:20px;box-sizing:border-box}
 blue{color:#01a4b4}orange{color:#009bb4}orange1{position:relative;color:#009bb4;margin:0 auto;text-align:center;margin-left:5%;font-size:1.1rem}green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#CC0}purple{color:#916392}
.hitempyposx{position:relative;top:-90px;margin-left:40px;margin-bottom:-30px}
.hitempypos{position:absolute;margin-top:-100px;margin-left:40px;margin-bottom:20px;display:block;}
.hitempd{position:absolute;font-family:weathertext2,Arial, Helvetica, sans-serif;background:rgba(86, 95, 103, 0.3);color:#aaa;font-size:0.7rem;width:140px;padding:0;margin-left:30px;padding-left:3px;align-items:center;justify-content:center;display:block;margin-top:5px;}
.hitempd1{position:absolute;font-family:weathertext2,Arial, Helvetica, sans-serif;background:rgba(86, 95, 103, 0.3);color:#aaa;font-size:0.7rem;width:140px;padding:0;margin-left:30px;padding-left:3px;align-items:center;justify-content:center;display:block;margin-top:40px;margin-bottom:5px;}
.uvmaxi3{position:absolute;left:-30px;color:rgba(0, 154, 171, 1.000);margin-top:-40px;font-size:16px;width:240px;}.uvmaxi3 span{color:#aaa}

.higust{position:relative;left:0;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74, 99, 111, 0.1);
padding:5px;font-family:Arial, Helvetica, sans-serif;width:100px;height:2em;font-size:0.8rem;padding-top:2px;color:#aaa;align-items:center;justify-content:center;margin-bottom:10px;top:0}
blue{color:rgba(0, 154, 171, 1.000)}
.temperaturecontainer1{position:absolute;left:20px;margin-top:-5px;margin-bottom:20px;}
.temperaturecontainer2{position:absolute;left:20px;margin-top:60px}
smalluvunit{font-size:.85rem;font-family:Arial,Helvetica,system;}
.uvcontainer1{left:70px;top:0}.uvtoday1,.uvtoday1-3,.uvtoday11,.uvtoday4-5,.uvtoday6-8,.uvtoday9-10{font-family:weathertext2,Arial,Helvetica,system;width:5rem;height:2.5rem;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;display:flex}.uvtoday1,.uvtoday1-3,.uvtoday11,.uvtoday4-5,.uvtoday6-8,.uvtoday9-10{font-size:1.25rem;padding-top:2px;color:#fff;border-bottom:5px solid rgba(56,56,60,1);align-items:center;justify-content:center;border-radius:3px;margin-bottom:10px;}
.uvcaution,.uvtrend{position:absolute;font-size:1rem}
.uvtoday1,.uvtoday1-3{background:#9aba2f}
.uvtoday4-5{background:#ff7c39;background:-webkit-linear-gradient(90deg,#90b12a,#ff7c39);background:linear-gradient(90deg,#90b12a,#ff7c39)}
.uvtoday6-8{background:#efa80f;background:-webkit-linear-gradient(90deg,#efa80f,#d86858);background:linear-gradient(90deg,#efa80f,#d86858)}
.uvtoday9-10{background:#d05f2d;background:-webkit-linear-gradient(90deg,#d65b4a,#ac2816);background:linear-gradient(90deg,#d65b4a,#ac2816)}
.uvtoday11{background:#95439f;background:-webkit-linear-gradient(90deg,#95439f,#a475cb);background:linear-gradient(90deg,#95439f,#a475cb)}
.uvcaution{margin-left:120px;margin-top:112px;font-family:Arial,Helvetica,system}.uvtrend{margin-left:135px;margin-top:48px;z-index:1;color:#fff}.simsekcontainer{float:left;font-family:weathertext,system;-o-font-smoothing:antialiasedleft:0;bottom:0;right:0;position:relative;margin:40px 10px 10px 40px;left:-10px;top:13px}.simsek{font-size:1.55rem;padding-top:12px;color:#f8f8f8;background:rgba(230,161,65,1);border-bottom:18px solid rgba(56,56,60,1);align-items:center;justify-content:center;border-radius:3px}
smalluvunit{font-size:.65rem;font-family:Arial,Helvetica,system;}
sup{font-size:1em}supwm2{font-size:0.7em;vertical-align:super}
.w34convertrain{position:relative;font-size:.5em;top:10px;color:#c0c0c0;margin-left:5px}
.hitempy{position:relative;background:rgba(61, 64, 66, 0.5);color:#aaa;width:90px;padding:1px;-webit-border-radius:2px;border-radius:2px;
margin-top:-20px;margin-left:92px;padding-left:3px;line-height:11px;font-size:9px}
.actualt{position:relative;left:0;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74, 99, 111, 0.1);
padding:5px;font-family:Arial, Helvetica, sans-serif;width:100px;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;
align-items:center;justify-content:center;margin-bottom:10px;top:0}
.actualw{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74, 99, 111, 0.1);
padding:5px;font-family:Arial, Helvetica, sans-serif;width:100px;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;
align-items:center;justify-content:center;margin-bottom:10px;top:0}
</style>
<div class="weather34darkbrowser" url="Solar Almanac"></div>
  
<main class="grid">
  <article>  
   <div class=actualt>Today </div>        
   <div class="temperaturecontainer">
	
             <?php
	// Solar Today
	if ($weather["solardmax"]>=1000)  {
	echo "<div class='uvtoday9-10'>",$weather["solardmax"] . "</value>";}
	else if ($weather["solardmax"]>=500)  {
	echo "<div class='uvtoday6-8'>",$weather["solardmax"] . "</value>";}
	else if ($weather["solardmax"]>=300)  {
	echo "<div class='uvtoday4-5'>",$weather["solardmax"] . "</value>";} 		
	else if ($weather["solardmax"]>=-0) {
	echo "<div class='uvtoday1'>",$weather["solardmax"] . "</value>";}		
	echo "<smalluvunit> W/m<sup>2</sup></smalluvunit>"
?>

</div>

<div class="higust">Maximum Recorded <br><blue><?php echo $weather["solardmaxtime"];?></blue></div>



</article>  

 <article> 
  <div class=actualt>Yesterday </div>        
   <div class="temperaturecontainer">
	
             <?php
	// Solar month
	if ($weather["solarydmax"]>=1000)  {
	echo "<div class='uvtoday9-10'>",$weather["solarydmax"] . "</value>";}
	else if ($weather["solarydmax"]>=500)  {
	echo "<div class='uvtoday6-8'>",$weather["solarydmax"] . "</value>";}
	else if ($weather["solarydmax"]>=300)  {
	echo "<div class='uvtoday4-5'>",$weather["solarymax"] . "</value>";} 		
	else if ($weather["solarydmax"]>=-0) {
	echo "<div class='uvtoday1'>",$weather["solarydmax"] . "</value>";}		
	echo "<smalluvunit> W/m<sup>2</sup></smalluvunit>"
?>

</div>

<div class="higust">Maximum Recorded <br><blue><?php echo $weather["solarydmaxtime"];?></blue></div>



</article>  
  
  <article> 
  <div class=actualt><?php echo date('F Y')?> </div>        
   <div class="temperaturecontainer">
	
             <?php
	// Solar month
	if ($weather["solarmmax"]>=1000)  {
	echo "<div class='uvtoday9-10'>",$weather["solarmmax"] . "</value>";}
	else if ($weather["solarmmax"]>=500)  {
	echo "<div class='uvtoday6-8'>",$weather["solarmmax"] . "</value>";}
	else if ($weather["solarmmax"]>=300)  {
	echo "<div class='uvtoday4-5'>",$weather["solarmmax"] . "</value>";} 		
	else if ($weather["solarmmax"]>=-0) {
	echo "<div class='uvtoday1'>",$weather["solarmmax"] . "</value>";}		
	echo "<smalluvunit> W/m<sup>2</sup></smalluvunit>"
?>

</div>

<div class="higust">Maximum Recorded <br><blue><?php echo $weather["solarmmaxtime"];?></blue></div>



</article>  
  
  
  
    <article> 
  <div class=actualt>Current Year <?php echo date('Y')?> </div>        
   <div class="temperaturecontainer">
	
             <?php
	// Solar month
	if ($weather["solarymax"]>=1000)  {
	echo "<div class='uvtoday9-10'>",$weather["solarymax"] . "</value>";}
	else if ($weather["solarymax"]>=500)  {
	echo "<div class='uvtoday6-8'>",$weather["solarymax"] . "</value>";}
	else if ($weather["solarydmax"]>=300)  {
	echo "<div class='uvtoday4-5'>",$weather["solarYmax"] . "</value>";} 		
	else if ($weather["solarymax"]>=-0) {
	echo "<div class='uvtoday1'>",$weather["solarymax"] . "</value>";}		
	echo "<smalluvunit> W/m<sup>2</sup></smalluvunit>"
?>

</div>

<div class="higust">Maximum Recorded <br><blue><?php echo $weather["solarymaxtime"];?></blue></div>



</article> 
 </main>
<main class="grid1">
  <articlegraph> 
  <div class=actualt>Today <span style="color:#ff9350">Solar W/m<supwm2>2</supwm2></div>  
  <iframe  src="<?php echo $chartsource ;?>/todaysolarsmall.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>
   
  </articlegraph> 
  
  <articlegraph style="height:30px">  
  <div class="lotemp">
  <?php echo $info?> 
<a href="https://canvasjs.com" title="https://canvasjs.com" target="_blank" style="font-size:8px;"> Charts rendered and compiled using <?php echo $creditschart ;?> </a></span>
  </div>
  <div class="lotemp">
  <?php echo $info?> <a href="https://weather34.com" title="weather34.com" target="_blank" style="font-size:8px;">CSS/SVG/PHP scripts were developed by weather34.com  for use in the weather34 template &copy; 2015-<?php echo date('Y');?>
  </a></div>
   
  </articlegraph> 
  
</main>
