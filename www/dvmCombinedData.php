<?php
include ('settings.php');
include ('dvmShared.php');
error_reporting(0);

$json = 'jsondata/dvmArchiveData.json';
$json = file_get_contents($json);
$adata = json_decode($json, true);

$weewxrt = array_map(function ($v)
{
    if ($v == 'NULL')
    {
        return null;
    }
    return $v;
}
,
explode(" ", file_get_contents($livedata)));
    

    //general
    $rain["alltime_total"] = $adata['alltime']['rain total']['value'];
    $year = substr($weewxrt[0], 6);
                if (isset($weewxrt[23]))
        {
            $weewxrt[23] = (float)(1 * $weewxrt[23]);
            $weewxrt[23] = number_format((float)$weewxrt[23], 0, '.', '');
        }
    $recordDate = mktime(substr($weewxrt[1], 0, 2) , substr($weewxrt[1], 3, 2) , substr($weewxrt[1], 6, 2) , substr($weewxrt[0], 3, 2) , substr($weewxrt[0], 0, 2) , $year);
    $stationlocation = $adata["info"]["location"];
    $sundial_time = date("M d Y H:i:s",filemtime('serverdata/w34realtime.txt'));
    $lat = $adata["info"]["latitude"];
    $lon = $adata["info"]["longitude"];
    $elevation = $adata["info"]["altitude meters"];
    $meteogramURL = $adata["info"]["metgramlink"];
    $weather["datetime"] = $recordDate;
    $weather["date"] = date($dateFormat, $recordDate);
    $weather["time"] = date($timeFormat, $recordDate);
    $weather["swversion"] = $weewxrt[38];
    $weather["build"] = $weewxrt[39];
    $convertuptimemb34 = $weather["uptime"];
    $uptimedays = floor($convertuptimemb34 / 86400);
    $uptimehours = floor(($convertuptimemb34 - ($uptimedays * 86400)) / 3600);

    //almanac
    $alm["sun_altitude"] = round($adata["almanac"]["sun altitude"]["value"],2);
    if ($alm["sun_altitude"] < 0)
    {
    $alm["sun_None"] = "<i>(Always down)</i>";
    $alm["daylight_str"] = "00:00";
    }
    else
    {
    $alm["sun_None"] = "<i>(Always up)</i>";
    $alm["daylight_str"] = "24:00";
    }
    $alm["sun_azimuth"] = $adata["almanac"]["sun azimuth"]["value"];
    $alm["moon_azimuth"] = $adata["almanac"]["moon azimuth"]["value"];
    $alm["sunrise"] = $adata["almanac"]["sun rise"]["at"];
    $alm["sunset"] = $adata["almanac"]["sun set"]["at"];
    $alm["sunrise_date"] = $adata["almanac"]["sun rise date"]["at"];
    $alm["sunset_date"] = $adata["almanac"]["sun set date"]["at"];
    $alm["sun_right_ascension"] = $adata["almanac"]["sun right ascension"]["value"];
    $alm["next_equinox"] = $adata["almanac"]["equinox"]["at"];
    $alm["next_solstice"] = $adata["almanac"]["solstice"]["at"];
    $alm["sidereal_time"] = $adata["almanac"]["sidereal time"]["at"];
    $alm["civil_twilight_begin"] = $adata["almanac"]["civil twighlight begin"]["at"];
    $alm["civil_twilight_end"] = $adata["almanac"]["civil twighlight end"]["at"];
    $alm["nautical_twilight_begin"] = $adata["almanac"]["nautical twighlight begin"]["at"];
    $alm["nautical_twilight_end"] = $adata["almanac"]["nautical twighlight end"]["at"];
    $alm["astronomical_twilight_begin"] = $adata["almanac"]["astronomical twighlight begin"]["at"];
    $alm["astronomical_twilight_end"] = $adata["almanac"]["astronomical twighlight end"]["at"];
    $alm["sun_meridian_transit"] = $adata["almanac"]["sun meridian transit"]["at"];
    $alm["moon_meridian_transit"] = $adata["almanac"]["moon meridian transit"]["at"];
    $alm["moonphase"] = $adata["almanac"]["moon phase"]["value"];
    $alm["moon_age"] = $adata["almanac"]["moon age"]["value"];
    $alm["hour_sun"] = $adata["almanac"]["hour sun"]["value"];
    $alm["hour_moon"] = $adata["almanac"]["hour moon"]["value"];
    $alm["luminance"] = round($adata["almanac"]["moon fullness"]["value"],2);
    $alm["fullmoon"] = $adata["almanac"]["full moon"]["at"];
    $alm["newmoon"] = $adata["almanac"]["new moon"]["at"];   
    $alm["daylight"] = $adata["info"]["daylight"];
    $alm["moonrise"] = $adata["almanac"]["moon rise"]["at"];
    $alm["moonset"] = $adata["almanac"]["moon set"]["at"];
    $alm["mercury_hlongitude"] = $adata["almanac"]["mercury hlongitude"]["value"];
    $alm["venus_hlongitude"] = $adata["almanac"]["venus hlongitude"]["value"];
    $alm["earth_hlongitude"] = $adata["almanac"]["earth hlongitude"]["value"];
    $alm["mars_hlongitude"] = $adata["almanac"]["mars hlongitude"]["value"];
    $alm["jupiter_hlongitude"] = $adata["almanac"]["jupiter hlongitude"]["value"];
    $alm["saturn_hlongitude"] = $adata["almanac"]["saturn hlongitude"]["value"];
    $alm["uranus_hlongitude"] = $adata["almanac"]["uranus hlongitude"]["value"];
    $alm["neptune_hlongitude"] = $adata["almanac"]["neptune hlongitude"]["value"];
    $alm["pluto_hlongitude"] = $adata["almanac"]["pluto hlongitude"]["value"];

    if ($adata["almanac"]["moon rise"]["at"] == '--')
    {
        $alm["moonrise"] = 'In Transit';
    }
    
    if ($alm['luminance'] > 99.9)
    {
        $alm['luminance'] = 100;
    }
    if ($alm['luminance'] < 100)
    {
        $alm['luminance'] = $alm['luminance'];
    }
    if (
    strtotime(date("G.i")) >= strtotime($alm["civil_twilight_begin"]) &&
    strtotime(date("G.i")) < strtotime($alm["civil_twilight_end"])
    ) {
    $dayPartCivil = "day";
    } else {
    $dayPartCivil = "night";
    }
    if (
    strtotime(date("G.i")) >= strtotime($alm["nautical_twilight_begin"]) &&
    strtotime(date("G.i")) < strtotime($alm["nautical_twilight_end"])
    ) {
    $dayPartNautical = "day";
    } else {
    $dayPartNautical = "night";
}
if (
    strtotime(date("G.i")) >= strtotime($alm["sunrise"]) &&
    strtotime(date("G.i")) < strtotime($alm["sunset"])
) {
    $dayPartNatural = "day";
} else {
    $dayPartNatural = "night";
}
    
    
    //barometer
    $barom["units"] = $weewxrt[15]; // mb or hPa or kPa or in
    if ($barom["units"] == "in")
    {$barom["units"] = "inHg";}
    $barom["now"] = $weewxrt[10];
    $barom["max"] = ($weewxrt[34] == "   N/A" ? "0" : $weewxrt[34]);
    $barom["maxtime"] = ($weewxrt[35] == "   N/A" ? "0" : $weewxrt[35]);
    $barom["min"] = ($weewxrt[36] == "   N/A" ? "0" : $weewxrt[36]);
    $barom["mintime"] = ($weewxrt[37] == "   N/A" ? "0" : $weewxrt[37]);
    $barom["trend"] = ($wweewxrt[18] == "   N/A" ? "0" : $weewxrt[18]);
    $barom["yesterday_max"] = $adata['yesterday']['max barometer']['value'];
    $barom["yesterday_maxtime"] = $adata['yesterday']['max barometer']['at'];
    $barom["yesterday_min"] = $adata['yesterday']['min barometer']['value'];
    $barom["yesterday_mintime"] = $adata['yesterday']['min barometer']['at'];
    $barom["day_max"] = $adata['day']['max barometer']['value'];
    $barom["day_maxtime"] = $adata['day']['max barometer']['at'];
    $barom["day_min"] = $adata['day']['min barometer']['value'];
    $barom["day_mintime"] = $adata['day']['min barometer']['at'];
    $barom["month_max"] = $adata['month']['max barometer']['value'];
    $barom["month_maxtime"] = $adata['month']['max barometer']['at'];
    $barom["month_min"] = $adata['month']['min barometer']['value'];
    $barom["month_mintime"] = $adata['month']['min barometer']['at'];
    $barom["year_max"] = $adata['year']['max barometer']['value'];
    $barom["year_maxtime"] = $adata['year']['max barometer']['at'];
    $barom["year_min"] = $adata['year']['min barometer']['value'];
    $barom["year_mintime"] = $adata['year']['min barometer']['at'];
    $barom["alltime_max"] = $adata['alltime']['max barometer']['value'];
    $barom["alltime_maxtime"] = $adata['alltime']['max barometer']['at'];
    $barom["alltime_min"] = $adata['alltime']['min barometer']['value'];
    $barom["alltime_mintime"] = $adata['alltime']['min barometer']['at'];
    

    //dewpoint
    $dew["now"] = (is_numeric($weewxrt[4]) ? number_format($weewxrt[4], 1) : null);
    $dew["trend"] = $adata['day']['trend dewpoint']['value'];
    $dew["day_max"] = $adata['day']['max dewpoint']['value'];
    $dew["day_maxtime"] = $adata['day']['max dewpoint']['at'];
    $dew["day_min"] = $adata['day']['min dewpoint']['value'];
    $dew["day_mintime"] = $adata['day']['min dewpoint']['at'];
    $dew["yesterday_max"] = $adata['yesterday']['max dewpoint']['value'];
    $dew["yesterday_maxtime"] = $adata['yesterday']['max dewpoint']['at'];
    $dew["yesterday_min"] = $adata['yesterday']['min dewpoint']['value'];
    $dew["yesterday_mintime"] = $adata['yesterday']['min dewpoint']['at'];
    $dew["month_max"] = $adata['month']['max dewpoint']['value'];
    $dew["month_maxtime"] = $adata['month']['max dewpoint']['at'];
    $dew["month_min"] = $adata['month']['min dewpoint']['value'];
    $dew["month_mintime"] = $adata['month']['min dewpoint']['at'];
    $dew["year_max"] = $adata['year']['max dewpoint']['value'];
    $dew["year_maxtime"] = $adata['year']['max dewpoint']['at'];
    $dew["year_min"] = $adata['year']['min dewpoint']['value'];
    $dew["year_mintime"] = $adata['year']['min dewpoint']['at'];
    $dew["alltime_max"] = $adata['alltime']['max dewpoint']['value'];
    $dew["alltime_maxtime"] = $adata['alltime']['max dewpoint']['at'];
    $dew["alltime_min"] = $adata['alltime']['min dewpoint']['value'];
    $dew["alltime_mintime"] = $adata['alltime']['min dewpoint']['at'];

    //humidity
    $humid["now"] = (is_numeric($weewxrt[3]) ? number_format($weewxrt[3], 1) : null);
    $humid["trend"] = $adata['day']['trend humidity']['value'];
    $humid["day_max"] = $adata['day']['max humidity']['value'];
    $humid["day_maxtime"] = $adata['day']['max humidity']['at'];
    $humid["day_min"] = $adata['day']['min humidity']['value'];
    $humid["day_mintime"] = $adata['day']['min humidity']['at'];
    $humid["yesterday_max"] = $adata['yesterday']['max humidity']['value'];
    $humid["yesterday_maxtime"] = $adata['yesterday']['max humidity']['at'];
    $humid["yesterday_min"] = $adata['yesterday']['min humidity']['value'];
    $humid["yesterday_mintime"] = $adata['yesterday']['min humidity']['at'];
    $humid["month_max"] = $adata['month']['max humidity']['value'];
    $humid["month_maxtime"] = $adata['month']['max humidity']['at'];
    $humid["month_min"] = $adata['month']['min humidity']['value'];
    $humid["month_mintime"] = $adata['month']['min humidity']['at'];
    $humid["year_max"] = $adata['year']['max humidity']['value'];
    $humid["year_maxtime"] = $adata['year']['max humidity']['at'];
    $humid["year_min"] = $adata['year']['min humidity']['value'];
    $humid["year_mintime"] = $adata['year']['min humidity']['at'];
    $humid["alltime_max"] = $adata['alltime']['max humidity']['value'];
    $humid["alltime_maxtime"] = $adata['alltime']['max humidity']['at'];
    $humid["alltime_min"] = $adata['alltime']['min humidity']['value'];
    $humid["alltime_mintime"] = $adata['alltime']['min humidity']['at'];
    $humid["indoors_now"] = (is_numeric($weewxrt[4]) ? number_format($weewxrt[4], 1) : null);
    $humid["indoors_day_max"] = $adata['day']['max inHumidity']['value'];
    $humid["indoors_day_maxtime"] = $adata['day']['max inHumidity']['at'];
    $humid["indoors_day_min"] = $adata['day']['min inHumidity']['value'];
    $humid["indoors_day_mintime"] = $adata['day']['min inHumidity']['at'];
    $humid["indoors_yesterday_max"] = $adata['yesterday']['max inHumidity']['value'];
    $humid["indoors_yesterday_maxtime"] = $adata['yesterday']['max inHumidity']['at'];
    $humid["indoors_yesterday_min"] = $adata['yesterday']['min inHumidity']['value'];
    $humid["indoors_yesterday_mintime"] = $adata['yesterday']['min inHumidity']['at'];
    $humid["indoors_month_max"] = $adata['month']['max inHumidity']['value'];
    $humid["indoors_month_maxtime"] = $adata['month']['max inHumidity']['at'];
    $humid["indoors_month_min"] = $adata['month']['min inHumidity']['value'];
    $humid["indoors_month_mintime"] = $adata['month']['min inHumidity']['at'];
    $humid["indoors_year_max"] = $adata['year']['max inHumidity']['value'];
    $humid["indoors_year_maxtime"] = $adata['year']['max inHumidity']['at'];
    $humid["indoors_year_min"] = $adata['year']['min inHumidity']['value'];
    $humid["indoors_year_mintime"] = $adata['year']['min inHumidity']['at'];
    $humid["indoors_alltime_max"] = $adata['alltime']['max inHumidity']['value'];
    $humid["indoors_alltime_maxtime"] = $adata['alltime']['max inHumidity']['at'];
    $humid["indoors_alltime_min"] = $adata['alltime']['min inHumidity']['value'];
    $humid["indoors_alltime_mintime"] = $adata['alltime']['min inHumidity']['at'];

    //lightning
    $lightning["yesterday_strike_count"] = $adata["yesterday"]["lightning strike count"]["value"]; 
    $lightning["day_strike_count"] = $adata["day"]["lightning strike count"]["value"];
    $lightning["month_strike_count"] = $adata["month"]["lightning strike count"]["value"];
    $lightning["year_strike_count"] = $adata["year"]["lightning strike count"]["value"];
    $lightning["last_distance"] =  $adata["alltime"]["lightning last distance"]["value"];
    $lightning["last_time"] = $adata["alltime"]["lightning last time"]["at"];
    $lightning["alltime_strike_count"] = $adata["alltime"]["lightning strike count"]["value"];
    $lightning['strike_count_last_3hr'] = $adata["alltime"]["lightning strike count 3hr"]["value"];
    $lightning["now_distance"] = $weewxrt[58];
    $lightning["now_energy"] = $weewxrt[59];
    $lightning["now_strike_count"] = $weewxrt[60];
    $lightning["now_noise_count"] = $weewxrt[61];
    $lightning["now_disturber_count"] = $weewxrt[62];
  if (trim($lightning["last_time"]) == 'N/A' || $lightning["last_time"] == '0')
    {
        $lightning["time_ago"] = 0;
    }
    else
    {
        $parts = explode(" ", $lightning["last_time"]);
        $parts1 = explode("/", $parts[0]);
        $lightning["time_ago"] = time() - strtotime("20" . $parts1[2] . $parts1[1] . $parts1[0] . " " . $parts[1]);
    } 

    //rainfall
    $rain["units"] = $weewxrt[16]; // mm or in
    $rain["rate"] = $weewxrt[8];
    $rain["total"] = $weewxrt[9];
    $rain["last_hour"] = $adata['day']['rain last 1hr']['value'];
    $rain["last_3hour"] = $adata['day']['rain last 3hr']['value'];
    $rain["last_24hour"] = $adata['day']['rain last 24hr']['value'];
    $rain["last_time"] = $adata['day']['rain last time']['at'];
    $rain["day"] = $weewxrt[9];
    $rain["yesterday_rate_max"] = $adata['yesterday']['max rain rate']['value'];
    $rain["yesterday_total"] = $adata['yesterday']['rain total']['value'];
    $rain["month_rate_max"] = $adata['month']['max rain rate']['value'];
    $rain["month_total"] = $adata['month']['rain total']['value'];
    $rain["year_rate_max"] = $adata['year']['max rain rate']['value'];
    $rain["year_total"] = $adata['year']['rain total']['value'];
    $rain["alltime_rate_max"] = $adata['alltime']['max rain rate']['value'];
    $rain["alltime_total"] = $adata['alltime']['rain total']['value'];
    
    //sky
    $sky["lux"] = (is_numeric($weewxrt[45]) ? number_format($weewxrt[45] / 0.00809399477, 0, '.', '') : null);
    $sky["day_lux_max"] = (is_numeric($solar["day_max"]) ? number_format($solar["day_max"] / 0.00809399477, 0, '.', '') : null);
    $sky["cloud_base"] = ($weewxrt[52] == "   N/A" ? "0" : $weewxrt[52]);
    $sky["cloud_cover"] = round($adata['current']['cloud cover']['value'],0);

    //solar
    $solar["now"] = (is_numeric($weewxrt[45]) ? round($weewxrt[45], 1) : null);
    $solar["day_max"] = $adata["day"]["max solar"]["value"];
    $solar["day_maxtime"] = $adata["day"]["max solar"]["at"];
    $solar["yesterday_max"] = $adata["yesterday"]["max solar"]["value"];
    $solar["yesterday_maxtime"] = $adata["yesterday"]["max solar"]["at"];
    $solar["month_max"] = $adata["month"]["max solar"]["value"];
    $solar["month_maxtime"] = $adata["month"]["max solar"]["at"];
    $solar["year_max"] = $adata["year"]["max solar"]["value"];
    $solar["year_maxtime"] = $adata["yesterday"]["max solar"]["at"];
    $solar["alltime_max"] = $adata["alltime"]["max solar"]["value"];
    $solar["alltime_maxtime"] = $adata["yesterday"]["max solar"]["at"];

    //temperature
    $temp["units"] = $weewxrt[14]; // C
    $temp["indoor_now"] = $weewxrt[22];
    $temp["indoor_day_max"] = $adata['day']['max inside temperature']['value'];
    $temp["indoor_day_min"] = $adata['day']['min inside temperature']['value'];
    $temp["outside_now"] = $weewxrt[2];
    $temp["outside_trend"] = $weewxrt[25];
    $temp["apptemp"] = $weewxrt[54];
    $temp["heatindex"] = $weewxrt[41];
    $temp["windchill"] = $weewxrt[24];
    $temp["humidex"] = $weewxrt[42];
    $temp["outside_yesterday_max"] = $adata['yesterday']['max temperature']['value'];
    $temp["outside_yesterday_maxtime"] = $adata['yesterday']['max temperature']['at'];
    $temp["outside_yesterday_min"] = $adata['yesterday']['min temperature']['value'];
    $temp["outside_yesterday_mintime"] = $adata['yesterday']['min temperature']['at'];
    $temp["outside_day_max"] = (is_numeric($weewxrt[26]) ? number_format($weewxrt[26], 1) : null);
    $temp["outside_day_maxtime"] = ($weewxrt[27] == "   N/A" ? "0" : $weewxrt[27]);
    $temp["outside_day_min"] = (is_numeric($weewxrt[28]) ? number_format($weewxrt[28], 1) : null);
    $temp["outside_day_mintime"] = ($weewxrt[29] == "   N/A" ? "0" : $weewxrt[29]);
    $temp["outside_day_avg"] = $adata['day']['avg temperature']['value'];
    $temp["outside_day_avg_60mn"] = $adata['day']['avg temperature 60mn']['value'];
    $temp["outside_month_max"] = $adata['month']['max temperature']['value'];
    $temp["outside_month_maxtime"] = $adata['month']['max temperature']['at'];
    $temp["outside_month_min"] = $adata['month']['min temperature']['value'];
    $temp["outside_month_mintime"] = $adata['month']['min temperature']['at'];
    $temp["outside_year_max"] = $adata['year']['max temperature']['value'];
    $temp["outside_year_maxtime"] = $adata['year']['max temperature']['at'];
    $temp["outside_year_min"] = $adata['year']['min temperature']['value'];
    $temp["outside_year_mintime"] = $adata['year']['min temperature']['at'];
    $temp["outside_alltime_max"] = $adata['alltime']['max temperature']['value'];
    $temp["outside_alltime_maxtime"] = $adata['alltime']['max temperature']['at'];
    $temp["outside_alltime_min"] = $adata['alltime']['min temperature']['value'];
    $temp["outside_alltime_mintime"] = $adata['alltime']['min temperature']['at'];

    //uv
    $uv["now"] = $weewxrt[43];
    $uv["day_max"] = $adata["day"]["max UV"]["value"];
    $uv["day_maxtime"] = $adata["day"]["max UV"]["at"];
    $uv["yesterday_max"] = $adata["yesterday"]["max UV"]["value"];
    $uv["yesterday_maxtime"] = $adata["yesterday"]["max UV"]["at"];
    $uv["month_max"] = $adata["month"]["max UV"]["value"];
    $uv["month_maxtime"] = $adata["month"]["max UV"]["at"];
    $uv["year_max"] = $adata["year"]["max UV"]["value"];
    $uv["year_maxtime"] = $adata["year"]["max UV"]["at"];
    $uv["alltime_max"] = $adata["alltime"]["max UV"]["value"];
    $uv["alltime_maxtime"] = $adata["alltime"]["max UV"]["at"];

    //wind
    $wind["units"] = $weewxrt[13]; // m/s or mph or km/h or kts
    $wind["speed_avg"] = $weewxrt[5]; //Console's Average Wind Speed
    $wind["direction"] = (is_numeric($weewxrt[7]) ? number_format($weewxrt[7], 0) : null);
    $wind["direction_avg"] = $adata['day']['avg wind direction']['value'];
    $wind["speed"] = (is_numeric($weewxrt[6]) ? number_format($weewxrt[6], 0) : null); // Instant Wind Speed
    $wind["speed_10min"] = $adata['day']['avg wind speed 10mn']['value'];
    $wind["gust"] = $adata['current']['wind gust']['value'];
    $wind["gust_60min"] = $adata['day']['max wind gust 60mn']['value'];
    $wind["speed_bft"] = $weewxrt[12];
    $wind["speed_max"] = (is_numeric($weewxrt[30]) ? number_format($weewxrt[30], 1) : null);
    $wind["speed_maxtime"] = ($weewxrt[31] == "   N/A" ? "0" : $weewxrt[31]);
    $wind["gust_max"] = (is_numeric($weewxrt[32]) ? number_format($weewxrt[32], 1) : null);
    $wind["gust_maxtime"] = ($weewxrt[33] == "   N/A" ? "0" : $weewxrt[33]);
    $wind["wind_run"] = ($weewxrt[17] == "   N/A" ? "0" : $weewxrt[17]);
    $wind["speed_yesterday_max"] = $adata['yesterday']['max wind speed']['value'];
    $wind["speed_yesterday_maxtime"] = $adata['yesterday']['max wind speed']['at'];
    $wind["gust_yesterday_max"] = $adata['yesterday']['max wind gust']['value'];
    $wind["gust_yesterday_maxtime"] = $adata['yesterday']['max wind gust']['at'];
    $wind["speed_month_max"] = $adata['month']['max wind speed']['value'];
    $wind["speed_month_maxtime"] = $adata['month']['max wind speed']['at'];
    $wind["gust_month_max"] = $adata['month']['max wind gust']['value'];
    $wind["gust_month_maxtime"] = $adata['month']['max wind gust']['at'];
    $wind["speed_year_max"] = $adata['year']['max wind speed']['value'];
    $wind["speed_year_maxtime"] = $adata['year']['max wind speed']['at'];
    $wind["gust_year_max"] = $adata['year']['max wind gust']['value'];
    $wind["gust_year_maxtime"] = $adata['year']['max wind gust']['at'];
    $wind["speed_alltime_max"] = $adata['alltime']['max wind speed']['value'];
    $wind["speed_alltime_maxtime"] = $adata['alltime']['max wind speed']['at'];
    $wind["gust_alltime_max"] = $adata['alltime']['max wind gust']['value'];
    $wind["gust_alltime_maxtime"] = $adata['alltime']['max wind gust']['at'];
    $wind["direction_trend"] = $adata['day']['avg trend direction']['value'];

    

