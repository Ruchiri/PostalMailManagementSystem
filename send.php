<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>නව පණිවිඩය</title>
    <link rel="stylesheet" href="css/sendDataSheet.css" type="text/css">
</head>
<body>
<div id="whole">
    <div  id = "titlebar" style = "color:white">
        නව පණිවිඩය
    </div>
    <div  id = "body" style="color: black">
        <form action="main-user-window.php" method="get">
            <fieldset>
                <label for = "cmbSelect">අංශය තේරීම :
                    <select id = "cmbSelect">
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
                    <input type="text" id = "registeredNo" name ="letterRegNo">
                </label><br>
                <label for = "date">දිනය:
                    <input type="date" id = "date" name ="letterDate">
                </label><br>
                <label for ="sender">ලිපිය එවූ පාර්ශවය:
                    <input type="text" id = "sender" name ="senderOfLetter">
                </label><br>
                <label for ="subject">විෂය:
                    <input type="text" id = "subject" name ="letterSubject">
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
                   document.getElementById('dialogboxfoot').innerHTML = ' <button onclick = "msgbox.yes()"> ඔව් </button> <button onclick="msgbox.no()">නැත</button>';
                }
                this.yes = function () {
                    document.getElementById("dialogbox").style.display = 'none';
                    document.getElementById('dialogoverlay').style.display = 'none';

                }
                this.no = function () {
                    document.getElementById("dialogbox").style.display = 'none';
                    document.getElementById('dialogoverlay').style.display = 'none';

                }


            }
            function attach() { alert("ලිපියට අදාල ගොනු අමුනන්න");}
            function delData() {alert("දත්ත මකන්න");}
            var msgbox= new messageBox();
        </script>
    </div>
</div>

</body>
</html>