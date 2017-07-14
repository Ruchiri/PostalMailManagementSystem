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
        <form action="inc/section_user_report.inc.php" method="get">
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
                <input type="submit" name="report"  value="වාර්තා ලබා ගැනීම">
            </div>
        </ul>
        </form>
    </div><!--Choose-date-->


    <div class="Report-results">

    </div><!--Search-results-->
    <div class="Send-head">
        <input type="submit" name="send" value="වාර්තාව ප්‍රධාන නිලධාරිට යැවීම">

    </div>
</div><!--Background-->
</body>
</html>