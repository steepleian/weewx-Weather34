<?php
/* 
-----------------
Language Translation File for HOMEWEATHERSTATION Template
Language: Catalan
Translated by: Santgenismeteo
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
setlocale(LC_TIME, "ca_ES");
$lang                           = array();
// Menu
$lang['Settings']               = 'Ajustos';
$lang['Layout']                 = 'Cambiar tema';
$lang['Lighttheme']             = 'Tema clar';
$lang['Darktheme']              = 'Tema fosc';
$lang['Nonmetric']              = 'US (F) ';
$lang['Metric']                 = 'Metric (C)';
$lang['UKmetric']               = 'UK (MPH - Metric) ';
$lang['Scandinavia']            = 'Scandinavia(M/S)';
$lang['Worldwideearthquakes']   = 'Terratrèmols al mon';
$lang['Toggle']                 = 'Canviar a pantalla completa';
$lang['Contactinfo']            = 'Estació & Contacte Info';
$lang['Templateinfo']           = 'Col·laboradors';
$lang['language']               = 'Select Language';
$lang['Weatherstationinfo']     = 'Estació Informació';
$lang['Webdesigninfo']          = 'plantilla Informació';
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
$lang['Temperature']            = 'Temperatura';
$lang['Feelslike']              = 'Sensació';
$lang['Humidity']               = 'humitat';
$lang['Dewpoint']               = 'Punt de rosada';
$lang['Trend']                  = 'Tend';
$lang['Heatindex']              = 'índex de calor';
$lang['Windchill']              = 'Sensació';
$lang['Tempfactors']            = 'Factor de temp';
$lang['Nocautions']             = 'no hi ha precaucions';
$lang['Wetbulb']                = 'T. condensació';
$lang['dry']                    = '& Sec';
$lang['verydry']                = '& Molt sec';
//new feature temperature feels
$lang['FreezingCold']           = 'Fred gelat';
$lang['FeelingVeryCold']        = 'Sensació molt freda';
$lang['FeelingCold']            = 'Sensació de fred';
$lang['FeelingCool']            = 'Sensació de fred';
$lang['FeelingComfortable']     = 'Sensació còmoda ';
$lang['FeelingWarm']            = 'Sensació de calor';
$lang['FeelingHot']             = 'Sensació de calor';
$lang['FeelingUncomfortable']   = 'Sensació incòmoda';
$lang['FeelingVeryHot']         = 'Sensació molta calor';
$lang['FeelingExtremelyHot']    = 'Molta calor';
//wind
$lang['Windspeed']              = 'Velocitat';
$lang['Gust']                   = 'Ràfega';
$lang['Direction']              = 'Direcció';
$lang['Gusting']                = 'Ratxes a';
$lang['Blowing']                = 'Bufant a';
$lang['Wind']                   = 'Vel.';
$lang['Wind Run']               = 'Vel Run';
// Wind phrases for Beaufort scale for windspeed area
$lang['Calm']                   = 'Calma';
$lang['Lightair']               = 'Vent lleuger';
$lang['Lightbreeze']            = 'Brisa lleugera';
$lang['Gentelbreeze']           = 'Brisa suau';
$lang['Moderatebreeze']         = 'Moderate Breeze';
$lang['Freshbreeze']            = 'Brisa moderada';
$lang['Strongbreeze']           = 'Brisa fresca';
$lang['Neargale']               = 'Brisa forta';
$lang['Galeforce']              = 'Vendaval';
$lang['Stronggale']             = 'Vendaval fort';
$lang['Storm']                  = 'Tempesta';
$lang['Violentstorm']           = 'Tempesta violenta';
$lang['Hurricane']              = 'Huracà';
// Wind phrases from Beaufort scale for current conditions area
$lang['CalmConditions']         = 'Calma';
$lang['LightBreezeattimes']     = 'Ventolina ';
$lang['MildBreezeattimes']      = 'Vent fluixet ';
$lang['ModerateBreezeattimes']  = 'Vent moderat';
$lang['FreshBreezeattimes']     = 'Vent fresquet';
$lang['StrongBreezeattimes']    = 'Vent fort';
$lang['NearGaleattimes']        = 'Temporal';
$lang['GaleForceattimes']       = 'Temporal fort';
$lang['StrongGaleattimes']      = 'Temporal molt fort';
$lang['StormConditions']        = 'Tempesta';
$lang['ViolentStormConditions'] = 'Tempesta violenta';
$lang['HurricaneConditions']    = 'Huracà';
$lang['Avg']                    = '<span2> Avg: </span2>';
//wind direction compass
$lang['Northdir']               = 'Del <span>Nord<br></span>';
$lang['NNEdir']                 = 'Nord Nord <br><span>Est</span>';
$lang['NEdir']                  = 'Nord <span> Est<br></span>';
$lang['ENEdir']                 = 'Est Nord<br><span>Est</span>';
$lang['Eastdir']                = "Del <span> Est<br></span>";
$lang['ESEdir']                 = 'Est South<br><span>Est</span>';
$lang['SEdir']                  = 'South <span> Est</span>';
$lang['SSEdir']                 = 'South South<br><span>Est</span>';
$lang['Southdir']               = 'Del <span> South</span>';
$lang['SSWdir']                 = 'South South<br><span>Oest</span>';
$lang['SWdir']                  = 'South <span> Oest</span>';
$lang['WSWdir']                 = 'Oest South<br><span>Oest</span>';
$lang['Westdir']                = 'Del <span> Oest</span>';
$lang['WNWdir']                 = 'Oest Nord<br><span>Oest</span>';
$lang['NWdir']                  = 'Nord <span> Oest</span>';
$lang['NWNdir']                 = 'Nord Nord<br><span>Oest</span>';
//wind direction avg
$lang['North']                  = 'Nord';
$lang['NNE']                    = 'NNE';
$lang['NE']                     = 'NE';
$lang['ENE']                    = 'ENE';
$lang['East']                   = 'Del Est';
$lang['ESE']                    = 'ESE';
$lang['SE']                     = 'SE';
$lang['SSE']                    = 'SSE';
$lang['South']                  = 'Sur';
$lang['SSW']                    = 'SSO';
$lang['SW']                     = 'SO';
$lang['WSW']                    = 'OSO';
$lang['West']                   = 'Oest';
$lang['WNW']                    = 'ONO';
$lang['NW']                     = 'NO';
$lang['NWN']                    = 'NON';
//rain
$lang['raintoday']              = 'Pluja avui';
$lang['Rate']                   = 'Intensitat';
$lang['Rainfall']               = 'Pluja';
$lang['Precip']                 = 'precip'; // must be short name do not use full precipatation !!!! ///
$lang['Rain']                   = 'Pluja';
$lang['Heavyrain']              = 'Pluja forta';
$lang['Flooding']               = 'Possibles inundacions';
$lang['Rainbow']                = 'Rainbow';
$lang['Windy']                  = 'Windy';
//sun -moon-daylight-darkness
$lang['Sun']                    = 'Sol';
$lang['Moon']                   = 'Lluna';
$lang['Sunrise']                = 'Sortida del sol';
$lang['Sunset']                 = 'Posta del sol';
$lang['Moonrise']               = 'Sortida lluna';
$lang['Moonset']                = 'Posta de lluna';
$lang['Night']                  = 'Nit ';
$lang['Day']                    = 'Dia';
$lang['Nextnewmoon']            = 'Lluna nova';
$lang['Nextfullmoon']           = 'Lluna plena';
$lang['Luminance']              = 'Iluminacio';
$lang['Moonphase']              = 'Fase llunar';
$lang['Estimated']              = 'Estimat';
$lang['Daylight']               = 'Llum de dia';
$lang['Darkness']               = 'Foscor';
$lang['Daysold']                = 'Fa Dies';
$lang['Belowhorizon']           = 'Sota de<br>horitzó';
$lang['Mintill']                = ' mins till';
$lang['Till']                   = 'Per ';
$lang['Minago']                 = ' Fa minuts';
$lang['Hrs']                    = ' hrs';
$lang['Min']                    = ' min';
$lang['TotalDarkness']          = 'Total Nit';
$lang['TotalDaylight']          = 'Total Dia';
$lang['Below']                  = 'Està per sota de l horitzó';
$lang['Newmoon']                = 'Lluna nova';
$lang['Waxingcrescent']         = 'Creixent';
$lang['Firstquarter']           = 'Quart creixent';
$lang['Waxinggibbous']          = 'Creixent';
$lang['Fullmoon']               = 'Lluna plena';
$lang['Waninggibbous']          = 'Minvant';
$lang['Lastquarter']            = 'Quart minvant';
$lang['Waningcrescent']         = 'Creixent';
//trends
$lang['Falling']                = 'Baixant';
$lang['Rising']                 = 'Pujant';
$lang['Steady']                 = 'Estable';
$lang['Rapidly']                = 'Ràpidament';
$lang['Temp']                   = 'Temp';
//Solar-UV
//uv
$lang['Nocaution']              = 'Sense <color>precaucio</color> requerida';
$lang['Wearsunglasses']         = 'Utilitza <color>ulleres de sol</color> en dies assolellats';
$lang['Stayinshade']            = 'Romandre a la ombra prop del migdia quan el <color>sol</color> és fort';
$lang['Reducetime']             = 'Redueix el temps de <color>sol</color> entre 10am-4pm ';
$lang['Minimize']               = 'Redueix exposicio al <color>sol</color> entre 10am-4pm ';
$lang['Trytoavoid']             = 'Tractar de evitar el <color>sol</color> entre 10am-4pm ';
//solar
$lang['Poor']                   = 'Radiació solar<color> <br>Pobre</color>';
$lang['Low']                    = 'Radiació solar<br><color>Baixa</color>';
$lang['Moderate']               = 'Radiació solar<br><color>Moderada</color>';
$lang['Good']                   = 'Radiació solar<br><color>Bona</color>';
$lang['Solarradiation']         = 'Radiacio Solar';
//current sky
$lang['Currentsky']             = 'Condicions actuals';
$lang['Currently']              = 'Actualment';
$lang['Cloudcover']             = 'Cobert';
//Notifications
$lang['Nocurrentalert']         = 'No hi ha alertes ';
$lang['Windalert']              = 'Ràfegues de vent a';
$lang['Tempalert']              = 'Temperatura alta';
$lang['Heatindexalert']         = 'Índex de calor Precaució ';
$lang['Windchillalert']         = 'Precaució sensació tèrmica';
$lang['Dewpointalert']          = 'Humitat incòmoda';
$lang['Dewpointcolderalert']    = 'Sensació més freda';
$lang['Feelslikecolderalert']   = 'Sensació de Fred';
$lang['Feelslikewarmeralert']   = 'Sensació de Calor';
$lang['Rainratealert']          = 'per/hr<span> Pluja ';
//Earthquake Notifications
$lang['Regional']               = 'Terratrèmol Regionals';
$lang['Significant']            = 'Terratrèmols significants';
$lang['Nosignificant']          = 'Sense terratrèmols significatius';
//Main page
$lang['Barometer']              = 'Baròmetre';
$lang['UVSOLAR']                = 'UV | Dades Solars';
$lang['Earthquake']             = 'Terratrèmols';
$lang['Daynight']               = 'Dia & Nit Info';
$lang['SunPosition']            = 'Sun Position';
$lang['Location']               = 'Ubicació ';
$lang['Hardware']               = 'Hardware';
$lang['Rainfalltoday']          = 'Pluja avui';
$lang['Windspeed']              = 'Vent';
$lang['Winddirection']          = 'Direccio Vent';
$lang['Measured']               = 'Mesurat avui';
$lang['Forecast']               = 'Previsio';
$lang['Forecastahead']          = 'Pronòstic proxim';
$lang['Forecastsummary']        = 'Resum Previsio';
$lang['WindGust']               = 'Velocitat Vent | Ràfegues';
$lang['Hourlyforecast']         = 'Previsio horaria ';
$lang['Significantearthquake']  = 'Terratremols significants';
$lang['Regionalearthquake']     = 'Terratremols regionals';
$lang['Average']                = 'Mitjana';
$lang['Notifications']          = 'Notificacio d Alerta';
$lang['Indoor']                 = 'Interior';
$lang['Today']                  = 'Avui';
$lang['Tonight']                = 'La Nit';
$lang['Tomorrow']               = 'Dema';
$lang['Tomorrownight']          = 'Demà a la nit';
$lang['Updated']                = 'Actualitzat';
$lang['Meteor']                 = 'Informació de Meteors';
$lang['Firerisk']               = 'Risc dincendis';
$lang['Localtime']              = 'Temps local';
$lang['Nometeor']               = 'Sense  meteors';
$lang['LiveWebCam']             = 'WebCam en directe';
$lang['Online']                 = 'En línia';
$lang['Offline']                = 'Desconnectat';
$lang['Weatherstation']         = 'Estacion';
$lang['Cloudbase']              = 'Base Nubols';
$lang['uvalert']                = 'Precaucion UVINDEX';
$lang['Max']                    = 'Max';
$lang['Min']                    = 'Min';
//earthquake TOP MODULE 10 July 2017
$lang['MicroE']                  = 'Micro Earthquake';
$lang['MinorE']                 = 'petit Terratrèmol';
$lang['LightE']                  = 'Light Earthquake';
$lang['ModerateE']              = 'Terratrèmol moderat';
$lang['StrongE']                = 'Terratrèmol fort';
$lang['MajorE']                  = 'Major Earthquake';
$lang['GreatE']                  = 'Great Earthquake';
$lang['RegionalE']              = 'Regional';
$lang['Conditions']             = 'Conditions';
$lang['Cloudbase Height']       = 'Base de núvols ';
$lang['Station']                = 'Estació';
$lang['Detailed Forecast']      = 'Previsió detallada';
$lang['Summary Outlook']        = 'Resum';
//Air Quality
$lang['Hazordous']              = 'Condicions perilloses';
$lang['VeryUnhealthy']          = 'Molt insalubre ';
$lang['Unhealthy']              = 'Aire Insalubre';
$lang['UnhealthyFS']            = 'Insalubre';
$lang['Moderate']               = 'Moderada qualitat del Aire ';
$lang['Good']                   = 'Bona qualitat del Aire ';
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