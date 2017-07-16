<?php
include "inc/section.php";
include "connect.php";
$con = connect();
$sections = get_sections($con);
?>
<?php
    if(isset($_GET['submit'])){
        $message='';
        if(!($_GET['username']=="") && !($_GET['password1']=="") && !($_GET['password2']=="")){
            if (in_array($_GET['username'], $sections)) {
                $message="මෙම අංශය පෙර ස්ථාපනය කර ඇත.";
            }else{
                if(strpbrk($_GET['username'],'1234567890')!=true){
                    if($_GET['password1']==$_GET['password2']){
                        $name=$_GET['username'];
                        $password=$_GET['password1'];
                        $query ="INSERT INTO login (";
                        $query .= "username,password";
                        $query .=") VALUES (";
                        $query .=" '{$name}','{$password}";
                        $query .="')";
                        mysqli_set_charset($co, 'utf8');
                        $result=mysqli_query($con,$query);
                        if($result){
                            $message="Successfully added to the database!";
                        }else{
                            die("database query failed ".mysqli_error($con));
                        }
                    }else{
                        $message="මුර පද සමානදැයි පරීක්ෂා කරන්න";
                    }
                }else{
                    $message="වලංගු අංශ නාමයක් ඇතුලත් කරන්න";
                }
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
