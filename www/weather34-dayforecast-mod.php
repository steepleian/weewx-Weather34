<?php 
	####################################################################################################
	#	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2015-2020			                           #
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at 													   #
	#   https://weather34.com/homeweatherstation/index.html 										   # 
	# 	WEATHER STATION TEMPLATE 2015-2020                 										       #
	# 	      Standalone Version Revised June 2020							                   		   #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
//original weather34 script original css/svg/php by weather34 2015-2020 clearly marked as original by weather34//
include('livedata.php');header('Content-type: text/html; charset=utf-8');error_reporting(0); date_default_timezone_set($TZ);	?>
<?php 
//start the wu output
$json='jsondata/wuforecast.txt';
$weather34wuurl=file_get_contents($json);
$parsed_weather34wujson = json_decode($weather34wuurl,false); 
{    
//weather34 wu null fallback
if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){
	$wuskydayIcon=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[1];	 
	$wuskydayTime = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[1];	
	$wuskydayTempHigh = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[1];	
	$wuskydayTempLow = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[1];	 
	$wuskydayWindGust = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[1];
	$wuskydayWinddir = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[1];
	$wuskydayWinddircardinal = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[1];
	$wuskydayacumm = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[1];
	$wuskydayPrecipType = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[1];
	$wuskydayprecipIntensity = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[1];
	$wuskydayPrecipProb = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[1];
	$wuskydayUV = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[1];
	$wuskydayUVdesc = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[1];	
	$wuskydaysnow = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[1];
	$wuskydaysummary = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[1];
	$wuskydaynight = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[1];
	$wuskydesc = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[1];
	$wuskythunder = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[1];
	$wuskyhumidity = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[1]; 
	$wuskysunrise = $parsed_weather34wujson->{'sunriseTimeUtc'}[1]; 
	$wuskysunset = $parsed_weather34wujson->{'sunsetTimeUtc'}[1];
	$wuskysunsetwu=date($timeformat, $wuskysunset);
	$wuskysunrisewu=date($timeformat, $wuskysunrise);
} 
   
	
	else {
	$wuskydayIcon=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0];	 
	$wuskydayTime = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[0];	
	$wuskydayTempHigh = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[0];	
	$wuskydayTempLow = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[0];	 
	$wuskydayWindGust = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[0];
	$wuskydayWinddir = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[0];
	$wuskydayWinddircardinal = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[0];
	$wuskydayacumm = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[0];
	$wuskydayPrecipType = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[0];
	$wuskydayprecipIntensity = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[0];
	$wuskydayPrecipProb = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[0];
	$wuskydayUV = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[0];
	$wuskydayUVdesc = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[0];	
	$wuskydaysnow = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[0];
	$wuskydaysummary = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[0];
	$wuskydaynight = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[0];
	$wuskydesc = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[0];
	$wuskythunder = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[0];
	$wuskyheatindex = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[0];
	$wuskyhumidity = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[0];
	$wuskysunrise = $parsed_weather34wujson->{'sunriseTimeUtc'}[0]; 
	$wuskysunset = $parsed_weather34wujson->{'sunsetTimeUtc'}[0];
	$wuskysunsetwu=date($timeformat, $wuskysunset);
	$wuskysunrisewu=date($timeformat, $wuskysunrise);
	}
	//weather34 wu 1st	 
	 if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){
	$wuskydayIcon1=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[2];	 
	$wuskydayTime1 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[2];	
	$wuskydayTempHigh1 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[2];	
	$wuskydayTempLow1 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[2];	 
	$wuskydayWindGust1 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[2];
	$wuskydayWinddir1 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[2];
	$wuskydayWinddircardinal1 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[2];
	$wuskydayacumm1 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[2];
	$wuskydayPrecipType1 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[2];
	$wuskydayprecipIntensity1 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[2];
	$wuskydayPrecipProb1 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[2];
	$wuskydayUV1 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[2];
	$wuskydayUVdesc1 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[2];	
	$wuskydaysnow1 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[2];
	$wuskydaysummary1 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[2];
	$wuskydaynight1 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[2];
	$wuskydesc1 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[2];
	$wuskythunder1 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[2];		
	$wuskyheatindex1 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[2]; 
	$wuskyhumidity1 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[2];
	}
	 else {	 
	$wuskydayIcon1=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[1];	 
	$wuskydayTime1 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[1];	
	$wuskydayTempHigh1 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[1];	
	$wuskydayTempLow1 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[1];
	$wuskydayWindGust1 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[1];
	$wuskydayWinddir1 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[1];
	$wuskydayWinddircardinal1 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[1];
	$wuskydayacumm1 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[1];
	$wuskydayPrecipType1 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[1];
	$wuskydayprecipIntensity1 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[1];
	$wuskydayPrecipProb1 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[1];
	$wuskydayUV1 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[1];
	$wuskydayUVdesc1 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[1];	
	$wuskydaysnow1 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[1];
	$wuskydaysummary1 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[1];
	$wuskydaynight1 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[1];
	$wuskydesc1 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[1];
	$wuskythunder1 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[1];
	$wuskyheatindex1 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[1]; 
	$wuskyhumidity1 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[1];
	 }
	//weather34 wu 2nd		 
	 if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){
	$wuskydayIcon2=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[3];	 
	$wuskydayTime2 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[3];	
	$wuskydayTempHigh2 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[3];	
	$wuskydayTempLow2 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[3];	 
	$wuskydayWindGust2 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[3];
	$wuskydayWinddir2 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[3];
	$wuskydayWinddircardinal2 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[3];
	$wuskydayacumm2 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[3];
	$wuskydayPrecipType2 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[3];
	$wuskydayprecipIntensity2 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[3];
	$wuskydayPrecipProb2 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[3];
	$wuskydayUV2 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[3];
	$wuskydayUVdesc2 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[3];	
	$wuskydaysnow2 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[3];
	$wuskydaysummary2 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[3];
	$wuskydaynight2 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[3];
	$wuskydesc2 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[3];
	$wuskythunder2 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[3];	 
	$wuskyheatindex2 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[3]; 
	$wuskyhumidity2 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[3];
}
else {
	
	$wuskydayIcon2=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[2];	 
	$wuskydayTime2 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[2];	
	$wuskydayTempHigh2 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[2];	
	$wuskydayTempLow2 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[2];
	$wuskydayWindGust2 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[2];
	$wuskydayWinddir2 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[2];
	$wuskydayWinddircardinal2 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[2];
	$wuskydayacumm2 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[2];
	$wuskydayPrecipType2 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[2];
	$wuskydayprecipIntensity2 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[2];
	$wuskydayPrecipProb2 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[2];
	$wuskydayUV2 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[2];
	$wuskydayUVdesc2 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[2];	
	$wuskydaysnow2 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[2];
	$wuskydaysummary2 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[2];
	$wuskydaynight2 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[2]; 
	$wuskydesc2 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[2];
	$wuskythunder2 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[2];
	$wuskyheatindex2 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[2];
	$wuskyhumidity2 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[2];
		  }
	//weather34 wu 3rd
	 if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){
	$wuskydayIcon3=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[4];	 
	$wuskydayTime3 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[4];	
	$wuskydayTempHigh3 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[4];	
	$wuskydayTempLow3 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[4];
	$wuskydayWindGust3 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[4];
	$wuskydayWinddir3 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[4];
	$wuskydayWinddircardinal3 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[4];
	$wuskydayacumm3 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[4];
	$wuskydayPrecipType3 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[4];
	$wuskydayprecipIntensity3 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[4];
	$wuskydayPrecipProb3 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[4];
	$wuskydayUV3 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[4];
	$wuskydayUVdesc3 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[4];
	$wuskydaysnow3 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[4];
	$wuskydaysummary3 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[4];
	$wuskydaynight3 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[4];	
	$wuskydesc3 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[4]; 
	$wuskythunder3 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[4];
	$wuskyheatindex3 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[4];
	$wuskyhumidity3 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[4];
	}
	else {
	$wuskydayIcon3=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[3];	 
	$wuskydayTime3 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[3];	
	$wuskydayTempHigh3 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[3];	
	$wuskydayTempLow3 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[3];
	$wuskydayWindGust3 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[3];
	$wuskydayWinddir3 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[3];
	$wuskydayWinddircardinal3 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[3];
	$wuskydayacumm3 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[3];
	$wuskydayPrecipType3 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[3];
	$wuskydayprecipIntensity3 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[3];
	$wuskydayPrecipProb3 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[3];
	$wuskydayUV3 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[3];
	$wuskydayUVdesc3 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[3];
	$wuskydaysnow3 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[3];
	$wuskydaysummary3 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[3];
	$wuskydaynight3 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[3];	
	$wuskydesc3 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[3]; 
	$wuskythunder3 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[3];
	$wuskyheatindex3 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[3]; 
	$wuskyhumidity3 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[3];	}	 
	 //weather34 wu 4th
	 if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){
	$wuskydayIcon4=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[5];	 
	$wuskydayTime4 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[5];	
	$wuskydayTempHigh4 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[5];	
	$wuskydayTempLow4 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[5];
	$wuskydayWindGust4 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[5];
	$wuskydayWinddir4 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[5];
	$wuskydayWinddircardinal4 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[5];
	$wuskydayacumm4 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[5];
	$wuskydayPrecipType4 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[5];
	$wuskydayprecipIntensity4 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[5];
	$wuskydayPrecipProb4 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[5];
	$wuskydayUV4 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[5];
	$wuskydayUVdesc4 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[5];
	$wuskydaysnow4 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[5];
	$wuskydaysummary4 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[5];
	$wuskydaynight4 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[5];
	$wuskydesc4 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[5];
	$wuskythunder4 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[5];
	$wuskyheatindex4 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[5]; 
	$wuskyhumidity4 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[5]; 
	}
	
	else {
	$wuskydayIcon4=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[4];	 
	$wuskydayTime4 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[4];	
	$wuskydayTempHigh4 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[4];	
	$wuskydayTempLow4 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[4];
	$wuskydayWindGust4 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[4];
	$wuskydayWinddir4 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[4];
	$wuskydayWinddircardinal4 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[4];
	$wuskydayacumm4 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[4];
	$wuskydayPrecipType4 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[4];
	$wuskydayprecipIntensity4 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[4];
	$wuskydayPrecipProb4 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[4];
	$wuskydayUV4 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[4];
	$wuskydayUVdesc4 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[4];
	$wuskydaysnow4 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[4];
	$wuskydaysummary4 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[4];
	$wuskydaynight4 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[4];
	$wuskydesc4 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[4];
	$wuskythunder4 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[4];
	$wuskyheatindex4 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[4];
	$wuskyhumidity4 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[4];

	}
	 //weather34 wu 5th
	   if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){
	$wuskydayIcon5=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[6];	 
	$wuskydayTime5 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[6];	
	$wuskydayTempHigh5 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[6];	
	$wuskydayTempLow5 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[6];
	$wuskydayWindGust5 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[6];
	$wuskydayWinddir5 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[6];
	$wuskydayWinddircardinal5 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[6];
	$wuskydayacumm5 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[6];
	$wuskydayPrecipType5 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[6];
	$wuskydayprecipIntensity5 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[6];
	$wuskydayPrecipProb5 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[6];
	$wuskydayUV5 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[6];
	$wuskydayUVdesc5 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[6];
	$wuskydaysnow5 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[6];
	$wuskydaysummary5 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[6];
	$wuskydaynight5 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[6];	
	$wuskydesc5 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[6]; 
	$wuskythunder5 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[6];
	$wuskyheatindex5 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[6];
	$wuskyhumidity5 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[6];
	} 	 
	 else {	 
	$wuskydayIcon5=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[5];	 
	$wuskydayTime5 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[5];	
	$wuskydayTempHigh5 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[5];	
	$wuskydayTempLow5 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[5];
	$wuskydayWindGust5 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[5];
	$wuskydayWinddir5 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[5];
	$wuskydayWinddircardinal5 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[5];
	$wuskydayacumm5 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[5];
	$wuskydayPrecipType5 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[5];
	$wuskydayprecipIntensity5 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[5];
	$wuskydayPrecipProb5 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[5];
	$wuskydayUV5 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[5];
	$wuskydayUVdesc5 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[5];
	$wuskydaysnow5 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[5];
	$wuskydaysummary5 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[5];
	$wuskydaynight5 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[5];	
	$wuskydesc5 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[5]; 
	$wuskythunder5 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[5];
	$wuskyheatindex5 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[5];
	$wuskyhumidity5 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[5];
	}
	 //weather34 wu 6th
	   if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){
	$wuskydayIcon6=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[7];	 
	$wuskydayTime6 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[7];	
	$wuskydayTempHigh6 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[7];	
	$wuskydayTempLow6 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[7];
	$wuskydayWindGust6 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[7];
	$wuskydayWinddir6 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[7];
	$wuskydayWinddircardinal6 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[7];
	$wuskydayacumm6 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[7];
	$wuskydayPrecipType6 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[7];
	$wuskydayprecipIntensity6 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[7];
	$wuskydayPrecipProb6 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[7];
	$wuskydayUV6 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[7];
	$wuskydayUVdesc6 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[7];
	$wuskydaysnow6 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[7];
	$wuskydaysummary6 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[7];
	$wuskydaynight6 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[7];
	$wuskydesc6 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[7];
	$wuskythunder6 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[7];
	$wuskyheatindex6 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[7];
	$wuskyhumidity6 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[7];
	}	 
	else{
	$wuskydayIcon6=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[6];	 
	$wuskydayTime6 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[6];	
	$wuskydayTempHigh6 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[6];	
	$wuskydayTempLow6 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[6];
	$wuskydayWindGust6 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[6];
	$wuskydayWinddir6 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[6];
	$wuskydayWinddircardinal6 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[6];
	$wuskydayacumm6 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[6];
	$wuskydayPrecipType6 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[6];
	$wuskydayprecipIntensity6 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[6];
	$wuskydayPrecipProb6 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[6];
	$wuskydayUV6 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[6];
	$wuskydayUVdesc6 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[6];
	$wuskydaysnow6 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[6];
	$wuskydaysummary6 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[6];
	$wuskydaynight6 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[6];
	$wuskydesc6 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[6];
	$wuskythunder6 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[6];
	$wuskyheatindex6 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[6];
	$wuskyhumidity6 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[6];
	}
	//weather34 wu 7th
	  if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){
	$wuskydayIcon7=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[8];	 
	$wuskydayTime7 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[8];	
	$wuskydayTempHigh7 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[8];	
	$wuskydayTempLow7 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[8];
	$wuskydayWindGust7 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[8];
	$wuskydayWinddir7 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[8];
	$wuskydayWinddircardinal7 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[8];
	$wuskydayacumm7 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[8];
	$wuskydayPrecipType7 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[8];
	$wuskydayprecipIntensity7 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[8];
	$wuskydayPrecipProb7 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[8];
	$wuskydayUV7 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[8];
	$wuskydayUVdesc7 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[8];
	$wuskydaysnow7 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[8];
	$wuskydaysummary7 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[8];	 
	$wuskydaynight7 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[8];
	$wuskydesc7 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[8];
	$wuskythunder7 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[8];
	$wuskyheatindex7 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[8];
	$wuskyhumidity7 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[8];
	}
	
	
	else{$wuskydayIcon7=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[7];	 
	$wuskydayTime7 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[7];	
	$wuskydayTempHigh7 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[7];	
	$wuskydayTempLow7 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[7];
	$wuskydayWindGust7 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[7];
	$wuskydayWinddir7 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[7];
	$wuskydayWinddircardinal7 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[7];
	$wuskydayacumm7 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[7];
	$wuskydayPrecipType7 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[7];
	$wuskydayprecipIntensity7 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[7];
	$wuskydayPrecipProb7 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[7];
	$wuskydayUV7 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[7];
	$wuskydayUVdesc7 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[7];
	$wuskydaysnow7 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[7];
	$wuskydaysummary7 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[7];	 
	$wuskydaynight7 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[7];
	$wuskydesc7 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[7];
	$wuskythunder7 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[7];
	$wuskyheatindex7 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[7];
	$wuskyhumidity7 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[7];
	}
		
}

