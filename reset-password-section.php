<?php
error_reporting(E_ALL ^ E_NOTICE);
include "inc/section.php";
include "connect.php";
$con = connect();
$sections = get_sections($con);
?>
<?php
if(isset($_GET['Submit'])){
    $message='';
    if(!($_GET['section']=="") && !($_GET['newpassword']=="") && !($_GET['confirmpassword']=="")){
        if (in_array($_GET['section'], $sections)) {
            if($_GET['newpassword']==$_GET['confirmpassword']){
                    $section=$_GET['section'];
                    $newpassword=$_GET['newpassword'];
                    $confirmpassword=$_GET['confirmpassword'];
                    $query ="UPDATE login SET password='$newpassword' WHERE username='$section'";

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
            $message="වලංගු අංශයක් ඇතුලත් කරන්න.";
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
    <meta charset="UTF-8">
    <title>මුරපද යලි පිහිටුවීම</title>
    <link rel="stylesheet" href="css/reset-password-interface.css">
</head>
<body>
     <div class="wrapper">
         <h1>මුරපද යලි පිහිටුවීම<br>Reset Password</h1>
         <div class="core">

            <ul>
                <form action="" method="get">
                    <div class="section">
                         <label for="sections"> අංශය</label>
                         <ul>

                            <input type="text" list="sections" name="section">
                            <datalist id="sections">
                                <?php for ($j = 0; $j < sizeof($sections); $j++): ?>
                                    <option><?php echo $sections[$j]; ?></option>
                                <?php endfor; ?>
                            </datalist>
                         </ul>
                    </div> <!--section-->

                    <div class="other">

                         <label for="newpassword">නව මුර පදය</label><br>
                         <input id="newpassword" name="newpassword" type="password" placeholder="නව මුර පදය ඇතුලත් කරන්න"><br>
                         <label for="confirmpassword">තහවරු කිරීම</label><br>
                         <input id="confirmpassword" name="confirmpassword" type="password" placeholder="මුර පදය නැවතත් ඇතුලත් කරන්න"><br>
                         <input type="Submit" value="ඇතුලත් කිරීම" name="Submit" id="btn"><br>
                    </div>  <!--other-->
                </form>
            </ul>




        </div> <!-- core-->
     </div><!--wrapper -->
</body>
</html>