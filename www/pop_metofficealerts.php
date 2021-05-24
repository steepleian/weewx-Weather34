<?php
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include ('w34CombinedData.php');include ('settings1.php');
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8">
  
  <title>MetOffice Alerts</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--<link href="css/popup.light.css?version=<?php echo filemtime('css/popup.light.css'); ?>" rel="stylesheet prefetch">//-->
<link href="css/popup.<?php echo $theme; ?>.css?version=<?php echo filemtime('css/popup.' . $theme . '.css'); ?>" rel="stylesheet prefetch">

<body>
<?php 
$forecastime = filemtime ('jsondata/uk.txt');?>
<div class="weather34darkbrowser" style="color:<?php echo $text1 ?>;" url="Weather Alerts for <?php echo $stationName ?>
                                         <?php echo '&nbsp;';echo "Risk Level Updated &nbsp;".date( $timeFormatShort, $forecastime);?>"></div>  
 
<?php


        $json = 'jsondata/uk.txt'; 
$json = file_get_contents($json); 
$parsed_json = json_decode($json, true);
if(($parsed_json['rss']['channel']['item'][0]['description'])!==null){$datastream = "multi";}
else if (($parsed_json['rss']['channel']['item']['description']) !== null){$datastream = "single";}
else $datastream = "none";
$favcolor = $datastream;

