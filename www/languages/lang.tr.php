<?php
/* 
-----------------
Language Translation File for HOMEWEATHERSTATION Template
Language: Turkish
Translated by: Brian Underdown / Erim Mehmet Eren
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
setlocale(LC_TIME, "tr_TR.UTF-8");
$lang                           = array();
// Menu
$lang['Settings']               = 'Ayarlar';
$lang['Layout']                 = 'Anahtar Düzenı';
$lang['Lighttheme']             = 'Işık Teması';
$lang['Darktheme']              = 'Kara Teması';
$lang['Nonmetric']              = 'US (F) ';
$lang['Metric']                 = 'Metrik (C)';
$lang['UKmetric']               = 'UK (MPH - Metrik) ';
$lang['Scandinavia']            = 'İskandinavya(M/S)';
$lang['Worldwideearthquakes']   = 'Dunya Depremleri';
$lang['Toggle']                 = 'Toggle Fullscreen ';
$lang['Contactinfo']            = 'İstasyon ve İletişim Bilgileri';
$lang['Templateinfo']           = 'Contributors';
$lang['language']               = 'Dil Seçin';
$lang['Weatherstationinfo']     = 'Hava Istasyon Bilgi';
$lang['Webdesigninfo']          = 'Web Sitesi Bilgi';
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
$lang['Temperature']            = 'Sıcaklık';
$lang['Feelslike']              = 'Hissedilen';
$lang['Humidity']               = 'Nem';
$lang['Dewpoint']               = 'Çiğ noktası';
$lang['Trend']                  = 'Gidişat';
$lang['Heatindex']              = 'Sıcaklık endeksi';
$lang['Windchill']              = 'Rüzgar Sıcaklığı ';
$lang['Tempfactors']            = 'Sıcaklık Faktörler';
$lang['Nocautions']             = 'Hayır Dikkat';
$lang['Wetbulb']                = 'Islak Ampul';
$lang['dry']                    = '& Kuru';
$lang['verydry']                = '& Çok kuru';
//new feature temperature feels
$lang['FreezingCold']           = 'Çok Çok Soğuk';
$lang['FeelingVeryCold']        = 'Duygu Çok Soğuk';
$lang['FeelingCold']            = 'Duygu Soğuk';
$lang['FeelingCool']            = 'Duygu Cool';
$lang['FeelingComfortable']     = 'Duygu Iyi ';
$lang['FeelingWarm']            = 'Duygu Hafif Sıcak';
$lang['FeelingHot']             = 'Duygu Sıcak';
$lang['FeelingUncomfortable']   = 'Duygu Rahatsız';
$lang['FeelingVeryHot']         = 'Duygu Çok Sıcak';
$lang['FeelingExtremelyHot']    = 'Duygu Çok Çok Sıcak';
//wind
$lang['Windspeed']              = 'Rüzgar hızı';
$lang['Gust']                   = 'Rüzgar';
$lang['Direction']              = 'Yön';
$lang['Gusting']                = 'Max Rüzgar ';
$lang['Blowing']                = 'üfleme ';
$lang['Blowing']                = 'Rüzgar';
$lang['Wind Run']               = 'Rüzgar Run';
// Wind phrases for Beaufort scale for windspeed area
$lang['Calm']                   = 'Sakin';
$lang['Lightair']               = 'Çok hafif Rüzgarlı';
$lang['Lightbreeze']            = 'Orta Rüzgârlı';
$lang['Gentelbreeze']           = 'Orta Rüzgârlı';
$lang['Moderatebreeze']         = 'Orta Rüzgârlı';
$lang['Freshbreeze']            = 'Sert Rüzgârlı';
$lang['Strongbreeze']           = 'Kuvvetli Rüzgarlı';
$lang['Neargale']               = 'Fırtınamsı Rüzgar';
$lang['Galeforce']              = 'Fırtına ';
$lang['Stronggale']             = 'Kuvvetli Fırtına';
$lang['Storm']                  = 'Tam Fırtına';
$lang['Violentstorm']           = 'şiddetli Fırtına';
$lang['Hurricane']              = 'Kasırga';
// Wind phrases from Beaufort scale for current conditions area
$lang['CalmConditions']         = 'Sakin';
$lang['LightBreezeattimes']     = 'Çok Hafif Rüzgarlı';
$lang['MildBreezeattimes']      = 'Orta Rüzgârlı';
$lang['ModerateBreezeattimes']  = 'Orta Rüzgârlı';
$lang['FreshBreezeattimes']     = 'Sert Rüzgârlı';
$lang['StrongBreezeattimes']    = 'Kuvvetli Rüzgarlı';
$lang['NearGaleattimes']        = 'Fırtınamsı Rüzgar';
$lang['GaleForceattimes']       = 'Fırtına';
$lang['StrongGaleattimes']      = 'Kuvvetli Fırtına ';
$lang['StormConditions']        = 'Tam Fırtına';
$lang['ViolentStormConditions'] = 'şiddetli Fırtına';
$lang['HurricaneConditions']    = 'Kasırga';
$lang['Avg']                    = '<span2> Avg: </span2>';
//wind direction compass
$lang['Northdir']               = '<span>Kuzey<br></span>';
$lang['NNEdir']                 = 'Kuzey Kuzey <br><span>Doğu</span>';
$lang['NEdir']                  = 'Kuzey <span> Doğu<br></span>';
$lang['ENEdir']                 = 'Doğu Kuzey<br><span>Doğu</span>';
$lang['Eastdir']                = "<span> Doğu<br></span>";
$lang['ESEdir']                 = 'Doğu Güney<br><span>Doğu</span>';
$lang['SEdir']                  = 'Güney <span> Doğu</span>';
$lang['SSEdir']                 = 'Güney Güney<br><span>Doğu</span>';
$lang['Southdir']               = '<span> Güney</span>';
$lang['SSWdir']                 = 'Güney Güney<br><span>Batı</span>';
$lang['SWdir']                  = 'Güney <span> Batı</span>';
$lang['WSWdir']                 = 'Batı Güney<br><span>Batı</span>';
$lang['Westdir']                = '<span> Batı</span>';
$lang['WNWdir']                 = 'Batı Kuzey<br><span>Batı</span>';
$lang['NWdir']                  = 'Kuzey <span> Batı</span>';
$lang['NWNdir']                 = 'Kuzey Kuzey<br><span>Batı</span>';
//wind direction avg
$lang['North']                  = 'Kuzey';
$lang['NNE']                    = 'KKD';
$lang['NE']                     = 'KD';
$lang['ENE']                    = 'DKD';
$lang['East']                   = 'Doğu ';
$lang['ESE']                    = 'DGD';
$lang['SE']                     = 'GD';
$lang['SSE']                    = 'GGD';
$lang['South']                  = 'Güney';
$lang['SSW']                    = 'GGB';
$lang['SW']                     = 'GB';
$lang['WSW']                    = 'BGB';
$lang['West']                   = 'Batı';
$lang['WNW']                    = 'BKB';
$lang['NW']                     = 'KB';
$lang['NWN']                    = 'KKB';
//rain
$lang['raintoday']              = 'Bugün Yağmurlu';
$lang['Rate']                   = 'Oran';
$lang['Rainfall']               = 'Yağmur';
$lang['Precip']                 = 'Yağmur'; // must be short name do not use full precipatation !!!! ///
$lang['Rain']                   = 'Yağmur';
$lang['Heavyrain']              = 'Ağır Yağmur';
$lang['Flooding']               = 'Dikkat';
$lang['Rainbow']                = 'Gökkuşağı';
$lang['Windy']                  = 'Çok Ruzgar';
//sun -moon-daylight-darkness
$lang['Sun']                    = 'Güneş';
$lang['Moon']                   = 'Ay';
$lang['Sunrise']                = 'Güneşin doğuşu';
$lang['Sunset']                 = 'Güneşin batışı';
$lang['Moonrise']               = 'Ay doğuşu ';
$lang['Moonset']                = 'Ay batışı';
$lang['Night']                  = 'Gece ';
$lang['Day']                    = 'Gun';
$lang['Nextnewmoon']            = 'Yeni Ay';
$lang['Nextfullmoon']           = 'Tam Ay';
$lang['Luminance']              = '&nbsp;&nbsp;Parlaklık  ';
$lang['Moonphase']              = 'Ay evreleri';
$lang['Estimated']              = ' Tahmini';
$lang['Daylight']               = ' Aydınlık';
$lang['Darkness']               = ' Karanlık';
$lang['Daysold']                = 'Gun';
$lang['Belowhorizon']           = 'altında<br>ufuk';
$lang['Mintill']                = '<br>sonra';
$lang['Till']                   = 'Için ';
$lang['Minago']                 = 'son';
$lang['Hrs']                    = ' hrs';
$lang['Min']                    = ' min';
$lang['TotalDarkness']          = 'Toplam Karanlık';
$lang['TotalDaylight']          = 'Toplam Aydınlık';
$lang['Below']                  = 'ufuktan aşağıda';
$lang['Newmoon']                = 'Yeni Ay ';
$lang['Waxingcrescent']         = 'Waxing Crescent';
$lang['Firstquarter']           = 'İlk çeyrek';
$lang['Waxinggibbous']          = 'Waxing Gibbous';
$lang['Fullmoon']               = 'Tam Ay';
$lang['Waninggibbous']          = 'Waning Gibbous';
$lang['Lastquarter']            = 'Son çeyrek';
$lang['Waningcrescent']         = 'Waning Crescent';
//trends
$lang['Falling']                = ' düşüyor';
$lang['Rising']                 = ' yükseliyor';
$lang['Steady']                 = ' sabit';
$lang['Rapidly']                = ' Hızla';
$lang['Temp']                   = 'Temp';
//Solar-UV
//uv
$lang['Nocaution']              = 'Dikkat <color>Hayir</color>';
$lang['Wearsunglasses']         = 'Güneş Gözlüğü<color>takın</color>';
$lang['Stayinshade']            = '<color>Güneş</color> altında kalmaktan kaçının';
$lang['Reducetime']             = 'Saat 10 & 16 arasında <color>güneş</color> çıkmayın ';
$lang['Minimize']               = '<color>Kuvvetli</color> güneş 10 & 16 arası  ';
$lang['Trytoavoid']             = 'Öğlen <color>güneş</color> e çıkmayın. Sıcak çarpma riski ';
//solar
$lang['Poor']                   = 'Çok Zayıf<color> <br>Işın</color>';
$lang['Low']                    = 'Düşük<br><color>Işın</color>';
$lang['Moderate']               = 'Orta <br><color>Işın</color>';
$lang['Good']                   = 'İyi <br><color>Işın</color>';
$lang['Solarradiation']         = 'Güneş Işınları';
//current sky
$lang['Currentsky']             = 'Güncel Hava';
$lang['Currently']              = 'Güncel';
$lang['Cloudcover']             = 'Bulutu';
//Notifications
$lang['Nocurrentalert']         = 'Uyarı yok';
$lang['Windalert']              = 'Kuvvetli rüzgar uyarısı';
$lang['Tempalert']              = 'Yüksek sıcaklık';
$lang['Heatindexalert']         = 'Heat Index Dikkat ';
$lang['Windchillalert']         = 'Windchill Dikkat';
$lang['Dewpointalert']          = 'Bunaltıcı nem';
$lang['Dewpointcolderalert']    = 'Çiğ noktası Dikkat';
$lang['Feelslikecolderalert']   = 'Daha soğuk Dikkat';
$lang['Feelslikewarmeralert']   = 'Daha sıcak Dikkat';
$lang['Rainratealert']          = 'Saat<span> Yağmur ';
//Earthquake Notifications
$lang['Regional']               = 'Bölgesel Deprem';
$lang['Significant']            = 'Önemli Deprem';
$lang['Nosignificant']          = 'Deprem yok';
//Main page
$lang['Barometer']              = 'Barometre';
$lang['UVSOLAR']                = 'UV | Solar Data';
$lang['Earthquake']             = 'Deprem Data';
$lang['Daynight']               = 'Gun & Gece Bilgi';
$lang['SunPosition']            = 'Güneş';
$lang['Location']               = 'Yer ';
$lang['Hardware']               = 'Donanım';
$lang['Rainfalltoday']          = 'Toplam Yağmur';
$lang['Windspeed']              = 'Rüzgar hızı';
$lang['Winddirection']          = 'Yönü';
$lang['Measured']               = 'Bugün Toplam';
$lang['Forecast']               = 'HAVA DURUMU';
$lang['Forecastahead']          = 'HAVA DURUMU 10 GUN ';
$lang['Forecastsummary']        = 'HAVA DURUMU';
$lang['WindGust']               = 'Rüzgar Hızı | Bora';
$lang['Hourlyforecast']         = 'Saat Hava ';
$lang['Significantearthquake']  = 'Önemli Depremler';
$lang['Regionalearthquake']     = 'Bölgesel Depremler';
$lang['Average']                = 'Ortalama';
$lang['Notifications']          = 'Bildirimler <span>Dikkat</span>';
$lang['Indoor']                 = 'Ev';
$lang['Today']                  = 'Bugün';
$lang['Tonight']                = 'Bu Gece';
$lang['Tomorrow']               = 'Yarin';
$lang['Tomorrownight']          = 'Yarin Gece';
$lang['Updated']                = 'Yenile';
$lang['Meteor']                 = 'Meteor Yağmuru Info';
$lang['Firerisk']               = 'Yangın Tehlikesi';
$lang['Localtime']              = 'Mahalli <span2>Saat</span2>';
$lang['Nometeor']               = 'Meteor Yağmuru Hayir';
$lang['LiveWebCam']             = 'Canlı Yayın Cam';
$lang['Online']                 = 'Online';
$lang['Offline']                = 'Offline';
$lang['Weatherstation']         = 'Meteoroloji İstasyon';
$lang['Cloudbase']              = 'Bulutu';
$lang['uvalert']                = 'Dikkat UVINDEX';
$lang['Max']                    = 'Max';
$lang['Min']                    = 'Min';
//earthquake TOP MODULE 10 July 2017
$lang['MicroE']                  = 'Micro Earthquake';
$lang['MinorE']                  = 'Az  Depremler';
$lang['LightE']                  = 'Light Earthquake';
$lang['ModerateE']               = 'Orta  Depremler';
$lang['StrongE']                 = 'Önemli  Depremler';
$lang['MajorE']                  = 'Major Earthquake';
$lang['GreatE']                  = 'Great Earthquake';
$lang['RegionalE']              = 'Bölgesel';
$lang['Conditions']             = 'Kosullari';
$lang['Cloudbase Height']       = 'Bulutu';
$lang['Station']                = 'İstasyon';
$lang['Detailed Forecast']      = 'Hava Durumu Gun ';
$lang['Summary Outlook']        = 'Hava Durumu';
//Air Quality
$lang['Hazordous']              = 'Kötü Hava Kosullari';
$lang['VeryUnhealthy']          = 'Sağlıksız Hava Kalitesi';
$lang['Unhealthy']              = 'Sağlıksız Hava Kalitesi Uyarisi';
$lang['UnhealthyFS']            = 'Sağlıksız Hava Kalitesi Uyarisi';
$lang['Moderate']               = 'Orta Hava Kalitesi Uyarisi';
$lang['Good']                   = 'Saglikli Hava Kalitesi ';
#notification additions
$lang['notifyTitle']            = 'Istasyonu <span>Dikkat</span>';
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