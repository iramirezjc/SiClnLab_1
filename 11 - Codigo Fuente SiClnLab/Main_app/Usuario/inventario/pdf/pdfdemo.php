<?php
require 'fpdf/fpdf.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(100, 10, 'Hola mundo 08 de octubre', 0,1, 'L');

$pdf->OutPut();



?>