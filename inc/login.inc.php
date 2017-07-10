
<?php
 $page;
 $invalid= " ";

function SignIn()
{
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'pmms');
    define('DB_USER','root');
    define('DB_PASSWORD','123');

    $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
    $db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());



    session_start();   //starting the session for user profile page
    if(!empty($_GET['username']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
    {
        $query = mysqli_query($con,"SELECT *  FROM login where username = '$_GET[username]' AND password = '$_GET[password]'") or die(mysqli_error());
        mysqli_set_charset($con, 'utf8');
        $row = mysqli_fetch_array($query) ;
        if(!empty($row['username']) AND !empty($row['password']))
        {
            $_SESSION['username'] = $row['password'];
            $_SESSION['invalid']="";
            $_SESSION['empty']="";
            session_start();
            $_SESSION['page'] = $row['username'];
            if ( $row['username']=="ප්‍රධාන පරිශීලක"){
                header('Location:..\main-user-window.php');
            }
            else {
                header('Location:..\section.php');

                //echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
            }

        }
        else
        {
           // echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
            session_start();
            $_SESSION['invalid']= "පරිශීලක නාමය හෝ මුරපදය වලංගු නොවේ!";
            header('Location:..\login.php');

        }
    }
    else{
        //echo"Any field cannot be empty";

        session_start();
        $_SESSION['invalid']="පරිශීලක නාමය හෝ මුරපදය වලංගු නොවේ!";
        header('Location:..\login.php');
    }

}
if(isset($_GET['submit']))
{
  SignIn();
}


?>
