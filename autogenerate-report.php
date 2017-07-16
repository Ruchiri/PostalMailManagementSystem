<?php
include "inc/section_query.inc.php";
include "connect.php";
$con = connect();
$sections = get_sections($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF8">
    <meta charset="UTF-8">
    <title>Monthly report</title>
    <link rel="stylesheet" href="css/autogenerate-report.css">
</head>
<body>

<div class="Background">
    <div class="system">
        <img src="img/new.jpg" alt="new">
    </div>
    <div class="wrapper">
        <h1>මාසික වාර්තාව</h1>
    </div><!--wrapper-->
    <div class="report">
        <?php for ($j = 0; $j < sizeof($sections); $j++): ?>
            <p><?php echo "$sections[$j] අංශයෙහි මාසික වාර්තාව"; ?></p>
            <table border="=1" cellpadding="10"  width="100%">
                <tr>
                    <th>ලියාපදිංචි අංකය</th>
                    <th>දිනය</th>
                    <th>ලිපිය එවූ පාර්ශවය</th>
                    <th>විෂය</th>
                    <th>පිලිතුරු සපයා ඇත්ද</th>

                </tr>
                <tbody>
                    <?php
                    $curyear=2000+date("y");
                    $curmonth=date("m");
                    $month=$curmonth-01;
                    $date1;
                    $date2;
                    if($curmonth!=1){
                        $date1=$curyear."0".$month."01";
                        $date1=date('Y-m-d',strtotime($date1));
                        echo $date1;
                        $date2=$curyear.$curmonth."01";
                        $date2=date('Y-m-d',strtotime($date2));
                        echo $date2;
                    }else{
                        $year=$curyear-1;
                        $date1=$year."12"."01";
                        $date1=date('Y-m-d',strtotime($date1));
                        echo $date1;
                        $date2=$curyear.$curmonth."01";
                        $date2=date('Y-m-d',strtotime($date2));
                        echo $date2;
                    }
                    $query = "SELECT reg_no,date,sender,subject,replied FROM letter WHERE section='$sections[$j]' AND date BETWEEN  '$date1' AND '$date2'";
                    $result=mysqli_query($con,$query);
                    if($result){
                        while ($row=mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>".$row['reg_no']."</td>";
                            echo "<td>".$row['date']."</td>";
                            echo "<td>".$row['sender']."</td>";
                            echo "<td>".$row['subject']."</td>";
                            echo "<td>".$row['replied']."</td>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        <?php endfor; ?>

    </div><!--Report-->
</div><!--Background-->

</body>
</html>