<?php
include "inc/section_query.inc.php";
$sections = get_sections();
?>
<!DOCTYPE html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF8">
    <meta charset="UTF-8">
    <title>වාර්තා ලබා ගැනීම</title>
    <link rel="stylesheet" href="css/head-window.css">

</head>
<body>
<div class="Background">
<div class="system">
    <img src="img/new.jpg" alt="bope">
</div>
<form action="<?php $_PHP_SELF ?>" method="GET">
    <div class="heading">
        <p><strong>වාර්තා ලබා ගැනීම <br>ප්‍රධාන අංශය</strong></p>
    </div><!--Heading-->
    <div class="selection">
        <div class="Choose-date">
            <ul>
                <div class=" Start-date">
                    <ul>
                        <p>ආරම්භක සෙවුම් දිනය</p>
                        <input type="date" id="start_date" name="start_date"/>
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
                <input type="text" list="sections" id = "selectSec" name="selectSec">
                <datalist id="sections">

                </datalist>
            </ul>

        </div><!--Section-->
    </div>    <!--Selection-->
    <div class="generate">
        <br>
        <input type="submit" name="btn" id="btn" value="වාර්තා ලබා ගැනීම" onclick="">


    </div>
    <div class="Report-results">
        <p>ප්‍රතිඵල...</p>

        <?php
        include ('report-head-query.php');
        ?>

    </div><!--Search-results-->

</form>
</div>
</body>
</html>