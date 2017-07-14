<?php
include "../connect.php";
$connection=connect();
if(isset($_GET['submit'])){
    $message='';
    if(!($_GET['choose']=="")){
            $pdf=$_GET['choose'];
            $query ="INSERT INTO head (date,report) VALUES (CURRENT_DATE,$pdf)";
            mysqli_set_charset($connection, 'utf8');
            $result=mysqli_query($connection,$query);
            if($result){
                $message="Successfully added to the database!";
            }else{
                die("database query failed ".mysqli_error($connection));
            }
    }else{
        $message="අවශ්‍ය දත්ත ඇතුලත් කර ඇත්දැයි පරීක්ෂා කරන්න";

    }
}

if(!empty($message)){
    echo "<script language='javascript'>";
    echo "alert('$message')";
    echo "</script>";
}
?>