<? 
include("../../../include/global_login.php");
include('config.php'); 
include('lib.php'); 
?>
<html>
<link href="tools.css" rel="stylesheet" type="text/css">
<head>
<title>HTML Tool Image Manager</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="../../../themes/<? echo $theme;?>/style/main.css" rel="stylesheet" type="text/css">

</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="loadProgressBar('ProgressBarLayer',80,'#FF0000',20)">

<div id="ProgressBarLayer" style="position:absolute; left:0px; top:0px; z-index:1; visibility: hidden;"></div>
<script language="JavaScript" src="progress.js" type="text/JavaScript"></script>
<?
 //Check to create module data directory. ---------
if(!is_dir("../".$System_RelativePath_Upload."/".$courses)) { mkdir("../".$System_RelativePath_Upload."/".$courses,0777); }
if(!is_dir("../".$myModule_Path_ThumbnailPicture)) { mkdir("../".$myModule_Path_ThumbnailPicture,0777); }
if(!is_dir("../".$myModule_Path_HTMLFiles)) { mkdir("../".$myModule_Path_HTMLFiles,0777); }
if(!is_dir("../".$myModule_Path_ImageLibrary)) { mkdir("../".$myModule_Path_ImageLibrary,0777); }
// ------------------------------------------------

if(strlen($CurrentPath)=="") { $CurrentPath="../".$myModule_Path_ImageLibrary; }


switch($action) {
	case "addpic" :
		$size=GetImageSize ($Data1); 
		if($size!=NULL) {
		$DataName=getFileOrFolderNameUpload($Data1Name);
			if(!file_exists("$CurrentPath/$DataName")) {
				if(copy($Data1,"$CurrentPath/$DataName")) {
					chmod("$CurrentPath/$DataName",0777);
				}
			}
		}
		break;
	case "deletepic" :
		if(file_exists($FileOrFolderName)) {
			unlink($FileOrFolderName);
		}
		break;
	case "addfolder" :
		if(!file_exists("$CurrentPath/$Data2")) {
			mkdir ("$CurrentPath/$Data2", 0700);
		}
		break;
	case "deletefolder" :
		if(file_exists($FileOrFolderName)) {
			rmdir($FileOrFolderName);
		}
		break;
	case "updatefolder" :
		$CurrentPath =removeEndSlash($CurrentPath);
		$UpPath = removeEndURL($CurrentPath) . "/" . $Data3;
		if(file_exists($CurrentPath)) {
			if(!file_exists($UpPath)) {
				rename($CurrentPath,$UpPath);
				$CurrentPath = $UpPath;
			}		
		}		
		break;
}

?>
<table width="100%" height="100%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr> 
    <td width="50%"><table width="100%" height="100%" border="1" align="center" cellpadding=0 cellspacing=0 bordercolor="#000000"  bordercolorlight="#000000" bordercolordark="#E0E0E0" bgcolor="#AAAAAA" id="htmltool_table" class="tdbackground1">
        <tr> 
          <td height="22" align="center" bgcolor="#888888" class="tdbackground"><font color="#000033"><strong>แสดงภาพ</strong></font></td>
        </tr>
        <tr> 
          <td align="center" valign="middle"> 
<div  style="height:395;width:280;overflow:auto" align="center" valign="middle">
            <table width="100%" height="100%" border="0" cellpadding="2" cellspacing="0" id="ImageShowTable" style="display:none">
              <tr> 
                <td align="center" valign="middle"><a href="#" target="_blank" id="ImageLink"><img name="ImageShow" border="0" id="ImageShow"></a></td>
              </tr>
            </table>
</div>
            </td>
        </tr>
      </table></td>
    <td><table width="100%" height="100%" border="1" align="center" cellpadding=0 cellspacing=0 bordercolor="#000000"  bordercolorlight="#000000" bordercolordark="#E0E0E0" bgcolor="#AAAAAA" id="htmltool_table" class="tdbackground1">
        <tr> 
          <td height="22" align="center" bgcolor="#888888" class="tdbackground"><font color="#000033"><strong>รายชื่อภาพ 
            <script language="JavaScript" type="text/JavaScript">
