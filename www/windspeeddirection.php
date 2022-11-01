<?php 
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
require_once('w34CombinedData.php');require_once('common.php');?>
<meta http-equiv="Content-Type: text/html; charset=UTF-8" />
<style>.thearrow2{-webkit-transform:rotate(<?php echo $weather["wind_direction"];?>deg);-moz-transform:rotate(<?php echo $weather["wind_direction"];?>deg);-o-transform:rotate(<?php echo $weather["wind_direction"];?>deg);-ms-transform:rotate(<?php echo $weather["wind_direction"];?>deg);transform:rotate(<?php echo $weather["wind_direction"];?>deg);position:absolute;z-index:200;top:0;left:50%;margin-left:-5px;width:10px;height:50%;-webkit-transform-origin:50% 100%;-moz-transform-origin:50% 100%;-o-transform-origin:50% 100%;-ms-transform-origin:50% 100%;transform-origin:50% 100%;-webkit-transition-duration:3s;-moz-transition-duration:3s;-o-transition-duration:3s;-ms-transition-duration:3s;transition-duration:3s}.thearrow2:after{content:'';position:absolute;left:50%;top:0;height:10px;width:10px;background-color:NONE;width:0;height:0;border-style:solid;border-width:14px 9px 0 9px;border-color:RGBA(255,121,58,1) transparent transparent transparent;-webkit-transform:translate(-50%,-50%);-moz-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);-webkit-transition-duration:3s;-moz-transition-duration:3s;-o-transition-duration:3s;-ms-transition-duration:3s;transition-duration:3s}
.thearrow2:before{content:'  o o o';color:rgba(255, 124, 57, 1);font-family:Arial, Helvetica, sans-serif;font-size:6px;width:6px;height:6px;position:absolute;z-index:9;left:2px;top:-5px;border:2px solid RGBA(255,255,255,0.8);-webkit-border-radius:100%;-moz-border-radius:100%;-o-border-radius:100%;-ms-border-radius:100%;border-radius:100%}
.thearrow1{-webkit-transform:rotate(<?php echo $weather["wind_direction_avg"];?>deg);-moz-transform:rotate(<?php echo $weather["wind_direction_avg"];?>deg);-o-transform:rotate(<?php echo $weather["wind_direction_avg"];?>deg);-ms-transform:rotate(<?php echo $weather["wind_direction_avg"];?>deg);transform:rotate(<?php echo $weather["wind_direction_avg"];?>deg);position:absolute;z-index:150;top:0;left:50%;margin-left:-5px;-webkit-transform-origin:50% 100%;-moz-transform-origin:50% 100%;-o-transform-origin:50% 100%;-ms-transform-origin:50% 100%;transform-origin:50% 100%;-webkit-transition-duration:0s;-moz-transition-duration:0s;-o-transition-duration:0s;-ms-transition-duration:0s;transition-duration:0s;background:0}
.thearrow1:after{content:'';position:absolute;text-align:left;left:50%;font-size:8px;top:0;width:0;height:0;-webkit-border-radius:0;border-radius:0;border-left:6px solid transparent;border-right:6px solid transparent;border-top:9px solid rgb(144, 177, 42);border-bottom:0;-webkit-transform:translate(-50%,-50%);-moz-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);-webkit-transition-duration:3s;-moz-transition-duration:3s;-o-transition-duration:3s;-ms-transition-duration:3s;transition-duration:3s;background:0}
.thearrow1:before{content:'  o o o o';color:rgb(144, 177, 42);font-family:Arial, Helvetica, sans-serif;font-size:4px;width:1px;height:1px;position:absolute;z-index:1;left:3px;top:-4px;border:2px dotted RGBA(255,255,255,0.8);-webkit-border-radius:100%;-moz-border-radius:100%;-o-border-radius:100%;-ms-border-radius:100%;border-radius:100%}
.avgw{ width:27px; height:27px;	margin-left:35px;-webkit-transform:rotate(<?php echo $weather["wind_direction_avg"];?>deg);-moz-transform:rotate(<?php echo $weather["wind_direction_avg"];?>deg);-o-transform:rotate(<?php echo $weather["wind_direction_avg"];?>deg);-ms-transform:rotate(<?php echo $weather["wind_direction_avg"];?>deg);transform:rotate(<?php echo $weather["wind_direction_avg"];?>deg);}spancalm{postion:relative;font-family:weathertext,Arial;font-size:26px;}</style>
<div class="updatedtime"><span><?php if(file_exists($livedata)&&time()- filemtime($livedata)>300)echo $offline. '<offline> Offline </offline>';else echo $online." ".$weather["time"];?></div> <br />
<div class="windspeedvalues"><div class="windspeedvalue">
<?php  
//weather34-windspeed instantaneous
if ($weather["wind_speed"]<10){echo "&nbsp;".number_format($weather["wind_speed"],1);}else echo number_format($weather["wind_speed"],1);?>
<div class="windunitidspeed"><?php echo $lang['Currently'];?></div><div class="windunitspeed"><?php echo $weather["wind_units"]?></div></div>
<div class="windgustvalue">
<?php 

