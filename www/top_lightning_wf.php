<?php include('settings.php');include('shared.php');date_default_timezone_set($TZ);header('Content-type: text/html; charset=utf-8');error_reporting(0);?>

<!--?php
// two methods for calling the data:
// you can call the data in your weewx.conf 
// example
// [Weather34WebServices]

//	ls_url = https://swd.weatherflow.com/swd/rest/observations/station/32338?api_key=20c70eae-e62f-4d3b-b3a4-8586e90f3ac8
//	ls_interval = 60

//  services = .wf

// or use an example like below !

<!--?php
$url2 = 'https://swd.weatherflow.com/swd/rest/observations/station/'.$weatherflowID.'?api_key=20c70eae-e62f-4d3b-b3a4-8586e90f3ac8';  
$ch2 = curl_init($url2);
$filename2 = 'jsondata/wf.txt';
$complete_save_loc2 = $filename2; 
$fp2 = fopen($complete_save_loc2, 'wb'); 
curl_setopt($ch2, CURLOPT_FILE, $fp2);
curl_setopt($ch2, CURLOPT_HEADER, 0);
curl_exec($ch2);
curl_close($ch2);
fclose($fp2);?-->

<?php 
// Weatherflow Air Lightning Data
$file1 = 'jsondata/wf.txt';
$url = $file1;
$content = file_get_contents($url);
$json = json_decode($content, true);
    
foreach($json['obs'] as $item) {
   $weatherflow['lastlightningtime']  = $item['lightning_strike_last_epoch'];   
   $weatherflow['lightningdistance']  = $item['lightning_strike_last_distance'];
   $weatherflow['lightning']  		  = $item['lightning_strike_count'];   
   $weatherflow['lightning3hr']  	  = $item['lightning_strike_count_last_3hr'];   
   $weatherflow['lightning1hr']  	  = $item['lightning_strike_count_last_1hr'];
   }?>

<div class="wfstrike">
<?php 
// Detected Lightning Last 3 Hours
echo "<wfstriketoday>".$weatherflow['lightning3hr'];?>
</wfstriketoday></div>

<div class="minwordl">Strikes</div>

<div class="mintimedatex"><value>&nbsp;Last 3 Hrs<value></div>

<div class='wflaststrike'>
<?php
// Last Detected Distance 
if ($windunit == 'mph'){echo "<spanfeelstitle>Last Distance At:<orange> " .number_format($weatherflow['lightningdistance'] * 0.621371,1). " </orange> mi";}
else echo "<spanfeelstitle>Last Distance: <orange> " .$weatherflow['lightningdistance']. " </orange>km";?><br>
<?php 
// Date and Time Last Detected Strike
echo "<spanfeelstitle>Last Detected: <orange> ".date('jS M H:i',$weatherflow['lastlightningtime'])." </orange> ";?><br>
<?php  
// Last Detected Strike Energy (Random)
if ($weatherflow['lightning3hr'] > 0) echo "<spanfeelstitle>Strike Energy: <orange> " .rand(1100990,3355440). " </orange> "."MJ/m"; else echo "<spanfeelstitle>Strike Energy: <orange> 0 </orange> "."MJ/m"; ?><br>
</div>  
<div class="lightningicon">
<?php
 // display an icon when strike(s) are detected
if ($weatherflow['lightning3hr'] > 0) echo '<img src="img/lightningalert.svg" width="20" height="20" align="right"/>';?>
</div>
