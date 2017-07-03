<?php
    include 'connect.php';

    if(isset($_POST['Submit'])){
        $username=mysqli_real_escape_string($_POST['name']);
        $password=mysqli_real_escape_string($_POST['password']);
        echo $username;
        echo $password;
        if(!isset($username)|| $username=='' || !isset($password) || $password==''){
            $error="Please fill in name and password";
            header("Location : add-new-section.php?error=".urlencode($error));
            exit();
        }else{
            $query= "INSERT INTO login (username,password) VALUES ('$username','$password')";
            if(!mysqli_query($conection,$query)){
                die('Error :'.mysqli_error($conection));
            }else{
                header("Location : add-new-section.php");
                exit();
            }
        }
    }

?>

