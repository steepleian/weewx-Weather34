<?php include('w34CombinedData.php'); $weather["cloudbase3"] = round((anyToC($weather["temp"]) - anyToC($weather["dewpoint"])) * 1000 /2.4444) ;
$locationinfo='<svg id="i-location2" viewBox="0 0 32 32" width="15px" height="15px" fill="none" stroke="rgba(255, 124, 57, 1.000)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
<circle cx="16" cy="11" r="4" /><path d="M24 15 C21 22 16 30 16 30 16 30 11 22 8 15 5 8 10 2 16 2 22 2 27 8 24 15 Z" /></svg>';
$alert="<svg id='firealert' viewBox='0 0 32 32' width='18px' height='18px' fill='none' stroke='rgba(255, 124, 57, 1.000)' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
<path d='M16 3 L30 29 2 29 Z M16 11 L16 19 M16 23 L16 25' /></svg>";
//weather AIR QUALITY / CLOUDBASE MODULE APRIL 2018
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 Cloudbase & Air Quality Data Popup </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
 <style>
@font-face{font-family:weathertext;src:url(css/fonts/sanfranciscodisplay-regular-webfont.woff) format("woff")}*,*:before,*:after{-webkit-box-sizing:border-box;box-sizing:border-box;margin:0;padding:0}html,body{font-size:62.5%;font-family: "weathertext",Helvetica, Arial, sans-serif;background:rgba(11, 12, 12, 0.4); background-repeat:no-repeat}body{color:#aaa;overflow:hidden;height:105vh;padding:10px}section{width:80vw;max-width:64rem;min-width:58.9rem;margin-left:75px;padding:10px}.weather34title{font-size:14px;font-weight:normal;padding-top:3px;font-family: "weathertext",Helvetica, Arial, sans-serif;width:400px}.weather34cards{padding-top:2rem;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;padding:5px}.weather34card{width:31rem;height:17.1rem;background-color:0;border-radius:4px;position:relative;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;color:#aaa;font-size:11px;font-weight:normal;padding:10px;border:solid #444 1px}.weather34card__weather34-container{height:50%;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:end;-ms-flex-align:end;align-items:flex-end;padding:10px;font-family: "weathertext",Helvetica, Arial, sans-serif;}.weather34card__weather34-wrapper{width:8rem;font-family: "weathertext",Helvetica, Arial, sans-serif;font-weight:300;}.weather34cardguide{width:27rem;height:200px;background:RGBA(37,41,45,0);border-radius:4px;position:relative;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;color:#aaa;font-size:12px;font-weight:normal;padding:5px;border:solid #444 1px;line-height:13px}.weather34card__weather34-guide{width:3rem;font-family: "weathertext",Helvetica, Arial, sans-serif;font-weight:300;}.weather34card__count-container{-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding:10px;font-family: "weathertext",Helvetica, Arial, sans-serif;}.weather34card__count-text{font-family: "weathertext",Helvetica, Arial, sans-serif;;text-align:left;width:200px}.weather34card__count-textuv{font-family: "weathertext",Helvetica, Arial, sans-serif;;width:200px;float:left;font-size:13px;text-align:left;margin-left:-20px;line-height:12px}.weather34card__count-text--big{font-size:36px;font-weight:200;font-family: "weathertext",Helvetica, Arial, sans-serif;}.weather34card__count-text--bigs{font-size:12px;font-family: "weathertext",Helvetica, Arial, sans-serif;;font-weight:normal;color:#aaa;text-align:center;margin-top:5px;width:100px}weather34card__count-text--bigsa{font-size:12px;font-family: "weathertext",Helvetica, Arial, sans-serif;;font-weight:normal;color:#aaa;text-align:center}
.weather34card__stuff-container{margin-top:35px;font-family: "weathertext",Helvetica, Arial, sans-serif;;text-align:left;font-size:12px;width:800px;float:left;list-style:circle;margin-left:-45px;}
.weather34card:after{content:"";display:block;position:absolute;top:0;left:0;width:16rem;height:4.625rem;padding:10px}.weather34card--earthquake1:after{background-image:radial-gradient(to bottom,rgba(106,122,135,0.5),transparent 70%)}.weather34card--earthquake2:after{background-image:radial-gradient(to bottom,rgba(106,191,96,0.5),transparent 70%)}.weather34card--earthquake3:after{background-image:radial-gradient(to bottom,rgba(96,203,231,0.5),transparent 70%)}blue{color:#01a4b4}orange{color:#ff8841}green{color:#9aba2f}red{color:#f37867}red6{color:#d65b4a}darkred{color:#f47264}value{color:#fff}yellow{color:RGBA(163,133,58,1)}purple{color:#916392}time{color:#aaa;font-weight:normal;font-family: "weathertext",Helvetica, Arial, sans-serif;}time span{color:#ff8841;font-weight:normal;font-family: "weathertext",Helvetica, Arial, sans-serif;}a{color:#aaa;font-size:11px;top:5px;margin-top:10px;text-decoration:none}.provided{position:absolute;color:#aaa;font-size:11px;bottom:7px;text-decoration:none;margin-left:100px;}updated{position:absolute;bottom:5px;float:right}
actual{font-size:13px;float:right;position:absolute;left:135px;top:20px;-webkit-border-radius:4px;-moz-border-radius:4px;-o-border-radius:4px;border-radius:4px;background:rgba(61, 64, 66, 1.000);padding:5px;}.uvmaxi3{position:absolute;left:-30px;color:rgba(0, 154, 171, 1.000);margin-top:-40px;font-size:16px;width:240px;}.uvmaxi3 span{color:#aaa}.hitemp{color:#aaa;font-size:12px;}.hitemp span{color:rgba(255, 124, 57, 1.000)}
.hitempy{background:rgba(61, 64, 66, 0.8);color:#aaa;font-size:12px;width:240px;padding:1px;border-radius:4px;margin-top:2px;margin-left:0;padding-left:3px;}
.lotemp{font-size:26px;font-family: "weathertext",Helvetica, Arial, sans-serif;font-weight:300;}
blue{color:rgba(0, 154, 171, 1.000)}.icon{position:absolute;right:10px;bottom:10px;}
.weather34i-cloud-bar{background:0;position:absolute;height:100px;width:100px;margin-left:135px;margin-top:8px}
.weather34i-cloud-bar .bar{shape-rendering:crispEdges;background:url(css/rain/cloudmarker.svg) no-repeat;width:100px;border:5px solid rgba(57, 61, 64, 1.00);border-bottom:3px solid rgba(57, 61, 64, 1.00);border-top:1px dotted rgba(57, 61, 64, 1.00);-webkit-border-radius:1px 1px 3px 3px;-moz-border-radius:1px 1px 3px 3px;-o-border-radius:1px 1px 3px 3px;-ms-border-radius:1px 1px 3px 3px;border-radius:1px 1px 3px 3px;position:absolute;bottom:0}
.weather34i-cloud-bar .bar-1{height:100px;max-height:100px}
.weather34i-cloud-bar .bar-inner{shape-rendering:crispEdges;background:rgba(159, 163, 166, 0.4);width:100%;-webkit-border-radius:1px 1px 3px 3px;-moz-border-radius:1px 1px 3px 3px;-o-border-radius:1px 1px 3px 3px;-ms-border-radius:1px 1px 3px 3px;border-radius:1px 1px 3px 3px;border:0;border-top:1px dotted rgba(255, 124, 57, 1.000)}
.weather34icloudair{color:rgba(255, 124, 57, 1.000);position:absolute;margin-left:165px;margin-top:67px;font-family: "weathertext",Helvetica, Arial, sans-serif;max-height:42px;font-weight:normal;background:#2a2e33;width:42px;height:42px;-webkit-border-radius:100%;-moz-border-radius:100%;-o-border-radius:100%;-ms-border-radius:100%;border-radius:100%;font-size:15px;line-height:10px;padding-top:13px;border:.12rem solid rgba(95,96,97,.9);}
.weather34icloudair span{font-family: "weathertext",Helvetica, Arial, sans-serif;font-size:0.8em;font-weight:normal;margin-left:-2px;}

.weather34icloudair1{color:rgba(255, 124, 57, 1.000);position:absolute;margin-left:165px;margin-top:47px;font-family: "weathertext",Helvetica, Arial, sans-serif;max-height:42px;font-weight:normal;background:#2a2e33;width:41px;height:42px;-webkit-border-radius:100%;-moz-border-radius:100%;-o-border-radius:100%;-ms-border-radius:100%;border-radius:100%;font-size:14px;line-height:10px;padding-top:13px;border:.12rem solid rgba(95,96,97,.9);padding-left:3px;}
.weather34icloudair1 span{font-family: "weathertext",Helvetica, Arial, sans-serif;font-size:0.7em;font-weight:normal;margin-left:5px;color:#aaa;}

.weather34-aqi-bar{background:0;position:absolute;height:100px;width:100px;margin-left:135px;margin-top:48px}
.weather34-aqi-bar .bar{shape-rendering:crispEdges;background:0;width:100px;border:0;position:absolute;bottom:0}
.weather34-aqi-bar .bar-1{height:100px;max-height:100px}
.weather34aqi{color:#ff8841;position:absolute;margin-left:36px;margin-top:17px;font-size:12px;width:20px;font-family: "weathertext",Helvetica, Arial, sans-serif;max-height:100px;line-height:10px;font-weight:normal}
.weather34aqi span{color:#777;font-family:weathertext,arial,sans-serif;font-size:12px}
actual1{font-size:13px;float:left;position:absolute;left:11px;top:20px;-webkit-border-radius:4px;-moz-border-radius:4px;-o-border-radius:4px;border-radius:4px;background:rgba(61, 64, 66, 1.000);padding:5px;}
actual2{font-size:12px;float:left;position:absolute;left:10px;top:70px;-webkit-border-radius:4px;-moz-border-radius:4px;-o-border-radius:4px;border-radius:4px;background:rgba(61, 64, 66, 1.000);padding:5px;
width:120px;}
maroon{color:rgba(208, 80, 65, 0.7)};purple{color:rgba(154, 106, 196, 1)};red{color:rgba(208, 80, 65, 1)}orange{color:rgba(255, 124, 57, 1)}yellow{color:rgba(186, 146, 58, 1)}green{color:rgba(144, 177, 42, 1)}grey{color:#aaa}
aqiimage1{position:absolute;left:-5px;top:-2px;}blue{color:rgba(144, 177, 42, 1.000)}


.aqilocation{position:absolute;top:25px;left:20px;font-size:0.5em;font-family:Arial, Helvetica, sans-serif;}
.aqilocation span{position:absolute;top:30px;left:10px;font-size:12px;font-family:Arial, Helvetica, sans-serif;display:block;width:70px;}
.aqilocation span2{position:absolute;top:15px;left:-20px;font-size:12px;font-family:Arial, Helvetica, sans-serif;width:130px;color:#aaa;}
.aqilocation span3{position:absolute;top:5px;left:35px;font-size:12px;font-family:Arial, Helvetica, sans-serif;width:100px;}
.aqilocation mod{position:absolute;top:5px;}
.aqitime{font-size:11px;color:#aaa;position:absolute;top:27px;left:140px;width:130px;}

aqiimage1{position:absolute;left:-5px;top:-2px;}


.aqigraphic{position:absolute;left:0;}


.extraqiinfo{position:absolute;top:10px;font-size:12px;color:#aaa;left:175px;width:100px}
.extraqiinfo2{position:absolute;top:20px;font-size:12px;color:#aaa;left:175px;width:100px}

.airhouse{position:absolute;margin-top:0;margin-left:20px;z-index:99999}.airsvg{position:relative;margin-top:5px;left:27px;}airvalue{position:absolute;top:25px;left:135px;font-size:26px;}airvalue0{position:absolute;top:-10px;left:135px;font-size:26px;}
span11{position:absolute;margin-top:60px;font-size:16px;line-height:14px;width:200px;left:135px;}airdescription{position:absolute;font-size:16px;left:48px;text-align:left;width:100px;margin-top:20px;border:0;padding:0;text-align:center;}indoorpurple{color:#a475cb;}indoorblue,indoorgreen,indoororange,indoorred,indooryellow{font-family:weathertext,helvetica,arial}indoorred{color:rgba(211,93,78,1)}indoororange{color:#ff8841}indoorgreen{color:#9aba2f}indoorblue{color:#01a4b4}indooryellow{color:rgba(233, 171, 74, 1.000)}.lotemp1{font-size:22px;font-family: "weathertext",Helvetica, Arial, sans-serif;font-weight:300;}

.air0,.air50,.air100,.air150,.air200,.air300{font-family:'weathertext',Arial,Helvetica,system;width:8rem;height:7.68rem;font-size:1.50rem;padding-top:0;color:#fff;border-bottom: 15px solid rgba(56, 56, 60, 1);display:flex;align-items:center;justify-content:center;-webkit-border-radius: 3px;-moz-border-radius: 3px;-o-border-radius: 3px;border-radius: 3px;margin-left:40px;margin-top:20px;}
.air0{background:rgba(144, 177, 42, 1.000)}
.air50{background:rgba(230, 161, 65, 1.000)}
.air100{background:rgba(255, 124, 57, 0.8)}
.air150{background:rgba(211, 93, 78, 0.8)}
.air200{background:#a475cb}
.air250{background:#a475cb}
.air300{background:#a475cb}


.cloudbase0,.cloudbase1500{font-family:'weathertext',Arial,Helvetica,system;width:8rem;height:7.68rem;font-size:1.70rem;padding-top:0;color:#fff;border-bottom: 15px solid rgba(56, 56, 60, 1);display:flex;align-items:center;justify-content:center;-webkit-border-radius: 3px;-moz-border-radius: 3px;-o-border-radius: 3px;border-radius: 3px;margin-left:40px;margin-top:21px;}
.cloudbase0{background:rgba(68, 166, 181, 1.000)}
.cloudbase1500{background:rgba(230, 161, 65, 1.000)}


.indoorblue1,.indoorgreen1,.indoororange1,.indoorred1,.indooryellow1,.indoorpurple1{font-family:'weathertext',Arial,Helvetica,system;width:4.9rem;height:4.4rem;font-size:1.4rem;padding-top:7px;color:#333;background:rgba(59, 156, 172, 1.000);border-bottom: 10px solid rgba(56, 56, 60, 1);display:flex;align-items:center;justify-content:center;-webkit-border-radius: 3px;-moz-border-radius: 3px;-o-border-radius: 3px;border-radius: 3px;position:absolute;margin-left:-10px;top:-5px}
.indoorred1{background:rgba(211,93,78,1)}.indoororange1{background:#ff8841}.indoorgreen1{background:#9aba2f}.indoorblue1{background:#01a4b4}.indooryellow1{background:rgba(233,171,74,1)}.indoorpurple1{background:#a475cb}

.circlegreen{padding-top:10px;padding-left:5px;background:#9aba2f; -webkit-border-radius:100%;-moz-border-radius:100%;-o-border-radius:100%;border-radius:100%;width:45px;height:45px;position:absolute;margin-top:0;color:#fff;line-height:28px;font-size:13px;color:#fff;}
.circleyellow{padding-top:10px;padding-left:5px;background:rgba(233, 171, 74, 1); -webkit-border-radius:100%;-moz-border-radius:100%;-o-border-radius:100%;border-radius:100%;width:45px;height:45px;position:absolute;margin-top:0;color:#fff;line-height:28px;font-size:13px;}
.circleorange{padding-top:10px;padding-left:5px;background: #ff8841; -webkit-border-radius:100%;-moz-border-radius:100%;-o-border-radius:100%;border-radius:100%;width:45px;height:45px;position:absolute;margin-top:0;color:#fff;line-height:28px;font-size:13px;}
.circlered{padding-top:10px;padding-left:5px;background:rgba(211,93,78,1); -webkit-border-radius:100%;-moz-border-radius:100%;-o-border-radius:100%;border-radius:100%;width:45px;height:45px;position:absolute;margin-top:0;color:#fff;line-height:28px;font-size:13px;}
.circlepurple{padding-top:10px;padding-left:5px;;background:#a475cb; -webkit-border-radius:100%;-moz-border-radius:100%;-o-border-radius:100%;border-radius:100%;width:45px;height:45px;position:absolute;margin-top:0;color:#fff;line-height:28px;font-size:13px;}
.airwarning{position:absolute;margin-left:160px;margin-top:70px;}.airwarning1{position:absolute;margin-left:225px;margin-top:75px;}
.weather34darkbrowser{position:relative;background:0;width:104%;max-height:30px;margin:auto;margin-top:-15px;margin-left:-20px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:45px;background-image:radial-gradient(circle,#EB7061 6px,transparent 8px),radial-gradient(circle,#F5D160 6px,transparent 8px),radial-gradient(circle,#81D982 6px,transparent 8px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),linear-gradient(to bottom,rgba(59,60,63,0.4) 40px,transparent 0);background-position:left top,left top,left top,right top,right top,right top,0 0;background-size:50px 45px,90px 45px,130px 45px,50px 30px,50px 45px,50px 60px,100%;background-repeat:no-repeat,no-repeat}.weather34darkbrowser[url]:after{content:attr(url);color:#aaa;font-size:14px;position:absolute;left:0;right:0;top:0;padding:2px 15px;margin:11px 50px 0 90px;border-radius:3px;background:rgba(97, 106, 114, 0.3);height:20px;box-sizing:border-box}
smalluvunit{position:absolute;display:inline;font-size:.85rem;font-family:Arial,Helvetica,system;vertical-align:top}
</style>
</head>
<body>
<div class="weather34darkbrowser" url="<?php echo $stationlocation ?> Air Quality | Cloudbase Data"></div>
 
           
<section class="weather34cards">
   <div class="weather34card weather34card--earthquake1">
               <div class="weather34card_weather34-container">
               
            <div class="weather34card_weather34-wrapper"><span class="weather34card__count-text--big">
            <div class="lotemp1">Cloudbase</div>
              <div class="weather34i-cloud-bar">
<div class="bar bar-1" style="height:100px;max-height:100px;"> 
<?php //cloudbase weather34
echo '<div class="bar bar-inner" style="max-height:90px;height: ';echo $weather["cloudbase3"]/100;?>px;">
</div></div></div>
<div class="weather34icloudair1">
   
<?php  
 echo "",$weather["cloudbase3"] ;echo "<span> feet </span>";
 ?>
</span></div> 
</div>
 <div class="lotemp">
<div class="aqigraphic">
<div class="airqualitymoduleposition">

<?php //WEATHER34 AIR QAULITY SVG
if ($weather["cloudbase3"]>1500){echo "<div class=cloudbase1500>".$weather["cloudbase3"]." <smalluvunit>ft</smalluvunit><br>".round($weather["cloudbase3"]*0.3048,0)."<smalluvunit>m</smalluvunit>
"; }
else if ($weather["cloudbase3"]>0){echo "<div class=cloudbase0>".$weather["cloudbase3"]." <smalluvunit>ft</smalluvunit><br>".round($weather["cloudbase3"]*0.3048,0)."<smalluvunit>m</smalluvunit>
"; }



?>
</div></div></div>
  
  
 
  </div>
     
     <div class="weather34card__count-container">
     <div class="weather34card__count-text"></div></div>
     <div class="weather34card__stuff-container">            
<div class="weather34card__stuff-text"> 	
</div></div>

</div></div></div></div>
    
       
    <div class="weather34card weather34card--earthquake2">
               <div class="weather34card_weather34-container">
            <div class="weather34card_weather34-wrapper"><span class="weather34card__count-text--big">
            
         
 
	<?php  //air quality	
$json_string             = file_get_contents("jsondata/aqi.txt");
$parsed_json             = json_decode($json_string);
$aqiweather["aqi"]       = $parsed_json->{'aqiv'};
$aqiweather["aqiozone"]  = $parsed_json->{'data'}->{'iaqi'}->{'o3'}->{'v'};
$aqiweather["aqiozone"]  = 'N/A';
$aqiweather["time2"]     = $parsed_json->{'mtime'};
$aqiweather["time"]      = date("H:i",$aqiweather["time2"]);
$aqiweather["city"]      ='<span>Istanbul</span>';
$a="";if($aqiweather["aqi"]==$a){$aqiweather["aqi"] = "N/A" ;}

?>
<div class="lotemp1">Air Quality</div>
</div>

<div class="aqigraphic">
<div class="airqualitymoduleposition">

<?php //WEATHER34 AIR QAULITY SVG
if ($aqiweather["aqi"]>300){echo "<div class=air300><img src='css/aqi/hazair.svg?ver=1.4' width='110px' height='100px' alt='weather34 hazardous air quality' title='weather34 hazardous air quality' "; }
else if ($aqiweather["aqi"]>200){echo "<div class=air200><img src='css/aqi/vhair.svg?ver=1.4' width='110px' height='100px' alt='weather34 very unhealthy air quality' title='weather34 very unhealthy air quality'" ; }
else if ($aqiweather["aqi"]>150){echo "<div class=air150><img src='css/aqi/uhair.svg?ver=1.4' width='110px' height='100px' alt='weather34 unhealthy air quality' title='weather34 unhealthy air quality'" ; }
else if ($aqiweather["aqi"]>100){echo "<div class=air100><img src='css/aqi/uhfsair.svg?ver=1.4' width='110px' height='100px'  alt='weather34 unhealthy for some air quality' title='weather34 unhealthy for some air quality'" ; }
else if ($aqiweather["aqi"]>50){echo "<div class=air50><img src='css/aqi/modair.svg?ver=1.4' width='110px' height='100px' alt='weather34 moderate air quality' title='weather34 moderate air quality'" ; }
else if ($aqiweather["aqi"]>=0){echo "<div class=air0><img src='css/aqi/goodair.svg?ver=1.4' width='110px' height='100px' alt='weather34 good air quality' title='weather34 good air quality'" ; }

?>
</div></div></div>
  

<?php //WEATHER34 AIR QAULITY VALUE 
 if ($aqiweather["aqi"] >300){echo "<airvalue><indoorred>",$aqiweather["aqi"] ;echo " <br></div><span11>Hazardous" ; }
 else if ($aqiweather["aqi"] >200){echo "<airvalue><indoorpurple>",$aqiweather["aqi"] ;echo " <br></div><span11>Very <br>Unhealthy" ; }
 else if ($aqiweather["aqi"] >150){echo "<airvalue><indoorred>",$aqiweather["aqi"] ;echo " <br></div><span11>Unhealthy" ; }
 else if ($aqiweather["aqi"] >100){echo "<airvalue><indoororange>",$aqiweather["aqi"] ;echo " </indoororange><br></div><span11>Unhealthy <br>For Some" ; }
 else if ($aqiweather["aqi"] >50){echo "<airvalue0><indooryellow>&nbsp; &nbsp;",$aqiweather["aqi"] ;echo " <br></div><span11>Moderate" ; }
 else if ($aqiweather["aqi"] >=0){echo "<airvalue0><indoorgreen>&nbsp; &nbsp;",$aqiweather["aqi"] ;echo " <br></div><span11>Good" ; }
 //WEATHER34 air quality description
 
 ?>
 
 
            
 </div>
            
            
            
            <div class="extraqiinfo">
<?php echo "Station ID:" .$aqiweather["city"]. " ".$aqiweather["state"];?>
<?php echo "Updated:<green> " .$aqiweather["time"] ?></green>
</div>
<div class="airwarning1"><?php 
if ($aqiweather["aqi"]>300){echo "<div class=indoorred1>PM10" ; }
else if ($aqiweather["aqi"]>200){echo "<div class=indoorpurple1>PM10" ; }
else if ($aqiweather["aqi"]>150){echo "<div class=indoorred1>PM10" ; }
else if ($aqiweather["aqi"]>100){echo "<div class=indoororange1>PM10" ; }
else if ($aqiweather["aqi"]>50){echo "<div class=indooryellow1>PM10" ; }
else if ($aqiweather["aqi"]>=0){echo "<div class=indoorgreen1>PM10" ; }
?></div>
        </div>
        <div class="weather34card__count-container">
            <div class="weather34card__count-textuv">
                <span class="weather34card__count-text--bigs">    
                </div>
        </div><br>
        <div class="weather34card__stuff-container">           
      
</section>

<section class="weather34cards">
   <div class="weather34card weather34card--earthquake1">
               <div class="weather34card_weather34-container">
            <div class="weather34card_weather34-wrapper"><span class="weather34card__count-text--big">
 </span> 
<div class="lotemp">
<div class="icon"><img src=css/icons/temp34.svg width=25px></div>

            </div> </div>
        </div>
        <div class="weather34card__count-container">
            <div class="weather34card__count-textuv">
                <span class="weather34card__count-text--big">  </span></div>  
          <div class="weather34card__stuff-container" ><br>
           Based on the common formula temperature & dewpoint recorded realtime from this weather station to calculate an estimated height of the cloudbase.It is not a accurate tool it is a relative indicator. <br> 
           Measured in <orange>feet</orange> or <orange>meters</orange>.        
            
<actual1>Information on Cloudbase </actual1></div></div></div></div>



    <div class="weather34card weather34card--earthquake2">
               <div class="weather34card_weather34-container">
            <div class="weather34card_weather34-wrapper"><span class="weather34card__count-text--big">
          </div>
 </span> 
        </div>
        <div class="weather34card__count-container">
            <div class="weather34card__count-textuv">
                <span class="weather34card__count-text--big">  </span></div>  
          
          <div class="weather34card__stuff-container" >
           <li><blue>0-50 GOOD</blue></li>
           <li><yellow>50+ MODERATE</yellow></li>
           <li><orange>100+ Unhealthy for Sensitive Groups</orange></li>
           <li><red>150+ Unhealthy </red>(Precautions Required)</li>
           <li><purple>200+ Very Unhealthy</purple> (Critical Conditions)</purple></li>
           <li><maroon>300+ Hazardous</maroon> (Life Threatening)</maroon></li>
           
            
<actual1>Information on Air Quality </actual1>     

<div class="icon"><img src=img/airvisuallogo.svg width=55px style="opacity:0.9" alt="https://www.airvisual.com/api" title="https://www.airvisual.com/api"></div></div></div></div></div>
</section>
<div class="weather34browser-footer">
<div class="provided">   
&nbsp; <?php echo $info?>
Air Quality data provided by <a href="https://www.airvisual.com/api" title="https://www.airvisual.com/api" target="_blank">https://www.airvisual.com/api</a> <?php echo $info;?><a href="https://weather34.com" title="weather34.com" target="_blank"><?php echo $copyrightcredit;?></a></div>
</body>
</html>
