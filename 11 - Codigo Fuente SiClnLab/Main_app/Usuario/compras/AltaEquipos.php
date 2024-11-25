<?php
include("../Usuario.php");
?>



<link rel="stylesheet" href="\SiClnLab\css\codeLob\bootstrap.min.css">
      <script src="\SiClnLab\css\codeLob\jquery.min.js"></script>
      <script src="\SiClnLab\css\codeLob\bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="\SiClnLab\type\icons.css"/>
      
<center>
		 <b>Registrar nuevo equipo</b>
		
		
		
		<form method="post" action="insertequipos.php">
		<table>
	<tr>
		<td>Nombre</td>
		<td><input type="text" name="nombre" id="nombre"   required=""/></td>
	</tr>
	<tr>
		<td>Cantidad</td>
		<td><input type="number" value="0" readonly="readonly" name="cantidad" disabled="" id="cantidad"   required/></td>
	</tr>
	<tr>
		<td>Descripcion</td>
		<td><textarea name="descripcion" id="descripcion"  rows="2" required></textarea></td>
	</tr>
	<tr>
		<td>Tipo</td>
		<td><input type="text" name="tipo" id="tipo"   required/></td>
	</tr>
	<tr>
		<td>
			<a href="detalles_compras.php"><input type="submit" value="Guardar"/></a></td>
		<td> 
			 <a href="detalles_compras.php"><input  id="eliminar" type="button" value="Cancelar"/> </a></td>

	     <td> 
			<button style="width:100px" id="eliminar" onclick="location.href='detalles_compras.php'">Regresar</button>
	</tr> 

			
			
</table>
	
			</form>
			</center>