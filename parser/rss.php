<?php 
//
	include("config.php");
	
	// top news
	$xmlfile = "https://derstandard.at/rss/";
	
	$xml = simplexml_load_file($xmlfile);

	if($xml){
    
	for ($i = 0; $i <= $i; $i++) {
	
	if(!isset($xml->channel->item[$i]->title) or $xml->channel->item[$i]->title == ""){ break; }
	
	$category = trim($xml->channel->item[$i]->category);
	$title = trim($xml->channel->item[$i]->title);
	$description = trim($xml->channel->item[$i]->description);
	$link = $xml->channel->item[$i]->link;
	$pubdate = $xml->channel->item[$i]->pubDate;
	
	// image
	preg_match_all("#src=\"(.*?)\"#si", $description, $match_image);
	if(!isset($match_image[0][0]) or $match_image[0][0] == ""){ $match_image[0][0] = ""; }
	$image = str_replace("src=\"", "", $match_image[0][0]);
	$image = str_replace("\"", "", $image);
	
	// news id
	$regex = '/(?<=\/)([0-9-]+)/is';
	preg_match_all($regex, $link, $match_news_id);
	if(!isset($match_news_id[0][0]) or $match_news_id[0][0] == ""){ $match_news_id[0][0] = ""; }
	$news_id = $match_news_id[0][0];

	$description = strip_tags($description);	
	$link = str_replace("?ref=rss", "", $link);
	$timestamp = strtotime($pubdate);
	$date = date("d.m.Y", $timestamp);
	$time = date("H:i", $timestamp);
	
	#
	$subcat_1 = '';
	$subcat_2 = '';
	$subcat_3 = '';
	$subcat_4 = '';
	$subcat_5 = '';
	#
	
	//
	$sql_0 = mysqli_query($dbmysqli, "SELECT COUNT(id) FROM `top_news` WHERE `news_id` LIKE '".$news_id."' ");
	$result_0 = mysqli_fetch_row($sql_0);
	$summary = $result_0[0];
	
	if($summary == 0)
	{
	mysqli_query($dbmysqli, "INSERT INTO `top_news` 
	(
	`category`, 
	`subcat_1`, 
	`subcat_2`, 
	`subcat_3`, 
	`subcat_4`, 
	`subcat_5`, 
	`title`, 
	`description`, 
	`image`, 
	`link`, 
	`pubdate`, 
	`date`, 
	`timestamp`, 
	`news_id`
	) 
	VALUES 
	(
	'".$category."', 
	'".$subcat_1."', 
	'".$subcat_2."', 
	'".$subcat_3."', 
	'".$subcat_4."', 
	'".$subcat_5."', 
	'".$title."', 
	'".$description."', 
	'".$image."', 
	'".$link."', 
	'".$pubdate."', 
	'".$date."', 
	'".$timestamp."', 
	'".$news_id."' 
	)
	");
	}
	
	}
	}
	// top news

	$rubric;
	//$rubric["top_news"] = "";
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
	
	$xmlfile = "https://derstandard.at/rss/".$rubric_desc."";
	
	$xml = simplexml_load_file($xmlfile);

	if($xml){
    
	for ($i = 0; $i <= $i; $i++) {
	
	if(!isset($xml->channel->item[$i]->title) or $xml->channel->item[$i]->title == ""){ break; }
	
	$category = trim($xml->channel->item[$i]->category);
	$title = trim($xml->channel->item[$i]->title);
	$description = trim($xml->channel->item[$i]->description);
	$link = $xml->channel->item[$i]->link;
	$pubdate = $xml->channel->item[$i]->pubDate;
	
	// sub category
//	if(!isset($xml->channel->item[$i]->category[1]) or $xml->channel->item[$i]->category[1] == ""){ $xml->channel->item[$i]->category[1] = ""; }
//	if(!isset($xml->channel->item[$i]->category[2]) or $xml->channel->item[$i]->category[2] == ""){ $xml->channel->item[$i]->category[2] = ""; }
//	if(!isset($xml->channel->item[$i]->category[4]) or $xml->channel->item[$i]->category[3] == ""){ $xml->channel->item[$i]->category[3] = ""; }
//	if(!isset($xml->channel->item[$i]->category[4]) or $xml->channel->item[$i]->category[4] == ""){ $xml->channel->item[$i]->category[4] = ""; }
//	if(!isset($xml->channel->item[$i]->category[5]) or $xml->channel->item[$i]->category[5] == ""){ $xml->channel->item[$i]->category[5] = ""; }
//	
//	$subcat_1 = $xml->channel->item[$i]->category[1];
//	$subcat_2 = $xml->channel->item[$i]->category[2];
//	$subcat_3 = $xml->channel->item[$i]->category[3];
//	$subcat_4 = $xml->channel->item[$i]->category[4];
//	$subcat_5 = $xml->channel->item[$i]->category[5];
//	
//	$subcat_1 = str_replace("\"", "", $subcat_1);
//	$subcat_2 = str_replace("\"", "", $subcat_2);
//	$subcat_3 = str_replace("\"", "", $subcat_3);
//	$subcat_4 = str_replace("\"", "", $subcat_4);
//	$subcat_5 = str_replace("\"", "", $subcat_5);
	
	#
	$subcat_1 = '';
	$subcat_2 = '';
	$subcat_3 = '';
	$subcat_4 = '';
	$subcat_5 = '';
	#
	
	// image
	preg_match_all("#src=\"(.*?)\"#si", $description, $match_image);
	if(!isset($match_image[0][0]) or $match_image[0][0] == ""){ $match_image[0][0] = ""; }
	$image = str_replace("src=\"", "", $match_image[0][0]);
	$image = str_replace("\"", "", $image);
	
	// news id
	$regex = '/(?<=\/)([0-9-]+)/is';
	preg_match_all($regex, $link, $match_news_id);
	if(!isset($match_news_id[0][0]) or $match_news_id[0][0] == ""){ $match_news_id[0][0] = ""; }
	$news_id = $match_news_id[0][0];

	$description = strip_tags($description);	
	$link = str_replace("?ref=rss", "", $link);
	$timestamp = strtotime($pubdate);
	$date = date("d.m.Y", $timestamp);
	$time = date("H:i", $timestamp);
	
	if($category == ""){ $category = $rubric_desc; }
	//if($category == "top_news"){ $category = ""; }
	
	if($rubric_desc == ""){ $rubric_desc = "top_news"; }
	
	if($rubric_desc != "top_news")
	{
	if($rubric_desc != "" and $rubric_desc != strtolower($category)){ $rubric_desc = strtolower($category); }	
	}
	
	if($category != 'diestandard'){ $category = ucfirst($category); }
	if($category == 'diestandard'){ $category = 'dieStandard'; }
	
	$sql_0 = mysqli_query($dbmysqli, "SELECT COUNT(id) FROM `".$rubric_desc."` WHERE `news_id` LIKE '".$news_id."' ");
	$result_0 = mysqli_fetch_row($sql_0);
	$summary = $result_0[0];
	
	if($summary == 0)
	{
	mysqli_query($dbmysqli, "INSERT INTO `".$rubric_desc."` 
	(
	`category`, 
	`subcat_1`, 
	`subcat_2`, 
	`subcat_3`, 
	`subcat_4`, 
	`subcat_5`, 
	`title`, 
	`description`, 
	`image`, 
	`link`, 
	`pubdate`, 
	`date`, 
	`timestamp`, 
	`news_id`
	) 
	VALUES 
	(
	'".$category."', 
	'".$subcat_1."', 
	'".$subcat_2."', 
	'".$subcat_3."', 
	'".$subcat_4."', 
	'".$subcat_5."', 
	'".$title."', 
	'".$description."', 
	'".$image."', 
	'".$link."', 
	'".$pubdate."', 
	'".$date."', 
	'".$timestamp."', 
	'".$news_id."' 
	)
	");
	
	if($category == 'Edition Zukunft')
	{
	$sql_1 = mysqli_query($dbmysqli, "SELECT COUNT(id) FROM `edition_zukunft` WHERE `news_id` LIKE '".$news_id."' ");
	$result_1 = mysqli_fetch_row($sql_1);
	$summary = $result_1[0];
	
	if($summary == 0)
	{
	mysqli_query($dbmysqli, "INSERT INTO `edition_zukunft` 
	(
	`category`, 
	`subcat_1`, 
	`subcat_2`, 
	`subcat_3`, 
	`subcat_4`, 
	`subcat_5`, 
	`title`, 
	`description`, 
	`image`, 
	`link`, 
	`pubdate`, 
	`date`, 
	`timestamp`, 
	`news_id`
	) 
	VALUES 
	(
	'Edition Zukunft', 
	'".$subcat_1."', 
	'".$subcat_2."', 
	'".$subcat_3."', 
	'".$subcat_4."', 
	'".$subcat_5."', 
	'".$title."', 
	'".$description."', 
	'".$image."', 
	'".$link."', 
	'".$pubdate."', 
	'".$date."', 
	'".$timestamp."', 
	'".$news_id."' 
	)
	");
	}
	}
	
	// set category top news
	if($category != '')
	{
	$sql_2 = mysqli_query($dbmysqli, "SELECT `category` FROM `".$rubric_desc."` WHERE `news_id` = '".$news_id."' ");
	$result_2 = mysqli_fetch_assoc($sql_2);
	if($result_2['category'] != ''){ mysqli_query($dbmysqli, "UPDATE `top_news` SET `category` = '".$category."' WHERE `news_id` = '".$news_id."' "); }
	}
	
	
	}
	}
	}
	
	sleep(2);
	
	}
	
	mysqli_query($dbmysqli, "DELETE FROM `lifestyle` WHERE `title` LIKE '%sudoku%' or `title` LIKE '%Kreuzwortr%' ");
	mysqli_query($dbmysqli, "DELETE FROM `top_news` WHERE `title` LIKE '%sudoku%' or `title` LIKE '%Kreuzwortr%' ");
	
	# euronews
	$xmlfile = "https://de.euronews.com/rss?format=mrss&level=vertical&name=my-europe";
	
	$xml = simplexml_load_file($xmlfile);

	if($xml){
    
	for ($i = 0; $i <= $i; $i++) {
	
	if(!isset($xml->channel->item[$i]->title) or $xml->channel->item[$i]->title == ""){ break; }

	$title = $xml->channel->item[$i]->title;
	$description = $xml->channel->item[$i]->description;
	$image = $xml->channel->item[$i]->children( 'media', True )->content->attributes()['url'];
	$link = $xml->channel->item[$i]->link;
	$pubdate = $xml->channel->item[$i]->pubDate;
	$timestamp = strtotime($xml->channel->item[$i]->pubDate);
	
	$link = str_replace("http://", "https://", $link);

	$sql_3 = mysqli_query($dbmysqli, "SELECT COUNT(id) FROM `euronews` WHERE `link` LIKE '".$link."' ");
	$result_3 = mysqli_fetch_row($sql_3);
	$summary = $result_3[0];
	
	if($summary == 0)
	{
	mysqli_query($dbmysqli, "INSERT INTO `euronews` 
	( 
	`title`, 
	`description`, 
	`image`, 
	`link`, 
	`pubdate`, 
	`timestamp` 
	) 
	VALUES 
	( 
	'".$title."', 
	'".$description."', 
	'".$image."', 
	'".$link."', 
	'".$pubdate."', 
	'".$timestamp."'
	)
	");
	
	}
	}
	}
	
	// set category
	$sql = "SELECT * FROM `top_news` WHERE `category` = '' ORDER BY `timestamp` DESC LIMIT 0,50";
	
	if ($result = mysqli_query($dbmysqli,$sql))
	{
	# $count_result = mysqli_num_rows($result);
	while ($obj = mysqli_fetch_object($result)) {
	{
	
	$rubric;
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
	$sql_1 = mysqli_query($dbmysqli, "SELECT `category` FROM `".$rubric_desc."` WHERE `news_id` = '".$obj->news_id."' ");
	$result_1 = mysqli_fetch_assoc($sql_1);
	$category = $result_1['category'];
	
	if($category != '')
	{
	mysqli_query($dbmysqli, "UPDATE `top_news` SET `category` = '".$category."' WHERE `news_id` = '".$obj->news_id."' ");
	}
	
	} // for each
	
	}
	}
  	// Free result set
  	mysqli_free_result($result);
	}
	//close db
	mysqli_close($dbmysqli);
	
?>