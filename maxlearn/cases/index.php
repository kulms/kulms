<? 
session_start();
$session_id = session_id();

require("../include/global_login.php");
require("../include/getsize.php");
require("../include/online.php");
online_courses($session_id,$person["id"],$courses,time(),1);

//mysql_query("INSERT INTO login_modules(users,modules,time) VALUES(".$person["id"].",$id,".time().");");
$check=mysql_query("SELECT name,info from cases WHERE id='".$person["id"]."';");

?>
<html>
<head>
<title>Resources</title>
<script language="javascript">
<!--

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<script language="JavaScript">
<!--
function mouseOverRow(gId, onOver){	
	if(document.getElementById){
		if(onOver==1)
			//eval("document.getElementById('trE" + gId + "')").bgColor="#FFF5E8";
			//eval("document.getElementById('trE" + gId + "')").bgColor="#B3F2EF";
			eval("document.getElementById('trE" + gId + "')").bgColor="#E0E1FE";					
		else
			eval("document.getElementById('trE" + gId + "')").bgColor="";		
	}//end if

}//end function


var plusImg = new Image();
var minusImg = new Image();
plusImg.src = "../images/rootPlus.gif";
minusImg.src = "../images/rootMinus.gif";

function tree(curObj, id){
	//if(isExpand==1){
		if(curObj.src == plusImg.src){
			curObj.src = minusImg.src;
			eval("document.getElementById('"+id+"')").style.display='';
		}else{
			curObj.src = plusImg.src;	
			eval("document.getElementById('"+id+"')").style.display='none';
		}//end if
//	}//end if

}//end function

//-->
</script>

<link rel="STYLESHEET" type="text/css" href="../main.css">
</head>
<body bgcolor="#ffffff">
<div align="center">
<table border="0" cellpadding="0" cellspacing="0">
        <tr>
                <td class="menu"><? echo nl2br(mysql_result($check,0,"info"))?></td>
                <td class="menu" width="15%"><br>&nbsp;</td>
        </tr>
</table>
<!-- New Table -->

