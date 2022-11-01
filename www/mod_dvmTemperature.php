<?php
include('dvmCombinedData.php');include('common.php');include('settings1.php');
if ($theme === "dark")
{$bordercolor = "#393d40";}
else if ($theme === "light")
{$bordercolor = "#e9ebf1";}



if(anyToC($temp["apptemp"])<=-10){$apptempcolor = "#8781bd";}
else if(anyToC($temp["apptemp"])<=0){$apptempcolor = "#487ea9";}
else if(anyToC($temp["apptemp"])<=5){$apptempcolor = "#3b9cac";}
else if(anyToC($temp["apptemp"])<10){$apptempcolor = "#9aba2f";}
else if(anyToC($temp["apptemp"])<20){$apptempcolor = "#e6a141";}
else if(anyToC($temp["apptemp"])<25){$apptempcolor = "#ec5a34";}
else if(anyToC($temp["apptemp"])<30){$apptempcolor = "#d05f2d";}
else if(anyToC($temp["apptemp"])<35){$apptempcolor = "#d65b4a";}
else if(anyToC($temp["apptemp"])<40){$apptempcolor = "#dc4953";}
else if(anyToC($temp["apptemp"])<100){$apptempcolor = "#e26870";}

if(anyToC($temp["outside_day_avg"])<=-10){$avgtempcolor = "#8781bd";}
else if(anyToC($temp["outside_day_avg"])<=0){$avgtempcolor = "#487ea9";}
else if(anyToC($temp["outside_day_avg"])<=5){$avgtempcolor = "#3b9cac";}
else if(anyToC($temp["outside_day_avg"])<10){$avgtempcolor = "#9aba2f";}
else if(anyToC($temp["outside_day_avg"])<20){$avgtempcolor = "#e6a141";}
else if(anyToC($temp["outside_day_avg"])<25){$avgtempcolor = "#ec5a34";}
else if(anyToC($temp["outside_day_avg"])<30){$avgtempcolor = "#d05f2d";}
else if(anyToC($temp["outside_day_avg"])<35){$avgtempcolor = "#d65b4a";}
else if(anyToC($temp["outside_day_avg"])<40){$avgtempcolor = "#dc4953";}
else if(anyToC($temp["outside_day_avg"])<100){$avgtempcolor = "#e26870";}

if($humid["now"]>90){$humidcolor = "#4e95a0";}
else if($humid["now"]>70){$humidcolor = "#e6a141";}
else if($humid["now"]>35){$humidcolor = "#90b12a";}
else if($humid["now"]>25){$humidcolor = "#d05f2d";}
else if($humid["now"]<=25){$humidcolor = "#d35d4e";}


if(anyToC($dew["now"])<=-10){$dewcolor = "#8781bd";}
else if(anyToC($dew["now"])<=0){$dewcolor = "#487ea9";}
else if(anyToC($dew["now"])<=5){$dewcolor = "#3b9cac";}
else if(anyToC($dew["now"])<10){$dewcolor = "#9aba2f";}
else if(anyToC($dew["now"])<20){$dewcolor = "#e6a141";}
else if(anyToC($dew["now"])<25){$dewcolor = "#ec5a34";}
else if(anyToC($dew["now"])<30){$dewcolor = "#d05f2d";}
else if(anyToC($dew["now"])<35){$dewcolor = "#d65b4a";}
else if(anyToC($dew["now"])<40){$dewcolor = "#dc4953";}
else if(anyToC($dew["now"])<100){$dewcolor = "#e26870";}

