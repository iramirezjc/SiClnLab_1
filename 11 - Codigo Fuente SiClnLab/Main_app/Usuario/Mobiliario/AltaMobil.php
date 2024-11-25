<?php
include("../usuario.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>alta mobiliario</title>
		 <link rel="stylesheet" href="\SiClnLab\css\codeLob\bootstrap.min.css">
      <script src="\SiClnLab\css\codeLob\jquery.min.js"></script>
      <script src="\SiClnLab\css\codeLob\bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="SiCInLab\type\icons.css"/>
	</head>
	<body>
	<br>
	
	<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-info">
						<div class="panel-heading ">
							<div align="center">
								<h3>Agregar Mobiliario</h3>
							</div>
							
						</div>
						<div class="panel-body">
						<div align="center">
							<form method="post" action="insertmob.php">
			  Tipo:
			  <br>
			<input type="text" name="tipo" id="tipo" required/>
			<br><br>
			Material:
			<br>
			<input type="text" name="material" id="material" required/>
			<br><br>
			Nombre:
			<br>
			<input type="text" name="nombre" id="nombre"required/>
			<br><br>
			Cantidad:
			<br>
			<input type="text" name="cantidad" id="cantidad" required/>
			<br><br>
			
			<button class="btn btn-success" type="submit" value="Guardar"> Aceptar</button> 
			<a href="consultaMobiliario.php"><button class="btn btn-warning" type="button" value="regresar">Regresar</button></a>
			<!--<input type="submit" value=" Guardar "/>-->
		</form>
		<br><br>

			<form method="post" action="Mobiliario.php">
			</form>
			<!--</div>-->
			<!--<div align="right">-->
			<!--<a href="consultaMobiliario.php"><button id="eliminar"   >Regresar</button></a>-->
			 				</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
			
	</body>
</html>
	
		
		
		