<?php 
//
	include("parser/config.php");
	
	if(!isset($_REQUEST["kategorie"]) or $_REQUEST["kategorie"] == ""){ $_REQUEST['kategorie'] = ""; }
	$kategorie = $_REQUEST["kategorie"];
	
	if(!isset($_REQUEST["textmode"]) or $_REQUEST["textmode"] == ""){ $_REQUEST["textmode"] = ""; }
	$textmode = $_REQUEST["textmode"];
	
	// settings
	$sql_0 = mysqli_query($dbmysqli, "SELECT * FROM `settings` WHERE `id` = '1' ");
	$result_0 = mysqli_fetch_assoc($sql_0);
	$show_cw = $result_0["aw_show_cw"];
	$show_fcw = $result_0["aw_show_fcw"];
	$show_startpage = $result_0["aw_show_startpage"];
	$fc_days = $result_0["aw_fc_days"];
	$city_id = $result_0["aw_city_id"];
	
	$rubric_desc_sql = strtolower($kategorie);

	$limit = "104";
	
	if($kategorie != "Diskurs" and 
	$kategorie != "Etat" and 
	$kategorie != "Gesundheit" and 
	$kategorie != "Immobilien" and 
	$kategorie != "Inland" and 
	$kategorie != "International" and 
	$kategorie != "Karriere" and 
	$kategorie != "Kultur" and 
	$kategorie != "Lifestyle" and 
	$kategorie != "Panorama" and 
	$kategorie != "Sport" and 
	$kategorie != "Web" and 
	$kategorie != "Wirtschaft" and 
	$kategorie != "Wissenschaft" and 
	$kategorie != "dieStandard")
	{ $kategorie = ""; }
	
	if($kategorie == ""){ $rubric_desc_sql = "top_news"; $limit = "104"; }
	if($kategorie == "" and $textmode == "0"){ $rubric_desc_sql = "top_news"; $limit = "104"; }
	if($kategorie == "" and $textmode == "1"){ $rubric_desc_sql = "top_news"; $limit = "104"; }

	//
	$loop = 0;
	$sql_1 = "SELECT * FROM `".$rubric_desc_sql."` ORDER BY `timestamp` DESC LIMIT 0,".$limit." ";
	
	if ($result_1 = mysqli_query($dbmysqli,$sql_1))
	{
	while ($obj = mysqli_fetch_object($result_1)){
	{
	$loop = $loop +1;
	$day_desc = date("l", $obj->timestamp);
	$day_desc = str_replace("Monday", "Mo", $day_desc);
	$day_desc = str_replace("Tuesday", "Di", $day_desc);
	$day_desc = str_replace("Wednesday", "Mi", $day_desc);
	$day_desc = str_replace("Thursday", "Do", $day_desc);
	$day_desc = str_replace("Friday", "Fr", $day_desc);
	$day_desc = str_replace("Saturday", "Sa", $day_desc);
	$day_desc = str_replace("Sunday", "So", $day_desc);
	
	$card_bg_color = "#FFFFFF";
	
	if($kategorie == "")
	{
	if($obj->category == "Diskurs"){ $card_bg_color = "#E6E6E6"; }
	if($obj->category == "Etat"){ $card_bg_color = "#FFCC66"; }
	if($obj->category == "EditionZukunft"){ $card_bg_color = "#E6E6E6"; }
	if($obj->category == "Gesundheit"){ $card_bg_color = "#F8F8F8"; }
	if($obj->category == "Immobilien"){ $card_bg_color = "#F8F8F8"; }
	if($obj->category == "Inland"){ $card_bg_color = "#D7E3E8"; }
	if($obj->category == "International"){ $card_bg_color = "#C1D9D9"; }
	if($obj->category == "Karriere"){ $card_bg_color = "#F8F8F8"; }
	if($obj->category == "Kultur"){ $card_bg_color = "#D2D0CF"; }
	if($obj->category == "Lifestlye"){ $card_bg_color = "#FFFFFF"; }
	if($obj->category == "Panorama"){ $card_bg_color = "#AED4AE"; }
	if($obj->category == "Sport"){ $card_bg_color = "#C6DC73"; }
	if($obj->category == "Web"){ $card_bg_color = "#B7CCA3"; }
	if($obj->category == "Wirtschaft"){ $card_bg_color = "#D8DEC1"; }
	if($obj->category == "Wissenschaft"){ $card_bg_color = "#BEDAE3"; }
	if($obj->category == "dieStandard"){ $card_bg_color = "#EFEFEF"; }
	}
	
	if(!isset($content_items) or $content_items == ""){ $content_items = ""; }
	
	if($obj->category == "EditionZukunft"){ $cat_link = "<strong style=\"color:#ccc;\">".$obj->category."</strong>"; 
	} else { 
	$cat_link = "<strong><a href=\"./?kategorie=".$obj->category."\">".$obj->category."</a></strong>";
	}
	
	if($textmode != "1")
	{
	$content_items = $content_items.'
	<div class="col-sm-6 col-md-4 col-lg-4 mb-4">
		<div id="'.$obj->id.'" class="card h-100">
		<div class="spacer_10"></div>	
		  <div align="center" class="img-container">
		  <a href="'.$obj->link.'" target="_blank">
		  <img src="'.$obj->image.'" alt=""></a>
		  </div>
		  <div class="card-body">
			<h5 class="card-title">
			  <strong><a href="'.$obj->link.'" target="_blank">'.$obj->title.'</a></strong>
			</h5>
			<small>'.$obj->description.'</small>
		  </div>
		  <div class="card-footer" style="background-color:'.$card_bg_color.';">
			<small class="text-muted">'.$cat_link.' | '.$day_desc.', '.$obj->date.'</small>
		  </div>
		</div>
	  </div>
	';
	}
	
	if($textmode == "1")
	{
	$content_items = $content_items.'
	<div class="col-sm-4 col-md-3 col-lg-3 mb-4">
		<div id="'.$obj->id.'" class="card h-100">
		<div class="spacer_10"></div>
		  <div class="card-body-text">
			<span class="card-title">
			  <strong><a href="'.$obj->link.'" target="_blank">'.$obj->title.'</a></strong>
			</span>
			<div class="spacer_10"></div>
			<div style="font-size:12px;">'.$obj->description.'</div>
		  </div>
		  <div class="card-footer-text" style="background-color:'.$card_bg_color.';">
			<span class="text-muted">'.$cat_link.'<br>'.$day_desc.', '.$obj->date.'</span>
		  </div>
		</div>
	  </div>
	';
	}
	
	}
	}
	}
	
	$show_more_tab = "";
	
	if(!isset($page) or $page == ""){ $page = ""; }
	
	if($page == ""){ $page = 104; } else { $page = $page + 104; }
	
	$limit = $limit + $page;
	
	if($textmode != "1"){ $col_style= "col-sm-6 col-md-4 col-lg-4 mb-4"; } else { $col_style = "col-sm-4 col-md-2 col-lg-3 mb-4"; }
	
	if($loop == 104)
	{
	$show_more_tab = '
	<div id="show_more_tab" class="'.$col_style.'">
		<div class="card h-100" style="min-height:285px;">
		  <div class="card-body" style="background-color: #ccc;">
			<button class="btn btn-default btn-block btn-full" onclick="show_more(\''.$page.'\')">mehr anzeigen</button>
		  </div>
		</div>
	  </div>
	';
	}
	
	// nav bar active
	if($kategorie == ""){ $active0 = "active"; } else { $active0 = ""; }
	if(preg_match("/\bdiskurs\b/i", $kategorie)){ $active1 = "active"; } else { $active1 = ""; }
	if(preg_match("/\betat\b/i", $kategorie)){ $active2 = "active"; } else { $active2 = ""; }
	if(preg_match("/\bgesundheit\b/i", $kategorie)){ $active3 = "active"; } else { $active3 = ""; }
	if(preg_match("/\bimmobilien\b/i", $kategorie)){ $active4 = "active"; } else { $active4 = ""; }
	if(preg_match("/\binland\b/i", $kategorie)){ $active5 = "active"; } else { $active5 = ""; }
	if(preg_match("/\binternational\b/i", $kategorie)){ $active6 = "active"; } else { $active6 = ""; }
	if(preg_match("/\bkarriere\b/i", $kategorie)){ $active7 = "active"; } else { $active7 = ""; }
	if(preg_match("/\bkultur\b/i", $kategorie)){ $active8 = "active"; } else { $active8 = ""; }
	if(preg_match("/\blifestyle\b/i", $kategorie)){ $active9 = "active"; } else { $active9 = ""; }
	if(preg_match("/\bpanorama\b/i", $kategorie)){ $active10 = "active"; } else { $active10 = ""; }
	if(preg_match("/\bsport\b/i", $kategorie)){ $active11 = "active"; } else { $active11 = ""; }
	if(preg_match("/\bweb\b/i", $kategorie)){ $active12 = "active"; } else { $active12 = ""; }
	if(preg_match("/\bwirtschaft\b/i", $kategorie)){ $active13 = "active"; } else { $active13 = ""; }
	if(preg_match("/\bwissenschaft\b/i", $kategorie)){ $active14 = "active"; } else { $active14 = ""; }
	if(preg_match("/\bdiestandard\b/i", $kategorie)){ $active15 = "active"; } else { $active15 = ""; }
	
	// current weather list
	$sql_2 = mysqli_query($dbmysqli, "SELECT * FROM `aw_current` ORDER BY `timestamp` DESC");
	$result_2 = mysqli_fetch_assoc($sql_2);
	$temp_u = $result_2['temp_u'];
	$dist_u = $result_2['dist_u'];
	$speed_u = $result_2['speed_u'];
	$pres_u = $result_2['pres_u'];
	$prec_u = $result_2['prec_u'];
	$city = $result_2['city'];
	$country = $result_2['country'];
	$area = $result_2['area'];
	$city_id = $result_2['city_id'];
	$pressure = $result_2['pressure'];
	$temperature = $result_2['temperature'];
	$humidity = $result_2['humidity'];
	$weathertext = $result_2['weathertext'];
	$weathericon = $result_2['weathericon'];
	$windspeed = $result_2['windspeed'];
	$winddirection = $result_2['winddirection'];
	$cloudcover = $result_2['cloudcover'];
	$timestamp = $result_2['timestamp'];
	
	$current_weather_list = '
	<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-12 mb-12">
	<div id="current_weather" class="card" style="background-color:#1F3169;">
	  <div class="spacer_5"></div>
	  <div class="card-body-text">
		<div class="row">
		  <div class="col-lg-6"> 
		  <span class="card-title">
			<div class="spacer_10"></div>
			<h4 style="color:#fff;">'.$temperature.'&deg; '.$temp_u.'</h4>			
			</span> 
			</div>
		  <div class="col-lg-6"> <img src="images/weather-icons/large/'.$weathericon.'.png"> 
		  </div>
		  <!-- col-lg-6 -->
		</div>
		<!-- row -->
		<div class="row">
		<div class="col-lg-12" style="padding-left: 15px;">
		<span class="text-muted"> <small style="color:#ccc;">'.$weathertext.' ('.date("H:i", $timestamp).')</small> </span>
		</div>
		</div>
		<span class="card-title"> <strong style="color:#fff;">'.$city.', '.$area.'</strong> </span>
		<hr>
		<small style="color:#ccc;">Luftfeuchte: '.$humidity.'%<br>
		Luftdruck: '.$pressure.' '.$pres_u.'<br>
		Wind: '.$windspeed.' '.$speed_u.'<br>
		Windrichtung: '.$winddirection.'<br>
		Bewölkung: '.$cloudcover.'<br>
		</small> </div>
	  <div class="card-footer-text"> <span class="text-muted" style="float:right;">
	  <i class="fa fa-cog" style="cursor:pointer" onclick="weather_settings();" title="Wetteranzeige Einstellungen"></i> 
	  </span> 
	  </div>
	</div>
	</div>
	<!-- col -->
	</div>
	<!-- row -->
	';
	
	if($show_startpage == 1 and $kategorie != "")
	{
	$current_weather_list = '
	<span class="text-muted" style="float:right;"> 
	<i class="fa fa-cog" style="cursor:pointer" onclick="weather_settings();" title="Wetteranzeige Einstellungen"></i>
	</span>';
	}
	
	if($show_cw == 0)
	{ 
	$current_weather_list = '
	<span class="text-muted" style="float:right;"> 
	<i class="fa fa-cog" style="cursor:pointer" onclick="weather_settings();" title="Wetteranzeige Einstellungen"></i>
	</span>'; 
	}
	
	//
	// forecast weather list
	$fc_days_total = $fc_days + 1;
	
	$sql_3 = "SELECT * FROM `aw_forecast` WHERE `id` BETWEEN '1' AND '".$fc_days_total."' ";
	
	if ($result_3 = mysqli_query($dbmysqli,$sql_3))
	{
	while ($obj = mysqli_fetch_object($result_3)){
	{
	
	$day_name = $obj->day_name;
	$sunrise = $obj->sunrise;
	$sunset = $obj->sunset;
	$shorttext = $obj->shorttext;
	$weather_icon = $obj->weather_icon;
	$hightemperature_d = $obj->hightemperature_d;
	$lowtemperature_d = $obj->lowtemperature_d;
	$winddirection_d = $obj->winddirection_d;
	$windspeed_d = $obj->windspeed_d;
	$rain_d = $obj->rain_d;
	$snow_d = $obj->snow_d;
	$ice_d = $obj->ice_d;
	$winddirection_n = $obj->winddirection_n;
	$windspeed_n = $obj->windspeed_n;
	$rain_n = $obj->rain_n;
	$snow_n = $obj->snow_n;
	$ice_n = $obj->ice_n;
	$timestamp = $obj->timestamp;
	
	if($obj->id == 1){ $day_name = "Heute"; $show_lowtemperature = "display:none;"; $spacer = ""; } else { $show_lowtemperature = ""; $spacer = "<br>"; }
	
	if(!isset($weathercard_body) or $weathercard_body == ""){ $weathercard_body = ""; }
	
	$weathercard_body = $weathercard_body.'
	<div class="forecast-tab">
	<div class="row">
	<div class="col-lg-6">
	<div class="forecast-link">
	<span onclick="show_forecast_day(\''.$obj->id.'\')" style="cursor:pointer;">
	<small>'.$day_name.'</small>
	</span>
	</div>
	</div><!-- col-lg-6 -->
	<div class="col-lg-6"><small>'.$hightemperature_d.'&deg; '.$temp_u.'</small>
	<img src="images/weather-icons/small/'.$weather_icon.'.png">
	</div>
	<!-- col-lg-6 -->
	</div>
	<!-- row -->
	<div id="forecast_day_'.$obj->id.'" style="display:none;">
	<div class="spacer_5"></div>
	<small style="color:#fff;">'.$shorttext.'</small>
	<div class="spacer_5"></div>
	<small style="color:#ccc;">
	<span style="'.$show_lowtemperature.'">Tiefsttemperatur: '.$lowtemperature_d.'&deg; '.$temp_u.'</span>'.$spacer.'
	Wind: '.$windspeed_d.' '.$speed_u.'<br>
	Sonnenaufgang: '.$sunrise.' Uhr<br>
	Sonnenuntergang: '.$sunset.' Uhr<br>
	</small>
	</div>
	</div><!-- forecast-tab -->
	';
	
	}
	}
	}
	
	$weathercard_header = '
	<div class="spacer_10"></div>
	<div class="card" style="background-color:#1F3169;">
	<div align="center">
	<div class="spacer_10"></div>
	<u style="color:#fff;">'.$fc_days.'-Tage Prognose</u>
	<div class="spacer_20"></div>
	</div>
	';
	
	$weathercard_footer = '</div><!-- card header -->';
	
	$forecast_weather_list = $weathercard_header.$weathercard_body.$weathercard_footer;
	
	if($show_startpage == 1 and $kategorie != ""){ $forecast_weather_list = ""; }
	
	if($show_fcw == 0){ $forecast_weather_list = ""; }
		
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title><?php if($kategorie == ""){ echo "Aktuelle Nachrichten | "; } else { echo $kategorie." | "; }?> derstandard.rss</title>
<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="vendor/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- Custom styles for this template -->
<link href="css/style.css" rel="stylesheet">
</head>
<body id="page-top">
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container"> <div style="padding-left:15px;"><a class="navbar-brand" href="./"><?php if($kategorie == ""){ echo "Aktuell"; } else { echo $kategorie; } ?></a></div>
    <div class="header-bar-content">
      <div class="sp1">
        <input id="view_mode" type="checkbox" onclick="change_view_mode();" <?php if($textmode == '1'){ echo 'checked'; }?>>
      </div>
      <div class="sp2"> Text Modus </div>
      <div style="clear:both"></div>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto header-bar">
        <li class="nav-item"> <a class="nav-link" href="./?kategorie=<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>">Aktuell</a> </li>
        <li class="nav-item"> <a class="nav-link" href="./?kategorie=Diskurs<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>">Diskurs</a> </li>
        <li class="nav-item"> <a class="nav-link" href="./?kategorie=Etat<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>">Etat</a> </li>
        <li class="nav-item"> <a class="nav-link" href="./?kategorie=Gesundheit<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>">Gesundheit</a> </li>
        <li class="nav-item"> <a class="nav-link" href="./?kategorie=Immobilien<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>">Immobilien</a> </li>
        <li class="nav-item"> <a class="nav-link" href="./?kategorie=Inland<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>">Inland</a> </li>
        <li class="nav-item"> <a class="nav-link" href="./?kategorie=International<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>">International</a> </li>
        <li class="nav-item"> <a class="nav-link" href="./?kategorie=Karriere<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>">Karriere</a> </li>
        <li class="nav-item"> <a class="nav-link" href="./?kategorie=Kultur<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>">Kultur</a> </li>
        <li class="nav-item"> <a class="nav-link" href="./?kategorie=Lifestyle<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>">Lifestyle</a> </li>
        <li class="nav-item"> <a class="nav-link" href="./?kategorie=Panorama<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>">Panorama</a> </li>
        <li class="nav-item"> <a class="nav-link" href="./?kategorie=Sport<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>">Sport</a> </li>
        <li class="nav-item"> <a class="nav-link" href="./?kategorie=Web<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>">Web</a> </li>
        <li class="nav-item"> <a class="nav-link" href="./?kategorie=Wirtschaft<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>">Wirtschaft</a> </li>
        <li class="nav-item"> <a class="nav-link" href="./?kategorie=Wissenschaft<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>">Wissenschaft</a> </li>
        <li class="nav-item"> <a class="nav-link" href="./?kategorie=dieStandard<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>">dieStandard</a> </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-2">
      <div class="spacer_20"></div>
      <div class="list-group nav-bar"> 
      <a href="./?kategorie=<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active0; ?>">Aktuell</a> 
      <a href="./?kategorie=Diskurs<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active1; ?>">Diskurs</a> 
      <a href="./?kategorie=Etat<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active2; ?>">Etat</a> 
      <a href="./?kategorie=Gesundheit<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active3; ?>">Gesundheit</a> 
      <a href="./?kategorie=Immobilien<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active4; ?>">Immobilien</a> 
      <a href="./?kategorie=Inland<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active5; ?>">Inland</a> 
      <a href="./?kategorie=International<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active6; ?>">International</a> 
      <a href="./?kategorie=Karriere<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active7; ?>">Karriere</a> 
      <a href="./?kategorie=Kultur<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active8; ?>">Kultur</a> 
      <a href="./?kategorie=Lifestyle<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active9; ?>">Lifestyle</a>
        <!--<a href="./?kategorie=Meinung" class="list-group-item">Meinung</a>-->
        <a href="./?kategorie=Panorama<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active10; ?>">Panorama</a>
        <!--<a href="./?kategorie=Reisen" class="list-group-item">Reisen</a>-->
        <a href="./?kategorie=Sport<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active11; ?>">Sport</a> 
        <a href="./?kategorie=Web<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active12; ?>">Web</a> 
        <a href="./?kategorie=Wirtschaft<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active13; ?>">Wirtschaft</a> 
        <a href="./?kategorie=Wissenschaft<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active14; ?>">Wissenschaft</a> 
        <a href="./?kategorie=dieStandard<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active15; ?>">dieStandard</a> 
        </div>
    </div>
    <!-- /.col-lg-2 -->
    <div class="col-lg-8">
      <div class="spacer_30"></div>
      <div class="row">
        <div class="col-lg-12">
          <div class="input-group">
            <select class="input-group-dropdown" style="width:150px;" id="search_category">
              <option value="alle" selected>&nbsp;Alle Nachrichten</option>
              <option value="diskurs">&nbsp;Diskurs</option>
              <option value="etat">&nbsp;Etat</option>
              <option value="gesundheit">&nbsp;Gesundheit</option>
              <option value="immobilien">&nbsp;Immobilien</option>
              <option value="inland">&nbsp;Inland</option>
              <option value="international">&nbsp;International</option>
              <option value="karriere">&nbsp;Karriere</option>
              <option value="kultur">&nbsp;Kultur</option>
              <option value="lifestyle">&nbsp;Lifestyle</option>
              <option value="panorama">&nbsp;Panorama</option>
              <option value="sport">&nbsp;Sport</option>
              <option value="web">&nbsp;Web</option>
              <option value="wirtschaft">&nbsp;Wirtschaft</option>
              <option value="wissenschaft">&nbsp;Wissenschaft</option>
              <option value="diestandard">&nbsp;diestandard</option>
            </select>
            <input class="input-group-field" id="term" type="text" style="width:350px" accept-charset=utf-8>
            <span class="input-group-append">
            <button type="button" class="btn btn-default" onclick="search_news();">Suchen</button>
            <span style="color:#0066FF; padding-left:20px;"> <span id="chevron" style="display:none;"> </span>
            <!-- chevron -->
            </span> </span> </div>
          <div id="result_container" style="display:none;">
            <hr>
            <div id="search_result"></div>
          </div>
          <hr>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- row -->
      <div class="spacer_10"></div>
      <div id="content_items" class="row"> <?php echo $content_items.$show_more_tab; ?> </div>
      <!-- /.row -->
    </div>
    <!-- /.col-lg-10 -->
    <div class="col-lg-2">
    <div class="spacer_20"></div>
	<?php echo $current_weather_list; ?>
    <?php echo $forecast_weather_list; ?>
    <div class="spacer_10"></div>
    </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.container -->
