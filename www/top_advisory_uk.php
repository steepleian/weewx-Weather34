<?php include('w34CombinedData.php');error_reporting(0); 
?>

<?php
$json_icon = file_get_contents("jsondata/advisoryLookup.json");
$parsed_icon = json_decode($json_icon, true);
$xml=simplexml_load_file("jsondata/uk.txt") or die("Error: Cannot create object");
$jsonData = json_encode($xml, JSON_PRETTY_PRINT);
$parsed_json = json_decode($jsonData, true);
if(($parsed_json['channel']['item'][0]['description'])!==null){$description=$parsed_json['channel']['item'][0]['description'];}
else if (($parsed_json['channel']['item']['description']) !== null){$description=$parsed_json['channel']['item']['description'];}
      
       if (strpos($description, "Red") === 0) {$alertlevel="Red"; $lowercasealert="red"; $uppercasealert="Red Alert";}
       else if (strpos($description, "Amber") === 0) {$alertlevel="Orange"; $lowercasealert="amber"; $uppercasealert="Amber Alert";}
       else if (strpos($description, "Yellow") === 0) {$alertlevel="Yellow"; $lowercasealert="yellow"; $uppercasealert="Yellow Alert";}
       else {$uppercasealert="No Alerts"; $alerttype='In Force'; $alertlevel="White"; }
       
       if(strpos($description, "heat") !== false) {$alerttype='Extreme heat';}
       else if(strpos($description, "wind") !== false) {$alerttype='Wind';}
       else if(strpos($description, "snow") !== false) {$alerttype='Snow';}
       else if(strpos($description, "ice") !== false) {$alerttype='Ice';}
       else if(strpos($description, "fog") !== false) {$alerttype='Fog';}
       else if(strpos($description, "rain") !== false) {$alerttype='Rain';}
       else if(strpos($description, "lightning") !== false) {$alerttype='Lightning';}
       else if(strpos($description, "thunder") !== false) {$alerttype='Thunderstorms';}
       else {$alerttype='In Force';}

       if ($alerttype==='In Force'){$warnimage = "icon-warning-noalert-white.svg";}
       else {$warnimage = $parsed_icon["pop"][$alerttype]["icon"];}

?>

<?php 
if ($position6=="forecast3wularge.php" || $position6=="forecast3wu.php"){

$json='jsondata/wu.txt';
$weather34wuurl=file_get_contents($json);
$parsed_weather34wujson = json_decode($weather34wuurl,false);
{    
	 //thunder
	 $wuskythunder1 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[1];
	 $wuskythunder2 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[2];
	 $wuskythunder3 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[3];
	 $wuskythunder4 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[4];
	 $wuskythunder5 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[5];
	 $wuskythunder6 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[6];
	 $wuskythunder7 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[7];	
	 //rain
	 $wuskyrain1 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[1];
	 $wuskyrain2 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[2];
	 $wuskyrain3 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[3];
	 $wuskyrain4 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[4];
	 $wuskyrain5 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[5];
	 $wuskyrain6 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[6];
	 $wuskyrain7 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[7];	 
	 //snow
	 $wuskysnow1 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[1];
	 $wuskysnow2 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[2];
	 $wuskysnow3 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[3];
	 $wuskysnow4 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[4];
	 $wuskysnow5 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[5];
	 $wuskysnow6 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[6];
	 $wuskysnow7 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[7];
	 
	 }}?>

