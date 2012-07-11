<?require("../../include/global_login.php");
require("../../include/colors.php");
$check=mysql_query("SELECT * FROM calendar_share WHERE shared_user=".$person["id"]." AND users=$users;");
if(mysql_num_rows($check)!=0){
	$write_permission=mysql_result($check,0,"write_permission");
	
	$getdb = mysql_query("SELECT c.*,u.firstname,u.surname FROM calendar c,users u WHERE c.id =".$id." AND u.id=c.users;");
	$row=mysql_fetch_array($getdb);
	
	$savetime = "Saved ".date("m-d H:i",$row["savetime"]);
	if($row["saved_by"]!=0 && $row["saved_by"]!=$row["users"]){
		$get_shareduser=mysql_query("SELECT * FROM users WHERE id=".$row["saved_by"].";");
		$shared_user=mysql_result($get_shareduser,0,"firstname")."&nbsp;".mysql_result($get_shareduser,0,"surname");
	}
	$apptime = $row["time"];
	$courses = $row["courses"];
	if($courses != 0){
		$getcourse = mysql_query("SELECT c.name,wp.admin FROM courses c, wp WHERE c.id=$courses AND wp.courses=$courses AND wp.courses=c.id AND NOT wp.courses=0 AND wp.users=".$person["id"].";");
		if(mysql_num_rows($getcourse)!=0){
			$coursename = mysql_result($getcourse,0,"name");
			$course_admin=mysql_result($getcourse,0,"admin");
		}//end if
		$c=1;
	}//end if
	$length = $row["length"];// * 60;
	if($person["admin"]==1){
		$get_cname=mysql_query("SELECT name FROM courses WHERE id=$courses;");
		if(mysql_num_rows($get_cname)!=0){
			$coursename=mysql_result($get_cname,0,"name");
		}
	}
	if($length > 8){
		$s_total = "All day";
	}else{
		$s_total= date("H:i",mktime(date("H",$apptime),date("i",$apptime)+$length*60,0,date("m",$apptime),date("d",$apptime),date("Y",$apptime)));
	}?>
	<html>
	<head>
		<title>Show appointment</title>
	<script language="JavaScript">
	<!-- hide
	function closeIt() {
	  close();
	}
	
	function setfocus() {
		self.window.focus();
	    return;
	}
	
	function delete_it(id,c,user){
		if(confirm('Really delete this appointment?'))
		{
			window.opener.location="del_app.php?id=" + id + "&courses=" +c+"&users="+user;
			close();
		}
	}
	
	function Edit(id){
		links = "edit.php?id=" + id;
		window.open(links, "EditWindow", "ScreenX=500,ScreenY=70,width=450,height=400,status=no,toolbar=no,menubar=no,scrollbars=yes");
	}
	// -->
	</script>	
	<link rel="STYLESHEET" type="text/css" href="../../css.php">
	</head>
	<body onLoad="setfocus()" bgcolor="#ffffff">
	<table width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td>&nbsp;</td>
		<td align="center" valign="top" bgcolor="<?echo $cBGMainFunc?>">
			<table cellpadding="0" cellspacing="0" width="100%" border="0">
				<tr>
					<td valign="top" align="center"><a href="javascript:closeIt();" class="mainwhite"><img src="../../images/arrow.gif" width="7" height="7" alt="" border="0"> <b class="mainwhite"><u>Close</u></b></a></td>
					<?if(($row["saved_by"]==$person["id"])&& $write_permission==1){?>
					<td valign="top" align="center"><a href="javascript:delete_it(<?echo $id ?>,<?echo $courses?>);" class="mainwhite"><img src="../../images/arrow.gif" width="7" height="7" alt="" border="0"> <b class="mainwhite"><u>Delete</u></b></a></td>
					<td valign="top" align="center"><a href="Javascript:Edit(<?echo $id?>);" class="mainwhite"><img src="../../images/arrow.gif" width="7" height="7" alt="" border="0"> <b class="mainwhite"><u>Edit</u></b></a></td>
					<?}?>
				</tr>
			</table>
		</td>
	</tr><? if($c==1){ ?>
	<tr>
		<td>&nbsp;</td>
		<td class="main" align="center" bgcolor="<?echo $cBGMainInfo[0]?>"><b><?echo $coursename ?></b>&nbsp;</td>
	</tr><? }//End If ?>
	<tr>
		<td>&nbsp;</td>
		<td class="main" align="center" bgcolor="<?echo $cBGMainInfo[0]?>"><b><?echo date("D d M",$apptime) ?> &nbsp; <?echo date("H:i",$apptime) ?> - <?echo $s_total ?></b></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="main" align="center" bgcolor="<?echo $cBGMainInfo[1]?>"><b><?echo htmlspecialchars($row["title"]) ?></b> </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="main"><?echo htmlspecialchars($row["appointment"]) ?></td>
	</tr>
		<td height="100">&nbsp;</td>
		<td class="small"><i><?echo $savetime ?> by <?if($shared_user!=""){?><?echo $shared_user?><?}else{?><?echo $row["firstname"]."&nbsp;".$row["surname"]?><?}?></td>
	</tr>
	</table>
	</body>
	</html>
<?}else{?>
You don't have access to this calendar!!
<?}?>