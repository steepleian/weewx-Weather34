<?php include ('w34CombinedData.php');
error_reporting(0); ?>
<style>body{background:rgba(30, 31, 35, 1.000);}
.weather34darkbrowser{position:relative;background:0;width:97%;height:30px;margin:auto;margin-top:-5px;margin-left:0px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px;}
.weather34darkbrowser[url]:after{content:attr(url);color:#aaa;font-size:14px;text-align: center;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;font-family:arial;height:20px;}
</style>
<link rel="stylesheet" href="weather34chartstyle.css">
<script type="text/javascript">var cmpIsOn = true;</script></head>
<body>
<?php
echo '<div class="weather34darkbrowser" url="Timelapse ' . $stationlocation . '"></div>';

echo '<iframe src="img/timelapse.mp4" width="100%" height="90%" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>';

echo "</span>";
?>
<script type="text/javascript">(function(){if(typeof EzConsentCallback==="function"){var c=a("ezCMPCookieConsent");var g={necessary:0,preferences:0,statistics:0,marketing:0};if(c!==""){var e=c.split("|");for(var d=0;d<e.length;d++){var b=e[d].split("=");if(b.length!==2){break}var f=b[1]=="1"?true:false;switch(b[0]){case"1":g.necessary=f;break;case"2":g.preferences=f;break;case"3":g.statistics=f;break;case"4":g.marketing=f;break}}}EzConsentCallback(g);function a(k){var j=k+"=";var m=decodeURIComponent(document.cookie);var h=m.split(";");for(var l=0;l<h.length;l++){var n=h[l];while(n.charAt(0)==" "){n=n.substring(1)}if(n.indexOf(j)==0){return n.substring(j.length,n.length)}}return""}}})();</script>
<script type="text/javascript"  async src="/utilcave_com/inc/ezcl.webp?cb=4"></script>