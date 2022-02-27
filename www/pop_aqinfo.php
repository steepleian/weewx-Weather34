<?php
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include('w34CombinedData.php');include('settings1.php');
if ($theme === "dark")
{
    echo '<style>.demo{border:0 solid #aaa;border-collapse:collapse;padding:50px;font-family:arial,helvetica,verdana,sans-serif;font-size:10px;margin-bottom:50px;margin-top:50px margin-left:50%;margin-right:-50%;width:100%;color:silver}.demo th{border-bottom:.5px solid #aaa;/*! border-top:1px solid #aaa; */
 padding:5px;color:silver}.demo td{border:0 solid #aaa;padding:0;background:0;text-align:center}.demo td#CELL1{background-color:transparent;color:#000}.demo td#CELL2{background-color:#9cff9c}.demo td#CELL3{background-color:#31ff00}.demo td#CELL4{background-color:#31cf00}.demo td#CELL5{background-color:#ff0}.demo td#CELL6{background-color:#ffcf00}.demo td#CELL7{background-color:#ff9a00}.demo td#CELL8{background-color:#ff6464}.demo td#CELL9{background-color:red;color:#fff}.demo td#CELL10{background-color:#900;color:#fff}.demo td#CELL11{background-color:#ce30ff;color:#fff}img{margin-left:10px;margin-right:10px;width:60px;background-color:transparent}.alert-row{display:flex;flex-direction:row;height:120px;padding:10px 0;background-color:whitesmoke}.alert-row-narrow{display:flex;flex-direction:row;height:60px;padding:10px 0;background-color:whitesmoke;font-size:12px}.alert-row-info{display:flex;flex-direction:row;height:120px;padding:10px 0;background-color:whitesmoke}.alert-text-container{font-family:Arial,Helvetica,sans-serif;font-size:11px;display:flex;flex-direction:column;justify-content:center;margin-right:10px;color:#000}.alert-text-container-narrow{font-family:Arial,Helvetica,sans-serif;font-size:14px;display:flex;flex-direction:column;justify-content:center;margin-right:10px}body{background-image:url();margin-left:8px;margin-top:8px;margin-right:8px;margin-bottom:8px;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px;color:#fff;font-weight:400;background-color:rgba(33,34,39,.8)}html{margin:0;padding:0}a:link{color:#fff}a:visited{color:#fff}a:hover{color:#fff}a:active{color:#fff}.LegendText2{font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px;color:#fff;font-weight:400}.Ebene3Header{font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px}table{font-size:11px;vertical-align:bottom;width:auto}.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));grid-gap:5px;align-items:stretch;color:#f5f7fc;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid>article{border:1px solid #212428;box-shadow:2px 2px 6px 0 rgba(0,0,0,.3);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid1{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:5px;color:#000}.grid2{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:0;color:#000}.grid3{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:20px;color:#000}.grid1>articlegraph{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100%}.grid2>articlegraph2{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100%}.grid3>articlegraph3{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.grid1>articlegraph_lg{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:lightgreen;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:80px}.grid3>articlegraph3{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:0;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.grid3>articlegraphText{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#f5f7fc;color:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.grid1>articlegraph_te{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:teal;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:15px}.grid1>articlegraph_ye{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:yellow;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:80px}.grid1>articlegraph_or{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:orange;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90px}.grid1>articlegraph_re{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:red;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100px}.grid_FT{display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));grid-gap:1px;align-items:stretch;color:#f5f7fc;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid_FT>articlegraph_FT{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;color:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:15px}.grid_MET{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:5px;color:#000}.grid_MET>articlegraph_MET{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.weather34darkbrowser{position:relative;width:97%;height:30px;margin:auto;margin-top:-5px;margin-left:0;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px;color:#fff}.weather34darkbrowser[url]:after{content:attr(url);font-size:14px;text-align:center;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;font-family:arial;height:20px}.actualt{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:teal;padding:5px;font-family:Arial,Helvetica,sans-serif;width:790px;height:.8em;font-size:.8rem;padding-top:2px;color:#fff;border-bottom:2px solid rgba(56,56,60,1);align-items:center;justify-content:center;margin-bottom:0;top:0}blue{color:#01a4b4}orange{color:#009bb4}orange1{color:rgba(255,131,47,1)}green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#cc0}purple{color:#916392}.roundcornerframe{position:relative;width:790px;border-radius:5px;overflow:hidden;margin:0 auto 0 auto}.ol_time{margin-top:-15px;margin-right:6px;color:#d65b4a;font:700 10px arial,sans-serif;line-height:10px;float:right}.left{float:left;width:80px;padding-left:2px;height:160px;border:none}.right{float:left;width:80px;padding-right:2px;height:160px;border:none}.middle{float:left;width:140px;position:relative;height:160px;border:none}.2_high{height:80px;vertical-align:middle}.3_high{height:53px;vertical-align:middle}.4_high{height:40px;vertical-align:middle}.uv{color:#000}.webcamlarge{-webkit-border-radius:4px;-moz-border-radius:4px;-o-border-radius:4px;-ms-border-radius:4px;border-radius:4px;border:solid RGBA(84,85,86,1) 2px;width:98%;height:380px}
    </style>';
}
else if ($theme === "light")
{
    echo '<style>.demo{border:0 solid #aaa;border-collapse:collapse;padding:50px;font-family:arial,helvetica,verdana,sans-serif;font-size:10px;margin-bottom:50px;margin-top:50px margin-left:50%;margin-right:-50%;width:100%;color:#000}.demo th{border-bottom:1px solid #aaa;/*! border-top:1px solid #aaa; */
 padding:5px;color:#000}.demo td{border:0 solid #aaa;padding:0;background:#FFF;text-align:center}.demo td#CELL1{background-color:transparent;color:#000}.demo td#CELL2{background-color:#9cff9c}.demo td#CELL3{background-color:#31ff00}.demo td#CELL4{background-color:#31cf00}.demo td#CELL5{background-color:#ff0}.demo td#CELL6{background-color:#ffcf00}.demo td#CELL7{background-color:#ff9a00}.demo td#CELL8{background-color:#ff6464}.demo td#CELL9{background-color:red;color:#fff}.demo td#CELL10{background-color:#900;color:#fff}.demo td#CELL11{background-color:#ce30ff;color:#fff}img{margin-left:10px;margin-right:10px;width:60px;background-color:transparent}.alert-row{display:flex;flex-direction:row;height:120px;padding:10px 0;background-color:whitesmoke}.alert-row-narrow{display:flex;flex-direction:row;height:60px;padding:10px 0;background-color:whitesmoke;font-size:12px}.alert-row-info{display:flex;flex-direction:row;height:120px;padding:10px 0;background-color:whitesmoke}.alert-text-container{font-family:Arial,Helvetica,sans-serif;font-size:11px;display:flex;flex-direction:column;justify-content:center;margin-right:10px;color:#000}.alert-text-container-narrow{font-family:Arial,Helvetica,sans-serif;font-size:14px;display:flex;flex-direction:column;justify-content:center;margin-right:10px}body{background-image:url();margin-left:8px;margin-top:8px;margin-right:8px;margin-bottom:8px;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px;color:#fff;font-weight:400;background-color:#fff}html{margin:0;padding:0}a:link{color:#000}a:visited{color:#000}a:hover{color:#000}a:active{color:#000}.LegendText2{font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px;color:#000;font-weight:400}.Ebene3Header{font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px}table{font-size:11px;vertical-align:bottom;width:auto}.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));grid-gap:5px;align-items:stretch;color:#f5f7fc;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid>article{border:1px solid #212428;box-shadow:2px 2px 6px 0 rgba(0,0,0,.3);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid1{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:5px;color:#000}.grid2{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:0;color:#000}.grid3{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:20px;color:#000}.grid1>articlegraph{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100%}.grid2>articlegraph2{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100%}.grid3>articlegraph3{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.grid3>articlegraph4{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.grid1>articlegraph_lg{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:lightgreen;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:80px}.grid1>articlegraph_te{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:teal;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:15px}.grid1>articlegraph_ye{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:yellow;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:80px}.grid1>articlegraph_or{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:orange;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90px}.grid1>articlegraph_re{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:red;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100px}.grid_FT{display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));grid-gap:1px;align-items:stretch;color:#f5f7fc;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid_FT>articlegraph_FT{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;color:#000;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:15px}.grid_MET{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:5px;color:#000}.grid_MET>articlegraph_MET{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.weather34darkbrowser{position:relative;width:97%;height:30px;margin:auto;margin-top:-5px;margin-left:0;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px;color:#000}.weather34darkbrowser[url]:after{content:attr(url);font-size:14px;text-align:center;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;font-family:arial;height:20px}.actualt{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:teal;padding:5px;font-family:Arial,Helvetica,sans-serif;width:790px;height:.8em;font-size:.8rem;padding-top:2px;color:#fff;border-bottom:2px solid rgba(56,56,60,1);align-items:center;justify-content:center;margin-bottom:0;top:0}blue{color:#01a4b4}orange{color:#009bb4}orange1{color:rgba(255,131,47,1)}green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#cc0}purple{color:#916392}.roundcornerframe{position:relative;width:790px;border-radius:5px;overflow:hidden;margin:0 auto 0 auto}.webcamlarge{-webkit-border-radius:4px;-moz-border-radius:4px;-o-border-radius:4px;-ms-border-radius:4px;border-radius:4px;border:solid RGBA(84,85,86,1) 2px;width:97%;height:480px}
    </style>';
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>AQI Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

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