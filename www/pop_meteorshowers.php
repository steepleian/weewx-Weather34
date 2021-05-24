<?php include('settings.php');include('w34CombinedData.php');



	####################################################################################################
	#	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2015-18                                       #
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at https://weather34.com/homeweatherstation/index.html # 
	# 	                                                                                               #
	# 	                                                                                               #
	# 	WEATHER34 Meteor Shower<br>: 25TH JANUARY 2018  	                                               #
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################

?>
<?php 
//weather34 next meteor event original idea betejuice of cumulus forum..
$meteor_nextevent="No Meteor Shower<br>s";
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 12, 23,19),"event_title"=>"Meteor Shower<br> <orange1>Quadrantids</orange1><div class=date><br>Active Dec 28th-Jan 12th
<br><green>Estimated ZHR: </green><orange>120 <br> Peaks <orange>Jan 3rd-4th</orange></div></div>","event_end"=>mktime(23, 59, 59, 1, 2,20),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 12, 24),"event_title"=>"Meteor Shower<br> <orange1>Quadrantids</orange1><div class=date><br>Active Dec 28th-Jan 12th
<br><green>Estimated ZHR: </green><orange>120 <br>Peaks <orange>Jan 3rd-4th</orange></div></div>","event_end"=>mktime(23, 59, 59, 1, 2),);
$meteor_eventsnext[]=array("event_start"=>mktime(0, 0, 0, 1, 3),"event_title"=>"Meteor Shower<br> <orange1>Quadrantids</orange1><div class=date><br>Peak Viewing Now<br><div class=date>
<br><green>Estimated ZHR: </green><orange>120</div></div>","event_end"=>mktime(23, 59, 59, 1, 4),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 1, 2),"event_title"=>"Meteor Shower<br> <orange1>Lyrids</orange1><div class=date><br>Active Apr 18th-Apr 25th<br>
<green>Estimated ZHR: </green><orange>18</orange><br>Peaks <orange>Apr 23rd</orange></div></div>","event_end"=>mktime(23, 59, 59, 4, 20),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 4, 20),"event_title"=>"Meteor Shower<br> <orange1>Lyrids</orange1> <div class=date><br>Peak Viewing Now<br>
<green>Estimated ZHR: </green><orange>18</orange><br>Peaks <orange>Apr 23rd</orange></div></div>","event_end"=>mktime(23, 59, 59, 4, 22),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 4, 22),"event_title"=>"Meteor Shower<br> <orange1>ETA Aquarids </orange1><br><div class=date><br>Active Apr 24th-May 19th<br>
<green>Estimated ZHR: </green><orange>55 </orange><br> Peaks <orange>May 6th</orange></div></div>","event_end"=>mktime(23, 59, 59, 5, 6),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 5, 6),"event_title"=>"Meteor Shower<br> <orange1>Delta Aquarids</orange1><div class=date><br>Active Jul 21st-Aug 23rd<br>
<green>Estimated ZHR: </green><orange>16</orange><br> Peaks <orange>Jul 28th</orange></div></div>","event_end"=>mktime(23, 59, 59, 7, 27),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 7, 27),"event_title"=>"Meteor Shower<br> <orange1> Perseids</orange1><div class=date><br>Active Jul 13th-Aug 26th<br>
<green>Estimated ZHR: </green><orange>100</orange><br> Peaks <orange>Aug 11th-13th</orange></div>","event_end"=>mktime(23, 59, 59, 8, 10),);
$meteor_eventsnext[]=array("event_start"=>mktime(0, 0, 0, 8, 12),"event_title"=>"Meteor Shower<br><orange1> Perseids</orange1><div class=date><br>Peak Viewing Now<br>
<green>Estimated ZHR: </green><orange>100</orange><br> Peaks <orange>Aug 11th-13th</orange></div></div>","event_end"=>mktime(23, 59, 59, 8, 13),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 8, 13),"event_title"=>"Meteor Shower<br> <orange1> Draconids</orange1><div class=date><br>Active October 6th-10th<br>
<green>Estimated ZHR: </green><orange>5</orange><br> Peaks <orange>Oct 9th</orange></div></div>","event_end"=>mktime(23, 59, 59, 10, 7),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 10, 7),"event_title"=>"Meteor Shower<br> <orange1> Orionids</orange1><div class=date><br>Active Oct 21st-Oct 22nd<br>
<green>Estimated ZHR: </green><orange>25</orange><br> Peaks <orange>Oct 22nd</orange></div></div>","event_end"=>mktime(23, 59, 59, 10, 21),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 10, 21),"event_title"=>"Meteor Shower<br> <orange1> South Taurids</orange1><div class=date><br>Active Nov 4th- Nov 5th<br>
<green>Estimated ZHR: </green><orange>5</orange><br> Peaks <orange>Oct 10th</orange></div></div>","event_end"=>mktime(23, 59, 59, 11, 5),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 11, 5),"event_title"=>"Meteor Shower<br> <orange1> North Taurids</orange1><div class=date><br>Active Nov 11th
<green>Estimated ZHR: </green><orange>5</orange><br> Peaks <orange>No 13th</orange></div></div>","event_end"=>mktime(23, 59, 59, 11, 11),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 11, 11),"event_title"=>"Meteor Shower<br> <orange1> Leonids</orange1><div class=date><br>Active Nov 5th-Dec 3rd<br>
<green>Estimated ZHR: </green><orange>15</orange><br> Peaks <orange>Nov 18th</orange></div></div>","event_end"=>mktime(23, 59, 59, 11, 18),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 11, 18),"event_title"=>"Meteor Shower<br> <orange1> Geminids</orange1><div class=date><br>Active Nov 30th-Dec 17th<br>
<green>Estimated ZHR: </green><orange>120</orange><br> Peaks <orange>Dec 14th</orange></div></div>","event_end"=>mktime(23, 59, 59, 12, 16),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 12, 15),"event_title"=>"Meteor Shower<br> <orange1> Ursids</orange1><div class=date><br>Active Dec 17th-Dec 24th<br>
<green>Estimated ZHR: </green><orange>5-10</orange><br> Peaks <orange>Dec 23rd</orange></div></div>","event_end"=>mktime(23, 59, 59, 12, 18),);

$meteorNext=time();$meteorOP=false;
foreach ($meteor_eventsnext as $meteor_check) {if ($meteor_check["event_start"]<=$meteorNext&&$meteorNext<=$meteor_check["event_end"]) {$meteorOP=true;$meteor_nextevent=$meteor_check["event_title"];}};
//end meteor nevt event
$meteorinfo3="<svg width='22px' height='22px' viewBox='0 0 16 16'><path fill='darkgrey' d='M0 0l14.527 13.615s.274.382-.081.764c-.355.382-.82.055-.82.055L0 0zm4.315 1.364l11.277 10.368s.274.382-.081.764c-.355.382-.82.055-.82.055L4.315 1.364zm-3.032 2.92l11.278 10.368s.273.382-.082.764c-.355.382-.819.054-.819.054L1.283 4.284zm6.679-1.747l7.88 7.244s.19.267-.058.534-.572.038-.572.038l-7.25-7.816zm-5.68 5.13l7.88 7.244s.19.266-.058.533-.572.038-.572.038l-7.25-7.815zm9.406-3.438l3.597 3.285s.094.125-.029.25c-.122.125-.283.018-.283.018L11.688 4.23zm-7.592 7.04l3.597 3.285s.095.125-.028.25-.283.018-.283.018l-3.286-3.553z'/></svg>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 Meteor Shower<br>s</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  
<link href="css/meteorshowers.<?php echo $theme; ?>.css?version=<?php echo filemtime('css/meteorshowers.' . $theme . '.css'); ?>" rel="stylesheet prefetch">


<?php if($theme==="dark"){$text1="silver";}
else if($theme==="light"){$text1="black";$background1="white";}
$forecastime = filemtime ('jsondata/ki.txt');?>

<div class="weather34darkbrowser" url="Meteorshowers <?php
echo $stationName ?>

  ">
</div>  
<main class="grid">
  <article>       
<meteotextshowertext>
<?php if ($meteor_default)  {	echo "<meteorsvgicon>".$meteorinfo3."</meteorsvgicon> ".$meteor_default;} 
?></meteotextshowertext><br>Shower Currently Visible<br>
 <?php	echo date('D jS M Y');?>       
</article>  
  
  <article>
  <?php if ($meteor_nextevent)  {echo $meteorinfo3 ," Next ", $meteor_nextevent ;} ?>    
  </article> 
  
  <article>  
   <?php echo $info ;?> <orange>Guide to</orange> <green><?php echo date('Y');?> Major Meteor Showers<br></green> <br>
       <?php echo $meteorinfo;?> <green>Quadrantids</green> Dec 28-Jan 12<br>
       <?php echo $meteorinfo;?> <green>Lyrids</green> Apr 18-Apr 25<br>
       <?php echo $meteorinfo;?> <green>Perseids</green> Jul 13-Aug 26<br>
       <?php echo $meteorinfo;?> <green>Leonids</green> Nov 05-Dec 03<br>
       <?php echo $meteorinfo;?> <green>Geminids</green> Nov 30-Dec 17<br>
       <?php echo $meteorinfo;?> <green>Ursids</green> Dec 17-Dec 24<br>
        
   </article> 
   
    <article>
   <?php echo $info ;?> <orange>Viewing Guide</orange><br><green>Meteors</green> are best viewed during the night hours, though meteors enter the atmosphere at any time of the day. They are just harder to see in the daylight apart from dawn and dusk. Any nearby ambient light,Moon light can make it difficult viewing . Meteor showers are best viewed away from the city lights.<br>
 
 
              
  </article>  
  
  <article>
   <?php echo $info ;?> <orange>Radio Ham Guide</orange><br>Meteor scatter communications can be used by Ham Radio VHF enthusiasts. Using meteor scatter propagation enables ham radio enthusiasts and also commercial radio communications contacts .Meteor scatter communications using specialised operating techniques allows communications distances up to 2000 km or more on the VHF frequencies.<br>
 
 
              
  </article> 
  <article>
  <div class=actualt> &copy; Information</div>  
  <?php echo $info?> Adapted by Steepleian for the WeeWX Weather34 skin from the legacy CSS/SVG/PHP scripts by weather34.com &copy; 2015-<?php echo date('Y');?>
  <br><br><?php echo $info ;?> Data Provided by <a href="https://en.wikipedia.org/wiki/Meteor_shower" title="https://en.wikipedia.org/wiki/Meteor_shower" target="_blank">International Meteor Organization</a> 
  
  </article> 
</main>