var myMaxW = 240;
var myMaxH = 350;

function myShowImage(myPicURL,myPicWidth,myPicHeight,myPicName) {
	ImageShow.clearAttributes();
	ImageLink.clearAttributes();
	ImageShow.border = 0;
	ImageShow.src = myPicURL;
	ImageShowTable.style.display = '';
	if(myPicWidth<myMaxW && myPicHeight<myMaxH) {
		//alert("both");
		ImageShow.width = myPicWidth;
		ImageShow.height = myPicHeight;
		ImageLink.href = "#";
	} else if(myPicWidth>myMaxW) {
		//alert("width");
		ImageShow.width = myMaxW;
		ImageLink.href = myPicURL;
		ImageLink.target = "_blank";
	} else if(myPicHeight>myMaxH) {
		//alert("height");
		ImageShow.height = myMaxH;
		ImageLink.href = myPicURL;
		ImageLink.target = "_blank";
	} else if(myPicWidth<myPicHeight) {
		//alert("height>width");
		ImageShow.height = myMaxH;
		ImageLink.href = myPicURL;
		ImageLink.target = "_blank";
	} else {
		//alert("width>height");
		ImageShow.width = myMaxW;
		ImageLink.href = myPicURL;
		ImageLink.target = "_blank";
	}
	showDetail(4);
	document.myForm.ImgWidth.value = myPicWidth;
	document.myForm.ImgHeight.value = myPicHeight;
	document.myForm.ImgURL.value = 	document.myForm.FullPathBaseURL.value + "/" +  myPicName;
}

function onRowOver(thisObj,mycolor) {
	thisObj.style.backgroundColor=mycolor;
}

function onRowOut(thisObj) {
	thisObj.style.backgroundColor='';
}
		  </script>
            </strong></font></td>
        </tr>
        <tr> 
          <td align="left" valign="top"> 
            <?
if($CurrentPath=="") { $CurrentPath = "../".$myModule_Path_ImageLibrary; }
$CurrentPath = removeEndSlash($CurrentPath);
$UpPath = removeEndURL($CurrentPath);
?>
            <div  style="height:380;overflow:auto">
<table width="100%" border="0" cellpadding="1" cellspacing="0" id="htmltool_table">
                <?
if($CurrentPath!="../".$myModule_Path_ImageLibrary) {
	$FullPathBaseURL = $myModule_FullPath_ImageLibrary . "/" . substr($CurrentPath,strlen("../".$myModule_Path_ImageLibrary)+1,strlen($CurrentPath));
	?>
                <tr> 
                  <td height="22" align="center" valign="middle">&nbsp;</td>
                  <td height="22" colspan="3"><font color="#990000"><strong> 
                    Sub Folder
                    </strong></font></td>
                </tr>
                <tr onMouseOver="onRowOver(this,'#F7F7F7')" onMouseOut="onRowOut(this)"> 
                  <td width="18" height="18" align="center" valign="middle"><img src="folder_back.gif" width="16" height="16"></td>
                  <td height="18"><a href="?CurrentPath=<?=$UpPath . "/" . $file ?>&courses=<?=$courses?>&SystemMenuID=<?=$SystemMenuID?>">..</a></td>
                  <td width="40">&nbsp;</td>
                  <td width="20" height="18" align="center">&nbsp;</td>
                </tr>
                <?
} else {
	?>
                <tr> 
                  <td height="22" align="center" valign="middle">&nbsp;</td>
                  <td height="22" colspan="3"><font color="#990000"><strong> 
                    Root Path
                    </strong></font></td>
                </tr>
	<?
	$FullPathBaseURL = $myModule_FullPath_ImageLibrary;
}

