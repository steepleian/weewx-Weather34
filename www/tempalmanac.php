<?php
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include('w34CombinedData.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 Temperature Almanac Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@font-face{font-family:weathertext2;src:url(css/fonts/verbatim-regular.woff) format("woff"),url(fonts/verbatim-regular.woff2) format("woff2"),url(fonts/verbatim-regular.ttf) format("truetype")}
html,body{font-size:13px;font-family: "weathertext2", Helvetica, Arial, sans-serif;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;}
.grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(185px, 2fr));
  grid-gap: 5px;
  align-items: stretch;
  color:#f5f7fc;

  }
.grid > article {
   border: 1px solid rgba(245, 247, 252,.02);
  box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.6);
  padding:5px;
  font-size:0.8em;
  -webkit-border-radius:4px;
  border-radius:4px;
  background:0;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;
  height:105px ;
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
  height:145px ;

}

.weather34chart-btn.close:after,.weather34chart-btn.close:before{color:#ccc;position:absolute;font-size:14px;font-family:Arial,Helvetica,sans-serif;font-weight:600}
.weather34browser-header{flex-basis:auto;height:35px;background:#ebebeb;background:0;border-bottom:0;display:flex;margin-top:-20px;width:99%;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-moz-border-radius-topleft:5px;-moz-border-radius-topright:5px;border-top-left-radius:5px;border-top-right-radius:5px}.weather34browser-footer{flex-basis:auto;height:35px;background:#ebebeb;background:rgba(56,56,60,1);border-bottom:0;display:flex;bottom:-20px;width:97.4%;-webkit-border-bottom-right-radius:5px;-webkit-border-bottom-left-radius:5px;-moz-border-radius-bottomright:5px;-moz-border-radius-bottomleft:5px;border-bottom-right-radius:5px;border-bottom-left-radius:5px}.weather34chart-btns{position:absolute;height:35px;display:inline-block;padding:0 10px;line-height:38px;width:55px;flex-basis:auto;top:5px}.weather34chart-btn{width:14px;height:14px;border:1px solid rgba(0,0,0,.15);border-radius:6px;display:inline-block;margin:1px}.weather34chart-btn.close{background-color: rgba(255, 124, 57, 1.000)}.weather34chart-btn.close:before{content:"x";margin-top:-14px;margin-left:2px}.weather34chart-btn.close:after{content:"close window";margin-top:-13px;margin-left:15px;width:300px}a{color:#aaa;text-decoration:none}
.weather34darkbrowser{position:relative;background:0;width:100%;max-height:30px;margin:auto;margin-top:-15px;margin-left:0px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:45px;background-image:radial-gradient(circle,#EB7061 6px,transparent 8px),radial-gradient(circle,#F5D160 6px,transparent 8px),radial-gradient(circle,#81D982 6px,transparent 8px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),linear-gradient(to bottom,rgba(59,60,63,0.4) 40px,transparent 0);background-position:left top,left top,left top,right top,right top,right top,0 0;background-size:50px 45px,90px 45px,130px 45px,50px 30px,50px 45px,50px 60px,100%;background-repeat:no-repeat,no-repeat}.weather34darkbrowser[url]:after{content:attr(url);color:#aaa;font-size:10px;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 50px 0 90px;border-radius:3px;background:rgba(97, 106, 114, 0.3);height:20px;box-sizing:border-box}
 blue{color:#01a4b4}orange{color:#009bb4}orange1{position:relative;color:#009bb4;margin:0 auto;text-align:center;margin-left:5%;font-size:1.1rem}green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#CC0}purple{color:#916392}
.hitempyposx{position:relative;top:-90px;margin-left:20px;margin-bottom:-30px}
.hitempypos{position:absolute;margin-top:-70px;margin-left:23px;margin-bottom:20px;display:block;}
.hitempypos2{position:absolute;margin-top:-25px;margin-left:23px;margin-bottom:20px;display:block;}

.hitempd{position:absolute;font-family:weathertext2,Arial, Helvetica, sans-serif;background:rgba(86, 95, 103, 0.3);color:#aaa;font-size:0.7rem;width:120px;padding:0;margin-left:32px;padding-left:3px;align-items:center;justify-content:center;display:block;margin-top:-20px;}
.hitempd1{position:absolute;font-family:weathertext2,Arial, Helvetica, sans-serif;background:rgba(86, 95, 103, 0.3);color:#aaa;font-size:0.7rem;width:120px;padding:0;margin-left:32px;padding-left:3px;align-items:center;justify-content:center;display:block;margin-top:10px;}
.hitempd2{position:absolute;font-family:weathertext2,Arial, Helvetica, sans-serif;background:rgba(86, 95, 103, 0.3);color:#aaa;font-size:0.7rem;width:90px;padding:0;margin-left:32px;padding-left:3px;align-items:center;justify-content:center;display:block;margin-top:-15px;}
.actual{font-size:2rem;float:right;position:absolute;left:120px;top:25px;background:0;padding:2px;font-weight:normal;color:rgba(74, 99, 111, 0.5);margin-bottom:5px;}
.actual1{font-size:11px;float:none;position:absolute;left:10px;top:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(86, 95, 103, 0.2);padding:1px;font-weight:normal;margin-bottom:5px;}
.hitemp{color:#aaa;font-size:0.7rem;display:inline;}.hitemp span{color:rgba(255, 124, 57, 1.000)}blue{color:rgba(0, 154, 171, 1.000)}
.temperaturecontainer1{position:absolute;left:20px;margin-top:-5px;margin-bottom:20px;}.temperaturecontainer2{position:absolute;left:20px;margin-top:60px}
.temperaturetrend1,.temperaturecaution,.temperaturetrend{position:absolute;font-size:0.85rem}
.temperaturetodayminus10,.temperaturetodayminus5,.temperaturetodayminus,.temperaturetoday0-5,.temperaturetoday6-10,.temperaturetoday11-15,.temperaturetoday16-20,.temperaturetoday21-25,.temperaturetoday26-30,.temperaturetoday31-35,.temperaturetoday36-40,.temperaturetoday41-45{font-family:weathertext2,Arial,Helvetica,system;width:3.75rem;height:1.75rem;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;display:flex;font-size:.95rem;padding-top:2px;color:#fff;border-bottom:11px solid rgba(56,56,60,1);align-items:center;justify-content:center;border-radius:3px;margin-bottom:10px;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;}
.temperaturetodayminus10{background:background:#00a4b4;background:-webkit-linear-gradient(270deg,#00a4b4,rgba(80,69,188,1));background:linear-gradient(270deg,#00a4b4,rgba(80,69,188,1))}
.temperaturetodayminus5{background:background:#00a4b4;background:-webkit-linear-gradient(270deg,#00a4b4,rgba(80,69,188,1));background:linear-gradient(270deg,#00a4b4,rgba(80,69,188,1))}
.temperaturetodayminus{background:background:#00a4b4;background:-webkit-linear-gradient(270deg,#00a4b4,rgba(80,69,188,1));background:linear-gradient(270deg,#00a4b4,rgba(80,69,188,1))}
.temperaturetoday0-5{background:#00a4b4;background:-webkit-linear-gradient(270deg,#00a4b4,#087883);background:linear-gradient(270deg,#00a4b4,#087883)}
.temperaturetoday6-10{background:#88b04b;background:-webkit-linear-gradient(90deg,#00a4b4,#88b04b);background:linear-gradient(90deg,#00a4b4,#88b04b)}
.temperaturetoday11-15{background:#e6a141;background:-webkit-linear-gradient(90deg,#90b12a,#e6a141);background:linear-gradient(90deg,#90b12a,#e6a141)}
.temperaturetoday16-20{background:#ff7c39;background:-webkit-linear-gradient(90deg,#90b12a,#ff7c39);background:linear-gradient(90deg,#90b12a,#ff7c39)}
.temperaturetoday21-25{background:#ff7c39;background:-webkit-linear-gradient(90deg,#e6a141,#ff7c39);background:linear-gradient(90deg,#e6a141,#ff7c39)}
.temperaturetoday26-30{background:#d05f2d;background:-webkit-linear-gradient(90deg,#d05f2d,rgba(236,102,21,1));background:linear-gradient(90deg,#d05f2d,rgba(236,102,21,1))}
.temperaturetoday31-35{background:#d86858;background:-webkit-linear-gradient(90deg,#d86858,rgba(211,93,78,.7));background:linear-gradient(90deg,#d86858,rgba(211,93,78,.7))}
.temperaturetoday36-40{background:#fd7641;background:-webkit-linear-gradient(90deg,#fd7641,#637ff6);background:linear-gradient(90deg,#fd7641,#637ff6)}
.temperaturetoday41-45{background:#de2c52;background:-webkit-linear-gradient(90deg,#de2c52,#637ff6);background:linear-gradient(90deg,#de2c52,#637ff6)}
.temperaturetrend{margin-left:10px;margin-top:-20.5px;z-index:1;color:#fff;font-size:.6rem;}
.temperaturetrend1{margin-left:7px;margin-top:-20.5px;z-index:1;color:#fff;font-size:.6rem;}
.temperaturetrend2{margin-left:0px;margin-top:-20px;z-index:1;color:#fff;font-size:.5rem;position:absolute}
smalluvunit{font-size:.7rem;font-family:weathertext2,Arial,Helvetica,system;}
.w34convertrain{position:relative;font-size:.5em;top:10px;color:#c0c0c0;margin-left:5px}
.hitempy{position:relative;background:rgba(61, 64, 66, 0.5);color:#aaa;width:90px;padding:1px;-webit-border-radius:2px;border-radius:2px;
margin-top:-20px;margin-left:98px;padding-left:3px;line-height:11px;font-size:9px}
.actualt{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74, 99, 111, 0.1);
padding:5px;font-family:Arial, Helvetica, sans-serif;width:130px;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;
align-items:center;justify-content:center;margin-bottom:10px;top:0;text-align:center;}
.actualw{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74, 99, 111, 0.1);
padding:5px;font-family:Arial, Helvetica, sans-serif;width:100px;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;border-bottom:2px solid rgba(56,56,60,1);
align-items:center;justify-content:center;margin-bottom:10px;top:0}
.actual{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;
padding:5px;font-family:Arial, Helvetica, sans-serif;width:95%;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;
align-items:center;justify-content:center;margin-bottom:10px;top:0}
</style>
<div class="weather34darkbrowser" url="Temperature Almanac"></div>

<main class="grid">
  <article>
   <div class=actualt>Temperature Today </div>
   <div class="temperaturecontainer">
	 <?php
	//temp max today
	if ($tempunit=='C' && $weather["tempdmax"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmax"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmax"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmax"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmax"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmax"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmax"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmax"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmax"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmax"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmax"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmax"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempdmax"] . "</value>";}

	//f
	//temp max today
	if ($tempunit=='F' && $weather["tempdmax"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmax"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmax"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmax"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmax"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmax"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmax"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmax"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmax"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmax"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmax"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempdmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmax"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempdmax"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div>
    <div class="temperaturetrend"><?php echo $weather["tempdmaxtime"];?></span></div>

    <div class="temperaturecontainer">
	 <?php
	//temp min today
	if ($tempunit=='C' && $weather["tempdmin"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmin"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmin"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmin"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmin"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmin"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmin"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmin"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmin"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmin"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmin"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempdmin"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempdmin"] . "</value>";}

	//f
	//temp min today
	if ($tempunit=='F' && $weather["tempdmin"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmin"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmin"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmin"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmin"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmin"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmin"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmin"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmin"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmin"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmin"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempdmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempdmin"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempdmin"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div></div>
    <div class="temperaturetrend"><?php echo $weather["tempdmintime"];?></span></div>

<div class=hitempypos>
 <div class="hitempd" >Dew Max<orange><?php echo "&nbsp;".$weather["dewmax"],"</orange>&deg;",$weather["temp_units"]," ",$weather["dewmaxtime"];?></span><br></div>
 <div class="hitempd" style="margin-top:-5px;">Dew Min<blue><?php echo "&nbsp;".$weather["dewmin"],"</blue>&deg;",$weather["temp_units"]," ",$weather["dewmintime"];?></span><br></div>
</div>

 <div class=hitempypos>
<div class="hitempd1" style="margin-top:25px;">Hum Max<orange><?php echo "&nbsp;".$weather["humidity_max"],"</orange>%  ",$weather["humidity_maxtime"];?></span><br></div><br>
<div class="hitempd1" style="margin-top:30px;">Hum Min<blue><?php echo "&nbsp;".$weather["humidity_min"],"</blue>%  ",$weather["humidity_mintime"];?></span><br></div><br>
</div>
</div>
</article>

<article>
   <div class=actualt>Temperature Yesterday </div>
   <div class="temperaturecontainer">
	 <?php
	//temp max yesterday
	if ($tempunit=='C' && $weather["tempydmax"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmax"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmax"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmax"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmax"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmax"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmax"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmax"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmax"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmax"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmax"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmax"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempydmax"] . "</value>";}

	//f
	//temp max yesterday
	if ($tempunit=='F' && $weather["tempydmax"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmax"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmax"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmax"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmax"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmax"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmax"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmax"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmax"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmax"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmax"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempydmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmax"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempydmax"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div>
    <div class="temperaturetrend"><?php echo $weather["tempydmaxtime"];?></span></div>

    <div class="temperaturecontainer">
	 <?php
	//temp min yesterday
	if ($tempunit=='C' && $weather["tempydmin"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmin"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmin"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmin"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmin"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmin"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmin"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmin"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmin"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmin"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmin"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempydmin"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempydmin"] . "</value>";}

	//f
	//temp min yesterday
	if ($tempunit=='F' && $weather["tempydmin"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmin"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmin"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmin"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmin"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmin"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmin"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmin"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmin"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmin"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmin"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempydmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempydmin"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempydmin"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div></div>
    <div class="temperaturetrend"><?php echo $weather["tempydmintime"];?></span></div>

<div class=hitempypos>
 <div class="hitempd" >Dew Max<orange><?php echo "&nbsp;".$weather["dewydmax"],"</orange>&deg;",$weather["temp_units"]," ",$weather["dewydmaxtime"];?></span><br></div>
 <div class="hitempd" style="margin-top:-5px;">Dew Min<blue><?php echo "&nbsp;".$weather["dewydmin"],"</blue>&deg;",$weather["temp_units"]," ",$weather["dewydmintime"];?></span><br></div>
</div>

 <div class=hitempypos>
<div class="hitempd1" style="margin-top:25px;">Hum Max<orange><?php echo "&nbsp;".$weather["humidity_ydmax"],"</orange>%  ",$weather["humidity_ydmaxtime"];?></span><br></div><br>
<div class="hitempd1" style="margin-top:30px;">Hum Min<blue><?php echo "&nbsp;".$weather["humidity_ydmin"],"</blue>%  ",$weather["humidity_ydmintime"];?></span><br></div><br>
</div>
</article>




  <article>
  <div class=actualt>Temperature <?php echo date(' F Y')?> </div>
   <div class="temperaturecontainer">
	 <?php
	//temp max month
	if ($tempunit=='C' && $weather["tempmmax"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmax"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmax"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmax"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmax"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmax"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmax"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmax"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmax"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmax"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmax"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmax"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempmmax"] . "</value>";}

	//f
	//temp max month
	if ($tempunit=='F' && $weather["tempmmax"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmax"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmax"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmax"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmax"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmax"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmax"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmax"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmax"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmax"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmax"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempmmax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmax"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempmmax"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div>
    <div class="temperaturetrend1"><?php echo $weather["tempmmaxtime"];?></span></div>

    <div class="temperaturecontainer">
	 <?php
	//temp min month
	if ($tempunit=='C' && $weather["tempmmin"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmin"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmin"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmin"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmin"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmin"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmin"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmin"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmin"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmin"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmin"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempmmin"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempmmin"] . "</value>";}

	//f
	//temp min month
	if ($tempunit=='F' && $weather["tempmmin"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmin"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmin"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmin"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmin"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmin"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmin"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmin"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmin"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmin"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmin"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempmmin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempmmin"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempmmin"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div></div>
    <div class="temperaturetrend1"><?php echo $weather["tempmmintime"];?></span></div>

<div class=hitempypos>
 <div class="hitempd" >Dew Max<orange><?php echo "&nbsp;".$weather["dewmmax"],"</orange>&deg;",$weather["temp_units"]," ",$weather["dewmmaxtime"];?></span><br></div>
 <div class="hitempd" style="margin-top:-5px;">Dew Min<blue><?php echo "&nbsp;".$weather["dewmmin"],"</blue>&deg;",$weather["temp_units"]," ",$weather["dewmmintime"];?></span><br></div>
</div>

 <div class=hitempypos>
<div class="hitempd1" style="margin-top:25px;">Hum Max<orange><?php echo "&nbsp;".$weather["humidity_mmax"],"</orange>%  ",$weather["humidity_mmaxtime"];?></span><br></div><br>
<div class="hitempd1" style="margin-top:30px;">Hum Min<blue><?php echo "&nbsp;".$weather["humidity_mmin"],"</blue>%  ",$weather["humidity_mmintime"];?></span><br></div><br>
</div>
</article>


   <article>
  <div class=actualt>Temperature <?php echo date('Y')?> </div>
   <div class="temperaturecontainer">
	 <?php
	//temp max year
	if ($tempunit=='C' && $weather["tempymax"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymax"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymax"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymax"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymax"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymax"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymax"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymax"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymax"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymax"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymax"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymax"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempymax"] . "</value>";}

	//f
	//temp max year
	if ($tempunit=='F' && $weather["tempymax"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymax"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymax"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymax"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymax"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymax"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymax"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymax"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymax"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymax"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymax"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempymax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymax"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempymax"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div>
    <div class="temperaturetrend1"><?php echo $weather["tempymaxtime"];?></span></div>

    <div class="temperaturecontainer">
	 <?php
	//temp min year
	if ($tempunit=='C' && $weather["tempymin"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymin"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymin"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymin"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymin"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymin"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymin"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymin"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymin"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymin"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymin"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempymin"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempymin"] . "</value>";}

	//f
	//temp min year
	if ($tempunit=='F' && $weather["tempymin"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymin"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymin"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymin"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymin"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymin"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymin"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymin"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymin"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymin"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymin"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempymin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempymin"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempymin"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div></div>
    <div class="temperaturetrend1"><?php echo $weather["tempymintime"];?></span></div>

 <div class=hitempypos>
 <div class="hitempd" >Dew Max<orange><?php echo "&nbsp;".$weather["dewymax"],"</orange>&deg;",$weather["temp_units"]," ",$weather["dewymaxtime"];?></span><br></div>
 <div class="hitempd" style="margin-top:-5px;">Dew Min<blue><?php echo "&nbsp;".$weather["dewymin"],"</blue>&deg;",$weather["temp_units"]," ",$weather["dewymintime"];?></span><br></div>
</div>

 <div class=hitempypos>
<div class="hitempd1" style="margin-top:25px;">Hum Max<orange><?php echo "&nbsp;".$weather["humidity_ymax"],"</orange>%  ",$weather["humidity_ymaxtime"];?></span><br></div><br>
<div class="hitempd1" style="margin-top:30px;">Hum Min<blue><?php echo "&nbsp;".$weather["humidity_ymin"],"</blue>%  ",$weather["humidity_ymintime"];?></span><br></div><br>
</div>
</article>






 <article  style="height:105px;">
  <div class=actualt>Temperature All-Time </div>
   <div class="temperaturecontainer">
	 <?php
	//temp max year
	if ($tempunit=='C' && $weather["tempamax"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamax"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamax"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamax"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamax"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamax"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamax"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamax"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamax"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamax"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamax"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamax"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempamax"] . "</value>";}

	//f
	//temp max year
	if ($tempunit=='F' && $weather["tempamax"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamax"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamax"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamax"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamax"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamax"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamax"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamax"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamax"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamax"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamax"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamax"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempamax"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div>


    <div class="temperaturecontainer">
	 <?php
	//temp min year
	if ($tempunit=='C' && $weather["tempamin"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamin"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamin"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamin"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamin"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamin"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamin"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamin"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamin"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamin"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamin"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["tempamin"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempamin"] . "</value>";}

	//f
	//temp min year
	if ($tempunit=='F' && $weather["tempamin"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamin"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamin"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamin"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamin"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamin"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamin"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamin"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamin"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamin"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamin"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["tempamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["tempamin"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["tempamin"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div></div>


  <div class=hitempypos>
 <div class="hitempd2" ><?php echo $weather["tempamaxtime"];?></span><br></div>
 <div class="hitempd2" style="margin-top:25px;"><?php echo $weather["tempamintime"];?></div>
</div>

</article>

<article  style="height:105px;">
  <div class=actualt>Dewpoint All-Time </div>
   <div class="temperaturecontainer">
	 <?php
	//temp max year
	if ($tempunit=='C' && $weather["dewamax"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamax"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamax"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamax"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamax"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamax"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamax"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamax"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamax"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamax"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamax"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamax"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["dewamax"] . "</value>";}

	//f
	//temp max year
	if ($tempunit=='F' && $weather["dewamax"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamax"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamax"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamax"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamax"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamax"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamax"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamax"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamax"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamax"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamax"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["dewamax"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamax"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["dewamax"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div>



    <div class="temperaturecontainer">
	 <?php
	//temp min year
	if ($tempunit=='C' && $weather["dewamin"]>=41)  {
	echo "<div class='temperaturetoday41-45'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamin"]>=36)  {
	echo "<div class='temperaturetoday36-40'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamin"]>=31)  {
	echo "<div class='temperaturetoday31-35'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamin"]>=26)  {
	echo "<div class='temperaturetoday26-30'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamin"]>=21)  {
	echo "<div class='temperaturetoday21-25'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamin"]>=16)  {
	echo "<div class='temperaturetoday16-20'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamin"]>=10)  {
	echo "<div class='temperaturetoday11-15'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamin"]>=6)  {
	echo "<div class='temperaturetoday6-10'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamin"]>=0)  {
	echo "<div class='temperaturetoday0-5'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamin"]<0)  {
	echo "<div class='temperaturetodayminus'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamin"]<-5)  {
	echo "<div class='temperaturetodayminus5'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='C' && $weather["dewamin"]<-10)  {
	echo "<div class='temperaturetodayminus10'>",$weather["dewamin"] . "</value>";}

	//f
	//temp min year
	if ($tempunit=='F' && $weather["dewamin"]>=105.8)  {
	echo "<div class='temperaturetoday41-45'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamin"]>=96.8)  {
	echo "<div class='temperaturetoday36-40'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamin"]>=87.8)  {
	echo "<div class='temperaturetoday31-35'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamin"]>=78.8)  {
	echo "<div class='temperaturetoday26-30'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamin"]>=69.8)  {
	echo "<div class='temperaturetoday21-25'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamin"]>=60.8)  {
	echo "<div class='temperaturetoday16-20'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamin"]>=50)  {
	echo "<div class='temperaturetoday11-15'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamin"]>=42.8)  {
	echo "<div class='temperaturetoday6-10'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamin"]>=32)  {
	echo "<div class='temperaturetoday0-5'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamin"]<32)  {
	echo "<div class='temperaturetodayminus'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamin"]<-23)  {
	echo "<div class='temperaturetodayminus5'>",$weather["dewamin"] . "</value>";}
	else if ($tempunit=='F' && $weather["dewamin"]<-14)  {
	echo "<div class='temperaturetodayminus10'>",$weather["dewamin"] . "</value>";}
	echo "<smalluvunit>".$weather["temp_units"]."</smalluvunit>"
	?>	</div></div>
   <div class=hitempypos>
 <div class="hitempd2" ><?php echo $weather["dewamaxtime"];?></span><br></div>
 <div class="hitempd2" style="margin-top:25px;"><?php echo $weather["dewamintime"];?></div>
</div>




</article>




 <article>
  <div class="lotemp">
  <?php echo $info?>
<a href="https://canvasjs.com" title="https://canvasjs.com" target="_blank" style="font-size:8px;"> Charts rendered and compiled using <?php echo $creditschart ;?> </a></span>
  </div><br>
  <div class="lotemp">
  <?php echo $info?> <a href="https://weather34.com" title="weather34.com" target="_blank" style="font-size:8px;">CSS/SVG/PHP scripts were developed by weather34.com  for use in the weather34 template &copy; 2015-<?php echo date('Y');?>
  </a></div>

  </article>

</main>


  <main class="grid1" >
    <articlegraph>
  <div class=actualt><?php echo date('Y');?> Temp <span style="color:#ff9350">Max:<?php echo "&deg;<smalluvunit>",$weather["temp_units"]?></smalluvunit></span> | <blue>Min:<?php echo "&deg;<smalluvunit>",$weather["temp_units"]?></blue></div>
  <iframe  src="<?php echo $chartsource ;?>/yearlytemperaturemedium.php" frameborder="0" scrolling="no" width="100%" height="120px" ></iframe>

  </articlegraph>



</main>

   </main>
