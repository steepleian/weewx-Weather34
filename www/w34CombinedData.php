<?php 
	####################################################################################################
	#	THE ORIGINAL LIVEDATA.PHP script by BRIAN UNDERDOWN 2015-2016-2017-2018-2019                      #
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at https://weather34.com/homeweatherstation               # 
	# 	                                                                                                  #
	# 	THIS WEEWX SPECIFIC VERSION OF LIVEDATA.PHP BY STEEPLEIAN (IAN MILLARD) FOR WEEWX DECEMBER 2019   #
	# 	                                                                                                  #
	#   https://claydonsweather.org.uk 	                                                                  #
	####################################################################################################
 //original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
 include('settings.php');include('shared.php');error_reporting(0); 
//weewx - api December 2019 

    try {
    	include('serverdata/archivedata.php');
    } catch (Exception $e) {
      error_log($e);
      error_log("ERROR IN ARCHIVEDATA.PHP SUSPECT ISSUE WITH ARCHIVEDATA.PHP.TMPL");
    }
    $weewxrt = array_map(function($v) { if($v == 'NULL') { return null; } return $v; }, explode(" ", file_get_contents($livedata)));
    if (isset($weewxapi)){
        $weather["rain_alltime"] = $weewxapi[151];
        $year = substr($weewxrt[0], 6);
        if ($livedataFormat == 'WeeWX-W34') {
     	    if (isset($weewxrt[23])) {
	        $weewxrt[23] = (float)(1*$weewxrt[23]);
	        $weewxrt[23] = number_format((float)$weewxrt[23],0,'.','');
  	    }	
        }
	$recordDate = mktime(substr($weewxrt[1], 0, 2), substr($weewxrt[1], 3, 2), substr($weewxrt[1], 6, 2),
	substr($weewxrt[0], 3, 2), substr($weewxrt[0], 0, 2), $year);
	$weather["datetime"]           = $recordDate;
	$weather["date"]               = date($dateFormat, $recordDate);
	$weather["time"]               = date($timeFormat, $recordDate);
	$weather["barometer"]          = $weewxrt[10];
	$weather["barometer_max"]      = $weewxapi[34];
	$weather["barometer_min"]      = $weewxapi[36];
	$weather["barometer_units"]    = $weewxrt[15]; // mb or hPa or kPa or in
	$weather["barometer_trend"]    = $weewxrt[10] - $weewxapi[18];
	$weather["temp_units"]         = $weewxrt[14]; // C
	$weather["temp_indoor"]        = $weewxrt[22];
	$weather["temp_indoor_feel"]   = heatIndex($weewxrt[22], $weewxrt[23]); // must set temp_units first
	$weather["temp_indoormax"]     = $weewxapi[120];
	$weather["temp_indoormin"]     = $weewxapi[121];
	$weather["humidity_indoor"]    = $weewxrt[23];
	$weather["humidity_indoor15"]=$weewxapi[71];
	$weather["humidity_indoortrend"]=$weewxrt[23]-$weewxapi[71];
	$weather["rain_rate"]          = $weewxrt[8];
	$weather["dewpoint"]           = number_format($weewxrt[4],1);
	$weather["rain_today"]         = $weewxrt[9];
	$weather["rain_lasthour"]      = $weewxapi[47];
	$weather["rain_last3hours"]    = $weewxapi[202];
	$weather["rain_yesterday"]     = $weewxapi[21];
	$weather["rain_month"]         = $weewxapi[19];
	$weather["rain_year"]          = $weewxapi[20];
	$weather["rain_24hrs"]         = $weewxapi[44];
	$weather["rain_units"]         = $weewxrt[16]; // mm or in
	$weather["uv"]                 = $weewxrt[43];
	$weather["solar"]              = round($weewxrt[45],1);
	$weather["temp"]               = $weewxrt[2];
	$weather["apptemp"]            = ($weewxrt[54] == 'NULL' ? $weewxapi[205] : $weewxrt[54]); // Use Archive data if loop data missing^M
	$weather["heatindex"]          = ($weewxrt[41] == 'NULL' ? $weewxapi[41]  : $weewxrt[41]); // Use Archive data if loop data missing^M
	$weather["windchill"]          = ($weewxrt[24] == 'NULL' ? $weewxapi[24]  : $weewxrt[24]); // Use Archive data if loop data missing^M
	$weather["humidity"]           = number_format($weewxrt[3],0);	
	$weather["temp_today_high"]    = $weewxapi[26];
	$weather["temp_today_low"]     = $weewxapi[28];
	$weather["temp_avg15"]         = $weewxapi[67];
	$weather["temp_avg"]           = $weewxapi[123]; // last 60 minutes
	$weather["wind_speed_avg"]     = $weewxrt[5]; //Console's Average Wind Speed
	$weather["wind_direction"]     = number_format($weewxrt[7],0);
	$weather["wind_direction_avg"] = (is_numeric($weewxapi[46]) ? number_format($weewxapi[46],0) : null);
	$weather["wind_speed"]         = number_format($weewxrt[6]); // Instant Wind Speed
	$weather["wind_gust_10min"]    = $weewxrt[40]; // Wind Speed Gust - Max speed of last 10 minutes
	$weather["wind_gust_speed"]    = $weewxapi[40]; // 
	$weather["wind_gust_60min"]    = $weewxapi[201]; // 
	$weather["wind_speed_bft"]     = $weewxrt[12];
	$weather["wind_speed_max"]     = $weewxapi[30];	
	$weather["wind_gust_speed_max"]= $weewxapi[32];	
	$weather["wind_units"]         = $weewxrt[13]; // m/s or mph or km/h or kts
	$weather["wind_speed_avg15"]   = $weewxapi[72];
	$weather["wind_speed_avg30"]   = $weewxapi[73];
	$weather["sunshine"]           = $weewxapi[55];
	$weather["maxsolar"]           = number_format($weewxapi[80],0);
	$weather["maxuv"]              = $weewxapi[58];	
	$weather["sunny"]              = $weewxapi[57];
	$weather["lux"] 	       = number_format($weewxrt[45]/0.00809399477,0, '.', '');
	$weather["maxtemptime"]        = $weewxapi[27];
	$weather["lowtemptime"]        = $weewxapi[29];
	$weather["maxwindtime"]        = $weewxapi[31];
	$weather["maxgusttime"]        = $weewxapi[33];
	$weather["cloudbase3"]         = $weewxapi[203]; 	
	$weather["wind_run"]           = number_format($weather["wind_speed"]/24,3); //10 minute wind run
	$weather["swversion"]	       = $weewxrt[38];
	$weather["build"]	       = $weewxrt[39];
	$weather["actualhardware"]     = $weewxapi[42];
	$weather["mbplatform"]	       = $weewxapi[41];
	$weather["uptime"]	       = $weewxapi[81];//uptime in seconds
	$weather["vpforecasttext"]     = $weewxapi1[1];//davis console forecast text
	$weather["temp_avgtoday"]      = $weewxapi[152];
	$weather['wind_speed_avg30']   = $weewxapi[158];
	$weather['wind_speed_avgday']  = $weewxapi[158];
        $weather["cloud_cover"]        = $weewxapi[204]; 
	//weather34 windrun
	$windrunhr=date('G');$windrunmin=(($windrunmin=date('i')/60));
	$windrunformula=$windrunhr=date('G')+$windrunmin;
	$weather["windrun34"]=$weather['wind_speed_avg30']*number_format($windrunformula,1);
	//weather34 weewx moon sun data 
        $weather["moonphase"]=$weewxapi[153];$weather["luminance"]=$weewxapi[154];$weather["daylight"]=$weewxapi[155];if ($weewxapi[156]=='--'){$weather["moonrise"]='In Transit';}
	else $weather["moonrise"]='Rise<moonrisecolor> '.date($timeFormatShort, strtotime($weewxapi[156]));$weather["moonset"]='Set<moonsetcolor> '.date($timeFormatShort, strtotime($weewxapi[157]));
	
        //uptimealt
	$convertuptimemb34 = $weather["uptime"];$uptimedays = floor($convertuptimemb34 / 86400);$uptimehours = floor(($convertuptimemb34 -($uptimedays*86400)) / 3600);
	//amusing indoor real feel
	$weather["dewpoint2"] = round(((pow(($weather["humidity_indoor"]/100), 0.125))*(112+0.9*$weather["temp_indoor"] )+(0.1*$weather["temp_indoor"] )-112),1);
	//humidex josep
	$t=7.5*$weather["temp"]/(237.7+$weather["temp"]); $et= pow(10,$t);$e=6.112*$et*($weather["humidity"]/100);$weather["humidex"] =number_format($weather["temp"]+(5/9)*($e-10),1);	
	
if ($weather['luminance']>99.9){$weather['luminance']=100;}
if ($weather['luminance']<100){$weather['luminance']=$weather['luminance'];}
//weather34 convert weewx lunar segment
if ($weather["moonphase"]==0) {$weather["moonphase"]='New Moon';}else if ($weather["moonphase"]==1) {$weather["moonphase"]='Waxing Crescent';}else if ($weather["moonphase"]==2 ) {$weather["moonphase"]='First Quarter';}else if ($weather["moonphase"]==3 ) {$weather["moonphase"]='Waxing Gibbous';}else if ($weather["moonphase"]==4 ) {$weather["moonphase"]='Full Moon';}else if ($weather["moonphase"]==5) {$weather["moonphase"]='Waning Gibbous';}else if ($weather["moonphase"]==6) {$weather["moonphase"]='Last Quarter';}else if ($weather["moonphase"]==7){$weather["moonphase"]='Waning Crescent';}
	
	$weather["lightning_distance"]        = $weewxrt[58];
	$weather["lightning_energy"]          = $weewxrt[59];
	$weather["lightning_strike_count"]    = $weewxrt[60];
	$weather["lightning_noise_count"]     = $weewxrt[61];
	$weather["lightning_disturber_count"] = $weewxrt[62];
	
        // weatherflow lightning
        if (trim($weewxapi[77]) == 'N/A' || $weewxapi[77] == '0')
	    $weather["lightningtimeago"] = 0;
        else{
            $parts  = explode(" ", $weewxapi[77]); 
            $parts1 = explode("/", $parts[0]); 
	    $weather["lightningtimeago"] = time()-strtotime("20".$parts1[2].$parts1[1].$parts1[0]." ".$parts[1]);
        }

	$weather["lightningday"]       = $weewxapi[76];
	$weather["lightningmonth"]     = $weewxapi[74];
	$weather["lightningyear"]      = $weewxapi[75];
	
	$originalDate = $weewxapi[83];
    $tempydmaxtime = date("H:i", strtotime($originalDate));
	$originalDate1 = $weewxapi[85];
    $tempydmintime = date("H:i", strtotime($originalDate1));
	$originalDate2 = $weewxapi[87];
    $tempmmaxtime = date('jS M', strtotime($originalDate2));
	$tempmmaxtime2 = date('jS M', strtotime($originalDate2));
	$originalDate3 = $weewxapi[89];
    $tempmmintime =  date('jS M ', strtotime($originalDate3));
	$originalDate4 = $weewxapi[91];
    $tempymaxtime = date('jS M', strtotime($originalDate4));
	$tempymaxtime2 = date('jS M', strtotime($originalDate4));
	$originalDate5 = $weewxapi[93];
    $tempymintime =  date('jS M ', strtotime($originalDate5));
	$tempymintime2 =  date('jS M', strtotime($originalDate5));		
	$originalDate6 = $weewxapi[27];
    $tempdmaxtime = date('H:i', strtotime($originalDate6));
	$originalDate7 = $weewxapi[29];
    $tempdmintime =  date('H:i', strtotime($originalDate7));
	
	$originalDatea9 = $weewxapi[126];
    $tempamaxtime = date("jS M Y", strtotime($originalDatea9));
	$weather["tempamax"]		    = $weewxapi[125]; //temp alltime
	$weather["tempamaxtime"]		= $tempamaxtime; //seconds
	
	$originalDatea10 = $weewxapi[128];
    $tempamintime = date("jS M Y", strtotime($originalDatea10));
	$weather["tempamin"]		    = $weewxapi[127]; //temp alltime
	$weather["tempamintime"]		= $tempamintime; //seconds
	
	
	
	
	$weather["tempydmax"]		    = $weewxapi[82]; //temp max yesterday
	$weather["tempydmaxtime"]		= $tempydmaxtime; //seconds
	$weather["tempydmin"]		    = $weewxapi[84]; //temp min yesterday
	$weather["tempydmintime"]		= $tempydmintime; //seconds
	$weather["tempmmax"]		    = $weewxapi[86]; //temp max month
	$weather["tempmmaxtime"]		= $tempmmaxtime; //date
	$weather["tempmmaxtime2"]		= $tempmmaxtime2; //date
	$weather["tempmmin"]		    = $weewxapi[88]; //temp min month
	$weather["tempmmintime"]		= $tempmmintime; //date
	$weather["tempymax"]		    = $weewxapi[90]; //temp max year
	$weather["tempymaxtime"]		= $tempymaxtime; //seconds
	$weather["tempymaxtime2"]		= $tempymaxtime2; //seconds
	$weather["tempymin"]		    = $weewxapi[92]; //temp min year
	$weather["tempymintime"]		= $tempymintime; //seconds	
	$weather["tempymintime2"]		= $tempymintime2; //seconds	
	$weather["tempdmax"]		    = $weewxapi[26]; //temp max today
	$weather["tempdmaxtime"]		= $tempdmaxtime; //seconds	
	$weather["tempdmin"]		    = $weewxapi[28]; //temp max today
	$weather["tempdmintime"]		= $tempdmintime; //seconds	
	
	//dewpoint year/month/yesterday alltime
	//all time
	$originalDatea11 = $weewxapi[130];
    $dewamaxtime = date("jS M Y", strtotime($originalDatea11));
	$weather["dewamax"]		    = $weewxapi[129]; //temp alltime
	$weather["dewamaxtime"]		= $dewamaxtime; //seconds
	
	$originalDatea12 = $weewxapi[132];
    $dewamintime = date("jS M Y", strtotime($originalDatea12));
	$weather["dewamin"]		    = $weewxapi[131]; //temp alltime
	$weather["dewamintime"]		= $dewamintime; //seconds
	
	
	//dewpoint year
	$originalDate44 = $weewxapi[55];
    $dewymaxtime = date('jS M', strtotime($originalDate44));	
	$originalDate45 = $weewxapi[57];
    $dewymintime =  date('jS M', strtotime($originalDate45));	
	$weather["dewymax"]		    = $weewxapi[54]; //temp max year
	$weather["dewymaxtime"]		= $dewymaxtime; //seconds	
	$weather["dewymin"]		    = $weewxapi[56]; //temp min year
	$weather["dewymintime"]		= $dewymintime; //seconds	
	//dewpoint today
	$originalDate46 = $weewxapi[64];
    $dewmaxtime = date('H:i', strtotime($originalDate46));	
	$originalDate47 = $weewxapi[66];
    $dewmintime =  date('H:i', strtotime($originalDate47));
	$weather["dewmax"]		    = $weewxapi[63]; //temp max year
	$weather["dewmaxtime"]		= $dewmaxtime; //seconds	
	$weather["dewmin"]		    = $weewxapi[65]; //temp min year
	$weather["dewmintime"]		= $dewmintime; //seconds
	//dewpoint month
	$originalDate74 = $weewxapi[49];
    $dewmmaxtime = date('jS M', strtotime($originalDate74));	
	$originalDate75 = $weewxapi[51];
    $dewmmintime =  date('jS M', strtotime($originalDate75));	
	$weather["dewmmax"]		    = $weewxapi[48]; //dew max month
	$weather["dewmmaxtime"]		= $dewmmaxtime; //seconds	
	$weather["dewmmin"]		    = $weewxapi[50]; //dew min month
	$weather["dewmmintime"]		= $dewmmintime; //seconds	
	//dewpoint yesterday
	$originalDate84 = $weewxapi[53];
    $dewydmaxtime = date('H:i', strtotime($originalDate84));	
	$originalDate85 = $weewxapi[121];
    $dewydmintime =  date('H:i', strtotime($originalDate85));	
	$weather["dewydmax"]		    = $weewxapi[52]; //temp max year
	$weather["dewydmaxtime"]		= $dewydmaxtime; //seconds	
	$weather["dewydmin"]		    = $weewxapi[120]; //temp min year
	$weather["dewydmintime"]		= $dewydmintime; //seconds	
	
//humidity almanac	
//hum max
$weather["humidity_max"]=number_format($weewxapi[59],0);
$originalDate734=$weewxapi[60];
$hummaxtime=date('H:i',strtotime($originalDate734));
$weather["humidity_maxtime"]=$hummaxtime;
//hum min
$weather["humidity_min"]=number_format($weewxapi[61],0);
$originalDate774=$weewxapi[62];
$hummintime=date('H:i',strtotime($originalDate774));
$weather["humidity_mintime"]=$hummintime;

//hum year max
$weather["humidity_ymax"]=number_format($weewxapi[163],0);
$originalDate754=$weewxapi[164];
$humymaxtime=date('jS M',strtotime($originalDate754));
$weather["humidity_ymaxtime"]=$humymaxtime;
//hum year min
$weather["humidity_ymin"]=number_format($weewxapi[165],0);
$originalDate755=$weewxapi[166];
$humymintime=date('jS M',strtotime($originalDate755));
$weather["humidity_ymintime"]=$humymintime;

//hum month max
$weather["humidity_mmax"]=number_format($weewxapi[159],0);
$originalDate756=$weewxapi[160];
$hummmaxtime=date('jS M',strtotime($originalDate756));
$weather["humidity_mmaxtime"]=$hummmaxtime;
//hum month min
$weather["humidity_mmin"]=number_format($weewxapi[161],0);
$originalDate757=$weewxapi[162];
$hummmintime=date('jS M',strtotime($originalDate757));
$weather["humidity_mmintime"]=$hummmintime;

//hum yesterday max
$weather["humidity_ydmax"]=number_format($weewxapi[167],0);
$originalDate758=$weewxapi[168];
$humydmaxtime=date('H:i',strtotime($originalDate758));
$weather["humidity_ydmaxtime"]=$humydmaxtime;
//hum yesterday min
$weather["humidity_ydmin"]=number_format($weewxapi[169],0);
$originalDate759=$weewxapi[170];
$humydmintime=date('H:i',strtotime($originalDate759));
$weather["humidity_ydmintime"]=$humydmintime;
//hum alltime max
$weather["humidity_amax"]=number_format($weewxapi[206],0);
$originalDate758=$weewxapi[207];
$humamaxtime=date('jS M Y',strtotime($originalDate758));
$weather["humidity_amaxtime"]=$humamaxtime;      
//hum alltime min
$weather["humidity_amin"]=number_format($weewxapi[208],0);
$originalDate759=$weewxapi[209];
$humamintime=date('jS M Y',strtotime($originalDate759));
$weather["humidity_amintime"]=$humamintime;

		
	
	//wind gust
	$originalDate8 = $weewxapi[95];
    $windydmaxtime = date("H:i", strtotime($originalDate8));	
	$originalDate9 = $weewxapi[97];
    $windmmaxtime = date('jS M', strtotime($originalDate9));
	$windmmaxtime2 = date('jS M', strtotime($originalDate9));
	$originalDate10 = $weewxapi[99];
    $windymaxtime =  date('jS M', strtotime($originalDate10));   
	$windymaxtime2 =  date('jS M', strtotime($originalDate10)); 	
	$originalDate11 = $weewxapi[33];
    $winddmaxtime =  date('H:i', strtotime($originalDate11));		
	$originalavgDate = $weewxapi[31];
    $windavgdmaxtime = date("H:i", strtotime($originalavgDate));
	
	$originalDate8a = $weewxapi[134];
    $windamaxtime = date("jS M Y", strtotime($originalDate8a));	
	$weather["windamax"]		    = $weewxapi[133]; //wind max yesterday
	$weather["windamaxtime"]		= $windamaxtime; //seconds	
	
		
	$weather["windavgdmaxtime"]		= $windavgdmaxtime; //seconds		
	$weather["windydmax"]		    = $weewxapi[94]; //wind max yesterday
	$weather["windydmaxtime"]		= $windydmaxtime; //seconds	
	$weather["windmmax"]		    = $weewxapi[96]; //wind max month
	$weather["windmmaxtime"]		= $windmmaxtime; //seconds	
	$weather["windmmaxtime2"]		= $windmmaxtime2; //seconds	
	$weather["windymax"]		    = $weewxapi[98]; //wind max year
	$weather["windymaxtime"]		= $windymaxtime; //seconds
	$weather["windymaxtime2"]		= $windymaxtime2; //seconds
	$weather["winddmax"]		    = $weewxapi[32]; //wind max year
	$weather["winddmaxtime"]		= $winddmaxtime ; //seconds
	
	//rain
	$originalDate12 = $weewxapi[102];
    $rainmmaxtime = date("jS M", strtotime($originalDate12));	
	$originalDate13 = $weewxapi[104];
    $rainymaxtime = date("jS M Y", strtotime($originalDate13));	
	$originalDate124 = $weewxapi[124];
    $rainlasttime = date("jS M Y ", strtotime($originalDate124));		
	$originalDate25 = $weewxapi[124];
    $rainlastmonth = date("M", strtotime($originalDate25));		
	$originalDate26 = $weewxapi[124];
    $rainlasttoday = date("H:i", strtotime($originalDate26));
	$originalDate27 = $weewxapi[124];
    $rainlasttoday1 = date("jS", strtotime($originalDate27));
	$weather["rainydmax"]       = $weewxapi[100]; //rain max yesterday
	$weather["rainmmax"]        = $weewxapi[101]; //wind max month
	$weather["rainmmaxtime"]    = $rainmmaxtime; //seconds	
	$weather["rainymax"]        = $weewxapi[103]; //wind max year
	$weather["rainymaxtime"]    = $rainymaxtime; //seconds
	$weather["rain_alltime"]    = $weewxapi[151]; // Total rain, all years
	
	
	//pressure	
	//yesterday
	$baromaxoriginalDateb0 = $weewxapi[136];
    $baromaxtimeyest = date("H:i", strtotime($baromaxoriginalDateb0));	
	$barominoriginalDateb1 = $weewxapi[138];
    $baromintimeyest = date("H:i", strtotime($barominoriginalDateb1));	
	$weather["thb0seapressydmaxtime"]	= $baromaxtimeyest; //seconds	
	$weather["thb0seapressydmintime"]	= $baromintimeyest; //seconds
	$weather["thb0seapressydmax"]	= $weewxapi[135]; //max yesterday
	$weather["thb0seapressydmin"]	= $weewxapi[137]; //min yesterday
	
	
	//month
	$baromaxoriginalDateb2 = $weewxapi[140];
    $baromaxtimemonth = date("jS M", strtotime($baromaxoriginalDateb2));
	$barominoriginalDateb3 = $weewxapi[142];
    $baromintimemonth = date("jS M", strtotime($barominoriginalDateb3));		
	$weather["thb0seapressmonthmaxtime"]	= $baromaxtimemonth; //seconds	
	$weather["thb0seapressmonthmintime"]	= $baromintimemonth; //seconds
	$weather["thb0seapressmmax"]	= $weewxapi[139]; //max month
	$weather["thb0seapressmmin"]	= $weewxapi[141]; //min month
	
	//year
	$baromaxoriginalDateb4 = $weewxapi[144];
    $baromaxtimeyear = date("jS M", strtotime($baromaxoriginalDateb4));
	$barominoriginalDateb5 = $weewxapi[146];
    $baromintimeyear = date("jS M", strtotime($barominoriginalDateb5));		
	$weather["thb0seapressyearmaxtime"]	= $baromaxtimeyear; //seconds	
	$weather["thb0seapressyearmintime"]	= $baromintimeyear; //seconds
	$weather["thb0seapressymax"]	= $weewxapi[143]; //max year
	$weather["thb0seapressymin"]	= $weewxapi[145]; //min year
	
	//all time
	$baromaxoriginalDateb6 = $weewxapi[148];
    $baromaxtimeall = date("jS M Y", strtotime($baromaxoriginalDateb6));	
	$barominoriginalDateb7 = $weewxapi[150];
    $baromintimeall = date("jS M Y", strtotime($barominoriginalDateb7));		
	$weather["thb0seapressamaxtime"]	= $baromaxtimeall; //seconds	
	$weather["thb0seapressamintime"]	= $baromintimeall; //seconds
	$weather["thb0seapressamax"]	= $weewxapi[147]; //max all time
	$weather["thb0seapressamin"]	= $weewxapi[149]; //min all time
	
	
	//today
	$baromaxoriginalDate = $weewxapi[35];
    $baromaxtime = date("H:i", strtotime($baromaxoriginalDate));	
	$barominoriginalDate = $weewxapi[37];
    $baromintime = date("H:i", strtotime($barominoriginalDate));	
	$weather["thb0seapressmaxtime"]	= $baromaxtime; //seconds	
	$weather["thb0seapressmintime"]	= $baromintime; //seconds
	
	//alamanac solar
	$solaroriginalDate = $weewxapi[108];
    $solarydmaxtime = date("H:i", strtotime($solaroriginalDate));	
	$solaroriginalDate2 = $weewxapi[110];
    $solarmmaxtime = date('jS M H:i', strtotime($solaroriginalDate2));	
	$solaroriginalDate4 = $weewxapi[112];
    $solarymaxtime = date('jS M H:i', strtotime($solaroriginalDate4));	
	$solaroriginalDate6 = $weewxapi[106];
    $solardmaxtime = date('H:i', strtotime($solaroriginalDate6));
    $solaroriginalDate7 = $weewxapi[213];
    $solaramaxtime = date('jS M Y', strtotime($solaroriginalDate7));  
	
	$weather["solarydmax"]		    = number_format($weewxapi[107],0, '.', ''); //temp max yesterday
	$weather["solarydmaxtime"]		= $solarydmaxtime; //seconds	
	$weather["solarmmax"]		    = number_format($weewxapi[109],0, '.', ''); //temp max month
	$weather["solarmmaxtime"]		= $solarmmaxtime; //date	
	$weather["solarymax"]		    = number_format($weewxapi[111],0, '.', ''); //temp max year
	$weather["solarymaxtime"]		= $solarymaxtime; //seconds	
	$weather["solardmax"]		    = number_format($weewxapi[105],0, '.', ''); //temp max today
	$weather["solardmaxtime"]		= $solardmaxtime; //seconds	
	$weather["solaramax"]		    = number_format($weewxapi[212],0, '.', ''); //temp max today
	$weather["solaramaxtime"]		= $solaramaxtime; //seconds
	
	
	//alamanac uv	
	$uvoriginalDate = $weewxapi[115];
    $uvydmaxtime = date("H:i", strtotime($uvoriginalDate));	
	$uvoriginalDate2 = $weewxapi[117];
    $uvmmaxtime = date('jS M H:i', strtotime($uvoriginalDate2));	
	$uvoriginalDate4 = $weewxapi[119];
    $uvymaxtime = date('jS M H:i', strtotime($uvoriginalDate4));	
	$uvoriginalDate6 = $weewxapi[113];
    $uvdmaxtime = date('H:i', strtotime($uvoriginalDate6));
    $uvoriginalDate7 = $weewxapi[211];
    $uvamaxtime = date('jS M Y', strtotime($uvoriginalDate7));  
	
	$weather["uvydmax"]		    = number_format($weewxapi[114],1); //temp max yesterday
	$weather["uvydmaxtime"]		= $uvydmaxtime; //seconds	
	$weather["uvmmax"]		    = number_format($weewxapi[116],1); //temp max month
	$weather["uvmmaxtime"]		= $uvmmaxtime; //date	
	$weather["uvymax"]		    = number_format($weewxapi[118],1); //temp max year
	$weather["uvymaxtime"]		= $uvymaxtime; //seconds	
	$weather["uvdmax"]		    = number_format($weewxapi[58],1); //temp max today
	$weather["uvdmaxtime"]		= $uvdmaxtime; //seconds
    $weather["uvamax"]		    = number_format($weewxapi[210],1); //temp max alltime
	$weather["uvamaxtime"]		= $uvamaxtime; //seconds  
	
		
	//trends will update 15 minutes after a reboot or power failure
	$weather["temp_trend"]         =  number_format($weewxrt[2],1) -  number_format($weewxapi[67],1) ;
	$weather["humidity_trend"]     =  number_format($weewxapi[3],0) -  number_format($weewxapi[68],0);
	$weather["dewpoint_trend"]     =  number_format($weewxrt[4],1) -  number_format($weewxapi[69],1);
	$weather["temp_indoor_trend"]  =  number_format($weewxrt[22],1) - number_format($weewxapi[70],1);//indoor
	$weather["temp_humidity_trend"] = number_format($weewxrt[23],1) - number_format($weewxapi[71],1);//indoor
	$weather["barotrend"] =   $weewxrt[10] -  $barotrend[0];	
	$weather['barometer6h'] = $weewxrt[10] - $weewxapi[73];
	$weather['winddir6h'] =	 $weewxapi[72];
	$weather["dirtrend"] =$dirtrend[0];
	
	
	
	//barometer units
	if ($weather["barometer_units"] == "in") {
		// standardize format
		$weather["barometer_units"] = "inHg";}}