// Get Folder
$handle = opendir($CurrentPath); 
while (false !== ($file = readdir($handle))) { 
    if ($file != "." && $file != "..") { 
		if(is_dir($CurrentPath . "/". $file)) {
				// Get Files Inside
				$FileInside=0;
				$ImageFileInside=0;
				$FileInsideHandle = opendir($CurrentPath . "/". $file); 
				while (false !== ($FileInsideFile = readdir($FileInsideHandle))) { 
					if ($FileInsideFile != "." && $FileInsideFile != "..") { 
							$FileInside++;
							if( is_file($CurrentPath . "/". $file . "/". $FileInsideFile) ) {
								$size=GetImageSize ($CurrentPath . "/". $file . "/". $FileInsideFile); 
								if($size!=NULL) {
									$ImageFileInside++;
								}
							}
						}
					}
					closedir($FileInsideHandle); 
			?>
                <tr onMouseOver="onRowOver(this,'#F7F7F7')" onMouseOut="onRowOut(this)"> 
                  <td width="18" height="18" align="center" valign="middle"> 
                    <? if($FileInside==0) { ?>
                    <img src="folder_empty.gif" width="16" height="16"> 
                    <? } else { ?>
                    <img src="folder.gif" width="16" height="16"> 
                    <? } ?>
                  </td>
                  <td height="18"><a href="?CurrentPath=<?=$CurrentPath . "/" . $file ?>&courses=<?=$courses?>&SystemMenuID=<?=$SystemMenuID?>"> 
                    <?=$file?>
                    </a></td>
                  <td width="40">&nbsp;</td>
                  <td width="20" height="18" align="center"> 
                    <? if($FileInside==0) { ?>
                    <img src="delete.gif" alt="ลบโฟลเดอร์" width="15" height="15" onClick="
if(confirm('คุณต้องการจะลบโฟลเดอร์นี้ แน่ใจหรือไม่?')) {
	document.myForm.FileOrFolderName.value = '<?=$CurrentPath . "/" . $file ?>';
	document.myForm.action.value = 'deletefolder';
	document.myForm.submit();
}
				" onMouseOver="this.style.cursor='hand'"> 
                    <? } ?>
                  </td>
                </tr>
                <?
		}
    } 
}
closedir($handle); 

