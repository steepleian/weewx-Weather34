<?php include('w34CombinedData.php');date_default_timezone_set($TZ);?>
<div class="updatedtime"><span><?php if(file_exists($livedata)&&time()- filemtime($livedata)>300)echo $offline. '<offline> Offline </offline>';else echo $online." ".$weather["time"];?></div>

<!--?php
$url2 = 'https://swd.weatherflow.com/swd/rest/observations/station/'.$weatherflowID.'?api_key=ffaca33b-3d65-4b10-ad95-9ccf23c62b2d';
// $url2 = 'https://swd.weatherflow.com/swd/rest/observations/station/'.$weatherflowID.'?api_key=20c70eae-e62f-4d3b-b3a4-8586e90f3ac8';  
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
   $weatherflow['lightning']          = $item['lightning_strike_count'];   
   $weatherflow['lightning3hr']       = $item['lightning_strike_count_last_3hr'];   
   $weatherflow['lightning1hr']       = $item['lightning_strike_count_last_1hr'];
   }?>

<div class="simsekcontainer">
<div class="simsekdata">Strikes</div> 
<?php
// Detected Lightning Last 3 Hours 
echo '<div class=simsek>'.$weatherflow["lightning3hr"];?></div>

<div class="simsektoday"><valuetext>Last 3 Hrs</valuetext></div>
</div>

<div class="lightninginfo">Strikes Recorded
<?php 
// Weatherflow Air Lightning Month Current
echo "<lightningannualx>".date('F Y').":<orange> " .str_replace(",","",$weather["lightningmonth"])." </orange></lightningannual>";?>
<?php  
// Weatherflow Air Lightning Year Current
echo "<lightningannualx1> Total ".date('Y').":<orange> " .str_replace(",","",$weather["lightningyear"])." </orange>";?>
<?php  
// Last Strike Detected
echo "<timeago>Last Strike Detected<br> <agolightning><orange>".date('jS M H:i',$weatherflow['lastlightningtime'])." </orange> ";?></div>

<div class="rainconverter">
<?php 
// Last Distance Detected
echo "<div class=tempconvertercircleyellow><orange> " .$weatherflow["lightningdistance"]."</orange><smallrainunit>&nbsp; km</smallrainunit>";?></div>
<?php 
// Last Strike Energy (Random)
echo "<div class=tempconvertercircleyellow><orange> ";?><?php echo rand(6452,28864);?><?php echo "</orange><smallrainunit>&nbsp; MJ/m</smallrainunit>";?></div>
<lightningiconx>
<?php if ($weatherflow['lightning3hr'] > 0) echo '<img src="img/lightningalert.svg" width="20" height="20" align="right"/>';?>
</lightningiconx>
