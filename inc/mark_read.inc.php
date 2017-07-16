<?php

$cor=$_GET['id'];

function markReply($cor)
{   include "../connect.php";
    $con=connect();
    $rep=1;
    $sql = "UPDATE letter SET replied='{$rep}' WHERE id='{$cor}'";
    mysqli_query($con,$sql);
}
markReply($cor);
header('Location:..\section.php');
?>