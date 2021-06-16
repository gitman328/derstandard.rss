<?php 
//
	include("parser/config.php");
	
	if(!isset($_REQUEST['kategorie']) or $_REQUEST['kategorie'] == ""){ $_REQUEST['kategorie'] = ""; }
	$kategorie = $_REQUEST['kategorie'];
	
	if(!isset($_REQUEST['textmode']) or $_REQUEST['textmode'] == ""){ $_REQUEST['textmode'] = ""; }
	$textmode = $_REQUEST['textmode'];
	
	if(!isset($_REQUEST['subcat']) or $_REQUEST['subcat'] == ""){ $_REQUEST['subcat'] = ""; }
	$subcat = $_REQUEST['subcat'];
	
	if(!isset($_REQUEST['page']) or $_REQUEST['page'] == ""){ $_REQUEST['page'] = ""; }
	$page = $_REQUEST['page'];
	
	$rubric_desc_sql = strtolower($kategorie);
	
	if($rubric_desc_sql == ""){ $rubric_desc_sql = "top_news"; }

	if($page == ""){ $page = 0; }

	$sql_0 = "SELECT * FROM `".$rubric_desc_sql."` ORDER BY `timestamp` DESC LIMIT ".$page.",104 ";
	
	if($subcat != "")
	{ 
	$sql_0 = "SELECT * FROM `".$rubric_desc_sql."` WHERE 
	`subcat_1` LIKE '".$subcat."' OR
	`subcat_2` LIKE '".$subcat."' OR
	`subcat_3` LIKE '".$subcat."' OR
	`subcat_4` LIKE '".$subcat."'
	ORDER BY `timestamp` DESC LIMIT ".$page.",104 "; 
	}
	
	if ($result_0 = mysqli_query($dbmysqli,$sql_0))
	{
	while ($obj = mysqli_fetch_object($result_0)){
	{
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
	
	if($obj->subcat_1 != ""){ $data1 = '<a href=\'?kategorie='.$obj->category.'&subcat='.$obj->subcat_1.'&textmode='.$textmode.'\'>'.$obj->subcat_1.'</a>'; } else { $data1 = ""; }
	if($obj->subcat_2 != ""){ $data2 = '<br><a href=\'?kategorie='.$obj->category.'&subcat='.$obj->subcat_2.'&textmode='.$textmode.'\'>'.$obj->subcat_2.'</a>'; } else { $data2 = ""; }
	if($obj->subcat_3 != ""){ $data3 = '<br><a href=\'?kategorie='.$obj->category.'&subcat='.$obj->subcat_3.'&textmode='.$textmode.'\'>'.$obj->subcat_3.'</a>'; } else { $data3 = ""; }
	if($obj->subcat_4 != ""){ $data4 = '<br><a href=\'?kategorie='.$obj->category.'&subcat='.$obj->subcat_4.'&textmode='.$textmode.'\'>'.$obj->subcat_4.'</a>'; } else { $data4 = ""; }
	
	$popup_content = $data1.$data2.$data3.$data4;
	
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
			<span style="float:right;">
			<small>
			<a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-html="true" data-content="'.$popup_content.'">
			<i title="Kategorie" style="cursor:pointer;" class="fa fa-list"></i></a>
			</small>
			</span>
		  </div>
		</div>
	  </div>
	';
	}
	
	if($textmode == "1")
	{
	$content_items = $content_items.'
	<div class="col-sm-4 col-md-2 col-lg-3 mb-4">
		<div id="'.$obj->id.'" class="card h-100">
		<div class="spacer_10"></div>
		  <a href="'.$obj->link.'" target="_blank">
		  <div class="card-body-text">
			<span class="card-title">
			  <strong><a href="'.$obj->link.'" target="_blank">'.$obj->title.'</a></strong>
			</span>
			<div class="spacer_10"></div>
			<div style="font-size:12px;">'.$obj->description.'</div>
		  </div>
		  <div class="card-footer-text" style="background-color:'.$card_bg_color.';">
			<span class="text-muted">'.$cat_link.' | '.$day_desc.', '.$obj->date.'</span>
			<span style="float:right;">
			<a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-html="true" data-content="'.$popup_content.'">
			<i title="Kategorie" style="cursor:pointer;" class="fa fa-list"></i></a>
			</span>
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
	
	if($textmode != "1"){ $col_style= "col-sm-6 col-md-4 col-lg-4 mb-4"; } else { $col_style = "col-sm-4 col-md-2 col-lg-3 mb-4"; }
	
	$show_more_tab = '
	<div id="show_more_tab" class="'.$col_style.'">
		<div class="card h-100" style="min-height:285px;">
		  <div class="card-body" style="background-color: #ccc;">
			<button class="btn btn-default btn-block btn-full" onclick="show_more(\''.$page.'\')">mehr anzeigen</button>
		  </div>
		</div>
	  </div>
	';
	
	if(!isset($content_items) or $content_items == ""){ $content_items = ""; $show_more_tab = ""; }
	
	echo $content_items.$show_more_tab;

?>
<script>

  $(function () {
  $('[data-toggle="popover"]').popover()
  })
  
</script>