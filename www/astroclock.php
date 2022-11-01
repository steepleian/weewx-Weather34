<?php

/*

Astronomical clock
 
This clock has been translated from an old lua script,
coded by a good friend of mine named Paramvir Likhari.

Based on the Orloj clock which can be found in the City of Prague,
it acts like a precision instrument when fed with the correct data.
This is the proper way to display the sun and moon going around a circle.

The sun posision is spot on, the moon is accurate to within 3-4 arc minutes
which is extremely good !
The data has been pre-calculated using the python-ephem library
and parsed using json.

I have a small TODO list.

N0.1
Further help will be needed to create a getPoints function
to get the sun and moon positions to ride the outer edge of 
the Ecliptic Ring for correct display.
This will enable the sun and moon to slide up and down their needles
as the time progresses throughout the year and months.

N0.2 
Force the 24 hour clock to display only local time
afterall when you click on the link to display the
Astroclock you are seeing sun and moon positions
calculated for my position and local time
therefore the clock should do the same thing !

No.3
The sun and moon should animate with a one second tick
to show you how the Kaleidoscope sun works.
The moon animation is not quite so elaborate but
fits nicely in the sun at the moment of a new moon.
(the duration is about an hour or so)

I would be eternally grateful for any help with these four functions.
I hope you like the clock enjoy the nice graphics.

I am also open to suggestions to improve the code in any way.

Cheers Sean 

Created by Sean Balfour in Dresden March 2022
contact: seanbalfourdresden@googlemail.com

*/


include('shared.php');
date_default_timezone_set($TZ);
error_reporting(0);
header('Content-type: text/html; charset = utf-8');
echo "<body style='background-color:#292E35'>";
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Astroclock</title>
<meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit = yes">
<link rel="stylesheet" href="astroclock/astroclock.css">
</head>

<script src="astroclock/two.js"></script>

<style>
@font-face {
    font-family: 'AstroDotBasic';
    src: url('css/fonts/AstroDotBasic.ttf')  format('truetype');
}
</style>

<body>
 
<svg width="500" height="500" style="position:relative; top: 25px; left: -130px; border:0px solid #007FFF;"> // svg Sun ring
  <defs>
    <linearGradient id="grad1" x1="0" y1="0" x2="0" y2="1">
      <stop offset="0%" stop-color="rgba(255,255,0,1)" /> // yellow
      <stop offset="50%" stop-color="rgba(255,0,0,1)" /> // red
      <stop offset="100%" stop-color="rgba(0,0,255,1)" /> // blue
    </linearGradient>
  </defs>
  <g fill="none">
    <circle cx="250" cy="250" r="184" stroke="url(#grad1)" stroke-width="15" />
  </g>
</svg>

 
<div id="Astroclock" width="500" height="500" style="position:relative; top: -475px; left: -130px; border:0px solid #007FFF;">

<?php

// Astroclock Data
$parsed_json = json_decode((file_get_contents("jsondata/astroclock.json")),true);

$location 		= $parsed_json[0]['astroclock']['Location'];
$latitude 		= $parsed_json[0]['astroclock']['Latitude'];
$longitude 		= $parsed_json[0]['astroclock']['Longitude'];
$elevation 		= $parsed_json[0]['astroclock']['Elevation'];
$sunalt 		= $parsed_json[0]['astroclock']['Sunalt'];
$hours_arc 		= $parsed_json[0]['astroclock']['hoursarc'];
$hourMoon 		= $parsed_json[0]['astroclock']['hourmoon'];
$hourSun 		= $parsed_json[0]['astroclock']['hoursun'];
$lmst 			= $parsed_json[0]['astroclock']['Lmst'];
$hourAries 		= $parsed_json[0]['astroclock']['hourAries'];
$stime 			= $parsed_json[0]['astroclock']['SolarTime'];
$mtime 			= $parsed_json[0]['astroclock']['LunarTime'];
$mphase 		= $parsed_json[0]['astroclock']['Moonphase'];
$solstice 		= $parsed_json[0]['astroclock']['Solstice'];
$equinox 		= $parsed_json[0]['astroclock']['Equinox'];

?>

<script>

// The svg sun ring is started before anything else !

// refresh the page every 60 seconds
window.setInterval('refresh()', 60000); 	
    function refresh() {
        window.location.reload();
    }
   
var canvasSize = 500;

// Create an instance of Two.js
var skynet = document.getElementById("Astroclock");

var params = { width: canvasSize, 
			   height: canvasSize,
			   fullscreen: false,
			   autostart: true,
			   type: Two.Types.canvas };
var two = new Two(params).appendTo(skynet);

// Define clock elements
const radius = Math.min(two.width, two.height) * 0.30;
	const styles = {
  	size: radius * 0.08,
  	weight: "bold",
  	family: "Helvetica",
  	fill: "rgba(255,255,0,1)", // yellow
  	opacity: 1.0
};

// the first two rings after the svg sun ring
var blueRing = two.makeCircle(0, 0, 174);
blueRing.noFill();
blueRing.linewidth = 6;
blueRing.stroke = "rgba(42,86,147,1)"; // sky blue

var clockRing = two.makeCircle(0, 0, 170);
clockRing.noFill();
clockRing.linewidth = 1.25;
clockRing.stroke = "rgba(255,99,71,1)"; // tomato


// clock numbers background ring
var clockRing2 = two.makeCircle(0, 0, 154);
clockRing2.noFill();
clockRing2.linewidth = 28;
clockRing2.stroke = "rgba(9,70,62,1)"; // green


// inner and outer clock tick marks
const ticks1 = two.makeCircle(0, 0, 167);
ticks1.noFill();
ticks1.dashes = [1, (2 * Math.PI * 167 / 120 - 1)];
ticks1.linewidth = 4;
ticks1.stroke = "rgba(255,255,255,1)"; // white

const ticks2 = two.makeCircle(0, 0, 143);
ticks2.noFill();
ticks2.dashes = [1, (2 * Math.PI * 143 / 120 - 1)];
ticks2.linewidth = 3;
ticks2.stroke = "rgba(255,255,255,1)"; // white


// loop to create the clock numbers
for (let i = 0; i < 24; i++) {

  const x = - 155 * Math.sin(i / 24 * Math.PI * 2);
  const y = 155 * Math.cos(i / 24 * Math.PI * 2);
  const number = new Two.Text(i === 0 ? 0 : i, x, y, styles);

  number.position.set(x, y + 2);
  two.add(number);

}

// define clock hands and group together
const hands = {
  hour: new Two.Line(0, 0, 0, - radius * 1.22),
  minute: new Two.Line(0, 0, 0, - radius * 1.22),
  second: new Two.Line(0, 0, 0, - radius * 1.22)
};

hands.hour.noFill();
hands.hour.stroke = "rgba(74,227,82,1)"; // Lime green
hands.hour.linewidth = 5;
hands.hour.cap = "round";

hands.minute.noFill();
hands.minute.stroke = "rgba(0,255,255,1)"; // Aqua
hands.minute.linewidth = 4;
hands.minute.cap = "round";

hands.second.noFill();
hands.second.stroke = "rgba(255,0,255,1)"; // Cyan
hands.second.linewidth = 2.5;
hands.second.cap = "round";

two.add(hands.hour, hands.minute, hands.second);

two.bind("resize", resize);
two.bind("update", update);

resize();

function resize() {
  two.scene.position.set(two.width / 2, two.height / 2);
}

