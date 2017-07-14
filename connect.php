<?php
function connect()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "123";
    $dbname = "pmms";

//connection established
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (mysqli_connect_errno()) {
        die("Database connection failed:" . mysqli_connect_error() . "(" . mysqli_connect_error() . ")");

    }
    return $connection;
}

?>