// Convert temperatures if necessary
if ($tempunit != $temp["units"])
{
    if ($tempunit == "C")
    {
        fToC($temp, "indoor_now");
        fToC($temp, "outside_now");
        fToC($temp, "outside_day_avg");
        fToC($temp, "apptemp");
        fToC($temp, "windchill");
        fToC($temp, "heatindex");
        fToC($dew, "now");
        fToC($temp, "outside_day_max");
        fToC($temp, "outside_day_min");
        fToC($temp, "outside_month_max");
        fToC($temp, "outside_month_min");
        fToC($temp, "outside_year_max");
        fToC($temp, "outside_year_min");
        fToC($temp, "outside_yesterday_max");
        fToC($temp, "outside_yesterday_min");
        fToC($temp, "outside_alltime_max");
        fToC($temp, "outside_alltime_min");
        fToC($dew, "day_max");
        fToC($dew, "day_min");
        fToC($dew, "alltime_max");
        fToC($dew, "alltime_min");
        fToC($dew, "month_max");
        fToC($dew, "month_min");
        fToC($dew, "year_max");
        fToC($dew, "year_min");
        fToC($dew, "yesterday_max");
        fToC($dew, "yesterday_min");
        fToCrel($temp, "outside_trend");
        fToCrel($dew, "trend");
        fToCrel($temp, "humidex");
        $temp["units"] = $tempunit;
    }
    else if ($tempunit == "F")
    {
        cToF($temp, "indoor_now");
        cToF($temp, "outside_now");
        cToF($temp, "outside_day_avg");
        cToF($temp, "apptemp");
        cToF($temp, "windchill");
        cToF($temp, "heatindex");
        cToF($dew, "now");
        cToF($temp, "outside_yesterday_max");
        cToF($temp, "outside_yesterday_min");
        cToF($temp, "outside_alltime_max");
        cToF($temp, "outside_alltime_min");
        cToF($temp, "outside_month_max");
        cToF($temp, "outside_month_min");
        cToF($temp, "outside_year_max");
        cToF($temp, "outside_year_min");
        cToF($temp, "outside_day_max");
        cToF($temp, "outside_day_min");
        cToF($dew, "day_max");
        cToF($dew, "day_min");
        cToF($dew, "alltime_max");
        cToF($dew, "alltime_min");
        cToF($dew, "month_max");
        cToF($dew, "month_min");
        cToF($dew, "year_max");
        cToF($dew, "year_min");
        cToF($dew, "yesterday_max");
        cToF($dew, "yesterday_min");
        cToFrel($temp, "outside_trend");
        cToFrel($dew, "trend");
        cToFrel($temp, "humidex");
        $temp["units"] = $tempunit;
    }
}
//  convert rain

