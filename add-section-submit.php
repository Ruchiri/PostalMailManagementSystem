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
                echo "Successfully added to the database!";
            }else{
                die("database query failed ".mysqli_error($connection));
            }
        }else{
            header("Location:add-new-section.php");
            echo "Please confirm the password again!";

        }

    }else{
        header("Location:add-new-section.php");
        echo "Please check your name and password!";
    }

?>

