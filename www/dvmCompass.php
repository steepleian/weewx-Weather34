<?php
include('w34CombinedData.php');
date_default_timezone_set($TZ);
error_reporting(0);
header('Content-type: text/html; charset = utf-8');
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>compass</title>
<meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit = yes">
</head>
<link href="dvmCss/main.<?php echo $theme; ?>.css?version=<?php echo filemtime(
    "dvmCss/main." . $theme . ".css"
); ?>" rel="stylesheet prefetch">
<body>  
  
<style>

body {
overflow: hidden;
}

.wrap {
  position: relative;
  top: -0px;
  left: 80px;  
}

</style>

<div style="overflow: hidden">
<div class="wrap">
  <svg id="compass" width="140" height="140" xmlns="http://www.w3.org/2000/svg">
  <!--path d="" id="arc"/-->
  </svg>
</div>
</div>
 
<script>
var svgNS = "http://www.w3.org/2000/svg";

var svg = document.getElementById("compass");


var theme = "<?php echo $theme;?>"

	if (theme == 'dark') {
     
var angle = "<?php echo $weather["wind_direction"];?>"

var avWindD = "<?php echo $weather["wind_direction_avg"];?>"


    
    
	DirectionAngle(70, 52, + angle + "" + "°"); // Direction in degrees text

	CardinalDirection(111, 73, "E");
	CardinalDirection(67, 116, "S");
	CardinalDirection(23, 73, "W");
	
var polygon4 = document.createElementNS(svgNS, "polygon"); // hourly average direction arrow 
	polygon4.setAttributeNS(null, "points", "70,33 73,22 70,25 67,22");
	polygon4.setAttributeNS(null, "fill", "rgba(190,104,139,1)"); // jupiter
	polygon4.setAttributeNS(null, "transform", "rotate("+ onehourAvD +", 70, 70)");
	svg.appendChild(polygon4);
	
var polygon3 = document.createElementNS(svgNS, "polygon"); // 10 minute avarage direction arrow
	polygon3.setAttributeNS(null, "points", "70,33 73,22 70,25 67,22");
	polygon3.setAttributeNS(null, "fill", "rgba(46,139,87,1)"); // earth green
	polygon3.setAttributeNS(null, "transform", "rotate("+ tenminAvD +", 70, 70)");
	svg.appendChild(polygon3);
	
var polygon2 = document.createElementNS(svgNS, "polygon"); // daily average direction arrow
	polygon2.setAttributeNS(null, "points", "70,33 73,22 70,25 67,22");
	polygon2.setAttributeNS(null, "fill", "rgba(0,127,255,1)"); // arch blue
	polygon2.setAttributeNS(null, "transform", "rotate("+ avWindD +", 70, 70)");
	svg.appendChild(polygon2);
/*			
var polygon1 = document.createElementNS(svgNS, "polygon"); // north arrow
	polygon1.setAttributeNS(null, "points", "70,33 73,22 70,25 67,22");
	polygon1.setAttributeNS(null, "fill", "red");
	svg.appendChild(polygon1);
*/	

	Pointer();

for (var i = 0; i < 360; i += 2) {
  // draw degree lines
  var s = "rgba(59, 60, 63, 1)"; // dark grey
  if (i == 0 || i % 30 == 0) {
    w = 1;
    s = "rgba(255, 99, 71, 1)"; // tomato
    y2 = 17;
  } else {
    w = 0.75;
    y2 = 17;
  }
  
var ticks = document.createElementNS(svgNS, "line");
	ticks.setAttributeNS(null, "x1", 70);
	ticks.setAttributeNS(null, "y1", 10);
	ticks.setAttributeNS(null, "x2", 70);
	ticks.setAttributeNS(null, "y2", y2);
	ticks.setAttributeNS(null, "stroke", s);
	ticks.setAttributeNS(null, "stroke-width", w);
	ticks.setAttributeNS(null, "stroke-linecap", "round");
	ticks.setAttributeNS(null, "transform", "rotate(" + i + ", 70, 70)");
	svg.appendChild(ticks);
	
var polygon1 = document.createElementNS(svgNS, "polygon"); // north arrow pointing upwards
	polygon1.setAttributeNS(null, "points", "70,33 73,22 70,25 67,22");
	polygon1.setAttributeNS(null, "fill", "red");
	polygon1.setAttributeNS(null, "transform", "rotate(180, 70, 21)");
	svg.appendChild(polygon1);	
 
  // draw degree value every 30 degrees
  if (i % 30 == 0) {
    var t1 = document.createElementNS(svgNS, "text");
    if (i > 100) {
      t1.setAttributeNS(null, "x", 64);
    } else if (i > 0) {
      t1.setAttributeNS(null, "x", 66);
    } else {
      t1.setAttributeNS(null, "x", 68.25);
    }
    t1.setAttributeNS(null, "y", 7);
    t1.setAttributeNS(null, "font-size", "6px");
    t1.setAttributeNS(null, "font-family", "Helvetica");
    t1.setAttributeNS(null, "fill", "rgba(147, 147, 147, 1)");
    t1.setAttributeNS(null, "style", "letter-spacing: 1.0");
    t1.setAttributeNS(null, "transform", "rotate(" + i + ", 70, 70)");
    var textNode = document.createTextNode(i);
    t1.appendChild(textNode);
    svg.appendChild(t1);
  }
}

function CardinalDirection(x, y, displayText) {
	var direction = document.createElementNS(svgNS, "text");
  	direction.setAttributeNS(null, "x", x);
  	direction.setAttributeNS(null, "y", y);
  	direction.setAttributeNS(null, "font-size", "8px");
  	direction.setAttributeNS(null, "font-family", "Helvetica");
  	direction.setAttributeNS(null, "fill", "rgba(192, 192, 192, 1)");
	var textNode = document.createTextNode(displayText);
  	direction.appendChild(textNode);
  	svg.appendChild(direction);
}

function DirectionAngle(x, y, displayText) {
  	var degrees = document.createElementNS(svgNS, "text");
  	degrees.setAttributeNS(null, "x", x);
  	degrees.setAttributeNS(null, "y", y);
  	degrees.setAttributeNS(null, "font-size", "12px");
  	degrees.setAttributeNS(null, "font-family", "Helvetica");
  	degrees.setAttributeNS(null, "fill", "rgba(192, 192, 192, 1)");  
  	degrees.setAttributeNS(null, "text-anchor", "middle");  
  	var textNode = document.createTextNode(displayText);
  	degrees.appendChild(textNode);
  	svg.appendChild(degrees);
}

/*
function polarToCartesian(centerX, centerY, radius, angleInDegrees) {
  var angleInRadians = (angleInDegrees - 90) * Math.PI / 180.0;

  return {
    x: centerX + (radius * Math.cos(angleInRadians)),
    y: centerY + (radius * Math.sin(angleInRadians))
  };
}

function describeArc(x, y, radius, startAngle, endAngle){

    var endAngleOriginal = endAngle;
    if(endAngleOriginal - startAngle === 360){
        endAngle = angle;
    }

    var start = polarToCartesian(x, y, radius, endAngle);
    var end = polarToCartesian(x, y, radius, startAngle);

    var arcSweep = endAngle - startAngle <= 180 ? "0" : "1";

    if(endAngleOriginal - startAngle === 360){
        var d = [
              "M", start.x, start.y, 
              "A", radius, radius, 0, arcSweep, 0, end.x, end.y, "z"
        ].join(" ");
    }
    else{
      var d = [
          "M", start.x, start.y, 
          "A", radius, radius, 0, arcSweep, 0, end.x, end.y
      ].join(" ");
    }

    return d;       
}

var Arc = document.getElementById("arc");
	Arc.setAttribute("d", describeArc(70, 70, 49.5, 0, angle));
	Arc.setAttribute("stroke", "rgba(0,127,255,1)");
	Arc.setAttribute("stroke-width", 1);
	Arc.setAttribute("fill", "none");
	Arc.setAttribute("stroke-linecap", "round");
	Arc.appendChild(Arc);
*/

function Pointer(x1, y1, x2, y2) {
  	var CompassPointer = document.createElementNS(svgNS, "line");
  	CompassPointer.setAttributeNS(null, "x1", 0);
  	CompassPointer.setAttributeNS(null, "y1", 10);
  	CompassPointer.setAttributeNS(null, "x2", 0);
  	CompassPointer.setAttributeNS(null, "y2", -50);
  	CompassPointer.setAttributeNS(null, "stroke", "red");
  	CompassPointer.setAttributeNS(null, "stroke-width", 1);
  	CompassPointer.setAttributeNS(null, "stroke-opacity", 1.0);
  	CompassPointer.setAttributeNS(null, "stroke-linecap", "round");
  	CompassPointer.setAttributeNS(null, 'transform', 'translate(70,70) rotate(' + angle + ',' + 0 + ',' + 0 + ')');      
  	svg.appendChild(CompassPointer);  
  }
  
var circ = document.createElementNS(svgNS, "circle");
	circ.setAttributeNS(null, "cx", 70);
	circ.setAttributeNS(null, "cy", 70);
	circ.setAttributeNS(null, "r", 5);
	circ.setAttributeNS(null, "fill", "rgba(59, 60, 63, 1)");
	svg.appendChild(circ);

} else {

var svgNS = "http://www.w3.org/2000/svg";

var svg = document.getElementById("compass");

var angle = "<?php echo $weather["wind_direction"];?>"

var avWindD = "<?php echo $weather["wind_direction_avg"];?>"



    
	DirectionAngle(70, 52, angle + "" + "°"); // Direction in drgrees text

	CardinalDirection(111, 73, "E");
	CardinalDirection(67, 116, "S");
	CardinalDirection(23, 73, "W");
	
var polygon4 = document.createElementNS(svgNS, "polygon"); // hourly average direction arrow 
	polygon4.setAttributeNS(null, "points", "70,33 73,22 70,25 67,22");
	polygon4.setAttributeNS(null, "fill", "rgba(190,104,139,1)"); // jupiter
	polygon4.setAttributeNS(null, "transform", "rotate("+ onehourAvD +", 70, 70)");
	svg.appendChild(polygon4);
		
var polygon3 = document.createElementNS(svgNS, "polygon"); // 10 minute avarage direction arrow
	polygon3.setAttributeNS(null, "points", "70,33 73,22 70,25 67,22");
	polygon3.setAttributeNS(null, "fill", "rgba(46,139,87,1)"); // earth green
	polygon3.setAttributeNS(null, "transform", "rotate("+ tenminAvD +", 70, 70)");
	svg.appendChild(polygon3);
	
var polygon2 = document.createElementNS(svgNS, "polygon"); // daily average direction arrow
	polygon2.setAttributeNS(null, "points", "70,33 73,22 70,25 67,22");
	polygon2.setAttributeNS(null, "fill", "rgba(0,127,255,1)"); // arch blue
	polygon2.setAttributeNS(null, "transform", "rotate("+ avWindD +", 70, 70)");
	svg.appendChild(polygon2);
/*			
var polygon1 = document.createElementNS(svgNS, "polygon"); // north arrow
	polygon1.setAttributeNS(null, "points", "70,33 73,22 70,25 67,22");
	polygon1.setAttributeNS(null, "fill", "red");
	svg.appendChild(polygon1);
*/
	Pointer();

for (var i = 0; i < 360; i += 2) {
  // draw degree lines
  var s = "rgba(230, 232, 239, 1)"; // silver
  if (i == 0 || i % 30 == 0) {
    w = 1;
    s = "rgba(255,99,71,1)"; // tomato
    y2 = 17;
  } else {
    w = 0.75;
    y2 = 17;
  }
  
var ticks = document.createElementNS(svgNS, "line");
	ticks.setAttributeNS(null, "x1", 70);
	ticks.setAttributeNS(null, "y1", 10);
	ticks.setAttributeNS(null, "x2", 70);
	ticks.setAttributeNS(null, "y2", y2);
	ticks.setAttributeNS(null, "stroke", s);
	ticks.setAttributeNS(null, "stroke-width", w);
	ticks.setAttributeNS(null, "stroke-linecap", "round");
	ticks.setAttributeNS(null, "transform", "rotate(" + i + ", 70, 70)");
	svg.appendChild(ticks);
	
var polygon1 = document.createElementNS(svgNS, "polygon"); // north arrow pointing upwards
	polygon1.setAttributeNS(null, "points", "70,33 73,22 70,25 67,22");
	polygon1.setAttributeNS(null, "fill", "red");
	polygon1.setAttributeNS(null, "transform", "rotate(180, 70, 21)");
	svg.appendChild(polygon1);	
   
  // draw degree value every 30 degrees
  if (i % 30 == 0) {
    var t1 = document.createElementNS(svgNS, "text");
    if (i > 100) {
      t1.setAttributeNS(null, "x", 64);
    } else if (i > 0) {
      t1.setAttributeNS(null, "x", 66);
    } else {
      t1.setAttributeNS(null, "x", 68.25);
    }
    t1.setAttributeNS(null, "y", 7);
    t1.setAttributeNS(null, "font-size", "6px");
    t1.setAttributeNS(null, "font-family", "Helvetica");
    t1.setAttributeNS(null, "fill", "rgba(147, 147, 147, 1)");
    t1.setAttributeNS(null, "style", "letter-spacing: 1.0");
    t1.setAttributeNS(null, "transform", "rotate(" + i + ", 70, 70)");
    var textNode = document.createTextNode(i);
    t1.appendChild(textNode);
    svg.appendChild(t1);
  }
}

function CardinalDirection(x, y, displayText) {
  	var direction = document.createElementNS(svgNS, "text");
  	direction.setAttributeNS(null, "x", x);
  	direction.setAttributeNS(null, "y", y);
  	direction.setAttributeNS(null, "font-size", "8px");
  	direction.setAttributeNS(null, "font-family", "Helvetica");
  	direction.setAttributeNS(null, "fill", "silver");
  	var textNode = document.createTextNode(displayText);
  	direction.appendChild(textNode);
  	svg.appendChild(direction);
}

function DirectionAngle(x, y, displayText) {
  	var degrees = document.createElementNS(svgNS, "text");
  	degrees.setAttributeNS(null, "x", x);
  	degrees.setAttributeNS(null, "y", y);
  	degrees.setAttributeNS(null, "font-size", "12px");
  	degrees.setAttributeNS(null, "font-family", "Helvetica");
  	degrees.setAttributeNS(null, "fill", "rgba(45, 58, 75, 1)");  
  	degrees.setAttributeNS(null, "text-anchor", "middle");  
  	var textNode = document.createTextNode(displayText);
  	degrees.appendChild(textNode);
  	svg.appendChild(degrees);
}

/*
function polarToCartesian(centerX, centerY, radius, angleInDegrees) {
  var angleInRadians = (angleInDegrees - 90) * Math.PI / 180.0;

  return {
    x: centerX + (radius * Math.cos(angleInRadians)),
    y: centerY + (radius * Math.sin(angleInRadians))
  };
}

function describeArc(x, y, radius, startAngle, endAngle){

    var endAngleOriginal = endAngle;
    if(endAngleOriginal - startAngle === 360){
        endAngle = angle;
    }

    var start = polarToCartesian(x, y, radius, endAngle);
    var end = polarToCartesian(x, y, radius, startAngle);

    var arcSweep = endAngle - startAngle <= 180 ? "0" : "1";

    if(endAngleOriginal - startAngle === 360){
        var d = [
              "M", start.x, start.y, 
              "A", radius, radius, 0, arcSweep, 0, end.x, end.y, "z"
        ].join(" ");
    }
    else{
      var d = [
          "M", start.x, start.y, 
          "A", radius, radius, 0, arcSweep, 0, end.x, end.y
      ].join(" ");
    }

    return d;       
}

var Arc = document.getElementById("arc");
	Arc.setAttribute("d", describeArc(70, 70, 49.5, 0, angle));
	Arc.setAttribute("stroke", "rgba(0,127,255,1)");
	Arc.setAttribute("stroke-width", 1);
	Arc.setAttribute("fill", "none");
	Arc.setAttribute("stroke-linecap", "round");
	Arc.appendChild(Arc);
*/

function Pointer(x1, y1, x2, y2) {
  	var CompassPointer = document.createElementNS(svgNS, "line");
  	CompassPointer.setAttributeNS(null, "x1", 0);
  	CompassPointer.setAttributeNS(null, "y1", 10);
  	CompassPointer.setAttributeNS(null, "x2", 0);
  	CompassPointer.setAttributeNS(null, "y2", -50);
  	CompassPointer.setAttributeNS(null, "stroke", "red");
  	CompassPointer.setAttributeNS(null, "stroke-width", 1);
  	CompassPointer.setAttributeNS(null, "stroke-opacity", 1.0);
  	CompassPointer.setAttributeNS(null, "stroke-linecap", "round"); 
  	CompassPointer.setAttributeNS(null, 'transform', 'translate(70,70) rotate(' + angle + ',' + 0 + ',' + 0 + ')');      
  	svg.appendChild(CompassPointer);  
  }
  
var circ = document.createElementNS(svgNS, "circle");
	circ.setAttributeNS(null, "cx", 70);
	circ.setAttributeNS(null, "cy", 70);
	circ.setAttributeNS(null, "r", 5);
	circ.setAttributeNS(null, "fill", "rgba(230, 232, 239, 1)");
	svg.appendChild(circ);    
}

</script>

</body>
</html>
