<?php
/*
-----------------
Language Translation File for HOMEWEATHERSTATION Template
Language: Norwegian
Translated by: Torjan
Developed By: Lightmaster/Brian Underdown/Erik M Madsen
November 4th 2016
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
setlocale(LC_TIME, "no_NO.UTF-8");
$lang                            = array();
// Menu
$lang['Settings']                = 'Innstilling';
$lang['Layout']                  = 'Utseende';
$lang['Lighttheme']              = 'Lyst Tema';
$lang['Darktheme']               = 'Mørkt Tema';
$lang['Nonmetric']               = 'US (F) ';
$lang['Metric']                  = 'Metrisk (C)';
$lang['UKmetric']                = 'UK (MPH - Metrisk) ';
$lang['Scandinavia']             = 'Skandinavia(M/S)';
$lang['Worldwideearthquakes']    = 'Jordskjelv verden';
$lang['Toggle']                  = 'Fullskjerm';
$lang['Contactinfo']             = 'kontakt Info';
$lang['Templateinfo']            = 'Bidragsytere';
$lang['language']                = 'Velg språk';
$lang['Weatherstationinfo']      = 'Værstasjon Info';
$lang['Webdesigninfo']           = 'Template Info';           
$lang['Contact']                 = 'Kontakt';           
//days
$lang['Monday']                  = 'Mandag';           
$lang['Tuesday']                 = 'Tirsdag';           
$lang['Wednesday']               = 'Onsdag';           
$lang['Thursday']                = 'Torsdag';           
$lang['Friday']                  = 'Fredag';           
$lang['Saturday']                = 'Lørdag';           
$lang['Sunday']                  = 'Søndag';           
//months
$lang['January']                 = 'Januar';           
$lang['Febuary']                 = 'Februar';           
$lang['March']                   = 'Mars';           
$lang['April']                   = 'April';           
$lang['May']                     = 'Mai';           
$lang['June']                    = 'Juni';           
$lang['July']                    = 'Juli';           
$lang['August']                  = 'August';           
$lang['September']               = 'September';           
$lang['October']                 = 'Oktober';           
$lang['November']                = 'November';           
$lang['December']                = 'Desember';           
//temperature
$lang['Temperature']             = 'Temperatur';
$lang['Feelslike']               = 'Føles';
$lang['Humidity']                = 'Fuktighet';
$lang['Dewpoint']                = 'Duggpunkt';
$lang['Trend']                   = 'trend ';
$lang['Heatindex']               = 'VarmeIndeks';
$lang['Windchill']               = 'Vindfaktor ';
$lang['Tempfactors']             = 'Temp Faktor';
$lang['Nocautions']              = 'Ingen advarsler';
$lang['Wetbulb']                 = 'Duggpunkt';
$lang['dry']                     = '& Tørt';
$lang['verydry']                 = '& Meget Tørt';
//new feature temperature feels
$lang['FreezingCold']            = 'Stein Kaldt';
$lang['FeelingVeryCold']         = 'Føles Meget Kaldt';
$lang['FeelingCold']             = 'Føles Kaldt';
$lang['FeelingCool']             = 'Føles kjølig';
$lang['FeelingComfortable']      = 'Føles Komfortabelt ';
$lang['FeelingWarm']             = 'Føles Varmt';
$lang['FeelingHot']              = 'Føles Svært Varmt';
$lang['FeelingUncomfortable']    = 'Føles Ukomfortabelt';
$lang['FeelingVeryHot']          = 'Føles Meget Varmt';
$lang['FeelingExtremelyHot']     = 'Føles Ekstremt Varmt';
//wind
$lang['Windspeed']               = 'Hastighet';
$lang['Gust']                    = 'Kast';
$lang['Direction']               = 'Rettning';
$lang['Gusting']                 = 'Kast på';
$lang['Blowing']                 = 'Blåser';
$lang['Wind']                    = 'Vind';
$lang['Wind Run']                = 'Vind mengde';           
// Wind phrases for Beaufort scale for windspeed area
$lang['Calm']                    = 'Stille';
$lang['Lightair']                = 'Nesten stille';
$lang['Lightbreeze']             = 'Svak vind ';
$lang['Gentelbreeze']            = 'Lett Bris';
$lang['Moderatebreeze']          = 'Laber Bris';
$lang['Freshbreeze']             = 'Frisk Bris';
$lang['Strongbreeze']            = 'Liten Kuling';
$lang['Neargale']                = 'stiv kuling';
$lang['Galeforce']               = 'Sterk kuling';
$lang['Stronggale']              = 'Liten Storm';           
$lang['Storm']                   = 'Storm';           
$lang['Violentstorm']            = 'Sterk storm';           
$lang['Hurricane']               = 'Orkan';
// Wind phrases from Beaufort scale for current conditions area
$lang['CalmConditions']          = 'Stille';
$lang['LightBreezeattimes']      = 'Svak vind';
$lang['MildBreezeattimes']       = 'Lett Bris';
$lang['ModerateBreezeattimes']   = 'Laber Bris';
$lang['FreshBreezeattimes']      = 'Frisk Bris';
$lang['StrongBreezeattimes']     = 'Liten Kuling';
$lang['NearGaleattimes']         = 'Stiv kuling';
$lang['GaleForceattimes']        = 'Sterk kuling';
$lang['StrongGaleattimes']       = 'Liten Storm';
$lang['StormConditions']         = 'Storm';          
$lang['ViolentStormConditions']  = 'Sterk storm';           
$lang['HurricaneConditions']     = 'Orkan';
$lang['Avg']                     = '<span2> Gns: </span2>';
//wind direction compass
$lang['Northdir']                = 'Rettning <span>Nord<br></span>';
$lang['NNEdir']                  = 'Nord Nord <br><span>Øst</span>';
$lang['NEdir']                   = 'Nord <span>Øst<br></span>';
$lang['ENEdir']                  = 'Øst Nord<br><span>Øst</span>';
$lang['Eastdir']                 = "Rettning <span>Øst<br></span>";
$lang['ESEdir']                  = 'Øst Sør<br><span>Øst</span>';
$lang['SEdir']                   = 'Sør <span>Øst</span>';
$lang['SSEdir']                  = 'Sør Sør<br><span>Øst</span>';
$lang['Southdir']                = 'Rettning <span>Syd</span>';
$lang['SSWdir']                  = 'Sør Sør<br><span>Vest</span>';
$lang['SWdir']                   = 'Sør <span>Vest</span>';
$lang['WSWdir']                  = 'Vest Sør<br><span>Vest</span>';
$lang['Westdir']                 = 'Rettning <span>Vest</span>';
$lang['WNWdir']                  = 'Vest Nord<br><span>Vest</span>';
$lang['NWdir']                   = 'Nord <span>Vest</span>';
$lang['NWNdir']                  = 'Nord Nord<br><span>Vest</span>';
//wind direction avg
$lang['North']                   = 'Nord';
$lang['NNE']                     = 'NNØ';
$lang['NE']                      = 'NØ';
$lang['ENE']                     = 'ØNØ';
$lang['East']                    = 'Øst ';
$lang['ESE']                     = 'ØSØ';
$lang['SE']                      = 'SØ';
$lang['SSE']                     = 'SSØ';
$lang['South']                   = 'Sør';
$lang['SSW']                     = 'SSV';
$lang['SW']                      = 'SV';
$lang['WSW']                     = 'VSV';
$lang['West']                    = 'Vest';
$lang['WNW']                     = 'VNV';
$lang['NW']                      = 'NV';
$lang['NWN']                     = 'NVN';
//rain
$lang['raintoday']               = 'Regn i dag';
$lang['Rate']                    = 'Rate';
$lang['Rainfall']                = 'Regn';
$lang['Precip']                  = 'ca.'; // must be short name do not use full precipatation !!!! ///
$lang['Rain']                    = 'Regn';
$lang['Heavyrain']               = 'Kraftig regn';
$lang['Flooding']                = 'Fare for flom';
$lang['Rainbow']                 = 'Regnbue';
$lang['Windy']                   = 'Mye vind';
//sun -moon-daylight-darkness
$lang['Sun']                     = 'Sol';
$lang['Moon']                    = 'Måne';
$lang['Sunrise']                 = 'Sol Oppgang';
$lang['Sunset']                  = 'Sol Nedgang';
$lang['Moonrise']                = 'Måne Opp';
$lang['Moonset']                 = 'Måne Ned';
$lang['Night']                   = 'Natt ';
$lang['Day']                     = 'Dag';
$lang['Nextnewmoon']             = 'Neste Nymåne';
$lang['Nextfullmoon']            = 'Neste Fullmåne';
$lang['Luminance']               = 'Opplyst';
$lang['Moonphase']               = 'Månefase';
$lang['Estimated']               = 'Annslått';
$lang['Daylight']                = 'Dagslys';
$lang['Darkness']                = 'Mørke';
$lang['Daysold']                 = 'Dager Gammel';
$lang['Belowhorizon']            = 'under<br>horisonten';     
$lang['Mintill']                 = '<br>min. til';           
$lang['Till']                    = 'Til ';          
$lang['Minago']                  = ' min. siden';       
$lang['Hrs']                     = ' timer';           
$lang['Min']                     = ' min.';           
$lang['TotalDarkness']           = 'Total Mørke';           
$lang['TotalDaylight']           = 'Total Dagslys';           
$lang['Below']                   = 'er under horisonten';
$lang['Newmoon']                 = 'Nymåne';
$lang['Waxingcrescent']          = 'Tiltagende Halvmåne';
$lang['Firstquarter']            = 'Første Kvartalmåne';
$lang['Waxinggibbous']           = 'Tiltagende Måne';
$lang['Fullmoon']                = 'Fullmåne';
$lang['Waninggibbous']           = 'Avtagende Måne';
$lang['Lastquarter']             = 'Siste Kvartalmåne';
$lang['Waningcrescent']          = 'Avtagende Halvmåne';
//trends
$lang['Falling']                 = 'Fallende';
$lang['Rising']                  = 'Stigende';
$lang['Steady']                  = 'Stabil';
$lang['Rapidly']                 = 'Hurtig';
$lang['Temp']                    = 'Temp';           
//Solar-UV
//uv
$lang['Nocaution']               = 'Ingen <color>handling</color> behøves';
$lang['Wearsunglasses']          = 'Bruk <color>solbriller</color> på dager med sterk sol';
$lang['Stayinshade']             = 'Bli i skyggen omkring middag hvor<color>solen</color> er sterkest';
$lang['Reducetime']              = 'Reduser tiden i <color>solen</color> mellom 10.00 & 16.00';
$lang['Minimize']                = 'Minimer tiden i <color>solens</color> stråling mellom 10.00 & 16.00';
$lang['Trytoavoid']              = 'Forsøk og unngå <color>solens</color> stråling mellem 10.00 & 16.00';
//solar
$lang['Poor']                    = 'Lite <color><br>Stråling</color>';
$lang['Low']                     = 'Lav <br><color>Stråling</color>';
$lang['Moderate']                = 'Moderat <br><color>Stråling</color>';
$lang['Good']                    = 'God <br><color>Stråling</color>';
$lang['Solarradiation']          = 'Sol Stråling';
//current sky
$lang['Currentsky']              = 'Nåværende Forhold';
$lang['Currently']               = 'Nåværende';
$lang['Cloudcover']              = 'Skydekke';
//Notifications
$lang['Nocurrentalert']          = 'Ingen Nåværende Vær Alarmer';
$lang['Windalert']               = 'Vindkast på';
$lang['Tempalert']               = 'Høy Temperatur';
$lang['Heatindexalert']          = 'Heteindeks Forsiktighet ';       
$lang['Windchillalert']          = 'Vind Faktor Forsiktighet';
$lang['Dewpointalert']           = 'Ubehagelig Luftfuktighet';
$lang['Dewpointcolderalert']     = 'Duggpunkt føles kaldere';
$lang['Feelslikecolderalert']    = 'Føles Kaldere';
$lang['Feelslikewarmeralert']    = 'Føles Varmere';
$lang['Rainratealert']           = 'mm/t<span> Regn';
//Earthquake Notifications
$lang['Regional']                = 'Regional Jordskjelv';     
$lang['Significant']             = 'Betydelig Jordskjelv';
$lang['Nosignificant']           = 'Ingen Betydelige Jordskjelv';
//Main page
$lang['Barometer']               = 'Barometer';           
$lang['UVSOLAR']                 = 'UV | Solar Data';           
$lang['Earthquake']              = 'Jordskjelv Data';        
$lang['Daynight']                = 'Dagslys og Natte Info';
$lang['SunPosition']             = 'Sol Posisjon';
$lang['Location']                = 'Plassering ';
$lang['Hardware']                = 'Hardvare';           
$lang['Rainfalltoday']           = 'Regn i dag';
$lang['Windspeed']               = 'Hastighet';
$lang['Winddirection']           = 'Vind Rettning';
$lang['Measured']                = 'Målt i dag';
$lang['Forecast']                = 'Værutsikt';
$lang['Forecastahead']           = 'Værutsikt Frem';
$lang['Forecastsummary']         = 'Værutsikt Oppsummert';
$lang['WindGust']                = 'Vind Hastighet | Kast';
$lang['Hourlyforecast']          = 'Værutsikt Time';
$lang['Significantearthquake']   = 'Betydelig Jordskjelv';
$lang['Regionalearthquake']      = 'Regional Jordskjelv';    
$lang['Average']                 = 'Snitt';
$lang['Notifications']           = 'Notifikasjon Alarm';
$lang['Indoor']                  = 'Innendørs';
$lang['Today']                   = 'I Dag';
$lang['Tonight']                 = 'I Natt';
$lang['Tomorrow']                = 'I Morgen';
$lang['Tomorrownight']           = 'I morgen Natt';
$lang['Updated']                 = 'oppdatert';
$lang['Meteor']                  = 'Meteor Info';           
$lang['Firerisk']                = 'Brannindeks';
$lang['Localtime']               = 'Lokal tid';
$lang['Nometeor']                = 'Ingen Meteoregn';
$lang['LiveWebCam']              = 'Webkamera';           
$lang['Online']                  = 'Tilkoblet';           
$lang['Offline']                 = 'Frakoblet';           
$lang['Weatherstation']          = 'Værstasjon';
$lang['Cloudbase']               = 'Skyhøyde';
$lang['uvalert']                 = 'Advarsel, høy UVINDEKS';
$lang['Max']                     = 'Max';           
$lang['Min']                     = 'Min';           
//earthquake TOP MODULE 10 July 2017
$lang['MicroE']                  = 'Micro Earthquake';
$lang['MinorE']                  = 'Lite Jordskjelv';
$lang['LightE']                  = 'Light Earthquake';
$lang['ModerateE']               = 'Moderat Jordskjelv';
$lang['StrongE']                 = 'Sterkt Jordskjelv';
$lang['MajorE']                  = 'Major Earthquake';
$lang['GreatE']                  = 'Great Earthquake';
$lang['RegionalE']               = 'Regional';           
$lang['Conditions']              = 'Forhold';
$lang['Cloudbase Height']        = 'Skybase Høyde';
$lang['Station']                 = 'Stasjon';
$lang['Detailed Forecast']       = 'Detaljert Varsel';
$lang['Summary Outlook']         = 'Sammendrag';
//Air Quality
$lang['Hazordous']               = 'Farlige forhold';
$lang['VeryUnhealthy']           = 'Svært Usunnt';
$lang['Unhealthy']               = 'Usunn Luftkvalitet';
$lang['UnhealthyFS']             = 'Usunnt For Noen';
$lang['Moderate']                = 'Moderat Luftkvalitet';
$lang['Good']                    = 'God Luftkvalitet';
#notification additions
$lang['notifyTitle']             = 'Varslinger';
$lang['notifyAlert']             = "Alarm";           
$lang['notifyLowBatteryAlert']   = "Lavt Batteri Alarm";           
$lang['notifyConsoleLowBattery'] = "Konsol batteri er lavt";           
$lang['notifyStationLowBattery'] = "Stasjon's batteri er lavt";           
$lang['notifyUVIndex']           = "UV-Indeks Varsel";           
$lang['notifyUVExposure']        = "Reduser Sol Eksponering";           
$lang['notifyHeatExaustion']     = "Varmeutmattelse";           
$lang['notifyExtremeWind']       = "Ekstrem Vind Varsel";           
$lang['notifyGustUpTo']          = "Kast opp til";           
$lang['notifySeekShelter']       = "Søk Ly <notifyred><b>Straks</b></notifyred>";           
$lang['notifyHighWindWarning']   = "Høy Vind Varsel";           
$lang['notifySustainedAvg']      = "Vedvarende Adv";           
$lang['notifyWindAdvisory']      = "Vind Varsel";           
$lang['notifyFreezing']          = "Under Frysepunkt";           
?>