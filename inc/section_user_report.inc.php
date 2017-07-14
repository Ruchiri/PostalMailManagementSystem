<?php
$html = '
<html>
<head>
    <h1><a name="top"></a>mPDF</h1>
</head>
<body>
    <h2>මුර පදය තහවුරු කරන්න</h2>
    <h3>Heading 3</h3>
    <h4>Heading 4</h4>
    <h5>Heading 5</h5>
    <h6>Heading 6</h6>
</body>
</html>
';

require ("../mpdf/mpdf.php");
$mpdf=new mPDF('UTF-8','A4',9,'kaputaunicode');
$mpdf->WriteHTML($html);
$mpdf->Output();
?>