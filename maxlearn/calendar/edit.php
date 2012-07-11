<? require("../include/global_login.php");
require("../include/colors.php");
require("calfunc.php");
$getdb = mysql_query("SELECT * FROM calendar WHERE id =".$id.";");

$row=mysql_fetch_array($getdb);

$savetime = "Saved ".date("m-d H:i",$row["savetime"]);
$apptime = $row["time"];
$courses = $row["courses"];

//*******
$hr1= date("H",$apptime);
$mnt1=date("i",$apptime);
$length=$row["length"];
$addto=$row["courses"];
$date = mktime(0,0,0,date("m",$apptime),date("d",$apptime),date("Y",$apptime));
//*****

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
	for(a=0;a<document.editform.new_courses.options.length;a++){
		if(document.editform.new_courses.options[a].value==courses){
			document.editform.new_courses.options[a].selected=true;
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

function check(){
	
	var form = document.editform;
	
	if (form.new_title.value == "")
	{
		alert("Please enter title");
		form.new_title.focus();
		return  false;
	}
	
	
}

// -->
</script>	
<link rel="STYLESHEET" type="text/css" href="../css.php">
<link rel="STYLESHEET" type="text/css" href="../main.css">
</head>
<body onLoad="setfocus();" bgcolor="#ffffff">
<table width="100%" cellspacing="0" cellpadding="3" border="0" bgcolor="#e7eff7"  style='border-top: solid #99ccff 1px; border-bottom: solid #99ccff 1px; border-left: solid #99ccff 1px;border-right: solid #99ccff 1px;'>
  <form action="edit.php" method="post" name="editform" onsubmit="return check();">
    <tr> 
      <td colspan="5" align="center" bgcolor="#FFFFFF"><img src="../images/stop_sign.gif" width="14" height="14" alt="" border="0"> 
        <a href="javascript:closeIt();" class="aCal"> <b><?php echo $strClose;?></b></a></td>
    </tr>
    <tr> 
      <td align="left"><b> <?php echo $strCalendar_LabDate;?> :</b></td>
      <td colspan="4" ><b><?echo date("j F Y",$apptime) ?></b></td>
    </tr>
    <tr> 
      <td align="left"><?php echo $strCalendar_LabTime;?> :</td>
      <td colspan="4" ><b> <?echo date("H:i",$apptime) ?> - <?echo $s_total ?></b></td>
    </tr>
    <? If($c==1){ ?>
    <tr> 
      <td align="left"><?php echo $strCalendar_LabCourse;?> :</td>
      <td colspan="4" ><b><?echo $coursename ?></b></td>
    </tr>
    <? }?>    
    <tr> 
      <td width="16%" align="left" nowrap bgcolor="#FFFFFF" class="main"><?php echo $strCalendar_LabStart;?>:</td>
      <td width="42%" bgcolor="#FFFFFF" class="main"> <select class="main" name="hr">
          <? $i=0;?>
          <?for($a=0;$a<24;$a++){?>
          <option value="<?echo $a?>" <? if($hr1==$a) echo "selected"?>><?echo $a?></option>
          <?}?>
        </select> <select name="mnt" class="main">
          <?$i=0?>
          <?for($a=0;$a<51;$a=$a+10){?>
          <option value="<?echo $a?>" <? if($mnt1==$a) echo "selected" ?>> 
          <?if($a==0){?>
          <?echo "00"?> 
          <?}else{echo $a;}?>
          </option>
          <?}?>
        </select> </td>
      <td width="16%" align="left" bgcolor="#FFFFFF" class="main"><?php echo $strCalendar_LabLength;?>:</td>
      <td width="26%" bgcolor="#FFFFFF" class="main"><select name="new_length" class="main">
          <option value="0.25" class="small" <? if($length==0.25)  echo "selected"?>>15min</option>
          <option value="0.50" class="small" <? if($length==0.50)  echo "selected"?>>30min</option>
          <option value="0.75" class="small" <? if($length==0.75)  echo "selected"?>>45min</option>
          <option value="1.00" class="small" <? if($length==1.00)  echo "selected"?>>1hr</option>
          <option value="1.25" class="small" <? if($length==1.25)  echo "selected"?>>1hr 15min</option>
          <option value="1.50" class="small" <? if($length==1.50)  echo "selected"?>>1hr 30min</option>
          <option value="1.75" class="small" <? if($length==1.75)  echo "selected"?>>1hr 45min</option>
          <option value="2.00" class="small" <? if($length==2.00)  echo "selected"?>>2hr</option>
          <option value="2.25" class="small" <? if($length==2.25)  echo "selected"?>>2hr 15min</option>
          <option value="2.50" class="small" <? if($length==2.50)  echo "selected"?>>2hr 30min</option>
          <option value="2.75" class="small" <? if($length==2.75)  echo "selected"?>>2hr 45min</option>
          <option value="3.00" class="small" <? if($length==3.00)  echo "selected"?>>3hr</option>
          <option value="3.25" class="small" <? if($length==3.25)  echo "selected"?>>3hr 15min</option>
          <option value="3.50" class="small" <? if($length==3.50)  echo "selected"?>>3hr 30min</option>
          <option value="3.75" class="small" <? if($length==3.75)  echo "selected"?>>3hr 45min</option>
          <option value="4.00" class="small" <? if($length==4.00)  echo "selected"?>>4hr</option>
          <option value="4.25" class="small" <? if($length==4.25)  echo "selected"?>>4hr 15min</option>
          <option value="4.50" class="small" <? if($length==4.50)  echo "selected"?>>4 hr 30min</option>
          <option value="4.75" class="small" <? if($length==4.75)  echo "selected"?>>4hr 45min</option>
          <option value="5.00" class="small" <? if($length==5.00)  echo "selected"?>>5hr</option>
          <option value="5.25" class="small" <? if($length==5.25)  echo "selected"?>>5hr 15min</option>
          <option value="5.50" class="small" <? if($length==5.50)  echo "selected"?>>5hr 30min</option>
          <option value="5.75" class="small" <? if($length==5.75)  echo "selected"?>>5hr 45min</option>
          <option value="6.00" class="small" <? if($length==6.00)  echo "selected"?>>6hr</option>
          <option value="6.25" class="small" <? if($length==6.25)  echo "selected"?>>6hr 15min</option>
          <option value="6.50" class="small" <? if($length==6.50)  echo "selected"?>>6hr 30min</option>
          <option value="6.75" class="small" <? if($length==6.75)  echo "selected"?>>6hr 45min</option>
          <option value="7.00" class="small" <? if($length==7.00)  echo "selected"?>>7hr</option>
          <option value="7.25" class="small" <? if($length==7.25)  echo "selected"?>>7hr 15min</option>
          <option value="7.50" class="small" <? if($length==7.50)  echo "selected"?>>7hr 30min</option>
          <option value="7.75" class="small" <? if($length==7.75)  echo "selected"?>>7hr 45min</option>
          <option value="8.00" class="small" <? if($length==8.00)  echo "selected"?>>8hr</option>
          <option value="9.00" class="small" <? if($length==9.00)  echo "selected"?>>All day</option>
        </select> </td>
    </tr>
    <tr> 
      <?	
if($person["admin"]==1){
	$checkAdmin = mysql_query("SELECT distinct c.id,c.name FROM courses c, wp WHERE c.active=1 AND wp.courses=c.id;");
}else{	
	$checkAdmin = mysql_query("SELECT distinct c.id,c.name FROM courses c, wp WHERE wp.users = ".$person["id"]." AND wp.admin=1 AND NOT wp.courses=0 AND wp.courses=c.id AND c.active=1;");
}
if(mysql_num_rows($checkAdmin)!=0){?>
      <td bgcolor="#FFFFFF" class="main" align="left"><?php echo $strCalendar_LabAddNewAppTo;?>: 
      </td>
      <td bgcolor="#FFFFFF" class="main"><select name="new_courses" class="main">
          <option class="main" value="0"><?php echo $strCalendar_LabPerCal;?></option>
          <?while($course_row=mysql_fetch_array($checkAdmin)){
			?>
          <option class="main" value="<?echo $course_row["id"] ?>" <? if($addto ==  $course_row["id"] ) echo "selected"?>><?echo $course_row["name"] ?></option>
          <?}
		?>
        </select> </td>
      <?}else{?>
      <input type="hidden" name="new_courses" class="main" value="<?echo $courses?>">
      <?}?>
      <td bgcolor="#FFFFFF" class="main" align="left"><?php echo $strCalendar_LabNewDate;?>:</td>
      <?$i=0;?>
      <td bgcolor="#FFFFFF" class="main"> <select name="time_d" class="main">
          <?
		$t=fixmonth($startdate,-1);
		$start=$t;
		while(date("Y-m",$t)<date("Y-m",fixmonth($startdate,2))){
			$t=fixday($start,$i++);
			$display=date("F d",$t);
			if(date("m",$t)!=date("m",fixmonth($startdate,2))){
			?>
          <option value="<?echo $t?>" class="main" <? if($date==$t) echo "selected"?>><?echo $display." (".strftime("%a",$t).")"?></option>
          <?
			}
		}?>
        </select> </td>
    </tr>
    <tr> 
      <td bgcolor="#FFFFFF" class="main"><?php echo $strCalendar_LabTitle;?>: </td>
      <td colspan="3" bgcolor="#FFFFFF" class="main" align="left"><input type="text" name="new_title" size="15" maxlength="12" value="<?echo $row["title"] ?>" class="text"></td>
    </tr>
    <tr> 
      <td bgcolor="#FFFFFF"><?php echo $strCalendar_LabDesc;?>:</td>
      <td colspan="3" bgcolor="#FFFFFF"><textarea wrap="physical" name="new_appointment" cols="46" rows="5" class="textarea"><?echo $row["appointment"] ?></textarea></td>
    </tr>
    <tr> 
      <td colspan="4"><i>Last <? echo $savetime ?></i></td>
    </tr>
    <tr> 
      <td colspan="4" align="center"><input type="submit" value="<?php echo $strUpdate;?>" name="upd" class="main"> 
        <input type="reset" value="<?php echo $strReset;?>" class="main"> <input type="hidden" name="id" value="<?echo $id?>"> 
        <input type="hidden" name="update" value="1"></td>
    </tr>
  </form>
</table>
</body>
</html>
<?}else{
if($courses==""){
	$courses=0;
}
//echo "UPDATE calendar set title='".str_replace("'","&#039;",$new_title)."', appointment='".str_replace("'","&#039;",$new_appointment)."', length=".$new_length.", time=".mktime(0+$hr,0+$mnt,0,date("m",$time_d),date("d",$time_d),date("Y",$time_d)).",savetime=".time().",courses=$new_courses WHERE id=$id;";
mysql_query("UPDATE calendar set users=".$person["id"].", title='".str_replace("'","&#039;",$new_title)."', appointment='".str_replace("'","&#039;",$new_appointment)."', length=".$new_length.", time=".mktime(0+$hr,0+$mnt,0,date("m",$time_d),date("d",$time_d),date("Y",$time_d)).",savetime=".time().",courses=$new_courses WHERE id=$id;");

$courses=$new_courses;
?>
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
