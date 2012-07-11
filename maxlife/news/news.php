


<html>
<title>
</title>
<head>

<link href="../../themes/<? echo $theme;?>/style/main.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../assets/stylesheets/master.css" />
<!--
<link rel="stylesheet" type="text/css"  href="../assets/stylesheets/base/jquery.ui.all.css" />
<link rel="stylesheet" href="css/style.css" />
-->
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">

<script language="JavaScript" type="text/JavaScript">

function clickIE4(){
		if (event.button==2){
			alert(message);
			return false;
		}
	}

	function clickNS4(e){
		if (document.layers||document.getElementById&&!document.all){
			if (e.which==2||e.which==3){
				alert(message);
				return false;
			}
		}
	}

if (document.layers){
		document.captureEvents(Event.MOUSEDOWN);
		document.onmousedown=clickNS4;
	}else if (document.all&&!document.getElementById){
		document.onmousedown=clickIE4;
	}
document.oncontextmenu=new Function("return false");
function disableselect(e){  return false	}

function EditCheck(){
var ii=0;
for (var i=0;i<document.forms[0].elements.length;i++)
	{
var e=document.forms[0].elements[i];
	
	if(e.checked && e.name != 'allbox'){
			if(ii<1) b=e.value;		
			ii++;
		}
	}

	if(ii==0) {

		alert("Please select item to edit record");
		return false;
	}
	else if(ii>1){

		alert("Please check 1 item to edit");
		return false;

	}else{

	document.location.href="?a=news_addedit&id="+b+"&courses=<?=$courses;?>";

	}



}


function iconfirm(in_url,msg)
		{
				if( confirm(msg) )
					{   
						document.myForm.action =in_url; 
					   	document.myForm.submit();
					 }
		}


function checkAll(){
for (var i=0;i<document.forms[0].elements.length;i++)
{
var e=document.forms[0].elements[i];
if ((e.name != 'allbox') && (e.type=='checkbox'))
	{
	e.checked=document.forms[0].allbox.checked;
		}
	}
}




function xppr(im){var i=new Image();i.src='../assets/images/topmenu/eng/ct'+im;return i;}function xpe(id){x=id.substring(0,id.length-1);document['xpwb'+x].src=eval('xpwb'+id+'.src');if(id.indexOf('e')!=-1)document['xpwb'+x+'e'].src=eval('xpwb'+id+'e.src');}
xpwb0n=xppr('0_0.gif');xpwb0o=xppr('0_1.gif');xpwb0c=xppr('0_2.gif');xpwb1n=xppr('1_0.gif');xpwb1o=xppr('1_1.gif');xpwb1c=xppr('1_2.gif');xpwb2n=xppr('2_0.gif');xpwb2o=xppr('2_1.gif');xpwb2c=xppr('2_2.gif');

</script>
</head>
<body>
<?php
require("include/function.php");
If (!$page){
	$page = 1;
}
$news=mysql_query("SELECT  nc.subject,nc.title,nc.id , nc.picture,nc.expired_date, nc.post_date FROM news_courses nc  WHERE  nc.courses=$courses 	ORDER BY nc.id DESC;");													
$totalrow =  mysql_num_rows($news);
$record_per_page = 5;


$rt = $totalrow%$record_per_page;
	if($rt!=0) { 
		$total_page = floor($totalrow/$record_per_page)+1; 
	}
	else {
		$total_page = floor($totalrow/$record_per_page); 
	}
	$goto = ($page-1)*$record_per_page;

if($sort=="") $sort="id desc";

$news=mysql_query("SELECT  nc.subject,nc.title,nc.id , nc.picture,nc.expired_date, nc.post_date FROM news_courses nc  WHERE  nc.courses=$courses 	ORDER BY $sort  limit $goto,$record_per_page;");													


?>
<form name="myForm" method="post"  id="myForm">
<input type="hidden" name="page" value="<?=$page;?>">

<table width="90%" border="0" align="center" cellpadding="2" cellspacing="1">
	  <tr> 
		<td colspan="4" align="left"><!--<img src="images/bt0_0.gif" style="cursor:hand " onClick="location.href='?a=news_addedit&courses=<?// echo $courses;?>'">!-->
		  <table width=0 cellpadding=0 cellspacing=0 border=0>
		  <tr>
