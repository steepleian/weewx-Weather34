<?php
	
	####################################################################################################
	#	WUDATACHARTS by BRIAN UNDERDOWN 2016                                                           #
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at http://weather34.com/homeweatherstation/index.html  # 
	# 	                                                                                               #
	# 	built on CanvasJs  	                                                                           #
	#   canvasJs.js is protected by CREATIVE COMMONS LICENCE BY-NC 3.0  	                           #
	# 	free for non commercial use and credit must be left in tact . 	                               #
	# 	                                                                                               #
	# 	Weather Data is based on your PWS upload quality collected at Weather Underground 	           #
	# 	                                                                                               #
	# 	Second General Release: 4th October 2016  	                                                   #
	# 	                                                                                               #
	#   http://www.weather34.com 	                                                                   #
	####################################################################################################
	
	header('Content-type: text/html; charset=utf-8');
	$conv = 1;
	if ($pressureunit  == "mb" && $windunit == 'mph'){$conv= '1';}
	else if ($pressureunit  == "hPa" && $windunit == 'mph'){$conv= '1';}
	else if ($windunit == 'mph') {$conv= '0.02953';}
	else if ($windunit == 'm/s') {$conv= '1';}
	else if ($windunit == 'km/h'){$conv= '1';}
	
	$limit = '0';
	if ($windunit == 'mph') {$limit= '20';}
	else if ($windunit == 'm/s') {$limit= '930';}
	else if ($windunit == 'km/h'){$limit= '930';}
	
	
    echo '
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>OUTDOOR Barometer CHART</title>	
		<script src=../js/jquery.js></script>
		
	';
	
	?>
    <br>	
	<script type="text/javascript">
	// today barometer
        $(document).ready(function () {

	var dataPoints1 = [];
	var dataPoints2 = [];
	$.ajax({
			type: "GET",
			url: "result.csv",
			dataType: "text",
			cache:false,
			success: function(data) {processData1(data),processData2(data);}
		});
	
	function processData1(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 2; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[3] ><?php echo $limit;?>)
					dataPoints1.push({label:rowData[1],y:parseFloat(rowData[3]*<?php echo $conv;?>)});		}
		}
		requestTempCsv();}function requestTempCsv(){}

		function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 1; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[3] ><?php echo $limit;?>)
					dataPoints2.push({label:rowData[1],y:parseFloat(rowData[3]*<?php echo $conv;?>)});
				
			}
			drawChart(dataPoints1 );
		}
	}

	
	function drawChart( dataPoints1) {
		var chart = new CanvasJS.Chart("chartContainer2", {
		 backgroundColor: "rgba(30, 33, 36, .4)",
		 animationEnabled: false,
		 margin: 0,
		 
		title: {
            text: "",
			fontSize: 0,
			fontColor:' #555',
			fontFamily: "arial",
        },
		toolTip:{
			   fontStyle: "normal",
			   cornerRadius: 4,
			   backgroundColor: "#fff",			   
			   toolTipContent: " x: {x} y: {y} <br/> name: {name}, label:{label}",
			   shared: true, 
 		},
		axisX: {
			gridColor: "#333",
		    labelFontSize: 6,
			labelFontColor:' #aaa',
			lineThickness: 1,
			gridThickness: 1,	
			titleFontFamily: "arial",	
			labelFontFamily: "arial",	
			gridDashType: "dot",
   			intervalType: "hour",
			minimum:0,
			},
			
			
		axisY:{
		title: "",
		titleFontColor: "#aaa",
		titleFontSize: 6,
        titleWrap: false,
		margin: 3,
		interval:'auto',
		lineThickness: 1,		
		gridThickness: 1,	
		gridDashType: "dot",
        includeZero: false,
		gridColor: "#333",
		labelFontSize: 6,
		labelFontColor:' #aaa',
		titleFontFamily: "arial",
		labelFontFamily: "arial",
		labelFormatter: function ( e ) {
        return e.value .toFixed(1) + " <?php echo $pressureunit ;?> " ;  
         },		 
		 
      },
	  
	  legend:{
      fontFamily: "arial",
      fontColor:"#aaa",
  
 },
		
		
		data: [
		{
			type: "spline",
			color:"#ff8841",
			markerSize:0,
			showInLegend:false,
			legendMarkerType: "triangle",
			lineThickness: 1,
			markerType: "circle",
			name:"Barometer",
			dataPoints: dataPoints1,
			yValueFormatString:"#0.# °",
			markerBorderColor: 'red',
			dataPoints: dataPoints1,
			yValueFormatString: "##.## <?php echo $pressureunit ;?>",
		},
		{
			//not using in daily barometer
		}

		]
		});

		chart.render();
	}
});

     </script>

<body>
<div id="chartContainer2" class="chartContainer2" style="width:100%;height:125px;padding:0;margin-top:-25px;border-radius:3px;border:1px solid #333;"></div></div>

</body>
<script src='canvasJs.js'></script>
</html>
