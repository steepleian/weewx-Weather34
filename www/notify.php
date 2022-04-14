<?php
if ($notifications == 'yes') {

    # Check battery levels
    if ($weather['consoleLowBattery'] || $weather['stationLowBattery']) {?>
        <div id="weather34lightningdialog-notify">
            <div class="weather34lightningdialog-box">
                <div class="weather34lightningbackground-alert"></div>
                <div class="header">
                    <div class="weather34lightningbackground-alert"></div>
                    <div class="weather34lightningcontents">
                        <div class="left"><?php echo $notifyAlert.' '.$lang['notifyAlert'];?></div>
                        <div class="right"><?php echo date ("D H:i")?></div>
                    </div>
                </div>
                <div class="weather34lightningcontents weather34lightningmain-content">
                    <?php echo $lang['notifyLowBatteryAlert'];?><br/>
                    <notifyred>
                        <?php if ($weather['consoleLowBattery'] && $weather['stationLowBattery']) {
                            echo $lang['notifyConsoleLowBattery'].'<br/>';
                            echo $lang['notifyStationLowBattery'];
                        } else if ($weather['consoleLowBattery']) {
                            echo $lang['notifyConsoleLowBattery'];
                        } else if ($weather['stationLowBattery']){
                            echo $lang['notifyStationLowBattery'];
                        } else {?>
                            Not sure why you're seeing this...
                        <?php }?>
                    </notifyred>
                </div>
            </div>
        </div>
    <?php }

    //WEATHER34 pure css UV-Index above 8  pop up alert
    if ($weather["uv"]>=8){?>
        <div id="weather34lightningdialog-notify">
            <div class="weather34lightningdialog-box">
                <div class="weather34lightningbackground-alert"></div>
                <div class="header">
                    <div class="weather34lightningbackground-alert"></div>
                    <div class="weather34lightningcontents">
                        <div class="left"><?php echo $notification.' '.$lang['notifyTitle'];?></div>
                        <div class="right"><?php echo date ("D H:i")?></div>
                    </div>
                </div>
                <div class="weather34lightningcontents weather34lightningmain-content">
                    <?php echo $lang['notifyUVIndex'];?><br/>
                    <?php echo $lang['notifyUVExposure'];?> <notifyorange><?php echo $weather["uv"];?></notifyorange><?php echo $uvisvg;?>
                </div>
            </div>
        </div>
    <?php }

    //WEATHER34 pure css temperature heat index above 30c/84F  pop up alert
    if(anyToC($weather["heatindex"])>=30){?>
        <div id="weather34lightningdialog-notify">
            <div class="weather34lightningdialog-box">
                <div class="weather34lightningbackground-alert"></div>
                <div class="header">
                    <div class="weather34lightningbackground-alert"></div>
                    <div class="weather34lightningcontents">
                        <div class="left"><?php echo $notification.' '.$lang['notifyTitle'];?></div>
                        <div class="right"><?php echo date ("D H:i")?></div>
                    </div>
                </div>
                <div class="weather34lightningcontents weather34lightningmain-content">
                    <?php echo $lang['Heatindexalert'];?><br/>
                    <?php echo $lang['notifyHeatExaustion'];?> <notifyorange><?php echo $weather["heatindex"];?>&deg;<?php echo $weather["temp_units"];?></notifyorange>
                </div>
            </div>
        </div>
    <?php }

    //WEATHER34 pure css wind gusts of 40kmh to Gale Force pop up alert
    if ($notifyWind == 'yes') {
        if($weather["wind_gust_speed"]*$toKnots>=39.9 || $weather["wind_speed_avg30"]*$toKnots>=21.7){?>
            <div id="weather34lightningdialog-notify">
                <div class="weather34lightningdialog-box">
                    <div class="weather34lightningbackground-alert"></div>
                    <div class="header">
                        <div class="weather34lightningbackground-alert"></div>
                        <div class="weather34lightningcontents">
                            <div class="left"><?php echo $notification.' '.$lang['notifyTitle'];?></div>
                            <div class="right"><?php echo date ("D H:i")?></div>
                        </div>
                    </div>
                    <div class="weather34lightningcontents weather34lightningmain-content">
                        <?php if ($weather["wind_gust_speed"]*$toKnots>=99.9 || $weather["wind_speed"]*$toKnots>=99.9) {?>
                            <?php echo $lang['notifyExtremeWind'];?><br/>
                            <?php echo $lang['notifyGustUpTo'];?> <notifyred><?php echo $weather["wind_gust_speed"];?></notifyred> <?php echo $weather["wind_units"];?><br/>
                            <?php echo $lang['notifySeekShelter'];
                        } else if($weather["wind_gust_speed"]*$toKnots>=50 || $weather["wind_speed_avg30"]*$toKnots>=34) {?>
                            <?php echo $lang['notifyHighWindWarning'];?><br/>
                            <?php echo $lang['notifyGustUpTo'];?> <notifyorange><?php echo $weather["wind_gust_speed"];?></notifyorange> <?php echo $weather["wind_units"];?><br/>
                            <?php echo $lang['notifySustainedAvg'];?>: <notifyorange><?php echo $weather["wind_speed_avg30"];?></notifyorange> <?php echo $weather["wind_units"];
                        } else {?>
                            <?php echo $lang['notifyWindAdvisory'];?><br/>
                            <?php echo $lang['notifyGustUpTo'];?> <notifyorange><?php echo $weather["wind_gust_speed"];?></notifyorange> <?php echo $weather["wind_units"];?><br/>
                            <?php echo $lang['notifySustainedAvg'];?>: <notifyorange><?php echo $weather["wind_speed_avg30"];?></notifyorange> <?php echo $weather["wind_units"];
                        }?>
                    </div>
                </div>
            </div>
        <?php }
    }

    //WEATHER34 pure css wind chill  below 0c/32F  pop up alert
    if(anyToC($weather["windchill"])<=0){?>
        <div id="weather34lightningdialog-notify">
            <div class="weather34lightningdialog-box">
                <div class="weather34lightningbackground-alert"></div>
                <div class="header">
                    <div class="weather34lightningbackground-alert"></div>
                    <div class="weather34lightningcontents">
                        <div class="left"><?php echo $notification.' '.$lang['notifyTitle'];?></div>
                        <div class="right"><?php echo date ("D H:i")?></div>
                    </div>
                </div>
                <div class="weather34lightningcontents weather34lightningmain-content">
                    <?php echo $freezing.' '.$lang['Windchillalert'];?><br/>
                    <?php echo $lang['notifyFreezing'];?> <notifyblue><?php echo $weather["windchill"];?>&deg;<?php echo $weather["temp_units"];?></notifyblue>
                </div>
            </div>
        </div>
    <?php }

    //WEATHER34 pure css near freezing dewpoint below 0c/32F  pop up alert
    if(anyToC($weather["dewpoint"])<=0){?>
        <div id="weather34lightningdialog-notify">
            <div class="weather34lightningdialog-box">
                <div class="weather34lightningbackground-alert"></div>
                <div class="header">
                    <div class="weather34lightningbackground-alert"></div>
                    <div class="weather34lightningcontents">
                        <div class="left"><?php echo $notification.' '.$lang['notifyTitle'];?></div>
                        <div class="right"><?php echo date ("D H:i")?></div>
                    </div>
                </div>
                <div class="weather34lightningcontents weather34lightningmain-content">
                    <?php echo $freezing.$lang['Dewpointcolderalert'];?><br/>
                    <?php echo $lang['notifyFreezing'];?> <notifyblue><?php echo $weather["dewpoint"];?>&deg;<?php echo $weather["temp_units"];?></notifyblue>
                </div>
            </div>
        </div>
    <?php }

    if ($notifyEarthquake == 'yes') {
        //earthquakes magnitude 6+
        date_default_timezone_set($TZ);
        $json_string=file_get_contents('jsondata/eq.txt');
        $parsed_json=json_decode($json_string,true);
        $magnitude = array();
        $eqtitle = array();
        $depth = array();
        $time = array();
        $lati = array();
        $longi = array();
        $eventime = array();
        for ($i = 0; $i < 100; $i++) {
            //Fix for 'curly brace array access syntax' is deprecated since PHP 8.0 error
            // Replaced {} with [] in lines 163 thru 168
            $magnitude[$i]=$parsed_json[$i]['magnitude'];
            $eqtitle[$i]=$parsed_json[$i]['title'];
            $depth[$i]=$parsed_json[$i]['depth'];
            $time[$i]=$parsed_json[$i]['date_time'];
            $lati[$i]=$parsed_json[$i]['latitude'];
            $longi[$i]=$parsed_json[$i]['longitude'];
            $eventime[$i]=date($timeFormatShort, strtotime($time[$i]));
            $eqdist[$i] = round(distance($lat, $lon, $lati[$i], $longi[$i]));
        }

        //WEATHER34 pure css earthquake >6.5 pop up alert
        for ($i = 0; $i <=0; $i++){
            if($magnitude[$i]>=$notifyMagnitude){?>
                <div id="weather34lightningdialog-notify">
                    <div class="weather34lightningdialog-box">
                        <div class="weather34lightningbackground-alert"></div>
                        <div class="header">
                            <div class="weather34lightningbackground-alert"></div>
                            <div class="weather34lightningcontents">
                                <div class="left"><?php echo $notification.' '.$lang['notifyTitle'];?></div>
                                <div class="right"><?php echo date ("D H:i")?></div>
                            </div>
                        </div>
                        <div class="weather34lightningcontents weather34lightningmain-content">
                        <?php if ($magnitude[$i] >= 8) {
                            echo $lang['GreatE'];
                        } elseif ($magnitude[$i] >= 7) {
                            echo $lang['MajorE'];
                        } elseif ($magnitude[$i] >= 6) {
                            echo $lang['StrongE'];
                        } elseif ($magnitude[$i] >= 5) {
                            echo $lang['ModerateE'];
                        } elseif ($magnitude[$i] >= 4) {
                            echo $lang['LightE'];
                        } elseif ($magnitude[$i] >= 3) {
                            echo $lang['MinorE'];
                        } elseif ($magnitude[$i] >= 1) {
                            echo $lang['MicroE'];
                        } else {
                            echo $lang['Earthquake'];
                        }?>
                        <notifyorange><?php echo $magnitude[$i];?></notifyorange>
                        <br/>
                        <?php echo $eqtitle[$i]." ".$eventime[$i];?>
                        </div>
                    </div>
                </div>
            <?php }
        }
    }
}?>
