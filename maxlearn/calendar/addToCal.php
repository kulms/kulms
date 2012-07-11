<?
require("../include/global_login.php");
require("../include/colors.php");
if($insert!=1){?>
	<html>
	<head>
		<link rel="STYLESHEET" type="text/css" href="../css.php">
		<link rel="STYLESHEET" type="text/css" href="../main.css">
		<title>Add appointment</title>
		<script type="text/javascript" language="JavaScript">
			<!-- 		
			function check(){
	
	var form = document.addit;
	
	if (form.title.value == "")
	{
		alert("Please enter title");
		form.title.focus();
		return  false;
	}
	
	
}

function closeIt() {
	  			self.window.close();
			}
			function setfocus(courses){
				self.window.focus();
				for(a=0;a<document.addit.courses.options.length;a++){
					if(document.addit.courses.options[a].value==courses){
						document.addit.courses.options[a].selected=true;
					}
				}
			}
						// -->		
		</script>
	</head>
	<body bgcolor="<? echo $cBGcolor?>" onLoad="setfocus(<? echo $courses?>)">
		<form name="addit" action="add.php" method="post" onsubmit="return check();">
		
		<table cellpadding="0" cellspacing="0" bgcolor="<? echo $cBGMainInfo[0]?>" align="center" >
			<tr>
				<td>
		<table cellpadding="3" cellspacing="1" align="center" bgcolor="#e7eff7"  style='border-top: solid #99ccff 1px; border-bottom: solid #99ccff 1px; border-left: solid #99ccff 1px;border-right: solid #99ccff 1px;'>
          <tr bgcolor="#FFFFFF">
            <td colspan="2" class="main" align="center"><a class="main" href="#" onClick="self.close();"><img src="../images/stop_sign.gif" width="14" height="14" alt="" border="0">&nbsp;<b><? echo $strClose;?></b></a> 
            </td>
          </tr>
          <tr > 
            <td colspan="2" class="main" align="center"><?php echo  $strCalendar_LabAddNewAppTo;?><br>
			<b><?echo date("j F Y",$dt) ?></b></td>
          </tr>
          <?	//Get courses where user is admin
		if($person["admin"]==1){
			$checkAdmin = mysql_query("SELECT distinct c.id,c.name FROM courses c, wp WHERE c.active=1 AND wp.courses=c.id;");
		}else{
			$checkAdmin = mysql_query("SELECT distinct c.id,c.name FROM courses c, wp WHERE wp.users = ".$person["id"]." AND wp.admin=1 AND NOT wp.courses=0 AND wp.courses=c.id AND c.active=1;");
		}
		if(mysql_num_rows($checkAdmin)!=0){ ?>
          <tr> 
            <td  class="small"><?php echo  $strCalendar_LabAddNewAppTo;?></td>
            <td><select class="small" name="courses">
                <option value="0"><?php echo  $strCalendar_LabPerCal;?></option>
                <? 	
				while($course_row=mysql_fetch_array($checkAdmin)){
				?>
                <option value="<? echo $course_row["id"] ?>"><? echo $course_row["name"] ?></option>
                <? }
	 ?>
              </select></td>
          </tr>
          <? }else{?>
          <tr > 
            <td colspan="2" align="center" class="small"><b><?php echo  $strCalendar_LabPerCal;?></b></td>
          </tr>
          <? }?>
          <tr > 
            <td class="small"><?php echo  $strCalendar_LabStart;?>:</td>
            <td><select class="small" name="hr">
                <option value="00">00</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08" selected>08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
              </select> <select name="mnt" class="small">
                <option value="00">00</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
              </select> </td>
          </tr>
          <tr > 
            <td class="small"><?php echo  $strCalendar_LabLength;?>:</td>
            <td> <select name="length" class="small">
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
              </select> </td>
          </tr>
          <tr> 
            <td class="small"><?php echo  $strCalendar_LabTitle;?>:</td>
            <td><input type="Text" class="text" name="title" size="30" maxlength="18"></td>
          </tr>
          <tr> 
            <td valign="top" class="small"><?php echo  $strCalendar_LabDesc;?>:</td>
            <td><textarea name="appointment" cols="30" rows="5" wrap="PHYSICAL" class="textarea"></textarea></td>
          </tr>
          <tr > 
            <td valign="top" class="small">&nbsp;</td>
            <td><input type="Submit" class="small" value="<?php echo  $strSave;?>" name="subm"> 
              <input name="Reset" type="Reset" class="small" value="<?php echo  $strReset;?>"></td>
          </tr>
          <input type="Hidden" name="dt" value="<? echo $dt ?>">
          <input type="Hidden" name="insert" value="1">
        </table>
	</td>
		</tr>
		</table>
	</form>
	</body>
	</html>
<? }// End If ?>
