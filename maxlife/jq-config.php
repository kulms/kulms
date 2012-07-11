<?php
// ** MySQL settings ** //
//define('DB_NAME', 'northwind');    // The name of the database
//define('DB_HOST', 'localhost');    // 99% chance you won't need to change this value
//define('DB_DSN','mysql:host=localhost;dbname=engkur3');
define('DB_DSN','mysql:host=localhost;dbname=maxlearn');
define('DB_USER', 'root');     // Your MySQL username
define('DB_PASSWORD', 'password'); // ...and password

//define('LMS_HOST', 'http://192.168.1.3/lms/'); 
//define('WALL_HOST', 'http://192.168.1.3/wallpost/');

define('LMS_HOST', 'http://localhost/lms/'); 
define('WALL_HOST', 'http://localhost/wallpost/');


define('ABSPATH', dirname(__FILE__).'/');
//require_once(ABSPATH.'tabs.php');
?>