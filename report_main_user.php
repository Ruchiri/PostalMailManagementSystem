<?php
include ("connect.php");
$connection = connect();
include "inc/section.php";
$sections = get_sections($connection);
?>
<!DOCTYPE html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF8">
    <meta charset="UTF-8">
    <title>වාර්තා ලබා ගැනීම</title>
    <link rel="stylesheet" href="css/report_main_user.css">

</head>
<body>
<form action="report-main-user-query.php" method="GET">
    <div class="heading">
        <p><strong>වාර්තා ලබා ගැනීම <br>ප්‍රධාන අංශය</strong></p>
    </div><!--Heading-->
    <div class="selection">
        <div class="Choose-date">
            <ul>
                <p><strong>අදාල කාල පරාසය තෝරන්න</strong></p>
                <div class=" Start-date">
                    <ul>
                        <p>ආරම්භක සෙවුම් දිනය</p>
                        <input type="date" id="start_date" name="date1"/>
                    </ul>
                </div><!--start-date-->
                <div class="End-date">
                    <ul>
                        <p>අවසාන සෙවුම් දිනය</p>
                        <input type="date" id="end_date" name="date2"/>
                    </ul>
                </div><!--End-date-->
            </ul>
        </div><!--Choose-date-->
        <div class="Section">
            <ul>
                <p>අංශය</p>
                <input type="text" list="sections" id = "selectSec" name="section">
                <datalist id="sections">
                    <?php for ($j = 0; $j < sizeof($sections); $j++): ?>
                        <option><?php echo $sections[$j]; ?></option>
                    <?php endfor; ?>
                </datalist>
            </ul>
        </div><!--Section-->
    </div>    <!--Selection-->
    <div class="generate">
        <br>
        <input type="submit" name="report" id="btn" value="වාර්තා ලබා ගැනීම" >
    </div>
</form>

</body>
</html>