// Convert temperatures if necessary
if ($tempunit != $weather["temp_units"]) {
	if ($tempunit == "C") {
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
	else if ($tempunit == "F") {
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
if ($rainunit != $weather["rain_units"]) {
	if ($rainunit == "mm") {
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
	else if ($rainunit == "in") {
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
if ($pressureunit != $weather["barometer_units"]) {
	if (($pressureunit == 'hPa' && $weather["barometer_units"] == 'mb') ||
		($pressureunit == 'mb' && $weather["barometer_units"] == 'hPa') ||
	        ($pressureunit == 'kPa' && $weather["barometer_units"] == 'mb') ||
		($pressureunit == 'mb' && $weather["barometer_units"] == 'kPa') ||
	        ($pressureunit == 'kPa' && $weather["barometer_units"] == 'hPa') ||
		($pressureunit == 'hPa' && $weather["barometer_units"] == 'kPa')) {
		// 1 mb = 1 hPa so just change the unit being displayed
		$weather["barometer_units"] = $pressureunit;
	}
	else if ($pressureunit == "inHg" && ($weather["barometer_units"] == 'mb' || $weather["barometer_units"] == 'hPa' || $weather["barometer_units"] == 'kPa')) {
		mbToin($weather, "barometer", ($weather["barometer_units"] == 'kPa' ? 1000 : 1));	
		mbToin($weather, "thb0seapressamax", ($weather["barometer_units"] == 'kPa' ? 1000 : 1));
		mbToin($weather, "thb0seapressamin", ($weather["barometer_units"] == 'kPa' ? 1000 : 1));
		mbToin($weather, "thb0seapressymax", ($weather["barometer_units"] == 'kPa' ? 1000 : 1));
		mbToin($weather, "thb0seapressymin", ($weather["barometer_units"] == 'kPa' ? 1000 : 1));
		mbToin($weather, "thb0seapressydmax", ($weather["barometer_units"] == 'kPa' ? 1000 : 1));
		mbToin($weather, "thb0seapressydmin", ($weather["barometer_units"] == 'kPa' ? 1000 : 1));
		mbToin($weather, "thb0seapressmmax", ($weather["barometer_units"] == 'kPa' ? 1000 : 1));
		mbToin($weather, "thb0seapressmmin", ($weather["barometer_units"] == 'kPa' ? 1000 : 1));			
		mbToin($weather, "barometer_trend", ($weather["barometer_units"] == 'kPa' ? 1000 : 1));
		mbToin($weather, "barometer_trend1", ($weather["barometer_units"] == 'kPa' ? 1000 : 1));
		mbToin($weather, "barometermovement", ($weather["barometer_units"] == 'kPa' ? 1000 : 1));
		mbToin($weather, "barometer_max", ($weather["barometer_units"] == 'kPa' ? 1000 : 1));
		mbToin($weather, "barometer_min", ($weather["barometer_units"] == 'kPa' ? 1000 : 1));
		mbToin($weather, "barometer_avg", ($weather["barometer_units"] == 'kPa' ? 1000 : 1));
		mbToin($weather, "barometert", ($weather["barometer_units"] == 'kPa' ? 1000 : 1));
		mbToin($weather, "barotrend", ($weather["barometer_units"] == 'kPa' ? 1000 : 1));		
		mbToin($weather, "barometer_trendt", ($weather["barometer_units"] == 'kPa' ? 1000 : 1));
		$weather["barometer_units"] = $pressureunit;
	}
	else if (($pressureunit == "mb" || $pressureunit == 'hPa' || $pressureunit == 'kPa') && $weather["barometer_units"] == 'inHg') {
		inTomb($weather, "barometer", ($pressureunit == 'kPa' ? 0.001 : 1));	
		inTomb($weather, "thb0seapressamax", ($pressureunit == 'kPa' ? 0.001 : 1));
		inTomb($weather, "thb0seapressamin", ($pressureunit == 'kPa' ? 0.001 : 1));
		inTomb($weather, "thb0seapressymax", ($pressureunit == 'kPa' ? 0.001 : 1));
		inTomb($weather, "thb0seapressymin", ($pressureunit == 'kPa' ? 0.001 : 1));
		inTomb($weather, "thb0seapressydmax", ($pressureunit == 'kPa' ? 0.001 : 1));
		inTomb($weather, "thb0seapressydmin", ($pressureunit == 'kPa' ? 0.001 : 1));
		inTomb($weather, "thb0seapressmmax", ($pressureunit == 'kPa' ? 0.001 : 1));
		inTomb($weather, "thb0seapressmmin", ($pressureunit == 'kPa' ? 0.001 : 1));	
		inTomb($weather, "barometer_trend", ($pressureunit == 'kPa' ? 0.001 : 1));
		inTomb($weather, "barometer_trend1", ($pressureunit == 'kPa' ? 0.001 : 1));
		inTomb($weather, "barometermovement", ($pressureunit == 'kPa' ? 0.001 : 1));
		inTomb($weather, "barometer_max", ($pressureunit == 'kPa' ? 0.001 : 1));
		inTomb($weather, "barometer_min", ($pressureunit == 'kPa' ? 0.001 : 1));
		inTomb($weather, "barometer_avg", ($pressureunit == 'kPa' ? 0.001 : 1));
		inTomb($weather, "barometert", ($pressureunit == 'kPa' ? 0.001 : 1));
		inTomb($weather, "barotrend", ($pressureunit == 'kPa' ? 0.001 : 1));
		inTomb($weather, "barometer_trendt", ($pressureunit == 'kPa' ? 0.001 : 1));
		$weather["barometer_units"] = $pressureunit;
	}
}
//Convert cloudbase
if($windunit!=$weather["wind_units"]){
if(($windunit=='mph'||$windunit=='kts')&&($weather["wind_units"]=='m/s'||$weather["wind_units"]=='km/h')){$weather["cloudbase3"]=round($weather["cloudbase3"]*3.281,0);}
else if(($windunit=='m/s'||$windunit=='km/h')&&($weather["wind_units"]=='mph'||$weather["wind_units"]=='kts')){$weather["cloudbase3"]=round($weather["cloudbase3"]/3.281,0);}
}
// Convert wind speed units if necessary
if($windunit!=$weather["wind_units"]){if($windunit=='mph'&&$weather["wind_units"]=='kts'){ktsTomph($weather,"wind_speed");ktsTomph($weather,"wind_speed2");	ktsTomph($weather,"wind_speed_trend");ktsTomph($weather,"wind_gust_speed");ktsTomph($weather,"wind_gust_speed2");ktsTomph($weather,"wind_gust_speed_trend");ktsTomph($weather,"wind_speed_max");ktsTomph($weather,"wind_gust_speed_max");ktsTomph($weather,"wind_run");ktsTomph($weather,"wind_speed_avg");ktsTomph($weather,"wind_speed_avg15");ktsTomph($weather,"wind_speed_avg30");ktsTomph($weather,"wind_speed_avgday");ktsTomph($weather,"windamax");ktsTomph($weather,"winddmax");ktsTomph($weather,"windydmax");ktsTomph($weather,"windmmax");ktsTomph($weather,"windymax");ktsTomph($weather,"windrun34");ktsTomph($weather,"wind_gust_60min");$weather["wind_units"]=$windunit;}

else if($windunit=='mph'&&$weather["wind_units"]=='km/h'){kmhTomph($weather,"wind_speed");kmhTomph($weather,"wind_speed2");kmhTomph($weather,"wind_speed_trend");kmhTomph($weather,"wind_gust_speed");kmhTomph($weather,"wind_gust_speed2");kmhTomph($weather,"wind_gust_speed_trend");kmhTomph($weather,"wind_speed_max");kmhTomph($weather,"wind_gust_speed_max");kmhTomph($weather,"wind_run");kmhTomph($weather,"wind_speed_avg");kmhTomph($weather,"wind_speed_avg15");kmhTomph($weather,"wind_speed_avg30");kmhTomph($weather,"wind_speed_avgday");kmhTomph($weather,"windamax");kmhTomph($weather,"winddmax");kmhTomph($weather,"windydmax");kmhTomph($weather,"windmmax");kmhTomph($weather,"windymax");kmhTomph($weather,"windrun34");kmhTomph($weather,"wind_gust_60min");$weather["wind_units"]=$windunit;}

else if($windunit=='mph'&&$weather["wind_units"]=='m/s'){msTomph($weather,"wind_speed");msTomph($weather,"wind_speed2");msTomph($weather,"wind_speed_trend");msTomph($weather,"wind_gust_speed");msTomph($weather,"wind_gust_speed2");msTomph($weather,"wind_gust_speed_trend");msTomph($weather,"wind_speed_max");msTomph($weather,"wind_gust_speed_max");msTomph($weather,"wind_run");msTomph($weather,"wind_speed_avg");msTomph($weather,"wind_speed_avg15");msTomph($weather,"wind_speed_avg30");msTomph($weather,"wind_speed_avgday");msTomph($weather,"winddmax");msTomph($weather,"windamax");msTomph($weather,"windydmax");msTomph($weather,"windmmax");msTomph($weather,"windymax");msTomph($weather,"windrun34");msTomph($weather,"wind_gust_60min");$weather["wind_units"]=$windunit;}

else if($windunit=='km/h'&&$weather["wind_units"]=='kts'){ktsTokmh($weather,"wind_speed");ktsTokmh($weather,"wind_speed2");ktsTokmh($weather,"wind_speed_trend");ktsTokmh($weather,"wind_gust_speed");ktsTokmh($weather,"wind_gust_speed2");ktsTokmh($weather,"wind_gust_speed_trend");ktsTokmh($weather,"wind_speed_max");ktsTokmh($weather,"wind_gust_speed_max");ktsTokmh($weather,"wind_run");ktsTokmh($weather,"wind_speed_avg");ktsTokmh($weather,"wind_speed_avg15");ktsTokmh($weather,"wind_speed_avg30");ktsTokmh($weather,"wind_speed_avgday");ktsTokmh($weather,"winddmax");ktsTokmh($weather,"windamax");ktsTokmh($weather,"windydmax");ktsTokmh($weather,"windmmax");ktsTokmh($weather,"windymax");ktsTokmh($weather,"windrun34");ktsTokmh($weather,"wind_gust_60min");$weather["wind_units"]=$windunit;}

else if($windunit=='km/h'&&$weather["wind_units"]=='mph'){mphTokmh($weather,"wind_speed");mphTokmh($weather,"wind_speed2");mphTokmh($weather,"wind_speed_trend");mphTokmh($weather,"wind_gust_speed");mphTokmh($weather,"wind_gust_speed2");mphTokmh($weather,"wind_gust_speed_trend");mphTokmh($weather,"wind_speed_max");mphTokmh($weather,"wind_gust_speed_max");mphTokmh($weather,"wind_run");mphTokmh($weather,"wind_speed_avg");mphTokmh($weather,"wind_speed_avg15");mphTokmh($weather,"wind_speed_avg30");mphTokmh($weather,"wind_speed_avgday");mphTokmh($weather,"winddmax");mphTokmh($weather,"windamax");mphTokmh($weather,"windydmax");mphTokmh($weather,"windmmax");mphTokmh($weather,"windymax");mphTokmh($weather,"windrun34");mphTokmh($weather,"wind_gust_60min");$weather["wind_units"]=$windunit;}

else if($windunit=='km/h'&&$weather["wind_units"]=='m/s'){msTokmh($weather,"wind_speed");msTokmh($weather,"wind_speed2");msTokmh($weather,"wind_speed_trend");msTokmh($weather,"wind_gust_speed");msTokmh($weather,"wind_gust_speed2");msTokmh($weather,"wind_gust_speed_trend");msTokmh($weather,"wind_speed_max");msTokmh($weather,"wind_gust_speed_max");msTokmh($weather,"wind_run");msTokmh($weather,"wind_speed_avg");msTokmh($weather,"wind_speed_avg15");msTokmh($weather,"wind_speed_avg30");msTokmh($weather,"wind_speed_avgday");msTokmh($weather,"winddmax");msTokmh($weather,"windamax");msTokmh($weather,"windydmax");msTokmh($weather,"windmmax");msTokmh($weather,"windymax");msTokmh($weather,"windrun34");msTokmh($weather,"wind_gust_60min");$weather["wind_units"]=$windunit;}

else if($windunit=='m/s'&&$weather["wind_units"]=='kts'){ktsToms($weather,"wind_speed");ktsToms($weather,"wind_speed2");ktsToms($weather,"wind_speed_trend");ktsToms($weather,"wind_gust_speed");ktsToms($weather,"wind_gust_speed2");ktsToms($weather,"wind_gust_speed_trend");ktsToms($weather,"wind_speed_max");ktsToms($weather,"wind_gust_speed_max");ktsTomph($weather,"wind_gust_speed1");ktsToms($weather,"wind_run");ktsToms($weather,"wind_speed_avg");ktsToms($weather,"wind_speed_avg15");ktsToms($weather,"wind_speed_avg30");ktsToms($weather,"wind_speed_avgday");ktsToms($weather,"winddmax");ktsToms($weather,"windamax");ktsToms($weather,"windydmax");ktsToms($weather,"windmmax");ktsToms($weather,"windymax");
ktsToms($weather,"windrun34");ktsToms($weather,"wind_gust_60min");$weather["wind_units"]=$windunit;}

else if($windunit=='m/s'&&$weather["wind_units"]=='mph'){mphToms($weather,"wind_speed");mphToms($weather,"wind_speed2");mphToms($weather,"wind_speed_trend");mphToms($weather,"wind_gust_speed");mphToms($weather,"wind_gust_speed2");mphToms($weather,"wind_gust_speed_trend");mphToms($weather,"wind_speed_max");mphToms($weather,"wind_gust_speed_max");mphToms($weather,"wind_run");mphToms($weather,"wind_speed_avg");mphTokmh($weather,"wind_speed_avg15");mphTokmh($weather,"wind_speed_avg30");mphTokmh($weather,"wind_speed_avgday");mphTokmh($weather,"winddmax");mphTokmh($weather,"windamax");mphTokmh($weather,"windydmax");mphTokmh($weather,"windmmax");mphTokmh($weather,"windymax");mphToms($weather,"windrun34");mphTokmh($weather,"wind_gust_60min");$weather["wind_units"]=$windunit;}

else if($windunit=='m/s'&&$weather["wind_units"]=='km/h'){kmhToms($weather,"wind_speed");kmhToms($weather,"wind_speed2");kmhToms($weather,"wind_speed_trend");kmhToms($weather,"wind_gust_speed");kmhToms($weather,"wind_gust_speed2");kmhToms($weather,"wind_gust_speed_trend");kmhToms($weather,"wind_speed_max");kmhToms($weather,"wind_gust_speed_max");kmhToms($weather,"wind_run");kmhToms($weather,"wind_speed_avg");kmhTokmh($weather,"wind_speed_avg15");kmhTokmh($weather,"wind_speed_avg30");kmhTokmh($weather,"wind_speed_avgday");kmhTokmh($weather,"winddmax");kmhTokmh($weather,"windamax");kmhTokmh($weather,"windydmax");kmhTokmh($weather,"windmmax");kmhTokmh($weather,"windymax");kmhToms($weather,"windrun34");kmhTokmh($weather,"wind_gust_60min");$weather["wind_units"]=$windunit;}

else if($windunit=='kts'&&$weather["wind_units"]=='m/s'){msTokts($weather,"wind_speed");msTokts($weather,"wind_speed2");msTokts($weather,"wind_speed_trend");msTokts($weather,"wind_gust_speed");msTokts($weather,"wind_gust_speed2");msTokts($weather,"wind_gust_speed_trend");msTokts($weather,"wind_speed_max");msTokts($weather,"wind_gust_speed_max");msTokts($weather,"wind_run");msTokts($weather,"wind_speed_avg");msTokts($weather,"wind_speed_avg15");msTokts($weather,"wind_speed_avg30");msTokts($weather,"wind_speed_avgday");msTokts($weather,"winddmax");msTokts($weather,"windamax");msTokts($weather,"windydmax");msTokts($weather,"windmmax");msTokts($weather,"windymax");msTokts($weather,"windrun34");msTokts($weather,"wind_gust_60min");$weather["wind_units"]=$windunit;}

else if($windunit=='kts'&&$weather["wind_units"]=='mph'){mphTokts($weather,"wind_speed");mphTokts($weather,"wind_speed2");mphTokts($weather,"wind_speed_trend");mphTokts($weather,"wind_gust_speed");mphTokts($weather,"wind_gust_speed2");mphTokts($weather,"wind_gust_speed_trend");mphTokts($weather,"wind_speed_max");mphTokts($weather,"wind_gust_speed_max");mphTokts($weather,"wind_run");mphTokts($weather,"wind_speed_avg");mphTokts($weather,"wind_speed_avg15");mphTokts($weather,"wind_speed_avg30");mphTokts($weather,"wind_speed_avgday");mphTokts($weather,"winddmax");mphTokts($weather,"windamax");mphTokts($weather,"windydmax");mphTokts($weather,"windmmax");mphTokts($weather,"windymax");mphTokts($weather,"windrun34");mphTokts($weather,"wind_gust_60min");$weather["wind_units"]=$windunit;}

else if($windunit=='kts'&&$weather["wind_units"]=='km/h'){kmhTokts($weather,"wind_speed");kmhTokts($weather,"wind_speed2");kmhTokts($weather,"wind_speed_trend");kmhTokts($weather,"wind_gust_speed");kmhTokts($weather,"wind_gust_speed2");kmhTokts($weather,"wind_gust_speed_trend");kmhTokts($weather,"wind_speed_max");kmhTokts($weather,"wind_gust_speed_max");kmhTokts($weather,"wind_run");kmhTokts($weather,"wind_speed_avg");kmhTokts($weather,"wind_speed_avg15");kmhTokts($weather,"wind_speed_avg30");kmhTokts($weather,"wind_speed_avgday");kmhTokts($weather,"winddmax");kmhTokts($weather,"windamax");kmhTokts($weather,"windydmax");kmhTokts($weather,"windmmax");kmhTokts($weather,"windymax");kmhTokts($weather,"windrun34");kmhTokts($weather,"wind_gust_60min");$weather["wind_units"]=$windunit;}}

// Keep track of the conversion factor for windspeed to knots because it is useful in multiple places
if ($weather["wind_units"] == 'mph') {
	$toKnots = 0.868976;
} else if ($weather["wind_units"] == 'km/h') {
	$toKnots = 0.5399568;
} else if ($weather["wind_units"] == 'm/s') {
	$toKnots = 1.943844;
} else {
	$toKnots = 1;
}



// darksky api forecast and current script for HOMEWEATHERSTATION gets data from jsondata/ds.json Friday 2nd December 2016 //
//$units = 'auto';  // Read the API docs for full details // default is auto
date_default_timezone_set($TZ);
$json = 'jsondata/ds.txt'; 
$json = file_get_contents($json); 
$response = json_decode($json, true);      
if ($response != null) {
  //darksky api Current SKY Conditions
  $darkskycurTime = $response['currently']['time'];
  $darkskycurSummary = $response['currently']['summary'];
  $darkskycurIcon = $response['currently']['icon'];
  $darkskycurTemp = round($response['currently']['temperature']);
  $darkskycurCover = $response['currently']['cloudCover']*100;   
  //darksky api Hourly Forecast
  $darkskyhourlySummary = $response['hourly']['summary'];
  $darkskyhourlyIcon = $response['hourly']['icon'];
  $darkskyhourlyUV = $response['hourly']['uvIndex'];
  $darkskyhourlyCond= array();
    foreach ($response['hourly']['data'] as $td) {
      $darkskyhourlyCond[] = $td;
    }
  //darksky api Daily Forecast
  $darkskydaySummary = $response['daily']['summary'];
  $darkskydayIcon = $response['daily']['icon'];
  $darkskydayCond= array();
    foreach ($response['daily']['data'] as $d) {
      $darkskydayCond[] = $d;
    }
  $darkskyalerts= array();
  foreach ($response['alerts'] as $td) {
     $darkskyalerts[] = $td;
  }
}
//end darksky api and convert winspeed below



$o='Designed by weather34.com';
 
date_default_timezone_set($TZ);
// meteor shower alternative by betejuice cumulus forum
$meteor_default="No Meteor";
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 1, 3),"event_title"=>"Quadrantids Meteor","event_end"=>mktime(23, 59, 59, 1, 4),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 1, 5),"event_title"=>"Quadrantids Meteor","event_end"=>mktime(23, 59, 59, 1, 12),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 28,2019),"event_title"=>"Quadrantids Meteor","event_end"=>mktime(23, 59, 59, 1, 2,2020),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 28,2020),"event_title"=>"Quadrantids Meteor","event_end"=>mktime(23, 59, 59, 1, 2,2021),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 28,2021),"event_title"=>"Quadrantids Meteor","event_end"=>mktime(23, 59, 59, 1, 2,2022),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 28,2022),"event_title"=>"Quadrantids Meteor","event_end"=>mktime(23, 59, 59, 1, 2,2023),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 28,2023),"event_title"=>"Quadrantids Meteor","event_end"=>mktime(23, 59, 59, 1, 2,2024),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 28,2024),"event_title"=>"Quadrantids Meteor","event_end"=>mktime(23, 59, 59, 1, 2,2025),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 4, 9),"event_title"=>"Lyrids Meteor","event_end"=>mktime(20, 59, 59, 4, 20),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 4, 21),"event_title"=>"Lyrids Meteor","event_end"=>mktime(23, 59, 59, 4, 22),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 5, 5),"event_title"=>"ETA Aquarids","event_end"=>mktime(23, 59, 59, 5, 6),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 7, 20),"event_title"=>"Delta Aquarids","event_end"=>mktime(23, 59, 59, 7, 28),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 7, 29),"event_title"=>"Delta Aquarids","event_end"=>mktime(23, 59, 59, 7, 30),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 8, 1),"event_title"=>"Perseids Meteor","event_end"=>mktime(23, 59, 59, 8, 10),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 8, 11),"event_title"=>"Perseids Meteor","event_end"=>mktime(23, 59, 59, 8, 13),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 8, 14),"event_title"=>"Perseids Meteor","event_end"=>mktime(23, 59, 59, 8, 18),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 10, 6),"event_title"=>"Draconids","event_end"=>mktime(23, 59, 59, 10, 7),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 10, 20),"event_title"=>"Orionids Meteor","event_end"=>mktime(23, 59, 59, 10, 21),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 11, 4),"event_title"=>"South Taurids","event_end"=>mktime(23, 59, 59, 11, 5),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 11, 11),"event_title"=>"North Taurids","event_end"=>mktime(23, 59, 59, 11, 11),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 11, 13),"event_title"=>"Leonids Meteor","event_end"=>mktime(23, 59, 59, 11, 16),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 11, 17),"event_title"=>"Leonids Meteor","event_end"=>mktime(23, 59, 59, 11, 18),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 11, 19),"event_title"=>"Leonids Meteor","event_end"=>mktime(23, 59, 59, 11, 29),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 11, 30),"event_title"=>"Geminids Meteor","event_end"=>mktime(23, 59, 59, 12, 12),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 13),"event_title"=>"Geminids Meteor","event_end"=>mktime(23, 59, 59, 12, 14),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 16),"event_title"=>"Ursids Meteor","event_end"=>mktime(23, 59, 59, 12, 20),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 21),"event_title"=>"Ursids Meteor","event_end"=>mktime(23, 59, 59, 12, 22),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 23),"event_title"=>"Ursids Meteor","event_end"=>mktime(23, 59, 59, 12, 25),);
$meteorNow=time();
$meteorOP=false;
foreach ($meteor_events as $meteor_check) {if ($meteor_check["event_start"]<=$meteorNow&&$meteorNow<=$meteor_check["event_end"]) {$meteorOP=true;$meteor_default=$meteor_check["event_title"];}};
//end meteor
$uptime=$weather["uptime"];function convert_uptime($uptime) {$dt1 = new DateTime("@0");$dt2 = new DateTime("@$uptime");  return $dt1->diff($dt2)->format('%a day(s) %h hrs %i min');}
//lunar and solar eclipse /meteor shpwers advisory 2018-2019-2020
$eclipse_default=" <noalert>No Current Weather <spanyellow><ored>Alerts ".$alert."</ored></spanyellow></noalert>";
//2 jul solar 2019
$eclipse_events[]=array("event_start"=>mktime(0, 0, 0, 7, 2, 2019),"event_title"=>"<div style ='margin-top:5px;'>".$solareclipsesvg." <alert>Total Solar <spanyellow>Eclipse</spanyellow></alert>  </div>
","event_end"=>mktime(23, 59, 59, 7, 2, 2019),);
//16/17 jul solar 2019
$eclipse_events[]=array("event_start"=>mktime(0, 0, 0, 7, 16, 2019),"event_title"=>"<div style ='margin-top:5px;'>".$solareclipsesvg."  <alert>Partial Lunar <spanyellow>Eclipse</spanyellow></alert>  </div>
","event_end"=>mktime(23, 59, 59, 7, 17, 2019),);
//persieds 2019
$eclipse_events[]=array("event_start"=>mktime(0, 0, 0, 8, 12 , 2019),"event_title"=>"<div style ='margin-top:5px;'>".$meteorsvg." <alert>Perseids <spanyellow>Meteor Shower</spanyellow></alert>  </div>
","event_end"=>mktime(23, 59, 59, 8, 13, 2019),);
//leonids 2019
$eclipse_events[]=array("event_start"=>mktime(0, 0, 0, 11, 17 , 2019),"event_title"=>"<div style ='margin-top:5px;'>".$meteorsvg." <alert>Leonids <spanyellow>Meteor Shower</spanyellow></alert>  </div>
","event_end"=>mktime(23, 59, 59, 11, 18, 2018),);
//geminids 2019
$eclipse_events[]=array("event_start"=>mktime(0, 0, 0, 12, 13 , 2019),"event_title"=>"<div style ='margin-top:5px;'>".$meteorsvg." <alert>Geminids <spanyellow>Meteor Shower</spanyellow></alert>  </div>
","event_end"=>mktime(23, 59, 59, 12, 14, 2019),);
//5/6 dec solar 2019
$eclipse_events[]=array("event_start"=>mktime(0, 0, 0, 12, 26, 2019),"event_title"=>"<div style ='margin-top:5px;'>".$solareclipsesvg."  <alert>Annular Solar <spanyellow>Eclipse</spanyellow></alert>  </div>
","event_end"=>mktime(23, 59, 59, 12, 26, 2019),);
//Quadrantids 2020
$eclipse_events[]=array("event_start"=>mktime(0, 0, 0, 1, 3 , 2020),"event_title"=>"<div style ='margin-top:5px;'>".$meteorsvg."  <alert>Quadrantids <spanyellow>Meteor Shower</spanyellow></alert>  </div>
","event_end"=>mktime(23, 59, 59, 1, 4, 2020),);
//output eclipse events
$eclipseNow=time();$eclipseOP=false;foreach ($eclipse_events as $eclipse_check) {if ($eclipse_check["event_start"]<=$eclipseNow&&$eclipseNow<=$eclipse_check["event_end"]) {$eclipseOP=true;$eclipse_default=$eclipse_check["event_title"];}};	
//end lunar and solar eclipse /meteor shpwers advisory 2018-2019-2020

// firerisk based on cumulus forum thread http://sandaysoft.com/forum/viewtopic.php?f=14&t=2789&sid=77ffab8f6f2359e09e6c58d8b13a0c3c&start=30
$firerisk = number_format((((110 - 1.373 * $weather["humidity"] ) - 0.54 * (10.20 - $weather["temp"] )) * (124 * pow(10,(-0.0142 * $weather["humidity"] ))))/60,0);

//wetbulb
$Tc =($weather['temp']);$P = $weather['barometer'];$RH = $weather['humidity'];
$Tdc = (($Tc - (14.55 + 0.114 * $Tc) * (1 - (0.01 * $RH)) - pow((2.5 + 0.007 * $Tc) * (1 - (0.01 * $RH)) , 3) - (15.9 + 0.117 * $Tc) * pow(1 - (0.01 * $RH),  14)));
$E = (6.11 * pow(10 , (7.5 * $Tdc / (237.7 + $Tdc))));
$wetbulbcalc = (((0.00066 * $P) * $Tc) + ((4098 * $E) / pow(($Tdc + 237.7) , 2) * $Tdc)) / ((0.00066 * $P) + (4098 * $E) / pow(($Tdc + 237.7) , 2));
$wetbulbx =number_format($wetbulbcalc,1);
// K-INDEX & SOLAR DATA FOR WEATHER34 HOMEWEATHERSTATION TEMPLATE RADIO HAMS REJOICE :-) //
$str = file_get_contents('jsondata/ki.txt');$json = array_reverse(json_decode($str,false));$kp =  $json[1][1];
$file = $_SERVER["SCRIPT_NAME"];$break = Explode('/', $file);$mod34file = $break[count($break) - 1];

# Convert Start times for Pro and Nano SD, Other MBs unforunately don't provide this data
if (is_numeric($weewxapi[186]) && $weewxapi[186] != '--') {
	$weather['tempStartTime']	= date('M jS Y', strtotime($weewxapi[186]));
	$weather['windStartTime']	= date('M jS Y', strtotime($weewxapi[187]));
	$weather['pressStartTime']	= date('M jS Y', strtotime($weewxapi[188]));
	$weather['rainStartSec']	= strtotime($weewxapi[189]);
	$weather['rainStartTime']	= date('M jS Y', $weather['rainStartSec']);
} else {
	$weather['tempStartTime']	= 'All Time';
	$weather['windStartTime']	= 'All Time';
	$weather['pressStartTime']	= 'All Time';
	$weather['rainStartTime']	= 'All Time';
}

$weather['consoleLowBattery']	= intval($weewxapi[171]); # Console battery, 0 when battery is good, 1 when battery is low
$weather['stationLowBattery']	= intval($weewxapi[172]); # Station battery, 0 when battery is good, 1 when battery is low

#if (is_numeric($weewxapi[190]){
#	$weather['rainStartYearSec']	= $weewxapi[190];
#	if (is_numberic($weather['rainStartSec']) && ($weather['rainStartSec'] > $weather['rainStartYearSec'])) {
#		$weather['yearStart']	= date('M Y', $weather['rainStartYearSec']);
#	}
#}
?>
