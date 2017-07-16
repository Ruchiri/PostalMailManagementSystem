
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>නව පණිවිඩය</title>
    <link rel="stylesheet" href="css/sendDataSheet.css" type="text/css">
<!--    <script type="text/javascript" src="js/send.js"></script>-->
</head>
<body>
<div id="whole">

    <div  id = "titlebar" style = "color:white">
        නව පණිවිඩය
    </div>
    <div  id = "body" style="color: black">
        <form action="" method="get">
            <fieldset>
                <label for = "cmbSelect">අංශය තේරීම :
                    <select id = "cmbSelect" name="cmbSelect">
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
                    </select>
                </label><br>

                <label for="registeredNo">ලියාපදිංචි අංකය
                    <input type="text" id = "registeredNo" name ="registeredNo">
                </label><br>
                <label for = "date">දිනය:
                    <input type="date" id = "date" name ="date">
                </label><br>
                <label for ="sender">ලිපිය එවූ පාර්ශවය:
                    <input type="text" id = "sender" name ="sender">
                </label><br>
                <label for ="subject">විෂය:
                    <input type="text" id = "subject" name ="subject">
                </label><br>

            </fieldset>
    </form>

    </div>
    <div id = "sendSection" style = "color:black">

    <div id="dialogoverlay"></div>
    <div id="dialogbox">
        <div>
            <div id="dialogboxhead"></div>
            <div id="dialogboxbody"></div>
            <div id="dialogboxfoot"></div>
        </div>
    </div>
        <div id="wholeLetter">
            <div id="topPartLetter">
                <h1>select the reference letter...</h1>

            </div>
            <div id="contentLetter">
                <?php
                include ('dbconnectedPiyu.php');
                mysqli_set_charset($connection, 'utf8');
                $section1 = $_GET['cmbSelect'];
                $regNo1= $_GET['registeredNo'];
                $date = $_GET['date'];
                $sender1 =$_GET['sender'];
                $subject1 = $_GET['subject'];
                $query1 = "select letter.id,letter.date,letter.sender,letter.subject,letter.ref_id from letter where letter.section = '$section1'";
                $letter_result = mysqli_query($connection,$query1);
                if (!$letter_result){
                die('result failed');
                }

                while ($letter_row = $letter_result->fetch_array()) {
                $output = "<table>
                    <tr><td>id</td>
                        <td>date</td>
                        <td>sender</td>
                        <td>subject</td>
                        <td>scancopy</td>
                        <td>ref_id</td>
                    </tr>";

                    $output .=  "<tr> <td>". $letter_row['id']."</td> <td>" . $letter_row['date']."</td> <td>" .$letter_row['sender'] .
                            "</td> <td>" .$letter_row['subject'] ."</td><td>" .$letter_row['ref_id'] . "</td>";
                        echo "$output";

                        }
                        echo ('</table>');?>
            </div>
            <div id="bottomPartLetter"></div>
        </div>

        <button id = "btn1"   style = "background-color: mistyrose; width: 100px; height: 30px;" onclick="msgbox.render('මෙම ලිපිය වෙනත් ලිපියක් හ සම්බන්ධද?')"> යැවීම </button>
        <button id = "btn2"  style="background-color: mistyrose; width: 150px; height: 30px;"    onclick = "attach()">ගොනු අමුනන්න</button>
        <button id = "btn3"  style="background-color: mistyrose; width: 100px; height: 30px;" onclick="delData()">මකන්න</button>
        <script>
            function messageBox() {
                this.render = function(dialog){
                    var winW = window.innerWidth;
                    var winH = window.innerHeight;
                    var dialogoverlay = document.getElementById("dialogoverlay");
                    var dialogbox = document.getElementById("dialogbox");
                    dialogoverlay.style.display = "block";
                    dialogoverlay.style.height = winH+"px";
                    dialogbox.style.left = (winW/2)-(550*0.5) + "px";
                    dialogbox.style.top = "100px";
                    dialogbox.style.display = "block";
                    dialogbox.style.background = "#FFF";
                    document.getElementById('dialogboxhead').innerHTML = "පණිවිඩය...";
                    document.getElementById('dialogboxbody').innerHTML = dialog;
                    document.getElementById('dialogboxfoot').innerHTML = ' <button id="yesbtn" name="yesbtn" onclick = "msgbox.yes()"> ඔව් </button> <button id="nobtn" name = "nobtn" onclick="msgbox.no()">නැත</button> ';
                }
                this.yes = function () {
                    document.getElementById("dialogbox").style.display = 'none';
                    document.getElementById('dialogoverlay').style.display = 'none';
                    var winW = window.innerWidth;
                    var winH = window.innerHeight;
                    var wholeLetter = document.getElementById("wholeLetter");
                    wholeLetter.style.left = (winW/2)-(550*0.5) + "px";
                    wholeLetter.style.top = "100px";
                    wholeLetter.style.display = "block";

                }
                this.no = function () {
                    document.getElementById("dialogbox").style.display = 'none';
                    document.getElementById('dialogoverlay').style.display = 'none';
                    storeData();
                }

            }
            function storeData() {
                 var xmlhttp1;
                 xmlhttp1 = new XMLHttpRequest();
                 xmlhttp1.open("GET","storeSendData.php?cmbSelect ="+document.getElementById('cmbSelect').value + "&registeredNo="+document.getElementById('registeredNo').value +"&date="+document.getElementById('date').value+"&sender="+document.getElementById('sender').value+"&subject="+document.getElementById('subject').value,false);
                 xmlhttp1.send(null);


            }
            
            function attach() { alert("ලිපියට අදාල ගොනු අමුනන්න");}
            function delData() {alert("දත්ත මකන්න");}
            var msgbox= new messageBox();

        </script>

    </div>

</div>

</body>
</html>