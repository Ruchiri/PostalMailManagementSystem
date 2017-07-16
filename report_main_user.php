<?php
include "connect.php";
$con = connect();
include "inc/section.php";
$sections = get_sections($con);
?>
<!DOCTYPE html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF8">
    <meta charset="UTF-8">
    <title>වාර්තා ලබා ගැනීම</title>
    <link rel="stylesheet" href="css/report_main_user.css">

</head>
<body>
<div class="Background">
    <div class="system">
        <img src="img/new.jpg" alt="bope">
    </div>
    <div class="heading">
        <p><strong>වාර්තා ලබා ගැනීම </strong></p>
    </div><!--Heading-->
    <div class="selection">
        <form action="report-main-user-query.php" method="GET">
            <div class="Choose-date">
                <ul>
                    <div class=" Start-date">
                        <ul>
                            <p>ආරම්භක සෙවුම් දිනය</p>
                            <input type="date" id="start_date" name="date1"oninvalid="this.setCustomValidity('දිනය ඇතුලත් කරන්න')" required oninput="setCustomValidity('')"/>
                        </ul>
                    </div><!--start-date-->
                    <div class="End-date">
                        <ul>
                            <p>අවසාන සෙවුම් දිනය</p>
                            <input type="date" id="end_date" name="date2"oninvalid="this.setCustomValidity('දිනය ඇතුලත් කරන්න')" required oninput="setCustomValidity('')"/>
                        </ul>
                    </div><!--End-date-->
                </ul>
            </div><!--Choose-date-->
            <div class="Section">
                <ul>
                    <p>අංශය</p>
                    <input type="text" list="sections" id = "selectSec" name="section" oninvalid="this.setCustomValidity('අදාල අංශය ඇතුලත් කරන්න')" required oninput="setCustomValidity('')">
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
        <input type="submit" name="report" id="btn" value="වාර්තා ලබා ගැනීම" onclick="">
    </div>

    </form>
</div>
</body>
</html>