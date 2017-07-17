
<?php
 $page;
 $invalid= " ";
function SignIn()
{
    include '../connect.php';
    $con=connect();

    session_start();   //starting the session for user profile page
    if(!empty($_GET['username']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
    {
        mysqli_set_charset($con, 'utf8');
        $query = mysqli_query($con,"SELECT *  FROM login where username = '$_GET[username]' AND password = '$_GET[password]'") or die(mysqli_error());
        $row = mysqli_fetch_array($query) ;
        if(!empty($row['username']) AND !empty($row['password']))
        {
            $_SESSION['username'] = $row['password'];
            $_SESSION['invalid']="";
            $_SESSION['empty'] = "";
            session_start();
            $_SESSION['page'] = $row['username'];
            if ( $row['username']=="ප්‍රධාන පරිශීලක"){
                header('Location:..\main-user-window.php');
            } elseif ($row['username']=="ප්‍රධාන නිලධාරී"){
                header('Location:..\head-window.php');
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
            $_SESSION['invalid']=" පරිශීලක නාමය හෝ මුරපදය වලංගු නොවේ!";
            header('Location:..\login.php');

        }
    }
    else{

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
