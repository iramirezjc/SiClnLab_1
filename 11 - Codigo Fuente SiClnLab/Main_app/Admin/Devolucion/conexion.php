|<?php
	// conexión a la BD - IP del servidor, username de mysql, pasword de mysql, base de datos a conectar.
	$mysqli= new mysqli("localhost", "root", "", "lab");
	// Si ha ocurrido un error...
	if($mysqli->connect_errno){
		echo "Ha ocurrido un error.<br>";
		// connect_errno -> el numero clave del error, connect_error -> la descripción del error.
		echo "".$mysqli->connect_errno." - ".$mysqli->connect_error."<br>";
		exit;
	}
?>