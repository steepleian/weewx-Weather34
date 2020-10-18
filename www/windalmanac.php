<?php
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include('w34CombinedData.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 Windspeed Almanac Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@font-face {
	font-family: weathertext2;
	src: url(css/fonts/verbatim-regular.woff) format("woff"), url(fonts/verbatim-regular.woff2) format("woff2"), url(fonts/verbatim-regular.ttf) format("truetype")
}

html,
body {
	font-size: 13px;
	font-family: "weathertext2", Helvetica, Arial, sans-serif;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}

.grid {
	display: grid;
	grid-template-columns: repeat(auto-fill, minmax(140px, 2fr));
	grid-gap: 5px;
	align-items: stretch;
	color: #f5f7fc;
}

.grid>article {
	border: 1px solid rgba(245, 247, 252, .02);
	box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.6);
	padding: 5px;
	font-size: 0.8em;
	-webkit-border-radius: 4px;
	border-radius: 4px;
	background: 0;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}

.grid1 {
	display: grid;
	grid-template-columns: repeat(auto-fill, minmax(100%, 1fr));
	grid-gap: 5px;
	align-items: stretch;
	color: #f5f7fc;
	margin-top: 5px
}

.grid1>articlegraph {
	border: 1px solid rgba(245, 247, 252, .02);
	box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.6);
	padding: 5px;
	font-size: 0.8em;
	-webkit-border-radius: 4px;
	border-radius: 4px;
	background: 0;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	height: 240px
}

.weather34chart-btn.close:after,
.weather34chart-btn.close:before {
	color: #ccc;
	position: absolute;
	font-size: 14px;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: 600
}

.weather34browser-header {
	flex-basis: auto;
	height: 35px;
	background: #ebebeb;
	background: 0;
	border-bottom: 0;
	display: flex;
	margin-top: -20px;
	width: 100%;
	-webkit-border-top-left-radius: 5px;
	-webkit-border-top-right-radius: 5px;
	-moz-border-radius-topleft: 5px;
	-moz-border-radius-topright: 5px;
	border-top-left-radius: 5px;
	border-top-right-radius: 5px
}

.weather34browser-footer {
	flex-basis: auto;
	height: 35px;
	background: #ebebeb;
	background: rgba(56, 56, 60, 1);
	border-bottom: 0;
	display: flex;
	bottom: -20px;
	width: 97.4%;
	-webkit-border-bottom-right-radius: 5px;
	-webkit-border-bottom-left-radius: 5px;
	-moz-border-radius-bottomright: 5px;
	-moz-border-radius-bottomleft: 5px;
	border-bottom-right-radius: 5px;
	border-bottom-left-radius: 5px
}

.weather34chart-btns {
	position: absolute;
	height: 35px;
	display: inline-block;
	padding: 0 10px;
	line-height: 38px;
	width: 55px;
	flex-basis: auto;
	top: 5px
}

.weather34chart-btn {
	width: 14px;
	height: 14px;
	border: 1px solid rgba(0, 0, 0, .15);
	border-radius: 6px;
	display: inline-block;
	margin: 1px
}

.weather34chart-btn.close {
	background-color: rgba(255, 124, 57, 1.000)
}

.weather34chart-btn.close:before {
	content: "x";
	margin-top: -14px;
	margin-left: 2px
}

.weather34chart-btn.close:after {
	content: "close window";
	margin-top: -13px;
	margin-left: 15px;
	width: 300px
}

a {
	color: #aaa;
	text-decoration: none
}

