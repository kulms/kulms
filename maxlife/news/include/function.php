<?
function ShowDateLong($myDate) {
		$myDateArray=explode("-",$myDate);
		$myDay = sprintf("%d",$myDateArray[2]);
		switch($myDateArray[1]) {
			case "01" : $myMonth = "���Ҥ�";  break;
			case "02" : $myMonth = "����Ҿѹ��";  break;
			case "03" : $myMonth = "�չҤ�"; break;
			case "04" : $myMonth = "����¹"; break;
			case "05" : $myMonth = "����Ҥ�";   break;
			case "06" : $myMonth = "�Զع�¹";  break;
			case "07" : $myMonth = "�á�Ҥ�";   break;
			case "08" : $myMonth = "�ԧ�Ҥ�";  break;
			case "09" : $myMonth = "�ѹ��¹";  break;
			case "10" : $myMonth = "���Ҥ�";  break;
			case "11" : $myMonth = "��Ȩԡ�¹";   break;
			case "12" : $myMonth = "�ѹ�Ҥ�";  break;
		}
		$myYear = sprintf("%d",$myDateArray[0])+543;
        return($myDay . " " . $myMonth . " " . $myYear);
}

function make_seed() { 
	list($usec, $sec) = explode(' ', microtime()); 
	return (float) $sec + ((float) $usec * 100000); 
}

Function printpagelink() { 
	Global $page, $total_page; 
	Global $courses;
	$target_url = "?a=news"; 
	$next_page = $page+1; 
	$previous_page = $page - 1; 
	if (!$search==""){
                //$pagelink = "<a href=\"".$target_url."?cid=".$cid."&search=".$search."&page="; 
	}
            else {
              $pagelink = "<a   href=\"".$target_url."&courses=".$courses."&page="; 
             }         
            //Print previous_page link 
	If ( $previous_page >= 1 ) { 
		print ($pagelink.$previous_page."\"><img src=\"images/icon/backward.gif\" border=\"0\" align=\"absmiddle\">   </a> "); 
	} 
	//Print out page list 
	For ($i =1 ; $i <= $total_page; $i++){ 
		If ( $i == 1 ) { 
			If ( $i == $page ) { 
				print ( " Page ".$i ); 
			} else { 
				print ($pagelink.$i."\">".$i."</a>"); 
			} 
		} else { 
			If ( $i == $page ) { 
				print ( " | Page ".$i ); 
			} else { 
				print (" | ".$pagelink.$i."\">".$i."</a>"); 
			} 
		} 
	} 
	//Print out next_page 
	If ( $next_page <= $total_page ) { 
		print ($pagelink.$next_page."\"> <img src=\"images/icon/forward.gif\" border=\"0\" align=\"absmiddle\"> </a>"); 
	} 
} //End printpagelink func

?>
