<?php
/* 
-----------------
Language Translation File for HOMEWEATHERSTATION Template
Language: Hungarian
Translated by: BRIAN UNDERDOWN
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
setlocale(LC_TIME, "hu_HU");
$lang                           = array();
// Menu
$lang['Settings']               = 'Beállítás';
$lang['Layout']                 = 'Az elrendezés változtatása';
$lang['Lighttheme']             = 'Light Theme';
$lang['Darktheme']              = 'Dark Theme';
$lang['Nonmetric']              = 'US (F) ';
$lang['Metric']                 = 'Metric (C)';
$lang['UKmetric']               = 'UK (MPH - Metric) ';
$lang['Scandinavia']            = 'Scandinavia(M/S)';
$lang['Worldwideearthquakes']   = 'Földrengések világszerte';
$lang['Toggle']                 = 'Teljes Képernyő ';
$lang['Contactinfo']            = 'Station & Kapcsolat';
$lang['Templateinfo']           = 'Template Info';
$lang['language']               = 'Nyelv válaszás';
$lang['Weatherstationinfo']     = 'Weather Station Info';
$lang['Webdesigninfo']          = 'Weboldal infó';
$lang['Contact']                = 'Kapcsolat';
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
$lang['Temperature']            = 'Hőmérséklet';
$lang['Feelslike']              = 'Feels';
$lang['Humidity']               = 'Páratartalom';
$lang['Dewpoint']               = 'Harmatpont';
$lang['Trend']                  = 'trend ';
$lang['Heatindex']              = 'Hő index';
$lang['Windchill']              = 'Szélhűtés ';
$lang['Tempfactors']            = 'Hőfok tényezők';
$lang['Nocautions']             = 'Nincs figyelmeztetés';
$lang['Wetbulb']                = 'Harmat';
$lang['dry']                    = '& Száraz';
$lang['verydry']                = '& Nagyon száraz';
//new feature temperature feels
$lang['FreezingCold']           = 'Dermesztő hideg';
$lang['FeelingVeryCold']        = 'Nagyon hideg';
$lang['FeelingCold']            = 'Hideg';
$lang['FeelingCool']            = 'Hüvös';
$lang['FeelingComfortable']     = 'Komfortos';
$lang['FeelingWarm']            = 'Langyos';
$lang['FeelingHot']             = 'Meleg';
$lang['FeelingUncomfortable']   = 'Kánikula';
$lang['FeelingVeryHot']         = 'Forróság';
$lang['FeelingExtremelyHot']    = 'Extrém meleg';
//wind
$lang['Windspeed']              = 'Szélsebesség';
$lang['Gust']                   = 'Széllökés';
$lang['Direction']              = 'Szélrány';
$lang['Gusting']                = 'Gusting at';
$lang['Blowing']                = 'Blowing at';
$lang['Wind']                   = 'Szél';
$lang['Wind Run']               = 'Szélfutás';
// Wind phrases for Beaufort scale for windspeed area
$lang['Calm']                   = 'Szélcsend';
$lang['Lightair']               = 'Alig érezhető szellő.';
$lang['Lightbreeze']            = 'Könnyű szellő. ';
$lang['Gentelbreeze']           = 'Gyenge szél.';
$lang['Moderatebreeze']         = 'Mérsékelt szél.';
$lang['Freshbreeze']            = 'Élénk szél.';
$lang['Strongbreeze']           = 'Erős szél.';
$lang['Neargale']               = 'Igen erős szél.';
$lang['Galeforce']              = 'Viharos szél.';
$lang['Stronggale']             = 'Vihar';
$lang['Storm']                  = 'Orkán';
$lang['Violentstorm']           = 'Szélvész';
$lang['Hurricane']              = 'Hurrikán';
// Wind phrases from Beaufort scale for current conditions area
$lang['CalmConditions']         = 'Szélcsend';
$lang['LightBreezeattimes']     = 'Alig érezhető szellő ';
$lang['MildBreezeattimes']      = 'Könnyű szellő ';
$lang['ModerateBreezeattimes']  = 'Gyenge szél';
$lang['FreshBreezeattimes']     = 'Mérsékelt szél';
$lang['StrongBreezeattimes']    = 'Élénk szél.';
$lang['NearGaleattimes']        = 'Erős szél';
$lang['GaleForceattimes']       = 'Igen erős szél';
$lang['StrongGaleattimes']      = 'Viharos szél';
$lang['StormConditions']        = 'Szélvihar';
$lang['ViolentStormConditions'] = 'Orkán';
$lang['HurricaneConditions']    = 'Hurrikán';
$lang['Avg']                    = '<span2> ÁTLAG: </span2>';
//wind direction compass
$lang['Northdir']               = ' <span>Észak<br></span>';
$lang['NNEdir']                 = 'Észak Észak <br><span>Kelet</span>';
$lang['NEdir']                  = 'Észak <span> Kelet<br></span>';
$lang['ENEdir']                 = 'Kelet Észak<br><span>Kelet</span>';
$lang['Eastdir']                = " <span> Kelet<br></span>";
$lang['ESEdir']                 = 'Kelet Dél<br><span>Kelet</span>';
$lang['SEdir']                  = 'Dél <span> Kelet</span>';
$lang['SSEdir']                 = 'Dél Dél<br><span>Kelet</span>';
$lang['Southdir']               = ' <span> Dél</span>';
$lang['SSWdir']                 = 'Dél Dél<br><span>Nyugat</span>';
$lang['SWdir']                  = 'Dél <span> Nyugat</span>';
$lang['WSWdir']                 = 'Nyugat Dél<br><span>Nyugat</span>';
$lang['Westdir']                = ' <span> Nyugati</span>';
$lang['WNWdir']                 = 'Nyugat Észak<br><span>Nyugat</span>';
$lang['NWdir']                  = 'Észak <span> Nyugat</span>';
$lang['NWNdir']                 = 'Észak Észak<br><span>Nyugat</span>';
//wind direction avg
$lang['North']                  = 'Észak';
$lang['NNE']                    = 'ÉÉK';
$lang['NE']                     = 'ÉK';
$lang['ENE']                    = 'KÉK';
$lang['East']                   = 'Keleti ';
$lang['ESE']                    = 'KDK';
$lang['SE']                     = 'DK';
$lang['SSE']                    = 'DDK';
$lang['South']                  = 'Déli';
$lang['SSW']                    = 'DDNY';
$lang['SW']                     = 'DNY';
$lang['WSW']                    = 'NyDNy';
$lang['West']                   = 'Nyugati';
$lang['WNW']                    = 'NYÉNY';
$lang['NW']                     = 'ÉNY';
$lang['NWN']                    = 'ÉÉNY';
//rain
$lang['raintoday']              = 'Eső ma';
$lang['Rate']                   = 'Arány';
$lang['Rainfall']               = 'Csapadék';
$lang['Precip']                 = 'precip'; // must be short name do not use full precipatation !!!! ///
$lang['Rain']                   = 'Eső';
$lang['Heavyrain']              = 'Zápor eső';
$lang['Flooding']               = 'Árvíz lehetséges';
$lang['Rainbow']                = 'Szivárvány';
$lang['Windy']                  = 'Szeles';
//sun -moon-daylight-darkness
$lang['Sun']                    = 'Nap';
$lang['Moon']                   = 'Hold';
$lang['Sunrise']                = 'Napkelte';
$lang['Sunset']                 = 'Napnyugta';
$lang['Moonrise']               = 'Holdkelte ';
$lang['Moonset']                = 'Holdnyugta';
$lang['Night']                  = 'Éjszaka ';
$lang['Day']                    = 'Nappal';
$lang['Nextnewmoon']            = 'Következő újhold';
$lang['Nextfullmoon']           = 'Következő telihold';
$lang['Luminance']              = 'Fénysűrűség';
$lang['Moonphase']              = 'Holdnaptár';
$lang['Estimated']              = 'Becsült';
$lang['Daylight']               = 'Nappal';
$lang['Darkness']               = 'Éjszaka';
$lang['Daysold']                = 'Days Old';
$lang['Belowhorizon']           = 'horizont<br>alatt';
$lang['Mintill']                = ' mins till';
$lang['Till']                   = 'Till ';
$lang['Minago']                 = ' perccel ezelőtt';
$lang['Hrs']                    = ' óra';
$lang['Min']                    = ' perc';
$lang['TotalDarkness']          = 'Teljes sötétség';
$lang['TotalDaylight']          = 'Teljes napfény';
$lang['Below']                  = 'a horizont alatt van';
$lang['Newmoon']                = 'Új Hold';
$lang['Waxingcrescent']         = 'Növekvő Hold';
$lang['Firstquarter']           = 'Első negyed';
$lang['Waxinggibbous']          = 'Növekvő háromnegyed Hold';
$lang['Fullmoon']               = 'Telihold';
$lang['Waninggibbous']          = ' Csökkenő háromnegyed Hold ';
$lang['Lastquarter']            = 'Csökkenő negyed Hold';
$lang['Waningcrescent']         = 'Csökkenő félhold';
//trends
$lang['Falling']                = 'Esik';
$lang['Rising']                 = 'Emelkedik';
$lang['Steady']                 = 'Állandó';
$lang['Rapidly']                = 'Gyorsan';
$lang['Temp']                   = 'Hőmérséklet';
//Solar-UV
//uv
$lang['Nocaution']              = 'Nincs<color>káros</color> sugárzás';
$lang['Wearsunglasses']         = 'Viseljen <color>napszemüveget</color> a napon';
$lang['Stayinshade']            = 'Maradjon az árnyékban délben, amikor a  <color>napsugárzás</color> legerősebb';
$lang['Reducetime']             = 'Csökkentse a <color>napon</color> töltött időt  10-és 16 óra között ';
$lang['Minimize']               = 'Minimizálja a <color>napon</color> töltött időt 10-től 16 óráig ';
$lang['Trytoavoid']             = 'Próbáljon <color>sun</color> árnyékban maradni 10től-16ig ';
//solar
$lang['Poor']                   = 'Gyenge<color> <br>napsugárzás</color>';
$lang['Low']                    = 'Alacsony <br><color>napsugárzás</color>';
$lang['Moderate']               = 'Komfortos <br><color>napsugárzás</color>';
$lang['Good']                   = 'Kellemes<br><color>napsugárzás</color>';
$lang['Solarradiation']         = 'Napsugárzás';
//current sky
$lang['Currentsky']             = 'Jelenlegi időjárás';
$lang['Currently']              = 'Jelenleg';
$lang['Cloudcover']             = 'Felhős';
//Notifications
$lang['Nocurrentalert']         = 'Nincs <span>Veszély</span>';
$lang['Windalert']              = 'Széllökés';
$lang['Tempalert']              = 'Magas hőmérséklet';
$lang['Heatindexalert']         = 'Hőindex figyelmeztetés';
$lang['Windchillalert']         = 'Hideg érzet figyelmeztetés';
$lang['Dewpointalert']          = 'Magas páratartalom';
$lang['Dewpointcolderalert']    = 'Dewpoint Caution';
$lang['Feelslikecolderalert']   = 'Hidegebb';
$lang['Feelslikewarmeralert']   = 'Melegebb';
$lang['Rainratealert']          = 'per/hr<span> Felhőszakadás ';
//Earthquake Notifications
$lang['Regional']               = 'Regionális földrengés';
$lang['Significant']            = 'Jelentős földrengés';
$lang['Nosignificant']          = 'Nincs jelentős földrengés';
//Main page
$lang['Barometer']              = 'Légnyomás';
$lang['UVSOLAR']                = 'UVI-Solár';
$lang['Earthquake']             = 'Földrengés';
$lang['Daynight']               = 'Nappali és éjszakai információk';
$lang['SunPosition']            = 'Nap pozició';
$lang['Location']               = 'Lokáció';
$lang['Hardware']               = 'Hardware';
$lang['Rainfalltoday']          = 'Eső ma';
$lang['Windspeed']              = 'Szél';
$lang['Winddirection']          = 'Szélirány';
$lang['Measured']               = 'Mért';
$lang['Forecast']               = 'Előrejelzés';
$lang['Forecastahead']          = 'Előrejelzés';
$lang['Forecastsummary']        = 'Előrejelzés összefoglaló';
$lang['WindGust']               = 'Szélsebesség | Lökés';
$lang['Hourlyforecast']         = 'Órás előrejelzés ';
$lang['Significantearthquake']  = 'Significant Earthquake';
$lang['Regionalearthquake']     = 'Regionális Villám';
$lang['Average']                = 'Átlag';
$lang['Notifications']          = 'Időjárás <span>Riasztás</span>';
$lang['Indoor']                 = 'Benti';
$lang['Today']                  = 'Ma';
$lang['Tonight']                = 'Ma este';
$lang['Tomorrow']               = 'Holnap';
$lang['Tomorrownight']          = 'Holnap este';
$lang['Updated']                = 'Frissítve';
$lang['Meteor']                 = 'Meteor adatok';
$lang['Firerisk']               = 'Tűzveszély';
$lang['Localtime']              = 'Lokális <span2>idő</span2>';
$lang['Nometeor']               = 'Nincs meteor veszély';
$lang['LiveWebCam']             = 'Élő Web Cam';
$lang['Online']                 = 'Kapcsolódva';
$lang['Offline']                = 'Nem kapcsolódik';
$lang['Weatherstation']         = 'Időjárás állomás';
$lang['Cloudbase']              = 'Felhőmagasság';
$lang['uvalert']                = 'Extrém magas UV';
$lang['Max']                    = 'Max';
$lang['Min']                    = 'Min';
//earthquake TOP MODULE 10 July 2017

$lang['MicroE']                  = 'Micro Earthquake';
$lang['MinorE']                  = 'Kis földrengés';
$lang['LightE']                  = 'Light Earthquake';
$lang['ModerateE']               = 'Mérsékelt földrengés';
$lang['StrongE']                 = 'Erős földrengés';
$lang['MajorE']                  = 'Major Earthquake';
$lang['GreatE']                  = 'Great Earthquake';
$lang['RegionalE']               = 'Regionális';
$lang['Conditions']              = 'Körülmények';
$lang['Cloudbase Height']        = 'Felhőalap magasság';
$lang['Station']                 = 'Állomás';
$lang['Detailed Forecast']       = 'Részletes előrejelzés';
$lang['Summary Outlook']         = 'Összefoglalás';
//Air Quality
$lang['Hazordous']               = 'Veszélyes körülmények';
$lang['VeryUnhealthy']           = 'Nagyon egészségtelen';
$lang['Unhealthy']               = 'Egészségtelen levegőminőség';
$lang['UnhealthyFS']             = 'Néhány helyen egészségtelen';
$lang['Moderate']                = 'Mérsékelt levegőminőség';
$lang['Good']                    = 'Egészséges levegőminőség ';
#notification additions
$lang['notifyTitle']             = 'Értesítések';
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