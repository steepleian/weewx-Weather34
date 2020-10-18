<?php include('settings.php');include('shared.php');date_default_timezone_set($TZ);header('Content-type: text/html; charset=utf-8');error_reporting(0);?>
<body>
<?php 
$url2 = 'https://swd.weatherflow.com/swd/rest/observations/station/'.$weatherflowID.'?api_key=5675886d24b02a37107eb5076d5e1d9f'; 
$ch2 = curl_init($url2);
$filename2 = 'jsondata/weatherflow.txt';
$complete_save_loc2 = $filename2; 
$fp2 = fopen($complete_save_loc2, 'wb'); 
curl_setopt($ch2, CURLOPT_FILE, $fp2);
curl_setopt($ch2, CURLOPT_HEADER, 0);
curl_exec($ch2);
curl_close($ch2);
fclose($fp2);
?>
<?php 
    //weather34 weatherflow air lightning
$file1 = 'jsondata/weatherflow.txt';
$url = $file1;
$content = file_get_contents($url);
$json = json_decode($content, true);    
foreach($json['obs'] as $item){
   $weatherflow['lastlightningtime']  = $item['lightning_strike_last_epoch'];   $weatherflow['lightningdistance']  = $item['lightning_strike_last_distance'];
   $weatherflow['lightning']  = $item['lightning_strike_count'];   $weatherflow['lightning3hr']  = $item['lightning_strike_count_last_3hr'];}
?>


</div>
<div class="wfstrike">
<?php //weather34 wf lightning
 echo "<wfstriketoday>",$weatherflow["lightning3hr"]  ;
 ?></wfstriketoday></div>
<div class="minwordl">Strikes</div></div>
<div class="mintimedate"><value>&nbsp;Last 3 Hrs<value></div>
<div class='wflaststrike'>
<?php 
if ($windunit == 'mph'){echo "<spanfeelstitle>Last Distance At:<orange> " .number_format($weatherflow['lightningdistance']*0.621371,1). "  </orange>mi";}
else  echo "<spanfeelstitle>Last Distance At:<orange> " .$weatherflow['lightningdistance']. "  </orange>km";
?><br>
<?php 
//weather34 weather34 last detect
echo "<spanfeelstitle>Last Detected: <orange> ".date('jS M H:i',$weatherflow['lastlightningtime'])." </orange> ";?></div>