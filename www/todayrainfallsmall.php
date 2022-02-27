<?php
	
	####################################################################################################
	#	DATACHARTS by BRIAN UNDERDOWN 2016-2019                                                        #
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at https://weather34.com/homeweatherstation/index.html # 
	# 	                                                                                               #
	# 	built on CanvasJs  	                                                                           #
	#   canvasJs.js is protected by CREATIVE COMMONS LICENCE BY-NC 3.0  	                           #
	# 	free for non commercial use and credit must be left in tact . 	                               #
	# 	                                                                                               #
	# 	Weather Data is based on your PWS upload quality collected at Weather Underground 	           #
	# 	                                                                                               #
	# 	Second General Release: 4th October 2016  	                                                   #
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
	
	header('Content-type: text/html; charset=utf-8');
	$conv = 1;
	if ($uk == true && $windunit == 'mph') {$conv= '1';}	
	else if ($windunit == 'mph'){$conv= '0.0393701';}
	else if ($usa == true) {$conv= '0.0393701';}
	else if ($usa == true && $windunit == 'mph') {$conv= '0.0393701';}
	else if ($restoftheworld == true && $metric == 'true') {$conv= '1';}
	else if ($restoftheworld == true && $metric == 'false') {$conv= '0.0393701';}
	else if ($restoftheworld == true && $windunit == 'mph') {$conv= '0.0393701';}
	else $conv;
	$interval = 1;
	if ($uk == true && $windunit == 'mph') {$interval= '1';}
	else if ($windunit == 'mph') {$interval= '0.5';}
	else if ($windunit == 'm/s') {$interval= '1';}
	else if ($windunit == 'km/h'){$interval= '1';}
    echo '
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Rainfall Today DATABASE CHART</title>	
		<script src=../js/jquery.js></script>
		
		
	';
	
	$date= date('D jS Y');$weatherfile = date('dmY');?>
    <br>
    	<script type="text/javascript">
		// today temperature
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
				if ( rowData.length >1)
					dataPoints1.push({label: rowData[1],y:parseFloat(rowData[4]*<?php echo $conv;?>)});
			}
		}
		requestTempCsv();}function requestTempCsv(){}

	function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 2; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData.length >1)
					dataPoints2.push({label: rowData[1],y:parseFloat(rowData[10]*<?php echo $conv;?>)});
				
			}
			drawChart(dataPoints1 , dataPoints2 );
		}
	}

		function drawChart( dataPoints1 , dataPoints2 ) {
		var chart = new CanvasJS.Chart("chartContainer2", {
		 backgroundColor: "rgba(30, 33, 36, .4)",
		 animationEnabled: false,
		 margin: 0,
		
		title: {
            text: " ",
			fontSize: 0,
			fontColor:' #555',
			fontFamily: "arial",
        },
		toolTip:{
			   fontStyle: "normal",
			   cornerRadius: 4,
			   backgroundColor: "#fff",			   
			   toolTipContent: " x: {x} y: {y} <br/> name: {name}, label:{label} ",
			   shared: true, 
			   
    
 },
		axisX: {
			gridColor: "#aaa",
		    labelFontSize: 6,
			labelFontColor:' #aaa',
			lineThickness: 0.5,
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
		interval:0.5,
		lineThickness: 1,		
		gridThickness: 0,	
		gridDashType: "dot",	
        includeZero: true,
		gridColor: "#ff9350",
		labelFontSize: 6,
		labelFontColor:' #aaa',
		titleFontFamily: "arial",
		labelFontFamily: "arial",
		labelFormatter: function ( e ) {
         return e.value .toFixed(1) +"<?php echo $rainunit ;?>" ;  
         },		 
		crosshair: {
			enabled: true,
			snapToDataPoint: true,
			color: "#ff9350",
			labelFontColor: "#fff",
			labelFontSize:8,
			labelBackgroundColor: "#d05f2d",
			valueFormatString: "#0.#<?php echo $rainunit ;?>",
		}	 
      },
	  
	     axisY2:{
		title: "",
		titleFontColor: "#aaa",
		titleFontSize: 8,
        titleWrap: false,
		margin: 3,
		interval:'auto',
		
		lineThickness: 1,		
		gridThickness: 1,	
		gridDashType: "dot",	
        includeZero: true,
		gridColor: "#333",
		labelFontSize: 6,
		labelFontColor:' #aaa',
		titleFontFamily: "arial",
		labelFontFamily: "arial",
		labelFormatter: function ( e ) {
         return e.value .toFixed(1) + "<?php echo $rainunit ?>" ;  
		},
		crosshair: {
			enabled: true,
			snapToDataPoint: true,
			color: "#3b9cac",
			labelFontColor: "#fff",
			labelFontSize:12,
			labelBackgroundColor: "#3b9cac",
			valueFormatString: "# '<?php echo $rainunit ?>'",
		}	 
      },
	  
	  legend:{
      fontFamily: "arial",
      fontColor:"#aaa",
  
 },
		
		
		
		data: [
		{
			
			type: "column",
			color:"#3b9cac",
			markerSize:0,
			showInLegend:false,			
			lineThickness: 1,
			markerType: "circle",
			name:"Rainfall",
			dataPoints: dataPoints1,
			yValueFormatString: "#0.#<?php echo $rainunit ;?>",
			
		},
		{
			type: "column",
			color:"#cd5245",
			markerSize:0,
			showInLegend:false,			
			axisYType: "secondary",
			axisYIndex: 1,
			lineThickness: 1,
			markerType: "circle",
			name:"Rain Rate",
			dataPoints: dataPoints2,
			yValueFormatString: "#0.#<?php echo $rainunit ;?>",
			
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
