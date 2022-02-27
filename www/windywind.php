<?php include('w34CombinedData.php');error_reporting(0);?>
<style>body{background:rgba(30, 31, 35, 1.000);}
.weather34darkbrowser{position:relative;background:0;width:97%;height:30px;margin:auto;margin-top:-5px;margin-left:0px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px;}
.weather34darkbrowser[url]:after{content:attr(url);color:#aaa;font-size:14px;text-align: center;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;font-family:arial;height:20px;}
</style>
<link rel="stylesheet" href="weather34chartstyle.css">
</head>
<body>
<?php
  echo '<div class="weather34darkbrowser" url="Wind Map for '.$stationlocation.'"></div>';

  echo '<iframe width="100%" height="89%" scrolling="no" src="https://embed.windy.com/embed2.html?lat='.$lat.'&lon='.$lon.'&zoom=8&level=surface&overlay=wind&menu=&message=true&marker=&calendar=&pressure=&type=map&location=coordinates&detail=&detailLat='.$lat.'&detailLon='.$lon.'&metricWind='.$weather['wind_units'].'&metricTemp=%C2%B0'.$weather['temp_units'].'&metricRain='.$weather['rain_units'].'&radarRange=-1" frameborder="0"></iframe>';
  
//echo "</span>";
  ?>
