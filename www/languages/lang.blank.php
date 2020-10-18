<?php
/*
-----------------
Language Translation File for HOMEWEATHERSTATION Template
Language: English
Translated by: <Your Name Here>
Developed By: Lightmaster/Brian Underdown/Erik M Madsen
October/November 2016
Revised: 2019
-----------------
*/
# -----------------------------------------------------
# Day / Months do not edit
# -----------------------------------------------------
$day                             = date("l");
$day2                            = date("l", time() + 86400);
$daynum                          = date("j");
$monthtrans                      = date("F");
$year                            = date("Y");
# -----------------------------------------------------
# -----------------------------------------------------

$lang                            = array();
// Menu
$lang['Settings']                = 'Settings';
$lang['Layout']                  = 'Switch Layout';
$lang['Lighttheme']              = 'Light Theme';
$lang['Darktheme']               = 'Dark Theme';
$lang['Nonmetric']               = 'US (F) ';
$lang['Metric']                  = 'Metric (C)';
$lang['UKmetric']                = 'UK (MPH - Metric) ';
$lang['Scandinavia']             = 'Scandinavia(M/S)';
$lang['Worldwideearthquakes']    = 'World Wide Earthquakes';
$lang['Toggle']                  = 'Toggle Fullscreen ';
$lang['Contactinfo']             = 'Station & Contact Info';
$lang['Templateinfo']            = 'Template Info';
$lang['language']                = 'Select Language';
$lang['Weatherstationinfo']      = 'Weather Station Info';
$lang['Webdesigninfo']           = 'Template Info';
$lang['Contact']                 = 'Contact';
//days
$lang['Monday']                  = 'Monday';
$lang['Tuesday']                 = 'Tuesday';
$lang['Wednesday']               = 'Wednesday';
$lang['Thursday']                = 'Thursday';
$lang['Friday']                  = 'Friday ';
$lang['Saturday']                = 'Saturday';
$lang['Sunday']                  = 'Sunday';
//months
$lang['January']                 = 'January';
$lang['Febuary']                 = 'Febuary';
$lang['March']                   = 'March';
$lang['April']                   = 'April';
$lang['May']                     = 'May';
$lang['June']                    = 'June';
$lang['July']                    = 'July';
$lang['August']                  = 'August';
$lang['September']               = 'September';
$lang['October']                 = 'October';
$lang['November']                = 'November';
$lang['December']                = 'December';
//temperature
$lang['Temperature']             = 'Temperature';
$lang['Feelslike']               = 'Feels';
$lang['Humidity']                = 'Humidity';
$lang['Dewpoint']                = 'Dewpoint';
$lang['Trend']                   = 'trend ';
$lang['Heatindex']               = 'Heat Index';
$lang['Windchill']               = 'Windchill ';
$lang['Tempfactors']             = 'Temp Factors';
$lang['Nocautions']              = 'No Cautions';
$lang['Wetbulb']                 = 'Wet Bulb';
$lang['dry']                     = '& Dry';
$lang['verydry']                 = '& Very Dry';
//new feature temperature feels
$lang['FreezingCold']            = 'Freezing';
$lang['FeelingVeryCold']         = 'Very Cold';
$lang['FeelingCold']             = 'Cold';
$lang['FeelingCool']             = 'Cool';
$lang['FeelingComfortable']      = 'Comfortable ';
$lang['FeelingWarm']             = 'Warm';
$lang['FeelingHot']              = 'Hot';
$lang['FeelingUncomfortable']    = 'Uncomfortable';
$lang['FeelingVeryHot']          = 'Very Hot';
$lang['FeelingExtremelyHot']     = 'Extremely Hot';
//wind
$lang['Windspeed']               = 'Wind';
$lang['Gust']                    = 'Gust';
$lang['Direction']               = 'Direction';
$lang['Gusting']                 = 'Gusting at';
$lang['Blowing']                 = 'Blowing at';
$lang['Wind']                    = 'Wind';
$lang['Wind Run']                = 'Wind Run';
// Wind phrases for Beaufort scale for windspeed area
$lang['Calm']                    = 'Calm';
$lang['Lightair']                = 'Light Air';
$lang['Lightbreeze']             = 'Light Breeze ';
$lang['Gentelbreeze']            = 'Gentle Breeze';
$lang['Moderatebreeze']          = 'Moderate Breeze';
$lang['Freshbreeze']             = 'Fresh Breeze';
$lang['Strongbreeze']            = 'Strong Breeze';
$lang['Neargale']                = 'Near Gale';
$lang['Galeforce']               = 'Gale Force';
$lang['Stronggale']              = 'Strong Gale';
$lang['Storm']                   = 'Storm';
$lang['Violentstorm']            = 'Violent Storm';
$lang['Hurricane']               = 'Hurricane';
// Wind phrases from Beaufort scale for current conditions area
$lang['CalmConditions']          = 'Calm Conditions';
$lang['LightBreezeattimes']      = 'Light Breeze at times ';
$lang['MildBreezeattimes']       = 'Mild Breeze at times ';
$lang['ModerateBreezeattimes']   = 'Moderate Breeze at times';
$lang['FreshBreezeattimes']      = 'Fresh Breeze at times';
$lang['StrongBreezeattimes']     = 'Strong Breeze at times';
$lang['NearGaleattimes']         = 'Near Gale at times';
$lang['GaleForceattimes']        = 'Gale Force at times';
$lang['StrongGaleattimes']       = 'Strong Gale at times';
$lang['StormConditions']         = 'Stormy Conditions';
$lang['ViolentStormConditions']  = 'Violent Storm Conditions';
$lang['HurricaneConditions']     = 'Hurricane Conditions';
$lang['Avg']                     = '<span2> Avg: </span2>';
//wind direction compass
$lang['Northdir']                = 'Due <span>North<br></span>';
$lang['NNEdir']                  = 'North North <br><span>East</span>';
$lang['NEdir']                   = 'North <span> East<br></span>';
$lang['ENEdir']                  = 'East North<br><span>East</span>';
$lang['Eastdir']                 = "Due <span> East<br></span>";
$lang['ESEdir']                  = 'East South<br><span>East</span>';
$lang['SEdir']                   = 'South <span> East</span>';
$lang['SSEdir']                  = 'South South<br><span>East</span>';
$lang['Southdir']                = 'Due <span> South</span>';
$lang['SSWdir']                  = 'South South<br><span>West</span>';
$lang['SWdir']                   = 'South <span> West</span>';
$lang['WSWdir']                  = 'West South<br><span>West</span>';
$lang['Westdir']                 = 'Due <span> West</span>';
$lang['WNWdir']                  = 'West North<br><span>West</span>';
$lang['NWdir']                   = 'North <span> West</span>';
$lang['NWNdir']                  = 'North North<br><span>West</span>';
//wind direction avg
$lang['North']                   = 'North';
$lang['NNE']                     = 'NNE';
$lang['NE']                      = 'NE';
$lang['ENE']                     = 'ENE';
$lang['East']                    = 'East';
$lang['ESE']                     = 'ESE';
$lang['SE']                      = 'SE';
$lang['SSE']                     = 'SSE';
$lang['South']                   = 'South';
$lang['SSW']                     = 'SSW';
$lang['SW']                      = 'SW';
$lang['WSW']                     = 'WSW';
$lang['West']                    = 'West';
$lang['WNW']                     = 'WNW';
$lang['NW']                      = 'NW';
$lang['NWN']                     = 'NWN';
//rain
$lang['raintoday']               = 'Rainfall Today';
$lang['Rate']                    = 'Rate';
$lang['Rainfall']                = 'Rainfall';
$lang['Precip']                  = 'precip'; // must be short name do not use full precipatation !!!! ///
$lang['Rain']                    = 'Rain';
$lang['Heavyrain']               = 'Heavy Rain';
$lang['Flooding']                = 'Flooding Possible';
$lang['Rainbow']                 = 'Rainbow';
$lang['Windy']                   = 'Windy';
//sun -moon-daylight-darkness
$lang['Sun']                     = 'Sun';
$lang['Moon']                    = 'Moon';
$lang['Sunrise']                 = 'Sun Rise';
$lang['Sunset']                  = 'Sun Set';
$lang['Moonrise']                = 'Moon Rise ';
$lang['Moonset']                 = 'Moon Set';
$lang['Night']                   = 'Night ';
$lang['Day']                     = 'Day';
$lang['Nextnewmoon']             = 'Next New Moon';
$lang['Nextfullmoon']            = 'Next Full Moon';
$lang['Luminance']               = 'Luminance';
$lang['Moonphase']               = 'Moonphase';
$lang['Estimated']               = 'Estimated';
$lang['Daylight']                = 'Daylight';
$lang['Darkness']                = 'Darkness';
$lang['Daysold']                 = 'Days Old';
$lang['Belowhorizon']            = 'below<br>horizon';
$lang['Mintill']                 = ' mins till';
$lang['Till']                    = 'Till ';
$lang['Minago']                  = ' mins ago';
$lang['Hrs']                     = ' hrs';
$lang['Min']                     = ' min';
$lang['TotalDarkness']           = 'Total Darkness';
$lang['TotalDaylight']           = 'Total Daylight';
$lang['Below']                   = 'is below the horizon';
$lang['Newmoon']                 = 'New Moon';
$lang['Waxingcrescent']          = 'Waxing Crescent';
$lang['Firstquarter']            = 'First Quarter';
$lang['Waxinggibbous']           = 'Waxing Gibbous';
$lang['Fullmoon']                = 'Full Moon';
$lang['Waninggibbous']           = 'Waning Gibbous';
$lang['Lastquarter']             = 'Last Quarter';
$lang['Waningcrescent']          = 'Waning Crescent';
//trends
$lang['Falling']                 = 'Falling';
$lang['Rising']                  = 'Rising';
$lang['Steady']                  = 'Steady';
$lang['Rapidly']                 = 'Rapidly';
$lang['Temp']                    = 'Temp';
//Solar-UV
//uv
$lang['Nocaution']               = 'No <color>caution</color> required';
$lang['Wearsunglasses']          = 'Wear <color>sunglasses</color> on bright days';
$lang['Stayinshade']             = 'Stay in the shade near midday when the <color>sun</color> is strongest';
$lang['Reducetime']              = 'Reduce time in the <color>sun</color> between 10am-4pm ';
$lang['Minimize']                = 'Minimize <color>sun</color> exposure between 10am-4pm ';
$lang['Trytoavoid']              = 'Try to avoid <color>sun</color> exposure between 10am-4pm ';
//solar
$lang['Poor']                    = 'Poor<color> <br>Radiation</color>';
$lang['Low']                     = 'Low <br><color>Radiation</color>';
$lang['Moderate']                = 'Moderate <br><color>Radiation</color>';
$lang['Good']                    = 'Good <br><color>Radiation</color>';
$lang['Solarradiation']          = 'Solar Radiation';
//current sky
$lang['Currentsky']              = 'Current Conditions';
$lang['Currently']               = 'Currently';
$lang['Cloudcover']              = 'Cloud Cover';
//Notifications
$lang['Nocurrentalert']          = 'No Current Weather <span>Alerts</span>';
$lang['Windalert']               = 'Wind Gusts at';
$lang['Tempalert']               = 'High Temperature';
$lang['Heatindexalert']          = 'Heat Index Warning';
$lang['Windchillalert']          = 'Windchill Caution';
$lang['Dewpointalert']           = 'Uncomfortable humidity';
$lang['Dewpointcolderalert']     = 'Dewpoint Caution';
$lang['Feelslikecolderalert']    = 'Feels Colder';
$lang['Feelslikewarmeralert']    = 'Feels Warmer';
$lang['Rainratealert']           = 'per/hr<span> Heavy Rainfall ';
//Earthquake Notifications
$lang['Regional']                = 'Regional Earthquake';
$lang['Significant']             = 'Significant Earthquake';
$lang['Nosignificant']           = 'No Significant Earthquakes';
//Main page
$lang['Barometer']               = 'Barometer';
$lang['UVSOLAR']                 = 'UVI-Solar';
$lang['Earthquake']              = 'Earthquake';
$lang['Daynight']                = 'Daylight & Night Info';
$lang['SunPosition']             = 'Sun Position';
$lang['Location']                = 'Location ';
$lang['Hardware']                = 'Hardware';
$lang['Rainfalltoday']           = 'Rainfall Today';
$lang['Windspeed']               = 'Wind';
$lang['Winddirection']           = 'Wind Direction';
$lang['Measured']                = 'Measured Today';
$lang['Forecast']                = 'Forecast';
$lang['Forecastahead']           = 'Forecast Ahead';
$lang['Forecastsummary']         = 'Forecast Summary';
$lang['WindGust']                = 'Wind Speed | Gusts';
$lang['Hourlyforecast']          = 'Hourly Forecast ';
$lang['Significantearthquake']   = 'Significant Earthquake';
$lang['Regionalearthquake']      = 'Regional Earthquake';
$lang['Average']                 = 'Average';
$lang['Notifications']           = 'Weather <span>Alert</span>';
$lang['Indoor']                  = 'Indoor';
$lang['Today']                   = 'Today';
$lang['Tonight']                 = 'Tonight';
$lang['Tomorrow']                = 'Tomorrow';
$lang['Tomorrownight']           = 'Tomorrow Night';
$lang['Updated']                 = 'Updated';
$lang['Meteor']                  = 'Meteor Shower Info';
$lang['Firerisk']                = 'Fire Risk';
$lang['Localtime']               = 'Local <span2>Time</span2>';
$lang['Nometeor']                = 'No Meteor Showers';
$lang['LiveWebCam']              = 'Live Web Cam';
$lang['Online']                  = 'Online';
$lang['Offline']                 = 'Offline';
$lang['Weatherstation']          = 'Weather Station';
$lang['Cloudbase']               = 'Cloudbase';
$lang['uvalert']                 = 'Caution High UVINDEX';
$lang['Max']                     = 'Max';
$lang['Min']                     = 'Min';
//earthquake TOP MODULE 10 July 2017
$lang['MicroE']                  = 'Micro Earthquake';
$lang['MinorE']                  = 'Minor Earthquake';
$lang['LightE']                  = 'Light Earthquake';
$lang['ModerateE']               = 'Moderate Earthquake';
$lang['StrongE']                 = 'Strong Earthquake';
$lang['MajorE']                  = 'Major Earthquake';
$lang['GreatE']                  = 'Great Earthquake';
$lang['RegionalE']               = 'Regional';
$lang['Conditions']              = 'Conditions';
$lang['Cloudbase Height']        = 'Cloudbase Height';
$lang['Station']                 = 'Station';
$lang['Detailed Forecast']       = 'Detailed Forecast';
$lang['Summary Outlook']         = 'Summary';
//Air Quality
$lang['Hazordous']               = 'Hazardous Conditions';
$lang['VeryUnhealthy']           = 'Very Unhealthy';
$lang['Unhealthy']               = 'Unhealthy Air Quality';
$lang['UnhealthyFS']             = 'Unhealthy For Some';
$lang['Moderate']                = 'Moderate Air Quality ';
$lang['Good']                    = 'Good Air Quality ';
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