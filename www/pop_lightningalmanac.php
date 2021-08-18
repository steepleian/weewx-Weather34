<?php
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include('w34CombinedData.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weather34 Strikes Almanac Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@font-face {
    font-family: weathertext2;
    src: url(css/fonts/verbatim-regular.woff) format("woff"), url(fonts/verbatim-regular.woff2) format("woff2"), url(fonts/verbatim-regular.ttf) format("truetype")
}

html,
body {
    font-size: 13px;
    font-family: "weathertext2", Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(140px, 2fr));
    grid-gap: 5px;
    align-items: stretch;
    color: #f5f7fc;

}

.grid>article {
    border: 1px solid rgba(245, 247, 252, .02);
    box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.6);
    padding: 5px;
    font-size: 0.8em;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    background: 0;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.grid1 {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(100%, 1fr));
    grid-gap: 5px;
    align-items: stretch;
    color: #f5f7fc;
    margin-top: 5px
}

.grid1>articlegraph {
    border: 1px solid rgba(245, 247, 252, .02);
    box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.6);
    padding: 5px;
    font-size: 0.8em;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    background: 0;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    height: 260px
}

.weather34chart-btn.close:after,
.weather34chart-btn.close:before {
    color: #ccc;
    position: absolute;
    font-size: 14px;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: 500
}

.weather34browser-header {
    flex-basis: auto;
    height: 35px;
    background: #ebebeb;
    background: 0;
    border-bottom: 0;
    display: flex;
    margin-top: -20px;
    width: 100%;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px
}

.weather34browser-footer {
    flex-basis: auto;
    height: 35px;
    background: #ebebeb;
    background: rgba(56, 56, 60, 1);
    border-bottom: 0;
    display: flex;
    bottom: -20px;
    width: 97.4%;
    -webkit-border-bottom-right-radius: 5px;
    -webkit-border-bottom-left-radius: 5px;
    -moz-border-radius-bottomright: 5px;
    -moz-border-radius-bottomleft: 5px;
    border-bottom-right-radius: 5px;
    border-bottom-left-radius: 5px
}

.weather34chart-btns {
    position: absolute;
    height: 35px;
    display: inline-block;
    padding: 0 10px;
    line-height: 38px;
    width: 55px;
    flex-basis: auto;
    top: 5px
}

.weather34chart-btn {
    width: 14px;
    height: 14px;
    border: 1px solid rgba(0, 0, 0, .15);
    border-radius: 6px;
    display: inline-block;
    margin: 1px
}

.weather34chart-btn.close {
    background-color: rgba(255, 124, 57, 1.000)
}

.weather34chart-btn.close:before {
    content: "x";
    margin-top: -14px;
    margin-left: 2px
}

.weather34chart-btn.close:after {
    content: "close window";
    margin-top: -13px;
    margin-left: 15px;
    width: 300px
}

a {
    color: #aaa;
    text-decoration: none
}

