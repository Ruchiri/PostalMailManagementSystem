<?php
include "connect.php";
include "inc/section.php";
$con = connect();
$sections = get_sections($con);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main-user-window.css" type="text/css">
    <title>ප්‍රධාන අංශය</title>
</head>
<body>
<div id="wrapper">

    <div id="banner" style="color: green">
        <h1>බෝපෙ-පෝද්දල ප්‍රාදේශීය ලේකම් කාර්යාලය
            <br>ප්‍රධාන අංශය</h1>
    </div>
    <div id="menuTop"></div>
    <div id="columnleft">
        <br>
        <button id="btn1" style="background-color:powderblue  ; width: 250px; height: 80px;" >යවන්න</button>
        <button id="btn2" style="background-color: powderblue; width: 250px; height: 80px;" >නව අංශය ඇතුලත් කිරීම</button>
        <button id="btn3" style="background-color: powderblue; width: 250px; height: 80px;" onclick="openSearch()">සොයන්න</button>
        <button id="btn4" style="background-color: powderblue; width: 250px; height: 80px;" >වාර්තා ලබා ගැනීම</button>
        <button id="btn5" style="background-color: powderblue; width: 250px; height: 80px;" >සැකසුම්</button>
        <button id="btn6" style="background-color: powderblue; width: 250px; height: 80px;" >නිවේදන</button>

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
                    document.location.href ="search.php";


                }
                btn4.onclick = function () {

                    document.location.href ="report_main_user.php";
                }
                btn5.onclick = function () {
                    document.location.href ="reset-password-section.php";

                }
                btn6.onclick = function () {
                    document.location.href = "notification_list.php";
                }

            </Script>
            <input type="hidden" id="myid" name="myidnew" />
        </form>


    </div>
    <div id="columnright">
        <form action="main-user-window.php" method="get">
            <fieldset>
                <label for="letter_count"> ලිපි ගණන :</label>
                <input type="text" name="full_count" id="full_count"><br><br>

                <?php foreach ($sections as $sec): ?>
                    <label for="section"><?php echo $sec . " :"; ?></label>
                    <input type="text" name="count"></input><br>
                <?php endforeach; ?>


            </fieldset>
        </form>


    </div>
    <div id="content">
    </div>
    <div id="footer"></div>

</div>

</body>
</html>