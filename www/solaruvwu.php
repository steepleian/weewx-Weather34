<?php 
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
//weather34 solar and uvindex module 27th Jan 2017 //
include_once('w34CombinedData.php');include('common.php');
$hi = 0;foreach ($darkskyhourlyCond as $cond) {$darkskyhourlyuv = $cond['uvIndex']; if ($hi++ == 0) break; }$weather["uv3"]=$darkskyhourlyuv ;
$result = date_sun_info(time(), $lat, $lon); '<pre>'.time().print_r($result,true); $nextday = time() + 24*60*60; $result2 = date_sun_info($nextday,$lat, $lon); '<pre>'.print_r($result2,true); 
$nextrise = $result['sunrise']; $now = time(); if ($now > $nextrise) { $nextrise = date('H:i',$result2['sunrise']);} else {$nextrise = date('H:i',$nextrise);} 
$nextset = $result['sunset']; if ($now > $nextset) { $nextset = date('H:i',$result2['sunset']);} else {$nextset = date('H:i',$nextset);} $firstrise = $result['sunrise']; $secondrise = $result2['sunrise']; $firstset = $result ['sunset']; if ($now < $firstrise) { $time = $firstrise - $now; $hrs = gmdate ('G',$time); $min = gmdate ('i',$time);;} elseif ($now < $firstset) { $time = $firstset - $now; $hrs = gmdate ('G',$time); $min = gmdate ('i',$time); } else { $time = $secondrise - $now; $hrs = gmdate ('G',$time); $min = gmdate ('i',$time);}$sunset=date('Hi',$firstset);$sunrise=date('Gi',$firstrise);
$nextset = $result['sunset']; if ($now > $nextset) { $nextset = date('H:i',$result2['sunset']);}?>
<div class="updatedtime"><span><?php if(file_exists($livedata2)&&time()- filemtime($livedata2)>300)echo $offline. '<offline> Offline </offline>';else echo $online." ".$weather["time"];?></div>  
<div class="weather34solarword"><valuetext>W/m&sup2 </valuetext> </div><div class="weather34solarvalue">
<div class="solartodaycontainer1"><?php 
if ($weather["solar"]==0){echo "<div class=solarluxtodaydark>".$weather["solar"];}
else if ($weather["solar"]>0){echo "<div class=solarluxtoday>".$weather["solar"];}?></div></div></div>
<div class="solarluxtodayword"><valuetext>Solar Radiation</valuetext></div><div class="solarwrap"></div>
<?php
$json='jsondata/wuforecast.txt';
$weather34wuurl=file_get_contents($json);
$parsed_weather34wujson = json_decode($weather34wuurl,false);
$parsed_weather34wujson1 = json_decode($weather34wuurl,true);
{    if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){
	 $wuskydayUV = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[1];
	 $wuskydayUVdesc = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[1];}	 
	 else {
	 $wuskydayIcon=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0];	 
	 $wuskydayUV = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[0];
	 $wuskydayUVdesc = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[0];	 
	 }}	 
?>

<div class="uvcontainer1"><?php 
if ($wuskydayUV>10) {echo '<div class=uvtoday11>'.number_format($wuskydayUV,0)."<smalluvunit> &nbsp;UVI";}
else if ($wuskydayUV>8) {echo '<div class=uvtoday9-10>'.number_format($wuskydayUV,0)."<smalluvunit> &nbsp;UVI";}
else if ($wuskydayUV>5) {echo '<div class=uvtoday6-8>'.number_format($wuskydayUV,0)."<smalluvunit> &nbsp;UVI";}
else if ($wuskydayUV>3) {echo '<div class=uvtoday4-5>'.number_format($wuskydayUV,0)."<smalluvunit> &nbsp;UVI";}
else if (date('Hi')>$sunset && $wuskydayUV==0) {echo '<div class=uvtodaydark>'.number_format($wuskydayUV,0)."<smalluvunit> &nbsp;UVI";}
else if (date('Gi')<$sunrise && $wuskydayUV==0) {echo '<div class=uvtodaydark>'.number_format($wuskydayUV,0)."<smalluvunit> &nbsp;UVI";}
else if ($wuskydayUV>=0) {echo '<div class=uvtoday1-3>'.number_format($wuskydayUV,0)."<smalluvunit> &nbsp;UVI";}?></smallrainunit></div></div>
<div class="uvtrend"><?php echo "UV INDEX"?></div>  
<div class="uvcaution"><value>&nbsp;&nbsp;<?php echo "UVI ",$lang['Forecast'];?><value></div>

<div class="weather34luxword"><valuetext>Lux</valuetext></div> <div class="weather34luxvalue"><div class="luxtodaycontainer1">
<?php 
if ($weather["lux"]>99999) {echo "<div class=luxtoday>".number_format($weather["lux"]/1000,0). "K";}
else if($weather["lux"]==0) echo "<div class=luxtodaydark>".$weather["lux"];
else echo "<div class=luxtoday>".$weather["lux"];?> 
</div></div></div><div class="luxtodayword"><valuetext>Brightness<valuetext></div><div class="luxwrap"></div>

<div class="uvcautionbig"><?php if ($wuskydayUV>=10) {echo $uviclear.'<span>UVI</span> Extreme';}else if ($wuskydayUV>=8) {echo $uviclear.'<span>UVI</span> Very High';}else if ($wuskydayUV>=6) {echo $uviclear.'<span>UVI</span> High';}else if ($wuskydayUV>=3) {echo $uviclear.'<span>UVI</span> Moderate';}
else if (date('Hi')>$sunset && $wuskydayUV>=0 ) {echo $uviclear,"Below Horizon";}else if (date('Gi')<$sunrise && $wuskydayUV>=0 ) {echo $uviclear,"Below Horizon";}else if ($wuskydayUV>=0 ) {echo $uviclear,'<span>UVI</span> Low';}else if ($wuskydayUV>=0 ) {echo $uviclear,'<span>UVI</span> Very Low';}?></div>
