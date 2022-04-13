<?php
//###################################################################################################################
//	weewx-Weather34 Template maintained by Ian Millard (Steepleian)                                 				#
//	                                                                                                				#
//  Contains original code by Ian Millard and collaborators															#
//  © claydonsweather.org.uk original CSS/SVG/PHP 2020-2021                                                         #
// 	                                                                                                				#
// 	Issues for weewx-Weather34 template should be addressed to https://github.com/steepleian/weewx-Weather34/issues #                                                                                              #
// 	                                                                                                				#
//###################################################################################################################
include "settings.php";
include "shared.php";
error_reporting(0);
if ($theme === "dark")
{
    echo '<style>.demo{border:0 solid #aaa;border-collapse:collapse;padding:50px;font-family:arial,helvetica,verdana,sans-serif;font-size:10px;margin-bottom:50px;margin-top:50px margin-left:50%;margin-right:-50%;width:100%;color:silver}.demo th{border-bottom:.5px solid #aaa;/*! border-top:1px solid #aaa; */
 padding:5px;color:silver}.demo td{border:0 solid #aaa;padding:0;background:0;text-align:center}.demo td#CELL1{background-color:transparent;color:#000}.demo td#CELL2{background-color:#9cff9c}.demo td#CELL3{background-color:#31ff00}.demo td#CELL4{background-color:#31cf00}.demo td#CELL5{background-color:#ff0}.demo td#CELL6{background-color:#ffcf00}.demo td#CELL7{background-color:#ff9a00}.demo td#CELL8{background-color:#ff6464}.demo td#CELL9{background-color:red;color:#fff}.demo td#CELL10{background-color:#900;color:#fff}.demo td#CELL11{background-color:#ce30ff;color:#fff}img{margin-left:10px;margin-right:10px;width:60px;background-color:transparent}.alert-row{display:flex;flex-direction:row;height:120px;padding:10px 0;background-color:whitesmoke}.alert-row-narrow{display:flex;flex-direction:row;height:60px;padding:10px 0;background-color:whitesmoke;font-size:12px}.alert-row-info{display:flex;flex-direction:row;height:120px;padding:10px 0;background-color:whitesmoke}.alert-text-container{font-family:Arial,Helvetica,sans-serif;font-size:11px;display:flex;flex-direction:column;justify-content:center;margin-right:10px;color:#000}.alert-text-container-narrow{font-family:Arial,Helvetica,sans-serif;font-size:14px;display:flex;flex-direction:column;justify-content:center;margin-right:10px}body{background-image:url();margin-left:8px;margin-top:8px;margin-right:8px;margin-bottom:8px;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px;color:#fff;font-weight:400;background-color:rgba(33,34,39,.8)}html{margin:0;padding:0}a:link{color:#fff}a:visited{color:#fff}a:hover{color:#fff}a:active{color:#fff}.LegendText2{font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px;color:#fff;font-weight:400}.Ebene3Header{font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px}table{font-size:11px;vertical-align:bottom;width:auto}.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));grid-gap:5px;align-items:stretch;color:#f5f7fc;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid>article{border:1px solid #212428;box-shadow:2px 2px 6px 0 rgba(0,0,0,.3);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid1{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:5px;color:#000}.grid2{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:0;color:#000}.grid3{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:20px;color:#000}.grid1>articlegraph{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100%}.grid2>articlegraph2{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100%}.grid3>articlegraph3{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.grid1>articlegraph_lg{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:lightgreen;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:80px}.grid3>articlegraph3{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:0;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.grid3>articlegraphText{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#f5f7fc;color:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.grid1>articlegraph_te{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:teal;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:15px}.grid1>articlegraph_ye{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:yellow;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:80px}.grid1>articlegraph_or{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:orange;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90px}.grid1>articlegraph_re{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:red;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100px}.grid_FT{display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));grid-gap:1px;align-items:stretch;color:#f5f7fc;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid_FT>articlegraph_FT{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;color:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:15px}.grid_MET{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:5px;color:#000}.grid_MET>articlegraph_MET{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.weather34darkbrowser{position:relative;width:97%;height:30px;margin:auto;margin-top:-5px;margin-left:0;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px;color:#fff}.weather34darkbrowser[url]:after{content:attr(url);font-size:14px;text-align:center;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;font-family:arial;height:20px}.actualt{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:teal;padding:5px;font-family:Arial,Helvetica,sans-serif;width:790px;height:.8em;font-size:.8rem;padding-top:2px;color:#fff;border-bottom:2px solid rgba(56,56,60,1);align-items:center;justify-content:center;margin-bottom:0;top:0}blue{color:#01a4b4}orange{color:#009bb4}orange1{color:rgba(255,131,47,1)}green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#cc0}purple{color:#916392}.roundcornerframe{position:relative;width:790px;border-radius:5px;overflow:hidden;margin:0 auto 0 auto}.ol_time{margin-top:-15px;margin-right:6px;color:#d65b4a;font:700 10px arial,sans-serif;line-height:10px;float:right}.left{float:left;width:80px;padding-left:2px;height:160px;border:none}.right{float:left;width:80px;padding-right:2px;height:160px;border:none}.middle{float:left;width:140px;position:relative;height:160px;border:none}.2_high{height:80px;vertical-align:middle}.3_high{height:53px;vertical-align:middle}.4_high{height:40px;vertical-align:middle}.uv{color:#000}.webcamlarge{-webkit-border-radius:4px;-moz-border-radius:4px;-o-border-radius:4px;-ms-border-radius:4px;border-radius:4px;border:solid RGBA(84,85,86,1) 2px;width:98%;height:380px}
    </style>';
}
elseif ($theme === "light")
{
    echo '<style>.demo{border:0 solid #aaa;border-collapse:collapse;padding:50px;font-family:arial,helvetica,verdana,sans-serif;font-size:10px;margin-bottom:50px;margin-top:50px margin-left:50%;margin-right:-50%;width:100%;color:#000}.demo th{border-bottom:1px solid #aaa;/*! border-top:1px solid #aaa; */
 padding:5px;color:#000}.demo td{border:0 solid #aaa;padding:0;background:#FFF;text-align:center}.demo td#CELL1{background-color:transparent;color:#000}.demo td#CELL2{background-color:#9cff9c}.demo td#CELL3{background-color:#31ff00}.demo td#CELL4{background-color:#31cf00}.demo td#CELL5{background-color:#ff0}.demo td#CELL6{background-color:#ffcf00}.demo td#CELL7{background-color:#ff9a00}.demo td#CELL8{background-color:#ff6464}.demo td#CELL9{background-color:red;color:#fff}.demo td#CELL10{background-color:#900;color:#fff}.demo td#CELL11{background-color:#ce30ff;color:#fff}img{margin-left:10px;margin-right:10px;width:60px;background-color:transparent}.alert-row{display:flex;flex-direction:row;height:120px;padding:10px 0;background-color:whitesmoke}.alert-row-narrow{display:flex;flex-direction:row;height:60px;padding:10px 0;background-color:whitesmoke;font-size:12px}.alert-row-info{display:flex;flex-direction:row;height:120px;padding:10px 0;background-color:whitesmoke}.alert-text-container{font-family:Arial,Helvetica,sans-serif;font-size:11px;display:flex;flex-direction:column;justify-content:center;margin-right:10px;color:#000}.alert-text-container-narrow{font-family:Arial,Helvetica,sans-serif;font-size:14px;display:flex;flex-direction:column;justify-content:center;margin-right:10px}body{background-image:url();margin-left:8px;margin-top:8px;margin-right:8px;margin-bottom:8px;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px;color:#fff;font-weight:400;background-color:#fff}html{margin:0;padding:0}a:link{color:#000}a:visited{color:#000}a:hover{color:#000}a:active{color:#000}.LegendText2{font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px;color:#000;font-weight:400}.Ebene3Header{font-family:Verdana,Arial,Helvetica,sans-serif;font-size:11px}table{font-size:11px;vertical-align:bottom;width:auto}.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));grid-gap:5px;align-items:stretch;color:#f5f7fc;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid>article{border:1px solid #212428;box-shadow:2px 2px 6px 0 rgba(0,0,0,.3);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid1{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:5px;color:#000}.grid2{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:0;color:#000}.grid3{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:20px;color:#000}.grid1>articlegraph{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100%}.grid2>articlegraph2{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100%}.grid3>articlegraph3{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.grid3>articlegraph4{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.grid1>articlegraph_lg{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:lightgreen;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:80px}.grid1>articlegraph_te{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:teal;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:15px}.grid1>articlegraph_ye{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:yellow;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:80px}.grid1>articlegraph_or{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:orange;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90px}.grid1>articlegraph_re{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background-color:red;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:100px}.grid_FT{display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));grid-gap:1px;align-items:stretch;color:#f5f7fc;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.grid_FT>articlegraph_FT{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;color:#000;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:15px}.grid_MET{display:grid;grid-template-columns:repeat(auto-fill,minmax(100%,1fr));grid-gap:5px;color:#000}.grid_MET>articlegraph_MET{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:#fff;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:790px;height:90%}.weather34darkbrowser{position:relative;width:97%;height:30px;margin:auto;margin-top:-5px;margin-left:0;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px;color:#000}.weather34darkbrowser[url]:after{content:attr(url);font-size:14px;text-align:center;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;font-family:arial;height:20px}.actualt{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:teal;padding:5px;font-family:Arial,Helvetica,sans-serif;width:790px;height:.8em;font-size:.8rem;padding-top:2px;color:#fff;border-bottom:2px solid rgba(56,56,60,1);align-items:center;justify-content:center;margin-bottom:0;top:0}blue{color:#01a4b4}orange{color:#009bb4}orange1{color:rgba(255,131,47,1)}green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#cc0}purple{color:#916392}.roundcornerframe{position:relative;width:790px;border-radius:5px;overflow:hidden;margin:0 auto 0 auto}.webcamlarge{-webkit-border-radius:4px;-moz-border-radius:4px;-o-border-radius:4px;-ms-border-radius:4px;border-radius:4px;border:solid RGBA(84,85,86,1) 2px;width:97%;height:480px}
    </style>';
}
$json_icon = file_get_contents("jsondata/lookupTable.json");
$parsed_icon = json_decode($json_icon, true);
$json_string = file_get_contents("jsondata/awa.txt");
$parsed_json = json_decode($json_string, true);
$code = $parsed_json["error"]["code"];
?>


