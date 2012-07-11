<?
require("../include/global_login.php");
require("../include/colors.php");
require("calfunc.php");

$user=$person["firstname"]."&nbsp;".$person["surname"];
$week = strftime("%W",$dt);
//********************************************
// 				SETUP:						'
//********************************************
	//size of grid
$width = 100;
$height = 200;

	//colours:
$border = "#000000";
$weekend = "#FFCCCC";
$head = $cBGMainInfo[0];
$weekdays = "#ffffff";
$today = "#FF9999";
$out_of_month = "#CCCCCC";
//********************************************
//********************************************
$i=0;
if(strftime("%w",$dt)!=1){
	$wd_fday=(int)strftime("%w",$dt);//get daynumber for first day in week
	$dt=fixday($dt,-$wd_fday+1);
}

$newd=$dt;
$todaydate=mktime(0,0,0,date("m"),date("d"),date("Y"));

//get courses for user
if($person["admin"]==1){
	$getcourses=mysql_query("SELECT distinct c.id,c.name FROM courses c, wp WHERE c.active=1 AND wp.courses=c.id;");
}else{
	$getcourses=mysql_query("SELECT distinct c.id,c.name FROM courses c, wp WHERE wp.courses=c.id AND NOT wp.courses=0 AND wp.users=".$person["id"]." AND c.active=1;");
}
	
	//create an array with daynames - only because we want a space between every character...
$dayarray=array("M o n d a y ","T u e s d a y ","W e d n e s d a y ","T h u r s d a y ","F r i d a y ","S a t u r d a y ","S u n d a y ");
if($courses==-1){
	$moncourses=mysql_query("SELECT DISTINCT c.title,c.time,c.id,c.length,c.appointment FROM wp,calendar c WHERE c.time>".$dt." AND c.time<".(fixday($dt,7))." AND c.courses=wp.courses AND wp.users=".$person["id"]." AND NOT wp.courses=0 ORDER BY c.time asc;");
	$monpersonal=mysql_query("SELECT DISTINCT c.title,c.time,c.id,c.length,c.appointment FROM calendar c WHERE c.time>".$dt." AND c.time<".(fixday($dt,7))." AND c.users=".$person["id"]." AND c.courses=0 ORDER BY c.time asc;");
	$row=mysql_fetch_array($moncourses);
	$row2=mysql_fetch_array($monpersonal);
}else{
	if($courses==0){
		//personal calendar
		$monpersonal=mysql_query("SELECT DISTINCT c.title,c.time,c.id,c.length,c.appointment FROM calendar c WHERE c.time>".$dt." AND c.time<".(fixday($dt,7))." AND c.users=".$person["id"]." AND c.courses=0 ORDER BY c.time asc;");
		$row2=mysql_fetch_array($monpersonal);
	}else{
		//distinct course
		$moncourses=mysql_query("SELECT DISTINCT c.title,c.time,c.id,c.length,c.appointment FROM wp,calendar c WHERE c.time>".$dt." AND c.time<".(fixday($dt,7))." AND c.courses=wp.courses AND wp.users=".$person["id"]." AND wp.courses=$courses ORDER BY c.time asc;");
		$row=mysql_fetch_array($moncourses);
	}
}?>
<html>
<head>
	<title>Week View</title>
	<link rel="STYLESHEET" type="text/css" href="../css.php">
	<link rel="STYLESHEET" type="text/css" href="../main.css">
	<script type="text/javascript" language="JavaScript" src="cal.js"></script>
