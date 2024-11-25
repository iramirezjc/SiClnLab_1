<?php
include("../admin.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Inicio de inventario</title>
		<link rel="stylesheet" href="">
		
    <style type="text/css" media="screen">
    	
    </style>
	</head>
	<body>
		<center>
		<h1> Inicio de inventario </h1>
		</center>
		<form method="post" action= "Inventario.php">
		
		  <!--<span>Inicio de inventario</span>-->
		  <!--<input name="matricula" placeholder="Matrícula" required>
		  <input type = "submit" id = "iniciar" value = "iniciar" name = "iniciar">	-->
		</form>
	
		
		<center>
		<!--<h1>Inventario</h1>-->
		
		
		
		<h3>Seleccione una opción</h3>
		
		
		
		<a href="inicio_inventario.php"><input type="button" name="iniciar" value="Iniciar inventario" /></a>

		
  		<a href="reporte.php"><input type="button" name="cancelar" value="Reportes" /></a>
  		</center>
		
		 
	</body>
</html>