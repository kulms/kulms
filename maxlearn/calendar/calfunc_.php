<?
require("../include/global_login.php");
//*************************************** f u n c t i o n s ********************************
//
//	Functions to select correct values in drop-down lists
//
//***************************************************************************************
function check_select_hour($t){
	global $apptime;
	if(date("H",$apptime)==$t){
		echo " selected";
	}
}

function check_select_min($t){
	global $apptime;
	if(date("i",$apptime)==$t){
		echo " selected";
	}
}

function check_select_length($t){
	global $length;
	if($length==$t){
		echo " selected";
	}
}

function check_select_time($check){
	global $apptime;
	if(mktime(0,0,0,date("m",$apptime),date("d",$apptime),date("Y",$apptime))==$check){
		echo " selected";
	}
}

function checkday($dt,$todaydate,$i, $startdate){
	//colours:
	$weekend = "#FFCCCC";
	$weekdays = "#ffffff";
	$today = "#ffffcc";
	$out_of_month = "#CCCCCC";
	
	if((date("m",$dt)<date("m",$startdate)) ||((date("m",$dt)>date("m",$startdate)))){
		$bg=$out_of_month;
	}else{
		if($dt==$todaydate){
			$bg=$today;
		}else{
			if($i>5){
				$bg=$weekend;
			}else{
				$bg=$weekdays;
			}
		}
	}
	return $bg;
}

function CheckDayStyle($dt,$todaydate,$i, $startdate){
	//style:
	$weekend = "";
	$weekdays = "";
	$today = "border-top: solid #ff9933 2px ;border-bottom: solid #ff9933 2px ;border-left: solid #ff9933 2px ;border-right: solid #ff9933 2px ;";
	$out_of_month = "";
	
	if((date("m",$dt)<date("m",$startdate)) ||((date("m",$dt)>date("m",$startdate)))){
		$style=$out_of_month;
	}else{
		if($dt==$todaydate){
			$style=$today;
		}else{
			if($i>5){
				$style=$weekend;
			}else{
				$style=$weekdays;
			}
		}
	}
	return $style;
}

//***************************************************************************************
function fixday($s,$i){
	return $n = mktime(0,0,0,date("m",$s)  ,date("d",$s)+$i,date("Y",$s));
}

function fixmonth($s,$i){
	return $n = mktime(0,0,0,date("m",$s)+$i  ,date("d",$s) ,date("Y",$s));
}

function fixyear($s,$i){
	return $n = mktime(0,0,0,date("m",$s)  ,date("d",$s) ,date("Y",$s)+$i);
}

function check_select_course($check){
	global $courses;
	if($courses==$check){
		echo " selected";
	}
}

	//Get personal appointments from db
function GetApp($d){
	global $person;
	$sql = "SELECT * FROM calendar WHERE users=".$person["id"]." AND time < ".mktime(24,0,0,date("m",$d),date("d",$d),date("Y",$d))." AND time > ".mktime(0,0,0,date("m",$d),date("d",$d),date("Y",$d))." AND courses = 0;";
	$app = mysql_query($sql);
	while($row=mysql_fetch_array($app)){
		$title = $row["title"];
		$length = $row["length"];
		if($length==1){
			$ending = " hour";
		}else{
			$ending = " hours";
		}
		$s_length=substr((string)$length,0,3);?>
		<br><a href="Javascript:ShowIt(<? echo $row["id"]?>)"><? echo date("H:i",$row["time"])?>&nbsp;<? echo $title ?></a><?
	}//end while
}//end function
	
	//Get coursesrelated appointments from db
function GetCourseApp($d,$c){
	global $person;
	$sql = "SELECT * FROM calendar WHERE courses =".$c." AND time < ".mktime(24,0,0,date("m",$d),date("d",$d),date("Y",$d))." AND time > ".mktime(0,0,0,date("m",$d),date("d",$d),date("Y",$d)).";";
	$course_app = mysql_query($sql);
	while($row=mysql_fetch_array($course_app)){
		$title = $row["title"];
		$length = $row["length"];
		if($length==1){
			$ending = " hour";
		}else{
			$ending = " hours";
		}?>
	<br><a href="Javascript:ShowIt(<? echo $row["id"]?>)"><img src="../images/courses.gif" align="top" border="0"><font color="black"><? echo date("H:i",$row["time"])?>&nbsp;<? echo $title?></font></a>
	<? }//end while
}//end function?>