.weather34darkbrowser {
	position: relative;
	background: 0;
	width: 100%;
	max-height: 30px;
	margin: auto;
	margin-top: -15px;
	margin-left: 0px;
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
	padding-top: 45px;
	background-image: radial-gradient(circle, #EB7061 6px, transparent 8px), radial-gradient(circle, #F5D160 6px, transparent 8px), radial-gradient(circle, #81D982 6px, transparent 8px), radial-gradient(circle, rgba(97, 106, 114, 1) 2px, transparent 2px), radial-gradient(circle, rgba(97, 106, 114, 1) 2px, transparent 2px), radial-gradient(circle, rgba(97, 106, 114, 1) 2px, transparent 2px), linear-gradient(to bottom, rgba(59, 60, 63, 0.4) 40px, transparent 0);
	background-position: left top, left top, left top, right top, right top, right top, 0 0;
	background-size: 50px 45px, 90px 45px, 130px 45px, 50px 30px, 50px 45px, 50px 60px, 100%;
	background-repeat: no-repeat, no-repeat
}

.weather34darkbrowser[url]:after {
	content: attr(url);
	color: #aaa;
	font-size: 10px;
	position: absolute;
	left: 0;
	right: 0;
	top: 0;
	padding: 4px 15px;
	margin: 11px 50px 0 90px;
	border-radius: 3px;
	background: rgba(97, 106, 114, 0.3);
	height: 20px;
	box-sizing: border-box
}

blue {
	color: #01a4b4
}

orange {
	color: #009bb4
}

orange1 {
	position: relative;
	color: #009bb4;
	margin: 0 auto;
	text-align: center;
	margin-left: 5%;
	font-size: 1.1rem
}

green {
	color: #aaa
}

red {
	color: #f37867
}

red6 {
	color: #d65b4a
}

value {
	color: #fff
}

yellow {
	color: #CC0
}

purple {
	color: #916392
}

.windcontainer1 {
	left: 5px;
	top: 0
}

.windtoday,
.windtoday10,
.windtoday30,
.windtoday40,
.windtoday60 {
	font-family: weathertext2, Arial, Helvetica, system;
	width: 4rem;
	height: 1.25rem;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	-o-border-radius: 3px;
	font-size: 1rem;
	padding-top: 5px;
	color: #fff;
	border-bottom: 13px solid rgba(56, 56, 60, 1);
	align-items: center;
	justify-content: center;
	text-align: center;
	border-radius: 3px;
}

.windcaution,
.windtrend {
	position: absolute;
	font-size: 1rem
}

.windtoday {
	background: #9aba2f
}

.windtoday10 {
	background: rgba(230, 161, 65, 1)
}

.windtoday30 {
	background: rgba(255, 124, 57, .8)
}

.windtoday40 {
	background: rgba(255, 124, 57, 0.8)
}

.windtoday60 {
	background: rgba(211, 93, 78, 1.000)
}

.windcaution {
	margin-left: 120px;
	margin-top: 112px;
	font-family: Arial, Helvetica, system
}

.windtrend {
	margin-left: 135px;
	margin-top: 48px;
	z-index: 1;
	color: #fff
}

smalluvunit {
	font-size: .55rem;
	font-family: Arial, Helvetica, system;
}

.almanac {
	font-size: 1.25em;
	margin-top: 30px;
	color: rgba(56, 56, 60, 1.000);
	width: 12em
}

metricsblue {
	color: #44a6b5;
	font-family: "weathertext2", Helvetica, Arial, sans-serif;
	background: rgba(86, 95, 103, 0.5);
	-webkit-border-radius: 2px;
	border-radius: 2px;
	align-items: center;
	justify-content: center;
	font-size: .9em;
	left: 10px;
	padding: 0 3px 0 3px;
}

.w34convertrain {
	position: relative;
	font-size: .7em;
	top: 4px;
	color: #c0c0c0;
	margin-left: 5px;
	margin-top: -2px
}

.lotemp {
	color: #aaa;
	font-size: 0.65rem;
}

.hitempy {
	position: relative;
	background: rgba(61, 64, 66, 0.5);
	color: #aaa;
	width: 70px;
	padding: 1px;
	-webit-border-radius: 2px;
	border-radius: 2px;
	margin-top: -34px;
	margin-left: 52px;
	padding-left: 3px;
	line-height: 11px;
	font-size: 9px
}

.actualt {
	position: relative;
	left: 0px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	-o-border-radius: 3px;
	border-radius: 3px;
	background: rgba(74, 99, 111, 0.1);
	padding: 5px;
	font-family: Arial, Helvetica, sans-serif;
	width: 120px;
	height: 0.8em;
	font-size: 0.8rem;
	padding-top: 2px;
	color: #aaa;
	align-items: center;
	justify-content: center;
	margin-bottom: 10px;
	top: 0;
	text-align: center;
}

.actualw {
	position: relative;
	left: 5px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	-o-border-radius: 3px;
	border-radius: 3px;
	background: rgba(74, 99, 111, 0.1);
	padding: 5px;
	font-family: Arial, Helvetica, sans-serif;
	width: 120px;
	height: 0.8em;
	font-size: 0.8rem;
	padding-top: 2px;
	color: #aaa;
	align-items: center;
	justify-content: center;
	margin-bottom: 10px;
	top: 0
}

.svgimage {
	background: rgba(0, 155, 171, 1.000);
	-webit-border-radius: 2px;
	border-radius: 2px;
}

.actual {
	position: relative;
	left: 5px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	-o-border-radius: 3px;
	border-radius: 3px;
	padding: 5px;
	font-family: Arial, Helvetica, sans-serif;
	width: 95%;
	height: 0.8em;
	font-size: 0.8rem;
	padding-top: 2px;
	color: #aaa;
	align-items: center;
	justify-content: center;
	margin-bottom: 10px;
	top: 0
}
</style>
<div class="weather34darkbrowser" url="Windspeed Almanac"></div>

<main class="grid">
  <article>
   <div class=actualt>Max Today </div>
   <?php
	if ($weather["wind_units"]=='kts'){$weather["wind_units"]="kn";}
	// wind day km/h
	if ($weather["wind_units"]=='km/h' && $weather["winddmax"]>=60)  {
	echo "<div class='windtoday60'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["winddmax"]>=40)  {
	echo "<div class='windtoday40'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["winddmax"]>=30)  {
	echo "<div class='windtoday30'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["winddmax"]>=10)  {
	echo "<div class='windtoday10'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["winddmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["winddmax"] . "</value>";}

	//mph
	if ($weather["wind_units"]=='mph' && $weather["winddmax"]>=37.2)  {
	echo "<div class='windtoday60'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["winddmax"]>=24.85)  {
	echo "<div class='windtoday40'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["winddmax"]>=18.64)  {
	echo "<div class='windtoday30'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["winddmax"]>=6.2)  {
	echo "<div class='windtoday10'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["winddmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["winddmax"] . "</value>";}

	//kts
	if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=32.40)  {
	echo "<div class='windtoday60'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=21.60)  {
	echo "<div class='windtoday40'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=16.20)  {
	echo "<div class='windtoday30'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=5.40)  {
	echo "<div class='windtoday10'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["winddmax"] . "</value>";}

	//ms
	if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=16.66)  {
	echo "<div class='windtoday60'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=11.11)  {
	echo "<div class='windtoday40'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=8.33)  {
	echo "<div class='windtoday30'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=2.77)  {
	echo "<div class='windtoday10'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windydmax"] . "</value>";}
	echo "<smalluvunit>".$weather["wind_units"]."</smalluvunit>";

