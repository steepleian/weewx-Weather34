<?php include('w34CombinedData.php');error_reporting(0);?>
<style>body{background:rgba(30, 31, 35, 1.000);}
.webcamlarge{
-webkit-border-radius:4px;	-moz-border-radius:4px;	-o-border-radius:4px;	-ms-border-radius:4px;border-radius:4px;border:solid RGBA(84, 85, 86, 1.00) 2px;max-width:167vh;height:80vh;display:block;margin-left:auto;margin-right:auto;}
.videoWeatherCamLarge{-webkit-border-radius:4px;	-moz-border-radius:4px;	-o-border-radius:4px;	-ms-border-radius:4px;border-radius:4px;border:solid RGBA(84, 85, 86, 1.00) 2px;width:167vh;height:80vh;display:block;margin-left:auto;margin-right:auto;}
.weather34darkbrowser{position:relative;background:0;width:103.3%;max-height:30px;margin:auto;margin-top:-15px;margin-left:-20px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:40px;background-image:radial-gradient(circle,#EB7061 6px,transparent 8px),radial-gradient(circle,#F5D160 6px,transparent 8px),radial-gradient(circle,#81D982 6px,transparent 8px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),linear-gradient(to bottom,rgba(59,60,63,0.4) 40px,transparent 0);background-position:left top,left top,left top,right top,right top,right top,0 0;background-size:50px 45px,90px 45px,130px 45px,50px 30px,50px 45px,50px 60px,100%;background-repeat:no-repeat,no-repeat}.weather34darkbrowser[url]:after{content:attr(url);color:#aaa;font-size:14px;position:absolute;left:0;right:0;top:0;padding:2px 15px;margin:11px 50px 0 90px;border-radius:3px;background:rgba(97, 106, 114, 0.3);height:20px;box-sizing:border-box;font-family:Arial, Helvetica, sans-serif}
</style>
<?php if (!empty($videoWeatherCamURL) && $videoWeatherCamURL != ' ' && $videoWeatherCamURL != 'Null' && $videoWeatherCamURL != 'null') {
    #Don't refresh video's page
} else {
    #refresh the static image's page every minute?>
    <meta http-equiv="refresh" content="<?php echo $camRefresh;?>">
<?php }?>
</head>
<body>
<div class="weather34darkbrowser" url="Webcam for <?php echo $stationlocation;?>"></div>     

  
<!-- HOMEWEATHER STATION TEMPLATE SIMPLE WEBCAM -add your url as shown below do NOT delete the class='webcam large' !!! -->
<?php if (!empty($videoWeatherCamURL) && $videoWeatherCamURL != ' ' && $videoWeatherCamURL != 'Null' && $videoWeatherCamURL != 'null'){?>
    <iframe class="videoWeatherCamLarge" allowfullscreen webkitallowfullscreen mozallowfullscreen src="<?php echo $videoWeatherCamURL;?>" frameborder="0"></iframe>
<?php } else {?>
    <img src="<?php echo $webcamurl;?>?v=<?php echo date('YmdGis');?>" alt="weathercam" class="webcamlarge">
<?php }?>
</span>

