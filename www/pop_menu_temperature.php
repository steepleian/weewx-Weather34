<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
//###################################################################################################################
//	weewx-Weather34 Template maintained by Ian Millard (Steepleian)                                 				#
//	                                                                                                				#
//  Contains original code by Ian Millard and collaborators															#
//  © claydonsweather.org.uk original CSS/SVG/PHP 2020-2021                                                            #
// 	                                                                                                				#
// 	Issues for weewx-Weather34 template should be addressed to https://github.com/steepleian/weewx-Weather34/issues #                                                                                              #
// 	                                                                                                				#
//###################################################################################################################

include_once ('settings.php');
include ('w34CombinedData.php');
date_default_timezone_set($TZ);
if($theme==="light"){$background="white";$text="black";}
else if($theme==="dark"){$background="rgba(34, 35, 40)";$text="white";}
?>  
  <style>
* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body {
 overflow: hidden;
  
}
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial;
  
}

/* Style tab links */
.tablink {
  background-color: #555;
  color: white;
  float: left;
  border: 2px solid <?php echo $background ?>;
  border-radius: 5px;
  margin-top: 5px;
  margin-left:5px;
  outline: none;
  cursor: pointer;
  padding: 6px 6px;
  font-size: 10px;
  
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: white;
  display: none;
  padding: 0px 0px;
  height: 570px;
}

#Tab1 {background-color: <?php echo $background ?>;}
#Tab2 {background-color: <?php echo $background ?>;}
#Tab3 {background-color: <?php echo $background ?>;}
#Tab4 {background-color: <?php echo $background ?>;}
#Tab5 {background-color: <?php echo $background ?>;}
#Tab6 {background-color: <?php echo $background ?>;}
#Tab7 {background-color: <?php echo $background ?>;}    
</style>
</head>
<body>
<button class="tablink" onclick="openPage('Tab1', this, 'rgba(194, 102, 58)')" id="defaultOpen">Temp | Dew | Hum Almanac</button>  
<button class="tablink" onclick="openPage('Tab2', this, 'rgba(194, 102, 58)')">Yearly Temperature</button>
<button class="tablink" onclick="openPage('Tab3', this, 'rgba(194, 102, 58)')">Yearly Feels Like</button>
<button class="tablink" onclick="openPage('Tab4', this, 'rgba(194, 102, 58)')">Yearly Humidity</button>  
<button class="tablink" onclick="openPage('Tab5', this, 'rgba(194, 102, 58)')">Weekly Temperature</button>  
<button class="tablink" onclick="openPage('Tab6', this, 'rgba(194, 102, 58)')">Weekly Feels Like</button>  
<button class="tablink" onclick="openPage('Tab7', this, 'rgba(194, 102, 58)')">Weekly Humidity</button>
  
  <div id="Tab1" class="tabcontent">
  
  <iframe width="100%" height="92%" scrolling="no" src="pop_tempalmanac.php" frameborder="0"></iframe>
</div>
  
  <div id="Tab2" class="tabcontent">
  
  <iframe width="100%" height="92%" scrolling="no" src="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='temperatureplot'&span='yearly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>

" frameborder="0"></iframe>
</div>

<div id="Tab3" class="tabcontent">
  
  <iframe width="100%" height="92%" scrolling="no" src="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='tempderivedplot'&span='yearly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>
" frameborder="0"></iframe>
</div>
  
  
  
  <div id="Tab4" class="tabcontent">
  
  <iframe width="100%" height="92%" scrolling="no" src="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='humidityplot'&span='yearly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>  
" frameborder="0"></iframe>
</div>
  
  <div id="Tab5" class="tabcontent">
  
  <iframe width="100%" height="92%" scrolling="no" src="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='tempallplot'&span='weekly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" frameborder="0"></iframe>
</div>
  
  <div id="Tab6" class="tabcontent">
  
  <iframe width="100%" height="92%" scrolling="no" src="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='tempderivedplot'&span='weekly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" frameborder="0"></iframe>
</div>
  
  <div id="Tab7" class="tabcontent">
  
  <iframe width="100%" height="92%" scrolling="no" src="<?php echo $chartsource;?>/<?php echo $theme1;?>-charts.html?chart='humidityplot'&span='weekly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" frameborder="0"></iframe>
</div>

  
<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
</body>
</html> 