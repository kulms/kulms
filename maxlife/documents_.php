<?php
header ('Content-type: text/html; charset=utf-8');
header('Pragma: no-cache');
header('cache-Control: no-cache, must-revalidate'); // HTTP/1.1
session_start();
require_once 'connectdb.php'; 
//echo $susername;
//$sqluser = "SELECT id FROM users WHERE login = '".$susername."';";
//$quser = mysql_query($sqluser);
//$userid = mysql_result($quser,0,"id");

//$userid=$_GET["user"];
//$courseid=$_GET["course"];
//$newsid=$_GET["news"];
//$catid=$_GET["cat"];
//$groupid=$_GET["group"];


//$_SESSION["uid"] = $userid;
//$_SESSION["cid"] = $courseid;
//$_SESSION["nid"] = $newsid;
//session_write_close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>M@xLife, Kasetsart University Mobile Application</title>
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<link href="dependencies/screen.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="assets/stylesheets/master.css" />

<script src="assets/javascripts/jquery.js"></script>
<script src="assets/javascripts/master.js"></script>
</head>
<body>
<div id="main" class="abs">
	<div class="abs header_upper chrome_light">
		<span class="float_left button" id="button_navigation">
			Navigation
		</span>
        <!--
		<a href="index.php" class="float_left button">
			Back
		</a>
        -->
		<a href="logout.php" class="float_right button">
			Sign out
		</a>
		Home
	</div>
	<!--
    <div class="abs header_lower chrome_light">
		<a href="#" class="icon icon_refresh"></a>
		<a href="#" class="icon icon_redo"></a>
		<a href="#" class="icon icon_loopback"></a>
		<a href="#" class="icon icon_squiggle"></a>
		<a href="#" class="icon icon_shuffle"></a>
		<a href="#" class="icon icon_magnifying_glass"></a>
		<a href="#" class="icon icon_map_marker"></a>
		<a href="#" class="icon icon_chat"></a>
		<a href="#" class="icon icon_chat2"></a>
		<a href="#" class="icon icon_medical"></a>
		<a href="#" class="icon icon_clock"></a>
		<a href="#" class="icon icon_eye"></a>
		<a href="#" class="icon icon_target"></a>
		<a href="#" class="icon icon_tag"></a>
		<a href="#" class="icon icon_tags"></a>
	</div>
    -->
	<div id="main_content" class="abs">
		<div id="main_content_inner">
		  <h1>
				Wall Posting for M@xLearn
			</h1>
            
            <div align="center">	                                  
            
               <iframe src="http://localhost/wallpost/index.php?user=<? echo $susername;?>" width="100%" height="420" frameborder="0">
                  <p>Your browser does not support iframes.</p>
               </iframe>
        	</div>
                        
        <br clear="all" />
        <br clear="all" />
            <!--
			<p>
				<img src="http://localhost/lms/files/resources_files/2/1/download_form.jpg" />
			</p>
            -->
		</div>
	</div>
	<div class="abs footer_lower chrome_light">
		<a href="#" class="float_left button">
			Foo
		</a>
		<a href="#" class="float_left button">
			Bar
		</a>
		<a href="#" class="icon icon_bird float_right"></a>
		<a href="#">View full site</a>
	</div>
</div>
<div id="sidebar" class="abs">
	<span id="nav_arrow"></span>
	<div class="abs header_upper chrome_light">
		M@xLife
	</div>
	<form action="" class="abs header_lower chrome_light">
		<input type="search" id="q" name="q" placeholder="Search..." />
	</form>
	<?
	require "menu.php";
    ?>
	<div class="abs footer_lower chrome_light">
		<a href="#" class="icon icon_gear2 float_left"></a>
		<span class="float_right gutter_right">version 1.0</span>
	</div>
</div>
</body>
</html>