?>
<div></div>

<div class='w34convertrain'>
<?php //convert rain
if($weather["wind_units"] =='km/h'){echo number_format($weather["winddmax"]*0.621371,1)." <smalluvunit>mph</smalluvunit";}
if($weather["wind_units"] =='mph'){ echo number_format($weather["winddmax"]*1.60934,1)."<smalluvunit>km/h</smalluvunit>";}
if($weather["wind_units"] =='m/s'){ echo number_format($weather["winddmax"]*3.5999988862317131577,1)."<smalluvunit>km/h</smalluvunit>";}
if($weather["wind_units"] =='kn'){ echo number_format($weather["winddmax"]*1.8519994254280931489,1)."<smalluvunit>km/h</smalluvunit>";}
?>
</div>

<div class="hitempy">
Max Recorded <blue><?php echo $weather["winddmaxtime"];?></blue></div>
</smalluvunit>
</article>

 <article>
   <div class=actualt>Max Yesterday </div>
   <?php
	// wind yesterday km/h
	if ($weather["wind_units"]=='km/h' && $weather["windydmax"]>=60)  {
	echo "<div class='windtoday60'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windydmax"]>=40)  {
	echo "<div class='windtoday40'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windydmax"]>=30)  {
	echo "<div class='windtoday30'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windydmax"]>=10)  {
	echo "<div class='windtoday10'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windydmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windydmax"] . "</value>";}

	//mph
	if ($weather["wind_units"]=='mph' && $weather["windydmax"]>=37.2)  {
	echo "<div class='windtoday60'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windydmax"]>=24.85)  {
	echo "<div class='windtoday40'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windydmax"]>=18.64)  {
	echo "<div class='windtoday30'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windydmax"]>=6.2)  {
	echo "<div class='windtoday10'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windydmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windydmax"] . "</value>";}
	
	//kts
	if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=32.40)  {
	echo "<div class='windtoday60'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=21.60)  {
	echo "<div class='windtoday40'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=16.20)  {
	echo "<div class='windtoday30'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=5.40)  {
	echo "<div class='windtoday10'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["winddmax"] . "</value>";}

	//ms
	if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=16.66)  {
	echo "<div class='windtoday60'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=11.11)  {
	echo "<div class='windtoday40'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=8.33)  {
	echo "<div class='windtoday30'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=2.77)  {
	echo "<div class='windtoday10'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windydmax"] . "</value>";}
	echo "<smalluvunit>".$weather["wind_units"]."</smalluvunit>";

