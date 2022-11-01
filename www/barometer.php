<?php 
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include_once('common.php');include_once('w34CombinedData.php');
# 27th Jan 2019 file edited by Ken True based on barometer units for non standard configurations by lightmaster https://www.wxforum.net/index.php?topic=36011.0
header('Content-type: text/html; charset=utf-8');
//$barom["units"]=$pressureunit;
//echo $barom["units"];
?>
<meta http-equiv="Content-Type: text/html; charset=UTF-8" />
<style>
.weather34barometerarrowactual{-webkit-transform:rotate(<?php
if ($barom["units"]=='mb' OR $barom["units"]=="hPa"){echo $barom["now"]*0.02953*50.6;} else if($barom["units"]=="kPa"){echo $barom["now"]*0.2953*50.6;}else if ($barom["units"]=='inHg'){echo $barom["now"]*50.6;}?>deg);
transform:rotate(<?php if ($barom["units"]=='mb' OR $barom["units"]=="hPa" OR $barom["units"]=="kPa"){echo $barom["now"]*0.02953*50.6;}else if ($barom["units"]=='inHg'){echo $barom["now"]*50.6;}?>deg);}
.weather34barometerarrowmin{-webkit-transform:rotate(<?php 
if ($barom["units"]=='mb' OR $barom["units"]=="hPa" OR $barom["units"]=="kPa"){echo $barom["min"]*0.02953*50.6;}else if ($barom["units"]=='inHg'){echo $barom["min"]*50.6;}?>deg);
transform:rotate(<?php if ($barom["units"]=='mb' OR $barom["units"]=="hPa" OR $barom["units"]=="kPa"){echo $barom["min"]*0.02953*50.6;}else if ($barom["units"]=='inHg'){echo $barom["min"]*50.6;}?>deg);}
.weather34barometerarrowmax{-webkit-transform:rotate(<?php 
if ($barom["units"]=='mb' OR $barom["units"]=="hPa" OR $barom["units"]=="kPa"){echo $barom["max"]*0.02953*50.6;}else if ($barom["units"]=='inHg'){echo $barom["max"]*50.6;}?>deg);
transform:rotate(<?php if ($barom["units"]=='mb' OR $barom["units"]=="hPa" OR $barom["units"]=="kPa"){echo $barom["max"]*0.02953*50.6;}else if ($barom["units"]=='inHg'){echo $barom["max"]*50.6;}?>deg);}
</style>
<?php
if ($barom["units"]==="kPa"){$barom["now"]=$barom["now"]*0.1;
                                        $barom["trend"]=$barom["trend"]*0.1;
                                        $barom["min"]=$barom["min"]*0.1;
                                        $barom["max"]=$barom["max"]*0.1;}
?>
<div class="updatedtime"><span><?php if(file_exists($livedata)&&time()- filemtime($livedata)>300)echo $offline. '<offline> Offline </offline>';else echo $online." ".$weather["time"];?></div>  
<div class='barometermax'>
<?php echo '<div class=barometerorange><valuetext>Max ('.$barom["maxtime"].')<br><maxred><value>',$barom["max"],'</maxred>&nbsp;',$barom["units"],' </valuetext></div>';?></div>
<div class='barometermin'>
<?php echo '<div class=barometerblue><valuetext>Min ('.$barom["mintime"].')<br><minblue><value>',$barom["min"],'</minblue>&nbsp;',$barom["units"],' </valuetext></div>';?></div>

<div class="barometertrend2">
<?php  echo "<valuetext>&nbsp;&nbsp;Trend";
if ($barom["trend"] > 20  && $barom["trend"] < 100)  {echo '<rising><rise> '.$risingsymbol.' </rise><span><value>';echo number_format($barom["trend"],2), '</rising><units> ';echo $barom["units"], '</units>';}
else if ($barom["trend"] < 0) {
echo '<falling><fall> '.$fallingsymbol.'</fall><value> '; echo number_format($barom["trend"],2), '</falling><units> ';echo $barom["units"], '</units>';}
else if ($barom["trend"] > 0 && $barom["trend"] < 100) {
echo '<rising><rise>'.$risingsymbol.' </rise><value>&nbsp;';echo number_format($barom["trend"],2), '</rising><units> ';echo $barom["units"], '</units>';}	  
else echo '<ogreen> '.$steadysymbol.'</ogreen><steady><ogreen><value>Steady</ogreen></steady>';?></valuetext>
</div>

<div class="homeweathercompass2" >
<div class="homeweathercompass-line2">
<div class="weather34barometerarrowactual"></div>
<div class="weather34barometerarrowmin"></div>
<div class="weather34barometerarrowmax"></div>
</div>
<div class="text2"><div class="pressuretext">

</div>
<?php echo "<darkgrey>".$barom["now"],"&nbsp;<span>".$barom["units"]."</span>";?>
</div></div>

<div class="barometerconverter">
<?php echo "<div class=barometerconvertercircleblue>";
if ($barom["units"]=='mb' OR $barom["units"]=="hPa"){
    echo number_format($barom["now"]*0.029529983071445,2),"<smallrainunit>inHg</smallrainunit>";
} else  if ($barom["units"]=="kPa"){
    echo number_format($barom["now"]*0.29529983071445,2),"<smallrainunit>inHg</smallrainunit>";
} else if ($barom["units"]=='inHg'){
    echo round($barom["now"]*33.863886666667,1),"<smallrainunit>hPa</smallrainunit>";
}?>
</div></div>
</span>
<div class="barometerlimits"><div class='weather34-barometerruler'>
<?php if ($barom["units"]=='mb' OR $barom["units"]=="hPa"){
    echo "<weather34-barometerlimitmin><value>950</weather34-barometerlimitmin><weather34-barometerlimitmax><value>1050</weather34-barometerlimitmax>";
} 
else if ($barom["units"]=="kPa"){
    echo "<weather34-barometerlimitmin><value>95</weather34-barometerlimitmin><weather34-barometerlimitmax><value>105</weather34-barometerlimitmax>";
} else {
    echo "<weather34-barometerlimitminf><value>28</barometerlimitminf><weather34-barometerlimitmaxf><value>31</weather34-barometerlimitmaxf>";
}?>
</div></div>
