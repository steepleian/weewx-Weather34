<?php
/* 
-----------------
Language Translation File for HOMEWEATHERSTATION Template
Language: Polish
Translated by : Alicjusz Febuary 8th 2017
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
setlocale(LC_TIME, 'pl_PL.UTF-8');
$lang                           = array();
// Menu
$lang['Settings']               = 'Ustawienia';
$lang['Layout']                 = 'Zmień Wygląd';
$lang['Lighttheme']             = 'Jasny';
$lang['Darktheme']              = 'Ciemny';
$lang['Nonmetric']              = 'US (F) ';
$lang['Metric']                 = 'Metryczny (C)';
$lang['UKmetric']               = 'UK (MPH - Metric) ';
$lang['Scandinavia']            = 'Scandinavia(M/S)';
$lang['Worldwideearthquakes']   = 'Światowa Sieć Trzęsień Ziemi';
$lang['Toggle']                 = 'Pełen Ekran ';
$lang['Contactinfo']            = 'Informacje o Stronie i Kontakt';
$lang['Templateinfo']           = 'Contributors';
$lang['language']               = 'Wybór Języka';
$lang['Weatherstationinfo']     = 'Informacja o Stacji Pogodowej';
$lang['Webdesigninfo']          = 'Informacje o aplikacji';
$lang['Contact']                = 'Kontakt';
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
$lang['Feelslike']              = 'Odczuwalna';
$lang['Humidity']               = 'Wilgotność';
$lang['Dewpoint']               = 'Punkt Rosy';
$lang['Trend']                  = 'Trend ';
$lang['Heatindex']              = 'Index Gorąca';
$lang['Windchill']              = 'Czynnik Wiatru ';
$lang['Tempfactors']            = 'Czynniki';
$lang['Nocautions']             = 'Brak Ostrzeżeń';
$lang['Wetbulb']                = 'Temperatura Mokrego Termometru';
$lang['dry']                    = '& Sucho';
$lang['verydry']                = '& Bardzo Sucho';
//new feature temperature feels
$lang['FreezingCold']           = 'Mroźnie';
$lang['FeelingVeryCold']        = 'Bardzo zimno';
$lang['FeelingCold']            = 'Zimno';
$lang['FeelingCool']            = 'Chłodno';
$lang['FeelingComfortable']     = 'Komfortowo ';
$lang['FeelingWarm']            = 'Ciepło';
$lang['FeelingHot']             = 'Gorąco';
$lang['FeelingUncomfortable']   = 'Niekomfortowo';
$lang['FeelingVeryHot']         = 'Bardzo Gorąco';
$lang['FeelingExtremelyHot']    = 'Upalnie';
//wind
$lang['Windspeed']              = 'Prędkość Wiatru';
$lang['Gust']                   = 'Porywy';
$lang['Direction']              = 'Kierunek';
$lang['Gusting']                = 'W porywach';
$lang['Blowing']                = 'W podmuchach';
$lang['Wind']                   = 'Wiatr';
$lang['Wind Run']               = 'Wiatr Run';
// Wind phrases for Beaufort scale for windspeed area
$lang['Calm']                   = 'Cisza';
$lang['Lightair']               = 'Lekkie powiewy';
$lang['Lightbreeze']            = 'Słaby wiatr ';
$lang['Gentelbreeze']           = 'Łagodny wiatr';
$lang['Moderatebreeze']         = 'Umiarkowany wiatr';
$lang['Freshbreeze']            = 'Żywszy wiatr';
$lang['Strongbreeze']           = 'Silny wiatr';
$lang['Neargale']               = 'Bardzo silny wiatr';
$lang['Galeforce']              = 'Sztorm';
$lang['Stronggale']             = 'Silny sztorm';
$lang['Storm']                  = 'Bardzo silny sztorm';
$lang['Violentstorm']           = 'Gwałtowny sztorm';
$lang['Hurricane']              = 'Huragan';
// Wind phrases from Beaufort scale for current conditions area
$lang['CalmConditions']         = 'Cisza';
$lang['LightBreezeattimes']     = 'Chwilami Słaby wiatr ';
$lang['MildBreezeattimes']      = 'Chwilami łagodny wiatr ';
$lang['ModerateBreezeattimes']  = 'Chwilami umiarkowany wiatr';
$lang['FreshBreezeattimes']     = 'Chwilami żywszy wiatr';
$lang['StrongBreezeattimes']    = 'Chwilami silny wiatr';
$lang['NearGaleattimes']        = 'Chwilami bardzo silny wiatr';
$lang['GaleForceattimes']       = 'Chwilami sztorm';
$lang['StrongGaleattimes']      = 'Chwilami silny sztorm';
$lang['StormConditions']        = 'Chwilami Bardzo silny sztorm';
$lang['ViolentStormConditions'] = 'Chwilami Gwałtowny sztorm';
$lang['HurricaneConditions']    = 'Chwilami Huragan';
$lang['Avg']                    = '<span2> Avg: </span2>';
//wind direction compass
$lang['Northdir']               = 'Na <br><span>Północ<br></span>';
$lang['NNEdir']                 = 'Płn./Północny <br><span>Wschód</span>';
$lang['NEdir']                  = 'Północny <span><br> Wschód<br></span>';
$lang['ENEdir']                 = 'Wsch./ Północny<br><span>Wschód</span>';
$lang['Eastdir']                = "Na <span><br> Wschód<br></span>";
$lang['ESEdir']                 = 'Wsch./Południowy<br><span>Wschód</span>';
$lang['SEdir']                  = 'Południowy <span><br> Wschód</span>';
$lang['SSEdir']                 = 'Płd./Południowy<br><span>Wschód</span>';
$lang['Southdir']               = 'Na  <span><br> Południe</span>';
$lang['SSWdir']                 = 'Płd./Południowy<br><span>Zachód</span>';
$lang['SWdir']                  = 'Południowy <span> <br>Zachód</span>';
$lang['WSWdir']                 = 'Zach./Południowy<br><span>Zachód</span>';
$lang['Westdir']                = 'Na <span><br> Zachód</span>';
$lang['WNWdir']                 = 'Zach./Północny<br><span>Zachód</span>';
$lang['NWdir']                  = 'Północny <span> Zachód</span>';
$lang['NWNdir']                 = 'Płn./Północny<br><span>Zachód</span>';
//wind direction avg
$lang['North']                  = 'Północ';
$lang['NNE']                    = 'NNE';
$lang['NE']                     = 'NE';
$lang['ENE']                    = 'ENE';
$lang['East']                   = 'Wschód ';
$lang['ESE']                    = 'ESE';
$lang['SE']                     = 'SE';
$lang['SSE']                    = 'SSE';
$lang['South']                  = 'Południe';
$lang['SSW']                    = 'SSW';
$lang['SW']                     = 'SW';
$lang['WSW']                    = 'WSW';
$lang['West']                   = 'Zachód';
$lang['WNW']                    = 'WNW';
$lang['NW']                     = 'NW';
$lang['NWN']                    = 'NWN';
//rain
$lang['raintoday']              = 'Dzisiejsze opady deszczu';
$lang['Rate']                   = 'Tempo';
$lang['Rainfall']               = 'Opady Deszczu';
$lang['Precip']                 = 'precip'; // must be short name do not use full precipatation !!!! ///
$lang['Rain']                   = 'Deszcz';
$lang['Heavyrain']              = 'Silny deszcz';
$lang['Flooding']               = 'Możliwa powódź';
$lang['Rainbow']                = 'Tęcza';
$lang['Windy']                  = 'Wietrznie';
//sun -moon-daylight-darkness
$lang['Sun']                    = 'Słońce';
$lang['Moon']                   = 'Księżyc';
$lang['Sunrise']                = 'Wschód Słońca';
$lang['Sunset']                 = 'Zachód Słońca';
$lang['Moonrise']               = 'Wschód Księżyca ';
$lang['Moonset']                = 'Zachód Księżyca';
$lang['Night']                  = 'Noc ';
$lang['Day']                    = 'Dzień';
$lang['Nextnewmoon']            = 'Następny Nów';
$lang['Nextfullmoon']           = 'Następna Pełnia';
$lang['Luminance']              = 'Luminance';
$lang['Moonphase']              = 'Faza Księżyca';
$lang['Estimated']              = 'Szacunkowo';
$lang['Daylight']               = 'Dzień';
$lang['Darkness']               = 'Noc';
$lang['Daysold']                = 'Days Old';
$lang['Belowhorizon']           = 'poniżej<br>horyzontu';
$lang['Mintill']                = '<br>min. dopóki';
$lang['Till']                   = 'Till ';
$lang['Minago']                 = 'min. temu';
$lang['Hrs']                    = ' godz.';
$lang['Min']                    = ' min.';
$lang['TotalDarkness']          = 'Ogólnie noc';
$lang['TotalDaylight']          = 'Ogólnie dzień';
$lang['Below']                  = 'jest poniżej horyzontu';
$lang['Newmoon']                = 'Nów';
$lang['Waxingcrescent']         = 'Przybywający Sierp';
$lang['Firstquarter']           = 'Pierwsza Kwadra';
$lang['Waxinggibbous']          = 'Przybywający Garb';
$lang['Fullmoon']               = 'Pełnia';
$lang['Waninggibbous']          = 'Ubywający Garb';
$lang['Lastquarter']            = 'Ostatnia Kwadra';
$lang['Waningcrescent']         = 'Ubywający Sierp';
//trends
$lang['Falling']                = 'Spada';
$lang['Rising']                 = 'Rośnie';
$lang['Steady']                 = 'Stała';
$lang['Rapidly']                = 'Szybko';
$lang['Temp']                   = 'Temp';
//Solar-UV
//uv
$lang['Nocaution']              = 'Nie potrzeba <color>zabezpieczeń.</color> ';
$lang['Wearsunglasses']         = 'Załóż <color>okulary przeciwsłoneczne.</color> ';
$lang['Stayinshade']            = 'przebywaj w cieniu gdy <color>słońce</color> jest najsilniejsze';
$lang['Reducetime']             = 'Zredukuj czas przebywania w  <color>słońcu</color> pomiędzy godziną 10-16 ';
$lang['Minimize']               = 'Zminimalizuj czas przebywania w  <color>słońcu</color> pomiędzy godziną 10-16 ';
$lang['Trytoavoid']             = 'Postaraj się unikać <color>słońca</color> pomiędzy godziną 10-16 ';
//solar
$lang['Poor']                   = 'Słabe <color> <br>Promieniowanie</color>';
$lang['Low']                    = 'Niskie <br><color>Promieniowanie</color>';
$lang['Moderate']               = 'Umiarkowane <br><color>Promieniowanie</color>';
$lang['Good']                   = 'Dobre <br><color>Promieniowanie</color>';
$lang['Solarradiation']         = 'Promieniowanie Słoneczne';
//current sky
$lang['Currentsky']             = 'Obecne warunki';
$lang['Currently']              = 'Obecnie';
$lang['Cloudcover']             = 'Zachmurzenie';
//Notifications
$lang['Nocurrentalert']         = 'Brak powiadomień';
$lang['Windalert']              = 'Porywy Wiatru';
$lang['Tempalert']              = 'Wysoka Temperatura';
$lang['Heatindexalert']         = 'Index Gorąca';
$lang['Windchillalert']         = 'Czynnik Chłodzący Wiatru';
$lang['Dewpointalert']          = 'Niekomfortowa wilgotność';
$lang['Dewpointcolderalert']    = 'Punkt rosy odczucie zimna';
$lang['Feelslikecolderalert']   = 'Odczucie Ciepła';
$lang['Feelslikewarmeralert']   = 'Odczucie gorąca';
$lang['Rainratealert']          = 'przez /hr spadło <span> deszczu ';
//Earthquake Notifications
$lang['Regional']               = 'Trzęsienie Regionalne';
$lang['Significant']            = 'Znaczne Trzęsienie';
$lang['Nosignificant']          = 'Brak istotnych Trzęsień';
//Main page
$lang['Barometer']              = 'Barometr';
$lang['UVSOLAR']                = 'UV | Dane Słoneczne';
$lang['Earthquake']             = 'Dane o Trzęsieniach Ziemi';
$lang['Daynight']               = 'Dzień i Noc Info';
$lang['SunPosition']            = 'Sun Position';
$lang['Location']               = 'Lokalizacja ';
$lang['Hardware']               = 'Sprzęt';
$lang['Rainfalltoday']          = 'Opady Dzisiaj';
$lang['Windspeed']              = 'Prędkość Wiatru';
$lang['Winddirection']          = 'Kierunek Wiatru';
$lang['Measured']               = 'Mierzone Dzisiaj';
$lang['Forecast']               = 'Prognoza';
$lang['Forecastahead']          = 'Prognoza 10-cio dniowa';
$lang['Forecastsummary']        = 'Prognoza';
$lang['WindGust']               = 'Predkość Wiatru | Podmuchy';
$lang['Hourlyforecast']         = 'Progn. Godz. ';
$lang['Significantearthquake']  = 'Znaczne Trzęsienie';
$lang['Regionalearthquake']     = 'Regionalne Trzęsienie';
$lang['Average']                = 'Średnie';
$lang['Notifications']          = 'Powiadomienia';
$lang['Indoor']                 = 'Wewnatrz';
$lang['Today']                  = 'Dzisiaj';
$lang['Tonight']                = 'Wieczorem';
$lang['Tomorrow']               = 'Jutro';
$lang['Tomorrownight']          = 'Jutro Wieczorem';
$lang['Updated']                = 'Aktualizacja';
$lang['Meteor']                 = 'Roje Meteorów';
$lang['Firerisk']               = 'Ryzyko Pożaru';
$lang['Localtime']              = 'Czas Lokalny';
$lang['Nometeor']               = 'Brak widocznych rojów meteorów';
$lang['LiveWebCam']             = 'Live Web Cam';
$lang['Online']                 = 'Online';
$lang['Offline']                = 'Offline';
$lang['Weatherstation']         = 'Stacja Pogodowa ';
$lang['Cloudbase']              = 'Podstawa chmur';
$lang['uvalert']                = 'Uwaga wysoki index UV';
$lang['Max']                    = 'Max';
$lang['Min']                    = 'Min';
//earthquake TOP MODULE 10 July 2017
$lang['MicroE']                  = 'Micro Earthquake';
$lang['MinorE']                  = 'Małe Trzęsienie';
$lang['LightE']                  = 'Light Earthquake';
$lang['ModerateE']               = 'Średnie Trzęsienie';
$lang['StrongE']                 = 'Silne Trzęsienie';
$lang['MajorE']                  = 'Major Earthquake';
$lang['GreatE']                  = 'Great Earthquake';
$lang['RegionalE']              = 'Regionalnie';
$lang['Conditions']             = 'Warunki';
$lang['Cloudbase Height']       = 'Podstawa chmurt';
$lang['Station']                = 'Stacja';
$lang['Detailed Forecast']      = 'Szczegółowa Prognoza';
$lang['Summary Outlook']        = 'Podsumowanie';
//Air Quality
$lang['Hazordous']              = 'Hazardous Conditions';
$lang['VeryUnhealthy']          = 'Very Unhealthy';
$lang['Unhealthy']              = 'Unhealthy Air Quality';
$lang['UnhealthyFS']            = 'Unhealthy For Some';
$lang['Moderate']               = 'Moderate Air Quality ';
$lang['Good']                   = 'Good Air Quality ';
#notification additions
$lang['notifyTitle']            = 'Powiadomienia';
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