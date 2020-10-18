<?php include('w34CombinedData.php'); //WEATHER34 Davis Console Forecast Outlook/Icon ?> 
<div class="vp2container"><div class="consoleoutlook">
<?php  //weather34 script Davis forecast outlook
$weather["vpforecasttext"]	=str_replace('with little', '<ogreen>No Significant </ogreen>', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('and warmer.', 'turning <oorange>Warmer</oorange>.', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('and cooler.', 'turning <oblue>Cooler</oblue>.', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('and ending', 'for', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('to the', '', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('shift', 'shifting', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('Windy', '<oorange>Windy</oorange>', $weather["vpforecasttext"]);
if (anyToC($weather["temp"])<-1){$weather["vpforecasttext"]	=str_replace('Precipitation',  '<oblue>Snow</oblue>', $weather["vpforecasttext"]);}
else if (anyToC($weather["temp"])<1){$weather["vpforecasttext"]	=str_replace('Precipitation',  '<oblue>Rain</oblue> & <oblue>Sleet</oblue>', $weather["vpforecasttext"]);}
$weather["vpforecasttext"]	=str_replace('Precipitation',  '<oblue>Rain</oblue>', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('Increasing clouds', '<oblue>Increasing Clouds</oblue><br> ', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('and windy', 'with <oorange>Winds strengthening</oorange> at times', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('Mostly clear', '<oorange>Mostly Clear</oorange><br>', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('Partly cloudy', '<oblue>Partly Cloudy</oblue><br>', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('Mostly cloudy', '<oblue>Mostly Cloudy</oblue><br>', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('within 24 to 48 hours', 'next 24-48 hours', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('within 6 to 12 hours', 'next 6-12 hours', $weather["vpforecasttext"]); 
$weather["vpforecasttext"]	=str_replace('within 12 to 24 hours', 'next 12-24 hours', $weather["vpforecasttext"]);  
$weather["vpforecasttext"]	=str_replace('within 48 to 72 hours', 'next 48-72 hours', $weather["vpforecasttext"]); 
$weather["vpforecasttext"]	=str_replace('within 12 hours', 'next 12 hours', $weather["vpforecasttext"]); 
$weather["vpforecasttext"]	=str_replace('within 6 hours', 'next 6 hours', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('South West', 'SW', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('South East', 'SE', $weather["vpforecasttext"]);
//vp2 Davis forecast icon
if (preg_match("/Snow/i", $weather["vpforecasttext"]) && anyToC($weather["temp"])<-1)  {echo '<img rel="prefetch" src="css/icons/snow.svg" class="consoleicon">';} 
else if (preg_match("/Sleet/i", $weather["vpforecasttext"]) && anyToC($weather["temp"])<1)  {echo '<img rel="prefetch" src="css/icons/sleet.svg" class="consoleicon">';} 
else if (preg_match("/Rain/i", $weather["vpforecasttext"])) {echo '<img rel="prefetch" src="css/icons/rainvp.svg" class="consoleicon">';} 
else if (preg_match("/Precipitation/i", $weather["vpforecasttext"])) {echo '<img rel="prefetch" src="css/icons/rainvp.svg" class="consoleicon">';} 
else if (preg_match("/Windy/i", $weather["vpforecasttext"])) {echo '<img rel="prefetch" src="css/icons/windy.svg" class="consoleicon">';} 
else if (preg_match("/Mostly clear/i", $weather["vpforecasttext"])) {echo '<img rel="prefetch" src="css/icons/clear.svg" class="consoleicon">';}
else if (preg_match("/Partly cloudy/i", $weather["vpforecasttext"])) {echo '<img rel="prefetch" src="css/icons/partly-cloudy-day.svg" class="consoleicon">';} 
else if (preg_match("/Mostly cloudy/i", $weather["vpforecasttext"])) {echo '<img rel="prefetch" src="css/icons/mostlycloudy.svg" class="consoleicon">';} 
else if (preg_match("/Increasing clouds/i", $weather["vpforecasttext"])) {echo '<img rel="prefetch" src="css/icons/scatteredclouds.svg" class="consoleicon">';} 
echo $weather["vpforecasttext"]	; ?></div></div> 
