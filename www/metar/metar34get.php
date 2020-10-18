<?php
error_reporting(0); 
$result = date_sun_info(time(), $lat, $lon);
$sunr=date_sunrise(time(), SUNFUNCS_RET_STRING, $lat, $lon, $rise_zenith, $UTC);
$suns=date_sunset(time(), SUNFUNCS_RET_STRING, $lat, $lon, $set_zenith, $UTC);
$suns2 =date('G.i', $result['sunset']);
$sunrs2 =date('G.i', $result['sunrise']);
$now =date('G.i');
 //weather34 wxcheck API aviation metar script May 2018 
$json_string             = file_get_contents("jsondata/metar34.txt");
$parsed_json             = json_decode($json_string);
$metar34time       = $parsed_json->{'data'}[0]->{'observed'};
$metar34raw       = $parsed_json->{'data'}[0]->{'raw_text'};
$metar34stationid       = $parsed_json->{'data'}[0]->{'icao'};	
$metar34stationname       = $parsed_json->{'data'}[0]->{'name'};	
$metar34pressurehg       = $parsed_json->{'data'}[0]->{'barometer'}->{'hg'};	
$metar34pressuremb       = $parsed_json->{'data'}[0]->{'barometer'}->{'mb'};
$metar34conditions         = $parsed_json->{'data'}[0]->{'conditions'}[0]->{'code'};
$metar34conditionstext         = $parsed_json->{'data'}[0]->{'conditions'}[0]->{'text'};
$metar34clouds          = $parsed_json->{'data'}[0]->{'clouds'}[0]->{'code'};
$metar34cloudstext          = $parsed_json->{'data'}[0]->{'clouds'}[0]->{'text'};
$metar34dewpointc          = $parsed_json->{'data'}[0]->{'dewpoint'}->{'celsius'};
$metar34dewpointf          = $parsed_json->{'data'}[0]->{'dewpoint'}->{'fahrenheit'};
$metar34temperaturec          = $parsed_json->{'data'}[0]->{'temperature'}->{'celsius'};
$metar34temperaturef          = $parsed_json->{'data'}[0]->{'temperature'}->{'fahrenheit'};
$metar34humidity          = $parsed_json->{'data'}[0]->{'humidity_percent'};
$metar34visibility        = $parsed_json->{'data'}[0]->{'visibility'}->{'meters'};
$metar34windir          = $parsed_json->{'data'}[0]->{'wind'}->{'degrees'};
$metar34windspeedmph          = $parsed_json->{'data'}[0]->{'wind'}->{'speed_mph'};
$metar34windspeedkmh          = number_format($metar34windspeedmph*1.60934,0);//kmh
$metar34windspeedkts          = $parsed_json->{'data'}[0]->{'wind'}->{'speed_kts'};
$metar34raininches          = $parsed_json->{'data'}[0]->{'rain_in'};
$metar34rainmm          = number_format($metar34raininches*25.4,2) ;
$metar34visibility=str_replace(',', '', $metar34visibility);
$metar34vismiles        = number_format($metar34visibility*0.000621371,1) ;
$metar34viskm        = number_format($metar34visibility*0.00099999969062399994,0) ;
// start the weather34 icon output and descriptions
if($metar34conditions =='-SHRA'){
if ($now >$suns2 ){$sky_icon='rain.svg';} 
else if ($now <$sunrs2 ){$sky_icon='rain.svg';} 
else $sky_icon='rain.svg'; 
$sky_desc='Light Rain <br>Showers';
}
//rain 
else if($metar34conditions =='SHRA'){
if ($now >$suns2 ){$sky_icon='rain.svg';} 
else if ($now <$sunrs2 ){$sky_icon='rain.svg';} 
else $sky_icon='rain.svg'; 
$sky_desc='Light Rain <br>Showers';
}
//rain heavy
else if($metar34conditions =='+SHRA'){
if ($now >$suns2 ){$sky_icon='rain.svg';} 
else if ($now <$sunrs2 ){$sky_icon='rain.svg';} 
else $sky_icon='rain.svg'; 
$sky_desc='Heavy Rain <br>Showers';
}
//rain light
else if($metar34conditions=='-RA'){
if ($now >$suns2 ){$sky_icon='rain.svg';} 
else if ($now <$sunrs2 ){$sky_icon='rain.svg';} 
else $sky_icon='rain.svg'; 
$sky_desc='Light Rain <br>Showers';
}
//rain moderate
else if($metar34conditions=='+RA'){
if ($now >$suns2 ){$sky_icon='rain.svg';} 
else if ($now <$sunrs2 ){$sky_icon='rain.svg';} 
else $sky_icon='rain.svg'; 
$sky_desc='Moderate Rain <br>Showers';
}
//rain
else if($metar34conditions=='RA'){
if ($now >$suns2 ){$sky_icon='rain.svg';} 
else if ($now <$sunrs2 ){$sky_icon='rain.svg';} 
else $sky_icon='rain.svg'; 
$sky_desc='Light Rain <br>Showers';
}
//rain squalls
else if($metar34conditions=='SQ'){
if ($now >$suns2 ){$sky_icon='rain.svg';} 
else if ($now <$sunrs2 ){$sky_icon='rain.svg';} 
else $sky_icon='rain.svg'; 
$sky_desc='Rain Squall<br>Showers';
}
//snow light
else if($metar34conditions=='-SN'){
if ($now >$suns2 ){$sky_icon='snow.svg';} 
else if ($now <$sunrs2 ){$sky_icon='snow.svg';} 
else $sky_icon='snow.svg'; 
$sky_desc='Light Snow <br>Showers';
}
//snow moderate
else if($metar34conditions=='+SN'){
if ($now >$suns2 ){$sky_icon='snow.svg';} 
else if ($now <$sunrs2 ){$sky_icon='snow.svg';} 
else $sky_icon='snow.svg'; 
$sky_desc='Moderate Snow <br>Showers';
}
//snow
else if($metar34conditions=='SN'){
if ($now >$suns2 ){$sky_icon='snow.svg';} 
else if ($now <$sunrs2 ){$sky_icon='snow.svg';} 
else $sky_icon='snow.svg'; 
$sky_desc='Snow Showers <br>';
}
//snow grains
else if($metar34conditions=='SG'){
if ($now >$suns2 ){$sky_icon='snow.svg';} 
else if ($now <$sunrs2 ){$sky_icon='snow.svg';} 
else $sky_icon='snow.svg'; 
$sky_desc='Snow Grains <br>';
}
//snow grains
else if($metar34conditions=='SNINCR'){
if ($now >$suns2 ){$sky_icon='snow.svg';} 
else if ($now <$sunrs2 ){$sky_icon='snow.svg';} 
else $sky_icon='snow.svg'; 
$sky_desc='Snow Showers <br>';
}
//sleet
else if($metar34conditions=='IP'){
if ($now >$suns2 ){$sky_icon='sleet.svg';} 
else if ($now <$sunrs2 ){$sky_icon='sleet.svg';} 
else $sky_icon='sleet.svg'; 
$sky_desc='Sleet Showers';
}
//Haze
else if($metar34conditions=='HZ'){
if ($now >$suns2 ){$sky_icon='nt_haze.svg';} 
else if ($now <$sunrs2 ){$sky_icon='nt_haze.svg';} 
else $sky_icon='haze.svg'; 
$sky_desc='Hazy <br>Conditions';
}
//Batches Fog
else if($metar34conditions=='BCFG'){
if ($now >$suns2 ){$sky_icon='nt_fog.svg';} 
else if ($now <$sunrs2 ){$sky_icon='nt_fog.svg';} 
else $sky_icon='fog.svg'; 
$sky_desc='Foggy <br>Conditions';
}
//Fog
else if($metar34conditions=='FG'){
if ($now >$suns2 ){$sky_icon='nt_fog.svg';} 
else if ($now <$sunrs2 ){$sky_icon='nt_fog.svg';} 
else $sky_icon='fog.svg'; 
$sky_desc='Foggy <br>Conditions';
}
//Fog-NIGHT
else if($metar34conditions=='NFG'){
if ($now >$suns2 ){$sky_icon='nt_fog.svg';} 
else if ($now <$sunrs2 ){$sky_icon='nt_fog.svg';} 
else $sky_icon='fog.svg'; 
$sky_desc='Foggy <br>Conditions';
}
//Mist-Night
else if($metar34conditions=='BR'){
if ($now >$suns2 ){$sky_icon='nt_fog.svg';} 
else if ($now <$sunrs2 ){$sky_icon='nt_fog.svg';} 
else $sky_icon='fog.svg'; 
$sky_desc='Misty <br>Conditions';
}
//Mist
else if($metar34conditions=='NBR'){
if ($now >$suns2 ){$sky_icon='nt_fog.svg';} 
else if ($now <$sunrs2 ){$sky_icon='nt_fog.svg';} 
else $sky_icon='fog.svg'; 
$sky_desc='Misty <br>Conditions';
}
//Hail
else if($metar34conditions=='GR'){
if ($now >$suns2 ){$sky_icon='hail.svg';} 
else if ($now <$sunrs2 ){$sky_icon='hail.svg';} 
else $sky_icon='hail.svg'; 
$sky_desc='Hail and Rain <br>Conditions';
}
//Hail GS
else if($metar34conditions=='GS'){
if ($now >$suns2 ){$sky_icon='hail.svg';} 
else if ($now <$sunrs2 ){$sky_icon='hail.svg';} 
else $sky_icon='hail.svg'; 
$sky_desc='Hail <br>Conditions';
}
//ICE CYSTALS
else if($metar34conditions=='IC'){
if ($now >$suns2 ){$sky_icon='hail.svg';} 
else if ($now <$sunrs2 ){$sky_icon='hail.svg';} 
else $sky_icon='hail.svg'; 
$sky_desc='Ice Crystals';
}
//ICE PELLETS
else if($metar34conditions=='PL'){
if ($now >$suns2 ){$sky_icon='hail.svg';} 
else if ($now <$sunrs2 ){$sky_icon='hail.svg';} 
else $sky_icon='hail.svg'; 
$sky_desc='Ice Pellets <br>';
}
//Thunderstorms
else if($metar34conditions=='TS'){
if ($now >$suns2 ){$sky_icon='tstorm.svg';} 
else if ($now <$sunrs2 ){$sky_icon='tstorm.svg';} 
else $sky_icon='tstorm.svg'; 
$sky_desc='Thunderstorm <br>Conditions';
}
//Thunderstorms
else if($metar34conditions=='-TS'){
if ($now >$suns2 ){$sky_icon='tstorm.svg';} 
else if ($now <$sunrs2 ){$sky_icon='tstorm.svg';} 
else $sky_icon='tstorm.svg'; 
$sky_desc='Thunderstorm <br>Conditions';
}
//Thunderstorms
else if($metar34conditions=='+TS'){
if ($now >$suns2 ){$sky_icon='tstorm.svg';} 
else if ($now <$sunrs2 ){$sky_icon='tstorm.svg';} 
else $sky_icon='tstorm.svg'; 
$sky_desc='Heavy <br>Thunderstorms';
}
//Thunderstorms
else if($metar34conditions=='TSRA'){
if ($now >$suns2 ){$sky_icon='tstorm.svg';} 
else if ($now <$sunrs2 ){$sky_icon='tstorm.svg';} 
else $sky_icon='tstorm.svg'; 
$sky_desc='Thunderstorm <br>Conditions';
}
//Scattered Thunderstorms
else if($metar34conditions=='SCTTSRA'){
if ($now >$suns2 ){$sky_icon='tstorm.svg';} 
else if ($now <$sunrs2 ){$sky_icon='tstorm.svg';} 
else $sky_icon='tstorm.svg'; 
$sky_desc='Scattered <br>Thunderstorms';
}
//Scattered Thunderstorms
else if($metar34conditions=='NTSRA'){
if ($now >$suns2 ){$sky_icon='tstorm.svg';} 
else if ($now <$sunrs2 ){$sky_icon='tstorm.svg';} 
else $sky_icon='tstorm.svg'; 
$sky_desc='Scattered <br>Thunderstorms';
}
//Dust
else if($metar34conditions=='DS'){
if ($now >$suns2 ){$sky_icon='dust.svg';} 
else if ($now <$sunrs2 ){$sky_icon='dust.svg';} 
else $sky_icon='dust.svg'; 
$sky_desc='Dust Storm <br>Conditions';
}
//Widespread Dust
else if($metar34conditions=='DU'){
if ($now >$suns2 ){$sky_icon='dust.svg';} 
else if ($now <$sunrs2 ){$sky_icon='dust.svg';} 
else $sky_icon='dust.svg'; 
$sky_desc='Widespread Dust <br>Conditions';
}
//Dust-Sand Whirls
else if($metar34conditions=='PO'){
if ($now >$suns2 ){$sky_icon='dust.svg';} 
else if ($now <$sunrs2 ){$sky_icon='dust.svg';} 
else $sky_icon='dust.svg'; 
$sky_desc='Dust-Sand Whirls <br>Conditions';
}
//Sand
else if($metar34conditions=='SA'){
if ($now >$suns2 ){$sky_icon='dust.svg';} 
else if ($now <$sunrs2 ){$sky_icon='dust.svg';} 
else $sky_icon='dust.svg'; 
$sky_desc='Dust-Sand <br>Conditions';
}
//Sandstorm
else if($metar34conditions=='SS'){
if ($now >$suns2 ){$sky_icon='dust.svg';} 
else if ($now <$sunrs2 ){$sky_icon='dust.svg';} 
else $sky_icon='dust.svg'; 
$sky_desc='Sandstorm <br>Conditions';
}
//Volcanic Ash
else if($metar34conditions=='VA'){
if ($now >$suns2 ){$sky_icon='volcanoe.svg';} 
else if ($now <$sunrs2 ){$sky_icon='volcanoe.svg';} 
else $sky_icon='volcanoe.svg'; 
$sky_desc='Volcanic Ash <br>Conditions';
}