if ($rainunit != $rain["units"])
{
    if ($rainunit == "mm")
    {
        inTomm($rain, "rate");
        inTomm($rain, "total");
        inTomm($rain, "last_hour");
        inTomm($rain, "last_3hour");
        inTomm($rain, "last_24hour");
        inTomm($rain, "day");
        inTomm($rain, "yesterday_rate_max");
        inTomm($rain, "yesterday_total");
        inTomm($rain, "month_rate_max");
        inTomm($rain, "month_total");
        inTomm($rain, "year_rate_max");
        inTomm($rain, "year_total");
        inTomm($rain, "alltime_rate_max");
        inTomm($rain, "alltime_total");
        $rain["units"] = $rainunit;
    }
    else if ($rainunit == "in")
    {
        mmToin($rain, "rate");
        mmToin($rain, "total");
        mmToin($rain, "last_hour");
        mmToin($rain, "last_3hour");
        mmToin($rain, "last_24hour");
        mmToin($rain, "day");
        mmToin($rain, "yesterday_rate_max");
        mmToin($rain, "yesterday_total");
        mmToin($rain, "month_rate_max");
        mmToin($rain, "month_total");
        mmToin($rain, "year_rate_max");
        mmToin($rain, "year_total");
        mmToin($rain, "alltime_rate_max");
        mmToin($rain, "alltime_total");
        $rain["units"] = $rainunit;
    }
}
// Convert pressure units if necessary
if ($pressureunit != $barom["units"])
{
    if (($pressureunit == 'hPa' && $barom["units"] == 'mb') || ($pressureunit == 'mb' && $barom["units"] == 'hPa') || ($pressureunit == 'kPa' && $barom["units"] == 'mb') || ($pressureunit == 'mb' && $barom["units"] == 'kPa') || ($pressureunit == 'kPa' && $barom["units"] == 'hPa') || ($pressureunit == 'hPa' && $barom["units"] == 'kPa'))
    {
        // 1 mb = 1 hPa so just change the unit being displayed
        $barom["units"] = $pressureunit;
    }
    else if ($pressureunit == "inHg" && ($barom["units"] == 'mb' || $barom["units"] == 'hPa' || $barom["units"] == 'kPa'))
    {
        mbToin($barom, "now", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "max", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "min", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "trend", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "yesterday_max", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "yesterday_min", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "day_max", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "day_min", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "month_max", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "month_min", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "year_max", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "year_min", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "alltime_max", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "alltime_min", ($barom["units"] == 'kPa' ? 1000 : 1));
        $barom["units"] = $pressureunit;

    }
    else if (($pressureunit == "mb" || $pressureunit == 'hPa' || $pressureunit == 'kPa') && $barom["units"] == 'inHg')
    {
        inTomb($barom, "now", ($pressureunit == 'kPa' ? 1000 : 1));
        inTomb($barom, "max", ($pressureunit == 'kPa' ? 1000 : 1));
        inTomb($barom, "min", ($pressureunit == 'kPa' ? 1000 : 1));
        inTomb($barom, "trend", ($pressureunit == 'kPa' ? 1000 : 1));
        inTomb($barom, "yesterday_max", ($pressureunit == 'kPa' ? 1000 : 1));
        inTomb($barom, "yesterday_min", ($pressureunit == 'kPa' ? 1000 : 1));
        inTomb($barom, "day_max", ($pressureunit == 'kPa' ? 1000 : 1));
        inTomb($barom, "day_min", ($pressureunit == 'kPa' ? 1000 : 1));
        inTomb($barom, "month_max", ($pressureunit == 'kPa' ? 1000 : 1));
        inTomb($barom, "month_min", ($pressureunit == 'kPa' ? 1000 : 1));
        inTomb($barom, "year_max", ($pressureunit == 'kPa' ? 1000 : 1));
        inTomb($barom, "year_min", ($pressureunit == 'kPa' ? 1000 : 1));
        inTomb($barom, "alltime_max", ($pressureunit == 'kPa' ? 1000 : 1));
        inTomb($barom, "alltime_min", ($pressureunit == 'kPa' ? 1000 : 1));
        $barom["units"] = $pressureunit;
    }
}
//Convert cloudbase
if ($windunit != $wind["units"])
{
    if (($windunit == 'mph' || $windunit == 'kts') && ($wind["units"] == 'm/s' || $wind["units"] == 'km/h'))
    {
        $weather["cloudbase3"] = round($weather["cloudbase3"] * 3.281, 0);
    }
    else if (($windunit == 'm/s' || $windunit == 'km/h') && ($wind["units"] == 'mph' || $wind["units"] == 'kts'))
    {
        $weather["cloudbase3"] = round($weather["cloudbase3"] / 3.281, 0);
    }
}
// Convert wind speed units if necessary
if ($windunit != $wind["units"])
{
    if ($windunit == 'mph' && $weather["wind_units"] == 'kts')
    {
        ktsTomph($wind, "speed_avg");
        ktsTomph($wind, "speed");
        ktsTomph($wind, "gust_10min");     
        ktsTomph($wind, "gust");
        ktsTomph($wind, "gust_60min");
        ktsTomph($wind, "speed_max");
        ktsTomph($wind, "gust_max");
        ktsTomph($wind, "speed_15min_avg");
        ktsTomph($wind, "speed_30min_avg");
        ktsTomph($wind, "speed_maxtime");
        ktsTomph($wind, "speed_day_avg");
        ktsTomph($wind, "speed_alltime_max");
        ktsTomph($wind, "speed_yesterday_max");
        ktsTomph($wind, "speed_month_max");
        ktsTomph($wind, "speed_year_max");
        ktsTomph($wind, "speed_day_max");
        $wind["units"] = $windunit;
    }
    else if ($windunit == 'mph' && $wind["units"] == 'km/h')
    {
        kmhTomph($wind, "speed_avg");
        kmhTomph($wind, "speed");
        kmhTomph($wind, "gust_10min");     
        kmhTomph($wind, "gust");
        kmhTomph($wind, "gust_60min");
        kmhTomph($wind, "speed_max");
        kmhTomph($wind, "gust_max");
        kmhTomph($wind, "speed_15min_avg");
        kmhTomph($wind, "speed_30min_avg");
        kmhTomph($wind, "speed_maxtime");
        kmhTomph($wind, "speed_day_avg");
        kmhTomph($wind, "speed_alltime_max");
        kmhTomph($wind, "speed_yesterday_max");
        kmhTomph($wind, "speed_month_max");
        kmhTomph($wind, "speed_year_max");
        kmhTomph($wind, "speed_day_max");
        $wind["units"] = $windunit;
    }
    else if ($windunit == 'mph' && $wind["units"] == 'm/s')
    {
        msTomph($wind, "speed_avg");
        msTomph($wind, "speed");
        msTomph($wind, "gust_10min");     
        msTomph($wind, "gust");
        msTomph($wind, "gust_60min");
        msTomph($wind, "speed_max");
        msTomph($wind, "gust_max");
        msTomph($wind, "speed_15min_avg");
        msTomph($wind, "speed_30min_avg");
        msTomph($wind, "speed_maxtime");
        msTomph($wind, "speed_day_avg");
        msTomph($wind, "speed_alltime_max");
        msTomph($wind, "speed_yesterday_max");
        msTomph($wind, "speed_month_max");
        msTomph($wind, "speed_year_max");
        msTomph($wind, "speed_day_max");
        $wind["units"] = $windunit;
    }
    else if ($windunit == 'km/h' && $wind["units"] == 'kts')
    {
        ktsTokmh($wind, "speed_avg");
        ktsTokmh($wind, "speed");
        ktsTokmh($wind, "gust_10min");     
        ktsTokmh($wind, "gust");
        ktsTokmh($wind, "gust_60min");
        ktsTokmh($wind, "speed_max");
        ktsTokmh($wind, "gust_max");
        ktsTokmh($wind, "speed_15min_avg");
        ktsTokmh($wind, "speed_30min_avg");
        ktsTokmh($wind, "speed_maxtime");
        ktsTokmh($wind, "speed_day_avg");
        ktsTokmh($wind, "speed_alltime_max");
        ktsTokmh($wind, "speed_yesterday_max");
        ktsTokmh($wind, "speed_month_max");
        ktsTokmh($wind, "speed_year_max");
        ktsTokmh($wind, "speed_day_max");
        $wind["units"] = $windunit;
    }
    else if ($windunit == 'km/h' && $wind["units"] == 'mph')
    {
        mphTokmh($wind, "speed_avg");
        mphTokmh($wind, "speed");
        mphTokmh($wind, "gust_10min");     
        mphTokmh($wind, "gust");
        mphTokmh($wind, "gust_60min");
        mphTokmh($wind, "speed_max");
        mphTokmh($wind, "gust_max");
        mphTokmh($wind, "speed_15min_avg");
        mphTokmh($wind, "speed_30min_avg");
        mphTokmh($wind, "speed_maxtime");
        mphTokmh($wind, "speed_day_avg");
        mphTokmh($wind, "speed_alltime_max");
        mphTokmh($wind, "speed_yesterday_max");
        mphTokmh($wind, "speed_month_max");
        mphTokmh($wind, "speed_year_max");
        mphTokmh($wind, "speed_day_max");
        mphTokmh($lightning, "last_distance");
        $wind["units"] = $windunit;
    }
    else if ($windunit == 'km/h' && $wind["units"] == 'm/s')
    {
        msTokmh($wind, "speed_avg");
        msTokmh($wind, "speed");
        msTokmh($wind, "gust_10min");     
        msTokmh($wind, "gust");
        msTokmh($wind, "gust_60min");
        msTokmh($wind, "speed_max");
        msTokmh($wind, "gust_max");
        msTokmh($wind, "speed_15min_avg");
        msTokmh($wind, "speed_30min_avg");
        msTokmh($wind, "speed_maxtime");
        msTokmh($wind, "speed_day_avg");
        msTokmh($wind, "speed_alltime_max");
        msTokmh($wind, "speed_yesterday_max");
        msTokmh($wind, "speed_month_max");
        msTokmh($wind, "speed_year_max");
        msTokmh($wind, "speed_day_max");
        $wind["units"] = $windunit;
    }
    else if ($windunit == 'm/s' && $wind["units"] == 'kts')
    {
        ktsToms($wind, "speed_avg");
        ktsToms($wind, "speed");
        ktsToms($wind, "gust_10min");     
        ktsToms($wind, "gust");
        ktsToms($wind, "gust_60min");
        ktsToms($wind, "speed_max");
        ktsToms($wind, "gust_max");
        ktsToms($wind, "speed_15min_avg");
        ktsToms($wind, "speed_30min_avg");
        ktsToms($wind, "speed_maxtime");
        ktsToms($wind, "speed_day_avg");
        ktsToms($wind, "speed_alltime_max");
        ktsToms($wind, "speed_yesterday_max");
        ktsToms($wind, "speed_month_max");
        ktsToms($wind, "speed_year_max");
        ktsToms($wind, "speed_day_max");
        $wind["units"] = $windunit;
    }
    else if ($windunit == 'm/s' && $wind["units"] == 'mph')
    {
        mphToms($wind, "speed_avg");
        mphToms($wind, "speed");
        mphToms($wind, "gust_10min");     
        mphToms($wind, "gust");
        mphToms($wind, "gust_60min");
        mphToms($wind, "speed_max");
        mphToms($wind, "gust_max");
        mphToms($wind, "speed_15min_avg");
        mphToms($wind, "speed_30min_avg");
        mphToms($wind, "speed_maxtime");
        mphToms($wind, "speed_day_avg");
        mphToms($wind, "speed_alltime_max");
        mphToms($wind, "speed_yesterday_max");
        mphToms($wind, "speed_month_max");
        mphToms($wind, "speed_year_max");
        mphToms($wind, "speed_day_max");
        $wind["units"] = $windunit;
    }
    else if ($windunit == 'm/s' && $wind["units"] == 'km/h')
    {
        kmhToms($wind, "speed_avg");
        kmhToms($wind, "speed");
        kmhToms($wind, "gust_10min");     
        kmhToms($wind, "gust");
        kmhToms($wind, "gust_60min");
        kmhToms($wind, "speed_max");
        kmhToms($wind, "gust_max");
        kmhToms($wind, "speed_15min_avg");
        kmhToms($wind, "speed_30min_avg");
        kmhToms($wind, "speed_maxtime");
        kmhToms($wind, "speed_day_avg");
        kmhToms($wind, "speed_alltime_max");
        kmhToms($wind, "speed_yesterday_max");
        kmhToms($wind, "speed_month_max");
        kmhToms($wind, "speed_year_max");
        kmhToms($wind, "speed_day_max");
        $wind["units"] = $windunit;
    }
    else if ($windunit == 'kts' && $wind["units"] == 'm/s')
    {
        msTokts($wind, "speed_avg");
        msTokts($wind, "speed");
        msTokts($wind, "gust_10min");     
        msTokts($wind, "gust");
        msTokts($wind, "gust_60min");
        msTokts($wind, "speed_max");
        msTokts($wind, "gust_max");
        msTokts($wind, "speed_15min_avg");
        msTokts($wind, "speed_30min_avg");
        msTokts($wind, "speed_maxtime");
        msTokts($wind, "speed_day_avg");
        msTokts($wind, "speed_alltime_max");
        msTokts($wind, "speed_yesterday_max");
        msTokts($wind, "speed_month_max");
        msTokts($wind, "speed_year_max");
        msTokts($wind, "speed_day_max");
        msTokts($lightning, "last_distance");
        $wind["units"] = $windunit;
    }
    else if ($windunit == 'kts' && $wind["units"] == 'mph')
    {
        mphTokts($wind, "speed_avg");
        mphTokts($wind, "speed");
        mphTokts($wind, "gust_10min");     
        mphTokts($wind, "gust");
        mphTokts($wind, "gust_60min");
        mphTokts($wind, "speed_max");
        mphTokts($wind, "gust_max");
        mphTokts($wind, "speed_15min_avg");
        mphTokts($wind, "speed_30min_avg");
        mphTokts($wind, "speed_maxtime");
        mphTokts($wind, "speed_day_avg");
        mphTokts($wind, "speed_alltime_max");
        mphTokts($wind, "speed_yesterday_max");
        mphTokts($wind, "speed_month_max");
        mphTokts($wind, "speed_year_max");
        mphTokts($wind, "speed_day_max");
        $wind["units"] = $windunit;
    }
    else if ($windunit == 'kts' && $wind["units"] == 'km/h')
    {
        kmhTokts($wind, "speed_avg");
        kmhTokts($wind, "speed");
        kmhTokts($wind, "gust_10min");     
        kmhTokts($wind, "gust");
        kmhTokts($wind, "gust_60min");
        kmhTokts($wind, "speed_max");
        kmhTokts($wind, "gust_max");
        kmhTokts($wind, "speed_15min_avg");
        kmhTokts($wind, "speed_30min_avg");
        kmhTokts($wind, "speed_maxtime");
        kmhTokts($wind, "speed_day_avg");
        kmhTokts($wind, "speed_alltime_max");
        kmhTokts($wind, "speed_yesterday_max");
        kmhTokts($wind, "speed_month_max");
        kmhTokts($wind, "speed_year_max");
        kmhTokts($wind, "speed_day_max");
        $wind["units"] = $windunit;
    }
}
// Keep track of the conversion factor for windspeed to knots because it is useful in multiple places
if ($wind["units"] == 'mph')
{
    $toKnots = 0.868976;
}
else if ($wind["units"] == 'km/h')
{
    $toKnots = 0.5399568;
}
else if ($wind["units"] == 'm/s')
{
    $toKnots = 1.943844;
}
else
{
    $toKnots = 1;
}

