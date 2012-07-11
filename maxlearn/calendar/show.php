<?
require("../include/global_login.php");
require("../include/colors.php");
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
}
?>
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

function delete_it(id,c){
	if(confirm('Really delete this appointment?'))
	{
		window.opener.location="del_app.php?id=" + id + "&courses=" +c;
		close();
	}
}

function Edit(id){
	LeftPosition = (screen.width) ? (screen.width-450)/2 : 0;
	TopPosition = (screen.height) ? (screen.height-400)/2 : 0;
	settings =
	'height='+400+',width='+450+',top='+TopPosition+',left='+LeftPosition+',status=no,toolbar=no,menubar=no,scrollbars=yes';
	links = "edit.php?id=" + id;
	window.open(links, "EditWindow", settings);
}
// -->
</script>	
<link rel="STYLESHEET" type="text/css" href="../css.php">
<link rel="STYLESHEET" type="text/css" href="../main.css">
</head>
<body onLoad="setfocus()" bgcolor="#ffffff">
<table width="100%" cellspacing="1" cellpadding="2" bgcolor="#e7eff7"  style='border-top: solid #99ccff 1px; border-bottom: solid #99ccff 1px; border-left: solid #99ccff 1px;border-right: solid #99ccff 1px;'>
  <tr> 
    <td colspan="2" align="center" valign="top"><table cellpadding="0" cellspacing="0" width="100%" border="0" bgcolor="#FFFFFF">
        <tr> 
          <td valign="top" align="center"><img src="../images/stop_sign.gif" width="14" height="14" alt="" border="0"><a href="javascript:closeIt();" class="aCal"><b ><?php echo $strClose;?></b></a></td>
          <?if(($courses==0)||($course_admin==1)||($person["admin"]==1)){?>
          <td valign="top" align="center"><img src="../images/_delete.gif" width="16" height="16" alt="" border="0"><a href="javascript:delete_it(<?echo $id ?>,<?echo $courses?>);" class="aCal"><b ><?php echo $strDelete;?></b></a></td>
          <td valign="top" align="center"><img src="../images/_edit2.gif" width="19" height="17" alt="" border="0"><a href="Javascript:Edit(<?echo $id?>);" class="aCal"><b ><?php echo $strEdit;?></b></a></td>
          <?}?>
        </tr>
      </table></td>
  </tr>
  <tr > 
    <td colspan="2" align="center" class="h5"><b><img src="../images/file.gif" width="20" height="16"><?php echo $strCalendar_LabShowDetailApp;?></b></td>
  </tr>
  <tr > 
    <td width="11%" align="center" class="main"><div align="right"><?php echo $strCalendar_LabDate;?> :</div></td>
    <td width="89%"  bgcolor="#FFFFFF" class="main"><b><?echo date("j F Y",$apptime) ?></b></td>
  </tr>
  <tr > 
    <td class="main" align="center"><div align="right"><?php echo $strCalendar_LabTime;?> :</div></td>
    <td class="main"  bgcolor="#FFFFFF"><b><?echo date("H:i",$apptime) ?> - <?echo $s_total ?></b></td>
  </tr>
  <? if($c==1){ ?>
  <tr > 
    <td class="main" align="center"><div align="right"><?php echo $strCalendar_LabCourse;?> :</div></td>
    <td class="main"  bgcolor="#FFFFFF"><b><? echo $coursename ?></b></td>
  </tr>
  <? }//End If ?>
  <tr> 
    <td class="main" align="center"><div align="right"><?php echo $strCalendar_LabTitle;?> :</div></td>
    <td class="main"  bgcolor="#FFFFFF"><b><?echo htmlspecialchars($row["title"]) ?></b></td>
  </tr>
  <tr > 
    <td class="main" align="center"><div align="right"><?php echo $strCalendar_LabDesc;?> :</div></td>
    <td class="main"  bgcolor="#FFFFFF"><?echo htmlspecialchars($row["appointment"]) ?> 
    </td>
  </tr>
  <tr> 
    <td class="main"><div align="right"></div></td>
    <td class="main">&nbsp;</td>
  </tr>
  <tr> 
    <td class="small"><div align="right"></div></td>
    <td class="small"><i><?echo $savetime ?> by 
      <?if($shared_user!=""){?>
      <?echo $shared_user?> 
      <?}else{?>
      <?echo $row["firstname"]."&nbsp;".$row["surname"]?> 
      <?}?>
    </td>
  </tr>
</table>
</body>
</html>
