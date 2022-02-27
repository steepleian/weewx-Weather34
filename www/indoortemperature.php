<?php include('w34CombinedData.php');include('common.php');?>
<div class="updatedtime"><span><?php if(file_exists($livedata)&&time()- filemtime($livedata)>300)echo $offline. '<offline> Offline </offline>';else echo $online." ".$weather["time"];?></div><br />
<div class="tempindoorconverter">
<?php //chuck
if($weather["temp_units"]=='F' &&  anyToC($weather["temp_indoor"])>=30){echo "<div class=tempconvertercirclered><tred>".anyToC($weather["temp_indoor"])."</tred>&deg;<smalltempunit2>C" ;}
else if($weather["temp_units"]=='F' &&  anyToC($weather["temp_indoor"])>=25){echo "<div class=tempconvertercircleorange><torange>".anyToC($weather["temp_indoor"])."</torange>&deg;<smalltempunit2>C" ;}
else if($weather["temp_units"]=='F' && anyToC($weather["temp_indoor"])>=18){echo "<div class=tempconvertercircleyellow>".anyToC($weather["temp_indoor"])."&deg;<smalltempunit2>C" ;}
else if($weather["temp_units"]=='F' &&  anyToC($weather["temp_indoor"])>=10){echo "<div class=tempconvertercirclegreen>".anyToC($weather["temp_indoor"])."&deg;<smalltempunit2>C" ;}
else if($weather["temp_units"]=='F' && anyToC($weather["temp_indoor"])<10){echo "<div class=tempconvertercircleblue>".anyToC($weather["temp_indoor"])."&deg;<smalltempunit2>C" ;}
else if( $weather["temp_units"]=='C' &&  anyToC($weather["temp_indoor"])>=30){echo "<div class=tempconvertercirclered><tred>".anyToF($weather["temp_indoor"])."</tred>&deg;<smalltempunit2>F" ;}
else if( $weather["temp_units"]=='C' &&  anyToC($weather["temp_indoor"])>=25){echo "<div class=tempconvertercircleorange><torange>".anyToF($weather["temp_indoor"])."</torange>&deg;<smalltempunit2>F" ;}
else if( $weather["temp_units"]=='C' &&  anyToC($weather["temp_indoor"])>=18){echo "<div class=tempconvertercircleyellow>".anyToF($weather["temp_indoor"])."&deg;<smalltempunit2>F" ;}
else if( $weather["temp_units"]=='C' &&  anyToC($weather["temp_indoor"])>=10){echo "<div class=tempconvertercirclegreen>".anyToF($weather["temp_indoor"])."&deg;<smalltempunit2>F" ;}
else if( $weather["temp_units"]=='C' && anyToC($weather["temp_indoor"])<10){echo "<div class=tempconvertercircleblue>".anyToF($weather["temp_indoor"])."&deg;<smalltempunit2>F" ;}
?></smalltempunit2></div></div>
<div class="indoortrendhouse1">Indoor</oorange></div>  
<div class="indoorhomesvg1">
<svg id="weather34 indoor house" width="138pt" height="128pt" viewBox="0 0 475 497" version="30092018" fill="currentcolor">
<path d=" M 211.42 96.39 C 219.31 93.33 229.02 94.82 235.24 100.72 C 248.26 113.57 261.09 126.66 274.50 139.11 C 274.67 130.74 274.26 122.36 274.67 114.00 C 275.00 106.78 281.80 100.82 288.94 100.98 C 299.32 101.01 309.70 100.99 320.08 100.99 C 328.19 101.00 335.21 108.86 334.03 116.97 C 333.93 143.01 334.05 169.04 333.97 195.07 C 333.94 196.71 333.92 198.57 335.39 199.65 C 345.35 209.34 355.26 219.08 365.19 228.80 C 368.20 231.79 371.69 234.49 373.60 238.39 C 376.82 244.35 376.98 251.89 373.92 257.95 C 370.54 265.08 362.95 270.12 355.02 270.16 C 348.03 270.32 341.04 270.18 334.05 270.20 C 333.91 304.45 334.07 338.71 333.96 372.96 C 257.99 372.94 182.01 372.95 106.04 372.96 C 105.93 338.71 106.09 304.45 105.95 270.20 C 98.96 270.18 91.96 270.32 84.98 270.16 C 76.81 270.07 68.98 264.78 65.78 257.28 C 62.30 249.81 63.74 240.43 69.22 234.29 C 97.88 205.26 127.47 177.17 156.23 148.23 C 169.74 134.74 183.40 121.40 197.03 108.04 C 201.58 103.90 205.47 98.61 211.42 96.39 M 210.66 108.63 C 196.77 122.41 182.90 136.21 168.90 149.88 C 139.19 178.84 110.04 208.38 80.23 237.23 C 77.80 239.59 75.27 242.13 74.35 245.50 C 72.16 252.29 77.88 260.06 84.97 260.31 C 95.24 260.46 105.53 260.38 115.81 260.31 C 115.81 294.66 115.67 329.00 115.70 363.35 C 185.23 363.42 254.77 363.42 324.31 363.35 C 324.33 329.00 324.19 294.66 324.20 260.31 C 334.14 260.42 344.09 260.38 354.04 260.37 C 357.75 260.43 361.45 258.63 363.66 255.64 C 367.05 251.37 366.91 244.85 363.13 240.86 C 350.32 228.69 337.96 216.05 325.35 203.68 C 323.83 202.61 324.21 200.65 324.11 199.06 C 324.19 172.02 324.09 144.98 324.17 117.95 C 324.12 115.98 324.22 113.74 322.84 112.16 C 320.96 110.54 318.31 110.92 316.03 110.83 C 307.33 110.92 298.63 110.79 289.94 110.88 C 287.54 110.71 284.49 112.24 284.71 115.00 C 284.50 131.07 284.78 147.14 284.59 163.22 C 280.42 159.80 276.82 155.78 272.94 152.06 C 258.16 137.50 243.58 122.74 228.68 108.30 C 223.87 103.44 215.31 103.67 210.66 108.63 Z" /><path  d=" M 138.23 285.20 C 138.85 285.82 138.85 285.82 138.23 285.20 Z" /><path d=" M 141.13 289.24 C 144.43 289.45 139.58 292.30 141.13 289.24 Z" /><path d=" M 142.14 292.22 C 142.76 292.84 142.76 292.84 142.14 292.22 Z" /><path d=" M 141.21 294.42 C 142.54 294.64 142.77 295.37 141.89 296.61 C 140.56 296.40 140.33 295.67 141.21 294.42 Z" /><path d=" M 140.24 298.22 C 140.86 298.84 140.86 298.84 140.24 298.22 Z" /><path d=" M 133.21 300.21 C 133.83 300.83 133.83 300.83 133.21 300.21 Z" /><path d=" M 138.21 300.20 C 138.83 300.82 138.83 300.82 138.21 300.20 Z" /></svg></div>
<div class="indoorhomevalue1">
<?php //temperture indoor celsius
 if (anyToC($weather["temp_indoor"]) >30){echo "<indoorred1>",$weather["temp_indoor"]  ;echo "&deg;<smalluvunit>".$weather["temp_units"] ; } else if (anyToC($weather["temp_indoor"]) >24){echo "<indoororange1>",$weather["temp_indoor"]  ;echo "&deg;<smalluvunit>".$weather["temp_units"] ; } else if (anyToC($weather["temp_indoor"]) >20){echo "<indooryellow1>",$weather["temp_indoor"]  ;echo "&deg;<smalluvunit>".$weather["temp_units"] ; }
 else if (anyToC($weather["temp_indoor"]) >15){ echo "<indoorgreen1>", $weather["temp_indoor"]  ;echo "&deg;<smalluvunit>".$weather["temp_units"] ; } else if (anyToC($weather["temp_indoor"]) >0){ echo "<indoorblue1>", $weather["temp_indoor"]  ;echo "&deg;<smalluvunit>".$weather["temp_units"] ; }?></div>
