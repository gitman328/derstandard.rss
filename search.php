<?php 
//
	include("parser/config.php");
	
	if(!isset($_REQUEST["page"]) or $_REQUEST["page"] == "") { $_REQUEST["page"] = ""; }
	
	$term = $_REQUEST["term"];
	$category = $_REQUEST["category"];
	$searcharea = $_REQUEST["searcharea"];
	$textmode = $_REQUEST["textmode"];
	$page = $_REQUEST["page"];
	
	if($page == ""){ $page = 0; }
	if($page == 0){ $nav_backward = 0; $nav_forward = $page + 1; }
	if($page >= 1){ $nav_backward = $page - 1; $nav_forward = $page + 1; }
	$pagecount = $page + 1;
	$sql_page = $page * 100;
	
	$search_results = "";
	
	if($category != "alle")
	{
	// titel + beschreibung
	if($searcharea == "alle")
	{
	
	$tags = explode('+', $term);
	$x = count($tags);
	
	foreach($tags as $i => $key) 
	{ 
	$i > 0;
	if(!isset($title_search) or $title_search == "") { $title_search = ""; }
	if($i == $x-1){ $operator = ""; } else { $operator = "AND"; }
	if(!isset($key) or $key == "") { $parameter = ""; } else { $parameter = "`title` LIKE '%".$key."%' ".$operator." "; }
	$title_search = $title_search.$parameter;
	}
	
	foreach($tags as $i => $key) 
	{ 
	$i > 0;
	if(!isset($description_search) or $description_search == "") { $description_search = ""; }
	if($i == $x-1){ $operator = ""; } else { $operator = "AND"; }
	if(!isset($key) or $key == "") { $parameter = ""; } else { $parameter = "`description` LIKE '%".$key."%' ".$operator." "; }
	$description_search = $description_search.$parameter;
	}
	$sql = "SELECT * FROM `".$category."` WHERE ".$title_search." OR ".$description_search." ORDER BY `timestamp` DESC LIMIT ".$sql_page.",100"; 
	}
	
	// titel
	if($searcharea == "titel")
	{
	$tags = explode('+', $term);
	$x = count($tags);
	
	if($page == ""){ $page = 0; }
	
	foreach($tags as $i => $key) 
	{ 
	$i > 0;
	if(!isset($title_search) or $title_search == "") { $title_search = ""; }
	if($i == $x-1){ $operator = ""; } else { $operator = "AND"; }
	if(!isset($key) or $key == "") { $parameter = ""; } else { $parameter = "`title` LIKE '%".$key."%' ".$operator." "; }
	$title_search = $title_search.$parameter;
	}
	$sql = "SELECT * FROM `".$category."` WHERE ".$title_search." ORDER BY `timestamp` DESC LIMIT ".$sql_page.",100";
	}
	
	// beschreibung
	if($searcharea == "beschreibung")
	{
	$tags = explode('+', $term);
	$x = count($tags);
	
	foreach($tags as $i => $key) 
	{ 
	$i > 0;
	if(!isset($description_search) or $description_search == "") { $description_search = ""; }
	if($i == $x-1){ $operator = ""; } else { $operator = "AND"; }
	if(!isset($key) or $key == "") { $parameter = ""; } else { $parameter = "`description` LIKE '%".$key."%' ".$operator." "; }
	$description_search = $description_search.$parameter;
	}
	$sql = "SELECT * FROM `".$category."` WHERE ".$description_search." ORDER BY `timestamp` DESC LIMIT ".$sql_page.",100";
	}
	
	if ($result = mysqli_query($dbmysqli,$sql))
	{
	$search_results = mysqli_num_rows($result);
	while ($obj = mysqli_fetch_object($result)){
	{
	
	if(!isset($result_list) or $result_list == ""){ $result_list = ""; }
	
	$result_list = $result_list.'
	<div style="background-color:#FFFFFF; padding-left: 5px; border: thin solid #F0F0F0;">
	<div class="spacer_3"></div>
	<div style="font-size: 15px;">'.$obj->date.' | <strong>
	<a href="'.$obj->link.'" target="_blank">'.$obj->title.'</a></strong>
	<br>'.$obj->description.'</div>
	<div class="spacer_5"></div>
	</div>
	<div class="spacer_20"></div>
	';
	
	}
	}
	}
	
	if($search_results < 100){ $nav_forward = ""; $btn_status = 'display:none;'; } else { $btn_status = ''; }
	
	$result_msg = "
	Es werden ".$search_results." Eintr&auml;ge auf der Seite angezeigt.
	<span style=\"float:right\">
	<button style=\"cursor:pointer; font-size:10px;\" onclick=\"search_news('".$nav_backward."')\" title=\"Seite zur&uuml;ck\"> <<< </button>
	&nbsp;Seite <strong>".$pagecount."</strong>&nbsp;
	<button style=\"cursor:pointer; font-size:10px; ".$btn_status."\" onclick=\"search_news('".$nav_forward."')\" title=\"Seite vorw&auml;rts\"> >>> </button>
	</span>
	<div class=\"spacer_20\"></div>";
	
	$result_msg_f = "
	<span style=\"float:right\">
	<button style=\"cursor:pointer; font-size:10px;\" onclick=\"search_news('".$nav_backward."'); scroll_top()\" title=\"Seite zur&uuml;ck\"> <<< </button>
	&nbsp;Seite <strong>".$pagecount."</strong>&nbsp;
	<button style=\"cursor:pointer; font-size:10px; ".$btn_status."\" onclick=\"search_news('".$nav_forward."'); scroll_top()\" title=\"Seite vorw&auml;rts\"> >>> </button>
	</span>
	<div class=\"spacer_20\"></div>";
	
	if(!isset($result_list) or $result_list == "")
	{ 
	echo "Mit der Suchanfrage wurden keine Nachrichten gefunden.<div class=\"spacer_20\"></div>"; } else { echo $result_msg.$result_list.$result_msg_f; }
	
	} 
	// kategorie suche
	
	
	// vollsuche
	if($category == "alle")
	{
	// titel + beschreibung
	if($searcharea == "alle")
	{ 
	
	$tags = explode('+', $term);
	$x = count($tags);
	
	foreach($tags as $i => $key) 
	{ 
	$i > 0;
	if(!isset($title_search) or $title_search == "") { $title_search = ""; }
	if($i == $x-1){ $operator = ""; } else { $operator = "AND"; }
	if(!isset($key) or $key == "") { $parameter = ""; } else { $parameter = "`title` LIKE '%".$key."%' ".$operator." "; }
	$title_search = $title_search.$parameter;
	}
	
	$tags = explode('+', $term);
	$x = count($tags);
	
	foreach($tags as $i => $key) 
	{ 
	$i > 0;
	if(!isset($description_search) or $description_search == "") { $description_search = ""; }
	if($i == $x-1){ $operator = ""; } else { $operator = "AND"; }
	if(!isset($key) or $key == "") { $parameter = ""; } else { $parameter = "`description` LIKE '%".$key."%' ".$operator." "; }
	$description_search = $description_search.$parameter;
	}
	
	$sql = "
	SELECT *
	FROM `diskurs`
	WHERE ".$title_search." OR ".$description_search." 
	UNION
	SELECT *
	FROM `etat`
	WHERE ".$title_search." OR ".$description_search." 
	UNION
	SELECT * FROM `gesundheit`
	WHERE ".$title_search." OR ".$description_search." 
	UNION
	SELECT * FROM `immobilien`
	WHERE ".$title_search." OR ".$description_search." 
	UNION
	SELECT * FROM `inland`
	WHERE ".$title_search." OR ".$description_search." 
	UNION
	SELECT * FROM `international`
	WHERE ".$title_search." OR ".$description_search." 
	UNION
	SELECT * FROM `karriere`
	WHERE ".$title_search." OR ".$description_search." 
	UNION
	SELECT * FROM `kultur`
	WHERE ".$title_search." OR ".$description_search." 
	UNION
	SELECT * FROM `lifestyle`
	WHERE ".$title_search." OR ".$description_search." 
	UNION
	SELECT * FROM `panorama`
	WHERE ".$title_search." OR ".$description_search." 
	UNION
	SELECT * FROM `sport`
	WHERE ".$title_search." OR ".$description_search." 
	UNION
	SELECT * FROM `web`
	WHERE ".$title_search." OR ".$description_search." 
	UNION
	SELECT * FROM `wirtschaft`
	WHERE ".$title_search." OR ".$description_search." 
	UNION
	SELECT * FROM `wissenschaft`
	WHERE ".$title_search." OR ".$description_search." 
	UNION
	SELECT * FROM `diestandard`
	WHERE ".$title_search." OR ".$description_search." ORDER BY timestamp DESC LIMIT ".$sql_page.",100";
	}
	
	// titel
	if($searcharea == "titel")
	{ 
	
	$tags = explode('+', $term);
	$x = count($tags);
	
	foreach($tags as $i => $key) 
	{ 
	$i > 0;
	if(!isset($title_search) or $title_search == "") { $title_search = ""; }
	if($i == $x-1){ $operator = ""; } else { $operator = "AND"; }
	if(!isset($key) or $key == "") { $parameter = ""; } else { $parameter = "`title` LIKE '%".$key."%' ".$operator." "; }
	$title_search = $title_search.$parameter;
	}
	
	$sql = "
	SELECT *
	FROM `diskurs`
	WHERE ".$title_search."
	UNION
	SELECT *
	FROM `etat`
	WHERE ".$title_search."
	UNION
	SELECT * FROM `gesundheit`
	WHERE ".$title_search."
	UNION
	SELECT * FROM `immobilien`
	WHERE ".$title_search."
	UNION
	SELECT * FROM `inland`
	WHERE ".$title_search."
	UNION
	SELECT * FROM `international`
	WHERE ".$title_search."
	UNION
	SELECT * FROM `karriere`
	WHERE ".$title_search."
	UNION
	SELECT * FROM `kultur`
	WHERE ".$title_search."
	UNION
	SELECT * FROM `lifestyle`
	WHERE ".$title_search."
	UNION
	SELECT * FROM `panorama`
	WHERE ".$title_search."
	UNION
	SELECT * FROM `sport`
	WHERE ".$title_search."
	UNION
	SELECT * FROM `web`
	WHERE ".$title_search."
	UNION
	SELECT * FROM `wirtschaft`
	WHERE ".$title_search."
	UNION
	SELECT * FROM `wissenschaft`
	WHERE ".$title_search."
	UNION
	SELECT * FROM `diestandard`
	WHERE ".$title_search." ORDER BY timestamp DESC LIMIT ".$sql_page.",100";
	}
	
	// beschreibung
	if($searcharea == "beschreibung")
	{ 
	
	$tags = explode('+', $term);
	$x = count($tags);
	
	foreach($tags as $i => $key) 
	{ 
	$i > 0;
	if(!isset($description_search) or $description_search == "") { $description_search = ""; }
	if($i == $x-1){ $operator = ""; } else { $operator = "AND"; }
	if(!isset($key) or $key == "") { $parameter = ""; } else { $parameter = "`description` LIKE '%".$key."%' ".$operator." "; }
	$description_search = $description_search.$parameter;
	}
	
	$sql = "
	SELECT *
	FROM `diskurs`
	WHERE ".$description_search."
	UNION
	SELECT *
	FROM `etat`
	WHERE ".$description_search."
	UNION
	SELECT * FROM `gesundheit`
	WHERE ".$description_search."
	UNION
	SELECT * FROM `immobilien`
	WHERE ".$description_search."
	UNION
	SELECT * FROM `inland`
	WHERE ".$description_search."
	UNION
	SELECT * FROM `international`
	WHERE ".$description_search."
	UNION
	SELECT * FROM `karriere`
	WHERE ".$description_search."
	UNION
	SELECT * FROM `kultur`
	WHERE ".$description_search."
	UNION
	SELECT * FROM `lifestyle`
	WHERE ".$description_search."
	UNION
	SELECT * FROM `panorama`
	WHERE ".$description_search."
	UNION
	SELECT * FROM `sport`
	WHERE ".$description_search."
	UNION
	SELECT * FROM `web`
	WHERE ".$description_search."
	UNION
	SELECT * FROM `wirtschaft`
	WHERE ".$description_search."
	UNION
	SELECT * FROM `wissenschaft`
	WHERE ".$description_search."
	UNION
	SELECT * FROM `diestandard`
	WHERE ".$description_search." ORDER BY timestamp DESC LIMIT ".$sql_page.",100";
	}
	
	if ($result = mysqli_query($dbmysqli,$sql))
	{
	$search_results = mysqli_num_rows($result);
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
	
	if($search_results < 100){ $nav_forward = ""; $btn_status = "display:none;"; } else { $btn_status = ""; }
	
	$result_msg = "
	Es werden ".$search_results." Eintr&auml;ge auf der Seite angezeigt.
	<span style=\"float:right\">
	<button style=\"cursor:pointer; font-size:10px;\" onclick=\"search_news('".$nav_backward."')\" title=\"Seite zur&uuml;ck\"> <<< </button>
	&nbsp;Seite <strong>".$pagecount."</strong>&nbsp;
	<button style=\"cursor:pointer; font-size:10px; ".$btn_status."\" onclick=\"search_news('".$nav_forward."')\" title=\"Seite vorw&auml;rts\"> >>> </button>
	</span>
	<div class=\"spacer_20\"></div>";
	
	$result_msg_f = "
	<span style=\"float:right\">
	<button style=\"cursor:pointer; font-size:10px;\" onclick=\"search_news('".$nav_backward."'); scroll_top()\" title=\"Seite zur&uuml;ck\"> <<< </button>
	&nbsp;Seite <strong>".$pagecount."</strong>&nbsp;
	<button style=\"cursor:pointer; font-size:10px; ".$btn_status."\" onclick=\"search_news('".$nav_forward."'); scroll_top()\" title=\"Seite vorw&auml;rts\"> >>> </button>
	</span>
	<div class=\"spacer_20\"></div>";
	
	
	if(!isset($result_list) or $result_list == "")
	{ 
	echo "Mit der Suchanfrage wurden keine Nachrichten gefunden..<div class=\"spacer_20\"></div>";
	
	} else { 
	
	echo $result_msg.$result_list.$result_msg_f; 
	}
	
	} // vollsuche

?>