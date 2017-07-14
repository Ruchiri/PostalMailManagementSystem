<?php
include "connect.php";
$connection=connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF8">
    <meta charset="UTF-8">
    <title>Report</title>
    <link rel="stylesheet" href="css/report.css">
</head>
<body>
    <div class="heading">
        <p>වාර්තාව</p>
    </div><!--Heading-->

    <div class="Details">
        <table border="=1" cellpadding="10" cellspacing="1" width="100%">
            <tr>
                <th>අනු අංකය</th>
                <th>ලියාපදිංචි අංකය</th>
                <th>දිනය</th>
                <th>ලිපිය එවූ පාර්ශවය</th>
                <th>විෂය</th>
                <th>පිලිතුරු සපයා ඇතිද යන වග</th>

            </tr>
            <tbody>
            <?php
            if(isset($_GET['report'])) {
                if (!empty($_GET['date1']) && !empty($_GET['date2'])) {
                    $date1=$_GET['date1'];
                    $date2=$_GET['date2'];
                    echo "$date1 සහ $date2 කාල පරාසය තුල වාර්තව";

                    $query ="SELECT id,reg_no,date,sender,subject,replied FROM letter WHERE date BETWEEN  '$date1' AND '$date2' ";
                    mysqli_set_charset($connection, 'utf8');
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
                } else {
                    $message = "අදාල කාල පරාසය තෝරා ඇත්දැයි පරීක්ෂා කරන්න";
                }
            }
            if(!empty($message)){
                echo "<script language='javascript'>";
                echo "alert('$message')";
                echo "</script>";
            }

            ?>
        </table>
        <form method="post" action="" >
            <input type="button" onclick="window.print()" name="print" value="මුද්‍රනය කිරීම" >
        </form>
    </div><!--Details-->
</body>
</html>