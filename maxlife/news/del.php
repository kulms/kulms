<?php

	if (isset($id)) {
			
			$sql = "select id,htmlfile,picture from news_courses WHERE id=$id";
			$Query=MYSQL_QUERY($sql) OR DIE("Error: เกิดความผิดพลาด <br>$sql<br>\n");
			$Row=MYSQL_FETCH_ARRAY($Query);
			
		if($action=="delpic") {
			
			if(strlen($Row["picture"])>0) {
				
				if(file_exists($myModule_Path_ThumbnailPicture."/".$Row["picture"])) {
					unlink($myModule_Path_ThumbnailPicture."/".$Row["picture"]);
				}
			
				mysql_query("UPDATE news_courses SET picture ='' where id =$id");

			
			}			
			
		
		
		} // End case del thumbnail
		
		else {
			
			
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
		
		
		}	// end check id
			header("Location: ?courses=$courses&page=$page"); 		  	
?>