<?php 
	####################################################################################################
	#	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2015-2016-2017                                #
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at 													   #
	#   https://weather34.com/homeweatherstation/index.html 										   # 
	# 	WEATHER STATION TEMPLATE 2015-2017                 											   #
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
include_once('livedata.php');include('common.php');header('Content-type: text/html; charset=utf-8');
$json_string = file_get_contents("jsondata/almanac.txt");
$parsed_json = json_decode($json_string);
$vector = $parsed_json->{'vector'};

$winddeg = $weather["wind_direction_avg"];
if ($winddeg== 0) $winddir = "NA";
				 elseif ($winddeg <11.25 ) $winddir = "N";
				  elseif ($winddeg <33.75 ) $winddir = "NNE";
				  elseif ($winddeg <56.25 ) $winddir = "NE";
				  elseif ($winddeg <78.75 ) $winddir = "ENE";
			     	 elseif ($winddeg <101.25 ) $winddir = "E";
				  elseif ($winddeg <123.75) $winddir = "ESE";
				  elseif ($winddeg <146.25 ) $winddir = "SE";
				  elseif ($winddeg <168.75) $winddir = "SSE";
				  elseif ($winddeg <191.25) $winddir = "S";
				  elseif ($winddeg <213.75 ) $winddir = "SSW";
				 elseif ($winddeg <236.25) $winddir = "SW";
				 elseif ($winddeg <258.75 ) $winddir = "WSW";
				 elseif ($winddeg <281.25) $winddir = "W";
				 elseif ($winddeg <303.75 ) $winddir = "WNW";
				 elseif ($winddeg <326.25 ) $winddir = "NW";
				 elseif ($winddeg <348.75) $winddir = "NNW";
				  elseif ($winddeg <360 ) $winddir = "N";	
				   
?> 
<style>
.thearrow2{-webkit-transform:rotate(<?php echo $weather["wind_direction"];?>deg); -moz-transform:rotate(<?php echo $weather["wind_direction"];?>deg); -o-transform:rotate(<?php echo $weather["wind_direction"];?>deg); -ms-transform:rotate(<?php echo $weather["wind_direction"];?>deg); transform:rotate(<?php echo $weather["wind_direction"];?>deg); position:absolute;z-index:200;top:0;
left:50%;margin-left:-5px;width:10px;height:50%;-webkit-transform-origin:50% 100%;-moz-transform-origin:50% 100%;-o-transform-origin:50% 100%;-ms-transform-origin:50% 100%;transform-origin:50% 100%;-webkit-transition-duration:3s;-moz-transition-duration:3s;-o-transition-duration:3s;-ms-transition-duration:3s;transition-duration:3s}
.thearrow2:after{content:'';position:absolute;left:50%;top:0;height:10px;width:10px;background-color:NONE;width: 0;height: 0;border-style: solid;
border-width: 14px 9px 0 9px;border-color: RGBA(255, 121, 58, 1.00) transparent transparent transparent;-webkit-transform:translate(-50%,-50%);-moz-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);-webkit-transition-duration:3s;-moz-transition-duration:3s;-o-transition-duration:3s;-ms-transition-duration:3s;transition-duration:3s}.thearrow2:before{content:'';width:6px;height:6px;position:absolute;z-index:9;left:2px;top:-5px;border:2px solid RGBA(255, 255, 255, 0.8);-webkit-border-radius:100%;-moz-border-radius:100%;-o-border-radius:100%;-ms-border-radius:100%;border-radius:100%}.avgw{-webkit-transform:rotate(<?php echo $weather["wind_direction_avg"];?>deg);-moz-transform:rotate(<?php echo $weather["wind_direction_avg"];?>deg);
-o-transform:rotate(<?php echo $weather["wind_direction_avg"];?>deg);-ms-transform:rotate(<?php echo $weather["wind_direction_avg"];?>deg);transform:rotate(<?php echo $weather["wind_direction_avg"];?>deg);}
</style>
<div class="updatedtime">
<span><?php if(file_exists($livedata)&&time()- filemtime($livedata)>300)echo '
<svg id=i-info viewBox="0 0 32 32" width=7 height=7 fill=#ff8841 stroke=#ff8841 stroke-linecap=round stroke-linejoin=round stroke-width=6.25%><path d="M16 14 L16 23 M16 8 L16 10" /><circle cx=16 cy=16 r=14 />
</svg>';else echo '<svg id=i-info viewBox="0 0 32 32" width=7 height=7 fill=#9aba2f stroke=#9aba2f stroke-linecap=round stroke-linejoin=round stroke-width=6.25%><path d="M16 14 L16 23 M16 8 L16 10" /><circle cx=16 cy=16 r=14 /></svg>';?></span> <?php echo $weather["time"];?></div>
<div class='averagedir1' style = "margin-top:102px; margin-left:214px">
<div class='avgw' style = "align-items:right; margin-left:6px"><img src="css/windicons/avgw.svg" width='28pt' height='28pt'></img></div>
<ogrey> Avg: </ogrey><ogreen> <?php echo $winddir ?></ogreen>
</div></div>

