
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
                    window.open("send.php");


                }

                btn2.onclick = function () {
                    window.open("add-new-section.php");

                }
                btn3.onclick = function () {
                    window.open("search.php");


                }
                btn4.onclick = function () {

                    window.open("report_main_user.php");
                }
                btn5.onclick = function () {
                    window.open("reset-password-section.php");

                }
                btn6.onclick = function () {
                    window.open("notification_list.php")
                }

            </Script>
            <input type="hidden" id="myid" name="myidnew" />
        </form>


    </div>
    <div id="columnright">
        <form action="main-user-window.php" method="get">
            <fieldset>
                <label for="lbl1"> ලිපි ගණන :</label>
                <input type="text" id="lbl1"><br>

                <label for="lbl2">ආයතන :</label>
                <input type="text" id="lbl2"><br>

                <label for="lbl3">ගිනුම් අංශය :</label>
                <input type="text" id="lbl3"><br>

                <label for="lbl4">සංවර්ධන අංශය :</label>
                <input type="text" id="lbl4"><br>

                <label for="lbl5">ඉඩම් අංශය :</label>
                <input type="text" id="lbl5"><br>

                <label for="lbl6">සමාජ සේවා අංශය :</label>
                <input type="text" id="lbl6"><br>

                <label for="lbl7">දිවි නැගුම අංශය :</label>
                <input type="text" id="lbl7"><br>

                <label for="lbl8">ක්ෂේත්‍ර :</label>
                <input type="text" id="lbl8"><br>

                <label for="lbl9">ලියාපදිංචි අංශය :</label>
                <input type="text" id="lbl9"><br>

                <label for="lbl10">මුදල් හා චෙක්පත් අංශය :</label>
                <input type="text" id="lbl10"><br>

                <label for="lbl11">ප්‍රධාන නිලධාරී :</label>
                <input type="text" id="lbl11"><br>

            </fieldset>
        </form>


    </div>
    <div id="content">
    </div>
    <div id="footer"></div>

</div>

</body>
</html>