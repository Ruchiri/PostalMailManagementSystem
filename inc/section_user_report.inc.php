<?php
    $date1 = $_GET['date1'];
    $date2 = $_GET['date2'];
    require ("../pdf/fpdf.php");
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Arial", "", "14");
    $pdf->Header();
    $pdf->SetMargins(20, 20, 15);
    $pdf->Ln();
    $pdf->MultiCell(0, 6, $date1, 0);
    $pdf->Cell(0, 6, $date2, 0);
    $pdf->Ln();

    $pdf->Footer();
    $pdf->Output();

?>