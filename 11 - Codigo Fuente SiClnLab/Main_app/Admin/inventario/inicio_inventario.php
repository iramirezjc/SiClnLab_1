<?php
include("conexion.php");


	session_start();
	$hoy = date("Y-m-d");
	// hacer la insercion de un nuevo inventario
	// posteriormente redirigir a linventario.	
	
	
	$query = "INSERT INTO inven(fecha, fk_usuar_matri)VALUES('$hoy', ".$_SESSION['fk_usuar_matri'].")";
	$resultado = $mysqli->query($query);

	if ($resultado) {
			header("Location: Inventario.php");
	}else{
		echo "error";
	}

?>