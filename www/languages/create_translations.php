<?php
$defaultlanguage="en";
$fn = fopen('lang.'.$defaultlanguage.'.php', "r") or die("Cannot read input file "."lang.".$defaultlanguage.".php");
$rWrite = fopen('translations.js', 'w') or die("Cannot write output file ".'translations.js');
fwrite( $rWrite, "var translations = {" . PHP_EOL);
while($row = fgets($fn)) {
   if ((strpos($row, "#") == 0) && (strpos($row, "span") == 0) && (strpos($row, "=") > 0)){
      $row = str_replace(array("'", "]", ";", "\$lang["), "", $row);
      $row = str_replace("'", '"', $row);
      if (strpos($row, "//") > 0) $row = substr($row, 0, strpos($row, "//")); 
      list($key, $value ) = explode( "=", $row );
      fwrite($rWrite, "'".trim($key)."': "."'".trim($value)."',\n");}}
fwrite($rWrite,"};" . PHP_EOL);
fclose( $fn );
fclose( $rWrite );
?>
