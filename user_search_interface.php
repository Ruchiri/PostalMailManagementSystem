<?php
include "inc/section_query.inc.php";
$sections = get_sections();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF8">
    <meta charset="UTF-8">
    <title>Search</title>
    <link rel="stylesheet" href="css/user_search.css">
    <script type="text/javascript" src="js/searchFunctions.js"></script>

</head>
<body>
<div class="wrapper">
    <div class="top-bar-search">
        <h1>තැපැල්පත් සෙවීම</h1>
    </div>
</div>
<div class="seach-Model">
    <div class="search-bar">
        <div class="criteria1">
            <h3>ලියාපදිංචි අංකය</h3>
        </div>

        <div class="criteria2">
            <h3>දිනය</h3>
        </div>

        <div class="criteria3">
            <h3>විෂය</h3>
        </div>

        <div class="criteria4">
            <h3>ලිපිය එවූ පාර්ශවය</h3>
        </div>
    </div>


    <div class="search-bottom-bar">
        <form action="<?php $_PHP_SELF ?>" method="GET">
            <div class="txtLetterNo">
                <input type="text" name="reg_no" id="reg_no"/>
            </div>
            <div class="dDate">
                <input type="date" name="date" id="date"/>
            </div>

            <div class="txtSubject">
                <input type="text" name="subject" id="subject"/>
            </div>
            <div class="lstSender">
                <input type="text" name="sender" id="sender"/>
            </div>
            <br>
            <input type="hidden" name="hidden1" id="hidden1" value=""/>
            <input type="hidden" name="hidden2" id="hidden2" value=""/>

            <div class="search-button" type="button">
                <input type="submit" name="btn" id="btn" onclick="return getCriterialist()" value="සොයන්න">

            </div>
            <br>

        </form>
    </div>

    <div class="search-results">
        <?php if (!empty($search_results)): ?>
            <div>
                <p>ගැළපෙන ප්‍රථිපල <?php echo $search_results['count']; ?>ක් සොයා ගන්නා ලදි.</p>
            </div>
            <hr>
            <hr>
            <div class="result table">
                <div clas="search_record">
                    <?php for ($i = 0; $i < $search_results['count']; $i++): ?>
                        <?php $result = $search_results['results'][$i]; ?>
                        <ul>

                            <li><?php echo "ලියාපදිංචි අංකය :" . $result["reg_no"] ?></li>
                            <li><?php echo "දිනය :" . $result["date"] ?></li>
                            <li><?php echo "විෂය :" . $result["subject"] ?></li>
                            <li><?php echo "ලිපිය එවූ පාර්ශවය :" . $result["sender"] ?></li>

                        </ul>
                        <hr>
                    <?php endfor; ?>
                </div>
            </div>
        <?php elseif (isset($_GET['btn'])): ?>
            <div>
                <p>ගැළපෙන ප්‍රථිපල නොමැත.</p>
            </div>
        <?php endif; ?>
    </div>


</div>

</body>
</html>