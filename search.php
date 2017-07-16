<?php
include "inc/section.php";
include "connect.php";
$con = connect();
$sections = get_sections($con);
$msg = '';
$msg1 = '';
$msg2 = '';
$msg3 = '';

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
            if (in_array($_GET['section'], $sections)) {
                $msg1 = '';
                $terms[$i] = $_GET['section'];
                $i++;
            } else {
                $msg1 = "වළංගු අංශයක් ලබා දෙන්න.";
                $terms[$i] = '';
                $i++;

            }

        }
        if ($_GET['subject'] != '') {
            $str = str_replace(array(' ', ',', '.', '/', '*', '-', '@', '%'), '', $_GET['subject']);
            if (ctype_digit($str) || $str == '') {
                $msg2 = 'වළංගු විශයක් ඇතුලත් කරන්න.';
                $terms[$i] = '';
                $i++;
            } else {
                $terms[$i] = $_GET['subject'];
                $i++;
            }

        }
        if ($_GET['sender'] != '') {
            $str = str_replace(array(' ', ',', '.', '/', '*', '-', '@', '%'), '', $_GET['sender']);
            if (ctype_digit($str) || $str == '') {
                $msg3 = 'වළංගු නාමයක් ඇතුලත් කරන්න.';
                $terms[$i] = '';
                $i++;
            } else {
                $terms[$i] = $_GET['sender'];
                $i++;
            }
        }


        $search_results = search($fields, $terms);

    } else {
        $msg = "වළංගු නිර්ණායකයක් ඇතුලත් කරන්න.";
    }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF8">
    <meta charset="UTF-8">
    <title>තැපැල්පත් සෙවීම</title>
    <link rel="stylesheet" href="css/search.css">
    <script type="text/javascript" src="js/searchFunctions.js"></script>

</head>
<body>
<div class="wrapper">

    <div class="top_bar_img">
        <img src="img/new.jpg" alt="new" width="1350">
    </div>

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
                    <input type="text" name="reg_no" id="reg_no" max=""/>
                </div>
                <div class="dDate">
                    <input type="date" name="date" id="date"/>
                    <script type="text/javascript">
                        var today = new Date();
                        var dd = today.getDate();
                        var mm = today.getMonth() + 1; //because,January is 0
                        var yyyy = today.getFullYear();

                        if (dd < 10) {
                            dd = '0' + dd
                        }
                        if (mm < 10) {
                            mm = '0' + mm
                        }

                        today = yyyy + '-' + mm + '-' + dd;
                        document.getElementById("date").setAttribute("max", today);
                    </script>
                </div>

                <div class="txtSection">

                    <input type="text" list="sections" name="section" id="section"/>
                    <datalist id="sections">
                        <?php for ($j = 0; $j < sizeof($sections); $j++): ?>
                            <option><?php echo $sections[$j]; ?></option>
                        <?php endfor; ?>
                    </datalist>
                    <label for="msg1">
                        <h5><?php echo $msg1; ?></h5>
                    </label>
                </div>

                <div class="txtSubject">
                    <input type="text" name="subject" id="subject"/>
                    <label for="msg1">
                        <h5><?php echo $msg2; ?></h5>
                    </label>
                </div>

                <div class="lstSender">
                    <input type="text" name="sender" id="sender"/>
                    <label for="msg1">
                        <h5><?php echo $msg3; ?></h5>
                    </label>
                </div>
                <br>

                <input type="hidden" name="hidden1" id="hidden1" value=""/>
                <input type="hidden" name="hidden2" id="hidden2" value=""/>

                <label for="msg">
                    <h5><?php echo $msg; ?></h5>
                </label>

                <div class="search-button" type="button">
                    <input type="submit" name="btn" id="btn" onclick="return getCriterialist()" value="සොයන්න">
                </div>
                <br>

            </form>
        </div>
    </div>

    <div class="search-results">
        <?php if (!empty($search_results)): ?>
            <div class="no_result">
                <h4>ගැළපෙන ප්‍රථිපල <?php echo $search_results['count']; ?>ක් සොයා ගන්නා ලදි.</h4>
            </div>
            <div class="result table">
                <?php for ($i = 0; $i < $search_results['count']; $i++): ?>
                    <div class="search_record">
                        <?php $result = $search_results['results'][$i]; ?>
                        <ul>
                            <li><?php echo "ලියාපදිංචි අංකය :" . $result->getRegNo(); ?></li>
                            <li><?php echo "දිනය :" . $result->getDate(); ?></li>
                            <li><?php echo "අංශය :" . $result->getSection(); ?></li>
                            <li><?php echo "විෂය :" . $result->getSubject(); ?></li>
                            <li><?php echo "ලිපිය එවූ පාර්ශවය :" . $result->getSender(); ?></li>
                            <li id="next">
                                <a href="letter_record_window.php?id=<?php echo $result->getId() ?>&thisSection=<?php "mu" ?>"><img
                                            src="img/export-arrow.png"/>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <br/>
                <?php endfor; ?>

            </div>
        <?php elseif (isset($_GET['btn']) && $_GET['hidden2'] == "YES"): ?>
            <div>
                <h4>ගැළපෙන ප්‍රථිපල නොමැත.</h4>
                <br>
            </div>
        <?php endif; ?>
    </div>

</div>


</body>
</html>