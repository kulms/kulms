<? require("../include/global_login.php");
mysql_query("DELETE FROM calendar WHERE id =$id;");

//if Conn.Errors.Count = 0 then
?>
<html>
<head>
<META HTTP-EQUIV="Refresh" CONTENT="1;URL=index.php?courses=<?echo $courses?>">
<title></title>
<link rel="STYLESHEET" type="text/css" href="../css.php">
</head>
<body bgcolor="<?echo $cBGcolor?>" topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">
 	<p>&nbsp;</p>
<div align="center" class="main"><b><?php echo $strCalendar_LabAppDel;?></b><p>
</div>
</html>