//weather34 wu 8th
	  if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){
	$wuskydayIcon8=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[9];	 
	$wuskydayTime8 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[9];	
	$wuskydayTempHigh8 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[9];	
	$wuskydayTempLow8 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[9];
	$wuskydayWindGust8 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[9];
	$wuskydayWinddir8 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[9];
	$wuskydayWinddircardinal8 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[9];
	$wuskydayacumm8 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[9];
	$wuskydayPrecipType8 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[9];
	$wuskydayprecipIntensity8 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[9];
	$wuskydayPrecipProb8 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[9];
	$wuskydayUV8 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[9];
	$wuskydayUVdesc8 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[9];
	$wuskydaysnow8 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[9];
	$wuskydaysummary8 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[9];	 
	$wuskydaynight8 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[9];
	$wuskydesc8 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[9];
	$wuskythunder8 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[9];
	$wuskyheatindex8 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[9];
	$wuskyhumidity8 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[8];
	}
	
	
	else{$wuskydayIcon8=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[8];	 
	$wuskydayTime8 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[8];	
	$wuskydayTempHigh8 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[8];	
	$wuskydayTempLow8 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[8];
	$wuskydayWindGust8 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[8];
	$wuskydayWinddir8 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[8];
	$wuskydayWinddircardinal8 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[8];
	$wuskydayacumm8 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[8];
	$wuskydayPrecipType8 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[8];
	$wuskydayprecipIntensity8 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[8];
	$wuskydayPrecipProb8 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[8];
	$wuskydayUV8 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[8];
	$wuskydayUVdesc8 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[8];
	$wuskydaysnow8 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[8];
	$wuskydaysummary8 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[8];	 
	$wuskydaynight8 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[8];
	$wuskydesc8 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[8];
	$wuskythunder8 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[8];
	$wuskyheatindex8= $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[8];
	$wuskyhumidity8 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[8];
	}
		



