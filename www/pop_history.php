<?php include('w34CombinedData.php');error_reporting(0);?>
<link href="css/popup.<?php echo $theme; ?>.css?version=<?php echo filemtime('css/popup.' . $theme . '.css'); ?>" rel="stylesheet prefetch">

<body>
  <?php if($theme==="dark"){$text1="silver";}
else if($theme==="light"){$text1="black";}
$forecastime = filemtime ('inc_history.html');?>
<div class="weather34darkbrowser" style="color:<?php echo $text1 ?>;" url="Weather Statistics for <?php echo $stationName ?>
                                         <?php echo '&nbsp;';echo "Updated &nbsp;".date( $timeFormatShort, $forecastime);?>"></div>  
 
 
<body>
<?php

 echo '<iframe width="100%" height="350%" scrolling="no" src="inc_history.html" style="border:none; color:<?php echo $text1 ?>;"></iframe>';
  
//echo "</span>";
  ?>


