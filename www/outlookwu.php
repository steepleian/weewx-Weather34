<?php
include_once('settings.php');include('w34CombinedData.php');
	####################################################################################################
	#	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2016-18-19                                    #
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE https://weather34.com/homeweatherstation/index.html # 
	# 	                                                                                               #
	# 	                                                                                               #
	# 	FORECAST WU WEATHER FORECAST: Original FEB 2019	(Updated May 2019)  			               #
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
	//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
	
//start the wu output
$json='jsondata/wuforecast.txt';
$weather34wuurl=file_get_contents($json);
$parsed_weather34wujson = json_decode($weather34wuurl,false);
$parsed_weather34wujson1 = json_decode($weather34wuurl,true);
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
	 $wuskythunder = $parsed_weather34wujson->{'daypart'}[0]->{'thunderCategory'}[1];}	 
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
	 $wuskythunder = $parsed_weather34wujson->{'daypart'}[0]->{'thunderCategory'}[0];
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
	 $wuskythunder1 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderCategory'}[2];}		 
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
	 $wuskythunder1 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderCategory'}[1];
	 
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
	 $wuskythunder2 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderCategory'}[3];	 
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
	 $wuskythunder2 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderCategory'}[2];	 }
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
	 $wuskythunder3 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderCategory'}[4];	}
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
	 $wuskythunder3 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderCategory'}[3];	}	 
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
	 $wuskythunder4 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderCategory'}[5];}
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
	 $wuskythunder4 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderCategory'}[4];}
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
	 $wuskythunder5 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderCategory'}[6];} 	 
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
	 $wuskythunder5 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderCategory'}[5];}
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
	 $wuskythunder6 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderCategory'}[7];}	 
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
	 $wuskythunder6 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderCategory'}[6];}
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
	 $wuskythunder7 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderCategory'}[8];}
	 
	 
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
	 $wuskythunder7 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderCategory'}[7];}
		 
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
	 $wuskythunder8 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderCategory'}[9];}
	 
	 
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
	 $wuskythunder8 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderCategory'}[8];}
		 



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
	 $wuskythunder9 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderCategory'}[10];}
	 
	 
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
	 $wuskythunder9 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderCategory'}[9];}
		 



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
	 $wuskythunder10 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderCategory'}[11];}
	 
	 
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
	 $wuskythunder10 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderCategory'}[10];}
	 //wu convert temps-rain
	//metric to F
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh=($wuskydayTempHigh*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh=($wuskydayTempHigh*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh=($wuskydayTempHigh*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh=($wuskydayTempHigh-32)/1.8;}	
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
	
	
		
	
	
?>
<script src="js/jquery.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 Weather Underground Forecast</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@font-face{font-family:weathertext2;src:url(css/fonts/verbatim-regular.woff) format("woff"),url(fonts/verbatim-regular.woff2) format("woff2"),url(fonts/verbatim-regular.ttf) format("truetype")}
html,body{font-size:13px;font-family: "weathertext2", Helvetica, Arial, sans-serif;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;}
.grid { 
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  grid-gap: 5px;
  align-items: stretch;
  color:#f5f7fc
  }
.grid > article {
 border: 1px solid rgba(245, 247, 252,.02);
  box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.6);
  padding:5px;
  font-size:0.8em;
  -webkit-border-radius:4px;
  border-radius:4px;
  background:0;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;
}
.grid > article img {
  max-width: 100%;
}
.grid > article rainsnow{
	vertical-align:bottom;float:right}
	
.grid > article actualt{vertical-align:top;float:left-webkit-border-radius:2px;border-radius:2px;background:rgba(86, 95, 103,.2);font-family:Arial, Helvetica, sans-serif;padding:1px 3px 1px 3px;width:6rem;font-size:0.8rem;color:#c0c0c0;align-items:center;justify-content:center;margin-bottom:10px;top:-2px;display:flex}	
.grid > article tempicon{vertical-align:top;float:right;font-size:1.1em;margin-top:-20px;margin-right:20px}

.grid > article .summarytext{font-size:.9em;color:#aaa;margin-bottom:0px;height:50px;line-height:10px;font-family:Arial, Helvetica, sans-serif}
 .weather34chart-btn.close:after,.weather34chart-btn.close:before{color:#ccc;position:absolute;font-size:14px;font-family:Arial,Helvetica,sans-serif;font-weight:600}.weather34browser-header{flex-basis:auto;height:35px;background:#ebebeb;background:0;border-bottom:0;display:flex;margin-top:-20px;width:100%;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-moz-border-radius-topleft:5px;-moz-border-radius-topright:5px;border-top-left-radius:5px;border-top-right-radius:5px}.weather34browser-footer{flex-basis:auto;height:35px;background:#ebebeb;background:rgba(56,56,60,1);border-bottom:0;display:flex;bottom:-20px;width:97.4%;-webkit-border-bottom-right-radius:5px;-webkit-border-bottom-left-radius:5px;-moz-border-radius-bottomright:5px;-moz-border-radius-bottomleft:5px;border-bottom-right-radius:5px;border-bottom-left-radius:5px}.weather34chart-btns{position:absolute;height:35px;display:inline-block;padding:0 10px;line-height:38px;width:55px;flex-basis:auto;top:5px}.weather34chart-btn{width:14px;height:14px;border:1px solid rgba(0,0,0,.15);border-radius:6px;display:inline-block;margin:1px}.weather34chart-btn.close{background-color: rgba(255, 124, 57, 1.000)}.weather34chart-btn.close:before{content:"x";margin-top:-14px;margin-left:2px}.weather34chart-btn.close:after{content:"close window";margin-top:-13px;margin-left:15px;width:300px}a{color:#aaa;text-decoration:none}
.weather34darkbrowser{position:relative;background:0;width:100%;max-height:30px;margin:auto;margin-top:-15px;margin-left:0px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:45px;background-image:radial-gradient(circle,#EB7061 6px,transparent 8px),radial-gradient(circle,#F5D160 6px,transparent 8px),radial-gradient(circle,#81D982 6px,transparent 8px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),radial-gradient(circle,rgba(97,106,114,1) 2px,transparent 2px),linear-gradient(to bottom,rgba(59,60,63,0.4) 40px,transparent 0);background-position:left top,left top,left top,right top,right top,right top,0 0;background-size:50px 45px,90px 45px,130px 45px,50px 30px,50px 45px,50px 60px,100%;background-repeat:no-repeat,no-repeat}.weather34darkbrowser[url]:after{content:attr(url);color:#aaa;font-size:10px;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 50px 0 90px;border-radius:3px;background:rgba(97, 106, 114, 0.3);height:20px;box-sizing:border-box}
 blue{color:#01a4b4}orange{color:#ff832f}green{color:#84a927}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#e7963b}purple{color:#916392}
smalluvunit{font-size:.6rem;font-family:Arial,Helvetica,system;}.hitempy{position:relative;background:rgba(61, 64, 66, 0.5);color:#fff;font-size:12px;width:110px;padding:1px;-webit-border-radius:2px;border-radius:2px;
margin-top:-44px;margin-left:72px;padding:2px;line-height:10px;font-size:9px}.svgimage{background:rgba(0, 155, 171, 1.000);-webit-border-radius:2px;border-radius:2px;}orange1{color:#aaa;}.greydesc{color:#c5c5c5;margin-left:40px;margin-top:-20px;position:absolute;font-size:0.85em}.none{float:none;margin-top:10px;position:absolute}spantemp{font-size:0.75em;color:#fff;font-family:weathertext2;}.tempicon{position:relative;font-family:weathertext2;margin-top:4px;margin-left:125px}.uvforecast{font-size:0.8rem;color:#c0c0c0;font-family:Arial,Helvetica;line-height:auto;margin-top:-15px;margin-bottom:5px}.storm{font-size:0.8rem;color:#c0c0c0;font-family:Arial,Helvetica;line-height:auto;margin-top:5px;margin-bottom:2px}.iconpos{margin-top:-5px;}
bluer{color:#fff;border-radius:2px;padding:0 2px 0 2px;align-items:center;justify-content:center;background:rgba(0, 155, 180, .6)}
bluet,blueu{background:#01a4b5}yellowt,yellowu{background:#e6a141}oranget,orangeu{background:#d05f2d}greent{background:#90b12a}greenu{background:#565f67}redt,redu{background:#cd5245}purplet,purpleu{background:rgba(151, 88, 190,.8)}bluet,yellowt,oranget,greent,redt,purplet{-webkit-border-radius:2px;border-radius:2px;padding:2px;height:.9rem}
blueu,yellowu,orangeu,greenu,redu,purpleu{color:#fff;border-radius:2px;padding:0 3px 0 3px;align-items:center;justify-content:center;}summary{font-size:.9em;color:#aaa;display:none}blue1{color:#009bb4}value{font-size:.95em;color:#aaa}valuer{color:#aaa;font-size:.9em;}thunder{font-size:.9em;color:#aaa}wind{color:#bbb;font-size:.9em}
</style>
<div class="weather34darkbrowser" url="Weather Underground Forecast"></div>  
<main class="grid">
  <article>  
   <actualt><?php echo $wuskydayTime ?></actualt>
 <?php
 if ($windunit=='kts'){$windunit="kn";}     
      //0  detailed forecast 
 //temp				  
	echo "<tempicon>"; 				  
	if($tempunit=='F' && $wuskydayTempHigh<44.6){echo "<bluet>".number_format($wuskydayTempHigh,0);}
	else if($tempunit=='F' && $wuskydayTempHigh>80.6){echo "<redt>".number_format($wuskydayTempHigh,0);}
	else if($tempunit=='F' && $wuskydayTempHigh>64.4){echo "<oranget>".number_format($wuskydayTempHigh,0);}
	else if($tempunit=='F' && $wuskydayTempHigh>55){echo "<yellowt>".number_format($wuskydayTempHigh,0);}
	else if($tempunit=='F' && $wuskydayTempHigh>=44.6){echo "<greent>".number_format($wuskydayTempHigh,0);}
	else if($wuskydayTempHigh<7){echo "<bluet>".number_format($wuskydayTempHigh,0);}
	else if($wuskydayTempHigh>27){echo "<redt>".number_format($wuskydayTempHigh,0);}
	else if($wuskydayTempHigh>18){echo "<oranget>".number_format($wuskydayTempHigh,0);}
	else if($wuskydayTempHigh>12.7){echo "<yellowt>".number_format($wuskydayTempHigh,0);}			  
	else if($wuskydayTempHigh>=7){echo "<greent>".number_format($wuskydayTempHigh,0);}
	echo "°<spantemp>" .$tempunit. "</spantemp></tempicon>";
	//icon        
	echo"<div class=iconpos> ";      		  			  
	if ($wuskydaynight=='D'){echo '<img src="css/wuicons/'.$wuskydayIcon.'.svg" width="40" class="iconpos"></img></div>';}
	if ($wuskydaynight=='N'){echo '<img src="css/wuicons/nt_'.$wuskydayIcon.'.svg" width="40" class="iconpos"></img></div>';}
	 //summary of icon
	 echo '<div class=greydesc>'. $wuskydesc.'</div><br>';	
				  //uvi			  
				  echo '<div class=uvforecast><grey><value'.$sunlight.' UVI ';				 
				  if ($wuskydayUV>10){echo 	"<purpleu>".$wuskydayUV. '</purpleu><grey> '.$wuskydayUVdesc;}
				  else if ($wuskydayUV>7){echo 	"<redu>".$wuskydayUV. '</redu><grey> '.$wuskydayUVdesc;}
				  else if ($wuskydayUV>5){echo 	"<orangeu>".$wuskydayUV. '</orangeu><grey> '.$wuskydayUVdesc;}
				  else if ($wuskydayUV>2){echo 	"<yellowu>".$wuskydayUV. '</yellowu><grey> '.$wuskydayUVdesc;}
				  else if ($wuskydayUV>=0){echo 	"<greenu>".$wuskydayUV. '</greenu><grey> '.$wuskydayUVdesc;}	
				  //snow  
				  if ( $wuskydayacumm>0){echo '&nbsp;'.$snowflakesvg.'<valuer>Snow <bluer>'.$wuskydayacumm.'cm</bluer>';}  				  
				  //rain
				  else if ($wuskydayPrecipType='rain' && $rainunit=='in'){
				  echo '&nbsp;'.$rainsvg.'<valuer>Rain <bluer>'. number_format($wuskydayprecipIntensity,2).'&nbsp;'.$rainunit.'&nbsp;'.$wuskydayPrecipProb.'%</bluer>';} 	  				  
				  //mm
				  else if ($wuskydayPrecipType='rain'){
				  echo '&nbsp;'.$rainsvg.'<valuer>Rain <bluer>'. number_format($wuskydayprecipIntensity,2).'&nbsp;'.$rainunit.'&nbsp;'.$wuskydayPrecipProb.'%</bluer>';}									  				  								 				  echo"</div>";	
				  //wind			  
				  echo "<wind>Winds <orangeu>"; echo $wuskydayWinddircardinal;echo "</orangeu>&nbsp;<blueu>".number_format($wuskydayWindGust,0),"&nbsp;<wuunits>".$windunit;echo  '</wuunits></blueu></wind>';	
				  //thunder	
				  echo '<rainsnow>			 
				   '.$lightningalert4;
				   if ($wuskythunder=="No thunder"){ echo ' <thunder>'.$wuskythunder.'</thunder></grey>	 </value></div>';}
				   else echo ' <thunder><orange1>'.$wuskythunder.'</orange1></thunder></grey>	 </value></div>';				  
				  ;?>
</article>  
 <article>  
  <actualt><?php echo $wuskydayTime1 ?></actualt>   
    

 <?php  //1  detailed forecast 
 //temp				  
	echo "<tempicon>"; 				  
	if($tempunit=='F' && $wuskydayTempHigh1<44.6){echo "<bluet>".number_format($wuskydayTempHigh1,0);}
	else if($tempunit=='F' && $wuskydayTempHigh1>80.6){echo "<redt>".number_format($wuskydayTempHigh1,0);}
	else if($tempunit=='F' && $wuskydayTempHigh1>64.4){echo "<oranget>".number_format($wuskydayTempHigh1,0);}
	else if($tempunit=='F' && $wuskydayTempHigh1>55){echo "<yellowt>".number_format($wuskydayTempHigh1,0);}
	else if($tempunit=='F' && $wuskydayTempHigh1>=44.6){echo "<greent>".number_format($wuskydayTempHigh1,0);}
	else if($wuskydayTempHigh1<7){echo "<bluet>".number_format($wuskydayTempHigh1,0);}
	else if($wuskydayTempHigh1>27){echo "<redt>".number_format($wuskydayTempHigh1,0);}
	else if($wuskydayTempHigh1>18){echo "<oranget>".number_format($wuskydayTempHigh1,0);}
	else if($wuskydayTempHigh1>12.7){echo "<yellowt>".number_format($wuskydayTempHigh1,0);}			  
	else if($wuskydayTempHigh1>=7){echo "<greent>".number_format($wuskydayTempHigh1,0);}
	echo "°<spantemp>" .$tempunit. "</spantemp></tempicon>";
	//icon        
	echo"<div class=iconpos> ";      		  			  
	if ($wuskydaynight1=='D'){echo '<img src="css/wuicons/'.$wuskydayIcon1.'.svg" width="40" class="iconpos"></img></div>';}
	if ($wuskydaynight1=='N'){echo '<img src="css/wuicons/nt_'.$wuskydayIcon1.'.svg" width="40" class="iconpos"></img></div>';}
	 //summary of icon
	 echo '<div class=greydesc>'. $wuskydesc1.'</div><br>';	
				  //uvi			  
				  echo '<div class=uvforecast><grey><value'.$sunlight.' UVI ';				 
				  if ($wuskydayUV1>10){echo 	"<purpleu>".$wuskydayUV1. '</purpleu><grey> '.$wuskydayUVdesc1;}
				  else if ($wuskydayUV1>7){echo 	"<redu>".$wuskydayUV1. '</redu><grey> '.$wuskydayUVdesc1;}
				  else if ($wuskydayUV1>5){echo 	"<orangeu>".$wuskydayUV1. '</orangeu><grey> '.$wuskydayUVdesc1;}
				  else if ($wuskydayUV1>2){echo 	"<yellowu>".$wuskydayUV1. '</yellowu><grey> '.$wuskydayUVdesc1;}
				  else if ($wuskydayUV1>=0){echo 	"<greenu>".$wuskydayUV1. '</greenu><grey> '.$wuskydayUVdesc1;}	
				  //snow  
				  if ( $wuskydayacumm1>0){echo '&nbsp;'.$snowflakesvg.'<valuer>Snow <bluer>'.$wuskydayacumm1.'cm</bluer>';}  				  
				  //rain
				  else if ($wuskydayPrecipType1='rain' && $rainunit=='in'){
				  echo '&nbsp;'.$rainsvg.'<valuer>Rain <bluer>'. number_format($wuskydayprecipIntensity1,2).'&nbsp;'.$rainunit.'&nbsp;'.$wuskydayPrecipProb1.'%</bluer>';} 	  				  
				  //mm
				  else if ($wuskydayPrecipType1='rain'){
				  echo '&nbsp;'.$rainsvg.'<valuer>Rain <bluer>'. number_format($wuskydayprecipIntensity1,2).'&nbsp;'.$rainunit.'&nbsp;'.$wuskydayPrecipProb1.'%</bluer>';}									  				  								 				  echo"</div>";	
				  //wind			  
				  echo "<wind>Winds <orangeu>"; echo $wuskydayWinddircardinal1;echo "</orangeu>&nbsp;<blueu>".number_format($wuskydayWindGust1,0),"&nbsp;<wuunits>".$windunit;echo  '</wuunits></blueu></wind>';			  
				  //thunder	
				  echo '<rainsnow>			 
				   '.$lightningalert4;
				   if ($wuskythunder1=="No thunder"){ echo ' <thunder>'.$wuskythunder1.'</thunder></grey>	 </value></div>';}
				   else echo ' <thunder><orange1>'.$wuskythunder1.'</orange1></thunder></grey>	 </value></div>';				  
				  ;?>
</article>  



  
   <article>  
    <actualt><?php echo $wuskydayTime2 ?></actualt>   
    

 <?php   //2 detailed forecast 
 //temp				  
	echo "<tempicon>"; 				  
	if($tempunit=='F' && $wuskydayTempHigh2<44.6){echo "<bluet>".number_format($wuskydayTempHigh2,0);}
	else if($tempunit=='F' && $wuskydayTempHigh2>80.6){echo "<redt>".number_format($wuskydayTempHigh2,0);}
	else if($tempunit=='F' && $wuskydayTempHigh2>64.4){echo "<oranget>".number_format($wuskydayTempHigh2,0);}
	else if($tempunit=='F' && $wuskydayTempHigh2>55){echo "<yellowt>".number_format($wuskydayTempHigh2,0);}
	else if($tempunit=='F' && $wuskydayTempHigh2>=44.6){echo "<greent>".number_format($wuskydayTempHigh2,0);}
	else if($wuskydayTempHigh2<7){echo "<bluet>".number_format($wuskydayTempHigh2,0);}
	else if($wuskydayTempHigh2>27){echo "<redt>".number_format($wuskydayTempHigh2,0);}
	else if($wuskydayTempHigh2>18){echo "<oranget>".number_format($wuskydayTempHigh2,0);}
	else if($wuskydayTempHigh2>12.7){echo "<yellowt>".number_format($wuskydayTempHigh2,0);}			  
	else if($wuskydayTempHigh2>=7){echo "<greent>".number_format($wuskydayTempHigh2,0);}
	echo "°<spantemp>" .$tempunit. "</spantemp></tempicon>";
	//icon        
	echo"<div class=iconpos> ";      		  			  
	if ($wuskydaynight2=='D'){echo '<img src="css/wuicons/'.$wuskydayIcon2.'.svg" width="40" class="iconpos"></img></div>';}
	if ($wuskydaynight2=='N'){echo '<img src="css/wuicons/nt_'.$wuskydayIcon2.'.svg" width="40" class="iconpos"></img></div>';}
	 //summary of icon
	 echo '<div class=greydesc>'. $wuskydesc2.'</div><br>';	
				  //uvi			  
				  echo '<div class=uvforecast><grey><value'.$sunlight.' UVI ';				 
				  if ($wuskydayUV2>10){echo 	"<purpleu>".$wuskydayUV2. '</purpleu><grey> '.$wuskydayUVdesc2;}
				  else if ($wuskydayUV2>7){echo 	"<redu>".$wuskydayUV2. '</redu><grey> '.$wuskydayUVdesc2;}
				  else if ($wuskydayUV2>5){echo 	"<orangeu>".$wuskydayUV2. '</orangeu><grey> '.$wuskydayUVdesc2;}
				  else if ($wuskydayUV2>2){echo 	"<yellowu>".$wuskydayUV2. '</yellowu><grey> '.$wuskydayUVdesc2;}
				  else if ($wuskydayUV2>=0){echo 	"<greenu>".$wuskydayUV2. '</greenu><grey> '.$wuskydayUVdesc2;}	
				  //snow  
				  if ( $wuskydayacumm2>0){echo '&nbsp;'.$snowflakesvg.'<valuer>Snow <bluer>'.$wuskydayacumm2.'cm</bluer>';}  				  
				  //rain
				  else if ($wuskydayPrecipType2='rain' && $rainunit=='in'){
				  echo '&nbsp;'.$rainsvg.'<valuer>Rain <bluer>'. number_format($wuskydayprecipIntensity2,2).'&nbsp;'.$rainunit.'&nbsp;'.$wuskydayPrecipProb2.'%</bluer>';} 	  				  
				  //mm
				  else if ($wuskydayPrecipType2='rain'){
				  echo '&nbsp;'.$rainsvg.'<valuer>Rain <bluer>'. number_format($wuskydayprecipIntensity2,2).'&nbsp;'.$rainunit.'&nbsp;'.$wuskydayPrecipProb2.'%</bluer>';}									  				  								 				  echo"</div>";	
				  //wind			  
				  echo "<wind>Winds <orangeu>"; echo $wuskydayWinddircardinal2;echo "</orangeu>&nbsp;<blueu>".number_format($wuskydayWindGust2,0),"&nbsp;<wuunits>".$windunit;echo  '</wuunits></blueu></wind>';			 
				  //thunder	
				  echo '<rainsnow>			 
				   '.$lightningalert4;
				   if ($wuskythunder2=="No thunder"){ echo ' <thunder>'.$wuskythunder2.'</thunder></grey>	 </value></div>';}
				   else echo ' <thunder><orange1>'.$wuskythunder2.'</orange1></thunder></grey>	 </value></div>';				  
				  ;?>
</article> 
 <article>  
 <actualt><?php echo $wuskydayTime3 ?></actualt>     
    

 <?php   //3  short forecast 
 //temp				  
	echo "<tempicon>"; 				  
	if($tempunit=='F' && $wuskydayTempHigh3<44.6){echo "<bluet>".number_format($wuskydayTempHigh3,0);}
	else if($tempunit=='F' && $wuskydayTempHigh3>80.6){echo "<redt>".number_format($wuskydayTempHigh3,0);}
	else if($tempunit=='F' && $wuskydayTempHigh3>64.4){echo "<oranget>".number_format($wuskydayTempHigh3,0);}
	else if($tempunit=='F' && $wuskydayTempHigh3>55){echo "<yellowt>".number_format($wuskydayTempHigh3,0);}
	else if($tempunit=='F' && $wuskydayTempHigh3>=44.6){echo "<greent>".number_format($wuskydayTempHigh3,0);}
	else if($wuskydayTempHigh3<7){echo "<bluet>".number_format($wuskydayTempHigh3,0);}
	else if($wuskydayTempHigh3>27){echo "<redt>".number_format($wuskydayTempHigh3,0);}
	else if($wuskydayTempHigh3>18){echo "<oranget>".number_format($wuskydayTempHigh3,0);}
	else if($wuskydayTempHigh3>12.7){echo "<yellowt>".number_format($wuskydayTempHigh3,0);}			  
	else if($wuskydayTempHigh3>=7){echo "<greent>".number_format($wuskydayTempHigh3,0);}
	echo "°<spantemp>" .$tempunit. "</spantemp></tempicon>";
	//icon        
	echo"<div class=iconpos> ";      		  			  
	if ($wuskydaynight3=='D'){echo '<img src="css/wuicons/'.$wuskydayIcon3.'.svg" width="40" class="iconpos"></img></div>';}
	if ($wuskydaynight3=='N'){echo '<img src="css/wuicons/nt_'.$wuskydayIcon3.'.svg" width="40" class="iconpos"></img></div>';}
	 //summary of icon
	 echo '<div class=greydesc>'. $wuskydesc3.'</div><br>';	
				  //uvi			  
				  echo '<div class=uvforecast><grey><value'.$sunlight.' UVI ';				 
				  if ($wuskydayUV3>10){echo 	"<purpleu>".$wuskydayUV3. '</purpleu><grey> '.$wuskydayUVdesc3;}
				  else if ($wuskydayUV3>7){echo 	"<redu>".$wuskydayUV3. '</redu><grey> '.$wuskydayUVdesc3;}
				  else if ($wuskydayUV3>5){echo 	"<orangeu>".$wuskydayUV3. '</orangeu><grey> '.$wuskydayUVdesc3;}
				  else if ($wuskydayUV3>2){echo 	"<yellowu>".$wuskydayUV3. '</yellowu><grey> '.$wuskydayUVdesc3;}
				  else if ($wuskydayUV3>=0){echo 	"<greenu>".$wuskydayUV3. '</greenu><grey> '.$wuskydayUVdesc3;}	
				  //snow  
				  if ( $wuskydayacumm3>0){echo '&nbsp;'.$snowflakesvg.'<valuer>Snow <bluer>'.$wuskydayacumm3.'cm</bluer>';}  				  
				  //rain
				  else if ($wuskydayPrecipType3='rain' && $rainunit=='in'){
				  echo '&nbsp;'.$rainsvg.'<valuer>Rain <bluer>'. number_format($wuskydayprecipIntensity3,2).'&nbsp;'.$rainunit.'&nbsp;'.$wuskydayPrecipProb3.'%</bluer>';} 	  				  
				  //mm
				  else if ($wuskydayPrecipType3='rain'){
				  echo '&nbsp;'.$rainsvg.'<valuer>Rain <bluer>'. number_format($wuskydayprecipIntensity3,2).'&nbsp;'.$rainunit.'&nbsp;'.$wuskydayPrecipProb3.'%</bluer>';}									  				  								 				  echo"</div>";	
				  //wind			  
				  echo "<wind>Winds <orangeu>"; echo $wuskydayWinddircardinal3;echo "</orangeu>&nbsp;<blueu>".number_format($wuskydayWindGust3,0),"&nbsp;<wuunits>".$windunit;echo  '</wuunits></blueu></wind>';	
				  //thunder	
				  echo '<rainsnow>			 
				   '.$lightningalert4;
				   if ($wuskythunder3=="No thunder"){ echo ' <thunder>'.$wuskythunder3.'</thunder></grey>	 </value></div>';}
				   else echo ' <thunder><orange1>'.$wuskythunder3.'</orange1></thunder></grey>	 </value></div>';				  
				  ;?>
</article>  
  
 <article>  
     <actualt><?php echo $wuskydayTime4 ?></actualt>    
    
     <?php   //4  short forecast	 
	//temp				  
	echo "<tempicon>"; 				  
	if($tempunit=='F' && $wuskydayTempHigh4<44.6){echo "<bluet>".number_format($wuskydayTempHigh4,0);}
	else if($tempunit=='F' && $wuskydayTempHigh4>80.6){echo "<redt>".number_format($wuskydayTempHigh4,0);}
	else if($tempunit=='F' && $wuskydayTempHigh4>64.4){echo "<oranget>".number_format($wuskydayTempHigh4,0);}
	else if($tempunit=='F' && $wuskydayTempHigh4>55){echo "<yellowt>".number_format($wuskydayTempHigh4,0);}
	else if($tempunit=='F' && $wuskydayTempHigh4>=44.6){echo "<greent>".number_format($wuskydayTempHigh4,0);}
	else if($wuskydayTempHigh4<7){echo "<bluet>".number_format($wuskydayTempHigh4,0);}
	else if($wuskydayTempHigh4>27){echo "<redt>".number_format($wuskydayTempHigh4,0);}
	else if($wuskydayTempHigh4>18){echo "<oranget>".number_format($wuskydayTempHigh4,0);}
	else if($wuskydayTempHigh4>12.7){echo "<yellowt>".number_format($wuskydayTempHigh4,0);}			  
	else if($wuskydayTempHigh4>=7){echo "<greent>".number_format($wuskydayTempHigh4,0);}
	echo "°<spantemp>" .$tempunit. "</spantemp></tempicon>";
	//icon        
	echo"<div class=iconpos> ";      		  			  
	if ($wuskydaynight4=='D'){echo '<img src="css/wuicons/'.$wuskydayIcon4.'.svg" width="40" class="iconpos"></img></div>';}
	if ($wuskydaynight4=='N'){echo '<img src="css/wuicons/nt_'.$wuskydayIcon4.'.svg" width="40" class="iconpos"></img></div>';}
	 //summary of icon
	 echo '<div class=greydesc>'. $wuskydesc4.'</div><br>';	
				  //uvi			  
				  echo '<div class=uvforecast><grey><value'.$sunlight.' UVI ';				 
				  if ($wuskydayUV4>10){echo 	"<purpleu>".$wuskydayUV4. '</purpleu><grey> '.$wuskydayUVdesc4;}
				  else if ($wuskydayUV4>7){echo 	"<redu>".$wuskydayUV4. '</redu><grey> '.$wuskydayUVdesc4;}
				  else if ($wuskydayUV4>5){echo 	"<orangeu>".$wuskydayUV4. '</orangeu><grey> '.$wuskydayUVdesc4;}
				  else if ($wuskydayUV4>2){echo 	"<yellowu>".$wuskydayUV4. '</yellowu><grey> '.$wuskydayUVdesc4;}
				  else if ($wuskydayUV4>=0){echo 	"<greenu>".$wuskydayUV4. '</greenu><grey> '.$wuskydayUVdesc4;}	
				  //snow  
				  if ( $wuskydayacumm4>0){echo '&nbsp;'.$snowflakesvg.'<valuer>Snow <bluer>'.$wuskydayacumm4.'cm</bluer>';}  				  
				  //rain
				  else if ($wuskydayPrecipType4='rain' && $rainunit=='in'){
				  echo '&nbsp;'.$rainsvg.'<valuer>Rain <bluer>'. number_format($wuskydayprecipIntensity4,2).'&nbsp;'.$rainunit.'&nbsp;'.$wuskydayPrecipProb4.'%</bluer>';} 	  				  
				  //mm
				  else if ($wuskydayPrecipType4='rain'){
				  echo '&nbsp;'.$rainsvg.'<valuer>Rain <bluer>'. number_format($wuskydayprecipIntensity4,2).'&nbsp;'.$rainunit.'&nbsp;'.$wuskydayPrecipProb4.'%</bluer>';}									  				  								 				  echo"</div>";	
				  //wind			  
				  echo "<wind>Winds <orangeu>"; echo $wuskydayWinddircardinal4;echo "</orangeu>&nbsp;<blueu>".number_format($wuskydayWindGust4,0),"&nbsp;<wuunits>".$windunit;echo  '</wuunits></blueu></wind>';					   
				  //thunder	
				  echo '<rainsnow>			 
				   '.$lightningalert4;
				   if ($wuskythunder4=="No thunder"){ echo ' <thunder>'.$wuskythunder4.'</thunder></grey>	 </value></div>';}
				   else echo ' <thunder><orange1>'.$wuskythunder4.'</orange1></thunder></grey>	 </value></div>';				  
				  ;?>
</article> 
<article>  
     <actualt><?php echo $wuskydayTime5 ?></actualt>       
     <?php   //5 short forecast
	 //temp				  
	echo "<tempicon>"; 				  
	if($tempunit=='F' && $wuskydayTempHigh5<44.6){echo "<bluet>".number_format($wuskydayTempHigh5,0);}
	else if($tempunit=='F' && $wuskydayTempHigh5>80.6){echo "<redt>".number_format($wuskydayTempHigh5,0);}
	else if($tempunit=='F' && $wuskydayTempHigh5>64.4){echo "<oranget>".number_format($wuskydayTempHigh5,0);}
	else if($tempunit=='F' && $wuskydayTempHigh5>55){echo "<yellowt>".number_format($wuskydayTempHigh5,0);}
	else if($tempunit=='F' && $wuskydayTempHigh5>=44.6){echo "<greent>".number_format($wuskydayTempHigh5,0);}
	else if($wuskydayTempHigh5<7){echo "<bluet>".number_format($wuskydayTempHigh5,0);}
	else if($wuskydayTempHigh5>27){echo "<redt>".number_format($wuskydayTempHigh5,0);}
	else if($wuskydayTempHigh5>18){echo "<oranget>".number_format($wuskydayTempHigh5,0);}
	else if($wuskydayTempHigh5>12.7){echo "<yellowt>".number_format($wuskydayTempHigh5,0);}			  
	else if($wuskydayTempHigh5>=7){echo "<greent>".number_format($wuskydayTempHigh5,0);}
	echo "°<spantemp>" .$tempunit. "</spantemp></tempicon>";
	//icon        
	echo"<div class=iconpos> ";      		  			  
	if ($wuskydaynight5=='D'){echo '<img src="css/wuicons/'.$wuskydayIcon5.'.svg" width="40" class="iconpos"></img></div>';}
	if ($wuskydaynight5=='N'){echo '<img src="css/wuicons/nt_'.$wuskydayIcon5.'.svg" width="40" class="iconpos"></img></div>';}
	 //summary of icon
	 echo '<div class=greydesc>'. $wuskydesc5.'</div><br>';	
				  //uvi			  
				  echo '<div class=uvforecast><grey><value'.$sunlight.' UVI ';				 
				  if ($wuskydayUV5>10){echo 	"<purpleu>".$wuskydayUV5. '</purpleu><grey> '.$wuskydayUVdesc5;}
				  else if ($wuskydayUV5>7){echo 	"<redu>".$wuskydayUV5. '</redu><grey> '.$wuskydayUVdesc5;}
				  else if ($wuskydayUV5>5){echo 	"<orangeu>".$wuskydayUV5. '</orangeu><grey> '.$wuskydayUVdesc5;}
				  else if ($wuskydayUV5>2){echo 	"<yellowu>".$wuskydayUV5. '</yellowu><grey> '.$wuskydayUVdesc5;}
				  else if ($wuskydayUV5>=0){echo 	"<greenu>".$wuskydayUV5. '</greenu><grey> '.$wuskydayUVdesc5;}	
				  //snow  
				  if ( $wuskydayacumm5>0){echo '&nbsp;'.$snowflakesvg.'<valuer>Snow <bluer>'.$wuskydayacumm5.'cm</bluer>';}  				  
				  //rain
				  else if ($wuskydayPrecipType5='rain' && $rainunit=='in'){
				  echo '&nbsp;'.$rainsvg.'<valuer>Rain <bluer>'. number_format($wuskydayprecipIntensity5,2).'&nbsp;'.$rainunit.'&nbsp;'.$wuskydayPrecipProb5.'%</bluer>';} 	  				  
				  //mm
				  else if ($wuskydayPrecipType5='rain'){
				  echo '&nbsp;'.$rainsvg.'<valuer>Rain <bluer>'. number_format($wuskydayprecipIntensity5,2).'&nbsp;'.$rainunit.'&nbsp;'.$wuskydayPrecipProb5.'%</bluer>';}									  				  								 				  echo"</div>";	
				  //wind			  
				  echo "<wind>Winds <orangeu>"; echo $wuskydayWinddircardinal5;echo "</orangeu>&nbsp;<blueu>".number_format($wuskydayWindGust5,0),"&nbsp;<wuunits>".$windunit;echo  '</wuunits></blueu></wind>';				  			  
				  //thunder	
				  echo '<rainsnow>			 
				   '.$lightningalert4;
				   if ($wuskythunder5=="No thunder"){ echo ' <thunder>'.$wuskythunder5.'</thunder></grey>	 </value></div>';}
				   else echo ' <thunder><orange1>'.$wuskythunder5.'</orange1></thunder></grey>	 </value></div>';				  
				  ;?>
</article> 
  <article>
     <actualt><?php echo $wuskydayTime6 ?></actualt>   
     <?php   //6 short forecast 	 
	  //temp				  
	echo "<tempicon>"; 				  
	if($tempunit=='F' && $wuskydayTempHigh6<44.6){echo "<bluet>".number_format($wuskydayTempHigh6,0);}
	else if($tempunit=='F' && $wuskydayTempHigh6>80.6){echo "<redt>".number_format($wuskydayTempHigh6,0);}
	else if($tempunit=='F' && $wuskydayTempHigh6>64.4){echo "<oranget>".number_format($wuskydayTempHigh6,0);}
	else if($tempunit=='F' && $wuskydayTempHigh6>55){echo "<yellowt>".number_format($wuskydayTempHigh6,0);}
	else if($tempunit=='F' && $wuskydayTempHigh6>=44.6){echo "<greent>".number_format($wuskydayTempHigh6,0);}
	else if($wuskydayTempHigh6<7){echo "<bluet>".number_format($wuskydayTempHigh6,0);}
	else if($wuskydayTempHigh6>27){echo "<redt>".number_format($wuskydayTempHigh6,0);}
	else if($wuskydayTempHigh6>18){echo "<oranget>".number_format($wuskydayTempHigh6,0);}
	else if($wuskydayTempHigh6>12.7){echo "<yellowt>".number_format($wuskydayTempHigh6,0);}			  
	else if($wuskydayTempHigh6>=7){echo "<greent>".number_format($wuskydayTempHigh6,0);}
	echo "°<spantemp>" .$tempunit. "</spantemp></tempicon>";	      
echo"<div class=iconpos> ";      		  			  
if ($wuskydaynight6=='D'){echo '<img src="css/wuicons/'.$wuskydayIcon6.'.svg" width="40" class="iconpos"></img></div>';}
if ($wuskydaynight6=='N'){echo '<img src="css/wuicons/nt_'.$wuskydayIcon6.'.svg" width="40" class="iconpos"></img></div>';}
	 //summary icon
	 echo '<div class=greydesc>'. $wuskydesc6.'</div><br>';
				  //uvi	+ tstorm		  
				  echo '<div class=uvforecast><grey><value'.$sunlight.' UVI ';				 
				  if ($wuskydayUV6>10){echo 	"<purpleu>".$wuskydayUV6. '</purpleu><grey> '.$wuskydayUVdesc6;}
				  else if ($wuskydayUV6>7){echo 	"<redu>".$wuskydayUV6. '</redu><grey> '.$wuskydayUVdesc6;}
				  else if ($wuskydayUV6>5){echo 	"<orangeu>".$wuskydayUV6. '</orangeu><grey> '.$wuskydayUVdesc6;}
				  else if ($wuskydayUV6>2){echo 	"<yellowu>".$wuskydayUV6. '</yellowu><grey> '.$wuskydayUVdesc6;}
				  else if ($wuskydayUV6>=0){echo 	"<greenu>".$wuskydayUV6. '</greenu><grey> '.$wuskydayUVdesc6;}	
				   //snow-rain				  			     			  
				  if ( $wuskydayacumm6>0){echo ''.$snowflakesvg.'<valuer>Snow <bluer>'.$wuskydayacumm6.'cm</bluer>';}  				  
				  //rain
				  else if ($wuskydayPrecipType6='rain' && $rainunit=='in'){
				  echo '&nbsp;'.$rainsvg.'<valuer>Rain <bluer>'. number_format($wuskydayprecipIntensity6,2).'&nbsp;'.$rainunit.'&nbsp;'.$wuskydayPrecipProb6.'%</bluer>';} 	  				  
				  //mm
				  else if ($wuskydayPrecipType6='rain'){
				  echo '&nbsp;'.$rainsvg.'<valuer>Rain <bluer>'. number_format($wuskydayprecipIntensity6,2).'&nbsp;'.$rainunit.'&nbsp;'.$wuskydayPrecipProb6.'%</bluer>';}									  				  								 				  echo"</div>";	
				  //wind			  
				  echo "<wind>Winds <orangeu>"; echo $wuskydayWinddircardinal6;echo "</orangeu>&nbsp;<blueu>".number_format($wuskydayWindGust6,0),"&nbsp;<wuunits>".$windunit;echo  '</wuunits></blueu></wind>';	
				  //thunder				  
				  echo'</grey><rainsnow>
				   '.$lightningalert4;
				   if ($wuskythunder6=="No thunder"){ echo ' <thunder>'.$wuskythunder6.'</thunder></grey>	 </value></div>';}
				   else echo ' <thunder><orange1>'.$wuskythunder6.'</orange1></thunder></grey>	 </value></div>';?>    
  </article> 
  <article>
    <actualt><?php echo $wuskydayTime7 ?></actualt>         
     <?php   //7  short forecast  	 
	  //temp				  
	echo "<tempicon>"; 				  
	if($tempunit=='F' && $wuskydayTempHigh7<44.6){echo "<bluet>".number_format($wuskydayTempHigh7,0);}
	else if($tempunit=='F' && $wuskydayTempHigh7>80.6){echo "<redt>".number_format($wuskydayTempHigh7,0);}
	else if($tempunit=='F' && $wuskydayTempHigh7>64.4){echo "<oranget>".number_format($wuskydayTempHigh7,0);}
	else if($tempunit=='F' && $wuskydayTempHigh7>55){echo "<yellowt>".number_format($wuskydayTempHigh7,0);}
	else if($tempunit=='F' && $wuskydayTempHigh7>=44.6){echo "<greent>".number_format($wuskydayTempHigh7,0);}
	else if($wuskydayTempHigh7<7){echo "<bluet>".number_format($wuskydayTempHigh7,0);}
	else if($wuskydayTempHigh7>27){echo "<redt>".number_format($wuskydayTempHigh7,0);}
	else if($wuskydayTempHigh7>18){echo "<oranget>".number_format($wuskydayTempHigh7,0);}
	else if($wuskydayTempHigh7>12.7){echo "<yellowt>".number_format($wuskydayTempHigh7,0);}			  
	else if($wuskydayTempHigh7>=7){echo "<greent>".number_format($wuskydayTempHigh7,0);}
	echo "°<spantemp>" .$tempunit. "</spantemp></tempicon>";	      
echo"<div class=iconpos> ";      		  			  
if ($wuskydaynight7=='D'){echo '<img src="css/wuicons/'.$wuskydayIcon7.'.svg" width="40" class="iconpos"></img></div>';}
if ($wuskydaynight7=='N'){echo '<img src="css/wuicons/nt_'.$wuskydayIcon7.'.svg" width="40" class="iconpos"></img></div>';}
	 //summary icon
	 echo '<div class=greydesc>'. $wuskydesc7.'</div><br>';
				  //uvi	+ tstorm		  
				  echo '<div class=uvforecast><grey><value'.$sunlight.' UVI ';				 
				  if ($wuskydayUV7>10){echo 	"<purpleu>".$wuskydayUV7. '</purpleu><grey> '.$wuskydayUVdesc7;}
				  else if ($wuskydayUV7>7){echo 	"<redu>".$wuskydayUV7. '</redu><grey> '.$wuskydayUVdesc7;}
				  else if ($wuskydayUV7>5){echo 	"<orangeu>".$wuskydayUV7. '</orangeu><grey> '.$wuskydayUVdesc7;}
				  else if ($wuskydayUV7>2){echo 	"<yellowu>".$wuskydayUV7. '</yellowu><grey> '.$wuskydayUVdesc7;}
				  else if ($wuskydayUV7>=0){echo 	"<greenu>".$wuskydayUV7. '</greenu><grey> '.$wuskydayUVdesc7;}	
				   //snow-rain				  				     			  
				  if ( $wuskydayacumm7>0){echo ''.$snowflakesvg.'<valuer>Snow <bluer>'.$wuskydayacumm7.'cm</bluer>';}  				  
				  //rain
				  else if ($wuskydayPrecipType7='rain' && $rainunit=='in'){
				  echo '&nbsp;'.$rainsvg.'<valuer>Rain <bluer>'. number_format($wuskydayprecipIntensity7,2).'&nbsp;'.$rainunit.'&nbsp;'.$wuskydayPrecipProb7.'%</bluer>';} 	  				  
				  //mm
				  else if ($wuskydayPrecipType7='rain'){
				  echo '&nbsp;'.$rainsvg.'<valuer>Rain <bluer>'. number_format($wuskydayprecipIntensity7,2).'&nbsp;'.$rainunit.'&nbsp;'.$wuskydayPrecipProb7.'%</bluer>';}									  				  								 				  echo"</div>";	
				  //wind			  
				  echo "<wind>Winds <orangeu>"; echo $wuskydayWinddircardinal7;echo "</orangeu>&nbsp;<blueu>".number_format($wuskydayWindGust7,0),"&nbsp;<wuunits>".$windunit;echo  '</wuunits></blueu></wind>';	
				  //thunder
				  echo'</grey><rainsnow>
				   '.$lightningalert4;
				   if ($wuskythunder7=="No thunder"){ echo ' <thunder>'.$wuskythunder7.'</thunder></grey>	 </value></div>';}
				   else echo ' <thunder><orange1>'.$wuskythunder7.'</orange1></thunder></grey>	 </value></div>';?>    
  </article> 
  
  
  
  <article>
    <actualt><?php echo $wuskydayTime8 ?></actualt>         
     <?php   //8  short forecast  	 
	  //temp				  
	echo "<tempicon>"; 				  
	if($tempunit=='F' && $wuskydayTempHigh8<44.6){echo "<bluet>".number_format($wuskydayTempHigh8,0);}
	else if($tempunit=='F' && $wuskydayTempHigh8>80.6){echo "<redt>".number_format($wuskydayTempHigh8,0);}
	else if($tempunit=='F' && $wuskydayTempHigh8>64.4){echo "<oranget>".number_format($wuskydayTempHigh8,0);}
	else if($tempunit=='F' && $wuskydayTempHigh8>55){echo "<yellowt>".number_format($wuskydayTempHigh8,0);}
	else if($tempunit=='F' && $wuskydayTempHigh8>=44.6){echo "<greent>".number_format($wuskydayTempHigh8,0);}
	else if($wuskydayTempHigh8<7){echo "<bluet>".number_format($wuskydayTempHigh8,0);}
	else if($wuskydayTempHigh8>27){echo "<redt>".number_format($wuskydayTempHigh8,0);}
	else if($wuskydayTempHigh8>18){echo "<oranget>".number_format($wuskydayTempHigh8,0);}
	else if($wuskydayTempHigh8>12.7){echo "<yellowt>".number_format($wuskydayTempHigh8,0);}			  
	else if($wuskydayTempHigh8>=7){echo "<greent>".number_format($wuskydayTempHigh8,0);}
	echo "°<spantemp>" .$tempunit. "</spantemp></tempicon>";	      
echo"<div class=iconpos> ";      		  			  
if ($wuskydaynight8=='D'){echo '<img src="css/wuicons/'.$wuskydayIcon8.'.svg" width="40" class="iconpos"></img></div>';}
if ($wuskydaynight8=='N'){echo '<img src="css/wuicons/nt_'.$wuskydayIcon8.'.svg" width="40" class="iconpos"></img></div>';}
	 //summary icon
	 echo '<div class=greydesc>'. $wuskydesc8.'</div><br>';
				  //uvi	+ tstorm		  
				  echo '<div class=uvforecast><grey><value'.$sunlight.' UVI ';				 
				  if ($wuskydayUV8>10){echo 	"<purpleu>".$wuskydayUV8. '</purpleu><grey> '.$wuskydayUVdesc8;}
				  else if ($wuskydayUV8>7){echo 	"<redu>".$wuskydayUV8. '</redu><grey> '.$wuskydayUVdesc8;}
				  else if ($wuskydayUV8>5){echo 	"<orangeu>".$wuskydayUV8. '</orangeu><grey> '.$wuskydayUVdesc8;}
				  else if ($wuskydayUV8>2){echo 	"<yellowu>".$wuskydayUV8. '</yellowu><grey> '.$wuskydayUVdesc8;}
				  else if ($wuskydayUV8>=0){echo 	"<greenu>".$wuskydayUV8. '</greenu><grey> '.$wuskydayUVdesc8;}	
				   //snow-rain				  				     			  
				  if ( $wuskydayacumm8>0){echo ''.$snowflakesvg.'<valuer>Snow <bluer>'.$wuskydayacumm8.'cm</bluer>';}  				  
				  //rain
				  else if ($wuskydayPrecipType8='rain' && $rainunit=='in'){
				  echo '&nbsp;'.$rainsvg.'<valuer>Rain <bluer>'. number_format($wuskydayprecipIntensity8,2).'&nbsp;'.$rainunit.'&nbsp;'.$wuskydayPrecipProb8.'%</bluer>';} 	  				  
				  //mm
				  else if ($wuskydayPrecipType8='rain'){
				  echo '&nbsp;'.$rainsvg.'<valuer>Rain <bluer>'. number_format($wuskydayprecipIntensity8,2).'&nbsp;'.$rainunit.'&nbsp;'.$wuskydayPrecipProb8.'%</bluer>';}									  				  								 				  echo"</div>";	
				  //wind			  
				  echo "<wind>Winds <orangeu>"; echo $wuskydayWinddircardinal8;echo "</orangeu>&nbsp;<blueu> ".number_format($wuskydayWindGust8,0),"&nbsp;<wuunits>".$windunit;echo  '</wuunits></blueu></wind>';	
				  //thunder
				  echo'</grey><rainsnow>
				   '.$lightningalert4;
				   if ($wuskythunder8=="No thunder"){ echo ' <thunder>'.$wuskythunder8.'</thunder></grey>	 </value></div>';}
				   else echo ' <thunder><orange1>'.$wuskythunder8.'</orange1></thunder></grey>	 </value></div>';?>    
  </article> 
  
  
  <article>
    <actualt><?php echo $wuskydayTime9 ?></actualt>         
     <?php   //9  short forecast  	 
	  //temp				  
	echo "<tempicon>"; 				  
	if($tempunit=='F' && $wuskydayTempHigh9<44.6){echo "<bluet>".number_format($wuskydayTempHigh9,0);}
	else if($tempunit=='F' && $wuskydayTempHigh9>80.6){echo "<redt>".number_format($wuskydayTempHigh9,0);}
	else if($tempunit=='F' && $wuskydayTempHigh9>64.4){echo "<oranget>".number_format($wuskydayTempHigh9,0);}
	else if($tempunit=='F' && $wuskydayTempHigh9>55){echo "<yellowt>".number_format($wuskydayTempHigh9,0);}
	else if($tempunit=='F' && $wuskydayTempHigh9>=44.6){echo "<greent>".number_format($wuskydayTempHigh9,0);}
	else if($wuskydayTempHigh9<7){echo "<bluet>".number_format($wuskydayTempHigh9,0);}
	else if($wuskydayTempHigh9>27){echo "<redt>".number_format($wuskydayTempHigh9,0);}
	else if($wuskydayTempHigh9>18){echo "<oranget>".number_format($wuskydayTempHigh9,0);}
	else if($wuskydayTempHigh9>12.7){echo "<yellowt>".number_format($wuskydayTempHigh9,0);}			  
	else if($wuskydayTempHigh9>=7){echo "<greent>".number_format($wuskydayTempHigh9,0);}
	echo "°<spantemp>" .$tempunit. "</spantemp></tempicon>";	      
echo"<div class=iconpos> ";      		  			  
if ($wuskydaynight9=='D'){echo '<img src="css/wuicons/'.$wuskydayIcon9.'.svg" width="40" class="iconpos"></img></div>';}
if ($wuskydaynight9=='N'){echo '<img src="css/wuicons/nt_'.$wuskydayIcon9.'.svg" width="40" class="iconpos"></img></div>';}
	 //summary icon
	 echo '<div class=greydesc>'. $wuskydesc9.'</div><br>';
				  //uvi	+ tstorm		  
				  echo '<div class=uvforecast><grey><value'.$sunlight.' UVI ';				 
				  if ($wuskydayUV9>10){echo 	"<purpleu>".$wuskydayUV9. '</purpleu><grey> '.$wuskydayUVdesc9;}
				  else if ($wuskydayUV9>7){echo 	"<redu>".$wuskydayUV9. '</redu><grey> '.$wuskydayUVdesc9;}
				  else if ($wuskydayUV9>5){echo 	"<orangeu>".$wuskydayUV9. '</orangeu><grey> '.$wuskydayUVdesc9;}
				  else if ($wuskydayUV9>2){echo 	"<yellowu>".$wuskydayUV9. '</yellowu><grey> '.$wuskydayUVdesc9;}
				  else if ($wuskydayUV9>=0){echo 	"<greenu>".$wuskydayUV9. '</greenu><grey> '.$wuskydayUVdesc9;}	
				   //snow-rain				  				     			  
				  if ( $wuskydayacumm9>0){echo ''.$snowflakesvg.'<valuer>Snow <bluer>'.$wuskydayacumm9.'cm</bluer>';}  				  
				  //rain
				  else if ($wuskydayPrecipType9='rain' && $rainunit=='in'){
				  echo '&nbsp;'.$rainsvg.'<valuer>Rain <bluer>'. number_format($wuskydayprecipIntensity9,2).'&nbsp;'.$rainunit.'&nbsp;'.$wuskydayPrecipProb9.'%</bluer>';} 	  				  
				  //mm
				  else if ($wuskydayPrecipType9='rain'){
				  echo '&nbsp;'.$rainsvg.'<valuer>Rain <bluer>'. number_format($wuskydayprecipIntensity9,2).'&nbsp;'.$rainunit.'&nbsp;'.$wuskydayPrecipProb9.'%</bluer>';}									  				  								 				  echo"</div>";	
				  //wind			  
				  echo "<wind>Winds <orangeu>"; echo $wuskydayWinddircardinal9;echo " </orangeu>&nbsp;<blueu> ".number_format($wuskydayWindGust9,0),"&nbsp;<wuunits>".$windunit;echo  '</wuunits></blueu></wind>';	
				  //thunder
				  echo'</grey><rainsnow>
				   '.$lightningalert4;
				   if ($wuskythunder9=="No thunder"){ echo ' <thunder>'.$wuskythunder9.'</thunder></grey>	 </value></div>';}
				   else echo ' <thunder><orange1>'.$wuskythunder9.'</orange1></thunder></grey>	 </value></div>';?>    
  </article> 
  <article>
  <actualt><?php echo $wuskydayTime10 ?></actualt>         
     <?php   //9  short forecast  	 
	  //temp				  
	echo "<tempicon>"; 				  
	if($tempunit=='F' && $wuskydayTempHigh10<44.6){echo "<bluet>".number_format($wuskydayTempHigh10,0);}
	else if($tempunit=='F' && $wuskydayTempHigh10>80.6){echo "<redt>".number_format($wuskydayTempHigh10,0);}
	else if($tempunit=='F' && $wuskydayTempHigh10>64.4){echo "<oranget>".number_format($wuskydayTempHigh10,0);}
	else if($tempunit=='F' && $wuskydayTempHigh10>55){echo "<yellowt>".number_format($wuskydayTempHigh10,0);}
	else if($tempunit=='F' && $wuskydayTempHigh10>=44.6){echo "<greent>".number_format($wuskydayTempHigh10,0);}
	else if($wuskydayTempHigh10<7){echo "<bluet>".number_format($wuskydayTempHigh10,0);}
	else if($wuskydayTempHigh10>27){echo "<redt>".number_format($wuskydayTempHigh10,0);}
	else if($wuskydayTempHigh10>18){echo "<oranget>".number_format($wuskydayTempHigh10,0);}
	else if($wuskydayTempHigh10>12.7){echo "<yellowt>".number_format($wuskydayTempHigh10,0);}			  
	else if($wuskydayTempHigh10>=7){echo "<greent>".number_format($wuskydayTempHigh10,0);}
	echo "°<spantemp>" .$tempunit. "</spantemp></tempicon>";	      
echo"<div class=iconpos> ";      		  			  
if ($wuskydaynight10=='D'){echo '<img src="css/wuicons/'.$wuskydayIcon10.'.svg" width="40" class="iconpos"></img></div>';}
if ($wuskydaynight10=='N'){echo '<img src="css/wuicons/nt_'.$wuskydayIcon10.'.svg" width="40" class="iconpos"></img></div>';}
	 //summary icon
	 echo '<div class=greydesc>'. $wuskydesc10.'</div><br>';
				  //uvi	+ tstorm		  
				  echo '<div class=uvforecast><grey><value'.$sunlight.' UVI ';				 
				  if ($wuskydayUV10>10){echo 	"<purpleu>".$wuskydayUV10. '</purpleu><grey> '.$wuskydayUVdesc10;}
				  else if ($wuskydayUV10>7){echo 	"<redu>".$wuskydayUV10. '</redu><grey> '.$wuskydayUVdesc10;}
				  else if ($wuskydayUV10>5){echo 	"<orangeu>".$wuskydayUV10. '</orangeu><grey> '.$wuskydayUVdesc10;}
				  else if ($wuskydayUV10>2){echo 	"<yellowu>".$wuskydayUV10. '</yellowu><grey> '.$wuskydayUVdesc10;}
				  else if ($wuskydayUV10>=0){echo 	"<greenu>".$wuskydayUV10. '</greenu><grey> '.$wuskydayUVdesc10;}	
				   //snow-rain				  				     			  
				  if ( $wuskydayacumm10>0){echo ''.$snowflakesvg.'<valuer>Snow <bluer>'.$wuskydayacumm10.'cm</bluer>';}  				  
				  //rain
				  else if ($wuskydayPrecipType10='rain' && $rainunit=='in'){
				  echo '&nbsp;'.$rainsvg.'<valuer>Rain <bluer>'. number_format($wuskydayprecipIntensity10,2).'&nbsp;'.$rainunit.'&nbsp;'.$wuskydayPrecipProb10.'%</bluer>';} 	  				  
				  //mm
				  else if ($wuskydayPrecipType10='rain'){
				  echo '&nbsp;'.$rainsvg.'<valuer>Rain <bluer>'. number_format($wuskydayprecipIntensity10,2).'&nbsp;'.$rainunit.'&nbsp;'.$wuskydayPrecipProb10.'%</bluer>';}									  				  								 				  echo"</div>";	
				  //wind			  
				  echo "<wind>Winds <orangeu>"; echo $wuskydayWinddircardinal10;echo " </orangeu>&nbsp;<blueu>".number_format($wuskydayWindGust10,0),"&nbsp;<wuunits>".$windunit;echo  '</wuunits></blueu></wind>';			  
				  //thunder
				  echo'<rainsnow>
				   '.$lightningalert4;
				   if ($wuskythunder10=="No thunder"){ echo ' <thunder>'.$wuskythunder10.'</thunder></grey>	 </value></div>';}
				   else echo ' <thunder><orange1>'.$wuskythunder10.'</orange1></thunder></grey>	 </value></div>';?>    
  </article> 
  
  
  
  
  <!-- copyright needs to be kept please be ethical--->
  <article>
    <span style="font-size:8px;">
  <?php echo $info?> CSS/SVG/PHP scripts were developed by <a href="https://weather34.com" title="weather34.com" target="_blank" style="font-size:8px;">weather34.com</a>  for use in the weather34 template &copy; 2015-<?php echo date('Y');?></span> <br>
  <span style="font-size:8px;">
  <?php echo $info?> Data Forecast provided by <a href="https://www.wunderground.com/weather/api/" title="Weather Underground API" target="_blank">Weather Underground</a></span>
  </article> 
</main>