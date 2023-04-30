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
	
	} 
	// current weather
	
	
	// 7 day forecast
	$xmlfile = "http://forecastfox3.accuweather.com/adcbin/forecastfox3/forecast-data.asp?location=cityId%3A".$city_id."&metric=1&langId=9";
	
	$xml = simplexml_load_file($xmlfile);
	
	if($xml){
	
	mysqli_query($dbmysqli, "TRUNCATE `aw_forecast`");
	
	for ($i = 1; $i <= 7; $i++) {
	
	if(!isset($xml->xpath('//day[@number="'.$i.'"]/obsDate')[0]) or $xml->xpath('//day[@number="'.$i.'"]/obsDate')[0] == ""){ $xml->xpath('//day[@number="'.$i.'"]/obsDate')[0] = ""; break; }
	
	$obs_date = $xml->xpath('//day[@number="'.$i.'"]/obsDate')[0];
	$day_name = $xml->xpath('//day[@number="'.$i.'"]/dayName')[0];
	$sunrise = $xml->xpath('//day[@number="'.$i.'"]/sunrise')[0];
	$sunset = $xml->xpath('//day[@number="'.$i.'"]/sunset')[0];
	$shorttext = $xml->xpath('//day[@number="'.$i.'"]/daytime/shortText')[0];
	$weather_icon = $xml->xpath('//day[@number="'.$i.'"]/daytime/weathericon')[0];
	
	$sunrise_ts = strtotime($sunrise);
	$sunset_ts = strtotime($sunset);
	$sunrise = date("H:i", $sunrise_ts);
	$sunset = date("H:i", $sunset_ts);
	
	// day
	$hightemperature_d = $xml->xpath('//day[@number="'.$i.'"]/daytime/hightemperature')[0];
	$lowtemperature_d = $xml->xpath('//day[@number="'.$i.'"]/daytime/lowtemperature')[0];
	$winddirection_d = $xml->xpath('//day[@number="'.$i.'"]/daytime/windDirection')[0];
	$windspeed_d = $xml->xpath('//day[@number="'.$i.'"]/daytime/windSpeed')[0];
	$rain_d = $xml->xpath('//day[@number="'.$i.'"]/daytime/rain')[0];
	$snow_d = $xml->xpath('//day[@number="'.$i.'"]/daytime/snow')[0];
	$ice_d = $xml->xpath('//day[@number="'.$i.'"]/daytime/ice')[0];
	
	// night
	$winddirection_n = $xml->xpath('//day[@number="'.$i.'"]/nighttime/windDirection')[0];
	$windspeed_n = $xml->xpath('//day[@number="'.$i.'"]/nighttime/windSpeed')[0];
	$rain_n = $xml->xpath('//day[@number="'.$i.'"]/nighttime/rain')[0];
	$snow_n = $xml->xpath('//day[@number="'.$i.'"]/nighttime/snow')[0];
	$ice_n = $xml->xpath('//day[@number="'.$i.'"]/nighttime/ice')[0];
	
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
	
	}

?>
