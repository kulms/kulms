<?php

if (count($checkbox) ==0) {

	echo "<script>alert('Please select item to delete record');location.href='?courses=$courses&page=$page';</script>";
	
	exit();
	}


for($i=0;$i<count($checkbox);$i++) { 
	$id = $checkbox[$i];
	$sql = "select id,htmlfile,picture from news_courses WHERE id=$id";
	$Query=MYSQL_QUERY($sql) OR DIE("Error: เกิดความผิดพลาด <br>$sql<br>\n");
	$Row=MYSQL_FETCH_ARRAY($Query);
			
	if(strlen($Row["picture"])>0) {
				
				if(file_exists($myModule_Path_ThumbnailPicture."/".$Row["picture"])) {
					unlink($myModule_Path_ThumbnailPicture."/".$Row["picture"]);
				}
			}			
			
			if(strlen($Row["htmlfile"])>0) {
				if(file_exists($myModule_Path_HTMLFiles."/".$Row["htmlfile"])) {
					unlink($myModule_Path_HTMLFiles."/".$Row["htmlfile"]);
				}
			}			
			
			 mysql_query("DELETE FROM news_courses WHERE id=$id");
			
		}

header("Location: ?courses=$courses&page=$page"); 

?>
