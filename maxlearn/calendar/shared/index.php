<?require("../../include/global_login.php");

require("../../include/colors.php");

if($courses==""){$courses=-1;}

$check=mysql_query("SELECT * FROM calendar_share WHERE shared_user=".$person["id"]." AND users=$users;");

if(mysql_num_rows($check)!=0){

	$write_permission=mysql_result($check,0,"write_permission");

	require("calfunc.php");

	//*************  C a l e n d a r  ************

	//

	//			index.php

	//********************************************

	//********************************************

	// 				SETUP:						'

	//********************************************

		//size of grid

	$width = 70;

	$height = 70;

	

		//colours:

	$border = $cBorder;

	$weekend = "#FFCCCC";

	$head = $cBGMainInfo[1];

	$weekdays = "#ffffff";

	$today = "#FF9999";

	$out_of_month = "#CCCCCC";

	//********************************************

	//********************************************

	$get_userinfo=mysql_query("SELECT firstname,surname FROM users WHERE id=$users");

	$username=mysql_result($get_userinfo,0,"firstname")."&nbsp;".mysql_result($get_userinfo,0,"surname");

	

	if($dt!=""){ //if incoming parameter - set startdate=1:st day of month

		$startdate =mktime(0,0,0,date("m",$dt),	1,	date("Y",$dt)); //ger startdatum för månaden

	}else{

		 $startdate =mktime(0,0,0,date("m")  ,1,date("Y")); // första denna månad

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

		$getcourses=mysql_query("SELECT distinct c.id,c.name FROM courses c, wp WHERE wp.courses=c.id AND NOT wp.courses=0 AND wp.users=".$users." AND c.active=1 ORDER BY c.name;");

	}

	?>

	<html>

	<head>

		<title>Calendar for <?echo $username?></title>

		<link rel="STYLESHEET" type="text/css" href="../../css.php">

		<script type="text/javascript" language="JavaScript" src="cal.js"></script>

	</head>

	<body bgcolor="#ffffff" onLoad="self.focus()">

	<!-- Outer table for bordercolour -->

	<table cellspacing="0" cellpadding="0" align="CENTER" bgcolor="<?echo $border?>" width="100%">

	<tr>

		<td>

			<table border="0" width="100%" cellspacing="1" cellpadding="2" align="CENTER">

			<tr>

				<td bgcolor="<?echo $cBGMainInfo[0]?>" colspan="8" align="center" class="main">

					<table cellpadding="2" cellspacing="1" width="100%" border="0" bgcolor="<?echo $cBGMainInfo[0]?>">

						<tr>

							<td class="main" align="left" width="100"><a href="#" onclick="self.close()"><img src="../../images/arrow.gif" alt="" border="0">&nbsp;<b>Close</b></a></td>

							<td class="main" align="center"><b><?echo $username ?></b></td>

							<td class="main" align="right" width="100">

							<form action="index.php" method="get" name="getcourse">

								View: &nbsp;<select style="font-family:Arial;font-size:8pt" name="courses" onChange="document.getcourse.submit();">

								<option value="-1">All</option>

								<option value="0"<?check_select_course(0)?>>Personal</option>

								<?while($row=mysql_fetch_array($getcourses)){?>

								<option value="<?echo $row["id"]?>"<?check_select_course($row["id"])?>><?echo $row["name"]?></option>

								<?}?>

								</select>

								<input type="hidden" name="dt" value="<?echo $dt?>">

								<input type="hidden" name="users" value="<?echo $users?>">

							</td>

						</tr>

					</table>

					</td>

			</tr></form>		

			<tr>

				<td align="center" colspan="8" bgcolor="<?echo $cBGMainFunc?>" class="main">

				<!-- Beginning of table for years and months -->

				<table width="100%" cellspacing="0">

				<tr>

					<td width="10">&nbsp;</td>

					<td>

						<a class="mainwhite" href="index.php?courses=<?echo $courses?>&users=<?echo $users?>"><img src="../../images/arrow.gif" alt="" border="0">&nbsp;<b class="mainwhite"><u>This&nbsp;month</u></b></a><br>

						<a class="mainwhite" href="tableview.php?dt=<?echo $dt?>&users=<?echo $users?>"><img src="../../images/arrow.gif" alt="" border="0">&nbsp;<b class="mainwhite"><u>Month&nbsp;as&nbsp;list</u></b></a>

					</td>

					<td align="left">

					<!-- Beginning of table containing years -->

						<table border="0">

							<tr>

								<td class="mainwhite" colspan="4"><b>Select year:</b></td>

							</tr>

							<tr>

								<td class="mainwhite"><a class="mainwhite" href="index.php?dt=<?echo mktime(0,0,0,1,	1,	date("Y",$startdate)-1) ?>&courses=<?echo $courses?>&users=<?echo $users?>"><b class="mainwhite"><u><?echo date("Y",fixyear($startdate ,-1)) ?></u></b></a></td>

								<td class="mainwhite"><a class="mainwhite" href="index.php?dt=<?echo mktime(0,0,0,1,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>&users=<?echo $users?>"><b class="mainwhite"><u><?echo date("Y",$startdate) ?></u></b></a></td>

								<td class="mainwhite"><a class="mainwhite" href="index.php?dt=<?echo mktime(0,0,0,1,	1,	date("Y",$startdate)+1) ?>&courses=<?echo $courses?>&users=<?echo $users?>"><b class="mainwhite"><u><?echo date("Y",fixyear($startdate ,1)) ?></u></b></a></td>

								<td class="mainwhite"><a class="mainwhite" href="index.php?dt=<?echo mktime(0,0,0,1,	1,	date("Y",$startdate)+2) ?>&courses=<?echo $courses?>&users=<?echo $users?>"><b class="mainwhite"><u><?echo date("Y",fixyear($startdate ,2)) ?></u></b></a></td>

							</tr>

						</table>

					<!-- End of years table  -->

					</td>

					<td align="right">

					<!-- Beginning of months table -->

					<table border="0" cellspacing="3" cellpadding="1"  bgcolor="<?echo $cBGMainFunc?>">

						<tr>

							<td colspan="12"><b class="mainwhite">Select month:</b></td>

						</tr>

						<tr><? $mcnt=1;?>

							<td class="mainwhite"><a class="mainwhite" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>&users=<?echo $users?>"><b class="mainwhite"><u>jan</u></b></a></td>

							<td class="mainwhite"><a class="mainwhite" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>&users=<?echo $users?>"><b class="mainwhite"><u>feb</u></b></a></td>

							<td class="mainwhite"><a class="mainwhite" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>&users=<?echo $users?>"><b class="mainwhite"><u>mar</u></b></a></td>

							<td class="mainwhite"><a class="mainwhite" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>&users=<?echo $users?>"><b class="mainwhite"><u>apr</u></b></a></td>

							<td class="mainwhite"><a class="mainwhite" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>&users=<?echo $users?>"><b class="mainwhite"><u>may</u></b></a></td>

							<td class="mainwhite"><a class="mainwhite" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>&users=<?echo $users?>"><b class="mainwhite"><u>jun</u></b></a></td>

							<td class="mainwhite"><a class="mainwhite" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>&users=<?echo $users?>"><b class="mainwhite"><u>jul</u></b></a></td>

							<td class="mainwhite"><a class="mainwhite" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>&users=<?echo $users?>"><b class="mainwhite"><u>aug</u></b></a></td>

							<td class="mainwhite"><a class="mainwhite" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>&users=<?echo $users?>"><b class="mainwhite"><u>sep</u></b></a></td>

							<td class="mainwhite"><a class="mainwhite" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>&users=<?echo $users?>"><b class="mainwhite"><u>oct</u></b></a></td>

							<td class="mainwhite"><a class="mainwhite" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>&users=<?echo $users?>"><b class="mainwhite"><u>nov</u></b></a></td>

							<td class="mainwhite"><a class="mainwhite" href="index.php?dt=<?echo mktime(0,0,0,$mcnt++,	1,	date("Y",$startdate)) ?>&courses=<?echo $courses?>&users=<?echo $users?>"><b class="mainwhite"><u>dec</u></b></a></td>

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

				<td colspan="8" align="center" bgcolor="<?echo $cBGMainInfo[0]?>" class="main">

				<!-- Beginning of table containing current month and navigation arrows -->

				<table border="0" width="100%">

					<tr bgcolor="<?echo $cBGMainInfo[0]?>">

						<td width="10%">&nbsp;</td>

						<td width="30%" class="main" bgcolor="<?echo $cBGMainInfo[0]?>">&nbsp;</td>

						<td class="main" bgcolor="<?echo $cBGMainInfo[0]?>" align="left"><a href="index.php?dt=<?echo fixmonth($startdate,-1) ?>&courses=<?echo $courses?>&users=<?echo $users?>"><font class="small"><img src="../../images/back.gif" width=16 height=16 alt="Previous month" border="0"></font></a> &nbsp; 

							<b><?echo date("F",$startdate) ?> &nbsp; <?echo date("Y",$startdate) ?></b> &nbsp; <a href="index.php?dt=<?echo fixmonth($startdate,1) ?>&courses=<?echo $courses?>&users=<?echo $users?>"><img src="../../images/next.gif" width=16 height=16 alt="Next month" border="0"></a>

						</td>

						<td width="10%" class="main" bgcolor="<?echo $cBGMainInfo[0]?>" align="center">&nbsp;</td>

						</td>

					</tr>

				</table>

				<!-- End of table containing current month and navigation arrows -->

				</td>

			</tr>

			<tr bgcolor="<?echo $head ?>">

				<td align="center" width="<?echo $width ?>" class="main"><b>Monday</b></td>

				<td align="center" width="<?echo $width ?>" class="main"><b>Tuesday</b></td>

				<td align="center" width="<?echo $width ?>" class="main"><b>Wednesday</b></td>

				<td align="center" width="<?echo $width ?>" class="main"><b>Thursday</b></td>

				<td align="center" width="<?echo $width ?>" class="main"><b>&nbsp;&nbsp;Friday&nbsp;&nbsp;</b></td>

				<td align="center" width="<?echo $width ?>" class="main"><b><font color="Maroon">Saturday</font></b></td>

				<td align="center" width="<?echo $width ?>" class="main"><b><font color="Maroon">Sunday</font></b></td>

				<td align="center" class="main"><b>W</b></td>

			</tr>

	<? 

		$daycount = 0; //count the days to get the rows/week right

		$i=0;

	

		$stop=0;

		if($courses==-1){

			if($person["admin"]==1){

				$moncourses=mysql_query("SELECT DISTINCT c.title,c.time,c.id FROM wp,calendar c, courses cc WHERE c.time>".$startcell." AND c.time<".(fixday($startcell,42))." AND NOT c.courses=0 AND c.courses=cc.id AND cc.active=1 ORDER BY c.time asc;");

			}else{

				$moncourses=mysql_query("SELECT DISTINCT c.title,c.time,c.id FROM wp,calendar c, courses cc WHERE c.time>".$startcell." AND c.time<".(fixday($startcell,42))." AND c.courses=wp.courses AND wp.users=".$users." AND c.courses=cc.id AND cc.active=1 AND NOT wp.courses=0 ORDER BY c.time asc;");

			}

			$monpersonal=mysql_query("SELECT DISTINCT c.title,c.time,c.id FROM calendar c WHERE c.time>".$startcell." AND c.time<".(fixday($startcell,42))." AND c.users=".$users." AND c.courses=0 ORDER BY c.time asc;");

			$row=mysql_fetch_array($moncourses);

			$row2=mysql_fetch_array($monpersonal);

		}else{

			if($courses==0){

				//personal calendar

				$monpersonal=mysql_query("SELECT DISTINCT c.title,c.time,c.id FROM calendar c WHERE c.time>".$startcell." AND c.time<".(fixday($startcell,42))." AND c.users=".$users." AND c.courses=0 ORDER BY c.time asc;");

				$row2=mysql_fetch_array($monpersonal);

			}else{

				//distinct course

				$moncourses=mysql_query("SELECT DISTINCT c.title,c.time,c.id FROM wp,calendar c WHERE c.time>".$startcell." AND c.time<".(fixday($startcell,42))." AND c.courses=wp.courses AND wp.users=".$users." AND wp.courses=$courses ORDER BY c.time asc;");

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

			?>

			<td bgcolor="<?echo $bgcolor ?>" width="<?echo $width ?>" height="<?echo $height ?>" class="small" valign="top"><?if($write_permission==1){?><a href="Javascript:AddIt(<?echo $t ?>,<?echo $courses?>,<?echo $users?>);"><?echo $d ?></a><?}else{?><?echo $d ?><?}?>

			<?

			if($courses=="-1"){

				//personal

				while($row2["time"]<fixday($t,1) && $row2){

					?>

				<br><a href="Javascript:ShowIt(<?echo $row2["id"]?>,<?echo $users?>)"><?echo date("H:i",$row2["time"])?>&nbsp;<?echo $row2["title"] ?></a>

					<?

					$row2=mysql_fetch_array($monpersonal);

				}

				//courses

				while($row["time"]<fixday($t,1) && $row){

					?>

					<br><a href="Javascript:ShowIt(<?echo $row["id"]?>,<?echo $users?>)"><img src="../../images/courses.gif" align="top" border="0"><font color="black"><?echo date("H:i",$row["time"])?>&nbsp;<?echo $row["title"]?></font></a>

					<?

					$row=mysql_fetch_array($moncourses);

				}

			}else{

				if($courses==0){

				//personal calendar - only

					while($row2["time"]<fixday($t,1) && $row2){

						?>

					<br><a href="Javascript:ShowIt(<?echo $row2["id"]?>,<?echo $users?>)"><?echo date("H:i",$row2["time"])?>&nbsp;<?echo $row2["title"] ?></a>

						<?

						$row2=mysql_fetch_array($monpersonal);

					}

				}//courses, single course

				else{

					while($row["time"]<fixday($t,1) && $row){

						?>

						<br><a href="Javascript:ShowIt(<?echo $row["id"]?>,<?echo $users?>)"><img src="../../images/courses.gif" align="top" border="0"><font color="black"><?echo date("H:i",$row["time"])?>&nbsp;<?echo $row["title"]?></font></a>

						<?

						$row=mysql_fetch_array($moncourses);

					}

				}

			}

			?></td><?

			//**************************************** e n d  d a y - c e l l *****************************************

			$daycount++;

			if($daycount==7){

				$week = strftime("%W",$t);

				$w2=fixday($t,-6);

			?>

				<td class="small" width="10" bgcolor="<?echo $head?>"><a href="WeekView.php?dt=<?echo $w2 ?>&courses=<?echo $courses?>&users=<?echo $users?>"><?echo $week ?></a></td>

			</tr>

			<?

				$daycount=0;

			}

			$i++;

			if(($daycount==0) && ($t>$nextmonth)){

				$stop=1;

			}

		}while($stop!=1);

	 ?>

	</table>

	</td>

	</tr>

	</table>

	</body>

	</html>

<?}else{?>

You don't have access to this calendar!

<?}?>

