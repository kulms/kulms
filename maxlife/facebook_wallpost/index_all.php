<?
session_start();
$userid=1;
$courseid=1;
$newsid=1;
$catid=1;
$groupid=1;

$_SESSION["uid"] = $userid;
$_SESSION["cid"] = $courseid;
$_SESSION["nid"] = $newsid;
session_write_close();

?>
<!doctype html public "-//W3C//DTD HTML 4.0 //EN">

<html>

<head>
<title>Wall Posting for MaxLearn</title>

<link href="facebox.css" media="screen" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="jquery-1.2.6.min.js"></script>
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

</head>

<body>

<!--
<h1>Wall Posting for M@xLearn</h1>
-->

	<div align="center">
	
		<!--
        <form action="" method="post" name="postsForm">
	
		<div class="UIComposer_Box">
	
		<span class="w">
		<textarea class="input" id="watermark" name="watermark" style="height:20px" cols="60"></textarea>
		</span>
	
			<br clear="all" />
			
			<div align="left" style="height:30px; padding:10px 5px;">
				
				<span style="float:left">&nbsp;&nbsp;&nbsp;
				&nbsp;
				</span>
		
                <a id="shareButton" style="float:left" class="small button Detail"> Share</a>
	
			</div>
	
		</div>
	
		</form>
        -->
        
	
		<br clear="all" />
	
		<div id="posting" align="center">
	
		<?php
		include('dbcon.php');
		//include('connectdb.php');		
		//include_once('posts.php?uid='.$uid.'&courseid='.$courseid.'&newsid='.$newsid');		
		//include_once('posts.php?uid=$uid&courseid=$courseid&newsid=$newsid');
        //include_once('posts.php?uid='.$uid.'&courseid='.$courseid.'&newsid='.$newsid);
		include_once('posts.php');
        ?>
		  
		</div>
	</div>

<br clear="all" />
<br clear="all" />

 <!-- FaceBook Button Start, Remove Or leave -->
 <br clear="all" /><br clear="all" /><br clear="all" />
			  
			  
</body>

</html>

