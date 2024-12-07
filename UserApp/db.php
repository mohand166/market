<?php
$db_host = 'localhost';  
$db_user = 'root';       
$db_pass = '';          
$db_name = 'userapp';   

$con = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($con->connect_error) {
    error_log("Database connection failed: " . $con->connect_error, 3, __DIR__ . '/error_log.log');
    die("Internal server error. Please try again later."); 
}

if (!$con->set_charset("utf8")) {
    error_log("Error loading character set utf8: " . $con->error, 3, __DIR__ . '/error_log.log');
    die("Internal server error. Please try again later.");
}

?>
