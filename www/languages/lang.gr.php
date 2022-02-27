<?php
/* 
-----------------
Language Translation File for HOMEWEATHERSTATION Template
Language: Greek
Translation By : Athanasios Tsioukanaras (meteothes.gr)
Developed By: Lightmaster/Brian Underdown/Erik M Madsen
4th August 2017
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
setlocale(LC_TIME, "el_GR.UTF-8");
$lang                           = array();
// Menu
$lang['Settings']               = 'Ρυθμίσεις';
$lang['Layout']                 = 'Αλλαγή Θέματος';
$lang['Lighttheme']             = 'Φωτεινό Θέμα';
$lang['Darktheme']              = 'Σκοτεινό Θέμα';
$lang['Nonmetric']              = 'US (F)';
$lang['Metric']                 = 'Μετρικό (C)';
$lang['UKmetric']               = 'UK (MPH - Μετρικό)';
$lang['Scandinavia']            = 'Σκανδιναβία(M/S)';
$lang['Worldwideearthquakes']   = 'Παγκόσμιοι Σεισμοί';
$lang['Toggle']                 = 'Αλλαγή σε Πλήρη Οθόνη ';
$lang['Contactinfo']            = 'Πληροφορίες Σταθμού & Επικοινωνία';
$lang['Templateinfo']           = 'Συντελεστές';
$lang['language']               = 'Επιλέξτε γλώσσα';
$lang['Weatherstationinfo']     = 'Πληροφορίες Μετ. Σταθμού';
$lang['Webdesigninfo']          = 'Πληροφορίες Προτύπου';
$lang['Contact']                = 'Contact';
//days
$lang['Monday']                 = 'Δευτέρα';
$lang['Tuesday']                = 'Τρίτη';
$lang['Wednesday']              = 'Τετάρτη';
$lang['Thursday']               = 'Πέμπτη';
$lang['Friday']                 = 'Παρασκευή ';
$lang['Saturday']               = 'Σάββατο';
$lang['Sunday']                 = 'Κυριακή';
//months
$lang['January']                = 'Ιάν';
$lang['Febuary']                = 'Φεβ';
$lang['March']                  = 'Μάρ';
$lang['April']                  = 'Απρ';
$lang['May']                    = 'Μάϊ';
$lang['June']                   = 'Ιούν';
$lang['July']                   = 'Ιούλ';
$lang['August']                 = 'Αυγ';
$lang['September']              = 'Σεπ';
$lang['October']                = 'Οκτ';
$lang['November']               = 'Νοέ';
$lang['December']               = 'Δεκ';
//temperature
$lang['Temperature']            = 'Θερμοκρασία';
$lang['Feelslike']              = 'Αίσθηση';
$lang['Humidity']               = 'Υγρασία';
$lang['Dewpoint']               = 'Σημείο Δρόσου';
$lang['Trend']                  = 'τάση';
$lang['Heatindex']              = 'Δείκτης Δυσφορίας';
$lang['Windchill']              = 'Δείκτης Ψύχρας ';
$lang['Tempfactors']            = 'Θερμ. Παράγοντες';
$lang['Nocautions']             = 'Χωρίς Eιδοποιήσεις';
$lang['Wetbulb']                = 'Υγρός Λαμπτήρας';
$lang['dry']                    = '& Ξηρός';
$lang['verydry']                = '& Πολύ Ξηρός';
//new feature temperature feels
$lang['FreezingCold']           = 'Εξαιρετικά Ψυχρός';
$lang['FeelingVeryCold']        = 'Πολύ Ψυχρός';
$lang['FeelingCold']            = 'Ψυχρός';
$lang['FeelingCool']            = 'Ψύχρα';
$lang['FeelingComfortable']     = 'Ευχάριστος ';
$lang['FeelingWarm']            = 'Θερμός';
$lang['FeelingHot']             = 'Ζεστός';
$lang['FeelingUncomfortable']   = 'Αίσθηση Δυσφορίας';
$lang['FeelingVeryHot']         = 'Πολύ ζεστός';
$lang['FeelingExtremelyHot']    = 'Αίσθηση Καύσωνα';
//wind
$lang['Windspeed']              = 'Ταχύτητα Ανέμου';
$lang['Gust']                   = 'Ριπές';
$lang['Direction']              = 'Διεύθυνση';
$lang['Gusting']                = 'Ριπές στα';
$lang['Blowing']                = 'Πνέει στα';
$lang['Wind']                   = 'Ταχύτητα';
$lang['Wind Run']               = 'Ταχύτητα Run';
// Wind phrases for Beaufort scale for windspeed area
$lang['Calm']                   = 'Απνοια';
$lang['Lightair']               = 'Σχεδόν Απνοια';
$lang['Lightbreeze']            = 'Πολύ Ασθενής ';
$lang['Gentelbreeze']           = 'Ασθενής';
$lang['Moderatebreeze']         = 'Σχεδόν Μέτριος';
$lang['Freshbreeze']            = 'Μέτριος';
$lang['Strongbreeze']           = 'Ισχυρός';
$lang['Neargale']               = 'Σχεδόν Θυελλώδης';
$lang['Galeforce']              = 'Θυελλώδης';
$lang['Stronggale']             = 'Πολύ Θυελλώδης';
$lang['Storm']                  = 'Θύελλα';
$lang['Violentstorm']           = 'Ισχυρή Θύελλα';
$lang['Hurricane']              = 'Τυφώνας';
// Wind phrases from Beaufort scale for current conditions area
$lang['CalmConditions']         = 'Απνοια';
$lang['LightBreezeattimes']     = 'Πολύ Ασθενής ';
$lang['MildBreezeattimes']      = 'Ασθενής ';
$lang['ModerateBreezeattimes']  = 'Σχεδόν Μέτριος';
$lang['FreshBreezeattimes']     = 'Μέτριος';
$lang['StrongBreezeattimes']    = 'Ισχυρός';
$lang['NearGaleattimes']        = 'Σχεδόν Θυελλώδης';
$lang['GaleForceattimes']       = 'Θυελλώδης';
$lang['StrongGaleattimes']      = 'Πολύ Θυελλώδης';
$lang['StormConditions']        = 'Θύελλα';
$lang['ViolentStormConditions'] = 'Ισχυρή Θύελλα';
$lang['HurricaneConditions']    = 'Τυφώνα';
$lang['Avg']                    = '<span2>Μέση:</span2>';
//wind direction compass
$lang['Northdir']               = '<span>Βόρειος<br></span>';
$lang['NNEdir']                 = 'Βόρειος-Βορειο<br><span>Ανατολικός</span>';
$lang['NEdir']                  = 'Βορειο-<span>Ανατολικός<br></span>';
$lang['ENEdir']                 = 'Ανατολικός-Βορειο<br><span>Ανατολικός</span>';
$lang['Eastdir']                = "<span> Ανατολικός<br></span>";
$lang['ESEdir']                 = 'Ανατολικός-Νότιο<br><span>Ανατολικός</span>';
$lang['SEdir']                  = 'Νοτιο-<span>:Ανατολικός</span>';
$lang['SSEdir']                 = 'Νότιος-Νοτιο<br><span>Ανατολικός</span>';
$lang['Southdir']               = '<span> Νότιος</span>';
$lang['SSWdir']                 = 'Νότιος-Νοτιο<br><span>Δυτικός</span>';
$lang['SWdir']                  = 'Νοτιο<span>Δυτικός</span>';
$lang['WSWdir']                 = 'Δυτικός-Νοτιο<br><span>Δυτικός</span>';
$lang['Westdir']                = '<span> Δυτικός</span>';
$lang['WNWdir']                 = 'Δυτικός-Βορειο<br><span>Δυτικός</span>';
$lang['NWdir']                  = 'Βορειο<span>Δυτικός</span>';
$lang['NWNdir']                 = 'Βόρειος-Βορειο<br><span>Δυτικός</span>';
//wind direction avg
$lang['North']                  = 'Βόρειος';
$lang['NNE']                    = 'ΒΒΑ';
$lang['NE']                     = 'ΒΑ';
$lang['ENE']                    = 'ΑΝΑ';
$lang['East']                   = 'Ανατολικός ';
$lang['ESE']                    = 'ΑΝΑ';
$lang['SE']                     = 'ΝΑ';
$lang['SSE']                    = 'ΝΝΑ';
$lang['South']                  = 'Νότιος';
$lang['SSW']                    = 'ΝΝΔ';
$lang['SW']                     = 'ΝΔ';
$lang['WSW']                    = 'ΔΝΔ';
$lang['West']                   = 'Δυτικός';
$lang['WNW']                    = 'ΔΒΔ';
$lang['NW']                     = 'ΒΔ';
$lang['NWN']                    = 'ΒΔΒ';
//rain
$lang['raintoday']              = 'Βροχή Σήμερα';
$lang['Rate']                   = 'Ραγδαιότητα';
$lang['Rainfall']               = 'Βροχή';
$lang['Precip']                 = 'Υετός'; // must be short name do not use full precipatation !!!! ///
$lang['Rain']                   = 'Βροχή';
$lang['Heavyrain']              = 'Εντονη Βροχή';
$lang['Flooding']               = 'Πιθανές Πλημμύρες';
$lang['Rainbow']                = 'Rainbow';
$lang['Windy']                  = 'Windy';
//sun -moon-daylight-darkness
$lang['Sun']                    = 'Ηλιος';
$lang['Moon']                   = 'Σελήνη';
$lang['Sunrise']                = 'Ανατολή Ηλίου';
$lang['Sunset']                 = 'Δύση Ηλίου';
$lang['Moonrise']               = 'Αν. Σελήνης';
$lang['Moonset']                = 'Δύση Σελήν.';
$lang['Night']                  = 'Νύχτα ';
$lang['Day']                    = 'Ημέρα';
$lang['Nextnewmoon']            = 'Νέα Σελήνη';
$lang['Nextfullmoon']           = 'Νέα Πανσέληνος';
$lang['Luminance']              = 'Φωτεινότητα';
$lang['Moonphase']              = 'Φάση Σελήνης';
$lang['Estimated']              = 'Εκτιμώμενο';
$lang['Daylight']               = 'Φως Ημέρ.';
$lang['Darkness']               = 'Σκοτάδι';
$lang['Daysold']                = 'Ημέρες Παλιά';
$lang['Belowhorizon']           = 'κάτω από ορίζοντα';
$lang['Mintill']                = '<br>λεπτά ακόμα';
$lang['Till']                   = 'να ';
$lang['Minago']                 = ' λεπτά πριν';
$lang['Hrs']                    = ' ώρες';
$lang['Min']                    = ' λεπτά';
$lang['TotalDarkness']          = 'Διάρκεια Ημέρας';
$lang['TotalDaylight']          = 'Διάρκεια Νύχτας';
$lang['Below']                  = 'κάτω από τον ορίζοντα';
$lang['Newmoon']                = 'Νέα Σελήνη';
$lang['Waxingcrescent']         = 'Αύξουσα Σελήνη';
$lang['Firstquarter']           = 'Πρώτο Τέταρτο';
$lang['Waxinggibbous']          = 'Αύξουσα Σελήνη';
$lang['Fullmoon']               = 'Πανσέληνος';
$lang['Waninggibbous']          = 'Φθίνουσα Σελήνη';
$lang['Lastquarter']            = 'Τελευταίο Τέταρτο';
$lang['Waningcrescent']         = 'Φθίνουσα Σελήνη';
//trends
$lang['Falling']                = 'Πτωτική';
$lang['Rising']                 = 'Ανοδική';
$lang['Steady']                 = 'Σταθερή';
$lang['Rapidly']                = 'Εντονα';
$lang['Temp']                   = 'Θερμ';
//Solar-UV
//uv
$lang['Nocaution']              = 'Χωρίς <color>Ειδοποιήσεις!</color>';
$lang['Wearsunglasses']         = 'Να φοράτε <color>γυαλιά ηλίου</color> τις φωτεινές ημέρες!';
$lang['Stayinshade']            = 'Μείνετε στη σκιά το μεσημέρι όταν ο <color>ήλιος</color> είναι δυνατός!';
$lang['Reducetime']             = 'Ελαττώστε το χρόνο έκθεσης στον <color>ήλιο,</color> μεταξύ 10πμ-4μμ!';
$lang['Minimize']               = 'Ελαττώστε το χρόνο έκθεσης στον <color>ήλιο,</color> μεταξύ 10πμ-4μμ!';
$lang['Trytoavoid']             = 'Αποφύγετε την έκθεση στον <color>ήλιο,</color> μεταξύ 10πμ-4μμ!';
//solar
$lang['Poor']                   = 'Ελάχιστη-Μηδέν<color> <br>Ηλ. Ακτινοβολία</color>';
$lang['Low']                    = 'Χαμηλή <br><color>Ηλ. Ακτινοβολία</color>';
$lang['Moderate']               = 'Μέτρια <br><color>Ηλ. Ακτινοβολία</color>';
$lang['Good']                   = 'Ισχυρή <br><color>Ηλ. Ακτινοβολία</color>';
$lang['Solarradiation']         = 'Ηλιακή Ακτινοβολία';
//current sky
$lang['Currentsky']             = 'Παρούσες Συνθήκες';
$lang['Currently']              = 'Τώρα';
$lang['Cloudcover']             = 'Νεφοκάλυψη';
//Notifications
$lang['Nocurrentalert']         = 'Χωρίς Ειδοποιήσεις Καιρού';
$lang['Windalert']              = 'Ριπές ως';
$lang['Tempalert']              = 'Υψηλή θερμοκρασία';
$lang['Heatindexalert']         = 'Ειδοπ. Δείκ. Δυσφορίας';
$lang['Windchillalert']         = 'Ειδοπ. Δείκ. Ψύχρας';
$lang['Dewpointalert']          = 'Ανυπόφορη υγρασία';
$lang['Dewpointcolderalert']    = 'Αίσθ. Σημ. Δρόσου Ψυχρότερη';
$lang['Feelslikecolderalert']   = 'Αίσθηση Ψυχρότερη';
$lang['Feelslikewarmeralert']   = 'Αίσθηση Θερμότερη';
$lang['Rainratealert']          = 'per/hr<span> Βροχόπτωση ';
//Earthquake Notifications
$lang['Regional']               = 'Περιοχικοί';
$lang['Significant']            = 'Σημαντικοί Σεισμοί';
$lang['Nosignificant']          = 'Χωρίς Σημαντικούς Σεισμούς';
//Main page
$lang['Barometer']              = 'Βαρόμετρο';
$lang['UVSOLAR']                = 'Ηλιακή';
$lang['Earthquake']             = ' Δεδομένα Σεισμών';
$lang['Daynight']               = 'Πληροφορίες Ημέρας & Νύχτας';
$lang['SunPosition']            = 'Sun Position';
$lang['Location']               = 'Τοποθεσία';
$lang['Hardware']               = 'Εξοπλισμός';
$lang['Rainfalltoday']          = 'Βροχόπτωση Σήμερα';
$lang['Windspeed']              = 'Ταχύτ. Ανέμου';
$lang['Winddirection']          = 'Διεύθυνση Ανέμου';
$lang['Measured']               = 'Μετρήθηκε Σήμερα';
$lang['Forecast']               = 'Πρόγνωση';
$lang['Forecastahead']          = 'Προγνωση 10 Ημερών';
$lang['Forecastsummary']        = 'Σύνοψη Πρόγνωσης';
$lang['WindGust']               = 'Ταχύτητα Ανέμου | Ριπές';
$lang['Hourlyforecast']         = 'Ωριαία Πρόγνωση';
$lang['Significantearthquake']  = 'Σημαντικός Σεισμός';
$lang['Regionalearthquake']     = 'Περιοχικός Σεισμός';
$lang['Average']                = 'Μέση';
$lang['Notifications']          = 'Eιδοποιήσεις';
$lang['Indoor']                 = 'Εσωτερική';
$lang['Today']                  = 'Σήμερα';
$lang['Tonight']                = 'Απόψε';
$lang['Tomorrow']               = 'Αύριο';
$lang['Tomorrownight']          = 'Αύριο Βράδυ';
$lang['Updated']                = 'Ενημέρωση';
$lang['Meteor']                 = 'Πληρ. Πτώσης Μετεώρων';
$lang['Firerisk']               = 'Κίνδυνος Πυρκαϊάς';
$lang['Localtime']              = 'Τοπική Ωρα';
$lang['Nometeor']               = 'Χωρίς πτώση Μετεωριτών';
$lang['LiveWebCam']             = 'Κάμερα Δικτύου';
$lang['Online']                 = 'Σε λειτουργία';
$lang['Offline']                = 'Εκτός λειτουργίας';
$lang['Weatherstation']         = 'Σταθμός';
$lang['Cloudbase']              = 'Βάση Νεφών';
$lang['uvalert']                = 'Caution High UVINDEX';
$lang['Max']                    = 'Max';
$lang['Min']                    = 'Min';
//earthquake TOP MODULE 10 July 2017
$lang['MicroE']                  = 'Micro Earthquake';
$lang['MinorE']                  = 'Ασθενής Σεισμός';
$lang['LightE']                  = 'Light Earthquake';
$lang['ModerateE']               = 'Μέτριος Σεισμός';
$lang['StrongE']                 = 'Ισχυρός Σεισμός';
$lang['MajorE']                  = 'Major Earthquake';
$lang['GreatE']                  = 'Great Earthquake';
$lang['RegionalE']               = 'Τοπικός';
$lang['Conditions']              = 'Συνθήκες';
$lang['Cloudbase Height']        = 'Βάση Νεφών';
$lang['Station']                 = 'Σταθμός';
$lang['Detailed Forecast']       = 'Λεπτομερής Πρόγνωση';
$lang['Summary Outlook']         = 'Συνοπτικά';
//Air Quality
$lang['Hazordous']               = 'Hazardous Conditions';
$lang['VeryUnhealthy']           = 'Very Unhealthy';
$lang['Unhealthy']               = 'Unhealthy Air Quality';
$lang['UnhealthyFS']             = 'Unhealthy For Some';
$lang['Moderate']                = 'Moderate Air Quality ';
$lang['Good']                    = 'Good Air Quality ';
#notification additions
$lang['notifyTitle']             = 'Ειδοποιήσεις Μετεωρολ. Σταθμού';
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