

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/reply_sheet.inc.css">
    <title>  </title>
</head>
<body>
<div class="content">

<?php

if(isset($_GET['submit'])) {

    $senderAddress = $_GET['txtsenderAddress'];
    $date = $_GET['ddate'];
    $receiverAddress = $_GET['txtreceiverAddress'];
    $salutation = $_GET['txtsalutation'];
    $subject = $_GET['txtSubject'];
    $letterBody = $_GET['txtletterBody'];
    $end = $_GET['txtend'];

    echo $senderAddress; ?> <br><?php
    echo $date ; ?> <br><?php
    echo $receiverAddress ; ?> <br><?php
    echo $salutation ; ?> <br><?php
    echo $subject ; ?> <br><?php
    echo $letterBody ; ?> <br><?php
    echo $end ; ?> <br><?php

?>
    <script type="text/javascript">
        var reply;
        function printReply() {
            reply = this.print();
        }
    </script>
    <script>
        printReply();
    </script>

    <?php

}
?>

</body>
</html>