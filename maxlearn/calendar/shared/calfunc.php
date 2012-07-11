<?require("../../include/global_login.php");



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



function checkday($dt,$todaydate,$i,$startdate){
	//colours:
	$weekend = "#FFCCCC";
	$weekdays = "#ffffff";
	$today = "#FF9999";
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

					//does this mean 1 month ahead-back or start of next month-start of previous???

//					echo date("Y-m-d H:i:s",mktime(24,0,0,date("m",$d),date("d",$d),date("Y",$d)))."<br>";

//					echo date("Y-m-d H:i:s",mktime(0,0,0,date("m",$d),date("d",$d),date("Y",$d)));					

	$sql = "SELECT * FROM calendar WHERE users=".$person["id"]." AND time < ".mktime(24,0,0,date("m",$d),date("d",$d),date("Y",$d))." AND time > ".mktime(0,0,0,date("m",$d),date("d",$d),date("Y",$d))." AND courses = 0;";

	//echo $sql;

	$app = mysql_query($sql);

	while($row=mysql_fetch_array($app)){

		$title = $row["title"];

		$length = $row["length"];

		if($length==1){

			$ending = " hour";

		}else{

			$ending = " hours";

		}

		$s_length=substr((string)$length,0,3);

		

		?><br><a href="Javascript:ShowIt(<?echo $row["id"]?>)"><?echo date("H:i",$row["time"])?>&nbsp;<?echo $title ?></a>

		<?

		//if(instr(Request.ServerVariables("SCRIPT_NAME"),"WeekView.asp") then

		//	response.write "<br><table><tr><td align=""center"" class=""small"" width=""60"" height=""" & length * 10 & """ bgcolor=""" & head & """ valign=""top"">" & length & " " & ending & "</td></tr></table>"

		//	'response.write "index"

		//}

	}//end while

}//end function

	

	//Get coursesrelated appointments from db

function GetCourseApp($d,$c){

	global $person;

//	echo $c."<br>";

	$sql = "SELECT * FROM calendar WHERE courses =".$c." AND time < ".mktime(24,0,0,date("m",$d),date("d",$d),date("Y",$d))." AND time > ".mktime(0,0,0,date("m",$d),date("d",$d),date("Y",$d)).";";

//	echo $sql;

	$course_app = mysql_query($sql);

	while($row=mysql_fetch_array($course_app)){

		$title = $row["title"];

		$length = $row["length"];

		if($length==1){

			$ending = " hour";

		}else{

			$ending = " hours";

		}

//		$s_length=substr((string)$length,0,3);

?><br><a href="Javascript:ShowIt(<?echo $row["id"]?>)"><img src="../images/courses.gif" align="top" border="0"><font color="black"><?echo date("H:i",$row["time"])?>&nbsp;<?echo $title?></font></a><?//				<?echo $s_length.$ending?></td>

		

	<?}//end while

}//end function

?>

