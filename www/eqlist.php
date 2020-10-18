<?php include('settings.php');include('w34CombinedData.php');
error_reporting(0); 

	####################################################################################################
	#	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2015-18                                       #
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at https://weather34.com/homeweatherstation/index.html # 
	# 	                                                                                               #
	# 	                                                                                               #
	# 	WEATHER34 EARTHQUAKES LISTING: 7th Feb 2018   	                                               #
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################

?>

<?php //current eqlist
date_default_timezone_set($TZ);
//$json_string=file_get_contents('http://earthquake-report.com/feeds/recent-eq?json');
$json_string=file_get_contents('jsondata/eqnotification.txt');
$parsed_json=json_decode($json_string,true);
$magnitude = array();
$eqtitle = array();
$depth = array();
$time = array();
$lati = array();
$longi = array();
$eventime = array();
for ($i = 0; $i < 100; $i++) {
	$magnitude[$i]=number_format($parsed_json{$i}{'magnitude'},1);
	$eqtitle[$i]=$parsed_json{$i}['title'];
	$depth[$i]=$parsed_json{$i}['depth'];
	$time[$i]=$parsed_json{$i}['date_time'];
	$lati[$i]=$parsed_json{$i}['latitude'];
	$longi[$i]=$parsed_json{$i}['longitude'];
	$eventime[$i]=date($timeFormatShort, strtotime($time[$i]) );
	$eqdist[$i] = round(distance($lat, $lon, $lati[$i], $longi[$i])) ;
	
	
}
$eqalert='<svg id="i-activity" viewBox="0 0 32 32" width="52" height="52" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M4 16 L11 16 14 29 18 3 21 16 28 16" />
</svg>';
$eqalert6='<svg id="i-activity" viewBox="0 0 32 32" width="28" height="28" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M4 16 L11 16 14 29 18 3 21 16 28 16" />
</svg>';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 Recent Earthquakes Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@font-face{font-family:weathertext2;src:url(css/fonts/verbatim-regular.woff) format("woff"),url(fonts/verbatim-regular.woff2) format("woff2"),url(fonts/verbatim-regular.ttf) format("truetype")}
html,body{font-size:13px;font-family: "weathertext2", Helvetica, Arial, sans-serif;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;}
.grid { 
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 2fr));
  grid-gap: 10px;
  align-items: stretch;
  color:#f5f7fc
  }