// Create the clock and get it rolling
function update(frameCount, timeDelta) {

  // 24 hour clock with a sweeping second hand
    
  const now = new Date();
  
  const ms = now.getMilliseconds(); 
  const S = 2 * Math.PI * (now.getSeconds() * 1000 + ms) / 1000 / 60; // make it sweep
  const M = 2 * Math.PI * (now.getMinutes() + now.getSeconds() / 60) / 60;  
  const H = 2 * Math.PI * (now.getHours() + 12 + (now.getMinutes() + now.getSeconds() / 60) / 60) / 24;

  hands.hour.rotation += H - hands.hour.rotation;
  hands.minute.rotation += M - hands.minute.rotation;
  hands.second.rotation += S - hands.second.rotation;
    
}


// create the sky
var skyRing = two.makeCircle(0, 0, 71.5);
skyRing.fill = "rgba(42,86,147,1)";
skyRing.linewidth = 137;
skyRing.stroke = "rgba(42,86,147,1)"; // sky blue

// -- create wire frame with arc segments, this was a nightmare ! --

var arcj = two.makeArcSegment(0, -560, 430, 430, 0.674, 0.468);
arcj.closed = false;
arcj.rotation = 1;
arcj.noFill();
arcj.linewidth = 0.5;
arcj.stroke = "rgba(137,142,143,1)";

var arcr = two.makeArcSegment(0, -560, 450, 450, 0.742, 0.400);
arcr.closed = false;
arcr.rotation = 1;
arcr.noFill();
arcr.linewidth = 0.5;
arcr.stroke = "rgba(137,142,143,1)";

var arce = two.makeArcSegment(0, -570, 480, 480, 0.775, 0.368);
arce.closed = false;
arce.rotation = 1;
arce.noFill();
arce.linewidth = 0.5;
arce.stroke = "rgba(137,142,143,1)";

var arca = two.makeArcSegment(0, 420, 480, 480, 1.280, 0.715);
arca.closed = false;
arca.rotation = 10;
arca.noFill();
arca.linewidth = 0.5;
arca.stroke = "rgba(137,142,143,1)";

var arcn = two.makeArcSegment(0, 180, 230, 230, 1.650, 0.340);
arcn.closed = false;
arcn.rotation = 10;
arcn.noFill();
arcn.linewidth = 0.5;
arcn.stroke = "rgba(137,142,143,1)";

var arcu = two.makeArcSegment(0, 142, 180, 180, 1.860, 0.130);
arcu.closed = false;
arcu.rotation = 10;
arcu.noFill();
arcu.linewidth = 0.5;
arcu.stroke = "rgba(137,142,143,1)";

var arcy = two.makeArcSegment(0, -140, 140, 140, 1.610, -0.470);
arcy.closed = false;
arcy.rotation = 1;
arcy.noFill();
arcy.linewidth = 0.5;
arcy.stroke = "rgba(137,142,143,1)";

var arcq = two.makeArcSegment(30, -136.5, 140, 140, 1.830, -0.260);
arcq.closed = false;
arcq.rotation = 1;
arcq.noFill();
arcq.linewidth = 0.5;
arcq.stroke = "rgba(137,142,143,1)";

var arcp = two.makeArcSegment(-30, -136.5, 140, 140, 1.400, -0.690);
arcp.closed = false;
arcp.rotation = 1;
arcp.noFill();
arcp.linewidth = 0.5;
arcp.stroke = "rgba(137,142,143,1)";

var arcl = two.makeArcSegment(60, -126.5, 140, 140, 2.060, -0.030);
arcl.closed = false;
arcl.rotation = 1;
arcl.noFill();
arcl.linewidth = 0.5;
arcl.stroke = "rgba(137,142,143,1)";

var arcg = two.makeArcSegment(-60, -126.5, 140, 140, 1.170, -0.910);
arcg.closed = false;
arcg.rotation = 1;
arcg.noFill();
arcg.linewidth = 0.5;
arcg.stroke = "rgba(137,142,143,1)";

var arck = two.makeArcSegment(90, -106.5, 140, 140, 2.320, 0.230);
arck.closed = false;
arck.rotation = 1;
arck.noFill();
arck.linewidth = 0.5;
arck.stroke = "rgba(137,142,143,1)";

var arch = two.makeArcSegment(-90, -106.5, 140, 140, 0.910, -1.170);
arch.closed = false;
arch.rotation = 1;
arch.noFill();
arch.linewidth = 0.5;
arch.stroke = "rgba(137,142,143,1)";

var arcx = two.makeArcSegment(275, -120.5, 300, 300, 2.197, 1.932);
arcx.closed = false;
arcx.rotation = 1;
arcx.noFill();
arcx.linewidth = 0.5;
arcx.stroke = "rgba(137,142,143,1)";

var arcz = two.makeArcSegment(-275, -120.5, 300, 300, -0.720, -1.058);
arcz.closed = false;
arcz.rotation = 1;
arcz.noFill();
arcz.linewidth = 0.5;
arcz.stroke = "rgba(137,142,143,1)";


// create both vertical and horizontal lines inside the wire frame
var vline = two.makeLine(0, -139, 0, -61);
vline.noFill();
vline.linewidth = 0.5;
vline.stroke = "rgba(137,142,143,1)";

var hline = two.makeLine(-121, -70, 121, -70);
hline.noFill();
hline.linewidth = 0.5;
hline.stroke = "rgba(137,142,143,1)";

// -- end wire frame --


// create the filled arc segments under the horizon
var arcf = two.makeArcSegment(0, 110, 140, 0, 2.160, -0.170);
arcf.closed = false;
arcf.rotation = 10;
arcf.fill = "rgba(41,46,53,1)"; // dark color
arcf.linewidth = 1;
arcf.stroke = "rgba(41,46,53,1)";

var arcs = two.makeArcSegment(0, -1.5, 140, 0, 1.720, -0.580);
arcs.closed = false;
arcs.rotation = 1;
arcs.fill = "rgba(41,46,53,1)";
arcs.linewidth = 1;
arcs.stroke = "rgba(41,46,53,1)"; // dark color


// create the main horizion arc, this sits on top of the filled arc segments
var horizion = two.makeArcSegment(0, 110, 140, 140, 2.160, -0.170);
horizion.closed = false;
horizion.rotation = 10;
horizion.noFill();
horizion.linewidth = 1;
horizion.stroke = "rgba(255,99,71,1)"; // tomato


// create the ring of Cancer this is the first ring past the clock numbers
var CancerR = two.makeCircle(0, 0, 140);
CancerR.noFill();
CancerR.linewidth = 1.25;
CancerR.stroke = "rgba(255,99,71,1)"; // tomato


// create the three arcs under the horizon, these are the twilight markers
var arci = two.makeArcSegment(0, 100, 120, 120, 2.360, -0.370);
arci.closed = false;
arci.rotation = 10;
arci.noFill();
arci.linewidth = 0.5;
arci.stroke = "rgba(137,142,143,1)";

var arct = two.makeArcSegment(0, 90, 100, 100, 2.640, -0.650);
arct.closed = false;
arct.rotation = 10;
arct.noFill();
arct.linewidth = 0.5;
arct.stroke = "rgba(137,142,143,1)";

var arcd = two.makeArcSegment(0, 80, 80, 80, 3.110, -1.120);
arcd.closed = false;
arcd.rotation = 10;
arcd.noFill();
arcd.linewidth = 0.5;
arcd.stroke = "rgba(137,142,143,1)";


// create the earth and fill it with a dark color
var Earth = two.makeCircle(0, 0, 60);
Earth.fill = "rgba(41,46,53,1)";
Earth.linewidth = 1.25;
Earth.stroke = "rgba(41,46,53,1)"; // dark color


// create the Equator ring 
var Equator = two.makeCircle(0, 0, 90.5);
Equator.noFill();
Equator.linewidth = 1.5;
Equator.stroke = "rgba(255,99,71,1)"; // tomato

