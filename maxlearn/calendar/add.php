<? require("../include/global_login.php");
//appointment = replace(appointment,"'","&#039;")
		/*********************************************************
		*	function mail_users
		*	Send mail to all users about update
		**********************************************************/	
// It should be have an option for sending mail when click add or update. Or it will has too many mails.
//
//	function mail_users($email,$coursename){
//		global $title,$appointment,$dt,$length,$SERVER_NAME,$path,$person;
//		$mailbody="The course calendar for ".$coursename." has been updated.\n";
//		$mailbody.="-------------------------------------------------------\n";
//		$mailbody.="Date:               ".date("Y-m-d, H:i",$dt)."\n\n";		
//		$mailbody.="Title:               ".$title."\n";
//		$mailbody.="Appointment:      ".$appointment."\n";
//		$mailbody.="-------------------------------------------------------\n";
//		$mailbody.="\nAdded by:    ".$person["firstname"]." ".$person["surname"].", email: ".$person["email"]."\n";
//		$mailbody.="URL:                 http://".$SERVER_NAME."/$path/\n";
//
//			//********* DEBUG *********
//		//echo "Send to:".$email."<br>";
//		//echo nl2br($mailbody)."<hr>";
//			//********* DEBUG *********
//		mail($email,"Course updated calendar",$mailbody,"From:admin@$SERVER_NAME");
//	}
if
($courses==""){
	$courses=0;
}//end if

$sql = "INSERT INTO calendar (users,title,appointment,time,length,courses,savetime) VALUES (".$person["id"].",'".str_replace("'","&#039;",$title)."','".str_replace("'","&#039;",$appointment)."',".mktime(0+$hr,0+$mnt,0,date("m",$dt),date("d",$dt),date("Y",$dt)).",".$length.",".$courses.",".time().");";
mysql_query($sql);

//if($courses>0){	//send mail to all coursemembers about update
//	$get_coursemembers=mysql_query("SELECT DISTINCT u.email, u.firstname, u.surname, c.name FROM users u, courses c, wp WHERE wp.courses=$courses AND u.id=wp.users AND u.id<>".$person["id"]." AND c.id=$courses;");
//	while($row=mysql_fetch_array($get_coursemembers)){
//		$coursename=$row["name"];
//		mail_users($row["email"],$coursename);
//	}
//}

?>
<html>
<script type="text/javascript" language="JavaScript">
function Update(){
	window.opener.location.reload();
	close();
}
</script>
<body onLoad="Javascript:Update();">
</body>
</html>
	
