<?php 
include('w34stats.php');
$weewxw34_live = file_get_contents($livedata);
$weewxw34 = explode(" ", $weewxw34_live);
$weewxw34 = array_map(function($v) { if($v == 'NULL') {
	return null; } return $v; }, $weewxw34);
if (sizeof($weewxw34) >= 47){
$weewxapi[0]=	$weewxw34[0];//$nowdate; //current date dd/mm/yyyy //$recordDate = mktime(substr($weewxapi[1], 0, 2), substr($weewxapi[1], 3, 2), substr($weewxapi[1], 6, 2),substr($weewxapi[0], 3, 2), substr($weewxapi[0], 0, 2), $year);
$weewxapi[1]=	$weewxw34[1];//$nowtime; //current time hh:mm:ss  //$recordDate = mktime(substr($weewxapi[1], 0, 2), substr($weewxapi[1], 3, 2), substr($weewxapi[1], 6, 2),substr($weewxapi[0], 3, 2), substr($weewxapi[0], 0, 2), $year);
$weewxapi[2]=	$weewxw34[2];//$nowtemp; //current temp //$weather["temp"]               = $weewxapi[2];
$weewxapi[3]=	$weewxw34[3];//$nowhum; //current humidity //$weather["humidity"]           = number_format($weewxapi[3],0);	
$weewxapi[4]=	$weewxw34[4];//$nowdew; //current dewpoint //$weather["dewpoint"]           = number_format($weewxapi[4],1);
$weewxapi[5]=	$weewxw34[5];//$nowwind; //current windspeed //$weather["wind_speed_avg"]     = $weewxapi[5];$weather["wind_speed"]         = number_format($weewxapi[5]);
$weewxapi[6]=	$weewxw34[6];//$nowwindgust; //current wind gust spped //$weather["wind_gust_speed"]    = $weewxapi[6];
$weewxapi[7]=	$weewxw34[7];//$nowwinddir; //current wind direction //$weather["wind_direction"]     = number_format($weewxapi[7],0);
$weewxapi[8]=	$weewxw34[8];//$nowrainrate; //current rainrate //$weather["rain_rate"]          = $weewxapi[8];
$weewxapi[9]=	$weewxw34[9];//$dayrainsum;    //today rain sum
$weewxapi[10]=	$weewxw34[10];//$nowbarom; //current barometer //$weather["barometer"]          = $weewxapi[10];$weather["barotrend"] =   $weewxapi[10] -  $barotrend[0];	$weather['barometer6h'] = $weewxapi[10] - $weewxapi[73];
$weewxapi[11]=	$weewxapi[7];//current wind direction
$weewxapi[12]=	$weewxw34[12];//$nowbeaufort; //current wind beaufort //$weather["wind_speed_bft"]     = $weewxapi[12];
$weewxapi[13]=	$weewxw34[13];//$windunits;//N/A PROBABLY WIND UNITS
$weewxapi[14]=	$weewxw34[14];//N/A PROBABLY TEMP UNITS
$weewxapi[15]=	$weewxw34[15];//$baromunits;//$weather["barometer_units"]    = $weewxapi[15]; // mb or hPa or in
$weewxapi[16]=	$weewxw34[16];//$rainunits;//$weather["rain_units"]         = $weewxapi[16];
$weewxapi[17]=	$last5minwind;//average wind speed 5 minutes
$weewxapi[18]=	$last60minbaromavg;//1 hour barometer average $weather["barometer_trend"]    = $weewxapi[10] - $weewxapi[18];
$weewxapi[19]=	$monthrainsum; //month rain
$weewxapi[20]=	$yearrainsum; //year rain sum
$weewxapi[21]=	$yesterdayrainsum; //yesterday rain sun//N/A
$weewxapi[22]=	$weewxw34[22];//$nowintemp; //current indoor temp //$weather["temp_indoor"]        = $weewxapi[22];
$weewxapi[23]=	$weewxw34[23];//$nowinhum; //current indoor humidity  ;//$weather["humidity_indoor"]    = $weewxapi[23];$weather["temp_humidity_trend"] = number_format($weewxapi[23],1) - number_format($weewxapi[71],1);//indoor$weather["temp_indoor_feel"]   = heatIndex($weewxapi[22], $weewxapi[23]); 
$weewxapi[24]=	$weewxw34[24];//$nowwindchill; //current windchill //$weather["windchill"]          = $weewxapi[24];
$weewxapi[25]=	$last60mintempmax; // $weewxapi[123]
$weewxapi[26]=	$daymaxtemp; //temp max today $weather["temp_today_high"]    = $daymaxtemp; //temp max today $weewxapi[26];
$weewxapi[27]=	(int)$daymaxtemptime;//date($timeFormatShort, $weewxapi[27]);
$weewxapi[28]=	$daymintemp; //temp min today  $weather["temp_today_low"]     = $daymintemp; //temp min today $weewxapi[28];
$weewxapi[29]=	(int)$daymintemptime; //date($timeFormatShort, $weewxapi[29]);
$weewxapi[30]=	$daymaxwind; //$weather["wind_speed_max"]     = $weewxapi[30];		
$weewxapi[31]=	$daymaxwindtime; //$weather["maxwindtime"]        = $windavgdmaxtime; //date($timeFormatShort, strtotime($weewxapi[31]));
$weewxapi[32]=	$daymaxgust; //wind max today 
$weewxapi[33]=	$daymaxgusttime; //$weather["maxgusttime"]        = date($timeFormatShort, strtotime($weewxapi[33]));
$weewxapi[34]=	$daymaxbarom; //max today baro 
$weewxapi[35]=	$daymaxbaromtime;//$baromaxoriginalDate = $weewxapi[35];
$weewxapi[36]=	$dayminbarom; //min today baro
$weewxapi[37]=	$dayminbaromtime; //$barominoriginalDate = $weewxapi[37];
$weewxapi[38]=	$weewxw34[38];//$weewxversion;//$weather["swversion"]		   = $weewxapi[38];
$weewxapi[39]=	$weewxw34[39];//$weewxbuild;//$weather["build"]			   = $weewxapi[39];
$weewxapi[40]=	$weewxw34[40];//$last10minmaxwind; //last 10 min max wind //N/A
$weewxapi[41]=	$hdwplatform; //$weather["mbplatform"]	       = $weewxapi[41];
$weewxapi[42]=	$hdwactual; //$weather["actualhardware"]	   = $weewxapi[42];//$weather["heatindex"]         = $weewxapi[42];
$weewxapi[43]=	$weewxw34[43];//$currentuv;//current uv //$weather["uv"]                 = $weewxapi[43];
$weewxapi[44]=	$last24hoursrain; //last24hrs rain 
$weewxapi[45]=	$weewxw34[45];//$currentsolar; //current solar radiation //$weather["solar"]              = round($weewxapi[45],1);$weather["lux"] 			   = number_format($weewxapi[45]/0.00809399477,0, '.', '');
$weewxapi[46]=	$last10minwinddir; //last 10 min wind direction average $weather["wind_direction_avg"] = number_format($weewxapi[46],0);
$weewxapi[47]=	$lasthourrain; //lastHour rain sum
$weewxapi[48]=	$monthmaxdewpoint; //dew max month
$weewxapi[49]=	$monthmaxdewpointtime;
$weewxapi[50]=	$monthmindewpoint; //dew min month
$weewxapi[51]=	$monthmindewpointtime;
$weewxapi[52]=	$yesterdaymaxdewpoint; //dew max year
$weewxapi[53]=	$yesterdaymaxdewpointtime;
$weewxapi[54]=	$yearmaxdewpoint; //dew max year
$weewxapi[55]=	$yearmaxdewpointtime;  //$weather["sunshine"]           = $weewxapi[55];
$weewxapi[56]=	$yearmindewpoint; //year min dew //$weather["dewymin"]		    = $weewxapi[56]; 
$weewxapi[57]=	$yearmindewpointtime; //$weather["sunny"]          	   = $weewxapi[57];$originalDate45 = $weewxapi[57];$dewymintime =  date('jS M', strtotime($originalDate45));
$weewxapi[58]=	$daymaxuv; //day max uv //$weather["uvdmax"]		    = number_format($weewxapi[58],1); $weather["maxuv"]              = $weewxapi[58];	
$weewxapi[59]=	$daymaxhum; //today hum max 
$weewxapi[60]=	$daymaxhumtime;
$weewxapi[61]=	$daymimhum; //today hum min 
$weewxapi[62]=	$dayminhumtime;
$weewxapi[63]=	$daymaxdewpoint; //dew max today
$weewxapi[64]=	$daymaxdewpointtime;
$weewxapi[65]=	$daymindewpoint; //dew min today
$weewxapi[66]=	$daymindewpointtime;
$weewxapi[67]=	$last15mintempavg;//last 15 min temp avg $weather["temp_avg15"]         = $weewxapi[67];$weather["temp_trend"]         =  number_format($weewxapi[2],1) -  number_format($weewxapi[67],1) ;
$weewxapi[68]=	$last15minhumavg; //last 15 min temp avg $weather["humidity_trend"]     =  number_format($weewxapi[3],0) -  number_format($weewxapi[68],0);
$weewxapi[69]=	$last15mindewpointavg; //last 15 min dewpoint avg //$weather["dewpoint_trend"]     =  number_format($weewxapi[4],1) -  number_format($weewxapi[69],1);
$weewxapi[70]=	$last15minIntempavg; //last 15 min in temp avg $weather["temp_indoor_trend"]  =  number_format($weewxapi[22],1) - number_format($weewxapi[70],1);//indoor
$weewxapi[71]=	$last15minInhumavg; //last 15 min in humidity avg $weather["temp_humidity_trend"] = number_format($weewxapi[23],1) - number_format($weewxapi[71],1);//indoor
$weewxapi[72]=	$last15minwind; //last 15 min wind speed avg $weather['winddir6h'] =	 $weewxapi[72];$weather["wind_speed_avg15"]   = $weewxapi[72];
$weewxapi[73]=	$last30minwind; //last 35 min wind speed avg $weather['barometer6h'] = $weewxapi[10] - $weewxapi[73];$weather["wind_speed_avg30"]   = $weewxapi[73];
$weewxapi[74]=  $weewxlignting; //[lgt0energy-act:--] ;//N/A
$weewxapi[75]=	$weewxlignting; //$weather["lightningkm"]        = $weewxapi[75];$weather["lightningmaxdist"]   = $weewxapi[75];
$weewxapi[76]=	$weewxlignting; //$weather["lightningtimeago"]   = $weewxapi[76];$weather["lightning"]          = $weewxapi[76];
$weewxapi[77]=	$weewxlignting; //$weather["lightningmax"]       = $weewxapi[77];
$weewxapi[78]=	$weewxlignting; //$weather["lightningmonth"]     = $weewxapi[78];
$weewxapi[79]=	$weewxlignting; //$weather["lightningyear"]      = $weewxapi[79];
$weewxapi[80]=	$daymaxsolar; //max day solar radiation $weather["maxsolar"]           = number_format($weewxapi[80],0);
$weewxapi[81]=	$station_uptime;//muts change time format to seconds	//$station_uptime;//$weather["uptime"]		       = $weewxapi[81];//uptime in seconds	
$weewxapi[82]=	$yesterdaymaxtemp; //temp max yesterday
$weewxapi[83]=	$yesterdaymaxtemptime;
$weewxapi[84]=	$yesterdaymintemp;
$weewxapi[85]=	$yesterdaymintemptime;
$weewxapi[86]=	$monthmaxtemp; //temp max month
$weewxapi[87]=	$monthmaxtemptime;
$weewxapi[88]=	$monthmintemp; //temp min month
$weewxapi[89]=	$monthmintemptime;
$weewxapi[90]=	$yearmaxtemp; //temp max year
$weewxapi[91]=	$yearmaxtemptime;
$weewxapi[92]=	$yearmintemp; //temp min year
$weewxapi[93]=	$yearmintemptime;
$weewxapi[94]=	$yesterdaymaxgust; //wind max yesterday
$weewxapi[95]=	$yesterdaymaxgusttime;
$weewxapi[96]=	$monthmaxgust; //wind max month
$weewxapi[97]=	$monthmaxgusttime; 
$weewxapi[98]=	$yearmaxgust; //wind max year
$weewxapi[99]=	$yearmaxgusttime;
$weewxapi[100]=	$yesterdaymaxrainrate;  //rain max rate yesterday 
$weewxapi[101]=	$monthmaxrainrate; //max rain rate month 
$weewxapi[102]=	$monthmaxrainratetime;
$weewxapi[103]=	$yearmaxrainrate; //max rain rate year
$weewxapi[104]=	$yearmaxrainratetime;
$weewxapi[105]=	$daymaxsolar; // day max solar //$weather["solardmax"]
$weewxapi[106]=	$daymaxsolartime;//$solardmaxtime
$weewxapi[107]=	$yesterdaymaxsolar;//yesterday max solar //$weather["solarydmax"]
$weewxapi[108]=	$yesterdaymaxsolartime; //$solarydmaxtime
$weewxapi[109]=	$monthmaxsolar; //month max solar //$weather["solarmmax"]
$weewxapi[110]=	$monthmaxsolartime;  //$solarmmaxtime 
$weewxapi[111]=	$yearmaxsolar; //year max solar //$weather["solarymax"]
$weewxapi[112]=	$yearmaxsolartime; //$solarymaxtime
$weewxapi[113]=	$daymaxuvtime; //$uvdmaxtime 
$weewxapi[114]=	$yesterdaymaxuv; //yesterday max uv  //$weather["uvydmax"]		    = number_format($weewxapi[114],1);
$weewxapi[115]=	$yesterdaymaxuvtime;//$uvydmaxtime
$weewxapi[116]=	$monthmaxuv; //month max uv //$weather["uvmmax"]		    = number_format($weewxapi[116],1);
$weewxapi[117]=	$monthmaxuvtime; //$uvmmaxtime
$weewxapi[118]=	$yearmaxuv; //year max uv //$weather["uvymax"]		    = number_format($weewxapi[118],1);
$weewxapi[119]=	$yearmaxuvtime;//$uvymaxtime 
$weewxapi[120]=	$yesterdaymindewpoint; //dew min year
$weewxapi[121]=	$yesterdaymindewpointtime;
$weewxapi[122]=	$weewxlastrecord; //last available time stamp //N/A
$weewxapi[123]=	$last60mintempavg; // last 60 minutes out temp avg
$weewxapi[124]=	$lastrainday; //last rain time $rainlastmonth $rainlasttoday $rainlasttoday1
$weewxapi[125]=	$alltimemaxtemp; //temp alltime max
$weewxapi[126]=	$alltimemaxtemptime; //alltime max temp time
$weewxapi[127]=	$alltimemintemp; //temp alltime min
$weewxapi[128]=	$alltimemintemptime; //alltime min temp time
$weewxapi[129]=	$alltimemaxdewpoint; //dew max alltime
$weewxapi[130]=	$alltimemaxdewpointtime; //alltime max dew time
$weewxapi[131]=	$alltimemindewpoint; //dew min alltime
$weewxapi[132]=	$alltimemindewpointtime; //alltime min dew time
$weewxapi[133]=	$alltimemaxgust; //alltime max wind 
$weewxapi[134]=	$alltimemaxgusttime; //alltime max gust time
$weewxapi[135]=	$yesterdaymaxbarom; //max yesterday baro 
$weewxapi[136]=	$yesterdaymaxbaromtime; //yd max baro time
$weewxapi[137]=	$yesterdayminbarom; //min yesterday baro 
$weewxapi[138]=	$yesterdayminbaromtime; //yd min baro time
$weewxapi[139]=	$monthmaxbarom; //max month baro
$weewxapi[140]=	$monthmaxbaromtime; // max month baro time
$weewxapi[141]=	$monthminbarom; //min month baro 
$weewxapi[142]=	$monthminbaromtime; //month min baro time
$weewxapi[143]=	$yearmaxbarom; //max year baro
$weewxapi[144]=	$yearmaxbaromtime; //year max baro time
$weewxapi[145]=	$yearminbarom; //min year baro 
$weewxapi[146]=	$yearminbaromtime; //year min baro time
$weewxapi[147]=	$alltimemaxbarom; //max all time baro
$weewxapi[148]=	$alltimemaxbaromtime; //max alltime baro time
$weewxapi[149]=	$alltimeminbarom; //min all time baro
$weewxapi[150]=	$alltimeminbaromtime; //all time baro min time
$weewxapi[151]=	$alltimerainsum;//all time rain sum
$weewxapi[152]=	$dayavgtemp; //avg temp today
$weewxapi[153]=	$moon_phase;//$weather["moonphase"]=$weewxapi[153]
$weewxapi[154]=	$moon_fullness;//$weather["luminance"]=$weewxapi[154];
$weewxapi[155]=	$lenghtofday; //$weather["daylight"]=$weewxapi[155];
$weewxapi[156]=	$moon_rise;//moon rise time hh:mm //$weather["moonrise"]='Rise<moonrisecolor> '.date($timeFormatShort, strtotime($weewxapi[156]))
$weewxapi[157]=	$moon_set; //moon set time hh:mm //$weather["moonset"]='Set<moonsetcolor> '.date($timeFormatShort, strtotime($weewxapi[157]
$weewxapi[158]=	$dayavgwind; //UNCERTAIN IF 30MIN OR DAY AVG
$weewxapi[159]=	$monthmaxhum; //month max hum
$weewxapi[160]=	$monthmaxhumtime; //month max hum time
$weewxapi[161]=	$monthminhum; //month min hum
$weewxapi[162]=	$monthminhumtime; //month min hum time
$weewxapi[163]=	$yearmaxhum; //year max hum 
$weewxapi[164]=	$yearmaxhumtime; //year hum max time
$weewxapi[165]=	$yearminhum; //year min hum
$weewxapi[166]=	$yearminhumtime; //year hum min time
$weewxapi[167]=	$yesterdaymaxhum; //yesterday max hum
$weewxapi[168]=	$yesterdayminhumtime; //yesterday min hum time
$weewxapi[169]=	$yesterdayminhum;	//yesterday min hum
$weewxapi[170]=	$yesterdayminhumtime;	//yesterday max hum time
$weewxapi[173]= $lastmonthrainsum; //last month rain sum  
$weewxapi[184]= $yearavgtemp;  //year avg temp
$weewxapi[185]= $yearavgwindgust;  //year avg wind gust  
}
?>