if(anyToC($temp["indoor_now"])<=-10){$indoorcolor = "#8781bd";}
else if(anyToC($temp["indoor_now"])<=0){$indoorcolor = "#487ea9";}
else if(anyToC($temp["indoor_now"])<=5){$indoorcolor = "#3b9cac";}
else if(anyToC($temp["indoor_now"])<10){$indoorcolor = "#9aba2f";}
else if(anyToC($temp["indoor_now"])<20){$indoorcolor = "#e6a141";}
else if(anyToC($temp["indoor_now"])<25){$indoorcolor = "#ec5a34";}
else if(anyToC($temp["indoor_now"])<30){$indoorcolor = "#d05f2d";}
else if(anyToC($temp["indoor_now"])<35){$indoorcolor = "#d65b4a";}
else if(anyToC($temp["indoor_now"])<40){$indoorcolor = "#dc4953";}
else if(anyToC($temp["indoor_now"])<100){$indoorcolor = "#e26870";}

if(anyToC($temp["heatindex"])<=-10){$heatcolor = "#8781bd";}
else if(anyToC($temp["heatindex"])<=0){$heatcolor = "#487ea9";}
else if(anyToC($temp["heatindex"])<=5){$heatcolor = "#3b9cac";}
else if(anyToC($temp["heatindex"])<10){$heatcolor = "#9aba2f";}
else if(anyToC($temp["heatindex"])<20){$heatcolor = "#e6a141";}
else if(anyToC($temp["heatindex"])<25){$heatcolor = "#ec5a34";}
else if(anyToC($temp["heatindex"])<30){$heatcolor = "#d05f2d";}
else if(anyToC($temp["heatindex"])<35){$heatcolor = "#d65b4a";}
else if(anyToC($temp["heatindex"])<40){$heatcolor = "#dc4953";}
else if(anyToC($temp["heatindex"])<100){$heatcolor = "#e26870";}

if(anyToC($temp["windchill"])<=-10){$chillcolor = "#8781bd";}
else if(anyToC($temp["windchill"])<=0){$chillcolor = "#487ea9";}
else if(anyToC($temp["windchill"])<=5){$chillcolor = "#3b9cac";}
else if(anyToC($temp["windchill"])<10){$chillcolor = "#9aba2f";}
else if(anyToC($temp["windchill"])<20){$chillcolor = "#e6a141";}
else if(anyToC($temp["windchill"])<25){$chillcolor = "#ec5a34";}
else if(anyToC($temp["windchill"])<30){$chillcolor = "#d05f2d";}
else if(anyToC($temp["windchill"])<35){$chillcolor = "#d65b4a";}
else if(anyToC($temp["windchill"])<40){$chillcolor = "#dc4953";}
else if(anyToC($temp["windchill"])<100){$chillcolor = "#e26870";}

;?>

<html>
<div class="updatedtime"><span><?php if(file_exists($livedata)&&time()- filemtime($livedata)>300)echo $offline. '<offline> Offline </offline>';else echo $online." ".$weather["time"];?></span></div>



<iframe style="width: auto; height: 155px; overflow: hidden; border: 0px;" src="dvmThermometer.php"></iframe>



<style>
div.temperature {
  
  font-family: weathertext2;
  text-align: center;
  border-collapse: separate;
  border-spacing: 12px 1px;
}
.divTable.temperature .divTableCell, .divTable.temperature .divTableHead {
  padding: 1px 1px;
   
}
.divTable.temperature .divTableBody .divTableCell {
  font-size: .65em;
}
.divTable.temperature .divTableHeading {
  }
.divTable.temperature .divTableHeading .divTableHead {
  font-size: .7em;
  font-weight: normal;
  text-align: center;
}
/* DivTable.com */
.divTable{ display: table; }
.divTableRow { display: table-row; }
.divTableHeading { display: table-header-group;}
.divTableCell, .divTableHead { display: table-cell;}
.divTableCell { 
border: 1px solid <?php echo $bordercolor;?>;
border-left: 5px solid <?php echo $bordercolor;?>;
border-radius: 2px;

}
.divTableHeading { display: table-header-group;}
.divTableFoot { display: table-footer-group;}
.divTableBody { display: table-row-group;}

