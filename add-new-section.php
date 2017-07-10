<?php
include ("connect.php");
?>

<?php
    if(isset($_GET['submit'])){
        $message='';
        if(!($_GET['username']=="") && !($_GET['password1']=="") && !($_GET['password2']=="")){
            if($_GET['password1']==$_GET['password2']){
                $name=$_GET['username'];
                $password=$_GET['password1'];
                $query ="INSERT INTO login (";
                $query .= "username,password";
                $query .=") VALUES (";
                $query .=" '{$name}','{$password}";
                $query .="')";
                mysqli_set_charset($connection, 'utf8');
                $result=mysqli_query($connection,$query);
                if($result){
                    $message="Successfully added to the database!";
                }else{
                    die("database query failed ".mysqli_error($connection));
                }
                $query1="CREATE TABLE $name (";
                $query1 .="id INT(10) NOT NULL AUTO_INCREMENT,";
                $query1 .="reg_no VARCHAR(15) COLLATE utf8_general_ci,";
                $query1 .="ref_id INT(10) NOT NULL,";
                $query1 .="date DATE NOT NULL,";
                $query1 .="sender VARCHAR(100) NOT NULL COLLATE utf8_general_ci,";
                $query1 .="subject VARCHAR(300) NOT NULL COLLATE utf8_general_ci,";
                $query1 .="rec_letter VARCHAR(100) NOT NULL COLLATE latin1_swedish_ci,";
                $query1 .="replied TINYINT(1),";
                $query1 .="rep_letter VARCHAR(100) COLLATE latin1_swedish_ci,";
                $query1 .="visible TINYINT(1),";
                $query1 .="PRIMARY KEY(id))";
                mysqli_set_charset($connection, 'utf8');
                $result1=mysqli_query($connection,$query1);
                if($result1){
                    $message="Successfully added to the database!";
                }else{
                    die("database query failed ".mysqli_error($connection));
                }
            }else{
                $message="මුර පද සමානදැයි පරීක්ෂා කරන්න";
            }

        }else{
            $message="අවශ්‍ය දත්ත ඇතුලත් කර ඇත්දැයි පරීක්ෂා කරන්න";

        }
    }

    if(!empty($message)){
        echo "<script language='javascript'>";
        echo "alert('$message')";
        echo "</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF8">
    <meta charset="UTF-8">
    <title>Add a New Section</title>
    <link rel="stylesheet" href="css/add-new-section.css">
</head>
<body>
<div class="Background">
<div class="system">
    <img src="img/new.jpg" alt="bope">
</div>
    <div class="heading">
        <p>නව අංශයක් ඇතුලත් කිරීම</p>
    </div><!--Heading-->

    <div class="Details">
        <ul>
            <?php if(isset($_GET['error'])) : ?>
                <div class="error"><?php echo $_GET['error']; ?></div>
            <?php endif; ?>

            <form action="#" method="get">
                <label for="name">අංශයේ නම</label><br>
                <input id="name" name="username" type="text" placeholder="අංශයේ නම ඇතුලත් කරන්න"><br>
                <label for="password">මුර පදය</label><br>
                <input id="password1" name="password1" type="password" placeholder="මුර පදය ඇතුලත් කරන්න">
                <input id="password2" name="password2" type="password" placeholder="මුර පදය තහවුරු කරන්න">
                <input type="submit" value="ඇතුලත් කිරීම" name="submit" id="btn"><br>
            </form>
        </ul>
    </div><!--Details-->
</div><!--Background-->
</body>
</html>
