
<!doctype html public "-//W3C//DTD HTML 4.0 //EN">

<html>

<head>
<title>Demos :  99Points.info : Fresh Facebook Style TextArea with Wall Posting Script using jQuery PHP and Ajax</title>

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
				$.post("posts.php?value="+a, {
	
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
		
		//SubmitComment
		$('a.comment').livequery("click", function(e){
			
			var getpID =  $(this).parent().attr('id').replace('commentBox-','');	
			var comment_text = $("#commentMark-"+getpID).val();
			
			if(comment_text != "Write a comment...")
			{
				$.post("add_comment.php?comment_text="+comment_text+"&post_id="+getpID, {
	
				}, function(response){
					
					$('#CommentPosted'+getpID).append($(response).fadeIn('slow'));
					$("#commentMark-"+getpID).val("Write a comment...");					
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

	// ]]>

</script>

</head>

<body>

<script type="text/javascript"><!--
google_ad_client = "pub-7651803006865066";
/* 728x90, created 5/13/10 For demos top image */
google_ad_slot = "6387617802";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<div style="padding:5px;">
<script type="text/javascript"><!--
google_ad_client = "pub-7651803006865066";
/* 728x15, created 12/20/10 */
google_ad_slot = "4931052641";
google_ad_width = 728;
google_ad_height = 15;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

</div>
<!-- BuySellAds.com Ad Code -->

<script type="text/javascript">

(function(){

  var bsa = document.createElement('script');

     bsa.type = 'text/javascript';

     bsa.async = true;

     bsa.src = '//s3.buysellads.com/ac/bsa.js';

  (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);

})();

</script>

<!-- END BuySellAds.com Ad Code -->

<!-- BuySellAds.com Zone Code -->
<!-- <div id="bsap_1251176" class="bsarocks bsap_f4f4f7f1ca0607a63969fdea922a0a34"></div>-->
<!-- END BuySellAds.com Zone Code -->


<!--<a href="http://www.kqzyfj.com/click-4071657-10536129" target="_top" style="margin-left:8px; float:left">
<img src="http://www.ftjcfx.com/image-4071657-10536129" width="125" height="125" alt="Build a website fast with GoDaddy.com! - 125x125  " border="0"/></a>
-->


<style>
h2{text-shadow: 0px -1px 0px #374683;text-shadow: 0px 1px 0px #e5e5ee;
filter: dropshadow(color=#e5e5ee,offX=0,offY=1); 
font-family:"Courier New", Courier, monospace; margin:0px;}
a.tuts,span.tuts{
color:#ff0000; font-size:13px; float:left; margin-right:15px; margin-left:15px;
text-shadow: 0px -1px 0px #374683;text-shadow: 0px 1px 0px #e5e5ee;
filter: dropshadow(color=#e5e5ee,offX=0,offY=1);
margin-top:4px;
font-family:"Courier New", Courier, monospace;
}
.delicious {
	background:url("http://demos.99points.info/assets/delici.jpg") no-repeat scroll 10px bottom transparent;
	border-left:1px solid #DEDEDE;
	float:left;
	margin-top:3px;
	padding-left:30px;
	text-shadow: 0px -1px 0px #374683;text-shadow: 0px 1px 0px #e5e5ee;
	filter: dropshadow(color=#e5e5ee,offX=0,offY=1); 
	font-family:"Courier New", Courier, monospace;
}
.delicious a{font-size:13px;
	line-height:18px;}
.title{ background:#D2ECFB; padding-left:10px; padding:4px;}
.shareButtons{ background:#FFF5DF; margin:0px; padding:8px;}

.tweetThis {
	background:url("http://demos.99points.info/assets/twit.png") no-repeat scroll 8px top transparent;
	border-left:1px solid #DEDEDE;
	float:left;
	font-size:12px;
	margin-left:8px;
	text-shadow: 0px -1px 0px #374683;text-shadow: 0px 1px 0px #e5e5ee;
	filter: dropshadow(color=#e5e5ee,offX=0,offY=1); 
	font-family:"Courier New", Courier, monospace;
	line-height:18px;
	margin-top:3px;
	padding-left:30px;float:left;
}

.digg{
	text-shadow: 0px -1px 0px #374683;text-shadow: 0px 1px 0px #e5e5ee;
	filter: dropshadow(color=#e5e5ee,offX=0,offY=1); 
	font-family:"Courier New", Courier, monospace;
	padding:4px; color:#000000; font-size:12px;
	margin-top:2px; float:left
}
#bookmarks{	margin-top:3px; float:left}
#bookmarks a{
	text-shadow: 0px -1px 0px #374683;text-shadow: 0px 1px 0px #e5e5ee;
	filter: dropshadow(color=#e5e5ee,offX=0,offY=1); 
	font-family:"Courier New", Courier, monospace;
	color:#000000; font-size:14px; font-weight:bold;
	padding-left:20px; 
}
</style>


	<h2 class="title" align="left">Facebook Style TextArea, Wall Posting using jQuery PHP</h2>
	<div class="shareButtons">
		<a style="color:#000000; font-size:14px; float:left; margin-top:3px;" href="http://www.99points.info/2010/07/facebook-style-wallpost-and-comments-system-using-jquery-ajax-and-php-reloaded/">Back To Tutorial</a>
		<!-- share  DO uper float left-->
		<div style="float: left; margin-left: 25px;">
		<iframe scrolling="no" frameborder="0" style="border: medium none; margin-top:2px; overflow: hidden; width: 80px; height: 21px;" src="http://www.facebook.com/plugins/like.php?href=http://www.99points.info/2010/07/facebook-style-wallpost-and-comments-system-using-jquery-ajax-and-php-reloaded/&amp;layout=button_count&amp;show_faces=false&amp;width=450&amp;action=like&amp;colorscheme=light" allowtransparency="true"></iframe>
		</div>
		<div class="delicious">
		<a target="_blank" style="color: rgb(85, 85, 85);" href="http://del.icio.us/post?url=http://www.99points.info/2010/07/facebook-style-wallpost-and-comments-system-using-jquery-ajax-and-php-reloaded/&amp;title=Facebook Style TextArea, Wall Posting using jQuery PHP">Delicious</a>
		</div>
		
		<div class="tweetThis">
		<a title="Twitter" target="_blank" style="color: rgb(85, 85, 85);" href=" http://twitter.com/home?status=Facebook Style TextArea, Wall Posting using jQuery PHP http://www.99points.info/2010/07/facebook-style-wallpost-and-comments-system-using-jquery-ajax-and-php-reloaded/">Tweet</a>
		</div>
		
		<img border="0" src="http://demos.99points.info/assets/digg.png" style="margin-left:15px; margin-top:3px; float:left;" height="18" alt="Digg This Tutorial">
		<a title="Digg This Tutorial" class="digg" href="http://digg.com/submit?phase=2&amp;url=http://www.99points.info/2010/07/facebook-style-wallpost-and-comments-system-using-jquery-ajax-and-php-reloaded/&amp;title=Facebook Style TextArea, Wall Posting using jQuery PHP " target="_blank">Digg This</a>
	  	
		<a  href="http://demos.99points.info" target="_blank" style="margin-left:40px;" class="tuts"><b>Most Popular Tutorials</b></a>
		<!--<a  href="http://www.99points.info/feed/" class="tuts"><b>Subscribe Now</b></a>-->
		
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="margin-left:20px;float:left">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="432QTC8HRCJBQ">
		<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>

		<!--<div  id="bookmarks">
			<a href="javascript:bookmark()" >Save 99Points to Browser</a>
		</div>-->
		
		
		<br clear="all" />
	</div>
	
<br clear="all" />
<!-- share -->
	
	
		<div align="center">
		
		<form action="" method="post" name="postForm">
	
		<div class="UIComposer_Box">
	
		<span class="w">
		<textarea class="input" id="watermark" name="watermark" style="height:20px" cols="60"></textarea>
		</span>
	
			<br clear="all" />
			
			<div align="left" style="height:30px; padding:10px 5px;">
				
				<span style="float:left">&nbsp;PHP, Codeigniter, JQuery, AJAX Programming + Tutorials ( <a href="http://www.99points.info" target="_blank" style="color:#EC092B">www.99Points.info</a> )&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;
				</span>
				<a id="shareButton" style="float:left" class="small button Detail"> Share</a>
	
			</div>
	
		</div>
	
		</form>
	
		<br clear="all" />
		
		<div align="center"><a href="mailto:zeeshan@99points.info" style="padding:5px; margin-bottom:8px; font-weight:bold; color:#CC3300; display:block; font-size:14px;" title="Hire me, if you want to integrate this awesome script into your site ?"> Hire me, if you want to integrate this awesome script into your site ?</a> 
<br /><a href="http://facebook.99points.info" style="padding:5px; margin-bottom:8px; font-weight:bold; color:#CC3300; display:block; font-size:18px;" title="Check out new Demo with full features"> NEW DEMO: facebook.99points.info</a> </div>
		<br />
		<div id="posting" align="center">
	
				   <div class="friends_area" id="record-14090">

	   <img src="99.jpeg" style="float:left;" alt="" />

		   <label style="float:left" class="name">

		   <b>99Points</b>

		   <em>nothin</em>
		   <br clear="all" />

		   <span>
		   18 minutes ago		   
		   </span>
		   <a href="javascript: void(0)" id="post_id14090" class="showCommentBox">Comments</a>

		   </label>
		   		    <br clear="all" />
			<div id="CommentPosted14090">
							</div>
			<div class="commentBox" align="right" id="commentBox-14090" style="display:none">
				<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
				<label id="record-14090">
					<textarea class="commentMark" id="commentMark-14090" name="commentMark" cols="60"></textarea>
				</label>
				<br clear="all" />
				<a id="SubmitComment" class="small button comment"> Comment</a>
			</div>
	   </div>
		   <div class="friends_area" id="record-14089">

	   <img src="99.jpeg" style="float:left;" alt="" />

		   <label style="float:left" class="name">

		   <b>99Points</b>

		   <em><a href="http://www.dfdsadf.com" target="_blank" rel="no_follow">http://www.dfdsadf.com</a></em>
		   <br clear="all" />

		   <span>
		   36 minutes ago		   
		   </span>
		   <a href="javascript: void(0)" id="post_id14089" class="showCommentBox">Comments</a>

		   </label>
		   		    <br clear="all" />
			<div id="CommentPosted14089">
							</div>
			<div class="commentBox" align="right" id="commentBox-14089" style="display:none">
				<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
				<label id="record-14089">
					<textarea class="commentMark" id="commentMark-14089" name="commentMark" cols="60"></textarea>
				</label>
				<br clear="all" />
				<a id="SubmitComment" class="small button comment"> Comment</a>
			</div>
	   </div>
		   <div class="friends_area" id="record-14088">

	   <img src="99.jpeg" style="float:left;" alt="" />

		   <label style="float:left" class="name">

		   <b>99Points</b>

		   <em>grgreetert er ter</em>
		   <br clear="all" />

		   <span>
		   40 minutes ago		   
		   </span>
		   <a href="javascript: void(0)" id="post_id14088" class="showCommentBox">Comments</a>

		   </label>
		   		    <br clear="all" />
			<div id="CommentPosted14088">
							</div>
			<div class="commentBox" align="right" id="commentBox-14088" style="display:none">
				<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
				<label id="record-14088">
					<textarea class="commentMark" id="commentMark-14088" name="commentMark" cols="60"></textarea>
				</label>
				<br clear="all" />
				<a id="SubmitComment" class="small button comment"> Comment</a>
			</div>
	   </div>
		   <div class="friends_area" id="record-14087">

	   <img src="99.jpeg" style="float:left;" alt="" />

		   <label style="float:left" class="name">

		   <b>99Points</b>

		   <em>ghgfhfhfh</em>
		   <br clear="all" />

		   <span>
		   few seconds ago		   
		   </span>
		   <a href="javascript: void(0)" id="post_id14087" class="showCommentBox">Comments</a>

		   </label>
		   		    <br clear="all" />
			<div id="CommentPosted14087">
									<div class="commentPanel" id="record-19534" align="left">
						<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
						<label class="postedComments">
							fgfdgfdg						</label>
						<br clear="all" />
						<span style="margin-left:43px; color:#666666; font-size:11px">
						few seconds ago						</span>
											</div>
										<div class="commentPanel" id="record-19535" align="left">
						<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
						<label class="postedComments">
							mjml						</label>
						<br clear="all" />
						<span style="margin-left:43px; color:#666666; font-size:11px">
						few seconds ago						</span>
											</div>
										<div class="commentPanel" id="record-19536" align="left">
						<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
						<label class="postedComments">
							nmnbmbm						</label>
						<br clear="all" />
						<span style="margin-left:43px; color:#666666; font-size:11px">
						few seconds ago						</span>
											</div>
										<div class="commentPanel" id="record-19537" align="left">
						<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
						<label class="postedComments">
							hi						</label>
						<br clear="all" />
						<span style="margin-left:43px; color:#666666; font-size:11px">
						54 minutes ago						</span>
											</div>
										<div class="commentPanel" id="record-19539" align="left">
						<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
						<label class="postedComments">
							hgfhfgh g fg						</label>
						<br clear="all" />
						<span style="margin-left:43px; color:#666666; font-size:11px">
						40 minutes ago						</span>
											</div>
										<div class="commentPanel" id="record-19541" align="left">
						<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
						<label class="postedComments">
							aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa						</label>
						<br clear="all" />
						<span style="margin-left:43px; color:#666666; font-size:11px">
						1 minutes ago						</span>
											</div>
										<div class="commentPanel" id="record-19542" align="left">
						<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
						<label class="postedComments">
							doesthiswork						</label>
						<br clear="all" />
						<span style="margin-left:43px; color:#666666; font-size:11px">
						1 minutes ago						</span>
											</div>
										<div class="commentPanel" id="record-19543" align="left">
						<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
						<label class="postedComments">
							does this work						</label>
						<br clear="all" />
						<span style="margin-left:43px; color:#666666; font-size:11px">
						1 minutes ago						</span>
											</div>
									
								</div>
			<div class="commentBox" align="right" id="commentBox-14087" >
				<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
				<label id="record-14087">
					<textarea class="commentMark" id="commentMark-14087" name="commentMark" cols="60"></textarea>
				</label>
				<br clear="all" />
				<a id="SubmitComment" class="small button comment"> Comment</a>
			</div>
	   </div>
		   <div class="friends_area" id="record-14086">

	   <img src="99.jpeg" style="float:left;" alt="" />

		   <label style="float:left" class="name">

		   <b>99Points</b>

		   <em>hello</em>
		   <br clear="all" />

		   <span>
		   few seconds ago		   
		   </span>
		   <a href="javascript: void(0)" id="post_id14086" class="showCommentBox">Comments</a>

		   </label>
		   		    <br clear="all" />
			<div id="CommentPosted14086">
									<div class="commentPanel" id="record-19531" align="left">
						<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
						<label class="postedComments">
							sdfaaasfdfaasdf						</label>
						<br clear="all" />
						<span style="margin-left:43px; color:#666666; font-size:11px">
						few seconds ago						</span>
											</div>
										<div class="commentPanel" id="record-19532" align="left">
						<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
						<label class="postedComments">
							dfgdfgd;lkdlfg d;g ;ld d;lk;dlfk;dlk;lk ;l k; ;lk;lk;ldkf;lgkd;lfkg;dlfk;dlfkg;dlfk;dlfk;dlfkg;dflgk;dlfgkkkk;dlfg;ld;flg;dlfg;lfg;dgdf						</label>
						<br clear="all" />
						<span style="margin-left:43px; color:#666666; font-size:11px">
						few seconds ago						</span>
											</div>
										<div class="commentPanel" id="record-19533" align="left">
						<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
						<label class="postedComments">
							jxdfg						</label>
						<br clear="all" />
						<span style="margin-left:43px; color:#666666; font-size:11px">
						few seconds ago						</span>
											</div>
									
								</div>
			<div class="commentBox" align="right" id="commentBox-14086" >
				<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
				<label id="record-14086">
					<textarea class="commentMark" id="commentMark-14086" name="commentMark" cols="60"></textarea>
				</label>
				<br clear="all" />
				<a id="SubmitComment" class="small button comment"> Comment</a>
			</div>
	   </div>
		   <div class="friends_area" id="record-14085">

	   <img src="99.jpeg" style="float:left;" alt="" />

		   <label style="float:left" class="name">

		   <b>99Points</b>

		   <em>123</em>
		   <br clear="all" />

		   <span>
		   few seconds ago		   
		   </span>
		   <a href="javascript: void(0)" id="post_id14085" class="showCommentBox">Comments</a>

		   </label>
		   		    <br clear="all" />
			<div id="CommentPosted14085">
									<div class="commentPanel" id="record-19528" align="left">
						<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
						<label class="postedComments">
							ha						</label>
						<br clear="all" />
						<span style="margin-left:43px; color:#666666; font-size:11px">
						few seconds ago						</span>
											</div>
										<div class="commentPanel" id="record-19529" align="left">
						<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
						<label class="postedComments">
							xzcvxzcv						</label>
						<br clear="all" />
						<span style="margin-left:43px; color:#666666; font-size:11px">
						few seconds ago						</span>
											</div>
									
								</div>
			<div class="commentBox" align="right" id="commentBox-14085" >
				<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
				<label id="record-14085">
					<textarea class="commentMark" id="commentMark-14085" name="commentMark" cols="60"></textarea>
				</label>
				<br clear="all" />
				<a id="SubmitComment" class="small button comment"> Comment</a>
			</div>
	   </div>
		   <div class="friends_area" id="record-14084">

	   <img src="99.jpeg" style="float:left;" alt="" />

		   <label style="float:left" class="name">

		   <b>99Points</b>

		   <em>dfdf</em>
		   <br clear="all" />

		   <span>
		   few seconds ago		   
		   </span>
		   <a href="javascript: void(0)" id="post_id14084" class="showCommentBox">Comments</a>

		   </label>
		   		    <br clear="all" />
			<div id="CommentPosted14084">
									<div class="commentPanel" id="record-19530" align="left">
						<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
						<label class="postedComments">
							vbvcb						</label>
						<br clear="all" />
						<span style="margin-left:43px; color:#666666; font-size:11px">
						few seconds ago						</span>
											</div>
									
								</div>
			<div class="commentBox" align="right" id="commentBox-14084" >
				<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
				<label id="record-14084">
					<textarea class="commentMark" id="commentMark-14084" name="commentMark" cols="60"></textarea>
				</label>
				<br clear="all" />
				<a id="SubmitComment" class="small button comment"> Comment</a>
			</div>
	   </div>
		   <div class="friends_area" id="record-14083">

	   <img src="99.jpeg" style="float:left;" alt="" />

		   <label style="float:left" class="name">

		   <b>99Points</b>

		   <em>dfdf</em>
		   <br clear="all" />

		   <span>
		   few seconds ago		   
		   </span>
		   <a href="javascript: void(0)" id="post_id14083" class="showCommentBox">Comments</a>

		   </label>
		   		    <br clear="all" />
			<div id="CommentPosted14083">
							</div>
			<div class="commentBox" align="right" id="commentBox-14083" style="display:none">
				<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
				<label id="record-14083">
					<textarea class="commentMark" id="commentMark-14083" name="commentMark" cols="60"></textarea>
				</label>
				<br clear="all" />
				<a id="SubmitComment" class="small button comment"> Comment</a>
			</div>
	   </div>
		   <div class="friends_area" id="record-14082">

	   <img src="99.jpeg" style="float:left;" alt="" />

		   <label style="float:left" class="name">

		   <b>99Points</b>

		   <em>afaf</em>
		   <br clear="all" />

		   <span>
		   few seconds ago		   
		   </span>
		   <a href="javascript: void(0)" id="post_id14082" class="showCommentBox">Comments</a>

		   </label>
		   		    <br clear="all" />
			<div id="CommentPosted14082">
							</div>
			<div class="commentBox" align="right" id="commentBox-14082" style="display:none">
				<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
				<label id="record-14082">
					<textarea class="commentMark" id="commentMark-14082" name="commentMark" cols="60"></textarea>
				</label>
				<br clear="all" />
				<a id="SubmitComment" class="small button comment"> Comment</a>
			</div>
	   </div>
		   <div class="friends_area" id="record-14081">

	   <img src="99.jpeg" style="float:left;" alt="" />

		   <label style="float:left" class="name">

		   <b>99Points</b>

		   <em><a href="http://www.youtube.com/watch?v=ipNB-ijxHiI" target="_blank" rel="no_follow">http://www.youtube.com/watch?v=ipNB-ijxHiI</a></em>
		   <br clear="all" />

		   <span>
		   few seconds ago		   
		   </span>
		   <a href="javascript: void(0)" id="post_id14081" class="showCommentBox">Comments</a>

		   </label>
		   		    <br clear="all" />
			<div id="CommentPosted14081">
							</div>
			<div class="commentBox" align="right" id="commentBox-14081" style="display:none">
				<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />
				<label id="record-14081">
					<textarea class="commentMark" id="commentMark-14081" name="commentMark" cols="60"></textarea>
				</label>
				<br clear="all" />
				<a id="SubmitComment" class="small button comment"> Comment</a>
			</div>
	   </div>
		<div id="bottomMoreButton">
	<a id="more_10" class="more_records" href="javascript: void(0)">Older Posts</a>
	</div>
				  
		</div>
	</div>

<br clear="all" /><br clear="all" /><br clear="all" />
<br clear="all" />

 <!-- FaceBook Button Start, Remove Or leave -->

		     <a href='http://www.facebook.com/sharer.php?u=http://www.99points.info/2010/07/facebook-style-wallpost-and-comments-system-using-jquery-ajax-and-php-reloaded/&amp;title=Facebook Style TextArea with Wall Posting Script using jQuery PHP and Ajax.' target='_blank' title='Add To Facebook'><img alt='Add To Facebook' border='0' class='icon-action' src='http://3.bp.blogspot.com/_vLeiVavkV_M/SnleIlLdGwI/AAAAAAAABd8/RfHnWIGGMEY/s200/facebook.png'/></a>

		     <!-- FaceBook Button End, Remove Or leave -->

  

			  <!-- Stumbleupon Button Start, Remove Or leave -->

			  <a href='http://www.stumbleupon.com/refer.php?url=http://www.99points.info/2010/07/facebook-style-wallpost-and-comments-system-using-jquery-ajax-and-php-reloaded/&amp;title=Facebook Style TextArea with Wall Posting Script using jQuery PHP and Ajax.' target='_blank' title='Stumble This'><img alt='Stumble This' border='0' class='icon-action' src='http://2.bp.blogspot.com/_vLeiVavkV_M/SnleiulEMVI/AAAAAAAABeU/kO09nNTlQeo/s200/stumbleupon.png'/></a>

			  <!-- Stumbleupon Button End, Remove Or leave -->



			  <!-- Digg Button Start, Remove Or leave -->

			  <a target='_blank' href='http://digg.com/submit?phase=2&amp;url=http://www.99points.info/2010/07/facebook-style-wallpost-and-comments-system-using-jquery-ajax-and-php-reloaded/&amp;title=Facebook Style TextArea with Wall Posting Script using jQuery PHP and Ajax.' title='Digg This'><img alt='Digg This' border='0' class='icon-action' src='http://3.bp.blogspot.com/_vLeiVavkV_M/Snld_x-wXoI/AAAAAAAABd0/cTsGU_Y-zQ8/s200/digg.png'/></a>

			  <!-- Digg Button End, Remove Or leave -->

     		  



			  <!-- Delicious Button Start, Remove Or leave -->

			  <a href='http://del.icio.us/post?url=http://www.99points.info/2010/07/facebook-style-wallpost-and-comments-system-using-jquery-ajax-and-php-reloaded/&amp;title=Facebook Style TextArea with Wall Posting Script using jQuery PHP and Ajax.' target='_blank' title='Add To Del.icio.us'><img alt='Add To Del.icio.us' border='0' class='icon-action' src='http://2.bp.blogspot.com/_vLeiVavkV_M/Snld35mPSDI/AAAAAAAABds/ccrOpOmP9Zk/s200/delicious.png'/></a>

			  <!-- Delicious Button End, Remove Or leave -->

				

			  <!-- Reddit Button Start, Remove Or leave -->

			  <a href='http://reddit.com/submit?url=http://www.99points.info/2010/07/facebook-style-wallpost-and-comments-system-using-jquery-ajax-and-php-reloaded/&amp;title=Facebook Style TextArea with Wall Posting Script using jQuery PHP and Ajax.' target='_blank' title='Add To Reddit'><img alt='Add To Reddit' border='0' class='icon-action' src='http://3.bp.blogspot.com/_vLeiVavkV_M/SnleX1tMMtI/AAAAAAAABeM/gQSYdrmSc3k/s200/reddit.png'/></a>



			  <!-- Reddit Button End, Remove Or leave -->

			

			  <!-- Yahoo Button Start, Remove Or leave -->

			  <a href='http://myweb2.search.yahoo.com/myresults/bookmarklet?t=http://www.99points.info/2010/07/facebook-style-wallpost-and-comments-system-using-jquery-ajax-and-php-reloaded/&amp;title=Facebook Style TextArea with Wall Posting Script using jQuery PHP and Ajax.' target='_blank' title='Add To Yahoo'><img alt='Add To Yahoo' border='0' class='icon-action' src='http://1.bp.blogspot.com/_vLeiVavkV_M/SnlexsGX2QI/AAAAAAAABes/ai6zvzZKCgw/s200/yahoo.png'/></a>

				

			  <!-- Yahoo Button End, Remove Or leave -->

		

			  <a href='http://twitthis.com/twit?url=http://www.99points.info/2010/07/facebook-style-wallpost-and-comments-system-using-jquery-ajax-and-php-reloaded/&title=Facebook Style TextArea with Wall Posting Script using jQuery PHP and Ajax.' target='_blank' title='Tweet This' >

			  <img src='http://www.99points.info/wp-content/themes/twitterico.png' alt='Add To Twitter' border='0' height="48" class='icon-action' /></a>
			  
			  <br clear="all" /><br clear="all" /><br clear="all" />
			  
			  
<style>
#heading
{
	font-family:Georgia, "Times New Roman", Times, serif;
	font-size:56px;
	color:#CC0000;				
}
#footerAds{ position:fixed; bottom:0px; right:0px;}
</style>
<div align="center">
<a id="heading" href="http://www.99points.info/">99Points.info</a>
</div>
<p style="border:solid #000000 1px; background:#CC3333; color:#FFFFFF" align="center">
        <a style=" text-decoration:none; font-size:18px;color:#FFFFFF" href="http://99Points.info"> Codeigniter , JQuery PHP Helping Demos on 99Points.info</a>
      </p>
	  
	  <div id="footerAds">
	  <!-- BuySellAds.com Zone Code -->
<div id="bsap_1251176" class="bsarocks bsap_f4f4f7f1ca0607a63969fdea922a0a34"></div>
<!-- End BuySellAds.com Zone Code -->

	  
	  </div>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-16292925-1");
pageTracker._trackPageview();
} catch(err) {}</script>


</body>

</html>

