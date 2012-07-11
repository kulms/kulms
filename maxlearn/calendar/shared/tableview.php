<?require("../../include/global_login.php");
require("../../include/colors.php");


//*************  C a l e n d a r  ************

//

//			tableview.php

//********************************************

function fixday($s,$i){

	return $n = mktime(0,0,0,date("m",$s)  ,date("d",$s)+$i,date("Y",$s));

}



function fixmonth($s,$i){

	return $n = mktime(0,0,0,date("m",$s)+$i  ,date("d",$s) ,date("Y",$s));

}



$get_userinfo=mysql_query("SELECT firstname,surname FROM users WHERE id=$users");

$username=mysql_result($get_userinfo,0,"firstname")."&nbsp;".mysql_result($get_userinfo,0,"surname");



//********************************************

// 				SETUP:						'

//********************************************
	//size of grid
$width = 70;
$height = 70;

	//colours:
	$border = $cBorder;
	$weekend = "#FFCCCC";
	$head = $cBGMainFunc;
	$weekdays = "#ffffff";
	$today = "#FF9999";
	$out_of_month = "#CCCCCC";
//********************************************
//********************************************

if($dt!=""){ //if incoming parameter - set startdate=1:st day of month
	$startdate =mktime(0,0,0,date("m",$dt),	1,	date("Y",$dt)); //ger startdatum för månaden
}else{
	 $startdate =mktime(0,0,0,date("m")  ,1,date("Y")); // första denna månad
}

$wd_fday=(int)strftime("%w",$startdate);//get daynumber for first in month
if($wd_fday==0){
	$wd_fday=7;
}
$startcell=fixday($startdate,-$wd_fday+1);?>
<html>
<head>
	<title>Month as list</title>
	<link rel="STYLESHEET" type="text/css" href="../../css.php">
	<script type="text/javascript" language="JavaScript" src="cal.js"></script>
</head>
<body bgcolor="<?echo $cBGcolor?>" topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">
	<table border="0" width="75%" cellspacing="1" cellpadding="4" align="CENTER">
		<tr>
			<td bgcolor="<?echo $head ?>" colspan="3" align="center" class="main">
				<table cellpadding="2" cellspacing="1" border="0" bgcolor="<?echo $head?>">
					<tr>
						<td class="mainwhite"><b>Calendar for <?echo $username ?></b></td>
						<td class="menu">&nbsp;</td>
					</tr>
				</table>
				</td>
		</tr></form>		
		<tr bgcolor="<?echo $head ?>">
			<td align="left" class="mainwhite"><b>Date</b></td>
			<td align="left" class="mainwhite"><b>Time</b></td>
			<td align="left" class="mainwhite"><b>Title</b></td>
		</tr><?
	$stop=0;
	$rownum=0;
	$monpersonal=mysql_query("SELECT DISTINCT c.title,c.time,c.id,c.length FROM calendar c WHERE c.time>".$startcell." AND c.time<".(fixday($startcell,42))." AND c.users=".$users." AND c.courses=0 ORDER BY c.time asc;");
	$moncourses=mysql_query("SELECT DISTINCT c.title,c.time,c.id,c.length FROM wp,calendar c, courses cc WHERE c.time>".$startcell." AND c.time<".(fixday($startcell,42))." AND c.courses=wp.courses AND wp.users=".$users." AND c.courses=cc.id AND cc.active=1 AND NOT wp.courses=0 ORDER BY c.time asc;");
	$row=mysql_fetch_array($moncourses);
	$row2=mysql_fetch_array($monpersonal);
	$nextmonth=fixmonth($startdate,1);
	do{
		$t=fixday($startcell,$i);
		$d=date("d",$t);
		$m=date("m",$t);
		$y=date("Y",$t);
			//personal
 		while($row2["time"]<fixday($t,1) && $row2){
 		$apptime=$row2["time"];
 		$length=$row2["length"];
		if($length==9){
			$s_total="All day";
		}else{
			$s_total= date("H:i",mktime(date("H",$apptime),date("i",$apptime)+$length*60,0,date("m",$apptime),date("d",$apptime),date("Y",$apptime)));
		}?>
		<tr bgcolor="<?echo $cBGMulti[$col++%"2"]?>">
			<td class="menu" valign="top"><?echo date("Y-m-d",$row2["time"])?></td>		
			<td class="menu"><?echo date("H:i",$row2["time"])?>-<?echo $s_total?></td>
			<td class="menu"><a href="Javascript:ShowIt(<?echo $row2["id"]?>,<?echo $users?>);"><?echo $row2["title"] ?></a></td>		
		</tr><?
			$row2=mysql_fetch_array($monpersonal);
		}
		while($row["time"]<fixday($t,1) && $row){
		$apptime=$row["time"];
 		$length2=$row["length"];
		if($length2==9){
			$s_total="All day";
		}else{
			$s_total= date("H:i",mktime(date("H",$apptime),date("i",$apptime)+$length2*60,0,date("m",$apptime),date("d",$apptime),date("Y",$apptime)));
		}?>
		<tr bgcolor="<?echo $cBGMulti[$col++%"2"]?>">
			<td class="menu" valign="top"><?echo date("Y-m-d",$row["time"])?></td>		
			<td class="menu"><?echo date("H:i",$row["time"])?>-<?echo $s_total?></td>
			<td class="menu"><a href="Javascript:ShowIt(<?echo $row["id"]?>,<?echo $users?>);"><img src="../../images/courses.gif" align="top" border="0"><?echo $row["title"] ?></a></td>		
		</tr><?
			$row=mysql_fetch_array($moncourses);
		}
		$daycount++;
		if($daycount==7){
			$week = strftime("%W",$t);
			$w2=fixday($t,-6);
			$daycount=0;
		}
		$i++;
		if(($daycount==0) && ($t>$nextmonth)){
			$stop=1;
		}
	}while($stop!=1);
 ?>
</table>
<p class="main" align="center"><a href="Javascript:history.go(-1);">Back</a></p>
</body>
</html>