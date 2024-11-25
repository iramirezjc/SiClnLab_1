<?php

include("conexion.php");

if(@$_POST['guardar']){
$id_unid=$mysqli->query("SELECT id_unids FROM unids WHERE nombr='".$_POST['opcion_unidades']."'");	
	$id=$id_unid->fetch_assoc();

$sql="INSERT INTO mater (nombr,capac,canti,marca,fk_unids) VALUES ('".$_POST['nombre']."',".$_POST['capacidad'].", ".$_POST['cantidad'].",'".$_POST['marca']."',".$id['id_unids'].")";
$exito=$mysqli->query($sql);
//header("location:detalles_compras.php");
}




$sql="select * from unids";
$resultado=$mysqli->query($sql);
$filas= $resultado->num_rows;

include("../usuario.php");

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<title></title>
		<link rel="stylesheet" href="\SiClnLab\css\codeLob\bootstrap.min.css">
  		<script src="\SiClnLab\css\codeLob\jquery.min.js"></script>
  		<script src="\SiClnLab\css\codeLob\bootstrap.min.js"></script>
  		<link rel="stylesheet" type="text/css" href="\SiClnLab\type\icons.css"/>
	</head>
	<body>
	<br>
	<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-info">
						<div class="panel-heading ">
						<div align="center">
							<h3>Agregar Material</h3>
						</div>
							
						</div>
						<div class="panel-body">
	<form method="POST" action="alta_material.php">
	<center>
				
			<table>
	<tr>
		<th>Nombre</th>
		<td><input id="nombre" name="nombre" type="text"  maxlength="45" required/></td>
	</tr>
	<tr>
		<th>Marca</th>
		<td><input type="text" id="marca" name="marca"  maxlength="45" required/></td>
	</tr>
	<tr>
		<th>Capacidad</th>
		<td><input type="number" id="capacidad" name="capacidad" min="0" required/></td>
	</tr>
	<tr>
		<th>Unidades</th>
		<td><select id="opcion_unidades" name="opcion_unidades" ><?php
			
			while($registro= $resultado->fetch_assoc()){
echo "<option>".$registro['nombr']."</option>";
}
			?>
			
				
			</select></td>
	</tr>
	<tr>
		<th>Cantidad</th>
		<td><input type="number" value="0" readonly="readonly" name="cantidad" id="cantidad"   required/></td>
	</tr>
	<tr>
		<td>
			<p>
				
			</p>
		</td>
	</tr>
	<!--<tr>
		<th><button class="btn btn-success" type="button" value="guardae">Guardar</button></th>
		
		<td><a href="mostrarMater.php"><input id="eliminar" type="button" value="Cancelar"/></a></td>
	</tr>-->
</table>
		<input type="checkbox" name="guardar" value="1" 	/> 
						<h4 >
					Confirmar </h4>

		<button class="btn btn-success" type="submit" value="guardae">Guardar</button>
		
		&nbsp;&nbsp;&nbsp;&nbsp;<a href="detalles_compras.php"><button class="btn btn-warning" type="button" value="cancelar">Cancelar</button></a>
			
		</div>			
		
		</center>
	</form>	
						</div>
					</div>
				</div>
			</div>
		</div>
	
	
	
	</body>
</html>