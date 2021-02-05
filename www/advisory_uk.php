<?php include('w34CombinedData.php');error_reporting(0); 
?>

<?php

      $json = 'jsondata/uk.txt'; 
$json = file_get_contents($json); 
$parsed_json = json_decode($json, true);
if(($parsed_json['rss']['channel']['item'][0]['description'])!==null){$description=$parsed_json['rss']['channel']['item'][0]['description'];}
else if (($parsed_json['rss']['channel']['item']['description']) !== null){$description=$parsed_json['rss']['channel']['item']['description'];}


//echo $description."</br></br>";
      
       if (strpos($description, "Red") === 0) {$alertlevel="Red";}
       else if (strpos($description, "Amber") === 0) {$alertlevel="Orange";}
       else if (strpos($description, "Yellow") === 0) {$alertlevel="Yellow";}
       else $alertlevel="LightGreen";
       
//echo $alertlevel."</br></br>";    
       if(strpos($description, "wind") !== false) {$alerttype='Wind';}
       else if(strpos($description, "snow") !== false) {$alerttype='Snow/Ice';}
       else if(strpos($description, "ice") !== false) {$alerttype='Snow/Ice';}
       else if(strpos($description, "fog") !== false) {$alerttype='Fog';}
       else if(strpos($description, "flood") !== false) {$alerttype='Flood';}
       else if(strpos($description, "flooding") !== false) {$alerttype='Flood';}
       else if(strpos($description, "thunder") !== false) {$alerttype='Thunderstorms';}
       else if(strpos($alertlevel, "LightGreen") !== false) {$alerttype='No Alert';}
       