switch ($favcolor) {
  
  case "single":
    $description[0]=$parsed_json['rss']['channel']['item']['description'];
    $url[0]="https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings#";
    $alidpos[0]=strpos($description[0],"alid");
 	$alidtext[0]="V".substr($description[0],$alidpos[0]);
 	$validpos[0]=strpos($description[0],"valid");
 	$description[0]=substr($description[0], 0, $validpos[0]);
    
       if (strpos($description[0], "Red") === 0) {$alertlevel[0]="red";$warntext="The weather is very dangerous. Exceptionally intense meteorological phenomena have been forecast. Major damage and accidents are likely, in many cases with threat to life and limb, over a wide area. Keep frequently informed about detailed expected meteorological conditions and risks. Follow orders and any advice given by your authorities under all circumstances, be prepared for extraordinary measures.";}

       else if (strpos($description[0], "Amber") === 0) {$alertlevel[0]="orange";$warntext="The weather is dangerous. Unusual meteorological phenomena have been forecast. Damage and casualties are likely to happen. Be very vigilant and keep regularly informed about the detailed expected meteorological conditions. Be aware of the risks that might be unavoidable. Follow any advice given by your authorities.";}

       else if (strpos($description[0], "Yellow") === 0) {$alertlevel[0]="yellow";$warntext="The weather is potentially dangerous. The weather phenomena that have been forecast are not unusual, but be attentive if you intend to practice activities exposed to meteorological risks. Keep informed about the expected meteorological conditions and do not take any avoidable risk.";}

    
       if($alertlevel[0]=='yellow' && strpos($description[0], "wind") !== false) {$alerttype='Wind';$warnimage="css/wrnImages/Wind_Yellow.svg";}
       else if($alertlevel[0]=='orange' && strpos($description[0], "wind") !== false) {$alerttype='Wind';$warnimage="css/wrnImages/Wind_Orange.svg";}
       else if($alertlevel[0]=='red' && strpos($description[0], "wind") !== false) {$alerttype='Wind';$warnimage="css/wrnImages/Wind_Red.svg";}
       else if($alertlevel[0]=='yellow' && strpos($description[0], "snow") !== false) {$alerttype='Snow/Ice';$warnimage="css/wrnImages/Snow_Yellow.svg";}
       else if($alertlevel[0]=='orange' && strpos($description[0], "snow") !== false) {$alerttype='Snow/Ice';$warnimage="css/wrnImages/Snow_Orange.svg";}
       else if($alertlevel[0]=='red' && strpos($description[0], "snow") !== false) {$alerttype='Snow/Ice';$warnimage="css/wrnImages/Snow_Red.svg";}
       else if($alertlevel[0]=='yellow' && strpos($description[0], "ice") !== false) {$alerttype='Snow/Ice';$warnimage="css/wrnImages/Snow_Yellow.svg";}
       else if($alertlevel[0]=='orange' && strpos($description[0], "ice") !== false) {$alerttype='Snow/Ice';$warnimage="css/wrnImages/Snow_Orange.svg";}
       else if($alertlevel[0]=='red' && strpos($description[0], "ice") !== false) {$alerttype='Snow/Ice';$warnimage="css/wrnImages/Snow_Red.svg";}
       else if($alertlevel[0]=='yellow' && strpos($description[0], "fog") !== false) {$alerttype='Fog';$warnimage="css/wrnImages/Fog_Yellow.svg";}
       else if($alertlevel[0]=='orange' && strpos($description[0], "fog") !== false) {$alerttype='Fog';$warnimage="css/wrnImages/Fog_Orange.svg";}
       else if($alertlevel[0]=='red' && strpos($description[0], "fog") !== false) {$alerttype='Fog';$warnimage="css/wrnImages/Fog_Red.svg";}
       else if($alertlevel[0]=='yellow' && stros($description[0], "thunder") !== false) {$alerttype='Thunderstorms';$warnimage="css/wrnImages/Thunderstorms_Yellow.svg";}
       else if($alertlevel[0]=='orange' && strpos($description[0], "thunder") !== false) {$alerttype='Thunderstorms';$warnimage="css/wrnImages/Thunderstorms_Orange.svg";}
       else if($alertlevel[0]=='red' && strpos($description[0], "thunder") !== false) {$alerttype='Thunderstorms';$warnimage="css/wrnImages/Thunderstorms_Red.svg";}

?>
  <main class="grid_MET"><articlegraph_MET class="alert-row-narrow" style="font-size:11px; background-color:<?php echo $alertlevel[0]?>">
                             <div class="alert-row" style="background-color:<?php echo $alertlevel[0]?>">
    <img src="<?php echo $warnimage?>" style="width:70px">
    <div class="alert-text-container">
        <div><?php echo $alidtext[0] ?></br></br><div><?php echo $description[0] ?></br></br><?php echo $warntext ?></a></div></div>
        
</div>    
</div>
</articlegraph_MET>
<?php
    break;
  case "multi":
    $cnt = count($parsed_json['rss']['channel']['item']);echo $cnt;
    for ($i = 0; $i <$cnt; $i++)
{$description[$i]=$parsed_json['rss']['channel']['item'][$i]['description'];
 $url[$i]="https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings#";
 $alidpos[$i]=strpos($description[$i],"alid");
 $alidtext[$i]="V".substr($description[$i],$alidpos[$i]);
 $validpos[$i]=strpos($description[$i],"valid");
 $description[$i]=substr($description[$i], 0, $validpos[$i]);


       
       if (strpos($description[$i], "Red") === 0) {$alertlevel[$i]="red";$warntext="The weather is very dangerous. Exceptionally intense meteorological phenomena have been forecast. Major damage and accidents are likely, in many cases with threat to life and limb, over a wide area. Keep frequently informed about detailed expected meteorological conditions and risks. Follow orders and any advice given by your authorities under all circumstances, be prepared for extraordinary measures.";}

       else if (strpos($description[$i], "Amber") === 0) {$alertlevel[$i]="orange";$warntext="The weather is dangerous. Unusual meteorological phenomena have been forecast. Damage and casualties are likely to happen. Be very vigilant and keep regularly informed about the detailed expected meteorological conditions. Be aware of the risks that might be unavoidable. Follow any advice given by your authorities.";}

       else if (strpos($description[$i], "Yellow") === 0) {$alertlevel[$i]="yellow";$warntext="The weather is potentially dangerous. The weather phenomena that have been forecast are not unusual, but be attentive if you intend to practice activities exposed to meteorological risks. Keep informed about the expected meteorological conditions and do not take any avoidable risk.";}

    
       if($alertlevel[$i]=='yellow' && strpos($description[$i], "wind") !== false) {$alerttype[$i]='Wind';$warnimage[$i]="css/wrnImages/Wind_Yellow.svg";}
       else if($alertlevel[$i]=='orange' && strpos($description[$i], "wind") !== false) {$alerttype[$i]='Wind';$warnimage[$i]="css/wrnImages/Wind_Orange.svg";}
       else if($alertlevel[$i]=='red' && strpos($description[$i], "wind") !== false) {$alerttype[$i]='Wind';$warnimage[$i]="css/wrnImages/Wind_Red.svg";}
       else if($alertlevel[$i]=='yellow' && strpos($description[$i], "snow") !== false) {$alerttype[$i]='Snow/Ice';$warnimage[$i]="css/wrnImages/Snow_Yellow.svg";}
       else if($alertlevel[$i]=='orange' && strpos($description[$i], "snow") !== false) {$alerttype[$i]='Snow/Ice';$warnimage[$i]="css/wrnImages/Snow_Orange.svg";}
       else if($alertlevel[$i]=='red' && strpos($description[$i], "snow") !== false) {$alerttype[$i]='Snow/Ice';$warnimage[$i]="css/wrnImages/Snow_Red.svg";}
       else if($alertlevel[$i]=='yellow' && strpos($description[$i], "ice") !== false) {$alerttype[$i]='Snow/Ice';$warnimage[$i]="css/wrnImages/Snow_Yellow.svg";}
       else if($alertlevel[$i]=='orange' && strpos($description[$i], "ice") !== false) {$alerttype[$i]='Snow/Ice';$warnimage[$i]="css/wrnImages/Snow_Orange.svg";}
       else if($alertlevel[$i]=='red' && strpos($description[$i], "ice") !== false) {$alerttyp[$i]='Snow/Ice';$warnimage[$i]="css/wrnImages/Snow_Red.svg";}
       else if($alertlevel[$i]=='yellow' && strpos($description[$i], "fog") !== false) {$alerttype[$i]='Fog';$warnimage[$i]="css/wrnImages/Fog_Yellow.svg";}
       else if($alertlevel[$i]=='orange' && strpos($description[$i], "fog") !== false) {$alerttype[$i]='Fog';$warnimage[$i]="css/wrnImages/Fog_Orange.svg";}
       else if($alertlevel[$i]=='red' && strpos($description[$i], "fog") !== false) {$alerttype[$i]='Fog';$warnimage[$i]="css/wrnImages/Fog_Red.svg";}
       else if($alertlevel[$i]=='yellow' && stros($description[$i], "thunder") !== false) {$alerttype[$i]='Thunderstorms';$warnimage[$i]="css/wrnImages/Thunderstorms_Yellow.svg";}
       else if($alertlevel[$i]=='orange' && strpos($description[$i], "thunder") !== false) {$alerttype[$i]='Thunderstorms';$warnimage[$i]="css/wrnImages/Thunderstorms_Orange.svg";}
       else if($alertlevel[$i]=='red' && strpos($description[$i], "thunder") !== false) {$alerttype[$i]='Thunderstorms';$warnimage[$i]="css/wrnImages/Thunderstorms_Red.svg";}
?>
<main class="grid_MET"><articlegraph_MET class="alert-row-narrow" style="font-size:11px; background-color:<?php echo $alertlevel[$i]?>">
                            <div class="alert-row" style="background-color:<?php echo $alertlevel[$i]?>">
    <img src="<?php echo $warnimage[$i]?>"style="width:70px">
    <div class="alert-text-container">
      <div><?php echo $cnt; echo $alidtext[$i] ?></br></br><?php echo $description[$i] ?></br></br><?php echo $warntext ?></a></div>
        
    
        
    </div>
</div>
</articlegraph_MET>
<?php 
    }
    break;
  case "none":?>
    
<p><main class="grid3"><articlegraph3 class="alert-row-narrow" style="background-color:white; font-size:11px;"><img src="css/euicons/Noalert.svg" style="width:75px"><?php
echo "There are no weather alerts in force for this location at the present time. The weather alerts used by this website are provided by The UK Metoffice An explanation of the severity of the alerts can be found in the Glossary below.";
?></articlegraph3>
    <main class="grid1"><articlegraph class="alert-row-narrow" style="background-color:teal; font-size:14px;color:white;height:20px"><?php
echo "<b>Glossary</b>";
?></articlegraph>

    
      
    <main class="grid3"><articlegraph3 class="alert-row-narrow" style="background-color:yellow; font-size:11px;"><img src="css/euicons/yellow_triangle.svg" style="width:75px"><?php
echo "Alert Level Yellow. The weather is potentially dangerous. The weather phenomena that have been forecast are not unusual, but be attentive if you intend to practice activities exposed to meteorological risks. Keep informed about the expected meteorological conditions and do not take any avoidable risk.";
?></articlegraph3>
    
    <main class="grid3"><articlegraph3 class="alert-row-narrow" style="background-color:orange; font-size:11px;"><img src="css/euicons/orange_triangle.svg" style="width:75px"><?php
echo "Alert Level Amber. The weather is dangerous. Unusual meteorological phenomena have been forecast. Damage and casualties are likely to happen. Be very vigilant and keep regularly informed about the detailed expected meteorological conditions. Be aware of the risks that might be unavoidable. Follow any advice given by your authorities.";
?></articlegraph3>
      
    <main class="grid3"><articlegraph3 class="alert-row-narrow" style="background-color:red; font-size:11px;"><img src="css/euicons/red_triangle.svg" style="width:75px"><?php
echo "Alert Level Red. The weather is very dangerous. Exceptionally intense meteorological phenomena have been forecast. Major damage and accidents are likely, in many cases with threat to life and limb, over a wide area. Keep frequently informed about detailed expected meteorological conditions and risks. Follow orders and any advice given by your authorities under all circumstances, be prepared for extraordinary measures.";
?></articlegraph3>
<?php                          
    break;  
  
}
?>
<main class="grid_FT">
<articlegraph_FT style="height:15px">  
  <div class="lotemp">
   <?php echo $info?> CSS/SVG/PHP scripts by steepleian at claydonsweather.org.uk &copy; 2021-<?php echo date('Y');?>  -  <a href="https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings#" title="MetOffice" target="_blank">Data © <?php echo date('Y'); ?>UK MetOffice</a></span>
  </div>   
    
     
  </articlegraph_FT>
  
</main>



</body>
</html>  
  

<script type="text/javascript">(function(){if(typeof EzConsentCallback==="function"){var c=a("ezCMPCookieConsent");var g={necessary:0,preferences:0,statistics:0,marketing:0};if(c!==""){var e=c.split("|");for(var d=0;d<e.length;d++){var b=e[d].split("=");if(b.length!==2){break}var f=b[1]=="1"?true:false;switch(b[0]){case"1":g.necessary=f;break;case"2":g.preferences=f;break;case"3":g.statistics=f;break;case"4":g.marketing=f;break}}}EzConsentCallback(g);function a(k){var j=k+"=";var m=decodeURIComponent(document.cookie);var h=m.split(";");for(var l=0;l<h.length;l++){var n=h[l];while(n.charAt(0)==" "){n=n.substring(1)}if(n.indexOf(j)==0){return n.substring(j.length,n.length)}}return""}}})();</script>
<script type="text/javascript"  async src="/utilcave_com/inc/ezcl.webp?cb=4"></script>