// create the ring of Capricorn
var CapricornR = two.makeCircle(0, 0, 60);
CapricornR.noFill();
CapricornR.linewidth = 1.25;
CapricornR.stroke = "rgba(255,99,71,1)"; // tomato


// zodiac symbols to the right of the clock

const styles2 = {
  size: 20,
  weight: "normal",
  family: "AstroDotBasic",
  fill: "rgba(46,139,87,1)", // earth green
  noStroke: "rgba(46,139,87,1)" // earth green
};

var aries = "a";
var Aries = new Two.Text(aries, 240, -100, styles2);

		
var taurus = "b";
var Taurus = new Two.Text(taurus, 240, -80, styles2);

		
var gemini = "c";
var Gemini = new Two.Text(gemini, 240, -60, styles2);

		
var cancer = "d";
var Cancer = new Two.Text(cancer, 240, -40, styles2);

		
var leo = "e";
var Leo = new Two.Text(leo, 240, -20, styles2);

		
var virgo = "f";
var Virgo = new Two.Text(virgo, 240, 0, styles2);

		
var libra = "g";
var Libra = new Two.Text(libra, 240, 20, styles2);

		
var scorpio = "h";
var Scorpio = new Two.Text(scorpio, 240, 40, styles2);

		
var sagittarius = "i";
var Sagittarius = new Two.Text(sagittarius, 240, 60, styles2);

		
var capricorn = "j";
var Capricorn = new Two.Text(capricorn, 240, 80, styles2);

		
var aquarius = "k";
var Aquarius = new Two.Text(aquarius, 240, 100, styles2);

		
var pisces = "l";
var Pisces = new Two.Text(pisces, 240, 120, styles2);

		
		two.scene.add(Aries, Taurus, Gemini, Cancer, Leo, Virgo, Libra, Scorpio, Sagittarius, Capricorn, Aquarius, Pisces);
		
		


// now that the clock face is finished, I can start to construct the Ecliptic ring, two needles, sun and moon with animation.

// first some Math's functions, some of which will be needed so please do not delete !!

const TORADIANS = 3.14159265358979323846 / 180;
const TODEGREES = 180 / 3.14159265358979323846;
const PHI = 1.6180339887499; // -- The Golden Mean --

function toRadians(x) {
  return x * (Math.PI / 180);
}

function toDegRad(x, f) { 
  return toRadians(x * f); 
}

// -- end Math functions


// visibility function for variation of the sun Kaleidoscope during the night time
	function Visibility(V) {
  
  if (V) {
    // coefficient
    const a0 = 35 / 51;
    const a1 = - 0.3495;
    const a2 = - 0.1254;
    const a3 = - 0.0955;
    const a4 = - 0.03134;
    const a5 = - 0.01398;
    var retV =
      a0 +
      a1 * Math.cos(V) +
      a2 * Math.cos(2 * V) +
      a3 * Math.cos(3 * V) +
      a4 * Math.cos(4 * V) +
      a5 * Math.cos(5 * V);

    return retV;
  }
  return;
}

// function to calculate the moon phase shape
    function phase(t, phaze) {
	
  var T = t - 2 * Math.PI * Math.floor(t / (2 * Math.PI));

  if (T < Math.PI) {
    phaze = Math.cos(t);
  }
  return phaze;
}

// define some things for the Astro clock (dont't delete anything here !!)
	var clockRadius = 140;

	// center of the clock
	var xc = 0;
	var yc = 0;
	
	const MoonRings = true;
	const MoonMutatis = true;
	const Kaleidoscope = true;
	const SunMutatis = true;
	
	var MoonMov = 8;
	var Velocity = 100;
	var color_M1 = "rgba(41,46,53,1)";
	var color_M = "rgba(255,255,255,1)";
    
    const now = new Date();
	const mins = now.getMinutes();
	const secs = now.getSeconds();
		
	var K_Sun = 2 * Math.PI * (mins + secs / 60) / 60; // this was used to generate the one second tick for animation in the lua script
	var R_Moon = 2 * Math.PI * (mins - secs / 60) / 60; // this was used to generate the one second tick for animation in the lua script
	
    var eclipticWidth = 0.75;

	// echo the data needed that has been pre-calculated in the python-ephem library
	        
    // sun altitude deg(sun.alt)
    var sun_alt = <?php echo $sunalt ?>;
   
    // hours_arc = toRadians(mag.sun_lha)
    var hours_arc = <?php echo $hours_arc ?>; 
   
    // hourMoon = (mag.moon_lha + 0) % 360;
    var hourMoon = <?php echo $hourMoon ?>;
    
    // hourSun = (deg(mag.sun_lha) + 180) % 360;
    var hourSun = <?php echo $hourSun ?>;
   
    // lmst = (deg(mag.sun_lha) / 15) + (deg(mag.sun_ra) / 15);
    var lmst = <?php echo $lmst ?>;
   
    // Lha = (lmst * 15) - 90;
        
    // hourAries = toRadians(Lha)    
    var hourAries = <?php echo $hourAries ?>;
    
    var mphase = <?php echo $mphase ?>;
    
    
    
/*	
 create and draw the ecliptic ring and turn it using hourAries
 the markers on this ring are in two parts, the first part is built into
 the eclipticRing function, the second part is
 the DayMarks function also turned using hourAries
*/ 
   
function EclipticRing() {

    var Rd = 0.28467 * clockRadius;
    var Re = 0.71533 * clockRadius;

    var xe = xc + (Rd * Math.sin(hourAries));
    var ye = yc - (Rd * Math.cos(hourAries));

    var arcb = two.makeCircle(xe, ye, 0.48 * (Re + eclipticWidth * Re), 0, 180 / Math.PI);
    arcb.noFill();
    arcb.linewidth = 35;
    arcb.stroke = "rgba(20,22,276,0.60)"; // blue

    var arc1 = two.makeCircle(xe, ye, Re, 0, 180 / Math.PI);
    arc1.noFill();
    arc1.linewidth = 2.5;
    arc1.stroke = "rgba(255,255,0,0.75)"; // yellow

    var arc2 = two.makeCircle(xe, ye, eclipticWidth * 1.25 * Re, 0, 180 / Math.PI);
    arc2.noFill();
    arc2.linewidth = 1.5;
    arc2.stroke = "rgba(255,255,0,1)"; // yellow

    var arc3 = two.makeCircle(xe, ye, eclipticWidth * Re * 0.9, 0, 180 / Math.PI);
    arc3.noFill();
    arc3.linewidth = 3.0;
    arc3.stroke = "rgba(255,255,0,0.75)"; // yellow
    


    // -- Zodiac Marker lines * 12 --
    
    var Lep = Re - Re * eclipticWidth;
      	
    var a = 0.2735 * clockRadius;
    var b = 2.51284;

  
let i = 0;
    while (i < 60) {

        var f = 12;
        var d = toDegRad(i,f);
        var sd = Math.sin(d);
        var a = 0.285 * clockRadius;
        var Re = a * (Math.sqrt((b * b) - (sd * sd)) + Math.cos(d));
        var Lep1 = Lep + 9;

        var factA = hourAries + d;
        var sinfactA = Math.sin(factA);
        var cosfactA = Math.cos(factA);
        var xa = xc + Re * sinfactA;
        var ya = yc - Re * cosfactA;
        var xb = xc + (Re - Lep1) * sinfactA;
        var yb = yc - (Re - Lep1) * cosfactA;
      
        var linez = two.makeLine(xa, ya, xb, yb);
  
        linez.noFill();
        linez.stroke = "rgb(255,255,0,0.75)"; // yellow
        linez.linewidth = 1.5;
        linez.cap = "round";
                       
        i = i + 2.5;
      }     
    }
      
EclipticRing();

    
// https://bl.ocks.org/milkbread/11000965



