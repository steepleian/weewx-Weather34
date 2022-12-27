 <?php 
include('w34CombinedData.php');include('settings1.php');date_default_timezone_set($TZ);


$json_string = file_get_contents("jsondata/awa.txt");
$parsed_json = json_decode($json_string, true);
$name = $parsed_json["response"][0]["details"]["name"];
$color = $parsed_json["response"][0]["details"]["color"];
$begins = $parsed_json["response"][0]["timestamps"]["beginsISO"];
$expires = $parsed_json["response"][0]["timestamps"]["expiresISO"];
$code = $parsed_json["error"]["code"];

?>

<div class="wulargeforecasthome"><div class="wulargediv">
<div class="eqcirclehomeregional"><div class="eqtexthomeregional" style="color:<?php echo $color;?>;">
<?php
///aw alerts
if ($code == "")
{echo '<spanelightning><alertadvisory2><a alt="Alerts" title="Alerts" href="pop_nwsalerts.php" data-lity></alertadvisory2><alertpos><alertvalue>'.$name.'<br> '.$alerttype.'</alertvalue></alertpos>
   </spanelightning></div></div></div>';}
  else if ($code == "warn_no_data")
  {echo '<spanelightning><alertadvisory><a alt="Alerts" title="Alerts" href="pop_nwsalerts.php" data-lity>'.$newalertwhite.'</alertadvisory><alertvalue> Currently <lightgreen>No Advisories</lightgreen></alertvalue>
 </spanelightning></div></div></div>';} 
   
   
 
  ?></noalert></div></div>
