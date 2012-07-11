<?
require("../include/global_login.php");
mysql_query("UPDATE cases set name='".str_replace("'","&#039;",$casename)."' WHERE id=$cases;");
?>
<html>
<head>
	<title>update</title>
<script language="javascript">
	function update(){
		top.ws_menu.location.reload();
	}
</script>
<link rel="STYLESHEET" type="text/css" href="../main.css">
</head>
<body onLoad="update()" bgcolor="#ffffff">
<div align="center" class="main">Case updated.....</div>
</body>
</html>