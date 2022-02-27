<?php include('settings.php');include('shared.php');date_default_timezone_set($TZ);header('Content-type: text/html; charset=utf-8');error_reporting(-1);
echo "<body style='background-color:#292E35'>";
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>sunMutatis</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
<link rel="stylesheet" href="orrery/orrery.css">
    <script src="orrery/two.js"></script>
   
</head>
<body>
<canvas id="sunMutatis" width="120" height="120" style="position:relative; top: 50px; left: -10px; border:1px solid #000000;"></canvas>  
<script>  
var canvasSize = 120;

// Create an instance of Two.js
var sky = document.getElementById("sunMutatis");

var params = { width: canvasSize, 
			   height: canvasSize,
			   fullscreen: false,
			   type: Two.Types.canvas };
var two = new Two(params).appendTo(sky);




	function Visibility(V,a0,a1,a2,a3,a4,a5) {

			// Coef
		var a0 = '35/51',
			a1 = '-0.3495',
			a2 = '-0.1254',
			a3 = '-0.0955',
			a4 = '-0.03134',
			a5 = '-0.01398';

		{ return a0 + a1 * Math.cos(V) + a2 * Math.cos(2 * V) + a3 * Math.cos(3 * V) + a4 * Math.cos(4 * V) + a5 * Math.cos(5 * V)
	 };
	}
	
	function phase(t,case) {

	phaze = case;

	T = t - 2 * Math.PI * Math.floor(t / (2 * Math.PI));

		if T < Math.PI {
			phaze = Math.cos(t);
		
		{ return phaze
	  };
	 }
	}

	var now = new Date();
		hours = now.getHours(),
		mins = now.getMinutes(),
		secs = now.getSeconds(),
		millisecond = now.getMilliseconds();
		//hAngle = (hour + minute / 60) * 30,
		//mAngle = (minute + second / 60) * 6,
		//sAngle = (second + millisecond / 1000) * 6;
		
	var Ds = '-1.000';    // Sun position				
	var Dm = '-11.450';   // Moon position					
	var Da = '-11.450';   // Hand of Aries position 
	
	var longitude = '13.767345965293318';
	var clock_R = 147;
	
	// ----- SUN OTIONS --------------------------------------------------------------

	var SunMutatis = 'true'; 		// Mutation of the Sun depending on Day or Night
	var color_Sun = '#FFff00';		// Color 0xFFff00
	var color_ecl = '#007fff';		// Color 0x007fff
	var alf_ecl = '0.25';			// Transparency inside the Elicptic

	// ----- CLOCK TIME OPTION ------------------------------------------------------

	var Hour24 = 'true';			// 24h clock 

	// ---- CLOCK SPHERES ------------------------------------------------------------

	var Spheres = 'true';      		// Display the spehres
	var color_Ss = '#FFff00'; 		// Color of the Sun sphere 0xFFff00
	var Vels = '100';				// Speed of the Sun's sphere [-100:100]

	// -------------------------------------------------------------------------------
	
	// -- convert time to angles
	var hour_T = 2 * Math.PI * (hours + (mins + secs / 60) / 60) / 24;
	var mins_T = 2 * Math.PI * (mins + secs / 60) / 60;
	var secs_T = 2 * Math.PI * (mins + secs / 60);
	var day = day + (hours - 12) / 24;
	
	if Hour24 == false {
		hour_T = hour_T * 2
	 };
	 
	// ----- Solar Time ----------------------------------------------
	var J = 2 * Math.PI * (day - 1) / 365;
	var Eot = 229.18 * (0.000075 + 0.001868 * Math.cos(J) - 0.032077 * Math.sin(J) - 0.014615 * Math.cos(2 * J) - 0.04089 * Math.sin(2 * J));
	
	mins = Eot + mins;
	hours = hours + longitude * Math.PI / 180
	
	// -- Time to angle
	var secs_arc = (Math.PI / 30) * secs;
	var mins_arc = (Math.PI / 30) * mins + secs_arc / 60;
	var hours_arc = (Math.PI / 12) * hours + mins_arc / 24 + Math.PI * Ds / 12;
	
	// -- Aries Time
	var hour_A = 0.997268 * hours_arc + J + Math.PI * Da / 12;
	
	// -- Moon Time
	var T = 29.5305912;
	var hour_M = 0.966138 * hours_arc - 2 * Math.PI * day / T + Math.PI * Dm / 12
	
	// ----- Sun position -----
	var a = 0.28467 * clock_R;
	var b = 2.51284;
	var d = - hour_A + hours_arc;
	var sd = Math.sin(d);
	var R = a * (Math.sqrt(b * b - sd * sd) + Math.cos(d));
	
	// -- Variation of the Day
	if SunMutatis {
		D = (0.5 + 0.5 * Visibility(hours_arc))
	} else {
		D = 1
	};
	
	// -- Variability of the sun
	if SunMutatis {
		Alf_S = Visibility(hours_arc + Math.PI)
	} else {
		Alf_S = 1
	};
	
		if Spheres {

		RmS = 14 * (1 - Alf_S); 

		// -- Draw external rings

		var extRing = two.makeCircle(Xs, Ys, 60, 0, 2 * Math.PI);
		extRing.noFill();
		extRing.linewidth = 2;
		extRing.stroke = "#FF6347";
		
		var extRing = two.makeCircle(Xs, Ys, 44 + RmS, 0, 2 * Math.PI);
		extRing.noFill();
		extRing.linewidth = 2;
		extRing.stroke = "#FF6347";

		// -- Draw internal ring
		
		var intRing = two.makeCircle(Xs, Ys, 0.5, * (60 + 44 + RMS), 0, 2 * Math.PI);
		extRing.noFill();
		extRing.linewidth = 60 - 44 - RMS;
		extRing.stroke = "color_Ss,alf_ecl * Alf_S";

		i = 0;

		var Line while i <= 11 do {

			xzi = Xs + 60 * Math.sin(hour_A + i * Math.PI / 6 - mins_T),
			yzi = Ys - 60 * Math.cos(hour_A + i * Math.PI / 6 - mins_T),
			Xzi = Xs + (44 + RmS) * Math.sin(hour_A + i * Math.PI / 6 + Vels * mins_T),
			Yzi = Ys - (44 + RmS) * Math.cos(hour_A + i * Math.PI / 6 + Vels * mins_T),

			Line.moveTo(xzi,yzi),
			Line.lineTo(Xzi,Yzi),


			extRing.linewidth = 2;
			extRing.stroke = "color_Ss,Alf_S";

			i = i + 1;
		};
	} 

	// -- Sun ----
	var sunL = two.makeCircle(Xs, Ys, 9, 0, 2 * Math.PI)
	sunL.linewidth = 22;
	sunL.stroke = "color_Sun,Alf_S";


	var sunS = two.makeCircle(Xs, Ys, 4.4, 0, 2 * Math.PI)
	sunS.linewidth = 8;
	sunS.stroke = "color_Sun,1";
	
}.play();


	
	
	
</script>  
</body>
</html>
