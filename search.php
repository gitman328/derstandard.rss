<?php 
//
	include("parser/config.php");
	
	$term = $_REQUEST['term'];
	$category = $_REQUEST['category'];
	$searcharea = $_REQUEST['searcharea'];
	$textmode = $_REQUEST["textmode"];
	
	if($category != "alle")
	{
	if($searcharea == "alle"){ $sql = "SELECT * FROM `".$category."` WHERE `title` LIKE '%".$term."%' OR `description` LIKE '%".$term."%' ORDER BY `timestamp` DESC LIMIT 0,100"; }
	if($searcharea == "titel"){ $sql = "SELECT * FROM `".$category."` WHERE `title` LIKE '%".$term."%' ORDER BY `timestamp` DESC LIMIT 0,100"; }
	if($searcharea == "beschreibung"){ $sql = "SELECT * FROM `".$category."` WHERE `description` LIKE '%".$term."%' ORDER BY `timestamp` DESC LIMIT 0,100"; }
	
	if ($result = mysqli_query($dbmysqli,$sql))
	{
	while ($obj = mysqli_fetch_object($result)){
	{
	
	if($category == "alle"){ $title = "<strong>".$obj->category."</strong> | "; } else { $title = ""; }
	
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
	
	if(!isset($result_list) or $result_list == ""){ echo "Mit dem Suchbegriff wurden keine Nachrichten gefunden..<div class=\"spacer_20\"></div>"; } else { echo $result_list; }
	
	} // category search
	
	// full search
	if($category == "alle")
	{
	$loop = 0;
	
	if($searcharea == "alle")
	{ 
	$sql = "
	SELECT *
	FROM `diskurs`
	WHERE `title` LIKE '%".$term."%' OR `description` LIKE '%".$term."%'
	UNION
	SELECT *
	FROM `etat`
	WHERE `title` LIKE '%".$term."%' OR `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `gesundheit`
	WHERE `title` LIKE '%".$term."%' OR `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `immobilien`
	WHERE `title` LIKE '%".$term."%' OR `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `inland`
	WHERE `title` LIKE '%".$term."%' OR `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `international`
	WHERE `title` LIKE '%".$term."%' OR `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `karriere`
	WHERE `title` LIKE '%".$term."%' OR `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `kultur`
	WHERE `title` LIKE '%".$term."%' OR `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `lifestyle`
	WHERE `title` LIKE '%".$term."%' OR `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `panorama`
	WHERE `title` LIKE '%".$term."%' OR `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `sport`
	WHERE `title` LIKE '%".$term."%' OR `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `web`
	WHERE `title` LIKE '%".$term."%' OR `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `wirtschaft`
	WHERE `title` LIKE '%".$term."%' OR `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `wissenschaft`
	WHERE `title` LIKE '%".$term."%' OR `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `diestandard`
	WHERE `title` LIKE '%".$term."%' OR `description` LIKE '%".$term."%' ORDER BY timestamp DESC LIMIT 0,100";
	}
	
	if($searcharea == "titel")
	{ 
	$sql = "
	SELECT *
	FROM `diskurs`
	WHERE `title` LIKE '%".$term."%' 
	UNION
	SELECT *
	FROM `etat`
	WHERE `title` LIKE '%".$term."%' 
	UNION
	SELECT * FROM `gesundheit`
	WHERE `title` LIKE '%".$term."%' 
	UNION
	SELECT * FROM `immobilien`
	WHERE `title` LIKE '%".$term."%' 
	UNION
	SELECT * FROM `inland`
	WHERE `title` LIKE '%".$term."%' 
	UNION
	SELECT * FROM `international`
	WHERE `title` LIKE '%".$term."%' 
	UNION
	SELECT * FROM `karriere`
	WHERE `title` LIKE '%".$term."%' 
	UNION
	SELECT * FROM `kultur`
	WHERE `title` LIKE '%".$term."%' 
	UNION
	SELECT * FROM `lifestyle`
	WHERE `title` LIKE '%".$term."%' 
	UNION
	SELECT * FROM `panorama`
	WHERE `title` LIKE '%".$term."%' 
	UNION
	SELECT * FROM `sport`
	WHERE `title` LIKE '%".$term."%' 
	UNION
	SELECT * FROM `web`
	WHERE `title` LIKE '%".$term."%' 
	UNION
	SELECT * FROM `wirtschaft`
	WHERE `title` LIKE '%".$term."%' 
	UNION
	SELECT * FROM `wissenschaft`
	WHERE `title` LIKE '%".$term."%' 
	UNION
	SELECT * FROM `diestandard`
	WHERE `title` LIKE '%".$term."%' ORDER BY timestamp DESC LIMIT 0,100";
	}
	
	if($searcharea == "beschreibung")
	{ 
	$sql = "
	SELECT *
	FROM `diskurs`
	WHERE `description` LIKE '%".$term."%'
	UNION
	SELECT *
	FROM `etat`
	WHERE `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `gesundheit`
	WHERE `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `immobilien`
	WHERE `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `inland`
	WHERE `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `international`
	WHERE `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `karriere`
	WHERE `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `kultur`
	WHERE `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `lifestyle`
	WHERE `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `panorama`
	WHERE `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `sport`
	WHERE `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `web`
	WHERE `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `wirtschaft`
	WHERE `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `wissenschaft`
	WHERE `description` LIKE '%".$term."%'
	UNION
	SELECT * FROM `diestandard`
	WHERE `description` LIKE '%".$term."%' ORDER BY timestamp DESC LIMIT 0,100";
	}
	
	if ($result = mysqli_query($dbmysqli,$sql))
	{
	while ($row = mysqli_fetch_row($result))
    {
	
	if(!isset($result_list) or $result_list == ""){ $result_list = ""; }
	
	$category = $row[1];
	$subcat_1 = $row[2];
	$subcat_2 = $row[3];
	$subcat_3 = $row[4];
	$subcat_4 = $row[5];
	$subcat_5 = $row[6];
	$title = $row[7];
	$description = $row[8];
	$image = $row[9];
	$link = $row[10];
	$pubdate = $row[11];
	$date = $row[12];
	$timestamp = $row[13];

	$loop = $loop + 1;

	if($subcat_1 != ""){ $data1 = ' | <a href="?kategorie='.$category.'&subcat='.$subcat_1.'&textmode='.$textmode.'">'.$subcat_1.'</a>'; } else { $data1 = ""; }
	if($subcat_2 != ""){ $data2 = ' | <a href="?kategorie='.$category.'&subcat='.$subcat_2.'&textmode='.$textmode.'">'.$subcat_2.'</a>'; } else { $data2 = ""; }
	if($subcat_3 != ""){ $data3 = ' | <a href="?kategorie='.$category.'&subcat='.$subcat_3.'&textmode='.$textmode.'">'.$subcat_3.'</a>'; } else { $data3 = ""; }
	if($subcat_4 != ""){ $data4 = ' | <a href="?kategorie='.$category.'&subcat='.$subcat_4.'&textmode='.$textmode.'">'.$subcat_4.'</a>'; } else { $data4 = ""; }
	
	$subcats = $data1.$data2.$data3.$data4;
	
	$result_list = $result_list.'
	<div style="background-color:#FFFFFF; padding-left: 5px; border: thin solid #F0F0F0;">
	<div class="spacer_3"></div>
	<div style="font-size: 15px;">'.$date.' | <strong>
	<a href="'.$link.'" target="_blank">'.$title.'</a></strong> | <small class="text-muted">
	<a href="?kategorie='.$category.'&textmode='.$textmode.'">'.$category.'</a>'.$subcats.'
	</small></strong><br>'.$description.'</div>
	<div class="spacer_5"></div>
	</div>
	<div class="spacer_20"></div>
	';

    }
	}
	
	$result_msg = "Mit dem Suchbegriff gibt es <strong>".$loop."</strong> Treffer.<div class=\"spacer_20\"></div>";
	
	if($loop > 100){ $max_msg = "Maximal <strong>100</strong> Treffer werden angezeigt."; } else { $max_msg = ""; }
	
	if(!isset($result_list) or $result_list == "")
	{ 
	echo "Mit dem Suchbegriff wurden keine Nachrichten gefunden..<div class=\"spacer_20\"></div>";
	
	} else { 
	
	echo $result_msg.$result_list.$max_msg; 
	}
	
	} // full search

?>