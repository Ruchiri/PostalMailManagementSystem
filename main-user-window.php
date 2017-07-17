<?php
error_reporting(E_ALL ^ E_NOTICE);
include "connect.php";
include "inc/section.php";
$con = connect();
$sections = get_sections($con);


function take_records($connection)
{
    include "inc/letter_record.php";
    mysqli_set_charset($connection, 'utf8');
    $today = date('Y-m-d');
    $cmd1 = "SELECT *FROM letter WHERE date='$today'ORDER BY date DESC LIMIT 50";
    $query1 = mysqli_query($connection, $cmd1);
    $count1 = mysqli_num_rows($query1);
    if ($count1 < 50) {
        $cmd2 = "SELECT  *FROM letter ORDER BY date DESC LIMIT 50";
        $query = mysqli_query($connection, $cmd2);
    } else {
        $query = $query1;
    }

    $rows = [];
    while ($row = $query->fetch_array()) {
        $reco_obj = new letter_record($row['id'], $row['date'], $row['section'], $row['subject'], $row['sender'], $row['rec_letter'], $row['ref_id'],$row['replied']);
        if (!empty($row['reg_no'])) {
            $reco_obj->setRegNo($row['reg_no']);
        }

        $rows[] = $reco_obj;

    }
    return $rows;
}

$today = date('Y-m-d');


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main-user-window.css" type="text/css">
    <title>ප්‍රධාන අංශය</title>
</head>
<body>
<div id="wrapper">
    <div class="top-bar">
        <img src="img/new.jpg" alt="new" width="1350">
    </div>

    <div id="banner" style="color: green">
        <h1>බෝපෙ-පෝද්දල ප්‍රාදේශීය ලේකම් කාර්යාලය
            <br>ප්‍රධාන අංශය</h1>
    </div>

    <div class="content">
        <div class="columnleft">
            <br>
            <button id="btn1" style="background-color:powderblue  ; width: 250px; height: 80px;">යවන්න</button>
            <button id="btn2" style="background-color: powderblue; width: 250px; height: 80px;">නව අංශය ඇතුලත් කිරීම
            </button>
            <button id="btn3" style="background-color: powderblue; width: 250px; height: 80px;" onclick="openSearch()">
                සොයන්න
            </button>
            <button id="btn4" style="background-color: powderblue; width: 250px; height: 80px;">වාර්තා ලබා ගැනීම
            </button>
            <button id="btn5" style="background-color: powderblue; width: 250px; height: 80px;">සැකසුම්</button>
            <button id="btn6" style="background-color: powderblue; width: 250px; height: 80px;">නිවේදන</button>

            <form action="<?php $_PHP_SELF ?>" method="get">

                <Script>
                    var page = "";
                    var btn1 = document.getElementById("btn1");
                    var btn2 = document.getElementById("btn2");
                    var btn3 = document.getElementById("btn3");
                    var btn4 = document.getElementById("btn4");
                    var btn5 = document.getElementById("btn5");
                    var btn6 = document.getElementById("btn6");
                    btn1.onclick = function () {
                        document.location.href = "send.php";

                    }

                    btn2.onclick = function () {
                        document.location.href = "add-new-section.php";

                    }
                    btn3.onclick = function () {
                        document.location.href = "search.php";


                    }
                    btn4.onclick = function () {

                        document.location.href = "report_main_user.php";
                    }
                    btn5.onclick = function () {
                        document.location.href = "reset-password-section.php";

                    }
                    btn6.onclick = function () {
                        document.location.href = "notification_list.php";
                    }

                </Script>
                <input type="hidden" id="myid" name="myidnew"/>
            </form>
        </div>

        <div class="mid-content">
            <br>
            <?php $records = take_records($con);
            $flag=0;
            ?>
            <?php foreach ($records as $reco):
                if($reco->getDate()!=$today){
                    $flag++;
                }
                if($flag==1){
                    echo "<strong>"."පෙර වාර්තා"."</strong>";
                }

                ?>

                <div class="letter-reco">
                    <ul id="details">
                        <li><?php echo "දිනය :" . $reco->getDate(); ?></li>
                        <li><?php echo "අංශය :" . $reco->getSection(); ?></li>
                        <li><?php echo "විෂය :" . $reco->getSubject(); ?></li>
                        <li><?php echo "ලිපිය එවූ පාර්ශවය :" . $reco->getSender(); ?></li>
                        <li id="resend"><a href="resend.php?letter_id=<?php echo $reco->getId(); ?>"><strong>නැවත යොමු
                                    කිරීම.</strong></a></li>
                        <li id="view"><a
                                    href="letter_record_window.php?id=<?php echo $reco->getId() ?>&thisSection=<?php "mu" ?>"><strong>යොමුව.</strong></a>
                        </li>
                    </ul>
                </div><br>
            <?php endforeach; ?>
        </div>


        <div class="columnright">
            <br>
            <form action="main-user-window.php" method="get">
                <fieldset>
                    <?php $total = 0; ?>
                    <?php foreach ($sections as $section):
                        $sec = new section($section);
                        $count = $sec->getTodayLetterCount($con);
                        $total = $total + $count;
                        ?>
                        <label for="section"><?php echo $section . " :"; ?></label>
                        <input type="text" name="count" value=<?php echo $count; ?>><br>
                    <?php endforeach; ?>
                    <br>
                    <label for="letter_count"> ලිපි ගණන :</label>
                    <input type="text" name="full_count" id="full_count" value=<?php echo $total; ?>><br>

                </fieldset>
            </form>

            <button id="auto" name="auto" onclick="document.location.href='autogenerate-report.php'">
                මාසික වාර්තා
            </button>
        </div>
    </div>
    <div id="footer"></div>

</div>

</body>
</html>

