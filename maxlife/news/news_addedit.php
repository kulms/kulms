<? 

$action = $strCourses_NewsHeaderadd ;

if ($id != "" && $id != none)
					{
						$news=mysql_query("SELECT   nc.subject,nc.title,nc.id,nc.picture,nc.htmlfile, nc.expired_date, nc.news_area FROM news_courses nc, courses c  
															WHERE  c.id=nc.courses  AND  nc.courses=$courses AND nc.id=$id;");
								
						$row=mysql_fetch_array($news);
						$subject=$row["subject"];
						$title=$row["title"];
						$pic = $row["picture"];
						$expired_date=$row["expired_date"];
						$news_area=$row["news_area"];
						$action = $strCourses_NewsHeaderedit;
						$htmlfile = $row["htmlfile"];
						  
						  if($htmlfile !="" && $htmlfile !=none){
							$HTMLsrc = $myModule_Path_HTMLFiles."/".$htmlfile;
					       }
					
					}

include("htmltool/header.php"); 
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

<script language="javascript" src="cal.js"></script>
<script language="javascript" src="cal_conf.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
</head>
<body>


<table width="80%" border="0" cellpadding="0" cellspacing="1" class="tdborder3">
                      <form action="?a=news_save" method="post" enctype="multipart/form-data" name="myForm" id="myForm">
                       <input name="courses" type="hidden" id="courses" value="<?=$courses?>">
                       <input name="id" type="hidden"  value="<?=$id?>">
                       
                        <tr> 
                          <td > <table width="100%" border="0" cellpadding="2" cellspacing="1">
                              <tr> 
                                <td height="24" colspan="2" align="center"  class="news"><b><?=$action;?></b> 
                                  
                                </td>
                              </tr>
                              <tr class="boxcolor" > 
                                <td height="26" colspan="2" class="main_white">&nbsp;&nbsp;<img src="images/icon/box.gif" width="11" height="11">&nbsp;<?=$strCourses_NewsHeaderinfo;?> </td>
                              </tr>
                              <tr> 
                                <td width="21%"  height="22" align="right"  class="tdbackground"><strong><?=$strCourses_NewsSubject;?></strong>&nbsp;</td>
                                <td width="79%" height="22" class="tdbackground1"> <input name="inputSubject" type="text" class="text"  size="40" maxlength="100" value="<? echo $subject;?>"></td>
                              </tr>
                              <tr> 
                                <td height="22" align="right" class="tdbackground"><strong><?=$strCourses_NewsTitle;?></strong>&nbsp; 
                                </td>
                                <td height="22" class="tdbackground1"><textarea name="inputTitle" cols="45" rows="6" class="pn-text"><? echo $title;?></textarea></td>
                              </tr>
                              <tr class="boxcolor"> 
                                <td height="26" colspan="2" class="main_white">&nbsp;&nbsp;<img src="images/icon/box.gif" width="11" height="11">&nbsp;<?=$strCourses_NewsFile;?></td>
                              </tr>
                              <tr> 
                                <td  height="22" align="right" class="tdbackground"><strong><?=$strCourses_NewsThumbpic;?></strong>&nbsp; </td>
                                <td height="22" class="tdbackground1"><input  class="text" name="inputThumbnailPicture" type="file"  id="inputThumbnailPicture" size="25"  onChange="
myfile = this.value;
if(myfile!='') {
	myfile = myfile.toLowerCase();
	Temp = myfile.charAt(myfile.length-4) + myfile.charAt(myfile.length-3) + myfile.charAt(myfile.length-2) + myfile.charAt(myfile.length-1);
	if(Temp=='.jpg' || Temp=='.gif' || Temp=='jpeg') {
		document.getElementById('PreviewImage').src=myfile;
		document.getElementById('PreviewImageText').innerHTML= document.getElementById('PreviewImage').width + 'x' + document.getElementById('PreviewImage').height + ' pixel';
	} else {
		alert('System allow to upload image files only.');
		this.focus();
	}
} else {
	alert('Please click Browse button to select thumbnail picture file.');
	this.focus();
}
" onMouseOut="
if(document.getElementById('PreviewImage').width>1 && document.getElementById('PreviewImage').height>1) {
	document.getElementById('PreviewImageText').innerHTML= document.getElementById('PreviewImage').width + 'x' + document.getElementById('PreviewImage').height + ' pixel';
}
"></td>
                              </tr>
                              <tr> 
                                <td height="22" align="right" class="tdbackground">&nbsp;</td>
                                <td height="22" class="tdbackground1"><?=$strCourses_NewsPictype;?></td>
                              </tr>
                              <tr> 
                                <td  height="22" align="right" valign="top" class="tdbackground"><strong><?=$strCourses_NewsPreview;?></strong>&nbsp; 
                                </td>
                                <td height="22" valign="top" class="tdbackground1"><table border="0" cellspacing="0" cellpadding="2">
                                    <tr> 
                                      <td width="120" align="center" valign="middle">
									  <? 
									         if ($pic!="" && $pic!=none) {
									  ?>
									  	<img src="<?=$myModule_Path_ThumbnailPicture?>/<?=$pic?>" name="PreviewImage" border="0" id="PreviewImage">
									  <?
									  	 }else { ?>
									  	<img src="images/blank.gif" name="PreviewImage" id="PreviewImage">
									  <? }?>
									  </td>
                                      <td align="right"><div id="PreviewImageText">&nbsp;</div></td>
                                    </tr>
                                  </table></td>
                              </tr>
							  <tr class="boxcolor"> 
                                <td height="26" colspan="2" class="main_white">&nbsp;&nbsp;<img src="images/icon/box.gif" width="11" height="11">&nbsp;<?=$strCourses_NewsContent;?></td>
                              </tr>
                              
							  <tr align="center" valign="top"> 
                                <td height="350" colspan="2"><table width="100%" height="500" border="0" align="center" cellpadding=1 cellspacing=1  bordercolorlight="#000000" bordercolordark="#E0E0E0" bgcolor="#AAAAAA" class="tdbackground1" id="htmltool_table">
                                    <tr> 
                                      <td height="50" align="center"> 
                                        <? include("htmltool/toolbar.php"); ?> </td>
                                    </tr>
                                    <tr> 
                                      <td align="center"> <? include("htmltool/textarea.php"); ?> </td>
                                    </tr>
                                  </table>
                                  <script language="JavaScript" type="text/JavaScript">
fnInit(idContent);
</script></td>
                              </tr>
                              <tr align="right" valign="top" class="tdbackground1"> 
                                <td colspan="2" ><?=$strCourses_NewsEnter;?></td>
                              </tr>
                              <tr class="boxcolor"> 
                                <td height="26" colspan="2" class="main_white">&nbsp;&nbsp;<img src="images/icon/box.gif" width="11" height="11">&nbsp;<?=$strCourses_NewsExpire;?></td>
                              </tr>
                              <tr> 
                                <td height="22" align="right" class="tdbackground"><strong><?=$strCourses_NewsExpiredate;?>
								</strong>&nbsp; </td>
                                <td height="22" class="tdbackground1"><input type="text" name="expired_date" size="10" value="<? echo $expired_date; ?>" onFocus="this.blur(); showCal('Date1')" class="text"> 
        <a href="javascript:showCal('Date1')"><img  align="absmiddle" src="images/date.gif" style="cursor:pointer;cursor:hand" title="Click to select date"  onMouseOver="window.status='Click to select date';return true" onmouseout="window.status='';return true"  width="16" height="16" border="0"></a></td>
                              </tr>
                              <tr> 
                                <td height="22" align="right" class="tdbackground">&nbsp;</td>
                                <td height="22" class="tdbackground1"><span class="red"><?=$strCourses_NewsMsg;?></span><span id="cal1" style="position:relative;">&nbsp;</span>
					</td>
                              </tr>
                            <tr> 
                                <td height="22" align="right"  class="tdbackground"><strong><?=$strCourses_NewsDisplay;?></strong>&nbsp;</td>
                                <td height="22" class="tdbackground1">
								 <input name="news_area" type="radio" value="0" <? if($news_area==0 )  echo "checked "; ?> class="r-button">
         <?= $strCourses_NewsDisplayCourses;?><br>
        <input type="radio" name="news_area" value="1" <? if($news_area==1 )  echo "checked "; ?> class="r-button">
       <?= $strCourses_NewsDisplayFirstpage;?>
								</td>
                            </tr>
							</table>
                            <table width="100%" height="24" border="0" cellpadding="3" cellspacing="0">
                              <tr align="right" class="boxcolor"> 
                                <td height="30" colspan="4" align="center" class="table_footer"> 
                                  <table width="120" border="0" cellspacing="0" cellpadding="2">
                                    <tr align="center"> 
                                      <td> <script language="JavaScript" type="text/JavaScript">
function isBlank(myObj) { if(myObj.value=='') { return true; } return false; }
function verifySubmit() {
	with(document.myForm) {
		if(isBlank(inputSubject)) {	inputSubject.focus(); return false; }
		if(isBlank(inputTitle)) {	inputTitle.focus(); return false; }
		myfile = inputThumbnailPicture.value;
		if(myfile!='') {
			myfile = myfile.toLowerCase();
			Temp = myfile.charAt(myfile.length-4) + myfile.charAt(myfile.length-3) + myfile.charAt(myfile.length-2) + myfile.charAt(myfile.length-1);
			if(Temp=='.jpg' || Temp=='.gif' || Temp=='jpeg') {
				document.getElementById('PreviewImage').src=myfile;
				document.getElementById('PreviewImageText').innerHTML= document.getElementById('PreviewImage').width + 'x' + document.getElementById('PreviewImage').height + ' pixel';
			} else {
				alert('System allow to upload image files only.');
				document.myForm.inputThumbnailPicture.focus();
				return false; 
			
			}
		}
	}
	fnSave();
	
}
						</script> <input name="Submit" type="submit" class="button_80" id="btSave" value="<?=$strSave;?>" onClick="return verifySubmit();"> 
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
  </form>
</table>
</body>
</html>