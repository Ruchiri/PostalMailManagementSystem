<?php
include 'inc/login.inc.php';
$section= $_SESSION['page'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF8">
    <meta charset="UTF-8">
    <!--<META HTTP-EQUIV="refresh" CONTENT="30">-->
    <title>පිළිතුරු සපයන ලද ලිපි</title>
    <link rel="stylesheet" href="css/replied_list.css">
</head>
<body>

<div class="wrapper">
    <div class="main-img">
        <img src="img/image2.jpg" alt="බෝපෙ-පෝද්දල ප්‍රාදේශීය ලේකම් කාර්යාලය ">
    </div><!--main-image-->
    <div class="content">
        <?php
        include "connect.php";
        $con=connect();
        //$section="ගිණුම් අංශය";

            $query = "select * from letter where replied=1 and section='$se+ction' ";
            mysqli_set_charset($con, 'utf8');
            $data = mysqli_query($con, $query);
            $array=mysqli_fetch_array($data);
            if(empty($array)){
                 echo "පිළිතුරු සැපයූ ලිපි නොමැත!";
            }


            else {
                echo '<table width="120%" border="2" cellpadding="6" cellspacing="5">
         <tr>
             <th>ලියාපදිංචි අංකය</th>
             <th>දිනය</th>
             <th>ලිපිය එවූ පාර්ශවය</th>
             <th>විෂයය</th>
             <th>ලිපිය</th>
         </tr>';

                foreach ($data as $row) {
                    echo '<tr>  
             <td>' . $row["ref_id"] . '</td>
             <td>' . $row["date"] . '</td>  
             <td>' . $row["sender"] . '</td>
             <td>' . $row["subject"] . '</td>
             <td> ' ?>
                    <a href="letter_record_window.php?id=<?php echo $row["id"] ?>"><img
                                src="img/letter.png"/>
                    </a>  <?php '</td>
           </tr>';
                }
                echo '</table>';
            }
        ?>
    </div> <!-- content-->

</div> <!-- wrapper -->


<div class="">

</div>

</body>
</html>