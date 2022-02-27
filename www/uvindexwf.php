<?php include('w34CombinedData.php');error_reporting(0);?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 UV-Index | Solar Radiation | Lux </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body,section{padding:10px}.weather34title,body,html{font-family:Arial,sans-serif}.weather34card,.weather34cardguide{position:relative;-webkit-box-orient:vertical;-webkit-box-direction:normal;color:#aaa}.weather34card__count-text,.weather34card__count-textuv{text-align:left;width:200px;font-family:Arial,Helvetica,sans-serif}@font-face{font-family:weathertext;src:url(css/fonts/sanfranciscodisplay-regular-webfont.woff) format("woff")}*,:after,:before{-webkit-box-sizing:border-box;box-sizing:border-box;margin:0;padding:0}body,html{font-size:62.5%;background:rgba(30, 31, 35, 1.000);}body{color:#aaa;overflow-x:hidden;min-height:80vh}section{width:80vw;max-width:64rem;min-width:58.9rem;margin:0 auto}.weather34title{font-size:14px;font-weight:400;padding-top:3px;width:400px}.weather34card__weather34-container,.weather34card__weather34-guide,.weather34card__weather34-wrapper{font-family:weathertext,sans-serif}.weather34cards{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;padding:5px}.weather34card,.weather34card__weather34-container{display:-webkit-box;display:-ms-flexbox;padding:10px}.weather34card{width:31rem;height:16.5rem;background-color:#none;border-radius:4px;display:flex;-ms-flex-direction:column;flex-direction:column;font-size:11px;font-weight:400;border:1px solid #444}.weather34card__weather34-container{height:50%;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:end;-ms-flex-align:end;align-items:flex-end}.weather34card__weather34-wrapper{width:8rem;font-weight:100}.weather34cardguide{width:27rem;height:200px;background:RGBA(37,41,45,0);border-radius:4px;display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;font-size:12px;font-weight:400;padding:5px;border:1px solid #444;line-height:13px}.weather34card__weather34-guide{width:3rem;font-weight:100}.weather34card__count-container{-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding:10px;font-family:Arial,Helvetica,sans-serif}.weather34card__count-textuv{float:left;font-size:13px;margin-left:-20px;line-height:12px}.weather34card__count-text--big{font-size:36px;font-weight:200;font-family:weathertext,sans-serif}.weather34card__count-text--bigs,.weather34card__stuff-container,time,time span,weather34card__count-text--bigsa{font-family:Arial,Helvetica,sans-serif}.weather34card__count-text--bigs{font-size:12px;font-weight:400;color:#aaa;text-align:center;margin-top:5px;width:100px}weather34card__count-text--bigsa{font-size:12px;font-weight:400;color:#aaa;text-align:center}.weather34card__stuff-container{margin:0 auto;width:99%;height:16%;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding:15px;color:#aaa;background:RGBA(37,41,45,0);border:RGBA(156,156,156,.1) solid;-webkit-border-radius:4px;-moz-border-radius:4px;-ms-border-radius:4px;-o-border-radius:4px;border-radius:4px;text-align:center;font-size:12px}orange,time span{color:#ff8841}.weather34card:after{content:"";display:block;position:absolute;top:0;left:0;width:16rem;height:4.625rem;padding:10px}.weather34card--earthquake1:after{background-image:radial-gradient(to bottom,rgba(106,122,135,.5),transparent 70%)}.weather34card--earthquake2:after{background-image:radial-gradient(to bottom,rgba(106,191,96,.5),transparent 70%)}.weather34card--earthquake3:after{background-image:radial-gradient(to bottom,rgba(96,203,231,.5),transparent 70%)}blue{color:#01a4b4}green{color:#9aba2f}red{color:#f37867}red6{color:#d65b4a}darkred{color:#f47264}value{color:#fff}yellow{color:RGBA(163,133,58,1)}purple{color:#916392}time{color:#aaa;font-weight:400}time span{font-weight:400}.provided,a{color:#aaa;font-size:11px;top:5px;margin-top:10px;text-decoration:none}.provided{margin-left:70px}.weather34solarrate,.weather34solarrate span{font-family:weathertext,arial,sans-serif;font-size:12px}updated{position:absolute;bottom:5px;float:right}.weather34-solarrate-bar{background:0;position:absolute;height:100px;width:30px;margin-left:235px;margin-top:-6px;color:RGBA(57,61,64,1)}.weather34-solarrate-bar .bar{shape-rendering:crispEdges;background:url(css/rain/solarrulerw34.svg) no-repeat;width:37px;border:1px solid;border-bottom:5px solid RGBA(57,61,64,1);border-top:3px solid RGBA(57,61,64,1);-webkit-border-radius:1px 1px 5px 5px;position:absolute;bottom:0}.weather34-luxrate-bar .bar,.weather34-uvrate-bar .bar{border:1px solid;shape-rendering:crispEdges;bottom:0;position:absolute}.weather34solarrate{color:#ff8841;position:absolute;margin-left:36px;margin-top:17px;width:20px;max-height:100px;line-height:10px;font-weight:400}.weather34solarrate span{color:#777}solarwm2{font-size:10px;font-weight:400}.solarmaxi{position:absolute;margin-left:100px;float:right;color:#ff8841;margin-top:15px;width:100px;font-size:11px}.weather34uvrate,.weather34uvrate span{font-family:weathertext,arial,sans-serif;font-size:12px;font-weight:400}.solarmaxi span{color:#aaa}.weather34-uvrate-bar{background:0;position:absolute;height:100px;width:30px;margin-left:245px;margin-top:-49px}.weather34-uvrate-bar .bar{background:url(css/rain/uvrulerw34.svg) no-repeat;width:37px;border-bottom:5px solid RGBA(57,61,64,1);border-top:3px solid RGBA(57,61,64,1);-webkit-border-radius:1px 1px 5px 5px}.weather34uvrate{color:#ff8841;position:absolute;margin-left:238px;margin-top:17px;width:20px;max-height:100px;line-height:10px}.weather34uvrate span{color:#777}purpleuv{color:#a475cb}reduv{color:#d65b4a}orangeuv{color:#ff8841}greenuv{color:#9aba2f}greyuv{color:#aaa}.uvmaxi{position:absolute;margin-left:60px;float:right;color:#ff8841;margin-top:10px;width:100px;font-size:11px}.weather34aqi span,.weather34aqirate{font-family:weathertext,arial,sans-serif;font-size:12px}.uvmaxi span{color:#aaa}.weather34-luxrate-bar{background:0;position:absolute;height:100px;width:30px;margin-left:235px;margin-top:-6px;color:RGBA(57,61,64,1)}.weather34-luxrate-bar .bar{background:url(css/rain/luxrulerw34.svg) no-repeat;width:37px;border-bottom:5px solid RGBA(57,61,64,1);border-top:3px solid RGBA(57,61,64,1);-webkit-border-radius:1px 1px 5px 5px}.weather34luxrate{position:absolute;font-family:weathertext,arial,sans-serif}.weather34luxrate span{color:#777;font-family:weathertext,arial,sans-serif}.weather34-aqi-bar{background:0;position:absolute;height:100px;width:30px;margin-left:245px;margin-top:-49px}.weather34-aqi-bar .bar{shape-rendering:crispEdges;background:url(css/rain/aqirulerw34.svg) no-repeat;width:37px;border:1px solid;border-bottom:5px solid RGBA(57,61,64,1);border-top:3px solid RGBA(57,61,64,1);-webkit-border-radius:1px 1px 5px 5px;position:absolute;bottom:0}.weather34aqirate{color:#ff8841;position:absolute;margin-left:36px;margin-top:17px;width:20px;max-height:100px;line-height:10px;font-weight:400}.weather34aqi span{color:#777}.uvsun{position:absolute;top:10px;margin-left:175px}.sunfade{opacity:.8}uv0,uv10,uv3,uv5,uv8{display:flex;align-items:center;justify-content:center;height:45px;width:45px;overflow:hidden;border-radius:50%;color:#fff;line-height:10px;padding-top:0;font-size:18px;font-family:weathertext,Helvetica,sans-seriff;border:1px solid rgba(230,232,239,1);font-weight:400}uv0{background-color:#9aba2f}uv3{background:rgba(233,171,74,1)}uv5{background-color:#f5650a}uv8{background-color:#ef5350}uv10{background-color:#a475cb}talert{position:absolute;top:15px;margin-left:40px;font-size:14px;line-height:16px}.orangealerticon1{margin-top:-17px;margin-left:160px;background:0;padding:4px;line-height:10px;position:relative}.weather34iuvrate{position:absolute;margin-left:125px;margin-top:70px}.uvspan{position:absolute;font-size:12px;line-height:0;font-weight:strong;margin-top:140px;margin-left:76px;color:#aaa}.weather34luxrate{color:#f5650a;margin-left:245px;margin-top:17px;font-size:12px;width:28px;max-height:100px;line-height:10px;font-weight:400;text-align:center}.barrainrate,.luxrate{font-weight:400;text-align:left}.weather34luxrate span{color:rgba(2,29,62,.8);font-size:12px;font-weight:400;display:block}luxrate{color:#ff8841;padding:0;left:-5px;margin-top:0;text-align:left;display:inline-block}luxrate span{color:#777;font-size:10px}.luxrate{color:#f5650a;font-size:12px;padding-left:0}.luxrate span{color:#777;font-size:12px;left:4px;margin-top:1px}luxratedark{color:#777;display:block}.uvindexpyramid{position:absolute;top:15px;left:90px;color:rgba(75,75,77,.7)}
.weather34darkbrowser{position:relative;background:0;width:104%;max-height:30px;margin:auto;margin-top:-15px;margin-left:-20px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:45px;background-image:radial-gradient(circle,#EB7061 6px,transparent 8px),radial-gradient(circle,#F5D160 6px,transparent 8px),radial-gradient(circle,#81D982 6px,transparent 8px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),linear-gradient(to bottom,rgba(59,60,63,0.4) 40px,transparent 0);background-position:left top,left top,left top,right top,right top,right top,0 0;background-size:50px 45px,90px 45px,130px 45px,50px 30px,50px 45px,50px 60px,100%;background-repeat:no-repeat,no-repeat}.weather34darkbrowser[url]:after{content:attr(url);color:#555;font-size:14px;position:absolute;left:0;right:0;top:0;padding:2px 2px;margin:11px 50px 0 90px;border-radius:3px;background:rgba(230,232,239,1);height:20px;box-sizing:border-box}
</style>
</head>
<body>
<div class="weather34darkbrowser" url="UV-Index | Solar Radiation | Lux Brightness for <?php echo $stationlocation;?>"></div>     

  
<section class="weather34cards">
   <div class="weather34card weather34card--earthquake1">
               <div class="weather34card_weather34-container">
               
            <div class="weather34card_weather34-wrapper"><span class="weather34card__count-text--big">
             
	
<div class="uvindexpyramid">
<svg id="weather34 uvindex pyramid module" width="100pt" height="100pt" viewBox="0 0 980 792" version="27-09-2018" >
<path fill="<?php if ($weatherflow["uv"]>=11){echo 'rgba(116, 100, 192, 0.8)';}	else echo 'currentcolor';?>" d=" M 394.17 49.10 C 458.08 48.90 522.01 48.99 585.92 49.06 C 589.55 57.30 594.93 64.39 598.17 72.85 C 601.66 76.94 603.46 82.25 605.95 87.01 C 528.65 86.97 451.34 87.04 374.03 86.97 C 380.77 74.37 386.86 61.39 394.17 49.10 Z" />
<path fill="<?php if ($weatherflow["uv"]>=10){echo 'rgba(116, 100, 192, 0.8)';}	else echo 'currentcolor';?>" d=" M 365.36 103.21 C 448.45 102.86 531.56 102.87 614.65 103.20 C 618.01 109.63 621.86 115.83 624.49 122.62 C 628.78 128.60 631.63 135.53 635.15 141.92 C 538.38 142.05 441.62 142.06 344.85 141.92 C 348.40 135.23 351.34 128.01 355.89 121.92 C 358.38 115.35 361.97 109.32 365.36 103.21 Z" />
<path fill="<?php if ($weatherflow["uv"]>=9){echo 'rgba(237, 73, 71, 0.8)';} else echo 'currentcolor';?>"d=" M 336.08 158.04 C 438.69 157.99 541.30 157.93 643.91 158.07 C 648.49 167.73 654.44 176.70 658.49 186.62 C 661.14 190.43 663.71 194.47 665.13 198.93 C 548.38 199.05 431.62 199.05 314.87 198.92 C 321.04 184.87 329.43 171.89 336.08 158.04 Z" />
<path fill="<?php if ($weatherflow["uv"]>=8){echo 'rgba(237, 73, 71, 0.8)';} else echo 'currentcolor';?>" d=" M 306.28 215.17 C 428.76 214.89 551.28 214.88 673.75 215.18 C 682.09 230.39 689.68 245.75 698.02 260.98 C 559.35 261.01 420.67 261.02 282.00 260.97 C 290.25 245.78 298.01 230.35 306.28 215.17 Z" />
<path fill="<?php if ($weatherflow["uv"]>=7){echo '#ff8841';} else echo 'currentcolor';?>" d=" M 273.33 277.19 C 417.80 276.86 562.31 276.91 706.77 277.16 C 715.16 293.95 724.34 310.34 733.02 326.99 C 571.02 327.01 409.02 327.02 247.03 326.98 C 255.55 310.16 264.54 293.84 273.33 277.19 Z" />
<path fill="<?php if ($weatherflow["uv"]>=6){echo '#ff8841';} else echo 'currentcolor';?>" d=" M 238.32 343.18 C 406.12 342.88 573.96 342.88 741.75 343.18 C 747.04 352.67 751.46 362.64 756.99 372.00 C 760.56 380.21 766.14 387.46 769.13 395.93 C 583.06 396.05 396.98 396.05 210.91 395.93 C 219.12 377.94 229.43 360.88 238.32 343.18 Z" />
<path fill="<?php if ($weatherflow["uv"]>=5){echo '#ff8841';} else echo 'currentcolor';?>"d=" M 201.31 412.18 C 393.79 411.86 586.31 411.91 778.78 412.15 C 786.97 430.19 797.63 447.15 806.12 464.93 C 595.39 465.05 384.65 465.04 173.92 464.94 C 182.32 447.09 192.76 430.04 201.31 412.18 Z" />
<path fill="<?php if ($weatherflow["uv"]>=4){echo 'rgba(237, 167, 8, 0.8)';} else echo 'currentcolor';?>" d=" M 165.17 481.10 C 381.75 480.90 598.33 481.00 814.91 481.05 C 822.14 494.55 829.45 508.01 836.33 521.71 C 839.46 527.32 843.00 532.83 845.13 538.93 C 608.38 539.05 371.62 539.05 134.86 538.92 C 138.62 529.13 144.48 520.39 149.05 510.99 C 154.83 501.25 159.22 490.74 165.17 481.10 Z" />
<path fill="<?php if ($weatherflow["uv"]>=3){echo 'rgba(237, 167, 8, 0.8)';} else echo 'currentcolor';?>" d=" M 125.36 555.16 C 368.45 554.89 611.55 554.89 854.64 555.16 C 857.46 560.61 860.95 565.93 863.17 571.85 C 867.36 577.00 869.52 583.57 872.56 589.48 C 877.07 594.10 877.62 601.36 881.96 606.05 C 884.38 610.97 887.32 615.73 889.13 620.93 C 623.06 621.05 356.98 621.05 90.91 620.93 C 94.59 610.88 100.90 602.01 105.31 592.28 C 110.35 586.23 111.63 577.81 116.82 571.85 C 119.04 565.93 122.54 560.61 125.36 555.16 Z" />
<path fill="<?php if ($weatherflow["uv"]>=2){echo 'rgba(146, 177, 42, 0.8)';} else echo 'currentcolor';?>" d=" M 81.31 637.18 C 353.79 636.86 626.31 636.91 898.78 637.16 C 906.01 653.63 915.67 668.54 923.22 684.82 C 927.18 690.19 930.08 696.53 932.10 702.93 C 637.39 703.05 342.67 703.04 47.96 702.93 C 49.21 696.12 53.57 689.92 57.16 684.13 C 64.21 667.89 74.16 653.32 81.31 637.18 Z" />
<path fill="<?php if ($weatherflow["uv"]>0){echo 'rgba(146, 177, 42, 0.8)';} else echo 'currentcolor';?>" d=" M 37.24 719.17 C 147.49 718.78 257.75 719.11 368.00 719.00 C 559.56 719.13 751.13 718.75 942.69 719.19 C 954.83 742.74 967.22 766.17 980.00 789.39 L 980.00 792.00 L 0.00 792.00 L 0.00 789.37 C 12.76 766.16 25.41 742.86 37.24 719.17 Z" />
</svg>
</div></div>
 <div class="weather34iuvrate"><?php 
 if ($weatherflow['uv']>=10){echo  "<uv10>",number_format($weatherflow['uv'] ,1),"</<uv10>";}
	else if ($weatherflow['uv']>=8){echo  "<uv8>",number_format($weatherflow['uv'] ,1), "</<uv8>";}
	else if ($weatherflow['uv']>=5){echo  "<uv5>",number_format($weatherflow['uv'] ,1), "</uv5>";}
	else if ($weatherflow['uv']>=3){echo  "<uv3>",number_format($weatherflow['uv'] ,1), "</uv3>";}
	else if ($weatherflow['uv']>=0){echo  "<uv0>",number_format($weatherflow['uv'] ,1), "</uv0>";}
	else if ($weatherflow['uv']>=0){echo  "<uv0>",$weatherflow['uv'], "</uv0>";}
?>
 </span>
 </div><div class=uvspan>  &nbsp;&nbsp;&nbsp;CURRENT UVINDEX</div></div>
        <div class="weather34card__count-container">
            <div class="weather34card__count-text">
                <span class="weather34card__count-text--bigs"> 
            </div>
        </div>
       </div> 
        
        
   
   <div class="weather34card weather34card--earthquake2">
               <div class="weather34card_weather34-container">
            <div class="weather34card_weather34-wrapper"><span class="weather34card__count-text--big">
            
           <div class="weather34-solarrate-bar">
 <svg id="weather34 solar radiation svg" width="40pt" height="80pt" viewBox="0 0 44 84" version="27-09-2018" >
<path fill="currentcolor" d=" M 0.00 7.99 C 1.33 8.00 2.67 8.00 4.00 8.01 C 4.01 31.34 3.99 54.67 4.00 77.99 C 16.00 78.01 28.00 78.00 40.00 78.00 C 40.01 54.67 39.99 31.34 40.00 8.01 C 41.34 8.00 42.67 8.00 44.00 7.99 L 44.00 9.95 C 43.50 9.97 42.50 10.02 42.00 10.05 C 42.00 33.36 42.00 56.68 42.00 80.00 C 28.67 80.01 15.34 80.00 2.01 80.00 C 1.99 56.70 2.00 33.40 2.00 10.10 C 1.50 10.04 0.50 9.92 0.00 9.86 L 0.00 7.99 Z" />
<path fill="<?php if($weatherflow["solar"]>1000){echo "rgba(237, 73, 71, 0.8)";} else echo "currentcolor"?>" d=" M 7.00 8.01 C 17.00 8.00 27.00 8.00 37.00 8.00 C 37.00 8.75 37.00 10.25 37.00 11.00 C 27.00 11.00 17.00 11.00 7.00 11.00 C 7.00 10.25 7.00 8.75 7.00 8.01 Z" />
<path fill="<?php if($weatherflow["solar"]>900){echo "rgba(237, 73, 71, 0.8)";} else echo "currentcolor"?>" d=" M 7.00 12.00 C 17.00 12.00 27.00 12.00 37.00 12.00 C 37.00 13.67 37.00 15.33 37.00 17.00 C 27.00 17.00 17.00 17.00 7.00 17.00 C 7.00 15.33 7.00 13.67 7.00 12.00 Z" />
<path fill="<?php if($weatherflow["solar"]>800){echo " rgba(237, 73, 71, 0.8)";} else echo "currentcolor"?>" d=" M 7.00 18.00 C 17.00 18.00 27.00 18.00 37.00 18.00 C 37.00 19.67 37.00 21.33 37.00 23.00 C 27.00 23.00 17.00 23.00 7.00 23.00 C 7.00 21.33 7.00 19.67 7.00 18.00 Z" />
<path fill="<?php if($weatherflow["solar"]>700){echo " #f5650a";} else echo "currentcolor"?>" d=" M 7.00 24.00 C 17.00 24.00 27.00 24.00 37.00 24.00 C 37.00 25.67 37.00 27.33 37.00 29.00 C 27.00 29.00 17.00 29.00 7.00 29.00 C 7.00 27.33 7.00 25.67 7.00 24.00 Z" />
<path fill="<?php if($weatherflow["solar"]>600){echo " #f5650a";} else echo "currentcolor"?>" d=" M 7.00 30.00 C 17.00 30.00 27.00 30.00 37.00 30.00 C 37.00 31.67 37.00 33.33 37.00 35.00 C 27.00 35.00 17.00 35.00 7.00 35.00 C 7.00 33.33 7.00 31.67 7.00 30.00 Z" />
<path fill="<?php if($weatherflow["solar"]>500){echo " #f5650a";} else echo "currentcolor"?>" d=" M 7.00 36.00 C 17.00 36.00 27.00 36.00 37.00 36.00 C 37.00 37.67 37.00 39.33 37.00 41.00 C 27.00 41.00 17.00 41.00 7.00 41.00 C 7.00 39.33 7.00 37.67 7.00 36.00 Z" />
<path fill="<?php if($weatherflow["solar"]>400){echo " #ff8841";} else echo "currentcolor"?>" d=" M 7.00 42.00 C 17.00 41.99 27.00 42.00 37.00 42.00 C 37.00 43.67 37.00 45.33 37.00 47.00 C 27.00 47.00 17.00 47.00 7.00 47.00 C 7.00 45.33 7.00 43.67 7.00 42.00 Z" />
<path fill="<?php if($weatherflow["solar"]>300){echo " #ff8841";} else echo "currentcolor"?>" d=" M 7.00 48.00 C 17.00 48.00 27.00 48.00 37.00 48.00 C 37.00 49.67 37.00 51.33 37.00 53.00 C 27.00 53.00 17.00 53.00 7.00 53.00 C 7.00 51.33 7.00 49.67 7.00 48.00 Z" />
<path fill="<?php if($weatherflow["solar"]>200){echo " #ff8841";} else echo "currentcolor"?>" d=" M 7.00 54.00 C 17.00 54.00 27.00 54.00 37.00 54.00 C 37.00 55.67 37.00 57.33 37.00 59.00 C 27.00 59.00 17.00 59.00 7.00 59.00 C 7.00 57.33 7.00 55.67 7.00 54.00 Z" />
<path fill="<?php if($weatherflow["solar"]>100){echo " #ff8841";} else echo "currentcolor"?>" d=" M 7.00 60.00 C 17.00 60.00 27.00 60.00 37.00 60.00 C 37.00 61.67 37.00 63.33 37.00 65.00 C 27.00 65.00 17.00 65.00 7.00 65.00 C 7.00 63.33 7.00 61.67 7.00 60.00 Z" />
<path fill="<?php if($weatherflow["solar"]>50){echo " #ff8841";} else echo "currentcolor"?>" d=" M 7.00 66.00 C 17.00 66.00 27.00 66.00 37.00 66.00 C 37.00 67.67 37.00 69.33 37.00 71.00 C 27.00 71.00 17.00 71.00 7.00 71.00 C 7.00 69.33 7.00 67.67 7.00 66.00 Z" />
<path fill="<?php if($weatherflow["solar"]>0){echo " #ff8841";} else echo "currentcolor"?>" d=" M 7.00 72.00 C 17.00 72.00 27.00 72.00 37.00 72.00 C 37.00 73.67 37.00 75.33 37.00 77.00 C 27.00 77.00 17.00 77.00 7.00 77.00 C 7.00 75.33 7.00 73.67 7.00 72.00 Z" /></svg>
</svg></div>
            
            
            
               <?php //weather34 solar
	   
			   
if ($weatherflow["solar"]>=1000) echo "<red>",$weatherflow["solar"]; 
else if ($weatherflow["solar"] >=500) echo "<orange>",$weatherflow["solar"]; 
else if ($weatherflow["solar"] >=300) echo "<orange>",$weatherflow["solar"]; 
else if ($weatherflow["solar"] >=1) echo "<orange>",$weatherflow["solar"]; 
else if ($weatherflow["solar"] ==0) echo "<green>",$weatherflow["solar"]; 

?></span> Solar Radiation W/m<sup>2</sup>
<div class="uvsun"><?php
	if ($weatherflow["solar"]>=800){echo "<img src=css/icons/uvstrong.svg width=60px>";}	
	else if ($weatherflow["solar"]>=1){echo "<img src=css/icons/clear.svg width=60px>";}		
	else echo "<img src=css/icons/nosunuv.svg width=60px>";
	?></div>

            </div>
        </div>
        <div class="weather34card__count-container">
            <div class="weather34card__count-textuv">
                <span class="weather34card__count-text--bigs">    
               <?php
 
	echo " ";

	if ($weatherflow["solar"]>1000)  {
	echo "<green><br> <br>Solar Radiation Excellent</green> and Sustainable<br>";
	echo '<green>Solar Energy</green> replenishment is good to excellent.';
	} 
	
	else if ($weatherflow["solar"]>600)  {
	echo "<green><br><br> Solar Radiation Good</green> and Sustainable<br>";
	echo '<green>Solar Energy</green> replenishment is moderate to good.';
	} 
	
	
	else if ($weatherflow["solar"]>400)  {
	echo "<orange><br><br> Solar Radiation Moderate</orange><br>";
	echo '<green>Solar Energy</green> replenishment is low to moderate. ';
	} 
	
	else if ($weatherflow["solar"]>200)  {
	echo "<yellow><br><br> Solar Radiation Poor</yellow><br>";
	echo ' <green>Solar Energy</green> replenishment is low. ';
	} 
	
	else if ($weatherflow["solar"]>100)  {
	echo "<yellow><br><br> Solar Radiation Poor</yellow><br>";
	echo ' <green>Solar Energy</green> replenishment is poor. ';
	} 
	
	else if ($weatherflow["solar"]>=0)  {
	echo "<red><br>Solar Radiation Poor</red><br>";
	echo 'When the <orange>sun</orange> is near the horizon,overcast,obscured or darkness hours this will prevent <green>Solar Energy</green> replenishment.  ';
	} 
	
	


?> 
            
                

            </div>
        </div>
             
       
</section>







<section class="weather34cards">
   <div class="weather34card weather34card--earthquake1">
               <div class="weather34card_weather34-container">
            <div class="weather34card_weather34-wrapper"><span class="weather34card__count-text--bigs">
             
	<?php
	echo " Current UVINDEX Advisory <br>";

	if ($weatherflow["uv"]>10)  {
	echo "<purple><br><br> Extra Protection </purple><br>";
	echo 'Avoid being outside during midday hours!
Make sure you seek a shaded area! <orange>Sunscreen</orange> and wear a hat ,<orange>wear sunglasses</orange> during bright <orange>sunlight</orange> periods.';
	} 
	
	else if ($weatherflow["uv"]>8)  {
	echo "<red><br><br> Extra Protection ", $alert,"</red><br>";
	echo 'Avoid being outside during midday hours!
Make sure you seek a shaded area! Wear <orange>Sunscreen</orange> and hat ,<orange>wear sunglasses</orange>.';
	} 
	
	
	else if ($weatherflow["uv"]>5)  {
	echo "<orange><br><br> Protection Required ", $alert,"</orange><br>";
	echo 'Seek shadea area during midday hours!
Use sunscreen and a hat for protection,<orange>wear sunglasses</orange> during bright <orange>sunlight</orange periods.';
	} 
	
	else if ($weatherflow["uv"]>3)  {
	echo "<yellow><br><br> Protection Required ", $alert,"</yellow><br>";
	echo ' During midday hours!
caution use some form of  protection,<orange>wear sunglasses</orange> during bright <orange>sunlight</orange periods.';
	} 
	
	else if ($weatherflow["uv"]>0)  {
	echo "<green><br><br> No Cautions Required</green><br>";
	echo 'No advisory required . Safe for all skin types though be-aware of <orange>sunlight</orange> when <orange>sun</orange> approaches low horizon,<orange>wear sunglasses</orange>.';
	} 
	
	else if ($weatherflow["uv"]==0)  {
	echo "<green><br><br> No Caution Required</green><br>";
	echo 'No cautions required.The <orange>sun</orange> may be low on the horizon,obscured or below the horizon due to darkness hours.';
	
	} 


?></span></div>
        </div>
        
        
        
        
        
    </div>
    <div class="weather34card weather34card--earthquake2">
               <div class="weather34card_weather34-container">
            <div class="weather34card_weather34-wrapper"><span class="weather34card__count-text--big">
         <div class="weather34-luxrate-bar">

    <?php $lux = number_format($weatherflow["solar"]/0.0084555,0, '.', '');?>
	<svg id="weather34 lux rate svg" width="40pt" height="80pt" viewBox="0 0 44 84" version="27-09-2018" >
<path fill="currentcolor" d=" M 0.00 7.99 C 1.33 8.00 2.67 8.00 4.00 8.01 C 4.01 31.34 3.99 54.67 4.00 77.99 C 16.00 78.01 28.00 78.00 40.00 78.00 C 40.01 54.67 39.99 31.34 40.00 8.01 C 41.34 8.00 42.67 8.00 44.00 7.99 L 44.00 9.95 C 43.50 9.97 42.50 10.02 42.00 10.05 C 42.00 33.36 42.00 56.68 42.00 80.00 C 28.67 80.01 15.34 80.00 2.01 80.00 C 1.99 56.70 2.00 33.40 2.00 10.10 C 1.50 10.04 0.50 9.92 0.00 9.86 L 0.00 7.99 Z" />
<path fill="<?php if($lux>110000){echo " rgba(237, 73, 71, 0.8)";} else echo "currentcolor"?>" d=" M 7.00 8.01 C 17.00 8.00 27.00 8.00 37.00 8.00 C 37.00 8.75 37.00 10.25 37.00 11.00 C 27.00 11.00 17.00 11.00 7.00 11.00 C 7.00 10.25 7.00 8.75 7.00 8.01 Z" />
<path fill="<?php if($lux>90000){echo " rgba(237, 73, 71, 0.8)";} else echo "currentcolor"?>" d=" M 7.00 12.00 C 17.00 12.00 27.00 12.00 37.00 12.00 C 37.00 13.67 37.00 15.33 37.00 17.00 C 27.00 17.00 17.00 17.00 7.00 17.00 C 7.00 15.33 7.00 13.67 7.00 12.00 Z" />
<path fill="<?php if($lux>80000){echo " rgba(237, 73, 71, 0.8)";} else echo "currentcolor"?>" d=" M 7.00 18.00 C 17.00 18.00 27.00 18.00 37.00 18.00 C 37.00 19.67 37.00 21.33 37.00 23.00 C 27.00 23.00 17.00 23.00 7.00 23.00 C 7.00 21.33 7.00 19.67 7.00 18.00 Z" />
<path fill="<?php if($lux>70000){echo " #f5650a";} else echo "currentcolor"?>" d=" M 7.00 24.00 C 17.00 24.00 27.00 24.00 37.00 24.00 C 37.00 25.67 37.00 27.33 37.00 29.00 C 27.00 29.00 17.00 29.00 7.00 29.00 C 7.00 27.33 7.00 25.67 7.00 24.00 Z" />
<path fill="<?php if($lux>60000){echo " #f5650a";} else echo "currentcolor"?>" d=" M 7.00 30.00 C 17.00 30.00 27.00 30.00 37.00 30.00 C 37.00 31.67 37.00 33.33 37.00 35.00 C 27.00 35.00 17.00 35.00 7.00 35.00 C 7.00 33.33 7.00 31.67 7.00 30.00 Z" />
<path fill="<?php if($lux>50000){echo " #f5650a";} else echo "currentcolor"?>" d=" M 7.00 36.00 C 17.00 36.00 27.00 36.00 37.00 36.00 C 37.00 37.67 37.00 39.33 37.00 41.00 C 27.00 41.00 17.00 41.00 7.00 41.00 C 7.00 39.33 7.00 37.67 7.00 36.00 Z" />
<path fill="<?php if($lux>40000){echo " #ff8841";} else echo "currentcolor"?>" d=" M 7.00 42.00 C 17.00 41.99 27.00 42.00 37.00 42.00 C 37.00 43.67 37.00 45.33 37.00 47.00 C 27.00 47.00 17.00 47.00 7.00 47.00 C 7.00 45.33 7.00 43.67 7.00 42.00 Z" />
<path fill="<?php if($lux>30000){echo " #ff8841";} else echo "currentcolor"?>" d=" M 7.00 48.00 C 17.00 48.00 27.00 48.00 37.00 48.00 C 37.00 49.67 37.00 51.33 37.00 53.00 C 27.00 53.00 17.00 53.00 7.00 53.00 C 7.00 51.33 7.00 49.67 7.00 48.00 Z" />
<path fill="<?php if($lux>20000){echo " #ff8841";} else echo "currentcolor"?>" d=" M 7.00 54.00 C 17.00 54.00 27.00 54.00 37.00 54.00 C 37.00 55.67 37.00 57.33 37.00 59.00 C 27.00 59.00 17.00 59.00 7.00 59.00 C 7.00 57.33 7.00 55.67 7.00 54.00 Z" />
<path fill="<?php if($lux>10000){echo " #ff8841";} else echo "currentcolor"?>" d=" M 7.00 60.00 C 17.00 60.00 27.00 60.00 37.00 60.00 C 37.00 61.67 37.00 63.33 37.00 65.00 C 27.00 65.00 17.00 65.00 7.00 65.00 C 7.00 63.33 7.00 61.67 7.00 60.00 Z" />
<path fill="<?php if($lux>5000){echo " #ff8841";} else echo "currentcolor"?>" d=" M 7.00 66.00 C 17.00 66.00 27.00 66.00 37.00 66.00 C 37.00 67.67 37.00 69.33 37.00 71.00 C 27.00 71.00 17.00 71.00 7.00 71.00 C 7.00 69.33 7.00 67.67 7.00 66.00 Z" />
<path fill="<?php if($lux>0){echo " #ff8841";} else echo "currentcolor"?>" d=" M 7.00 72.00 C 17.00 72.00 27.00 72.00 37.00 72.00 C 37.00 73.67 37.00 75.33 37.00 77.00 C 27.00 77.00 17.00 77.00 7.00 77.00 C 7.00 75.33 7.00 73.67 7.00 72.00 Z" /></svg>
    
  </div>
 

 
            
            
            
               <?php //34 aqi ozone script
			   
	   
			   
$b="--";if($lux==$b){$lux = "N/A" ;}			   
			   
			   
if ($lux >=10) echo "<yellow>",$lux; 
else if ($lux >=0) echo "<green>",$lux; 

?></span> Lux Brightness
<div class="uvsun"><?php
	if ($lux>=1){echo "<img src=css/icons/clear.svg width=60px>";}		
	else echo "<img src=css/icons/nosunuv.svg width=60px>";
	?></div>

            </div>
        </div>
        <div class="weather34card__count-container">
            <div class="weather34card__count-textuv">
                <span class="weather34card__count-text--bigs">    
               <?php
 
	echo " ";	
	if ($lux>=0)  {
	echo "<orange>Lux measurement</orange><br>";
	echo '<greyuv>Measures the approximate human eye response to light under a variety of lighting conditions.The total amount of all the light measured is known as the “luminous flux”.</greyuv><br>';}	
	else echo "LUX DATA NOT AVAILABLE";
	

?> 
            
                
       
</section>




<div class="provided">   
&nbsp;<?php echo $info;?> <?php echo $scriptcredits. " ".date('Y');?></a></div>
</body>
</html>