//+FC
else if($metar34conditions=='+FC'){
if ($now >$suns2 ){$sky_icon='nsvrtsa.svg';} 
else if ($now <$sunrs2 ){$sky_icon='nsvrtsa.svg';} 
else $sky_icon='nsvrtsat.svg'; 
$sky_desc='Tornado <br> Water Sprout';
}
//2nd part clouds
//clear
else if ($metar34clouds=='SKC') {
if ($now >$suns2 ){$sky_icon='nt_clear.svg';} 
else if ($now <$sunrs2 ){$sky_icon='nt_clear.svg';} 
else $sky_icon='clear.svg'; 
$sky_desc='Clear <br>Conditions';
}
//clear
else if($metar34clouds=='CLR'){
if ($now >$suns2 ){$sky_icon='nt_clear.svg';} 
else if ($now <$sunrs2 ){$sky_icon='nt_clear.svg';} 
else $sky_icon='clear.svg'; 
$sky_desc='Clear <br>Conditions';
}
//clear
else if($metar34clouds=='CAVOK'){
if ($now >$suns2 ){$sky_icon='nt_clear.svg';} 
else if ($now <$sunrs2 ){$sky_icon='nt_clear.svg';} 
else $sky_icon='clear.svg'; 
$sky_desc='Clear <br>Conditions';
}
//few
else if($metar34clouds=='FEW'){
if ($now >$suns2 ){$sky_icon='partlycloudy.svg';} 
else if ($now <$sunrs2 ){$sky_icon='partlycloudy.svg';} 
else $sky_icon='partlysunny.svg'; 
$sky_desc='Partly Cloudy <br>Conditions';
}
//scattered clouds
else if($metar34clouds=='SCT'){
if ($now >$suns2 ){$sky_icon='nt_scatteredclouds.svg';} 
else if ($now <$sunrs2 ){$sky_icon='nt_scatteredclouds.svg';} 
else $sky_icon='scatteredclouds.svg'; 	
$sky_desc='Mostly Scattered <br>Clouds';
}
//mostly cloudy
else if($metar34clouds=='BKN'){		
if ($now >$suns2 ){$sky_icon='nt_mostlycloudy.svg';} 
else if ($now <$sunrs2 ){$sky_icon='nt_mostlycloudy.svg';} 
else $sky_icon='mostlycloudy.svg'; 	
$sky_desc='Mostly Cloudy <br>Conditions';
}
//overcast
else if($metar34clouds=='OVC'){
if ($now >$suns2 ){$sky_icon='nt_overcast.svg';} 
else if ($now <$sunrs2 ){$sky_icon='nt_overcast.svg';} 
else $sky_icon='overcast.svg'; 
$sky_desc='Overcast <br>Conditions';
}
//overcast
else if($metar34clouds=='OVX'){
if ($now >$suns2 ){$sky_icon='nt_overcast.svg';} 
else if ($now <$sunrs2 ){$sky_icon='nt_overcast.svg';} 
else $sky_icon='overcast.svg'; 
$sky_desc='Overcast Conditions';
}
//offline
else{
	$sky_icon='offline.svg';
	$sky_desc='Data Offline';
};
//end weather34 metar aviation script API	 

?>
