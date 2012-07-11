<?require("../../include/global_login.php");
require("../../include/colors.php");
require("calfunc.php");
$getdb = mysql_query("SELECT * FROM calendar WHERE id =".$id.";");

$row=mysql_fetch_array($getdb);

$savetime = "Saved ".date("m-d H:i",$row["savetime"]);
$apptime = $row["time"];
$courses = $row["courses"];
$users=$row["users"];
if($courses != 0){
	$getcourse = mysql_query("SELECT c.name,wp.admin FROM courses c, wp WHERE c.id=$courses AND wp.courses=$courses AND wp.courses=c.id AND NOT wp.courses=0 AND wp.users=".$person["id"].";");
	if(mysql_num_rows($getcourse)!=0){
		$coursename = mysql_result($getcourse,0,"name");
		$course_admin=mysql_result($getcourse,0,"admin");
	}//end if
	$c=1;
}//end if
$length = $row["length"];// * 60;
if($length > 8){
	$s_total = "All day";
}else{
	$s_total= date("H:i",mktime(date("H",$apptime),date("i",$apptime)+$length*60,0,date("m",$apptime),date("d",$apptime),date("Y",$apptime)));
}

$startdate =mktime(0,0,0,date("m",$apptime),1,date("Y",$apptime)); //startdate for month, ie 1:st in month
if($update!=1){?>
<html>
<head>
	<title>Edit appointment</title>
<script language="JavaScript">
<!-- hide
	hr=<?echo date("H",$apptime)?>;
	mnt=<?echo date("i",$apptime)?>;
	new_length=<?echo $length?>;
	courses=<?echo $courses?>;
	time_d=<?echo mktime(0,0,0,date("m",$apptime),date("d",$apptime),date("Y",$apptime))?>;
function closeIt() {
	window.opener.close();
  	close();
}

function setfocus() {
	self.window.focus();
	for(a=0;a<document.editform.hr.options.length;a++){
		if(document.editform.hr.options[a].value==hr){
			document.editform.hr.options[a].selected=true;
		}
	}
	for(a=0;a<document.editform.mnt.options.length;a++){
		if(document.editform.mnt.options[a].value==mnt){
			document.editform.mnt.options[a].selected=true;
		}
	}
	for(a=0;a<document.editform.new_length.options.length;a++){
		if(document.editform.new_length.options[a].value==new_length){
			document.editform.new_length.options[a].selected=true;
		}
	}
	for(a=0;a<document.editform.time_d.options.length;a++){
		if(document.editform.time_d.options[a].value==time_d){
			document.editform.time_d.options[a].selected=true;
		}
	}
}

function delete_it(id,c){
	if(confirm('Really delete this appointment?'))
	{
		window.opener.opener.location="del_app.php?id=" + id + "&courses=" +c;
		window.opener.close();
		close();
	}
}
// -->
</script>	
<link rel="STYLESHEET" type="text/css" href="../../css.php">
</head>
<body onLoad="setfocus();" bgcolor="#ffffff">
<table width="95%" cellspacing="0" cellpadding="3" border="0">
<tr>
	<td colspan="4" bgcolor="<?echo $cBGMainFunc?>">
		<table cellpadding="0" cellspacing="0" width="100%" align="center">
			<tr bgcolor="<?echo $cBGMainFunc?>">
				<td align="center"><a href="javascript:closeIt();" class="mainwhite"><img src="../../images/arrow.gif" width="7" height="7" alt="" border="0"> <b class="mainwhite"><u>Close</u></b></a></td>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td colspan="4" bgcolor="<?echo $cBGMainInfo[0]?>" class="main" align="center"><b><?echo date("D d M",$apptime) ?> &nbsp; <?echo date("H:i",$apptime) ?> - <?echo $s_total ?></b></td>
</tr>
<tr>
	<td colspan="4" align="center" bgcolor="<?echo $cBGMainInfo[1]?>" class="main"><b>Personal Calendar</b></td>
</tr>
<form action="edit.php" method="post" name="editform">
<? If($c==1){ ?>
<tr>
	<td colspan="4" bgcolor="<?echo $cBGMainInfo[0]?>" class="main" align="center"><b><font color="#E6E6ff"><?echo $coursename ?></font></b></td>
</tr><? }?>
<tr>
	<td bgcolor="<?echo $cBGMainInfo[1]?>" class="main" align="left" nowrap>Start time:</td>
	<td nowrap bgcolor="<?echo $cBGMainInfo[1]?>" class="small"><select class="small" name="hr"><? $i=0;?>
				<?for($a=0;$a<24;$a++){?>
				<option class="small" value="<?echo $a?>"><?echo $a?></option>
				<?}?>
			</select>
			<select name="mnt" class="small"><?$i=0?>
				<?for($a=0;$a<51;$a=$a+10){?>
					<option class="small" value="<?echo $a?>"><?if($a==0){?><?echo "00"?><?}else{echo $a;}?></option>
				<?}?>
			</select>
		</td>
		<td bgcolor="<?echo $cBGMainInfo[1]?>" class="small" align="left">Length:</td>
		<td bgcolor="<?echo $cBGMainInfo[1]?>" class="small"><select name="new_length" class="small">
				<option value="0.25" class="small">15min</option>
				<option value="0.50" class="small">30min</option>
				<option value="0.75" class="small">45min</option>
				<option value="1.00" class="small">1hr</option>
				<option value="1.25" class="small">1hr 15min</option>
				<option value="1.50" class="small">1hr 30min</option>
				<option value="1.75" class="small">1hr 45min</option>
				<option value="2.00" class="small">2hr</option>
				<option value="2.25" class="small">2hr 15min</option>
				<option value="2.50" class="small">2hr 30min</option>
				<option value="2.75" class="small">2hr 45min</option>
				<option value="3.00" class="small">3hr</option>
				<option value="3.25" class="small">3hr 15min</option>
				<option value="3.50" class="small">3hr 30min</option>
				<option value="3.75" class="small">3hr 45min</option>
				<option value="4.00" class="small">4hr</option>
				<option value="4.25" class="small">4hr 15min</option>
				<option value="4.50" class="small">4 hr 30min</option>
				<option value="4.75" class="small">4hr 45min</option>
				<option value="5.00" class="small">5hr</option>
				<option value="5.25" class="small">5hr 15min</option>
				<option value="5.50" class="small">5hr 30min</option>
				<option value="5.75" class="small">5hr 45min</option>
				<option value="6.00" class="small">6hr</option>
				<option value="6.25" class="small">6hr 15min</option>
				<option value="6.50" class="small">6hr 30min</option>
				<option value="6.75" class="small">6hr 45min</option>
				<option value="7.00" class="small">7hr</option>
				<option value="7.25" class="small">7hr 15min</option>
				<option value="7.50" class="small">7hr 30min</option>
				<option value="7.75" class="small">7hr 45min</option>
				<option value="8.00" class="small">8hr</option>
				<option value="9.00" class="small">All day</option>
		</select>
	</td>
</tr>
<tr>
	<td bgcolor="<?echo $cBGMainInfo[1]?>" class="main">Title: </td>
	<td bgcolor="<?echo $cBGMainInfo[1]?>" class="main" align="left"><input type="text" name="new_title" size="8" maxlength="8" value="<?echo $row["title"] ?>"></td>
	<input type="hidden" name="new_courses" value="0">
	<td bgcolor="<?echo $cBGMainInfo[1]?>" class="main" align="left">New date:</td>
	<?$i=0;?>
	<td bgcolor="<?echo $cBGMainInfo[1]?>" class="main">
		<select name="time_d" class="small"><?
		$t=fixmonth($startdate,-1);
		$start=$t;
		while(date("Y-m",$t)<date("Y-m",fixmonth($startdate,2))){
			$t=fixday($start,$i++);
			$display=date("F d",$t);
			if(date("m",$t)!=date("m",fixmonth($startdate,2))){
			?>
				<option value="<?echo $t?>" class="small"><?echo $display." (".strftime("%a",$t).")"?></option>
			<?
			}
		}?>
		</select>
	</td>
</tr>
<tr>
	<td colspan="4"><textarea wrap="physical" name="new_appointment" cols="48" rows="5"><?echo $row["appointment"] ?></textarea></td>
</tr>
	<td colspan="4" class="small"><i>Last <?echo $savetime ?></i></td>
</tr>
</tr>
	<td colspan="4" align="center" class="small"><input type="submit" value=" U p d a t e " name="upd" style="font-family:Arial;font-size:8pt"><input type="reset" value=" R e s e t " style="font-family:Arial;font-size:8pt"></td>
</tr>
<input type="hidden" name="id" value="<?echo $id?>">
<input type="hidden" name="users" value="<?echo $users?>">
<input type="hidden" name="update" value="1">
</form>
</table>
</body>
</html>
<?}else{
if($courses==""){
	$courses=0;
}

$get_user=mysql_query("SELECT firstname, surname, email FROM users WHERE id=$users;");
echo "SELECT firstname, surname, email FROM users WHERE id=$users;";
$row=mysql_fetch_array($get_user);
$length_h=floor($length);
$length_m=($length-floor($length))*60;
$mnt = $mnt=="0" ? "00" : $mnt;
//************ create mail ***********
$mailbody = "Hi ".$row["firstname"]."!\n\nYour calendar has been updated by ".$person["firstname"]." ".$person["surname"].":\n\n";
$mailbody.= "Date\t: \t".date("Y-m-d",$time_d)."\n";
$mailbody.= "Time\t: \t".$hr.":".$mnt."\n";
$mailbody.="Length:\t".$length_h." hr ".$length_m." min"."\n";
$mailbody.= "Title\t: \t".$new_title."\n";
$mailbody.= "Text\t:\n".$new_appointment."\n";
mail($row["email"],"Your calendar is updated",$mailbody,"From:".$person["email"]);

//echo "UPDATE calendar set title='".str_replace("'","&#039;",$new_title)."', appointment='".str_replace("'","&#039;",$new_appointment)."', length=".$new_length.", time=".mktime(0+$hr,0+$mnt,0,date("m",$time_d),date("d",$time_d),date("Y",$time_d)).",savetime=".time().",courses=$new_courses WHERE id=$id;";
mysql_query("UPDATE calendar set users=$users, title='".str_replace("'","&#039;",$new_title)."', appointment='".str_replace("'","&#039;",$new_appointment)."', length=".$new_length.", time=".mktime(0+$hr,0+$mnt,0,date("m",$time_d),date("d",$time_d),date("Y",$time_d)).",savetime=".time().",courses=$new_courses,saved_by=".$person["id"]." WHERE id=$id;");
$courses=$new_courses;?>
<html>
<script type="text/javascript" language="JavaScript">
function Update(){
	window.opener.opener.location.reload();
	window.opener.close();
	close();
}
</script>
<body onLoad="Javascript:Update();">
</body>
</html>
<?}?>
