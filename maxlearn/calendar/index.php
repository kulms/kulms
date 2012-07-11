<? 
session_start();
$session_id = session_id();

require("../include/global_login.php");
require("../include/online.php");
online_courses($session_id,$person["id"],$courses,time(),1); 

require("../include/colors.php");

if($courses=="")$courses=-1;

require("calfunc.php");


//*************  C a l e n d a r  ************

//

//			index.php

//********************************************

//********************************************

// 				SETUP:						'

//********************************************

	//size of grid

$width = 80;

$height = 80;

	//colours:

//$border = $cBorder;
$border = "#000000";
//#e7eff7

$weekend = "#FFCCCC";

$head = $cBGMainInfo[1];

//$weekdays = "#CAE1FF";
$weekdays = "#e7eff7";

//$today = "#FF9999";
$today = "#ffffcc";

$out_of_month = "#CCCCCC";

//********************************************

//********************************************

$username=$person["firstname"]."&nbsp;".$person["surname"];

if($dt!=""){ //if incoming parameter - set startdate=1:st day of month

	$startdate =mktime(0,0,0,date("m",$dt),	1,	date("Y",$dt)); //startdate for month

}else{

	$startdate =mktime(0,0,0,date("m")  ,1,date("Y")); // 1:st of current month

}

$wd_fday=(int)strftime("%w",$startdate);//get daynumber for first in month

if($wd_fday==0){

	$wd_fday=7;

}

	//$startcell = date (UNIX-time) for first day in week where month starts

$startcell=fixday($startdate,-$wd_fday+1);

//get courses for user

if($person["admin"]==1){

	$getcourses=mysql_query("SELECT distinct c.id,c.name FROM courses c, wp WHERE c.active=1 AND wp.courses=c.id ORDER BY c.name;");

}else{

	$getcourses=mysql_query("SELECT distinct c.id,c.name FROM courses c, wp WHERE wp.courses=c.id AND NOT wp.courses=0 AND wp.users=".$person["id"]." AND c.active=1 ORDER BY c.name;");

}

//get shared calendars

$shared=mysql_query("SELECT c.users,u.firstname,u.surname FROM calendar_share c, users u WHERE c.shared_user=".$person["id"]." AND u.id=c.users;");?>

<html>

<head>

	<title></title>

	<link rel="STYLESHEET" type="text/css" href="../css.php">
	<link rel="STYLESHEET" type="text/css" href="../main.css">

	<script type="text/javascript" language="JavaScript" src="cal.js"></script>

</head>

<body bgcolor="<? echo $cBGcolor?>" topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">

<!-- Outer table for bordercolor -->

<table cellspacing="0" cellpadding="0" align="CENTER" bgcolor="<? echo $border?>" width="100%">