//weather34-windgust
if ($weather["wind_gust_speed"]*$toKnots>=26.9978){echo "<windred>",number_format($weather["wind_gust_speed"],1),"</span>";}else if ($weather["wind_gust_speed"]*$toKnots>=21.5983){echo "<windorange>",number_format($weather["wind_gust_speed"],1),"</span>";}else if ($weather["wind_gust_speed"]*$toKnots>=16.1987){echo "<windgreen>",number_format($weather["wind_gust_speed"],1),"</span>";}else if ($weather["wind_gust_speed"]<10){echo "&nbsp;",number_format($weather["wind_gust_speed"],1);}else echo number_format($weather["wind_gust_speed"],1);?>
<div class="windunitgust"><?php echo  $weather["wind_units"]?></div>
<div class="windunitidgust"><?php echo $lang['Gust']; ?></div></span></div></div>
<div class="windspeedtrend1">
<?php echo "<valuetext>Max "."<max><value><maxred>".number_format($weather["wind_gust_speed_max"],1)."</maxred></max></span>"."<supmb> ".$weather["wind_units"]."</supmb><br> ".$lang['Gust']." (".$weather["winddmaxtime"].")</valuetext>";?></div>
<div class="windconverter"><?php 
//weather34-convert kmh to mph
if ($weather["wind_units"]=="km/h" && $weather["wind_gust_speed"]*$toKnots>=26.9978){echo "<div class=windconvertercirclered1><tred>".number_format($weather["wind_gust_speed"]*0.621371,1)." </tred><smallrainunit>mph
</smallrainunit>";}
else if ($weather["wind_units"]=="km/h" && $weather["wind_gust_speed"]*$toKnots>=21.5983){echo "<div class=windconvertercircleorange1><torange>".number_format($weather["wind_gust_speed"]*0.621371,1)." </torange><smallrainunit>mph</smallrainunit>";}
else if ($weather["wind_units"]=="km/h" && $weather["wind_gust_speed"]*$toKnots>=16.1987){echo "<div class=windconvertercirclegreen1><tgreen>".number_format($weather["wind_gust_speed"]*0.621371,1)." </tgreen><smallrainunit>mph</smallrainunit>";}
else if ($weather["wind_units"]=="km/h" && $weather["wind_gust_speed"]*$toKnots<16.1987){echo "<div class=windconvertercircleblue1>".number_format($weather["wind_gust_speed"]*0.621371,1)." <smallrainunit>mph
</smallrainunit>";}
//weather34-convert mph to kmh
else if ($weather["wind_units"]=="mph" && $weather["wind_gust_speed"]*$toKnots>=26.9978){echo "<div class=windconvertercirclered1><tred>".number_format($weather["wind_gust_speed"]*1.609343502101025,1)." </tred><smallrainunit>kmh</smallrainunit>";}
else if ($weather["wind_units"]=="mph" && $weather["wind_gust_speed"]*$toKnots>=21.5983){echo "<div class=windconvertercircleorange1><torange>".number_format($weather["wind_gust_speed"]*1.609343502101025,1)." </torange><smallrainunit>kmh</smallrainunit>";}
else if ($weather["wind_units"]=="mph" && $weather["wind_gust_speed"]*$toKnots>=16.1987){echo "<div class=windconvertercircleblue1>".number_format($weather["wind_gust_speed"]*1.609343502101025,1)." <smallrainunit>kmh</smallrainunit>";}
else if ($weather["wind_units"]=="mph" && $weather["wind_gust_speed"]*$toKnots<16.1987){echo "<div class=windconvertercirclegreen1><tgreen>".number_format($weather["wind_gust_speed"]*1.609343502101025,1)." </tgreen><smallrainunit>kmh</smallrainunit>";}
//weather34-convert ms to kmh
else if ($weather["wind_units"]=="m/s" && $weather["wind_gust_speed"]*$toKnots>=26.9978){echo "<div class=windconvertercirclered1><tred>".number_format($weather["wind_gust_speed"]*3.60000288,1)." </tred><smallrainunit>kmh</smallrainunit>";}
else if ($weather["wind_units"]=="m/s" && $weather["wind_gust_speed"]*$toKnots>=21.5983){echo "<div class=windconvertercircleorange1><torange>".number_format($weather["wind_gust_speed"]*3.60000288,1)." </torange><smallrainunit>kmh</smallrainunit>";}
else if ($weather["wind_units"]=="m/s" && $weather["wind_gust_speed"]*$toKnots>=16.1987){echo "<div class=windconvertercircleblue1>".number_format($weather["wind_gust_speed"]*3.60000288,1)." <smallrainunit>kmh</smallrainunit>";}
else if ($weather["wind_units"]=="m/s" && $weather["wind_gust_speed"]*$toKnots<16.1987){echo "<div class=windconvertercirclegreen1><tgreen>".number_format($weather["wind_gust_speed"]*3.60000288,1)." </tgreen><smallrainunit>kmh</smallrainunit>";}?>
</div></div>
<div class="homeweathercompass1"><div class="homeweathercompass-line1"><div class="thearrow2"></div><div class="thearrow1"></div></div>
<div class="text1"><div class="windvalue1" id="windvalue"><?php echo $weather["wind_direction"],'&deg;';?></div> </div>
<div class="windirectiontext1">
<?php  //weather34 wind direction value output 
  
if($weather["wind_direction"]<=11.25){echo $lang['Northdir'] ;}else if($weather["wind_direction"]<=33.75){echo $lang['NNEdir'];}else if($weather["wind_direction"]<=56.25){echo $lang['NEdir'];}else if($weather["wind_direction"]<=78.75){echo $lang['ENEdir'];}else if($weather["wind_direction"]<=101.25){echo $lang['Eastdir'];}else if($weather["wind_direction"]<=123.75){echo $lang['ESEdir'];}else if($weather["wind_direction"]<=146.25){echo $lang['SEdir'];}else if($weather["wind_direction"]<=168.75){echo $lang['SSEdir'];}else if($weather["wind_direction"]<=191.25){echo $lang['Southdir'];}  else if($weather["wind_direction"]<=213.75){echo $lang['SSWdir'];}else if($weather["wind_direction"]<=236.25){echo $lang['SWdir'];}else if($weather["wind_direction"]<=258.75){echo $lang['WSWdir'];}else if($weather["wind_direction"]<=281.25){echo $lang['Westdir'];}else if($weather["wind_direction"]<=303.75){echo $lang['WNWdir'];}else if($weather["wind_direction"]<=326.25){echo $lang['NWdir'];}else if($weather["wind_direction"]<=348.75){echo $lang['NWNdir'];}else {echo $lang['Northdir'];}?>
 </div></div> 
<?php 
if ($weather["wind_units"] == 'mph'){$weather["windrun"]=$weather["windrun"]*0.621371;}
else if ($weather["wind_units"] == 'kts'){$weather["windrun"]=$weather["windrun"]*0.621371;}
else {$weather["windrun"]=$weather["windrun"]*1;}

echo ' <div class=weather34windrun>'.$windrunicon.' &nbsp;<grey><valuetext1>',number_format($weather["windrun"],1);?>
<grey><weather34windrunspan></valuetext>
<?php if ($weather["wind_units"] == 'mph') echo 'mi'; else if ($weather["wind_units"] == 'm/s') echo 'km'; else if ($weather["wind_units"] == 'kts') echo 'mi';else echo 'km';?></weather34windrunspan>
</div></div><br /><div class=windrun1><?php echo  $lang['Wind Run']?></div>
<?php ///weather34 beaufort
if ($weather["wind_speed_bft"] >= 12) {
  echo '<div class=weather34beaufort6>' . $beaufort12 . "&nbsp; " . $weather["wind_speed_bft"];
} else if ($weather["wind_speed_bft"] >= 11) {
  echo '<div class=weather34beaufort6>' . $beaufort11 . "&nbsp; " . $weather["wind_speed_bft"];
} else if ($weather["wind_speed_bft"] >= 10) {
  echo '<div class=weather34beaufort6>' . $beaufort10 . "&nbsp; " . $weather["wind_speed_bft"];
} else if ($weather["wind_speed_bft"] >= 9) {
  echo '<div class=weather34beaufort6>' . $beaufort9 . "&nbsp; " . $weather["wind_speed_bft"];
} else if ($weather["wind_speed_bft"] >= 8) {
  echo '<div class=weather34beaufort6>' . $beaufort8 . "&nbsp; " . $weather["wind_speed_bft"];
} else if ($weather["wind_speed_bft"] >= 7) {
  echo '<div class=weather34beaufort6>' . $beaufort7 . "&nbsp; " . $weather["wind_speed_bft"];
} else if ($weather["wind_speed_bft"] >= 6) {
  echo '<div class=weather34beaufort6>' . $beaufort6 . "&nbsp; " . $weather["wind_speed_bft"];
} else if ($weather["wind_speed_bft"] >= 5) {
  echo '<div class=weather34beaufort4-5>' . $beaufort5 . "&nbsp; " . $weather["wind_speed_bft"];
} else if ($weather["wind_speed_bft"] >= 4) {
  echo '<div class=weather34beaufort4-5>' . $beaufort4 . "&nbsp; " . $weather["wind_speed_bft"];
} else if ($weather["wind_speed_bft"] >= 3) {
  echo '<div class=weather34beaufort3-4>' . $beaufort3 . "&nbsp; " . $weather["wind_speed_bft"];
} else if ($weather["wind_speed_bft"] >= 2) {
  echo '<div class=weather34beaufort1-3>' . $beaufort2 . "&nbsp; " . $weather["wind_speed_bft"];
} else if ($weather["wind_speed_bft"] >= 1) {
  echo '<div class=weather34beaufort1-3>' . $beaufort1 . "&nbsp; " . $weather["wind_speed_bft"];
} else if ($weather["wind_speed_bft"] >= 0) {
  echo '<div class=weather34beaufort1-3>' . $beaufort0 . "&nbsp; " . $weather["wind_speed_bft"];
}
?>
 <weather34bftspan>BFT<weather34bftspan></div>
<div class="beaufort1"><?php
if ($weather["wind_speed_bft"] == 0) {
  echo "Calm";
} else if ($weather["wind_speed_bft"] == 1) {
  echo "Light Air";
} else if ($weather["wind_speed_bft"] == 2) {
  echo "Light Breeze";
} else if ($weather["wind_speed_bft"] == 3) {
  echo "Gentle Breeze";
} else if ($weather["wind_speed_bft"] == 4) {
  echo "Moderate Breeze";
} else if ($weather["wind_speed_bft"] == 5) {
  echo "Fresh Breeze";
} else if ($weather["wind_speed_bft"] == 6) {
  echo "Strong Breeze";
} else if ($weather["wind_speed_bft"] == 7) {
  echo "Near Gale " . $alert . "";
} else if ($weather["wind_speed_bft"] == 8) {
  echo "Gale Force " . $alert . "";
} else if ($weather["wind_speed_bft"] == 9) {
  echo "Strong Gale " . $alert . "";
} else if ($weather["wind_speed_bft"] == 10) {
  echo "Storm Force " . $alert . "";
} else if ($weather["wind_speed_bft"] == 11) {
  echo "Violent Storm " . $alert . "";
} else if ($weather["wind_speed_bft"] >= 12) {
  echo "Hurricane Force " . $alert . "";
}
?>
</div>