<!-- Footer -->
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">&copy; derstandard.at <?php echo date("Y"); ?></p>
  </div>
  <!-- /.container -->
</footer>
<a class="scroll-to-top rounded js-scroll-trigger" href="#page-top"> <i class="fa fa-angle-up"></i> </a>
<!-- weather settings modal -->
<div class="modal fade" id="weatherModal" tabindex="-1" role="dialog" aria-labelledby="weatherModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">Einstellungen für die Wetteranzeige
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <label for="show_cw" class="control-label">
      <input type="checkbox" value="" id="show_cw" <?php if($show_cw == "1"){ echo "checked"; } ?>>
      Aktuelles Wetter anzeigen </label>
      <br>
      <label for="show_fcw" class="control-label">
      <input type="checkbox" value="" id="show_fcw" <?php if($show_fcw == "1"){ echo "checked"; } ?>>
      Wetterprognose anzeigen </label>
      <br>
      <label for="show_startpage" class="control-label">
      <input name="" type="checkbox" value="" id="show_startpage" <?php if($show_startpage == "1"){ echo "checked"; } ?>>
      Anzeige nur auf Startseite (Aktuelle Nachrichten) </label>
      <br>
      <label for="fc_days" class="control-label">
      <select id="fc_days">
        <option value="3" <?php if($fc_days == "3"){ echo "selected"; }?>>&nbsp;3&nbsp;</option>
        <option value="5" <?php if($fc_days == "5"){ echo "selected"; }?>>&nbsp;5&nbsp;</option>
        <option value="7" <?php if($fc_days == "7"){ echo "selected"; }?>>&nbsp;7&nbsp;</option>
      </select>
      Anzahl der angezeigten Tage </label>
      <br>
      <label for="city_id" class="control-label">ID des Ortes:</label>
      <input id="city_id" type="text" class="input-group-field" style="width:50%;" value="<?php if(!isset($city_id) or $city_id == ""){ $city_id = ""; } echo $city_id; ?>">
      <div class="spacer_5"></div>
      <div id="weather_status" style="display:none;"><img src="images/loading.gif"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="save_weather_settings();">Speichern</button>
      </div>
    </div>
  </div>
