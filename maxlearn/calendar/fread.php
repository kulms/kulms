<?require("../include/global_login.php");
// get contents of a file into a string
$filename = "http://".$person["login"].":".$person["password"]."@".$SERVER_NAME."/".$path."/calendar/tableview.php";

$fd = fopen( $filename, "r" );
$contents = fread( $fd, filesize( $filename ) );
?>
<html>
<head>
	<title></title>
</head>
<body>
<?echo nl2br($contents)?>

<?fclose( $fd );?>
</body>
</html>
