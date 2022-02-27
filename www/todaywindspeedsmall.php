<?php


	
	####################################################################################################
	#	DATACHARTS by BRIAN UNDERDOWN 2016                                                           #
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
	if ($windunit=='kts'){$windunit="kn";}
	if ($windunit == 'mph') {
      $conv= '2.2371364653244';
  } else if ($windunit == 'km/h') {
    $conv= '3.5997120230382';
  } else if ($windunit == 'm/s'){
    $conv= '1';
  }
else if ($windunit == 'kn'){
    $conv= '1.94384';
  }
    echo '
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>OUTDOOR WIND day CHART</title>	
		<script src=../js/jquery.js></script>
		
	';
	
	$date= date('D jS Y');$weatherfile = date('dmY');?>
    <br>
    <script type="text/javascript">
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
			
			for (var i = 1; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData.length >1)
					dataPoints1.push({label: rowData[1],y:parseFloat(rowData[7]*<?php echo $conv;?>)});
					
					
			}
		}
		requestTempCsv();}function requestTempCsv(){}

	function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 1; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData.length >1)
					dataPoints2.push({label: rowData[1],y:parseFloat(rowData[6]*<?php echo $conv;?>)});
					//parseFloat(rowData[13])});
				
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
            text: "",
			fontSize: 0,
			fontColor:' #aaa',
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
		titleFontSize: 10,
        titleWrap: false,
		margin: 3,
		lineThickness: 1,		
		gridThickness: 1,	
		interval:'auto',	
        includeZero: true,
		gridColor: "#333",
		gridDashType: "dot",
		labelFontSize: 6,
		labelFontColor:' #aaa',
		titleFontFamily: "arial",
		labelFontFamily: "arial",
		labelFormatter: function ( e ) {
        return e.value .toFixed(0) + " <?php echo $windunit ;?> " ;  
         },		
			 
		 
      },
	  
	  legend:{
      fontFamily: "arial",
      fontColor:"#aaa",
  
 },
		
		
		data: [
		{
			//wind speed
			type: "column",
			color:"#F05E40",
			markerSize:0,
			showInLegend:false,
			legendMarkerType: "circle",
			lineThickness: 0,
			markerType: "none",
			name:"Gusts",
			dataPoints: dataPoints2,
			yValueFormatString:"#0.# <?php echo $windunit ;?>",
		},
		{
			// wind gust
			type: "column",
			color:"#00a4b4",
			markerSize:0,
			showInLegend:false,
			legendMarkerType: "circle",
			lineThickness: 0,
			markerType: "none",
			name:"Avg Wind",
			dataPoints: dataPoints1,
			yValueFormatString:"#0.# <?php echo $windunit ;?>",
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