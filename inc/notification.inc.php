<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 7/15/2017
 * Time: 12:54 PM
 */

include_once "../connect.php";


function set_notification($connection, $id, $section, $date)
{
    $cmd1 = "SELECT letter_id FROM notification WHERE letter_id='$id'";
    $result1 = mysqli_query($connection, $cmd1);
    $row1 = $result1->fetch_array();
    //if this record has not marked as irrelevent, add to notification table
    if (empty($row1)) {
        $cmd2 = "INSERT INTO notification (section,unread,letter_id,date) VALUES ('$section','0','$id','$date')";
        mysqli_set_charset($connection, 'utf8');
        $result2 = mysqli_query($connection, $cmd2);
        //if query is failed
        if (!$result2) {
            die("database query failed--------------." .
                mysqli_error($connection));
        } else {
            $added = "Y";
        }

    } else {
        $added = "N";

    }
    return $added;

}

if (isset($_GET['report'])) {
    session_start();
    $id = $_SESSION['id'];
    $connection = connect();

    $cmd = "SELECT *FROM letter WHERE id='$id' ";
    mysqli_set_charset($connection, 'utf8');
    $result = mysqli_query($connection, $cmd);

    //if query is failed
    if (!$result) {
        die("database query failed." .
            mysqli_error($connection));
    }

    $row = $result->fetch_array();

    $section = $row['section'];
    $date = $row['date'];
    $reg_no = $row['reg_no'];
    $subject = $row['subject'];
    $sender = $row['sender'];
    $ref_id = $row['ref_id'];
    $replied_no = $row['replied'];
    $scan_copy = $row['rec_letter'];

    $added = set_notification($connection, $id, $section, $date);
    header("Location:..\letter_record_window.php?id=" . $id);
}

?>