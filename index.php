<?php 
//
	include("parser/config.php");
	
	if(!isset($_REQUEST['kategorie']) or $_REQUEST['kategorie'] == ""){ $_REQUEST['kategorie'] = ""; }
	$kategorie = $_REQUEST['kategorie'];
	
	if(!isset($_REQUEST['textmode']) or $_REQUEST['textmode'] == ""){ $_REQUEST['textmode'] = ""; }
	$textmode = $_REQUEST['textmode'];

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
	$sql_0 = "SELECT * FROM `".$rubric_desc_sql."` ORDER BY `timestamp` DESC LIMIT 0,".$limit." ";
	
	if ($result_0 = mysqli_query($dbmysqli,$sql_0))
	{
	while ($obj = mysqli_fetch_object($result_0)){
	{
	$loop = $loop +1;
	$day_desc = date("l", $obj->timestamp);
	$day_desc = str_replace("Monday", "Montag", $day_desc);
	$day_desc = str_replace("Tuesday", "Dienstag", $day_desc);
	$day_desc = str_replace("Wednesday", "Mittwoch", $day_desc);
	$day_desc = str_replace("Thursday", "Donnerstag", $day_desc);
	$day_desc = str_replace("Friday", "Freitag", $day_desc);
	$day_desc = str_replace("Saturday", "Samstag", $day_desc);
	$day_desc = str_replace("Sunday", "Sonntag", $day_desc);
	
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
      <div class="list-group nav-bar"> <a href="./?kategorie=<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active0; ?>">Aktuell</a> <a href="./?kategorie=Diskurs<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active1; ?>">Diskurs</a> <a href="./?kategorie=Etat<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active2; ?>">Etat</a> <a href="./?kategorie=Gesundheit<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active3; ?>">Gesundheit</a> <a href="./?kategorie=Immobilien<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active4; ?>">Immobilien</a> <a href="./?kategorie=Inland<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active5; ?>">Inland</a> <a href="./?kategorie=International<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active6; ?>">International</a> <a href="./?kategorie=Karriere<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active7; ?>">Karriere</a> <a href="./?kategorie=Kultur<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active8; ?>">Kultur</a> <a href="./?kategorie=Lifestyle<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active9; ?>">Lifestyle</a>
        <!--<a href="./?kategorie=Meinung" class="list-group-item">Meinung</a>-->
        <a href="./?kategorie=Panorama<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active10; ?>">Panorama</a>
        <!--<a href="./?kategorie=Reisen" class="list-group-item">Reisen</a>-->
        <a href="./?kategorie=Sport<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active11; ?>">Sport</a> <a href="./?kategorie=Web<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active12; ?>">Web</a> <a href="./?kategorie=Wirtschaft<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active13; ?>">Wirtschaft</a> <a href="./?kategorie=Wissenschaft<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active14; ?>">Wissenschaft</a> <a href="./?kategorie=dieStandard<?php if($textmode != ''){ echo '&textmode='.$textmode; }?>" class="list-group-item <?php echo $active15; ?>">dieStandard</a> </div>
    </div>
    <!-- /.col-lg-2 -->
    <div class="col-lg-10">
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
        <!-- col-12 -->
      </div>
      <!-- row -->
      <div class="spacer_10"></div>
      <div id="content_items" class="row"> <?php echo $content_items.$show_more_tab; ?> </div>
      <!-- /.row -->
    </div>
    <!-- /.col-lg-9 -->
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
  </script>
</body>
</html>
