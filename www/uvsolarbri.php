<?php include('w34CombinedData.php');header('Content-type: text/html; charset=utf-8');
// 34 Aqi 


?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 UV-Index - Solar Radiation Module Popup </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <style>
@font-face{font-family:weathertext;src:url(css/fonts/sanfranciscodisplay-regular-webfont.woff) format("woff")}*,*:before,*:after{-webkit-box-sizing:border-box;box-sizing:border-box;margin:0;padding:0}html,body{font-size:62.5%;font-family:'Arial',sans-serif;background:none}body{color:#aaa;overflow-x:hidden;min-height:80vh;padding:10px}

section{width:80vw;max-width:64rem;min-width:58.9rem;margin:0 auto;padding:10px}
.weather34title{font-size:14px;font-weight:normal;padding-top:3px;font-family:'Arial',sans-serif;width:400px}
.weather34cards{padding-top:2rem;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;padding:5px}
.weather34card{width:31rem;height:14.5rem;background-color:#none;border-radius:4px;position:relative;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;color:#aaa;font-size:11px;font-weight:normal;padding:10px;border:solid #444 1px}
.weather34card__weather34-container{height:50%;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:end;-ms-flex-align:end;align-items:flex-end;padding:10px;font-family:'weathertext',sans-serif}
.weather34card__weather34-wrapper{width:8rem;font-family:'weathertext',sans-serif;font-weight:100;}

.weather34cardguide{width:27rem;height:200px;background:RGBA(37, 41, 45, 0);border-radius:4px;position:relative;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;color:#aaa;font-size:12px;font-weight:normal;padding:5px;border:solid #444 1px;line-height:13px;}

.weather34card__weather34-guide{width:3rem;font-family:'weathertext',sans-serif;font-weight:100;}


.weather34card__count-container{-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding:10px;font-family:Arial,Helvetica,sans-serif}
.weather34card__count-text{font-family:Arial,Helvetica,sans-serif;text-align:center;width:200px;}
.weather34card__count-textuv{font-family:Arial,Helvetica,sans-serif;width:200px;float:left;font-size:13px;text-align:left;margin-left:-20px;}
.weather34card__count-text--big{font-size:36px;font-weight:200;font-family:'weathertext',sans-serif}
.weather34card__count-text--bigs{font-size:12px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;color:#aaa;text-align:center;margin-top:5px;width:100px;}
weather34card__count-text--bigsa{font-size:12px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;color:#aaa;text-align:center;}
.weather34card__stuff-container{margin:0 auto;width:99%;height:16%;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding:15px;color:#aaa;background:RGBA(37, 41, 45, 0);border:solid RGBA(156, 156, 156, 0.1) 0;-webkit-border-radius:4px;-moz-border-radius:4px;-ms-border-radius:4px;-o-border-radius:4px;border-radius:4px;font-family:Arial,Helvetica,sans-serif;text-align:center;font-size:12px;}
.weather34card:after{content:"";display:block;position:absolute;top:0;left:0;width:16rem;height:4.625rem;padding:10px}
.weather34card--earthquake1:after{background-image:radial-gradient(to bottom,rgba(106,122,135,0.5),transparent 70%)}
.weather34card--earthquake2:after{background-image:radial-gradient(to bottom,rgba(106,191,96,0.5),transparent 70%)}
.weather34card--earthquake3:after{background-image:radial-gradient(to bottom,rgba(96,203,231,0.5),transparent 70%)}

blue{color:#01a4b4}orange{color:#ff8841}green{color:#9aba2f}red{color:#f37867}red6{color:#d65b4a;}darkred{color:#f47264}value{color:#fff}yellow{color:#c1b01e}purple{color:#916392}time{color:#aaa;font-weight:normal;font-family:Arial,Helvetica,sans-serif}time span{color:#ff8841;font-weight:normal;font-family:Arial,Helvetica,sans-serif}
a{color:#aaa;font-size:11px;top:5px;margin-top:10px;text-decoration:none;}.provided{color:#aaa;font-size:11px;top:5px;margin-top:10px;text-decoration:none;margin-left:70px}updated{position:absolute;bottom:5px;float:right;}

.weather34-uvrate-bar{background:0;position:absolute;height:100px;width:30px;margin-left:245px;margin-top:-49px}
.weather34-uvrate-bar .bar{shape-rendering:crispEdges;background:url(css/rain/uvrulerw34.svg) no-repeat;width:37px;border:1px solid RGBA(57, 61, 64, 1.00);border-bottom:5px solid RGBA(57, 61, 64, 1.00);border-top:3px solid RGBA(57, 61, 64, 1.00);-webkit-border-radius:1px 1px 5px 5px;position:absolute;bottom:0}
.weather34-uvrate-bar .bar-1{height:100px;max-height:100px}
.weather34-uvrate-bar .bar-inner1000{shape-rendering:crispEdges;background:RGBA(164, 117, 203, 0.7);width:100%;-webkit-border-radius:1px 1px 5px 5px;border:0}
.weather34-uvrate-bar .bar-inner700{shape-rendering:crispEdges;background:RGBA(211, 93, 78, 0.7);width:100%;-webkit-border-radius:1px 1px 5px 5px;border:0}
.weather34-uvrate-bar .bar-inner600{shape-rendering:crispEdges;background:RGBA(255, 136, 65, 0.8);width:100%;-webkit-border-radius:1px 1px 5px 5px;border:0}
.weather34-uvrate-bar .bar-inner400{shape-rendering:crispEdges;background:RGBA(233, 145, 65, 0.8);width:100%;-webkit-border-radius:1px 1px 5px 5px;border:0}
.weather34-uvrate-bar .bar-inner300{shape-rendering:crispEdges;background:RGBA(233, 145, 65, 0.8);width:100%;-webkit-border-radius:1px 1px 5px 5px;border:0}
.weather34-uvrate-bar .bar-inner1{shape-rendering:crispEdges;background:RGBA(255, 136, 65, 0.7);width:100%;-webkit-border-radius:1px 1px 5px 5px;border:0}

.weather34uvrate{color:#ff8841;position:absolute;margin-left:238px;margin-top:17px;font-size:12px;width:20px;font-family:weathertext,arial,sans-serif;max-height:100px;line-height:10px;font-weight:normal;}
.weather34uvrate span{color:#777;font-family:weathertext,arial,sans-serif;font-size:12px;font-weight:normal;}purpleuv{color:#a475cb;}reduv{color:#d65b4a;}orangeuv{color:#ff8841;}greenuv{color:#9aba2f;}greyuv{color:#aaa;}
.uvsun{position:absolute;top:10px;margin-left:175px;}.sunfade{opacity:0.8;}yellow{color:RGBA(233, 145, 65, 0.8)}









.weather34-solarrate-bar{background:0;position:absolute;height:100px;width:30px;margin-left:245px;margin-top:-6px}
.weather34-solarrate-bar .bar{shape-rendering:crispEdges;background:url(css/rain/solarrulerw34.svg) no-repeat;width:37px;border:1px solid RGBA(57, 61, 64, 1.00);border-bottom:5px solid RGBA(57, 61, 64, 1.00);border-top:3px solid RGBA(57, 61, 64, 1.00);-webkit-border-radius:1px 1px 5px 5px;position:absolute;bottom:0}
.weather34-solarrate-bar .bar-1{height:100px;max-height:100px}
.weather34-solarrate-bar .bar-inner1000{shape-rendering:crispEdges;background:RGBA(164, 117, 203, 0.7);width:100%;-webkit-border-radius:1px 1px 5px 5px;border:0}
.weather34-solarrate-bar .bar-inner700{shape-rendering:crispEdges;background:RGBA(211, 93, 78, 0.7);width:100%;-webkit-border-radius:1px 1px 5px 5px;border:0}
.weather34-solarrate-bar .bar-inner600{shape-rendering:crispEdges;background:RGBA(211, 93, 78, 0.7);width:100%;-webkit-border-radius:1px 1px 5px 5px;border:0}
.weather34-solarrate-bar .bar-inner400{shape-rendering:crispEdges;background:RGBA(233, 145, 65, 0.8);width:100%;-webkit-border-radius:1px 1px 5px 5px;border:0}
.weather34-solarrate-bar .bar-inner300{shape-rendering:crispEdges;background:RGBA(233, 145, 65, 0.8);width:100%;-webkit-border-radius:1px 1px 5px 5px;border:0}
.weather34-solarrate-bar .bar-inner1{shape-rendering:crispEdges;background:RGBA(255, 136, 65, 0.7);width:100%;-webkit-border-radius:1px 1px 5px 5px;border:0}

.weather34solarrate{color:#ff8841;position:absolute;margin-left:238px;margin-top:17px;font-size:12px;width:20px;font-family:weathertext,arial,sans-serif;max-height:100px;line-height:10px;font-weight:normal;}
.weather34solarrate span{color:#777;font-family:weathertext,arial,sans-serif;font-size:12px;font-weight:normal;}purpleuv{color:#a475cb;}reduv{color:#d65b4a;}orangeuv{color:#ff8841;}greenuv{color:#9aba2f;}greyuv{color:#aaa;}








</style>
</head>
<body>
  <section class="weather34title">
   <p><?php echo $info ;?> UV-Index-Solar Radiation-Lux Brightness<green> <?php
			
	
	echo "<img src=css/icons/clear.svg width=30px>";
	?></green></p>
</section>

<section class="weather34cards">
   <div class="weather34card weather34card--earthquake1">
               <div class="weather34card_weather34-container">
            <div class="weather34card_weather34-wrapper"><span class="weather34card__count-text--big">
              <?php
	
	
	
	// KP INDEX
	
	if ($weather["uv"]>11)  {
	echo "<purple>",$weather["uv"] . "</value>";	} 
	
	
	else if ($weather["uv"]>=10) {
	echo "<purple>",$weather["uv"] . "</value>";}	 	
	
	
	else if ($weather["uv"]>=8) {
	
	echo "<red>",$weather["uv"] . "</value>";	} 
	
		
	else if ($weather["uv"]>=6) {
	
	echo "<orange>",$weather["uv"] . "</value>";	} 
	
		
	else if ($weather["uv"]>=3) {
	
	echo "<yellow>",$weather["uv"] . "</value>";	}
	
	
	else if ($weather["uv"]>=0) {
	
	echo "<green>",$weather["uv"] . "</value>";	}
	
	
	else {
	echo "UV Index<br><span style='font-size:13px; font-family:arial;font-weight: 600'>---</span><br></aqivalue>";
	echo "</aqivalue1><value>N/A</value>";}




?></span> 
<div class="weather34-uvrate-bar">
  <div class="bar bar-1" style="height:100px;max-height:100px;">	
	<?php 	 
	if ($weather["uv"]>=10){echo '<div class="bar bar-inner1000" style="height: ';echo $weather["uv"]*8;}	
	else if ($weather["uv"]>=7){echo '<div class="bar bar-inner700" style="height: ';echo $weather["uv"]*8;}	
	else if ($weather["uv"]>5){echo '<div class="bar bar-inner600" style="height: ';echo $weather["uv"]*8;}	
	else if ($weather["uv"]>=3){echo '<div class="bar bar-inner400" style="height: ';echo $weather["uv"]*8;}
	else if ($weather["uv"]>=1){echo '<div class="bar bar-inner200" style="height: ';echo $weather["uv"]*8;}
		
	else if ($weather["uv"]>=0){echo '<div class="bar bar-inner1" style="height: ';echo $weather["uv"]+1;}	
	?>px;"></div></div></div>
 UV-Index
            </div>
        </div>
        <div class="weather34card__count-container">
            <div class="weather34card__count-text">
                <span class="weather34card__count-text--bigs"> <?php
	echo " \n";

	if ($weather["uv"]>10)  {
	echo "<purple><br><br> Extra Protection </purple><br>";
	echo 'Avoid being outside during midday hours!
Make sure you seek a shaded area! <orange>Sunscreen</orange> and wear a hat ,<orange>wear sunglasses</orange> during bright <orange>sunlight</orange> periods.';
	} 
	
	else if ($weather["uv"]>8)  {
	echo "<red><br><br> Extra Protection ", $alert,"</red><br>";
	echo 'Avoid being outside during midday hours!
Make sure you seek a shaded area! Wear <orange>Sunscreen</orange> and hat ,<orange>wear sunglasses</orange>.';
	} 
	
	
	else if ($weather["uv"]>5)  {
	echo "<orange><br><br> Protection Required ", $alert,"</orange><br>";
	echo 'Seek shadea area during midday hours!
Use sunscreen and a hat for protection,<orange>wear sunglasses</orange> during bright <orange>sunlight</orange periods.';
	} 
	
	else if ($weather["uv"]>3)  {
	echo "<yellow><br><br> Protection Required ", $alert,"</yellow><br>";
	echo ' During midday hours!
caution use some form of  protection,<orange>wear sunglasses</orange> during bright <orange>sunlight</orange periods.';
	} 
	
	else if ($weather["uv"]>=1)  {
	echo "<green><br><br> No Cautions Required</green><br>";
	echo 'No advisory required . Safe for all skin types though be-aware of <orange>sunlight</orange> when <orange>sun</orange> approaches low horizon,<orange>wear sunglasses</orange>.';
	} 
	
	else if ($weather["uv"]==0)  {
	echo "<green><br><br> No Caution Required</green><br>";
	echo 'No cautions required.The <orange>sun</orange> may be low on the horizon,obscured or below the horizon due to darkness hours.';
	
	} 


?></span>
            </div>
        </div>
        <div class="weather34card__stuff-container">
            
            <div class="weather34card__stuff-text"> <?php	
	
	
	?></div>
        </div>
        
        
        
        
        
    </div>
    <div class="weather34card weather34card--earthquake2">
               <div class="weather34card_weather34-container">
            <div class="weather34card_weather34-wrapper"><span class="weather34card__count-text--big">
            
            <div class="weather34-solarrate-bar">
    <div class="bar bar-1" style="height:100px;max-height:100px;"> 
    <?php
	if ($weather["solar"]>1000){echo '<div class="bar bar-inner1000" style="height: ';echo $weather["solar"]/14;}	
	else if ($weather["solar"]>700){echo '<div class="bar bar-inner600" style="height: ';echo $weather["solar"]/14;}
	else if ($weather["solar"]>500){echo '<div class="bar bar-inner400" style="height: ';echo $weather["solar"]/14;}	
	else if ($weather["solar"]>200){echo '<div class="bar bar-inner300" style="height: ';echo $weather["solar"]/12;}
	else if ($weather["solar"]>=1){echo '<div class="bar bar-inner1" style="height: ';echo $weather["solar"]/12;}		
	else if ($weather["solar"]>=0){echo '<div class="bar bar-inner1" style="height: ';echo $weather["solar"]+1;}	
	echo number_format($weather["solar"],0);?>px;">
    </div></div></div>
 
            
            
            
               <?php //34 aqi ozone script
$b="--";if($weather["solar"]==$b){$weather["solar"] = "N/A" ;}			   
			   
			   
if ($weather["solar"]>=1000) echo "<purple>",$weather["solar"]; 
else if ($weather["solar"] >=500) echo "<red>",$weather["solar"]; 
else if ($weather["solar"] >=300) echo "<orange>",$weather["solar"]; 
else if ($weather["solar"] >=100) echo "<yellow>",$weather["solar"]; 
else if ($weather["solar"] >=0) echo "<green>",$weather["solar"]; 

?></span> Solar Radiation
<div class="uvsun"><?php
	if ($weather["solar"]>=800){echo "<img src=css/icons/uvstrong.svg width=60px>";}	
	else if ($weather["solar"]>=10){echo "<img src=css/icons/clear.svg width=60px>";}		
	else echo "<img src=css/icons/nosunuv.svg width=60px>";
	?></div>

            </div>
        </div>
        <div class="weather34card__count-container">
            <div class="weather34card__count-textuv">
                <span class="weather34card__count-text--bigs">    
               <?php
 
	echo " ";

	if ($weather["solar"]>1000)  {
	echo "<green><br> <br>Solar Radiation Excellent</green> and Sustainable<br>";
	echo '<green>Solar Energy</green> replenishment is good to excellent.';
	} 
	
	else if ($weather["solar"]>600)  {
	echo "<green><br><br> Solar Radiation Good</green> and Sustainable<br>";
	echo '<green>Solar Energy</green> replenishment is moderate to good.';
	} 
	
	
	else if ($weather["solar"]>100)  {
	echo "<orange><br><br> Solar Radiation Moderate</orange><br>";
	echo '<green>Solar Energy</green> replenishment is low to moderate. ';
	} 
	
	else if ($weather["solar"]>200)  {
	echo "<yellow><br><br> Solar Radiation Poor</yellow><br>";
	echo ' <green>Solar Energy</green> replenishment is low. ';
	} 
	
	else if ($weather["solar"]>100)  {
	echo "<yellow><br><br> Solar Radiation Poor</yellow><br>";
	echo ' <green>Solar Energy</green> replenishment is poor. ';
	} 
	
	else if ($weather["uv"]>=0)  {
	echo "<red><br><br><br>Solar Radiation Poor</red><br>";
	echo 'When the <orange>sun</orange> is near the horizon,overcast,obscured or darkness hours this will prevent <green>Solar Energy</green> replenishment.  ';
	} 
	
	


?> 
            
                

            </div>
        </div><br>
        <div class="weather34card__stuff-container">
            
            
       
</section>







<section class="weather34cards">
   <div class="weather34card weather34card--earthquake1">
               <div class="weather34card_weather34-container">
            <div class="weather34card_weather34-wrapper"><span class="weather34card__count-text--bigsa" style="font-size:12px;line-height:12px;">
             
	<?php echo $info ;?> <orange>Guide</orange><br>
<green>0-3</green> = Safe.<br>
<yellow>3-5</yellow> = Caution Required.<br>
<orange>6-7</orange> = Fair Skin types Protect yourself.<br>
<red>8-10</red> = Fair to Dark Skin Risk high sun burn risk.<br>
<purple>11+</purple> = High Risk  All Skin types very dangerous.<br>

            </div>
        </div>
        <div class="weather34card__count-container">
            <div class="weather34card__count-text">
                <span class="weather34card__count-text--bigs"> 
	</div>
        </div>
    </div>
    <div class="weather34card weather34card--earthquake2">
               <div class="weather34card_weather34-container">
            <div class="weather34card_weather34-wrapper"><span class="weather34card__count-text--big">
          <div class="weather34-solarrate-bar">
    <div class="bar bar-1" style="height:100px;max-height:100px;"> 
    <?php
	if ($weather["solar"]>500){echo '<div class="bar bar-inner400" style="height: ';echo $weather["solar"]/14;}	
	else if ($weather["solar"]>200){echo '<div class="bar bar-inner300" style="height: ';echo $weather["solar"]/12;}
	else if ($weather["solar"]>=1){echo '<div class="bar bar-inner1" style="height: ';echo $weather["solar"]/12;}		
	else if ($weather["solar"]>=0){echo '<div class="bar bar-inner1" style="height: ';echo $weather["solar"]+1;}	
	echo number_format($weather["solar"],0);?>px;">
    </div></div></div>
 
            
            
            
               <?php //34 aqi ozone script
$b="--";if($weather["solar"]==$b){$weather["solar"] = "N/A" ;}			   
			   
			   
if ($weather["solar"] >=100) echo "<yellow>",$weather["solar"]*40; 
else if ($weather["solar"] >=0) echo "<green>",$weather["solar"]; 

?></span> Lux Brightness
<div class="uvsun"><?php
	if ($weather["solar"]>=10){echo "<img src=css/icons/clear.svg width=60px>";}		
	else echo "<img src=css/icons/nosunuv.svg width=60px>";
	?></div>

            </div>
        </div>
        <div class="weather34card__count-container">
            <div class="weather34card__count-textuv">
                <span class="weather34card__count-text--bigs">    
               <?php
 
	echo " ";

	if ($weather["solar"]>1000)  {
	echo "<green><br> <br>Solar Radiation Excellent</green> and Sustainable<br>";
	echo '<green>Solar Energy</green> replenishment is good to excellent.';
	} 
	
	else if ($weather["solar"]>600)  {
	echo "<orange><br><br> Illuminance </orange> Bright<br>";
	
	} 
	
	
	else if ($weather["solar"]>100)  {
	echo "<orange><br><br> Solar Radiation Moderate</orange><br>";
	echo '<green>Solar Energy</green> replenishment is low to moderate. ';
	} 
	
	else if ($weather["solar"]>200)  {
	echo "<yellow><br><br> Solar Radiation Poor</yellow><br>";
	echo ' <green>Solar Energy</green> replenishment is low. ';
	} 
	
	else if ($weather["solar"]>100)  {
	echo "<yellow><br><br> Solar Radiation Poor</yellow><br>";
	echo ' <green>Solar Energy</green> replenishment is poor. ';
	} 
	
	else if ($weather["uv"]>=0)  {
	echo "<red><br><br><br>Solar Radiation Poor</red><br>";
	echo 'When the <orange>sun</orange> is near the horizon,overcast,obscured or darkness hours this will prevent <green>Solar Energy</green> replenishment.  ';
	} 
	
	


?> 
            
                
       
</section>




<div class="provided">   
<a href="https://aqicn.org" title="https://aqicn.org" target="_blank"></a> 
&nbsp;
PHP scripts by <?php echo $info;?> <?php echo $scriptcredits. " ".date('Y');?></a></div>
</body>
</html>
