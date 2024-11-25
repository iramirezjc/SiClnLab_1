<?php 

session_start();
	include("conexion.php");
	//$canti_siste = 0;
	$canti_exist = $_POST['agregar'];
	$fk_categ = $_POST['nivel'];
	$fk_objeto_id = $_POST['objeto'];
	$fk_inven = $_POST['fk_inven'];
	
	//$canti_siste = 0 ;
	if( $fk_categ == 1 ){ // equipos
		//$query = "SELECT cant_equip as cantidad FROM equip WHERE id_equip='".$fk_objeto_id."'";  // toma en cuenta que en equipo se llama canti
		$query = "SELECT canti_equip as cantidad FROM equip WHERE id_equip=".$fk_objeto_id.";";
	} else if ( $fk_categ == 2 ){ // materiales
		$query = "SELECT canti as cantidad FROM mater WHERE id_mater=".$fk_objeto_id.";";		
	} else if ( $fk_categ == 3 ){ // mobiliario
		$query = "SELECT canti as cantidad FROM mobil WHERE id_mobil=".$fk_objeto_id.";";
	} else if ( $fk_categ == 4 ) { // reactivos
		$query = "SELECT cant as cantidad FROM react WHERE id_react=".$fk_objeto_id.";";
	}
	$result = $mysqli->query($query);
	$registro= $result->fetch_assoc();	
	$canti_siste = $registro['cantidad']; // nombre del campo cantidad 
	

	$sql= "INSERT INTO desgl_inven (canti_siste, canti_exist, fk_categ, fk_objeto_id, fk_inven)VALUES ('$canti_siste','$canti_exist','$fk_categ','$fk_objeto_id','$fk_inven');";

   echo $sql;
	if(!$resultado = $mysqli->query($sql)){
  		echo "ALGO HA FALLADO";
	}else{
		header("Location:Inventario.php");
 	}
	header("Location: Inventario.php");
 ?>