// create and draw the 12 zodiac symbols inside the ecliptic ring

function zodiacAries() {

	var Rd = 0.28467 * clockRadius;
  	var Re = 0.71533 * clockRadius;

  	var xe = xc + Rd * Math.sin(hourAries);
  	var ye = yc - Rd * Math.cos(hourAries);
  		
  		var Lep = Re - Re * eclipticWidth;
  		var a  = 0.275 * clockRadius;
		var b = 2.51284;
		 
	        //  ('Ar','Ta','Ge','Ca','Le','Vi','Li','Sc','Sa','Cap','Aq','Pi')

	  var ast = [ "", "c", "", "", "", "", "", "", "", "", "", "", "" ];
	  
let i = 1;
    while (i < 30) {
    	
        var f = 12           
        var d  = toDegRad(i,f);
        var sd = Math.sin(d);        
        var Re = (a * (Math.sqrt((b * b) - (sd * sd)) + Math.cos(d))) - 3.9;
        		
        var factA = hourAries + d;
        var sinfactA = Math.sin(factA);
        var cosfactA = Math.cos(factA);
        var xd = xc + Re * sinfactA;
        var yd = yc - Re * cosfactA;
        var xf = xc + (Re - Lep) * sinfactA;
        var yf = yc - (Re - Lep) * cosfactA;
        var sign = ast[Math.floor(i % ast.length)];
        var zodiac = two.makeText(sign, (xd + xf) / 2, (yd + yf) / 2);

        zodiac.family = "AstroDotBasic";
        zodiac.weight = "bold";
		zodiac.size = "20";
		zodiac.fill = "rgb(255,255,0,1)";
		zodiac.noStroke = "rgb(255,255,0,1)"; // yellow
		
		i = i + 2.54;
	}
		
	two.scene.add(zodiac); 
}

zodiacAries();

function zodiacTaurus() {

	var Rd = 0.28467 * clockRadius;
  	var Re = 0.71533 * clockRadius;

  	var xe = xc + Rd * Math.sin(hourAries);
  	var ye = yc - Rd * Math.cos(hourAries);
  		
  		var Lep = Re - Re * eclipticWidth;
  		var a  = 0.275 * clockRadius;
		var b = 2.51284;
		 
	        //  ('Ar','Ta','Ge','Ca','Le','Vi','Li','Sc','Sa','Cap','Aq','Pi')

	  var ast = [ "", "", "d", "", "", "", "", "", "", "", "", "", "" ];
	  
let i = 1;
    while (i < 30) {
    	
        var f = 12           
        var d  = toDegRad(i,f);
        var sd = Math.sin(d);        
        var Re = (a * (Math.sqrt((b * b) - (sd * sd)) + Math.cos(d))) - 3.9;
        		
        var factA = hourAries + d;
        var sinfactA = Math.sin(factA);
        var cosfactA = Math.cos(factA);
        var xd = xc + Re * sinfactA;
        var yd = yc - Re * cosfactA;
        var xf = xc + (Re - Lep) * sinfactA;
        var yf = yc - (Re - Lep) * cosfactA;
        var sign = ast[Math.floor(i % ast.length)];
        var zodiac = two.makeText(sign, (xd + xf) / 2, (yd + yf) / 2);

        zodiac.family = "AstroDotBasic";
        zodiac.weight = "bold";
		zodiac.size = "20";
		zodiac.fill = "rgb(255,255,0,1)";
		zodiac.noStroke = "rgb(255,255,0,1)"; // yellow
		
		i = i + 2.54;
	}
		
	two.scene.add(zodiac); 
}

zodiacTaurus();

function zodiacGemini() {

	var Rd = 0.28467 * clockRadius;
  	var Re = 0.71533 * clockRadius;

  	var xe = xc + Rd * Math.sin(hourAries);
  	var ye = yc - Rd * Math.cos(hourAries);
  		
  		var Lep = Re - Re * eclipticWidth;
  		var a  = 0.275 * clockRadius;
		var b = 2.51284;
		 
	        //  ('Ar','Ta','Ge','Ca','Le','Vi','Li','Sc','Sa','Cap','Aq','Pi')

	  var ast = [ "", "", "e", "", "", "", "", "", "", "", "", "" ];
	  
let i = 1;
    while (i < 30) {
    	
        var f = 12           
        var d  = toDegRad(i,f);
        var sd = Math.sin(d);        
        var Re = (a * (Math.sqrt((b * b) - (sd * sd)) + Math.cos(d))) - 3.9;
        		
        var factA = hourAries + d;
        var sinfactA = Math.sin(factA);
        var cosfactA = Math.cos(factA);
        var xd = xc + Re * sinfactA;
        var yd = yc - Re * cosfactA;
        var xf = xc + (Re - Lep) * sinfactA;
        var yf = yc - (Re - Lep) * cosfactA;
        var sign = ast[Math.floor(i % ast.length)];
        var zodiac = two.makeText(sign, (xd + xf) / 2, (yd + yf) / 2);

        zodiac.family = "AstroDotBasic";
        zodiac.weight = "bold";
		zodiac.size = "20";
		zodiac.fill = "rgb(255,255,0,1)";
		zodiac.noStroke = "rgb(255,255,0,1)"; // yellow
		
		i = i + 2.54;
	}
		
	two.scene.add(zodiac); 
}

zodiacGemini();

function zodiacCancer() {

	var Rd = 0.28467 * clockRadius;
  	var Re = 0.71533 * clockRadius;

  	var xe = xc + Rd * Math.sin(hourAries);
  	var ye = yc - Rd * Math.cos(hourAries);
  		
  		var Lep = Re - Re * eclipticWidth;
  		var a  = 0.275 * clockRadius;
		var b = 2.51284;
		 
	        //  ('Ar','Ta','Ge','Ca','Le','Vi','Li','Sc','Sa','Cap','Aq','Pi')

	  var ast = [ "", "", "", "b", "", "", "", "", "", "", "", "" ];
	  
let i = 1;
    while (i < 30) {
    	
        var f = 12           
        var d  = toDegRad(i,f);
        var sd = Math.sin(d);        
        var Re = (a * (Math.sqrt((b * b) - (sd * sd)) + Math.cos(d))) - 3.9;
        		
        var factA = hourAries + d;
        var sinfactA = Math.sin(factA);
        var cosfactA = Math.cos(factA);
        var xd = xc + Re * sinfactA;
        var yd = yc - Re * cosfactA;
        var xf = xc + (Re - Lep) * sinfactA;
        var yf = yc - (Re - Lep) * cosfactA;
        var sign = ast[Math.floor(i % ast.length)];
        var zodiac = two.makeText(sign, (xd + xf) / 2, (yd + yf) / 2);

        zodiac.family = "AstroDotBasic";
        zodiac.weight = "bold";
		zodiac.size = "20";
		zodiac.fill = "rgb(255,255,0,1)";
		zodiac.noStroke = "rgb(255,255,0,1)"; // yellow
		
		i = i + 2.54;
	}
		
	two.scene.add(zodiac); 
}

zodiacCancer();

