
<!DOCTYPE html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF8">
    <meta charset="UTF-8">
    <title>වාර්තා ලබා ගැනීම</title>
    <link rel="stylesheet" href="css/report_main_user.css">


</head>
<body>
    <form action="<?php $_PHP_SELF ?>"  method="get">
    <div class="heading">
        <p><strong>වාර්තා ලබා ගැනීම <br>අංශය</strong></p>
    </div><!--Heading-->
    <div class="selection">
        <div class="Choose-date">
            <ul>
                <p><strong>අදාල කාල පරාසය තෝරන්න</strong></p>
                <div class=" Start-date">
                    <ul>
                        <p>ආරම්භක සෙවුම් දිනය</p>

                        <input type="date" id="start_date" name="start_date" />
                        <input type="text" id="dog" name="dog" value="cat">

                    </ul>
                </div><!--start-date-->
                <div class="End-date">
                    <ul>
                        <p>අවසාන සෙවුම් දිනය</p>
                        <input type="date" id="end_date" name="end_date"/>
                    </ul>

                </div><!--End-date-->

            </ul>

        </div><!--Choose-date-->
        <div class="Section">
            <ul>
                <p>අංශය</p>
                <input type="text" list="sections">
                <datalist id="sections">
                    <option> ප්‍රධාන පරිශීලක</option>
                    <option> ආයතන</option>
                    <option> ගිනුම් අංශය</option>
                    <option> සංවර්ධන අංශය</option>
                    <option> ඉඩම් අංශය</option>
                    <option> සමාජ සේවා අංශය</option>
                    <option> දිවි නැගුම අංශය</option>
                    <option> ක්ෂේත්‍ර</option>
                    <option> ලියාපදිංචි අංශය</option>
                    <option> මුදල් හා චෙක්පත් අංශය</option>
                    <option> ප්‍රධාන නිලධාරී</option>
                </datalist>
            </ul>

        </div><!--Section-->
    </div>    <!--Selection-->
    <div class="generate">
        <input type="button" name="btn" id="btn" value="වාර්තා ලබා ගැනීම">
        <script>
            btn=document.getElementById('btn');
            btn.onclick = function () {
                alert('onclick is working');
                <?php
                include ('dbconnectedPiyu.php');
                $start_date = $_GET['start_date'];
                if(empty($start_date)){
                    echo "<script>alert('start date empty')</script>";
                }else{
                    echo  "<script>alert('start date not empty')</script>";
                }
                $end_date    = $_GET['end_date'];
                $report_date = $start_date;
                while($end_date > $report_date){
                    echo "<script>alert('i am in while')</script>";
                    $queryReport = "select letter.id,letter.date,letter.subject
                               from letter
                               where letter.date = $report_date";
                    echo $queryReport;
                    $result = mysqli_query($connection, $queryReport);
                    echo $result;
                    $report_date = $report_date + 1;
                    while($row = mysqli_fetch_array($connection,$result)){
                        $id = $row['id'];
                        $date = $row['date'];
                        $subject = $row['subject'];

                    }
                }

                ?>


            }
        </script>

<!--        <button name="btngen" id="btngen">වාර්තා ලබා ගැනීම</button>-->
    </div>
    <div class="Report-results">
        <p>ප්‍රතිඵල...</p>
        <table border="3" class="table">
            <tr>
                <th>අනු අංකය</th>
                <th>දිනය</th>
                <th>විෂය</th>
            </tr>

        </table>
    </div><!--Search-results-->

    </form>

</body>
</html>