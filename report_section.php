<?php
include ("connect.php");
?>
<!DOCTYPE html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF8">
    <meta charset="UTF-8">
    <title>වාර්තා ලබා ගැනීම</title>
    <link rel="stylesheet" href="css/report_section.css">
</head>
<body>
<div class="Background">
    <div class="system">
        <img src="img/new.jpg" alt="new">
    </div>
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
             <div class="buttons">
            <div class="generate">
                <input type="submit" name="a" onclick="function report()" value="වාර්තා ලබා ගැනීම">
            </div>
            <div class="Take-pdf">
                <input type="submit" name="b" onclick="function reportPdf()" value="වාර්තාව PDF අයුරින් ලබා ගැනීම">
            </div>
            <div class="Send-head">
                <input type="submit" name="c" onclick="function send()" value="වාර්තාව ප්‍රධාන නිලධාරිට යැවීම">

            </div>
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
                if(array_key_exists('a',$_GET)){
                    report();
                }
                if(array_key_exists('b',$_GET)){
                    reportPdf();
                }
                if(array_key_exists('c',$_GET)){
                    send();
                }
                function report(){
                    $dbhost = "localhost";
                    $dbuser = "root";
                    $dbpass = "yasara96";
                    $dbname = "pmms";
                    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

                    if (mysqli_connect_errno()) {
                        die("Database connection failed:" . mysqli_connect_error() . "(" . mysqli_connect_error() . ")");

                    }
                    if(isset($_GET['a'])) {
                        if (!empty($_GET['date1']) && !empty($_GET['date2'])) {
                            $date1=$_GET['date1'];
                            $date2=$_GET['date2'];
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
                            $message = "අවශ්‍ය කාල පරාසය තෝරා ඇත්දැයි පරීක්ෂා කරන්න";
                        }
                    }
                    if(!empty($message)){
                        echo "<script language='javascript'>";
                        echo "alert('$message')";
                        echo "</script>";
                    }
                }
                function reportPdf(){
                    //section_user_report.inc.php
                }
                function send(){

                }
            ?>
        </table>
    </div><!--Search-results-->
</div><!--Background-->
</body>
</html>