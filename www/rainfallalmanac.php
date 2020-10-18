<?php
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include('w34CombinedData.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weather34 Rainfall Almanac Information</title>
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

<!-- weather34 rain beaker css -->
.rainfallcontainer1 {
    left: 5px;
    top: 0
}

.rainfalltoday1 {
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
    border-bottom: 12px solid rgba(56, 56, 60, 1);
    align-items: center;
    justify-content: center;
    text-align: center;
    border-radius: 3px;
    background: rgba(68, 166, 181, 1.000);
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.rainfallcaution,
.rainfalltrend {
    position: absolute;
    font-size: 1rem
}

smalluvunit {
    font-size: .6rem;
    font-family: Arial, Helvetica, system;
}

.lotemp {
    color: #aaa;
    font-size: 0.6rem;
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

.w34convertrain {
    position: relative;
    font-size: .8em;
    top: 6px;
    color: #c0c0c0;
    margin-left: auto;
    margin-right: auto;
}

.hitempy {
    position: relative;
    background: rgba(61, 64, 66, 0.5);
    color: #aaa;
    width: 75px;
    padding: 1px;
    -webit-border-radius: 2px;
    border-radius: 2px;
    margin-top: -33px;
    margin-left: 56px;
    padding-left: 3px;
    line-height: 11px;
    font-size: 9px
}

</style>
<div class="weather34darkbrowser" url="Rainfall Almanac"></div>

<main class="grid">
    <article>
     <div class=actualt>Rainfall Today</div>
    <?php // rain today
echo "<div class='rainfalltoday1'>",$weather["rain_today"] . "</value>";echo "<smalluvunit>".$weather["rain_units"]."</smalluvunit>"?>
<div class='w34convertrain'>
<?php //convert rain
if($weather["rain_units"] =='mm'){ echo number_format($weather["rain_today"]*0.0393701,2)."<smalluvunit>in</smalluvunit>";}
elseif($weather["rain_units"] =='in'){ echo number_format($weather["rain_today"]*25.400013716,2)."<smalluvunit>mm</smalluvunit>";}
?>
<div></div>

<div class="hitempy"><?php echo $raininfo . "Last Hour<blue> ", $weather["rain_lasthour"]."</blue> " .$weather["rain_units"] ?></div>
</article>

 <article>
        <div class=actualt>Rainfall Yesterday</div>
    <?php // rain yesterday
echo "<div class='rainfalltoday1'>",$weather["rainydmax"] . "</value>";echo "<smalluvunit>".$weather["rain_units"]."</smalluvunit>"?>
<div class='w34convertrain'>
<?php //convert rain
if($weather["rain_units"] =='mm'){ echo number_format($weather["rainydmax"]*0.0393701,2)."<smalluvunit>in</smalluvunit>";}
elseif($weather["rain_units"] =='in'){ echo number_format($weather["rainydmax"]*25.400013716,2)."<smalluvunit>mm</smalluvunit>";}
?>
<div></div>

<div class="hitempy"><?php echo $raininfo;?>Last 24 Hours<br/><blue><?php echo $weather["rain_24hrs"];?></blue> <?php echo $weather["rain_units"] ?></div>
</article>


    <article>
    <div class=actualt>Rainfall <?php echo date('M Y')?> </div>
    <?php // rain month
echo "<div class='rainfalltoday1'>",$weather["rain_month"] . "</value>";echo "<smalluvunit>".$weather["rain_units"]."</smalluvunit>"?>
<div class='w34convertrain'>
<?php //convert rain
if($weather["rain_units"] =='mm'){ echo number_format($weather["rain_month"]*0.0393701,2)."<smalluvunit>in</smalluvunit>";}
elseif($weather["rain_units"] =='in'){ echo number_format($weather["rain_month"]*25.400013716,2)."<smalluvunit>mm</smalluvunit>";}
?>
<div></div>

<div class="hitempy">
    <?php echo $raininfo;?>Last Rainfall<br/>
    <blue><?php if ($meteobridgeapi[124]=='--'){
        echo "Unknown";
    } else if ($rainlasttime == date("jS M Y ")) {
        echo 'Today';
    } else {
        echo $rainlasttime;
    }?></blue>
</div>
</article>


     <article>
     <div class=actualt>Rainfall <?php echo date("Y");?> </div>
    <?php // rain year
echo "<div class='rainfalltoday1'>",$weather["rain_year"] . "</value>";echo "<smalluvunit>".$weather["rain_units"]."</smalluvunit>"?>
<div class='w34convertrain'>
<?php //convert rain
if($weather["rain_units"] =='mm'){ echo number_format($weather["rain_year"]*0.0393701,2)."<smalluvunit>in</smalluvunit>";}
elseif($weather["rain_units"] =='in'){ echo number_format($weather["rain_year"]*25.400013716,2)."<smalluvunit>mm</smalluvunit>";}
?>
<div></div>

<div class="hitempy"><?php echo $raininfo;?><!--<blue>Rainfall</blue>-->Since<br/>
    <blue>Jan <?php echo date('Y');?></blue>
</div>
</article>

<article>
 <div class=actualt>&nbsp;Rainfall All-Time </div>
    <?php
    if ($weather["rain_alltime"]==''){echo "<div class='rainfalltoday1'>N/A</value>";}
 // rain alltime
else {echo "<div class='rainfalltoday1'>",$weather["rain_alltime"] . "</value>";
echo "<smalluvunit>".$weather["rain_units"]."</smalluvunit>";}?>
<div class='w34convertrain'>
<?php //convert rain
if ($weather["rain_alltime"]==''){echo '';}
else{
if($weather["rain_units"] =='mm'){ echo number_format($weather["rain_alltime"]*0.0393701,2)." <smalluvunit>in</smalluvunit>";}
elseif($weather["rain_units"] =='in'){ echo number_format($weather["rain_alltime"]*25.400013716,2,'.','')."<smalluvunit>mm</smalluvunit>";}
}
?>
<div></div>

<div class="hitempy"><?php echo $raininfo;?><!--<blue>Rainfall</blue>-->Since<br/>
    <blue><?php echo $weather['rainStartTime'];?></blue>
</div>
</article> </main>



 <main class="grid1">
        <articlegraph>
    <div class=actualt><?php echo date('Y');?> Rainfall (<?php echo $weather["rain_units"]?>)</div>
    <iframe    src="<?php echo $chartsource ;?>/yearlyrainfallmedium.php" frameborder="0" scrolling="no" width="100%"    height="225px"></iframe>

    </articlegraph>

        <articlegraph style="height:30px">
    <div class="lotemp">
    <?php echo $info?>
<a href="https://canvasjs.com" title="https://canvasjs.com" target="_blank" style="font-size:8px;"> Charts rendered and compiled using <?php echo $creditschart ;?> </a></span>
    </div>
    <div class="lotemp">
    <?php echo $info?> <a href="https://weather34.com" title="weather34.com" target="_blank" style="font-size:8px;">CSS/SVG/PHP scripts were developed by weather34.com    for use in the weather34 template &copy; 2015-<?php echo date('Y');?>
    </a></div>

    </articlegraph>

</main>
