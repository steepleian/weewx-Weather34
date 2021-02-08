<?php include('w34CombinedData.php');error_reporting(0); 
?>
<style>
body{background:rgba(30, 31, 35, 1.000);}  
.weather34darkbrowser{position:relative;background:0;width:103.3%;max-height:30px;margin:auto;margin-top:-15px;margin-left:-20px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:45px;background-image:radial-gradient(circle,#EB7061 6px,transparent 8px),radial-gradient(circle,#F5D160 6px,transparent 8px),radial-gradient(circle,#81D982 6px,transparent 8px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),linear-gradient(to bottom,rgba(59,60,63,0.4) 40px,transparent 0);background-position:left top,left top,left top,right top,right top,right top,0 0;background-size:50px 45px,90px 45px,130px 45px,50px 30px,50px 45px,50px 60px,90%;background-repeat:no-repeat,no-repeat}.weather34darkbrowser[url]:after{content:attr(url);color:#aaa;font-size:14px;position:absolute;left:0;right:0;top:0;padding:2px 15px;margin:11px 50px 0 90px;border-radius:3px;background:rgba(97, 106, 114, 0.3);height:20px;box-sizing:border-box;font-family:Arial, Helvetica, sans-serif}

  img {
  margin-left:10px;
  margin-right:10px;
   
  width: 210px;
}

.alert-row {
  display: flex;
  flex-direction: row;
  height: 130px;
  padding: 10px 0;
  background-color: lightgreen;
}

.alert-text-container {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 10px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  margin-right:10px;
}
/* unvisited link */
a:link {
  color: blue;
}

/* visited link */
a:visited {
  color: blue;
}

/* mouse over link */
a:hover {
  color: brown;
}

/* selected link */
a:active {
  color: blue;
}
  div.c {
  text-transform: capitalize;
}
</style>
<body>
<?php


  echo '<div class="weather34darkbrowser" url="MetOffice Severe Weather Warnings for '.$stationlocation.'"></div><p style="color:orange">';
      $json = 'jsondata/uk.txt'; 
$json = file_get_contents($json); 
$parsed_json = json_decode($json, true);
if(($parsed_json['rss']['channel']['item'][0]['description'])!==null){$datastream = "multi";}
else if (($parsed_json['rss']['channel']['item']['description']) !== null){$datastream = "single";}
else $datastream = "none";
//echo $datastream;

$favcolor = $datastream;

switch ($favcolor) {
  
  case "single":
    $description[0]=$parsed_json['rss']['channel']['item']['description'];
    $url[0]=$parsed_json['rss']['channel']['item']['guid']['#text'];
    $alidpos[0]=strpos($description[0],"alid");
 	$alidtext[0]=substr($description[0],$alidpos[0]);
 	$validpos[0]=strpos($description[0],"valid");
 	$description[0]=substr($description[0], 0, $validpos[0]);
    
       if (strpos($description[0], "Red") === 0) {$alertlevel[0]="red";$warntext="The weather is very dangerous. Exceptionally intense meteorological phenomena have been forecast. Major damage and accidents are likely, in many cases with threat to life and limb, over a wide area. Keep frequently informed about detailed expected meteorological conditions and risks. Follow orders and any advice given by your authorities under all circumstances, be prepared for extraordinary measures.";}

       else if (strpos($description[0], "Amber") === 0) {$alertlevel[0]="orange";$warntext="The weather is dangerous. Unusual meteorological phenomena have been forecast. Damage and casualties are likely to happen. Be very vigilant and keep regularly informed about the detailed expected meteorological conditions. Be aware of the risks that might be unavoidable. Follow any advice given by your authorities.";}

       else if (strpos($description[0], "Yellow") === 0) {$alertlevel[0]="yellow";$warntext="The weather is potentially dangerous. The weather phenomena that have been forecast are not unusual, but be attentive if you intend to practice activities exposed to meteorological risks. Keep informed about the expected meteorological conditions and do not take any avoidable risk.";}

    
       if($alertlevel[0]=='yellow' && strpos($description[0], "wind") !== false) {$alerttype='Wind';$warnimage="css/wrnImages/Wind_Yellow.jpg";}
       else if($alertlevel[0]=='orange' && strpos($description[0], "wind") !== false) {$alerttype='Wind';$warnimage="css/wrnImages/Wind_Orange.jpg";}
       else if($alertlevel[0]=='red' && strpos($description[0], "wind") !== false) {$alerttype='Wind';$warnimage="css/wrnImages/Wind_Red.jpg";}
       else if($alertlevel[0]=='yellow' && strpos($description[0], "snow") !== false) {$alerttype='Snow/Ice';$warnimage="css/wrnImages/siy.jpg";}
       else if($alertlevel[0]=='orange' && strpos($description[0], "snow") !== false) {$alerttype='Snow/Ice';$warnimage="css/wrnImages/sio.jpg";}
       else if($alertlevel[0]=='red' && strpos($description[0], "snow") !== false) {$alerttype='Snow/Ice';$warnimage="css/wrnImages/sir.jpg";}
       else if($alertlevel[0]=='yellow' && strpos($description[0], "ice") !== false) {$alerttype='Snow/Ice';$warnimage="css/wrnImages/siy.jpg";}
       else if($alertlevel[0]=='orange' && strpos($description[0], "ice") !== false) {$alerttype='Snow/Ice';$warnimage="css/wrnImages/sio.jpg";}
       else if($alertlevel[0]=='red' && strpos($description[0], "ice") !== false) {$alerttype='Snow/Ice';$warnimage="css/wrnImages/sir.jpg";}
       else if($alertlevel[0]=='yellow' && strpos($description[0], "fog") !== false) {$alerttype='Fog';$warnimage="css/wrnImages/fy.jpg";}
       else if($alertlevel[0]=='orange' && strpos($description[0], "fog") !== false) {$alerttype='Fog';$warnimage="css/wrnImages/fo.jpg";}
       else if($alertlevel[0]=='red' && strpos($description[0], "fog") !== false) {$alerttype='Fog';$warnimage="css/wrnImages/fr.jpg";}
       else if($alertlevel[0]=='yellow' && strpos($description[0], "flood") !== false) {$alerttype='Flood';$warnimage="css/wrnImages/fly.jpg";}
       else if($alertlevel[0]=='orange' && strpos($description[0], "flood") !== false) {$alerttype='Flood';$warnimage="css/wrnImages/flo.jpg";}
       else if($alertlevel[0]=='red' && strpos($description[0], "flood") !== false) {$alerttype='Flood';$warnimage="css/wrnImages/flr.jpg";}
       else if($alertlevel[0]=='yellow' && strpos($description[0], "flooding") !== false) {$alerttype='Flood';$warnimage="css/wrnImages/fly.jpg";}
       else if($alertlevel[0]=='orange' && strpos($description[0], "flooding") !== false) {$alerttype='Flood';$warnimage="css/wrnImages/flo.jpg";}
       else if($alertlevel[0]=='red' && strpos($description[0], "flooding") !== false) {$alerttype='Flood';$warnimage="css/wrnImages/flr.jpg";}
       else if($alertlevel[0]=='yellow' && stros($description[0], "thunder") !== false) {$alerttype='Thunderstorms';$warnimage="css/wrnImages/ty.jpg";}
       else if($alertlevel[0]=='orange' && strpos($description[0], "thunder") !== false) {$alerttype='Thunderstorms';$warnimage="css/wrnImages/to.jpg";}
       else if($alertlevel[0]=='red' && strpos($description[0], "thunder") !== false) {$alerttype='Thunderstorms';$warnimage="css/wrnImages/tr.jpg";}

  // echo $alerttype;
  // echo $warnimage 
?>
                            <div class="alert-row" style="background-color:<?php echo $alertlevel[0]?>">
    <img src="<?php echo $warnimage?>">
    <div class="alert-text-container">
        <div>V<?php echo $alidtext[0] ?></br></br><div><?php echo $description[0] ?></br></br><?php echo $warntext ?></br></br><a href=<?php echo $url[0] ?> title="MetOffice UK Weather Warnings" target="_blank">More information</a></div></div>
        
    </div>
</div>
<?php
    break;
  case "multi":
    for ($i = 0; $i <2; $i++)
{$description[$i]=$parsed_json['rss']['channel']['item'][$i]['description'];
 $url[$i]=$parsed_json['rss']['channel']['item'][$i]['guid']['#text'];
 $alidpos[$i]=strpos($description[$i],"alid");
 $alidtext[$i]=substr($description[$i],$alidpos[$i]);
 $validpos[$i]=strpos($description[$i],"valid");
 $description[$i]=substr($description[$i], 0, $validpos[$i]);


       
       if (strpos($description[$i], "Red") === 0) {$alertlevel[$i]="red";$warntext="The weather is very dangerous. Exceptionally intense meteorological phenomena have been forecast. Major damage and accidents are likely, in many cases with threat to life and limb, over a wide area. Keep frequently informed about detailed expected meteorological conditions and risks. Follow orders and any advice given by your authorities under all circumstances, be prepared for extraordinary measures.";}

       else if (strpos($description[$i], "Amber") === 0) {$alertlevel[$i]="orange";$warntext="The weather is dangerous. Unusual meteorological phenomena have been forecast. Damage and casualties are likely to happen. Be very vigilant and keep regularly informed about the detailed expected meteorological conditions. Be aware of the risks that might be unavoidable. Follow any advice given by your authorities.";}

       else if (strpos($description[$i], "Yellow") === 0) {$alertlevel[$i]="yellow";$warntext="The weather is potentially dangerous. The weather phenomena that have been forecast are not unusual, but be attentive if you intend to practice activities exposed to meteorological risks. Keep informed about the expected meteorological conditions and do not take any avoidable risk.";}

    
       if($alertlevel[$i]=='yellow' && strpos($description[$i], "wind") !== false) {$alerttype[$i]='Wind';$warnimage[$i]="css/wrnImages/Wind_Yellow.jpg";}
       else if($alertlevel[$i]=='orange' && strpos($description[$i], "wind") !== false) {$alerttype[$i]='Wind';$warnimage[$i]="css/wrnImages/Wind_Orange.jpg";}
       else if($alertlevel[$i]=='red' && strpos($description[$i], "wind") !== false) {$alerttype[$i]='Wind';$warnimage[$i]="css/wrnImages/Wind_Red.jpg";}
       else if($alertlevel[$i]=='yellow' && strpos($description[$i], "snow") !== false) {$alerttype[$i]='Snow/Ice';$warnimage[$i]="css/wrnImages/siy.jpg";}
       else if($alertlevel[$i]=='orange' && strpos($description[$i], "snow") !== false) {$alerttype[$i]='Snow/Ice';$warnimage[$i]="css/wrnImages/sio.jpg";}
       else if($alertlevel[$i]=='red' && strpos($description[$i], "snow") !== false) {$alerttype[$i]='Snow/Ice';$warnimage[$i]="css/wrnImages/sir.jpg";}
       else if($alertlevel[$i]=='yellow' && strpos($description[$i], "ice") !== false) {$alerttype[$i]='Snow/Ice';$warnimage[$i]="css/wrnImages/siy.jpg";}
       else if($alertlevel[$i]=='orange' && strpos($description[$i], "ice") !== false) {$alerttype[$i]='Snow/Ice';$warnimage[$i]="css/wrnImages/sio.jpg";}
       else if($alertlevel[$i]=='red' && strpos($description[$i], "ice") !== false) {$alerttyp[$i]='Snow/Ice';$warnimage[$i]="css/wrnImages/sir.jpg";}
       else if($alertlevel[$i]=='yellow' && strpos($description[$i], "fog") !== false) {$alerttype[$i]='Fog';$warnimage[$i]="css/wrnImages/fy.jpg";}
       else if($alertlevel[$i]=='orange' && strpos($description[$i], "fog") !== false) {$alerttype[$i]='Fog';$warnimage[$i]="css/wrnImages/fo.jpg";}
       else if($alertlevel[$i]=='red' && strpos($description[$i], "fog") !== false) {$alerttype[$i]='Fog';$warnimage[$i]="css/wrnImages/fr.jpg";}
       else if($alertlevel[$i]=='yellow' && strpos($description[$i], "flood") !== false) {$alerttype[$i]='Flood';$warnimage[$i]="css/wrnImages/fly.jpg";}
       else if($alertlevel[$i]=='orange' && strpos($description[$i], "flood") !== false) {$alerttype[$i]='Flood';$warnimage[$i]="css/wrnImages/flo.jpg";}
       else if($alertlevel[$i]=='red' && strpos($description[$i], "flood") !== false) {$alerttype[$i]='Flood';$warnimage[$i]="css/wrnImages/flr.jpg";}
       else if($alertlevel[$i]=='yellow' && strpos($description[$i], "flooding") !== false) {$alerttype[$i]='Flood';$warnimage[$i]="css/wrnImages/fly.jpg";}
       else if($alertlevel[$i]=='orange' && strpos($description[$i], "flooding") !== false) {$alerttype[$i]='Flood';$warnimage[$i]="css/wrnImages/flo.jpg";}
       else if($alertlevel[$i]=='red' && strpos($description[$i], "flooding") !== false) {$alerttype[$i]='Flood';$warnimage[$i]="css/wrnImages/flr.jpg";}
       else if($alertlevel[$i]=='yellow' && stros($description[$i], "thunder") !== false) {$alerttype[$i]='Thunderstorms';$warnimage[$i]="css/wrnImages/ty.jpg";}
       else if($alertlevel[$i]=='orange' && strpos($description[$i], "thunder") !== false) {$alerttype[$i]='Thunderstorms';$warnimage[$i]="css/wrnImages/to.jpg";}
       else if($alertlevel[$i]=='red' && strpos($description[$i], "thunder") !== false) {$alerttype[$i]='Thunderstorms';$warnimage[$i]="css/wrnImages/tr.jpg";}
?>
                            <div class="alert-row" style="background-color:<?php echo $alertlevel[$i]?>">
    <img src="<?php echo $warnimage[$i]?>">
    <div class="alert-text-container">
      <div>V<?php echo $alidtext[$i] ?></br></br><?php echo $description[$i] ?></br></br><?php echo $warntext ?></br></br><a href=<?php echo $url[$i] ?> title="MetOffice UK Weather Warnings" target="_blank">More information</a></div>
        
    
        
    </div>
</div>                           
<?php 
    }
    break;
  case "none":?>
    <div class="alert-row" style="background-color:lightgreen">
    <img src="css/wrnImages/No Warnings_LightGreen.jpg">
    <div class="alert-text-container">
        <div><?php echo "No warnings in force." ?></br></br><?php echo "No particular awareness required" ?></div>
        
    </div>
</div> 
<?php                          
    break;  
  //default:
    //echo "Your favorite color is neither red, blue, nor green!";
}
?>




<div class="provided">
  <div style="position:absolute;bottom:10px;z-index:9999;font-weight:normal;font-size:14px;color:#aaa;text-decoration:none !important;float:right;font-family:arial;">

   &nbsp;&nbsp;MetOffice UK Weather Warnings <a href="https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings#" title="MetOffice UK Weather Warnings" target="_blank">https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings</a>  
</div>
</body>
</html>
