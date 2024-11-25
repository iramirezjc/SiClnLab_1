<?php

include("../admin.php");
include("conexion.php");



$sql = mysqli_query($mysqli , "SELECT * FROM inven");
						while ($row2 = mysqli_fetch_array ($sql))
						{
						   $matri=$row2['fk_usuar_matri'];
						   $_SESSION['fk_usuar_matri'] = $matri;
						}

					
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Inicio de inventario</title>
		<link rel="stylesheet" href="codeLob/bootstrap.min.css">
  		<script src="codeLob/jquery.min.js"></script>
  		<script src="codeLob/bootstrap.min.js"></script>
  		<link rel="stylesheet" type="text/css" href="type/icons.css"/>
	</head>
	<body>


		<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-info">
							<div class="panel-heading ">
								<center>
		<h1> Inicio de inventario </h1>
		</center>
							</div>
							<div class="panel-body">
								
		<center>
		<h3>Seleccione una opción</h3>
	<a href="inicio_inventario.php"><button class="btn btn-info">Iniciar inventario</button></a>

		
  		<a href="reporte.php"><button class="btn btn-info">Reportes</button></a>
  		</center>
							</div>
						</div>
					</div>
				</div>
			</div>
		
		
		
		
		 
	</body>
</html>