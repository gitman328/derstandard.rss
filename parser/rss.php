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
	
	$xmlfile = 'https://derstandard.at/rss/'.$rubric_desc.'';
	
	$xml = simplexml_load_file($xmlfile);

	if($xml){
    
	for ($i = 0; $i <= 20; $i++) {
	
	if($xml->channel->item[$i]->title == ''){ break; }

	$category = trim($xml->channel->item[$i]->category);
	$title = trim($xml->channel->item[$i]->title);
	$description = trim($xml->channel->item[$i]->description);
	$link = $xml->channel->item[$i]->link;
	$pubdate = utf8_decode($xml->channel->item[$i]->pubDate);
	
	// image
	preg_match_all("#src=\"(.*?)\"#si", $description, $match_image);
	$image = str_replace("src=\"", "", $match_image[0][0]);
	$image = str_replace("\"", "", $image);

	$description = str_replace('src="'.$image.'"', "", $description);
	$description = str_replace("<img style=\"float: right\" >", "", $description);
	
	$image = strtolower($image);
	
	$timestamp = strtotime($pubdate);
	
	$date = date("d.m.Y", $timestamp);
	
	$time = date("H:i", $timestamp);
	
	$hash = hash('md4',$link);
	
	if($rubric_desc == ""){ $rubric_desc = "top_news"; }

//	$item_no = $i + 1;
//	echo $item_no.'<br>';
//	echo 'Rubrik desc: '.$rubric_desc.'<br>';
//	echo 'Kategorie: '.$category.'<br>';
//	echo 'Title: '.$title.'<br>';
//	echo 'Beschreibung: '.$description.'<br>';
//	echo 'Image: '.$image.'<br>';
//	echo 'Link: '.$link.'<br>';
//	echo 'Datum: '.$date.'<br>';
//	echo 'Zeit: '.$time.'<br>';
//	echo 'Timestamp: '.$timestamp.'<br>';
//	echo 'Hash: '.$hash.'<br>';
//	echo '<hr>
//	';
	
	$sql_0 = mysqli_query($dbmysqli, "SELECT COUNT(id) FROM `".$rubric_desc."` WHERE `hash` LIKE '".$hash."' ");
	$result_0 = mysqli_fetch_row($sql_0);
	$summary = $result_0[0];
	
	if($summary == 0)
	{
	mysqli_query($dbmysqli, "INSERT INTO `".$rubric_desc."` 
	(
	`category`, 
	`title`, 
	`description`, 
	`image`, 
	`link`, 
	`pubdate`, 
	`date`, 
	`timestamp`, 
	`hash`
	) 
	VALUES 
	(
	'".$category."', 
	'".$title."', 
	'".$description."', 
	'".$image."', 
	'".$link."', 
	'".$pubdate."', 
	'".$date."', 
	'".$timestamp."', 
	'".$hash."' 
	)
	");
	
	}
	
	}
	
	}
	
	sleep(3);
	
	}
	
?>