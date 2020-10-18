<?php
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include('w34CombinedData.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 Barometer Almanac Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@font-face{font-family:weathertext2;src:url(css/fonts/verbatim-regular.woff) format("woff"),url(fonts/verbatim-regular.woff2) format("woff2"),url(fonts/verbatim-regular.ttf) format("truetype")}
html,body{font-size:13px;font-family: "weathertext2", Helvetica, Arial, sans-serif;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;}
.grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
  grid-gap: 5px;
  align-items: stretch;
  color:#f5f7fc;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;

  }
.grid > article {
  border: 1px solid #212428;
  box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
  padding:5px;
  font-size:0.8em;
  -webkit-border-radius:4px;
  border-radius:4px;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;
}

.grid1 {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(100%, 1fr));
  grid-gap: 5px;
    color:#f5f7fc;

  }

.grid1 > articlegraph {
   border: 1px solid rgba(245, 247, 252,.02);
  box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.6);
  padding:5px;
  font-size:0.8em;
  -webkit-border-radius:4px;
  border-radius:4px;
  background:0;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;
  height:220px
}


 .weather34chart-btn.close:after,.weather34chart-btn.close:before{color:#ccc;position:absolute;font-size:14px;font-family:Arial,Helvetica,sans-serif;font-weight:600}
 .weather34browser-header{flex-basis:auto;height:35px;background:#ebebeb;background:0;border-bottom:0;display:flex;margin-top:-20px;width:99%;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-moz-border-radius-topleft:5px;-moz-border-radius-topright:5px;border-top-left-radius:5px;border-top-right-radius:5px}.weather34browser-footer{flex-basis:auto;height:35px;background:#ebebeb;background:rgba(56,56,60,1);border-bottom:0;display:flex;bottom:-20px;width:95%;-webkit-border-bottom-right-radius:5px;-webkit-border-bottom-left-radius:5px;-moz-border-radius-bottomright:5px;-moz-border-radius-bottomleft:5px;border-bottom-right-radius:5px;border-bottom-left-radius:5px}.weather34chart-btns{position:absolute;height:35px;display:inline-block;padding:0 10px;line-height:38px;width:55px;flex-basis:auto;top:5px}.weather34chart-btn{width:14px;height:14px;border:1px solid rgba(0,0,0,.15);border-radius:6px;display:inline-block;margin:1px}.weather34chart-btn.close{background-color: rgba(255, 124, 57, 1.000)}.weather34chart-btn.close:before{content:"x";margin-top:-14px;margin-left:2px}.weather34chart-btn.close:after{content:"close window";margin-top:-13px;margin-left:15px;width:300px}a{color:#aaa;text-decoration:none}
.weather34darkbrowser{position:relative;background:0;width:100%;max-height:30px;margin:auto;margin-top:-15px;margin-left:0px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:45px;background-image:radial-gradient(circle,#EB7061 6px,transparent 8px),radial-gradient(circle,#F5D160 6px,transparent 8px),radial-gradient(circle,#81D982 6px,transparent 8px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),linear-gradient(to bottom,rgba(59,60,63,0.4) 40px,transparent 0);background-position:left top,left top,left top,right top,right top,right top,0 0;background-size:50px 45px,90px 45px,130px 45px,50px 30px,50px 45px,50px 60px,100%;background-repeat:no-repeat,no-repeat}.weather34darkbrowser[url]:after{content:attr(url);color:#aaa;font-size:10px;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 50px 0 90px;border-radius:3px;background:rgba(97, 106, 114, 0.3);height:20px;box-sizing:border-box}
 blue{color:#01a4b4}orange{color:#009bb4}orange1{position:relative;color:#009bb4;margin:0 auto;text-align:center;margin-left:5%;font-size:1.1rem}green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#CC0}purple{color:#916392}

.temperaturecontainer1{position:relative;left:5px;margin-top:0px}
.temperaturecontainer2{position:relative;left:5px;margin-top:0px}
.temperaturetoday0,.temperaturetoday10,.temperaturetoday18,.temperaturetoday24,.temperaturetoday30{font-family:weathertext2,Arial,Helvetica,system;width:5rem;height:1.5rem;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;display:flex;font-size:.9rem;padding-top:2px;color:#fff;border-bottom:5px solid rgba(56,56,60,1);align-items:center;justify-content:center;border-radius:3px;margin-bottom:10px;}
.temperaturecaution,.temperaturetrend,.temperaturetrend1{position:absolute;font-size:1rem}
.temperaturetoday0{background:rgba(68, 166, 181, 1.000)} .temperaturetoday10{background:rgba(144, 177, 42, 1.000)}.temperaturetoday18{background:rgba(230, 161, 65, 1.000)}.temperaturetoday24{background:rgba(255, 124, 57, 1.000)}.temperaturetoday30{background:rgba(211, 93, 78, 1.000)}
.temperaturetrend{margin-left:67px;margin-top:-38px;z-index:1;color:#fff;font-size:.65rem;width:70px;text-align:center;}
.temperaturetrend1{margin-left:67px;margin-top:-38px;z-index:1;color:#fff;font-size:.65rem;width:70px;text-align:center;}
smalluvunit{font-size:.65rem;font-family:Arial,Helvetica,system;}
.w34convertrain{position:relative;font-size:.5em;top:10px;color:#c0c0c0;margin-left:5px}

.hitempy{position:relative;background:rgba(61, 64, 66, 0.5);color:#aaa;width:40px;padding:1px;-webit-border-radius:2px;border-radius:2px;
margin-top:-40px;margin-left:130px;padding-left:3px;line-height:11px;font-size:8px}
.actualt{position:relative;left:0px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74, 99, 111, 0.1);
padding:5px;font-family:Arial, Helvetica, sans-serif;width:120px;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;
align-items:center;justify-content:center;margin-bottom:10px;top:0;text-align:center;}



</style>
<div class="weather34darkbrowser" url="Barometer Almanac"></div>

<main class="grid">
  <article>
   <div class=actualt>&nbsp;Barometer Today </div>
   <div class="temperaturecontainer1">

			  <?php
	////pressure max today
	if ($weather["thb0seapressmmax"]>=0)  {
	echo "<div class='temperaturetoday24'>",$weather["barometer_max"] . "</value>";}
	echo "<smalluvunit>".$weather["barometer_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Max</b></span><br><?php echo $weather["thb0seapressmaxtime"];?></span></div>
	</div>
<div class="temperaturecontainer2">
 <?php
	//pressure min today
	if ($weather["barometer_min"]>=0)  {
	echo "<div class='temperaturetoday0'>",$weather["barometer_min"] . "</value>";}

	echo "<smalluvunit>".$weather["barometer_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Min</b></span><br><?php echo $weather["thb0seapressmintime"];?></span></div>
</article>

 <article>
   <div class=actualt>&nbsp;Barometer Yesterday </div>
   <div class="temperaturecontainer1">

			  <?php
	////pressure max yesterday
	if ($weather["thb0seapressydmax"]>=0)  {
	echo "<div class='temperaturetoday24'>",$weather["thb0seapressydmax"] . "</value>";}
	echo "<smalluvunit>".$weather["barometer_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Max</b></span><br> <?php echo $weather["thb0seapressydmaxtime"];?></span></div>
			</div>


<div class="temperaturecontainer2">
 <?php
	//pressure min yesterday
	if ($weather["thb0seapressydmin"]>=0)  {
	echo "<div class='temperaturetoday0'>",$weather["thb0seapressydmin"] . "</value>";}

	echo "<smalluvunit>".$weather["barometer_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Min</b></span><br> <?php echo $weather["thb0seapressydmintime"];?></span></div>

</article>



  <article>
  <div class=actualt>&nbsp;Barometer <?php echo date('F Y')?> </div>
   <div class="temperaturecontainer1">
  <?php
	////pressure max month
	if ($weather["thb0seapressmmax"]>=0)  {
	echo "<div class='temperaturetoday24'>",$weather["thb0seapressmmax"] . "</value>";}
	echo "<smalluvunit>".$weather["barometer_units"]."</smalluvunit>"
	?> </div>
    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Max</b></span><br> <?php echo $weather["thb0seapressmonthmaxtime"];?></span>
    </div>
	</div>
<div class="temperaturecontainer2">
   <?php
	//pressure min month
	if ($weather["thb0seapressmmin"]>=0)  {
	echo "<div class='temperaturetoday0'>",$weather["thb0seapressmmin"] . "</value>";}
	echo "<smalluvunit>".$weather["barometer_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Min</b></span><br> <?php echo $weather["thb0seapressmonthmintime"];?></span>
</div>	</div>
</article>


   <article>
   <div class=actualt>&nbsp;Barometer <?php echo date('Y')?> </div>
   <div class="temperaturecontainer1">

			  <?php
	////pressure max year
	if ($weather["thb0seapressymax"]>=0)  {
	echo "<div class='temperaturetoday24'>",$weather["thb0seapressymax"] . "</value>";}
	echo "<smalluvunit>".$weather["barometer_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend1"><span style='color:rgba(255, 124, 57, 1.000)'><b>Max</b></span><br> <?php echo $weather["thb0seapressyearmaxtime"];?></span></div>
			</div>


<div class="temperaturecontainer2">
 <?php
	//pressure min year
	if ($weather["thb0seapressymin"]>=0)  {
	echo "<div class='temperaturetoday0'>",$weather["thb0seapressymin"] . "</value>";}

	echo "<smalluvunit>".$weather["barometer_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend1"><span style='color:rgba(68, 166, 181, 1.000)'><b>Min</b></span><br> <?php echo $weather["thb0seapressyearmintime"];?></span></div>

</article>


<article>
   <div class=actualt>&nbsp;Barometer All-Time </div>
   <div class="temperaturecontainer1">

			  <?php
	////pressure max year
	if ($weather["thb0seapressamax"]>=0)  {
	echo "<div class='temperaturetoday24'>",$weather["thb0seapressamax"] . "</value>";}
	echo "<smalluvunit>".$weather["barometer_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend1"><span style='color:rgba(255, 124, 57, 1.000)'><b>Max</b></span><br><?php echo $weather["thb0seapressamaxtime"];?></span></div>
			</div>


<div class="temperaturecontainer2">
 <?php
	//pressure min year
	if ($weather["thb0seapressamin"]>=0)  {
	echo "<div class='temperaturetoday0'>",$weather["thb0seapressamin"] . "</value>";}

	echo "<smalluvunit>".$weather["barometer_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend1"><span style='color:rgba(68, 166, 181, 1.000)'><b>Min</b></span><br><?php echo $weather["thb0seapressamintime"];?></span></div>

</article>
  </main>
  <main class="grid1">
  <articlegraph>
  <div class=actualt><?php echo date('Y')?> Barometer Chart</div>
  <iframe  src="<?php echo $chartsource ;?>/yearlybarometermedium.php" frameborder="0" scrolling="no" width="100%" height="205px"></iframe>

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

   </main>