//weather34 wu 9th
	  if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){
	$wuskydayIcon9=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[10];	 
	$wuskydayTime9 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[10];	
	$wuskydayTempHigh9 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[10];	
	$wuskydayTempLow9 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[10];
	$wuskydayWindGust9 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[10];
	$wuskydayWinddir9 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[10];
	$wuskydayWinddircardinal9 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[10];
	$wuskydayacumm9 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[10];
	$wuskydayPrecipType9 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[10];
	$wuskydayprecipIntensity9 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[10];
	$wuskydayPrecipProb9 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[10];
	$wuskydayUV9 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[10];
	$wuskydayUVdesc9 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[10];
	$wuskydaysnow9 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[10];
	$wuskydaysummary9 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[10];	 
	$wuskydaynight9 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[10];
	$wuskydesc9 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[10];
	$wuskythunder9 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[10];
	$wuskyheatindex9 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[10];
	$wuskyhumidity9 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[10];
	}
	
	
	else{$wuskydayIcon9=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[9];	 
	$wuskydayTime9 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[9];	
	$wuskydayTempHigh9 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[9];	
	$wuskydayTempLow9 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[9];
	$wuskydayWindGust9 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[9];
	$wuskydayWinddir9 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[9];
	$wuskydayWinddircardinal9 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[9];
	$wuskydayacumm9 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[9];
	$wuskydayPrecipType9 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[9];
	$wuskydayprecipIntensity9 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[9];
	$wuskydayPrecipProb9 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[9];
	$wuskydayUV9 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[9];
	$wuskydayUVdesc9 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[9];
	$wuskydaysnow9 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[9];
	$wuskydaysummary9 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[9];	 
	$wuskydaynight9 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[9];
	$wuskydesc9 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[9];
	$wuskythunder9 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[9];
	$wuskyheatindex9 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[9];
	$wuskyhumidity9 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[9];
	}
		



