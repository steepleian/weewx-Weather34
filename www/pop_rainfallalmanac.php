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

include('w34CombinedData.php');include('settings1.php');
if ($theme === "dark") {
    echo '<style>@font-face{font-family: weathertext2; src: url(css/fonts/verbatim-regular.woff) format("woff"), url(fonts/verbatim-regular.woff2) format("woff2"), url(fonts/verbatim-regular.ttf) format("truetype");}html,body{font-size: 13px; font-family: "weathertext2", Helvetica, Arial, sans-serif; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;}.grid{display: grid; grid-template-columns: repeat(auto-fill, minmax(140px, 2fr)); grid-gap: 5px; align-items: stretch; color: #f5f7fc;}.grid > article{border: 1px solid rgba(245, 247, 252, 0.02); box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.6); padding: 5px; font-size: 0.8em; -webkit-border-radius: 4px; border-radius: 4px; background: 0; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;}.grid1{display: grid; grid-template-columns: repeat(auto-fill, minmax(100%, 1fr)); grid-gap: 5px; align-items: stretch; color: #f5f7fc; margin-top: 5px;}.grid1 > articlegraph{border: 1px solid rgba(245, 247, 252, 0.02); box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.6); padding: 5px; font-size: 0.8em; -webkit-border-radius: 4px; border-radius: 4px; background: 0; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; height: 360px;}/* unvisited link */a:link{color: white;}/* visited link */a:visited{color: white;}/* mouse over link */a:hover{color: white;}/* selected link */a:active{color: white;}.weather34darkbrowser{position: relative; background: 0; width: 97%; height: 30px; margin: auto; margin-top: -5px; margin-left: 0px; border-top-left-radius: 5px; border-top-right-radius: 5px; padding-top: 10px;}.weather34darkbrowser[url]:after{content: attr(url); color: white; font-size: 14px; text-align: center; position: absolute; left: 0; right: 0; top: 0; padding: 4px 15px; margin: 11px 10px 0 auto; font-family: arial; height: 20px;}a{color: #aaa; text-decoration: none;}blue{color: #01a4b4;}orange{color: #009bb4;}orange1{position: relative; color: #009bb4; margin: 0 auto; text-align: center; margin-left: 5%; font-size: 1.1rem;}green{color: #aaa;}red{color: #f37867;}red6{color: #d65b4a;}value{color: #fff;}yellow{color: #cc0;}purple{color: #916392;}.actualt{position: relative; left: 0px; -webkit-border-radius: 3px; -moz-border-radius: 3px; -o-border-radius: 3px; border-radius: 3px; background: #555; padding: 5px; font-family: Arial, Helvetica, sans-serif; width: max-content; height: 0.8em; font-size: 0.8rem; padding-top: 2px; color: white; align-items: center; justify-content: center; margin-bottom: 10px; top: 0; text-align: center;}.actual{position: relative; left: 5px; -webkit-border-radius: 3px; -moz-border-radius: 3px; -o-border-radius: 3px; border-radius: 3px; padding: 5px; font-family: Arial, Helvetica, sans-serif; width: 95%; height: 0.8em; font-size: 0.8rem; padding-top: 2px; color: #aaa; align-items: center; justify-content: center; margin-bottom: 10px; top: 0;}<!-- weather34 rain beaker css -- > .rainfallcontainer1{left: 5px; top: 0;}.rainfalltoday1{font-family: weathertext2, Arial, Helvetica, system; width: 4.25rem; height: 1.5rem; -webkit-border-radius: 3px; -moz-border-radius: 3px; -o-border-radius: 3px; font-weight: normal; font-size: 0.9rem; padding-top: 5px; color: #fff; border-bottom: 12px solid #555; align-items: center; justify-content: center; text-align: center; border-radius: 3px; background: rgba(68, 166, 181, 1); -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;}.rainfallcaution,.rainfalltrend{position: absolute; font-size: 1rem;}smalluvunit{font-size: 0.6rem; font-family: Arial, Helvetica, system;}.lotemp{color: white; font-size: 0.6rem;}.almanac{font-size: 1.25em; margin-top: 30px; color: rgba(56, 56, 60, 1); width: 12em;}metricsblue{color: #44a6b5; font-family: "weathertext2", Helvetica, Arial, sans-serif; background: rgba(86, 95, 103, 0.5); -webkit-border-radius: 2px; border-radius: 2px; align-items: center; justify-content: center; font-size: 0.9em; left: 10px; padding: 0 3px 0 3px;}.w34convertrain{position: relative; font-size: 0.8em; top: 6px; color: white; margin-left: auto; margin-right: auto;}.hitempy{position: relative; background: rgba(61, 64, 66, 0.5); color: white; width: 75px; padding: 1px; -webit-border-radius: 2px; border-radius: 2px; margin-top: -33px; margin-left: 56px; padding-left: 3px; line-height: 11px; font-size: 9px;}
    </style>';
} elseif ($theme === "light") {
    echo '<style>@font-face{font-family: weathertext2; src: url(css/fonts/verbatim-regular.woff) format("woff"), url(fonts/verbatim-regular.woff2) format("woff2"), url(fonts/verbatim-regular.ttf) format("truetype");}html,body{font-size: 13px; font-family: "weathertext2", Helvetica, Arial, sans-serif; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; background-color: white;}.grid{display: grid; grid-template-columns: repeat(auto-fill, minmax(140px, 2fr)); grid-gap: 5px; align-items: stretch; color: #f5f7fc;}.grid > article{border: 1px solid rgba(245, 247, 252, 0.02); box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.6); padding: 5px; font-size: 0.8em; -webkit-border-radius: 4px; border-radius: 4px; background: 0; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;}.grid1{display: grid; grid-template-columns: repeat(auto-fill, minmax(100%, 1fr)); grid-gap: 5px; align-items: stretch; color: #f5f7fc; margin-top: 5px;}.grid1 > articlegraph{border: 1px solid rgba(245, 247, 252, 0.02); box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.6); padding: 5px; font-size: 0.8em; -webkit-border-radius: 4px; border-radius: 4px; background: 0; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; height: 360px;}/* unvisited link */a:link{color: black;}/* visited link */a:visited{color: black;}/* mouse over link */a:hover{color: black;}/* selected link */a:active{color: black;}.weather34darkbrowser{position: relative; background: 0; width: 97%; height: 30px; margin: auto; margin-top: -5px; margin-left: 0px; border-top-left-radius: 5px; border-top-right-radius: 5px; padding-top: 10px;}.weather34darkbrowser[url]:after{content: attr(url); color: black; font-size: 14px; text-align: center; position: absolute; left: 0; right: 0; top: 0; padding: 4px 15px; margin: 11px 10px 0 auto; font-family: arial; height: 20px;}a{color: #aaa; text-decoration: none;}blue{color: #01a4b4;}orange{color: #009bb4;}orange1{position: relative; color: #009bb4; margin: 0 auto; text-align: center; margin-left: 5%; font-size: 1.1rem;}green{color: #aaa;}red{color: #f37867;}red6{color: #d65b4a;}value{color: #fff;}yellow{color: #cc0;}purple{color: #916392;}.actualt{position: relative; left: 0px; -webkit-border-radius: 3px; -moz-border-radius: 3px; -o-border-radius: 3px; border-radius: 3px; background: #555555; padding: 5px; font-family: Arial, Helvetica, sans-serif; width: max-content; height: 0.8em; font-size: 0.8rem; padding-top: 2px; color: white; align-items: center; justify-content: center; margin-bottom: 10px; top: 0; text-align: center;}.actual{position: relative; left: 5px; -webkit-border-radius: 3px; -moz-border-radius: 3px; -o-border-radius: 3px; border-radius: 3px; padding: 5px; font-family: Arial, Helvetica, sans-serif; width: 95%; height: 0.8em; font-size: 0.8rem; padding-top: 2px; color: #aaa; align-items: center; justify-content: center; margin-bottom: 10px; top: 0;}<!-- weather34 rain beaker css -- > .rainfallcontainer1{left: 5px; top: 0;}.rainfalltoday1{font-family: weathertext2, Arial, Helvetica, system; width: 4.25rem; height: 1.5rem; -webkit-border-radius: 3px; -moz-border-radius: 3px; -o-border-radius: 3px; font-weight: normal; font-size: 0.9rem; padding-top: 5px; color: #fff; border-bottom: 12px solid #555555; align-items: center; justify-content: center; text-align: center; border-radius: 3px; background: rgba(68, 166, 181, 1); -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;}.rainfallcaution,.rainfalltrend{position: absolute; font-size: 1rem;}smalluvunit{font-size: 0.6rem; font-family: Arial, Helvetica, system;}.lotemp{color: black; font-size: 0.6rem;}.almanac{font-size: 1.25em; margin-top: 30px; color: rgba(56, 56, 60, 1); width: 12em;}metricsblue{color: #44a6b5; font-family: "weathertext2", Helvetica, Arial, sans-serif; background: rgba(86, 95, 103, 0.5); -webkit-border-radius: 2px; border-radius: 2px; align-items: center; justify-content: center; font-size: 0.9em; left: 10px; padding: 0 3px 0 3px;}.w34convertrain{position: relative; font-size: 0.8em; top: 6px; color: white; margin-left: auto; margin-right: auto;}.hitempy{position: relative; background: 0; color: black; width: 75px; padding: 1px; -webit-border-radius: 2px; border-radius: 2px; margin-top: -33px; margin-left: 56px; padding-left: 3px; line-height: 11px; font-size: 9px;}
    </style>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weather34 Rainfall Almanac Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


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
   
  <iframe  src="w34highcharts/<?php echo $theme1;?>-charts.html?chart='rainsmallplot'&span='yearly'&temp='<?php echo $weather['temp_units'];?>'&pressure='<?php echo $weather['barometer_units'];?>'&wind='<?php echo $weather['wind_units'];?>'&rain='<?php echo $weather['rain_units']?>" frameborder="0" scrolling="no" width="100%"  height="100%"></iframe>
   
  </articlegraph> 
  
    <articlegraph style="height:30px">  
  <div class="lotemp">
  <?php echo $info?> 
<a href="https://highcharts.com" title="https://highcharts.com" target="_blank" style="font-size:8px;"> Charts rendered and compiled using Highcharts </a></span>
  </div>   
    
  <div class="lotemp">
  <?php echo $info?> Adapted by Steepleian for the WeeWX Weather34 skin from the original CSS/SVG/PHP scripts by weather34.com &copy; 2015-<?php echo date('Y');?>
  </a></div>
   
  </articlegraph>
  
</main>