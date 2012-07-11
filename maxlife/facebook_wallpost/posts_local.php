	<?php
	//session_start();
	include('dbcon.php');
	//echo $cid;
	//mysql_query("SET NAMES UTF8");
	//mysql_query("SET character_set_result=utf8");
	//mysql_query("SET character_set_client=utf8");
	//mysql_query("SET character_set_connection=utf8");
	
	mysql_query('SET CHARACTER SET tis620');
	mysql_query("SET character_set_result=tis620");
	mysql_query("SET character_set_client=tis620");
	mysql_query("SET character_set_connection=tis620");
	mysql_query('SET collation_connection = "tis620_thai_ci"');
	
	if($_SESSION["cid"] > 0){
		$sqladd = " fp.courseid = '".$_SESSION["cid"]."' ";
	} else{
		$sqladd = " ";
	}
	
	function checkValues($value)
	{
		$value = trim($value);
		 
		if (get_magic_quotes_gpc()) {
			$value = stripslashes($value);
		}
		
		 $value = strtr($value,array_flip(get_html_translation_table(HTML_ENTITIES)));
		
		$value = strip_tags($value);
		$value = mysql_real_escape_string($value);
		$value = htmlspecialchars ($value);
		return $value;
		
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
	
	
	function getUserImgFromPost($user_id){
		
			$sqluser = "SELECT distinct u.picture FROM users u, facebook_posts fp WHERE fp.userid = '".$user_id."' AND u.id=fp.userid;";
			//echo $sqluser;
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
	
	//=============================================================
	//$Max_File_Size = 100000000; 
	$File_Type_Allow = array("gif" /*.gif*/, 
						"png"/*.png*/,
						"jpeg"/*.jpg*/,
						"jpg"/*.jpg*/
						); 
	
	function check_type($type_check) { 
	   global $File_Type_Allow; 
	   for ($i=0;$i<count($File_Type_Allow);$i++) { 
		  if ($File_Type_Allow[$i] == $type_check) { 
			 return true; 
		  } 
	   } 
	   return false; 
	} 
	//=============================================================
	
	function fetch_record($path)
	{
		$file = fopen($path, "r"); 
		if (!$file)
		{
			exit("Problem occured");
		} 
		$data = '';
		while (!feof($file))
		{
			$data .= fgets($file, 1024);
		}
		return $data;
	}
			
	//=============================================================
	
	
	$next_records = 10;
	$show_more_button = 0;
	
	if(checkValues($_REQUEST['value']))
	{
		$userip = $_SERVER['REMOTE_ADDR'];
		echo "INSERT INTO facebook_posts (post,f_name,userip,date_created,userid) VALUES('".checkValues($_REQUEST['value'])."','MaxLearn','".$userip."','".strtotime(date("Y-m-d H:i:s"))."',".$_REQUEST['uid'].")";
		
		mysql_query("INSERT INTO facebook_posts (post,f_name,userip,date_created,userid) VALUES('".checkValues($_REQUEST['value'])."','MaxLearn','".$userip."','".strtotime(date("Y-m-d H:i:s"))."',".$_REQUEST['uid'].")");
	
		if(isset($_SESSION["cid"])){
		$result = mysql_query("SELECT *,
		UNIX_TIMESTAMP() - date_created AS TimeSpent FROM facebook_posts WHERE courseid=".$_SESSION["cid"]." order by p_id desc limit 1");	
		}else{
		$result = mysql_query("SELECT *,
		UNIX_TIMESTAMP() - date_created AS TimeSpent FROM facebook_posts order by p_id desc limit 1");
		}
	}
	elseif($_REQUEST['show_more_post']) // more posting paging
	{
		$next_records = $_REQUEST['show_more_post'] + 10;
		
		if(isset($_SESSION["cid"])){
		
		$sqlshow = "SELECT fp.*, UNIX_TIMESTAMP() - fp.date_created AS TimeSpent, c.name, c.section
				FROM facebook_posts fp, courses c
				WHERE fp.courseid = c.id AND fp.courseid
				IN (
				SELECT DISTINCT wp.courses
				FROM wp, users u
				WHERE wp.users = u.id AND u.id =  '".$_SESSION["uid"]."'
				ORDER BY wp.courses
				) ".$sqladd."
				order by p_id desc limit ".$_REQUEST['show_more_post'].", 10";
		
		//$result = mysql_query("SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent FROM facebook_posts WHERE courseid=".$_SESSION["cid"]." order by p_id desc limit ".$_REQUEST['show_more_post'].", 10");	
		$result = mysql_query($sqlshow);
		}else{
			$sqlshow = "SELECT fp.*, UNIX_TIMESTAMP() - fp.date_created AS TimeSpent, c.name, c.section
				FROM facebook_posts fp, courses c
				WHERE fp.courseid = c.id AND fp.courseid
				IN (
				SELECT DISTINCT wp.courses
				FROM wp, users u
				WHERE wp.users = u.id AND u.id =  '".$_SESSION["uid"]."'
				ORDER BY wp.courses
				) ".$sqladd."
				order by p_id desc limit ".$_REQUEST['show_more_post'].", 10";
		//$result = mysql_query("SELECT *, UNIX_TIMESTAMP() - date_created AS TimeSpent FROM facebook_posts order by p_id desc limit ".$_REQUEST['show_more_post'].", 10");
		$result = mysql_query($sqlshow);
		}
		/*
		if(isset($_SESSION["cid"])){
			$sqlshow = "SELECT fp.*, UNIX_TIMESTAMP() - fp.date_created AS TimeSpent, c.name, c.section
				FROM facebook_posts fp, courses c
				WHERE fp.courseid = c.id AND fp.courseid
				IN (
				SELECT DISTINCT wp.courses
				FROM wp, users u
				WHERE wp.users = u.id AND u.id =  '".$_SESSION["uid"]."'
				ORDER BY wp.courses
				) ".$sqladd."
				order by p_id desc limit ".$next_records.", 10";	
			//$check_res = mysql_query("SELECT * FROM facebook_posts WHERE courseid=".$_SESSION["cid"]." order by p_id desc limit ".$next_records.", 10");
			$check_res = mysql_query($sqlshow);
		}else{
			$sqlshow = "SELECT fp.*, UNIX_TIMESTAMP() - fp.date_created AS TimeSpent, c.name, c.section
				FROM facebook_posts fp, courses c
				WHERE fp.courseid = c.id AND fp.courseid
				IN (
				SELECT DISTINCT wp.courses
				FROM wp, users u
				WHERE wp.users = u.id AND u.id =  '".$_SESSION["uid"]."'
				ORDER BY wp.courses
				) ".$sqladd."
				order by p_id desc limit ".$next_records.", 10";	
			//$check_res = mysql_query("SELECT * FROM facebook_posts order by p_id desc limit ".$next_records.", 10");
			$check_res = mysql_query($sqlshow);
		}
		*/
		$show_more_button = 0; // button in the end
		
		$check_result = mysql_num_rows(@$check_res);
		if($check_result > 0)
		{
			$show_more_button = 1;
		}
	}
	else
	{	
		$show_more_button = 1;
		//$result = mysql_query("SELECT *,
		//UNIX_TIMESTAMP() - date_created AS TimeSpent FROM facebook_posts WHERE courseid=".$cid." AND newsid=".$nid." order by p_id desc limit 0,10");
		if(isset($_SESSION["cid"])){
			
		/*
		$sqlshow2 = "SELECT fp.*, UNIX_TIMESTAMP() - fp.date_created AS TimeSpent, c.name, c.section
				FROM facebook_posts fp, courses c
				WHERE fp.courseid = c.id AND fp.courseid
				IN (
				SELECT DISTINCT wp.courses
				FROM wp, users u
				WHERE wp.users = u.id AND u.id =  '".$_SESSION["uid"]."'
				ORDER BY wp.courses
				) ".$sqladd."
				order by p_id desc limit 10";
		*/	
			$result = mysql_query("SELECT *, UNIX_TIMESTAMP() - date_created AS TimeSpent FROM facebook_posts WHERE courseid=".$_SESSION["cid"]." order by p_id desc limit 10");
			//$result = mysql_query($sqlshow2);
		}else{
			
			$sqlshow2 = "SELECT fp.*, UNIX_TIMESTAMP() - fp.date_created AS TimeSpent, c.name, c.section
				FROM facebook_posts fp, courses c
				WHERE fp.courseid = c.id AND fp.courseid
				IN (
				SELECT DISTINCT wp.courses
				FROM wp, users u
				WHERE wp.users = u.id AND u.id =  '".$_SESSION["uid"]."'
				ORDER BY wp.courses
				) ".$sqladd."
				order by p_id desc limit 10";
				
			//$result = mysql_query("SELECT *, UNIX_TIMESTAMP() - date_created AS TimeSpent FROM facebook_posts order by p_id desc limit 10");
			$result = mysql_query($sqlshow2);
		}
	}
	
	while ($row = mysql_fetch_array($result))
	{
		$comments = mysql_query("SELECT *,
		UNIX_TIMESTAMP() - date_created AS CommentTimeSpent FROM facebook_posts_comments where post_id = ".$row['p_id']." order by c_id asc");
		$sqlcomments = mysql_query("SELECT count(*) as no_coms FROM facebook_posts_comments where post_id = ".$row['p_id']."");				
		$no_comments = mysql_result($sqlcomments,0,"no_coms");
		$sqllikes = mysql_query("SELECT count(*) as no_likes FROM facebook_posts_likes where post_id = ".$row['p_id']."");				
		$no_likes = mysql_result($sqllikes,0,"no_likes");
		?>
	   <div class="friends_area" id="record-<?php  echo $row['p_id']?>">

	   <!--<img src="ku_logo.jpg" width="60" style="float:left;" alt="" />-->
       <img src="<?php echo getUserImgFormPost($row['userid']);?>" width="60" style="float:left;" alt="" />
       
       <!--<img src="<?php echo $_SESSION["upic"];?>" style="float:left;" alt="" />-->

		   <label style="float:left" class="name">

		   <b><?php echo $row['f_name'];?></b>

		   <em><?php  //echo clickable_link($row['post']);?>
           
           <? 
		   	$filetype=substr($row['post'], strlen($row['post'])-3, 3);
			if(check_type($filetype)){
		   		echo "<br ><img src='".$row['post']."' width='120'/>"; 
			} else {
				echo clickable_link($row['post']);
			}
		   ?>
           <br /><br />
           
           <? ///////////////////////////////////////////////////////////////////////////////?>
           <?
		   
		   // The Regular Expression filter
			$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
			
			// The Text you want to filter for urls
			$text = $row['post'];
			
			// Check if there is a url in the text
			$isurl=0;
			if(preg_match($reg_exUrl, $text, $check_url)) {
			
				   
				   // make the urls hyper links
				   //$string = @fetch_record($row['post']);	
					/// fecth title
					//$title_regex = "/<title>(.+)<\/title>/i";
					//preg_match_all($title_regex, $string, $title, PREG_PATTERN_ORDER);
					//$url_title = $title[1];
					
					/// fecth decription
					$tags = get_meta_tags($row['post']);
					
					// fetch images
					//$image_regex = '/<img[^>]*'.'src=[\"|\'](.*)[\"|\']/Ui';
					//preg_match_all($image_regex, $string, $img, PREG_PATTERN_ORDER);
					//$images_array = $img[1];
					$isurl=1;
					
			} else {
			
				   // if no urls in the text just return the text
				   echo $text;
			
			}
		   
		   	?>
            <?
		    if($isurl==1){
            ?>
           
           <!--
           <div class="images">
			<?php
            $k=1;
            for ($i=0;$i<=sizeof($images_array);$i++)
            {
                if(@$images_array[$i])
                {
                    if(@getimagesize(@$images_array[$i]))
                    {
                        list($width, $height, $type, $attr) = getimagesize(@$images_array[$i]);
                        if($width >= 50 && $height >= 50 ){
                        
                        echo "<img src='".@$images_array[$i]."' width='100' id='".$k."' >";
                        
                        $k++;
                        
                        }
                    }
                }
            }
            ?>			
            
            <input type="hidden" name="total_images" id="total_images" value="<?php echo --$k?>" />
            </div>
            -->
            
            <div class="info">
                
                <label class="title">
                    <?php  echo @$url_title[0]; ?>
                </label>
                <br clear="all" />
                <label class="url">
                    <?php  echo substr($row['post'] ,0,35); ?>
                </label>
                <br clear="all" /><br clear="all" />
                <label class="desc">
                    <?php  echo @$tags['description']; ?>
                </label>
                <br clear="all" /><br clear="all" />
                <!--
                <label style="float:left"><img src="prev.png" id="prev" alt="" /><img src="next.png" id="next" alt="" /></label>
                
                <label class="totalimg">
                     Total <?php echo $k?> images
                </label>
                -->
                <br clear="all" />
                
            </div>
            <?
			}
            ?>
            
           <? ///////////////////////////////////////////////////////////////////////////////?>
           <?
           	//$filestring="your text string";
            $findme  = 'youtube';
            
            $pos = strpos($row['post'], $findme);
                        
            if ($pos === false) {
            ?>
            
            <?
            } else {
				?>
            <div id="stexpandbox">
                <div id="stexpand6">
                <object width="400" height="250"><param name="movie" value="<? echo $row['post'];?>"><param name="allowFullScreen" value="true"><param name="allowscriptaccess" value="always"><embed src="<? echo $row['post'];?>" type="application/x-shockwave-flash" width="400" height="250" allowscriptaccess="always" allowfullscreen="true"></object>
               </div>
           </div>    
                <?
			}
            
			?>
           
           
           
           </em>
		   <br clear="all" />

		   <span>
		   <?php  
		   
		    // echo strtotime($row['date_created'],"Y-m-d H:i:s");
   		    
		    $days = floor($row['TimeSpent'] / (60 * 60 * 24));
			$remainder = $row['TimeSpent'] % (60 * 60 * 24);
			$hours = floor($remainder / (60 * 60));
			$remainder = $remainder % (60 * 60);
			$minutes = floor($remainder / 60);
			$seconds = $remainder % 60;
			
			if($days > 0)
			echo date('F d Y', $row['date_created']);
			elseif($days == 0 && $hours == 0 && $minutes == 0)
			echo "few seconds ago";		
			elseif($days == 0 && $hours == 0)
			echo $minutes.' minutes ago';
			else
			echo "few seconds ago";	
			
		   ?>
		   
		   </span>
		   <a href="javascript: void(0)" id="post_id<?php  echo $row['p_id']?>" class="showCommentBox">Comments</a> . 
           <?
		   $rlike = mysql_query("SELECT * FROM facebook_posts_likes WHERE post_id='".$row['p_id']."' AND userid=".$_SESSION["uid"]." order by c_id desc limit 1");
		   
		   if(@mysql_num_rows($rlike)==0){
           ?>
           <a href="javascript: void(0)" id="post_id<?php  echo $row['p_id']?>" class="doLike">Like</a>
           <?
		   }
           ?>
   </label>
		   <?php
			$userip = $_SERVER['REMOTE_ADDR'];
			if($row['userip'] == $userip){?>
            <!--
		  	<a href="#" class="delete"> Remove</a>
            -->
		   <?php
			}?>
		    <br clear="all" />

            <div class="commentLike" id="commentLike<?php  echo $row['p_id']?>" align="left">
            	<!--<a href="#" class="like_button" id="<?php echo $row['p_id']; ?>">2 people like it</a>-->
                <img src="LikeButton.png" width="16" height="16" /><span><? echo $no_likes;?></span> peoples like it.
            </div>            
            
            <div class="commentGroup" id="commentGroup<?php  echo $row['p_id']?>" align="left">
            	<img src="commentButton.gif" width="16" height="16" /> <a href="#" class="comment_button" id="<?php echo $row['p_id']; ?>">show all <span><? echo $no_comments;?></span> comments</a>	            
            </div>
            
		 <div id="CommentPosted<?php  echo $row['p_id']?>" style="display:none">
<!--<div id="CommentPosted<?php  echo $row['p_id']?>">-->
				<?php
				$comment_num_row = mysql_num_rows(@$comments);
				if($comment_num_row > 0)
				{
					while ($rows = mysql_fetch_array($comments))
					{
						$days2 = floor($rows['CommentTimeSpent'] / (60 * 60 * 24));
						$remainder = $rows['CommentTimeSpent'] % (60 * 60 * 24);
						$hours = floor($remainder / (60 * 60));
						$remainder = $remainder % (60 * 60);
						$minutes = floor($remainder / 60);
						$seconds = $remainder % 60;						
						?>
					<div class="commentPanel" id="record-<?php  echo $rows['c_id'];?>" align="left">
						<!--<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />-->                        
                        <!--<img src="gear_icon.png" width="40" class="CommentImg" style="float:left;" alt="" />-->
                        <img src="<?php echo getUserImg($rows['userid']);?>" width="60" class="CommentImg" style="float:left;" alt="" />
						<label class="postedComments">
							<?php  echo clickable_link($rows['comments']);?>
						</label><br /><br />
                       <!-- 
                       <? ///////////////////////////////////////////////////////////////////////////////?>
					   <?
                       
                       // The Regular Expression filter
                        $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
                        
                        // The Text you want to filter for urls
                        $text = $row['comments'];
                        
                        // Check if there is a url in the text
                        $isurl=0;
                        if(preg_match($reg_exUrl, $text, $check_url)) {
                        
                               // make the urls hyper links
                               //$string = @fetch_record($row['comments']);	
                                /// fecth title
                                //$title_regex = "/<title>(.+)<\/title>/i";
                                //preg_match_all($title_regex, $string, $title, PREG_PATTERN_ORDER);
                                //$url_title = $title[1];
                                
                                /// fecth decription
                                $tags = get_meta_tags($row['comments']);
                                
                                // fetch images
                                //$image_regex = '/<img[^>]*'.'src=[\"|\'](.*)[\"|\']/Ui';
                                //preg_match_all($image_regex, $string, $img, PREG_PATTERN_ORDER);
                                //$images_array = $img[1];
                                $isurl=1;
                                
                        } else {
                        
                               // if no urls in the text just return the text
                               echo $text;
                        
                        }
                       
                        ?>
                        <?
                        if($isurl==1){
                        ?>
                       
                       <div class="images">
                        <?php
                        $k=1;
                        for ($i=0;$i<=sizeof($images_array);$i++)
                        {
                            if(@$images_array[$i])
                            {
                                if(@getimagesize(@$images_array[$i]))
                                {
                                    list($width, $height, $type, $attr) = getimagesize(@$images_array[$i]);
                                    if($width >= 50 && $height >= 50 ){
                                    
                                    echo "<img src='".@$images_array[$i]."' width='100' id='".$k."' >";
                                    
                                    $k++;
                                    
                                    }
                                }
                            }
                        }
                        ?>
                        
                        
                        <input type="hidden" name="total_images" id="total_images" value="<?php echo --$k?>" />
                        </div>
                        <div class="info">
                            
                            <label class="title">
                                <?php  echo @$url_title[0]; ?>
                            </label>
                            <br clear="all" />
                            <label class="url">
                                <?php  echo substr($row['comments'] ,0,35); ?>
                            </label>
                            <br clear="all" /><br clear="all" />
                            <label class="desc">
                                <?php  echo @$tags['description']; ?>
                            </label>
                            <br clear="all" /><br clear="all" />
                            
                            <label style="float:left"><img src="prev.png" id="prev" alt="" /><img src="next.png" id="next" alt="" /></label>
                            
                            <label class="totalimg">
                                 Total <?php echo $k?> images
                            </label>
                            <br clear="all" />
                            
                        </div>
                        <?
                        }
                        ?>
                        
                       <? ///////////////////////////////////////////////////////////////////////////////?>
                        -->
                        
                        <?
						//$filestring="your text string";
						$findme  = 'youtube';
						
						$pos = strpos($rows['comments'], $findme);
						
						$video_name  = $rows['comments'];
						
						$find_value = 'v=';
						$pos_value = strpos($rows['comments'], $find_value);
						if ($pos_value === false) {
							$video_url = $video_name;
						}else{
							$video_value = substr(strstr($video_name, 'v='),2);
							//echo $video_value."<br>";
							$video_url = "http://www.youtube.com/v/".$video_value."?version=3";
							//echo $video_url;
						}
						
						
						
						if ($pos === false) {
						?>
						
						<?
						} else {
							?>
						<div id="stexpandbox">
							<div id="stexpand6">
							<object width="400" height="250"><param name="movie" value="<? echo $video_url;?>"><param name="allowFullScreen" value="true"><param name="allowscriptaccess" value="always"><embed src="<? echo $video_url;?>" type="application/x-shockwave-flash" width="400" height="250" allowscriptaccess="always" allowfullscreen="true"></object>
						   </div>
					   </div>    
							<?
						}
						
						?>
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
                        <?
						 $rclike = mysql_query("SELECT * FROM facebook_posts_likes_comments WHERE c_id='".$rows['c_id']."' AND userid=".$_SESSION["uid"]." order by lc_id desc limit 1");
		   
					   if(mysql_num_rows($rclike)==0){
					   ?>
                        <a href="javascript: void(0)" id="CID-<?php  echo $rows['c_id'];?>" class="c_like">Like</a>
                        <?
					   }
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
					<?php
				}?>
			</div>
            
            
            
		 <div class="commentBox" align="right" id="commentBox-<?php  echo $row['p_id'];?>" <?php echo (($comment_num_row) ? '' :'style="display:none"')?>>	                        			
<!--<img src="small.png" width="40" class="CommentImg" style="float:left;" alt="" />-->
                <!--<img src="gear_icon.png" width="40" class="CommentImg" style="float:left;" alt="" />-->
                <img src="<?php echo getUserImg($_SESSION["uid"]);?>" width="60" class="CommentImg" style="float:left;" alt="" />
				<label id="record-<?php  echo $row['p_id'];?>">
					<textarea class="commentMark" id="commentMark-<?php  echo $row['p_id'];?>" name="commentMark" cols="60"></textarea>
				</label>
				<br clear="all" />
				<a id="SubmitComment" class="small button comment"> Comment</a>
			</div>
            
            
            
</div>
	<?php
	}
	if($show_more_button == 1){?>
	
    <div id="bottomMoreButton">
	<a id="more_<?php echo @$next_records?>" class="more_records" href="javascript: void(0)">Older News</a>
	</div>
   
	<?php
	}?>
	