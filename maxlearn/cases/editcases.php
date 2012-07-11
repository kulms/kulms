<?
require("../include/global_login.php");
if($groups==""){
	$groups=0;
}
if($cases==""){
	$cases=0;
}
if($folders==""){
	$folders=0;
}
?>
<html>
<head>
	<title>Case administration - folders</title>
<link rel="STYLESHEET" type="text/css" href="../main.css">
<script language="javascript">
function rename_check(){
	if(document.renameform.foldername.value==""){
		alert("You can't have an empty foldername");
		return false;
	}else{
		return true;
	}
}

function create_check(){
	if(document.createform.name.value==""){
		alert("You can't have an empty name");
		return false;
	}else{
		return true;
	}
}


function delete_check(){
	if(confirm("Do you really want to delete "+document.renameform.casename.value+" and all it´s content?")){
		if(confirm("Are you really...REALLY sure?\nThis action can't be undone.")){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}
</script>
</head>
<body bgcolor="#ffffff">
<div align="center">
<h1 class="h1">Edit/Add</h1>
<table border="0" cellpadding="2" cellspacing="0">
<?
$admincheck=mysql_query("SELECT users FROM courses WHERE id=$courses");
$c_admin = mysql_result($admincheck,0,"users");
mysql_free_result($admincheck);
$c=mysql_query("SELECT * from cases where id=$cases");
if($person["admin"]==1 || $c_admin==$person["id"] || mysql_result($c,0,"users")==$person["id"]){
	?>
	<tr>
		<td class="main" align="left" valign="top">
			Rename case:
		</td>
		<form action="renamecase.php" method="post" onSubmit="return rename_check();" name="renameform">
			<td colspan="2" class="main" align="right" valign="top">
				<input type="text" name="casename" maxlength="10" size="15" value="<?echo mysql_result($c,0,"name")?>" class="small">
				<input type="hidden" name="cases" value="<?echo $cases?>">
				<input type="hidden" name="courses" value="<?echo $courses?>">
				<input type="submit" value="Update" class="small"></form>
			</td>
	</tr>
	<tr>
		<td class="main" align="left" valign="top">
			Case status:
		</td>
		<td class="main" align="left" valign="top">
			<?
			if(mysql_result($c,0,"active")==1){
				echo 'Case is <b>Active</b></td>';
				?>
				<td class="main" align="left" valign="top">
				<form action="active.php" method="get"><input type="hidden" name="active" value="0"><input type="hidden" name="cases" value="<?echo $cases?>"><input type="submit" value="Deactivate"></form>
				<?
			}else{
				echo 'Case is <b>NOT Active</b><br>';
				?>
				<td class="main" align="left" valign="top">
				<form action="active.php" method="get"><input type="hidden" name="active" value="1"><input type="hidden" name="cases" value="<?echo $cases?>"><input type="submit" value="Activate"></form>
				<?
			}
			?>
		</td>
	</tr>
	<tr>
		<td class="main" align="left" valign="top">
			Delete case:
		</td>
		<form action="../courses/delete.php" method="post" onSubmit="return delete_check();" name="deleteform">
			<td class="main" align="right" valign="top" colspan="2">
				<input type="hidden" name="del" value="case">
				<input type="hidden" name="case" value="<?echo $cases?>">
				<input type="hidden" name="folder" value="<?echo $folders?>">
				<input type="hidden" name="courses" value="<?echo $courses?>">
				<input type="submit" value="Delete" class="small">
			</td>
		</form>
	</tr>		  
	<?
}
$ot=array();
if($person["admin"]==1 || $c_admin==1){
	$modulestype=mysql_query("SELECT mt.id,mt.name,mt.picture FROM modules_type mt WHERE mt.active=1;");
	$othertype=mysql_query("SELECT modules_type FROM wp_access WHERE modules_type<0;");
	$ot[]=-1;
	$ot[]=-3;
}else{
	$modulestype=mysql_query("SELECT mt.id,mt.name,mt.picture FROM wp_access wa,modules_type mt WHERE wa.courses=$courses AND wa.modules_type=mt.id AND mt.active=1;");
	$othertype=mysql_query("SELECT modules_type FROM wp_access WHERE modules_type<0 AND courses=$courses;");
	while($row=mysql_fetch_array($othertype)){
		$ot[]=$row["modules_type"];
	}
}
if(mysql_num_rows($modulestype)!=0 || count($ot)!=0){
	?>
	<tr>
		<td colspan="2">
			<hr noshade size="2" width="300">
		</td>
	</tr>
	<form action="../courses/createmodule.php" name="createform" method="post" onSubmit="return create_check();">
	<input type="hidden" name="folders" value="<?echo $folders?>">
	<tr>
		<td class="main" align="left" valign="top">
			Create new:
		</td>
		<td class="main">
			<b><?echo $foldername?>/</b><input type="text" name="name" class="small" maxlength="10">
		</td>
	</tr>
	<?
	while(list($key,$val)=each($ot)){
		switch($val){
			case -1:
				?>
				<tr>
					<td align="right">
						<input type="radio" name="modules_type" value="<?echo $val?>" checked>
					</td>
					<td class="main">
						<img src="../images/folder.gif" alt="" width=18 height=16>
						<b>Folder</b>
					</td>
				</tr>
				<?
				break;
			case -2:
				if(($groups==0) && ($cases==0)){
				?>
				<tr>
					<td align="right">
						<input type="radio" name="modules_type" value="<?echo $val?>">
					</td>
					<td class="main">
						<img src="../images/cases.gif" alt="" width=20 height=16>
						<b>Case</b>
					</td>
				</tr>
				<?
				}
				break;
			case -3:
				if($groups==0){
				?>
				<tr>
					<td align="right">
						<input type="radio" name="modules_type" value="<?echo $val?>">
					</td>
					<td class="main">
						<img src="../images/groups.gif" alt="" width=20 height=16>
						<b>Group</b>
					</td>
				</tr>
				<?
				if($c_admin==1 || $person["admin"]==1){
					?>
					<tr>
						<td align="right">
						</td>
						<td class="main">
							<img src="../images/groups.gif" alt="" width=20 height=16>
							<b><a href="../groups/addexisting.php?courses=<?echo $courses?>&cases=<?echo $cases?>&folders=<?echo $folders?>">Add existing group</a></b>
						</td>
					</tr>
					<?
				}
				}
				break;

		}
	}
	while($row=mysql_fetch_array($modulestype)){
		?>
		<tr>
			<td align="right">
				<input type="radio" name="modules_type" value="<?echo $row["id"]?>">
			</td>
			<td class="main">
				<img src="../<?echo $row["picture"]?>" align="top" width=18 height=16>
				<b><?echo $row["name"]?></b>
			</td>
		</tr>
		<?
	}
	?>

	<tr>
		<td colspan="2" align="center" class="small" valign="top">
				<input type="hidden" name="courses" value="<?echo $courses?>">	
				<input type="hidden" name="cases" value="<?echo $cases?>">	
				<input type="hidden" name="groups" value="<?echo $groups?>">	
			<input type="submit" value=" C r e a t e ">
		</td>
	</tr>
	</form>
<?}?>
</table>
</div>
</body>
</html>
