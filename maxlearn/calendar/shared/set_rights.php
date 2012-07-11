<?require("../../include/global_login.php");
require("../../include/colors.php");
if($s1==""){
	$get_all=mysql_query("SELECT u.firstname,u.surname,cs.write_permission,cs.id FROM users u, calendar_share cs WHERE cs.users=".$person["id"]." AND u.id=cs.shared_user;");?>
	<html>
	<head>
		<title>Untitled</title>
		<link rel="STYLESHEET" type="text/css" href="../../css.php">
	</head>
	<body bgcolor="<?echo $cBGcolor?>" topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">
<form action="set_rights.php" method="post">
	<?if(mysql_num_rows($get_all)!=0){?>
	<table align="center" cellpadding="5" cellspacing="1" border="0" bgcolor="#000000">
		<tr bgcolor="<?echo $cBGMainFunc?>">
			<td class="mainwhite" width="200"><b>User</b></td>
			<td class="mainwhite"><b>Write permission</b></td>
		</tr>
	<?	$a=0;
		while($row=mysql_fetch_array($get_all)){
			$a++;?>
		<tr bgcolor="<?echo $cBGMulti[$col++%"2"]?>">
			<td class="main"><?echo $row["firstname"]?>&nbsp;<?echo $row["surname"]?></td>
			<td class="main"><input type="checkbox" name="<?echo $a?>_write" value="1"<?if($row["write_permission"]==1){?> checked<?}?>>
				<input type="hidden" name="<?echo $a?>_id" value="<?echo $row["id"]?>">
			</td>
		</tr>
	<?	}//end while?>
		<tr bgcolor="<?echo $cBGMainFunc?>">
			<td colspan="2" class="main" align="center"><a class="mainwhite" href="javascript:document.forms[0].submit();"><img src="../../images/arrow.gif" width="7" height="7" alt="" border="0"> <b class="mainwhite"><u>Save</u></b></a></td>
		</tr>
	</table>
	<input type="hidden" name="s1" value="save">
	<input type="hidden" name="total_users" value="<?echo $a?>">
	</form>
	<?}else{?>
	<div class="h3" align="center">Your calendar is presently <b>not</b> available to any other users.</div>
	<?}?>
	</body>
	</html>
<?}else{
	for($a=1;$a<=$total_users;$a++){
		$val=${$a."_write"};
		$id=${$a."_id"};
		if($val==""){$val=0;}
		$upd=mysql_query("UPDATE calendar_share SET write_permission=$val WHERE id=$id;");
	}
	header("Status: 302 Moved Temporarily");
	header("Location:  ../index.php?courses=-1");
}?>
