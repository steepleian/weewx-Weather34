<?php include('w34CombinedData.php');header('Content-type: text/html; charset=utf-8');
// Weather34 UV INDEX SOLAR RADIATION MODULE 09 FEB 2018
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 UV Index SOLAR Radiation Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <style>
@font-face{font-family:weathertext;src:url(css/fonts/sanfranciscodisplay-regular-webfont.woff) format("woff")}*,*:before,*:after{-webkit-box-sizing:border-box;box-sizing:border-box;margin:0;padding:0}html,body{font-size:62.5%;font-family:'Arial',sans-serif;background:rgba(41, 43, 46, 1.000)}body{color:#aaa;overflow-x:hidden;min-height:80vh;padding:10px}
section{width:80vw;max-width:64rem;min-width:58.9rem;margin:0 auto;padding:10px}
.weather34title{font-size:14px;font-weight:normal;padding-top:3px;font-family:'Arial',sans-serif;width:400px}
.weather34cards{padding-top:2rem;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;padding:5px}
.weather34card{width:31rem;height:16.5rem;background-color:0;border-radius:4px;position:relative;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;color:#aaa;font-size:11px;font-weight:normal;padding:10px;border:solid #444 1px}
.weather34card__weather34-container{height:50%;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:end;-ms-flex-align:end;align-items:flex-end;padding:10px;font-family:'weathertext',sans-serif}
.weather34card__weather34-wrapper{width:8rem;font-family:'weathertext',sans-serif;font-weight:100;}
.weather34cardguide{width:27rem;height:200px;background:RGBA(37, 41, 45, 0);border-radius:4px;position:relative;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;color:#aaa;font-size:12px;font-weight:normal;padding:5px;border:solid #444 1px;line-height:13px;}
.weather34card__weather34-guide{width:3rem;font-family:'weathertext',sans-serif;font-weight:100;}
.weather34card__count-container{-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding:10px;font-family:Arial,Helvetica,sans-serif}
.weather34card__count-text{font-family:Arial,Helvetica,sans-serif;text-align:center;}
.weather34card__count-text--big{font-size:36px;font-weight:200;font-family:'weathertext',sans-serif}
.weather34card__count-text--bigs{font-size:14px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;color:#aaa;text-align:center;line-height:13px;}
weather34card__count-text--bigsa{font-size:12px;font-family:Arial,Helvetica,sans-serif;font-weight:normal;color:#aaa;text-align:center;}
.weather34card__stuff-container{margin:0 auto;width:99%;height:16%;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding:15px;color:#aaa;background:RGBA(37, 41, 45, 0);border:solid RGBA(156, 156, 156, 0.1) 0;-webkit-border-radius:4px;-moz-border-radius:4px;-ms-border-radius:4px;-o-border-radius:4px;border-radius:4px;font-family:Arial,Helvetica,sans-serif;text-align:center;font-size:12px;}
.weather34card:after{content:"";display:block;position:absolute;top:0;left:0;width:16rem;height:4.625rem;padding:10px}.weather34card--earthquake1:after{background-image:radial-gradient(to bottom,rgba(106,122,135,0.5),transparent 70%)}.weather34card--earthquake2:after{background-image:radial-gradient(to bottom,rgba(106,191,96,0.5),transparent 70%)}.weather34card--earthquake3:after{background-image:radial-gradient(to bottom,rgba(96,203,231,0.5),transparent 70%)}blue{color:#01a4b4}orange{color:#ff8841}green{color:#9aba2f}red{color:#f37867}red6{color:#d65b4a;}darkred{color:#f47264}value{color:#fff}yellow{color:RGBA(233, 145, 65, 1)}purple{color:#916392}time{color:#aaa;font-weight:normal;font-family:Arial,Helvetica,sans-serif}time span{color:#ff8841;font-weight:normal;font-family:Arial,Helvetica,sans-serif}
a{color:#aaa;font-size:11px;top:5px;margin-top:10px;text-decoration:none;}.provided{color:#aaa;font-size:11px;top:5px;margin-top:10px;text-decoration:none;margin-left:70px}
updated{position:absolute;bottom:5px;float:right;}uvmax{position:absolute;top:5px;right:10px;float:right;font-size:12px;width:100px}solarmax{position:absolute;top:5px;right:10px;float:right;font-size:12px;width:100px;}
.uvsun{position:absolute;top:30px;margin-left:245px;}solarsun{position:absolute;top:30px;margin-left:130px;}
</style>
</head>
<body>
  <section class="weather34title">
   <p><?php echo $info ;?> Current UV Index - Solar Radiation Wm/<sup>2</sup> <orange><?php echo $stationlocation?></orange></p>
</section>

<section class="weather34cards">


 <div class="weather34card weather34card--earthquake2">
               <div class="weather34card_weather34-container">
            <div class="weather34card_weather34-wrapper"><span class="weather34card__count-text--big">
               <?php //34 soalr radiation script
// KP INDEX
	
	echo  "<orange>",$weather["solar"], "</orange>";
	
	
	
	
	



?></span> Solar Radiation Wm/<sup>2</sup>
           
        </div>
        <div class="weather34card__count-container">
            <div class="weather34card__count-text">
                <span class="weather34card__count-text--bigs"> 
                
               <?php
 
	echo " ";

	if ($weather["solar"]>1000)  {
	echo "<green><br> Solar Radiation Excellent and Sustainable</green><br>";
	echo '<green>Solar Energy</green> replenishment is good to excellent.';
	} 
	
	else if ($weather["solar"]>600)  {
	echo "<green><br> Solar Radiation Good and Sustainable</green><br>";
	echo '<green>Solar Energy</green> replenishment is moderate to good.';
	} 
	
	
	else if ($weather["solar"]>100)  {
	echo "<orange><br> Solar Radiation Moderate</orange><br>";
	echo '<green>Solar Energy</green> replenishment is low to moderate. ';
	} 
	
	else if ($weather["solar"]>200)  {
	echo "<yellow><br> Solar Radiation Poor</yellow><br>";
	echo ' <green>Solar Energy</green> replenishment is low. ';
	} 
	
	else if ($weather["solar"]>100)  {
	echo "<yellow><br> Solar Radiation Poor</yellow><br>";
	echo ' <green>Solar Energy</green> replenishment is poor. ';
	} 
	
	else if ($weather["solar"]>=0)  {
	echo "<red>Solar Radiation Poor</red><br>";
	echo 'When the <orange>sun</orange> is near the horizon,overcast,obscured or darkness hours this will prevent <green>Solar Energy</green> replenishment.  ';
	} 
	
	


?> 
            
                


            </div>
           
<solarsun><?php
	if ($weather["solar"]>=800){echo "<img src=css/icons/uvstrong.svg width=60px>";}				
	else if ($weather["solar"]>=100){echo "<img src=css/icons/clear.svg width=60px>";}
	else echo "<img src=css/icons/nosunuv.svg width=60px>";
	?></solarsun>  
        </div>
        <div class="weather34card__stuff-container">
            
            <div class="weather34card__stuff-text"> 
			
     
  </div>



</div></div></div>

   <div class="weather34card weather34card--earthquake1">
               <div class="weather34card_weather34-container">
            <div class="weather34card_weather34-wrapper"><span class="weather34card__count-text--big">
              <?php
	
	// KP INDEX
$hi = 0;
      foreach ($darkskyhourlyCond as $cond) {     
            
			$darkskyhourlyuv = $cond['uvIndex'];
			
			  if ($hi++ == 0) break; }
	if ($darkskyhourlyuv>11)  {
	echo "<purple>",$darkskyhourlyuv . "</value>";	} 
	
	
	else if ($darkskyhourlyuv>=10) {
	echo "<purple>",$darkskyhourlyuv . "</value>";}	 	
	
	
	else if ($darkskyhourlyuv>=8) {
	
	echo "<red>",$darkskyhourlyuv . "</value>";	} 
	
		
	else if ($darkskyhourlyuv>=7) {
	
	echo "<orange>",$darkskyhourlyuv . "</value>";	} 
	
	else if ($darkskyhourlyuv>=5) {
	
	echo "<yellow>",$darkskyhourlyuv . "</value>";	} 
	
	else if ($darkskyhourlyuv>3) {
	
	echo "<yellow>",$darkskyhourlyuv . "</value>";	}
	
	else if ($darkskyhourlyuv>2) {
	
	echo "<green>",$darkskyhourlyuv . "</value>";	}
	
	else if ($darkskyhourlyuv>=0) {
	
	echo "<green>",$darkskyhourlyuv . "</value>";	}
	
	
	else {
	echo "UV Index<br><span style='font-size:13px; font-family:arial;font-weight: 600'>---</span><br></aqivalue>";
	echo "</aqivalue1><value>N/A</value>";}


?></span> UV Index <div class="uvsun"><?php
	if ($darkskyhourlyuv>=7){echo "<img src=css/icons/uvstrong.svg width=60px>";}		
	else if ($darkskyhourlyuv>=1){echo "<img src=css/icons/clear.svg width=60px>";}	
	else echo "<img src=css/icons/nosunuv.svg width=60px>";
	?></div>
            </div>
        </div>
        <div class="weather34card__count-container">
            <div class="weather34card__count-text">
                <span class="weather34card__count-text--bigs"> <?php
	echo " \n";

	if ($darkskyhourlyuv>10)  {
	echo "<purple><br><br> Extra Protection </purple><br>";
	echo 'Avoid being outside during midday hours!
Make sure you seek a shaded area! <orange>Sunscreen</orange> and wear a hat ,<orange>wear sunglasses</orange> during bright <orange>sunlight</orange> periods.';
	} 
	
	else if ($darkskyhourlyuv>8)  {
	echo "<red><br><br> Extra Protection ", $alert,"</red><br>";
	echo 'Avoid being outside during midday hours!
Make sure you seek a shaded area! Wear <orange>Sunscreen</orange> and hat ,<orange>wear sunglasses</orange>.';
	} 
	
	
	else if ($darkskyhourlyuv>5)  {
	echo "<orange><br><br> Protection Required ", $alert,"</orange><br>";
	echo 'Seek shadea area during midday hours!
Use sunscreen and a hat for protection,<orange>wear sunglasses</orange> during bright <orange>sunlight</orange periods.';
	} 
	
	else if ($darkskyhourlyuv>3)  {
	echo "<yellow><br><br> Protection Required ", $alert,"</yellow><br>";
	echo ' During midday hours!
caution use some form of  protection,<orange>wear sunglasses</orange> during bright <orange>sunlight</orange periods.';
	} 
	
	else if ($darkskyhourlyuv>=1)  {
	echo "<green><br><br> No Cautions Required</green><br>";
	echo 'No advisory required . Safe for all skin types though be-aware of <orange>sunlight</orange> when <orange>sun</orange> approaches low horizon,<orange>wear sunglasses</orange>.';
	} 
	
	else if ($darkskyhourlyuv==0)  {
	echo "<green><br><br> No Caution Required</green><br>";
	echo 'No cautions required.The <orange>sun</orange> may be low on the horizon,obscured or below the horizon due to darkness hours.';
	
	} 


?></span>

            </div>
        </div>
        <div class="weather34card__stuff-container">
            
            <div class="weather34card__stuff-text"> </div>
        </div>
        
        
        
        
         </div>
    </div>
   
  
       
</section>







<section class="weather34cards">
   <div class="weather34card weather34card--earthquake1">
               <div class="weather34card_weather34-container">
            <div class="weather34card_weather34-wrapper"><span class="weather34card__count-text--bigsa" style="font-size:12px;line-height:12px;">
             
	
             <?php echo $info ;?> <orange>Guide</orange><br>
<green>Solar Energy</green> delivered by the sun is both intermittent and varies during the day also with the seasons.The value can be used has a good relative indicator
of solar replenishment for recharching solar panels and solar powered devices.

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
            <div class="weather34card_weather34-wrapper"><span class="weather34card__count-text--bigsa" style="font-size:12px;">
            
            
            <?php echo $info ;?> <orange>Guide</orange><br>
<green>0-3</green> = Safe.<br>
<yellow>3-5</yellow> = Caution Required.<br>
<orange>6-8</orange> = Fair Skin types Protect yourself.<br>
<red>8-10</red> = Fair to Dark Skin Risk high sun burn risk.<br>
<purple>10+</purple> = High Risk  All Skin types very dangerous.<br>
            
            
            

  </div>
  
       
</section>




<div class="provided">   
<a href="" title="" target="_blank">Data Provided by <?php echo $stationlocation;?> </a>
&nbsp;
PHP scripts by <a href="https://weather34.com" title="weather34.com" target="_blank">weather34.com  &copy;<?php echo date('Y');?></a></div>
</body>
</html>