function zodiacLeo() {

	var Rd = 0.28467 * clockRadius;
  	var Re = 0.71533 * clockRadius;

  	var xe = xc + Rd * Math.sin(hourAries);
  	var ye = yc - Rd * Math.cos(hourAries);
  		
  		var Lep = Re - Re * eclipticWidth;
  		var a  = 0.275 * clockRadius;
		var b = 2.51284;
		 
	        //  ('Ar','Ta','Ge','Ca','Le','Vi','Li','Sc','Sa','Cap','Aq','Pi')

	  var ast = [ "", "", "", "", "", "", "a", "", "", "", "", "", "" ];
	  
let i = 1;
    while (i < 30) {
    	
        var f = 12           
        var d  = toDegRad(i,f);
        var sd = Math.sin(d);        
        var Re = (a * (Math.sqrt((b * b) - (sd * sd)) + Math.cos(d))) - 3.9;
        		
        var factA = hourAries + d;
        var sinfactA = Math.sin(factA);
        var cosfactA = Math.cos(factA);
        var xd = xc + Re * sinfactA;
        var yd = yc - Re * cosfactA;
        var xf = xc + (Re - Lep) * sinfactA;
        var yf = yc - (Re - Lep) * cosfactA;
        var sign = ast[Math.floor(i % ast.length)];
        var zodiac = two.makeText(sign, (xd + xf) / 2, (yd + yf) / 2);

        zodiac.family = "AstroDotBasic";
        zodiac.weight = "bold";
		zodiac.size = "20";
		zodiac.fill = "rgb(255,255,0,1)";
		zodiac.noStroke = "rgb(255,255,0,1)"; // yellow
		
		i = i + 2.54;
	}
		
	two.scene.add(zodiac); 
}

zodiacLeo();

function zodiacVirgo() {

	var Rd = 0.28467 * clockRadius;
  	var Re = 0.71533 * clockRadius;

  	var xe = xc + Rd * Math.sin(hourAries);
  	var ye = yc - Rd * Math.cos(hourAries);
  		
  		var Lep = Re - Re * eclipticWidth;
  		var a  = 0.275 * clockRadius;
		var b = 2.51284;
		 
	        //  ('Ar','Ta','Ge','Ca','Le','Vi','Li','Sc','Sa','Cap','Aq','Pi')

	  var ast = [ "", "", "", "", "", "", "", "", "l", "", "", "" ];
	  
let i = 1;
    while (i < 30) {
    	
        var f = 12           
        var d  = toDegRad(i,f);
        var sd = Math.sin(d);        
        var Re = (a * (Math.sqrt((b * b) - (sd * sd)) + Math.cos(d))) - 3.9;
        		
        var factA = hourAries + d;
        var sinfactA = Math.sin(factA);
        var cosfactA = Math.cos(factA);
        var xd = xc + Re * sinfactA;
        var yd = yc - Re * cosfactA;
        var xf = xc + (Re - Lep) * sinfactA;
        var yf = yc - (Re - Lep) * cosfactA;
        var sign = ast[Math.floor(i % ast.length)];
        var zodiac = two.makeText(sign, (xd + xf) / 2, (yd + yf) / 2);

        zodiac.family = "AstroDotBasic";
        zodiac.weight = "bold";
		zodiac.size = "20";
		zodiac.fill = "rgb(255,255,0,1)";
		zodiac.noStroke = "rgb(255,255,0,1)"; // yellow
		
		i = i + 2.54;
	}
		
	two.scene.add(zodiac); 
}

zodiacVirgo();

function zodiacLibra() {

	var Rd = 0.28467 * clockRadius;
  	var Re = 0.71533 * clockRadius;

  	var xe = xc + Rd * Math.sin(hourAries);
  	var ye = yc - Rd * Math.cos(hourAries);
  		
  		var Lep = Re - Re * eclipticWidth;
  		var a  = 0.275 * clockRadius;
		var b = 2.51284;
		 
	        //  ('Ar','Ta','Ge','Ca','Le','Vi','Li','Sc','Sa','Cap','Aq','Pi')

	  var ast = [ "", "", "", "", "", "", "", "", "", "", "", "k", "" ];
	  
let i = 1;
    while (i < 30) {
    	
        var f = 12           
        var d  = toDegRad(i,f);
        var sd = Math.sin(d);        
        var Re = (a * (Math.sqrt((b * b) - (sd * sd)) + Math.cos(d))) - 3.9;
        		
        var factA = hourAries + d;
        var sinfactA = Math.sin(factA);
        var cosfactA = Math.cos(factA);
        var xd = xc + Re * sinfactA;
        var yd = yc - Re * cosfactA;
        var xf = xc + (Re - Lep) * sinfactA;
        var yf = yc - (Re - Lep) * cosfactA;
        var sign = ast[Math.floor(i % ast.length)];
        var zodiac = two.makeText(sign, (xd + xf) / 2, (yd + yf) / 2);

        zodiac.family = "AstroDotBasic";
        zodiac.weight = "bold";
		zodiac.size = "20";
		zodiac.fill = "rgb(255,255,0,1)";
		zodiac.noStroke = "rgb(255,255,0,1)"; // yellow
		
		i = i + 2.54;
	}
		
	two.scene.add(zodiac); 
}

zodiacLibra();

function zodiacScorpio() {

	var Rd = 0.28467 * clockRadius;
  	var Re = 0.71533 * clockRadius;

  	var xe = xc + Rd * Math.sin(hourAries);
  	var ye = yc - Rd * Math.cos(hourAries);
  		
  		var Lep = Re - Re * eclipticWidth;
  		var a  = 0.275 * clockRadius;
		var b = 2.51284;
		 
	        //  ('Ar','Ta','Ge','Ca','Le','Vi','Li','Sc','Sa','Cap','Aq','Pi')

	  var ast = [ "", "", "", "", "", "", "", "", "", "", "f", "", "" ];
	  
let i = 1;
    while (i < 30) {
    	
        var f = 12           
        var d  = toDegRad(i,f);
        var sd = Math.sin(d);        
        var Re = (a * (Math.sqrt((b * b) - (sd * sd)) + Math.cos(d))) - 3.9;
        		
        var factA = hourAries + d;
        var sinfactA = Math.sin(factA);
        var cosfactA = Math.cos(factA);
        var xd = xc + Re * sinfactA;
        var yd = yc - Re * cosfactA;
        var xf = xc + (Re - Lep) * sinfactA;
        var yf = yc - (Re - Lep) * cosfactA;
        var sign = ast[Math.floor(i % ast.length)];
        var zodiac = two.makeText(sign, (xd + xf) / 2, (yd + yf) / 2);

        zodiac.family = "AstroDotBasic";
        zodiac.weight = "bold";
		zodiac.size = "20";
		zodiac.fill = "rgb(255,255,0,1)";
		zodiac.noStroke = "rgb(255,255,0,1)"; // yellow
		
		i = i + 2.54;
	}
		
	two.scene.add(zodiac); 
}

zodiacScorpio();

function zodiacSagittarius() {

	var Rd = 0.28467 * clockRadius;
  	var Re = 0.71533 * clockRadius;

  	var xe = xc + Rd * Math.sin(hourAries);
  	var ye = yc - Rd * Math.cos(hourAries);
  		
  		var Lep = Re - Re * eclipticWidth;
  		var a  = 0.275 * clockRadius;
		var b = 2.51284;
		 
	        //  ('Ar','Ta','Ge','Ca','Le','Vi','Li','Sc','Sa','Cap','Aq','Pi')

	  var ast = [ "", "", "", "", "", "", "", "", "", "", "g" ];
	  
let i = 1;
    while (i < 30) {
    	
        var f = 12           
        var d  = toDegRad(i,f);
        var sd = Math.sin(d);        
        var Re = (a * (Math.sqrt((b * b) - (sd * sd)) + Math.cos(d))) - 3.9;
        		
        var factA = hourAries + d;
        var sinfactA = Math.sin(factA);
        var cosfactA = Math.cos(factA);
        var xd = xc + Re * sinfactA;
        var yd = yc - Re * cosfactA;
        var xf = xc + (Re - Lep) * sinfactA;
        var yf = yc - (Re - Lep) * cosfactA;
        var sign = ast[Math.floor(i % ast.length)];
        var zodiac = two.makeText(sign, (xd + xf) / 2, (yd + yf) / 2);

        zodiac.family = "AstroDotBasic";
        zodiac.weight = "bold";
		zodiac.size = "20";
		zodiac.fill = "rgb(255,255,0,1)";
		zodiac.noStroke = "rgb(255,255,0,1)"; // yellow
		
		i = i + 2.54;
	}
		
	two.scene.add(zodiac); 
}

