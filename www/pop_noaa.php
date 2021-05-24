<?php include('w34CombinedData.php');error_reporting(0);
$forecastime = filemtime ('inc_history.html');
?>
<link href="css/popup.<?php echo $theme; ?>.css?version=<?php echo filemtime('css/popup.' . $theme . '.css'); ?>" rel="stylesheet prefetch">

<body>
  
<div class="weather34darkbrowser" style="color: black;" url="NOAA Report for <?php echo $stationName ?>
                                         <?php echo '&nbsp;';echo "Updated &nbsp;".date( $timeFormatShort, $forecastime);?>"></div>  
 
 
<body>
<?php

 echo '<iframe width="100%" height="200%" scrolling="no" src="inc_noaa.html" style="border:none; background-color: whitesmoke;"></iframe>';
  
//echo "</span>";
  ?>


