<?php
include "connect.php";
$connection=connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF8">
    <meta charset="UTF-8">
    <title>Notifications</title>
    <link rel="stylesheet" href="css/notification_list.css">
</head>
<body>
<div class="Background">
    <div class="system">
        <img src="img/new.jpg" alt="bope">
    </div>
    <div class="heading">
        <p>නිවේදන</p>
    </div><!--Heading-->

    <div class="Details">
        <?php
        $query = "SELECT section,letter_id,date FROM notification WHERE unread=1 ORDER BY date DESC LIMIT 50";
        mysqli_set_charset($connection, 'utf8');
        $result=mysqli_query($connection,$query);
        ?>
        <table border="=1" cellpadding="10"  width="100%">
            <tbody>
            <?php
            if($result){
                while ($row=mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>".$row['section']." අංශයට යවන ලඳ ".$row['letter_id']." අනු අංකය සහිත ලිපියෙහි වරදක් ඇත."."</td>";
                    echo "<td>".$row['date']."</td>";
                }
            }
            ?>
            </tbody>
        </table>
    </div><!--Details-->
</div><!--Background-->
</body>
</html>
