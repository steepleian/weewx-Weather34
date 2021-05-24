<?php include('w34CombinedData.php');error_reporting(0); 
?>

<link href="css/popup.<?php echo $theme; ?>.css?version=<?php echo filemtime('css/popup.' . $theme . '.css'); ?>" rel="stylesheet prefetch">

<body>
  <?php if($theme==="dark"){$text1="silver";$url="cyan";}
else if($theme==="light"){$text1="black";$url="blue";}
$forecastime = filemtime ('jsondata/ns.txt');?> 
<?php


        $json = 'jsondata/ns.txt'; 
$json = file_get_contents($json); 
$parsed_json = json_decode($json, true);
//$cnt=count($parsed_json['rss']['channel']['item']); echo $cnt;
$title1=$parsed_json['rss']['channel']['title'];
?>
<div class="weather34darkbrowser" style="color:<?php echo $text1 ?>;" url="<?php echo $title1?>"></div>
<main class="grid1"  style="font-size:13px";>  
<?php
  for ($i = 0; $i <count($parsed_json['rss']['channel']['item']); $i++)
{
 $title2[$i]=$parsed_json['rss']['channel']['item'][$i]['title'];
 $link[$i]=$parsed_json['rss']['channel']['item'][$i]['link'];
 $pubDate[$i]=$parsed_json['rss']['channel']['item'][$i]['pubDate'];
 $guid[$i]=$parsed_json['rss']['channel']['item'][$i]['guid']['#text'];
?>

<articlegraph>  
  <div class="lotemp" style="color:<?php echo $text1 ?>;";>
                     <?php echo $title2[$i]?> 
<a href="<?php echo $link[$i]?>" title="<?php echo $link[$i]?>" target="_blank" style="color:<?php echo $url ?>;"> <?php echo $link[$i]?> </a>
  </div>
  
   
  </articlegraph>   
 <?php } ?>   
        
    </div>
 
<div class="weather34browser-footer">
</div>
  </main>