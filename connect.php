<?php
error_reporting(E_ALL ^ E_NOTICE);
function connect()
{
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'pmms');
    define('DB_USER','root');
    define('DB_PASSWORD','123');

    $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
    $db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());
    return $con;
}
?>
