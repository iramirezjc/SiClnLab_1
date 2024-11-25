<?php
	include("../admin.php");
	$matricula= $_SESSION['usuario']['id_matri'];
	$hoy = date("Y-m-d");
	// hacer la insercion de un nuevo inventario
	// posteriormente redirigir a linventario.	
	include("conexion.php");
	$query = "INSERT INTO inven(fecha, fk_usuar_matri)VALUES('$hoy', '$matricula')";
	$resultado = $mysqli->query($query);
	header("location:Inventario.php");
?>