<?php
	// conexión a la BD - IP del servidor, username de mysql, pasword de mysql, base de datos a conectar.
	$link= new mysqli("localhost", "root", "", "lab");
	// Si ha ocurrido un error...
	if($link->connect_errno){
		echo "Ha ocurrido un error.<br>";
		// connect_errno -> el numero clave del error, connect_error -> la descripción del error.
		echo "".$link->connect_errno." - ".$link->connect_error."<br>";
		exit;
	}
?>

	