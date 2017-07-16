<?php
include "connect.php";
$connection=connect();
session_start();
$section = $_SESSION['section'];
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
                    $date1 = $_GET['date1'];
                    $date2 = $_GET['date2'];
                    echo "$date1 සහ $date2 කාල පරාසය තුල වාර්තව";

                    $query = "SELECT id,reg_no,date,sender,subject,replied FROM letter WHERE section='$section' AND date BETWEEN  '$date1' AND '$date2'";
                    mysqli_set_charset($connection, 'utf8');
                    $result = mysqli_query($connection, $query);
                    if ($result) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['reg_no'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['sender'] . "</td>";
                            echo "<td>" . $row['subject'] . "</td>";
                            echo "<td>" . $row['replied'] . "</td>";
                        }
                    } else {
                        die("database query failed " . mysqli_error($connection));
                    }

            }
            ?>
        </table>
        <script type="text/javascript">
            var report;
            function printReport() {
                report = this.print();
            }
        </script>
        <script>
            printReport();
        </script>

    </div><!--Details-->
</body>
</html>