// Get Files
$handle = opendir($CurrentPath); 
while (false !== ($file = readdir($handle))) { 
    if ($file != "." && $file != "..") { 
		if( is_file($CurrentPath . "/". $file) ) {
			$size=GetImageSize ($CurrentPath . "/". $file); 
			if($size!=NULL) {
				$ImgWidth = $size[0];
				$ImgHeight = $size[1];
				?>
                <tr onMouseOver="onRowOver(this,'#F7F7F7')" onMouseOut="onRowOut(this)"> 
                  <td width="18" height="18" align="center" valign="middle"> 
                    <? if( $size[2]==1 || $size[2]==2 || $size[2]==3 || $size[2]==6 ) { ?>
                    <img src="pictype<?=$size[2]?>.gif" width="16" height="16"> 
                    <? } else { ?>
                    <img src="pic.gif" width="16" height="16"> 
                    <? } ?>
                  </td>
                  <td height="18"><a href="#" onClick="myShowImage('<?=$CurrentPath . "/". $file?>',<?=$ImgWidth?>,<?=$ImgHeight?>,'<?=$file?>')"> 
                    <?=$file?>
                    </a></td>
                  <td width="40"> 
                    <?=formatImageSize(filesize($CurrentPath . "/". $file))?>
                  </td>
                  <td width="20" height="18" align="center"><img src="delete.gif" alt="ลบไฟล์" width="15" height="15" onClick="
if(confirm('คุณต้องการจะลบไฟล์นี้ แน่ใจหรือไม่?\nภาพนี้ อาจ ถูกใช้ในเอกสารใดเอกสารหนึ่งๆ อยู่ และจะมีผล\nทำให้ไม่สามารถแสดงภาพนี้ในเอกสารนั้นๆ ได้')) {
	document.myForm.FileOrFolderName.value = '<?=$CurrentPath . "/" . $file ?>';
	document.myForm.action.value = 'deletepic';
	document.myForm.submit();
}
				" onMouseOver="this.style.cursor='hand'"> </td>
                </tr>
                <?
			  }
		}
    } 
}
closedir($handle); 
?>
              </table>
            </div></td>
        </tr>
        <tr> 
          <td height="20" align="center" valign="middle" bgcolor="#888888" class="tdbackground"> <table border="0" cellpadding="0" cellspacing="0" id="htmltool_table">
              <tr> 
                <td width="22" align="left"><img src="pic.gif" width="16" height="16"></td>
                <td><a href="#" onClick="showDetail(1)"><strong>เพิ่มรูปภาพ</strong></a></td>
                <td width="22" align="center"><img src="folder.gif" width="16" height="16"></td>
                <td><a href="#" onClick="showDetail(2)"><strong>เพิ่มโฟลเดอร์</strong></a></td>
                <? if($CurrentPath!="../".$myModule_Path_ImageLibrary) { ?>
                <td width="22" align="center"><img src="folder.gif" width="16" height="16"></td>
                <td><a href="#" onClick="showDetail(3)"><strong>แก้ไขโฟลเดอร์นี้</strong></a></td>
                <? } ?>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="120" colspan="2"><table width="100%" height="100%" border="1" align="center" cellpadding=0 cellspacing=0 bordercolor="#000000"  bordercolorlight="#000000" bordercolordark="#E0E0E0" bgcolor="#AAAAAA" id="htmltool_table" class="tdbackground1">
        <tr> 
          <td height="22" align="center" bgcolor="#888888" class="tdbackground"><font color="#000033"><strong>รายละเอียด
            <script language="JavaScript" type="text/JavaScript">
function showDetail(myDetailType) {
	DetailTable0.style.display = 'none';
	DetailTable1.style.display = 'none';
	DetailTable2.style.display = 'none';
<? if($CurrentPath!="../".$myModule_Path_ImageLibrary) { ?>
	DetailTable3.style.display = 'none';
<? } ?>
	DetailTable4.style.display = 'none';
	switch(myDetailType) {
		case 0 :
			DetailTable0.style.display = '';
			break;
		case 1 :
			DetailTable1.style.display = '';
			document.myForm.Data1.focus();
			break;
		case 2 :
			DetailTable2.style.display = '';
			document.myForm.Data2.focus();
			break;
		case 3 :
			DetailTable3.style.display = '';
			document.myForm.Data3.focus();
			break;
		case 4 :
			DetailTable4.style.display = '';
			break;
	}
}
		  </script>
            </strong></font></td>
        </tr>
	  <form action="?" method="post" enctype="multipart/form-data" name="myForm" id="myForm">
            <input name="courses" type="hidden" id="courses" value="<?=$courses?>">
            <input name="SystemMenuID" type="hidden" id="SystemMenuID" value="<?=$SystemMenuID?>">
			<input name="CurrentPath" type="hidden" id="CurrentPath" value="<?=$CurrentPath?>">
			<input name="Data1Name" type="hidden" id="Data1Name">
			<input name="FileOrFolderName" type="hidden" id="FileOrFolderName">
			<input name="FullPathBaseURL" type="hidden" id="FullPathBaseURL" value="<?=$FullPathBaseURL?>">
			<input name="action" type="hidden" id="action">
          <tr> 
            <td align="center">
<table border="0" cellpadding="1" cellspacing="0" id="DetailTable0">
                <tr id="htmltool_table"> 
                  <td><input name="btClose" type="button" class="htmltool_button_th_120" id="btClose" value="ปิดหน้าต่าง" onMouseOver="this.style.cursor='hand'" onClick="
