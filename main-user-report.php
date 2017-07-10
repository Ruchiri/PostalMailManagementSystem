<?php

  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "123";
  $dbname = "pmms";

//connection established
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (mysqli_connect_errno()) {
    die("Database connection failed:" . mysqli_connect_error() . "(" . mysqli_connect_error() . ")");

}
/*   if(isset($_GET['btn']))

       $start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];
$report_date = $start_date;
while($end_date >= $report_date){
   $queryReport = "select letter.id,letter.date,letter.subject
                              from letter
                              where letter.date = $report_date";
   echo $queryReport;
   $result = mysqli_query($connection, $queryReport);
   echo $result;
   $report_date = $report_date + 1;
   while($row = mysqli_fetch_array($connection,$result)){
       $id = $row['id'];
       $date = $row['date'];
       $subject = $row['subject'];

   }
}

   }else{
       echo "<script> alert('button is not set')</script>";
   }*/
