<? require("../include/global_login.php");
require("../include/colors.php");

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
//********************************************
// 				SETUP:						'
//********************************************
	//size of grid
$width = 80;
$height = 80;

	//colours:
$border = "#000000";
$weekend = "#f5e6c0";
$head = "#9999cc";
$weekdays = "#CACFF4";
$today = "silver";
$out_of_month = "#dfdfdf";
//********************************************
//********************************************

$username=$person["firstname"]."&nbsp;".$person["surname"];

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
?>
<html>
<head>
	<title></title>
	<link rel="STYLESHEET" type="text/css" href="../css.php">
	<link rel="STYLESHEET" type="text/css" href="../main.css">
	<script type="text/javascript" language="JavaScript" src="cal.js"></script>
</head>
<body bgcolor="<?echo $cBGcolor?>" topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">
	
<table border="0" width="75%" cellspacing="1" cellpadding="4" align="CENTER" bgcolor="<? echo $border?>">
  <tr> 
    <td bgcolor="<? echo $cBGMainInfo[2]?>" colspan="3" align="center" class="h5"><strong><? echo $strCalendar_LabMonthAsList;?></strong></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFFF" colspan="3" align="center" class="h5"> <a href="tableview.php?dt=<?echo fixmonth($startdate,-1) ?>&courses=<?echo $courses?>"><img src="../images/previous.gif"  alt="Previous month" border="0"></a> 
      <strong>&nbsp; 
	  <? //echo date("F",$startdate) ?> 
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

	  &nbsp; <? echo date("Y",$startdate) ?></strong>&nbsp; 
      <a href="tableview.php?dt=<?echo fixmonth($startdate,1) ?>&courses=<?echo $courses?>"><img src="../images/cal_next.gif"  alt="Next month" border="0"></a> 
    </td>
  </tr>
  <tr>
    <td bgcolor="<? echo $cBGMainInfo[2]?>" colspan="3" align="center" class="main"><b><? echo $username ?></b></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFFF" colspan="3" align="center" class="main"><a href="index.php?dt=<?echo $dt?>&courses=<?echo $courses?>"><img src="../images/month_on.gif" alt="Month view" width="30" height="24" border="0"></a></td>
  </tr>
  <tr bgcolor="<?echo $cBGMainFunc?>"> 
    <td align="left" class="main"><?php echo $strCalendar_LabDate;?></td>
    <td align="left" class="main"><?php echo $strCalendar_LabTime;?></td>
    <td align="left" class="main"><?php echo $strCalendar_LabTitle;?></td>
  </tr>
  <?
	$stop=0;
	$rownum=0;
	if($courses==-1){
		$monpersonal=mysql_query("SELECT DISTINCT c.title,c.time,c.id,c.length,c.appointment FROM calendar c WHERE c.time>".$startcell." AND c.time<".(fixday($startcell,42))." AND c.users=".$person["id"]." AND c.courses=0 ORDER BY c.time asc;");
		$moncourses=mysql_query("SELECT DISTINCT c.title,c.time,c.id,c.length,c.appointment FROM wp,calendar c, courses cc WHERE c.time>".$startcell." AND c.time<".(fixday($startcell,42))." AND c.courses=wp.courses AND wp.users=".$person["id"]." AND c.courses=cc.id AND cc.active=1 AND NOT wp.courses=0 ORDER BY c.time asc;");
	} else {
		$moncourses=mysql_query("SELECT DISTINCT c.title,c.time,c.id,c.length,c.appointment FROM wp,calendar c, courses cc WHERE c.time>".$startcell." AND c.time<".(fixday($startcell,42))." AND c.courses=wp.courses AND wp.users=".$person["id"]." AND c.courses=cc.id AND c.courses = $courses AND cc.active=1 AND NOT wp.courses=0 ORDER BY c.time asc;");
	}
	$row=@mysql_fetch_array($moncourses);
	$row2=@mysql_fetch_array($monpersonal);
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
    <td class="main" valign="top"><?echo date("Y-m-d",$row2["time"])?></td>
    <td class="main"><?echo date("H:i",$row2["time"])?>-<?echo $s_total?></td>
    <td ><a href="Javascript:ShowIt(<?echo $row2["id"]?>);" class="aCals" 
		 title="Show detail of this appointment.
Appointment : <? echo $row2["appointment"];?>">
		 <?echo $row2["title"] ?></a></td>
  </tr>
  <?
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
    <td class="main" valign="top"><?echo date("Y-m-d",$row["time"])?></td>
    <td class="main"><?echo date("H:i",$row["time"])?>-<?echo $s_total?></td>
    <td > <a href="Javascript:ShowIt(<?echo $row["id"]?>);" class="aCals" title="Show detail of this appointment.
Appointment : <? echo $row["appointment"];?>"> <img src="../images/courses.gif" align="top" border="0"><?echo $row["title"] ?></a> 
    </td>
  </tr>
  <?	
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
<!--<p class="main" align="center"><a href="Javascript:history.go(-1);">Back</a></p>-->
</body>
</html>
