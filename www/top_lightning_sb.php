<?php
//###################################################################################################################
//	weewx-Weather34 Template maintained by Ian Millard (Steepleian)                                 				#
//	                                                                                                				#
//  Contains original legacy code (by agreement) created and developed by Brian Underdown (https://weather34.com)   #
//  for the (now superseeded) original Weather34 Template which is no longer maintained by its creator              #
//  © weather34.com original CSS/SVG/PHP 2015-2019                                                                  #
// 	                                                                                                				#
//  Contains original code by Ian Millard and collaborators															#
//  © claydonsweather.org.uk original CSS/SVG/PHP 2020-2021                                                         #
// 	                                                                                                				#
// 	Issues for weewx-Weather34 template should be addressed to https://github.com/steepleian/weewx-Weather34/issues #                                                                                              #
// 	                                                                                                				#
//###################################################################################################################
include('serverdata/archivedata.php');
include('settings.php');
include('shared.php');
date_default_timezone_set($TZ);
header('Content-type: text/html; charset=utf-8');
error_reporting(0);
?>
<body>
<?php 
// Weatherflow Tempest Lightning Data
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
<?php //weather34  lightning
 echo "<wfstriketoday>",$weatherflow['lightning3hr']  ;
 ?></wfstriketoday></div>
<div class="minwordl">Strikes</div></div>
<div class="mintimedatex"><value>&nbsp;Last 3 Hrs<value></div>
<div class='wflaststrike'>
  <?php
//weather34 weather34 last detect
if (isset($weatherflow['lastlightningtime'])) {
echo "<spanfeelstitle>Last Strike: <orange> ".date("j M Y", $weatherflow['lastlightningtime'])." </orange> ";}?><br>
<?php 
if ($windunit == 'mph'){echo "<spanfeelstitle>Last Distance At:<orange> " .number_format($weatherflow['lightningdistance']*0.621371,1). "  </orange>miles";}
else  echo "<spanfeelstitle>Last Distance At:<orange> " .$weatherflow['lightningdistance']. "  </orange>km";
?><br>

<?php
//weather34 weather34 last detect
echo "<spanfeelstitle>Alltime Strike Total: <orange> ".$weewxapi[78]." </orange> ";?><br>  
</div>  
<div class="lightningicon">
<?php
 // display an icon when strike(s) are detected
if ($weatherflow['lightning3hr'] > 0) echo '<img src="img/lightningalert.svg" width="20" height="20" align="right"/>';?>
</div>