?>
<div></div>
<div class='w34convertrain'>
<?php //convert rain
if($weather["wind_units"] =='km/h'){echo number_format($weather["windydmax"]*0.621371,1)." <smalluvunit>mph</smalluvunit";}
if($weather["wind_units"] =='mph'){ echo number_format($weather["windydmax"]*1.60934,1)."<smalluvunit>km/h</smalluvunit>";}
if($weather["wind_units"] =='m/s'){ echo number_format($weather["windydmax"]*3.5999988862317131577,1)."<smalluvunit>km/h</smalluvunit>";}
if($weather["wind_units"] =='kn'){ echo number_format($weather["windydmax"]*1.8519994254280931489,1)."<smalluvunit>km/h</smalluvunit>";}
?>
</div>

<div class="hitempy">
Max Recorded <br><blue><?php echo $weather["windydmaxtime"];?></blue></div>

</article>



  <article>
  <div class=actualt>Max <?php echo date('F Y')?> </div>
    <?php
	// wind month km/h
	if ($weather["wind_units"]=='km/h' && $weather["windmmax"]>=60)  {
	echo "<div class='windtoday60'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windmmax"]>=40)  {
	echo "<div class='windtoday40'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windmmax"]>=30)  {
	echo "<div class='windtoday30'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windmmax"]>=10)  {
	echo "<div class='windtoday10'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windmmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windmmax"] . "</value>";}

	//mph
	if ($weather["wind_units"]=='mph' && $weather["windmmax"]>=37.2)  {
	echo "<div class='windtoday60'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windmmax"]>=24.85)  {
	echo "<div class='windtoday40'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windmmax"]>=18.64)  {
	echo "<div class='windtoday30'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windmmax"]>=6.2)  {
	echo "<div class='windtoday10'>",$weather["windmmax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windmmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windmmax"] . "</value>";}

	//kts
	if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=32.40)  {
	echo "<div class='windtoday60'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=21.60)  {
	echo "<div class='windtoday40'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=16.20)  {
	echo "<div class='windtoday30'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=5.40)  {
	echo "<div class='windtoday10'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["winddmax"] . "</value>";}

	//ms
	if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=16.66)  {
	echo "<div class='windtoday60'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=11.11)  {
	echo "<div class='windtoday40'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=8.33)  {
	echo "<div class='windtoday30'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=2.77)  {
	echo "<div class='windtoday10'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windydmax"] . "</value>";}
	echo "<smalluvunit>".$weather["wind_units"]."</smalluvunit>";

