<?php include('settings.php');include('shared.php');date_default_timezone_set($TZ);header('Content-type: text/html; charset=utf-8');error_reporting(0);
echo "<body style='background-color:#292E35'>";
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Orrery</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
<link rel="stylesheet" href="orrery/orrery.css">
    <script src="orrery/two.js"></script>
</head>

<body>
 
<div id="particlemap" width="280" height="280" style="position:relative; top: 140px; left: -130px;"></div>
<div id="orrery" width="500" height="500" style="position:relative; top: -250px; left: -130px;"></div>

<?php
// Solar system Data
$parsed_json = json_decode((file_get_contents("jsondata/ss.json")),true);

$jd 		= $parsed_json[0]['solarsystem']['JulianDate'];
$jy 		= $parsed_json[0]['solarsystem']['JulianYear'];
$jday 		= $parsed_json[0]['solarsystem']['JulianDays'];
$jsec 		= $parsed_json[0]['solarsystem']['JulianSec'];
$stime 		= $parsed_json[0]['solarsystem']['SolarTime'];
$mtime 		= $parsed_json[0]['solarsystem']['LunarTime'];
$moon 		= $parsed_json[0]['solarsystem']['Moon'];
$earth 		= $parsed_json[0]['solarsystem']['Earth'];
$mercury 	= $parsed_json[0]['solarsystem']['Mercury'];
$venus 		= $parsed_json[0]['solarsystem']['Venus'];
$mars 		= $parsed_json[0]['solarsystem']['Mars'];
$jupiter 	= $parsed_json[0]['solarsystem']['Jupiter'];
$saturn 	= $parsed_json[0]['solarsystem']['Saturn'];
$uranus 	= $parsed_json[0]['solarsystem']['Uranus'];
$neptune 	= $parsed_json[0]['solarsystem']['Neptune'];
$pluto 		= $parsed_json[0]['solarsystem']['Pluto'];
$moonx 		= $moon + $earth;

echo '<script>

var canvasSize = 500;

// Create an instance of Two.js
var sky = document.getElementById("orrery");

var params = { width: canvasSize, 
			   height: canvasSize,
			   fullscreen: false,
			   type: Two.Types.canvas };
var two = new Two(params).appendTo(sky);

// Planets -- 

// mercury ----------------------------------------------- 
  
var mercuryAngle = 0 - '.$mercury.',
    distance   = 6,
    radius     = 4,
    padding    = 210,
    orbit      = 40,
    offset     = orbit + padding,
    orbits     = two.makeGroup();

function getPositions(angle, orbit) {
    return {
        x: Math.cos(angle * Math.PI / 180) * orbit,
        y: Math.sin(angle * Math.PI / 180) * orbit
    };
}

var mercuryOrbit = two.makeCircle(offset, offset, orbit);
mercuryOrbit.noFill();
mercuryOrbit.linewidth = 120;
mercuryOrbit.stroke = "#292E35";
orbits.add(mercuryOrbit);

var mercuryOrbit = two.makeCircle(offset, offset, orbit+210);
mercuryOrbit.noFill();
mercuryOrbit.linewidth = 220;
mercuryOrbit.stroke = "#292E35";
orbits.add(mercuryOrbit);

var mercuryOrbit = two.makeCircle(offset, offset, orbit);
mercuryOrbit.noFill();
mercuryOrbit.linewidth = 1;
mercuryOrbit.stroke = "#424140";
orbits.add(mercuryOrbit);
 
var pos = getPositions(mercuryAngle, orbit),
    mercury = two.makeCircle(pos.x + offset, pos.y + offset, radius);
    
var line = two.makeLine(pos.x + offset, pos.y + offset, 250,250);
line.linewidth = 1;
line.fill = "#424140";
line.stroke = "#424140";

var pos = getPositions(mercuryAngle, orbit),
    mercury = two.makeCircle(pos.x + offset, pos.y + offset, radius);
 
mercury.stroke = "#F618CC";
mercury.linewidth = 1;
mercury.fill = "#F618CC";

// venus -----------------------------------------------------------

var venusAngle = 0 - '.$venus.',
    distance   = 6,
    radius     = 4,
    padding    = 190,
    orbit      = 60,
    offset     = orbit + padding,
    orbits     = two.makeGroup();

