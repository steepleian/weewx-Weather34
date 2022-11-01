#############################################################################################################
#	                                  DivumWX Administration Main Page                                      #
#                                                                                                           #
#  DivumWX © 2022 by Ian Millard, Steven Sheeley and Other Collaborators is licensed under CC BY-NC-SA 4.0  #
#############################################################################################################
<?php
    include_once ('../../w34CombinedData.php');
    include_once ('../../common.php');
    include_once ('../../webserver_ip_address.php');
    include ('../../settings1.php');include ('settings.php');
    date_default_timezone_set($TZ);
    header('Content-type: text/html; charset=utf-8');
    error_reporting(0);
?>
<!DOCTYPE html>
<html LANG="EN">
    <head>
        <title><?php echo $stationlocation; ?> Weather Station</title>
        <link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
        <link href="./ccs/favicon.ico" rel="icon" type="image/x-icon">
        <style>
            .parent {
                display: grid;
                grid-template-columns: repeat(9, 10%);
                grid-template-rows: repeat(8, 1fr);
                grid-column-gap: 3px;
                grid-row-gap: 3px;
                }

            .logo { grid-area: 1 / 1 / 2 / 2; }
            .menu { grid-area: 2 / 1 / 9 / 2; }
            .banner { grid-area: 1 / 2 / 2 / 10; }
            .box1 { grid-area: 2 / 2 / 4 / 6; }
            .box2 { grid-area: 2 / 6 / 4 / 10; }
            .info1-1 { grid-area: 4 / 2 / 6 / 4; }
            .info1-2 { grid-area: 4 / 4 / 6 / 6; }
            .info1-3 { grid-area: 4 / 6 / 6 / 8; }
            .info1-4 { grid-area: 4 / 8 / 6 / 10; }
            .info2-1 { grid-area: 6 / 2 / 8 / 5; }
            .info2-2 { grid-area: 6 / 5 / 8 / 8; }
            .info2-3 { grid-area: 6 / 8 / 8 / 10; }
            .button1 { grid-area: 8 / 2 / 9 / 3; }
            .button2 { grid-area: 8 / 3 / 9 / 4; }
            .button3 { grid-area: 8 / 4 / 9 / 5; }
            .button5 { grid-area: 8 / 5 / 9 / 6; }
            .copyright { grid-area: 8 / 6 / 9 / 10; }
        </style>
    </head>
    <body>
        <div class="parent">
            <div class="logo"> </div>
            <div class="menu"> </div>
            <div class="banner"> </div>
            <div class="box1"> </div>
            <div class="box2"> </div>
            <div class="info1-1"> </div>
            <div class="info1-2"> </div>
            <div class="info1-3"> </div>
            <div class="info1-4"> </div>
            <div class="info2-1"> </div>
            <div class="info2-2"> </div>
            <div class="info2-3"> </div>
            <div class="button1"> </div>
            <div class="button2"> </div>
            <div class="button3"> </div>
            <div class="button5"> </div>
            <div class="copyright"> </div>
        </div>
</body>
</html>