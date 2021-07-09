<?php 
//
	include("config.php");

	$rubric;
	$rubric["top_news"] = "";
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
	if(!isset($xml->channel->item[$i]->category[1]) or $xml->channel->item[$i]->category[1] == ""){ $xml->channel->item[$i]->category[1] = ""; }
	if(!isset($xml->channel->item[$i]->category[2]) or $xml->channel->item[$i]->category[2] == ""){ $xml->channel->item[$i]->category[2] = ""; }
	if(!isset($xml->channel->item[$i]->category[4]) or $xml->channel->item[$i]->category[3] == ""){ $xml->channel->item[$i]->category[3] = ""; }
	if(!isset($xml->channel->item[$i]->category[4]) or $xml->channel->item[$i]->category[4] == ""){ $xml->channel->item[$i]->category[4] = ""; }
	if(!isset($xml->channel->item[$i]->category[5]) or $xml->channel->item[$i]->category[5] == ""){ $xml->channel->item[$i]->category[5] = ""; }
	
	$subcat_1 = $xml->channel->item[$i]->category[1];
	$subcat_2 = $xml->channel->item[$i]->category[2];
	$subcat_3 = $xml->channel->item[$i]->category[3];
	$subcat_4 = $xml->channel->item[$i]->category[4];
	$subcat_5 = $xml->channel->item[$i]->category[5];
	
	// image
	preg_match_all("#src=\"(.*?)\"#si", $description, $match_image);
	if(!isset($match_image[0][0]) or $match_image[0][0] == ""){ $match_image[0][0] = ""; }
	$image = str_replace("src=\"", "", $match_image[0][0]);
	$image = str_replace("\"", "", $image);
	
	// news id
	$regex = '/(?<=\/)([0-9-]+)/is';
	preg_match_all($regex, $link, $match_news_id);
	$news_id = $match_news_id[0][0];

	$description = strip_tags($description);	
	$link = str_replace("?ref=rss", "", $link);
	$timestamp = strtotime($pubdate);
	$date = date("d.m.Y", $timestamp);
	$time = date("H:i", $timestamp);
	
	if($rubric_desc == ""){ $rubric_desc = "top_news"; }
	
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
	}
	
	}
	}
	
	sleep(3);
	
	}
	
?>
