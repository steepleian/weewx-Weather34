<?php
/* 
-----------------
Language Translation File for HOMEWEATHERSTATION Template
Language: Italian
Translated by: Antonio Angelotti - meteopomarico.it - 23.04.2017
Developed By: Lightmaster/Brian Underdown/Erik M Madsen
October/November 2016
Revised: 2019
-----------------
*/
# -----------------------------------------------------
# Day / Months do not edit
# -----------------------------------------------------
$day        = date("l");
$day2       = date("l", time() + 86400);
$daynum     = date("j");
$monthtrans = date("F");
$year       = date("Y");
# -----------------------------------------------------
# -----------------------------------------------------
setlocale(LC_TIME, "it_IT.UTF-8");
$lang = array();
// Menu
$lang['Settings'] = 'Impostazioni';
$lang['Layout'] = 'Cambia Tema';
$lang['Lighttheme'] = 'Tema Light';
$lang['Darktheme'] = 'Tema Dark';
$lang['Nonmetric'] = 'US (F) ';
$lang['Metric'] = 'Metrico (C)';
$lang['UKmetric'] = 'UK (MPH - Metrico) ';
$lang['Scandinavia'] = 'Scandinavia(M/S)';
$lang['Worldwideearthquakes'] = 'Terremoti Mondo';
$lang['Toggle'] = 'Schermo intero';
$lang['Contactinfo'] = 'Stazione & Informazioni';
$lang['Templateinfo'] = 'Contributori';
$lang['language'] = 'Seleziona la lingua';
$lang['Weatherstationinfo'] = 'Info Stazione Meteo';
$lang['Webdesigninfo'] = 'Info Template';
$lang['Contact'] = 'Contatti';
//days
$lang['Monday'] = 'Monday';
$lang['Tuesday'] = 'Tuesday';
$lang['Wednesday'] = 'Wednesday';
$lang['Thursday'] = 'Thursday';
$lang['Friday'] = 'Friday ';
$lang['Saturday'] = 'Saturday';
$lang['Sunday'] = 'Sunday';
//months
$lang['January'] = 'January';
$lang['Febuary'] = 'Febuary';
$lang['March'] = 'March';
$lang['April'] = 'April';
$lang['May'] = 'May';
$lang['June'] = 'June';
$lang['July'] = 'July';
$lang['August'] = 'August';
$lang['September'] = 'September';
$lang['October'] = 'October';
$lang['November'] = 'November';
$lang['December'] = 'December';
//temperature
$lang['Temperature'] = 'Temperatura';
$lang['Feelslike'] = 'Percepita';
$lang['Humidity'] = 'Umidità';
$lang['Dewpoint'] = 'Punto di rugiada';
$lang['Trend'] = 'trend ';
$lang['Heatindex'] = 'Indice di calore';
$lang['Windchill'] = 'Percepita ';
$lang['Tempfactors'] = 'Fattore Temp';
$lang['Nocautions'] = 'Nessuna Cautela';
$lang['Wetbulb'] = 'Wet Bulb';
$lang['dry'] = '& Dry';
$lang['verydry'] = '& Very Dry';
//new feature temperature feels
$lang['FreezingCold'] = 'Freddo Glaciale';
$lang['FeelingVeryCold'] = 'Si Sente molto freddo';
$lang['FeelingCold'] = 'Si Sente Freddo';
$lang['FeelingCool'] = 'Si Sente Fresco';
$lang['FeelingComfortable'] = 'Si Sente a proprio agio ';
$lang['FeelingWarm'] = 'Si Sente Caldo';
$lang['FeelingHot'] = 'Si Sente molto Caldo';
$lang['FeelingUncomfortable'] = 'Si Sente a Disagio';
$lang['FeelingVeryHot'] = 'Si Sente molto Caldo';
$lang['FeelingExtremelyHot'] = 'Si Sente Estremamente Caldo';
//wind
$lang['Windspeed'] = 'Velocità vento';
$lang['Gust'] = 'Raffica';
$lang['Direction'] = 'Direzione';
$lang['Gusting'] = 'Raffica';
$lang['Blowing'] = 'Soffia';
$lang['Wind'] = 'Velocità';
$lang['Wind Run'] = 'Velocità Run';
// Wind phrases for Beaufort scale for windspeed area
$lang['Calm'] = 'Calma';
$lang['Lightair'] = 'Bava di Vento';
$lang['Lightbreeze'] = 'Brezza Leggera';
$lang['Gentelbreeze'] = 'Brezza tesa';
$lang['Moderatebreeze'] = 'Vento moderato';
$lang['Freshbreeze'] = 'Vento teso';
$lang['Strongbreeze'] = 'Vento fresco';
$lang['Neargale'] = 'Vicino a burrasca';
$lang['Galeforce'] = 'Gale Burrasca';
$lang['Stronggale'] = 'Burrasca forte';
$lang['Storm'] = 'Tempesta';
$lang['Violentstorm'] = 'Tempesta violenta';
$lang['Hurricane'] = 'Uragano';
// Wind phrases from Beaufort scale for current conditions area
$lang['CalmConditions'] = 'Condizioni di Calma';
$lang['LightBreezeattimes'] = 'Bava di Vento ';
$lang['MildBreezeattimes'] = 'Brezza Leggera ';
$lang['ModerateBreezeattimes'] = 'Brezza Tesa';
$lang['FreshBreezeattimes'] = 'Vento Moderato';
$lang['StrongBreezeattimes'] = 'Vento Teso';
$lang['NearGaleattimes'] = 'Vento Fresco';
$lang['GaleForceattimes'] = 'Vento Forte';
$lang['StrongGaleattimes'] = 'Burrasca';
$lang['StormConditions'] = 'Tempesta';
$lang['ViolentStormConditions'] = 'Tempesta Violenta';
$lang['HurricaneConditions'] = 'Uragano';
$lang['Avg'] = ' Avg: ';
//wind direction compass
$lang['Northdir'] = 'Da Nord
';
$lang['NNEdir'] = 'Nord Nord
Est';
$lang['NEdir'] = 'Nord Est
';
$lang['ENEdir'] = 'Est Nord
Est';
$lang['Eastdir'] = "Da Est
";
$lang['ESEdir'] = 'Est Sud
Est';
$lang['SEdir'] = 'Sud Est';
$lang['SSEdir'] = 'Sud Sud
Est';
$lang['Southdir'] = 'Da Sud';
$lang['SSWdir'] = 'Sud Sud
Ovest';
$lang['SWdir'] = 'Sud Ovest';
$lang['WSWdir'] = 'Ovest Sud
Ovest';
$lang['Westdir'] = 'Da Ovest';
$lang['WNWdir'] = 'Ovest Nord
Ovest';
$lang['NWdir'] = 'Nord Ovest';
$lang['NWNdir'] = 'Nord Nord
Ovest';
//wind direction avg
$lang['North'] = 'Nord';
$lang['NNE'] = 'NNE';
$lang['NE'] = 'NE';
$lang['ENE'] = 'ENE';
$lang['East'] = 'Est ';
$lang['ESE'] = 'ESE';
$lang['SE'] = 'SE';
$lang['SSE'] = 'SSE';
$lang['South'] = 'Sud';
$lang['SSW'] = 'SSO';
$lang['SW'] = 'SO';
$lang['WSW'] = 'OSO';
$lang['West'] = 'Ovest';
$lang['WNW'] = 'ONO';
$lang['NW'] = 'NO';
$lang['NWN'] = 'NNO';
//rain
$lang['raintoday'] = 'Precipitazioni Oggi';
$lang['Rate'] = 'Tasso';
$lang['Rainfall'] = 'Precipitazioni';
$lang['Precip'] = 'precip'; // must be short name do not use full precipitation !!!! ///
$lang['Rain'] = 'Pioggia';
$lang['Heavyrain'] = 'Pioggia forte';
$lang['Flooding'] = 'Possibili Inondazioni';
$lang['Rainbow'] = 'Rainbow';
$lang['Windy'] = 'Windy';
//sun -moon-daylight-darkness
$lang['Sun'] = 'Sole';
$lang['Moon'] = 'Luna';
$lang['Sunrise'] = 'Alba';
$lang['Sunset'] = 'Tramonto';
$lang['Moonrise'] = 'Sorgere della luna ';
$lang['Moonset'] = 'Tramonto Luna';
$lang['Night'] = 'Notte ';
$lang['Day'] = 'Giorno';
$lang['Nextnewmoon'] = 'Luna nuova';
$lang['Nextfullmoon'] = 'Luna Piena';
$lang['Luminance'] = 'Luminanza';
$lang['Moonphase'] = 'Fase Lunare';
$lang['Estimated'] = 'Stimato';
$lang['Daylight'] = 'Luce';
$lang['Darkness'] = 'Oscurità';
$lang['Daysold'] = 'Vecchia';
$lang['Belowhorizon'] = 'sotto
orizzonte';
$lang['Mintill'] = '
min fino';
$lang['Till'] = 'a ';
$lang['Minago'] = ' min fa';
$lang['Hrs'] = ' ore';
$lang['Min'] = ' min';
$lang['TotalDarkness'] = 'Ore notte';
$lang['TotalDaylight'] = 'Ore giorno';
$lang['Below'] = 'è sotto orizzonte';
$lang['Newmoon'] = 'Luna Nuova';
$lang['Waxingcrescent'] = 'Luna Crescente';
$lang['Firstquarter'] = 'Primo Quarto';
$lang['Waxinggibbous'] = 'Gibbosa Crescente';
$lang['Fullmoon'] = 'Luna Piena';
$lang['Waninggibbous'] = 'Gibbosa Calante';
$lang['Lastquarter'] = 'Ultimo Quarto';
$lang['Waningcrescent'] = 'Luna Calante';
//trends
$lang['Falling'] = 'Diminuz';
$lang['Rising'] = 'Aumento';
$lang['Steady'] = 'Costante';
$lang['Rapidly'] = 'Rapidamente';
$lang['Temp'] = 'Temp';
//Solar-UV
//uv
$lang['Nocaution'] = 'Nessuna cautela necessaria';
$lang['Wearsunglasses'] = 'Indossare occhiali da sole in giornate luminose';
$lang['Stayinshade'] = 'Rimani all ombra vicino mezzogiorno quando il sole è più forte';
$lang['Reducetime'] = 'Ridurre il tempo al sole tra le 10am-4pm ';
$lang['Minimize'] = 'Ridurre al minimo esposizione al sole tra le 10am-4pm ';
$lang['Trytoavoid'] = 'Cercate di evitare esposizione al sole tra le 10am-4pm ';
//solar
$lang['Poor'] = 'Scarsa
Radiazione';
$lang['Low'] = 'Bassa
Radiazione';
$lang['Moderate'] = 'Moderata
Radiazione';
$lang['Good'] = 'Forte
Radiazione';
$lang['Solarradiation'] = 'Radiazione solare';
//current sky
$lang['Currentsky'] = 'Condizioni Attuali';
$lang['Currently'] = 'Attualmente';
$lang['Cloudcover'] = 'Coperto dalle Nuvole';
//Notifications
$lang['Nocurrentalert'] = 'Nessuna allerta';
$lang['Windalert'] = 'Raffiche di vento';
$lang['Tempalert'] = 'Alta temperatura';
$lang['Heatindexalert'] = 'Allerta Indice di calore';
$lang['Windchillalert'] = 'Allerta Temperatura';
$lang['Dewpointalert'] = 'disagio Umidità';
$lang['Dewpointcolderalert'] = 'Allerta Punto di rugiada';
$lang['Feelslikecolderalert'] = 'Si sente più freddo';
$lang['Feelslikewarmeralert'] = 'Si sente più caldo';
$lang['Rainratealert'] = 'per/hr Precipitazione ';
//Earthquake Notifications
$lang['Regional'] = 'Terremoti Regionali';
$lang['Significant'] = 'Significativi';
$lang['Nosignificant'] = 'Nessun Terremoto Significativo';
//Main page
$lang['Barometer'] = 'Barometro';
$lang['UVSOLAR'] = 'UV | Dati Solari';
$lang['Earthquake'] = 'Dati Terremoto';
$lang['Daynight'] = 'Info Giorno & Notte';
$lang['SunPosition'] = 'Sun Position';
$lang['Location'] = 'Posizione ';
$lang['Hardware'] = 'Hardware';
$lang['Rainfalltoday'] = 'Pioggia Giornaliera';
$lang['Windspeed'] = 'Vento';
$lang['Winddirection'] = 'La direzione del vento';
$lang['Measured'] = 'Giorno Misurato';
$lang['Forecast'] = 'Previsione';
$lang['Forecastahead'] = 'Previsione 10 Giorni';
$lang['Forecastsummary'] = 'Previsione Sommaria';
$lang['WindGust'] = 'Raffica';
$lang['Hourlyforecast'] = 'Previsione Oraria';
$lang['Significantearthquake'] = 'Terremoto Significativi';
$lang['Regionalearthquake'] = 'Terremoto Regionali';
$lang['Average'] = 'Media';
$lang['Notifications'] = 'Notifiche di Allerta';
$lang['Indoor'] = 'Interno';
$lang['Today'] = 'Oggi';
$lang['Tonight'] = 'Notte';
$lang['Tomorrow'] = 'Domani';
$lang['Tomorrownight'] = 'Domani notte';
$lang['Updated'] = 'Aggiornato';
$lang['Meteor'] = 'Info Sciame meteorico';
$lang['Firerisk'] = 'Rischio Incendio';
$lang['Localtime'] = 'Ora Locale';
$lang['Nometeor'] = 'Nessun Sciame meteorico';
$lang['LiveWebCam'] = 'WebCam';
$lang['Online'] = 'Online';
$lang['Offline'] = 'Offline';
$lang['Weatherstation'] = 'Weather Station';
$lang['Cloudbase'] = 'Cloudbase';
$lang['uvalert'] = 'Caution High UVINDEX';
$lang['Max'] = 'Max';
$lang['Min'] = 'Min';
//earthquake TOP MODULE 10 July 2017
$lang['MicroE'] = 'Micro Earthquake';
$lang['MinorE'] = 'Minor Earthquake';
$lang['LightE'] = 'Light Earthquake';
$lang['ModerateE'] = 'Moderate Earthquake';
$lang['StrongE'] = 'Strong Earthquake';
$lang['MajorE'] = 'Major Earthquake';
$lang['GreatE'] = 'Great Earthquake';
$lang['RegionalE'] = 'Regional';
$lang['Conditions'] = 'Condizioni';
$lang['Cloudbase Height'] = 'Altezza Nuvole';
$lang['Station'] = 'Stazione';
$lang['Detailed Forecast'] = 'Dettagli Previsione';
$lang['Summary Outlook'] = 'Riepilogo Previsione';
//Air Quality
$lang['Hazordous'] = 'Hazardous Conditions';
$lang['VeryUnhealthy'] = 'Very Unhealthy';
$lang['Unhealthy'] = 'Unhealthy Air Quality';
$lang['UnhealthyFS'] = 'Unhealthy For Some';
$lang['Moderate'] = 'Moderate Air Quality ';
$lang['Good'] = 'Good Air Quality ';
#notification additions
$lang['notifyTitle'] = 'Notifiche';
$lang['notifyAlert'] = "Alert";
$lang['notifyLowBatteryAlert'] = "Low Battery Alert";
$lang['notifyConsoleLowBattery'] = "Console's battery is low";
$lang['notifyStationLowBattery'] = "Station's battery is low";
$lang['notifyUVIndex'] = "UV-Index Caution";
$lang['notifyUVExposure'] = "Reduce Sun Exposure";
$lang['notifyHeatExaustion'] = "Heat Exhaustion";
$lang['notifyExtremeWind'] = "Extreme Wind Warning";
$lang['notifyGustUpTo'] = "Gusts up to";
$lang['notifySeekShelter'] = "Seek shelter immediately";
$lang['notifyHighWindWarning'] = "High Wind Warning";
$lang['notifySustainedAvg'] = "Sustained avg";
$lang['notifyWindAdvisory'] = "Wind Advisory";
$lang['notifyFreezing'] = "Below Freezing";
?>