function getPositions(angle, orbit) {
    return {
        x: Math.cos(angle * Math.PI / 180) * orbit,
        y: Math.sin(angle * Math.PI / 180) * orbit
    };
}

var venusOrbit = two.makeCircle(offset, offset, orbit);
venusOrbit.noFill();
venusOrbit.linewidth = 1;
venusOrbit.stroke = "#424140";
orbits.add(venusOrbit);
 
var pos = getPositions(venusAngle, orbit),
    venus = two.makeCircle(pos.x + offset, pos.y + offset, radius);
    
var line = two.makeLine(pos.x + offset, pos.y + offset, 250,250);
line.linewidth = 1;
line.fill = "#424140";
line.stroke = "#424140";

var pos = getPositions(venusAngle, orbit),
    venus = two.makeCircle(pos.x + offset, pos.y + offset, radius);
 
venus.stroke = "#2E8B57";
venus.linewidth = 1;
venus.fill = "#2E8B57";

// mars -----------------------------------------------------------

var marsAngle = 0 - '.$mars.',
    distance   = 6,
    radius     = 4,
    padding    = 150,
    orbit      = 100,
    offset     = orbit + padding,
    orbits     = two.makeGroup();

function getPositions(angle, orbit) {
    return {
        x: Math.cos(angle * Math.PI / 180) * orbit,
        y: Math.sin(angle * Math.PI / 180) * orbit
    };
}

var marsOrbit = two.makeCircle(offset, offset, orbit);
marsOrbit.noFill();
mercuryOrbit.linewidth = 1;
marsOrbit.stroke = "#424140";
orbits.add(marsOrbit);
 
var pos = getPositions(marsAngle, orbit),
    mars = two.makeCircle(pos.x + offset, pos.y + offset, radius);
    
var line = two.makeLine(pos.x + offset, pos.y + offset, 250,250);
line.linewidth = 1;
line.fill = "#424140";
line.stroke = "#424140";    

var pos = getPositions(marsAngle, orbit),
    mars = two.makeCircle(pos.x + offset, pos.y + offset, radius);
 
mars.stroke = "#FF0000";
mars.linewidth = 1;
mars.fill = "#FF0000";

// jupiter --------------------------------------------------------

var jupiterAngle = 0 - '.$jupiter.',
    distance   = 6,
    radius     = 10,
    padding    = 110,
    orbit      = 140,
    offset     = orbit + padding,
    orbits     = two.makeGroup();

function getPositions(angle, orbit) {
    return {
        x: Math.cos(angle * Math.PI / 180) * orbit,
        y: Math.sin(angle * Math.PI / 180) * orbit
    };
}

var jupiterOrbit = two.makeCircle(offset, offset, orbit);
jupiterOrbit.noFill();
jupiterOrbit.linewidth = 1;
jupiterOrbit.stroke = "#424140";
orbits.add(jupiterOrbit);
 
var pos = getPositions(jupiterAngle, orbit),
    jupiter = two.makeCircle(pos.x + offset, pos.y + offset, radius);
    
var line = two.makeLine(pos.x + offset, pos.y + offset, 250,250);
line.linewidth = 1;
line.fill = "#424140";
line.stroke = "#424140";

var pos = getPositions(jupiterAngle, orbit),
    jupiter = two.makeCircle(pos.x + offset, pos.y + offset, radius);
 
jupiter.stroke = "#BE688B";
jupiter.linewidth = 1;
jupiter.fill = "#BE688B";

// saturn --------------------------------------------------------

var saturnAngle = 0 - '.$saturn.',
    distance   = 6,
    radius     = 6.5,
    padding    = 90,
    orbit      = 160,
    offset     = orbit + padding,
    orbits     = two.makeGroup();

function getPositions(angle, orbit) {
    return {
        x: Math.cos(angle * Math.PI / 180) * orbit,
        y: Math.sin(angle * Math.PI / 180) * orbit
    };
}

var saturnOrbit = two.makeCircle(offset, offset, orbit);
saturnOrbit.noFill();
saturnOrbit.linewidth = 1;
saturnOrbit.stroke = "#424140";
orbits.add(saturnOrbit);
 
