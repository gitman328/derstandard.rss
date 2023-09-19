<?php 
//
	include("config.php");
	
	// settings
	$sql_0 = mysqli_query($dbmysqli, "SELECT * FROM `settings` WHERE `id` = '1' ");
	$result_0 = mysqli_fetch_assoc($sql_0);
	$city_id = $result_0['aw_city_id'];

	// current conditions
	//$xmlfile = "http://forecastfox3.accuweather.com/adcbin/forecastfox3/current-conditions.asp?location=cityId%3A".$city_id."&metric=1&langId=9";
	$xmlfile = "https://s3blog.org/forecastfox3-accu-weather/forecastfox3/current-conditions.asp?location=cityId%3A".$city_id."&metric=1&langId=9";
	
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
	$url = $xml->current->url;
	
	# location
	$curl = curl_init();
	$headers = array(
	"GET HTTP/1.0",
	"Content-type: text/html;charset=\"utf-8\"",
	"Accept: *",
	"Cache-Control: no-cache",
	"Connection: keep-alive",
	"Upgrade-Insecure-Requests: 1"
	);

	curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
	CURLOPT_URL => $url,
    CURLOPT_USERAGENT => 'Mozilla 5./0 (compatible) Opera or Gecko',
	CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
	CURLOPT_FOLLOWLOCATION => TRUE,
	CURLOPT_SSL_VERIFYHOST => FALSE,
	CURLOPT_SSL_VERIFYPEER => FALSE,
	CURLOPT_HTTPHEADER => $headers
	));

	$response = curl_exec($curl);
	curl_close($curl);
	
	preg_match_all('~"name"(.*?)}~s', $response, $matches);
	$location = $matches[0][1];
	$location = str_replace('"', '', $location);
	$location = str_replace(':', '', $location);
	$location = str_replace('name', '', $location);
	$location = str_replace('}', '', $location);
	
	$tags = explode(',', $location);
	foreach($tags as $i => $key){ $i > 0; }
	
	$city = $tags[1];
	$country = $tags[2];
	$area = $tags[0];
	# location
	
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
	//$xmlfile = "http://forecastfox3.accuweather.com/adcbin/forecastfox3/forecast-data.asp?location=cityId%3A".$city_id."&metric=1&langId=9";
	$xmlfile = "https://s3blog.org/forecastfox3-accu-weather/forecast-data.asp?location=cityId%3A".$city_id."&metric=1&langId=9";
	
	$xml = simplexml_load_file($xmlfile);
	
	if($xml){
	
	mysqli_query($dbmysqli, "TRUNCATE `aw_forecast`");
	
	for ($i = 1; $i <= 8; $i++) {
	
	if(!isset($xml->xpath('//day[@number="'.$i.'"]/obsDate')[0]) or $xml->xpath('//day[@number="'.$i.'"]/obsDate')[0] == ""){ $xml->xpath('//day[@number="'.$i.'"]/obsDate')[0] = ""; break; }
	
	$obs_date = $xml->xpath('//day[@number="'.$i.'"]/obsDate')[0];
	$day_name = $xml->xpath('//day[@number="'.$i.'"]/dayName')[0];
	$day_code = $xml->xpath('//day[@number="'.$i.'"]/dayCode')[0];
	$sunrise = $xml->xpath('//day[@number="'.$i.'"]/sunrise')[0];
	$sunset = $xml->xpath('//day[@number="'.$i.'"]/sunset')[0];
	$shorttext = $xml->xpath('//day[@number="'.$i.'"]/daytime/shortText')[0];
	$weather_icon = $xml->xpath('//day[@number="'.$i.'"]/daytime/weathericon')[0];
	
	if($day_code == '1'){ $day_name = 'Sonntag'; }
	if($day_code == '2'){ $day_name = 'Montag'; }
	if($day_code == '3'){ $day_name = 'Dienstag'; }
	if($day_code == '4'){ $day_name = 'Mittwoch'; }
	if($day_code == '5'){ $day_name = 'Donnerstag'; }
	if($day_code == '6'){ $day_name = 'Freitag'; }
	if($day_code == '7'){ $day_name = 'Samstag'; }
	
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