<div class="wulargeforecasthome"><div class="wulargediv">
<div class="eqcirclehomeregional"><div class="eqtexthomeregional">
<?php
///MetOffice
if ($alertlevel != "")
{echo '<spanelightning><alertadvisory2><a alt="Alerts" title="Alerts" href="pop_ukalerts.php" data-lity><img src="img/europe_warnings/' . $warnimage . '" width="50%" class="iconpos"></img></alertadvisory2><alertpos><alertvalue>'.$uppercasealert.'<br> '.$alerttype.'</alertvalue></alertpos>
   </spanelightning></div></div></div>';}

    //weather34 //forecast3wularge wu alerts storms 
else if ($wuskythunder1>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertadvisory>'.$newalert.'</alertadvisory><alertvalue>Expect<orange> Thunder</orange> This Week</alertvalue> 
   </spanelightning></div></div></div>';}
    else if ($wuskythunder2>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertadvisory>'.$newalert.'</alertadvisory><alertvalue>Expect<orange> Thunder</orange> This Week</alertvalue>
   </spanelightning></div></div></div>';}
    else if ($wuskythunder3>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertadvisory>'.$newalert.'</alertadvisory><alertvalue>Expect<orange> Thunder</orange> This Week</alertvalue>
   </spanelightning></div></div></div>';}
    else if ($wuskythunder4>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertadvisory>'.$newalert.'</alertadvisory><alertvalue>Expect<orange> Thunder</orange> This Week</alertvalue>
   </spanelightning></div></div></div>';}
    else if ($wuskythunder5>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertadvisory>'.$newalert.'</alertadvisory><alertvalue>Expect<orange> Thunder</orange> This Week</alertvalue>
   </spanelightning></div></div></div>';}
    else if ($wuskythunder6>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertadvisory>'.$newalert.'</alertadvisory><alertvalue>Expect<orange> Thunder</orange> This Week</alertvalue>
   </spanelightning></div></div></div>';}
    else if ($wuskythunder7>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertadvisory>'.$newalert.'</alertadvisory><alertvalue>Expect<orange> Thunder</orange> This Week</alertvalue>>
   </spanelightning></div></div></div>';}
  //forecast3 wu 
    else if ($wuskythunder1>0 && $position6=="forecast3wu.php"){echo '<spanelightning><alertadvisory>'.$newalert.'</alertadvisory><alertvalue>Expect<orange> Thunder</orange> This Week</alertvalue>
   </spanelightning></div></div></div>';}
    else if ($wuskythunder2>0 && $position6=="forecast3wu.php"){echo '<spanelightning><alertadvisory>'.$newalert.'</alertadvisory><alertvalue>Expect<orange> Thunder</orange> This Week</alertvalue>
   </spanelightning></div></div></div>';}
    else if ($wuskythunder3>0 && $position6=="forecast3wu.php"){echo '<spanelightning><alertadvisory>'.$newalert.'</alertadvisory><alertvalue>Expect<orange> Thunder</orange> This Week</alertvalue>
   </spanelightning></div></div></div>';}
    else if ($wuskythunder4>0 && $position6=="forecast3wu.php"){echo '<spanelightning><alertadvisory>'.$newalert.'</alertadvisory><alertvalue>Expect<orange> Thunder</orange> This Week</alertvalue>
   </spanelightning></div></div></div>';}
    else if ($wuskythunder5>0 && $position6=="forecast3wu.php"){echo '<spanelightning><alertadvisory>'.$newalert.'</alertadvisory><alertvalue>Expect<orange> Thunder</orange> This Week</alertvalue>
   </spanelightning></div></div></div>';}
    else if ($wuskythunder6>0 && $position6=="forecast3wu.php" ){echo '<spanelightning><alertadvisory>'.$newalert.'</alertadvisory><alertvalue>Expect<orange> Thunder</orange> This Week</alertvalue>
   </spanelightning></div></div></div>';}
    else if ($wuskythunder7>0 && $position6=="forecast3wu.php"){echo '<spanelightning><alertadvisory>'.$newalert.'</alertadvisory><alertvalue>Expect<orange> Thunder</orange> This Week</alertvalue>
   </spanelightning></div></div></div>';}  
   
    //WU SNOW
  else if ($wuskysnow1>0 && $position6=="forecast3wularge.php")  {echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Snow</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';}    
  else if ($wuskysnow2>0 && $position6=="forecast3wularge.php")  {echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Snow</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';} 
   else if ($wuskysnow3>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Snow</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';} 
   else if ($wuskysnow4>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Snow</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';}
   else if ($wuskysnow5>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Snow</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';}   
   else if ($wuskysnow6>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Snow</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';}
   else if ($wuskysnow7>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Snow</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';}      
   
  //forecast3 wu snow
  else if ($wuskysnow1>0 && $position6=="forecast3wu.php" )  {echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Snow</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';}    
  else if ($wuskysnow2>0 && $position6=="forecast3wu.php" )  {echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Snow</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';} 
   else if ($wuskysnow3>0 && $position6=="forecast3wu.php" ){echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Snow</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';} 
   else if ($wuskysnow4>0 && $position6=="forecast3wu.php" ){echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Snow</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';}
   else if ($wuskysnow5>0 && $position6=="forecast3wu.php" ){echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Snow</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';}   
   else if ($wuskysnow6>0 && $position6=="forecast3wu.php" ){echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Snow</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';}
   else if ($wuskysnow7>0 && $position6=="forecast3wu.php" ){echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Snow</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';}   
   
   //weather34 wu alerts rain  
   else if ($wuskyrain1>0 && $position6=="forecast3wularge.php")
  {echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Rain</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';}
    else if ($wuskyrain2>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Rain</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';}
    else if ($wuskyrain3>0 && $position6=="forecast3wularge.php") {echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Rain</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';}
    else if ($wuskyrain4>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Rain</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';}
    else if ($wuskyrain5>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Rain</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';}
    else if ($wuskyrain7>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Rain</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';}   
    //forecast3 wu rain
    else if ($wuskyrain1>0 && $position6=="forecast3wu.php")
  {echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Rain Showers</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';}
    else if ($wuskyrain2>0 && $position6=="forecast3wu.php"){echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Rain</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';}
    else if ($wuskyrain3>0 && $position6=="forecast3wu.php" ) {echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Rain</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';}
    else if ($wuskyrain4>0 && $position6=="forecast3wu.php" ){echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Rain</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';}
    else if ($wuskyrain5>0 && $position6=="forecast3wu.php" ){echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Rain</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';}
    else if ($wuskyrain7>0 && $position6=="forecast3wu.php"){echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Rain</blue> This Week </alertvalue>
   </spanelightning></div></div></div>';}  
  
  else if (strpos($alertlevel,'LightGreen') !== false)
  {echo '<spanelightning><alertadvisory><a alt="Alerts" title="Alerts" href="pop_ukalerts.php" data-lity>'.$newalertwhite.'</alertadvisory><alertvalue> Currently <lightgreen>No Alerts</lightgreen></alertvalue>
  </spanelightning></div></div></div>';}  
 //WEATHER34 solar eclipse events and no alerts 
 else {echo '<spanelightning><alertvalue>'.$eclipse_default.'</spanelightning></div></div></div>';}   
 
  ?></noalert></div></div>
