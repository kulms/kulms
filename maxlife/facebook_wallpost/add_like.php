<?
include('dbcon.php');
/*
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
	*/
	
	//if(checkValues($_REQUEST['post_id'])
	//{
		$userip = $_SERVER['REMOTE_ADDR'];
		mysql_query("INSERT INTO facebook_posts_likes (post_id,likes,userip,date_created,userid) VALUES('".$_REQUEST['post_id']."','1','".$userip."','".strtotime(date("Y-m-d H:i:s"))."',".$uid.")");
			
		$result = mysql_query("SELECT count(*) AS no_likes FROM facebook_posts_likes WHERE post_id='".$_REQUEST['post_id']."' order by c_id desc limit 1");
		
		echo mysql_result($result,0,"no_likes");
	//}
?>