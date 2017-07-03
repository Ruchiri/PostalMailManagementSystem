<!DOCTYPE html>
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
        <div class="actBtn1"><button style="background-color:powderblue  ; width: 250px; height: 80px;"  onclick="openSendDataSheet()">යවන්න</button>
            <Script>
                function openSendDataSheet() {
                    page = "send.php";
//                    window.open("send.php");
                }
            </Script>
        </div>
        <div class ="actbtn2"><button style="background-color: powderblue; width: 250px; height: 80px;" onclick="openAddSec()">නව අංශය ඇතුලත් කිරීම</button>
            <Script>
                function openAddSec() {
                    page = "add-new-section.php";
//                    window.open("add-new-section.php");
                }
            </Script>
        </div>
        <div class="actbtn3"><button style="background-color: powderblue; width: 250px; height: 80px;"  onclick="openSearch()">සොයන්න</button>
            <Script>
                function openSearch() {
                      page = search.php;
//                    window.open("search.php");
                }
            </Script>
        </div>
        <div class="actbtn4"><button style="background-color: powderblue; width: 250px; height: 80px;"  onclick="openReport()">වාර්තා ලබා ගැනීම</button>
            <Script>
                function openReport() {
                    page = "report_main_user.php";
//                    window.open("report_main_user.php");
                }
            </Script>
        </div>
        <div class="actbtn5"><button style="background-color: powderblue; width: 250px; height: 80px;"  onclick="openSettings()">සැකසුම්</button>
            <Script>
                function openSettings() {
                    page = "reset-password-section.php";
//                    window.open("reset-password-section.php");
                }
            </Script>
        </div>
    </div>
    <div id="columnright">
        <form action="post">
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
        <?php
           if(!isset($_GET['page'])){
               include ("home.php");
           }else{
               $page=$_GET['page'];
               $_GET
               include ("$page.php");
           }
           ?>
    </div>
    <div id="footer"></div>
</div>
</body>
</html>