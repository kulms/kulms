<? 

include("htmltool/header.php"); 



if ($id != "" && $id != none)
					{
						$news=mysql_query("SELECT   nc.subject,nc.title,nc.id,nc.picture,nc.htmlfile, nc.expired_date,nc.post_date,nc.news_area FROM news_courses nc, courses c  
															WHERE  c.id=nc.courses  AND  nc.courses=$courses AND nc.id=$id;");
								
						$row=mysql_fetch_array($news);
						$subject=$row["subject"];
						$title=$row["title"];
						$pic = $row["picture"];
						$expired_date=$row["expired_date"];
						$post_date =  $row["post_date"];
						$news_area=$row["news_area"];
						$action = $strCourses_NewsHeaderview;
						$htmlfile = $row["htmlfile"];
						  
						  if($htmlfile !="" && $htmlfile !=none){
							$HTMLsrc = $myModule_Path_HTMLFiles."/".$htmlfile;
					       }
					
					}


?> 
<html>
<title>
</title>
<head>

<link href="../../themes/<? echo $theme;?>/style/main.css" rel="stylesheet" type="text/css">

<style type="text/css">
<!--
.button_80   { font-family : "MS Sans Serif"; font-size: 10px; color: #000000; font-weight: bold; height:18px; text-align: center; cursor: hand; width:80px;  border-width: 1px; }
-->
</style>


<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
</head>
<body>


<table width="80%" border="0" cellpadding="0" cellspacing="1" class="tdborder3">
                      
                       
                        <tr> 
                          <td > <table width="100%" border="0" cellpadding="2" cellspacing="1">
                              <tr> 
                                <td height="24" colspan="2" align="center"  class="news"><b><?=$action;?></b> 
                                  
                                </td>
                              </tr>
                              <tr class="boxcolor"> 
                                <td height="26" colspan="2" class="main_white">&nbsp;&nbsp;<img src="images/icon/box.gif" width="11" height="11">&nbsp; <?=$strCourses_NewsHeaderinfo;?> </td>
                              </tr>
                              <tr> 
                                <td width="21%"  height="22" align="center"  class="tdbackground1"> 
								<? if (strlen($pic)>0) {
									echo "<img src=\"$myModule_Path_ThumbnailPicture/$pic\" border=\"0\">"; 
								}else{ 
									echo "<img src=\"images/no_picture.jpg\" border=\"0\" >";
									}
									?>
									 </td>
                                <td width="79%" height="22" valign="top" class="tdbackground1"> <span class="news"> <b>
                                <?=$subject?>
</b></span><br> 
                                <?=nl2br($title)?>                                </td>
                              </tr>
							  <tr class="boxcolor"> 
                                <td height="26" colspan="2" class="main_white">&nbsp;&nbsp;<img src="images/icon/box.gif" width="11" height="11">&nbsp;<?=$strCourses_NewsContent;?> </td>
                              </tr>
                              
							  <tr align="center" valign="top"> 
                                <td height="350" colspan="2" bgcolor="#FFFFFF" align="left"> 
                                          <?
$filename = $HTMLsrc;

 if (strlen($filename)>0) { 
		$fd = fopen ($filename, "r");
		$contents = fread ($fd, filesize ($filename));
		fclose ($fd);
		echo $contents;
							}
						?>
                                  </td>
                              </tr>
                              <tr class="boxcolor"> 
                                <td height="26" colspan="2" class="main_white">&nbsp;&nbsp;<img src="images/icon/box.gif" width="11" height="11">&nbsp;<?=$strCourses_NewsExpire;?></td>
                              </tr>
                              <tr> 
                                <td height="22" align="right" class="tdbackground"><strong><?=$strCourses_NewsLastupdate;?></strong>                                  &nbsp; </td>
                                <td height="22" class="tdbackground1"> 
                                <?  echo $post_date;?>
                                </td>
                              </tr>
                              <tr> 
                                <td height="22" align="right" class="tdbackground"><strong><?=$strCourses_NewsExpiredate;?></strong>&nbsp; </td>
                                <td height="22" class="tdbackground1"> 
                                  <? echo $expired_date; ?>
                                </td>
                              </tr>
                            <tr> 
                                <td height="22" align="right" class="tdbackground"><strong><?=$strCourses_NewsDisplay;?></strong>&nbsp;</td>
                                <td height="22" class="tdbackground1">
								 <? if($news_area==0 )  echo $strCourses_NewsDisplayCourses; else   echo $strCourses_NewsDisplayFirstpage; ?> 
								</td>
                            </tr>
							</table>
                            <table width="100%" height="24" border="0" cellpadding="3" cellspacing="0">
                              <tr align="right" class="boxcolor"> 
                                <td height="30" colspan="4" align="center" class="table_footer"> 
                                  <table width="120" border="0" cellspacing="0" cellpadding="2">
                                    <tr align="center"> 
                                      <td>  <input name="btEdit" type="button" class="button_80" id="btEdit" value="<?=$strEdit;?>" onClick="location.href='?a=news_addedit&id=<?=$id;?>&courses=<?=$courses;?>'"> 
                                      </td>
                                      <td> <input name="btCalcel" type="button" class="button_80" id="btCalcel" onClick="
if(confirm('Are you sure to return to list?')) {
	document.location.href='?courses=<?=$courses;?>&page=<?=$page;?>';
}
						" value="<?=$strCancel;?>"> </td>
                                    </tr>
                                  </table></td>
                              </tr>
                            </table></td>
                        </tr>
  
</table>
</body>
</html>