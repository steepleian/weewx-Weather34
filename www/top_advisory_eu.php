<?php
//###################################################################################################################
//	weewx-Weather34 Template maintained by Ian Millard (Steepleian)                                 				#
//	                                                                                                				#
//  Contains some original legacy code (by agreement) created and developed by Brian Underdown (https://weather34.com)   # 
//  for the (now superseeded) original Weather34 Template which is no longer maintained by its creator              #
//  © weather34.com original CSS/SVG/PHP 2015-2019                                                                  #
// 	                                                                                                				#
//  Contains some original code by Ian Millard and collaborators															#
//  © claydonsweather.org.uk original CSS/SVG/PHP 2020-2021                                                         #
// 	                                                                                                				#
// 	Issues for weewx-Weather34 template should be addressed to https://github.com/steepleian/weewx-Weather34/issues #                                                                                              #
// 	                                                                                                				#
//###################################################################################################################
 
include('w34CombinedData.php');include('settings1.php');date_default_timezone_set($TZ);
$json_icon = file_get_contents("jsondata/lookupTable.json");
$parsed_icon = json_decode($json_icon, true);
$json_string = file_get_contents("jsondata/awa.txt");
$parsed_json = json_decode($json_string, true);
$name = $parsed_json['response'][0]['details']['name'];
$type = $parsed_json["response"][0]["details"]["type"];
$alertdesc = substr($type, 0 ,5);
$level = substr($type, -2);
            if ($level == "MD") {
                $background = "yellow";
                $alertlevel = "Yellow Alert";
            } elseif ($level == "SV") {
                $background = "orange";
                $alertlevel = "Orange Alert";
            } elseif ($level == "EX") {
                $background = "red";
                $alertlevel = "Red Alert";
            }
$alerttime = $parsed_json['response'][0]['timestamps']['begins'];
$alertexp = $parsed_json['response'][0]['timestamps']['expires']; 
$alertissued = $parsed_json['response'][0]['timestamps']['issued'];
$warnimage = $parsed_icon[$background][$type];
$alerttype = $parsed_icon['top']['alertdesc'][$alertdesc];
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
///aw alerts
if ($alertlevel != "")
{echo '<spanelightning><alertadvisory2><a alt="Alerts" title="Alerts" href="pop_europealerts.php" data-lity><img src="css/svg/' . $warnimage . '" width="100%" class="iconpos"></img></alertadvisory2><alertpos><alertvalue>'.$alertlevel.'<br> '.$alerttype.'</alertvalue></alertpos>
   </spanelightning></div></div></div>';}


  //forecast3 wu 
    elseif ($wuskythunder1>0 && $position6=="forecast3wu.php"){echo '<spanelightning><alertadvisory>'.$newalert.'</alertadvisory><alertvalue>Expect<orange> Thunder</orange> This Week</alertvalue>
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
  {echo '<spanelightning><alertadvisory>'.$newalertcold.'</alertadvisory><alertvalue> Expect <blue>Rain Showers</blue> This Week </alertvalue>
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
  else if ($level === "")
  {echo '<spanelightning><alertadvisory><a alt="Alerts" title="Alerts" href="pop_europealerts.php" data-lity>'.$newalertwhite.'</alertadvisory><alertvalue> Currently <lightgreen>No Alerts</lightgreen></alertvalue>
 </spanelightning></div></div></div>';} 
   
 //WEATHER34 solar eclipse events and no alerts 
 else {echo '<spanelightning><alertvalue>'.$eclipse_default.'</spanelightning></div></div></div>';}   
 
  ?></noalert></div></div>
