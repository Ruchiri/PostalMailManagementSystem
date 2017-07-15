
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/reply_sheet.inc.css" >

    <title> . </title>
    <style>
        @page { size: auto;  margin: 0mm; }
    </style>
</head>
<body>
<div class="content">
<div class="print">
<?php

if(isset($_GET['submit'])) {

    $senderAddress = $_GET['txtsenderAddress'];
    $date = $_GET['ddate'];
    $receiverAddress = $_GET['txtreceiverAddress'];
    $salutation = $_GET['txtsalutation'];
    $subject = $_GET['txtSubject'];
    $letterBody = $_GET['txtletterBody'];
    $end = $_GET['txtend'];

    print nl2br($senderAddress."\n");
    print nl2br($date."\n\n");
    print nl2br($receiverAddress."\n\n");
    print nl2br($salutation."\n\n");
    ?>
    <div class="subject">
        <?php
    print nl2br($subject."\n\n");
    ?>
    </div>
    <?php
    print nl2br($letterBody."\n\n");
    print nl2br($end."\n\n");
    ?>
</div>
    <script type="text/javascript">
        var reply;
        function printReply() {
            reply = window.print();
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