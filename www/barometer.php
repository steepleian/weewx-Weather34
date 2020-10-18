<?php 
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include_once('common.php');include_once('w34CombinedData.php');
# 27th Jan 2019 file edited by Ken True based on barometer units for non standard configurations by lightmaster https://www.wxforum.net/index.php?topic=36011.0
header('Content-type: text/html; charset=utf-8');?>
<meta http-equiv="Content-Type: text/html; charset=UTF-8" />
<style>
.weather34barometerarrowactual{-webkit-transform:rotate(<?php 
if ($weather["barometer_units"]=='mb' OR $weather["barometer_units"]=="hPa"){echo $weather["barometer"]*0.02953*50.6;}else if ($weather["barometer_units"]=='inHg'){echo $weather["barometer"]*50.6;}?>deg);
transform:rotate(<?php if ($weather["barometer_units"]=='mb' OR $weather["barometer_units"]=="hPa"){echo $weather["barometer"]*0.02953*50.6;}else if ($weather["barometer_units"]=='inHg'){echo $weather["barometer"]*50.6;}?>deg);}
.weather34barometerarrowmin{-webkit-transform:rotate(<?php 
if ($weather["barometer_units"]=='mb' OR $weather["barometer_units"]=="hPa" ){echo $weather["barometer_min"]*0.02953*50.6;}else if ($weather["barometer_units"]=='inHg'){echo $weather["barometer_min"]*50.6;}?>deg);
transform:rotate(<?php if ($weather["barometer_units"]=='mb' OR $weather["barometer_units"]=="hPa" ){echo $weather["barometer_min"]*0.02953*50.6;}else if ($weather["barometer_units"]=='inHg'){echo $weather["barometer_min"]*50.6;}?>deg);}
.weather34barometerarrowmax{-webkit-transform:rotate(<?php 
if ($weather["barometer_units"]=='mb' OR $weather["barometer_units"]=="hPa" ){echo $weather["barometer_max"]*0.02953*50.6;}else if ($weather["barometer_units"]=='inHg'){echo $weather["barometer_max"]*50.6;}?>deg);
transform:rotate(<?php if ($weather["barometer_units"]=='mb' OR $weather["barometer_units"]=="hPa" ){echo $weather["barometer_max"]*0.02953*50.6;}else if ($weather["barometer_units"]=='inHg'){echo $weather["barometer_max"]*50.6;}?>deg);}
</style>
<div class="updatedtime"><span><?php if(file_exists($livedata)&&time()- filemtime($livedata)>300)echo $offline. '<offline> Offline </offline>';else echo $online." ".$weather["time"];?></div>  
<div class='barometermax'>
<?php echo '<div class=barometerorange><valuetext>Max ('.$weather["thb0seapressmaxtime"].')<br><maxred><value>',$weather["barometer_max"],'</maxred>&nbsp;',$weather["barometer_units"],' </valuetext></div>';?></div>
<div class='barometermin'>
<?php echo '<div class=barometerblue><valuetext>Min ('.$weather["thb0seapressmintime"].')<br><minblue><value>',$weather["barometer_min"],'</minblue>&nbsp;',$weather["barometer_units"],' </valuetext></div>';?></div>

<div class="barometertrend2">
<?php  echo "<valuetext>&nbsp;&nbsp;Trend";
if ($weather["barometer_trend"] > 20  && $weather["barometer_trend"] < 100)  {echo '<rising><rise> '.$risingsymbol.' </rise><span><value>';echo number_format($weather["barometer_trend"],2), '</rising><units> ';echo $weather["barometer_units"], '</units>';}
else if ($weather["barometer_trend"] < 0) {
echo '<falling><fall> '.$fallingsymbol.'</fall><value> '; echo number_format($weather["barometer_trend"],2), '</falling><units> ';echo $weather["barometer_units"], '</units>';}
else if ($weather["barometer_trend"] > 0 && $weather["barometer_trend"] < 100) {
echo '<rising><rise>'.$risingsymbol.' </rise><value>&nbsp;';echo number_format($weather["barometer_trend"],2), '</rising><units> ';echo $weather["barometer_units"], '</units>';}	  
else echo '<ogreen> '.$steadysymbol.'</ogreen><steady><ogreen><value>Steady</ogreen></steady>';?></valuetext>
</div>

<div class="homeweathercompass2" >
<div class="homeweathercompass-line2">
<div class="weather34barometerarrowactual"></div>
<div class="weather34barometerarrowmin"></div>
<div class="weather34barometerarrowmax"></div>
</div>
<div class="text2"><div class="pressuretext">
<?php if ($weather["barometer_trend"]>20) {
    echo '<ogreen>'.$lang['Steady'].'</ogreen>';
} else if ($weather["barometer_trend"] < 0) {
    echo '<oblue>'.$lang['Falling'].'</oblue> <fall> '.$fallingsymbol.'</fall>';
} else if ($weather["barometer_trend"] > 0) {
    echo '<oorange>'.$lang['Rising'].'</orange> <rise> '.$risingsymbol.' </rise>';
} else {
    echo '<ogreen>'.$lang['Steady'].'</ogreen>';
}?>
</div>
<?php echo "<darkgrey>".$weather["barometer"],"&nbsp;<span>".$weather["barometer_units"]."</span>";?>
</div></div>

<div class="barometerconverter">
<?php echo "<div class=barometerconvertercircleblue>";
if ($weather["barometer_units"]=='mb' OR $weather["barometer_units"]=="hPa"){
    echo number_format($weather["barometer"]*0.029529983071445,2),"<smallrainunit>inHg</smallrainunit>";
} else if ($weather["barometer_units"]=='inHg'){
    echo round($weather["barometer"]*33.863886666667,1),"<smallrainunit>hPa</smallrainunit>";
}?>
</div></div>
</span>
<div class="barometerlimits"><div class='weather34-barometerruler'>
<?php if ($weather["barometer_units"]=='mb' OR $weather["barometer_units"]=="hPa"){
    echo "<weather34-barometerlimitmin><value>950</weather34-barometerlimitmin><weather34-barometerlimitmax><value>1050</weather34-barometerlimitmax>";
} else {
    echo "<weather34-barometerlimitminf><value>28</barometerlimitminf><weather34-barometerlimitmaxf><value>31</weather34-barometerlimitmaxf>";
}?>
</div></div>
