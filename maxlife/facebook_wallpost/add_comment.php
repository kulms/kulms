<?php
	include('dbcon.php');
	
	//mysql_query("SET NAMES UTF8");
	//mysql_query("SET character_set_result=utf8");
	//mysql_query("SET character_set_client=utf8");
	//mysql_query("SET character_set_connection=utf8");
	
	
	mysql_query('SET CHARACTER SET tis620');
	mysql_query("SET character_set_result=tis620");
	mysql_query("SET character_set_client=tis620");
	mysql_query("SET character_set_connection=tis620");
	mysql_query('SET collation_connection = "tis620_thai_ci"');
	
	function checkValues($value)
	{
		 // Use this function on all those values where you want to check for both sql injection and cross site scripting
		 //Trim the value
		 $value = trim($value);
		 
		// Stripslashes
		if (get_magic_quotes_gpc()) {
			$value = stripslashes($value);
		}
		
		 // Convert all &lt;, &gt; etc. to normal html and then strip these
		 $value = strtr($value,array_flip(get_html_translation_table(HTML_ENTITIES)));
		
		 // Strip HTML Tags
		 $value = strip_tags($value);
		
		// Quote the value
		$value = mysql_real_escape_string($value);
		$value = htmlspecialchars ($value);
		return $value;
		
	}	
/*	
	function getUserImg($user_id){
	
		$sqluser = "SELECT picture FROM users WHERE id = '".$user_id."';";
		$quser = mysql_query($sqluser);
		$upicture = @mysql_result($quser,0,"picture");

					
		if ($upicture=='' || $upicture==null)  
		{	
			$imageUser = 'images/no-image-m.png';	
		} else {
			$imageUser = '../files/preference/'.$user_id.'/'.$upicture;
		}

		
		return  $imageUser;
	}
*/

	function getUserImg($user_id){
		
			$sqluser = "SELECT picture FROM users WHERE id = '".$user_id."';";
			$quser = mysql_query($sqluser);
			$upicture = @mysql_result($quser,0,"picture");

						
			if ($upicture=='' || $upicture==null)  
			{	
				$imageUser = 'images/no-image-m.png';	
			} else {
				//$imageUser = '../files/preference/'.$user_id.'/'.$upicture;
				$imageUser = 'https://course.ku.ac.th/lms/files/preference/'.$user_id.'/'.$upicture;
			}

			
			return  $imageUser;
		}

	
	if(checkValues($_REQUEST['comment_text']) && $_REQUEST['post_id'])
	{
		$userip = $_SERVER['REMOTE_ADDR'];
		
		//mysql_query("INSERT INTO facebook_posts_comments (post_id,comments,userip,date_created,userid) VALUES('".$_REQUEST['post_id']."','".checkValues($_REQUEST['comment_text'])."','".$userip."','".strtotime(date("Y-m-d H:i:s"))."',".$uid.")");
		mysql_query("INSERT INTO facebook_posts_comments (post_id,comments,userip,date_created,userid) VALUES('".$_REQUEST['post_id']."','".checkValues($_REQUEST['comment_text'])."','".$userip."','".strtotime(date("Y-m-d H:i:s"))."',".$_GET['uid'].")");
		
		
		$result = mysql_query("SELECT *,
		UNIX_TIMESTAMP() - date_created AS CommentTimeSpent FROM facebook_posts_comments order by c_id desc limit 1");
	}
	
	function clickable_link($text = '')
	{
		$text = preg_replace('#(script|about|applet|activex|chrome):#is', "\\1:", $text);
		$ret = ' ' . $text;
		$ret = preg_replace("#(^|[\n ])([\w]+?://[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $ret);
		
		$ret = preg_replace("#(^|[\n ])((www|ftp)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $ret);
		$ret = preg_replace("#(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\">\\2@\\3</a>", $ret);
		$ret = substr($ret, 1);
		return $ret;
	}
	while ($rows = mysql_fetch_array($result))
	{
		$days2 = floor($rows['CommentTimeSpent'] / (60 * 60 * 24));
		$remainder = $rows['CommentTimeSpent'] % (60 * 60 * 24);
		$hours = floor($remainder / (60 * 60));
		$remainder = $remainder % (60 * 60);
		$minutes = floor($remainder / 60);
		$seconds = $remainder % 60;	?>
		<div class="commentPanel" id="record-<?php  echo $rows['c_id'];?>" align="left">        
			<!--<img src="gear_icon.png" width="40" class="CommentImg" style="float:left;" alt="" />-->
            <img src="<?php echo getUserImg($rows['userid']);?>" width="42" class="CommentImg" style="float:left;" alt="" />
            
			<label class="postedComments">
				<?php  echo clickable_link($rows['comments']);?>
			</label>
			<br clear="all" />
			
			<span style="margin-left:43px; color:#666666; font-size:11px">
			<?php
			
			if($days2 > 0)
			echo date('F d Y', $rows['date_created']);
			elseif($days2 == 0 && $hours == 0 && $minutes == 0)
			echo "few seconds ago";		
			elseif($days2 == 0 && $hours == 0)
			echo $minutes.' minutes ago';
			else
			echo "few seconds ago";	
			
			?>
			</span>
			
			<?php
			$userip = $_SERVER['REMOTE_ADDR'];
			if($rows['userip'] == $userip){?>
			&nbsp;&nbsp;<a href="#" id="CID-<?php  echo $rows['c_id'];?>" class="c_delete">Delete</a> .
            <!--<a href="#" id="CID-<?php  echo $rows['c_id'];?>" class="c_like">Like</a>-->
            <a href="javascript: void(0)" id="CID-<?php  echo $rows['c_id'];?>" class="c_like">Like</a>
            <?
			$sqlclikes = mysql_query("SELECT count(*) as no_clikes FROM facebook_posts_likes_comments where c_id = ".$rows['c_id']."");				
			$no_clikes = mysql_result($sqlclikes,0,"no_clikes");
			?>
			<div class="likeComment" id="likeComment<?php  echo $rows['c_id']?>" align="left">            	
				<span style="margin-left:43px; color:#666666; font-size:11px"><img src="LikeButton.png" width="12" height="12" /> <? echo $no_clikes;?>  peoples like this comment.</span>
			</div>
			<?php
			}?>
		</div>
	<?php
	}?>	

		
		
		
		