<table width="400" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>           
            <td  class="blue" align="right"><b><? echo mysql_result($check,0,"name");?> 
              </b><img src="../images/cases.gif" width="20" height="16"></td>
			<? if ($person["category"] == 2) { ?>
				  <td width="26" class="res">
						<a href="edit.php?modules=<? echo $id?>&id=0&folder=true">
						<img src="../images/tool.gif" width=18 height=16 border="0" align="top"></a>
				  </td>
		  	<? } ?>
        </tr>
        <tr>
          <td> 
		   <!-- Start tree -->
		   <?		   	
		    function rs($modules,$id,$cat,$count,$space){
                $rs=mysql_query("SELECT r.name,r.id,r.folder,r.url,r.refid,r.file,r.new_window,r.modules,r.time,r.users,u.firstname,u.surname FROM resources r,users u WHERE r.modules=$modules AND r.refid=$id AND r.users=u.id order by r.name;");
				
                while($row=mysql_fetch_array($rs)){	
					 $count++;
				?>						
						<? if($row["folder"]==1) { ?> 
								<table width="100%" border="0" cellspacing="0" cellpadding="2" class="res">												
								<tr id="trE<? echo $count;?>"> 										
								<td style="BORDER-BOTTOM: solid #85C6E4 1px;" width="19" align="center" valign="top"> 
									<img src="../images/icon_folder_open_topic.gif" border="0">
								</td>
									<td width="525" style="BORDER-BOTTOM: solid #85C6E4 1px;">
									  <table width="100%" border="0" cellspacing="0" cellpadding="2">
										  <tr>
										  	<? echo $space; ?> 
											<td width="16" valign="top"><img src="../images/rootPlus.gif" border="0" onClick="tree(this, '<? echo $count;?>')" style="cursor:pointer;cursor:hand"></td>
											<td class="res" onClick="tree(this, '<? echo $count;?>')" style="cursor:pointer;cursor:hand">&nbsp;<? echo $row["name"];?></td>
											<? if ($cat==2) { ?>
											<td width="26" class="res">
                                				<a href="edit.php?modules=<? echo $modules?>&id=<? echo $row["id"]?>">
												<img src="../images/tool.gif" width=18 height=16 alt="<?echo $row["firstname"]." ".$row["surname"]." ".date("Y-m-d H:i",$row["time"])?>" border="0" align="top"></a>
                          				  	</td>
											<? } ?>
										  </tr>
										</table>
									</td>
								</tr>
								</table>
								<span id="<? echo $count;?>" style="display:'none';">
								
						<? } else { 
								 if(strlen($row["url"])!=0){ ?>
									<table width="100%" border="0" cellspacing="0" cellpadding="2" class="res">
									<tr id="trE<? echo $count;?>"> 										
									<td style="BORDER-BOTTOM: solid #85C6E4 1px;" width="19" align="center" valign="top">
										<img src="../images/space.gif" width="16">
									</td>
										<td width="525" style="BORDER-BOTTOM: solid #85C6E4 1px;">
										  <table width="100%" border="0" cellspacing="0" cellpadding="2">
											  <tr> 
  											    <!--<td width="16"><img src="../images/space.gif" width="16"></td>-->
												<? echo $space; ?> 
												<td width="16" height="22" valign="top"><img src="../images/rootMinus.gif" border="0" onClick="tree(this, '<? echo $count;?>')"></td>
												<td width="16"><img src="../images/link.gif" border="0"></td>
												<td class="res"><a href="<? echo $row["url"]?>" 
														target="<? if($row["new_window"]==0) 
															echo "_self";
															else 
															echo "_blank"; 	
															?>">
														   <? echo $row["name"]?></a>
											</td>
												<? if ($cat==2) { ?>
												<td width="26" class="res">
                                					<a href="edit.php?modules=<? echo $modules?>&id=<? echo $row["id"]?>">
													<img src="../images/tool.gif" width=18 height=16 alt="<?echo $row["firstname"]." ".$row["surname"]." ".date("Y-m-d H:i",$row["time"])?>" border="0" align="top"></a>
                            					</td>
												<? } ?>
											  </tr>
											</table>
										</td>
									</tr>
									</table>
									<span id="<? echo $count;?>" style="display:'none';">
									</span>
							   <? } else { ?>
							   			<table width="100%" border="0" cellspacing="0" cellpadding="2" class="res">												
										<tr id="trE<? echo $count;?>"> 										
										<td style="BORDER-BOTTOM: solid #85C6E4 1px;" width="19" align="center" valign="top"> 
											<img src="../images/space.gif" width="16">
										</td>
											<td width="525" style="BORDER-BOTTOM: solid #85C6E4 1px;">
											  <table width="100%" border="0" cellspacing="0" cellpadding="2">
												  <tr>
												  	<!--<td width="16"><img src="../images/space.gif" width="16"></td> -->
													<? echo $space; ?>
													<td width="16" valign="top"><img src="../images/rootMinus.gif" border="0" onClick="tree(this, '<? echo $count;?>')"></td>
													<td width="16"><img src="../images/file.gif" border="0"></td>
													<td class="res"><a href="../files/resources_files/<? echo $row["id"]."/".$row["file"]?>" 
														target="<? if($row["new_window"]==0) 
																	 echo "_self";
																	 else 
																	 echo "_blank"; 
																	 ?>">
														<? echo $row["name"]?></a>
														<? if(strlen($row["file"])!=0) {?>
														(Size :
														<? 															
															$doc_filesize = filesize("../files/resources_files/".$row["id"]."/".$row["file"]);
															if ($doc_filesize != 0) {
																echo GetSize ($doc_filesize);
															} else echo "0 B";
														?>
														)
														<? } else { ?>
														(Size : 0 B)
														<? 	}?>
													</td>
													<? if ($cat==2) { ?>
													<td width="26" class="res">
                                						<a href="edit.php?modules=<? echo $modules?>&id=<? echo $row["id"]?>">
														<img src="../images/tool.gif" width=18 height=16 alt="<?echo $row["firstname"]." ".$row["surname"]." ".date("Y-m-d H:i",$row["time"])?>" border="0" align="top"></a>
                            						</td>
													<? } ?>
												  </tr>
												</table>
											</td>
										</tr>
										</table>
										<span id="<? echo $count;?>" style="display:'none';">
										</span>			
							   <? } 				
						?>			
				<? }		
				 		if($row["folder"]==1){																					
							rs($modules,$row["id"],$cat,rand(),$space.'<td width="16"><img src="../images/space.gif" width="16"></td>');							
							?>
							</span>
                        <? }
				}
			}						
			rs(37,0,$person["category"],0,'');
			?>
		   <!-- End Tree -->
		  </td>
		 </tr>
		 </table>
	</td>
   </tr>
</table>
<!-- End New Table -->

<? if (($person["category"] == 2) or ($person["category"] == 1)) { ?>
  <table width="40%">
    <tr>
      <td><!--<form name="form1" method="post" action="">
          <div align="center"><font color="#0000FF" size="2">Get File From Personal 
            :</font><font size="2"> 
            <input name="getFile" type="submit" id="getFile" onClick="MM_openBrWindow('get_resource.php?user=<? echo $person["id"];?>&modules=<? echo $id?>','getResource','status=yes,scrollbars=yes,width=350,height=400')" value="Get Files">            
            </font></div>
          </form>--></td>
    </tr>
  </table>
  <table width="80%">
    <tr>
		<td>
		<!--<form name="form2" method="post" action="">
          <div align="center"><font color="#0000FF" size="2">Get File From Resource 
            Center :</font><font size="2"> 
            <input name="getFile" type="submit" id="getFile" onClick="MM_openBrWindow('index_rc.php','getResCenter','status=yes,scrollbars=yes,width=600,height=600')" value="Get Files">            
            </font></div>
          </form>-->
		</td>
  	</tr>
  </table>
<? } ?>
</div></body>
</html>
<?
mysql_close();
?>