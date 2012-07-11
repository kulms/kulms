<?php
header ('Content-type: text/html; charset=tis-620');
header('Pragma: no-cache');
header('cache-Control: no-cache, must-revalidate'); // HTTP/1.1
session_start();
require_once '../connectdb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>M@xLife, Kasetsart University Mobile Application</title>
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<link rel="stylesheet" href="../assets/stylesheets/master.css" />

<!--[if IE 8]>
<link rel="stylesheet" href="assets/stylesheets/ie8.css" />
<![endif]-->
<!--[if !IE]><!-->
<script src="../assets/javascripts/iscroll.js"></script>
<!--<![endif]-->
<script src="../assets/javascripts/jquery.js"></script>
<script src="../assets/javascripts/master.js"></script>
<script src="../assets/javascripts/jqModal.js"></script>

<script src="../assets/javascripts/jquery.simplemodal.js"></script>
<script src="../assets/javascripts/basic.js"></script>

	<!--<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css">-->
    <link rel="stylesheet" type="text/css"  href="../assets/stylesheets/base/jquery.ui.all.css" />
	<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>-->
	<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js"></script>-->
    <script type="text/javascript" src="../assets/javascripts/jquery-ui-1.8.19.custom.min.js"></script>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div id="main" class="abs">
	<div class="abs header_upper chrome_light">
		<span class="float_left button" id="button_navigation">
			Navigation
		</span>
        
		<a href="index.php?course=<? echo $_GET['course'];?>" class="float_left button">
			Back
		</a>
        
		<a href="../logout.php" class="float_right button">
			Sign out
		</a>
		<a href="#" class="icon icon_book float_left"></a>
		<span >M@xLife Kasetsart University e-Learning Suite</span>

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
   	<div class="abs header_lower chrome_light">
		<a href="#" class="icon icon_medical float_left"></a>	
	</div>

	<div id="main_content" class="abs">
		<div id="main_content_inner">
            <?
            $sql="SELECT r.*, m.name as module_name FROM resources r, modules m WHERE r.courses = '".$_GET['course']."' AND r.modules = '".$_GET['mid']."' AND r.modules=m.id ORDER BY r.id";

            //echo $sql;
            
            $result = mysql_query($sql);
			?>
            <h3>
				Document Lists in <? echo @mysql_result($result,0,"module_name")?> 
			</h3>
            <hr />
            <?
			
			mysql_data_seek($result, 0); 
			
            $i=1;
            
            echo "<table class='resource' cellspacing='0' cellpadding='0'>
            <thead>
			<tr>
            <th width='5%'>No.</th>
            <th width='20%'>Name</th>
            <th width='25%'>Open Link</th>            
            </tr></thead><tbody>";
            
            while($row = mysql_fetch_array($result))
              {
              echo "<tr>";
              echo "<td align='center'>" . $i . "</td>";
              echo "<td>" . $row['name'] . "</td>";
              //echo "<td>" . $row['url'] . "</td>";
              if($row['url']!="") {
                //echo "<td><a href=".$row['url'].">Open Link</a></td>";
				echo "<td align='center'><a href='sub_documents.php?course=$course&open=1&name=".$row['url']."' class='example3demo'><img src='../assets/images/icons_dark/69-display.png'  border='0'></a></td>";			
              } 
              if($row['file']!="") {
                //echo "<td><a href=".$host.$row['id']."/".$row['file']." class='example3demo'>Open File</a></td>";
				echo "<td align='center'><a href='sub_documents.php?course=$course&open=2&name=".$row['id']."/".$row['file']."' class='example3demo'><img src='../assets/images/icons_dark/69-display.png'  border='0'></a></td>";
                //http://localhost/lms/files/resources_files/2/2/651_1.jpg
                //echo "<td><a href='javascript:ajaxpage('".$host.$row['id']."/".$row['file']."', 'rightcolumn');'>Open File</a></td>";
                //echo "<td><a href='javascript:ajaxpage(http://localhost/lms/files/resources_files/2/2/651_1.jpg, rightcolumn);'>Open File</a></td>";
                //echo "<td><a href='javascript:ajaxpage(index.php, rightcolumn);'>Open File</a></td>";	
                ?>
                <!--<td><a href="javascript:ajaxpage('files/resources_files/2/2/651_1.jpg', 'rightcolumn');">Open File</a></td>-->
                <!--<td><a href="javascript:ajaxpage('http://www.google.co.th', 'rightcolumn');">Open File</a></td>-->
                <?
              } 
              //echo "<td>" . $row['file'] . "</td>";
              echo "</tr>";
              $i++;
              }
            echo "</tbody></table>";
			?>					
			<hr />			
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
		<!--<a href="#" class="icon icon_puzzle float_left"></a>-->
        <span>Main Menu</span>
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