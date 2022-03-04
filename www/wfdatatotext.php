<?php

$file1 = 'jsondata/wf.txt';
$url = $file1;
$content = file_get_contents($url);
$json = json_decode($content, true);

foreach($json['obs'] as $item) {
   $weatherflow['lastlightningtime']  = $item['lightning_strike_last_epoch'];
   $weatherflow['lightningdistance']  = $item['lightning_strike_last_distance'];
   $weatherflow['lightning']  		  = $item['lightning_strike_count'];
   $weatherflow['lightning3hr']  	  = $item['lightning_strike_count_last_3hr'];
   }

$myfile = fopen("/var/www/html/weewx/weather34/filepileformat.txt", "w") or die("Unable to open file!");
$txt = "distance = " + $weatherflow['lightningdistance'];
fwrite($myfile, $txt);
$txt = "count = " + $weatherflow['lightning'];
fwrite($myfile, $txt);
fclose($myfile);
?>