<?php
if(isset($_GET['submit'])) {

 $senderAddress= $_GET['txtsenderAddress'];
 $date =$_GET['ddate'];
 $receiverAddress= $_GET['txtreceiverAddress'];
 $salutation= $_GET['txtsalutation'];
 $subject= $_GET['txtSubject'];
 $letterBody= $_GET['txtletterBody'];
 $end=$_GET['txtend'];
 //echo nl2br( $senderAddress);//,$date,$receiverAddress,$salutation,$subject,$letterBody,$end;

require ("../f-pdf/fpdf.php");
 $pdf=new FPDF();
 $pdf->AddPage();
 //$pdf->SetFont("Arial","","14");
 require('../f-pdf/makefont/makefont.php');
 MakeFont('C:\Users\Shanika\Desktop\madu\dev\dejavu-fonts-ttf-2.37\ttf\DejaVuSans.ttf','cp1252');
 $pdf->AddFont('Sinhala','','DejaVuSans.php');
 $pdf->SetFont('Sinhala','',11);
 $pdf->Header();
 $pdf->SetMargins(20,20,15);
 $pdf->Ln();
 $pdf->MultiCell(0,6, $senderAddress,0);
 $pdf->Cell(0,6,$date,0);
 $pdf->Ln();
 $pdf->Ln();
 $pdf->MultiCell(0,6, $receiverAddress,0);
 $pdf->Ln();
 $pdf->MultiCell(0,6, $salutation,0);
 $pdf->Ln();
 //$pdf->SetFont("Arial","u","14");
 $pdf->MultiCell(0,6, $subject,0);
 $pdf->Ln();
 //$pdf->SetFont("Arial","","14");
 $pdf->MultiCell(0,6, $letterBody,0);
 $pdf->Ln();
 $pdf->MultiCell(0,6, $end,0);
 $pdf->Ln();
 $pdf->Footer();
 $pdf->Output();


}
?>