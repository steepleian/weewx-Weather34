<?php 
include ('settings.php');



$pressureunit == 'hPa'
$dvm["barometer_units"] = "hPa";
$dvm["barometer_yesterday_max"] = "1021.3";
$dvm["barometer_yesterday_maxtime"] = "20220513231647";
$dvm["barometer_yesterday_min"] = "1017.5";
$dvm["barometer_yesterday_mintime"] = "20220513012359";
$dvm["barometer_month_max"] = "1030.4";	
$dvm["barometer_month_maxtime"] = "20220508093131";
$dvm["barometer_month_min"] = "1005.4";	
$dvm["barometer_month_mintime"] = "20220511144348";
$dvm["barometer_year_max"] = "1043.7";	
$dvm["barometer_year_maxtime"] = "20220318105816";
$dvm["barometer_year_min"] = "980.7";	
$dvm["barometer_year_mintime"] = "20220218113140";
$dvm["barometer_alltime_max"] = "1043.7";		
$dvm["barometer_alltime_maxtime"] = "20220318105816";
$dvm["barometer_alltime_min"] = "972.1";
$dvm["barometer_alltime_mintime"] = "20210120223500";
$dvm["barometer_1hour_avg"] = "1021.6";
$dvm["barometer_day_max"] = "1021.9";	
$dvm["barometer_day_maxtime"] = "07:54";
$dvm["barometer_day_min"] = "1020.7";
$dvm["barometer_day_mintime"] = "00:06";

if ($weather["barometer_units"] == "in")
    {
        // standardize format
        $weather["barometer_units"] = "inHg";
    }

// Convert pressure units if necessary
if ($pressureunit != $dvm["barometer_units"])
{
    if (($pressureunit == 'hPa' && $dvm["barometer_units"] == 'mb') || ($pressureunit == 'mb' && $dvm["barometer_units"] == 'hPa') || ($pressureunit == 'kPa' && $dvm["barometer_units"] == 'mb') || ($pressureunit == 'mb' && $dvm["barometer_units"] == 'kPa') || ($pressureunit == 'kPa' && $dvm["barometer_units"] == 'hPa') || ($pressureunit == 'hPa' && $dvm["barometer_units"] == 'kPa'))
    {
        // 1 mb = 1 hPa so just change the unit being displayed
        $dvm["barometer_units"] = $pressureunit;
    }
    else if ($pressureunit == "inHg" && ($dvm["barometer_units"] == 'mb' || $dvm["barometer_units"] == 'hPa' || $dvm["barometer_units"] == 'kPa'))
    {
        mbToin($dvm, "barometer", ($dvm["barometer_units"] == 'kPa' ? 1000 : 1));
        mbToin($dvm, "barometer_yesterday_max", ($dvm["barometer_units"] == 'kPa' ? 1000 : 1));
        mbToin($dvm, "thb0seapressamin", ($dvm["barometer_units"] == 'kPa' ? 1000 : 1));
        mbToin($dvm, "thb0seapressymax", ($dvm["barometer_units"] == 'kPa' ? 1000 : 1));
        mbToin($dvm, "thb0seapressymin", ($dvm["barometer_units"] == 'kPa' ? 1000 : 1));
        mbToin($dvm, "thb0seapressydmax", ($dvm["barometer_units"] == 'kPa' ? 1000 : 1));
        mbToin($dvm, "thb0seapressydmin", ($dvm["barometer_units"] == 'kPa' ? 1000 : 1));
        mbToin($dvm, "thb0seapressmmax", ($dvm["barometer_units"] == 'kPa' ? 1000 : 1));
        mbToin($dvm, "thb0seapressmmin", ($dvm["barometer_units"] == 'kPa' ? 1000 : 1));
        mbToin($dvm, "barometer_trend", ($dvm["barometer_units"] == 'kPa' ? 1000 : 1));
        mbToin($dvm, "barometer_trend1", ($dvm["barometer_units"] == 'kPa' ? 1000 : 1));
        mbToin($dvm, "barometermovement", ($dvm["barometer_units"] == 'kPa' ? 1000 : 1));
        mbToin($dvm, "barometer_max", ($dvm["barometer_units"] == 'kPa' ? 1000 : 1));
        mbToin($dvm, "barometer_min", ($dvm["barometer_units"] == 'kPa' ? 1000 : 1));
        mbToin($dvm, "barometer_avg", ($dvm["barometer_units"] == 'kPa' ? 1000 : 1));
        mbToin($dvm, "barometert", ($dvm["barometer_units"] == 'kPa' ? 1000 : 1));
        mbToin($dvm, "barotrend", ($dvm["barometer_units"] == 'kPa' ? 1000 : 1));
        mbToin($dvm, "barometer_trendt", ($dvm["barometer_units"] == 'kPa' ? 1000 : 1));
        $dvm["barometer_units"] = $pressureunit;
    }
    else if (($pressureunit == "mb" || $pressureunit == 'hPa' || $pressureunit == 'kPa') && $dvm["barometer_units"] == 'inHg')
    {
        inTomb($dvm, "barometer", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($dvm, "["barometer_yesterday_max"]", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($dvm, "thb0seapressamin", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($dvm, "thb0seapressymax", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($dvm, "thb0seapressymin", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($dvm, "thb0seapressydmax", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($dvm, "thb0seapressydmin", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($dvm, "thb0seapressmmax", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($dvm, "thb0seapressmmin", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($dvm, "barometer_trend", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($dvm, "barometer_trend1", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($dvm, "barometermovement", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($dvm, "barometer_max", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($dvm, "barometer_min", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($dvm, "barometer_avg", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($dvm, "barometert", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($dvm, "barotrend", ($pressureunit == 'kPa' ? 0.001 : 1));
        inTomb($dvm, "barometer_trendt", ($pressureunit == 'kPa' ? 0.001 : 1));
        $dvm["barometer_units"] = $pressureunit;
    }
}

// Pressure
function mbToin(&$dvm, $field, $conversion){
	if(!isset($dvm[$field])) return;
	$dvm[$field] = round((float)(0.02952999*$dvm[$field] * $conversion), 2);
}

function inTomb(&$dvm, $field, $conversion){
	if(!isset($dvm[$field])) return;
	$dvm[$field] = round((float)(33.86388158*$dvm[$field] * $conversion), 2);
}


echo $dvm["barometer_yesterday_max"]."</br>";
?>