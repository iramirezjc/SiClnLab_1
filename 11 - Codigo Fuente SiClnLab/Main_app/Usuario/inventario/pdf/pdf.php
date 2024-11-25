<?php

include'plantilla.php';
require'conexion.php';

require 'fpdf/fpdf.php';
$pdf = new FPDF('L', 'mm', array(100,50));
$pdf->SetFont ('Arial', 'B', 10);
$pdf ->AddPage();

 
$pdf->Output();

?> 