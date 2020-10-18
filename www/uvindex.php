<?php 
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include('w34CombinedData.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 UV-INDEX and Solar Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@font-face{font-family:weathertext2;src:url(css/fonts/verbatim-regular.woff) format("woff"),url(fonts/verbatim-regular.woff2) format("woff2"),url(fonts/verbatim-regular.ttf) format("truetype")}
html,body{font-size:13px;font-family: "weathertext2", Helvetica, Arial, sans-serif;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;}
.grid { 
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 2fr));
  grid-gap: 10px;
  align-items: stretch;
  color:#fff;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;
 
  }
.grid > article {
  border: 1px solid #212428;
  box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
  padding:20px;
  font-size:0.8em;
  -webkit-border-radius:4px;
  border-radius:4px;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;
}

  
 .weather34chart-btn.close:after,.weather34chart-btn.close:before{color:#ccc;position:absolute;font-size:14px;font-family:Arial,Helvetica,sans-serif;font-weight:600}
 .weather34browser-header{flex-basis:auto;height:35px;background:#ebebeb;background:0;border-bottom:0;display:flex;margin-top:-20px;width:99%;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-moz-border-radius-topleft:5px;-moz-border-radius-topright:5px;border-top-left-radius:5px;border-top-right-radius:5px}.weather34browser-footer{flex-basis:auto;height:35px;background:#ebebeb;background:rgba(56,56,60,1);border-bottom:0;display:flex;bottom:-20px;width:97.4%;-webkit-border-bottom-right-radius:5px;-webkit-border-bottom-left-radius:5px;-moz-border-radius-bottomright:5px;-moz-border-radius-bottomleft:5px;border-bottom-right-radius:5px;border-bottom-left-radius:5px}.weather34chart-btns{position:absolute;height:35px;display:inline-block;padding:0 10px;line-height:38px;width:55px;flex-basis:auto;top:5px}.weather34chart-btn{width:14px;height:14px;border:1px solid rgba(0,0,0,.15);border-radius:6px;display:inline-block;margin:1px}.weather34chart-btn.close{background-color: rgba(255, 124, 57, 1.000)}.weather34chart-btn.close:before{content:"x";margin-top:-14px;margin-left:2px}.weather34chart-btn.close:after{content:"close window";margin-top:-13px;margin-left:15px;width:300px}a{color:#fff;text-decoration:none}
.weather34darkbrowser{position:relative;background:0;width:100%;max-height:30px;margin:auto;margin-top:-15px;margin-left:0px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:45px;background-image:radial-gradient(circle,#EB7061 6px,transparent 8px),radial-gradient(circle,#F5D160 6px,transparent 8px),radial-gradient(circle,#81D982 6px,transparent 8px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),linear-gradient(to bottom,rgba(59,60,63,0.4) 40px,transparent 0);background-position:left top,left top,left top,right top,right top,right top,0 0;background-size:50px 45px,90px 45px,130px 45px,50px 30px,50px 45px,50px 60px,100%;background-repeat:no-repeat,no-repeat}.weather34darkbrowser[url]:after{content:attr(url);color:#fff;font-size:10px;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 50px 0 90px;border-radius:3px;background:rgba(97, 106, 114, 0.3);height:20px;box-sizing:border-box}
 blue{color:#01a4b4}orange{color:#009bb4}orange1{color:rgba(255, 131, 47, 1.000);}green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#CC0}purple{color:#916392}
.hitempyposx{position:relative;top:-90px;margin-left:40px;margin-bottom:-30px}
.hitempypos{position:absolute;margin-top:-100px;margin-left:40px;margin-bottom:20px;display:block;}


.hitempd{position:absolute;font-family:weathertext2,Arial, Helvetica, sans-serif;background:rgba(86, 95, 103, 0.3);color:#fff;font-size:0.7rem;width:140px;padding:0;margin-left:30px;padding-left:3px;align-items:center;justify-content:center;display:block;margin-top:5px;}


.hitempd1{position:absolute;font-family:weathertext2,Arial, Helvetica, sans-serif;background:rgba(86, 95, 103, 0.3);color:#fff;font-size:0.7rem;width:140px;padding:0;margin-left:30px;padding-left:3px;align-items:center;justify-content:center;display:block;margin-top:40px;}.uvmaxi3{position:absolute;left:-30px;color:rgba(0, 154, 171, 1.000);margin-top:-40px;font-size:16px;width:240px;}.uvmaxi3 span{color:#aaa}
.hitemp{color:#fff;font-size:0.7rem;display:inline;}
.hitemp span{color:rgba(255, 124, 57, 1.000)}
blue{color:rgba(0, 154, 171, 1.000)}
.temperaturecontainer1{position:absolute;left:20px;margin-top:-5px;margin-bottom:20px;}
.temperaturecontainer2{position:absolute;left:20px;margin-top:60px}
smalluvunit{font-size:.9rem;font-family:Arial,Helvetica,system;}
.uvcontainer1{left:70px;top:0}.uvtoday1,.uvtoday1-3,.uvtoday11,.uvtoday4-5,.uvtoday6-8,.uvtoday9-10{font-family:weathertext2,Arial,Helvetica,system;width:7rem;height:5.5rem;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;display:flex}.uvtoday1,.uvtoday1-3,.uvtoday11,.uvtoday4-5,.uvtoday6-8,.uvtoday9-10{font-size:1.7rem;padding-top:2px;color:#fff;border-bottom:15px solid rgba(56,56,60,1);align-items:center;justify-content:center;border-radius:3px;margin-bottom:10px;}
.uvtrend{position:absolute;font-size:1rem}
.uvtoday1,.uvtoday1-3{background:#9aba2f}
.uvtoday4-5{background:#ff7c39;background:-webkit-linear-gradient(90deg,#90b12a,#ff7c39);background:linear-gradient(90deg,#90b12a,#ff7c39)}
.uvtoday6-8{background:#efa80f;background:-webkit-linear-gradient(90deg,#efa80f,#d86858);background:linear-gradient(90deg,#efa80f,#d86858)}
.uvtoday9-10{background:#d05f2d;background:-webkit-linear-gradient(90deg,#d65b4a,#ac2816);background:linear-gradient(90deg,#d65b4a,#ac2816)}
.uvtoday11{background:#95439f;background:-webkit-linear-gradient(90deg,#95439f,#a475cb);background:linear-gradient(90deg,#95439f,#a475cb)}
.uvtrend{margin-left:135px;margin-top:48px;z-index:1;color:#fff}
.simsekcontainer{float:left;font-family:weathertext,system;-o-font-smoothing:antialiasedleft:0;bottom:0;right:0;position:relative;margin:40px 10px 10px 40px;left:-10px;top:13px}.simsek{font-size:1.55rem;padding-top:12px;color:#f8f8f8;background:rgba(230,161,65,1);border-bottom:18px solid rgba(56,56,60,1);align-items:center;justify-content:center;border-radius:3px}
smalluvunit{font-size:.65rem;font-family:Arial,Helvetica,system;}
sup{font-size:1em}supwm2{font-size:0.7em;vertical-align:super}
.uvcontainer1{left:-30px;top:-10px}
.uvtoday1,.uvtoday1-3,.uvtoday11,.uvtoday4-5,.uvtoday6-8,.uvtoday9-10{font-family:weathertext2,Arial,Helvetica,system;width:6rem;height:2.5rem;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;display:flex}.uvtoday1,.uvtoday1-3,.uvtoday11,.uvtoday4-5,.uvtoday6-8,.uvtoday9-10{font-size:1.25rem;padding-top:2px;color:#fff;border-bottom:15px solid rgba(56,56,60,1);align-items:center;justify-content:center;border-radius:3px}
.uvtoday1-3{background:#9aba2f}.uvtoday4-5{background:rgba(230,161,65,1)}.uvtoday6-8{background:rgba(255,124,57,.8)}.uvtoday9-10{background:rgba(211,93,78,.8)}.uvtoday11{background:rgba(204,135,248,.7)}
.uvcaution{margin-left:0;margin-top:0px;font-family:weathertext2,Arial,Helvetica,system;font-size:1em;}
.uvtrend{margin-left:135px;margin-top:48px;z-index:1;color:#fff}
.solartoday1,.solartoday200,.solartoday500,.solartoday1000{font-family:weathertext2,Arial,Helvetica,system;width:6rem;height:2.5rem;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;display:flex}.solartoday1,.solartoday200,.solartoday500,.solartoday1000{font-size:1.25rem;padding-top:2px;color:#fff;border-bottom:15px solid rgba(56,56,60,1);align-items:center;justify-content:center;border-radius:3px}
.solartoday1{background:rgba(74, 99, 111, 1.000)}.solartoday200{background:rgba(230,161,65,1)}.solartoday500{background:rgba(255,124,57,.8)}.solartoday1000{background:rgba(211,93,78,.8)}
.luxtoday1,.luxtoday200,.luxtoday500,.luxtoday1000{font-family:weathertext2,Arial,Helvetica,system;width:6rem;height:2.5rem;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;display:flex}.luxtoday1,.luxtoday200,.luxtoday500,.luxtoday1000{font-size:1.25rem;padding-top:2px;color:#fff;border-bottom:15px solid rgba(56,56,60,1);align-items:center;justify-content:center;border-radius:3px}
.luxtoday1{background:rgba(74, 99, 111, 1.000)}.luxtoday200{background:rgba(230, 161, 65, 1.000)}.luxtoday500{background:rgba(255,124,57,.8)}.luxtoday1000{background:rgba(211,93,78,.8)}
.solarcontainer1{left:10px;top:0}
.advisory{font-family:Arial,Helvetica,system;position:absolute;font-size:1rem;line-height:10px;display:inline;width:150px;margin-top:40px;left:120px;} 
.advisoryguide{font-family:Arial,Helvetica,system;position:absolute;font-size:1rem;line-height:10px;display:inline;width:300px;margin-top:5px;left:3px;text-align:left;} 
.w34convertrain{position:relative;font-size:.5em;top:10px;color:#c0c0c0;margin-left:5px}
.hitempy{position:relative;background:rgba(61, 64, 66, 0.5);color:#fff;width:90px;padding:1px;-webit-border-radius:2px;border-radius:2px;
margin-top:-20px;margin-left:92px;padding-left:3px;line-height:11px;font-size:9px}
.actualt{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74, 99, 111, 0.1);
padding:5px;font-family:Arial, Helvetica, sans-serif;width:170px;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;
align-items:center;justify-content:center;margin-bottom:10px;top:0}
.actualw{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74, 99, 111, 0.1);
padding:5px;font-family:Arial, Helvetica, sans-serif;width:100px;height:0.8em;font-size:0.8rem;padding-top:2px;color:#fff;
align-items:center;justify-content:center;margin-bottom:10px;top:0}</style>
<div class="weather34darkbrowser" url="UV-INDEX | Solar | Lux Info"></div>
  
<main class="grid">
  <article>  
   <div class=actualt>Current UV-INDEX</div>        
   <div class="uvcontainer1"><?php 
if ($weather["uv"]>=10) {echo '<div class=uvtoday11>'.number_format($weather["uv"],1)."<smalluvunit> &nbsp;UVI";}
else if ($weather["uv"]>=8) {echo '<div class=uvtoday9-10>'.number_format($weather["uv"],1)."<smalluvunit> &nbsp;UVI";}
else if ($weather["uv"]>=5) {echo '<div class=uvtoday6-8>'.number_format($weather["uv"],1)."<smalluvunit> &nbsp;UVI";}
else if ($weather["uv"]>3) {echo '<div class=uvtoday4-5>'.number_format($weather["uv"],1)."<smalluvunit> &nbsp;UVI";}
else if ($weather["uv"]>=0) {echo '<div class=uvtoday1-3>'.number_format($weather["uv"],1)."<smalluvunit> &nbsp;UVI";}

?></smallrainunit></div></div>
 
</div>  
<div class="uvcaution"><?php 
if ($weather["uv"]>10) {echo 'Extreme UVI<br>Avoid being outside seek a <br>cool shaded area!';}
else if ($weather["uv"]>8) {echo 'Very High UVI<br>Avoid being outside seek a <br>cool shaded area!';}
else if ($weather["uv"]>5) {echo 'High UVI<br>Avoid being outside at midday overhead sun!<br>Wear sunglasses!';}
else if ($weather["uv"]>3) {echo 'Moderate UVI<br>Cautionary use suncream protection <br>Wear sunglasses!';}
else if ($weather["uv"]>=0) {echo 'Low UVI<br>No cautions required<br>Safe for all Skin types!';}
?></div>

</article>  
  
  <article> 
  <div class=actualt>Current Solar Radiation <?php echo date('F Y')?> </div>        
    <div class="solarcontainer1"><?php 
if ($weather["solar"]>=1000) {echo '<div class=solartoday1000>'.number_format($weather["solar"],0)."<smalluvunit> &nbsp;W/m<sup>2</sup>";}
else if ($weather["solar"]>=500) {echo '<div class=solartoday500>'.number_format($weather["solar"],0)."<smalluvunit> &nbsp;W/m<sup>2</sup>";}
else if ($weather["solar"]>=10) {echo '<div class=solartoday200>'.number_format($weather["solar"],0)."<smalluvunit> &nbsp;W/m<sup>2</sup>";}
else if ($weather["solar"]>=0) {echo '<div class=solartoday1>'.number_format($weather["solar"],0)."<smalluvunit> &nbsp;W/m<sup>2</sup>";}

?></smallrainunit></div></div>     
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
	
	
	else if ($weather["solar"]>400)  {
	echo "<orange1><br><br> Solar Radiation Moderate</orange1><br>";
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
	
	else if ($weather["solar"]>=0)  {
	echo "<red><br>Solar Radiation Poor</red><br>";
	echo 'When the <orange1>sun</orange1> is near the horizon,overcast,obscured or darkness hours this will prevent <green>Solar Energy</green> replenishment.  ';
	} 
	
	


?> 
            
                

</article>  
  
   <article> 
  <div class=actualt>Current Lux </div>        
   <div class="temperaturecontainer">
	
            <?php //34 luxscript
			   
	   
			   
$b="--";if($weather["lux"]==$b){$weather["lux"] = "N/A" ;}	?>		   

<div class="solarcontainer1"><?php 
if ($weather["lux"]>=100000) {echo '<div class=luxtoday1000>'.number_format($weather["lux"],0,'.','')."<smalluvunit> &nbsp;Lux";}
else if ($weather["lux"]>=50000) {echo '<div class=luxtoday500>'.number_format($weather["lux"],0,'.','')."<smalluvunit> &nbspLux";}
else if ($weather["lux"]>=10) {echo '<div class=luxtoday200>'.number_format($weather["lux"],0,'.','')."<smalluvunit> &nbsp;Lux";}
else if ($weather["lux"]>=0) {echo '<div class=luxtoday1>'.number_format($weather["lux"],0,'.','')."<smalluvunit> &nbsp;Lux";}

?></smallrainunit></div></div>  


<?php
 
	echo " <br>";	
	if ($weather["lux"]>=0)  {
	echo "<orange1>Lux measurement</orange1><br>";
	echo '<greyuv>Luminous flux measures the approximate human eye response to light under a variety of lighting conditions.</greyuv>';}	
	else echo "LUX DATA NOT AVAILABLE";
	

?> 


</article>  
  
   <article> 
  <div class=actualt><?php echo $info?> Guide</div>        
  <?php
   echo '<purple>10+</purple> Avoid being outside seek a cool shaded area!<br>'; 	
echo '<red>8-10</red> Avoid being outside during midday hours use <orange1>Sunscreen</orange1><br>'; 
echo '<orange1>6-8</orange1> Seek shadea area during midday hours!<br>'; 	
echo '<yellow>3-5</yellow> Midday hours! caution use some form of  protection<br>'; 	
echo '<green>1-3</green> UVI No advisory required <br>';	 	
echo '<green>0</green> UVI No cautions required<br>'; 
?>
 
</article> 

 

 <article>
  
 <div class=actualt><?php echo $info?> World Health Organization</div>    
  <?php echo $info?> Guide information provided by <a href="https://www.who.int/uv/intersunprogramme/activities/uv_index/en/" title="WHO UV Index" target="_blank">
  <span style="position:relative;margin-top:5px;display:flex;align-items:center;justify-content:center;">  
  <svg width="140pt" viewBox="0 0 400 222" version="1.1" xmlns="http://www.w3.org/2000/svg">
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 197.70 6.71 C 198.78 3.74 203.26 3.42 204.67 6.29 C 206.39 10.42 203.95 14.75 203.96 18.99 C 203.78 26.54 203.74 34.09 203.51 41.64 C 201.90 42.09 200.30 42.56 198.70 43.03 C 198.54 35.05 198.45 27.06 198.23 19.08 C 198.11 14.97 196.36 10.77 197.70 6.71 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 159.00 38.01 C 166.93 24.80 181.58 16.44 196.73 14.70 C 196.52 16.71 194.40 16.61 192.99 17.00 C 183.69 18.65 174.80 22.94 168.10 29.66 C 169.97 31.48 171.82 33.31 173.60 35.22 C 176.37 32.98 179.13 30.70 182.28 28.99 C 180.78 32.23 177.72 34.16 175.01 36.28 C 176.35 37.83 177.76 39.33 179.14 40.85 C 181.05 36.16 181.90 30.50 186.15 27.22 C 189.36 25.14 193.21 24.43 196.67 22.87 C 196.70 24.72 196.75 26.57 196.80 28.43 C 194.59 29.99 192.60 31.82 190.60 33.65 C 187.46 36.50 183.31 37.72 179.66 39.74 C 180.05 40.43 180.46 41.12 180.87 41.80 C 185.50 37.70 191.24 34.89 197.37 33.95 C 197.22 36.27 194.78 36.16 193.11 36.77 C 188.74 37.74 185.11 40.47 181.66 43.18 C 183.71 45.53 186.95 47.28 187.64 50.53 C 185.03 48.71 182.84 46.39 180.53 44.22 C 175.72 49.37 173.18 56.19 172.67 63.15 C 173.55 63.18 175.30 63.23 176.18 63.26 C 176.98 59.79 179.11 63.62 181.19 63.40 C 181.40 62.20 181.50 60.98 181.62 59.77 C 180.53 59.72 178.37 59.63 177.28 59.59 C 180.45 56.91 183.90 54.52 185.96 50.80 C 185.16 54.15 184.45 57.77 186.04 61.02 C 187.54 64.94 191.85 66.34 194.66 69.10 C 195.33 68.99 196.68 68.76 197.35 68.65 C 197.08 69.08 196.54 69.94 196.27 70.37 C 196.96 71.43 197.56 72.55 198.03 73.72 C 196.85 73.13 195.69 72.52 194.53 71.90 C 192.74 73.83 190.90 75.70 189.02 77.54 C 190.16 78.83 194.04 79.81 192.30 81.92 C 190.72 80.96 189.25 79.84 187.79 78.72 C 185.87 80.62 183.95 82.52 182.04 84.42 C 185.41 87.21 189.24 89.55 193.53 90.61 C 195.35 91.26 197.90 91.06 198.55 93.35 C 193.26 93.02 188.29 90.91 183.91 88.01 C 182.66 88.38 181.41 88.72 180.16 89.03 C 178.41 89.62 176.66 90.21 174.92 90.84 C 181.06 96.87 189.25 100.24 197.67 101.43 C 197.92 101.85 198.43 102.69 198.68 103.11 C 189.48 102.59 180.81 98.53 174.02 92.39 C 172.18 94.34 170.30 96.23 168.36 98.08 C 179.59 108.63 195.94 113.45 211.04 110.05 C 219.71 108.33 227.66 103.94 234.18 98.04 C 232.29 96.14 230.40 94.23 228.54 92.29 C 221.80 98.76 212.74 102.38 203.50 103.18 C 204.51 99.89 208.80 101.17 211.36 100.15 C 211.61 97.80 212.01 95.32 211.10 93.05 C 210.02 89.82 207.05 87.83 204.23 86.23 C 204.25 84.89 204.27 83.54 204.29 82.20 C 208.74 80.71 214.66 78.64 214.93 73.07 C 215.51 67.12 209.63 63.73 204.80 62.10 C 204.86 59.37 204.91 56.64 204.92 53.90 C 206.10 54.41 207.28 54.91 208.47 55.41 C 208.37 54.52 208.16 52.73 208.05 51.84 C 208.83 52.07 210.39 52.53 211.17 52.76 C 212.23 51.89 213.38 51.03 213.94 49.72 C 212.54 50.20 211.19 50.82 209.79 51.26 C 210.80 50.01 212.02 48.97 213.35 48.06 C 214.03 48.32 214.71 48.57 215.39 48.82 C 217.57 46.54 219.99 44.39 221.31 41.46 C 222.62 41.03 224.46 40.90 224.23 39.03 C 222.78 35.28 222.28 31.25 220.62 27.58 C 221.72 27.34 223.91 26.87 225.01 26.63 C 224.52 29.90 228.17 31.87 229.10 34.84 C 230.96 33.17 232.76 31.43 234.57 29.71 C 227.95 23.68 219.92 19.04 211.05 17.36 C 209.09 16.72 206.24 17.20 205.49 14.70 C 218.71 16.13 231.52 22.59 239.93 32.99 C 247.97 42.97 251.59 56.25 250.11 68.95 C 248.69 82.99 240.93 96.32 229.17 104.20 C 217.81 111.78 203.23 114.73 189.92 111.38 C 176.89 108.46 165.14 100.04 158.59 88.36 C 149.72 73.13 149.75 53.07 159.00 38.01 M 153.48 63.15 C 156.23 63.16 158.99 63.16 161.74 63.18 C 161.90 53.18 166.09 43.50 172.87 36.21 C 170.82 34.33 168.82 32.40 166.81 30.48 C 158.47 39.21 153.64 51.08 153.48 63.15 M 235.61 30.61 C 233.70 32.69 231.36 34.44 229.93 36.91 C 231.86 39.32 234.63 41.04 236.00 43.89 C 238.39 50.08 240.50 56.47 240.78 63.17 C 243.54 63.15 246.30 63.15 249.07 63.14 C 248.56 51.17 244.18 39.17 235.61 30.61 M 163.14 63.15 C 165.80 63.15 168.48 63.24 171.15 63.07 C 171.98 60.10 171.86 56.90 173.03 54.00 C 174.46 49.51 177.75 46.02 179.91 41.92 C 177.51 40.86 175.46 39.23 173.63 37.37 C 167.34 44.46 163.26 53.59 163.14 63.15 M 222.76 43.12 C 226.33 46.52 228.27 51.01 230.39 55.36 C 230.39 57.96 230.44 60.56 230.61 63.16 C 233.51 63.15 236.42 63.15 239.32 63.16 C 239.22 58.04 237.96 53.01 235.89 48.35 C 232.63 46.30 229.37 43.89 227.05 40.80 C 225.48 41.29 224.10 42.20 222.76 43.12 M 215.77 50.24 C 218.12 52.30 220.61 54.28 222.11 57.09 C 223.04 56.26 223.65 54.64 225.13 54.77 C 225.23 56.33 225.30 57.89 225.33 59.46 C 226.50 58.28 227.61 57.03 228.70 55.76 C 226.28 51.98 224.94 47.60 222.00 44.17 C 219.93 46.20 217.88 48.25 215.77 50.24 M 153.50 64.69 C 153.54 76.88 158.99 88.40 167.12 97.28 C 169.14 95.26 171.17 93.26 173.23 91.29 C 170.94 88.91 169.44 85.52 166.21 84.25 C 165.20 83.14 164.25 81.97 163.28 80.83 C 161.58 80.05 159.89 79.27 158.20 78.49 C 158.66 80.13 159.13 81.78 159.61 83.42 C 158.28 80.43 156.06 77.17 157.81 73.86 C 158.28 74.21 159.21 74.91 159.68 75.26 C 160.64 75.22 162.58 75.14 163.54 75.09 C 162.51 71.70 162.01 68.19 161.73 64.67 C 158.98 64.68 156.24 64.67 153.50 64.69 M 163.16 64.70 C 163.44 68.38 164.08 72.02 164.98 75.60 C 166.19 75.35 167.39 75.10 168.60 74.83 C 168.60 73.54 168.59 72.25 168.58 70.96 C 169.65 69.48 170.70 67.98 171.76 66.49 C 171.69 66.03 171.54 65.12 171.47 64.66 C 168.70 64.69 165.93 64.69 163.16 64.70 M 172.79 64.65 C 172.97 66.01 173.15 67.38 173.33 68.74 C 173.97 68.71 175.26 68.65 175.90 68.61 C 178.98 73.14 177.94 79.02 180.66 83.69 C 182.66 81.74 184.71 79.84 186.55 77.74 C 183.83 73.80 181.18 69.58 181.23 64.59 C 178.95 64.50 176.58 64.51 175.28 66.68 C 175.39 66.19 175.60 65.22 175.71 64.74 C 174.98 64.72 173.52 64.67 172.79 64.65 M 222.80 64.60 C 223.39 65.47 224.58 67.21 225.17 68.08 L 226.50 66.45 C 227.06 69.16 223.37 69.38 221.52 69.63 C 220.33 70.84 219.18 72.08 218.07 73.36 C 218.53 73.73 219.46 74.48 219.93 74.86 C 219.35 76.97 218.83 79.09 218.25 81.20 C 218.91 80.70 220.22 79.71 220.88 79.22 C 220.83 80.72 220.81 82.23 220.82 83.73 C 226.49 79.09 229.00 71.62 229.62 64.53 C 227.35 64.53 225.07 64.55 222.80 64.60 M 231.11 64.67 C 230.58 71.98 227.56 79.03 222.50 84.35 C 223.53 85.26 224.57 86.16 225.63 87.05 C 225.75 86.15 225.99 84.37 226.11 83.47 C 227.78 85.50 227.60 88.17 227.84 90.62 C 235.08 84.03 238.72 74.29 239.38 64.67 C 236.62 64.67 233.86 64.67 231.11 64.67 M 240.71 64.64 C 240.10 74.41 236.52 84.29 229.27 91.10 C 231.28 93.05 233.25 95.04 235.21 97.04 C 243.96 88.62 248.34 76.62 249.12 64.68 C 246.32 64.67 243.51 64.67 240.71 64.64 M 182.58 65.92 C 183.26 69.98 185.16 73.66 187.73 76.84 C 189.67 74.80 191.65 72.80 193.68 70.85 C 193.23 70.13 192.32 68.67 191.87 67.95 C 191.09 69.09 190.38 70.27 189.63 71.43 C 189.90 70.19 190.15 68.94 190.38 67.69 C 189.86 67.92 188.80 68.40 188.27 68.63 C 186.41 67.65 184.51 66.76 182.58 65.92 M 219.64 86.75 C 220.65 87.40 221.66 88.06 222.67 88.72 C 222.30 89.26 221.57 90.32 221.20 90.86 C 221.05 92.82 220.60 94.75 220.09 96.65 C 222.82 95.09 225.32 93.18 227.73 91.16 C 225.61 89.19 223.90 86.52 221.23 85.30 C 220.83 85.66 220.04 86.39 219.64 86.75 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 146.08 35.89 C 148.38 26.82 155.19 18.93 164.34 16.38 C 162.25 18.96 160.23 21.60 158.64 24.53 C 155.99 29.78 150.34 32.21 146.08 35.89 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 237.94 16.36 C 247.18 18.88 253.90 26.87 256.27 35.96 C 251.68 32.23 246.00 29.35 243.20 23.88 C 241.75 21.17 239.91 18.71 237.94 16.36 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 205.71 21.96 C 209.84 22.69 214.24 23.68 217.31 26.76 C 222.39 31.37 222.25 40.64 216.57 44.72 C 210.79 49.02 203.19 49.00 196.76 51.81 C 194.67 52.72 192.82 55.10 193.56 57.46 C 194.04 59.47 196.04 60.49 197.46 61.80 C 197.57 63.71 197.65 65.61 197.73 67.52 C 194.39 66.51 190.91 65.14 188.75 62.25 C 185.44 58.14 186.23 51.53 190.42 48.32 C 196.62 43.31 205.65 44.63 212.02 39.91 C 214.48 38.04 215.01 34.30 213.33 31.74 C 211.70 28.92 208.30 28.17 205.40 27.36 C 205.51 25.56 205.61 23.76 205.71 21.96 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 140.85 34.09 C 141.92 30.29 144.43 27.08 147.51 24.67 C 144.60 29.87 144.21 35.87 143.57 41.66 C 147.73 36.46 153.63 33.26 159.15 29.74 C 157.39 34.11 154.35 37.83 150.42 40.43 C 146.17 43.27 142.49 46.97 140.34 51.67 C 140.02 45.82 138.90 39.78 140.85 34.09 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 254.87 24.77 C 257.11 26.70 259.30 28.81 260.54 31.55 C 263.58 37.77 262.40 44.89 262.11 51.53 C 259.74 47.27 256.55 43.49 252.44 40.81 C 248.12 38.00 244.58 34.04 242.84 29.13 C 248.14 33.56 254.83 36.27 258.96 42.04 C 257.97 36.21 257.79 30.08 254.87 24.77 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 204.45 35.21 C 207.10 32.94 210.51 35.65 213.19 36.72 C 210.35 38.41 207.26 35.76 204.45 35.21 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 264.45 36.69 C 267.57 41.13 269.83 46.65 268.60 52.15 C 267.45 57.10 264.87 61.56 263.15 66.31 C 260.62 56.86 251.59 50.88 249.43 41.22 C 254.87 46.17 260.82 51.07 262.98 58.43 C 263.47 51.16 266.28 43.99 264.45 36.69 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 133.47 50.01 C 133.23 45.14 135.30 40.57 137.68 36.44 C 136.33 43.98 138.59 51.35 139.39 58.79 C 141.19 51.20 147.43 46.31 152.89 41.32 C 150.68 50.86 141.94 56.85 139.13 66.09 C 137.67 60.56 133.45 55.94 133.47 50.01 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 199.09 52.96 C 200.42 52.16 201.93 51.74 203.36 51.16 C 202.99 58.95 202.96 66.76 202.84 74.56 C 201.71 75.03 200.59 75.52 199.47 76.00 C 199.30 68.33 198.98 60.64 199.09 52.96 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 131.66 53.78 C 132.89 61.03 137.76 66.75 140.42 73.44 C 140.93 70.41 140.86 67.16 142.40 64.40 C 144.10 61.28 146.26 58.43 148.40 55.59 C 149.40 65.06 141.56 72.48 142.17 81.86 C 139.59 77.48 135.88 73.97 132.97 69.84 C 129.87 65.08 130.57 59.06 131.66 53.78 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 194.80 57.43 C 195.27 55.80 196.01 54.26 197.23 53.05 C 197.22 54.64 197.17 56.22 197.08 57.81 C 197.23 58.35 197.53 59.43 197.68 59.97 C 196.72 59.12 195.76 58.27 194.80 57.43 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 270.96 53.71 C 271.62 59.15 272.43 65.26 269.19 70.08 C 266.39 74.07 262.69 77.39 260.46 81.78 C 260.34 72.49 253.10 65.05 253.80 55.59 C 258.14 60.79 262.39 66.76 261.83 73.92 C 264.36 66.93 269.19 61.00 270.96 53.71 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 204.82 63.71 C 207.87 65.20 211.45 66.69 212.84 70.07 C 214.09 73.17 212.47 76.87 209.55 78.36 C 205.80 80.27 201.51 80.85 197.87 83.01 C 197.88 84.98 197.92 86.95 197.90 88.93 C 195.65 87.18 192.56 84.47 194.39 81.34 C 197.01 76.61 203.67 77.65 207.13 74.03 C 209.19 71.98 205.93 70.23 204.55 69.07 C 204.64 67.28 204.73 65.49 204.82 63.71 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 147.84 68.76 C 151.70 78.00 146.60 87.88 149.55 97.26 C 144.95 92.83 139.05 89.93 134.86 85.06 C 131.27 80.81 130.48 75.11 129.70 69.79 C 133.84 77.10 140.78 82.18 145.25 89.26 C 143.69 82.27 146.05 75.43 147.84 68.76 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 253.04 97.00 C 255.21 87.68 251.20 78.11 254.21 68.88 C 256.33 75.43 258.75 82.25 257.04 89.20 C 261.71 82.36 268.44 77.22 272.52 69.95 C 271.84 75.31 270.96 81.05 267.26 85.26 C 263.19 89.93 257.53 92.79 253.04 97.00 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 204.37 71.58 C 205.70 70.43 207.03 72.94 205.87 73.86 C 204.50 75.05 203.34 72.52 204.37 71.58 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 199.59 83.89 C 200.34 83.51 201.85 82.75 202.60 82.37 C 202.52 89.94 202.46 97.52 202.31 105.09 C 202.26 106.68 202.22 108.44 200.91 109.58 C 200.20 108.17 199.99 106.59 199.96 105.03 C 199.77 97.98 199.72 90.93 199.59 83.89 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 151.42 83.21 C 153.68 86.75 155.60 90.59 156.26 94.78 C 157.07 99.62 157.65 104.68 160.52 108.83 C 155.05 105.49 148.08 105.96 142.85 102.12 C 137.72 98.55 134.89 92.65 132.97 86.88 C 137.76 94.14 146.33 96.62 153.03 101.53 C 150.14 95.78 151.67 89.34 151.42 83.21 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 241.85 108.76 C 246.75 100.95 244.80 90.56 251.06 83.35 C 250.97 89.43 251.85 95.77 249.38 101.54 C 255.93 96.65 264.53 94.29 269.00 86.94 C 267.10 93.17 264.17 99.96 257.98 102.98 C 252.80 105.42 247.06 106.36 241.85 108.76 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 204.19 87.97 C 207.78 89.89 210.22 93.40 210.30 97.54 C 208.69 95.07 206.80 92.76 204.18 91.31 C 204.17 90.19 204.18 89.08 204.19 87.97 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 159.04 96.11 C 162.71 99.43 166.25 103.07 168.41 107.58 C 169.99 110.80 171.48 114.05 173.09 117.25 C 167.08 116.32 160.81 118.28 154.97 116.05 C 149.03 114.34 144.71 109.52 141.53 104.44 C 148.50 110.61 158.32 109.43 166.44 113.00 C 161.73 108.51 160.80 102.04 159.04 96.11 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 234.09 107.07 C 236.27 102.67 240.01 99.35 243.37 95.88 C 241.58 101.84 240.53 108.26 236.08 112.96 C 244.07 109.32 254.02 110.75 260.69 104.25 C 257.82 109.40 253.57 114.12 247.79 115.93 C 241.78 118.33 235.29 116.32 229.07 117.27 C 230.96 113.98 232.41 110.47 234.09 107.07 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 154.71 119.36 C 164.13 122.57 173.55 118.10 182.84 116.64 C 188.96 115.47 195.21 116.50 201.11 118.28 C 205.96 116.86 210.99 115.79 216.07 116.32 C 226.76 116.69 237.15 123.11 247.87 119.35 C 243.53 122.53 238.44 124.83 233.00 125.10 C 223.55 125.50 214.89 120.79 205.57 120.11 C 209.72 122.97 214.10 125.61 217.35 129.56 C 216.40 129.60 214.51 129.68 213.57 129.72 C 210.27 126.17 207.24 121.48 202.02 120.79 C 196.10 120.41 192.05 125.64 188.79 129.85 C 187.54 129.74 186.29 129.62 185.05 129.49 C 188.48 125.66 192.76 122.81 196.90 119.82 C 189.11 120.92 181.73 123.90 173.93 124.93 C 167.09 125.92 160.04 123.65 154.71 119.36 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 265.78 139.74 C 267.43 139.74 269.07 139.73 270.73 139.74 C 270.75 150.15 270.77 160.55 270.72 170.96 C 269.07 170.99 267.43 171.03 265.79 171.06 C 265.78 160.62 265.80 150.18 265.78 139.74 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 288.39 139.73 C 290.05 139.73 291.72 139.73 293.39 139.73 C 293.41 143.79 293.45 147.84 293.26 151.89 C 295.15 150.34 297.34 148.51 300.00 149.31 C 303.15 149.65 304.53 153.08 304.67 155.87 C 304.87 160.89 304.67 165.92 304.73 170.94 C 303.04 170.98 301.36 171.02 299.68 171.06 C 299.52 165.87 300.00 160.64 299.43 155.46 C 299.25 153.45 296.61 152.91 295.18 153.97 C 293.86 154.81 293.66 156.52 293.50 157.93 C 293.23 162.29 293.48 166.67 293.37 171.04 C 291.70 170.99 290.04 170.96 288.38 170.93 C 288.38 160.53 288.36 150.13 288.39 139.73 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 162.19 139.75 C 163.88 139.74 165.58 139.74 167.28 139.74 C 167.28 150.17 167.30 160.61 167.27 171.04 C 165.58 171.03 163.90 171.02 162.22 171.02 C 162.13 160.59 162.20 150.17 162.19 139.75 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 182.79 139.74 C 184.45 139.74 186.12 139.74 187.79 139.74 C 187.80 150.18 187.78 160.62 187.80 171.06 C 186.27 171.04 184.75 171.01 183.22 170.98 C 183.24 170.20 183.28 168.62 183.30 167.84 C 181.73 169.30 180.34 171.43 177.97 171.57 C 173.93 171.62 171.00 167.67 170.52 163.95 C 170.18 160.22 169.87 156.12 171.87 152.77 C 173.23 150.36 176.06 148.44 178.91 149.27 C 180.51 149.88 181.61 151.28 182.90 152.35 C 182.75 148.15 182.79 143.94 182.79 139.74 M 177.22 153.32 C 174.15 156.21 175.32 161.15 175.56 164.90 C 175.87 167.69 179.81 168.84 181.48 166.55 C 183.50 163.80 182.93 160.06 182.64 156.87 C 182.57 154.29 179.72 151.54 177.22 153.32 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 96.10 141.81 C 97.66 141.80 99.22 141.79 100.78 141.78 C 102.51 148.72 102.77 156.00 104.92 162.83 C 106.51 155.88 107.54 148.83 108.94 141.84 C 111.02 141.83 113.11 141.83 115.19 141.83 C 116.65 148.99 117.61 156.25 119.40 163.34 C 121.04 156.19 122.01 148.91 123.63 141.76 C 125.10 141.80 126.57 141.83 128.04 141.87 C 126.20 151.58 124.30 161.28 122.42 170.98 C 120.39 170.95 118.36 170.96 116.33 170.96 C 114.72 163.26 113.85 155.42 112.05 147.76 C 110.53 155.47 109.26 163.23 107.70 170.94 C 105.70 170.93 103.71 170.98 101.72 170.99 C 99.85 161.26 97.90 151.55 96.10 141.81 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 204.09 141.82 C 205.78 141.82 207.48 141.83 209.18 141.84 C 209.19 145.79 209.18 149.75 209.18 153.70 C 211.90 153.68 214.63 153.68 217.36 153.73 C 217.37 149.76 217.36 145.79 217.36 141.83 C 219.05 141.82 220.73 141.82 222.42 141.83 C 222.41 151.56 222.44 161.30 222.40 171.03 C 220.73 171.03 219.06 171.03 217.39 171.04 C 217.34 166.75 217.37 162.46 217.37 158.18 C 214.64 158.21 211.92 158.21 209.19 158.17 C 209.17 162.42 209.18 166.67 209.18 170.92 C 207.49 170.95 205.81 170.98 204.12 171.02 C 204.05 161.29 204.11 151.56 204.09 141.82 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 276.96 145.04 C 278.58 144.50 280.21 143.97 281.83 143.42 C 281.84 145.47 281.82 147.52 281.83 149.57 C 283.18 149.54 284.54 149.51 285.90 149.48 C 285.90 150.78 285.91 152.07 285.91 153.37 C 284.55 153.34 283.19 153.31 281.84 153.29 C 281.99 157.50 281.43 161.79 282.18 165.97 C 282.44 167.98 284.89 167.10 286.22 167.39 C 286.07 168.58 285.92 169.77 285.77 170.96 C 283.06 171.45 279.42 172.09 277.89 169.10 C 275.69 164.14 277.10 158.53 276.90 153.29 C 276.10 153.30 274.49 153.33 273.68 153.35 C 273.69 152.39 273.69 150.46 273.70 149.50 C 274.48 149.52 276.04 149.57 276.82 149.60 C 276.86 148.08 276.91 146.56 276.96 145.04 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 133.45 149.54 C 137.40 148.42 142.36 149.66 144.25 153.61 C 146.00 157.59 146.05 162.39 144.49 166.45 C 142.13 172.44 132.46 173.26 129.26 167.60 C 125.86 161.93 126.74 152.35 133.45 149.54 M 132.51 157.89 C 131.88 161.88 132.59 167.19 137.07 168.57 C 140.81 165.91 141.18 160.89 140.33 156.75 C 139.89 154.93 138.90 153.05 137.01 152.44 C 134.11 152.37 132.78 155.46 132.51 157.89 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 227.75 152.87 C 229.81 149.63 234.52 147.76 237.91 150.10 C 241.74 152.54 242.71 157.42 242.58 161.65 C 238.45 161.72 234.31 161.64 230.19 161.71 C 230.66 163.62 230.95 166.02 232.98 166.95 C 235.64 168.39 238.61 167.09 241.15 166.04 C 241.21 167.42 241.26 168.80 241.32 170.18 C 237.70 171.37 233.41 172.37 230.03 169.98 C 224.49 166.28 224.61 158.10 227.75 152.87 M 230.10 158.65 C 232.70 158.69 235.31 158.69 237.91 158.65 C 237.52 156.39 237.48 152.95 234.60 152.45 C 231.22 151.94 230.20 156.07 230.10 158.65 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 246.71 150.76 C 250.70 149.49 256.45 147.45 259.43 151.59 C 262.52 157.56 260.89 164.59 261.30 171.04 C 259.80 171.03 258.30 171.03 256.80 171.03 C 256.72 170.35 256.56 168.97 256.47 168.29 C 254.49 170.61 251.24 172.43 248.23 170.86 C 243.41 168.94 243.43 161.21 247.96 158.98 C 250.71 157.67 253.86 157.83 256.82 157.57 C 256.13 155.98 255.94 153.66 253.98 153.10 C 251.43 152.15 248.98 154.04 246.72 154.95 C 246.72 153.90 246.71 151.81 246.71 150.76 M 249.16 165.12 C 249.41 168.27 253.02 168.44 255.32 167.40 C 256.20 164.96 256.72 162.41 256.59 159.80 C 253.62 160.20 248.24 160.81 249.16 165.12 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 148.40 149.49 C 149.87 149.50 151.34 149.51 152.81 149.53 C 152.82 150.38 152.83 152.07 152.84 152.92 C 154.47 150.91 156.44 149.11 159.17 148.97 C 159.20 150.56 159.22 152.15 159.24 153.75 C 157.13 154.02 154.33 154.50 153.82 157.00 C 153.35 161.63 153.74 166.29 153.63 170.93 C 151.96 170.98 150.29 171.02 148.62 171.06 C 148.54 163.87 148.80 156.67 148.40 149.49 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 196.35 177.62 C 198.06 177.62 199.77 177.62 201.49 177.62 C 201.48 179.32 201.48 181.02 201.47 182.73 C 199.77 182.73 198.08 182.73 196.38 182.74 C 196.36 181.03 196.35 179.32 196.35 177.62 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 256.92 177.65 C 258.67 177.64 260.43 177.63 262.19 177.62 C 262.18 179.32 262.17 181.02 262.17 182.72 C 260.42 182.71 258.67 182.70 256.93 182.68 C 256.92 181.00 256.92 179.32 256.92 177.65 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 103.26 179.29 C 107.48 177.73 112.65 179.07 115.12 182.95 C 119.18 189.15 119.17 197.80 115.35 204.11 C 112.31 209.38 104.20 210.30 100.01 205.94 C 94.09 199.31 94.01 188.49 99.75 181.72 C 100.72 180.65 101.91 179.79 103.26 179.29 M 104.35 183.36 C 101.69 185.31 101.24 188.87 101.12 191.92 C 101.05 195.62 100.93 199.67 103.09 202.88 C 104.87 205.49 109.13 205.41 110.85 202.77 C 112.75 199.90 112.84 196.30 112.84 192.98 C 112.73 189.83 112.52 186.25 110.14 183.90 C 108.72 182.33 106.03 182.14 104.35 183.36 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 244.59 182.35 C 246.25 181.79 247.90 181.22 249.56 180.64 C 249.54 182.69 249.57 184.73 249.58 186.78 C 250.90 186.73 252.23 186.68 253.57 186.63 C 253.56 187.97 253.55 189.31 253.55 190.66 C 252.22 190.62 250.89 190.57 249.56 190.54 C 249.64 194.72 249.31 198.92 249.72 203.09 C 249.88 205.10 252.36 204.37 253.63 204.42 C 253.60 205.38 253.54 207.30 253.51 208.26 C 250.40 208.92 245.76 208.83 244.81 205.03 C 244.22 200.22 244.71 195.35 244.56 190.53 C 243.74 190.56 242.11 190.63 241.29 190.67 C 241.28 189.66 241.26 187.65 241.25 186.64 C 242.08 186.68 243.72 186.74 244.54 186.78 C 244.56 185.30 244.57 183.82 244.59 182.35 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 121.16 186.65 C 122.65 186.66 124.14 186.67 125.64 186.68 C 125.63 187.55 125.60 189.27 125.58 190.13 C 127.20 188.15 129.10 186.28 131.81 186.14 C 131.86 187.79 131.91 189.44 131.94 191.09 C 129.74 191.17 126.86 191.76 126.51 194.41 C 126.10 198.98 126.46 203.58 126.35 208.17 C 124.71 208.20 123.07 208.24 121.43 208.29 C 121.27 201.07 121.60 193.85 121.16 186.65 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 135.23 190.12 C 136.53 187.81 139.09 185.82 141.88 186.32 C 144.03 186.71 145.32 188.68 146.84 190.06 C 146.84 189.22 146.84 187.53 146.84 186.69 C 148.29 186.68 149.75 186.67 151.21 186.66 C 150.62 194.46 152.15 202.33 150.82 210.07 C 150.36 213.46 147.98 216.53 144.64 217.47 C 141.26 218.31 137.87 217.06 134.65 216.15 C 134.69 214.60 134.74 213.06 134.79 211.52 C 137.59 212.61 140.79 214.34 143.78 212.83 C 146.44 211.20 146.30 207.71 146.70 205.01 C 144.90 206.22 143.39 208.37 141.01 208.38 C 137.47 208.35 134.79 205.13 134.06 201.88 C 133.31 197.99 133.14 193.65 135.23 190.12 M 141.42 190.55 C 139.87 191.40 139.46 193.31 139.34 194.94 C 139.17 198.02 139.01 201.56 141.16 204.06 C 143.19 205.59 146.00 203.90 146.54 201.66 C 147.30 198.53 147.60 194.94 145.97 192.03 C 145.16 190.41 143.04 189.48 141.42 190.55 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 196.37 186.67 C 198.02 186.67 199.67 186.67 201.33 186.66 C 201.30 193.84 201.30 201.01 201.33 208.19 C 199.68 208.21 198.04 208.22 196.39 208.25 C 196.31 201.05 196.35 193.86 196.37 186.67 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 206.21 186.66 C 210.73 186.69 215.25 186.69 219.77 186.67 C 219.60 188.68 220.07 190.96 218.72 192.66 C 216.18 196.59 213.53 200.44 210.94 204.33 C 213.92 204.31 216.92 204.28 219.91 204.26 C 219.92 205.58 219.93 206.89 219.94 208.21 C 215.20 208.20 210.46 208.20 205.73 208.20 C 205.93 206.32 205.50 204.23 206.66 202.60 C 209.25 198.55 212.08 194.65 214.78 190.68 C 211.93 190.71 209.08 190.74 206.23 190.78 C 206.21 189.41 206.21 188.03 206.21 186.66 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 272.50 186.66 C 276.05 185.64 280.33 186.64 282.33 189.95 C 285.32 194.61 285.25 201.36 281.84 205.79 C 278.15 210.53 269.53 209.38 267.39 203.68 C 264.83 197.96 265.87 189.04 272.50 186.66 M 273.36 190.47 C 271.60 191.66 271.47 194.03 271.29 195.96 C 271.25 198.68 270.99 201.85 272.88 204.08 C 274.28 205.72 277.38 205.40 278.18 203.31 C 279.86 199.96 279.79 195.86 278.55 192.39 C 277.86 190.30 275.25 188.83 273.36 190.47 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 156.42 187.77 C 159.99 186.55 164.09 185.45 167.66 187.32 C 169.80 188.26 170.46 190.76 170.67 192.87 C 171.12 197.98 170.54 203.11 170.86 208.23 C 169.43 208.22 168.00 208.21 166.58 208.20 C 166.53 207.53 166.45 206.19 166.40 205.52 C 164.36 207.75 161.18 209.67 158.14 208.17 C 153.75 206.43 152.95 199.58 156.80 196.87 C 159.60 194.86 163.24 195.14 166.49 194.68 C 165.89 193.24 165.86 191.24 164.22 190.53 C 161.64 189.28 158.92 191.05 156.60 192.10 C 156.54 190.65 156.48 189.21 156.42 187.77 M 158.87 200.91 C 157.87 203.69 161.57 206.62 163.97 204.87 C 166.49 203.36 166.27 200.06 166.57 197.53 C 163.85 197.74 159.51 197.36 158.87 200.91 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 175.64 186.66 C 177.22 186.66 178.79 186.67 180.37 186.68 C 180.34 187.40 180.27 188.86 180.24 189.58 C 181.90 188.13 183.58 186.13 186.03 186.34 C 189.07 186.22 191.57 188.93 191.71 191.87 C 192.13 197.30 191.78 202.77 191.90 208.21 C 190.28 208.20 188.67 208.20 187.05 208.19 C 186.83 202.35 187.83 196.34 186.05 190.67 C 183.80 190.38 181.16 191.20 180.87 193.79 C 180.48 198.58 180.84 203.40 180.73 208.21 C 179.07 208.21 177.41 208.21 175.76 208.21 C 175.71 201.02 175.88 193.84 175.64 186.66 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 224.53 187.81 C 228.73 186.72 235.01 184.51 237.69 189.36 C 240.11 195.30 238.71 201.96 239.12 208.20 C 237.63 208.20 236.14 208.21 234.65 208.22 C 234.59 207.54 234.45 206.19 234.39 205.51 C 232.75 206.74 231.26 208.58 229.06 208.73 C 223.85 209.21 220.16 201.91 223.71 198.03 C 226.33 194.89 230.73 194.90 234.46 194.77 C 233.96 193.38 234.03 191.49 232.59 190.69 C 229.98 189.13 227.09 191.02 224.69 192.10 C 224.63 190.67 224.58 189.24 224.53 187.81 M 227.11 199.64 L 226.53 199.15 C 226.55 200.57 226.55 202.00 226.55 203.42 C 227.21 204.10 227.86 204.78 228.52 205.47 C 229.90 205.48 231.29 205.49 232.68 205.51 L 232.53 204.91 C 235.65 203.77 234.22 199.79 234.80 197.27 C 232.24 197.88 228.05 196.24 227.11 199.64 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 257.54 186.67 C 259.21 186.67 260.88 186.67 262.55 186.67 C 262.54 193.85 262.53 201.04 262.56 208.22 C 260.88 208.21 259.21 208.21 257.55 208.21 C 257.54 201.03 257.54 193.85 257.54 186.67 Z" />
<path fill="rgba(245, 247, 252, .5)" opacity="1.00" d=" M 288.38 186.59 C 290.66 186.60 293.56 186.08 293.39 189.34 C 294.93 187.85 296.63 186.07 299.00 186.35 C 302.07 186.29 304.35 189.03 304.60 191.92 C 305.13 197.32 304.68 202.77 304.86 208.20 C 303.18 208.20 301.50 208.20 299.82 208.21 C 299.62 202.96 300.30 197.63 299.38 192.44 C 298.49 189.28 294.08 190.72 293.79 193.51 C 293.30 198.39 293.72 203.31 293.60 208.21 C 291.92 208.21 290.25 208.21 288.58 208.21 C 288.52 201.00 288.73 193.79 288.38 186.59 Z" />
</svg></span>
</a>

  </article> 
  
  <article>
   <div class=actualt>&copy; Information</div>  
  <?php echo $info?> CSS/SVG/PHP scripts were developed by <a href="https://weather34.com" title="weather34.com" target="_blank" style="font-size:9px;">weather34.com</a>  for use in the weather34 template &copy; 2015-<?php echo date('Y');?>
  
  </article> 
  
</main>
