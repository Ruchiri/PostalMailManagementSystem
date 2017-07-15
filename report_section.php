<?php
include "connect.php";
$connection=connect();
session_start();
$section = $_SESSION['section'];
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
        <form action="report.php" method="get">
         <ul>
            <p><strong>අදාල කාල පරාසය තෝරන්න</strong></p>
            <div class=" Start-date">
                <ul>
                    <p>ආරම්භක සෙවුම් දිනය</p>
                    <input type="date" name="date1" id="date1"/>
                </ul>
            </div><!--start-date-->
            <div class="End-date">
                <ul>
                    <p>අවසාන සෙවුම් දිනය</p>
                    <input type="date" name="date2" id="date2"/>
                </ul>
            </div><!--End-date-->

            <div class="generate">
                <input type="submit" name="report"  value="වාර්තා ලබා ගැනීම" onclick="openReport()">
            </div>
        </ul>
        </form>
    </div><!--Choose-date-->
    <div class="Send-head">
        <form enctype="multipart/form-data" action="inc/head_report.inc.php" method="get">
        <div class="attach">
            <label for="choose">වාර්තාව අමුනන්න</label>
        </div>
        <div class="send">
            Send this file :<input type="file" name="userfile" value="වාර්තාව අමුනන්න" accept=".pdf,.doc">
            <input type="submit" name="submit" value="වාර්තාව ප්‍රධාන නිලධාරිට යැවීම">
        </div>
        </form>
    </div>
</div><!--Background-->
</body>
</html>