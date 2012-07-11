<?require("../../include/global_login.php");
require("../../include/colors.php");
require("calfunc.php");

$check=mysql_query("SELECT * FROM calendar_share WHERE shared_user=".$person["id"]." AND users=$users;");
if(mysql_num_rows($check)!=0){
	$write_permission=mysql_result($check,0,"write_permission");
	$get_userinfo=mysql_query("SELECT firstname,surname FROM users WHERE id=$users");
	$user=mysql_result($get_userinfo,0,"firstname")."&nbsp;".mysql_result($get_userinfo,0,"surname");

	$week = strftime("%W",$dt);
//********************************************
// 				SETUP:						'
//********************************************
	//size of grid
$width = 100;
$height = 200;

	//colours:
$border = $cBorder;
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
		$getcourses=mysql_query("SELECT distinct c.id,c.name FROM courses c, wp WHERE wp.courses=c.id AND NOT wp.courses=0 AND wp.users=".$users." AND c.active=1;");
	}
		
		//create an array with daynames - only because we want a space between every caracter...
	$dayarray=array("M o n d a y ","T u e s d a y ","W e d n e s d a y ","T h u r s d a y ","F r i d a y ","S a t u r d a y ","S u n d a y ");
	if($courses==-1){
		$moncourses=mysql_query("SELECT DISTINCT c.title,c.time,c.id FROM wp,calendar c WHERE c.time>".$dt." AND c.time<".(fixday($dt,7))." AND c.courses=wp.courses AND wp.users=".$users." AND NOT wp.courses=0 ORDER BY c.time asc;");
		$monpersonal=mysql_query("SELECT DISTINCT c.title,c.time,c.id FROM calendar c WHERE c.time>".$dt." AND c.time<".(fixday($dt,7))." AND c.users=".$users." AND c.courses=0 ORDER BY c.time asc;");
		$row=mysql_fetch_array($moncourses);
		$row2=mysql_fetch_array($monpersonal);
	}else{
		if($courses==0){
			//personal calendar
			$monpersonal=mysql_query("SELECT DISTINCT c.title,c.time,c.id FROM calendar c WHERE c.time>".$dt." AND c.time<".(fixday($dt,7))." AND c.users=".$users." AND c.courses=0 ORDER BY c.time asc;");
			$row2=mysql_fetch_array($monpersonal);
		}else{
			//distinct course
			$moncourses=mysql_query("SELECT DISTINCT c.title,c.time,c.id FROM wp,calendar c WHERE c.time>".$dt." AND c.time<".(fixday($dt,7))." AND c.courses=wp.courses AND wp.users=".$users." AND wp.courses=$courses ORDER BY c.time asc;");
			$row=mysql_fetch_array($moncourses);
		}
	}?>
	<html>
	<head>
		<title>Week View</title>
		<link rel="STYLESHEET" type="text/css" href="../../css.php">
		<script type="text/javascript" language="JavaScript" src="cal.js"></script>
	</head>
	<body bgcolor="<?echo $cBGcolor?>" topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">
	<p>&nbsp;</p>
	<table border="0" cellspacing="1" cellpadding="0" align="CENTER" bgcolor="#000000" width="95%">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1">
				<tr bgcolor="<?echo $head ?>">
				<td class="main" align="middle" colspan="3">
						<table width="100%" cellpadding="2" cellspacing="1" border="0">
							<tr bgcolor="<?echo $head ?>">
								<td width="100" align="center" class="main"><a href="#" onclick="self.close()"><img src="../../images/arrow.gif" alt="" border="0">&nbsp;<b>Close</b></a></td>
								<td colspan="2" class="main" align="center"><b><?echo  $user ?> &nbsp; <b>Week <?echo $week ?>,<?echo date("Y",$dt) ?></b></td>
								<td width="10%" nowrap align="right" class="main" width="100">
									<form action="WeekView.php" method="post" name="getcourse">
										View: &nbsp;<select class="small" name="courses" onChange="document.getcourse.submit();">
										<option value="-1">All</option>
										<option value="0"<?check_select_course(0)?>>Personal</option>
										<?while($rows=mysql_fetch_array($getcourses)){?>
								<option value="<?echo $rows["id"]?>"<?check_select_course($rows["id"])?>><?echo $rows["name"]?></option>
										<?}?>
										</select>
										<input type="hidden" name="dt" value="<?echo $dt?>">
										<input type="hidden" name="users" value="<?echo $users?>">
								</td>
							</tr></form>
						</table>
					</td>
				</tr>
				<tr bgcolor="<?echo $head ?>">
					<td class="main" align="middle" colspan="3"><a href="WeekView.php?dt=<?echo fixday($dt,-7)?>&courses=<?echo $courses?>&users=<?echo $users?>"><img src="../../images/back.gif" width=16 height=15 alt="Previous week" border="0"></a> &nbsp; <a href="index.php?dt=<?echo $dt?>&courses=<?echo $courses?>&users=<?echo $users?>"><img src="../../images/calendar.gif" border="0" alt="Month view"></a> &nbsp; <a href="WeekView.php?dt=<?echo $todaydate?>&courses=<?echo $courses?>&users=<?echo $users?>"><img src="../../images/thisw.gif" border="0" alt="This week"></a>&nbsp; <a href="WeekView.php?dt=<?echo fixday($dt,7)?>&courses=<?echo $courses?>&users=<?echo $users?>"><img src="../../images/next.gif" width=16 height=15 alt="Next week" border="0"></a></td>
				</tr>
				<tr>
				<?while($i<7){
					$newd=fixday($dt,$i++);
					if($i>5){?>
					<td width="<?echo $width ?>" height="<?echo $height/2 ?>" valign="top" class="small" bgcolor="<?echo checkday($newd,$todaydate,$i,$dt)?>"><div align="center" class="small"><?echo $dayarray[$i-1]?></div>			
					<?}else{?>
					<td <?if($i==4 || $i==5){?> rowspan="2"<?}?> width="<?echo $width ?>" valign="top" height="<?echo $height ?>" class="small" bgcolor="<?echo checkday($newd,$todaydate,$i,$dt) ?>"><div align="center" class="small"><?echo $dayarray[$i-1]?></div>
					<?}
					if($write_permission==1){?><a href="JavaScript: AddIt(<?echo $newd ?>,<?echo $courses?>)"><?}?><?echo date("m-d",$newd)?><?if($write_permission==1){?></a><?}?><br><? 
					if($courses==-1){
						//personal
						while($row2["time"]<fixday($newd,1) && $row2){?>
						<br><a href="Javascript:ShowIt(<?echo $row2["id"]?>,<?echo $users?>)"><?echo date("H:i",$row2["time"])?>&nbsp;<?echo htmlspecialchars($row2["title"]) ?></a><?
							$row2=mysql_fetch_array($monpersonal);
						}
						//courses
						while($row["time"]<fixday($newd,1) && $row){?>
							<br><a href="Javascript:ShowIt(<?echo $row["id"]?>,<?echo $users?>)"><img src="../../images/courses.gif" align="top" border="0"><font color="black"><?echo date("H:i",$row["time"])?>&nbsp;<?echo htmlspecialchars($row["title"])?></font></a><?
							$row=mysql_fetch_array($moncourses);
						}
					}else{
						if($courses==0){
						//personal calendar - only
							while($row2["time"]<fixday($newd,1) && $row2){
								?>
								<br><a href="Javascript:ShowIt(<?echo $row2["id"]?>,<?echo $users?>)"><?echo date("H:i",$row2["time"])?>&nbsp;<?echo htmlspecialchars($row2["title"]) ?></a>		
								<?
								$row2=mysql_fetch_array($monpersonal);
							}
						}//courses, single course
						else{
							while($row["time"]<fixday($newd,1) && $row){
								?>
								<br><a href="Javascript:ShowIt(<?echo $row["id"]?>,<?echo $users?>)"><img src="../../images/courses.gif" align="top" border="0"><font color="black"><?echo date("H:i",$row["time"])?>&nbsp;<?echo htmlspecialchars($row["title"])?></font></a>			
								<?
								$row=mysql_fetch_array($moncourses);
							}
						}
					}?></td><?
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
<?}else{?>
	You don't have access to this calendar!
<?}?>
