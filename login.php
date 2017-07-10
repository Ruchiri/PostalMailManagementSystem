
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

                <?php
                include 'connect.php';
                $con=connect();
                $result = mysqli_query($con,'SELECT username FROM login');

                echo "<select  name='username' >";
                    echo "<option hidden >අදාල අංශය තෝරන්න </option>>";
                    while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['username'] ."'>" . $row['username'] ."</option>";
                    }
                    echo "</select>";
                    ?>

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