</head>
<body>
<?php echo '<div class="weather34darkbrowser" url="AerisWeather Alerts for ' . $stationlocation . '"></div>'; ?> 

  
    <?php
$cnt = count($parsed_json["response"]);
if ($code == "warn_no_data")
{ ?>
  <p><main class="grid3"><articlegraph3 class="alert-row-narrow" style="background-color:white; font-size:10px;"><img src="css/svg/icon-warning-noalert-white.svg" style="width:75px; height:75px;"><ul><li><?php
        echo "NO WEATHER ALERTS in force for this location at the present time."
?></li></br><li><?php echo "The weather alerts used by this website are provided by AerisWeather using data supplied to them by meteoalarm.org. An explanation of the severity of the alerts can be found in the Glossary below.";
?></li></ul></articlegraph3>
    <main class="grid1"><articlegraph class="alert-row-narrow" style="background-color:teal; font-size:12px;color:white;height:20px"><?php
        echo "<b>Glossary</b>";
?></articlegraph>

    
      
    <main class="grid3"><articlegraph3 class="alert-row-narrow" style="background-color:yellow; font-size:10px;"><img src="css/svg/icon-warning-generic-yellow.svg" style="width:75px; height:75px;"><ul><li><?php
        echo "YELLOW ALERT. Yellow warnings can be issued for a range of weather situations."
?></li></br><li><?php echo "It is important to read the content of yellow warnings to determine which weather situation is being covered by the warning.";
?></li></ul></articlegraph3>
    
    <main class="grid3"><articlegraph3 class="alert-row-narrow" style="background-color:orange; font-size:10px;"><img src="css/svg/icon-warning-generic-orange.svg" style="width:75px; height:75px;"><ul><li><?php
        echo "ORANGE ALERT. There is an increased likelihood of impacts from severe weather, which could potentially disrupt your plans."
?></li></br><li><?php echo "This means there is the possibility of travel delays, road and rail closures, power cuts and the potential risk to life and property.";
?></li></ul></articlegraph3>
      
    <main class="grid3"><articlegraph3 class="alert-row-narrow" style="background-color:red; font-size:10px; color:white;"><img src="css/svg/icon-warning-generic-red.svg" style="width:75px; height:75px;"><ul><li><?php
        echo "RED ALERT. Dangerous weather is expected and, if you have not done so already, you should take action now to keep yourself and others safe from the impact of the severe weather."
?></li></br><li><?php echo "It is very likely that there will be a risk to life, with substantial disruption to travel, energy supplies and possibly widespread damage to property and infrastructure.";
?></li></ul></articlegraph3><?php
}
else
{
    for ($i = 0;$i < $cnt;$i++)
    {

        $name[$i] = $parsed_json["response"][$i]["details"]["name"];
        $alerttype[$i] = explode(" ", $name[$i]);
        $bodyFull[$i] = str_replace("No Special Awareness Required", "", $parsed_json["response"][$i]["details"]["bodyFull"]);
        $type[$i] = $parsed_json["response"][$i]["details"]["type"];
        $alertdesc[$i] = substr($type[$i], 0 ,5);
        $level[$i] = substr($type[$i], -2);
        if ($level[$i] == "MD")
        {
            $background[$i] = "yellow";
            $alertlevel[$i] = "YELLOW ALERT FOR ";
        }
        elseif ($level[$i] == "SV")
        {
            $background[$i] = "orange";
            $alertlevel[$i] = "ORANGE ALERT FOR ";
        }
        elseif ($level[$i] == "EX")
        {
            $background[$i] = "red";
            $alertlevel[$i] = "RED ALERT FOR ";
        }
        $alerttype[$i] = $parsed_icon['pop']['alertdesc'][$alertdesc[$i]];
        $warnimage[$i] = "css/svg/" . $parsed_icon[$background[$i]][$type[$i]];
        $begins[$i] = date("l F Y H:i", strtotime($parsed_json["response"][$i]["timestamps"]["beginsISO"]));
        $expires[$i] = date("l F Y H:i", strtotime($parsed_json["response"][$i]["timestamps"]["expiresISO"]));
?><p><main class="grid2"><articlegraph2 class="alert-row" style="font-size:11px;background-color:<?php echo $background[$i]; ?>"><img src="<?php echo $warnimage[$i]; ?>"style="height:75%";><?php
        echo $alertlevel[$i];
        echo $alerttype[$i]. "</br></br>";
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
   <?php echo $info; ?> CSS/SVG/PHP scripts by steepleian at claydonsweather.org.uk &copy; 2021-<?php echo date("Y"); ?>  -  <a href="https://www.aerisweather.com/support/docs/api/reference/endpoints/alerts/" title="AerisWeather" target="_blank">Data © <?php echo date("Y"); ?>AerisWeather Alerts</a></span>
  </div>   
    
     
  </articlegraph_FT>
  
</main>
