<?php 
//
	@$dbmysqli = mysqli_connect("localhost", "sql-benutzername", "sql-passwort", "sql-datenbank");

	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$category = $_REQUEST['category'];
	$term = $_REQUEST['term'];
	
	if($category != "alle")
	{
	$sql = "SELECT * FROM `".$category."` WHERE `title` LIKE '%".$term."%' OR `description` LIKE '%".$term."%' ORDER BY `timestamp` DESC LIMIT 0,100";
	
	if ($result = mysqli_query($dbmysqli,$sql))
	{
	while ($obj = mysqli_fetch_object($result)){
	{
	
	if($category == 'alle'){ $title = '<strong>'.$obj->category.'</strong> | '; } else { $title = ''; }
	
	if(!isset($result_list) or $result_list == ""){ $result_list = ""; }
	
	$result_list = $result_list.'
	<div style="background-color:#FFFFFF; padding-left: 5px; border: thin solid #F0F0F0;">
	<div class="spacer_3"></div>
	<small>'.$obj->date.' | '.$title.' <a href="'.$obj->link.'" target="_blank">'.$obj->title.'</a><br>'.$obj->description.'</small>
	<div class="spacer_5"></div>
	</div>
	<div class="spacer_20"></div>
	';
	
	}
	}
	}
	
	if($result_list == ""){ echo 'Mit dem Suchbegriff wurden keine Nachrichten gefunden..'; } else { echo $result_list; }
	
	} // category search
	
	// full search
	if($category == "alle")
	{
	$loop = 0;
	$rubric;
	//$rubric["top_news"] = "top_news";
	$rubric["diskurs"] = "diskurs";
	$rubric["etat"] = "etat";
	$rubric["gesundheit"] = "gesundheit";
	$rubric["immobilien"] = "immobilien";
	$rubric["inland"] = "inland";
	$rubric["international"] = "international";
	$rubric["karriere"] = "karriere";
	$rubric["kultur"] = "kultur";
	$rubric["lifestyle"] = "lifestyle";
	//$rubric["meinung"] = "meinung";
	$rubric["panorama"] = "panorama";
	//$rubric["reisen"] = "reisen";
	$rubric["sport"] = "sport";
	$rubric["web"] = "web";
	$rubric["wirtschaft"] = "wirtschaft";
	$rubric["wissenschaft"] = "wissenschaft";
	$rubric["diestandard"] = "diestandard";
	
	foreach( $rubric as $key => $rubric_desc)
	{
	
	$sql = mysqli_query($dbmysqli, "SELECT * FROM `".$rubric_desc."` WHERE `title` LIKE '%".$term."%' OR `description` LIKE '%".$term."%' ORDER BY `timestamp` DESC LIMIT 0,100");
	$result = mysqli_fetch_assoc($sql);
	
	if(!isset($result_list) or $result_list == ""){ $result_list = ""; }
	
	if($result['category'] != ""){
	
	$loop = $loop + 1;
	
	$result_list = $result_list.'
	<div style="background-color:#FFFFFF; padding-left: 5px; border: thin solid #F0F0F0;">
	<div class="spacer_3"></div>
	<div style="font-size: 15px;">'.$result['date'].' | <strong><a href="'.$result['link'].'" target="_blank">'.$result['title'].'</a></strong> | <small class="text-muted">'.$result['category'].'</small></strong><br>'.$result['description'].'</div>
	<div class="spacer_5"></div>
	</div>
	<div class="spacer_20"></div>
	';
	}
	}
	
	if($loop > 100){ $max_msg = 'Maximal <strong>100</strong> Treffer werden angezeigt.'; } else { $max_msg = ''; }
	
	if($result_list == ""){ echo 'Mit dem Suchbegriff wurden keine Nachrichten gefunden..'; } else { echo $result_list.$max_msg; }
	
	} // full search

?>