<br />
<div class="windicons1" style = "margin-left:12px;  transform: rotate(<?php echo $weather["wind_direction"]+90;?>deg)">
<?php
// Wind barb icons
echo $weather["wind_speed"] . "</windgust> \n";
if($weather["wind_speed"]*$toKnots == 0){echo "<img src='css/windspeed/wind0kts.svg' ></img>";}
else if($weather["wind_speed"]*$toKnots<2.5){echo "<img src='css/windspeed/wind2kts.svg' ></img>";}
else if($weather["wind_speed"]*$toKnots<7.5){echo "<img src='css/windspeed/wind7kts.svg' ></img>";}
else if($weather["wind_speed"]*$toKnots<12.5){echo "<img src='css/windspeed/wind12kts.svg' ></img>";}
else if($weather["wind_speed"]*$toKnots<17.5){echo "<img src='css/windspeed/wind17kts.svg' ></img>";}
else if($weather["wind_speed"]*$toKnots<22.5){echo "<img src='css/windspeed/wind22kts.svg' ></img>";}
else if($weather["wind_speed"]*$toKnots<27.5){echo "<img src='css/windspeed/wind27kts.svg' ></img>";}
else if($weather["wind_speed"]*$toKnots<32.5){echo "<img src='css/windspeed/wind32kts.svg' ></img>";}
else if($weather["wind_speed"]*$toKnots<37.5){echo "<img src='css/windspeed/wind37kts.svg' ></img>";}
else if($weather["wind_speed"]*$toKnots<42.5){echo "<img src='css/windspeed/wind42kts.svg' ></img>";}
else if($weather["wind_speed"]*$toKnots<47.5){echo "<img src='css/windspeed/wind47kts.svg' ></img>";}
else if($weather["wind_speed"]*$toKnots<52.5){echo "<img src='css/windspeed/wind52kts.svg' ></img>";}
else if($weather["wind_speed"]*$toKnots<57.5){echo "<img src='css/windspeed/wind57kts.svg' ></img>";}
else if($weather["wind_speed"]*$toKnots<62.5){echo "<img src='css/windspeed/wind62kts.svg' ></img>";}
else if($weather["wind_speed"]*$toKnots<102.5){echo "<img src='css/windspeed/wind102kts.svg' ></img>";}
else if($weather["wind_speed"]*$toKnots<107.5){echo "<img src='css/windspeed/wind107kts.svg' ></img>";}
?></div> <!-- end wind speed icons -->
<div class="beaufort1" style = "margin-left:8px; text-align:left">
<?php
// Wind phrases from Beaufort scale
if($weather["wind_speed"]*$toKnots<0.57){echo '&nbsp;&nbsp;',$lang['Calm'];}
else if($weather["wind_speed"]*$toKnots<2.99){echo '&nbsp;',$lang['Lightair'];}
else if($weather["wind_speed"]*$toKnots<6.42){echo '&nbsp;',$lang['Lightbreeze'];}
else if($weather["wind_speed"]*$toKnots<10.64){echo '&nbsp;',$lang['Gentelbreeze'];}
else if($weather["wind_speed"]*$toKnots<15.51){echo '&nbsp;',$lang['Moderatebreeze'];}
else if($weather["wind_speed"]*$toKnots<22.5){echo '&nbsp;',$lang['Freshbreeze'];}
else if($weather["wind_speed"]*$toKnots<26.93){echo '&nbsp;',$lang['Strongbreeze'];}
else if($weather["wind_speed"]*$toKnots<33.38){echo '&nbsp;',$lang['Neargale'];}
else if($weather["wind_speed"]*$toKnots<40.27){echo '&nbsp;',$lang['Galeforce'] ;}
else if($weather["wind_speed"]*$toKnots<47.58){echo '&nbsp;',$lang['Stronggale'];}
else if($weather["wind_speed"]*$toKnots<55.29){echo '&nbsp;','&nbsp;',$lang['Storm'];}
else if($weather["wind_speed"]*$toKnots<63.37){echo '&nbsp;',$lang['Violentstorm'];}
else {echo '&nbsp;',$lang['Hurricane'];}

