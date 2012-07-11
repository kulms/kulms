<?require("../../include/global_login.php");
$get_user=mysql_query("SELECT firstname, surname, email FROM users WHERE id=$users;");
$row=mysql_fetch_array($get_user);
$get_cal=mysql_query("SELECT * FROM calendar WHERE id=$id;");
$cal_row=mysql_fetch_array($get_cal);
$dates=$cal_row["time"];

$d=date("d",$dates);
$m=date("m",$dates);
$y=date("Y",$dates);
$sw_date=$y."-".$m."-".$d;
$length=$cal_row["length"];
//************ create mail ***********
$mailbody = "Hi ".$row["firstname"]."!\n\nAn item in your calendar has been deleted by ".$person["firstname"]." ".$person["surname"].":\n\n";
$mailbody.= "Date: ".$sw_date."\n";
$mailbody.= "Time: ".date("H:i",$dates)."\n";
$mailbody.= "Length (hr)\t: ".$length."\n";
$mailbody.= "Title\t: ".$cal_row["title"]."\n";
$mailbody.= "Text\t:\n ".$cal_row["appointment"]."\n";
mail($row["email"],"A deleted appointment in your calendar",$mailbody,"From:".$person["email"]);

mysql_query("DELETE FROM calendar WHERE id =$id;");

//if Conn.Errors.Count = 0 then
?>
<html>
<head>
<META HTTP-EQUIV="Refresh" CONTENT="1;URL=index.php?courses=<?echo $courses?>&users=<?echo $users?>">
<title></title>
<link rel="STYLESHEET" type="text/css" href="../../css.php">
</head>
<body bgcolor="<?echo $cBGcolor?>" topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">
 	<p>&nbsp;</p>
<div align="center" class="main"><b>Appointment deleted successfully.</b><p>
</div>
</html>