<div class="weather34indoorword">
<?php if($weather["temp_indoor_trend"] >0)echo number_format($weather["temp_indoor_trend"],1).'&deg;&nbsp; '.$risingsymbol;else if($weather["temp_indoor_trend"]<0)echo number_format($weather["temp_indoor_trend"],1).'&deg;&nbsp;'.$fallingsymbol;else if($weather["temp_indoor_trend"] ==0)echo 'Steady'; ?></div>
</div></smalluvunit></div></div>

<div class="heatcircle6"><div class="inheatcircle-content"><valuetextheading1><?php echo $lang['Humidity']?></valuetextheading1>
<?php //humidity
if ($weather["humidity_indoor"]>90){echo "<div class=tempconverter1><div class=temphumcircle80-100>".$weather["humidity_indoor"];}
else if ($weather["humidity_indoor"]>70){echo "<div class=tempconverter1><div class=temphumcircle60-80>".$weather["humidity_indoor"];}
else if ($weather["humidity_indoor"]>35){echo "<div class=tempconverter1><div class=temphumcircle35-60>".$weather["humidity_indoor"];}
else if ($weather["humidity_indoor"]>25){echo "<div class=tempconverter1><div class=temphumcircle25-35>".$weather["humidity_indoor"];}
else if ($weather["humidity_indoor"]<=25){echo "<div class=tempconverter1><div class=temphumcircle0-25>".$weather["humidity_indoor"];}?><smalltempunit2>%</smalltempunit2>
<?php //humidity trend
if($weather["humidity_trend"]>0){echo '&nbsp;'.$risingsymbol;}else if($weather["humidity_trend"]<0){echo '&nbsp;'.$fallingsymbol;}else{ echo '';}?></span></div></div></div>



<div class="inheatcircle2-content"><valuetextheading1>Feels</valuetextheading1></div>
<div class="heatcircle7">
<?php  if (anyToC($weather["temp_indoor_feel"])>28){ echo "<div class=tempmodulehome30-35c><div class=rainratesmall>";} 
else if (anyToC($weather["temp_indoor_feel"])>25){ echo "<div class=tempmodulehome25-30c><div class=rainratesmall>";}
else if (anyToC($weather["temp_indoor_feel"])>20){ echo "<div class=tempmodulehome20-25c><div class=rainratesmall>";}  
else if (anyToC($weather["temp_indoor_feel"])>15){ echo "<div class=tempmodulehome15-20c><div class=rainratesmall>";}
else if (anyToC($weather["temp_indoor_feel"])>10){ echo "<div class=tempmodulehome10-15c><div class=rainratesmall>";} 
else if (anyToC($weather["temp_indoor_feel"])>0){ echo "<div class=tempmodulehome0-5c><div class=rainratesmall>";}



echo "</div>". number_format($weather["temp_indoor_feel"],1),"&deg;";?> </smalltempunit2>
</span></div></div></div></div>

