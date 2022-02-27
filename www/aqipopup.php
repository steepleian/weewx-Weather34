<?php
include('w34CombinedData.php');error_reporting(0);
if($theme==="dark"){$text1="silver";}
else if($theme==="light"){$text1="black";}
$forecastime = filemtime ('jsondata/uk.txt');
?>
<link href="css/popup.<?php echo $theme; ?>.css?version=<?php echo filemtime('css/popup.' . $theme . '.css'); ?>" rel="stylesheet prefetch">

<body>
<div class="weather34darkbrowser" style="color:<?php echo $text1 ?>;" url="The World AQI Indices are based on the US EPA (United States Environmental Protection Agency) Scale, latest 24 hour running mean for the current day."></div>  
</br> 

<table class="demo">
 
  
  <tbody>
	<tr>
        <th style="color:<?php echo $text1 ?>;" id="CELL1">WORLD (US EPA) AQI PM<sub>2.5</sub></th>
		<th style="color:<?php echo $text1 ?>;" id="CELL2">Good</th>
		<th style="color:<?php echo $text1 ?>;" id="CELL3">Moderate</th>
		<th style="color:<?php echo $text1 ?>;" id="CELL4">Unhealthy for Sensitive Groups</th>
		<th style="color:<?php echo $text1 ?>;" id="CELL5">Unhealthy</th>
		<th style="color:<?php echo $text1 ?>;" id="CELL6">Very Unhealthy</th>
		<th style="color:<?php echo $text1 ?>;" id="CELL7">Hazardous</th>
		
		
	</tr>
	
	<tr>
		<td style="color:<?php echo $text1 ?>;" id="CELL1"><b>Range<b></td>
		<td style="color:black;" id="CELL3">0-50</td>
		<td style="color:black;" id="CELL6">51-100</td>
		<td style="color:black;" id="CELL7">101-150</td>
		<td id="CELL9">151-200</td>
		<td id="CELL11">201-300</td>
		<td id="CELL10">300</td>
		
	</tr>
	<tr> 	 	 	 	 	 	 	 	 	
		<td style="color:<?php echo $text1 ?>;" id="CELL1"><b>µg/m³<b></td>
		<td style="color:black;" id="CELL3">0-12</td>
		<td style="color:black;" id="CELL6">12-35</td>
		<td style="color:black;" id="CELL7">35-55</td>
		<td id="CELL9">55-150</td>
		<td id="CELL11">150-250</td>
		<td id="CELL10">250</td>
		
	</tr>
	</tbody>
</table>

<table class="demo">
  <div class="weather34darkbrowser" style="color:<?php echo $text1 ?>;" url="The Defra (UK Government Department for Environment and Rural Affairs) DAQI Indices are based on the daily mean concentration for historical data, latest 24 hour running mean for the current day."></div>  
</br>
   
  	
	<thead>
	<tr>
        <th style="color:<?php echo $text1 ?>;" id="CELL1">UK DAQI</th>
		<th style="color:<?php echo $text1 ?>;" id="CELL2">Low</th>
		<th style="color:<?php echo $text1 ?>;" id="CELL3">Low</th>
		<th style="color:<?php echo $text1 ?>;" id="CELL4">Low</th>
		<th style="color:<?php echo $text1 ?>;" id="CELL5">Moderate</th>
		<th style="color:<?php echo $text1 ?>;" id="CELL6">Moderate</th>
		<th style="color:<?php echo $text1 ?>;" id="CELL7">Moderate</th>
		<th style="color:<?php echo $text1 ?>;" id="CELL8">High</th>
		<th style="color:<?php echo $text1 ?>;" id="CELL9">High</th>
		<th style="color:<?php echo $text1 ?>;" id="CELL10">High</th>
		<th style="color:<?php echo $text1 ?>;" id="CELL11">Very High</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td style="color:<?php echo $text1 ?>;" id="CELL1"><b>Band<b></td>
		<td style="color:black;" id="CELL2">1</td>
		<td style="color:black;" id="CELL3">2</td>
		<td style="color:black;" id="CELL4">3</td>
		<td style="color:black;" id="CELL5">4</td>
		<td style="color:black;" id="CELL6">5</td>
		<td style="color:black;" id="CELL7">6</td>
		<td style="color:black;" id="CELL8">7</td>
		<td id="CELL9">8</td>
		<td id="CELL10">9</td>
		<td id="CELL11">10</td>
	</tr>
	<tr>
		<td style="color:<?php echo $text1 ?>;" id="CELL1"><b>PM<sub>2.5 </sub>µg/m³<b></td>
		<td style="color:black;" id="CELL2">0-11</td>
		<td style="color:black;" id="CELL3">12-23</td>
		<td style="color:black;" id="CELL4">24-35</td>
		<td style="color:black;" id="CELL5">36-41</td>
		<td style="color:black;" id="CELL6">42-47</td>
		<td style="color:black;" id="CELL7">48-53</td>
		<td style="color:black;" id="CELL8">54-58</td>
		<td id="CELL9">59-64</td>
		<td id="CELL10">65-70</td>
		<td id="CELL11">71 or more</td>
	</tr>
    <tr> 	 	 	 	 	 	 	 	 	
		<td style="color:<?php echo $text1 ?>;" id="CELL1"><b>PM<sub>10 </sub>µg/m³<b></td>
		<td style="color:black;" id="CELL2">0-16</td>
		<td style="color:black;" id="CELL3">17-33</td>
		<td style="color:black;" id="CELL4">34-50</td>
		<td style="color:black;" id="CELL5">51-58</td>
		<td style="color:black;" id="CELL6">59-66</td>
		<td style="color:black;" id="CELL7">67-75</td>
		<td style="color:black;" id="CELL8">76-83</td>
		<td id="CELL9">84-91</td>
		<td id="CELL10">92-100</td>
		<td id="CELL11">101 or more</td>
	</tr>      
	</tbody>
  </body>
 
