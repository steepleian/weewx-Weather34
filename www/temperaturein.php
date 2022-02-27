<?php 
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include('w34CombinedData.php');include('common.php');include('settings1.php');?>
<div class="updatedtime"><span><?php if(file_exists($livedata)&&time()- filemtime($livedata)>300)echo $offline. '<offline> Offline </offline>';else echo $online." ".$weather["time"];?></span></div>  
<div class="tempcontainer">
<div class="maxdata"><?php 
if ($weather["temp_today_high"]<10){echo "&nbsp;".$weather["temp_today_high"]."&deg;\n";?> | <?php echo $weather["temp_today_low"]."&deg;";}else if ($weather["temp_today_high"]>=10){echo $weather["temp_today_high"]."&deg;\n";?> | <?php echo $weather["temp_today_low"]."&deg;";}?>
</div>
<?php //weather34 sez lets make the temperature look nice 
     if(anyToC($weather['temp'])<=-10){echo '<div class=outsideminus10>'.number_format($weather['temp'],1).'<smalltempunit>&deg;'.$weather["temp_units"];}
else if(anyToC($weather['temp'])<=-5){echo  '<div class=outsideminus5>'.number_format($weather['temp'],1).'<smalltempunit>&deg;'.$weather["temp_units"];}
else if(anyToC($weather['temp'])<=0){ echo  '<div class=outsidezero>'.number_format($weather['temp'],1).'<smalltempunit>&deg;'.$weather["temp_units"];}
else if(anyToC($weather['temp'])<=5){ echo  '<div class=outside0-5>'.number_format($weather['temp'],1).'<smalltempunit>&deg;'.$weather["temp_units"];}
else if(anyToC($weather['temp'])<10){ echo  '<div class=outside6-10>'.number_format($weather['temp'],1).'<smalltempunit>&deg;'.$weather["temp_units"];}
else if(anyToC($weather['temp'])<15){ echo  '<div class=outside11-15>'.number_format($weather['temp'],1).'<smalltempunit>&deg;'.$weather["temp_units"];}
else if(anyToC($weather['temp'])<20){ echo  '<div class=outside16-20>'.number_format($weather['temp'],1).'<smalltempunit>&deg;'.$weather["temp_units"];}
else if(anyToC($weather['temp'])<25){ echo  '<div class=outside21-25>'.number_format($weather['temp'],1).'<smalltempunit>&deg;'.$weather["temp_units"];}
else if(anyToC($weather['temp'])<30){ echo  '<div class=outside26-30>'.number_format($weather['temp'],1).'<smalltempunit>&deg;'.$weather["temp_units"];}
else if(anyToC($weather['temp'])<35){ echo  '<div class=outside31-35>'.number_format($weather['temp'],1).'<smalltempunit>&deg;'.$weather["temp_units"];}
else if(anyToC($weather['temp'])<40){ echo  '<div class=outside36-40>'.number_format($weather['temp'],1).'<smalltempunit>&deg;'.$weather["temp_units"];}
else if(anyToC($weather['temp'])<45){ echo  '<div class=outside41-45>'.number_format($weather['temp'],1).'<smalltempunit>&deg;'.$weather["temp_units"];}
else if(anyToC($weather['temp'])<100){echo  '<div class=outside50>'.number_format($weather['temp'],1).'<smalltempunit>&deg;'.$weather["temp_units"];}
?></smalltempunit></div>
<div class="temptrendx">
<?php echo $weather["temp_trend"]."\n";
//falling
if($weather["temp_trend"]<0){echo '<trendmovementfallingx>&nbsp;&nbsp;&nbsp;<valuetext>Trend '.$fallingsymbol.' '.number_format($weather["temp_trend"],1).'&deg;</valuetext></trendmovementfallingx>';}
//rising
elseif($weather["temp_trend"]>0){echo '<trendmovementrisingx>&nbsp;&nbsp;&nbsp;<valuetext>Trend '.$risingsymbol.' '.number_format($weather["temp_trend"],1).'&deg;</valuetext></trendmovementfallingx>';}
//steady
else echo '<trendmovementsteadyx><valuetext>Trend '.$steadysymbol.'Steady</valuetext></trendmovementsteadyx>';?>
</div></div>
<div class="heatcircle"><div class="heatcircle-content">
<?php 
echo "<valuetextheading1>".$lang['Apparent']."</valuetextheading1>";?>
<a alt="weekly apparent" title="weekly apparent" href="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='apparentplot'&span='weekly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" data-lity > 
<?php  //apparent temp
     if(anyToC($weather["apptemp"])>=40){echo "<div class=tempconverter1><div class=tempmodulehome40-50c>".$weather["apptemp"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["apptemp"])>=35){echo "<div class=tempconverter1><div class=tempmodulehome35-40c>".$weather["apptemp"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["apptemp"])>=30){echo "<div class=tempconverter1><div class=tempmodulehome30-35c>".$weather["apptemp"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["apptemp"])>=25){echo "<div class=tempconverter1><div class=tempmodulehome25-30c>".$weather["apptemp"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["apptemp"])>=20){echo "<div class=tempconverter1><div class=tempmodulehome20-25c>".$weather["apptemp"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["apptemp"])>=15){echo "<div class=tempconverter1><div class=tempmodulehome15-20c>".$weather["apptemp"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["apptemp"])>=10){echo "<div class=tempconverter1><div class=tempmodulehome10-15c>".$weather["apptemp"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["apptemp"])>=5 ){echo "<div class=tempconverter1><div class=tempmodulehome5-10c>".$weather["apptemp"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["apptemp"])>=0 ){echo "<div class=tempconverter1><div class=tempmodulehome0-5c>".$weather["apptemp"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["apptemp"])>-10){echo "<div class=tempconverter1><div class=tempmodulehome-10-0c>".$weather["apptemp"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["apptemp"])>-50){echo "<div class=tempconverter1><div class=tempmodulehome-50-10c>".$weather["apptemp"]."&deg;<smalltempunit2>".$weather["temp_units"];}