var pos = getPositions(saturnAngle, orbit),
    saturn = two.makeCircle(pos.x + offset, pos.y + offset, radius);
    
var line = two.makeLine(pos.x + offset, pos.y + offset, 250,250);
line.stroke = "#424140";
line.linewidth = 1;
line.fill = "#424140";
  
var pos = getPositions(saturnAngle, orbit),
    saturn = two.makeCircle(pos.x + offset, pos.y + offset, radius);
 
saturn.stroke = "#FFA54F";
saturn.linewidth = 1;
saturn.fill = "#FFA54F";

var saturnRing = two.makeCircle(saturn.translation.x, saturn.translation.y, radius + 0 + distance);
saturnRing.noFill();
saturnRing.linewidth = 5;
saturnRing.stroke = "#FFA54F";


var saturnRing = two.makeCircle(saturn.translation.x, saturn.translation.y, radius + 5 + distance);
saturnRing.noFill();
saturnRing.linewidth = 1.5;
saturnRing.stroke = "#FFA54F";

// uranus ----------------------------------------------------------
 
var uranusAngle = 0 - '.$uranus.',
    distance   = 6,
    radius     = 6,
    padding    = 70,
    orbit      = 180,
    offset     = orbit + padding,
    orbits     = two.makeGroup();

function getPositions(angle, orbit) {
    return {
        x: Math.cos(angle * Math.PI / 180) * orbit,
        y: Math.sin(angle * Math.PI / 180) * orbit
    };
}

var uranusOrbit = two.makeCircle(offset, offset, orbit);
uranusOrbit.noFill();
uranusOrbit.linewidth = 1;
uranusOrbit.stroke = "#424140";
orbits.add(uranusOrbit);
 
var pos = getPositions(uranusAngle, orbit),
    uranus = two.makeCircle(pos.x + offset, pos.y + offset, radius);
    
var line = two.makeLine(pos.x + offset, pos.y + offset, 250,250);
line.linewidth = 1;
line.fill = "#424140";
line.stroke = "#424140";
   
var pos = getPositions(uranusAngle, orbit),
    uranus = two.makeCircle(pos.x + offset, pos.y + offset, radius);
 
uranus.stroke = "#F67F40";
uranus.linewidth = 1;
uranus.fill = "#F67F40";

// neptune ------------------------------------------------------

var neptuneAngle = 0 - '.$neptune.',
    distance   = 6,
    radius     = 6,
    padding    = 50,
    orbit      = 200,
    offset     = orbit + padding,
    orbits     = two.makeGroup();

function getPositions(angle, orbit) {
    return {
        x: Math.cos(angle * Math.PI / 180) * orbit,
        y: Math.sin(angle * Math.PI / 180) * orbit
    };
}

var neptuneOrbit = two.makeCircle(offset, offset, orbit);
neptuneOrbit.noFill();
neptuneOrbit.linewidth = 1;
neptuneOrbit.stroke = "#424140";
orbits.add(neptuneOrbit);
 
var pos = getPositions(neptuneAngle, orbit),
    neptune = two.makeCircle(pos.x + offset, pos.y + offset, radius);
    
var line = two.makeLine(pos.x + offset, pos.y + offset, 250,250);
line.linewidth = 1;
line.fill = "#424140";
line.stroke = "#424140";    

var pos = getPositions(neptuneAngle, orbit),
    neptune = two.makeCircle(pos.x + offset, pos.y + offset, radius);
 
neptune.stroke = "#5FC6C6";
neptune.linewidth = 1;
neptune.fill = "#5FC6C6";

// pluto --------------------------------------------------------------

var plutoAngle = 0 - '.$pluto.',
    distance   = 6,
    radius     = 3,
    padding    = 30,
    orbit      = 220,
    offset     = orbit + padding,
    orbits     = two.makeGroup();

function getPositions(angle, orbit) {
    return {
        x: Math.cos(angle * Math.PI / 180) * orbit,
        y: Math.sin(angle * Math.PI / 180) * orbit
    };
}

var plutoOrbit = two.makeCircle(offset, offset, orbit);
plutoOrbit.noFill();
plutoOrbit.linewidth = 1;
plutoOrbit.stroke = "#424140";
orbits.add(plutoOrbit);
 
