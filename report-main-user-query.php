<?php
if(isset($_GET['btn'])){

    $start_date = $_GET['start_date'];
    $dateStart = new DateTime($start_date);
    $end_date = $_GET['end_date'];
    $dateEnd = new DateTime($end_date);
    $section = $_GET['selectSec'];
    $daterange = new DatePeriod($dateStart, new DateInterval('P1D'), $dateEnd);
    $display =  $section." :-  ". $start_date ." සිට " . $end_date . " දක්වා  " ;
    echo $display;
    echo "<br> <br> <br>";
    $count = 1;
    $hasResults = FALSE;
    foreach($daterange as $date)  {  

        include ('dbconnectedPiyu.php');
        mysqli_set_charset($connection, 'utf8');

        $dateString = $date->format('Y-m-d');
        $queryReport = "select letter.id,letter.date,letter.subject,letter.sender  from letter  where letter.date = '$dateString' and letter.section = '$section'";
        $result = mysqli_query($connection, $queryReport);
        while ($row = $result->fetch_array()) {
            if($count==1){
                $count = $count+1;
                $hasResults = TRUE;
                echo "<table border=\"3\" class=\"table\" style='background-color: mistyrose' id = 'datatable'>
            <tr>
                <th>අනු අංකය</th>
                <th>දිනය</th>
                <th>ලිපිය එවූ පාර්ශවය</th>
                <th>විෂය</th>
            </tr>";
            }
            $output =  "<tr> <td>". $row['id']."</td> <td>" . $row['date']."</td> <td>" .$row['sender'] .
                "</td> <td>" .$row['subject'] ."</td></tr>";
            echo "$output";
        }


    }
    echo ('</table>');
    if($hasResults){
        echo "<script> var Table = document.getElementById(datatable);
                                       Table.style.display='table';
                          </script>";
    }else{
        echo "ගැළපෙන ප්‍රථිපල නොමැත";
    }
}
