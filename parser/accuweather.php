<?php 
//
	include("config.php");
	
	// settings
	$sql_0 = mysqli_query($dbmysqli, "SELECT * FROM `settings` WHERE `id` = '1' ");
	$result_0 = mysqli_fetch_assoc($sql_0);
	$city_id = $result_0['aw_city_id'];

	// current conditions
	$xmlfile = "http://forecastfox3.accuweather.com/adcbin/forecastfox3/current-conditions.asp?location=cityId%3A".$city_id."&metric=1&langId=9";
	
	$xml = simplexml_load_file($xmlfile);

	if($xml){
	
	mysqli_query($dbmysqli, "TRUNCATE `aw_current`");
	
	// units
	$temp_u = $xml->units->temp;
	$dist_u = $xml->units->dist;
	$speed_u = $xml->units->speed;
	$pres_u = $xml->units->pres;
	$prec_u = $xml->units->prec;
	
	// location
	$city = $xml->local->city;
	$country = $xml->local->country;
	$area = $xml->local->adminArea;
	$city_id = $xml->local->cityId;
	
	// date, time
	$timestamp = strtotime($xml->cache->refreshDateTime);
	
	// current weather
	$pressure = $xml->current->pressure;
	$temperature = $xml->current->temperature;
	$humidity = $xml->current->humidity;
	$weathertext = $xml->current->weathertext;
	$weathericon = $xml->current->weathericon;
	$windspeed = $xml->current->windspeed;
	$winddirection = $xml->current->winddirection;
	$cloudcover = $xml->current->cloudcover;
	
	mysqli_query($dbmysqli, "INSERT INTO `aw_current` 
	(
	`temp_u`, 
	`dist_u`, 
	`speed_u`, 
	`pres_u`, 
	`prec_u`, 
	`city`, 
	`country`, 
	`area`, 
	`city_id`, 
	`pressure`, 
	`temperature`, 
	`humidity`, 
	`weathertext`, 
	`weathericon`, 
	`windspeed`, 
	`winddirection`, 
	`cloudcover`, 
	`timestamp`
	)
	VALUES 
	(
	'".$temp_u."', 
	'".$dist_u."', 
	'".$speed_u."', 
	'".$pres_u."', 
	'".$prec_u."', 
	'".$city."', 
	'".$country."', 
	'".$area."', 
	'".$city_id."', 
	'".$pressure."', 
	'".$temperature."', 
	'".$humidity."', 
	'".$weathertext."', 
	'".$weathericon."', 
	'".$windspeed."', 
	'".$winddirection."', 
	'".$cloudcover."', 
	'".$timestamp."' 
	)
	");
	
	} // current weather
	
	
	// 7 day forecast
	$xmlfile = "http://forecastfox3.accuweather.com/adcbin/forecastfox3/forecast-data.asp?location=cityId%3A".$city_id."&metric=1&langId=9";
	
	$xml = simplexml_load_file($xmlfile);

	if($xml){
	
	mysqli_query($dbmysqli, "TRUNCATE `aw_forecast`");
	
	for ($i = 0; $i <= $i; $i++) {
	
	if($xml->forecast->day[$i]->obsDate == ""){ break; }
	
	$obs_date = $xml->forecast->day[$i]->obsDate;
	$day_name = $xml->forecast->day[$i]->dayName;
	$sunrise = $xml->forecast->day[$i]->sunrise;
	$sunset = $xml->forecast->day[$i]->sunset;	
	$shorttext = $xml->forecast->day[$i]->daytime->shortText;
	$weather_icon = $xml->forecast->day[$i]->daytime->weathericon;
	
	// day
	$hightemperature_d = $xml->forecast->day[$i]->daytime->hightemperature;
	$lowtemperature_d = $xml->forecast->day[$i]->daytime->lowtemperature;
	$winddirection_d = $xml->forecast->day[$i]->daytime->windDirectionText;
	$windspeed_d = $xml->forecast->day[$i]->daytime->windSpeed;
	$rain_d = $xml->forecast->day[$i]->daytime->rain;
	$snow_d = $xml->forecast->day[$i]->daytime->snow;
	$ice_d = $xml->forecast->day[$i]->daytime->ice;
	
	// night
	$winddirection_n = $xml->forecast->day[$i]->nighttime->windDirectionText;
	$windspeed_n = $xml->forecast->day[$i]->nighttime->windSpeed;
	$rain_n = $xml->forecast->day[$i]->nighttime->rain;
	$snow_n = $xml->forecast->day[$i]->nighttime->snow;
	$ice_n = $xml->forecast->day[$i]->nighttime->ice;
	
	$timestamp = strtotime($obs_date.'23:59');
	
	mysqli_query($dbmysqli, "INSERT INTO `aw_forecast` 
	(
	`day_name`, 
	`sunrise`, 
	`sunset`, 
	`shorttext`, 
	`weather_icon`, 
	`hightemperature_d`, 
	`lowtemperature_d`, 
	`winddirection_d`, 
	`windspeed_d`, 
	`rain_d`, 
	`snow_d`, 
	`ice_d`, 
	`winddirection_n`, 
	`windspeed_n`, 
	`rain_n`, 
	`snow_n`, 
	`ice_n`, 
	`timestamp` 
	)
	VALUES 
	(
	'".$day_name."', 
	'".$sunrise."', 
	'".$sunset."', 
	'".$shorttext."', 
	'".$weather_icon."', 
	'".$hightemperature_d."', 
	'".$lowtemperature_d."', 
	'".$winddirection_d."', 
	'".$windspeed_d."', 
	'".$rain_d."', 
	'".$snow_d."', 
	'".$ice_d."', 
	'".$winddirection_n."', 
	'".$windspeed_n."', 
	'".$rain_n."', 
	'".$snow_n."', 
	'".$ice_n."', 
	'".$timestamp."' 
	)
	");
	
	}
	
	} // 7 day forecast

?>