.tempconverter3 {
  position: absolute;
  margin-top: -25px;
  font-size: 12px;
  margin-left: 162px
}



</style>
<div class="TTable" style="position:relative; top: -120px; left: 85px;">

<div class="tempconverter3">
<?php
 //Temp
     if(anyToC($temp["outside_now"])<-10){echo "<div class=tempconvertercircleminus10>".(($temp["units"]=='F')?anyToC($temp["outside_now"])."&deg;<smalltempunit2>C":anyToF($temp["outside_now"])."&deg;<smalltempunit2>F");}
else if(anyToC($temp["outside_now"])<-5) {echo "<div class=tempconvertercircleminus5>".(($temp["units"]=='F')?anyToC($temp["outside_now"])."&deg;<smalltempunit2>C":anyToF($temp["outside_now"])."&deg;<smalltempunit2>F");}
else if(anyToC($temp["outside_now"])<0)  {echo "<div class=tempconvertercircleminus>".(($temp["units"]=='F')?anyToC($temp["outside_now"])."&deg;<smalltempunit2>C":anyToF($temp["outside_now"])."&deg;<smalltempunit2>F");}
else if(anyToC($temp["outside_now"])<5)  {echo "<div class=tempconvertercircle0-5>".(($temp["units"]=='F')?anyToC($temp["outside_now"])."&deg;<smalltempunit2>C":anyToF($temp["outside_now"])."&deg;<smalltempunit2>F");}
else if(anyToC($temp["outside_now"])<10) {echo "<div class=tempconvertercircle6-10>".(($temp["units"]=='F')?anyToC($temp["outside_now"])."&deg;<smalltempunit2>C":anyToF($temp["outside_now"])."&deg;<smalltempunit2>F");}
else if(anyToC($temp["outside_now"])<15) {echo "<div class=tempconvertercircle11-15>".(($temp["units"]=='F')?anyToC($temp["outside_now"])."&deg;<smalltempunit2>C":anyToF($temp["outside_now"])."&deg;<smalltempunit2>F");}
else if(anyToC($temp["outside_now"])<20) {echo "<div class=tempconvertercircle16-20>".(($temp["units"]=='F')?anyToC($temp["outside_now"])."&deg;<smalltempunit2>C":anyToF($temp["outside_now"])."&deg;<smalltempunit2>F");}
else if(anyToC($temp["outside_now"])<25) {echo "<div class=tempconvertercircle21-25>".(($temp["units"]=='F')?anyToC($temp["outside_now"])."&deg;<smalltempunit2>C":anyToF($temp["outside_now"])."&deg;<smalltempunit2>F");}
else if(anyToC($temp["outside_now"])<30) {echo "<div class=tempconvertercircle26-30>".(($temp["units"]=='F')?anyToC($temp["outside_now"])."&deg;<smalltempunit2>C":anyToF($temp["outside_now"])."&deg;<smalltempunit2>F");}
else if(anyToC($temp["outside_now"])<35) {echo "<div class=tempconvertercircle31-35>".(($temp["units"]=='F')?anyToC($temp["outside_now"])."&deg;<smalltempunit2>C":anyToF($temp["outside_now"])."&deg;<smalltempunit2>F");}
else if(anyToC($temp["outside_now"])<40) {echo "<div class=tempconvertercircle36-40>".(($temp["units"]=='F')?anyToC($temp["outside_now"])."&deg;<smalltempunit2>C":anyToF($temp["outside_now"])."&deg;<smalltempunit2>F");}
else if(anyToC($temp["outside_now"])<45) {echo "<div class=tempconvertercircle41-45>".(($temp["units"]=='F')?anyToC($temp["outside_now"])."&deg;<smalltempunit2>C":anyToF($temp["outside_now"])."&deg;<smalltempunit2>F");}
else if(anyToC($temp["outside_now"])<100){echo "<div class=tempconvertercircle50>".(($temp["units"]=='F')?anyToC($temp["outside_now"])."&deg;<smalltempunit2>C":anyToF($temp["outside_now"])."&deg;<smalltempunit2>F");}
?></smalltempunit2></div></div>




