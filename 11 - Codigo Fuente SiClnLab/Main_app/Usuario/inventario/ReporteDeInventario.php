<?php
session_start();
//echo $_SESSION['_fecha'];
	require ('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->image('logo.jpg', 10, 3, 33);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Reporte de inventario',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    	
	$this->Cell(10, 10, 'No.', 1, 0, 'C', 0);
    $this->Cell(30, 10, 'Cant. sistema', 1, 0, 'C', 0);
	$this->Cell(32, 10, 'Cant. existente', 1, 0, 'C', 0);
	$this->Cell(30, 10, 'Categoria', 1, 0, 'C', 0);
	$this->Cell(40, 10, 'Nombre', 1, 0, 'C', 0);
	$this->Cell(40, 10, 'Fecha', 1, 1, 'C', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10, utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require 'conexion.php';
$consulta = "SELECT * FROM desgl_inven where fk_inven= ".$_SESSION['_fecha'];
//echo $consulta;
$resultado = $mysqli->query($consulta);

	$pdf = new PDF();
	$pdf -> AliasNbPages();
	$pdf->addPage();
	$pdf->setFont('Arial', '', 10);
	

	$no = 1;
	while ($row= $resultado->fetch_assoc()) {

		$categ_result = $mysqli->query("SELECT nombr FROM categ WHERE id_categ=".$row['fk_categ']);
					$categ= $categ_result->fetch_assoc();

//echo $_SESSION['_fecha'];
		$inven_result = $mysqli->query("SELECT fecha FROM inven WHERE id_inven=".$row['fk_inven']);
					$inven= $inven_result->fetch_assoc();

		$objeto_result = $mysqli->query("SELECT * FROM desgl_inven=".$row['fk_objeto_id']);
					
							
							if($row['fk_categ'] == '4'){
								$dato = "Reactivos";
													
								$sql3 = mysqli_query($mysqli , "SELECT * FROM react");		    
							    while($nomb = mysqli_fetch_array($sql3)){
							    $row['fk_objeto_id']= $nomb [1];
							           }
									}
							 	else if ($row['fk_categ'] == '2' ){
							    $dato ="Materiales";
							    $sql3 = mysqli_query($mysqli , "SELECT * FROM mater");
							    while($nomb = mysqli_fetch_array($sql3)){
							    $row['fk_objeto_id']= $nomb [1];
							        	}               							
									}
									
						   		else if ($row['fk_categ'] == '1' ){
							    $dato ="Equipos";
							    $sql3 = mysqli_query($mysqli , "SELECT * FROM equip");
							    while($nomb = mysqli_fetch_array($sql3)){
							    $row['fk_objeto_id']= $nomb [1];
							        
							        }	
							        				
								}else if ($row['fk_categ'] == '3' ){
								$dato ="Mobiliario";
								$sql3 = mysqli_query($mysqli , "SELECT * FROM mobil");
							    while($nomb = mysqli_fetch_array($sql3)){
							  	$row['fk_objeto_id']= $nomb [3];
							    	}
							    	
								}
		

		$pdf->Cell(10, 10, $no, 1, 0, 'C', 0);
		$pdf->Cell(30, 10, $row['canti_siste'], 1, 0, 'C', 0);
		$pdf->Cell(32, 10, $row['canti_exist'], 1, 0, 'C', 0);
		$pdf->Cell(30, 10, $categ['nombr'], 1, 0, 'C', 0);
		$pdf->Cell(40, 10, $row['fk_objeto_id'], 1, 0, 'C', 0);
		$pdf->Cell(40, 10, $inven['fecha'], 1, 1, 'C', 0);


			$no++;
	}




	$pdf->Output();

?>