<tr>

	<td>

		<table border="0" width="100%" cellspacing="1" cellpadding="2" align="CENTER">

		<tr>

			<td bgcolor="<? echo $cBGMainInfo[2]?>" colspan="8" align="center" class="main">

				<table cellpadding="2" cellspacing="1" align="left" width="100%" border="0" bgcolor="<? echo $cBGMainInfo[2]?>">

					<tr>

					<form name="shared_users">

					<? if(mysql_num_rows($shared)!=0){?>

						<td class="main" width="40" align="left" valign="top"><?php echo $strCalendar_LabShare;?>:<br>

								<select class="main" name="shared" onChange="Javascript:getCal(this.form.shared.options[this.form.shared.selectedIndex].value,<?echo $courses?>);"><option value=""><?php echo $strCalendar_LabSelectUser;?></option>

								<? while($share_row=mysql_fetch_array($shared)){?>

									<option value="<? echo $share_row["users"]?>"><? echo $share_row["firstname"]." ".$share_row["surname"]?></option>

								<? }?>

								</select>

						</td>						
						<? }?>
						</form>

						<td align="left" width="10%"><img src="../images/cal_next.gif" alt="" border="0">&nbsp;<a href="shared/users.php?courses=<? echo $courses?>" class="aCals"><b><?php echo $strCalendar_LabShare;?></b></a></td>

						
						<td class="main" width="60%" align="center"> <b><font size="3"><? echo $username ?></font></b> 
						</td>
						<form action="index.php" method="get" name="getcourse">

						<td class="bblue" align="right" valign="top" width="30%">

							<?php echo $strCalendar_LabViewFrom;?>:&nbsp;&nbsp;<select class="main" name="courses" onChange="document.getcourse.submit();">

							<option value="-1"><?php echo $strCalendar_LabViewFromAll;?></option>

							<option value="0" <? check_select_course(0)?>><?php echo $strCalendar_LabViewFromPersonal;?></option>

							<? while($row=mysql_fetch_array($getcourses)){?>

							<option value="<? echo $row["id"]?>"<?check_select_course($row["id"])?>><? echo $row["name"]?></option>

							<? }?>

							</select>

							<input type="hidden" name="dt" value="<? echo $dt?>">

						</td>
						</form>
					</tr>

				</table>

				</td>

		</tr>		

		<tr>

			<td align="center" colspan="8" bgcolor="<? echo $cBGMainFunc2?>" >

			<!-- Beginning of table for years and months -->

			<table width="100%" cellspacing="0">

			<tr>

				<td width="10">&nbsp;</td>

				<td>
				<table width="100%" border="0" cellspacing="4" cellpadding="1">
				  <tr>
					<td>
					<img src="../images/cal_next.gif" alt="" border="0">&nbsp;<a class="aCals" href="index.php?courses=<?echo $courses?>"><b ><?php echo $strCalendar_LabThisMonth;?></b></a> <br>
					</td>
				  </tr>
				  <tr>
					<td>
					<img src="../images/cal_next.gif" alt="" border="0">&nbsp;<a class="aCals" href="tableview.php?dt=<?echo $dt?>&courses=<? echo $courses;?>"><b ><?php echo $strCalendar_LabMonthAsList;?></b></a>
					</td>
				  </tr>
				</table>										

				</td>
				

				<td align="left">

				<!-- Beginning of table containing years -->

				<table cellpadding="1" cellspacing="4">

					<tr>

						<td class="bblack" colspan="4"><b><?php echo $strCalendar_LabSelectYear;?>:</b></td>

					</tr>

					<tr>

						<td ><a class="aCals" href="index.php?dt=<?echo mktime(0,0,0,1,	1,	date("Y",$startdate)-1) ?>&courses=<?echo $courses?>"><b ><?echo date("Y",fixyear($startdate ,-1)) ?></b></a></td>

						<td ><a class="aCals" href="index.php?dt=<?echo mktime(0,0,0,1,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>"><b ><?echo date("Y",$startdate) ?></b></a></td>

						<td ><a class="aCals" href="index.php?dt=<?echo mktime(0,0,0,1,	1,	date("Y",$startdate)+1) ?>&courses=<?echo $courses?>"><b ><?echo date("Y",fixyear($startdate ,1)) ?></b></a></td>

						<td ><a class="aCals" href="index.php?dt=<?echo mktime(0,0,0,1,	1,	date("Y",$startdate)+2) ?>&courses=<?echo $courses?>"><b ><?echo date("Y",fixyear($startdate ,2)) ?></b></a></td>

					</tr>

				</table>

				<!-- End of years table  -->

				</td>

				<td align="right">

				<!-- Beginning of months table -->

				<table border="0" cellspacing="4" cellpadding="1"  bgcolor="<?echo $cBGMainFunc2 ?>">

					<tr>

						<td colspan="12"><b class="bblack"><?php echo $strCalendar_LabSelectMonth;?>:</b></td>

					</tr>

					<tr><? $mcnt=1;?>

						<td ><a class="aCals" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>"><b ><?php echo $month[0];?></b></a></td>

						<td ><a class="aCals" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>"><b ><?php echo $month[1];?></b></a></td>

						<td ><a class="aCals" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>"><b ><?php echo $month[2];?></b></a></td>

						<td ><a class="aCals" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>"><b ><?php echo $month[3];?></b></a></td>

						<td ><a class="aCals" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>"><b ><?php echo $month[4];?></b></a></td>

						<td ><a class="aCals" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>"><b ><?php echo $month[5];?></b></a></td>

						<td ><a class="aCals" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>"><b ><?php echo $month[6];?></b></a></td>

						<td ><a class="aCals" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>"><b ><?php echo $month[7];?></b></a></td>

						<td ><a class="aCals" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>"><b ><?php echo $month[8];?></b></a></td>

						<td ><a class="aCals" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>"><b ><?php echo $month[9];?></b></a></td>

						<td ><a class="aCals" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>"><b ><?php echo $month[10];?></b></a></td>

						<td ><a class="aCals" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>"><b ><?php echo $month[11];?></b></a></td>

					</tr>

				</table>

				<!-- End of months table -->

				</td>

				<td width="10%">&nbsp;</td>				

			</tr>

			<!-- End of table for years and months -->

			</table>

			</td>

		</tr>

		<tr>

			<td colspan="8" align="center" bgcolor="<?echo $cBGMainInfo[2]?>" class="main">

			<!-- Beginning of table containing current month and navigation arrows -->

			<table border="0" width="100%" align="center" >

				<tr bgcolor="<? echo $cBGMainInfo[2]?>">

					<td width="10%">&nbsp;</td>

					
        <td class="main" bgcolor="<? echo $cBGMainInfo[2]?>" align="center"><a href="index.php?dt=<?echo fixmonth($startdate,-1) ?>&courses=<?echo $courses?>"><img src="../images/previous.gif"  alt="Previous month" border="0"></a>&nbsp; 
          <b><font size="3">
		  <? 
		  	$dateNo = date("n",$startdate);
			 
			switch ($dateNo) {					
					case 1:
						echo $fullmonth[0];
						break;
					case 2:
						echo $fullmonth[1];
						break;					
					case 3:
						echo $fullmonth[2];
						break;
					case 4:
						echo $fullmonth[3];
						break;
					case 5:
						echo $fullmonth[4];
						break;	
					case 6:
						echo $fullmonth[5];
						break;	
					case 7:
						echo $fullmonth[6];
						break;		
					case 8:
						echo $fullmonth[7];
						break;	
					case 9:
						echo $fullmonth[8];
						break;	
					case 10:
						echo $fullmonth[9];
						break;				
					case 11:
						echo $fullmonth[10];
						break;	
					case 12:
						echo $fullmonth[11];
						break;	
					}
		  ?> 
		  &nbsp; <? echo date("Y",$startdate) ?></font></b> 
          &nbsp; <a href="index.php?dt=<?echo fixmonth($startdate,1) ?>&courses=<?echo $courses?>"><img src="../images/cal_next.gif"  alt="Next month" border="0"></a> 
        </td>

					<td width="10%" class="main" bgcolor="<? echo $cBGMainInfo[2]?>" align="center">&nbsp;</td>

					</td>

				</tr>

			<!-- End of table containing current month and navigation arrows -->

			</table>

			</td>

		</tr>

		<tr bgcolor="<? echo $head ?>">

			<td align="center" width="<? echo $width ?>" class="main"><b><?php echo $day_of_week[1];?></b></td>

			<td align="center" width="<? echo $width ?>" class="main"><b><?php echo $day_of_week[2];?></b></td>

			<td align="center" width="<? echo $width ?>" class="main"><b><?php echo $day_of_week[3];?></b></td>

			<td align="center" width="<? echo $width ?>" class="main"><b><?php echo $day_of_week[4];?></b></td>

			<td align="center" width="<? echo $width ?>" class="main"><b><?php echo $day_of_week[5];?></b></td>

			<td align="center" width="<? echo $width ?>" class="main"><b><font color="Maroon"><?php echo $day_of_week[6];?></font></b></td>

			<td align="center" width="<? echo $width ?>" class="main"><b><font color="Maroon"><?php echo $day_of_week[0];?></font></b></td>

			<td align="center" class="main"><b>W</b></td>

		</tr>