window.close();
				  "></td>
                </tr>
              </table> 
              <table border="0" cellpadding="1" cellspacing="0" id="DetailTable1" style="display:none">
                <tr id="htmltool_table"> 
                  <td height="20"><img src="pic.gif" width="16" height="16"></td>
                  <td width="220" height="20"> <input name="Data1" type="file" class="htmltool_input_left" id="Data1" size="22" onChange="
if(this.value!='') {
	ImageShow.clearAttributes();
	ImageShow.border=0;
	ImageShow.src=this.value;
	ImageShowTable.style.display='';
	ImageLink.href='#';
	ImageLink.target='';
}
"> </td>
                  <td height="20"><input name="btAdd" type="button" class="htmltool_button_th_120" id="btAdd" value="เพิ่มรูปภาพใหม่" onMouseOver="this.style.cursor='hand'" onClick="
if(document.myForm.Data1.value=='') {
	document.myForm.Data1.focus();
	return false;
}
document.myForm.Data1Name.value=document.myForm.Data1.value;
document.myForm.action.value='addpic';
document.myForm.submit();
showProgressBar('ProgressBarLayer');
				  "> </td>
                </tr>
                <tr id="htmltool_table"> 
                  <td height="20">&nbsp;</td>
                  <td width="220" rowspan="2">กำหนดให้เป็นไฟล์รูปภาพเท่านั้น<br> 
                    <br> </td>
                  <td height="20"><input name="btCancel" type="button" class="htmltool_button_th_120" id="btCancel" value="ยกเลิก" onMouseOver="this.style.cursor='hand'" onClick="
DetailTable1.style.display = 'none';
DetailTable0.style.display = '';
				  "></td>
                </tr>
                <tr id="htmltool_table"> 
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table>
              <table border="0" cellpadding="1" cellspacing="0" id="DetailTable2" style="display:none">
                <tr id="htmltool_table"> 
                  <td height="20"><img src="folder.gif" width="16" height="16"></td>
                  <td width="220" height="20"> <input name="Data2" type="text" class="htmltool_input_left" id="Data2" size="22"></td>
                  <td height="20"> <input name="btAddFolder" type="button" class="htmltool_button_th_120" id="btAddFolder" value="เพิ่มโฟลเดอร์ใหม่" onMouseOver="this.style.cursor='hand'" onClick="
if(document.myForm.Data2.value=='') {
	document.myForm.Data2.focus();
	return false;
}
document.myForm.action.value='addfolder';
document.myForm.submit();
				  "></td>
                </tr>
                <tr id="htmltool_table"> 
                  <td height="20">&nbsp;</td>
                  <td width="220" rowspan="2">กำหนดให้เป็นภาษาอังกฤษ และใช้ชื่อตามกฎ<br>
                    การตั้งชื่อไฟล์ปกติเท่านั้น</td>
                  <td height="20"><input name="btCancel" type="button" class="htmltool_button_th_120" id="btCancel" value="ยกเลิก" onMouseOver="this.style.cursor='hand'" onClick="