<td ><a href="?a=news_addedit&courses=<? echo $courses;?>" onMouseOver='xpe("0o");'onMouseOut='xpe("0n");'onMouseDown='xpe("0c");'><img src="../assets/images/topmenu/eng/ct0_0.gif" name=xpwb0  border=0 alt ="Add News"></a></td>
<td ><a href="#" onclick = "EditCheck();" onMouseOver='xpe("1o");'onMouseOut='xpe("1n");'onMouseDown='xpe("1c");'><img src="../assets/images/topmenu/eng/ct1_0.gif" name=xpwb1  border=0 alt ="Edit News"></a></td>
<td><a href="#" onclick = "iconfirm('?a=delcheck&courses=<? echo $courses?>','Do you want delete news?')" onMouseOver='xpe("2o");'onMouseOut='xpe("2n");'onMouseDown='xpe("2c");'><img src="../assets/images/topmenu/eng/ct2_0.gif" name=xpwb2  border=0 alt ="Del News"></a></td>
</tr></table>
		  </td>
	  <td colspan="2" align="right"><?php printpagelink();?></td>
	  </tr>
	  <tr align="center" class="boxcolor"> 
		<td width="3%"><input  type="checkbox" value="on" name="allbox" onClick="checkAll();"></td>
                              
		<td width="5%" class="main_white" >
		<? 
			if ($sort=="id desc"){ 
				
					echo "<img src=\"images/icon/desc.gif\" border=\"0\" alt=\"sort descending\" > ";
			}        		
				if ($sort=="id"){ 
					
				echo "<img src=\"images/icon/asc.gif\" border=\"0\"  alt=\"sort ascending\"> ";
			
			}
				 ?>
		 
		 <a href="<? echo "?courses=".$courses."&page=".$page."&sort=id"; if($sort=="id") echo " desc";?>"  class="a13"><?=$strCourses_NewsNo;?></a>
 
		
		
		

		
		</td>
		<td width="15%"  class="main_white"><?=$strCourses_NewsPicture;?></td>
		<td width="48%"  class="main_white">
		<? 
			
		
			
			if ($sort=="subject desc"){ 
					
					echo "<img src=\"images/icon/desc.gif\" border=\"0\" alt=\"sort descending\" > ";
			}        		
				if ($sort=="subject"){ 
					
				echo "<img src=\"images/icon/asc.gif\" border=\"0\"  alt=\"sort ascending\"> ";
			
			}
			
?>

<a href="<? echo "?courses=".$courses."&page=".$page."&sort=subject"; if($sort=="subject") echo " desc";?>"  class="a13"><?=$strCourses_NewsSubject;?></a>
			  
		
		
		
	 
	 </td>
		
		<td width="17%" class="main_white">
		
		<? 
			if ($sort=="expired_date desc"){ 
				
					echo "<img src=\"images/icon/desc.gif\" border=\"0\" alt=\"sort descending\" > ";
			}        		
				if ($sort=="expired_date"){ 
					
				echo "<img src=\"images/icon/asc.gif\" border=\"0\"  alt=\"sort ascending\"> ";
			
			}
				 ?>
		 
		 <a href="<? echo "?courses=".$courses."&page=".$page."&sort=expired_date"; if($sort=="expired_date") echo " desc";?>"  class="a13"><?=$strCourses_NewsLimit;?></a>
 
		
		
		</td>
		
		<td width="12%"   class="main_white">Action</td>
	  </tr>
	<?
														
	
	
	if ( $totalrow==0){
		echo "<tr bgcolor=\"#FFFFFF\">" ;
		echo "<td colspan=\"6\" align=\"center\" class=\"news\"><b>".$strCourses_NewsNotfound."</b></td>";
		echo "</tr>";
		exit();
		}
	$i=1;
	while ($row = mysql_fetch_array($news)) { 
	
	?>
	
	
	  <tr <? if($row["expired_date"] >= date("Y-m-d")) echo "bgcolor=\"#FFFFFF\""; else  echo "bgcolor=\"#F7F7F7\""; ?>> 
		<td width="3%" align="center"><input  type="checkbox" name="checkbox[]" value="<?=$row["id"]?>"></td>
		<td align="center"><? echo $i;?></td>
		<td align="center" class="news">
			 <? if($row["picture"]!="") {
			
			echo "<table border=\"0\"><tr><td>";
			echo "<a class=\"AS\"  href=\"?a=view&id=".$row["id"]."&courses=$courses&page=$page\"><img src=\"$myModule_Path_ThumbnailPicture/".$row["picture"]."\" width=\"80\" height=\"80\" border=\"0\"></a><br>";
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
		
				echo "<a class=\"AS\"  href=\"?a=view&id=".$row["id"]."&courses=$courses&page=$page\">".$row["subject"]."</a><br>"; 
                               
						  if(strlen($row["title"])>100) {
						  	echo nl2br(substr($row["title"],0,100))."...";
						  }  else {
						  	echo nl2br($row["title"]);
						  }
						
				
			?>
		</td>
		<td align="center">
			
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
			<a href="?a=news_addedit&id=<? echo $row["id"]; ?>&courses=<? echo $courses;?>&page=<? echo $page;?>" target="_self">
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
	<tr class="boxcolor"><td colspan="4" bgcolor="#FFFFFF"></td>
	
	<td class="Bcolor"><?echo $strCourses_NewsTotal; echo $totalrow;?></td>
	<td bgcolor="#FFFFFF"></td>
	</tr>
	</table>

                           
</form>
</body>
</html>