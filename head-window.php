<?php
include ("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF8">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="css/head.css">
</head>
<body>
<div class="Background">
    <div class="system">
        <img src="img/new.jpg" alt="bope">
    </div>
    <div class="heading">
        <p>ලැබී ඇති වාර්තා ලැයිස්තුව</p>
    </div><!--Heading-->
    <div class="Report">
        <table border="=1" cellpadding="10" cellspacing="3" width="100%">
            <tr>
                <th>දිනය</th>
                <th>වාර්තාව</th>
            </tr>
            <tbody>
            <?php
                $query ="SELECT date,report FROM head";
                $result = mysqli_query($connection, $query);
                if ($result) {
                    while ($row=mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['reg_no']."</td>";
                        echo "<td>".$row['date']."</td>";
                        echo "<td>".$row['sender']."</td>";
                        echo "<td>".$row['subject']."</td>";
                        echo "<td>".$row['replied']."</td>";
                    }
                } else {
                    die("database query failed " . mysqli_error($connection));
                }
            if(!empty($message)){
                echo "<script language='javascript'>";
                echo "alert('$message')";
                echo "</script>";
            }
            ?>
        </table>
    </div><!--Report-->
</div><!--Background-->
</body>
</html>