//weather34 wu 10th
	  if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){
	$wuskydayIcon10=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[11];	 
	$wuskydayTime10 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[11];	
	$wuskydayTempHigh10 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[11];	
	$wuskydayTempLow10 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[11];
	$wuskydayWindGust10 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[11];
	$wuskydayWinddir10 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[11];
	$wuskydayWinddircardinal10 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[11];
	$wuskydayacumm10 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[11];
	$wuskydayPrecipType10 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[11];
	$wuskydayprecipIntensity10 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[11];
	$wuskydayPrecipProb10 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[11];
	$wuskydayUV10 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[11];
	$wuskydayUVdesc10 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[11];
	$wuskydaysnow10 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[11];
	$wuskydaysummary10 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[11];	 
	$wuskydaynight10 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[11];
	$wuskydesc10 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[11];
	$wuskythunder10 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[11];
	$wuskyheatindex10 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[11];
	$wuskyhumidity10 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[11];
	}
	
	
	else{$wuskydayIcon10=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[10];	 
	$wuskydayTime10 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[10];	
	$wuskydayTempHigh10 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[10];	
	$wuskydayTempLow10 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[10];
	$wuskydayWindGust10 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[10];
	$wuskydayWinddir10 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[10];
	$wuskydayWinddircardinal10 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[10];
	$wuskydayacumm10 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[10];
	$wuskydayPrecipType10 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[10];
	$wuskydayprecipIntensity10 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[10];
	$wuskydayPrecipProb10 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[10];
	$wuskydayUV10 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[10];
	$wuskydayUVdesc10 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[10];
	$wuskydaysnow10 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[10];
	$wuskydaysummary10 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[10];	 
	$wuskydaynight10 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[10];
	$wuskydesc10 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[10];
	$wuskythunder10 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[10];
	$wuskyheatindex10 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[10];
	$wuskyhumidity10 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[10];
	}


//thunder
$wuskythunder1 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[1];
$wuskythunder2 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[2];
$wuskythunder3 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[3];
$wuskythunder4 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[4];
$wuskythunder5 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[5];
$wuskythunder6 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[6];
$wuskythunder7 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[7];
$wuskythunder8 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[8];
$wuskythunder9 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[9];
$wuskythunder10 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[10];
//period
$wuskydayTime1 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[1];
$wuskydayTime2 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[2];
$wuskydayTime3 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[3];
$wuskydayTime4 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[4];
$wuskydayTime5 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[5];
$wuskydayTime6 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[6];
$wuskydayTime7 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[7];
$wuskydayTime8 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[8];
$wuskydayTime9 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[9];
$wuskydayTime10 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[10];
//rain
$wuskyrain1 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[1];
$wuskyrain2 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[2];
$wuskyrain3 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[3];
$wuskyrain4 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[4];
$wuskyrain5 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[5];
$wuskyrain6 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[6];
$wuskyrain7 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[7];
$wuskyrain8 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[8];
$wuskyrain9 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[9];
$wuskyrain10 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[10];			 
//snow
$wuskysnow1 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[1];
$wuskysnow2 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[2];
$wuskysnow3 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[3];
$wuskysnow4 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[4];
$wuskysnow5 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[5];
$wuskysnow6 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[6];
$wuskysnow7 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[7]; 
$wuskysnow8 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[8];
$wuskysnow9 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[9];
$wuskysnow10 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[10];
 //heatindex
$wuskyheatindex1 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[1];
$wuskyheatindex2 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[2];
$wuskyheatindex3 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[3];
$wuskyheatindex4 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[4];
$wuskyheatindex5 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[5];
$wuskyheatindex6 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[6];
$wuskyheatindex7 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[7];	
 //uv index
