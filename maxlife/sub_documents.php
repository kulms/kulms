<?php
header ('Content-type: text/html; charset=utf-8');
header('Pragma: no-cache');
header('cache-Control: no-cache, must-revalidate'); // HTTP/1.1
session_start();
require_once 'connectdb.php'; 

if($_GET["open"]==1){
	$url=$_GET["name"];
}else{
	$url=LMS_HOST."files/resources_files/".$uid."/".$_GET["name"];
}


//$url = "http://localhost/lms/files/resources_files/2/1/download_form.jpg";
//$url = "http://localhost/lms/files/resources_files/2/6/video.mp4";
//$url = "http://www.google.co.th";

function get_mime_type($filename, $mimePath = './') { 
   $fileext = substr(strrchr($filename, '.'), 1); 
   if (empty($fileext)) return (false); 
   $regex = "/^([\w\+\-\.\/]+)\s+(\w+\s)*($fileext\s)/i"; 
   $lines = file("$mimePath/mime.types"); 
   foreach($lines as $line) { 
      if (substr($line, 0, 1) == '#') continue; // skip comments 
      $line = rtrim($line) . " "; 
      if (!preg_match($regex, $line, $matches)) continue; // no match to the extension 
      return ($matches[1]); 
   } 
   return (false); // no match at all 
} 
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
<script src="assets/javascripts/pdfobject.js"></script>
<script src="assets/javascripts/pdfobject_min.js"></script>

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
		News
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
		  <h1>Documents for M@xLearn</h1>
            
            <div align="center">
            
            <?php
				//echo mime_content_type('php.gif') . "\n";
				//echo mime_content_type('test.php'). "\n";
				//echo mime_content_type($url). "\n";
				//echo get_mime_type('myFile.xml'). "\n";
				//echo get_mime_type($url);
				
				$value = get_mime_type($url);
				
				switch ($value) {
					case "image/jpeg":
						//statement 
						echo "<img src=\"".$url."\" border=0>";
						break;
					case "image/gif":
						//statement 
						echo "<img src=\"".$url."\" border=0>";
						break;							
					case "image/png":
						//statement 
						echo "<img src=\"".$url."\" border=0>";
						break;								
					case "application/pdf":
						//statement 					
						
						echo "<div id=\"pdf1\" style=\"width:100%; height:419px;\"></div>";
						echo "<script type='text/javascript'>";
						echo "var myPDF = new PDFObject({ ";
						echo "    url: '$url', ";
						echo "    pdfOpenParams: { ";
						echo "         view: 'Fit', ";
						echo "         scrollbars: '1', ";
						echo "         toolbar: '0', ";
						echo "        statusbar: '1', ";
						echo "         navpanes: '1' }";
						echo "     }).embed('pdf1'); ";
						echo "</script>";
                        
						//echo "<embed src=\"".$url."#toolbar=0&navpanes=0&scrollbar=0\" width=\"500\" height=\"375\">";
						//echo "<OBJECT src=\"".$url."\" TYPE=\"application/x-pdf\" TITLE=\"SamplePdf\" WIDTH=200 HEIGHT=100>";
						//echo "</object>";
						break;
					case "application/vnd.ms-powerpoint":
						//statement 
						break;
					case "video/mp4":
						//statement
						echo "<script type=\"text/javascript\" src=\"jwplayer.js\"></script>";
						echo "<div id=\"videoContainer\">You need Flash or iOS to play this stream</div>";
						echo "<script type=\"text/javascript\">";
						echo "jwplayer('videoContainer').setup({";						
						echo "file: '$url',";
						echo "flashplayer: 'player.swf',";
						echo "width: '640',";
						echo "height: '480',";
						echo "events: { onReady: function () { jwplayer('videoContainer').play(); } },";
						echo "plugins: {";
						echo "	'gapro-2': {";
						echo "		idstring: '',";
						echo "		trackstarts: true,";
						echo "		trackpercentage: true,";
						echo "		trackseconds: true";
						echo "		}";
						echo "	}";
						echo "});";
					    echo "</script>";
						break;	
					default:
						//echo "rrrr";
				        echo "<iframe src='$url' width=\"100%\" height=\"419\" frameborder=\"0\">";						
						echo "<p>Your browser does not support iframes.</p>";
					    echo "</iframe>";
						//echo "<div id=\"scrollee\" style=\"height:75%;\" >";
                    	//echo "<object id=\"object\" height=\"90%\" width=\"100%\" type=\"text/html\" data=\"http://www.google.co.th\"></object>";
                		//echo "</div>";
						break;	
				}
				
				
			?>	                                  
            
            <!--
            <iframe src="http://localhost/wallpost/index.php?user=<? echo $susername;?>&course=<? echo $course;?>" width="100%" height="419" frameborder="0">
                  <p>Your browser does not support iframes.</p>
               </iframe>
             -->
               
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