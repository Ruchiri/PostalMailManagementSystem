<?php
/**
 * Created by PhpStorm.
 * User: Supimi
 * Date: 7/6/2017
 * Time: 5:20 PM
 */
include "inc/letter_record.php";
include "connect.php";
$con = connect();

$id = $_GET['id'];
$thisSection = $_GET['thisSection'];
$reco = find_recoDb($id, $con);

$reg_no = $reco->getRegNo();
$date = $reco->getDate();
$section = $reco->getSection();
$subject = $reco->getSubject();
$sender = $reco->getSender();
$ref_id = $reco->getRefId();
$replied = $reco->getReplied();
$scan_copy = $reco->getScanCopy();
$marked = $reco->getMarked();

if ($marked == 0) {
    $msg = "";
} else {
    $msg = "මෙම වාර්තාව අංශයට අදාළ නොවන බවට සළකුණුකර ඇත. ";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF8">
    <meta charset="UTF-8">
    <A HREF="javascript:history.go()"></A>
    <title>ලිපි වාර්තාව</title>
    <link rel="stylesheet" href="css/letter_record.css">
</head>
<body>
<div class="wrapper">

    <div class="top_bar_img">
        <img src="img/new.jpg" alt="new" width="1350">

    </div>

    <div class="top-bar">
        <ul>
            <li><h3>ලිපි වාර්තාව</h3></li>
            <li>
                <div class="dropdown">
                    <img src="img/settings (2).png" alt="setting_icon" height="24" width="24" onclick="show_settings()"
                         class="dropbtn">
                    <div id="myDropdown" class="dropdown-content">
                        <p><strong>මෙම ලියුම් වාර්තාව අදාල නොවේ.</strong></p>
                        <form action="inc/notification.inc.php" method="get">
                            <button id="report" name="report" onclick=""><strong>වාර්තා කරන්න.</strong></button>
                            <?php session_start();
                            $_SESSION['id'] = $id;
                            ?>
                        </form>
                    </div>
                </div>
            </li>
        </ul>

    </div>

    <div class="content">
        <div class="marked">
            <h4><?php echo $msg; ?></h4>
        </div>

        <div class="reg_no">
            <label for="reg_no" id="ll1"><strong>ලියාපදිංචි අංකය :</strong></label>
            <p id="line1"><?php echo $reg_no; ?></p>
        </div>

        <div class="date">
            <label for="date" id="ll2"><strong>දිනය :</strong></label>
            <p id="line2"><?php echo $date; ?></p>
        </div>

        <div class="sender">
            <label for="sender" id="ll3"><strong>ලිපිය එවූ පාර්ශවය : </strong></label>
            <p id="line3"><?php echo $sender; ?></p>
        </div>

        <div class="subject">
            <label for="subject" id="ll4"><strong>විෂය :</strong></label>
            <p id="line4"><?php echo $subject; ?></p>
        </div>

        <div class="section">
            <p><strong><em><?php echo $section . "ට යොමු කෙරිනි."; ?></em></strong></p>
        </div>
        <br/>


        <div class="scan_copy">
            <label for="scan_copy"><strong>ඡායා පිටපත: </strong></label><br/>

        </div>

        <div name="replied">
            <?php echo"$replied";?>
            <?php if ($replied == 0): ?>
                <label for="replid" id="ll5"><strong>පිළිතුරු ලිපි යවා නොමැත.</strong></label>
            <?php else: ?>
                <label for="replid" id="ll5"><strong>පිළිතුරු ලිපි යවා ඇත.</strong></label>
            <?php endif; ?>
        </div>
        <br>
        <br>

        <div class="btn_set">
            <?php if ($section == "su"): ?>
                <div class="letter_reply">
                    <p><input type="button" name="send_rep" id="send_rep" value="පසුගිය වාර්තා බැලීම"
                              onclick="document.location.href='letter-history-su.php?ref_id=<?php echo $ref_id ?>'"/>
                    </p>
                </div>
            <?php else: ?>
                <div class="letter_reply">
                    <p><input type="button" name="send_rep" id="send_rep" value="පසුගිය වාර්තා බැලීම"
                              onclick="document.location.href='letter-history-mu.php?ref_id=<?php echo $ref_id ?>'"/>
                    </p>
                </div>
            <?php endif; ?>

            <div class="history_reco">
                <p><input type="button" name="records" id="records" value="පිළිතුරු ලිපි යොමු කිරීම"
                          onclick="document.location.href='replyLetter.php'"/></p>
            </div>

        </div>

    </div>

</div>

</body>
</html>


<script type="text/javascript">
    //when user click on the image display the drop down content
    function show_settings() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown content if the user clicks outside of it
    window.onclick = function (event) {
        if (!event.target.matches('.dropbtn')) {

            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>


