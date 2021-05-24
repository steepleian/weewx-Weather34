<?php include('w34CombinedData.php');error_reporting(0);?>
<link href="css/popup.<?php echo $theme; ?>.css?version=<?php echo filemtime('css/popup.' . $theme . '.css'); ?>" rel="stylesheet prefetch">


<body>
<?php
  echo '<div class="weather34darkbrowser" url="Wind Map for '.$stationlocation.'"></div>';
  echo '<div class="roundcornerframe">';
  echo '<iframe width="100%" height="89%" scrolling="no" src="https://embed.windy.com/embed2.html?lat='.$lat.'&lon='.$lon.'&zoom=8&level=surface&overlay=wind&menu=&message=true&marker=&calendar=&pressure=&type=map&location=coordinates&detail=&detailLat='.$lat.'&detailLon='.$lon.'&metricWind='.$weather['wind_units'].'&metricTemp=%C2%B0'.$weather['temp_units'].'&metricRain='.$weather['rain_units'].'&radarRange=-1" frameborder="0"></iframe>';
  echo '</div>';
  ?>
