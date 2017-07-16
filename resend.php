<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 7/15/2017
 * Time: 11:34 PM
 */
include "inc/section.php";
include "inc/letter_record.php";
include "connect.php";
$con = connect();
$sections = get_sections($con);

$id = $_GET['letter_id'];

$reco = find_recoDb($id, $con);

$reg_no = $reco->getRegNo();
$date = $reco->getDate();
$subject = $reco->getSubject();
$section = $reco->getSection();
$sender = $reco->getSender();
$scan_copy = $reco->getScanCopy();

session_start();
$_SESSION['id'] = $id;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>නැවත යොමු කිරීම.</title>
    <link rel="stylesheet" href="css/sendDataSheet.css" type="text/css">

</head>
<body>
<div id="whole">

    <div id="titlebar" style="color:white">
        නැවත යොමු කිරීම.
    </div>
    <div id="body" style="color: black">
        <form action="" method="get">
            <fieldset>
                <label for="section">අංශය තේරීම :

                    <select id="section" name="section">
                        <option disabled selected value> -- නිවරැදි අංශය තොරන්න.--</option>
                        <?php foreach ($sections as $sec): ?>
                            <option value=<?php echo $sec; ?>><?php echo $sec; ?></option>
                        <?php endforeach; ?>
                    </select>
                </label><br>

                <label for="registeredNo">ලියාපදිංචි අංකය
                    <input type="text" id="registeredNo" name="registeredNo" value=<?php echo $reg_no ?>/>
                </label><br>
                <label for="date">දිනය:
                    <input type="date" id="date" name="date" value=<?php echo $date; ?>/>
                </label><br>
                <label for="sender">ලිපිය එවූ පාර්ශවය:
                    <input type="text" id="sender" name="sender" value=<?php echo $sender; ?>/>
                </label><br>
                <label for="subject">විෂය:
                    <input type="text" id="subject" name="subject" value="<?php echo $subject; ?>"/>
                </label><br>


            </fieldset>
        </form>

    </div>
    <div id="sendSection" style="color:black">

        <div id="dialogoverlay"></div>
        <div id="dialogbox">
            <div>
                <div id="dialogboxhead"></div>
                <div id="dialogboxbody"></div>
                <div id="dialogboxfoot"></div>
            </div>
        </div>
        <div id="letterOverlay"></div>
        <div id="wholeLetter">
            <div id="topPartLetter"></div>
            <div id="contentLetter"></div>
            <div id="bottomPartLetter"></div>
        </div>
        <br>
        <input type="submit" id="btn1" name="btn1" style="background-color: mistyrose; width: 100px; height: 30px;"
               onclick="msgbox.render('මෙම ලිපිය වෙනත් ලිපියක් හ සම්බන්ධද?')" value="යැවීම ">
        <input type="submit" id="btn2" name="btn2" style="background-color: mistyrose; width: 150px; height: 30px;"
               onclick="attach()" value="ගොනු අමුනන්න">
        <input type="submit" id="btn3" name="btn3" style="background-color: mistyrose; width: 100px; height: 30px;"
               onclick="delData()" value="මකන්න">

        <script>

            function messageBox() {
                this.render = function (dialog) {
                    var winW = window.innerWidth;
                    var winH = window.innerHeight;
                    var dialogoverlay = document.getElementById("dialogoverlay");
                    var dialogbox = document.getElementById("dialogbox");
                    dialogoverlay.style.display = "block";
                    dialogoverlay.style.height = winH + "px";
                    dialogbox.style.left = (winW / 2) - (550 * 0.5) + "px";
                    dialogbox.style.top = "100px";
                    dialogbox.style.display = "block";
                    dialogbox.style.background = "#FFF";
                    document.getElementById('dialogboxhead').innerHTML = "පණිවිඩය...";
                    document.getElementById('dialogboxbody').innerHTML = dialog;
                    document.getElementById('dialogboxfoot').innerHTML = ' <button id="yesbtn" name="yesbtn" onclick = "msgbox.yes()"> ඔව් </button> <button id="nobtn" name = "nobtn" onclick="msgbox.no()">නැත</button> ';
                }
                this.yes = function () {
                    selectRefLetter();
                    document.getElementById("dialogbox").style.display = 'none';
                    document.getElementById('dialogoverlay').style.display = 'none';
                    var winW = window.innerWidth;
                    var winH = window.innerHeight;
                    var wholeLetter = document.getElementById("wholeLetter");
                    var letterOverlay = document.getElementById('letterOverlay');
                    letterOverlay.style.display = "block";
                    letterOverlay.style.height = winH + "px";
                    wholeLetter.style.left = (winW / 2) - (550 * 0.5) + "px";
                    wholeLetter.style.top = "100px";
                    wholeLetter.style.display = "block";
                    document.getElementById('topPartLetter').innerHTML = "අදාල ලිපිය තෝරන්න...";
                    document.getElementById('bottomPartLetter').innerHTML = '<button id="okbtn" style="color: white; width: 100px; height: 50px; background-color: midnightblue" name="okbtn" onclick="msgbox.ok()"> නිවැරදිය </button>';


                }
                this.no = function () {

                    document.getElementById("dialogbox").style.display = 'none';
                    document.getElementById('dialogoverlay').style.display = 'none';
                    var radio = "";
                    storeData(radio);

                }


                this.ok = function () {

                    document.getElementById("wholeLetter").style.display = 'none';
                    document.getElementById('letterOverlay').style.display = 'none';

                    var form1 = document.getElementById('form1');
                    var radios = form1.elements['radio'];

                    window.rdValue;
                    for (var i = 0; i < radios.length; i++) {
                        var someRadio = radios[i];
                        if (someRadio.checked) {
                            rdValue = someRadio.value;
                            break;
                        } else {
                            rdValue = 'noRadioChecked';
                        }

                    }
                    storeData(rdValue);
                }

            }

            function storeData(radio_value) {

                var xmlhttp1;
                var done;
                var sel = document.getElementById('section');
                var ref_id = radio_value;


                if (window.XMLHttpRequest) {
                    xmlhttp1 = new XMLHttpRequest();

                }
                else {
                    xmlhttp1 = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp1.open("GET", "inc/restore_data.inc.php?section=" + sel.value + "&registeredNo=" + document.getElementById("registeredNo").value + "&date=" + document.getElementById("date").value + "&sender=" + document.getElementById("sender").value + "&subject=" + document.getElementById("subject").value + "&done=1" + "&ref_id=" + radio_value, false);

                xmlhttp1.onreadystatechange = function () {
                    if (xmlhttp1.readyState == 1) {
                        alert("Status 1: Server connection established !");
                    }
                    else if (xmlhttp1.readyState == 2) {
                        alert("Status 2: Request recieved !");
                    }
                    else if (xmlhttp1.readyState == 3) {
                        alert("Status 3: Processing Request !");
                    }
                    else if (xmlhttp1.readyState == 4) {

                        if (xmlhttp1.status == 200) {
                            document.getElementById("contentLetter").innerHTML = xmlhttp1.responseText;
                        }
                    } else {
                        alert(xmlhttp1.responseText);
                    }
                }
                xmlhttp1.send();
            }

            function selectRefLetter() {
                var xmlhttp2;
                var display;
                var sel = document.getElementById('section');

                if (window.XMLHttpRequest) {
                    xmlhttp2 = new XMLHttpRequest();

                }
                else {
                    xmlhttp2 = new ActiveXObject("Microsoft.XMLHTTP");
                }

                xmlhttp2.open("GET", "inc/restore_data.inc.php?section=" + sel.value + "&registeredNo=" + document.getElementById('registeredNo').value + "&date=" + document.getElementById('date').value + "&sender=" + document.getElementById("sender").value + "&subject=" + document.getElementById("subject").value + "&display=1", false);
                xmlhttp2.onreadystatechange = function () {

                    if (xmlhttp2.readyState == 1) {
                        alert("Status 1: Server connection established !");
                    }
                    else if (xmlhttp2.readyState == 2) {
                        alert("Status 2: Request recieved !");
                    }
                    else if (xmlhttp2.readyState == 3) {
                        alert("Status 3: Processing Request !");
                    }
                    else if (xmlhttp2.readyState == 4) {

                        if (xmlhttp2.status == 200) {
                            document.getElementById("contentLetter").innerHTML = xmlhttp2.responseText;

                        }
                    } else {
                        alert(xmlhttp2.responseText);
                    }

                }
                xmlhttp2.send();
            }

            function attach() {
                alert("ලිපියට අදාල ගොනු අමුනන්න");
            }
            function delData() {
                document.getElementById('registeredNo').value = "";
                document.getElementById('sender').value = "";
                document.getElementById('subject').value = "";
                document.getElementById('date').value = "";

            }
            var msgbox = new messageBox();


        </script>

    </div>

</div>

</body>
</html>