.weather34darkbrowser {
    position: relative;
    background: 0;
    width: 100%;
    max-height: 30px;
    margin: auto;
    margin-top: -15px;
    margin-left: 0px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    padding-top: 45px;
    background-image: radial-gradient(circle, #EB7061 6px, transparent 8px), radial-gradient(circle, #F5D160 6px, transparent 8px), radial-gradient(circle, #81D982 6px, transparent 8px), radial-gradient(circle, rgba(97, 106, 114, 1) 2px, transparent 2px), radial-gradient(circle, rgba(97, 106, 114, 1) 2px, transparent 2px), radial-gradient(circle, rgba(97, 106, 114, 1) 2px, transparent 2px), linear-gradient(to bottom, rgba(59, 60, 63, 0.4) 40px, transparent 0);
    background-position: left top, left top, left top, right top, right top, right top, 0 0;
    background-size: 50px 45px, 90px 45px, 130px 45px, 50px 30px, 50px 45px, 50px 60px, 100%;
    background-repeat: no-repeat, no-repeat
}

.weather34darkbrowser[url]:after {
    content: attr(url);
    color: #aaa;
    font-size: 10px;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    padding: 4px 15px;
    margin: 11px 50px 0 90px;
    border-radius: 3px;
    background: rgba(97, 106, 114, 0.3);
    height: 20px;
    box-sizing: border-box
}

blue {
    color: #01a4b4
}

orange {
    color: #009bb4
}

orange1 {
    position: relative;
    color: #009bb4;
    margin: 0 auto;
    text-align: center;
    margin-left: 5%;
    font-size: 1.1rem
}

green {
    color: #aaa
}

red {
    color: #f37867
}

red6 {
    color: #d65b4a
}

value {
    color: #fff
}

yellow {
    color: #CC0
}

purple {
    color: #916392
}

.actualt {
    position: relative;
    left: 5px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -o-border-radius: 3px;
    border-radius: 3px;
    background: rgba(74, 99, 111, 0.1);
    padding: 5px;
    font-family: Arial, Helvetica, sans-serif;
    width: 120px;
    height: 0.8em;
    font-size: 0.8rem;
    padding-top: 2px;
    color: #aaa;
    align-items: center;
    justify-content: center;
    margin-bottom: 10px;
    top: 0;
    text-align: center;
}

.actual {
    position: relative;
    left: 5px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -o-border-radius: 3px;
    border-radius: 3px;
    padding: 5px;
    font-family: Arial, Helvetica, sans-serif;
    width: 95%;
    height: 0.8em;
    font-size: 0.8rem;
    padding-top: 2px;
    color: #aaa;
    align-items: center;
    justify-content: center;
    margin-bottom: 10px;
    top: 0
}

.lightning {
    position: relative;
    left: 45px;
    font-family: weathertext2, Arial, Helvetica, system;
    width: 4.25rem;
    height: 1.5rem;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -o-border-radius: 3px;
    font-weight: normal;
    font-size: .9rem;
    padding-top: 5px;
    color: #fff;
    align-items: center;
    justify-content: center;
    text-align: center;
    border-radius: 30px;
    background: rgba(68, 166, 181, 1.000);
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.almanac {
    font-size: 1.25em;
    margin-top: 30px;
    color: rgba(56, 56, 60, 1.000);
    width: 12em
}

metricsblue {
    color: #44a6b5;
    font-family: "weathertext2", Helvetica, Arial, sans-serif;
    background: rgba(86, 95, 103, 0.5);
    -webkit-border-radius: 2px;
    border-radius: 2px;
    align-items: center;
    justify-content: center;
    font-size: .9em;
    left: 10px;
    padding: 0 3px 0 3px;
}

</style>
<div class="weather34darkbrowser" url="Lightning Strike Almanac"></div>

<main class="grid">
<article>
     <div class=actualt>Strikes Today</div>
    <?php echo "<div class='lightning'>",$weather["lightningday"]. "</value>"?></div>
</article>

<article>
    <div class=actualt>Strikes Yesterday</div>
    <?php echo "<div class='lightning'>",$weather["lightningyesterday"] . "</value>"?></div>
</article>

<article>
    <div class=actualt>Strikes <?php echo date('M Y')?> </div>
    <?php echo "<div class='lightning'>",$weather["lightningmonth"] . "</value>"?></div>
</article>

<article>
     <div class=actualt>Strikes <?php echo date("Y");?> </div>
    <?php echo "<div class='lightning'>",$weather["lightningyear"] . "</value>"?></div>
</article>

<article>
    <div class=actualt>&nbsp;Strikes All-Time </div>
    <?php echo "<div class='lightning'>",$weather["lightningalltime"] . "</value>"?></div>
</article> </main>


 <main class="grid1">
        <articlegraph>
    <div class=actualt><?php echo date('Y');?> Strikes </div>
<iframe  src="w34highcharts/dark-charts.html?chart='strikesmallplot'&span='yearly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" frameborder="0" scrolling="no" width="100%"  height="225px"></iframe>
    </articlegraph>

<articlegraph style="height:30px">  
  <div class="lotemp">
  <?php echo $info?> 
<a href="https://highcharts.com" title="https://highcharts.com" target="_blank" style="font-size:8px;"> Charts rendered and compiled using Highcharts </a></span>
  </div>   
    
  <div class="lotemp">
  <?php echo $info?> Adapted by Jerry for the WeeWX Weather34 template from the original CSS/SVG/PHP scripts by weather34.com &copy; 2015-<?php echo date('Y');?>
  </a></div>
   
  </articlegraph> 
  
</main>
