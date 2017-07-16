
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/reply_sheet.inc.css" >
    <A HREF="javascript:history.go()"></A>
    <title>  </title>
    <style>
        @page { size: auto;  margin: 0mm; }
    </style>
</head>
<body>
<div class="content">
<div class="print">
<?php


if(isset($_GET['submit'])) {
 $array=['txtsenderAddress','txtreceiverAddress','txtsalutation','txtSubject','txtletterBody','txtend'];
 $var= 0;
 foreach ( $array as $item) {
     if ($_GET[$item] != '') {
         $str = str_replace(array(' ', ',', '.', '/', '*', '-', '@', '%'), '', $_GET[$item]);
         if (ctype_digit($str) || $str == '') {
             $var=1;
         }
     }
 }
 if ($var==1){
    ?>
    <script>alert("වලංගු තොරතුරු ඇතුලත් කරන්න")
        history.go(-1)
    </script>

    <!--<a href="../replyLetter.php"></a>-->
    <?php
    
 }else{
$senderAddress = trim($_GET['txtsenderAddress']);
$date = $_GET['ddate'];
$receiverAddress = trim($_GET['txtreceiverAddress']);
$salutation = trim($_GET['txtsalutation']);
$subject = trim($_GET['txtSubject']);
$letterBody = trim($_GET['txtletterBody']);
$end = trim($_GET['txtend']);

print nl2br($senderAddress . "\n");
print nl2br($date . "\n\n");
print nl2br($receiverAddress . "\n\n");
print nl2br($salutation . "\n\n");
?>
    <div class="subject">
        <?php
        print nl2br($subject . "\n\n");
        ?>
    </div>
    <?php
    print nl2br($letterBody . "\n\n");
    print nl2br($end . "\n\n");
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

    }
?>

</body>
</html>