//echo $alerttype;

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
///METEOALARM
if (strpos($alertlevel,'Yellow') !== false)
  {echo '<spanelightning><alertvalue>Yellow Alert<br> '.$alerttype.'<alertadvisory><a alt="Alerts" title="Alerts" href="metofficealerts.php" data-lity>'.$newalertyellow.'</alertadvisory>
   </spanelightning></div></div></div>';}
else if (strpos($alertlevel,'Orange') !== false)
  {echo '<spanelightning><alertvalue>Amber Alert<br> '.$alerttype.'<alertadvisory><a alt="Alerts" title="Alerts" href="metofficealerts.php" data-lity>'.$newalertorange.'</alertadvisory>
  </spanelightning></div></div></div>';}
else if (strpos($alertlevel,'Red') !== false)
  {echo '<spanelightning>Red Alert<br> '.$alerttype.'<alertadvisory><alertvalue><a alt="Alerts" title="Alerts" href="metofficealerts.php" data-lity>'.$newalertred.'</alertadvisory>
  </spanelightning></div></div></div>';}

    //weather34 //forecast3wularge wu alerts storms 
else if ($wuskythunder1>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertvalue>Expect<orange> Thunder Storms</orange> This Week <alertadvisory>'.$newalert.'</alertadvisory>
   </spanelightning></div></div></div>';}
    else if ($wuskythunder2>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertvalue>Expect<orange> Thunder Storms</orange> This Week <alertadvisory>'.$newalert.'</alertadvisory>
   </spanelightning></div></div></div>';}
    else if ($wuskythunder3>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertvalue>Expect<orange> Thunder Storms</orange> This Week <alertadvisory>'.$newalert.'</alertadvisory>
   </spanelightning></div></div></div>';}
    else if ($wuskythunder4>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertvalue>Expect<orange> Thunder Storms</orange> This Week <alertadvisory>'.$newalert.'</alertadvisory>
   </spanelightning></div></div></div>';}
    else if ($wuskythunder5>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertvalue>Expect<orange> Thunder Storms</orange> This Week <alertadvisory>'.$newalert.'</alertadvisory>
   </spanelightning></div></div></div>';}
    else if ($wuskythunder6>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertvalue>Expect<orange> Thunder Storms</orange> This Week <alertadvisory>'.$newalert.'</alertadvisory>
   </spanelightning></div></div></div>';}
    else if ($wuskythunder7>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertvalue>Expect<orange> Thunder Storms</orange> This Week <alertadvisory>'.$newalert.'</alertadvisory>
   </spanelightning></div></div></div>';}
  //forecast3 wu 
    else if ($wuskythunder1>0 && $position6=="forecast3wu.php"){echo '<spanelightning><alertvalue>Expect<orange> Thunder Storms</orange> This Week <alertadvisory>'.$newalert.'</alertadvisory>
   </spanelightning></div></div></div>';}
    else if ($wuskythunder2>0 && $position6=="forecast3wu.php"){echo '<spanelightning><alertvalue>Expect<orange> Thunder Storms</orange> This Week <alertadvisory>'.$newalert.'</alertadvisory>
   </spanelightning></div></div></div>';}
    else if ($wuskythunder3>0 && $position6=="forecast3wu.php"){echo '<spanelightning><alertvalue>Expect<orange> Thunder Storms</orange> This Week <alertadvisory>'.$newalert.'</alertadvisory>
   </spanelightning></div></div></div>';}
    else if ($wuskythunder4>0 && $position6=="forecast3wu.php"){echo '<spanelightning><alertvalue>Expect<orange> Thunder Storms</orange> This Week <alertadvisory>'.$newalert.'</alertadvisory>
   </spanelightning></div></div></div>';}
    else if ($wuskythunder5>0 && $position6=="forecast3wu.php"){echo '<spanelightning><alertvalue>Expect<orange> Thunder Storms</orange> This Week <alertadvisory>'.$newalert.'</alertadvisory>
   </spanelightning></div></div></div>';}
    else if ($wuskythunder6>0 && $position6=="forecast3wu.php" ){echo '<spanelightning><alertvalue>Expect<orange> Thunder Storms</orange> This Week <alertadvisory>'.$newalert.'</alertadvisory>
   </spanelightning></div></div></div>';}
    else if ($wuskythunder7>0 && $position6=="forecast3wu.php"){echo '<spanelightning><alertvalue>Expect<orange> Thunder Storms</orange> This Week <alertadvisory>'.$newalert.'</alertadvisory>
   </spanelightning></div></div></div>';}  
   
    //WU SNOW
  else if ($wuskysnow1>0 && $position6=="forecast3wularge.php")  {echo '<spanelightning>'.$snowalert.'<alertvalue> Expect <blue>Snow Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}    
  else if ($wuskysnow2>0 && $position6=="forecast3wularge.php")  {echo '<spanelightning>'.$snowalert.'<alertvalue> Expect <blue>Snow Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';} 
   else if ($wuskysnow3>0 && $position6=="forecast3wularge.php"){echo '<spanelightning>'.$snowalert.'<alertvalue> Expect <blue>Snow Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';} 
   else if ($wuskysnow4>0 && $position6=="forecast3wularge.php"){echo '<spanelightning>'.$snowalert.'<alertvalue> Expect <blue>Snow Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}
   else if ($wuskysnow5>0 && $position6=="forecast3wularge.php"){echo '<spanelightning>'.$snowalert.'<alertvalue> Expect <blue>Snow Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}   
   else if ($wuskysnow6>0 && $position6=="forecast3wularge.php"){echo '<spanelightning>'.$snowalert.'<alertvalue> Expect <blue>Snow Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}
   else if ($wuskysnow7>0 && $position6=="forecast3wularge.php"){echo '<spanelightning>'.$snowalert.'<alertvalue> Expect <blue>Snow Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}      
   
  //forecast3 wu snow
  else if ($wuskysnow1>0 && $position6=="forecast3wu.php" )  {echo '<spanelightning>'.$snowalert.'<alertvalue> Expect <blue>Snow Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}    
  else if ($wuskysnow2>0 && $position6=="forecast3wu.php" )  {echo '<spanelightning>'.$snowalert.'<alertvalue> Expect <blue>Snow Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';} 
   else if ($wuskysnow3>0 && $position6=="forecast3wu.php" ){echo '<spanelightning>'.$snowalert.'<alertvalue> Expect <blue>Snow Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';} 
   else if ($wuskysnow4>0 && $position6=="forecast3wu.php" ){echo '<spanelightning>'.$snowalert.'<alertvalue> Expect <blue>Snow Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}
   else if ($wuskysnow5>0 && $position6=="forecast3wu.php" ){echo '<spanelightning>'.$snowalert.'<alertvalue> Expect <blue>Snow Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}   
   else if ($wuskysnow6>0 && $position6=="forecast3wu.php" ){echo '<spanelightning>'.$snowalert.'<alertvalue> Expect <blue>Snow Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}
   else if ($wuskysnow7>0 && $position6=="forecast3wu.php" ){echo '<spanelightning>'.$snowalert.'<alertvalue> Expect <blue>Snow Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}   
   
   //weather34 wu alerts rain  
   else if ($wuskyrain1>0 && $position6=="forecast3wularge.php")
  {echo '<spanelightning><alertvalue> Expect <blue>Rain Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}
    else if ($wuskyrain2>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertvalue> Expect <blue>Rain Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}
    else if ($wuskyrain3>0 && $position6=="forecast3wularge.php") {echo '<spanelightning><alertvalue> Expect <blue>Rain Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}
    else if ($wuskyrain4>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertvalue> Expect <blue>Rain Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}
    else if ($wuskyrain5>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertvalue> Expect <blue>Rain Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}
    else if ($wuskyrain7>0 && $position6=="forecast3wularge.php"){echo '<spanelightning><alertvalue> Expect <blue>Rain Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}   
    //forecast3 wu rain
    else if ($wuskyrain1>0 && $position6=="forecast3wu.php")
  {echo '<spanelightning><alertvalue> Expect <blue>Rain Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}
    else if ($wuskyrain2>0 && $position6=="forecast3wu.php"){echo '<spanelightning><alertvalue> Expect <blue>Rain Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}
    else if ($wuskyrain3>0 && $position6=="forecast3wu.php" ) {echo '<spanelightning><alertvalue> Expect <blue>Rain Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}
    else if ($wuskyrain4>0 && $position6=="forecast3wu.php" ){echo '<spanelightning><alertvalue> Expect <blue>Rain Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}
    else if ($wuskyrain5>0 && $position6=="forecast3wu.php" ){echo '<spanelightning><alertvalue> Expect <blue>Rain Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}
    else if ($wuskyrain7>0 && $position6=="forecast3wu.php"){echo '<spanelightning><alertvalue> Expect <blue>Rain Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}  
  //weather34 darksky alerts rain,snow  
  else if ($darkskydayIcon=='snow' && $position6=="forecast3ds.php")
  {echo '<spanelightning>'.$snowalert.'<alertvalue> Expect <blue>Snow Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}   
    else if ($darkskydayIcon=='rain' && $position6=="forecast3ds.php")
  {echo '<spanelightning><alertvalue> Expect <blue>Rain Showers</blue> This Week <alertadvisory>'.$newalertcold.'</alertadvisory>
   </spanelightning></div></div></div>';}
  else if (strpos($alertlevel,'LightGreen') !== false)
  {echo '<spanelightning> Currently <lightgreen>No Alerts<alertadvisory><alertvalue><a alt="Alerts" title="Alerts" href="metofficealerts.php" data-lity>'.$newalertgreen.'</alertadvisory>
  </spanelightning></div></div></div>';}  
 //WEATHER34 solar eclipse events and no alerts 
 else {echo '<spanelightning><alertvalue>'.$eclipse_default.'</spanelightning></div></div></div>';}   
 
  ?></noalert></div></div>
