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
<!DOCTYPE html>
<html lang="en">
<head>
    <title>History of a letter</title>
    <link rel="stylesheet" href="css/history-of-a-letter.css">
</head>
<body>
<div class="wrapper">
    <h1>ලිපියේ ඉතිහාසය</h1>
</div>
<div class="history">
    <table border="=1" cellpadding="10" cellspacing="3" width="100%">
        <tr>
            <th>අනු අංකය</th>
            <th>ලියාපදිංචි අංකය</th>
            <th>දිනය</th>
            <th>ලිපිය එවූ පාර්ශවය</th>
            <th>විෂය</th>
            <th>පිලිතුරු සපයා ඇත්ද</th>

        </tr>
    </table>
</div>



</body>
</html>