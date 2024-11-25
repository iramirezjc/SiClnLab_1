<?php
require 'fpdf/fpdf.php';
class PDF extends FPDF{
	
	function Header(){
		$this->SetFont('Arial', 'B', 12);
		$this->Cell(120,10,'Reporte de inventario', 0,0,'C');
		$this->Cell(150,10, 'Fecha: 08 de octubre', 0, 0, L);
		$this->Ln(20);
		
	}
	function Footer(){
		$this->SetY(-15);
		$this->SetFont('Arial', 'I', 8);
		
		$this->Cell(0,10, 'pagina'$this->PageNo().'/{nb}',0,0, 'C');
		
		
	}
	
}
?>