$o = "Designed by weather34.com";
date_default_timezone_set($TZ);
// meteor shower alternative by betejuice cumulus forum
$meteor_default = "No Meteor";
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 1, 3) ,
    "event_title" => "Quadrantids Meteor",
    "event_end" => mktime(23, 59, 59, 1, 4) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 1, 5) ,
    "event_title" => "Quadrantids Meteor",
    "event_end" => mktime(23, 59, 59, 1, 12) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 12, 28, 2019) ,
    "event_title" => "Quadrantids Meteor",
    "event_end" => mktime(23, 59, 59, 1, 2, 2020) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 12, 28, 2020) ,
    "event_title" => "Quadrantids Meteor",
    "event_end" => mktime(23, 59, 59, 1, 2, 2021) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 12, 28, 2021) ,
    "event_title" => "Quadrantids Meteor",
    "event_end" => mktime(23, 59, 59, 1, 2, 2022) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 12, 28, 2022) ,
    "event_title" => "Quadrantids Meteor",
    "event_end" => mktime(23, 59, 59, 1, 2, 2023) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 12, 28, 2023) ,
    "event_title" => "Quadrantids Meteor",
    "event_end" => mktime(23, 59, 59, 1, 2, 2024) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 12, 28, 2024) ,
    "event_title" => "Quadrantids Meteor",
    "event_end" => mktime(23, 59, 59, 1, 2, 2025) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 4, 9) ,
    "event_title" => "Lyrids Meteor",
    "event_end" => mktime(20, 59, 59, 4, 20) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 4, 21) ,
    "event_title" => "Lyrids Meteor",
    "event_end" => mktime(23, 59, 59, 4, 22) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 5, 5) ,
    "event_title" => "ETA Aquarids",
    "event_end" => mktime(23, 59, 59, 5, 6) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 7, 20) ,
    "event_title" => "Delta Aquarids",
    "event_end" => mktime(23, 59, 59, 7, 28) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 7, 29) ,
    "event_title" => "Delta Aquarids",
    "event_end" => mktime(23, 59, 59, 7, 30) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 8, 1) ,
    "event_title" => "Perseids Meteor",
    "event_end" => mktime(23, 59, 59, 8, 10) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 8, 11) ,
    "event_title" => "Perseids Meteor",
    "event_end" => mktime(23, 59, 59, 8, 13) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 8, 14) ,
    "event_title" => "Perseids Meteor",
    "event_end" => mktime(23, 59, 59, 8, 18) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 10, 6) ,
    "event_title" => "Draconids",
    "event_end" => mktime(23, 59, 59, 10, 7) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 10, 20) ,
    "event_title" => "Orionids Meteor",
    "event_end" => mktime(23, 59, 59, 10, 21) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 11, 4) ,
    "event_title" => "South Taurids",
    "event_end" => mktime(23, 59, 59, 11, 5) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 11, 11) ,
    "event_title" => "North Taurids",
    "event_end" => mktime(23, 59, 59, 11, 11) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 11, 13) ,
    "event_title" => "Leonids Meteor",
    "event_end" => mktime(23, 59, 59, 11, 16) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 11, 17) ,
    "event_title" => "Leonids Meteor",
    "event_end" => mktime(23, 59, 59, 11, 18) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 11, 19) ,
    "event_title" => "Leonids Meteor",
    "event_end" => mktime(23, 59, 59, 11, 29) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 11, 30) ,
    "event_title" => "Geminids Meteor",
    "event_end" => mktime(23, 59, 59, 12, 12) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 12, 13) ,
    "event_title" => "Geminids Meteor",
    "event_end" => mktime(23, 59, 59, 12, 14) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 12, 16) ,
    "event_title" => "Ursids Meteor",
    "event_end" => mktime(23, 59, 59, 12, 20) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 12, 21) ,
    "event_title" => "Ursids Meteor",
    "event_end" => mktime(23, 59, 59, 12, 22) ,
);
$meteor_events[] = array(
    "event_start" => mktime(0, 0, 0, 12, 23) ,
    "event_title" => "Ursids Meteor",
    "event_end" => mktime(23, 59, 59, 12, 25) ,
);
$meteorNow = time();
$meteorOP = false;
foreach ($meteor_events as $meteor_check)
{
    if ($meteor_check["event_start"] <= $meteorNow && $meteorNow <= $meteor_check["event_end"])
    {
        $meteorOP = true;
        $meteor_default = $meteor_check["event_title"];
    }
};
//end meteor
$uptime = $weather["uptime"];
function convert_uptime($uptime)
{
    $dt1 = new DateTime("@0");
    $dt2 = new DateTime("@$uptime");
    return $dt1->diff($dt2)->format('%a day(s) %h hrs %i min');
}
//
//  Why are these in here still? Check necessity and validitity of this area
//
//
//
//
//
//lunar and solar eclipse /meteor shpwers advisory 2018-2019-2020
$eclipse_default = " <noalert>No Current Weather <spanyellow><ored>Alerts " . $alert . "</ored></spanyellow></noalert>";
//2 jul solar 2019
$eclipse_events[] = array(
    "event_start" => mktime(0, 0, 0, 7, 2, 2019) ,
    "event_title" => "<div style ='margin-top:5px;'>" . $solareclipsesvg . " <alert>Total Solar <spanyellow>Eclipse</spanyellow></alert>  </div>
",
    "event_end" => mktime(23, 59, 59, 7, 2, 2019) ,
);
//16/17 jul solar 2019
$eclipse_events[] = array(
    "event_start" => mktime(0, 0, 0, 7, 16, 2019) ,
    "event_title" => "<div style ='margin-top:5px;'>" . $solareclipsesvg . "  <alert>Partial Lunar <spanyellow>Eclipse</spanyellow></alert>  </div>
",
    "event_end" => mktime(23, 59, 59, 7, 17, 2019) ,
);
//persieds 2019
$eclipse_events[] = array(
    "event_start" => mktime(0, 0, 0, 8, 12, 2019) ,
    "event_title" => "<div style ='margin-top:5px;'>" . $meteorsvg . " <alert>Perseids <spanyellow>Meteor Shower</spanyellow></alert>  </div>
",
    "event_end" => mktime(23, 59, 59, 8, 13, 2019) ,
);
//leonids 2019
$eclipse_events[] = array(
    "event_start" => mktime(0, 0, 0, 11, 17, 2019) ,
    "event_title" => "<div style ='margin-top:5px;'>" . $meteorsvg . " <alert>Leonids <spanyellow>Meteor Shower</spanyellow></alert>  </div>
",
    "event_end" => mktime(23, 59, 59, 11, 18, 2018) ,
);
//geminids 2019
$eclipse_events[] = array(
    "event_start" => mktime(0, 0, 0, 12, 13, 2019) ,
    "event_title" => "<div style ='margin-top:5px;'>" . $meteorsvg . " <alert>Geminids <spanyellow>Meteor Shower</spanyellow></alert>  </div>
",
    "event_end" => mktime(23, 59, 59, 12, 14, 2019) ,
);
//5/6 dec solar 2019
$eclipse_events[] = array(
    "event_start" => mktime(0, 0, 0, 12, 26, 2019) ,
    "event_title" => "<div style ='margin-top:5px;'>" . $solareclipsesvg . "  <alert>Annular Solar <spanyellow>Eclipse</spanyellow></alert>  </div>
",
    "event_end" => mktime(23, 59, 59, 12, 26, 2019) ,
);
//Quadrantids 2020
$eclipse_events[] = array(
    "event_start" => mktime(0, 0, 0, 1, 3, 2020) ,
    "event_title" => "<div style ='margin-top:5px;'>" . $meteorsvg . "  <alert>Quadrantids <spanyellow>Meteor Shower</spanyellow></alert>  </div>
",
    "event_end" => mktime(23, 59, 59, 1, 4, 2020) ,
);
//output eclipse events
$eclipseNow = time();
$eclipseOP = false;
foreach ($eclipse_events as $eclipse_check)
{
    if ($eclipse_check["event_start"] <= $eclipseNow && $eclipseNow <= $eclipse_check["event_end"])
    {
        $eclipseOP = true;
        $eclipse_default = $eclipse_check["event_title"];
    }
};
//end lunar and solar eclipse /meteor shpwers advisory 2018-2019-2020
// This is not used in Australia, where is it used?
// firerisk based on cumulus forum thread http://sandaysoft.com/forum/viewtopic.php?f=14&t=2789&sid=77ffab8f6f2359e09e6c58d8b13a0c3c&start=30
$firerisk = number_format((((110 - 1.373 * $weather["humidity"]) - 0.54 * (10.20 - $weather["temp"])) * (124 * pow(10, (-0.0142 * $weather["humidity"])))) / 60, 0);