?>
<div></div>
<div class='w34convertrain'>
<?php //convert rain
if($weather["wind_units"] =='km/h'){echo number_format($weather["windmmax"]*0.621371,1)." <smalluvunit>mph</smalluvunit";}
if($weather["wind_units"] =='mph'){ echo number_format($weather["windmmax"]*1.60934,1)."<smalluvunit>km/h</smalluvunit>";}
if($weather["wind_units"] =='m/s'){ echo number_format($weather["windmmax"]*3.5999988862317131577,1)."<smalluvunit>km/h</smalluvunit>";}
if($weather["wind_units"] =='kn'){ echo number_format($weather["windmmax"]*1.8519994254280931489,1)."<smalluvunit>km/h</smalluvunit>";}
?>
</div>

<div class="hitempy">
Max Recorded <br><blue><?php echo $weather["windmmaxtime"];?></blue></div>

</article>


   <article>
   <div class=actualt>Max <?php echo date('Y')?> </div>
   <?php
	// wind year km/h
	if ($weather["wind_units"]=='km/h' && $weather["windymax"]>=60)  {
	echo "<div class='windtoday60'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windymax"]>=40)  {
	echo "<div class='windtoday40'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windymax"]>=30)  {
	echo "<div class='windtoday30'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windymax"]>=10)  {
	echo "<div class='windtoday10'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windymax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windymax"] . "</value>";}

	//mph
	if ($weather["wind_units"]=='mph' && $weather["windymax"]>=37.2)  {
	echo "<div class='windtoday60'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windymax"]>=24.85)  {
	echo "<div class='windtoday40'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windymax"]>=18.64)  {
	echo "<div class='windtoday30'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windymax"]>=6.2)  {
	echo "<div class='windtoday10'>",$weather["windymax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windymax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windymax"] . "</value>";}

	//kts
	if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=32.40)  {
	echo "<div class='windtoday60'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=21.60)  {
	echo "<div class='windtoday40'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=16.20)  {
	echo "<div class='windtoday30'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=5.40)  {
	echo "<div class='windtoday10'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["winddmax"] . "</value>";}

	//ms
	if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=16.66)  {
	echo "<div class='windtoday60'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=11.11)  {
	echo "<div class='windtoday40'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=8.33)  {
	echo "<div class='windtoday30'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=2.77)  {
	echo "<div class='windtoday10'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windydmax"] . "</value>";}
	echo "<smalluvunit>".$weather["wind_units"]."</smalluvunit>";

?>
<div></div>
<div class='w34convertrain'>
<?php //convert rain
if($weather["wind_units"] =='km/h'){echo number_format($weather["windymax"]*0.621371,1)." <smalluvunit>mph</smalluvunit";}
if($weather["wind_units"] =='mph'){ echo number_format($weather["windymax"]*1.60934,1)."<smalluvunit>km/h</smalluvunit>";}
if($weather["wind_units"] =='m/s'){ echo number_format($weather["windymax"]*3.5999988862317131577,1)."<smalluvunit>km/h</smalluvunit>";}
if($weather["wind_units"] =='kn'){ echo number_format($weather["windymax"]*1.8519994254280931489,1)."<smalluvunit>km/h</smalluvunit>";}
?>
</div>

<div class="hitempy">
Max Recorded <br><blue><?php echo $weather["windymaxtime"];?></blue></div>

