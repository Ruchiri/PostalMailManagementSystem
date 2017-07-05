<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="yasara96";
$dbname="pmms";
$connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(mysqli_connect_errno()){
    die("database connection failed:".
        mysqli_connect_error().
        "(".mysqli_connect_errno().")"

    );

}
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
                $result=mysqli_query($connection,$query);
                if($result){
                    $message="Successfully added to the database!";
                }else{
                    die("database query failed ".mysqli_error($connection));
                }
            }else{
                $message="Please confirm the password again!";
            }

        }else{
            $message="Please check your name and password!";

        }
    }
    if(!empty($message)){
        echo $message;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a New Section</title>
    <link rel="stylesheet" href="css/add-new-section.css">
</head>
<body>
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
<div class="Add">

</div><!--Add-->

</body>
</html>