//wetbulb
$Tc = ($weather['temp']);
$P = $weather['barometer'];
$RH = $weather['humidity'];
$Tdc = (($Tc - (14.55 + 0.114 * $Tc) * (1 - (0.01 * $RH)) - pow((2.5 + 0.007 * $Tc) * (1 - (0.01 * $RH)) , 3) - (15.9 + 0.117 * $Tc) * pow(1 - (0.01 * $RH) , 14)));
$E = (6.11 * pow(10, (7.5 * $Tdc / (237.7 + $Tdc))));
$wetbulbcalc = (((0.00066 * $P) * $Tc) + ((4098 * $E) / pow(($Tdc + 237.7) , 2) * $Tdc)) / ((0.00066 * $P) + (4098 * $E) / pow(($Tdc + 237.7) , 2));
$wetbulbx = number_format($wetbulbcalc, 1);
// K-INDEX & SOLAR DATA FOR WEATHER34 HOMEWEATHERSTATION TEMPLATE RADIO HAMS REJOICE :-) //
$str = file_get_contents('jsondata/ki.txt');
$json = array_reverse(json_decode($str, false));
$kp = $json[1][1];
$file = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $file);
$mod34file = $break[count($break) - 1];

//Can this be removed, it appears to be Metobridge specific
//Convert Start times for Pro and Nano SD, Other MBs unforunately don't provide this data
if (is_numeric($weewxapi[186]) && $weewxapi[186] != '--')
{
    $weather['tempStartTime'] = date('M jS Y', strtotime($weewxapi[186]));
    $weather['windStartTime'] = date('M jS Y', strtotime($weewxapi[187]));
    $weather['pressStartTime'] = date('M jS Y', strtotime($weewxapi[188]));
    $weather['rainStartSec'] = strtotime($weewxapi[189]);
    $weather['rainStartTime'] = date('M jS Y', $weather['rainStartSec']);
}
else
{
    $weather['tempStartTime'] = 'All Time';
    $weather['windStartTime'] = 'All Time';
    $weather['pressStartTime'] = 'All Time';
    $weather['rainStartTime'] = 'All Time';
}

$weather['consoleLowBattery'] = intval($weewxapi[171]); # Console battery, 0 when battery is good, 1 when battery is low
$weather['stationLowBattery'] = intval($weewxapi[172]); # Station battery, 0 when battery is good, 1 when battery is low

?>