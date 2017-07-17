<?php
error_reporting(E_ALL ^ E_NOTICE);
include "connect.php";
$connection = connect();
$reference = $_GET['ref_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF8">
    <meta charset="UTF-8">
    <title>History of a letter</title>
    <link rel="stylesheet" href="css/history-of-a-letter.css">
</head>
<body>

<div class="Background">
    <div class="system">
        <img src="img/new.jpg" alt="new">
    </div>
    <div class="wrapper">
        <h1>ලිපියේ ඉතිහාසය</h1>
    </div><!--wrapper-->
    <div class="history">
        <?php
        $query = "SELECT id,reg_no,date,sender,subject,section,replied FROM letter WHERE ref_id= $reference";
            mysqli_set_charset($connection, 'utf8');
            $result=mysqli_query($connection,$query);
        ?>
        <table border="=1" cellpadding="10"  width="100%">
            <tr>
                <th>අනු අංකය</th>
                <th>ලියාපදිංචි අංකය</th>
                <th>දිනය</th>
                <th>ලිපිය එවූ පාර්ශවය</th>
                <th>විෂය</th>
                <th>අංශය</th>
                <th>පිලිතුරු සපයා ඇත්ද</th>

            </tr>
            <tbody>
                <?php
                if($result){
                    while ($row=mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['reg_no']."</td>";
                        echo "<td>".$row['date']."</td>";
                        echo "<td>".$row['sender']."</td>";
                        echo "<td>".$row['subject']."</td>";
                        echo "<td>".$row['section']."</td>";
                        if ($row['replied']==0) {
                            echo "<td>" . "නැත" . "</td>";
                        }else{
                            echo "<td>" . "ඔව්" . "</td>";
                        }
                    }
                }

                ?>
            </tbody>
        </table>
    </div><!--History-->
</div><!--Background-->

</body>
</html>