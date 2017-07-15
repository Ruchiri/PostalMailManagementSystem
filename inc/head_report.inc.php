<?php
include "../connect.php";
$connection=connect();
if(isset($_GET['submit'])){
    $uploaddir = '../pdf/';
    $uploadfile = $uploaddir . basename($_GET['userfile']['name']);

    echo "<p>";

    if (move_uploaded_file($_GET['userfile']['tmp_name'], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Upload failed";
    }

    echo "</p>";
    echo '<pre>';
    echo 'Here is some more debugging info:';
    print_r($_GET);
    print "</pre>";
}

if(!empty($message)){
    echo "<script language='javascript'>";
    echo "alert('$message')";
    echo "</script>";
}
?>