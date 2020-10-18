<?php error_reporting(0);include('settings.php');
$section = file_get_contents('https://swd.weatherflow.com/swd/rest/observations/device/'.$weatherflowdairID.'?api_key='.$somethinggoeshere.'');file_put_contents('jsondata/weatherflow1.txt',$section);
$section1 = file_get_contents('https://swd.weatherflow.com/swd/rest/observations/station/'.$weatherflowID.'?api_key='.$somethinggoeshere.'');file_put_contents('jsondata/weatherflow.txt',$section1);
?>