</article>



 <article>
   <div class=actualt>Max All-Time</div>
   <?php
	// wind year km/h
	if ($weather["wind_units"]=='km/h' && $weather["windymax"]>=60)  {
	echo "<div class='windtoday60'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windamax"]>=40)  {
	echo "<div class='windtoday40'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windamax"]>=30)  {
	echo "<div class='windtoday30'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windamax"]>=10)  {
	echo "<div class='windtoday10'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='km/h' && $weather["windamax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windamax"] . "</value>";}

	//mph
	if ($weather["wind_units"]=='mph' && $weather["windamax"]>=37.2)  {
	echo "<div class='windtoday60'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windamax"]>=24.85)  {
	echo "<div class='windtoday40'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windamax"]>=18.64)  {
	echo "<div class='windtoday30'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windamax"]>=6.2)  {
	echo "<div class='windtoday10'>",$weather["windamax"] . "</value>";}
	else if ($weather["wind_units"]=='mph' && $weather["windamax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windamax"] . "</value>";}

	//kts
	if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=32.40)  {
	echo "<div class='windtoday60'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=21.60)  {
	echo "<div class='windtoday40'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=16.20)  {
	echo "<div class='windtoday30'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=5.40)  {
	echo "<div class='windtoday10'>",$weather["winddmax"] . "</value>";}
	else if ($weather["wind_units"]=='kn' && $weather["winddmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["winddmax"] . "</value>";}

	//ms
	if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=16.66)  {
	echo "<div class='windtoday60'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=11.11)  {
	echo "<div class='windtoday40'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=8.33)  {
	echo "<div class='windtoday30'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=2.77)  {
	echo "<div class='windtoday10'>",$weather["windydmax"] . "</value>";}
	else if ($weather["wind_units"]=='m/s' && $weather["windydmax"]>=-0) {
	echo "<div class='windtoday'>",$weather["windydmax"] . "</value>";}
	echo "<smalluvunit>".$weather["wind_units"]."</smalluvunit>";

?>
<div></div>
<div class='w34convertrain'>
<?php //convert rain
if($weather["wind_units"] =='km/h'){echo number_format($weather["windamax"]*0.621371,1)." <smalluvunit>mph</smalluvunit";}
if($weather["wind_units"] =='mph'){ echo number_format($weather["windamax"]*1.60934,1)."<smalluvunit>km/h</smalluvunit>";}
if($weather["wind_units"] =='m/s'){ echo number_format($weather["windamax"]*3.5999988862317131577,1)."<smalluvunit>km/h</smalluvunit>";}
if($weather["wind_units"] =='kn'){ echo number_format($weather["windamax"]*1.8519994254280931489,1)."<smalluvunit>km/h</smalluvunit>";}
?>
</div>

<div class="hitempy">
Max Recorded <br><blue><?php echo $weather["windamaxtime"];?></blue></div>

</article>


</main>

 <main class="grid1">

  <articlegraph>
  <div class=actualt><?php echo date('Y');?> Wind (<?php echo $weather["wind_units"]?>)</div>
  <iframe  src="<?php echo $chartsource ;?>/yearlywindspeedgustmedium.php" frameborder="0" scrolling="no" width="100%" height="210px"></iframe>

  </articlegraph>



   <articlegraph style="height:30px">
  <div class="lotemp">
  <?php echo $info?>
<a href="https://canvasjs.com" title="https://canvasjs.com" target="_blank" style="font-size:9px;"> Charts rendered and compiled using <?php echo $creditschart ;?> </a></span>
  </div>

  <div class="lotemp">
  <?php echo $info?> <a href="https://weather34.com" title="weather34.com" target="_blank" style="font-size:9px;">CSS/SVG/PHP scripts were developed by weather34.com  for use in the weather34 template &copy; 2015-<?php echo date('Y');?>
  </a></div>

  </articlegraph>

</main>