$wuskydayUV1 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[1];
$wuskydayUV2 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[2];
$wuskydayUV3 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[3];
$wuskydayUV4 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[4];
$wuskydayUV5 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[5];
$wuskydayUV6 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[6];
$wuskydayUV7 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[7];
$wuskydayUV8 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[8];	 
$wuskydayTempHigh2=$parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[2];	 



	//wu convert temps-rain
   //metric to F
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh=($wuskydayTempHigh*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh=($wuskydayTempHigh*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh=($wuskydayTempHigh*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh=($wuskydayTempHigh-32)/1.8;}	
   
   //heatindex
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex=($wuskyheatindex*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex=($wuskyheatindex*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex=($wuskyheatindex*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex=($wuskyheatindex-32)/1.8;}	
   
   
   //rain inches to mm
   if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity=$wuskydayprecipIntensity*25.4;}
   //rain mm to inches scandinavia
   if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity=$wuskydayprecipIntensity*0.0393701;}
   //rain mm to inches uk
   if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity=$wuskydayprecipIntensity*0.0393701;}
   //rain mm to inches metric
   if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity=$wuskydayprecipIntensity*0.0393701;}
   //wu convert temps-rain period1 
   //metric to F
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh1=($wuskydayTempHigh1*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh1=($wuskydayTempHigh1*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh1=($wuskydayTempHigh1*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh1=($wuskydayTempHigh1-32)/1.8;}	
   
   //heatindex
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex1=($wuskyheatindex1*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex1=($wuskyheatindex1*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex1=($wuskyheatindex1*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex1=($wuskyheatindex1-32)/1.8;}	
   
   
   
   //rain inches to mm
   if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity1=$wuskydayprecipIntensity1*25.4;}
   //rain mm to inches scandinavia
   if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity1=$wuskydayprecipIntensity1*0.0393701;}
   //rain mm to inches uk
   if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity1=$wuskydayprecipIntensity1*0.0393701;}
   //rain mm to inches metric
   if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity1=$wuskydayprecipIntensity1*0.0393701;}
   //wu convert temps-rain period2 
   //metric to F
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh2=($wuskydayTempHigh2*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh2=($wuskydayTempHigh2*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh2=($wuskydayTempHigh2*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh2=($wuskydayTempHigh2-32)/1.8;}	
   
   //heatindex
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex2=($wuskyheatindex2*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex2=($wuskyheatindex2*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex2=($wuskyheatindex2*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex2=($wuskyheatindex2-32)/1.8;}	
   
   //rain inches to mm
   if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity2=$wuskydayprecipIntensity2*25.4;}
   //rain mm to inches scandinavia
   if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity2=$wuskydayprecipIntensity2*0.0393701;}
   //rain mm to inches uk
   if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity2=$wuskydayprecipIntensity2*0.0393701;}
   //rain mm to inches metric
   if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity2=$wuskydayprecipIntensity2*0.0393701;}
   //wu convert temps-rain period3 
   //metric to F
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh3=($wuskydayTempHigh3*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh3=($wuskydayTempHigh3*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh3=($wuskydayTempHigh3*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh3=($wuskydayTempHigh3-32)/1.8;}	
   
   //heatindex
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex3=($wuskyheatindex3*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex3=($wuskyheatindex3*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex3=($wuskyheatindex3*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex3=($wuskyheatindex3-32)/1.8;}	
   
   //rain inches to mm
   if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity3=$wuskydayprecipIntensity3*25.4;}
   //rain mm to inches scandinavia
   if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity3=$wuskydayprecipIntensity3*0.0393701;}
   //rain mm to inches uk
   if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity3=$wuskydayprecipIntensity3*0.0393701;}
   //rain mm to inches metric
   if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity3=$wuskydayprecipIntensity3*0.0393701;}
   //wu convert temps-rain period4 
   //metric to F
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh4=($wuskydayTempHigh4*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh4=($wuskydayTempHigh4*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh4=($wuskydayTempHigh4*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh4=($wuskydayTempHigh4-32)/1.8;}	
   //heatindex
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex4=($wuskyheatindex4*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex4=($wuskyheatindex4*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex4=($wuskyheatindex4*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex4=($wuskyheatindex4-32)/1.8;}	
   
   //rain inches to mm
   if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity4=$wuskydayprecipIntensity4*25.4;}
   //rain mm to inches scandinavia
   if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity4=$wuskydayprecipIntensity4*0.0393701;}
   //rain mm to inches uk
   if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity4=$wuskydayprecipIntensity4*0.0393701;}
   //rain mm to inches metric
   if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity4=$wuskydayprecipIntensity4*0.0393701;}
   //wu convert temps-rain period5 
   //metric to F
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh5=($wuskydayTempHigh5*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh5=($wuskydayTempHigh5*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh5=($wuskydayTempHigh5*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh5=($wuskydayTempHigh5-32)/1.8;}
   
   //heatindex
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex5=($wuskyheatindex5*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex5=($wuskyheatindex5*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex5=($wuskyheatindex5*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex5=($wuskyheatindex5-32)/1.8;}	
	   
   //rain inches to mm
   if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity5=$wuskydayprecipIntensity5*25.4;}
   //rain mm to inches scandinavia
   if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity5=$wuskydayprecipIntensity5*0.0393701;}
   //rain mm to inches uk
   if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity5=$wuskydayprecipIntensity5*0.0393701;}
   //rain mm to inches metric
   if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity5=$wuskydayprecipIntensity5*0.0393701;}
   //wu convert temps-rain period6 
   //metric to F
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh6=($wuskydayTempHigh6*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh6=($wuskydayTempHigh6*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh6=($wuskydayTempHigh6*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh6=($wuskydayTempHigh6-32)/1.8;}
   
   //heatindex
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex6=($wuskyheatindex6*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex6=($wuskyheatindex6*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex6=($wuskyheatindex6*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex6=($wuskyheatindex6-32)/1.8;}	
	   
   //rain inches to mm
   if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity6=$wuskydayprecipIntensity6*25.4;}
   //rain mm to inches scandinavia
   if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity6=$wuskydayprecipIntensity6*0.0393701;}
   //rain mm to inches uk
   if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity6=$wuskydayprecipIntensity6*0.0393701;}
   //rain mm to inches metric
   if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity6=$wuskydayprecipIntensity6*0.0393701;}	
   //wu convert temps-rain period7 
   //metric to F
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh7=($wuskydayTempHigh7*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh7=($wuskydayTempHigh7*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh7=($wuskydayTempHigh7*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh7=($wuskydayTempHigh7-32)/1.8;}	
   
   //heatindex
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex7=($wuskyheatindex7*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex7=($wuskyheatindex7*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex7=($wuskyheatindex7*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex7=($wuskyheatindex7-32)/1.8;}	
   
   
   //rain inches to mm
   if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity7=$wuskydayprecipIntensity7*25.4;}
   //rain mm to inches scandinavia
   if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity7=$wuskydayprecipIntensity7*0.0393701;}
   //rain mm to inches uk
   if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity7=$wuskydayprecipIntensity7*0.0393701;}
   //rain mm to inches metric
   if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity7=$wuskydayprecipIntensity7*0.0393701;}	
   //wu convert temps-rain period 8 
   //metric to F
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh8=($wuskydayTempHigh8*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh8=($wuskydayTempHigh8*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh8=($wuskydayTempHigh8*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh8=($wuskydayTempHigh8-32)/1.8;}	
   
   
   //heatindex
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex8=($wuskyheatindex8*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex8=($wuskyheatindex8*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex8=($wuskyheatindex8*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex8=($wuskyheatindex8-32)/1.8;}	
   
   
   //rain inches to mm
   if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity8=$wuskydayprecipIntensity8*25.4;}
   //rain mm to inches scandinavia
   if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity8=$wuskydayprecipIntensity8*0.0393701;}
   //rain mm to inches uk
   if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity8=$wuskydayprecipIntensity8*0.0393701;}
   //rain mm to inches metric
   if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity8=$wuskydayprecipIntensity8*0.0393701;}	
   //wu convert temps-rain period 9 
   //metric to F
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh9=($wuskydayTempHigh9*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh9=($wuskydayTempHigh9*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh9=($wuskydayTempHigh9*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh9=($wuskydayTempHigh9-32)/1.8;}	
   //heatindex
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex9=($wuskyheatindex9*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex9=($wuskyheatindex9*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex9=($wuskyheatindex9*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex9=($wuskyheatindex9-32)/1.8;}	
   
   //rain inches to mm
   if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity9=$wuskydayprecipIntensity9*25.4;}
   //rain mm to inches scandinavia
   if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity9=$wuskydayprecipIntensity9*0.0393701;}
   //rain mm to inches uk
   if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity9=$wuskydayprecipIntensity9*0.0393701;}
   //rain mm to inches metric
   if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity9=$wuskydayprecipIntensity9*0.0393701;}	
   //wu convert temps-rain period 10 
   //metric to F
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh10=($wuskydayTempHigh10*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh10=($wuskydayTempHigh10*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh10=($wuskydayTempHigh10*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh10=($wuskydayTempHigh10-32)/1.8;}	
   
   //heatindex
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex10=($wuskyheatindex10*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex10=($wuskyheatindex10*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex10=($wuskyheatindex10*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex10=($wuskyheatindex10-32)/1.8;}	
   
   
   //rain inches to mm
   if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity10=$wuskydayprecipIntensity10*25.4;}
   //rain mm to inches scandinavia
   if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity10=$wuskydayprecipIntensity10*0.0393701;}
   //rain mm to inches uk
   if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity10=$wuskydayprecipIntensity10*0.0393701;}
   //rain mm to inches metric
   if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity10=$wuskydayprecipIntensity10*0.0393701;}	
   //wu convert temps-rain period 11 
   //metric to F
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh11=($wuskydayTempHigh11*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh11=($wuskydayTempHigh11*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh11=($wuskydayTempHigh11*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh11=($wuskydayTempHigh11-32)/1.8;}	
   
   //heatindex
   if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex11=($wuskyheatindex11*9/5)+32;}	
   // metric to F UK
   if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex11=($wuskyheatindex11*9/5)+32;}	
   // ms non metric Scandinavia 
   if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex11=($wuskyheatindex11*9/5)+32;}	
   // non metric to c US
   if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex11=($wuskyheatindex11-32)/1.8;}	
   
   //rain inches to mm
   if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity11=$wuskydayprecipIntensity11*25.4;}
   //rain mm to inches scandinavia
   if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity11=$wuskydayprecipIntensity11*0.0393701;}
   //rain mm to inches uk
   if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity11=$wuskydayprecipIntensity11*0.0393701;}
   //rain mm to inches metric
   if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity11=$wuskydayprecipIntensity11*0.0393701;}
   
   
   
   
   // mph to kmh US
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*0.621371);}	



