
<html>
<title>
</title>
<head>

<link href="../../themes/<? echo $theme;?>/style/main.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">

<script language="JavaScript" type="text/JavaScript">
function iconfirm(in_url,msg)
		{
				if( confirm(msg) )
					{   
						document.location =in_url; 
					 }
		}

</script>
</head>
<body>

<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="tdborder1">
	  <tr> 
		<td colspan="5" align="left"><img src="images/bt0_0.gif" style="cursor:hand " onClick="location.href='?a=news_addedit&courses=<? echo $courses;?>'">
		  </td>
	  </tr>
	  <tr align="center" class="boxcolor"> 
		<td width="7%" class="main_white" ><?=$strCourses_NewsNo;?></td>
		<td width="16%"  class="main_white"><?=$strCourses_NewsPicture;?></td>
		<td width="50%"  class="main_white"><?=$strCourses_NewsSubject;?></td>
		
		<td width="18%" class="main_white"><?=$strCourses_NewsLimit;?></td>
		
		<td width="9%"   class="main_white">Action</td>
	  </tr>
	<?
														
	
	$news=mysql_query("SELECT  nc.subject,nc.title,nc.id , nc.picture,nc.expired_date, nc.post_date FROM news_courses nc  WHERE  nc.courses=$courses 	ORDER BY nc.id DESC;");													
	
	if (mysql_num_rows($news) ==0){
		echo "<tr bgcolor=\"#FFFFFF\">" ;
		echo "<td colspan=\"5\" align=\"center\" class=\"news\"><b>".$strCourses_NewsNotfound."</b></td>";
		echo "</tr>";
		exit();
		}
	$i=1;
	while ($row = mysql_fetch_array($news)) { 
	
	?>
	
	
	  <tr <? if($row["expired_date"] > date("Y-m-d")) echo "bgcolor=\"#FFFFFF\""; else  echo "bgcolor=\"#F7F7F7\""; ?>> 
		
		<td align="center"><? echo $i;?></td>
		<td align="center" class="news">
			 <? if($row["picture"]!="") {
			
			echo "<table border=\"0\"><tr><td>";
			echo "<a class=\"AS\"  href=\"?a=view&id=".$row["id"]."&courses=$courses\"><img src=\"$myModule_Path_ThumbnailPicture/".$row["picture"]."\" width=\"80\" height=\"80\" border=\"0\"></a><br>";
			echo "</td></tr><tr><td align=\"center\">";
			?>
			<a href="#" onclick = "iconfirm('?a=del&id=<? echo $row["id"]; ?>&courses=<? echo $courses?>&action=delpic','Do you want delete picture?')">
			<?=$strCourses_NewsDelpic;?></a>
			<?
			echo "</td></tr></table>";
			}
			else {
			
			echo "<img src=\"images/no_picture.jpg\"  border=\"0\">";
			}
			
			?>
		</td>
	   <td align="left" valign="top">
			<? 
		
				echo "<a class=\"AS\"  href=\"?a=view&id=".$row["id"]."&courses=$courses\">".$row["subject"]."</a><br>"; 
                               
						  if(strlen($row["title"])>100) {
						  	echo substr($row["title"],0,100)."...";
						  }  else {
						  	echo $row["title"];
						  }
						
				
			?>
		</td>
		<td align="center">
			<? 
			//echo $row["g_max_score"];
			
			
			?>
		<table border="0" cellspacing="0" cellpadding="0">
                                    
									<tr> 
                                      <td><?
									  echo "<font color=\"#000099\"><b>".$strCourses_NewsLastupdate."</b></font><br>&nbsp;&nbsp;";
									  echo $row["post_date"];
									  ?></td>
                                    </tr>
									
									<tr> 
                                      <td><?
									  echo "<font color=\"#000099\"><b>".$strCourses_NewsExpiredate."</b></font><br>&nbsp;&nbsp;";
									  echo $row["expired_date"];
									  ?></td>
                                    </tr>
								</table>
		</td>
		
		<td align="center">
			<a href="?a=news_addedit&id=<? echo $row["id"]; ?>&courses=<? echo $courses;?>" target="_self">
				<img src="images/icon/_edit-16.png" border="0" alt="edit">
			</a> 
			<a href="#" onclick = "iconfirm('?a=del&id=<? echo $row["id"]; ?>&courses=<? echo $courses?>','Do you want delete news?')">
			<img src="images/icon/_cancel-16.png" border="0" alt="delete">
		</a>
				
		</td>
	  </tr>
	<? 
	$i++;
	}
	?>
	<tr class="boxcolor"><td colspan="3" bgcolor="#FFFFFF"></td>
	
	<td class="Bcolor"><?echo $strCourses_NewsTotal; echo mysql_num_rows($news);?></td>
	<td bgcolor="#FFFFFF"></td>
	</tr>
	</table>
</body>
</html>