<?require("../../include/global_login.php");

if($courses=="")$courses=0;

//courses
//hr, min,length
$get_user=mysql_query("SELECT firstname, surname, email FROM users WHERE id=$users;");
$row=mysql_fetch_array($get_user);
$length_h=floor($length);
$length_m=($length-floor($length))*60;

// There should be have an option for sending mail. Send mail for every update is not a good idea.

//************ create mail ***********
//
//$mailbody = "Hi ".$row["firstname"]."!\n\nYour calendar has been updated by ".$person["firstname"]." ".$person["surname"].":\n\n";
//$mailbody.= "Date\t: \t".date("Y-m-d",$time_d)."\n";
//$mailbody.= "Time\t: \t".$hr.":".$mnt."\n";
//$mailbody.="Length:\t".$length_h." hr ".$length_m." min"."\n";
//$mailbody.= "Title\t: ".$title."\n";
//$mailbody.= "Text\t:\n ".$appointment."\n";
//mail($row["email"],"New appointment to your calendar",$mailbody,"From:".$person["email"]);


$sql = "INSERT INTO calendar (users,title,appointment,time,length,courses,savetime,saved_by) VALUES ($users,'".str_replace("'","&#039;",$title)."','".str_replace("'","&#039;",$appointment)."',".mktime(0+$hr,0+$mnt,0,date("m",$dt),date("d",$dt),date("Y",$dt)).",".$length.",".$courses.",".time().",".$person["id"].");";
mysql_query($sql);?>
<html>
<script type="text/javascript" language="JavaScript">
<!-- 
	function Update(){
		window.opener.location.reload();
		self.close();
	}
// --></script>
<body onLoad="Javascript:Update();">
</body>
</html>
	