var pos = getPositions(plutoAngle, orbit),
    pluto = two.makeCircle(pos.x + offset, pos.y + offset, radius);
    
var line = two.makeLine(pos.x + offset, pos.y + offset, 250,250);
line.linewidth = 1;
line.fill = "#424140";
line.stroke = "#424140";   
    
var pos = getPositions(plutoAngle, orbit),
    pluto = two.makeCircle(pos.x + offset, pos.y + offset, radius);
       
pluto.stroke = "#B6F131";
pluto.linewidth = 1;
pluto.fill = "#B6F131";

// earth + moon -----------------------------------------------------

var earthAngle = 0 - '.$earth.',
    moonAngle  = 0 - '.$moonx.',
    distance   = 6,
    radius     = 5.5,
    padding    = 170,
    orbit      = 80,
    offset     = orbit + padding,
    orbits     = two.makeGroup();

function getPositions(angle, orbit) {
    return {
        x: Math.cos(angle * Math.PI / 180) * orbit,
        y: Math.sin(angle * Math.PI / 180) * orbit
    };
}

var earthOrbit = two.makeCircle(offset, offset, orbit);
earthOrbit.noFill();
earthOrbit.linewidth = 1;
earthOrbit.stroke = "#424140";
orbits.add(earthOrbit);
 
var pos = getPositions(earthAngle, orbit),
    earth = two.makeCircle(pos.x + offset, pos.y + offset, radius);
    
var line = two.makeLine(pos.x + offset, pos.y + offset, 250,250);
line.linewidth = 1;
line.fill = "#424140";
line.stroke = "#424140";

var pos = getPositions(moonAngle, radius + distance), 
    moon = two.makeCircle(earth.translation.x + pos.x, earth.translation.y + pos.y, radius / 4);
   
var line = two.makeLine(earth.translation.x + pos.x, earth.translation.y + pos.y, earth.translation.x, earth.translation.y );
line.linewidth = 1;
line.fill = "#424140";
line.stroke = "#424140";

var pos = getPositions(earthAngle, orbit),
    earth = two.makeCircle(pos.x + offset, pos.y + offset, radius);
 
earth.stroke = "#007FFF";
earth.linewidth = 1;
earth.fill = "#007FFF";

var moonOrbit = two.makeCircle(earth.translation.x, earth.translation.y, radius + distance);
moonOrbit.noFill();
moonOrbit.linewidth = 1;
moonOrbit.stroke = "#424140";
orbits.add(earthOrbit);
 
var pos = getPositions(moonAngle, radius + distance), 
    moon = two.makeCircle(earth.translation.x + pos.x, earth.translation.y + pos.y, radius / 4);
 
moon.stroke = "white";
moon.linewidth = 1;
moon.fill = "white";

// sun -------------------------------------------------------

var sunAngle = 200,
    distance   = 6,
    radius     = 22,
    padding    = 250,
    orbit      = 1,
    offset     = orbit + padding,
    orbits     = two.makeGroup();

function getPositions(angle, orbit) {
    return {
        x: Math.cos(angle * Math.PI / 180) * orbit,
        y: Math.sin(angle * Math.PI / 180) * orbit
    };
}

var sunOrbit = two.makeCircle(offset, offset, orbit);
sunOrbit.noFill();
sunOrbit.linewidth = 0;
sunOrbit.stroke = "#424140";
orbits.add(sunOrbit);

/* 
var pos = getPositions(sunAngle, orbit),
    sun = two.makeCircle(pos.x + offset, pos.y + offset, radius);
 
sun.stroke = "#FF6347";
sun.linewidth = 1;
sun.fill = "#FF6347";
*/

orbits.visible = true;
 
 // showtime :-)
two.update();

