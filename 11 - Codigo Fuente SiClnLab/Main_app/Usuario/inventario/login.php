<?php
	session_start();
	

	
	$hoy = date("Y-m-d");
	$matricula = $_POST['matricula'];
	
	//Aqui va la condición de que si el Inicio de sesión es correcto
	
	$_SESSION['name'] = $matricula;
	
	include("conexion.php");
	$query = "INSERT INTO inven(fecha, fk_usuar_matri)VALUES('$hoy', '$matricula')";
	//$query = "INSERT INTO inven(id_inven, fecha, fk_usuar_matri) VALUES (NULL, '2019-05-30', '5689')";
	if(!$resultado = $mysqli->query($query)){
  		echo "La matrícula no es válida";
		echo '<br><a href="inicio_inventario.php">Atrás</a>';
	}else{
		header("location:Inventario.php");
 	}
?>