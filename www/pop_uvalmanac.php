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
    echo '<style>@font-face{font-family: weathertext2; src: url(css/fonts/verbatim-regular.woff) format("woff"), url(fonts/verbatim-regular.woff2) format("woff2"), url(fonts/verbatim-regular.ttf) format("truetype");}html,body{font-size: 13px; font-family: "weathertext2", Helvetica, Arial, sans-serif; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;}/* unvisited link */a:link{color: white;}/* visited link */a:visited{color: white;}/* mouse over link */a:hover{color: white;}/* selected link */a:active{color: white;}.grid{display: grid; grid-template-columns: repeat(auto-fill, minmax(140px, 2fr)); grid-gap: 10px; align-items: stretch; color: #f5f7fc; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;}.grid > article{border: 1px solid rgba(245, 247, 252, 0.02); box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.6); padding: 20px; font-size: 0.8em; -webkit-border-radius: 4px; border-radius: 4px; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; height: 90px;}.grid1{display: grid; grid-template-columns: repeat(auto-fill, minmax(100%, 1fr)); grid-gap: 5px; color: white;}.grid1 > articlegraph{border: 1px solid rgba(245, 247, 252, 0.02); box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.6); padding: 5px; font-size: 0.8em; -webkit-border-radius: 4px; border-radius: 4px; background: 0; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; height: 305px;}.weather34darkbrowser{position: relative; background: 0; width: 97%; height: 30px; margin: auto; margin-top: -5px; margin-left: 0px; border-top-left-radius: 5px; border-top-right-radius: 5px; padding-top: 10px;}.weather34darkbrowser[url]:after{content: attr(url); color: white; font-size: 14px; text-align: center; position: absolute; left: 0; right: 0; top: 0; padding: 4px 15px; margin: 11px 10px 0 auto; font-family: arial; height: 20px;}blue{color: #01a4b4;}orange{color: #009bb4;}orange1{color: rgba(255, 131, 47, 1);}green{color: #aaa;}red{color: #f37867;}red6{color: #d65b4a;}value{color: #fff;}yellow{color: #cc0;}purple{color: #916392;}.hitempyposx{position: relative; top: -90px; margin-left: 40px; margin-bottom: -30px;}.hitempypos{position: absolute; margin-top: -100px; margin-left: 40px; margin-bottom: 20px; display: block;}.hitempd{position: absolute; font-family: weathertext2, Arial, Helvetica, sans-serif; background: rgba(86, 95, 103, 0.3); color: #aaa; font-size: 0.7rem; width: 140px; padding: 0; margin-left: 30px; padding-left: 3px; align-items: center; justify-content: center; display: block; margin-top: 5px;}.hitempd1{position: absolute; font-family: weathertext2, Arial, Helvetica, sans-serif; background: rgba(86, 95, 103, 0.3); color: #aaa; font-size: 0.7rem; width: 140px; padding: 0; margin-left: 30px; padding-left: 3px; align-items: center; justify-content: center; display: block; margin-top: 40px; margin-bottom: 5px;}.uvmaxi3{position: absolute; left: -30px; color: rgba(0, 154, 171, 1); margin-top: -40px; font-size: 16px; width: 240px;}.uvmaxi3 span{color: #aaa;}.hitemp{color: #aaa; font-size: 0.7rem; display: inline;}.hitemp span{color: rgba(255, 124, 57, 1);}blue{color: rgba(0, 154, 171, 1);}.temperaturecontainer1{position: absolute; left: 20px; margin-top: -5px; margin-bottom: 20px;}.temperaturecontainer2{position: absolute; left: 20px; margin-top: 60px;}smalluvunit{font-size: 0.9rem; font-family: Arial, Helvetica, system;}.uvcontainer1{left: 70px; top: 0;}.uvtoday1,.uvtoday1-3,.uvtoday11,.uvtoday4-5,.uvtoday6-8,.uvtoday9-10{font-family: weathertext2, Arial, Helvetica, system; width: 5rem; height: 2.5rem; -webkit-border-radius: 3px; -moz-border-radius: 3px; -o-border-radius: 3px; display: flex;}.uvtoday1,.uvtoday1-3,.uvtoday11,.uvtoday4-5,.uvtoday6-8,.uvtoday9-10{font-size: 1.25rem; padding-top: 2px; color: #fff; border-bottom: 5px solid rgba(56, 56, 60, 1); align-items: center; justify-content: center; border-radius: 3px; margin-bottom: 10px;}.uvcaution,.uvtrend{position: absolute; font-size: 1rem;}.uvtoday1,.uvtoday1-3{background: #9aba2f;}.uvtoday4-5{background: #ff7c39; background: -webkit-linear-gradient(90deg, #90b12a, #ff7c39); background: linear-gradient(90deg, #90b12a, #ff7c39);}.uvtoday6-8{background: #efa80f; background: -webkit-linear-gradient(90deg, #efa80f, #d86858); background: linear-gradient(90deg, #efa80f, #d86858);}.uvtoday9-10{background: #d05f2d; background: -webkit-linear-gradient(90deg, #d65b4a, #ac2816); background: linear-gradient(90deg, #d65b4a, #ac2816);}.uvtoday11{background: #95439f; background: -webkit-linear-gradient(90deg, #95439f, #a475cb); background: linear-gradient(90deg, #95439f, #a475cb);}.higust{position: relative; left: 0; -webkit-border-radius: 3px; -moz-border-radius: 3px; -o-border-radius: 3px; border-radius: 3px; background: 0; padding: 5px; font-family: Arial, Helvetica, sans-serif; width: 100px; height: 2em; font-size: 0.8rem; padding-top: 2px; color: white; align-items: center; justify-content: center; margin-bottom: 10px; top: 0;}.uvcaution{margin-left: 120px; margin-top: 112px; font-family: Arial, Helvetica, system;}.uvtrend{margin-left: 135px; margin-top: 48px; z-index: 1; color: #fff;}.simsekcontainer{float: left; font-family: weathertext, system; -o-font-smoothing: antialiased; left: 0; bottom: 0; right: 0; position: relative; margin: 40px 10px 10px 40px; left: -10px; top: 13px;}.simsek{font-size: 1.55rem; padding-top: 12px; color: #f8f8f8; background: rgba(230, 161, 65, 1); border-bottom: 18px solid rgba(56, 56, 60, 1); align-items: center; justify-content: center; border-radius: 3px;}smalluvunit{font-size: 0.65rem; font-family: Arial, Helvetica, system;}sup{font-size: 1em;}supwm2{font-size: 0.7em; vertical-align: super;}.w34convertrain{position: relative; font-size: 0.5em; top: 10px; color: #c0c0c0; margin-left: 5px;}.hitempy{position: relative; background: rgba(61, 64, 66, 0.5); color: #aaa; width: 90px; padding: 1px; -webit-border-radius: 2px; border-radius: 2px; margin-top: -20px; margin-left: 92px; padding-left: 3px; line-height: 11px; font-size: 9px;}.actualt{position: relative; left: 0; -webkit-border-radius: 3px; -moz-border-radius: 3px; -o-border-radius: 3px; border-radius: 3px; background: teal; padding: 5px; font-family: Arial, Helvetica, sans-serif; width: 100px; height: 0.8em; font-size: 0.8rem; padding-top: 2px; color: white; align-items: center; justify-content: center; margin-bottom: 10px; top: 0;}.actualw{position: relative; left: 5px; -webkit-border-radius: 3px; -moz-border-radius: 3px; -o-border-radius: 3px; border-radius: 3px; background: rgba(74, 99, 111, 0.1); padding: 5px; font-family: Arial, Helvetica, sans-serif; width: 100px; height: 0.8em; font-size: 0.8rem; padding-top: 2px; color: #aaa; align-items: center; justify-content: center; margin-bottom: 10px; top: 0;}
    </style>';
} elseif ($theme === "light") {
    echo '<style>@font-face{font-family: weathertext2; src: url(css/fonts/verbatim-regular.woff) format("woff"), url(fonts/verbatim-regular.woff2) format("woff2"), url(fonts/verbatim-regular.ttf) format("truetype");}html,body{font-size: 13px; font-family: "weathertext2", Helvetica, Arial, sans-serif; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; background-color: white;}/* unvisited link */a:link{color: black;}/* visited link */a:visited{color: black;}/* mouse over link */a:hover{color: black;}/* selected link */a:active{color: black;}.grid{display: grid; grid-template-columns: repeat(auto-fill, minmax(140px, 2fr)); grid-gap: 10px; align-items: stretch; color: #f5f7fc; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;}.grid > article{border: 1px solid rgba(245, 247, 252, 0.02); box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.6); padding: 20px; font-size: 0.8em; -webkit-border-radius: 4px; border-radius: 4px; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; height: 90px;}.grid1{display: grid; grid-template-columns: repeat(auto-fill, minmax(100%, 1fr)); grid-gap: 5px; color: black;}.grid1 > articlegraph{border: 1px solid rgba(245, 247, 252, 0.02); box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.6); padding: 5px; font-size: 0.8em; -webkit-border-radius: 4px; border-radius: 4px; background: 0; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; height: 305px;}.weather34darkbrowser{position: relative; background: 0; width: 97%; height: 30px; margin: auto; margin-top: -5px; margin-left: 0px; border-top-left-radius: 5px; border-top-right-radius: 5px; padding-top: 10px;}.weather34darkbrowser[url]:after{content: attr(url); color: black; font-size: 14px; text-align: center; position: absolute; left: 0; right: 0; top: 0; padding: 4px 15px; margin: 11px 10px 0 auto; font-family: arial; height: 20px;}blue{color: #01a4b4;}orange{color: #009bb4;}orange1{color: rgba(255, 131, 47, 1);}green{color: #aaa;}red{color: #f37867;}red6{color: #d65b4a;}value{color: #fff;}yellow{color: #cc0;}purple{color: #916392;}.hitempyposx{position: relative; top: -90px; margin-left: 40px; margin-bottom: -30px;}.hitempypos{position: absolute; margin-top: -100px; margin-left: 40px; margin-bottom: 20px; display: block;}.hitempd{position: absolute; font-family: weathertext2, Arial, Helvetica, sans-serif; background: rgba(86, 95, 103, 0.3); color: #aaa; font-size: 0.7rem; width: 140px; padding: 0; margin-left: 30px; padding-left: 3px; align-items: center; justify-content: center; display: block; margin-top: 5px;}.hitempd1{position: absolute; font-family: weathertext2, Arial, Helvetica, sans-serif; background: rgba(86, 95, 103, 0.3); color: #aaa; font-size: 0.7rem; width: 140px; padding: 0; margin-left: 30px; padding-left: 3px; align-items: center; justify-content: center; display: block; margin-top: 40px; margin-bottom: 5px;}.uvmaxi3{position: absolute; left: -30px; color: rgba(0, 154, 171, 1); margin-top: -40px; font-size: 16px; width: 240px;}.uvmaxi3 span{color: #aaa;}.hitemp{color: #aaa; font-size: 0.7rem; display: inline;}.hitemp span{color: rgba(255, 124, 57, 1);}blue{color: rgba(0, 154, 171, 1);}.temperaturecontainer1{position: absolute; left: 20px; margin-top: -5px; margin-bottom: 20px;}.temperaturecontainer2{position: absolute; left: 20px; margin-top: 60px;}smalluvunit{font-size: 0.9rem; font-family: Arial, Helvetica, system;}.uvcontainer1{left: 70px; top: 0;}.uvtoday1,.uvtoday1-3,.uvtoday11,.uvtoday4-5,.uvtoday6-8,.uvtoday9-10{font-family: weathertext2, Arial, Helvetica, system; width: 5rem; height: 2.5rem; -webkit-border-radius: 3px; -moz-border-radius: 3px; -o-border-radius: 3px; display: flex;}.uvtoday1,.uvtoday1-3,.uvtoday11,.uvtoday4-5,.uvtoday6-8,.uvtoday9-10{font-size: 1.25rem; padding-top: 2px; color: #fff; border-bottom: 5px solid rgba(56, 56, 60, 1); align-items: center; justify-content: center; border-radius: 3px; margin-bottom: 10px;}.uvcaution,.uvtrend{position: absolute; font-size: 1rem;}.uvtoday1,.uvtoday1-3{background: #9aba2f;}.uvtoday4-5{background: #ff7c39; background: -webkit-linear-gradient(90deg, #90b12a, #ff7c39); background: linear-gradient(90deg, #90b12a, #ff7c39);}.uvtoday6-8{background: #efa80f; background: -webkit-linear-gradient(90deg, #efa80f, #d86858); background: linear-gradient(90deg, #efa80f, #d86858);}.uvtoday9-10{background: #d05f2d; background: -webkit-linear-gradient(90deg, #d65b4a, #ac2816); background: linear-gradient(90deg, #d65b4a, #ac2816);}.uvtoday11{background: #95439f; background: -webkit-linear-gradient(90deg, #95439f, #a475cb); background: linear-gradient(90deg, #95439f, #a475cb);}.higust{position: relative; left: 0; -webkit-border-radius: 3px; -moz-border-radius: 3px; -o-border-radius: 3px; border-radius: 3px; background: 0; padding: 5px; font-family: Arial, Helvetica, sans-serif; width: 100px; height: 2em; font-size: 0.8rem; padding-top: 2px; color: black; align-items: center; justify-content: center; margin-bottom: 10px; top: 0;}.uvcaution{margin-left: 120px; margin-top: 112px; font-family: Arial, Helvetica, system;}.uvtrend{margin-left: 135px; margin-top: 48px; z-index: 1; color: #fff;}.simsekcontainer{float: left; font-family: weathertext, system; -o-font-smoothing: antialiased; left: 0; bottom: 0; right: 0; position: relative; margin: 40px 10px 10px 40px; left: -10px; top: 13px;}.simsek{font-size: 1.55rem; padding-top: 12px; color: #f8f8f8; background: rgba(230, 161, 65, 1); border-bottom: 18px solid rgba(56, 56, 60, 1); align-items: center; justify-content: center; border-radius: 3px;}smalluvunit{font-size: 0.65rem; font-family: Arial, Helvetica, system;}sup{font-size: 1em;}supwm2{font-size: 0.7em; vertical-align: super;}.w34convertrain{position: relative; font-size: 0.5em; top: 10px; color: #c0c0c0; margin-left: 5px;}.hitempy{position: relative; background: rgba(61, 64, 66, 0.5); color: #aaa; width: 90px; padding: 1px; -webit-border-radius: 2px; border-radius: 2px; margin-top: -20px; margin-left: 92px; padding-left: 3px; line-height: 11px; font-size: 9px;}.actualt{position: relative; left: 0; -webkit-border-radius: 3px; -moz-border-radius: 3px; -o-border-radius: 3px; border-radius: 3px; background: teal; padding: 5px; font-family: Arial, Helvetica, sans-serif; width: 100px; height: 0.8em; font-size: 0.8rem; padding-top: 2px; color: white; align-items: center; justify-content: center; margin-bottom: 10px; top: 0;}.actualw{position: relative; left: 5px; -webkit-border-radius: 3px; -moz-border-radius: 3px; -o-border-radius: 3px; border-radius: 3px; background: rgba(74, 99, 111, 0.1); padding: 5px; font-family: Arial, Helvetica, sans-serif; width: 100px; height: 0.8em; font-size: 0.8rem; padding-top: 2px; color: #aaa; align-items: center; justify-content: center; margin-bottom: 10px; top: 0;}
    </style>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 UV-INDEX Almanac Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  
<main class="grid">
  <article>  
   <div class=actualt>Today </div>        
   <div class="temperaturecontainer">
	
             <?php
	// UV INDEX
	if ($weather["uvdmax"]>=10)  {
	echo "<div class='uvtoday11'>",$weather["uvdmax"] . "</value>";} 	
	else if ($weather["uvdmax"]>=8)  {
	echo "<div class='uvtoday9-10'>",$weather["uvdmax"] . "</value>";}
	else if ($weather["uvdmax"]>=5)  {
	echo "<div class='uvtoday6-8'>",$weather["uvdmax"] . "</value>";}
	else if ($weather["uvdmax"]>=3)  {
	echo "<div class='uvtoday4-5'>",$weather["uvdmax"] . "</value>";} 		
	else if ($weather["uvdmax"]>=-0) {
	echo "<div class='uvtoday1'>",$weather["uvdmax"] . "</value>";}		
	echo "<smalluvunit> UVI</smalluvunit>"
?>

</div>

<div class="higust">Maximum Recorded<br><blue><?php echo $weather["uvdmaxtime"];?></blue></div>



</article> 

 <article> 
  <div class=actualt>Yesterday </div>        
   <div class="temperaturecontainer">
	
            <?php
	// UV INDEX
	if ($weather["uvydmax"]>=10)  {
	echo "<div class='uvtoday11'>",$weather["uvydmax"] . "</value>";} 	
	else if ($weather["uvydmax"]>=8)  {
	echo "<div class='uvtoday9-10'>",$weather["uvydmax"] . "</value>";}
	else if ($weather["uvydmax"]>=5)  {
	echo "<div class='uvtoday6-8'>",$weather["uvydmax"] . "</value>";}
	else if ($weather["uvydmax"]>=3)  {
	echo "<div class='uvtoday4-5'>",$weather["uvydmax"] . "</value>";} 		
	else if ($weather["uvydmax"]>=-0) {
	echo "<div class='uvtoday1'>",$weather["uvydmax"] . "</value>";}		
	echo "<smalluvunit> UVI</smalluvunit>"
?>

</div>

<div class="higust">Maximum Recorded<br><blue><?php echo $weather["uvydmaxtime"];?></blue></div>



</article>  
  
 
  
  <article> 
  <div class=actualt><?php echo date('M Y')?> </div>        
   <div class="temperaturecontainer">
	
            <?php
	// UV INDEX
	if ($weather["uvmmax"]>=10)  {
	echo "<div class='uvtoday11'>",$weather["uvmmax"] . "</value>";} 	
	else if ($weather["uvmmax"]>=8)  {
	echo "<div class='uvtoday9-10'>",$weather["uvmmax"] . "</value>";}
	else if ($weather["uvmmax"]>=5)  {
	echo "<div class='uvtoday6-8'>",$weather["uvmmax"] . "</value>";}
	else if ($weather["uvmmax"]>=3)  {
	echo "<div class='uvtoday4-5'>",$weather["uvmmax"] . "</value>";} 		
	else if ($weather["uvmmax"]>=-0) {
	echo "<div class='uvtoday1'>",$weather["uvmmax"] . "</value>";}		
	echo "<smalluvunit> UVI</smalluvunit>"
?>

</div>

<div class="higust">Maximum Recorded <br><blue><?php echo $weather["uvmmaxtime"];?></blue></div>



</article>  
  
  
    <article> 
  <div class=actualt><?php echo date('Y')?> </div>        
   <div class="temperaturecontainer">
	
            <?php
	// UV INDEX
	if ($weather["uvymax"]>=10)  {
	echo "<div class='uvtoday11'>",$weather["uvymax"] . "</value>";} 	
	else if ($weather["uvymax"]>=8)  {
	echo "<div class='uvtoday9-10'>",$weather["uvymax"] . "</value>";}
	else if ($weather["uvymax"]>=5)  {
	echo "<div class='uvtoday6-8'>",$weather["uvymax"] . "</value>";}
	else if ($weather["uvymax"]>=3)  {
	echo "<div class='uvtoday4-5'>",$weather["uvymax"] . "</value>";} 		
	else if ($weather["uvymax"]>=-0) {
	echo "<div class='uvtoday1'>",$weather["uvymax"] . "</value>";}		
	echo "<smalluvunit> UVI</smalluvunit>"
?>

</div>

<div class="higust">Maximum Recorded <br><blue><?php echo $weather["uvymaxtime"];?></blue></div>


</article>
  <article> 
  <div class=actualt><?php echo 'All-Time';?> </div>        
   <div class="temperaturecontainer">
	
            <?php
	// UV INDEX
	if ($weather["uvamax"]>=10)  {
	echo "<div class='uvtoday11'>",$weather["uvamax"] . "</value>";} 	
	else if ($weather["uvamax"]>=8)  {
	echo "<div class='uvtoday9-10'>",$weather["uvamax"] . "</value>";}
	else if ($weather["uvymax"]>=5)  {
	echo "<div class='uvtoday6-8'>",$weather["uvamax"] . "</value>";}
	else if ($weather["uvamax"]>=3)  {
	echo "<div class='uvtoday4-5'>",$weather["uvamax"] . "</value>";} 		
	else if ($weather["uvamax"]>=-0) {
	echo "<div class='uvtoday1'>",$weather["uvamax"] . "</value>";}		
	echo "<smalluvunit> UVI</smalluvunit>"
?>

</div>

<div class="higust">Maximum Recorded <br><blue><?php echo $weather["uvamaxtime"];?></blue></div>


</article>
</main>
 <main class="grid1">
  <articlegraph> 
  <!--<div class=actualt>Today <span style="color:#ff9350">UV-INDEX</div>  //-->
  <iframe  src="w34highcharts/<?php echo $theme1;?>-charts.html?chart='uvsmallplot'&span='yearly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>
 
  </articlegraph> 
     <articlegraph style="height:30px">  
  <div class="lotemp">
  <?php echo $info?> 
<a href="https://highcharts.com" title="https://highcharts.com" target="_blank" style="font-size:6px;"> Charts rendered using Highcharts. Adapted by Steepleian for the WeeWX Weather34 skin from the original CSS/SVG/PHP scripts by weather34.com &copy; 2015-2019</a></div>
   
  </articlegraph> 
  
</main>
