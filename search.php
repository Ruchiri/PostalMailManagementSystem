<?php
$search_results = [];
if (isset($_GET['btn'])) {
    if ($_GET['hidden2'] == "YES") {
        include 'inc/search_query.inc.php';
        //echo '<script>alert("submit pressed")</script>';
        $fields = explode(',', $_GET['hidden1']);
        $terms = [];
        $i = 0;
        if ($_GET['reg_no'] != '') {
            $terms[$i] = $_GET['reg_no'];
            $i++;
        }
        if ($_GET['date'] != '') {
            $terms[$i] = $_GET['date'];
            $i++;
        }
        if ($_GET['section'] != '') {
            $terms[$i] = $_GET['section'];
            $i++;
        }
        if ($_GET['subject'] != '') {
            $terms[$i] = $_GET['subject'];
            $i++;
        }
        if ($_GET['sender'] != '') {
            $terms[$i] = $_GET['sender'];
            $i++;
        }

        $search_results = search($fields, $terms);

    }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF8">
    <meta charset="UTF-8">
    <title>Search</title>
    <link rel="stylesheet" href="css/search.css">
    <script type="text/javascript" src="js/searchFunctions.js"></script>

</head>
<body>
<div class="wrapper">
    <div class="top-bar-search">
        <h1>තැපැල්පත් සෙවීම</h1>
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
            <h3>අංශය</h3>
        </div>


        <div class="criteria4">
            <h3>විෂය</h3>
        </div>

        <div class="criteria5">
            <h3>ලිපිය එවූ පාර්ශවය</h3>
        </div>
    </div>


    <div class="search-bottom-bar">
        <form action="<?php $_PHP_SELF ?>" method="GET">
            <div class="txtLetterNo">
                <input type="text" name="reg_no" id="reg_no"/>
            </div>
            <div class="dDate">
                <script>validate_date();</script>
                <input type="date" name="date" id="date"/>
            </div>
            <div class="txtSection">

                <input type="text" list="sections" name="section" id="section"/>
                <datalist id="sections">
                    <option> ප්‍රධාන පරිශීලක</option>
                    <option> ආයතන</option>
                    <option> ගිනුම් අංශය</option>
                    <option> සංවර්ධන අංශය</option>
                    <option> ඉඩම් අංශය</option>
                    <option> සමාජ සේවා අංශය</option>
                    <option> දිවි නැගුම අංශය</option>
                    <option> ක්ෂේත්‍ර</option>
                    <option> ලියාපදිංචි අංශය</option>
                    <option> මුදල් හා චෙක්පත් අංශය</option>
                    <option> ප්‍රධාන නිලධාරී</option>
                </datalist>


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
            <div class="no_result">
                <p>ගැළපෙන ප්‍රථිපල <?php echo $search_results['count']; ?>ක් සොයා ගන්නා ලදි.</p>
            </div>
            <div class="result table">
                <?php for ($i = 0; $i < $search_results['count']; $i++): ?>
                    <div class="search_record">
                        <?php $result = $search_results['results'][$i]; ?>
                        <ul>
                            <li><?php echo "ලියාපදිංචි අංකය :" . $result["reg_no"] ?></li>
                            <li><?php echo "දිනය :" . $result["date"] ?></li>
                            <li><?php echo "අංශය :" . $result["section"] ?></li>
                            <li><?php echo "විෂය :" . $result["subject"] ?></li>
                            <li><?php echo "ලිපිය එවූ පාර්ශවය :" . $result["sender"] ?></li>
                            <li id="next"><a href="letter_record.php"><img src="img/next (1).png"/></a></li>
                        </ul>
                    </div>
                    <br/>
                <?php endfor; ?>

            </div>
        <?php elseif (isset($_GET['btn'])): ?>
            <div>
                <p>ගැළපෙන ප්‍රථිපල නොමැත.</p>
            </div>
        <?php endif; ?>
    </div>

</div>
</div>

</body>
</html>