</head>
<body bgcolor="<?echo $cBGcolor?>">
<br>
<table border="0" cellspacing="1" cellpadding="0" align="CENTER"  width="95%" bgcolor="<? echo $border?>">
<tr>
	<td>
		<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1">
			<tr bgcolor="#FFFFFF">
			<td class="main" align="middle" colspan="3">
					<table width="100%" cellpadding="2" cellspacing="1" border="0" bgcolor="#FFFFFF">
              <tr bgcolor="#FFFFFF">
                <td width="22%" align="center" class="main"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td><div align="center"><a href="index.php?dt=<?echo $dt?>&courses=<?echo $courses?>" class="aCals"><img src="../images/month_on.gif" alt="Month view" width="30" height="24" border="0"></a></div></td>
                      <td><div align="center"><a href="WeekView.php?dt=<?echo $todaydate?>&courses=<?echo $courses?>" class="aCals"><img src="../images/week_on.gif" alt="This week" width="30" height="24" border="0"></a></div></td>
                    </tr>
                    <tr> 
                      <td><div align="center"><a href="index.php?dt=<?echo $dt?>&courses=<?echo $courses?>" class="aCals"><strong><?php echo $strCalendar_LabMonthView;?></strong></a></div></td>
                      <td><div align="center"><a href="WeekView.php?dt=<?echo $todaydate?>&courses=<?echo $courses?>" class="aCals"><strong><?php echo $strCalendar_LabThisWeek;?></strong></a></div></td>
                    </tr>
                  </table>
                </td>
                <td colspan="2" class="main" align="center"><b><?echo  $user ?> 
                  &nbsp; </td>
                <td width="28%" nowrap align="right" class="main"> <form action="WeekView.php" method="post" name="getcourse">
                    <?php echo $strCalendar_LabViewFrom;?>: &nbsp; 
                    <select class="main" name="courses" onChange="document.getcourse.submit();">
                      <option value="-1">All</option>
                      <option value="0"<?check_select_course(0)?>>Personal</option>
                      <?while($rows=mysql_fetch_array($getcourses)){?>
                      <option value="<?echo $rows["id"]?>"<?check_select_course($rows["id"])?>><?echo $rows["name"]?></option>
                      <?}?>
                    </select>
                    <input type="submit" class="main" value="Show">
                    <input type="hidden" name="dt" value="<?echo $dt?>">
                  </form></td>
              </tr>
            </table>
				</td>
			</tr>
			<tr bgcolor="<? echo $cBGMainInfo[2]?>">
				
          <td class="main" align="middle" colspan="3"><a href="WeekView.php?dt=<?echo fixday($dt,-7)?>&courses=<?echo $courses?>"> 
            <img src="../images/previous.gif" width=10 height=9 alt="Previous week" border="0"></a> 
            &nbsp;<b class="h5"><? echo $strCalendar_LabWeek;?><?echo $week ?>,<?echo date("Y",$dt) ?></b> &nbsp; 
            &nbsp; <a href="WeekView.php?dt=<?echo fixday($dt,7)?>&courses=<?echo $courses?>"><img src="../images/cal_next.gif" width=10 height=9 alt="Next week" border="0"></a></td>
			</tr>
			<tr>
			<?while($i<7){
				$newd=fixday($dt,$i++);
				if($i>5){?>
				<td nowrap width="<?echo $width ?>" height="<?echo $height/2 ?>" valign="top" class="small" bgcolor="<?echo checkday($newd,$todaydate,$i,$dt)?>"
				style="<? echo CheckDayStyle($newd,$todaydate,$i,$dt)?>">
				<div align="center" class="small">
              <table width="260" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><? echo $day_of_week[$i-1]?></td>
                  <td align="right"><a href="JavaScript: AddIt(<?echo $newd ?>,<?echo $courses?>)"><img src="../images/cal_plus.gif" width="11" height="13" border="0" alt="Add New Appointment."></a></td>
                </tr>
              </table>
              
            </div>
				<? }else{?>
				<td nowrap <? if($i==4 || $i==5){?> rowspan="2"<? }?> width="<?echo $width ?>" valign="top" height="<?echo $height ?>" class="small" bgcolor="<?echo checkday($newd,$todaydate,$i,$dt) ?>"
				style="<? echo CheckDayStyle($newd,$todaydate,$i,$dt)?>">
				<div align="center" class="small">
              <table width="260" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><?echo $day_of_week[$i-1]?></td>
				  <td align="right"><a href="JavaScript: AddIt(<?echo $newd ?>,<?echo $courses?>)"><img src="../images/cal_plus.gif" width="11" height="13" border="0" alt="Add New Appointment."></a></td>
                </tr>				
              </table>
              
            </div>
				<?}
				
				?><?echo date("j M",$newd)?><br><? 
				if($courses==-1){
					//personal
					while($row2["time"]<fixday($newd,1) && $row2){
						$length = $row2["length"];			
				
						if($length > 8){
							$s_total = "All day";
						}else{
							$s_total= date("H:i",mktime(date("H",$row2["time"]),date("i",$row2["time"])+$length*60,0,date("m",$row2["time"]),date("d",$row2["time"]),date("Y",$row2["time"])));
						}
						?>
					<br><? echo date("H:i",$row2["time"])?>-<? echo $s_total ?><br>
						<a href="Javascript:ShowIt(<?echo $row2["id"]?>)" class="aCals" title="Show detail of this appointment.
Appointment : <? echo $row2["appointment"];?>"><? echo htmlspecialchars($row2["title"]) ?></a>
						<?
						$row2=mysql_fetch_array($monpersonal);
					}
					//courses
					while($row["time"]<fixday($newd,1) && $row){
						$length = $row["length"];			
			
						if($length > 8){
							$s_total = "All day";
						}else{
							$s_total= date("H:i",mktime(date("H",$row["time"]),date("i",$row["time"])+$length*60,0,date("m",$row["time"]),date("d",$row["time"]),date("Y",$row["time"])));
						}
						?>
						<br><img src="../images/courses.gif" align="top" border="0"><font color="black"><? echo date("H:i",$row["time"])?>-<? echo $s_total ?></font><br>
						<a href="Javascript:ShowIt(<?echo $row["id"]?>)" class="aCals" title="Show detail of this appointment.
Appointment : <? echo $row["appointment"];?>"><?echo htmlspecialchars($row["title"])?></a>
						<?
						$row=mysql_fetch_array($moncourses);
					}
				}else{
					if($courses==0){
					//personal calendar - only
						while($row2["time"]<fixday($newd,1) && $row2){
							$length = $row2["length"];			
				
							if($length > 8){
								$s_total = "All day";
							}else{
								$s_total= date("H:i",mktime(date("H",$row2["time"]),date("i",$row2["time"])+$length*60,0,date("m",$row2["time"]),date("d",$row2["time"]),date("Y",$row2["time"])));
							}
							?>
							<br><? echo date("H:i",$row2["time"])?>-<? echo $s_total ?><br>
							<a href="Javascript:ShowIt(<?echo $row2["id"]?>)" class="aCals" title="Show detail of this appointment.
Appointment : <? echo $row2["appointment"];?>"><? echo htmlspecialchars($row2["title"]) ?></a>		
							<?
							$row2=mysql_fetch_array($monpersonal);
						}
					}//courses, single course
					else{
						while($row["time"]<fixday($newd,1) && $row){
							$length = $row["length"];			
				
							if($length > 8){
								$s_total = "All day";
							}else{
								$s_total= date("H:i",mktime(date("H",$row["time"]),date("i",$row["time"])+$length*60,0,date("m",$row["time"]),date("d",$row["time"]),date("Y",$row["time"])));
							}
							?>
							<br><img src="../images/courses.gif" align="top" border="0"><? echo date("H:i",$row["time"])?>-<? echo $s_total ?><br>
							<a href="Javascript:ShowIt(<?echo $row["id"]?>)" class="aCals" title="Show detail of this appointment.
Appointment : <? echo $row["appointment"];?>"><font color="black"><?echo htmlspecialchars($row["title"])?></font></a>			
							<?
							$row=mysql_fetch_array($moncourses);
						}
					}
				}
				?></td><?
				if($i==3 || $i==6){?>
					</tr>
					<tr>
				<?}
			}?>
			</tr>		
		</table>
	</td>
</tr>
</table>
</body>
</html>
