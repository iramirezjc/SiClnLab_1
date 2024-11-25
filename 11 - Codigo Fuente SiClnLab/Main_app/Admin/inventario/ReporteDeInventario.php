<?php
session_start();
 
//echo $_SESSION['_fecha'];
	require ('fpdf.php');
require 'conexion.php';
$consulta = "SELECT * FROM desgl_inven where fk_inven= ".$_SESSION['_fecha'];
//echo $consulta;
$resultado = $mysqli->query($consulta);
$row = $resultado-> fetch_assoc();
$result = $mysqli->query($consulta);

//----------------------------------------------------------------------
$inven_result = $mysqli->query("SELECT fecha FROM inven WHERE id_inven=".$row['fk_inven']);
          $inven= $inven_result->fetch_assoc();

$fec=$inven['fecha'];
class PDF extends FPDF
{
// Cabecera de página
function Header()
{


  global $fec;

    $this->image('logo.jpg', 10, 3, 33);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Reporte de inventario',0,0,'C');
    // Salto de línea
    $this->Ln(20);
      //-----------------datos----------------
    $this->cell(30,10, 'Usuario: '.$_SESSION['nombre'], 0, 0, 'C');
 
 $this->Ln(5);
//---------------
    	 $this->cell(35,10, 'Fecha: '.$fec, 0, 0, 'C');
 
 $this->Ln(15);


	$this->Cell(20, 10, 'No.', 1, 0, 'C', 0);
  $this->Cell(40, 10, 'Cant. sistema', 1, 0, 'C', 0);
	$this->Cell(42, 10, 'Cant. existente', 1, 0, 'C', 0);
	$this->Cell(40, 10, 'Categoria', 1, 0, 'C', 0);
	$this->Cell(50, 10, 'Nombre', 1, 1, 'C', 0);
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



	$pdf = new PDF();
	$pdf -> AliasNbPages();
	$pdf->addPage();
	$pdf->setFont('Arial', '', 10);
	

	$no = 1;
		 

//echo $_SESSION['_fecha'];
	


			  while ($row2 = $result-> fetch_assoc()) {
	
       $cant_=$row2['canti_exist'];
       $canti_sis=$row2['canti_siste'];
   $sql1="select nombr from categ where id_categ=".$row2['fk_categ'];
       $dato1=$mysqli->query($sql1);
       $cate=$dato1->fetch_assoc();
       $categoria=$cate['nombr'];

          
   switch ($row2['fk_categ']) {
   	case 1:
   		$sql2="select nombr_equip from equip where id_equip=".$row2['fk_objeto_id'];
   		 $dato2=$mysqli->query($sql2);
       $objeto=$dato2->fetch_assoc();
       $bjt=$objeto['nombr_equip'];
   		break;
   	
   case 2:
        $sql2="select nombr from mater where id_mater=".$row2['fk_objeto_id'];
   		 $dato2=$mysqli->query($sql2);
       $objeto=$dato2->fetch_assoc();
       $bjt=$objeto['nombr'];
   		break;

   		case 3:
        $sql2="select nombr from mobil where id_mobil=".$row2['fk_objeto_id'];
   		 $dato2=$mysqli->query($sql2);
       $objeto=$dato2->fetch_assoc();
       $bjt=$objeto['nombr'];
   		break;

   		case 4:
        $sql2="select nombr from react where id_react=".$row2['fk_objeto_id'];
   		 $dato2=$mysqli->query($sql2);
       $objeto=$dato2->fetch_assoc();
       $bjt=$objeto['nombr'];
   		break;
   }
		

		$pdf->Cell(20, 10, $no, 1, 0, 'C', 0);
		$pdf->Cell(40, 10, $canti_sis, 1, 0, 'C', 0);
		$pdf->Cell(42, 10, $cant_, 1, 0, 'C', 0);
		$pdf->Cell(40, 10, $categoria, 1, 0, 'C', 0);		
		$pdf->Cell(50, 10, $bjt, 1, 1, 'C', 0);


			$no++;
	}




	$pdf->Output();

?>