.grid > article {
 border: 1px solid rgba(245, 247, 252,.02);
  box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.6);
  padding:20px;
  font-size:0.8em;
  -webkit-border-radius:4px;
  border-radius:4px;
  background:0;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;
}
.grid > article img {
  max-width: 100%;
}

  
 .weather34chart-btn.close:after,.weather34chart-btn.close:before{color:#ccc;position:absolute;font-size:14px;font-family:Arial,Helvetica,sans-serif;font-weight:600}.weather34browser-header{flex-basis:auto;height:35px;background:#ebebeb;background:0;border-bottom:0;display:flex;margin-top:-20px;width:100%;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-moz-border-radius-topleft:5px;-moz-border-radius-topright:5px;border-top-left-radius:5px;border-top-right-radius:5px}.weather34browser-footer{flex-basis:auto;height:35px;background:#ebebeb;background:rgba(56,56,60,1);border-bottom:0;display:flex;bottom:-20px;width:97.4%;-webkit-border-bottom-right-radius:5px;-webkit-border-bottom-left-radius:5px;-moz-border-radius-bottomright:5px;-moz-border-radius-bottomleft:5px;border-bottom-right-radius:5px;border-bottom-left-radius:5px}.weather34chart-btns{position:absolute;height:35px;display:inline-block;padding:0 10px;line-height:38px;width:55px;flex-basis:auto;top:5px}.weather34chart-btn{width:14px;height:14px;border:1px solid rgba(0,0,0,.15);border-radius:6px;display:inline-block;margin:1px}.weather34chart-btn.close{background-color: rgba(255, 124, 57, 1.000)}.weather34chart-btn.close:before{content:"x";margin-top:-14px;margin-left:2px}.weather34chart-btn.close:after{content:"close window";margin-top:-13px;margin-left:15px;width:300px}a{color:#aaa;text-decoration:none}
.weather34darkbrowser{position:relative;background:0;width:100%;max-height:30px;margin:auto;margin-top:-15px;margin-left:0px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:45px;background-image:radial-gradient(circle,#EB7061 6px,transparent 8px),radial-gradient(circle,#F5D160 6px,transparent 8px),radial-gradient(circle,#81D982 6px,transparent 8px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),linear-gradient(to bottom,rgba(59,60,63,0.4) 40px,transparent 0);background-position:left top,left top,left top,right top,right top,right top,0 0;background-size:50px 45px,90px 45px,130px 45px,50px 30px,50px 45px,50px 60px,100%;background-repeat:no-repeat,no-repeat}.weather34darkbrowser[url]:after{content:attr(url);color:#aaa;font-size:10px;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 50px 0 90px;border-radius:3px;background:rgba(97, 106, 114, 0.3);height:20px;box-sizing:border-box}
 blue{color:#01a4b4}orange{color:#009bb4}green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#CC0}purple{color:#916392}

smalluvunit{font-size:.6rem;font-family:Arial,Helvetica,system;}
smallmagunit{font-size:.55rem;font-family:Arial,Helvetica,system;font-weight:500}
.magcontainer1{left:70px;top:0}
.mag1,.mag1-3,.mag11,.mag4-5,.mag6-8,.mag9-10{
font-family:weathertext2,Arial,Helvetica,system;width:4.5rem;height:2rem;
-webkit-border-radius:2px;-moz-border-radius:2px;-o-border-radius:2px;
font-size:1.2rem;padding-top:12px;color:#fff;border-bottom:11px solid rgba(56,56,60,1);
align-items:center;justify-content:center;text-align:center;}

.magcaution,.magtrend{position:absolute;font-size:1rem}
.mag1-3{background:#9aba2f}
.mag4-5{background:rgba(230,161,65,1)}
.mag6-8{background:rgba(255,124,57,.8)}
.mag9-10{background:rgba(211,93,78,.8)}
.mag11{background:rgba(204,135,248,.7)}
.magcaution{margin-left:120px;margin-top:105px;font-family:weathertext2}
.magtrend{margin-left:135px;margin-top:40px;z-index:1;color:#fff}


.almanac{font-size:1.25em;margin-top:30px;color:rgba(56, 56, 60, 1.000);width:12em}
metricsblue{color:#44a6b5;font-family:"weathertext2",Helvetica, Arial, sans-serif;background:rgba(86, 95, 103, 0.5);-webkit-border-radius:2px;border-radius:2px;align-items:center;justify-content:center;font-size:.9em;left:10px;padding:0 3px 0 3px;}
.w34convertrain{position:relative;font-size:.5em;top:9px;color:#c0c0c0;margin-left:5px}
.hitempy{position:relative;background:rgba(61, 64, 66, 0.5);color:#fff;font-size:12px;width:110px;padding:1px;-webit-border-radius:2px;border-radius:2px;
margin-top:-48px;margin-left:72px;padding:5px;line-height:10px;font-size:9px}

.actualt{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74, 99, 111, 0.1);
padding:5px;font-family:Arial, Helvetica, sans-serif;width:100px;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;
align-items:center;justify-content:center;margin-bottom:10px;top:-15px}
.actualw{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74, 99, 111, 0.1);
padding:5px;font-family:Arial, Helvetica, sans-serif;width:100px;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;border-bottom:2px solid rgba(56,56,60,1);
align-items:center;justify-content:center;margin-bottom:10px;top:0}
.svgimage{background:rgba(0, 155, 171, 1.000);-webit-border-radius:2px;border-radius:2px;}
orange1{color:rgba(255, 131, 47, 1.000);}
</style>
<div class="weather34darkbrowser" url="Recent Earthquakes"></div>
  
<main class="grid">
  <article>  
   <div class=actualt>&nbsp;&nbsp Recent Earthquake </div>        
    <?php 
				if($magnitude[0]>=7){echo "<div class=mag9-10>",$magnitude[0],"";}
				else if($magnitude[0]>=5.8){echo "<div class=mag9-10>",$magnitude[0],"";}
				else if($magnitude[0]>=5){echo "<div class=mag6-8>",$magnitude[0],"";}
				else if($magnitude[0]>=4){echo "<div class=mag4-5>",$magnitude[0],"";}
				else if($magnitude[0]>=2){echo "<div class=mag1-3>",$magnitude[0],"";}	
				else if($magnitude[0]<2){echo "<div class=mag1-3>N/A";}		
						
				?>
<div></div>



<div class="hitempy">
<?php
	echo "";
for ($i = 0; $i < 1; $i++) {
	// EQ Latest earthquake 
	
	if ($eqdist[0]<1300)  {
	echo "<div class='time'><orange1>*Regional</orange1> <span> ".$eventime[0]."</div></span>";
	echo $eqtitle[0];
	} 
	else if ($magnitude[0]>7)  {
	echo "<div class='time'><span>",$eventime[0] ,"</div></span>";
	echo $eqtitle[0] ;
	} 
	
	
	else if ($magnitude[0]>5.7)  {
	echo "<div class='time'><span>",$eventime[0] ,"</div></span>";
	echo $eqtitle[0] ;
	} 
	
	
	else if ($magnitude[0]>5.2)  {
	echo "<div class='time'><span>",$eventime[0] ,"</div></span>";
	echo $eqtitle[0] ;
	} 
	
	else if ($magnitude[0]>4)  {
	echo "<div class='time'><span>",$eventime[0] ,"</div></span>";
	echo $eqtitle[0] ;
	} 
	
	
	else if ($magnitude[0]>3)  {
	echo "<div class='time'><span>",$eventime[0] ,"</div></span>";
	echo $eqtitle[0] ;
	} 
	
	else if ($magnitude[0]>2)  {
	echo "<div class='time'><span>",$eventime[0] ,"</div></span>";
	echo $eqtitle[0] ;
	} 
}

?><br>
<?php
			
if ($windunit == 'mph' && $eqdist[0]<200) {
		 echo round($eqdist[0]  * 0.621371) ." Miles from<br> $stationlocation";
	}
	
else if ($windunit == 'km/h' && $eqdist[0]<700) {
		 echo "<orange>",round($eqdist[0]) ." </orange>Km from<br> $stationlocation";
	}			

else if ($windunit == 'mph') {
		 echo round($eqdist[0]  * 0.621371) ." Miles from<br> $stationlocation";
	} else {
		 echo $eqdist[0] ." Km from<br> $stationlocation" ;
	}
	echo "";
	?>

</div>
</smalluvunit>
</article>  
  
 <article>  
   <div class=actualt>&nbsp;&nbsp Recent Earthquake </div>        
    <?php  //1
				if($magnitude[1]>=7){echo "<div class=mag9-10>",$magnitude[1],"";}
				else if($magnitude[1]>=5.8){echo "<div class=mag9-10>",$magnitude[1],"";}
				else if($magnitude[1]>=5){echo "<div class=mag6-8>",$magnitude[1],"";}
				else if($magnitude[1]>=4){echo "<div class=mag4-5>",$magnitude[1],"";}
				else if($magnitude[1]>=2){echo "<div class=mag1-3>",$magnitude[1],"";}	
				else if($magnitude[1]<2){echo "<div class=mag1-3>N/A";}		
						
				?>
<div></div>



<div class="hitempy">
<?php
	echo "";
for ($i = 0; $i < 1; $i++) {
	// EQ Latest earthquake 
	
	if ($eqdist[1]<1300)  {
	echo "<div class='time'><orange1>*Regional</orange1> <span> ".$eventime[1]."</div></span>";
	echo $eqtitle[1];
	} 
	else if ($magnitude[1]>7)  {
	echo "<div class='time'><span>",$eventime[1] ,"</div></span>";
	echo $eqtitle[1] ;
	} 
	
	
	else if ($magnitude[1]>5.7)  {
	echo "<div class='time'><span>",$eventime[1] ,"</div></span>";
	echo $eqtitle[1] ;
	} 
	
	
	else if ($magnitude[1]>5.2)  {
	echo "<div class='time'><span>",$eventime[1] ,"</div></span>";
	echo $eqtitle[1] ;
	} 
	
	else if ($magnitude[1]>4)  {
	echo "<div class='time'><span>",$eventime[1] ,"</div></span>";
	echo $eqtitle[1] ;
	} 
	
	
	else if ($magnitude[1]>3)  {
	echo "<div class='time'><span>",$eventime[1] ,"</div></span>";
	echo $eqtitle[0] ;
	} 
	
	else if ($magnitude[1]>2)  {
	echo "<div class='time'><span>",$eventime[1] ,"</div></span>";
	echo $eqtitle[1] ;
	} 
}

?><br>
<?php
			
if ($windunit == 'mph' && $eqdist[1]<200) {
		 echo round($eqdist[1]  * 0.621371) ." Miles from<br> $stationlocation";
	}
	
else if ($windunit == 'km/h' && $eqdist[1]<700) {
		 echo "<orange>",round($eqdist[1]) ." </orange>Km from<br> $stationlocation";
	}			

else if ($windunit == 'mph') {
		 echo round($eqdist[1]  * 0.621371) ." Miles from<br> $stationlocation";
	} else {
		 echo $eqdist[1] ." Km from<br> $stationlocation" ;
	}
	echo "";
	?>

</div>
</smalluvunit>
</article>  
  
   <article>  
   <div class=actualt>&nbsp;&nbsp Recent Earthquake </div>        
    <?php //2
				if($magnitude[2]>=7){echo "<div class=mag9-10>",$magnitude[2],"";}
				else if($magnitude[2]>=5.8){echo "<div class=mag9-10>",$magnitude[2],"";}
				else if($magnitude[2]>=5){echo "<div class=mag6-8>",$magnitude[2],"";}
				else if($magnitude[2]>=4){echo "<div class=mag4-5>",$magnitude[2],"";}
				else if($magnitude[2]>=2){echo "<div class=mag1-3>",$magnitude[2],"";}	
				else if($magnitude[2]<2){echo "<div class=mag1-3>N/A";}		
						
				?>
<div></div>



<div class="hitempy">
<?php
	echo "";
for ($i = 0; $i < 1; $i++) {
	// EQ Latest earthquake 
	
	if ($eqdist[2]<1300)  {
	echo "<div class='time'><orange1>*Regional</orange1> <span> ".$eventime[2]."</div></span>";
	echo $eqtitle[2];
	} 
	else if ($magnitude[2]>7)  {
	echo "<div class='time'><span>",$eventime[2] ,"</div></span>";
	echo $eqtitle[2] ;
	} 
	
	
	else if ($magnitude[2]>5.7)  {
	echo "<div class='time'><span>",$eventime[2] ,"</div></span>";
	echo $eqtitle[2] ;
	} 
	
	
	else if ($magnitude[2]>5.2)  {
	echo "<div class='time'><span>",$eventime[2] ,"</div></span>";
	echo $eqtitle[2] ;
	} 
	
	else if ($magnitude[2]>4)  {
	echo "<div class='time'><span>",$eventime[2] ,"</div></span>";
	echo $eqtitle[2] ;
	} 
	
	
	else if ($magnitude[2]>3)  {
	echo "<div class='time'><span>",$eventime[2] ,"</div></span>";
	echo $eqtitle[0] ;
	} 
	
	else if ($magnitude[2]>2)  {
	echo "<div class='time'><span>",$eventime[2] ,"</div></span>";
	echo $eqtitle[2] ;
	} 
}

?><br>
<?php
			
if ($windunit == 'mph' && $eqdist[2]<200) {
		 echo round($eqdist[2]  * 0.621371) ." Miles from<br> $stationlocation";
	}
	
else if ($windunit == 'km/h' && $eqdist[2]<700) {
		 echo "<orange>",round($eqdist[2]) ." </orange>Km from<br> $stationlocation";
	}			

else if ($windunit == 'mph') {
		 echo round($eqdist[2]  * 0.621371) ." Miles from<br> $stationlocation";
	} else {
		 echo $eqdist[2] ." Km from<br> $stationlocation" ;
	}
	echo "";
	?>

</div>
</smalluvunit>
</article>  
  
   <article>  
   <div class=actualt>&nbsp;&nbsp Recent Earthquake </div>        
    <?php //3
				if($magnitude[3]>=7){echo "<div class=mag9-10>",$magnitude[3],"";}
				else if($magnitude[3]>=5.8){echo "<div class=mag9-10>",$magnitude[3],"";}
				else if($magnitude[3]>=5){echo "<div class=mag6-8>",$magnitude[3],"";}
				else if($magnitude[3]>=4){echo "<div class=mag4-5>",$magnitude[3],"";}
				else if($magnitude[3]>=2){echo "<div class=mag1-3>",$magnitude[3],"";}	
				else if($magnitude[3]<2){echo "<div class=mag1-3>N/A";}		
						
				?>
<div></div>



<div class="hitempy">
<?php
	echo "";
for ($i = 0; $i < 1; $i++) {
	// EQ Latest earthquake 
	
	if ($eqdist[3]<1300)  {
	echo "<div class='time'><orange1>*Regional</orange1> <span> ".$eventime[3]."</div></span>";
	echo $eqtitle[3];
	} 
	else if ($magnitude[3]>7)  {
	echo "<div class='time'><span>",$eventime[3] ,"</div></span>";
	echo $eqtitle[3] ;
	} 
	
	
	else if ($magnitude[3]>5.7)  {
	echo "<div class='time'><span>",$eventime[3] ,"</div></span>";
	echo $eqtitle[3] ;
	} 
	
	
	else if ($magnitude[3]>5.2)  {
	echo "<div class='time'><span>",$eventime[3] ,"</div></span>";
	echo $eqtitle[3] ;
	} 
	
	else if ($magnitude[3]>4)  {
	echo "<div class='time'><span>",$eventime[3] ,"</div></span>";
	echo $eqtitle[3] ;
	} 
	
	
	else if ($magnitude[3]>3)  {
	echo "<div class='time'><span>",$eventime[3] ,"</div></span>";
	echo $eqtitle[3] ;
	} 
	
	else if ($magnitude[3]>2)  {
	echo "<div class='time'><span>",$eventime[3] ,"</div></span>";
	echo $eqtitle[3] ;
	} 
}

?><br>
<?php
			
if ($windunit == 'mph' && $eqdist[0]<200) {
		 echo round($eqdist[3]  * 0.621371) ." Miles from<br> $stationlocation";
	}
	
else if ($windunit == 'km/h' && $eqdist[0]<700) {
		 echo "<orange>",round($eqdist[3]) ." </orange>Km from<br> $stationlocation";
	}			

else if ($windunit == 'mph') {
		 echo round($eqdist[3]  * 0.621371) ." Miles from<br> $stationlocation";
	} else {
		 echo $eqdist[3] ." Km from<br> $stationlocation" ;
	}
	echo "";
	?>

</div>
</smalluvunit>
</article>  

 <article>  
   <div class=actualt>&nbsp;&nbsp Recent Earthquake </div>        
    <?php //4
				if($magnitude[4]>=7){echo "<div class=mag9-10>",$magnitude[4],"";}
				else if($magnitude[4]>=5.8){echo "<div class=mag9-10>",$magnitude[4],"";}
				else if($magnitude[4]>=5){echo "<div class=mag6-8>",$magnitude[4],"";}
				else if($magnitude[4]>=4){echo "<div class=mag4-5>",$magnitude[4],"";}
				else if($magnitude[4]>=2){echo "<div class=mag1-3>",$magnitude[4],"";}	
				else if($magnitude[4]<2){echo "<div class=mag1-3>N/A";}		
						
				?>
<div></div>



<div class="hitempy">
<?php
	echo "";
for ($i = 0; $i < 1; $i++) {
	// EQ Latest earthquake 
	
	if ($eqdist[4]<1300)  {
	echo "<div class='time'><orange1>*Regional</orange1> <span> ".$eventime[4]."</div></span>";
	echo $eqtitle[4];
	} 
	else if ($magnitude[4]>7)  {
	echo "<div class='time'><span>",$eventime[4] ,"</div></span>";
	echo $eqtitle[4] ;
	} 
	
	
	else if ($magnitude[4]>5.7)  {
	echo "<div class='time'><span>",$eventime[4] ,"</div></span>";
	echo $eqtitle[4] ;
	} 
	
	
	else if ($magnitude[4]>5.2)  {
	echo "<div class='time'><span>",$eventime[4] ,"</div></span>";
	echo $eqtitle[4] ;
	} 
	
	else if ($magnitude[4]>4)  {
	echo "<div class='time'><span>",$eventime[4] ,"</div></span>";
	echo $eqtitle[4] ;
	} 
	
	
	else if ($magnitude[4]>3)  {
	echo "<div class='time'><span>",$eventime[4] ,"</div></span>";
	echo $eqtitle[4] ;
	} 
	
	else if ($magnitude[4]>2)  {
	echo "<div class='time'><span>",$eventime[4] ,"</div></span>";
	echo $eqtitle[4] ;
	} 
}

?><br>
<?php
			
if ($windunit == 'mph' && $eqdist[4]<200) {
		 echo round($eqdist[4]  * 0.621371) ." Miles from<br> $stationlocation";
	}
	
else if ($windunit == 'km/h' && $eqdist[4]<700) {
		 echo "<orange>",round($eqdist[4]) ." </orange>Km from<br> $stationlocation";
	}			

else if ($windunit == 'mph') {
		 echo round($eqdist[4]  * 0.621371) ." Miles from<br> $stationlocation";
	} else {
		 echo $eqdist[4] ." Km from<br> $stationlocation" ;
	}
	echo "";
	?>

</div>
</smalluvunit>
</article>  
  
 <article>  
   <div class=actualt>&nbsp;&nbsp Recent Earthquake </div>        
    <?php //5
				if($magnitude[5]>=7){echo "<div class=mag9-10>",$magnitude[5],"";}
				else if($magnitude[5]>=5.8){echo "<div class=mag9-10>",$magnitude[5],"";}
				else if($magnitude[5]>=5){echo "<div class=mag6-8>",$magnitude[5],"";}
				else if($magnitude[5]>=4){echo "<div class=mag4-5>",$magnitude[5],"";}
				else if($magnitude[5]>=2){echo "<div class=mag1-3>",$magnitude[5],"";}	
				else if($magnitude[5]<2){echo "<div class=mag1-3>N/A";}		
						
				?>
<div></div>



<div class="hitempy">
<?php
	echo "";
for ($i = 0; $i < 1; $i++) {
	// EQ Latest earthquake 
	
	if ($eqdist[5]<1300)  {
	echo "<div class='time'><orange1>*Regional</orange1> <span> ".$eventime[5]."</div></span>";
	echo $eqtitle[5];
	} 
	else if ($magnitude[5]>7)  {
	echo "<div class='time'><span>",$eventime[5] ,"</div></span>";
	echo $eqtitle[0] ;
	} 
	
	
	else if ($magnitude[5]>5.7)  {
	echo "<div class='time'><span>",$eventime[5] ,"</div></span>";
	echo $eqtitle[5] ;
	} 
	
	
	else if ($magnitude[5]>5.2)  {
	echo "<div class='time'><span>",$eventime[5] ,"</div></span>";
	echo $eqtitle[5] ;
	} 
	
	else if ($magnitude[5]>4)  {
	echo "<div class='time'><span>",$eventime[5] ,"</div></span>";
	echo $eqtitle[5] ;
	} 
	
	
	else if ($magnitude[5]>3)  {
	echo "<div class='time'><span>",$eventime[5] ,"</div></span>";
	echo $eqtitle[5] ;
	} 
	
	else if ($magnitude[5]>2)  {
	echo "<div class='time'><span>",$eventime[5] ,"</div></span>";
	echo $eqtitle[5] ;
	} 
}

?><br>
<?php
			
if ($windunit == 'mph' && $eqdist[5]<200) {
		 echo round($eqdist[5]  * 0.621371) ." Miles from<br> $stationlocation";
	}
	
else if ($windunit == 'km/h' && $eqdist[5]<700) {
		 echo "<orange>",round($eqdist[5]) ." </orange>Km from<br> $stationlocation";
	}			

else if ($windunit == 'mph') {
		 echo round($eqdist[5]  * 0.621371) ." Miles from<br> $stationlocation";
	} else {
		 echo $eqdist[5] ." Km from<br> $stationlocation" ;
	}
	echo "";
	?>

</div>
</smalluvunit>
</article>  


<article>  
   <div class=actualt>&nbsp;&nbsp Recent Earthquake </div>        
    <?php //6
				if($magnitude[6]>=7){echo "<div class=mag9-10>",$magnitude[6],"";}
				else if($magnitude[6]>=5.8){echo "<div class=mag9-10>",$magnitude[6],"";}
				else if($magnitude[6]>=5){echo "<div class=mag6-8>",$magnitude[6],"";}
				else if($magnitude[6]>=4){echo "<div class=mag4-5>",$magnitude[6],"";}
				else if($magnitude[6]>=2){echo "<div class=mag1-3>",$magnitude[6],"";}	
				else if($magnitude[6]<2){echo "<div class=mag1-3>N/A";}		
						
				?>
<div></div>



<div class="hitempy">
<?php
	echo "";
for ($i = 0; $i < 1; $i++) {
	// EQ Latest earthquake 
	
	if ($eqdist[6]<1300)  {
	echo "<div class='time'><orange1>*Regional</orange1> <span> ".$eventime[6]."</div></span>";
	echo $eqtitle[6];
	} 
	else if ($magnitude[6]>7)  {
	echo "<div class='time'><span>",$eventime[6] ,"</div></span>";
	echo $eqtitle[6] ;
	} 
	
	
	else if ($magnitude[6]>5.7)  {
	echo "<div class='time'><span>",$eventime[6] ,"</div></span>";
	echo $eqtitle[6] ;
	} 
	
	
	else if ($magnitude[6]>5.2)  {
	echo "<div class='time'><span>",$eventime[6] ,"</div></span>";
	echo $eqtitle[6] ;
	} 
	
	else if ($magnitude[6]>4)  {
	echo "<div class='time'><span>",$eventime[6] ,"</div></span>";
	echo $eqtitle[6] ;
	} 
	
	
	else if ($magnitude[6]>3)  {
	echo "<div class='time'><span>",$eventime[6] ,"</div></span>";
	echo $eqtitle[6] ;
	} 
	
	else if ($magnitude[6]>2)  {
	echo "<div class='time'><span>",$eventime[6] ,"</div></span>";
	echo $eqtitle[6] ;
	} 
}

?><br>
<?php
			
if ($windunit == 'mph' && $eqdist[6]<200) {
		 echo round($eqdist[6]  * 0.621371) ." Miles from<br> $stationlocation";
	}
	
else if ($windunit == 'km/h' && $eqdist[6]<700) {
		 echo "<orange>",round($eqdist[6]) ." </orange>Km from<br> $stationlocation";
	}			

else if ($windunit == 'mph') {
		 echo round($eqdist[6]  * 0.621371) ." Miles from<br> $stationlocation";
	} else {
		 echo $eqdist[6] ." Km from<br> $stationlocation" ;
	}
	echo "";
	?>

</div>
</smalluvunit>
</article>  

<article>  
   <div class=actualt>&nbsp;&nbsp Recent Earthquake </div>        
    <?php //7
				if($magnitude[7]>=7){echo "<div class=mag9-10>",$magnitude[7],"";}
				else if($magnitude[7]>=5.8){echo "<div class=mag9-10>",$magnitude[7],"";}
				else if($magnitude[7]>=5){echo "<div class=mag6-8>",$magnitude[7],"";}
				else if($magnitude[7]>=4){echo "<div class=mag4-5>",$magnitude[7],"";}
				else if($magnitude[7]>=2){echo "<div class=mag1-3>",$magnitude[7],"";}	
				else if($magnitude[7]<2){echo "<div class=mag1-3>N/A";}		
						
				?>
<div></div>



<div class="hitempy">
<?php
	echo "";
for ($i = 0; $i < 1; $i++) {
	// EQ Latest earthquake 
	
	if ($eqdist[7]<1300)  {
	echo "<div class='time'><orange1>*Regional</orange1> <span> ".$eventime[7]."</div></span>";
	echo $eqtitle[7];
	} 
	else if ($magnitude[7]>7)  {
	echo "<div class='time'><span>",$eventime[7] ,"</div></span>";
	echo $eqtitle[7] ;
	} 
	
	
	else if ($magnitude[7]>5.7)  {
	echo "<div class='time'><span>",$eventime[7] ,"</div></span>";
	echo $eqtitle[7] ;
	} 
	
	
	else if ($magnitude[7]>5.2)  {
	echo "<div class='time'><span>",$eventime[7] ,"</div></span>";
	echo $eqtitle[7] ;
	} 
	
	else if ($magnitude[7]>4)  {
	echo "<div class='time'><span>",$eventime[7] ,"</div></span>";
	echo $eqtitle[7] ;
	} 
	
	
	else if ($magnitude[7]>3)  {
	echo "<div class='time'><span>",$eventime[7] ,"</div></span>";
	echo $eqtitle[7] ;
	} 
	
	else if ($magnitude[7]>2)  {
	echo "<div class='time'><span>",$eventime[7] ,"</div></span>";
	echo $eqtitle[7] ;
	} 
}

?><br>
<?php
			
if ($windunit == 'mph' && $eqdist[7]<200) {
		 echo round($eqdist[7]  * 0.621371) ." Miles from<br> $stationlocation";
	}
	
else if ($windunit == 'km/h' && $eqdist[7]<700) {
		 echo "<orange>",round($eqdist[7]) ." </orange>Km from<br> $stationlocation";
	}			

else if ($windunit == 'mph') {
		 echo round($eqdist[7]  * 0.621371) ." Miles from<br> $stationlocation";
	} else {
		 echo $eqdist[7] ." Km from<br> $stationlocation" ;
	}
	echo "";
	?>

</div>
</smalluvunit>
</article>  
  
  
  <article>
   <div class=actualt>&nbsp;&nbsp &copy; Information</div>
   <span style="font-size:8px;">  
  <?php echo $info?> CSS/SVG/PHP scripts were developed by <a href="https://weather34.com" title="weather34.com" target="_blank" style="font-size:9px;">weather34.com</a>  for use in the weather34 template &copy; 2015-<?php echo date('Y');?>
  
  <br>
  <br>
  <?php echo $info?>  
<a href="http://earthquake-report.com" title="Earthquake-Report.com" target="_blank">Data © <?php echo date('Y');?> Earthquake-Report.com</a></span>

  
  </article> 
</main>