/*
// Sun animation
var circle = two.makeCircle(0, 0, 18);
circle.fill = "#F67F40";
circle.fill = "#F67F40";

var circle2 = two.makeCircle(0, 0, 11);
circle2.stroke = "#FF6347";
circle2.fill = "#FF6347";

var circle3 = two.makeCircle(0, 0, 5);
circle3.stroke = "#FF0000";
circle3.fill = "#FF0000";
 

var group = two.makeGroup(circle, circle2, circle3);
group.translation.set(pos.x + offset, pos.y + offset);
group.scale = 0;
group.noStroke();

two.bind("update", function(frameCount) {

  if (group.scale > 0.9999) {
    group.scale = group.rotation = 0;
  }
  var t = (1.01 - group.scale) * 0.125;
  group.scale += t;
  group.rotation += t * 4 * Math.PI;
});
two.play();
*/

</script>'

;?>
</div>

<script>

// wall size
var canvasSize = 280;

// How many Particles 
var Particles = 3000;

// Create an instance of Two.js
var sky = document.getElementById("particlemap");

var params = { width: canvasSize, 
			   height: canvasSize,
			   fullscreen: false,
			   type: Two.Types.canvas };
var two = new Two(params).appendTo(sky);

// asteroid belt particle map ----------------------------

var outerRadius = 128;
var innerRadius = 112;
var xc = two.width/2;
var yc = two.height/2; 

// Determine if anything is outside of the canvas
function isOutside(x1, y1) {
  return x1 < 0 || x1 > two.width || y1 < 0 || y1 > two.height;
}

// Is the point inside of an invisible set of two circles ?
function insideRing(x1, y1) {
  return (Math.pow(x1 - xc, 2) + Math.pow(y1 - yc, 2) < Math.pow(outerRadius, 2)) && (Math.pow(x1 - xc, 2) + Math.pow(y1 - yc, 2) > Math.pow(innerRadius, 2));
}

