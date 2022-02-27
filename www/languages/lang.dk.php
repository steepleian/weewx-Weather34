<?php
/* 
-----------------
Language Translation File for HOMEWEATHERSTATION Template
Language: Danish
Translation By : Erik M Madsen
Developed By: Brian Underdown/Erik M Madsen
November 4th 2016
Revised: May 2017 
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
setlocale(LC_TIME, 'danish', 'DK', 'da_DK.ISO8859-1', 'da_DK.utf-8');
$lang                           = array();
// Menu
$lang['Settings']               = 'Indstilling';
$lang['Layout']                 = 'Skift Layout';
$lang['Lighttheme']             = 'Lys Tema';
$lang['Darktheme']              = 'Mørke Tema';
$lang['Nonmetric']              = 'US (F) ';
$lang['Metric']                 = 'Metrisk (C)';
$lang['UKmetric']               = 'UK (MPH - Metrisk) ';
$lang['Scandinavia']            = 'Skandinavien(M/S)';
$lang['Worldwideearthquakes']   = 'Jordskælv verden rundt';
$lang['Toggle']                 = 'Skift til fuldskærm ';
$lang['Contactinfo']            = 'Station & kontakt Info';
$lang['Templateinfo']           = 'Bidragydere';
$lang['language']               = 'Vælg sprog';
$lang['Weatherstationinfo']     = 'Vejr Station Info';
$lang['Webdesigninfo']          = 'Template Info';
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
$lang['Temperature']            = 'Temperatur';
$lang['Feelslike']              = 'Føles';
$lang['Humidity']               = 'Fugtighed';
$lang['Dewpoint']               = 'Dugpunkt';
$lang['Trend']                  = 'trend ';
$lang['Heatindex']              = 'Varme Index';
$lang['Windchill']              = 'Vind faktor ';
$lang['Tempfactors']            = 'Temp Faktor';
$lang['Nocautions']             = 'Ingen advarsler';
$lang['Wetbulb']                = 'Dugpunkt';
$lang['dry']                    = '& Tørt';
$lang['verydry']                = '& Meget Tørt';
//new feature temperature feels
$lang['FreezingCold']           = 'Frysende Koldt';
$lang['FeelingVeryCold']        = 'Føles Meget Koldt';
$lang['FeelingCold']            = 'Føles Koldt';
$lang['FeelingCool']            = 'Føles Koldt';
$lang['FeelingComfortable']     = 'Føles Komfortabelt ';
$lang['FeelingWarm']            = 'Føles Varmt';
$lang['FeelingHot']             = 'Føles Rigtigt Varmt';
$lang['FeelingUncomfortable']   = 'Føles Ukomfortabelt';
$lang['FeelingVeryHot']         = 'Føles Meget Varmt';
$lang['FeelingExtremelyHot']    = 'Føles Ekstremt Varmt';
//wind
$lang['Windspeed']              = 'Hastighed';
$lang['Gust']                   = 'Stød';
$lang['Direction']              = 'Retning';
$lang['Gusting']                = 'Stød af';
$lang['Blowing']                = 'Blæser';
$lang['Wind']                   = 'Hastighed';
$lang['Wind Run']               = 'Hastighed Run';
// Wind phrases for Beaufort scale for windspeed area
$lang['Calm']                   = 'Stille';
$lang['Lightair']               = 'Næsten stille';
$lang['Lightbreeze']            = 'Svag vind ';
$lang['Gentelbreeze']           = 'Let vind';
$lang['Moderatebreeze']         = 'Jævn vind';
$lang['Freshbreeze']            = 'Frisk vind';
$lang['Strongbreeze']           = 'Hård vind';
$lang['Neargale']               = 'Stiv kuling';
$lang['Galeforce']              = 'Hård kuling';
$lang['Stronggale']             = 'Stormende kuling';
$lang['Storm']                  = 'Storm';
$lang['Violentstorm']           = 'Stærk storm';
$lang['Hurricane']              = 'Orkan';
// Wind phrases from Beaufort scale for current conditions area
$lang['CalmConditions']         = 'Stille';
$lang['LightBreezeattimes']     = 'Svag vind ';
$lang['MildBreezeattimes']      = 'Let vind ';
$lang['ModerateBreezeattimes']  = 'Jævn vind';
$lang['FreshBreezeattimes']     = 'Frisk vind';
$lang['StrongBreezeattimes']    = 'Hård vind';
$lang['NearGaleattimes']        = 'Stiv kuling';
$lang['GaleForceattimes']       = 'Hård kuling';
$lang['StrongGaleattimes']      = 'Stormende kuling';
$lang['StormConditions']        = 'Storm';
$lang['ViolentStormConditions'] = 'Stærk storm';
$lang['HurricaneConditions']    = 'Orkan';
$lang['Avg']                    = '<span2> Gns: </span2>';
//wind direction compass
$lang['Northdir']               = 'Stik <span>Nord<br></span>';
$lang['NNEdir']                 = 'Nord Nord <br><span>Øst</span>';
$lang['NEdir']                  = 'Nord <span>Øst<br></span>';
$lang['ENEdir']                 = 'Øst Nord<br><span>Øst</span>';
$lang['Eastdir']                = "Stik <span>Øst<br></span>";
$lang['ESEdir']                 = 'Øst Syd<br><span>Øst</span>';
$lang['SEdir']                  = 'Syd <span>Øst</span>';
$lang['SSEdir']                 = 'Syd Syd<br><span>Øst</span>';
$lang['Southdir']               = 'Stik <span>Syd</span>';
$lang['SSWdir']                 = 'Syd Syd<br><span>Vest</span>';
$lang['SWdir']                  = 'Syd <span>Vest</span>';
$lang['WSWdir']                 = 'Vest Syd<br><span>Vest</span>';
$lang['Westdir']                = 'Stik <span>Vest</span>';
$lang['WNWdir']                 = 'Vest Nord<br><span>Vest</span>';
$lang['NWdir']                  = 'Nord <span>Vest</span>';
$lang['NWNdir']                 = 'Nord Nord<br><span>Vest</span>';
//wind direction avg
$lang['North']                  = 'Nord';
$lang['NNE']                    = 'NNØ';
$lang['NE']                     = 'NØ';
$lang['ENE']                    = 'ØNØ';
$lang['East']                   = 'Øst ';
$lang['ESE']                    = 'ØSØ';
$lang['SE']                     = 'SØ';
$lang['SSE']                    = 'SSØ';
$lang['South']                  = 'Syd';
$lang['SSW']                    = 'SSV';
$lang['SW']                     = 'SV';
$lang['WSW']                    = 'VSV';
$lang['West']                   = 'Vest';
$lang['WNW']                    = 'VNV';
$lang['NW']                     = 'NV';
$lang['NWN']                    = 'NVN';
//rain
$lang['raintoday']              = 'Regn i dag';
$lang['Rate']                   = 'Rate';
$lang['Rainfall']               = 'Regn';
$lang['Precip']                 = 'ca.'; // must be short name do not use full precipatation !!!! ///
$lang['Rain']                   = 'Regn';
$lang['Heavyrain']              = 'Kraftig regn';
$lang['Flooding']               = 'Mulighed for oversmømmelse';
$lang['Rainbow']                = 'Regnbue';
$lang['Windy']                  = 'Blæsende';
//sun -moon-daylight-darkness
$lang['Sun']                    = 'Sol';
$lang['Moon']                   = 'Måne';
$lang['Sunrise']                = 'Sol Opgang';
$lang['Sunset']                 = 'Sol Nedgang';
$lang['Moonrise']               = 'Måne Op';
$lang['Moonset']                = 'Måne Ned';
$lang['Night']                  = 'Nat ';
$lang['Day']                    = 'Dag';
$lang['Nextnewmoon']            = 'Næste Ny Måne';
$lang['Nextfullmoon']           = 'Næste Fuld Måne';
$lang['Luminance']              = 'Luminance';
$lang['Moonphase']              = 'Månefase';
$lang['Estimated']              = 'Anslået';
$lang['Daylight']               = 'Dagslys';
$lang['Darkness']               = 'Mørke';
$lang['Daysold']                = 'Dage Gammel';
$lang['Belowhorizon']           = 'under<br>horisonten';
$lang['Mintill']                = '<br>min. til';
$lang['Till']                   = 'Til ';
$lang['Minago']                 = ' min. siden';
$lang['Hrs']                    = ' timer';
$lang['Min']                    = ' min.';
$lang['TotalDarkness']          = 'Total Mørke';
$lang['TotalDaylight']          = 'Total Dagslys';
$lang['Below']                  = 'er under horisonten';
$lang['Newmoon']                = 'Ny Måne';
$lang['Waxingcrescent']         = 'Tiltagende Halvmåne';
$lang['Firstquarter']           = 'Første Kvartalmåne';
$lang['Waxinggibbous']          = 'Tiltagende Måne';
$lang['Fullmoon']               = 'Fuldmåne';
$lang['Waninggibbous']          = 'Aftagende Måne';
$lang['Lastquarter']            = 'Sidste Kvartalmåne';
$lang['Waningcrescent']         = 'Aftagende Halvmåne';
//trends
$lang['Falling']                = 'Faldende';
$lang['Rising']                 = 'Stigende';
$lang['Steady']                 = 'Stabil';
$lang['Rapidly']                = 'Hurtigt';
$lang['Temp']                   = 'Temp';
//Solar-UV
//uv
$lang['Nocaution']              = 'Ingen <color>handling</color> behøves';
$lang['Wearsunglasses']         = 'Brug <color>solbriller</color> på dage med stærk sol';
$lang['Stayinshade']            = 'Bliv i skyggen omkring middag hvor<color>solen</color> er stærkest';
$lang['Reducetime']             = 'Reducer tiden i <color>solen</color> mellem 10.00 & 16.00';
$lang['Minimize']               = 'Minimer tiden i <color>solens</color> stråling mellem 10.00 & 16.00';
$lang['Trytoavoid']             = 'Forsøg at undgå <color>solens</color> stråling mellem 10.00 & 16.00';
//solar
$lang['Poor']                   = 'Dårlig <color><br>Stråling</color>';
$lang['Low']                    = 'Lav <br><color>Stråling</color>';
$lang['Moderate']               = 'Moderat <br><color>Stråling</color>';
$lang['Good']                   = 'God <br><color>Stråling</color>';
$lang['Solarradiation']         = 'Sol Stråling';
//current sky
$lang['Currentsky']             = 'Nuværende Forhold';
$lang['Currently']              = 'Nuværende';
$lang['Cloudcover']             = 'Skydække';
//Notifications
$lang['Nocurrentalert']         = 'Ingen Nuværende Vejr Alarmer';
$lang['Windalert']              = 'Vindstød Af';
$lang['Tempalert']              = 'Høj Temperatur';
$lang['Heatindexalert']         = 'Heat Index Forsigtighed ';
$lang['Windchillalert']         = 'Vind Faktor Forsigtighed';
$lang['Dewpointalert']          = 'Ubehagelig Luftfugtighed';
$lang['Dewpointcolderalert']    = 'Dugpunkt føles koldere';
$lang['Feelslikecolderalert']   = 'Føles Koldere';
$lang['Feelslikewarmeralert']   = 'Føles Varmere';
$lang['Rainratealert']          = 'mm/t<span> Regn';
//Earthquake Notifications
$lang['Regional']               = 'Regional Jordskælv';
$lang['Significant']            = 'Betydelig Jordskælv';
$lang['Nosignificant']          = 'Ingen Betydelige Jordskælv';
//Main page
$lang['Barometer']              = 'Barometer';
$lang['UVSOLAR']                = 'UV | Solar Data';
$lang['Earthquake']             = 'Jordskælvs Data';
$lang['Daynight']               = 'Dagslys og Natte Info';
$lang['SunPosition']            = 'Sun Position';
$lang['Location']               = 'Placering ';
$lang['Hardware']               = 'Hardware';
$lang['Rainfalltoday']          = 'Regnvejr i dag';
$lang['Windspeed']              = 'Hastighed';
$lang['Winddirection']          = 'Vind Retning';
$lang['Measured']               = 'Målt i dag';
$lang['Forecast']               = 'Vejrudsigt';
$lang['Forecastahead']          = 'Vejrudsigt Fremad';
$lang['Forecastsummary']        = 'Vejrudsigt Opsummeret';
$lang['WindGust']               = 'Vind Hastighed | Stød';
$lang['Hourlyforecast']         = 'Vejrudsigt Timevis';
$lang['Significantearthquake']  = 'Betydelig Jordskælv';
$lang['Regionalearthquake']     = 'Regional Jordskælv';
$lang['Average']                = 'Gennemsnit';
$lang['Notifications']          = 'Notifikations Alarm';
$lang['Indoor']                 = 'Indendørs';
$lang['Today']                  = 'I Dag';
$lang['Tonight']                = 'I Nat';
$lang['Tomorrow']               = 'I Morgen';
$lang['Tomorrownight']          = 'I morgen Nat';
$lang['Updated']                = 'Opdateret';
$lang['Meteor']                 = 'Meteor Info';
$lang['Firerisk']               = 'Brand index';
$lang['Localtime']              = 'Lokal tid';
$lang['Nometeor']               = 'Ingen Meteoregn';
$lang['LiveWebCam']             = 'WebCam';
$lang['Online']                 = 'Online';
$lang['Offline']                = 'Offline';
$lang['Weatherstation']         = 'Vejrstation';
$lang['Cloudbase']              = 'Skyhøjde';
$lang['uvalert']                = 'Advarsel, høj UVINDEX';
$lang['Max']                    = 'Max';
$lang['Min']                    = 'Min';
//earthquake TOP MODULE 10 July 2017
$lang['MicroE']                  = 'Micro Earthquake';
$lang['MinorE']                  = 'Minor Earthquake';
$lang['LightE']                  = 'Light Earthquake';
$lang['ModerateE']              = 'Moderate Earthquake';
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
$lang['notifyTitle']             = 'Notifications';
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