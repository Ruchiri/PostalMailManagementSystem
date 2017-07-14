<?php
/**
 * Created by PhpStorm.
 * User: Supimi
 * Date: 7/6/2017
 * Time: 5:20 PM
 */


$reg_no = $_GET['reg_no'];
$date = $_GET['date'];;
$section = $_GET['section'];
$subject = $_GET['subject'];
$sender = $_GET['sender'];
$ref_id = $_GET['ref_id'];
$thisSection = $_GET['thisSection'];
$replied_no = 0;

$scan_copy;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Letter record</title>
    <link rel="stylesheet" href="css/letter_record.css">
</head>
<body>
<div class="wrapper">

    <div class="top_bar_img">
        <img src="img/new.jpg" alt="new" width="1350">
    </div>

    <div class="top-bar">

        <!--div class="letter_img">
            <img src="img/letter.png" alt="letter">
        </div-->

        <h3>ලිපි වාර්තාව</h3>


    </div>
    <div class="content">

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
            <img src="url" alt="some_text">
        </div>

        <div name="replied">
            <label for="replid" id="ll5"><strong>යැවූ පිළිතුරු ලිපි සංඛ්‍යාව :</strong></label>
            <p id="line5"><?php echo $replied_no ?></p>
        </div>

        <form action="" method="get">

            <div class="reject_btn">
                <p><input type="button" name="reject" id="reject" value="අදාළ නොවේ"></p>
            </div>

            <?php if ($section != 'ප්‍රධාන පරිශීලක'): ?>
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

        </form>


    </div>


</div>

</body>
</html>
