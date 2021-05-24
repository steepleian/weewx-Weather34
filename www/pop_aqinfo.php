<?php
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include('w34CombinedData.php');include('settings1.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>AQI Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="css/popup.<?php echo $theme; ?>.css?version=<?php echo filemtime('css/popup.' . $theme . '.css'); ?>" rel="stylesheet prefetch">
<div class="weather34darkbrowser" url="AQI Information"></div>

<main class="grid3">
  <articlegraph3> 
<table class="demo">
 <caption style="text-align:left; font-size:12px"><b>The World AQI Indices are based on the US EPA (United States Environmental Protection Agency) Scale, latest 24 hour running mean for the current day.</b></p></caption>
  
  <tbody>
	<tr>
        <th id="CELL1">WORLD (US EPA) AQI PM<sub>2.5</sub></th>
		<th id="CELL2">Good</th>
		<th id="CELL3">Moderate</th>
		<th id="CELL4">Unhealthy for Sensitive Groups</th>
		<th id="CELL5">Unhealthy</th>
		<th id="CELL6">Very Unhealthy</th>
		<th id="CELL7">Hazardous</th>
		
		
	</tr>
	
	<tr>
		<td id="CELL1"><b>Range<b></td>
		<td id="CELL3">0-50</td>
		<td id="CELL6">51-100</td>
		<td id="CELL7">101-150</td>
		<td id="CELL9">151-200</td>
		<td id="CELL11">201-300</td>
		<td id="CELL10">300</td>
		
	</tr>
	<tr> 	 	 	 	 	 	 	 	 	
		<td id="CELL1"><b>µg/m³<b></td>
		<td id="CELL3">0-12</td>
		<td id="CELL6">12-35</td>
		<td id="CELL7">35-55</td>
		<td id="CELL9">55-150</td>
		<td id="CELL11">150-250</td>
		<td id="CELL10">250</td>
		
	</tr>
	</tbody>
</table>
    </articlegraph3>
<main class="grid3">
  <articlegraph3> 
    <table class="demo">
  <caption style="text-align:left;font-size:12px"><b>The Defra (UK Government Department for Environment and Rural Affairs) DAQI Indices are based on the daily mean concentration for historical data, latest 24 hour running mean for the current day.</b></p></caption>
  	
	<thead>
	<tr>
        <th id="CELL1">UK DAQI</th>
		<th id="CELL2">Low</th>
		<th id="CELL3">Low</th>
		<th id="CELL4">Low</th>
		<th id="CELL5">Moderate</th>
		<th id="CELL6">Moderate</th>
		<th id="CELL7">Moderate</th>
		<th id="CELL8">High</th>
		<th id="CELL9">High</th>
		<th id="CELL10">High</th>
		<th id="CELL11">Very High</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td id="CELL1"><b>Band<b></td>
		<td id="CELL2">1</td>
		<td id="CELL3">2</td>
		<td id="CELL4">3</td>
		<td id="CELL5">4</td>
		<td id="CELL6">5</td>
		<td id="CELL7">6</td>
		<td id="CELL8">7</td>
		<td id="CELL9">8</td>
		<td id="CELL10">9</td>
		<td id="CELL11">10</td>
	</tr>
	<tr>
		<td id="CELL1"><b>PM<sub>2.5 </sub>µg/m³<b></td>
		<td id="CELL2">0-11</td>
		<td id="CELL3">12-23</td>
		<td id="CELL4">24-35</td>
		<td id="CELL5">36-41</td>
		<td id="CELL6">42-47</td>
		<td id="CELL7">48-53</td>
		<td id="CELL8">54-58</td>
		<td id="CELL9">59-64</td>
		<td id="CELL10">65-70</td>
		<td id="CELL11">71 or more</td>
	</tr>
    <tr> 	 	 	 	 	 	 	 	 	
		<td id="CELL1"><b>PM<sub>10 </sub>µg/m³<b></td>
		<td id="CELL2">0-16</td>
		<td id="CELL3">17-33</td>
		<td id="CELL4">34-50</td>
		<td id="CELL5">51-58</td>
		<td id="CELL6">59-66</td>
		<td id="CELL7">67-75</td>
		<td id="CELL8">76-83</td>
		<td id="CELL9">84-91</td>
		<td id="CELL10">92-100</td>
		<td id="CELL11">101 or more</td>
	</tr>      
	</tbody>
          </articlegraph3>
          
  
   </main>