<? $daycount = 0; //count the days to get the rows/week right

	$i=0;

	$stop=0;

	if($courses==-1){

		if($person["admin"]==1){

			$moncourses=mysql_query("SELECT DISTINCT c.title,c.time,c.id,c.length,c.appointment FROM wp,calendar c, courses cc WHERE c.time>".$startcell." AND c.time<".(fixday($startcell,42))." AND NOT c.courses=0 AND c.courses=cc.id AND cc.active=1 ORDER BY c.time asc;");

		}else{

			$moncourses=mysql_query("SELECT DISTINCT c.title,c.time,c.id,c.length,c.appointment  FROM wp,calendar c, courses cc WHERE c.time>".$startcell." AND c.time<".(fixday($startcell,42))." AND c.courses=wp.courses AND wp.users=".$person["id"]." AND c.courses=cc.id AND cc.active=1 AND NOT wp.courses=0 ORDER BY c.time asc;");

		}

		$monpersonal=mysql_query("SELECT DISTINCT c.title,c.time,c.id,c.length,c.appointment  FROM calendar c WHERE c.time>".$startcell." AND c.time<".(fixday($startcell,42))." AND c.users=".$person["id"]." AND c.courses=0 ORDER BY c.time asc;");

		$row=mysql_fetch_array($moncourses);

		$row2=mysql_fetch_array($monpersonal);

	}else{

		if($courses==0){

			//personal calendar

			$monpersonal=mysql_query("SELECT DISTINCT c.title,c.time,c.id,c.length,c.appointment FROM calendar c WHERE c.time>".$startcell." AND c.time<".(fixday($startcell,42))." AND c.users=".$person["id"]." AND c.courses=0 ORDER BY c.time asc;");

			$row2=mysql_fetch_array($monpersonal);

		}else{

			//distinct course

			$moncourses=mysql_query("SELECT DISTINCT c.title,c.time,c.id,c.length,c.appointment FROM wp,calendar c WHERE c.time>".$startcell." AND c.time<".(fixday($startcell,42))." AND c.courses=wp.courses AND wp.users=".$person["id"]." AND wp.courses=$courses ORDER BY c.time asc;");

			$row=mysql_fetch_array($moncourses);

		}

	}

	$nextmonth=fixmonth($startdate,1);

	do{

		$t=fixday($startcell,$i);

		$d=date("d",$t);

		$m=date("m",$t);

		$y=date("Y",$t);

		if($daycount==0){

			?><tr><?

		}

		$bgcolor=$weekdays;

		if(date("d-m-Y",$t)==date("d-m-Y",time())){

			$bgcolor=$today;

		}

		if($daycount>4){

			$bgcolor=$weekend;

		}

		if((date("m",$t)<date("m",$startdate)) ||((date("m",$t)>date("m",$startdate)))){

			$bgcolor=$out_of_month;

		}

		if(date("d-m-Y",$t)==date("d-m-Y",time())){

			$bgcolor=$today;

		}


		//**************************************** d a y - c e l l *****************************************

	?>	<td bgcolor="<? echo $bgcolor ?>" width="<?echo $width ?>" height="<?echo $height ?>" valign="top" 
	     <?
		 			if(date("d-m-Y",$t)==date("d-m-Y",time())){

					echo "style=\"border-top: solid #ff9933 2px ;border-bottom: solid #ff9933 2px ;border-left: solid #ff9933 2px ;border-right: solid #ff9933 2px ;\"";
	
					}

		 ?>
	    >
		
		<table width="112" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td align="left"><? echo $d ?></td>
			<td align="right">
				<a href="Javascript:AddIt(<?echo $t ?>,<?echo $courses?>);" class="aCal">
				<img src="../images/cal_plus.gif" border="0" alt="<?php echo $strCalendar_LabAddNewApp;?>">
				</a>
			</td>
		  </tr>
		</table>


	<?	if($courses=="-1"){

			//personal

			while($row2["time"]<fixday($t,1) && $row2){
			
			$length = $row2["length"];			
			
			if($length > 8){
				$s_total = "All day";
			}else{
				$s_total= date("H:i",mktime(date("H",$row2["time"]),date("i",$row2["time"])+$length*60,0,date("m",$row2["time"]),date("d",$row2["time"]),date("Y",$row2["time"])));
			}
	?>
			
			<br><font color="black"><? echo date("H:i",$row2["time"])?>-<? echo $s_total ?></font><br>
			<a href="Javascript:ShowIt(<? echo $row2["id"]?>)" class="aCals" title="<?php echo $strCalendar_LabShowDetailApp;?>
			
<?php echo $strCalendar_LabApp?> : <? echo $row2["appointment"];?>"><? echo htmlspecialchars($row2["title"]) ?></a>		

			<?	$row2=mysql_fetch_array($monpersonal);

			}

			//courses

			while($row["time"]<fixday($t,1) && $row){
			$length = $row["length"];			
			
			if($length > 8){
				$s_total = "All day";
			}else{
				$s_total= date("H:i",mktime(date("H",$row["time"]),date("i",$row["time"])+$length*60,0,date("m",$row["time"]),date("d",$row["time"]),date("Y",$row["time"])));
			}
			?>

				<br><img src="../images/courses.gif" align="top" border="0" ><font color="black"><? echo date("H:i",$row["time"])?>-<? echo $s_total ?><br>
				<a href="Javascript:ShowIt(<?echo $row["id"]?>)" class="aCals" title="<?php echo $strCalendar_LabShowDetailApp;?>
				
<?php echo $strCalendar_LabApp?> : <? echo $row["appointment"];?>"><?echo htmlspecialchars($row["title"])?></font></a>			

			<?	$row=mysql_fetch_array($moncourses);

			}

		}else{

			if($courses==0){

			//personal calendar - only

				while($row2["time"]<fixday($t,1) && $row2){
				$length = $row2["length"];			
			
				if($length > 8){
					$s_total = "All day";
				}else{
					$s_total= date("H:i",mktime(date("H",$row2["time"]),date("i",$row2["time"])+$length*60,0,date("m",$row2["time"]),date("d",$row2["time"]),date("Y",$row2["time"])));
				}
				?>

				<br><font color="black"><? echo date("H:i",$row2["time"])?>-<? echo $s_total ?></font><br>
				<a href="Javascript:ShowIt(<? echo $row2["id"]?>)" class="aCals" title="<?php echo $strCalendar_LabShowDetailApp;?>
				
<?php echo $strCalendar_LabApp?> : <? echo $row2["appointment"];?>"><? echo htmlspecialchars($row2["title"]) ?></a>		

				<?	$row2=mysql_fetch_array($monpersonal);

				}

			}//courses, single course

			else{

				while($row["time"]<fixday($t,1) && $row){
				$length = $row["length"];			
			
				if($length > 8){
					$s_total = "All day";
				}else{
					$s_total= date("H:i",mktime(date("H",$row["time"]),date("i",$row["time"])+$length*60,0,date("m",$row["time"]),date("d",$row["time"]),date("Y",$row["time"])));
				}
				?>

					<br><img src="../images/courses.gif" align="top" border="0" ><font color="black"><? echo date("H:i",$row["time"])?>-<? echo $s_total ?><br>
				<a href="Javascript:ShowIt(<?echo $row["id"]?>)" class="aCals" title="<?php echo $strCalendar_LabShowDetailApp;?>
				
<?php echo $strCalendar_LabApp?> : <? echo $row["appointment"];?>"><?echo htmlspecialchars($row["title"])?></font></a>						

				<?	$row=mysql_fetch_array($moncourses);

				}

			}

		}?>

		</td>

	<?	//**************************************** e n d  d a y - c e l l *****************************************

		$daycount++;

		if($daycount==7){

			$week = strftime("%W",$t);

			$w2=fixday($t,-6);?>

			<td class="main" width="2" align="center" bgcolor="<?echo $head?>">
			<a href="WeekView.php?dt=<?echo $w2 ?>&courses=<?echo $courses?>&sd=<?echo $startdate?>" class="aCals"><?echo $week ?></a></td>

		</tr>

		<? $daycount=0;

		}

		$i++;

		if(($daycount==0) && ($t>$nextmonth)){

			$stop=1;

		}

	}while($stop!=1);?>

</table>

</td>

</tr>

</table>

</body>

</html>