<div class="divTable temperature">
<div class="divTableHeading">
<div class="divTableRow">
<div class="divTableHead">Max | Min</div>
<div class="divTableHead">Apparent</div>
<div class="divTableHead">Avg Today</div>
</div>
</div>
<div class="divTableBody">
<div class="divTableRow">
<div class="divTableCell"><?php 
if ($temp["outside_day_max"]<10){echo "&nbsp;".$temp["outside_day_max"]."&deg;".$temp["units"]."\n";?> | <?php echo $temp["outside_day_min"]."&deg;".$temp["units"];}else if ($temp["outside_day_max"]>=10){echo $temp["outside_day_max"]."&deg;".$temp["units"]."\n";?> | <?php echo $temp["outside_day_min"]."&deg;".$temp["units"];}?>
</div>

<div class="divTableCell" style="border-left: 5px solid <?php echo $apptempcolor; ?>; padding: 1px 1px;"><?php echo $temp["apptemp"]."&deg;".$temp["units"];?></div>
<div class="divTableCell" style="border-left: 5px solid <?php echo $avgtempcolor; ?>;"><?php //avg today
     echo $temp["outside_day_avg"]."&deg;".$temp["units"];?></div>
</div>
</div>
  <div class="divTableHeading">
<div class="divTableRow">
<div class="divTableHead">Trend</div>
<div class="divTableHead">Humidity</div>
<div class="divTableHead">Dewpoint</div>
</div>
</div>
  <div class="divTableBody">
<div class="divTableRow">
<div class="divTableCell"><?php echo $temp["outside_trend"].'&deg;' ?><smalltempunit2><?php echo $temp["units"];?></smalltempunit2><?php 
if($temp["outside_trend"]>0){echo '&nbsp;'.$risingsymbol;}else if($temp["outside_trend"]<0){echo '&nbsp;'.$fallingsymbol;}else{ echo '&nbsp;'.$steadysymbol;}?></div>




<div class="divTableCell" style="border-left: 5px solid <?php echo $humidcolor; ?>;"><?php echo $humid["now"]; ?><smalltempunit2>%</smalltempunit2><?php //humidity trend
if($humid["trend"]>0){echo '&nbsp;'.$risingsymbol;}else if($humid["trend"]<0){echo '&nbsp;'.$fallingsymbol;}else{ echo '';}?></div>

<div class="divTableCell" style="border-left: 5px solid <?php echo $dewcolor; ?>;"><?php //dewpoint
echo "&nbsp;".$dew["now"].'&deg;<smalltempunit2>'.$temp["units"];?><?php //dewpoint trend
if($dew["trend"]>0){echo '&nbsp;'.$risingsymbol;}else if($dew["trend"]<0){echo '&nbsp;'.$fallingsymbol;}else{ echo '';}?></div>
</div>
</div>





  <div class="divTableHeading">
<div class="divTableRow">
<div class="divTableHead">Indoor Temp</div>
<div class="divTableHead">Heat Index</div>
<div class="divTableHead">Windchill</div>
</div>
</div>
    <div class="divTableBody">
<div class="divTableRow">
<div class="divTableCell" style="border-left: 5px solid <?php echo $indoorcolor; ?>;"><?php echo "&nbsp;".$hometemp."&nbsp;".$temp["indoor_now"]. "&deg;" .$temp["units"];?></div>

<div class="divTableCell" style="border-left: 5px solid <?php echo $heatcolor; ?>;"><?php echo $temp["heatindex"]."&deg;".$temp["units"];?></div>
<div class="divTableCell" style="border-left: 5px solid <?php echo $chillcolor; ?>;"><?php echo $temp["windchill"]."&deg;".$temp["units"];?></div>


</div>
</div>
</div>
</html>


