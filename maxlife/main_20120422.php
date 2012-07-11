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
if($_GET["first"]==1){
	echo '<meta http-equiv="refresh" content="0;url=main.php">';
}
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
<!--[if IE 8]>
<link rel="stylesheet" href="assets/stylesheets/ie8.css" />
<![endif]-->
<!--[if !IE]><!-->
<script src="assets/javascripts/iscroll.js"></script>
<!--<![endif]-->
<script src="assets/javascripts/jquery.js"></script>
<script src="assets/javascripts/master.js"></script>
<!--
<script language="javascript">
function initMobileScroll(ele) {
	var mobileScrollArea = document.getElementById(ele);

	mobileScrollArea.addEventListener('touchstart', function(event){
	    touchstart (event);
	});

	mobileScrollArea.addEventListener('touchmove', function(event){
	    touchmove (event);
	});

	// let’s set the starting point when someone first touches
	function touchstart (e) {
	    startY = e.touches[0].pageY;
	    startX = e.touches[0].pageX;
	}

	// calls repeatedly while the user’s finger is moving
	function touchmove(e) {
	    var touches = e.touches[0];

	    // override the touch event’s normal functionality
        	    e.preventDefault();

	    // y-axis
	    var touchMovedY = startY - touches.pageY;
	    startY = touches.pageY; // reset startY for the next call
	    mobileScrollArea.scrollTop = mobileScrollArea.scrollTop + touchMovedY;

	    // x-axis
	    var touchMovedX = startX - touches.pageX;
	    startX = touches.pageX; // reset startX for the next call
	    mobileScrollArea.scrollLeft = mobileScrollArea.scrollLeft + touchMovedX;
	}	

}
</script>
-->

<link href="facebox.css" media="screen" rel="stylesheet" type="text/css" />

<!--<script type="text/javascript" src="jquery-1.2.6.min.js"></script>-->
<script type="text/javascript" src="jquery.livequery.js"></script>
<link href="dependencies/screen.css" type="text/css" rel="stylesheet" />

<script src="jquery.elastic.js" type="text/javascript" charset="utf-8"></script>

<script src="jquery.watermarkinput.js" type="text/javascript"></script>
<script type="text/javascript">

	// <![CDATA[	

	$(document).ready(function(){	
	
		$('#shareButton').click(function(){

			var a = $("#watermark").val();
			if(a != "What's on your mind?")
			{
				$.post("posts.php?value="+a+"&uid="+<? echo $uid;?>, {
	
				}, function(response){
					
					$('#posting').prepend($(response).fadeIn('slow'));
					$("#watermark").val("What's on your mind?");
				});
			}
		});	
		
		
		$('.commentMark').livequery("focus", function(e){
			
			var parent  = $(this).parent();
			$(".commentBox").children(".commentMark").css('width','320px');
			$(".commentBox").children("a#SubmitComment").hide();
			$(".commentBox").children(".CommentImg").hide();			
		
			var getID =  parent.attr('id').replace('record-','');			
			$("#commentBox-"+getID).children("a#SubmitComment").show();
			$('.commentMark').css('width','300px');
			$("#commentBox-"+getID).children(".CommentImg").show();			
		});	
		
		//showCommentBox
		$('a.showCommentBox').livequery("click", function(e){
			
			var getpID =  $(this).attr('id').replace('post_id','');	
			
			$("#commentBox-"+getpID).css('display','');
			$("#commentMark-"+getpID).focus();
			$("#commentBox-"+getpID).children("img.CommentImg").show();			
			$("#commentBox-"+getpID).children("a#SubmitComment").show();		
		});	
		
		//doLike
		$('a.doLike').livequery("click", function(e){
			
			var getpID =  $(this).attr('id').replace('post_id','');	
			
			//alert(<? echo $uid;?>);
			
			$.post("add_like.php?post_id="+getpID+"&uid="+<? echo $uid;?>+"&courseid="+<? echo $courseid;?>+"&newsid="+<? echo $newsid;?>, {
	
				}, function(response){
					
					$('#commentLike' + getpID).find('span:first').empty().append(response);
				});
			
		});	
		
		//SubmitComment
		$('a.comment').livequery("click", function(e){
			
			//record
			//var getpID =  $(this).parent().attr('id').replace('commentBox-','');	
			var getpID =  $(this).parent().attr('id').replace('commentBox-','');	
			var comment_text = $("#commentMark-"+getpID).val();
			
			if(comment_text != "Write a comment...")
			{
				$.post("add_comment.php?comment_text="+comment_text+"&post_id="+getpID, {
	
				}, function(response){
					
					$('#CommentPosted'+getpID).append($(response).fadeIn('slow'));
					//$('#CommentPosted'+getpID).slideToggle(400);
					//$(this).toggleClass("active"); 
					$("#commentMark-"+getpID).val("Write a comment...");										
				});
				
				
				$.post("count_comment.php?post_id="+getpID, {
	
				}, function(response){
					//alert(response);
					$('#commentGroup' + getpID).find('span:first').empty().append(response);
				});
				
				
			}
			
		});	
		
		//more records show
		$('a.more_records').livequery("click", function(e){
			
			var next =  $(this).attr('id').replace('more_','');
			
			$.post("posts.php?show_more_post="+next, {

			}, function(response){
				$('#bottomMoreButton').remove();
				$('#posting').append($(response).fadeIn('slow'));

			});
			
		});	
		
		//deleteComment
		$('a.c_delete').livequery("click", function(e){
			
			if(confirm('Are you sure you want to delete this comment?')==false)

			return false;
	
			e.preventDefault();
			var parent  = $(this).parent();
			var c_id =  $(this).attr('id').replace('CID-','');	
			
			$.ajax({

				type: 'get',

				url: 'delete_comment.php?c_id='+ c_id,

				data: '',

				beforeSend: function(){

				},

				success: function(){

					parent.fadeOut(200,function(){

						parent.remove();

					});

				}

			});
		});	
		
		
		//Like Comment
		$('a.c_like').livequery("click", function(e){
			var c_id =  $(this).attr('id').replace('CID-','');	
			//alert(c_id);
			$.post("add_clike.php?c_id="+c_id, {
	
				}, function(response){					
					$('#likeComment' + c_id).find('span:first').empty().append(response);
				});
			
		});	
		
		/// hover show remove button
		$('.friends_area').livequery("mouseenter", function(e){
			$(this).children("a.delete").show();	
		});	
		$('.friends_area').livequery("mouseleave", function(e){
			$('a.delete').hide();	
		});	
		/// hover show remove button
		
		
		$('a.delete').livequery("click", function(e){

		if(confirm('Are you sure you want to delete this post?')==false)

		return false;

		e.preventDefault();

		var parent  = $(this).parent();

		var temp    = parent.attr('id').replace('record-','');

		var main_tr = $('#'+temp).parent();

			$.ajax({

				type: 'get',

				url: 'delete.php?id='+ parent.attr('id').replace('record-',''),

				data: '',

				beforeSend: function(){

				},

				success: function(){

					parent.fadeOut(200,function(){

						main_tr.remove();

					});

				}

			});

		});

		$('textarea').elastic();

		jQuery(function($){

		   $("#watermark").Watermark("What's on your mind?");
		   $(".commentMark").Watermark("Write a comment...");

		});

		jQuery(function($){

		   $("#watermark").Watermark("watermark","#369");
		   $(".commentMark").Watermark("watermark","#EEEEEE");

		});	

		function UseData(){

		   $.Watermark.HideAll();

		   //Do Stuff

		   $.Watermark.ShowAll();

		}

	});	
	
	$(document).ready(function()
	{
		$(".comment_button").click(function(){
		
		var element = $(this);
		var I = element.attr("id");
		
		$("#CommentPosted"+I).slideToggle(400);
		$(this).toggleClass("active"); 
		
		return false;});
	});


	// ]]>

