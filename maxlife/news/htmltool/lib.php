<?

function formatImageSize($mySize) {
	if($mySize>1024*1024) {
		return sprintf("%1.2f",$mySize/(1024*1024)) . "M";
	} else {
		return sprintf("%1.2f",$mySize/1024) . "k";
	}
}

function removeEndSlash($myURL) {
	if($myURL[strlen($myURL)-1]=="/") {
		return substr($myURL,0,strlen($myURL)-1);
	} else {
		return $myURL;
	}
}

function removeEndURL($myURL) {
	$myURLArray = explode("/",$myURL);
	$myURL  = $myURLArray[0];
	for($i=1;$i<count($myURLArray)-1;$i++) {
		$myURL =  $myURL . "/" . $myURLArray[$i];
	}
	return $myURL;
}

function getFileOrFolderName($myURL) {
	$myURLArray = explode("/",$myURL);
	return $myURLArray[count($myURLArray)-1];
}

function getFileOrFolderNameUpload($myURL) {
	$myURLArray = explode("\\",$myURL);
	return $myURLArray[count($myURLArray)-1];
}

?>