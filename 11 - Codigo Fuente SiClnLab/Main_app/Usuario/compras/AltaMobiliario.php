		<?php
include("../Usuario.php");
?>
<link rel="stylesheet" href="\SiClnLab\css\codeLob\bootstrap.min.css">
      <script src="\SiClnLab\css\codeLob\jquery.min.js"></script>
      <script src="\SiClnLab\css\codeLob\bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="\SiClnLab\type\icons.css"/>
		<center>
		<table border="0">
		<tr><td> <b>Agregar objeto</b>
		<hr> <!-- ------------------------------------------->
		<form method="post" action="InserteMobiliario.php">
		
		<div align="right">
			Tipo:
			<input type="text" name="tipo" id="tipo"/>
			<br><br>
			Material:
			<input type="text" name="material" id="material"/>
			<br><br>
			Nombre:
			<input type="text" name="nombre" id="nombre"/>
			<br><br>
			Cantidad:
			<input type="text" value="0" readonly="readonly" name="cantidad" disabled="" id="cantidad"/>
			<br><br>
			
			
			<input type="submit" value=" Guardar "/>
		</form>
		<br><br>

			<form method="post" action="Mobiliario.php">
			</form>
			</div>
			<div align="right">
			<button style="width:100px" id="eliminar" onclick="location.href='detalles_compras.php'">Regresar</button>
		</div>
		</center>
		
		
		