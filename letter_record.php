<?php
/**
 * Created by PhpStorm.
 * User: Supimi
 * Date: 7/6/2017
 * Time: 5:20 PM
 */

$reg_no = '123';
$date = 2017 - 07 - 06;
$section = 'සමාජ සේවා අංශය';
$subject = 'ඩෙංගු මර්ධනය හා සම්බන්ධයි';
$sender = 'ප්‍රාදේශීය සභාව';
$replied_no = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Letter record</title>
    <link rel="stylesheet" href="css/letter_record.css">
</head>
<body>
<div class="wrapper">
    <div class="top-bar">

        <div class="letter_img">
            <img src="img/letter.png" alt="letter">
        </div>

        <div class="title">
            <h1>ලිපි වාර්තාව</h1>
        </div>

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

        <div class="bottom-bar">
            <div class="letter_reply">
                <p><input type="submit" name="send_rep" id="send_rep" value="පසුගිය වාර්තා බැලීම"></p>
            </div>

            <div class="history_reco">
                <p><input type="submit" name="records" id="records" value="පිළිතුරු ලිපි යොමු කිරීම"></p>
            </div>
        </div>


    </div>


</div>

</body>
</html>