</div>
<!-- weather settings modal -->
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
  
  // Scroll to top button appear
  $(document).scroll(function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 800) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });
  
    // Smooth scrolling using jQuery easing
  $('.scroll-to-top').click(function() {
        $('html, body').animate({scrollTop : 0},800);
        return false;
  });
  
  // search
  function search_news(){
  var term = $("#term").val();
  var category = $("#search_category option:selected").val();
  var n = term.length;
  if(term == '' || n <= 2){ return; }
  
  $("#chevron").html("<i class=\"fa fa-chevron-up fa-2x\" style=\"color:#1F3169; cursor:pointer;\" title=\"Resultat ausblenden\" onclick=\"close_search_result()\"></i>");
  $("#chevron").fadeIn(1000);
  $.post("search.php",
  {
  term: term,
  category: category
  },
  function(data){
  $("#search_result").html(data);
  $("#result_container").fadeIn(1000);
  });
  }
  
  function close_search_result(){
  $('#result_container').fadeOut();
  $("#chevron").html("<i class=\"fa fa-chevron-down fa-2x\" style=\"color:#1F3169; cursor:pointer;\" title=\"Resultat anzeigen\" onclick=\"open_search_result();\"></i>");
  }
  
  function open_search_result(){
  $('#result_container').fadeIn();
  $("#chevron").html("<i class=\"fa fa-chevron-up fa-2x\" style=\"color:#1F3169; cursor:pointer;\" title=\"Resultat anzeigen\" onclick=\"close_search_result();\"></i>");
  }
  
  //
  $(function(){
  $("#term").keypress(function(a){
  if(a.which == 13){
  search_news();
  }
  });
  });
  
  //
  function change_view_mode(){
  var kategorie = '<?php echo $kategorie; ?>';
  if($("#view_mode").is(':checked')){
  window.location.href='./?kategorie='+kategorie+''+"&textmode=1";
  } else { 
  window.location.href='./?kategorie='+kategorie+''+"&textmode=0";
  }
  }
  
  // browse
  function show_more(page,limit){
  var kategorie = '<?php echo $kategorie; ?>';
  var textmode = '<?php echo $textmode; ?>';
  $("#show_more_tab").fadeOut(500);
  setTimeout(function() {
  $("#show_more_tab").attr({ id:"" });
  $.post("browse.php",
  {
  kategorie: kategorie,
  textmode: textmode,
  page: page
  },
  function(data){
  $("#content_items").append(data);
  });
  }, 500);
  }
  
  function show_forecast_day(id){
  $("#forecast_day_"+id).toggle(250);
  }
  
  function weather_settings(){
  $('#weatherModal').modal('toggle');
  }
  
  // weather settings
  function save_weather_settings(){
  
  if($("#show_cw").is(':checked')){ var show_cw = '1' } else { var show_cw = '0'; }
  if($("#show_fcw").is(':checked')){ var show_fcw = '1' } else { var show_fcw = '0'; }
  if($("#show_startpage").is(':checked')){ var show_startpage = '1' } else { var show_startpage = '0'; }
  
  var fc_days = $("#fc_days").val();
  var city_id = $("#city_id").val();
  if($.isNumeric(city_id)){ } else { $("#weather_status").fadeOut(); return; }
  if(city_id == ''){ $("#weather_status").fadeOut(); return; }
  
  $("#weather_status").html("<img src=\"images/loading.gif\" width=\"16\" height=\"11\">");
  $("#weather_status").fadeIn();
  
  $.post("inc/save_settings.php",
  {
  show_cw: show_cw,
  show_fcw: show_fcw,
  show_startpage: show_startpage,
  fc_days: fc_days,
  city_id: city_id
  },
  function(data){
  
  $("#weather_status").html('<small><b>'+data+'</b></small>');
  });
  }
  
  </script>
</body>
</html>
