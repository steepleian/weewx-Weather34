<?php
//###################################################################################################################
//	weewx-Weather34 Template maintained by Ian Millard (Steepleian)                                 				#
//	                                                                                                				#
//  Contains original legacy code (by agreement) created and developed by Brian Underdown (https://weather34.com)   #
//  for the (now superseeded) original Weather34 Template which is no longer maintained by its creator              #
//  © weather34.com original CSS/SVG/PHP 2015-2019                                                                  #
// 	                                                                                                				#
//  Contains original code by Ian Millard and collaborators															#
//  © claydonsweather.org.uk original CSS/SVG/PHP 2020-2021                                                         #
// 	                                                                                                				#
// 	Issues for weewx-Weather34 template should be addressed to https://github.com/steepleian/weewx-Weather34/issues #                                                                                              #
// 	                                                                                                				#
//###################################################################################################################
include "w34CombinedData.php";
include "settings1.php";
if ($theme === "dark") {
    echo '<style>@font-face{font-family:weathertext2;src:url(css/fonts/verbatim-regular.woff) format("woff"),url(fonts/verbatim-regular.woff2) format("woff2"),url(fonts/verbatim-regular.ttf) format("truetype")}html,body{font-size:13px;font-family:"weathertext2",Helvetica,Arial,sans-serif;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}a:link{color:#fff}a:visited{color:#fff}a:hover{color:#fff}a:active{color:#fff}.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));grid-gap:5px;align-items:stretch;color:#f5f7fc;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid>article{border:1px solid #212428;box-shadow:2px 2px 6px 0 rgba(0,0,0,.3);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid1{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:5px;color:#fff}.grid1>articlegraph{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:0;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;height:325px}.weather34darkbrowser{color:#000;position:relative;background:0;width:97%;height:30px;margin:auto;margin-top:-5px;margin-left:0;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px;color:#000}.weather34darkbrowser[url]:after{content:attr(url);color:#fff;font-size:14px;text-align:center;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;font-family:arial;height:20px}blue{color:#01a4b4}orange{color:#009bb4}orange1{position:relative;color:#009bb4;margin:0 auto;text-align:center;margin-left:5%;font-size:1.1rem}green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#cc0}purple{color:#916392}.temperaturecontainer1{position:relative;left:0;margin-top:0}.temperaturecontainer2{position:relative;left:0;margin-top:0}.temperaturetoday0,.temperaturetoday10,.temperaturetoday18,.temperaturetoday24,.temperaturetoday30{font-family:weathertext2,Arial,Helvetica,system;width:5rem;height:1.5rem;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;display:flex;font-size:.9rem;padding-top:2px;color:#fff;border-bottom:5px solid #555;align-items:center;justify-content:center;border-radius:3px;margin-bottom:10px}.temperaturecaution,.temperaturetrend,.temperaturetrend1{position:absolute;font-size:1rem}.temperaturetoday0{background:rgba(68,166,181,1)}.temperaturetoday10{background:rgba(144,177,42,1)}.temperaturetoday18{background:rgba(230,161,65,1)}.temperaturetoday24{background:rgba(255,124,57,1)}.temperaturetoday30{background:rgba(211,93,78,1)}.temperaturetrend{margin-left:67px;margin-top:-38px;z-index:1;color:#fff;font-size:.65rem;width:70px;text-align:center}.temperaturetrend1{margin-left:67px;margin-top:-38px;z-index:1;color:#fff;font-size:.65rem;width:70px;text-align:center}smalluvunit{font-size:.65rem;font-family:Arial,Helvetica,system}.w34convertrain{position:relative;font-size:.5em;top:10px;color:silver;margin-left:5px}.hitempy{position:relative;background:rgba(61,64,66,.5);color:#aaa;width:40px;padding:1px;-webit-border-radius:2px;border-radius:2px;margin-top:-40px;margin-left:130px;padding-left:3px;line-height:11px;font-size:8px}.actualt{position:relative;left:0;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:#555;padding:5px;font-family:Arial,Helvetica,sans-serif;width:max-content;height:.8em;font-size:.8rem;padding-top:2px;color:#fff;align-items:center;justify-content:center;margin-bottom:10px;top:0;text-align:center} 
    </style>';
} elseif ($theme === "light") {
    echo '<style>@font-face{font-family:weathertext2;src:url(css/fonts/verbatim-regular.woff) format("woff"),url(fonts/verbatim-regular.woff2) format("woff2"),url(fonts/verbatim-regular.ttf) format("truetype")}html,body{font-size:13px;font-family:"weathertext2",Helvetica,Arial,sans-serif;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;background-color:#fff}a:link{color:#000}a:visited{color:#000}a:hover{color:#000}a:active{color:#000}.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));grid-gap:5px;align-items:stretch;color:#f5f7fc;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid>article{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid1{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:5px;color:#000}.grid1>articlegraph{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:0;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;height:325px}.weather34darkbrowser{color:#000;position:relative;background:0;width:97%;height:30px;margin:auto;margin-top:-5px;margin-left:0;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px;color:#000}.weather34darkbrowser[url]:after{content:attr(url);color:#000;font-size:14px;text-align:center;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;font-family:arial;height:20px}blue{color:#01a4b4}orange{color:#009bb4}orange1{position:relative;color:#009bb4;margin:0 auto;text-align:center;margin-left:5%;font-size:1.1rem}green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#cc0}purple{color:#916392}.temperaturecontainer1{position:relative;left:0;margin-top:0}.temperaturecontainer2{position:relative;left:0;margin-top:0}.temperaturetoday0,.temperaturetoday10,.temperaturetoday18,.temperaturetoday24,.temperaturetoday30{font-family:weathertext2,Arial,Helvetica,system;width:5rem;height:1.5rem;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;display:flex;font-size:.9rem;padding-top:2px;color:#fff;border-bottom:5px solid #555;align-items:center;justify-content:center;border-radius:3px;margin-bottom:10px}.temperaturecaution,.temperaturetrend,.temperaturetrend1{position:absolute;font-size:1rem}.temperaturetoday0{background:rgba(68,166,181,1)}.temperaturetoday10{background:rgba(144,177,42,1)}.temperaturetoday18{background:rgba(230,161,65,1)}.temperaturetoday24{background:rgba(255,124,57,1)}.temperaturetoday30{background:rgba(211,93,78,1)}.temperaturetrend{margin-left:67px;margin-top:-38px;z-index:1;color:#000;font-size:.65rem;width:70px;text-align:center}.temperaturetrend1{margin-left:67px;margin-top:-38px;z-index:1;color:#000;font-size:.65rem;width:70px;text-align:center}smalluvunit{font-size:.65rem;font-family:Arial,Helvetica,system}.w34convertrain{position:relative;font-size:.5em;top:10px;color:silver;margin-left:5px}.hitempy{position:relative;background:rgba(61,64,66,.5);color:#aaa;width:40px;padding:1px;-webit-border-radius:2px;border-radius:2px;margin-top:-40px;margin-left:130px;padding-left:3px;line-height:11px;font-size:8px}.actualt{position:relative;left:0;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:#555;padding:5px;font-family:Arial,Helvetica,sans-serif;width:max-content;height:.8em;font-size:.8rem;padding-top:2px;color:#fff;align-items:center;justify-content:center;margin-bottom:10px;top:0;text-align:center} 
    </style>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 Barometer Almanac Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/baromalmanac.<?php echo $theme; ?>.css?version=<?php echo filemtime(
    "css/baromalmanac." . $theme . ".css"
); ?>" rel="stylesheet prefetch">


<?php
if ($barom["units"]==="kPa"){$barom["barometer"]=$barom["barometer"]*0.1;
                                        $barom["trend"]=$barom["trend"]*0.1;
                                        $barom["min"]=$barom["min"]*0.1;
                                        $barom["max"]=$barom["max"]*0.1;
                                        $barom["yesterday_max"]=$barom["yesterday_max"]*0.1;
                                        $barom["yesterday_min"]=$barom["yesterday_min"]*0.1;
                                        $barom["month_max"]=$barom["month_max"]*0.1;
                                        $barom["month_min"]=$barom["month_min"]*0.1;
                                        $barom["year_max"]=$barom["year_max"]*0.1;
                                        $barom["year_min"]=$barom["year_min"]*0.1;
                                        $barom["alltime_max"]=$barom["alltime_max"]*0.1;
                                        $barom["alltime_min"]=$barom["alltime_min"]*0.1;
}
                                        
?>
<main class="grid">
  <article>
   <div class=actualt>&nbsp;Barometer Today </div>
   <div class="temperaturecontainer1">

			  <?php
     ////pressure max today
     if ($barom["month_max"] >= 0) {
         echo "<div class='temperaturetoday24'>",
             $barom["max"] . "</value>";
     }
     echo "<smalluvunit>" . $barom["units"] . "</smalluvunit>";
     ?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Max</b></span><br><?php echo $barom[
        "maxtime"
    ]; ?></span></div>
	</div>
<div class="temperaturecontainer2">
 <?php
 //pressure min today
 if ($barom["min"] >= 0) {
     echo "<div class='temperaturetoday0'>",
         $barom["min"] . "</value>";
 }

 echo "<smalluvunit>" . $barom["units"] . "</smalluvunit>";
 ?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Min</b></span><br><?php echo $barom[
    "mintime"
]; ?></span></div>
</article>

 <article>
   <div class=actualt>&nbsp;Barometer Yesterday </div>
   <div class="temperaturecontainer1">

			  <?php
     ////pressure max yesterday
     if ($barom["yesterday_max"] >= 0) {
         echo "<div class='temperaturetoday24'>",
             $barom["yesterday_max"] . "</value>";
     }
     echo "<smalluvunit>" . $barom["units"] . "</smalluvunit>";
     ?> </div>

    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Max</b></span><br> <?php echo $barom[
        "yesterday_maxtime"
    ]; ?></span></div>
			</div>


<div class="temperaturecontainer2">
 <?php
 //pressure min yesterday
 if ($barom["yesterday_min"] >= 0) {
     echo "<div class='temperaturetoday0'>",
         $barom["yesterday_min"] . "</value>";
 }

 echo "<smalluvunit>" . $barom["units"] . "</smalluvunit>";
 ?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Min</b></span><br> <?php echo $barom[
    "yesterday_mintime"
]; ?></span></div>

</article>



  <article>
  <div class=actualt>&nbsp;Barometer <?php echo date("F Y"); ?> </div>
   <div class="temperaturecontainer1">
  <?php
  ////pressure max month
  if ($barom["month_max"] >= 0) {
      echo "<div class='temperaturetoday24'>",
          $barom["month_max"] . "</value>";
  }
  echo "<smalluvunit>" . $barom["units"] . "</smalluvunit>";
  ?> </div>
    <div class="temperaturetrend"><span style='color:rgba(255, 124, 57, 1.000)'><b>Max</b></span><br> <?php echo $barom[
        "month_maxtime"
    ]; ?></span>
    </div>
	</div>
<div class="temperaturecontainer2">
   <?php
   //pressure min month
   if ($barom["month_min"] >= 0) {
       echo "<div class='temperaturetoday0'>",
           $barom["month_min"] . "</value>";
   }
   echo "<smalluvunit>" . $barom["units"] . "</smalluvunit>";
   ?>  </div>
<div class="temperaturetrend"><span style='color:rgba(68, 166, 181, 1.000)'><b>Min</b></span><br> <?php echo $barom[
    "month_mintime"
]; ?></span>
</div>	</div>
</article>


   <article>
   <div class=actualt>&nbsp;Barometer <?php echo date("Y"); ?> </div>
   <div class="temperaturecontainer1">

			  <?php
     ////pressure max year
     if ($barom["year_max"] >= 0) {
         echo "<div class='temperaturetoday24'>",
             $barom["year_max"] . "</value>";
     }
     echo "<smalluvunit>" . $barom["units"] . "</smalluvunit>";
     ?> </div>

    <div class="temperaturetrend1"><span style='color:rgba(255, 124, 57, 1.000)'><b>Max</b></span><br> <?php echo $barom[
        "year_maxtime"
    ]; ?></span></div>
			</div>


<div class="temperaturecontainer2">
 <?php
 //pressure min year
 if ($barom["year_min"] >= 0) {
     echo "<div class='temperaturetoday0'>",
         $barom["year_min"] . "</value>";
 }

 echo "<smalluvunit>" . $barom["units"] . "</smalluvunit>";
 ?>  </div>
<div class="temperaturetrend1"><span style='color:rgba(68, 166, 181, 1.000)'><b>Min</b></span><br> <?php echo $barom[
    "year_mintime"
]; ?></span></div>

</article>


<article>
   <div class=actualt>&nbsp;Barometer All-Time </div>
   <div class="temperaturecontainer1">

			  <?php
     ////pressure max year
     if ($barom["alltime_max"] >= 0) {
         echo "<div class='temperaturetoday24'>",
             $barom["alltime_max"] . "</value>";
     }
     echo "<smalluvunit>" . $barom["units"] . "</smalluvunit>";
     ?> </div>

    <div class="temperaturetrend1"><span style='color:rgba(255, 124, 57, 1.000)'><b>Max</b></span><br><?php echo $barom[
        "alltime_maxtime"
    ]; ?></span></div>
			</div>


<div class="temperaturecontainer2">
 <?php
 //pressure min year
 if ($barom["alltime_min"] >= 0) {
     echo "<div class='temperaturetoday0'>",
         $barom["alltime_min"] . "</value>";
 }

 echo "<smalluvunit>" . $barom["units"] . "</smalluvunit>";
 ?>  </div>
<div class="temperaturetrend1"><span style='color:rgba(68, 166, 181, 1.000)'><b>Min</b></span><br><?php echo $barom[
    "alltime_mintime"
]; ?></span></div>

</article>   
  </main>
  <main class="grid1">
  <articlegraph> 
  <!--<div class=actualt><?php echo date("Y"); ?> Barometer Chart</div>  //-->
  <iframe  src="w34highcharts/<?php echo $theme1; ?>-charts.html?chart='barsmallplot'&span='yearly'&temp='<?php echo $weather[
    "temp_units"
]; ?>'&pressure='<?php echo $weather[
    "units"
]; ?>'&wind='<?php echo $barom["wind_units"]; ?>'&rain='<?php echo $weather[
    "rain_units"
]; ?>" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>
   
  </articlegraph> 
  
  <articlegraph style="height:30px">  
  <div class="lotemp">
  <?php echo $info; ?> 
<a href="https://highcharts.com" title="https://highcharts.com" target="_blank" style="font-size:8px;"> Charts rendered and compiled using Highcharts </a></span>
  </div>   
    
  <div class="lotemp">
  <?php echo $info; ?> Adapted by Steepleian for the WeeWX Weather34 skin from the original CSS/SVG/PHP scripts by weather34.com &copy; 2015-<?php echo date(
     "Y"
 ); ?>
  </a></div>
   
  </articlegraph> 
  
</main>
  
   </main>
