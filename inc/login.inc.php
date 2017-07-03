<?php
$error='';//Variable to store error message
if(isset($_POST['Submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    } else {
//Get values paassd from form in login.php file
        $username = $_POST['username'];
        $password = $_POST['password'];

        //connect the server and select the database
        $con = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($con, "pmms");


//query the database for user
        $result = mysqli_query($con, "select * from login where username='$username' and password='$password'");

        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
             header("Location:send.php");

        } else {
            $error = "Username or Password is invalid";

        }
        mysqli_close($con);
    }
}
?>