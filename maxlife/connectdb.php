<?php 
require_once 'jq-config.php'; 

// Connection to the server 

$conn = mysql_connect("localhost",DB_USER,DB_PASSWORD);
if (!$conn){
	die('ติดต่อฐานข้อมูลไม่ได้ เนื่องจาก: ' . mysql_error());
}

$db_selected = mysql_select_db('maxlearn', $conn);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}
?>