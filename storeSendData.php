<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "123";
$dbname = "pmms";


$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (mysqli_connect_errno()) {
    die("Database connection failed:" . mysqli_connect_error() . "(" . mysqli_connect_error() . ")");

}
mysqli_set_charset($connection, 'utf8');


$section1 = mysqli_real_escape_string($connection, $_GET['section']);
$regNo1= mysqli_real_escape_string($connection,$_GET['registeredNo']);
$date = mysqli_real_escape_string($connection,$_GET['date']);
$sender1 =mysqli_real_escape_string($connection,$_GET['sender']);
$subject1 =mysqli_real_escape_string($connection,$_GET['subject']) ;

if(isset($_GET['done'])){

    $ref_id1 = mysqli_real_escape_string($connection,$_GET['ref_id']);
    if((""=== $ref_id1)or("noRadioChecked" === $ref_id1)){
        $query3 = "SELECT MAX(ref_id) AS ref FROM letter";
        $result3 = mysqli_query($connection,$query3);
        if($result){
            $letter_row3 = mysqli_fetch_row($result3);
            $ref_id1 = (string)((int)($letter_row3[0])+ 1);
        }else{
            $ref_id1 = "1";
        }

    }
    $query1 = "insert into letter (section, reg_no, subject, date, sender, visible, replied,ref_id) values ('{$section1}','{$regNo1}','{$subject1}','{$date}','{$sender1}','1','0','{$ref_id1}')";
    mysqli_query($connection, $query1);

    exit();
}

if(isset($_GET['display'])){

    $query1 = "select letter.id,letter.date,letter.sender,letter.subject,letter.ref_id from letter where letter.section = '$section1'";
    $letter_result = mysqli_query($connection,$query1);

    $output='';
    $output = "<form action='' method=\"get\" id=\"form1\" name = \"form1\"> <table border=\"2px\" style='color: #060333'>
    <tr>
        <th >තෝරන්න</th>
        <th >අනු අංකය</th>
        <th >දිනය</th>
        <th >ලිපිය එවූ පාර්ශවය</th>
        <th >විෂයය</th>
        <th >සම්බන්ධක අංකය</th>
        <th >ඡායා පිටපත</th>
        
        
    </tr>";
    while ($letter_row = $letter_result->fetch_array()) {
        $value = $letter_row['ref_id'];
        if($value==""){
            $value="null";
        }

        $output .=  '<tr><td ><input type="radio" class = "radiobtn"  value= '. $value.' name="radio" id="radio"/>'.'</td> <td>'. $letter_row["id"].'</td> <td>' . $letter_row["date"].'</td> <td>' .$letter_row["sender"] .
            '</td> <td>' .$letter_row["subject"] .'</td><td>' .$letter_row["ref_id"] . '</td>';


    }
    echo ($output.= "</table><br></form>");
    exit();
}
















