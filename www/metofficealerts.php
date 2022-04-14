<?php include('w34CombinedData.php');error_reporting(0); 
?>

<link href="css/popup.<?php echo $theme; ?>.css?version=<?php echo filemtime('css/popup.' . $theme . '.css'); ?>" rel="stylesheet prefetch">

<body>
  <?php if($theme==="dark"){$text1="silver";}
else if($theme==="light"){$text1="black";}
$forecastime = filemtime ('jsondata/uk.txt');?>
<div class="weather34darkbrowser" style="color:<?php echo $text1 ?>;" url="Severe Weather Warning <?php echo $stationName ?>
                                         <?php echo '&nbsp;';echo "Risk Level Updated &nbsp;".date( $timeFormatShort, $forecastime);?>"></div>  
 
<?php


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
       else if($alertlevel[0]=='yellow' && strpos($description[0], "thunder") !== false) {$alerttype='Thunderstorms';$warnimage="css/wrnImages/Thunderstorms_Yellow.svg";}
       else if($alertlevel[0]=='orange' && strpos($description[0], "thunder") !== false) {$alerttype='Thunderstorms';$warnimage="css/wrnImages/Thunderstorms_Orange.svg";}
       else if($alertlevel[0]=='red' && strpos($description[0], "thunder") !== false) {$alerttype='Thunderstorms';$warnimage="css/wrnImages/Thunderstorms_Red.svg";}

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
       else if($alertlevel[$i]=='yellow' && strpos($description[$i], "thunder") !== false) {$alerttype[$i]='Thunderstorms';$warnimage[$i]="css/wrnImages/Thunderstorms_Yellow.svg";}
       else if($alertlevel[$i]=='orange' && strpos($description[$i], "thunder") !== false) {$alerttype[$i]='Thunderstorms';$warnimage[$i]="css/wrnImages/Thunderstorms_Orange.svg";}
       else if($alertlevel[$i]=='red' && strpos($description[$i], "thunder") !== false) {$alerttype[$i]='Thunderstorms';$warnimage[$i]="css/wrnImages/Thunderstorms_Red.svg";}
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
    

<div class="alert-row-narrow" style="color:<?php echo $text1 ?>;font-size:16px;background-color: lightgreen;">
  <img src="css/wrnImages/No Warnings_LightGreen.svg">
    <div class="alert-text-container-narrow" style="background-color: transparent; color:black;">
    <div>There are currently no Severe Weather Warnings in force at <?php echo $stationName;?> Weather Station</div></div></div>
    <div class="alert-row-info" style="background-color:transparent;color:silver;">
    
<table cellspacing="5" cellpadding="0">
	
	
	<tr>
        <td style="padding-left:15px;color:<?php echo $text1 ?>;">
          <b>GLOSSARY</b></br>
		</td>
    </tr>
	<tr>
		<td style="padding-left:15px; background-color:yellow; background-clip: border-box; color:black;">
        </br><b>Description Severity Level 2 Yellow</b></br>
					The weather is potentially dangerous. The weather phenomena that have been forecast are not unusual, but be attentive if you intend to practice activities exposed to meteorological risks. Keep informed about the expected meteorological conditions and do not take any avoidable risk.<br><br>
		</td>
	</tr>
	<tr>
		<td style="padding-left:15px; background-color:orange;  background-clip: border-box; color:black">
        </br><b>Description Severity Level 3 Amber</b></br>
					The weather is dangerous. Unusual meteorological phenomena have been forecast. Damage and casualties are likely to happen. Be very vigilant and keep regularly informed about the detailed expected meteorological conditions. Be aware of the risks that might be unavoidable. Follow any advice given by your authorities.<br><br>
		</td>
	</tr>
	<tr>
		<td style="padding-left:15px; background-color:red; background-clip: border-box; color:black">
        </br><b>Description Severity Level 4 Red</b></br>
					The weather is very dangerous. Exceptionally intense meteorological phenomena have been forecast. Major damage and accidents are likely, in many cases with threat to life and limb, over a wide area. Keep frequently informed about detailed expected meteorological conditions and risks. Follow orders and any advice given by your authorities under all circumstances, be prepared for extraordinary measures.</br></br>
		</td>
	</tr>
	
</table>
    </div>

<?php                          
    break;  
  //default:
    //echo "Your favorite color is neither red, blue, nor green!";
}
?>





</body>
</html>