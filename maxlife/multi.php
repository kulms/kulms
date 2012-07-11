
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Insert Record with jQuery and Ajax</title>
  
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$(".comment_button").click(function(){

var element = $(this);
var I = element.attr("id");

$("#slidepanel"+I).slideToggle(300);
$(this).toggleClass("active"); 

return false;});});
</script>
<style type="text/css">
body
{
font-family:Arial, Helvetica, sans-serif;
font-size:12px;
}
.comment_box
{
background-color:#D3E7F5; border-bottom:#ffffff solid 1px; padding-top:3px
}
h1
{
color:#555555
}
a
	{
	text-decoration:none;
	color:#d02b55;
	}
	a:hover
	{
	text-decoration:underline;
	color:#d02b55;
	}
	*{margin:0;padding:0;}
	
	
	ol.timeline
	{list-style:none;font-size:1.2em;}ol.timeline li{ position:relative;padding:.7em 0 .6em 0;  height:45px; border-bottom:#dedede dashed 1px}ol.timeline li:first-child{border-top:1px dashed #dedede;}
	.comment_button
	{
	margin-right:30px; background-color:#95CD3C; color:#000; border:#333333 solid 1px; padding:3px;font-weight:bold; font-size:11px; font-family:Arial, Helvetica, sans-serif
	}
	
	.comment_submit
	{
	background-color:#3b59a4; color:#FFFFFF; border:none; font-size:11px; padding:3px; margin-top:3px;
	}
	.panel
	{
	margin-left:50px; margin-right:50px; margin-bottom:5px; background-color:#D3E7F5; height:45px; padding:6px; width:400px;
	display:none;
	}
</style>
</head>

<body>


<div align="center">
<table cellpadding="0" cellspacing="0" width="500px">
<tr>
<td>
<div> <h1>Click Comment Button</h1> </div>
<div style="height:7px"></div>


<ol  id="update" class="timeline">
<?php
$dbHost = 'localhost'; 
$dbUsername = 'root';
$dbPassword = 'password';
$dbDatabase = 'facebook';
$db = mysql_connect($dbHost, $dbUsername, $dbPassword) or die ("Unable to connect to Database Server.");
mysql_select_db ($dbDatabase, $db) or die ("Could not select database.");
$sql = mysql_query("SELECT p_id,post FROM facebook_posts");
while($row=mysql_fetch_array($sql))
{
$msg=$row['post'];
$msg_id=$row['p_id'];
?>

<li>
<div align="left">
<h1><?php echo $msg; ?></h1>
<a href="#" class="comment_button" id="<?php echo $msg_id; ?>">Comment</a>
</div>
</li>
<div class='panel' id="slidepanel<?php echo $msg_id; ?>">
<form action="" method="post">
<textarea style="width:390px;height:23px"></textarea><br />
<input type="submit" value=" Comment "  class="comment_submit" />
</form>
</div>
<?php } ?>

</ol>

</td>
</tr>
</table>






</div>
</body>
</html>