</script>

<style type="text/css">
#scroll-wrap {
	position: relative;
	width: 400px;
	height: 500px;
	overflow: auto;
}

#scroll-overlay {
	position: absolute;
	top: 0;
	left: 0;
	/* set the width and height equal to the iframe’s */
	width: 500px;
	height: 850px;
	z-index: 999;
}
</style>
<style type="text/css">
#scroll-div {
	position: relative;
	width: 400px;
	height: 500px;
	overflow: auto;
}

#the-frame {
	display: none;
}
</style> 
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
	<div id="main_content" class="abs">
		<div id="main_content_inner">
		  <h1>
				News Posting for M@xLearn
			</h1>
            <hr />
            <div align="center">	                                  
            	<!--
               <div>HEADER - use 2 fingers to scroll contents:</div>
                <div id="scrollee" style="height:75%;" >
                    <object id="object" height="90%" width="100%" type="text/html" data="http://en.wikipedia.org/"></object>
                </div>
               <div>FOOTER</div>
               -->
               
               <!--
               <div>HEADER - use 2 fingers to scroll contents:</div>
                <div id="scrollee" style="height:75%;" >
                  <object id="object" height="90%" width="100%" type="text/html" data="<? echo WALL_HOST;?>index.php?user=<? echo $susername;?>">
                  </object>
               </div>
               <div>FOOTER</div>               
               -->
               
                <!--
                <div id="scroll-wrap">
                    <div id="scroll-overlay"></div>
                    <iframe width="500" height="850" src="<? echo WALL_HOST;?>index.php?user=<? echo $susername;?>"></iframe>
                </div>
                
                <script type="text/javascript">
                initMobileScroll("scroll-wrap");
                </script>
                -->
                <!--
                <div id="scroll-div"></div>
                <iframe id='the-frame' src='<? echo WALL_HOST;?>index.php?user=<? echo $susername;?>'></iframe>
                
                <script type="text/javascript" charset="utf-8">
                    var theFrame = document.getElementById('the-frame');
                    theFrame.onload = function() {
                        var frameBody = theFrame.contentWindow.document.body.innerHTML;
                        document.getElementById('scroll-div').innerHTML = frameBody;
                    }
                    initMobileScroll('scroll-div');
                </script>
                -->
               <!--
               <iframe src="<? echo WALL_HOST;?>index.php?user=<? echo $susername;?>" width="60%" height="419" frameborder="0">
                  <p>Your browser does not support iframes.</p>
               </iframe>
               -->
               <br clear="all" />
	
                <div id="posting" align="center">
                <!--
                <iframe src="posts.php?user=<? echo $susername;?>" width="60%" height="419" frameborder="0">
                  <p>Your browser does not support iframes.</p>
                </iframe>
            	-->
                <?php
                //include('dbcon.php');
                //include_once('posts.php?uid='.$uid.'&courseid='.$courseid.'&newsid='.$newsid');		
                //include_once('posts.php?uid=$uid&courseid=$courseid&newsid=$newsid');
                //include_once('posts.php?uid='.$uid.'&courseid='.$courseid.'&newsid='.$newsid);
				echo $susername;
                include_once('posts.php');
                ?>
                  
                </div>
               
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
		Main Menu
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