DetailTable2.style.display = 'none';
DetailTable0.style.display = '';
				  "></td>
                </tr>
                <tr id="htmltool_table"> 
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table>
<? 
if($CurrentPath!="../".$myModule_Path_ImageLibrary) { 
$CurrentFileOrFolder = getFileOrFolderName($CurrentPath);
?>
              <table border="0" cellpadding="1" cellspacing="0" id="DetailTable3" style="display:none">
                <tr id="htmltool_table"> 
                  <td height="20"><img src="folder.gif" width="16" height="16"></td>
                  <td width="220" height="20"> <input name="Data3" type="text" class="htmltool_input_left" id="Data3" value="<?=$CurrentFileOrFolder?>" size="22"></td>
                  <td height="20"> <input name="btEditFolder" type="button" class="htmltool_button_th_120" id="btEditFolder" value="แก้ไขโฟลเดอร์นี้" onMouseOver="this.style.cursor='hand'" onClick="
if(document.myForm.Data3.value=='') {
	document.myForm.Data3.focus();
	return false;
}
document.myForm.action.value='updatefolder';
document.myForm.submit();
				  "></td>
                </tr>
                <tr id="htmltool_table"> 
                  <td height="20">&nbsp;</td>
                  <td width="220" rowspan="2">กำหนดให้เป็นภาษาอังกฤษ และใช้ชื่อตามกฎ<br>
                    การตั้งชื่อไฟล์ปกติเท่านั้น</td>
                  <td height="20"><input name="btCancel" type="button" class="htmltool_button_th_120" id="btCancel" value="ยกเลิก" onMouseOver="this.style.cursor='hand'" onClick="
DetailTable3.style.display = 'none';
DetailTable0.style.display = '';
				  "></td>
                </tr>
                <tr id="htmltool_table"> 
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table>
              <? } ?>
              <table border="0" cellpadding="1" cellspacing="0" id="DetailTable4" style="display:none">
                <tr id="htmltool_table"> 
                  <td align="right">กว้าง</td>
                  <td><input name="ImgWidth" type="text" class="htmltool_input_left" id="ImgWidth" value="0" size="5"></td>
                  <td align="right">การจัดวาง</td>
                  <td> <select name="ImgAlign" class="htmltool_select" id="ImgAlign">
                      <option value="Default" selected>ปกติ</option>
                      <option value="Left">ชิดซ้าย</option>
                      <option value="Right">ชิดขวา</option>
                      <option value="Top">ชิดด้านบนบรรทัด</option>
                      <option value="Middle">กึ่งกลางบรรทัด</option>
                      <option value="Bottom">ชิดด้านล่างบรรทัด</option>
                    </select></td>
                  <td> 
                    <input name="ImgURL" type="hidden" id="ImgURL"></td>
                </tr>
                <tr id="htmltool_table"> 
                  <td align="right">สูง</td>
                  <td height="20"><input name="ImgHeight" type="text" class="htmltool_input_left" id="AltText" value="0" size="5"></td>
                  <td align="right">ขอบของภาพ</td>
                  <td><input name="ImgBorder" type="text" class="htmltool_input_left" id="AltText" value="0" size="5"></td>
                  <td> <input name="btInsertImage" type="button" class="htmltool_button_th_120" id="btInsertImage" value="แทรกภาพนี้" onMouseOver="this.style.cursor='hand'" onClick="
with(document.myForm) {
	if(ImgBorder.value=='') { ImgBorder.value=0; }
	if(isNaN(ImgBorder.value*1)) { ImgBorder.value=0; }
	if(ImgWidth.value=='') { ImgWidth.value=0; }
	if(isNaN(ImgWidth.value*1)) { ImgWidth.value=0; }
	if(ImgHeight.value=='') { ImgHeight.value=0; }
	if(isNaN(ImgHeight.value*1)) { ImgHeight.value=0; }
	window.opener.fnInsertImage(ImgURL.value,ImgAlt.value,ImgAlign.value,ImgBorder.value,ImgWidth.value,ImgHeight.value);
}
window.close();
				  "></td>
                </tr>
                <tr id="htmltool_table"> 
                  <td align="right">คำอธิบาย</td>
                  <td colspan="3"><input name="ImgAlt" type="text" class="htmltool_input_left" id="ImgAlt" size="35"></td>
                  <td><input name="btCancel" type="button" class="htmltool_button_th_120" id="btCancel" value="ยกเลิก" onMouseOver="this.style.cursor='hand'" onClick="
DetailTable4.style.display = 'none';
DetailTable0.style.display = '';
				  "></td>
                </tr>
              </table> </td>
        </tr>
		</form>
      </table></td>
  </tr>
</table>
</body>
</html>