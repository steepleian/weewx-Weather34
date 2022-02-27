<?php
/*
-----------------
Language Translation File for HOMEWEATHERSTATION Template
Language: Dutch
Translated by: <Your Name Here>
Developed By: Lightmaster/Brian Underdown/Erik M Madsen
April 5th 2017
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
setlocale(LC_TIME, "nl_NL.UTF-8");
$lang                           = array();
// Menu
$lang['Settings']               = 'Instellingen';
$lang['Layout']                 = 'Verander Lay-out';
$lang['Lighttheme']             = 'Lichte Topic';
$lang['Darktheme']              = 'Donkere Topic';
$lang['Nonmetric']              = 'US (F) ';
$lang['Metric']                 = 'Metric (C)';
$lang['UKmetric']               = 'UK (MPH - Metric) ';
$lang['Scandinavia']            = 'Scandinavië(M/S)';
$lang['Worldwideearthquakes']   = 'Aarbevingen wereld wijd';
$lang['Toggle']                 = 'Volledig scherm activeren ';
$lang['Contactinfo']            = 'Station & Contact Info';
$lang['Templateinfo']           = 'Medewerkers';
$lang['language']               = 'Selecteer Taal';
$lang['Weatherstationinfo']     = 'Weerstation informatie';
$lang['Webdesigninfo']          = 'Webdesign info';
$lang['Contact']                = 'Contact';
//days
$lang['Monday']                 = 'Monday';
$lang['Tuesday']                = 'Tuesday';
$lang['Wednesday']              = 'Wednesday';
$lang['Thursday']               = 'Thursday';
$lang['Friday']                 = 'Friday ';
$lang['Saturday']               = 'Saturday';
$lang['Sunday']                 = 'Sunday';
//months
$lang['January']                = 'January';
$lang['Febuary']                = 'Febuary';
$lang['March']                  = 'March';
$lang['April']                  = 'April';
$lang['May']                    = 'May';
$lang['June']                   = 'June';
$lang['July']                   = 'July';
$lang['August']                 = 'August';
$lang['September']              = 'September';
$lang['October']                = 'October';
$lang['November']               = 'November';
$lang['December']               = 'December';
//temperature
$lang['Temperature']            = 'Temperatuur';
$lang['Feelslike']              = 'Voelt als';
$lang['Humidity']               = 'Vochtigheid';
$lang['Dewpoint']               = 'Dauw punt';
$lang['Trend']                  = 'trend ';
$lang['Heatindex']              = 'Warmte Index';
$lang['Windchill']              = 'Windchill ';
$lang['Tempfactors']            = 'Temp Factors';
$lang['Nocautions']             = 'Geen waarschuwingen';
$lang['Wetbulb']                = 'Natte bol';
$lang['dry']                    = '& Droog';
$lang['verydry']                = '& Erg Droog';
//new feature temperature feels
$lang['FreezingCold']           = 'Vries koud';
$lang['FeelingVeryCold']        = 'Voelt erg koud aan';
$lang['FeelingCold']            = 'Voelt koud aan';
$lang['FeelingCool']            = 'Koel';
$lang['FeelingComfortable']     = 'Comfortabel';
$lang['FeelingWarm']            = 'Warm';
$lang['FeelingHot']             = 'Heet';
$lang['FeelingUncomfortable']   = 'Oncomfortabel';
$lang['FeelingVeryHot']         = 'Erg heet';
$lang['FeelingExtremelyHot']    = 'Extreem heet';
//wind
$lang['Windspeed']              = 'Wind Snelheid';
$lang['Gust']                   = 'Vlaag';
$lang['Direction']              = 'Richting';
$lang['Gusting']                = 'Windvlaag';
$lang['Blowing']                = 'Wind';
$lang['Wind']                   = 'Wind';
$lang['Wind Run']               = 'Wind Run';
// Wind phrases for Beaufort scale for windspeed area
$lang['Calm']                   = 'Kalm';
$lang['Lightair']               = 'Zeer zwak ';
$lang['Lightbreeze']            = 'Zwak';
$lang['Gentelbreeze']           = 'Vrij matig';
$lang['Moderatebreeze']         = 'Matig ';
$lang['Freshbreeze']            = 'Vrij krachtig ';
$lang['Strongbreeze']           = 'Krachtig ';
$lang['Neargale']               = 'Hard ';
$lang['Galeforce']              = 'Stormachtig ';
$lang['Stronggale']             = 'Sterke storm ';
$lang['Storm']                  = 'Zware storm ';
$lang['Violentstorm']           = 'Orkaanachtig ';
$lang['Hurricane']              = 'Orkaan ';
// Wind phrases from Beaufort scale for current conditions area
$lang['CalmConditions']         = 'Rustige Condities';
$lang['LightBreezeattimes']     = 'Soms een lichte briesje';
$lang['MildBreezeattimes']      = 'Soms een mild briesje';
$lang['ModerateBreezeattimes']  = 'Soms een matige wind';
$lang['FreshBreezeattimes']     = 'Soms een frisse wind';
$lang['StrongBreezeattimes']    = 'Soms een stevige wind';
$lang['NearGaleattimes']        = 'Soms een harde wind';
$lang['GaleForceattimes']       = 'Soms een stormachtige wind';
$lang['StrongGaleattimes']      = 'Soms een sterke stormachtige wind';
$lang['StormConditions']        = 'Stormachtige Condities';
$lang['ViolentStormConditions'] = 'Orkaanachtig Condities';
$lang['HurricaneConditions']    = 'Orkaan Condities';
$lang['Avg']                    = '<span2> Gem: </span2>';
//wind direction compass
$lang['Northdir']               = 'Het <span>Noorden<br></span>';
$lang['NNEdir']                 = 'Noord Noord <br><span>Oost</span>';
$lang['NEdir']                  = 'Noord <span> Oost<br></span>';
$lang['ENEdir']                 = 'Oost Noord<br><span>Oost</span>';
$lang['Eastdir']                = 'Het <span> Oosten<br></span>';
$lang['ESEdir']                 = 'Oost Zuid<br><span>Oost</span>';
$lang['SEdir']                  = 'Zuid <span> Oost</span>';
$lang['SSEdir']                 = 'Zuid Zuid<br><span>Oost</span>';
$lang['Southdir']               = 'Het <span> Zuiden</span>';
$lang['SSWdir']                 = 'Zuid Zuid<br><span>West</span>';
$lang['SWdir']                  = 'Zuid <span> West</span>';
$lang['WSWdir']                 = 'West South<br><span>West</span>';
$lang['Westdir']                = 'Het <span> Westen</span>';
$lang['WNWdir']                 = 'West Noord<br><span>West</span>';
$lang['NWdir']                  = 'Noord <span> West</span>';
$lang['NWNdir']                 = 'Noord Noord<br><span>West</span>';
//wind direction avg
$lang['North']                  = 'Noord';
$lang['NNE']                    = 'NNO';
$lang['NE']                     = 'NO';
$lang['ENE']                    = 'ONO';
$lang['East']                   = 'Oosten ';
$lang['ESE']                    = 'OZO';
$lang['SE']                     = 'ZO';
$lang['SSE']                    = 'ZZO';
$lang['South']                  = 'Zuid';
$lang['SSW']                    = 'ZZW';
$lang['SW']                     = 'ZW';
$lang['WSW']                    = 'WZW';
$lang['West']                   = 'West';
$lang['WNW']                    = 'WNW';
$lang['NW']                     = 'NW';
$lang['NWN']                    = 'NWN';
//rain
$lang['raintoday']              = 'Regen vandaag';
$lang['Rate']                   = 'Intensiteit';
$lang['Rainfall']               = 'Neerslag';
$lang['precip']                 = 'Neerslag'; // must be short name do not use full precipatation or I will remove it if it does not align !!!! ///
$lang['Precip']                 = 'Neerslag'; // must be short name do not use full precipatation or I will remove it if it does not align !!!! ///
$lang['Rain']                   = 'Regen';
$lang['HeavyRain']              = 'Hevige regen';
$lang['Rainbow']                = 'Rainbow';
$lang['Windy']                  = 'Windy';
//sun -moon-daylight-darkness
$lang['Sun']                    = 'Zon';
$lang['Moon']                   = 'Maan';
$lang['Sunrise']                = 'Zonsopkomst';
$lang['Sunset']                 = 'Zonsondergang';
$lang['Moonrise']               = 'Maanopkomst ';
$lang['Moonset']                = 'Maanondergang';
$lang['Night']                  = 'Nacht ';
$lang['Day']                    = 'Dag';
$lang['Nextnewmoon']            = 'Nieuwe maan';
$lang['Nextfullmoon']           = 'Volle maan';
$lang['Luminance']              = '&nbsp;&nbsp;&nbsp;&nbsp;Verlicht';
$lang['Moonphase']              = 'Maanfase';
$lang['Estimated']              = 'Geschatte';
$lang['Daylight']               = 'Daglicht';
$lang['Darkness']               = 'Donker';
$lang['Daysold']                = 'Dagen oud';
$lang['Belowhorizon']           = 'achter de<br>horizon';
$lang['Mintill']                = 'min tot';
$lang['Till']                   = 'Till';
$lang['Minago']                 = 'min geleden';
$lang['Hrs']                    = ' hrs';
$lang['Min']                    = ' min';
$lang['TotalDarkness']          = 'Totale Duisternis';
$lang['TotalDaylight']          = 'Totale Daglicht';
$lang['Below']                  = 'is achter de horizon';
$lang['Newmoon']                = 'Nieuwe maan';
$lang['Waxingcrescent']         = 'Wassende maan';
$lang['Firstquarter']           = 'Eerste kwartier';
$lang['Waxinggibbous']          = 'Wassende maan';
$lang['Fullmoon']               = 'Volle maan';
$lang['Waninggibbous']          = 'Afnemende maan';
$lang['Lastquarter']            = 'Laatste kwartier';
$lang['Waningcrescent']         = 'Afnemende maan';
//trends
$lang['Falling']                = ' Dalend';
$lang['Rising']                 = ' Stijgend';
$lang['Steady']                 = ' Stabiel';
$lang['Rapidly']                = 'Snel';
$lang['Temp']                   = 'Temp';
//Solar-UV
//uv
$lang['Nocaution']              = 'Geen <color>voorzichtigheid</color> nodig';
$lang['Wearsunglasses']         = 'Gebruik <color>zonnebril</color> op zonnige dagen';
$lang['Stayinshade']            = 'Blijf in de schaduw in de buurt van de middag waarneer de <color>zon</color> het sterkste is';
$lang['Reducetime']             = 'Verminder de tijd in de <color>zon</color> tussen 10:00 en 16:00 ';
$lang['Minimize']               = 'Verklein blootstelling aan de <color>zon</color> tussen 10:00 en 16:00 ';
$lang['Trytoavoid']             = 'Probeer<color>zon</color> te vermijden tussen 10:00 en 16:00 ';
//solar
$lang['Poor']                   = 'Zonnestraling<br><color2> Pover</color>';
$lang['Low']                    = 'Zonnestraling<br><color2> Laag</color>';
$lang['Moderate']               = 'Zonnestraling<br><color1> Matig</color>';
$lang['Good']                   = 'Zonnestraling<br><color> Sterk</color>';
$lang['Solarradiation']         = 'Zonnestraling';
//current sky
$lang['Currentsky']             = 'Huidige Situatie';
$lang['Currently']              = 'Momenteel';
$lang['Cloudcover']             = 'Bewolking';
//Notifications
$lang['Nocurrentalert']         = 'Geen actuele waarschuwingen';
$lang['Windalert']              = 'Windvlagen';
$lang['Tempalert']              = 'Hoge temperatuur';
$lang['Heatindexalert']         = 'Warmte Index (Oppassen)';
$lang['Windchillalert']         = 'Koude wind (Oppassen)';
$lang['Dewpointalert']          = 'Onkonfortabele luchtvochtigheid';
$lang['Dewpointcolderalert']    = 'Dauwpunt het voelt kouder aan';
$lang['Feelslikecolderalert']   = 'Het voelt kouder aan';
$lang['Feelslikewarmeralert']   = 'Het voelt warmer aan';
$lang['Rainratealert']          = 'per/hr<span> neerslag ';
//Earthquake Notifications
$lang['Regional']               = 'Regionale aardbeving';
$lang['Significant']            = 'Betekenisvolle aardbevingen';
$lang['Nosignificant']          = 'Geen betekenisvolle aardbevingen';
//Main page
$lang['Barometer']              = 'Barometer';
$lang['UVSOLAR']                = 'UV-Solar';
$lang['Earthquake']             = 'Aardbevings data';
$lang['Daynight']               = 'Dag & Nacht Info';
$lang['SunPosition']            = 'Sun Position';
$lang['Location']               = 'Locatie ';
$lang['Hardware']               = 'Hardware';
$lang['Rainfalltoday']          = 'Neerslag Vandaag';
$lang['Windspeed']              = 'Wind Snelheid';
$lang['Winddirection']          = 'Wind Richting';
$lang['Measured']               = 'Gemeten Vandaag';
$lang['Forecast']               = 'Voorspelling';
$lang['Forecastahead']          = 'Voorspelling';
$lang['Forecastsummary']        = 'Verwachtings Overzicht';
$lang['WindGust']               = 'Wind snelheid | Vlaag';
$lang['Hourlyforecast']         = 'Voorspelling per uur ';
$lang['Significantearthquake']  = 'Veelzeggende aardbeving';
$lang['Regionalearthquake']     = 'Regionale aardbeving';
$lang['Average']                = 'Gemiddelde';
$lang['Notifications']          = 'Waarschuwingen';
$lang['Indoor']                 = 'Binnen';
$lang['Today']                  = 'Vandaag';
$lang['Tonight']                = 'Vannacht';
$lang['Tomorrow']               = 'Morgen';
$lang['Tomorrownight']          = 'Morgen nacht';
$lang['Updated']                = 'Updated';
$lang['Meteor']                 = 'Vallende Sterren Info';
$lang['Firerisk']               = 'Brandgevaar';
$lang['Localtime']              = 'Local <span2>Time</span2>';
$lang['Nometeor']               = 'Geen vallende Sterren';
$lang['LiveWebCam']             = 'Live Web Cam';
$lang['Online']                 = 'Online';
$lang['Offline']                = 'Offline';
$lang['Weatherstation']         = 'Weerstation';
$lang['Cloudbase']              = 'Cloudbase';
$lang['uvalert']                = 'Caution High UVINDEX';
$lang['Max']                    = 'Max';
$lang['Min']                    = 'Min';
//earthquake TOP MODULE 10 July 2017
$lang['MicroE']                  = 'Micro Earthquake';
$lang['MinorE']                  = 'Minor Earthquake';
$lang['LightE']                  = 'Light Earthquake';
$lang['ModerateE']               = 'Moderate Earthquake';
$lang['StrongE']                 = 'Strong Earthquake';
$lang['MajorE']                  = 'Major Earthquake';
$lang['GreatE']                  = 'Great Earthquake';
$lang['RegionalE']              = 'Regional';
$lang['Conditions']             = 'Conditions';
$lang['Cloudbase Height']       = 'Cloudbase Height';
$lang['Station']                = 'Station';
$lang['Detailed Forecast']      = 'Detailed Forecast';
$lang['Summary Outlook']        = 'Summary';
//Air Quality
$lang['Hazordous']              = 'Hazardous Conditions';
$lang['VeryUnhealthy']          = 'Very Unhealthy';
$lang['Unhealthy']              = 'Unhealthy Air Quality';
$lang['UnhealthyFS']            = 'Unhealthy For Some';
$lang['Moderate']               = 'Moderate Air Quality ';
$lang['Good']                   = 'Good Air Quality ';
#notification additions
$lang['notifyTitle']            = 'Weerstation Meldingen';
$lang['notifyAlert']             = "Alert";
$lang['notifyLowBatteryAlert']   = "Low Battery Alert";
$lang['notifyConsoleLowBattery'] = "Console's battery is low";
$lang['notifyStationLowBattery'] = "Station's battery is low";
$lang['notifyUVIndex']           = "UV-Index Caution";
$lang['notifyUVExposure']        = "Reduce Sun Exposure";
$lang['notifyHeatExaustion']     = "Heat Exhaustion";
$lang['notifyExtremeWind']       = "Extreme Wind Warning";
$lang['notifyGustUpTo']          = "Gusts up to";
$lang['notifySeekShelter']       = "Seek shelter <notifyred><b>immediately</b></notifyred>";
$lang['notifyHighWindWarning']   = "High Wind Warning";
$lang['notifySustainedAvg']      = "Sustained avg";
$lang['notifyWindAdvisory']      = "Wind Advisory";
$lang['notifyFreezing']          = "Below Freezing";
?>