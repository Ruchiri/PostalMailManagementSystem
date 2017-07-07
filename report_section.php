<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="yasara96";
$dbname="pmms";
$connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(mysqli_connect_errno()){
    die("database connection failed:".
        mysqli_connect_error().
        "(".mysqli_connect_errno().")"

    );

}
?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>වාර්තා ලබා ගැනීම</title>
    <link rel="stylesheet" href="css/report_section.css">


</head>
<body>
    <div class="heading">
        <p><strong>වාර්තා ලබා ගැනීම</strong></p>
    </div><!--Heading-->

    <div class="Choose-date">
        <form action="" method="get">
        <ul>
            <p><strong>අදාල කාල පරාසය තෝරන්න</strong></p>
            <div class=" Start-date">
                <ul>
                    <p>ආරම්භක සෙවුම් දිනය</p>
                    <input type="date" name="date1"/>
                </ul>
            </div><!--start-date-->
            <div class="End-date">
                <ul>
                    <p>අවසාන සෙවුම් දිනය</p>
                    <input type="date" name="date2"/>
                </ul>
            </div><!--End-date-->
            <div class="generate">
                <input type="submit" name="submit" value="වාර්තා ලබා ගැනීම" id="btn">
            </div>

        </ul>
        </form>
    </div><!--Choose-date-->

    <div class="Report-results">
        <table border="=1" cellpadding="10" cellspacing="3" width="100%">
            <tr>
                <th>අනු අංකය</th>
                <th>ලියාපදිංචි අංකය</th>
                <th>දිනය</th>
                <th>ලිපිය එවූ පාර්ශවය</th>
                <th>විෂය</th>
                <th>පිලිතුරු සපයා ඇත්ද</th>

            </tr>
            <tbody>
            <?php
            if(isset($_GET['submit'])) {
                if (!empty($_GET['date1']) && !empty($_GET['date2'])) {
                    $date1=$_GET['date1'];
                    $date2=$_GET['date2'];
                    $query ="SELECT id,reg_no,date,sender,subject,replied FROM letter WHERE date BETWEEN  '$date1' AND '$date2' ";
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
                    $message = "Please enter the relevant time period!";
                }
            }
            if(!empty($message)){
                echo $message;
            }
            ?>
        </table>
    </div><!--Search-results-->
</body>
</html>