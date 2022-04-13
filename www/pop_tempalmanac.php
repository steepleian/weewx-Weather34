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
include('w34CombinedData.php');include('settings1.php');
if ($theme === "dark") {
    echo '<style>@font-face{font-family: weathertext2; src: url(css/fonts/verbatim-regular.woff) format("woff"), url(fonts/verbatim-regular.woff2) format("woff2"), url(fonts/verbatim-regular.ttf) format("truetype");}html,body{font-size: 13px; font-family: "weathertext2", Helvetica, Arial, sans-serif; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; background: rgba(40, 45, 52,.4);}.grid{display: grid; grid-template-columns: repeat(auto-fill, minmax(140px, 1fr)); grid-gap: 5px; align-items: stretch; color: #f5f7fc; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;}.grid > article{border: 1px solid #212428; box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.3); padding: 4px; font-size: 0.8em; -webkit-border-radius: 4px; border-radius: 4px; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;}.grid1{display: grid; grid-template-columns: repeat(auto-fill, minmax(100%, 1fr)); grid-gap: 5px; color: #f5f7fc;}.grid1 > articlegraph{border: 1px solid rgba(245, 247, 252, 0.02); box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.6); padding: 5px; font-size: 0.8em; -webkit-border-radius: 4px; border-radius: 4px; background: 0; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; height: 225px;}/* unvisited link */a:link{color: white;}/* visited link */a:visited{color: white;}/* mouse over link */a:hover{color: white;}/* selected link */a:active{color: white;}.weather34darkbrowser{position: relative; background: 0; width: 97%; height: 30px; margin: auto; margin-top: -5px; margin-left: 0px; border-top-left-radius: 5px; border-top-right-radius: 5px; padding-top: 10px;}.weather34darkbrowser[url]:after{content: attr(url); color: white; font-size: 14px; text-align: center; position: absolute; left: 0; right: 0; top: 0; padding: 4px 15px; margin: 11px 10px 0 auto; font-family: arial; height: 20px;}blue{color: #01a4b4;}orange{color: #009bb4;}orange1{position: relative; color: #009bb4; margin: 0 auto; text-align: center; margin-left: 5%; font-size: 1.1rem;}green{color: #aaa;}red{color: #f37867;}red6{color: #d65b4a;}value{color: #fff;}yellow{color: #cc0;}purple{color: #916392;}.temperaturecontainer1{position: relative; left: 0px; margin-top: 0px;}.temperaturecontainer2{position: relative; left: 0px; margin-top: 0px;}.temperaturetoday0,.temperaturetoday10,.temperaturetoday18,.temperaturetoday24,.temperaturetoday30{font-family: weathertext2, Arial, Helvetica, system; width: 5rem; height: 1.5rem; -webkit-border-radius: 3px; -moz-border-radius: 3px; -o-border-radius: 3px; display: flex; font-size: 0.9rem; padding-top: 2px; color: #fff; border-bottom: 7px solid #555555; align-items: center; justify-content: center; border-radius: 3px; margin-bottom: 10px;}.temperaturecaution,.temperaturetrend,.temperaturetrend1{position: absolute; font-size: 1rem;}.temperaturetoday0{background: rgba(68, 166, 181, 1);}.temperaturetoday10{background: rgba(144, 177, 42, 1);}.temperaturetoday18{background: rgba(230, 161, 65, 1);}.temperaturetoday24{background: rgba(255, 124, 57, 1);}.temperaturetoday30{background: rgba(211, 93, 78, 1);}.temperaturetrend{margin-left: 67px; margin-top: -38px; z-index: 1; color: white; font-size: 0.65rem; width: 70px; text-align: center;}.temperaturetrend1{margin-left: 67px; margin-top: -38px; z-index: 1; color: #fff; font-size: 0.65rem; width: 70px; text-align: center;}smalluvunit{font-size: 0.65rem; font-family: Arial, Helvetica, system;}.w34convertrain{position: relative; font-size: 0.5em; top: 10px; color: #c0c0c0; margin-left: 5px;}.hitempy{position: relative; background: rgba(61, 64, 66, 0.5); color: #aaa; width: 40px; padding: 1px; -webit-border-radius: 2px; border-radius: 2px; margin-top: -40px; margin-left: 130px; padding-left: 3px; line-height: 11px; font-size: 8px;}.actualt{position: relative; left: 0px; -webkit-border-radius: 3px; -moz-border-radius: 3px; -o-border-radius: 3px; border-radius: 3px; background: #555555; padding: 5px; font-family: Arial, Helvetica, sans-serif; width: max-content; height: 0.8em; font-size: 0.8rem; padding-top: 2px; color: white; align-items: center; justify-content: center; margin-bottom: 10px; top: 0; text-align: center;}
    </style>';
} elseif ($theme === "light") {
    echo '<style>@font-face{font-family: weathertext2; src: url(css/fonts/verbatim-regular.woff) format("woff"), url(fonts/verbatim-regular.woff2) format("woff2"), url(fonts/verbatim-regular.ttf) format("truetype");}html,body{font-size: 13px; font-family: "weathertext2", Helvetica, Arial, sans-serif; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; background-color: white;}.grid{display: grid; grid-template-columns: repeat(auto-fill, minmax(140px, 1fr)); grid-gap: 5px; align-items: stretch; color: #f5f7fc; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;}.grid > article{border: 1px solid rgba(245, 247, 252, 0.02); box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.6); padding: 4px; font-size: 0.8em; -webkit-border-radius: 4px; border-radius: 4px; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;}.grid1{display: grid; grid-template-columns: repeat(auto-fill, minmax(100%, 1fr)); grid-gap: 5px; color: black;}.grid1 > articlegraph{border: 1px solid rgba(245, 247, 252, 0.02); box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.6); padding: 4px; font-size: 0.8em; -webkit-border-radius: 4px; border-radius: 4px; background: 0; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; height: 225px;}/* unvisited link */a:link{color: black;}/* visited link */a:visited{color: black;}/* mouse over link */a:hover{color: black;}/* selected link */a:active{color: black;}.weather34darkbrowser{position: relative; background: 0; width: 97%; height: 30px; margin: auto; margin-top: -5px; margin-left: 0px; border-top-left-radius: 5px; border-top-right-radius: 5px; padding-top: 10px;}.weather34darkbrowser[url]:after{content: attr(url); color: black; font-size: 14px; text-align: center; position: absolute; left: 0; right: 0; top: 0; padding: 4px 15px; margin: 11px 10px 0 auto; font-family: arial; height: 20px;}blue{color: #01a4b4;}orange{color: #009bb4;}orange1{position: relative; color: #009bb4; margin: 0 auto; text-align: center; margin-left: 5%; font-size: 1.1rem;}green{color: #aaa;}red{color: #f37867;}red6{color: #d65b4a;}value{color: #fff;}yellow{color: #cc0;}purple{color: #916392;}.temperaturecontainer1{position: relative; left: 0px; margin-top: 0px;}.temperaturecontainer2{position: relative; left: 0px; margin-top: 0px;}.temperaturetoday0,.temperaturetoday10,.temperaturetoday18,.temperaturetoday24,.temperaturetoday30{font-family: weathertext2, Arial, Helvetica, system; width: 5rem; height: 1.5rem; -webkit-border-radius: 3px; -moz-border-radius: 3px; -o-border-radius: 3px; display: flex; font-size: 0.9rem; padding-top: 2px; color: #fff; border-bottom: 7px solid #555555; align-items: center; justify-content: center; border-radius: 3px; margin-bottom: 10px;}.temperaturecaution,.temperaturetrend,.temperaturetrend1{position: absolute; font-size: 1rem;}.temperaturetoday0{background: rgba(68, 166, 181, 1);}.temperaturetoday10{background: rgba(144, 177, 42, 1);}.temperaturetoday18{background: rgba(230, 161, 65, 1);}.temperaturetoday24{background: rgba(255, 124, 57, 1);}.temperaturetoday30{background: rgba(211, 93, 78, 1);}.temperaturetrend{margin-left: 67px; margin-top: -38px; z-index: 1; color: black; font-size: 0.65rem; width: 70px; text-align: center;}.temperaturetrend1{margin-left: 67px; margin-top: -38px; z-index: 1; color: #fff; font-size: 0.65rem; width: 70px; text-align: center;}smalluvunit{font-size: 0.65rem; font-family: Arial, Helvetica, system;}.w34convertrain{position: relative; font-size: 0.5em; top: 10px; color: #c0c0c0; margin-left: 5px;}.hitempy{position: relative; background: rgba(61, 64, 66, 0.5); color: #aaa; width: 40px; padding: 1px; -webit-border-radius: 2px; border-radius: 2px; margin-top: -40px; margin-left: 130px; padding-left: 3px; line-height: 11px; font-size: 8px;}.actualt{position: relative; left: 0px; -webkit-border-radius: 3px; -moz-border-radius: 3px; -o-border-radius: 3px; border-radius: 3px; background: #555555; padding: 5px; font-family: Arial, Helvetica, sans-serif; width: max-content; height: 0.8em; font-size: 0.8rem; padding-top: 2px; color: white; align-items: center; justify-content: center; margin-bottom: 10px; top: 0; text-align: center;}
    </style>';
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 Temperature Almanac Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<main class="grid">
  <article>
   <div class=actualt>&nbsp;Today </div>
   <div class="temperaturecontainer1">

			  <?php
	////temp max today
	if ($weather["tempdmax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["tempdmax"] . "</value>";}
	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Temp Max</b></span><br><?php echo $weather["tempdmaxtime"];?></span></div>
	</div>	
<div class="temperaturecontainer2">
 <?php
	//temp min today
	if ($weather["tempdmin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["tempdmin"] . "</value>";}

	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Temp Min</b></span><br><?php echo $weather["tempdmintime"];?></span></div>
</div>  
  
   <div class="temperaturecontainer1">

			  <?php
	////dew max today
	if ($tempunit=='C' && $weather["dewmax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["dewmax"] . "</value>";}
	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Dew Max</b></span><br><?php echo $weather["dewmaxtime"];?></span></div>
	</div>
<div class="temperaturecontainer2">
 <?php
	//dew min today
	if ($weather["dewmin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["dewmin"] . "</value>";}

	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Dew Min</b></span><br><?php echo $weather["dewmintime"];?></span></div>
</div>
<div class="temperaturecontainer1">

			  <?php
	////humidity max today
	if ($weather["humidity_max"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["humidity_max"] . "</value>";}
	echo "<smalluvunit>%</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Hum Max</b></span><br><?php echo $weather["humidity_maxtime"];?></span></div>
</div>		
<div class="temperaturecontainer2">
 <?php
	//humidity min today
	if ($weather["humidity_min"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["humidity_min"] . "</value>";}

	echo "<smalluvunit>%</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Hum Min</b></span><br><?php echo $weather["humidity_mintime"];?></span></div>
</div>  
</article>

 <article>
   <div class=actualt>&nbsp;Yesterday </div>
   <div class="temperaturecontainer1">

			  <?php
	////temp max yesterday
	if ($tempunit=='C' && $weather["tempydmax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["tempydmax"] . "</value>";}
	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Temp Max</b></span><br><?php echo $weather["tempydmaxtime"];?></span></div>
	</div>
<div class="temperaturecontainer2">
 <?php
	//temp min yesterday
	if ($weather["tempydmin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["tempydmin"] . "</value>";}

	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Temp Min</b></span><br><?php echo $weather["tempydmintime"];?></span></div>
  </div>
  
   <div class="temperaturecontainer1">

			  <?php
	////dew max yesterday
	if ($tempunit=='C' && $weather["dewydmax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["dewydmax"] . "</value>";}
	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Dew Max</b></span><br><?php echo $weather["dewydmaxtime"];?></span></div>
	</div>
<div class="temperaturecontainer2">
 <?php
	//dew min yesterday
	if ($weather["dewydmin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["dewydmin"] . "</value>";}

	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Dew Min</b></span><br><?php echo $weather["dewydmintime"];?></span></div>
</div>
<div class="temperaturecontainer1">

			  <?php
	////humidity max yesterday
	if ($weather["humidity_ydmax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["humidity_ydmax"] . "</value>";}
	echo "<smalluvunit>%</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Hum Max</b></span><br><?php echo $weather["humidity_ydmaxtime"];?></span></div>
	</div>	
<div class="temperaturecontainer2">
 <?php
	//humidity min yesterday
	if ($weather["humidity_ydmin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["humidity_ydmin"] . "</value>";}

	echo "<smalluvunit>%</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Hum Min</b></span><br><?php echo $weather["humidity_ydmintime"];?></span></div>
</div>
</article>


  <article>
  <div class=actualt>&nbsp;<?php echo date('F Y')?> </div>
   <div class="temperaturecontainer1">

			  <?php
	////temp max month
	if ($tempunit=='C' && $weather["tempmmax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["tempmmax"] . "</value>";}
	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Temp Max</b></span><br><?php echo $weather["tempmmaxtime"];?></span></div>
	</div>
<div class="temperaturecontainer2">
 <?php
	//temp min month
	if ($weather["tempmmin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["tempmmin"] . "</value>";}

	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Temp Min</b></span><br><?php echo $weather["tempmmintime"];?></span></div>
  </div>
  
   <div class="temperaturecontainer1">

			  <?php
	////dew max month
	if ($tempunit=='C' && $weather["dewmmax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["dewmmax"] . "</value>";}
	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Dew Max</b></span><br><?php echo $weather["dewmmaxtime"];?></span></div>
	</div>
<div class="temperaturecontainer2">
 <?php
	//dew min month
	if ($weather["dewmmin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["dewmmin"] . "</value>";}

	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Dew Min</b></span><br><?php echo $weather["dewmmintime"];?></span></div>
</div>
<div class="temperaturecontainer1">

			  <?php
	////humidity max month
	if ($weather["humidity_mmax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["humidity_mmax"] . "</value>";}
	echo "<smalluvunit>%</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Hum Max</b></span><br><?php echo $weather["humidity_mmaxtime"];?></span></div>
	</div>	
<div class="temperaturecontainer2">
 <?php
	//humidity min month
	if ($weather["humidity_mmin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["humidity_mmin"] . "</value>";}

	echo "<smalluvunit>%</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Hum Min</b></span><br><?php echo $weather["humidity_mmintime"];?></span></div>
</div>
</article>


   <article>
   <div class=actualt>&nbsp;<?php echo date('Y')?> </div>
   <div class="temperaturecontainer1">

			  <?php
	////temp max year
	if ($tempunit=='C' && $weather["tempymax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["tempymax"] . "</value>";}
	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Temp Max</b></span><br><?php echo $weather["tempymaxtime"];?></span></div>
	</div>
<div class="temperaturecontainer2">
 <?php
	//temp min year
	if ($weather["tempymin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["tempymin"] . "</value>";}

	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Temp Min</b></span><br><?php echo $weather["tempymintime"];?></span></div>
  </div>
  
   <div class="temperaturecontainer1">

			  <?php
	////dew max year
	if ($tempunit=='C' && $weather["dewymax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["dewymax"] . "</value>";}
	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Dew Max</b></span><br><?php echo $weather["dewymaxtime"];?></span></div>
	</div>
<div class="temperaturecontainer2">
 <?php
	//dew min year
	if ($weather["dewymin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["dewymin"] . "</value>";}

	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Dew Min</b></span><br><?php echo $weather["dewymintime"];?></span></div>
</div>
<div class="temperaturecontainer1">

			  <?php
	////humidity max year
	if ($weather["humidity_ymax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["humidity_ymax"] . "</value>";}
	echo "<smalluvunit>%</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Hum Max</b></span><br><?php echo $weather["humidity_ymaxtime"];?></span></div>
	</div>	
<div class="temperaturecontainer2">
 <?php
	//humidity min year
	if ($weather["humidity_ymin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["humidity_ymin"] . "</value>";}

	echo "<smalluvunit>%</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Hum Min</b></span><br><?php echo $weather["humidity_ymintime"];?></span></div>
</div>
</article>


<article>
   <div class=actualt>&nbsp;All-Time </div>
   <div class="temperaturecontainer1">

			  <?php
	////temp max all
	if ($tempunit=='C' && $weather["tempamax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["tempamax"] . "</value>";}
	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Temp Max</b></span><br><?php echo $weather["tempamaxtime"];?></span></div>
	</div>
<div class="temperaturecontainer2">
 <?php
	//temp min all
	if ($weather["tempamin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["tempamin"] . "</value>";}

	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Temp Min</b></span><br><?php echo $weather["tempamintime"];?></span></div>
  </div>
  
   <div class="temperaturecontainer1">

			  <?php
	////dew max all
	if ($tempunit=='C' && $weather["dewamax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["dewamax"] . "</value>";}
	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Dew Max</b></span><br><?php echo $weather["dewamaxtime"];?></span></div>
	</div>
<div class="temperaturecontainer2">
 <?php
	//dew min all
	if ($weather["dewamin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["dewamin"] . "</value>";}

	echo "<smalluvunit>˚".$weather["temp_units"]."</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Dew Min</b></span><br><?php echo $weather["dewamintime"];?></span></div>
</div>
<div class="temperaturecontainer1">

			  <?php
	////humidity max all
	if ($weather["humidity_amax"]>=-50)  {
	echo "<div class='temperaturetoday24'>",$weather["humidity_amax"] . "</value>";}
	echo "<smalluvunit>%</smalluvunit>"
	?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Hum Max</b></span><br><?php echo $weather["humidity_amaxtime"];?></span></div>
	</div>	
<div class="temperaturecontainer2">
 <?php
	//humidity min all
	if ($weather["humidity_amin"]>=-50)  {
	echo "<div class='temperaturetoday0'>",$weather["humidity_amin"] . "</value>";}

	echo "<smalluvunit>%</smalluvunit>"
	?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Hum Min</b></span><br><?php echo $weather["humidity_amintime"];?></span></div>
</div>
</article>
</article>   
  </main>
  <main class="grid1">
  <articlegraph> 
     <iframe  src="w34highcharts/<?php echo $theme1?>-charts.html?chart='tempsmallplot'&span='yearly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" frameborder="0" scrolling="no" width="99.5%" height="100%"></iframe>   
  </articlegraph> 
<!--<articlegraph style="height:15px">  
 
  
    
  <div class="lotemp">
  <?php echo $info?> Adapted by Steepleian for the WeeWX Weather34 skin from the original CSS/SVG/PHP scripts by weather34.com &copy; 2015-<?php echo date('Y');?>
  </a></div>
   
  </articlegraph>//--> 
   </main>
