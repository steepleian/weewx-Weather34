<?php include ('settings.php');include ('shared.php');
error_reporting(0);
$json_string = file_get_contents("jsondata/eu.txt");
$parsed_json = json_decode($json_string, true);
$code = $parsed_json['error']['code'];
?>
<link href="css/popup.<?php echo $theme; ?>.css?version=<?php echo filemtime(
    'css/popup.' . $theme . '.css'
); ?>" rel="stylesheet prefetch">

</head>
<body>
<?php echo '<div class="weather34darkbrowser" url="AerisWeather Alerts for ' .
    $stationlocation .
    '"></div>'; ?> 

  
    <?php
    $cnt = count($parsed_json['response']);
    if ($code == "warn_no_data") {?>
  <p><main class="grid3"><articlegraph3 class="alert-row-narrow" style="background-color:white; font-size:11px;"><img src="css/euicons/Noalert.svg" style="width:75px"><?php
echo "There are no weather alerts in force for this location at the present time. The weather alerts used by this website are provided by AerisWeather using data supplied to them by meteoalarm.org and metoffice.gov.uk. An explanation of the severity of the alerts can be found in the Glossary below.";
?></articlegraph3>
    <main class="grid1"><articlegraph class="alert-row-narrow" style="background-color:teal; font-size:14px;color:white;height:20px"><?php
echo "<b>Glossary</b>";
?></articlegraph>

    <main class="grid3"><articlegraph3 class="alert-row-narrow" style="background-color:lightyellow; font-size:11px;"><img src="css/euicons/lightyellow_triangle.svg" style="width:55px"><?php
echo "Alert Level Minor. Advisory. The weather phenomena that have been forecast are not unusual. Keep informed about the expected meteorological conditions and do not take any avoidable risk.";
?></articlegraph3>
      
    <main class="grid3"><articlegraph3 class="alert-row-narrow" style="background-color:yellow; font-size:11px;"><img src="css/euicons/yellow_triangle.svg" style="width:75px"><?php
echo "Alert Level Yellow. The weather is potentially dangerous. The weather phenomena that have been forecast are not unusual, but be attentive if you intend to practice activities exposed to meteorological risks. Keep informed about the expected meteorological conditions and do not take any avoidable risk.";
?></articlegraph3>
    
    <main class="grid3"><articlegraph3 class="alert-row-narrow" style="background-color:orange; font-size:11px;"><img src="css/euicons/orange_triangle.svg" style="width:75px"><?php
echo "Alert Level Orange. The weather is dangerous. Unusual meteorological phenomena have been forecast. Damage and casualties are likely to happen. Be very vigilant and keep regularly informed about the detailed expected meteorological conditions. Be aware of the risks that might be unavoidable. Follow any advice given by your authorities.";
?></articlegraph3>
      
    <main class="grid3"><articlegraph3 class="alert-row-narrow" style="background-color:red; font-size:11px;"><img src="css/euicons/red_triangle.svg" style="width:75px"><?php
echo "Alert Level Red. The weather is very dangerous. Exceptionally intense meteorological phenomena have been forecast. Major damage and accidents are likely, in many cases with threat to life and limb, over a wide area. Keep frequently informed about detailed expected meteorological conditions and risks. Follow orders and any advice given by your authorities under all circumstances, be prepared for extraordinary measures.";
?></articlegraph3>
<?php
    } else {
        for ($i = 0; $i < $cnt; $i++) {
            

            $name[$i] = $parsed_json['response'][$i]['details']['name'];
            $alerttype[$i] = explode(" ",$name[$i]);
            $bodyFull[$i] = str_replace("No Special Awareness Required", "", $parsed_json['response'][$i]['details']['bodyFull']);
            $type[$i] = $parsed_json['response'][$i]['details']['type'];
            $level[$i] = substr($type[$i], -2);
            if ($level[$i] == "MN") {
                $background[$i] = "lightyellow"; $alertlevel[$i] = "MINOR ALERT FOR ";
            } elseif ($level[$i] == "MD") {
                $background[$i] = "yellow"; $alertlevel[$i] = "YELLOW ALERT FOR ";
            } elseif ($level[$i] == "SV") {
                $background[$i] = "orange"; $alertlevel[$i] = "ORANGE ALERT FOR ";
            } elseif ($level[$i] == "EX") {
                $background[$i] = "red"; $alertlevel[$i] = "RED ALERT FOR ";
            }
            $warnimage[$i] = "css/euicons/" . $type[$i] . ".svg";
            $begins[$i] =
                date("l F Y H:i", strtotime($parsed_json['response'][$i]['timestamps']['beginsISO']));
            $expires[$i] =
                date("l F Y H:i", strtotime($parsed_json['response'][$i]['timestamps']['expiresISO']));
            ?><p><main class="grid2"><articlegraph2 class="alert-row" style="font-size:11px;background-color:<?php echo $background[$i]; ?>"><img src="<?php echo $warnimage[$i]; ?>"style="width:75px"><?php
echo $alertlevel[$i];echo $alerttype[$i][0] . "</br></br>";
echo "From " . $begins[$i] . " until " . $expires[$i] . "</br></br>";
echo $bodyFull[$i] . "</br></br>";
?></articlegraph2>

      <?php
        }
    }
    ?></p>
    
      </main>
</main>
<main class="grid_FT">
<articlegraph_FT style="height:15px">  
  <div class="lotemp">
   <?php echo $info?> CSS/SVG/PHP scripts by steepleian at claydonsweather.org.uk &copy; 2021-<?php echo date('Y');?>  -  <a href="https://www.aerisweather.com/support/docs/api/reference/endpoints/alerts/" title="AerisWeather" target="_blank">Data © <?php echo date('Y'); ?>AerisWeather Alerts</a></span>
  </div>   
    
     
  </articlegraph_FT>
  
</main> 
    