if($weather["wind_speed"] == 0){$colorw = "'color:#26908f;'";}
else if($weather["wind_speed"] <2){$colorw = "'color:#90ee7e;'";}
else if($weather["wind_speed"] <5){$colorw = "'color:#f45b5b;'";}
else if($weather["wind_speed"] <10){$colorw = "'color:#7798BF;'";}
else if($weather["wind_speed"] <15){$colorw = "'color:#aaeeee;'";}
else if($weather["wind_speed"] <20){$colorw = "'color:#ff0066;'";}
else if($weather["wind_speed"] <30){$colorw = "'color:#eeaaee;'";}
else {$colorw = "'color:#55BF3B;'";}

if($weather["wind_gust_speed"] == 0){$colorg = "'color:#26908f;'";}
else if($weather["wind_gust_speed"] <2){$colorg = "'color:#90ee7e;'";}
else if($weather["wind_gust_speed"]<5){$colorg = "'color:#f45b5b;'";}
else if($weather["wind_gust_speed"] <10){$colorg = "'color:#7798BF;'";}
else if($weather["wind_gust_speed"]<15){$colorg = "'color:#aaeeee;'";}
else if($weather["wind_gust_speed"] <20){$colorg = "'color:#ff0066;'";}
else if($weather["wind_gust_speed"]<30){$colorg = "'color:#eeaaee;'";}
else {$colorg = "'color:#55BF3B;'";}



?>
</div>
<div class="windspeedvalues">
<div class="max" style="font-size:18px; margin-top:36px; margin-left:12px; text-align:left; line-height:12px">
<?php // wind speed & units
echo  "<span style= $colorw>" . $weather["wind_speed"] . "</span>";?>
<div class="max" style = "margin-top:-2px; margin-left:0px; text-align:left">
<font size = "0"><grey>
<?php //default chosen units 
echo 'Wind'; ?> </grey>
</font>
</div>
</div>
<div class="windspeedvalues">
<div class="max" style="position:absolute; font-size:18px; margin-top:-27px; right:-280px; text-align:right; line-height:12px">
<?php 
//gust values & unit, high gust color

$color = "'color:#00FF00;'";

echo "";
if($weather["wind_gust_speed"]>30) {echo "<span style='color:#f26c4f;'>" . $weather["wind_gust_speed"] . "</span>";}
else echo "<span style= $colorg>" . $weather["wind_gust_speed"] . "</span>";
if($weather["wind_gust_speed"]<30) {$newalert = ' ';}
?>
<br>
<font size = "0"><grey>
<?php //default chosen units 
echo 'Gust'; ?> </grey>
</font>
</div>
</span></div>
</div>
<?php if (array_key_exists("wind_speed_max", $weather)) { ?>
<div class="windspeedtrend1" style="margin-top:5px; margin-left:13px; text-align:left">
<?php echo "<supmb>Max </supmb>" . "<max>". $weather["wind_speed_max"] ."</max>" . "<supmb> </supmb> ";?></div>
<div class="gustspeedtrend1" style="margin-top:7px; margin-left:205px; text-align:right">
<?php echo "<supmb>Max </supmb>" . "<max>".  $weather["wind_gust_speed_max"] ."</max>" . "<supmb> </supmb><br> ";?></div>
<?php } else if (array_key_exists("wind_speed_trend", $weather)) {
if ($weather["wind_speed_trend"] <> 0) { ?>
<div class="windspeedtrend1" style="margin-left:40px; text-align:left">
<?php if ($weather["wind_speed_trend"] > 0) echo "+";
echo $weather["wind_speed_trend"] . "<supmb> </supmb> <br> ".$lang['Windspeed']."";?></div>
<?php }
if ($weather["wind_gust_speed_trend"] <> 0) { ?>
<div class="gustspeedtrend1" " >
<?php if ($weather["wind_gust_speed_trend"] > 0) echo "+";
 echo $weather["wind_gust_speed_trend"] . "<supmb> " . "<max>". $weather["wind_units"] ."</max>" . "</supmb> <br> ".$lang['Gust']." ";?></div>
<?php }
} ?>
<div class="homeweathercompass1">
 <div class="homeweathercompass-line1">
  <div class="thearrow2"></div>
 </div>
 <div class="max" style="position:absolute; z-index:-20; margin-top:12px; margin-left:-3px;";>
 <iframe src="chartswu/swindroseday2.htm" width="180px" height="160px" background= "transparent" frameborder="0"></iframe>
 
 </div>
 <div class="max" style="position:absolute; margin-top:-12px; margin-left:-47px; font-size:12px";><grey><strongnumbers><?php echo " (km/h)</grey>";?></div>
  <div class="max" style="position:absolute; margin-top:-14px; margin-left:50px;";><?php echo $newalert;?></div>
  
  
  
  
  
  
  
</div>