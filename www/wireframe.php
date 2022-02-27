<?php include('settings.php');include('shared.php');date_default_timezone_set($TZ);header('Content-type: text/html; charset=utf-8');error_reporting(-1);
echo "<body style='background-color:#292E35'>";
?>


<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Wireframe</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
<!--link rel="stylesheet" href="canvas.css"-->


<style>

canvas {

  display: block;
}

</style>

<script src=""></script>
<script type="text/javascript" src="jsondata/ss.txt"></script>

<body onLoad="init();">
<canvas id="sphere3d" width="500" height="500" style="position:relative; top: -0px; left: 10px;"></canvas>

<div style="position:relative; top: 0px; left: 0px;">
<?php 
// Solar system Data
$parsed_json=json_decode((file_get_contents("jsondata/ss.json")),true);
$moon 	= $parsed_json[0]['solarsystem']['Moon'];
$sun	= $parsed_json[0]['solarsystem']['Sun'];

echo '<script>

var sphere = new Sphere3D();
var rotation = new Point3D();
var distance = 1000;
var lastX = -1;
var lastY = -1;

function Point3D() {
  this.x = 0;
  this.y = 0;
  this.z = 0;
}

function Sphere3D(radius) {
  this.vertices = new Array();
  this.radius = (typeof(radius) == "undefined" || typeof(radius) != "number") ? 20.0 : radius;
  this.rings = 16;
  this.slices = 32;
  this.numberOfVertices = 0;

  var M_PI_2 = Math.PI / 2;
  var dTheta = (Math.PI * 2) / this.slices;
  var dPhi = Math.PI / this.rings;

  // Iterate over latitudes (rings)
  for (var lat = 0; lat < this.rings + 1; ++lat) {
    var phi = M_PI_2 - lat * dPhi;
    var cosPhi = Math.cos(phi);
    var sinPhi = Math.sin(phi);

    // Iterate over longitudes (slices)
    for (var lon = 0; lon < this.slices + 1; ++lon) {
      var theta = lon * dTheta;
      var cosTheta = Math.cos(theta);
      var sinTheta = Math.sin(theta);
      p = this.vertices[this.numberOfVertices] = new Point3D();

      p.x = this.radius * cosTheta * cosPhi;
      p.y = this.radius * sinPhi;
      p.z = this.radius * sinTheta * cosPhi;
      this.numberOfVertices++;
    }
  }
}

function rotateX(point, radians) {
  var y = point.y;
  point.y = (y * Math.cos(radians)) + (point.z * Math.sin(radians) * -1.0);
  point.z = (y * Math.sin(radians)) + (point.z * Math.cos(radians));
}

function rotateY(point, radians) {
  var x = point.x;
  point.x = (x * Math.cos(radians)) + (point.z * Math.sin(radians) * -1.0);
  point.z = (x * Math.sin(radians)) + (point.z * Math.cos(radians));
}

function rotateZ(point, radians) {
  var x = point.x;
  point.x = (x * Math.cos(radians)) + (point.y * Math.sin(radians) * -1.0);
  point.y = (x * Math.sin(radians)) + (point.y * Math.cos(radians));
}

function projection(xy, z, xyOffset, zOffset, distance) {
  return ((distance * xy) / (z - zOffset)) + xyOffset;
}

function strokeSegment(index, ctx, width, height) {
  var x, y;
  var p = sphere.vertices[index];

  rotateX(p, rotation.x);
  rotateY(p, rotation.y);
  rotateZ(p, rotation.z);

  x = projection(p.x, p.z, width / 2.0, 100.0, distance);
  y = projection(p.y, p.z, height / 2.0, 100.0, distance);

  if (lastX == -1 && lastY == -1) {
    lastX = x;
    lastY = y;
    return;
  }

  if (x >= 0 && x < width && y >= 0 && y < height) {
    if (p.z < 0) {
      ctx.strokeStyle = "gray";
    } else {
      ctx.strokeStyle = "white";
    }
    ctx.beginPath();
    ctx.moveTo(lastX, lastY);
    ctx.lineTo(x, y);
    ctx.stroke();
    ctx.closePath();
    lastX = x;
    lastY = y;
  }
}

function render() {
  var canvas = document.getElementById("sphere3d");
  var width = canvas.getAttribute("width");
  var height = canvas.getAttribute("height");
  var ctx = canvas.getContext("2d");

  var p = new Point3D();
  //ctx.fillStyle = "black";

  ctx.clearRect(0, 0, width, height);
  //ctx.fillRect(0, 0, width, height);

  // draw each vertex to get the first sphere skeleton
  for (i = 0; i < sphere.numberOfVertices; i++) {
    strokeSegment(i, ctx, width, height);
  }

  // now walk through rings to draw the slices
  for (i = 0; i < sphere.slices + 1; i++) {
    for (var j = 0; j < sphere.rings + 1; j++) {
      strokeSegment(i + (j * (sphere.slices + 1)), ctx, width, height);
    }
  }

  //rotation.x += Math.PI/180.0;
  //rotation.y += Math.PI/90.0;
  //rotation.z += Math.PI/90.0;

  // set distance to 0 and enable this to get a zoom in animation
  /*if(distance < 1000) {
  	distance += 10;
    } */
}

function init() {
  // Set framerate to 30 fps
  //setInterval(render, 1000/30);
  //rotation.x = Math.PI / 10;
  render();
}


</script>'
;?>
</div>




</body>
</html>  
