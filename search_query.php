<?php
/**
 * Created by PhpStorm.
 * User: Supimi
 * Date: 7/4/2017
 * Time: 11:28 AM
 */
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "123";
$dbname = "postMailManagementSys";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno()) {
    die("Database connection failed:" . mysqli_connect_error() . "(" . mysqli_connect_error() . ")");
}

function get_query($str)
{
    $crt_array = explode(",", $str);
    $query = "SELECT ";
    foreach ($crt_array as $value) {
        $query .= "$value, ";
    }
    $query .= 'from letter_details';
    echo $query;
}

?>

<?php

$query = "SELECT * from login_tbl";
$result = mysqli_query($connection, $query);

//if query is failed
if (!$result) {
    die("database query failed.");
}
?>


<?php

while ($row = mysqli_fetch_assoc($result)) {
    //  var_dump($row);
    //print_r($row);
    //print_r(get_defined_vars($row));
    /*echo "<hr/>";
    echo $row["id"]."<br/>";
    echo $row["user_name"]."<br/>";
    echo $row["password"]."<br/>";
    echo "<hr/>";*/
}
?>