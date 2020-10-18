<?php
/*
-----------------
Language Translation File for HOMEWEATHERSTATION Template
Language: German
Translated by: Stefan Griessner
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
setlocale(LC_TIME, "de_DE.UTF-8");
$lang                           = array();
// Menu
$lang['Settings']               = 'Einstellungen';
$lang['Layout']                 = 'Layout Wechseln';
$lang['Lighttheme']             = 'Helles Theme';
$lang['Darktheme']              = 'Dunkles Theme';
$lang['Nonmetric']              = 'US (F)';
$lang['Metric']                 = 'Metrisch (C)';
$lang['UKmetric']               = 'UK (MPH - Metrisch) ';
$lang['Scandinavia']            = 'Scandinavia(M/S)';
$lang['Worldwideearthquakes']   = 'Weltweites Erdbeben';
$lang['Toggle']                 = 'Ansicht wechseln';
$lang['Contactinfo']            = 'Kontaktinformation';
$lang['Templateinfo']           = 'Vorlageninfo';
$lang['language']               = 'Sprache auswählen';
$lang['Weatherstationinfo']     = 'Wetterstationsinfo';
$lang['Webdesigninfo']          = 'Template Info';
$lang['Contact']                = 'Kontakt';
//days
$lang['Monday']                 = 'Montag';
$lang['Tuesday']                = 'Dienstag';
$lang['Wednesday']              = 'Mittwoch';
$lang['Thursday']               = 'Donnerstag';
$lang['Friday']                 = 'Freitag ';
$lang['Saturday']               = 'Samstag';
$lang['Sunday']                 = 'Sonntag';
//months
$lang['January']                = 'Januar';
$lang['Febuary']                = 'Februar';
$lang['March']                  = 'März';
$lang['April']                  = 'April';
$lang['May']                    = 'Mai';
$lang['June']                   = 'Juni';
$lang['July']                   = 'Juli';
$lang['August']                 = 'August';
$lang['September']              = 'September';
$lang['October']                = 'Oktober';
$lang['November']               = 'November';
$lang['December']               = 'Dezember';
//temperature
$lang['Temperature']            = 'Temperatur';
$lang['Feelslike']              = 'Gefühlt';
$lang['Humidity']               = 'Feuchtigkeit';
$lang['Dewpoint']               = 'Taupunkt';
$lang['Trend']                  = 'Trend ';
$lang['Heatindex']              = 'Hitzeindex';
$lang['Windchill']              = 'Gefühlt ';
$lang['Tempfactors']            = 'Temperaturfaktor';
$lang['Nocautions']             = 'Vorsichtsmaßnahmen';
$lang['Wetbulb']                = 'Kühlgrenztemperatur';
$lang['dry']                    = '& trocken';
$lang['verydry']                = '& sehr trocken';
//new feature temperature feels
$lang['FreezingCold']           = 'Sehr kalt';
$lang['FeelingVeryCold']        = 'Gefühlt sehr kalt';
$lang['FeelingCold']            = 'Gefühlt kalt';
$lang['FeelingCool']            = 'Gefühlt kühl';
$lang['FeelingComfortable']     = 'Gefühlt komfortabel ';
$lang['FeelingWarm']            = 'Gefühlt warm';
$lang['FeelingHot']             = 'Gefühlt heiss';
$lang['FeelingUncomfortable']   = 'Gefühlt unkomfortabel';
$lang['FeelingVeryHot']         = 'Gefühlt sehr heiss';
$lang['FeelingExtremelyHot']    = 'Gefühlt extrem heiss';
//wind
$lang['Windspeed']              = 'Windgeschwindigkeit';
$lang['Gust']                   = 'Böe';
$lang['Direction']              = 'Richtung';
$lang['Gusting']                = 'in Böeen';
$lang['Blowing']                = 'treibend';
$lang['Wind']                   = 'Wind';
$lang['Wind Run']               = 'Windmenge';
// Wind phrases for Beaufort scale for windspeed area
$lang['Calm']                   = 'Windstill';
$lang['Lightair']               = 'Nahezu Windstill';
$lang['Lightbreeze']            = 'Leichte Brise ';
$lang['Gentelbreeze']           = 'Mässige Brise';
$lang['Moderatebreeze']         = 'Mittlere Brise';
$lang['Freshbreeze']            = 'Auffrischende Brise';
$lang['Strongbreeze']           = 'Starke Brise';
$lang['Neargale']               = 'Steifer Wind';
$lang['Galeforce']              = 'Stürmischer Wind';
$lang['Stronggale']             = 'Stark stürmisch';
$lang['Storm']                  = 'Schwerer Sturm';
$lang['Violentstorm']           = 'Kräftiger Sturm';
$lang['Hurricane']              = 'Orkan';
// Wind phrases from Beaufort scale for current conditions area
$lang['CalmConditions']         = 'Windstill';
$lang['LightBreezeattimes']     = 'Teils leichter Wind ';
$lang['MildBreezeattimes']      = 'Teils leichter Wind ';
$lang['ModerateBreezeattimes']  = 'Teils mässiger Wind';
$lang['FreshBreezeattimes']     = 'Teils frischer Wind';
$lang['StrongBreezeattimes']    = 'Teils starker Wind';
$lang['NearGaleattimes']        = 'Teils steifer Wind';
$lang['GaleForceattimes']       = 'Teils stürmischer Wind';
$lang['StrongGaleattimes']      = 'Teils stark stürmisch';
$lang['StormConditions']        = 'Stürmische Bedingungen';
$lang['ViolentStormConditions'] = 'Heftige Sturmbedingungen';
$lang['HurricaneConditions']    = 'Hurrikanbedingungen';
$lang['Avg']                    = '<span2> Schnitt: </span2>';
//wind direction compass
$lang['Northdir']               = '<span>Nord<br></span>';
$lang['NNEdir']                 = 'Nord Nord <br><span>Ost</span>';
$lang['NEdir']                  = 'Nord <span> Ost<br></span>';
$lang['ENEdir']                 = 'Ost Nord<br><span>Ost</span>';
$lang['Eastdir']                = "<span> Ost<br></span>";
$lang['ESEdir']                 = 'Ost Süd<br><span>Ost</span>';
$lang['SEdir']                  = 'Süd <span> Ost</span>';
$lang['SSEdir']                 = 'Süd Süd<br><span>Ost</span>';
$lang['Süddir']                 = '<span> Süd</span>';
$lang['SSWdir']                 = 'Süd Süd<br><span>West</span>';
$lang['SWdir']                  = 'Süd <span> West</span>';
$lang['WSWdir']                 = 'West Süd<br><span>West</span>';
$lang['Westdir']                = '<span> West</span>';
$lang['WNWdir']                 = 'West Nord<br><span>West</span>';
$lang['NWdir']                  = 'Nord <span> West</span>';
$lang['NWNdir']                 = 'Nord Nord<br><span>West</span>';
//wind direction avg
$lang['North']                  = 'Nord';
$lang['NNE']                    = 'NNO';
$lang['NE']                     = 'NO';
$lang['ENE']                    = 'ONO';
$lang['East']                   = 'Ost ';
$lang['ESE']                    = 'OSO';
$lang['SE']                     = 'SO';
$lang['SSE']                    = 'SSO';
$lang['Süd']                    = 'Süd';
$lang['SSW']                    = 'SSW';
$lang['SW']                     = 'SW';
$lang['WSW']                    = 'WSW';
$lang['West']                   = 'West';
$lang['WNW']                    = 'WNW';
$lang['NW']                     = 'NW';
$lang['NWN']                    = 'NWN';
//rain
$lang['raintoday']              = 'Regen Heute';
$lang['Rate']                   = 'Niederschlagsrate';
$lang['Rainfall']               = 'Regen';
$lang['Precip']                 = 'Nd.'; // must be short name do not use full precipatation !!!! ///
$lang['Rain']                   = 'Regen';
$lang['Heavyrain']              = 'Starker Regen';
$lang['Flooding']               = 'Überschwemmung möglich';
$lang['Rainbow']                = 'Regenbogen';
$lang['Windy']                  = 'Windig';
//sun -moon-daylight-darkness
$lang['Sun']                    = 'Sonne';
$lang['Moon']                   = 'Mond';
$lang['Sunrise']                = 'Sonnenaufgang';
$lang['Sunset']                 = 'Sonnenuntergang';
$lang['Moonrise']               = 'Mondaufgang ';
$lang['Moonset']                = 'Monduntergang';
$lang['Night']                  = 'Nacht ';
$lang['Day']                    = 'Tag';
$lang['Nextnewmoon']            = 'Neumond';
$lang['Nextfullmoon']           = 'Vollmond';
$lang['Luminance']              = 'Luminanz';
$lang['Moonphase']              = 'Mond Phase';
$lang['Estimated']              = 'geschätzt';
$lang['Daylight']               = 'Tageslicht';
$lang['Darkness']               = 'Dunkelheit';
$lang['Daysold']                = 'Tage alt';
$lang['Belowhorizon']           = 'Unterhalb des Horizonts';
$lang['Mintill']                = '<br>Minuten bis';
$lang['Till']                   = 'bis ';
$lang['Minago']                 = ' Minuten vor';
$lang['Hrs']                    = ' Std';
$lang['Min']                    = ' Min';
$lang['TotalDarkness']          = 'Total Dunkelheit';
$lang['TotalDaylight']          = 'Total Tageslicht';
$lang['Below']                  = 'unterhalb';
$lang['Newmoon']                = 'Neumond';
$lang['Waxingcrescent']         = 'zunehmend 1.Viertel';
$lang['Firstquarter']           = 'Erstes Viertel';
$lang['Waxinggibbous']          = 'zunehmend 2.Viertel';
$lang['Fullmoon']               = 'Vollmond';
$lang['Waninggibbous']          = 'abnehmend 3.Viertel';
$lang['Lastquarter']            = 'Letztes Viertel';
$lang['Waningcrescent']         = 'abnehmender Mond';
//trends
$lang['Falling']                = 'fallend';
$lang['Rising']                 = 'steigend';
$lang['Steady']                 = '0';
$lang['Rapidly']                = 'schnell';
$lang['Temp']                   = 'Temp';
//Solar-UV
//uv
$lang['Nocaution']              = 'keine <color>Warnung</color> notwendig';
$lang['Wearsunglasses']         = 'Tragen Sie eine <color>Sonnebrille</color> an hellen Tagen';
$lang['Stayinshade']            = 'Bleiben Sie mittags im Schatten,wenn die <color>Sonne</color> am stärksten ist';
$lang['Reducetime']             = 'Reduzieren Sie die Zeit in der <color>Sonne</color> zwischen 10Uhr-14Uhr ';
$lang['Minimize']               = '<color>Meiden Sie die Sonne</color> zwischen 10Uhr-14Uhr ';
$lang['Trytoavoid']             = 'Meiden Sie die <color>Sonne</color> zwischen 10Uhr-14Uhrm ';
//solar
$lang['Poor']                   = 'Schwache Solar<color> <br>Radiation</color>';
$lang['Low']                    = 'Niedrige Solar<br><color>Radiation</color>';
$lang['Moderate']               = 'Mässige Solar <br><color>Radiation</color>';
$lang['Good']                   = 'Starke Solar <br><color>Radiation</color>';
$lang['Solarradiation']         = 'Solar Radiation';
//current sky
$lang['Currentsky']             = 'Aktuelle Bedingungen';
$lang['Currently']              = 'Gegenwärtig';
$lang['Cloudcover']             = 'Wolkendecke';
//Notifications
$lang['Nocurrentalert']         = 'Keine aktuellen Hinweise';
$lang['Windalert']              = 'Windböen bis';
$lang['Tempalert']              = 'steigende Temperaturen';
$lang['Heatindexalert']         = 'steigender Wärmeindex';
$lang['Windchillalert']         = 'es ist gefühlt frisch';
$lang['Dewpointalert']          = 'unangenehme Feuchtigkeit';
$lang['Dewpointcolderalert']    = 'es ist gefühlt kälter';
$lang['Feelslikecolderalert']   = 'es ist gefühlt kälter';
$lang['Feelslikewarmeralert']   = 'es ist gefühlt wärmer';
$lang['Rainratealert']          = 'per/hr<span> Regen möglich ';
//Earthquake Notifications
$lang['Regional']               = 'Regional Erdbeben';
$lang['Significant']            = 'Bedeutende Erdbeben';
$lang['Nosignificant']          = 'keine bedeutende Erdbeben';
//Main page
$lang['Barometer']              = 'Barometer';
$lang['UVSOLAR']                = 'UV | Solar';
$lang['Earthquake']             = 'Erdbebendaten';
$lang['Daynight']               = 'Tageslicht & Nacht Info';
$lang['SunPosition']            = 'Sun Position';
$lang['Location']               = 'Position ';
$lang['Hardware']               = 'Hardware';
$lang['Rainfalltoday']          = 'Regen heute';
$lang['Windspeed']              = 'Windspeed';
$lang['Winddirection']          = 'Windrichtung';
$lang['Measured']               = 'Gemessen heute';
$lang['Forecast']               = 'Prognose';
$lang['Forecastahead']          = 'Prognose 10 Tage';
$lang['Forecastsummary']        = 'Prognose  Heute';
$lang['WindGust']               = 'Windspeed | Böen';
$lang['Hourlyforecast']         = 'Stündliche Prognose ';
$lang['Significantearthquake']  = 'Bedeutende Erdbeben';
$lang['Regionalearthquake']     = 'Regionale Erdbeben';
$lang['Average']                = 'Durchschnitt';
$lang['Notifications']          = 'Benachrichtigungen';
$lang['Indoor']                 = 'Innen';
$lang['Today']                  = 'Heute';
$lang['Tomorrow']               = 'Morgen';
$lang['Tonight']                = 'Nacht';
$lang['Tomorrownight']          = 'Morgen Nacht';
$lang['Updated']                = 'Updated';
$lang['Meteor']                 = 'Meteor Shower Info';
$lang['Firerisk']               = 'Feuerrisiko';
$lang['Localtime']              = 'Lokale Zeit';
$lang['Nometeor']               = 'Keine Meteor Showers';
$lang['LiveWebCam']             = 'Live Web Cam';
$lang['Online']                 = 'Online';
$lang['Offline']                = 'Offline';
$lang['Weatherstation']         = 'Wetterstation';
$lang['Cloudbase']              = 'Wolkenuntergrenze';
$lang['uvalert']                = 'UVINDEX Alarm';
$lang['Max']                    = 'Max';
$lang['Min']                    = 'Min';
//earthquake TOP MODULE 10 July 2017
$lang['MicroE']                  = 'Kleines Erdbeeben';
$lang['MinorE']                  = 'Geringes Erdbeeben';
$lang['LightE']                  = 'Leichtes Erdbeeben';
$lang['ModerateE']               = 'Moderate Erdbeeben';
$lang['StrongE']                 = 'Starkes Erdbeeben';
$lang['MajorE']                  = 'Schwerses Erdbeeben';
$lang['GreatE']                  = 'Grosses Erdbeeben';
$lang['RegionalE']              = 'Regional';
$lang['Conditions']             = 'Bedingungen';
$lang['Cloudbase Height']       = 'Wolkenbasishöhe';
$lang['Station']                = 'Station';
$lang['Detailed Forecast']      = 'Detaillierte Prognose';
$lang['Summary Outlook']        = 'Zusammenfassung Ausblick';
//Air Quality
$lang['Hazordous']              = 'Gefährlich Luftqualität';
$lang['VeryUnhealthy']          = 'Sehr ungesund Luftqualität';
$lang['Unhealthy']              = 'Ungesund Luftqualität';
$lang['UnhealthyFS']            = 'Für einige ungesund';
$lang['Moderate']               = 'Mäßige Luftqualität';
$lang['Good']                   = 'Gute Luftqualität';
#notification additions
$lang['notifyTitle']             = 'Wetterstationshinweis';
$lang['notifyAlert']             = "Alarm";
$lang['notifyLowBatteryAlert']   = "Niedrige Batterie";
$lang['notifyConsoleLowBattery'] = "Die Batterie der Konsole ist schwach";
$lang['notifyStationLowBattery'] = "Die Batterie der Station ist schwach";
$lang['notifyUVIndex']           = "UV-Index";
$lang['notifyUVExposure']        = "Reduzieren Sie die Sonneneinstrahlung";
$lang['notifyHeatExaustion']     = "Hitzeerschöpfung";
$lang['notifyExtremeWind']       = "Warnung vor extremem Wind";
$lang['notifyGustUpTo']          = "Böen bis zu";
$lang['notifySeekShelter']       = "<notifyred><b>sofort</b></notifyred> Schutz suchen";
$lang['notifyHighWindWarning']   = "Warnung vor starkem Wind";
$lang['notifySustainedAvg']      = "Anhaltender Durchschn.";
$lang['notifyWindAdvisory']      = "Windmeldung";
$lang['notifyFreezing']          = "Unter Gefrierpunkt";
?>