?></smalltempunit2></a></div></div></div>
<div class="heatcircle2"><div class="heatcircle-content"><valuetextheading1>Avg <?php echo $lang['Today']?></valuetextheading1>
<?php //avg today
     if (anyToC($weather["temp_avgtoday"])>=40){echo "<div class=tempconverter1><div class=tempmodulehome40-50c>". $weather["temp_avgtoday"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if (anyToC($weather["temp_avgtoday"])>=35){echo "<div class=tempconverter1><div class=tempmodulehome35-40c>". $weather["temp_avgtoday"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if (anyToC($weather["temp_avgtoday"])>=30){echo "<div class=tempconverter1><div class=tempmodulehome30-35c>". $weather["temp_avgtoday"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if (anyToC($weather["temp_avgtoday"])>=25){echo "<div class=tempconverter1><div class=tempmodulehome25-30c>". $weather["temp_avgtoday"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if (anyToC($weather["temp_avgtoday"])>=20){echo "<div class=tempconverter1><div class=tempmodulehome20-25c>". $weather["temp_avgtoday"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if (anyToC($weather["temp_avgtoday"])>=15){echo "<div class=tempconverter1><div class=tempmodulehome15-20c>". $weather["temp_avgtoday"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if (anyToC($weather["temp_avgtoday"])>=10){echo "<div class=tempconverter1><div class=tempmodulehome10-15c>". $weather["temp_avgtoday"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if (anyToC($weather["temp_avgtoday"])>5)  {echo "<div class=tempconverter1><div class=tempmodulehome5-10c>".  $weather["temp_avgtoday"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if (anyToC($weather["temp_avgtoday"])>=0) {echo "<div class=tempconverter1><div class=tempmodulehome0-5c>".   $weather["temp_avgtoday"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if (anyToC($weather["temp_avgtoday"])>-10){echo "<div class=tempconverter1><div class=tempmodulehome-10-0c>". $weather["temp_avgtoday"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if (anyToC($weather["temp_avgtoday"])>-50){echo "<div class=tempconverter1><div class=tempmodulehome-50-10c>".$weather["temp_avgtoday"]."&deg;<smalltempunit2>".$weather["temp_units"];}
?></smalltempunit2></div></div></div></div>
<div class="heatcircle3"><div class="heatcircle-content"><valuetextheading1><?php echo $lang['Humidity']?></valuetextheading1>
<a alt="weekly humidity" title="weekly humidity" href="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='humidityplot'&span='weekly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" data-lity > 
<?php //humidity
     if ($weather["humidity"]>90){echo "<div class=tempconverter1><div class=temphumcircle80-100>".$weather["humidity"];}
else if ($weather["humidity"]>70){echo "<div class=tempconverter1><div class=temphumcircle60-80>".$weather["humidity"];}
else if ($weather["humidity"]>35){echo "<div class=tempconverter1><div class=temphumcircle35-60>".$weather["humidity"];}
else if ($weather["humidity"]>25){echo "<div class=tempconverter1><div class=temphumcircle25-35>".$weather["humidity"];}
else if ($weather["humidity"]<=25){echo "<div class=tempconverter1><div class=temphumcircle0-25>".$weather["humidity"];}?><smalltempunit2>%</smalltempunit2>
<?php //humidity trend
if($weather["humidity_trend"]>0){echo '&nbsp;'.$risingsymbol;}else if($weather["humidity_trend"]<0){echo '&nbsp;'.$fallingsymbol;}else{ echo '';}?></a></div></div></div></div>
<div class="heatcircle4"><div class="heatcircle-content"><valuetextheading1><?php echo $lang['Dewpoint']?></valuetextheading1>
<a alt="weekly dewpoint" title="weekly dewpoint" href="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='dewpointplot'&span='weekly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" data-lity > 
<?php //dewpoint
     if(anyToC($weather["dewpoint"])>21) {echo "<div class=tempconverter1><div class=tempmodulehome25-30c>&nbsp;".$weather['dewpoint'].'&deg;<smalltempunit2>'.$weather["temp_units"];}
else if(anyToC($weather["dewpoint"])>=20){echo "<div class=tempconverter1><div class=tempmodulehome20-25c>&nbsp;".$weather['dewpoint'].'&deg;<smalltempunit2>'.$weather["temp_units"];}
else if(anyToC($weather["dewpoint"])>=15){echo "<div class=tempconverter1><div class=tempmodulehome15-20c>&nbsp;".$weather['dewpoint'].'&deg;<smalltempunit2>'.$weather["temp_units"];}
else if(anyToC($weather["dewpoint"])>=10){echo "<div class=tempconverter1><div class=tempmodulehome10-15c>&nbsp;".$weather['dewpoint'].'&deg;<smalltempunit2>'.$weather["temp_units"];}
else if(anyToC($weather["dewpoint"])>5)  {echo "<div class=tempconverter1><div class=tempmodulehome5-10c>&nbsp;".$weather['dewpoint'].'&deg;<smalltempunit2>'.$weather["temp_units"];}
else if(anyToC($weather["dewpoint"])>=0) {echo "<div class=tempconverter1><div class=tempmodulehome0-5c>&nbsp;".$weather['dewpoint'].'&deg;<smalltempunit2>'.$weather["temp_units"];}
else if(anyToC($weather["dewpoint"])>-10){echo "<div class=tempconverter1><div class=tempmodulehome-10-0c>&nbsp;".$weather['dewpoint'].'&deg;<smalltempunit2>'.$weather["temp_units"];}
else if(anyToC($weather["dewpoint"])>-50){echo "<div class=tempconverter1><div class=tempmodulehome-50-10c>&nbsp;".$weather['dewpoint'].'&deg;<smalltempunit2>'.$weather["temp_units"];}
?></smalltempunit2>
<?php //dewpoint trend
if($weather["dewpoint_trend"]>0){echo '&nbsp;'.$risingsymbol;}else if($weather["dewpoint_trend"]<0){echo '&nbsp;'.$fallingsymbol;}else{ echo '';}?></a></div></div></div></div></div>
<div class="tempconverter2">
<?php
 //Temp
     if(anyToC($weather["temp"])<-10){echo "<div class=tempconvertercircleminus10>".(($weather["temp_units"]=='F')?anyToC($weather["temp"])."&deg;<smalltempunit2>C":anyToF($weather["temp"])."&deg;<smalltempunit2>F");}
else if(anyToC($weather["temp"])<-5) {echo "<div class=tempconvertercircleminus5>".(($weather["temp_units"]=='F')?anyToC($weather["temp"])."&deg;<smalltempunit2>C":anyToF($weather["temp"])."&deg;<smalltempunit2>F");}
else if(anyToC($weather["temp"])<0)  {echo "<div class=tempconvertercircleminus>".(($weather["temp_units"]=='F')?anyToC($weather["temp"])."&deg;<smalltempunit2>C":anyToF($weather["temp"])."&deg;<smalltempunit2>F");}
else if(anyToC($weather["temp"])<5)  {echo "<div class=tempconvertercircle0-5>".(($weather["temp_units"]=='F')?anyToC($weather["temp"])."&deg;<smalltempunit2>C":anyToF($weather["temp"])."&deg;<smalltempunit2>F");}
else if(anyToC($weather["temp"])<10) {echo "<div class=tempconvertercircle6-10>".(($weather["temp_units"]=='F')?anyToC($weather["temp"])."&deg;<smalltempunit2>C":anyToF($weather["temp"])."&deg;<smalltempunit2>F");}
else if(anyToC($weather["temp"])<15) {echo "<div class=tempconvertercircle11-15>".(($weather["temp_units"]=='F')?anyToC($weather["temp"])."&deg;<smalltempunit2>C":anyToF($weather["temp"])."&deg;<smalltempunit2>F");}
else if(anyToC($weather["temp"])<20) {echo "<div class=tempconvertercircle16-20>".(($weather["temp_units"]=='F')?anyToC($weather["temp"])."&deg;<smalltempunit2>C":anyToF($weather["temp"])."&deg;<smalltempunit2>F");}
else if(anyToC($weather["temp"])<25) {echo "<div class=tempconvertercircle21-25>".(($weather["temp_units"]=='F')?anyToC($weather["temp"])."&deg;<smalltempunit2>C":anyToF($weather["temp"])."&deg;<smalltempunit2>F");}
else if(anyToC($weather["temp"])<30) {echo "<div class=tempconvertercircle26-30>".(($weather["temp_units"]=='F')?anyToC($weather["temp"])."&deg;<smalltempunit2>C":anyToF($weather["temp"])."&deg;<smalltempunit2>F");}
else if(anyToC($weather["temp"])<35) {echo "<div class=tempconvertercircle31-35>".(($weather["temp_units"]=='F')?anyToC($weather["temp"])."&deg;<smalltempunit2>C":anyToF($weather["temp"])."&deg;<smalltempunit2>F");}
else if(anyToC($weather["temp"])<40) {echo "<div class=tempconvertercircle36-40>".(($weather["temp_units"]=='F')?anyToC($weather["temp"])."&deg;<smalltempunit2>C":anyToF($weather["temp"])."&deg;<smalltempunit2>F");}
else if(anyToC($weather["temp"])<45) {echo "<div class=tempconvertercircle41-45>".(($weather["temp_units"]=='F')?anyToC($weather["temp"])."&deg;<smalltempunit2>C":anyToF($weather["temp"])."&deg;<smalltempunit2>F");}
else if(anyToC($weather["temp"])<100){echo "<div class=tempconvertercircle50>".(($weather["temp_units"]=='F')?anyToC($weather["temp"])."&deg;<smalltempunit2>C":anyToF($weather["temp"])."&deg;<smalltempunit2>F");}
?></smalltempunit2></div></div>
<div class="tempindoorextra">
<valuetextheading2><?php echo $lang['IndoorTemp']?></valuetextheading1>
<a alt="weekly indoor" title="weekly indoor" href="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='indoorplot'&span='weekly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" data-lity >
<?php  //Indoor
     if (anyToC($weather["temp_indoor"])>=25){echo "<div class=intempmodulehome25-30c>&nbsp;".$hometemp."&nbsp;".$weather["temp_indoor"]. "&deg;</tsred><smalltempunit4>" .$weather["temp_units"];}
else if (anyToC($weather["temp_indoor"])>=20){echo "<div class=intempmodulehome20-25c>&nbsp;".$hometemp."&nbsp;".$weather["temp_indoor"]. "&deg;</tsorange><smalltempunit4>" .$weather["temp_units"];}
else if (anyToC($weather["temp_indoor"])>=15){echo "<div class=intempmodulehome15-20c>&nbsp;".$hometemp."&nbsp;".$weather["temp_indoor"]. "&deg;</tsyellow><smalltempunit4>" .$weather["temp_units"];}
else if (anyToC($weather["temp_indoor"])>=10){echo "<div class=intempmodulehome10-15c>&nbsp;".$hometemp."&nbsp;".$weather["temp_indoor"]. "&deg;</tsyellow><smalltempunit4>" .$weather["temp_units"];}
else if (anyToC($weather["temp_indoor"])>0){echo "<div class=intempmodulehome0-5c>&nbsp;".$hometemp."&nbsp;".$weather["temp_indoor"]. "&deg;</tsblue><smalltempunit4>" .$weather["temp_units"];}
?></smalltempunit4>&nbsp;<?php if($weather["temp_indoor_trend"] >0)echo $risingsymbol;else if($weather["temp_indoor_trend"]<0)echo $fallingsymbol;
?></a></div></div>
<div class="tempindoorextra1">
<valuetextheading2><?php echo $lang['Heatindex']?></valuetextheading1>
<a alt="weekly heatindex" title="weekly derivedtemp" href="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='tempderivedplot'&span='weekly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" data-lity > 
<?php  //HeatIndex
     if(anyToC($weather["heatindex"])>=25){echo "<div class=tempmodulehome40-50c>".$weather["heatindex"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["heatindex"])>=35){echo "<div class=tempmodulehome35-40c>".$weather["heatindex"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["heatindex"])>=30){echo "<div class=tempmodulehome30-35c>".$weather["heatindex"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["heatindex"])>=25){echo "<div class=tempmodulehome25-30c>".$weather["heatindex"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["heatindex"])>=20){echo "<div class=tempmodulehome20-25c>".$weather["heatindex"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["heatindex"])>=15){echo "<div class=tempmodulehome15-20c>".$weather["heatindex"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["heatindex"])>=10){echo "<div class=tempmodulehome10-15c>".$weather["heatindex"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["heatindex"])>=5 ){echo "<div class=tempmodulehome5-10c>".$weather["heatindex"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["heatindex"])>=0 ){echo "<div class=tempmodulehome0-5c>".$weather["heatindex"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["heatindex"])>-10){echo "<div class=tempmodulehome-10-0c>".$weather["heatindex"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["heatindex"])>-50){echo "<div class=tempmodulehome-50-10c>".$weather["heatindex"]."&deg;<smalltempunit2>".$weather["temp_units"];}
?></smalltempunit2></a></div></div>
<div class="tempindoorextra2">
<valuetextheading2><?php echo $lang['Windchill']?></valuetextheading1>
<a alt="weekly windchill" title="weekly derivedtemp" href="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='tempderivedplot'&span='weekly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" data-lity > 
<?php  //HeatIndex
     if(anyToC($weather["windchill"])>=25){echo "<div class=tempmodulehome40-50c>".$weather["windchill"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["windchill"])>=35){echo "<div class=tempmodulehome35-40c>".$weather["windchill"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["windchill"])>=30){echo "<div class=tempmodulehome30-35c>".$weather["windchill"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["windchill"])>=25){echo "<div class=tempmodulehome25-30c>".$weather["windchill"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["windchill"])>=20){echo "<div class=tempmodulehome20-25c>".$weather["windchill"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["windchill"])>=15){echo "<div class=tempmodulehome15-20c>".$weather["windchill"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["windchill"])>=10){echo "<div class=tempmodulehome10-15c>".$weather["windchill"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["windchill"])>=5 ){echo "<div class=tempmodulehome5-10c>".$weather["windchill"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["windchill"])>=0 ){echo "<div class=tempmodulehome0-5c>".$weather["windchill"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["windchill"])>-10){echo "<div class=tempmodulehome-10-0c>".$weather["windchill"]."&deg;<smalltempunit2>".$weather["temp_units"];}
else if(anyToC($weather["windchill"])>-50){echo "<div class=tempmodulehome-50-10c>".$weather["windchill"]."&deg;<smalltempunit2>".$weather["temp_units"];}
?></smalltempunit2></a></div>
</div> 
