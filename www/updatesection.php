<?php
function find_variable($strings, $str, $rstr){
    for ($x = 0; $x < count($strings); $x++) {
       $parts = explode("=", $strings[$x]);
       $parts[0] = trim($parts[0]);
       $s_len = strlen($str);
       if (substr($parts[0], 0, $s_len) == $str and $s_len == strlen($parts[0])){
           if (strlen($rstr) == 0)
               return str_replace("'","",str_replace('"','',str_replace(";","",trim($parts[1]))));
           else {
               $strings[$x] = $parts[0].' = '.'"'.$rstr.'";'."\n";
               return $strings;
           }
       }
    }
    return "";
}
$pos = '$'.$_GET['pos'];
$filetext = file('settings1.php');
$positions = find_variable($filetext, $pos.'s', '');
$positiontitles = find_variable($filetext, $pos.'titles', '');
$currenttitle = find_variable($filetext, $pos.'title', '');
if (strlen($positions) > 0 and strlen($positiontitles) > 0) {
    $urls = explode("!", $positions);
    $titles = explode("!", $positiontitles);
    for ($x = 0; $x < count($titles); $x++) {
        if ($currenttitle == $titles[$x]) {
            $x = ($x + 1) % count($titles); 
            $strings = find_variable(find_variable($filetext, $pos, $urls[$x]), $pos.'title', $titles[$x]);
            if (count($strings) > 0)
                file_put_contents('settings1.php',$strings,LOCK_EX);
            sleep(3);
            break;
        }
    }
}
header( "refresh:0.1; url=index.php"); 
?>