zodiacSagittarius();

function zodiacCapricorn() {

	var Rd = 0.28467 * clockRadius;
  	var Re = 0.71533 * clockRadius;

  	var xe = xc + Rd * Math.sin(hourAries);
  	var ye = yc - Rd * Math.cos(hourAries);
  		
  		var Lep = Re - Re * eclipticWidth;
  		var a  = 0.275 * clockRadius;
		var b = 2.51284;
		 
	        //  ('Ar','Ta','Ge','Ca','Le','Vi','Li','Sc','Sa','Cap','Aq','Pi')

	  var ast = [  "", "", "", "", "h", "", "", "", "", "", "", "", "", "" ];
	  
let i = 1;
    while (i < 30) {
    	
        var f = 12           
        var d  = toDegRad(i,f);
        var sd = Math.sin(d);        
        var Re = (a * (Math.sqrt((b * b) - (sd * sd)) + Math.cos(d))) - 3.9;
        		
        var factA = hourAries + d;
        var sinfactA = Math.sin(factA);
        var cosfactA = Math.cos(factA);
        var xd = xc + Re * sinfactA;
        var yd = yc - Re * cosfactA;
        var xf = xc + (Re - Lep) * sinfactA;
        var yf = yc - (Re - Lep) * cosfactA;
        var sign = ast[Math.floor(i % ast.length)];
        var zodiac = two.makeText(sign, (xd + xf) / 2, (yd + yf) / 2);

        zodiac.family = "AstroDotBasic";
        zodiac.weight = "bold";
		zodiac.size = "20";
		zodiac.fill = "rgb(255,255,0,1)";
		zodiac.noStroke = "rgb(255,255,0,1)"; // yellow
		
		i = i + 2.54;
	}
		
	two.scene.add(zodiac); 
}

zodiacCapricorn();

function zodiacAquarius() {

	var Rd = 0.28467 * clockRadius;
  	var Re = 0.71533 * clockRadius;

  	var xe = xc + Rd * Math.sin(hourAries);
  	var ye = yc - Rd * Math.cos(hourAries);
  		
  		var Lep = Re - Re * eclipticWidth;
  		var a  = 0.275 * clockRadius;
		var b = 2.51284;
		 
	        //  ('Ar','Ta','Ge','Ca','Le','Vi','Li','Sc','Sa','Cap','Aq','Pi')

	  var ast = [  "", "", "i", "", "", "", "", "", "", "", "", "", "", "" ];
	  
let i = 1;
    while (i < 30) {
    	
        var f = 12           
        var d  = toDegRad(i,f);
        var sd = Math.sin(d);        
        var Re = (a * (Math.sqrt((b * b) - (sd * sd)) + Math.cos(d))) - 3.9;
        		
        var factA = hourAries + d;
        var sinfactA = Math.sin(factA);
        var cosfactA = Math.cos(factA);
        var xd = xc + Re * sinfactA;
        var yd = yc - Re * cosfactA;
        var xf = xc + (Re - Lep) * sinfactA;
        var yf = yc - (Re - Lep) * cosfactA;
        var sign = ast[Math.floor(i % ast.length)];
        var zodiac = two.makeText(sign, (xd + xf) / 2, (yd + yf) / 2);

        zodiac.family = "AstroDotBasic";
        zodiac.weight = "bold";
		zodiac.size = "20";
		zodiac.fill = "rgb(255,255,0,1)";
		zodiac.noStroke = "rgb(255,255,0,1)"; // yellow
		
		i = i + 2.54;
	}
		
	two.scene.add(zodiac); 
}

zodiacAquarius();

function zodiacPisces() {

	var Rd = 0.28467 * clockRadius;
  	var Re = 0.71533 * clockRadius;

  	var xe = xc + Rd * Math.sin(hourAries);
  	var ye = yc - Rd * Math.cos(hourAries);
  		
  		var Lep = Re - Re * eclipticWidth;
  		var a  = 0.275 * clockRadius;
		var b = 2.51284;
		 
	        //  ('Ar','Ta','Ge','Ca','Le','Vi','Li','Sc','Sa','Cap','Aq','Pi')

	  var ast = [  "", "", "", "", "", "", "", "", "", "", "", "", "", "j" ];
	  
let i = 1;
    while (i < 30) {
    	
        var f = 12           
        var d  = toDegRad(i,f);
        var sd = Math.sin(d);        
        var Re = (a * (Math.sqrt((b * b) - (sd * sd)) + Math.cos(d))) - 3.9;
        		
        var factA = hourAries + d;
        var sinfactA = Math.sin(factA);
        var cosfactA = Math.cos(factA);
        var xd = xc + Re * sinfactA;
        var yd = yc - Re * cosfactA;
        var xf = xc + (Re - Lep) * sinfactA;
        var yf = yc - (Re - Lep) * cosfactA;
        var sign = ast[Math.floor(i % ast.length)];
        var zodiac = two.makeText(sign, (xd + xf) / 2, (yd + yf) / 2);

        zodiac.family = "AstroDotBasic";
        zodiac.weight = "bold";
		zodiac.size = "20";
		zodiac.fill = "rgb(255,255,0,1)";
		zodiac.noStroke = "rgb(255,255,0,1)"; // yellow
		
		i = i + 2.54;
	}
		
	two.scene.add(zodiac); 
}

zodiacPisces();


// second part of the ecliptic ring the day markers * 60
function DayMarks() {

  var Rd = 0.28467 * clockRadius;
  var Re = 0.71533 * clockRadius;

  var xe = xc + Rd * Math.sin(hourAries);
  var ye = yc - Rd * Math.cos(hourAries);

    var Lep = Re - Re * eclipticWidth;
    var a = 0.283 * clockRadius;
    var b = 2.51284;


let i = 0;
    while (i < 60) {
        var f = 6;       
        var d = toDegRad(i, f);
        var sd = Math.sin(d);        
        var Re = a * (Math.sqrt((b * b) - (sd * sd)) + Math.cos(d));
        var Lep2 = 5;

        var factA = hourAries + d;
        var sinfactA = Math.sin(factA);
        var cosfactA = Math.cos(factA);
        var xg = xc + Re * sinfactA;
        var yg = yc - Re * cosfactA;
        var xh = xc + (Re - Lep2) * sinfactA;
        var yh = yc - (Re - Lep2) * cosfactA;
    
        var linex = two.makeLine(xg, yg, xh, yh);
  
        linex.noFill();
        linex.stroke = "rgb(255,255,0,0.75)"; // yellow
        linex.linewidth = 1;
        linex.cap = "round";
        
        i = i + 0.5;
      }  
    }

DayMarks();



