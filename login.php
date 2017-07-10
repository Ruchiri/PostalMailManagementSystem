
<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF8">
    <meta charset="UTF-8">
    <title>Postal Managemnet System</title>
    <style>
        body {
            background-image: url("img/image5.jpg");
            background-size: 100%;
            border-width: 20px;
        }
    </style>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<div class="wrapper">
    <div class="main-img">

        <div class="top-bar">
            <div class="top-bar-links">
                <ul>
                    <li><a href="#">Bope-Poddala Divisional Secretariat</a></li>
                    <li><a href="#">බෝපෙ පෝද්දල ප්‍රාදේශීය ලේකම් කාර්යාලය</a></li>
                    <li><a href="#">Postal Mail Management System</a></li>
                </ul>
            </div> <!--top-bar-links-->
        </div><!--top-bar-->

    </div><!--main-image-->
</div> <!-- wrapper -->


<div class="login">
    <ul>
        <form method="GET" ACTION=inc/login.inc.php>
            <ul>
                <input type="text" name="username" list="username" placeholder="අංශය තෝරන්න">
                <datalist id="username">
                    <option value="ප්‍රධාන පරිශීලක"> ප්‍රධාන පරිශීලක</option>
                    <option value="ආයතන"> ආයතන</option>
                    <option value="ගිණුම් අංශය"> ගිණුම් අංශය</option>
                    <option value="සංවර්ධන අංශය"> සංවර්ධන අංශය</option>
                    <option value="ඉඩම් අංශය"> ඉඩම් අංශය</option>
                    <option value="සමාජ සේවා අංශය"> සමාජ සේවා අංශය</option>
                    <option value="දිවි නැගුම අංශය"> දිවි නැගුම අංශය</option>
                    <option value="ක්ෂේත්‍ර"> ක්ෂේත්‍ර</option>
                    <option value="ලියාපදිංචි අංශය"> ලියාපදිංචි අංශය</option>
                    <option value="මුදල් හා චෙක්පත් අංශය"> මුදල් හා චෙක්පත් අංශය</option>
                    <option value="ප්‍රධාන නිලධාරී"> ප්‍රධාන නිලධාරී</option>
                </datalist>
                <input id="password" name="password" type="password" placeholder="මුරපදය ඇතුලත් කරන්න">
                <input id="button" type="submit" value="යොමු කරන්න" name="submit" > <br>
            </ul>
            <a href="#"><br>Forgot Password?  <br></a>
            <p>
            <?php include "inc/login.inc.php";
            session_start();
            echo $_SESSION['invalid'];
            $_SESSION['invalid']="";
            ?></p>
        </form>
    </ul>
</div>



</body>
</html>