// mph to kmh US 1
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust1=(number_format($wuskydayWindGust1,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust1=(number_format($wuskydayWindGust1,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust1=(number_format($wuskydayWindGust1,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust1=(number_format($wuskydayWindGust1,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust1=(number_format($wuskydayWindGust1,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust1=(number_format($wuskydayWindGust1,1)*0.621371);}	



// mph to kmh US 2
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust2=(number_format($wuskydayWindGust2,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust2=(number_format($wuskydayWindGust2,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust2=(number_format($wuskydayWindGust2,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust2=(number_format($wuskydayWindGust2,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust2=(number_format($wuskydayWindGust2,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust2=(number_format($wuskydayWindGust2,1)*0.621371);}	



// mph to kmh US 3
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust3=(number_format($wuskydayWindGust3,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust3=(number_format($wuskydayWindGust3,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust3=(number_format($wuskydayWindGust3,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust3=(number_format($wuskydayWindGust3,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust3=(number_format($wuskydayWindGust3,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust3=(number_format($wuskydayWindGust3,1)*0.621371);}	


// mph to kmh US 4
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust4=(number_format($wuskydayWindGust4,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust4=(number_format($wuskydayWindGust4,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust4=(number_format($wuskydayWindGust4,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust4=(number_format($wuskydayWindGust4,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust4=(number_format($wuskydayWindGust4,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust4=(number_format($wuskydayWindGust4,1)*0.621371);}	


// mph to kmh US 5
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust5=(number_format($wuskydayWindGust5,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust5=(number_format($wuskydayWindGust5,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust5=(number_format($wuskydayWindGust5,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust5=(number_format($wuskydayWindGust5,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust5=(number_format($wuskydayWindGust5,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust5=(number_format($wuskydayWindGust5,1)*0.621371);}	


   

// mph to kmh US 6
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust6=(number_format($wuskydayWindGust6,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust6=(number_format($wuskydayWindGust6,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust6=(number_format($wuskydayWindGust6,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust6=(number_format($wuskydayWindGust6,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust6=(number_format($wuskydayWindGust6,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust6=(number_format($wuskydayWindGust6,1)*0.621371);}	


   

// mph to kmh US 7
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust7=(number_format($wuskydayWindGust7,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust7=(number_format($wuskydayWindGust7,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust7=(number_format($wuskydayWindGust7,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust7=(number_format($wuskydayWindGust7,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust7=(number_format($wuskydayWindGust7,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust7=(number_format($wuskydayWindGust7,1)*0.621371);}	




// mph to kmh US 8
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust8=(number_format($wuskydayWindGust8,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust8=(number_format($wuskydayWindGust8,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust8=(number_format($wuskydayWindGust8,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust8=(number_format($wuskydayWindGust8,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust8=(number_format($wuskydayWindGust8,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust8=(number_format($wuskydayWindGust8,1)*0.621371);}



// mph to kmh US 9
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust9=(number_format($wuskydayWindGust9,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust9=(number_format($wuskydayWindGust9,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust9=(number_format($wuskydayWindGust9,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust9=(number_format($wuskydayWindGust9,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust9=(number_format($wuskydayWindGust9,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust9=(number_format($wuskydayWindGust9,1)*0.621371);}	



// mph to kmh US 10
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust10=(number_format($wuskydayWindGust10,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust10=(number_format($wuskydayWindGust10,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust10=(number_format($wuskydayWindGust10,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust10=(number_format($wuskydayWindGust10,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust10=(number_format($wuskydayWindGust10,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust10=(number_format($wuskydayWindGust10,1)*0.621371);}	

// mph to kmh US 11
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust11=(number_format($wuskydayWindGust11,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust11=(number_format($wuskydayWindGust11,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust11=(number_format($wuskydayWindGust11,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust11=(number_format($wuskydayWindGust11,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust11=(number_format($wuskydayWindGust11,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust11=(number_format($wuskydayWindGust11,1)*0.621371);}	

//icon + day wu
echo '<div class="modulecaptionwu">';echo 'Forecast '.$wuskydayTime.'</div>
<br>
<div class="wuicon-2">';
if ($wuskydaynight=='D'){echo '<img src="wuicons/'.$wuskydayIcon.'.svg" width="20" height="20" alt="'.$wuskydesc.'" title="'.$wuskydesc.'"></img>';}
if ($wuskydaynight=='N'){echo '<img src="wuicons/nt_'.$wuskydayIcon.'.svg" width="20" height="20 alt="'.$wuskydesc.'" title="'.$wuskydesc.'"></img>';}
// icon description
$wuskydesc	=str_replace('Wind', 'Windy'. 'Conditions', $wuskydesc);
$wuskydesc	=str_replace('/', ' ', $wuskydesc);

$wuskydesc	=str_replace('Scattered', ' ', $wuskydesc);
$wuskydesc1	=str_replace('Scattered', ' ', $wuskydesc1);
$wuskydesc2	=str_replace('Scattered', ' ', $wuskydesc2);
$wuskydesc3	=str_replace('Scattered', ' ', $wuskydesc3);
$wuskydesc	=str_replace('Isolated', ' ', $wuskydesc);
$wuskydesc1	=str_replace('Isolated', ' ', $wuskydesc1);
$wuskydesc2	=str_replace('Isolated', ' ', $wuskydesc2);
$wuskydesc3	=str_replace('Isolated', ' ', $wuskydesc3);
echo "";
echo '</div>';?>
<style>
.dirwu34 {
transform:rotate(<?php echo $wuskydayWinddir?>deg);	
-webkit-transform:rotate(<?php echo $wuskydayWinddir?>deg);	
-moz-transform:rotate(<?php echo $wuskydayWinddir?>deg);	
-o-transform:rotate(<?php echo $wuskydayWinddir?>deg);
-ms-transform:rotate(<?php echo $wuskydayWinddir?>deg);	
display:inline;
position:absolute;		
-ms-transform-origin: 50% 40%;
transform-origin: 50% 40%;
	}
</style>
<?php echo '
<div class="button button-dial">     
<div class="button-dial-top"></div>
<div class=wudirection>&nbsp;&nbsp;<div class="dirwu34">'.$weather34compassiconwu ."</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$wuskydayWinddircardinal.'<wuwindgust>'.number_format($wuskydayWindGust,0) ." ". $windunit."<blue> "
.$weather34_wind_iconwu.'</blue></wuwindgust></div>
<div class="button-dial-label">';
//temp non metric wu
if ($weather["temp_units"]=='F'){
if($wuskydayTempHigh<44.6){echo '<blue>'.number_format($wuskydayTempHigh,0).'°</red>';}
else if($wuskydayTempHigh>104){echo '<purple>'.number_format($wuskydayTempHigh,0).'°</purple>';}
else if($wuskydayTempHigh>80.6){echo '<red>'.number_format($wuskydayTempHigh,0).'°</red>';}
else if($wuskydayTempHigh>66.2){echo '<orange>'.number_format($wuskydayTempHigh,0).'°</orange>';}
else if($wuskydayTempHigh>55){echo '<yellow>'.number_format($wuskydayTempHigh,0).'°</yellow>';}
else if($wuskydayTempHigh>=44.6){echo '<green>'.number_format($wuskydayTempHigh,0).'°</green>';}}
//temp metric wu
if ($weather["temp_units"]=='C'){
if($wuskydayTempHigh<7 && $weather["temp_units"]=='C'){echo '<blue>'.number_format($wuskydayTempHigh,0).'°</blue>';}
else if($wuskydayTempHigh>40){echo '<purple>'.number_format($wuskydayTempHigh,0).'°</purple>';}
else if($wuskydayTempHigh>27){echo '<red>'.number_format($wuskydayTempHigh,0).'°</red>';}
else if($wuskydayTempHigh>19){echo '<orange>'.number_format($wuskydayTempHigh,0).'°</orange>';}
else if($wuskydayTempHigh>12.7){echo '<yellow>'.number_format($wuskydayTempHigh,0).'°</yellow>';}
else if( $wuskydayTempHigh>=7){echo '<green>'.number_format($wuskydayTempHigh,0).'°</green>';}}


echo '<wuprob>'.$umbrellawu." ".$wuskydayPrecipProb.'%</wuprob></div>';
?></div></div></div></div>


<div class="heatcircle"><div class="heatcircle-content" style="font-size:.65em">
<?php  
echo "<valuetextheading1>".$wuskydayTime1." </valuetextheading1><br>";
echo "<div class=windirectiondata>";
echo "".number_format($wuskydayTempHigh1,0)."°&nbsp;" .$umbrellawu." ".$wuskydayPrecipProb1."%"; 
	if ($wuskydaynight1=='N'){ 	echo '<img src="wuicons/nt_'.$wuskydayIcon1.'.svg" width="25" height="15"></img>';}	
	else if ($wuskydaynight1=='D'){ echo '<img src="wuicons/'.$wuskydayIcon1.'.svg" width="25" height="15"></img>';}
?><smalltempunit2></div></div>

<div class="heatcircle2"><div class="heatcircle-content" style="font-size:.65em">
<?php  
echo "<valuetextheading1>".$wuskydayTime2." </valuetextheading1><br>";
echo "<div class=windirectiondata>";
echo "".number_format($wuskydayTempHigh2,0)."°&nbsp;" .$umbrellawu." ".$wuskydayPrecipProb2."%"; 
	if ($wuskydaynight2=='N'){ 	echo '<img src="wuicons/nt_'.$wuskydayIcon2.'.svg" width="25" height="15"></img>';}	
	else if ($wuskydaynight2=='D'){	
	echo '<img src="wuicons/'.$wuskydayIcon2.'.svg" width="25" height="15"></img>';}
?><smalltempunit2></div></div>

<div class="heatcircle2"><div class="heatcircle-content" style="font-size:.65em">
<?php  
echo "<valuetextheading1>".$wuskydayTime3." </valuetextheading1><br>";
echo "<div class=windirectiondata>";
echo "".number_format($wuskydayTempHigh3,0)."°&nbsp;" .$umbrellawu." ".$wuskydayPrecipProb3."%"; 
	if ($wuskydaynight3=='N'){ 	echo '<img src="wuicons/nt_'.$wuskydayIcon3.'.svg" width="25" height="15"></img>';}	
	else if ($wuskydaynight3=='D'){	
	echo '<img src="wuicons/'.$wuskydayIcon3.'.svg" width="25" height="15"></img>';}
?><smalltempunit2></div></div>

<div class=thetrendgap>
<div class=thetrendboxwu>

<?php 

if ($wuskythunder>0 )  {echo 'Thunderstorms expected '.$wuskydayTime.'';}
else if ($wuskythunder1>0 )  {echo ' <orange>Thunderstorms</orange>	 '.$wuskydayTime1. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder2>0 )  {echo ' <orange>Thunderstorms</orange>	 '.$wuskydayTime2. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder3>0 )  {echo ' <orange>Thunderstorms</orange>	 '.$wuskydayTime3. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder4>0 )  {echo ' <orange>Thunderstorms</orange>	 '.$wuskydayTime4. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder5>0 )  {echo ' <orange>Thunderstorms</orange>	 '.$wuskydayTime5. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder6>0 )  {echo ' <orange>Thunderstorms</orange>	 '.$wuskydayTime6. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder7>0 )  {echo ' <orange>Thunderstorms</orange>	 '.$wuskydayTime7. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder8>0 )  {echo ' <orange>Thunderstorms</orange>	 '.$wuskydayTime8. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder9>0 )  {echo ' <orange>Thunderstorms</orange>	 '.$wuskydayTime9. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder10>0 )  {echo ' <orange>Thunderstorms</orange>	 '.$wuskydayTime10. '&nbsp;'.$lightningalert8.'';}
//snowfall wu
else if ($wuskysnow>0 )  {echo ' <blue>Snow</blue>	'.$wuskydayTime. '&nbsp;'.$freezing.'';}
else if ($wuskysnow1>0 )  {echo ' <blue>Snow</blue>	'.$wuskydayTime1. '&nbsp;'.$freezing.'';}
else if ($wuskysnow2>0 )  {echo ' <blue>Snow</blue>	'.$wuskydayTime2. '&nbsp;'.$freezing.'';}
else if ($wuskysnow3>0 )  {echo ' <blue>Snow</blue>	'.$wuskydayTime3. '&nbsp;'.$freezing.'';}
else if ($wuskysnow4>0 )  {echo ' <blue>Snow</blue>	'.$wuskydayTime4. '&nbsp;'.$freezing.'';}
else if ($wuskysnow5>0 )  {echo ' <blue>Snow</blue>	'.$wuskydayTime5. '&nbsp;'.$freezing.'';}
else if ($wuskysnow6>0 )  {echo ' <blue>Snow</blue>	'.$wuskydayTime6. '&nbsp;'.$freezing.'';}
else if ($wuskysnow7>0 )  {echo ' <blue>Snow</blue>	'.$wuskydayTime7. '&nbsp;'.$freezing.'';}
else if ($wuskysnow8>0 )  {echo ' <blue>Snow</blue>	'.$wuskydayTime8. '&nbsp;'.$freezing.'';}
else if ($wuskysnow9>0 )  {echo ' <blue>Snow</blue>	'.$wuskydayTime9. '&nbsp;'.$freezing.'';}
else if ($wuskysnow10>0 )  {echo ' <blue>Snow</blue>	'.$wuskydayTime10. '&nbsp;'.$freezing.'';}
//rainfall wu
else if ($wuskyrain>0 )  {echo ' <blue>Rain</blue>	'.$wuskydayTime. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain1>0 )  {echo ' <blue>Rain</blue>	'.$wuskydayTime1.'&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain2>0 )  {echo ' <blue>Rain</blue>	'.$wuskydayTime2.'&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain3>0 )  {echo ' <blue>Rain</blue>	'.$wuskydayTime3. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain4>0 )  {echo ' <blue>Rain</blue>	'.$wuskydayTime4. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain5>0 )  {echo ' <blue>Rain</blue>	'.$wuskydayTime5. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain6>0 )  {echo ' <blue>Rain</blue>	'.$wuskydayTime6. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain7>0 )  {echo ' <blue>Rain</blue>	'.$wuskydayTime7. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain8>0 )  {echo ' <blue>Rain</blue>	'.$wuskydayTime8. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain9>0 )  {echo ' <blue>Rain</blue>	'.$wuskydayTime9. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain10>0 )  {echo ' <blue>Rain</blue>	'.$wuskydayTime10. '&nbsp;'.$rainfallalert8.'';}
//metric heat index wu
else if ($weather["temp_units"]=='C'){
if ($wuskyheatindex>=30 )  {echo "<red>High</red>&nbsp";echo ' Heat Index&nbsp; '.$wuskydayTime. '&nbsp;'.$heatindexwu2.'';}
else if ($wuskyheatindex1>=30 )  {echo "<red>High</red>&nbsp";echo ' Heat Index&nbsp; '.$wuskydayTime1. '&nbsp;'.$heatindexwu2.'';}
else if ($wuskyheatindex2>=30 )  {echo "<red>High</red>&nbsp";echo ' Heat Index&nbsp; '.$wuskydayTime2. '&nbsp;'.$heatindexwu2.'';}
else if ($wuskyheatindex3>=30 )  {echo "<red>High</red>&nbsp";echo ' Heat Index&nbsp; '.$wuskydayTime3. '&nbsp;'.$heatindexwu2.'';}
else if ($wuskyheatindex4>=30 )  {echo "<red>High</red>&nbsp";echo ' Heat Index&nbsp; '.$wuskydayTime4. '&nbsp;'.$heatindexwu2.'';}
}
//non metric heat index wu
else if ($weather["temp_units"]=='F'){	
if ($wuskyheatindex>=86 )  {echo "<red>High</red>&nbsp";echo ' Heat Index&nbsp; '.$wuskydayTime. '&nbsp;'.$heatindexwu2.'';}
	else if ($wuskyheatindex1>=86 )  {echo "<red>High</red>&nbsp";echo ' Heat Index&nbsp; '.$wuskydayTime1. '&nbsp;'.$heatindexwu2.'';}
	else if ($wuskyheatindex2>=86 )  {echo "<red>High</red>&nbsp";echo ' Heat Index&nbsp; '.$wuskydayTime2. '&nbsp;'.$heatindexwu2.'';}
	else if ($wuskyheatindex3>=86 )  {echo "<red>High</red>&nbsp";echo ' Heat Index&nbsp; '.$wuskydayTime3. '&nbsp;'.$heatindexwu2.'';}
	else if ($wuskyheatindex4>=86 )  {echo "<red>High</red>&nbsp";echo ' Heat Index&nbsp; '.$wuskydayTime4. '&nbsp;'.$heatindexwu2.'';}
}
//tomorrow temperature 
//imperial
else if ($weather["temp_units"]=='F'){
if ($wuskydayTempHigh2>80.6 ){  echo "<red>".number_format($wuskydayTempHigh2,0). "°".$weather['temp_units']."</red>&nbsp;", $wuskydayTime2."";}
else if ($wuskydayTempHigh2>66.2 ){  echo "<orange>".number_format($wuskydayTempHigh2,0). "°".$weather['temp_units']."</orange>&nbsp;", $wuskydayTime2."";}
else if ($wuskydayTempHigh2>=55 ){  echo "<yellow>".number_format($wuskydayTempHigh2,0). "°".$weather['temp_units']."</yellow>&nbsp;", $wuskydayTime2."";}
else if ($wuskydayTempHigh2>=44.6 ){  echo "<green>".number_format($wuskydayTempHigh2,0). "°".$weather['temp_units']."</green>&nbsp;", $wuskydayTime2."";}
else if ($wuskydayTempHigh2>-50 ){  echo "<blue>".number_format($wuskydayTempHigh2,0). "°".$weather['temp_units']."</blue>&nbsp;", $wuskydayTime2."";}}
//metric
else if ($weather["temp_units"]=='C'){
if ($wuskydayTempHigh2>27 ){  echo "<red>".number_format($wuskydayTempHigh2,0). "°".$weather['temp_units']."</red>&nbsp;", $wuskydayTime2."";}
else if ($wuskydayTempHigh2>=19 ){  echo "<orange>".number_format($wuskydayTempHigh2,0). "°".$weather['temp_units']."</orange>&nbsp;", $wuskydayTime2."";}
else if ($wuskydayTempHigh2>=12.7 ){  echo "<yellow>".number_format($wuskydayTempHigh2,0). "°".$weather['temp_units']."</yellow>&nbsp;", $wuskydayTime2."";}
else if ($wuskydayTempHigh2>=7 ){  echo "<green>".number_format($wuskydayTempHigh2,0). "°".$weather['temp_units']."</green>&nbsp;", $wuskydayTime2."";}
else if ($wuskydayTempHigh2>-50 ){  echo "<blue>".number_format($wuskydayTempHigh2,0). "°".$weather['temp_units']."</blue>&nbsp;", $wuskydayTime2."";}}
?></div></div></div></div>