// create and draw the blue cross onto the ecliptic ring and turn it using hourAries
function AriesHand() {

  var ariesHourFactor = hourAries + Math.PI / 2;
  var sinAriesHand = Math.sin(ariesHourFactor) * clockRadius;
  var cosAriesHand = Math.cos(ariesHourFactor) * clockRadius;
  var xa = xc + 0.87 * sinAriesHand;
  var ya = yc - 0.87 * cosAriesHand;
  var Xa = xc - 0.65 * sinAriesHand;
  var Ya = yc + 0.65 * cosAriesHand;
   
  var line1 = two.makeLine(xa, ya, Xa, Ya); // spring equinox/Aries hand one end, autumn equinox the other end

  line1.noFill();
  line1.stroke = "rgba(0,127,255,1)"; // arch blue
  line1.linewidth = 3;
  line1.cap = "round";

  var dot1 = two.makeCircle(Xa, Ya, 4, 0, Math.PI * 2); // autumn equinox dot
  dot1.fill = "rgba(255,99,71,1)";
  dot1.linewidth = 1;
  dot1.stroke = "rgba(255,99,71,1)"; // tomato

  var dot2 = two.makeCircle(xa, ya, 4.5, 0, Math.PI * 2); // dot on the end of Aries hand
  dot2.fill = "rgba(255,99,71,1)";
  dot2.linewidth = 1;
  dot2.stroke = "rgba(255,99,71,1)"; // tomato
  
  var ariesHourFactor = hourAries - 0.011 + Math.PI / 270;
  var sinAriesHand = Math.sin(ariesHourFactor) * clockRadius;
  var cosAriesHand = Math.cos(ariesHourFactor) * clockRadius;
  var xa = xc + sinAriesHand;
  var ya = yc - cosAriesHand;
  var Xa = xc - 0.43 * sinAriesHand;
  var Ya = yc + 0.43 * cosAriesHand;
  
  var line2 = two.makeLine(xa, ya, Xa, Ya); // summer solstice one end, winter solstice the other end

  line2.noFill();
  line2.stroke = "rgba(0,127,255,1)"; // arch blue
  line2.linewidth = 3;
  line2.cap = "round";

  var dot3 = two.makeCircle(Xa, Ya, 4, 0, Math.PI * 2); // winter solstice dot
  dot3.fill = "rgba(255,99,71,1)";
  dot3.linewidth = 1;
  dot3.stroke = "rgba(255,99,71,1)"; // tomato

  var dot4 = two.makeCircle(xa, ya, 4, 0, Math.PI * 2); // summer solstice dot
  dot4.fill = "rgba(255,99,71,1)";
  dot4.linewidth = 1;
  dot4.stroke = "rgba(255,99,71,1)"; // tomato
}

AriesHand();

/*
 create and draw the sun needle and the sun 
 you will see the var with the getpoints call is commented out
 the sun therefore sits on the end of the needle until further development
*/
function SunNeedle() {

    var as = 0.28467 * clockRadius;
    var bs = 2.51284;
    var ds = - hourAries + hours_arc;
    var sds = Math.sin(ds);
    var Rs = as * (Math.sqrt(bs * bs - sds * sds) + Math.cos(ds));
    		
	var Xs = xc - 0.17 * clockRadius * Math.sin(hours_arc);
	var Ys = yc + 0.17 * clockRadius * Math.cos(hours_arc);
  
    var line3 = two.makeLine(xc, yc, Xs, Ys);
  
    line3.noFill();
    line3.stroke = "rgba(255,255,0,1)"; // yellow
    line3.linewidth = 3;
    line3.cap = "round";

				
	var spots = two.makeCircle(Xs, Ys, 3, 0, Math.PI * 2);
	spots.fill = "rgba(255,255,0,1)";
    spots.linewidth = 1;
    spots.stroke = "rgba(255,255,0,1)"; // yellow
			
	var Xs = xc + 1.31 * clockRadius * Math.sin(hours_arc);
	var Ys = yc - 1.31 * clockRadius * Math.cos(hours_arc);

	var line4 = two.makeLine(xc, yc, Xs, Ys);
  
    line4.noFill();
    line4.stroke = "rgba(255,255,0,1)"; // yellow
    line4.linewidth = 3;
    line4.cap = "round";
        
    var Xs = xc + Rs * Math.sin(hours_arc); // 0.84 + clockRadius
	var Ys = yc - Rs * Math.cos(hours_arc);
					            
    var layers = {
  	background: two.makeGroup()
};

	var Rad = 65;
	var glow = new Two.Circle(Xs, Ys, Rad);
	glow.fill = "rgba(255, 85, 85, 1)"; // sunset red
	glow.fill = new Two.RadialGradient(0, 0, 0.5, [
  	new Two.Stop(0.15, "rgba(255, 85, 85, 0.80)"), // sunset red
  	new Two.Stop(1.00, "rgba(255, 85, 85, 0)") // sunset red
]);
	glow.noStroke();

	layers.background.add(glow);
           
    // -- sun Visibility variation during the day and night    
    if (SunMutatis == true) {
	var Alpha_S = Visibility(hours_arc + Math.PI);
	} else {
	  Alpha_S = 1;
	}
	
		var opacity = Alpha_S; // night time alpha variation
		
	// create the rings and kaleidoscope for the sun
	if (Kaleidoscope == true) { // all this should have a one second tick to animate it
    
    	var RmS = 7 * (1 - Alpha_S);

		// -- Draw inner and outer rings --
		
		var outR = two.makeCircle(Xs, Ys, 30, 0, 2 * Math.PI); // static size
		outR.stroke = "rgba(255,255,0,0.80)";
  		outR.linewidth = 2;
  		outR.noFill();
		
		var innR = two.makeCircle(Xs, Ys, 22 + RmS, 0, 2 * Math.PI); // ring size variation at night time
		innR.stroke = "rgba(255,255,0,0.80)";
  		innR.linewidth = 2;
  		innR.noFill();

		// -- color fill between the two rings --
		 
		var colF = two.makeCircle(Xs, Ys, 0.5 * (30 + 22 + RmS), 0, 2 * Math.PI); // size variation at night time
		colF.stroke = "rgba(255,255,0,0.20)";
  		colF.linewidth = 30 - 22 - RmS; // width variation at night time
  		colF.noFill();
  		 		     		  		
		let i = 0;

		while (i <= 11) {

			var xzx = Xs + 30 * Math.sin(hourAries + i * Math.PI / 6 - K_Sun);
			var yzx = Ys - 30 * Math.cos(hourAries + i * Math.PI / 6 - K_Sun);
			var Xzx = Xs + (22 + RmS) * Math.sin(hourAries + i * Math.PI / 6 + Velocity * K_Sun);
			var Yzx = Ys - (22 + RmS) * Math.cos(hourAries + i * Math.PI / 6 + Velocity * K_Sun);

			var strokes = two.makeLine(xzx ,yzx ,Xzx ,Yzx);
						 			
			strokes.stroke = "rgba(255,255,0,"+opacity+")";
    		strokes.linewidth = 1.5;
    		strokes.cap = "round";
    		strokes.noFill();

			i = i + 1;
		}
	}
	
	// sun center spots
	var suns = two.makeCircle(Xs, Ys, 10, 0, 2 * Math.PI);
	suns.stroke = "rgba(255,255,0,"+opacity+")"; // night time alpha variation
	suns.linewidth = 0.001;
	suns.fill = "rgba(255,255,0,"+opacity+")";
	
	var suns = two.makeCircle(Xs, Ys, 3.25, 0, 2 * Math.PI);
	suns.stroke = "rgba(255,255,0,1)";
	suns.linewidth = 1;
	suns.fill = "rgba(255,255,0,1)";
 	
} // -- end sun --
	
SunNeedle();	
              
