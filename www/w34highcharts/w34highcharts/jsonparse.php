<?php

/**
 * Set the callback variable to what jQuery sends over
 */
$callback = (string)$_GET['callback'];
if (!$callback) $callback = 'callback';

/**
 * The $filename parameter determines what file to load from local source
 */
$filename = $_GET['filename'];

	$json = file_get_contents($filename);

// Send the output
header('Content-Type: text/javascript');
echo "$callback($json);";

?>