// Return a random integer between min and max, inclusive
function randBetween(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

// Input: an integer between 1 and 4, corresponding to the 4 out-of-bounds areas
// Output: a (constrained) random point out-of-bounds of the box

// This is where the circles will originate
function genCoords(region) {
  if (region == 1) { // West
    return [-10, randBetween(two.height * .2, two.height * .8)];
  } else if (region == 2) { // North
    return [randBetween(two.width * .2, two.width * .8), -10]
  } else if (region == 3) { // East
    return [two.width + 10, randBetween(two.height * .2, two.height * .8)];
  } else { // South
    return [randBetween(two.width * .2, two.width * .8), two.height + 10];
  }
}

// Input the region used to generate the starting coords
// Output the return of genCoords for some region besides that one

// This will be where the circles will be moving to
function genTarget(region) {
  let regions = [1, 2, 3, 4];
  regions.splice(region - 1, 1);
  return genCoords(regions[randBetween(0, 2)]);
}

// Circle constructor
function Circ() {

  // Determine the circles origin and destination
  
  this.makeCoords = () => {
    this.region = randBetween(1, 4);
    this.coords = genCoords(this.region);
    this.targetCoords = genTarget(this.region);
    this.x = this.coords[0];
    this.y = this.coords[1];
    this.target = {
      x: this.targetCoords[0],
      y: this.targetCoords[1]
    };
  }

  // Make it pretty
  this.colorize = () => {
    this.c.fill = randBetween(1, 2) == 1 ? "white" : "rgb("+randBetween(150, 255)+","+0+","+randBetween(150, 255)+")";
  }

  // Create it!
  this.setup = () => {
  
    // Create it somewhere!
    this.makeCoords();
    // Make the circle svg! (It has eight vertices!!!) Third param = radius.
    this.c = two.makeCircle(this.x, this.y, 0.5);
    this.c.noStroke();
    
    // Make it pretty!
    this.colorize();
    this.vel = .0025;
    
    // This will be used later to determine whether to remove it
    this.beenInside = false;
  }

  this.setup();

  this.realign = () => {
    this.makeCoords();
    this.c.translation.set(this.x, this.y);
    this.colorize();
    this.beenInside = false;
  }
}

// Array for use in the animation bits
var circs = [];

// Add a bunch of circles
for (var i = 0; i<= Particles; i++) {
  circs.push(new Circ());
}

two.bind("update", function(frameCount, timeDelta) {
  var ct = circs.length;

  // Speed 
  for (var i = 0, l = circs.length; i < l; i++) {
    let cir = circs[i];
    if (insideRing(cir.c.translation.x, cir.c.translation.y)) {
      cir.insideRing = true;
      cir.oldVel = cir.vel;
      cir.vel = .0005;
    } else {
      cir.insideRing = false;
      cir.vel = .005;
    }
  }
    
  for (var i = 0, l = circs.length; i < l; i++) {
  
    // Move each circle a bit to the left/right and up/down
    
    let cir = circs[i];
    let xDelt = cir.vel * (cir.target.x - cir.x);
    let yDelt = cir.vel * (cir.target.y - cir.y);

    xDelt += (randBetween(-5, 5) / 50);
    yDelt += (randBetween(-5, 5) / 50);

    cir.c.translation.set(cir.c.translation.x + xDelt,  cir.c.translation.y + yDelt);
  }    
 
  for (var i = 0, l = circs.length; i < l; i++) {
  
    // If the circle has not been inside and currently is inside,
    // Mark it as having been inside
     
    let cir = circs[i]; 
    if (!cir.beenInside && isOutside(cir.c.translation.x, cir.c.translation.y) == false) {
      cir.beenInside = true;
    }
  }
  // If the circle has been inside and no longer is...
  for (var i = 0, l = circs.length; i < l; i++) {
    let cir = circs[i];
    if (cir.beenInside && isOutside(cir.c.translation.x, cir.c.translation.y)) {
    
      // ... move the circle to a new starting position.
      cir.realign();
    }
  }
 // showtime :-) 
});
two.play();

</script>
 <svg height="50" width="50" style="position:relative; top: -524.5px; left: -130px;">
  <defs>
    <filter id="distortionFilter">
      <feTurbulence id="turbolence" type="fractalNoise" baseFrequency="5" numOctaves="10" seed="10" stitchTiles="noStitch" x="0%" y="0%" width="100%" height="100%" result="noise"></feTurbulence>
      <feDisplacementMap in="SourceGraphic" in2="noise" scale="20" xChannelSelector="R" yChannelSelector="B" x="0%" y="0%" width="100%" height="100%" filterUnits="userSpaceOnUse"></feDisplacementMap>
      <animate xlink:href="#turbolence" attributeName="baseFrequency" dur="20s" keyTimes="0;0.5;1" values="5;5.1;5;" repeatCount="indefinite"></animate>
    </filter>
  </defs>
  <circle cx="25" cy="25" r="20" fill="#FF6347" stroke="none" filter="url(#distortionFilter)"></circle>
</svg>

<div style="position:relative; top: -720px; left: 250px;">
<?php
echo "<b><font color='#FF6347'>"."Orrery</b>"."<font color='#2E8B57'>"." Kepler's Equation of Time"."</br>";
echo "<b><font color='#007FFF'>"."---------------------------------------------</b>"."</br>";
echo "<font color='#FFA54F'>"."UT - Julian Date ".$jd."</br>";
echo "<font color='#FFA54F'>"."UT - Years - J2000.o ".$jy."</br>";
echo "<font color='#FFA54F'>"."UT - Days - J2000.o ".$jday."</br>";
echo "<font color='#FFA54F'>"."UT - /s - J2000.o ".round($jsec)."</br>";
echo "<font color='#FF6347'>"."Solar Time: ".$stime."</br>";
echo "<font color='white'>"."Lunar Time: ".$mtime."</br>";
echo "<font color='white'>"."Moon: ".$moon."°</br>";
echo "<font color='#007FFF'>"."Earth: ".$earth."°</br>";
echo "<font color='#F618CC'>"."Mercury: ".$mercury."°</br>";
echo "<font color='#2E8B57'>"."Venus: ".$venus."°</br>";
echo "<font color='#FF0000'>"."Mars: ".$mars."°</br>";
echo "<font color='#BE688B'>"."Jupiter: ".$jupiter."°</br>";
echo "<font color='#FFA54F'>"."Saturn: ".$saturn."°</br>";
echo "<font color='#F67F40'>"."Uranus: ".$uranus."°</br>";
echo "<font color='#5FC6C6'>"."Neptune: ".$neptune."°</br>";
echo "<font color='#B6F131'>"."Pluto: ".$pluto."°</br></br>";
echo "<font color='#2E8B57'>"."Powered by Two.js"."</br>";
"</font>";
?>
</div>

</body>
</html>
