<?

## File Path ###########################################################
 // A relative path with home page ----------
$System_Path_Upload      = "files";
 // A html full path ----------
$System_FullPath             = "http://".$_SERVER['SERVER_NAME']."/maxlife";
//$System_FullPath_Upload      = "/vec/files/courses";

if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {

		$System_FullPath_Upload      = $realpath."/files/news_courses";

	
	}else {
	
		$System_FullPath_Upload      = "/".$path."/files/news_courses"; //for linux
	}






//$System_RelativePath             = "../..";
//$System_RelativePath_Upload      = "../../files/news_courses";
$System_RelativePath             = "..";
$System_RelativePath_Upload      = "../files/news_courses";


## Configuration Path ######################################
$myModule_FullPath_ThumbnailPicture = $System_FullPath_Upload."/".$courses."/thumbnail"; 
$myModule_FullPath_HTMLFiles        = $System_FullPath_Upload."/".$courses."/htmlfiles";  
$myModule_FullPath_ImageLibrary     = $System_FullPath_Upload."/".$courses."/library";  
// A relative path with this files.
$myModule_Path_ThumbnailPicture = $System_RelativePath_Upload."/".$courses."/thumbnail"; 
$myModule_Path_HTMLFiles        = $System_RelativePath_Upload."/".$courses."/htmlfiles";  
$myModule_Path_ImageLibrary     = $System_RelativePath_Upload."/".$courses."/library";  

?>