/*
 create and draw the moon needle and the moon 
 you will see the var with the getpoints call is commented out
 the moon therefore sits on the end of the needle until further development
*/
function MoonNeedle() {
  
  	var hour_MD = toRadians(hourMoon);

    var am = 0.28467 * clockRadius;
    var bm = 2.51284;
    var dm = hourAries - hour_MD;
    var mdm = Math.sin(dm);
    var Rm = am * (Math.sqrt(bm * bm - mdm * mdm) + Math.cos(dm));
		
	var Xm = xc - 0.17 * clockRadius * Math.sin(hour_MD);
	var Ym = yc + 0.17 * clockRadius * Math.cos(hour_MD);
 
    var line4 = two.makeLine(xc, yc, Xm, Ym); // short end of the needle 
  
    line4.noFill();
    line4.stroke = "rgba(255,0,0,1)"; // red
    line4.linewidth = 3;
    line4.cap = "round";
				
	var spotm = two.makeCircle(Xm, Ym, 3, 0, Math.PI * 2);
	spotm.fill = "rgba(255,0,0,1)";
    spotm.linewidth = 1;
    spotm.stroke = "rgba(255,0,0,1)"; // red	
		
	var Xm = xc + 1.31 * clockRadius * Math.sin(hour_MD);
	var Ym = yc - 1.31 * clockRadius * Math.cos(hour_MD);
  
	var line5 = two.makeLine(xc, yc, Xm, Ym); // long end of the needle
  
    line5.noFill();
    line5.stroke = "rgba(255,0,0,1)"; // red
    line5.linewidth = 3;
    line5.cap = "round";
    
    var Xm = xc + Rm * Math.sin(hour_MD); // 0.72 * clockRadius
	var Ym = yc - Rm * Math.cos(hour_MD);
		
	var moonD = two.makeCircle(Xm, Ym, 10, 0, 2 * Math.PI);
	moonD.stroke = "rgba(41,46,53,1)"; // "rgba(41,46,53,1)"
  	moonD.linewidth = 1;
  	moonD.fill = "rgba(41,46,53,1)"; // -- moon background dark --
	 	
  	     // -- moon Visibility --
          
	if (MoonMutatis == true) {
  		var Alpha_M = 1;
  		color_M1;	 		  		  
	} else {	
  	 var V = hours_arc - hour_MD;
  		Alpha_M = Visibility(V);
   		color_M;
	}
 	
// draw the moonphase shape + rotation calculation
 	if (MoonMutatis == true) {
  
 	const Rmo = 10.55;
  	var temp = - hour_MD + hours_arc;

  	var amp_Right = Rmo * phase(temp + Math.PI, 1);
  	var amp_Left = Rmo * phase(temp, -1);

  	var Rot = hour_MD + Math.PI;

  	var Xf = Xm + Math.sin(Rot) * Rmo;
  	var Yf = Ym - Math.cos(Rot) * Rmo;

  	var path = two.makeCircle(Xf, Yf);

  let i = 0;
  
  	while (i < 2 * Math.PI) {
    	if (i <= Math.PI) {
      	var Rx = Math.sin(i) * amp_Right;
    } else {
      	var Rx = - Math.sin(i) * amp_Left;
    }

    	var Ry = Math.cos(i) * Rmo;

    	var Xg = Xm - Rx * Math.cos(Rot) + Ry * Math.sin(Rot);
    	var Yg = Ym - Rx * Math.sin(Rot) - Ry * Math.cos(Rot);

    	var path0 = two.makeLine(Xg, Yg, Xm, Ym);
    	//path0.translation.set(0, 0)
    	path0.closed = true;
    	path0.stroke = color_M;
  		path0.linewidth = 1;
  		path0.fill = color_M;

     	i = i + Math.PI / 64;
  	}		
}
	
	// Variation of the Day
	
 	if (MoonMutatis == true) {
  			var D = 0.5 + 0.5 * Visibility(hours_arc);
 	} else {
  		D = 1;	  	
}
  	
	if (MoonRings == true) { // all this should have a one second tick to animate it
	 
  	var RmL = MoonMov * Alpha_M;
		var RmB = 12;
		var Rms = 12 - 7 * D;

	    // color fill between the two rings
  		var colF = two.makeCircle(Xm, Ym, 0.5 * (RmB + Rms) + RmL, 0, 2 * Math.PI); // with size variation
  		colF.stroke = "rgba(255,255,255,0.10)"; // white
  		colF.linewidth = RmB - Rms;
  		colF.noFill();

  		// Draw outer ring
  		var outR = two.makeCircle(Xm, Ym, RmB + RmL, 0, 2 * Math.PI); // with size variation
  		outR.stroke = "rgba(255,255,255,1.0)"; // white
  		outR.linewidth = 1.5;
  		outR.noFill();

  		// Draw inner ring
  		var innR = two.makeCircle(Xm, Ym, Rms + RmL, 0, 2 * Math.PI); // with size variation
  		innR.stroke = "rgba(255,255,255,1.0)"; // white
  		innR.linewidth = 1.5;
  		innR.noFill();

	let i = 0;

  		while (i <= 11) {

			var xzz = Xm + (Rms + RmL) * Math.sin(hourAries + i * Math.PI / 6 - 2 * Velocity * R_Moon);
			var yzz = Ym - (Rms + RmL) * Math.cos(hourAries + i * Math.PI / 6 - 2 * Velocity * R_Moon);
			var Xzz = Xm + (RmB + RmL) * Math.sin(hourAries + i * Math.PI / 6 - 2 * Velocity * R_Moon);
			var Yzz = Ym - (RmB + RmL) * Math.cos(hourAries + i * Math.PI / 6 - 2 * Velocity * R_Moon);

			var Mstrokes = two.makeLine(xzz, yzz, Xzz, Yzz);
			Mstrokes.stroke = "rgba(255,255,255,1.0)"; // white
      		Mstrokes.linewidth = 1.5;
      		Mstrokes.cap = "round";
      		Mstrokes.noFill();

			i = i + 1;
  		}
	}
}
        
	
MoonNeedle();

// -- this covers the center of the blue cross and the needles, it must be last ! --
var Ringf = two.makeCircle(0, 0, 12);
Ringf.fill = "rgba(41,46,53,1)";
Ringf.linewidth = 1;
Ringf.stroke = "rgb(41,46,53,1)"; // dark cover

var Ringb = two.makeCircle(0, 0, 12);
Ringb.noFill();
Ringb.linewidth = 3;
Ringb.stroke = "rgba(0,127,255,1)"; // arch blue ring

var center = two.makeCircle(0, 0, 4); // center point
center.fill = "rgba(255,99,71,1)";
center.linewidth = 1;
center.stroke = "rgba(255,99,71,1)"; // tomato

// now it's showtime :-)
two.update();


</script>
</div>


<div style="position:relative; top: -882.5px; left: 255px;">
<?php
echo "<b><font color='#FF6347'>"."Astronomical Clock</b>"."</br>";
echo "<font color='#2E8B57'>"." Based on the Orloj in the City of Prague"."</br>";
echo "<b><font color='#007FFF'>"."-----------------------------------------------------</b>"."</br>";
echo "<font color='#FFA54F'>"."Location: ".$location."</br>";
echo "<font color='#007FFF'>"."Latitude: ".$latitude."°</br>";
echo "<font color='#007FFF'>"."Longitude: ".$longitude."°</br>";
echo "<font color='#007FFF'>"."Elevation: ".$elevation." m</br>";
echo "<font color='#FFA54F'>"."Equinox: ".$equinox."</br>";
echo "<font color='#FFA54F'>"."Solstice: ".$solstice."</br>";
echo "<font color='#FF6347'>"."Solar Time: ".$stime."</br>";
echo "<font color='white'>"."Lunar Time: ".$mtime."</br>";
echo "<font color='white'>"."Moon phase: ".$mphase." %</br>";
echo "<font color='white'>"."Hour moon: ".$hourMoon."°</br>";
echo "<font color='#FF6347'>"."Hour sun: ".$hourSun."°</br>";
echo "<font color='#FF6347'>"."Hour arc: ".$hours_arc."°</br>";
echo "<font color='#FFA54F'>"."Hour Aries: ".$hourAries."°</br>";
echo "<font color='#FFA54F'>"."lmst: ".$lmst."°</br></br>";
echo "<font color='#2E8B57'>"."Powered by Two.js"."</br>";
"</font>";
?>
</div>

</body>
</html>
