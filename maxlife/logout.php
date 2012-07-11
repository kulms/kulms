<?
session_start();
unset($_SESSION["logged_in"]);
unset($_SESSION["susername"]);
unset($_SESSION["suid"]);
session_destroy();
header("Location: index.php")
?>
