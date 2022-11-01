<?php
###################################################################################################
# This the the W34CombinedData.php file, which was created by using the original liveData.php file 
# that was writted and copyrighted by Brian Underwood (c) 2015-2019 for the Weather34 Template.    
#                  										   								                                                                                  
# The origianl liveData.php script was created for the Homeweather Station template at             
#                              https://weather34.com/homeweatherstation       			   
#                  																		# This WeeWx specific version of the liveData.php file has been adapted by Steepleian (Ian    	   
# Millard), with permission from Brian Underwood, December 2019.          						   
#                  																		#
#                                   https://claydonsweather.org.uk      						   
#                  																		#
# Code rewritted to handle numeric fields, when NULL in the database, being written as "   N/A" in 
# in the archivedata.php file, causing blank page to be displayed, due to strict error handling    
# in PHP8.                   																	   #
####################################################################################################
# original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original
# by weather34 (Brian Underwood)
include ('settings.php');
include ('shared.php');
error_reporting(0);
//weewx - api December 2019
try
{
    include ('serverdata/archivedata.php');
}
catch(Exception $e)
{
    error_log($e);
    error_log("ERROR IN ARCHIVEDATA.PHP SUSPECT ISSUE WITH ARCHIVEDATA.PHP.TMPL");
}
$weewxrt = array_map(function ($v)
{
    if ($v == 'NULL')
    {
        return null;
    }
    return $v;
}
, explode(" ", file_get_contents($livedata)));
if (isset($weewxapi))
{
    $weather["rain_alltime"] = $weewxapi[151];
    $year = substr($weewxrt[0], 6);
    //if ($livedataFormat == 'WeeWX-W34')
    //{
        if (isset($weewxrt[23]))
        {
            $weewxrt[23] = (float)(1 * $weewxrt[23]);
            $weewxrt[23] = number_format((float)$weewxrt[23], 0, '.', '');
        }
    //}
    $recordDate = mktime(substr($weewxrt[1], 0, 2) , substr($weewxrt[1], 3, 2) , substr($weewxrt[1], 6, 2) , substr($weewxrt[0], 3, 2) , substr($weewxrt[0], 0, 2) , $year);

    $stationlocation = $sta['location'];
    $lat = $sta['latitude'];
    $lon = $sta['longitude'];
    $elevation = $sta['altitude_meters'];
    $meteogramURL = $sta['link'];
    
    $weather["datetime"] = $recordDate;
    $weather["date"] = date($dateFormat, $recordDate);
    $weather["time"] = date($timeFormat, $recordDate);
    $barom["now"] = $weewxrt[10];
    //$barom["max"] = (is_numeric($weewxapi[34]) ? number_format($weewxapi[34], 1) : null);
    $barom["max"] = ($weewxapi[34] == "   N/A" ? "0" : $weewxapi[34]);
    $barom["min"] = ($weewxapi[36] == "   N/A" ? "0" : $weewxapi[36]);
    $barom["units"] = $weewxrt[15]; // mb or hPa or kPa or in
    $barom["trend"] = $weewxrt[10] - ($weewxapi[18] == "   N/A" ? "0" : $weewxapi[18]);
    $weather["temp_units"] = $weewxrt[14]; // C
    $weather["temp_indoor"] = $weewxrt[22];
    $weather["temp_indoor_feel"] = heatIndex($weewxrt[22], $weewxrt[23]); // must set temp_units first
    $weather["temp_indoormax"] = ($weewxapi[120] == "   N/A" ? "0" : $weewxapi[120]);
    $weather["temp_indoormin"] = ($weewxapi[121] == "   N/A" ? "0" : $weewxapi[121]);
    $weather["humidity_indoor"] = $weewxrt[23];
    $weather["humidity_indoor15"] = ($weewxapi[71] == "   N/A" ? "0" : $weewxapi[71]);
    $weather["humidity_indoortrend"] = $weewxrt[23] - ($weewxapi[71] == "   N/A" ? "0" : $weewxapi[71]);
    $weather["rain_rate"] = $weewxrt[8];
    $weather["dewpoint"] = (is_numeric($weewxrt[4]) ? number_format($weewxrt[4], 1) : null);
    $weather["rain_today"] = $weewxrt[9];
    $weather["rain_lasthour"] = ($weewxapi[47] == "   N/A" ? "0" : $weewxapi[47]);
    $weather["rain_last3hours"] = ($weewxapi[202] == "   N/A" ? "0" : $weewxapi[202]);
    $weather["rain_yesterday"] = ($weewxapi[21] == "   N/A" ? "0" : $weewxapi[21]);
    $weather["rain_month"] = ($weewxapi[19] == "   N/A" ? "0" : $weewxapi[19]);
    $weather["rain_year"] = ($weewxapi[20] == "   N/A" ? "0" : $weewxapi[20]);
    $weather["rain_24hrs"] = ($weewxapi[44] == "   N/A" ? "0" : $weewxapi[44]);
    $weather["rain_units"] = $weewxrt[16]; // mm or in
    $weather["uv"] = $weewxrt[43];
    $weather["solar"] = (is_numeric($weewxrt[45]) ? round($weewxrt[45], 1) : null);
    $weather["temp"] = $weewxrt[2];
    $weather["apptemp"] = ($weewxrt[54] == 'NULL' ? $weewxapi[205] : $weewxrt[54]); // Use Archive data if loop data missing^M
    $weather["heatindex"] = ($weewxrt[41] == 'NULL' ? $weewxapi[41] : $weewxrt[41]); // Use Archive data if loop data missing^M
    $weather["windchill"] = ($weewxrt[24] == 'NULL' ? $weewxapi[24] : $weewxrt[24]); // Use Archive data if loop data missing^M
    $weather["humidity"] = (is_numeric($weewxrt[3]) ? number_format($weewxrt[3], 0) : null);
    $weather["temp_today_high"] = (is_numeric($weewxrt[26]) ? number_format($weewxrt[26], 1) : null);
    $weather["temp_today_low"] = (is_numeric($weewxrt[28]) ? number_format($weewxrt[28], 1) : null);
    $weather["temp_avg15"] = (is_numeric($weewxrt[67]) ? number_format($weewxrt[67], 1) : null);
    $weather["temp_avg"] = ($weewxapi[123] == "   N/A" ? "0" : $weewxapi[123]);
    $weather["wind_speed_avg"] = $weewxrt[5]; //Console's Average Wind Speed
    $weather["wind_direction"] = (is_numeric($weewxrt[7]) ? number_format($weewxrt[7], 0) : null);
    $weather["wind_direction_avg"] = (is_numeric($weewxapi[46]) ? number_format($weewxapi[46], 0) : null);
    $weather["wind_speed"] = (is_numeric($weewxrt[6]) ? number_format($weewxrt[6], 0) : null); // Instant Wind Speed
    $weather["wind_gust_10min"] = $weewxrt[40]; // Wind Speed Gust - Max speed of last 10 minutes
    $weather["wind_gust_speed"] = ($weewxapi[40] == "   N/A" ? "0" : $weewxapi[40]);
    $weather["wind_gust_60min"] = ($weewxapi[201] == "   N/A" ? "0" : $weewxapi[201]);
    $weather["wind_speed_bft"] = $weewxrt[12];
    $weather["wind_speed_max"] = (is_numeric($weewxrt[30]) ? number_format($weewxrt[30], 1) : null);
    $weather["wind_gust_speed_max"] = (is_numeric($weewxrt[32]) ? number_format($weewxrt[32], 1) : null);
    $weather["wind_units"] = $weewxrt[13]; // m/s or mph or km/h or kts
    $weather["wind_speed_avg15"] = (is_numeric($weewxrt[72]) ? number_format($weewxrt[72], 1) : null);
    $weather["wind_speed_avg30"] = ($weewxapi[73] == "   N/A" ? "0" : $weewxapi[73]);
    $weather["sunshine"] = ($weewxapi[55] == "   N/A" ? "0" : $weewxapi[55]);
    $weather["maxsolar"] = (is_numeric($weewxapi[80]) ? number_format($weewxapi[80], 0) : null);
    $weather["maxuv"] = ($weewxapi[58] == "   N/A" ? "0" : $weewxapi[58]);
    $weather["sunny"] = ($weewxapi[57] == "   N/A" ? "0" : $weewxapi[57]);
    $weather["lux"] = (is_numeric($weewxrt[45]) ? number_format($weewxrt[45] / 0.00809399477, 0, '.', '') : null);
    $weather["maxtemptime"] = ($weewxapi[27] == "   N/A" ? "0" : $weewxapi[27]);
    $weather["lowtemptime"] = ($weewxapi[29] == "   N/A" ? "0" : $weewxapi[29]);
    $weather["maxwindtime"] = ($weewxapi[31] == "   N/A" ? "0" : $weewxapi[31]);
    $weather["maxgusttime"] = ($weewxapi[33] == "   N/A" ? "0" : $weewxapi[33]);
    //$weather["cloudbase3"] = ($weewxapi[203] == "   N/A" ? "0" : $weewxapi[203]);
    $weather["cloudbase3"] = ($weewxrt[52] == "   N/A" ? "0" : $weewxrt[52]);
    
    $weather["swversion"] = $weewxrt[38];
    $weather["build"] = $weewxrt[39];
    $weather["actualhardware"] = ($weewxapi[42] == "   N/A" ? "0" : $weewxapi[42]);
    $weather["mbplatform"] = ($weewxapi[41] == "   N/A" ? "0" : $weewxapi[41]);
    $weather["uptime"] = ($weewxapi[81] == "   N/A" ? "0" : $weewxapi[81]);
    // Verify the below variable of $weewxapi1
    //$weather["vpforecasttext"] = $weewxapi1[1]; //davis console forecast text
    $weather["temp_avgtoday"] = ($weewxapi[152] == "   N/A" ? "0" : $weewxapi[152]);
    //Verify next two variables as they are duplicates
    $weather['wind_speed_avg30'] = ($weewxapi[158] == "   N/A" ? "0" : $weewxapi[158]);
    $weather['wind_speed_avgday'] = ($weewxapi[158] == "   N/A" ? "0" : $weewxapi[158]);
    $weather["cloud_cover"] = ($weewxapi[204] == "   N/A" ? "0" : $weewxapi[204]);
    //weather34 windrun
    $weather["windrun"] = ($weewxrt[17] == "   N/A" ? "0" : $weewxrt[17]);
    //$weather["windrun"] = $weewxapi[200];
    //weather34 weewx moon sun data
    $weather["moonphase"] = ($weewxapi[153] == "   N/A" ? "0" : $weewxapi[153]);
    $weather["luminance"] = ($weewxapi[154] == "   N/A" ? "0" : $weewxapi[154]);
    $weather["daylight"] = ($weewxapi[155] == "   N/A" ? "0" : $weewxapi[155]);
    if ($weewxapi[156] == '--')
    {
        $weather["moonrise"] = 'In Transit';
    }
    else
    {
        $weather["moonrise"] = 'Rise<moonrisecolor> ' . date($timeFormatShort, strtotime($weewxapi[156]));
        $weather["moonset"] = 'Set<moonsetcolor> ' . date($timeFormatShort, strtotime($weewxapi[157]));
    }
    //uptimealt
    $convertuptimemb34 = $weather["uptime"];
    $uptimedays = floor($convertuptimemb34 / 86400);
    $uptimehours = floor(($convertuptimemb34 - ($uptimedays * 86400)) / 3600);
    //amusing indoor real feel
    $weather["dewpoint2"] = round(((pow(($weather["humidity_indoor"] / 100) , 0.125)) * (112 + 0.9 * $weather["temp_indoor"]) + (0.1 * $weather["temp_indoor"]) - 112) , 1);
    //humidex josep
    $t = 7.5 * $weather["temp"] / (237.7 + $weather["temp"]);
    $et = pow(10, $t);
    $e = 6.112 * $et * ($weather["humidity"] / 100);
    $weather["humidex"] = (is_numeric($weather["temp"]) ? number_format($weather["temp"] + (5 / 9) * ($e - 10) , 1) : null);
    if ($weather['luminance'] > 99.9)
    {
        $weather['luminance'] = 100;
    }
    if ($weather['luminance'] < 100)
    {
        $weather['luminance'] = round($weather['luminance'],2);
    }
    //weather34 convert weewx lunar segment
    if ($weather["moonphase"] == 0)
    {
        $weather["moonphase"] = 'New Moon';
    }
    else if ($weather["moonphase"] == 1)
    {
        $weather["moonphase"] = 'Waxing Crescent';
    }
    else if ($weather["moonphase"] == 2)
    {
        $weather["moonphase"] = 'First Quarter';
    }
    else if ($weather["moonphase"] == 3)
    {
        $weather["moonphase"] = 'Waxing Gibbous';
    }
    else if ($weather["moonphase"] == 4)
    {
        $weather["moonphase"] = 'Full Moon';
    }
    else if ($weather["moonphase"] == 5)
    {
        $weather["moonphase"] = 'Waning Gibbous';
    }
    else if ($weather["moonphase"] == 6)
    {
        $weather["moonphase"] = 'Last Quarter';
    }
    else if ($weather["moonphase"] == 7)
    {
        $weather["moonphase"] = 'Waning Crescent';
    }
    $weather["lightning_distance"] = $weewxrt[58];
    $weather["lightning_energy"] = $weewxrt[59];
    $weather["lightning_strike_count"] = $weewxrt[60];
    $weather["lightning_noise_count"] = $weewxrt[61];
    $weather["lightning_disturber_count"] = $weewxrt[62];
    // weatherflow lightning
    if (trim($weewxapi[77]) == 'N/A' || $weewxapi[77] == '0')
    {
        $weather["lightningtimeago"] = 0;
    }
    else
    {
        $parts = explode(" ", $weewxapi[77]);
        $parts1 = explode("/", $parts[0]);
        $weather["lightningtimeago"] = time() - strtotime("20" . $parts1[2] . $parts1[1] . $parts1[0] . " " . $parts[1]);
    }
    $weather["lightningday"] = ($weewxapi[76] == "   N/A" ? "0" : $weewxapi[76]);
    $weather["lightningmonth"] = ($weewxapi[74] == "   N/A" ? "0" : $weewxapi[74]);
    $weather["lightningyear"] = ($weewxapi[75] == "   N/A" ? "0" : $weewxapi[75]);
    
    //ecowitt lightning
    $lightning['light_last_distance'] = ($lightning['light_last_distance'] == "   N/A" ? "0" : $lightning['light_last_distance']);
    $lightning['last_time'] = ($lightning['last_time'] == "   N/A" ? "0" : $lightning['last_time']);
    $lightning['strike_count'] = ($lightning['strike_count'] == "   N/A" ? "0" : $lightning['strike_count']);
    $lightning['strike_count_3hr'] = ($lightning['strike_count_3hr'] == "   N/A" ? "0" : $lightning['strike_count_3hr']);

    $originalDate = ($weewxapi[83] == "   N/A" ? "0" : $weewxapi[83]);
    $tempydmaxtime = date("H:i", strtotime($originalDate));
    $originalDate1 = ($weewxapi[85] == "   N/A" ? "0" : $weewxapi[85]);
    $tempydmintime = date("H:i", strtotime($originalDate1));
    $originalDate2 = ($weewxapi[87] == "   N/A" ? "0" : $weewxapi[87]);
    $tempmmaxtime = date('jS M', strtotime($originalDate2));
    $tempmmaxtime2 = date('jS M', strtotime($originalDate2));
    $originalDate3 = ($weewxapi[89] == "   N/A" ? "0" : $weewxapi[89]);
    $tempmmintime = date('jS M ', strtotime($originalDate3));
    $originalDate4 = ($weewxapi[91] == "   N/A" ? "0" : $weewxapi[91]);
    $tempymaxtime = date('jS M', strtotime($originalDate4));
    $tempymaxtime2 = date('jS M', strtotime($originalDate4));
    $originalDate5 = ($weewxapi[93] == "   N/A" ? "0" : $weewxapi[93]);
    $tempymintime = date('jS M ', strtotime($originalDate5));
    $tempymintime2 = date('jS M', strtotime($originalDate5));
    $originalDate6 = ($weewxapi[27] == "   N/A" ? "0" : $weewxapi[27]);
    $tempdmaxtime = date('H:i', strtotime($originalDate6));
    $originalDate7 = ($weewxapi[29] == "   N/A" ? "0" : $weewxapi[29]);
    $tempdmintime = date('H:i', strtotime($originalDate7));
    $originalDatea9 = ($weewxapi[126] == "   N/A" ? "0" : $weewxapi[126]);
    $tempamaxtime = date("jS M Y", strtotime($originalDatea9));
    $weather["tempamax"] = ($weewxapi[125] == "   N/A" ? "0" : $weewxapi[125]); //temp alltime
    $weather["tempamaxtime"] = $tempamaxtime; //seconds
    $originalDatea10 = ($weewxapi[128] == "   N/A" ? "0" : $weewxapi[128]);
    $tempamintime = date("jS M Y", strtotime($originalDatea10));
    $weather["tempamin"] = ($weewxapi[127] == "   N/A" ? "0" : $weewxapi[127]); //temp alltime
    $weather["tempamintime"] = $tempamintime; //seconds
    $weather["tempydmax"] = ($weewxapi[82] == "   N/A" ? "0" : $weewxapi[82]); //temp max yesterday
    $weather["tempydmaxtime"] = $tempydmaxtime; //seconds
    $weather["tempydmin"] = ($weewxapi[84] == "   N/A" ? "0" : $weewxapi[84]); //temp min yesterday
    $weather["tempydmintime"] = $tempydmintime; //seconds
    $weather["tempmmax"] = ($weewxapi[86] == "   N/A" ? "0" : $weewxapi[86]); //temp max month
    $weather["tempmmaxtime"] = $tempmmaxtime; //date
    $weather["tempmmaxtime2"] = $tempmmaxtime2; //date
    $weather["tempmmin"] = ($weewxapi[88] == "   N/A" ? "0" : $weewxapi[88]); //temp min month
    $weather["tempmmintime"] = $tempmmintime; //date
    $weather["tempymax"] = ($weewxapi[90] == "   N/A" ? "0" : $weewxapi[90]); //temp max year
    $weather["tempymaxtime"] = $tempymaxtime; //seconds
    $weather["tempymaxtime2"] = $tempymaxtime2; //seconds
    $weather["tempymin"] = ($weewxapi[92] == "   N/A" ? "0" : $weewxapi[92]); //temp min year
    $weather["tempymintime"] = $tempymintime; //seconds
    $weather["tempymintime2"] = $tempymintime2; //seconds
    $weather["tempdmax"] = ($weewxapi[26] == "   N/A" ? "0" : $weewxapi[26]); //temp max today
    $weather["tempdmaxtime"] = $tempdmaxtime; //seconds
    $weather["tempdmin"] = ($weewxapi[28] == "   N/A" ? "0" : $weewxapi[28]); //temp max today
    $weather["tempdmintime"] = $tempdmintime; //seconds
    //dewpoint year/month/yesterday alltime
    //all time
    $originalDatea11 = $weewxapi[130];
    $dewamaxtime = date("jS M Y", strtotime($originalDatea11));
    $weather["dewamax"] = ($weewxapi[129] == "   N/A" ? "0" : $weewxapi[129]); //temp alltime
    $weather["dewamaxtime"] = $dewamaxtime; //seconds
    $originalDatea12 = ($weewxapi[132] == "   N/A" ? "0" : $weewxapi[132]);
    $dewamintime = date("jS M Y", strtotime($originalDatea12));
    $weather["dewamin"] = ($weewxapi[131] == "   N/A" ? "0" : $weewxapi[131]); //temp alltime
    $weather["dewamintime"] = $dewamintime; //seconds
    //dewpoint year
    $originalDate44 = ($weewxapi[55] == "   N/A" ? "0" : $weewxapi[55]);
    $dewymaxtime = date('jS M', strtotime($originalDate44));
    $originalDate45 = ($weewxapi[57] == "   N/A" ? "0" : $weewxapi[57]);
    $dewymintime = date('jS M', strtotime($originalDate45));
    $weather["dewymax"] = ($weewxapi[54] == "   N/A" ? "0" : $weewxapi[54]); //temp max year
    $weather["dewymaxtime"] = $dewymaxtime; //seconds
    $weather["dewymin"] = ($weewxapi[56] == "   N/A" ? "0" : $weewxapi[56]); //temp min year
    $weather["dewymintime"] = $dewymintime; //seconds
    //dewpoint today
    $originalDate46 = ($weewxapi[64] == "   N/A" ? "0" : $weewxapi[64]);
    $dewmaxtime = date('H:i', strtotime($originalDate46));
    $originalDate47 = ($weewxapi[66] == "   N/A" ? "0" : $weewxapi[66]);
    $dewmintime = date('H:i', strtotime($originalDate47));
    $weather["dewmax"] = ($weewxapi[63] == "   N/A" ? "0" : $weewxapi[63]); //temp max year
    $weather["dewmaxtime"] = $dewmaxtime; //seconds
    $weather["dewmin"] = ($weewxapi[65] == "   N/A" ? "0" : $weewxapi[65]); //temp min year
    $weather["dewmintime"] = $dewmintime; //seconds
    //dewpoint month
    $originalDate74 = ($weewxapi[49] == "   N/A" ? "0" : $weewxapi[49]);
    $dewmmaxtime = date('jS M', strtotime($originalDate74));
    $originalDate75 = ($weewxapi[31] == "   N/A" ? "0" : $weewxapi[31]);
    $dewmmintime = date('jS M', strtotime($originalDate75));
    $weather["dewmmax"] = ($weewxapi[48] == "   N/A" ? "0" : $weewxapi[48]); //dew max month
    $weather["dewmmaxtime"] = $dewmmaxtime; //seconds
    $weather["dewmmin"] = $weewxapi[50]; //dew min month
    $weather["dewmmintime"] = $dewmmintime; //seconds
    //dewpoint yesterday
    $originalDate84 = ($weewxapi[53] == "   N/A" ? "0" : $weewxapi[53]);
    $dewydmaxtime = date('H:i', strtotime($originalDate84));
    $originalDate85 = ($weewxapi[121] == "   N/A" ? "0" : $weewxapi[121]);
    $dewydmintime = date('H:i', strtotime($originalDate85));
    $weather["dewydmax"] = ($weewxapi[52] == "   N/A" ? "0" : $weewxapi[52]);
    $weather["dewydmaxtime"] = $dewydmaxtime; //seconds
    $weather["dewydmin"] = ($weewxapi[120] == "   N/A" ? "0" : $weewxapi[120]);
    $weather["dewydmintime"] = $dewydmintime; //seconds
    //humidity almanac
    //hum max
    $weather["humidity_max"] = (is_numeric($weewxapi[59]) ? number_format($weewxapi[59], 0) : null);
    $originalDate734 = ($weewxapi[60] == "   N/A" ? "0" : $weewxapi[60]);
    $hummaxtime = date('H:i', strtotime($originalDate734));
    $weather["humidity_maxtime"] = $hummaxtime;
    //hum min
    $weather["humidity_min"] = (is_numeric($weewxapi[61]) ? number_format($weewxapi[61], 0) : null);
    $originalDate774 = ($weewxapi[62] == "   N/A" ? "0" : $weewxapi[62]);
    $hummintime = date('H:i', strtotime($originalDate774));
    $weather["humidity_mintime"] = $hummintime;
    //hum year max
    $weather["humidity_ymax"] = (is_numeric($weewxapi[163]) ? number_format($weewxapi[163], 0) : null);
    $originalDate754 = ($weewxapi[164] == "   N/A" ? "0" : $weewxapi[164]);
    $humymaxtime = date('jS M', strtotime($originalDate754));
    $weather["humidity_ymaxtime"] = $humymaxtime;
    //hum year min
    $weather["humidity_ymin"] = (is_numeric($weewxapi[165]) ? number_format($weewxapi[165], 0) : null);
    $originalDate755 = ($weewxapi[166] == "   N/A" ? "0" : $weewxapi[166]);
    $humymintime = date('jS M', strtotime($originalDate755));
    $weather["humidity_ymintime"] = $humymintime;
    //hum month max
    $weather["humidity_mmax"] = (is_numeric($weewxapi[159]) ? number_format($weewxapi[159], 0) : null);
    $originalDate756 = ($weewxapi[160] == "   N/A" ? "0" : $weewxapi[160]);
    $hummmaxtime = date('jS M', strtotime($originalDate756));
    $weather["humidity_mmaxtime"] = $hummmaxtime;
    //hum month min
    $weather["humidity_mmin"] = (is_numeric($weewxapi[161]) ? number_format($weewxapi[161], 0) : null);
    $originalDate757 = ($weewxapi[162] == "   N/A" ? "0" : $weewxapi[162]);
    $hummmintime = date('jS M', strtotime($originalDate757));
    $weather["humidity_mmintime"] = $hummmintime;
    //hum yesterday max
    $weather["humidity_ydmax"] = (is_numeric($weewxapi[167]) ? number_format($weewxapi[167], 0) : null);
    $originalDate758 = ($weewxapi[168] == "   N/A" ? "0" : $weewxapi[168]);
    $humydmaxtime = date('H:i', strtotime($originalDate758));
    $weather["humidity_ydmaxtime"] = $humydmaxtime;
    //hum yesterday min
    $weather["humidity_ydmin"] = (is_numeric($weewxapi[169]) ? number_format($weewxapi[169], 0) : null);
    $originalDate759 = ($weewxapi[170] == "   N/A" ? "0" : $weewxapi[170]);
    $humydmintime = date('H:i', strtotime($originalDate759));
    $weather["humidity_ydmintime"] = $humydmintime;
    //hum alltime max
    $weather["humidity_amax"] = (is_numeric($weewxapi[206]) ? number_format($weewxapi[206], 0) : null);
    $originalDate758 = ($weewxapi[207] == "   N/A" ? "0" : $weewxapi[207]);
    $humamaxtime = date('jS M Y', strtotime($originalDate758));
    $weather["humidity_amaxtime"] = $humamaxtime;
    //hum alltime min
    $weather["humidity_amin"] = (is_numeric($weewxapi[208]) ? number_format($weewxapi[208], 0) : null);
    $originalDate759 = ($weewxapi[209] == "   N/A" ? "0" : $weewxapi[209]);
    $humamintime = date('jS M Y', strtotime($originalDate759));
    $weather["humidity_amintime"] = $humamintime;
    //wind gust
    $originalDate8 = ($weewxapi[95] == "   N/A" ? "0" : $weewxapi[95]);
    $windydmaxtime = date("H:i", strtotime($originalDate8));
    $originalDate9 = ($weewxapi[97] == "   N/A" ? "0" : $weewxapi[97]);
    $windmmaxtime = date('jS M', strtotime($originalDate9));
    $windmmaxtime2 = date('jS M', strtotime($originalDate9));
    $originalDate10 = ($weewxapi[99] == "   N/A" ? "0" : $weewxapi[99]);
    $windymaxtime = date('jS M', strtotime($originalDate10));
    $windymaxtime2 = date('jS M', strtotime($originalDate10));
    $originalDate11 = ($weewxapi[33] == "   N/A" ? "0" : $weewxapi[33]);
    $winddmaxtime = date('H:i', strtotime($originalDate11));
    $originalavgDate = ($weewxapi[31] == "   N/A" ? "0" : $weewxapi[31]);
    $windavgdmaxtime = date("H:i", strtotime($originalavgDate));
    $originalDate8a = ($weewxapi[134] == "   N/A" ? "0" : $weewxapi[134]);
    $windamaxtime = date("jS M Y", strtotime($originalDate8a));
    $weather["windamax"] = ($weewxapi[133] == "   N/A" ? "0" : $weewxapi[133]); //wind max yesterday
    $weather["windamaxtime"] = $windamaxtime; //seconds
    $weather["windavgdmaxtime"] = $windavgdmaxtime; //seconds
    $weather["windydmax"] = ($weewxapi[94] == "   N/A" ? "0" : $weewxapi[94]); //wind max yesterday
    $weather["windydmaxtime"] = $windydmaxtime; //seconds
    $weather["windmmax"] = ($weewxapi[96] == "   N/A" ? "0" : $weewxapi[96]); //wind max month
    $weather["windmmaxtime"] = $windmmaxtime; //seconds
    $weather["windmmaxtime2"] = $windmmaxtime2; //seconds
    $weather["windymax"] = ($weewxapi[98] == "   N/A" ? "0" : $weewxapi[98]); //wind max year
    $weather["windymaxtime"] = $windymaxtime; //seconds
    $weather["windymaxtime2"] = $windymaxtime2; //seconds
    $weather["winddmax"] = ($weewxapi[32] == "   N/A" ? "0" : $weewxapi[32]); //wind max year
    $weather["winddmaxtime"] = $winddmaxtime; //seconds
    //rain
    $originalDate12 = ($weewxapi[102] == "   N/A" ? "0" : $weewxapi[102]);
    $rainmmaxtime = date("jS M", strtotime($originalDate12));
    $originalDate13 = ($weewxapi[104] == "   N/A" ? "0" : $weewxapi[104]);
    $rainymaxtime = date("jS M Y", strtotime($originalDate13));
    $originalDate124 = ($weewxapi[124] == "   N/A" ? "0" : $weewxapi[124]);
    $rainlasttime = date("jS M Y ", strtotime($originalDate124));
    $originalDate25 = ($weewxapi[124] == "   N/A" ? "0" : $weewxapi[124]);
    $rainlastmonth = date("M", strtotime($originalDate25));
    $originalDate26 = ($weewxapi[124] == "   N/A" ? "0" : $weewxapi[124]);
    $rainlasttoday = date("H:i", strtotime($originalDate26));
    $originalDate27 = ($weewxapi[124] == "   N/A" ? "0" : $weewxapi[124]);
    $rainlasttoday1 = date("jS", strtotime($originalDate27));
    $weather["rainydmax"] = ($weewxapi[21] == "   N/A" ? "0" : $weewxapi[21]); //rain max yesterday
    $weather["rainmmax"] = ($weewxapi[101] == "   N/A" ? "0" : $weewxapi[101]); //wind max month
    $weather["rainmmaxtime"] = $rainmmaxtime; //seconds
    $weather["rainymax"] = ($weewxapi[103] == "   N/A" ? "0" : $weewxapi[103]); //wind max year
    $weather["rainymaxtime"] = $rainymaxtime; //seconds
    $weather["rain_alltime"] = ($weewxapi[151] == "   N/A" ? "0" : $weewxapi[151]); // Total rain, all years
    //pressure yesterday
    $baromaxoriginalDateb0 = ($weewxapi[136] == "   N/A" ? "0" : $weewxapi[136]);
    $baromaxtimeyest = date("H:i", strtotime($baromaxoriginalDateb0));
    $barominoriginalDateb1 = ($weewxapi[138] == "   N/A" ? "0" : $weewxapi[138]);
    $baromintimeyest = date("H:i", strtotime($barominoriginalDateb1));
    $barom["yesterday_maxtime"] = $baromaxtimeyest; //seconds
    $barom["yesterday_mintime"] = $baromintimeyest; //seconds
    $barom["yesterday_max"] = ($weewxapi[135] == "   N/A" ? "0" : $weewxapi[135]); //max yesterday
    $barom["yesterday_min"] = ($weewxapi[137] == "   N/A" ? "0" : $weewxapi[137]); //min yesterday
    //pressure month
    $baromaxoriginalDateb2 = ($weewxapi[140] == "   N/A" ? "0" : $weewxapi[140]);
    $baromaxtimemonth = date("jS M", strtotime($baromaxoriginalDateb2));
    $barominoriginalDateb3 = ($weewxapi[142] == "   N/A" ? "0" : $weewxapi[142]);
    $baromintimemonth = date("jS M", strtotime($barominoriginalDateb3));
    $barom["month_maxtime"] = $baromaxtimemonth; //seconds
    $barom["month_mintime"] = $baromintimemonth; //seconds
    $barom["month_max"] = ($weewxapi[139] == "   N/A" ? "0" : $weewxapi[139]); //max month
    $barom["month_min"] = ($weewxapi[141] == "   N/A" ? "0" : $weewxapi[141]); //min month
    //pressure year
    $baromaxoriginalDateb4 = ($weewxapi[144] == "   N/A" ? "0" : $weewxapi[144]);
    $baromaxtimeyear = date("jS M", strtotime($baromaxoriginalDateb4));
    $barominoriginalDateb5 = ($weewxapi[146] == "   N/A" ? "0" : $weewxapi[146]);
    $baromintimeyear = date("jS M", strtotime($barominoriginalDateb5));
    $barom["year_maxtime"] = $baromaxtimeyear; //seconds
    $barom["year_mintime"] = $baromintimeyear; //seconds
    $barom["year_max"] = ($weewxapi[143] == "   N/A" ? "0" : $weewxapi[143]); //max year
    $barom["year_min"] = ($weewxapi[145] == "   N/A" ? "0" : $weewxapi[145]); //min year
    //pressure all time
    $baromaxoriginalDateb6 = ($weewxapi[148] == "   N/A" ? "0" : $weewxapi[148]);
    $baromaxtimeall = date("jS M Y", strtotime($baromaxoriginalDateb6));
    $barominoriginalDateb7 = ($weewxapi[150] == "   N/A" ? "0" : $weewxapi[150]);
    $baromintimeall = date("jS M Y", strtotime($barominoriginalDateb7));
    $barom["alltime_maxtime"] = $baromaxtimeall; //seconds
    $barom["alltime_mintime"] = $baromintimeall; //seconds
    $barom["alltime_max"] = ($weewxapi[147] == "   N/A" ? "0" : $weewxapi[147]); //max all time
    $barom["alltime_min"] = ($weewxapi[149] == "   N/A" ? "0" : $weewxapi[149]); //min all time
    //pressure today
    $baromaxoriginalDate = ($weewxapi[35] == "   N/A" ? "0" : $weewxapi[35]);
    $baromaxtime = date("H:i", strtotime($baromaxoriginalDate));
    $barominoriginalDate = ($weewxapi[37] == "   N/A" ? "0" : $weewxapi[37]);
    $baromintime = date("H:i", strtotime($barominoriginalDate));
    $barom["maxtime"] = $baromaxtime; //seconds
    $barom["mintime"] = $baromintime; //seconds
    //alamanac solar
    $solaroriginalDate = ($weewxapi[108] == "   N/A" ? "0" : $weewxapi[108]);
    $solarydmaxtime = date("H:i", strtotime($solaroriginalDate));
    $solaroriginalDate2 = ($weewxapi[110] == "   N/A" ? "0" : $weewxapi[110]);
    $solarmmaxtime = date('jS M H:i', strtotime($solaroriginalDate2));
    $solaroriginalDate4 = ($weewxapi[112] == "   N/A" ? "0" : $weewxapi[112]);
    $solarymaxtime = date('jS M H:i', strtotime($solaroriginalDate4));
    $solaroriginalDate6 = ($weewxapi[106] == "   N/A" ? "0" : $weewxapi[106]);
    $solardmaxtime = date('H:i', strtotime($solaroriginalDate6));
    $solaroriginalDate7 = ($weewxapi[213] == "   N/A" ? "0" : $weewxapi[213]);
    $solaramaxtime = date('jS M Y', strtotime($solaroriginalDate7));
    $weather["solarydmax"] = (is_numeric($weewxapi[107]) ? number_format($weewxapi[107], 0, '.', '') : null); //temp max yesterday
    $weather["solarydmaxtime"] = $solarydmaxtime; //seconds
    $weather["solarmmax"] = (is_numeric($weewxapi[109]) ? number_format($weewxapi[109], 0, '.', '') : null); //temp max month
    $weather["solarmmaxtime"] = $solarmmaxtime; //date
    $weather["solarymax"] = (is_numeric($weewxapi[111]) ? number_format($weewxapi[111], 0, '.', '') : null); //temp max year
    $weather["solarymaxtime"] = $solarymaxtime; //seconds
    $weather["solardmax"] = (is_numeric($weewxapi[105]) ? number_format($weewxapi[105], 0, '.', '') : null); //temp max today
    $weather["solardmaxtime"] = $solardmaxtime; //seconds
    $weather["solaramax"] = (is_numeric($weewxapi[212]) ? number_format($weewxapi[212], 0, '.', '') : null); //temp max today
    $weather["solaramaxtime"] = $solaramaxtime; //seconds
    //alamanac uv
    $uvoriginalDate = ($weewxapi[115] == "   N/A" ? "0" : $weewxapi[115]);
    $uvydmaxtime = date("H:i", strtotime($uvoriginalDate));
    $uvoriginalDate2 = ($weewxapi[117] == "   N/A" ? "0" : $weewxapi[117]);
    $uvmmaxtime = date('jS M H:i', strtotime($uvoriginalDate2));
    $uvoriginalDate4 = ($weewxapi[119] == "   N/A" ? "0" : $weewxapi[119]);
    $uvymaxtime = date('jS M H:i', strtotime($uvoriginalDate4));
    $uvoriginalDate6 = ($weewxapi[113] == "   N/A" ? "0" : $weewxapi[113]);
    $uvdmaxtime = date('H:i', strtotime($uvoriginalDate6));
    $uvoriginalDate7 = ($weewxapi[211] == "   N/A" ? "0" : $weewxapi[211]);
    $uvamaxtime = date('jS M Y', strtotime($uvoriginalDate7));
    $weather["uvydmax"] = (is_numeric($weewxapi[114]) ? number_format($weewxapi[114], 1) : null); //temp max yesterday
    $weather["uvydmaxtime"] = $uvydmaxtime; //seconds
    $weather["uvmmax"] = (is_numeric($weewxapi[116]) ? number_format($weewxapi[116], 1) : null); //temp max month
    $weather["uvmmaxtime"] = $uvmmaxtime; //date
    $weather["uvymax"] = (is_numeric($weewxapi[118]) ? number_format($weewxapi[118], 1) : null); //temp max year
    $weather["uvymaxtime"] = $uvymaxtime; //seconds
    $weather["uvdmax"] = (is_numeric($weewxapi[58]) ? number_format($weewxapi[58], 1) : null); //temp max today
    $weather["uvdmaxtime"] = $uvdmaxtime; //seconds
    $weather["uvamax"] = (is_numeric($weewxapi[210]) ? number_format($weewxapi[210], 1) : null); //temp max alltime
    $weather["uvamaxtime"] = $uvamaxtime; //seconds
    //trends will update 15 minutes after a reboot or power failure
    $weather["temp_trend"] = number_format($weewxrt[2], 1) - number_format($weewxapi[67], 1);
    $weather["humidity_trend"] = number_format($weewxapi[3], 0) - number_format($weewxapi[68], 0);
    $weather["dewpoint_trend"] = number_format($weewxrt[4], 1) - number_format($weewxapi[69], 1);
    $weather["temp_indoor_trend"] = number_format($weewxrt[22], 1) - number_format($weewxapi[70], 1);
    $weather["temp_humidity_trend"] = number_format($weewxrt[23], 1) - number_format($weewxapi[71], 1);
    $weather["barotrend"] = $weewxrt[10] - $barotrend[0];
    $weather['barometer6h'] = $weewxrt[10] - $weewxapi[73];
    $weather['winddir6h'] = ($weewxapi[72] == "   N/A" ? "0" : $weewxapi[72]);
    $weather["dirtrend"] = $dirtrend[0];
    //barometer units
    if ($barom["units"] == "in")
    {
        // standardize format
        $barom["units"] = "inHg";
    }
}
// Convert temperatures if necessary
if ($tempunit != $weather["temp_units"])
{
    if ($tempunit == "C")
    {
        fToC($weather, "temp_indoor");
        fToC($weather, "temp_indoormax");
        fToC($weather, "temp_indoormin");
        fToC($weather, "temp");
        fToC($weather, "temp2");
        fToC($weather, "temp_avg");
        fToC($weather, "apptemp");
        fToC($weather, "windchill");
        fToC($weather, "heatindex");
        fToC($weather, "dewpoint");
        fToC($weather, "temp_indoor_feel");
        fToC($weather, "temp_indoor_feel2");
        fToC($weather, "temp_today_high");
        fToC($weather, "temp_today_low");
        fToC($weather, "temp_avgtoday");
        fToC($weather, "avgtemp");
        fToC($weather, "tempydmax");
        fToC($weather, "tempydmin");
        fToC($weather, "tempmmax");
        fToC($weather, "tempmmin");
        fToC($weather, "tempymax");
        fToC($weather, "tempymin");
        fToC($weather, "tempdmax");
        fToC($weather, "tempdmin");
        fToC($weather, "tempamax");
        fToC($weather, "tempamin");
        fToC($weather, "dewmax");
        fToC($weather, "dewmin");
        fToC($weather, "dewamax");
        fToC($weather, "dewamin");
        fToC($weather, "dewmmax");
        fToC($weather, "dewmmin");
        fToC($weather, "dewymax");
        fToC($weather, "dewymin");
        fToC($weather, "dewydmax");
        fToC($weather, "dewydmin");
        fToC($weather, "dewpoint2");
        fToC($weather, "realfeel");
        fToCrel($weather, "temp_trend");
        fToCrel($weather, "dewpoint_trend");
        fToCrel($weather, "humidex");
        $weather["temp_units"] = $tempunit;
    }
    else if ($tempunit == "F")
    {
        cToF($weather, "temp_indoor");
        cToF($weather, "temp");
        cToF($weather, "temp2");
        cToF($weather, "temp_avg");
        cToF($weather, "temp_indoormax");
        cToF($weather, "temp_indoormin");
        cToF($weather, "apptemp");
        cToF($weather, "windchill");
        cToF($weather, "heatindex");
        cToF($weather, "dewpoint");
        cToF($weather, "temp_indoor_feel");
        cToF($weather, "temp_indoor_feel2");
        cToF($weather, "temp_today_high");
        cToF($weather, "temp_today_low");
        cToF($weather, "temp_avgtoday");
        cToF($weather, "avgtemp");
        cToF($weather, "tempydmax");
        cToF($weather, "tempydmin");
        cToF($weather, "tempamax");
        cToF($weather, "tempamin");
        cToF($weather, "tempmmax");
        cToF($weather, "tempmmin");
        cToF($weather, "tempymax");
        cToF($weather, "tempymin");
        cToF($weather, "tempdmax");
        cToF($weather, "tempdmin");
        cToF($weather, "dewmax");
        cToF($weather, "dewmin");
        cToF($weather, "dewamax");
        cToF($weather, "dewamin");
        cToF($weather, "dewmmax");
        cToF($weather, "dewmmin");
        cToF($weather, "dewymax");
        cToF($weather, "dewymin");
        cToF($weather, "dewydmax");
        cToF($weather, "dewydmin");
        cToF($weather, "dewpoint2");
        cToF($weather, "realfeel");
        cToFrel($weather, "temp_trend");
        cToFrel($weather, "dewpoint_trend");
        cToFrel($weather, "humidex");
        $weather["temp_units"] = $tempunit;
    }
}
// Convert rainfall units if necessary
if ($rainunit != $weather["rain_units"])
{
    if ($rainunit == "mm")
    {
        inTomm($weather, "rain_rate");
        inTomm($weather, "rain_today");
        inTomm($weather, "rain_month");
        inTomm($weather, "rain_year");
        inTomm($weather, "rainydmax");
        inTomm($weather, "rain_lasthour");
        inTomm($weather, "rain_last3hours");
        inTomm($weather, "rain_yesterday");
        inTomm($weather, "rainymax");
        inTomm($weather, "rainmmax");
        inTomm($weather, "rain_24hrs");
        inTomm($weather, "rain_alltime");
        $weather["rain_units"] = $rainunit;
    }
    else if ($rainunit == "in")
    {
        mmToin($weather, "rain_rate");
        mmToin($weather, "rain_today");
        mmToin($weather, "rain_month");
        mmToin($weather, "rain_year");
        mmToin($weather, "rainydmax");
        mmToin($weather, "rain_lasthour");
        mmToin($weather, "rain_last3hours");
        mmToin($weather, "rain_yesterday");
        mmToin($weather, "rainymax");
        mmToin($weather, "rainmmax");
        mmToin($weather, "rain_24hrs");
        mmToin($weather, "rain_alltime");
        $weather["rain_units"] = $rainunit;
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
        mbToin($barom, "alltime_max", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "alltime_min", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "year_max", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "year_min", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "yesterday_max", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "yesterday_min", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "month_max", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "month_min", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "trend", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "trend1", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "barometermovement", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "max", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "min", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "avg", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "barometert", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "barotrend", ($barom["units"] == 'kPa' ? 1000 : 1));
        mbToin($barom, "trendt", ($barom["units"] == 'kPa' ? 1000 : 1));
        $barom["units"] = $pressureunit;
    }
    else if (($pressureunit == "mb" || $pressureunit == 'hPa' || $pressureunit == 'kPa') && $barom["units"] == 'inHg')
    {
        inTomb($barom, "now", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($barom, "alltime_max", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($barom, "alltime_min", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($barom, "year_max", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($barom, "year_min", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($barom, "yesterday_max", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($barom, "yesterday_min", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($barom, "month_max", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($barom, "month_min", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($barom, "trend", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($barom, "trend1", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($barom, "barometermovement", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($barom, "max", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($barom, "min", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($barom, "avg", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($barom, "barometert", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($barom, "barotrend", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($barom, "trendt", ($pressureunit == 'kPa' ? 0.001 : 1));
        $barom["units"] = $pressureunit;
    }
}
//Convert cloudbase
if ($windunit != $weather["wind_units"])
{
    if (($windunit == 'mph' || $windunit == 'kts') && ($weather["wind_units"] == 'm/s' || $weather["wind_units"] == 'km/h'))
    {
        $weather["cloudbase3"] = round($weather["cloudbase3"] * 3.281, 0);
    }
    else if (($windunit == 'm/s' || $windunit == 'km/h') && ($weather["wind_units"] == 'mph' || $weather["wind_units"] == 'kts'))
    {
        $weather["cloudbase3"] = round($weather["cloudbase3"] / 3.281, 0);
    }
}
// Convert wind speed units if necessary
if ($windunit != $weather["wind_units"])
{
    if ($windunit == 'mph' && $weather["wind_units"] == 'kts')
    {
        ktsTomph($weather, "wind_speed");
        ktsTomph($weather, "wind_speed2");
        ktsTomph($weather, "wind_speed_trend");
        ktsTomph($weather, "wind_gust_speed");
        ktsTomph($weather, "wind_gust_speed2");
        ktsTomph($weather, "wind_gust_speed_trend");
        ktsTomph($weather, "wind_speed_max");
        ktsTomph($weather, "wind_gust_speed_max");
        ktsTomph($weather, "wind_run");
        ktsTomph($weather, "wind_speed_avg");
        ktsTomph($weather, "wind_speed_avg15");
        ktsTomph($weather, "wind_speed_avg30");
        ktsTomph($weather, "wind_speed_avgday");
        ktsTomph($weather, "windamax");
        ktsTomph($weather, "winddmax");
        ktsTomph($weather, "windydmax");
        ktsTomph($weather, "windmmax");
        ktsTomph($weather, "windymax");
        ktsTomph($weather, "windrun34");
        ktsTomph($weather, "wind_gust_60min");
        $weather["wind_units"] = $windunit;
    }
    else if ($windunit == 'mph' && $weather["wind_units"] == 'km/h')
    {
        kmhTomph($weather, "wind_speed");
        kmhTomph($weather, "wind_speed2");
        kmhTomph($weather, "wind_speed_trend");
        kmhTomph($weather, "wind_gust_speed");
        kmhTomph($weather, "wind_gust_speed2");
        kmhTomph($weather, "wind_gust_speed_trend");
        kmhTomph($weather, "wind_speed_max");
        kmhTomph($weather, "wind_gust_speed_max");
        kmhTomph($weather, "wind_run");
        kmhTomph($weather, "wind_speed_avg");
        kmhTomph($weather, "wind_speed_avg15");
        kmhTomph($weather, "wind_speed_avg30");
        kmhTomph($weather, "wind_speed_avgday");
        kmhTomph($weather, "windamax");
        kmhTomph($weather, "winddmax");
        kmhTomph($weather, "windydmax");
        kmhTomph($weather, "windmmax");
        kmhTomph($weather, "windymax");
        kmhTomph($weather, "windrun34");
        kmhTomph($weather, "wind_gust_60min");
        $weather["wind_units"] = $windunit;
    }
    else if ($windunit == 'mph' && $weather["wind_units"] == 'm/s')
    {
        msTomph($weather, "wind_speed");
        msTomph($weather, "wind_speed2");
        msTomph($weather, "wind_speed_trend");
        msTomph($weather, "wind_gust_speed");
        msTomph($weather, "wind_gust_speed2");
        msTomph($weather, "wind_gust_speed_trend");
        msTomph($weather, "wind_speed_max");
        msTomph($weather, "wind_gust_speed_max");
        msTomph($weather, "wind_run");
        msTomph($weather, "wind_speed_avg");
        msTomph($weather, "wind_speed_avg15");
        msTomph($weather, "wind_speed_avg30");
        msTomph($weather, "wind_speed_avgday");
        msTomph($weather, "winddmax");
        msTomph($weather, "windamax");
        msTomph($weather, "windydmax");
        msTomph($weather, "windmmax");
        msTomph($weather, "windymax");
        msTomph($weather, "windrun34");
        msTomph($weather, "wind_gust_60min");
        $weather["wind_units"] = $windunit;
    }
    else if ($windunit == 'km/h' && $weather["wind_units"] == 'kts')
    {
        ktsTokmh($weather, "wind_speed");
        ktsTokmh($weather, "wind_speed2");
        ktsTokmh($weather, "wind_speed_trend");
        ktsTokmh($weather, "wind_gust_speed");
        ktsTokmh($weather, "wind_gust_speed2");
        ktsTokmh($weather, "wind_gust_speed_trend");
        ktsTokmh($weather, "wind_speed_max");
        ktsTokmh($weather, "wind_gust_speed_max");
        ktsTokmh($weather, "wind_run");
        ktsTokmh($weather, "wind_speed_avg");
        ktsTokmh($weather, "wind_speed_avg15");
        ktsTokmh($weather, "wind_speed_avg30");
        ktsTokmh($weather, "wind_speed_avgday");
        ktsTokmh($weather, "winddmax");
        ktsTokmh($weather, "windamax");
        ktsTokmh($weather, "windydmax");
        ktsTokmh($weather, "windmmax");
        ktsTokmh($weather, "windymax");
        ktsTokmh($weather, "windrun34");
        ktsTokmh($weather, "wind_gust_60min");
        $weather["wind_units"] = $windunit;
    }
    else if ($windunit == 'km/h' && $weather["wind_units"] == 'mph')
    {
        mphTokmh($weather, "wind_speed");
        mphTokmh($weather, "wind_speed2");
        mphTokmh($weather, "wind_speed_trend");
        mphTokmh($weather, "wind_gust_speed");
        mphTokmh($weather, "wind_gust_speed2");
        mphTokmh($weather, "wind_gust_speed_trend");
        mphTokmh($weather, "wind_speed_max");
        mphTokmh($weather, "wind_gust_speed_max");
        mphTokmh($weather, "wind_run");
        mphTokmh($weather, "wind_speed_avg");
        mphTokmh($weather, "wind_speed_avg15");
        mphTokmh($weather, "wind_speed_avg30");
        mphTokmh($weather, "wind_speed_avgday");
        mphTokmh($weather, "winddmax");
        mphTokmh($weather, "windamax");
        mphTokmh($weather, "windydmax");
        mphTokmh($weather, "windmmax");
        mphTokmh($weather, "windymax");
        mphTokmh($weather, "windrun34");
        mphTokmh($weather, "wind_gust_60min");
        $weather["wind_units"] = $windunit;
    }
    else if ($windunit == 'km/h' && $weather["wind_units"] == 'm/s')
    {
        msTokmh($weather, "wind_speed");
        msTokmh($weather, "wind_speed2");
        msTokmh($weather, "wind_speed_trend");
        msTokmh($weather, "wind_gust_speed");
        msTokmh($weather, "wind_gust_speed2");
        msTokmh($weather, "wind_gust_speed_trend");
        msTokmh($weather, "wind_speed_max");
        msTokmh($weather, "wind_gust_speed_max");
        msTokmh($weather, "wind_run");
        msTokmh($weather, "wind_speed_avg");
        msTokmh($weather, "wind_speed_avg15");
        msTokmh($weather, "wind_speed_avg30");
        msTokmh($weather, "wind_speed_avgday");
        msTokmh($weather, "winddmax");
        msTokmh($weather, "windamax");
        msTokmh($weather, "windydmax");
        msTokmh($weather, "windmmax");
        msTokmh($weather, "windymax");
        msTokmh($weather, "windrun34");
        msTokmh($weather, "wind_gust_60min");
        $weather["wind_units"] = $windunit;
    }
    else if ($windunit == 'm/s' && $weather["wind_units"] == 'kts')
    {
        ktsToms($weather, "wind_speed");
        ktsToms($weather, "wind_speed2");
        ktsToms($weather, "wind_speed_trend");
        ktsToms($weather, "wind_gust_speed");
        ktsToms($weather, "wind_gust_speed2");
        ktsToms($weather, "wind_gust_speed_trend");
        ktsToms($weather, "wind_speed_max");
        ktsToms($weather, "wind_gust_speed_max");
        ktsToms($weather, "wind_gust_speed1");
        ktsToms($weather, "wind_run");
        ktsToms($weather, "wind_speed_avg");
        ktsToms($weather, "wind_speed_avg15");
        ktsToms($weather, "wind_speed_avg30");
        ktsToms($weather, "wind_speed_avgday");
        ktsToms($weather, "winddmax");
        ktsToms($weather, "windamax");
        ktsToms($weather, "windydmax");
        ktsToms($weather, "windmmax");
        ktsToms($weather, "windymax");
        ktsToms($weather, "windrun34");
        ktsToms($weather, "wind_gust_60min");
        $weather["wind_units"] = $windunit;
    }
    else if ($windunit == 'm/s' && $weather["wind_units"] == 'mph')
    {
        mphToms($weather, "wind_speed");
        mphToms($weather, "wind_speed2");
        mphToms($weather, "wind_speed_trend");
        mphToms($weather, "wind_gust_speed");
        mphToms($weather, "wind_gust_speed2");
        mphToms($weather, "wind_gust_speed_trend");
        mphToms($weather, "wind_speed_max");
        mphToms($weather, "wind_gust_speed_max");
        mphToms($weather, "wind_run");
        mphToms($weather, "wind_speed_avg");
        mphTokmh($weather, "wind_speed_avg15");
        mphTokmh($weather, "wind_speed_avg30");
        mphTokmh($weather, "wind_speed_avgday");
        mphTokmh($weather, "winddmax");
        mphTokmh($weather, "windamax");
        mphTokmh($weather, "windydmax");
        mphTokmh($weather, "windmmax");
        mphTokmh($weather, "windymax");
        mphToms($weather, "windrun34");
        mphTokmh($weather, "wind_gust_60min");
        $weather["wind_units"] = $windunit;
    }
    else if ($windunit == 'm/s' && $weather["wind_units"] == 'km/h')
    {
        kmhToms($weather, "wind_speed");
        kmhToms($weather, "wind_speed2");
        kmhToms($weather, "wind_speed_trend");
        kmhToms($weather, "wind_gust_speed");
        kmhToms($weather, "wind_gust_speed2");
        kmhToms($weather, "wind_gust_speed_trend");
        kmhToms($weather, "wind_speed_max");
        kmhToms($weather, "wind_gust_speed_max");
        kmhToms($weather, "wind_run");
        kmhToms($weather, "wind_speed_avg");
        kmhToms($weather, "wind_speed_avg15");
        kmhToms($weather, "wind_speed_avg30");
        kmhToms($weather, "wind_speed_avgday");
        kmhToms($weather, "winddmax");
        kmhToms($weather, "windamax");
        kmhToms($weather, "windydmax");
        kmhToms($weather, "windmmax");
        kmhToms($weather, "windymax");
        kmhToms($weather, "windrun34");
        kmhToms($weather, "wind_gust_60min");
        $weather["wind_units"] = $windunit;
    }
    else if ($windunit == 'kts' && $weather["wind_units"] == 'm/s')
    {
        msTokts($weather, "wind_speed");
        msTokts($weather, "wind_speed2");
        msTokts($weather, "wind_speed_trend");
        msTokts($weather, "wind_gust_speed");
        msTokts($weather, "wind_gust_speed2");
        msTokts($weather, "wind_gust_speed_trend");
        msTokts($weather, "wind_speed_max");
        msTokts($weather, "wind_gust_speed_max");
        msTokts($weather, "wind_run");
        msTokts($weather, "wind_speed_avg");
        msTokts($weather, "wind_speed_avg15");
        msTokts($weather, "wind_speed_avg30");
        msTokts($weather, "wind_speed_avgday");
        msTokts($weather, "winddmax");
        msTokts($weather, "windamax");
        msTokts($weather, "windydmax");
        msTokts($weather, "windmmax");
        msTokts($weather, "windymax");
        msTokts($weather, "windrun34");
        msTokts($weather, "wind_gust_60min");
        $weather["wind_units"] = $windunit;
    }
    else if ($windunit == 'kts' && $weather["wind_units"] == 'mph')
    {
        mphTokts($weather, "wind_speed");
        mphTokts($weather, "wind_speed2");
        mphTokts($weather, "wind_speed_trend");
        mphTokts($weather, "wind_gust_speed");
        mphTokts($weather, "wind_gust_speed2");
        mphTokts($weather, "wind_gust_speed_trend");
        mphTokts($weather, "wind_speed_max");
        mphTokts($weather, "wind_gust_speed_max");
        mphTokts($weather, "wind_run");
        mphTokts($weather, "wind_speed_avg");
        mphTokts($weather, "wind_speed_avg15");
        mphTokts($weather, "wind_speed_avg30");
        mphTokts($weather, "wind_speed_avgday");
        mphTokts($weather, "winddmax");
        mphTokts($weather, "windamax");
        mphTokts($weather, "windydmax");
        mphTokts($weather, "windmmax");
        mphTokts($weather, "windymax");
        mphTokts($weather, "windrun34");
        mphTokts($weather, "wind_gust_60min");
        $weather["wind_units"] = $windunit;
    }
    else if ($windunit == 'kts' && $weather["wind_units"] == 'km/h')
    {
        kmhTokts($weather, "wind_speed");
        kmhTokts($weather, "wind_speed2");
        kmhTokts($weather, "wind_speed_trend");
        kmhTokts($weather, "wind_gust_speed");
        kmhTokts($weather, "wind_gust_speed2");
        kmhTokts($weather, "wind_gust_speed_trend");
        kmhTokts($weather, "wind_speed_max");
        kmhTokts($weather, "wind_gust_speed_max");
        kmhTokts($weather, "wind_run");
        kmhTokts($weather, "wind_speed_avg");
        kmhTokts($weather, "wind_speed_avg15");
        kmhTokts($weather, "wind_speed_avg30");
        kmhTokts($weather, "wind_speed_avgday");
        kmhTokts($weather, "winddmax");
        kmhTokts($weather, "windamax");
        kmhTokts($weather, "windydmax");
        kmhTokts($weather, "windmmax");
        kmhTokts($weather, "windymax");
        kmhTokts($weather, "windrun34");
        kmhTokts($weather, "wind_gust_60min");
        $weather["wind_units"] = $windunit;
    }
}
// Keep track of the conversion factor for windspeed to knots because it is useful in multiple places
if ($weather["wind_units"] == 'mph')
{
    $toKnots = 0.868976;
}
else if ($weather["wind_units"] == 'km/h')
{
    $toKnots = 0.5399568;
}
else if ($weather["wind_units"] == 'm/s')
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