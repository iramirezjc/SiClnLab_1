<?php
include("usuario.php");
include("conexion.php");

if(@$_POST['txtfld_nombre_material']){
$id_unid=$mysqli->query("SELECT id_unids FROM unids WHERE nombr='".$_POST['opcion_unidades']."'");	
	$id=$id_unid->fetch_assoc();
$sql="INSERT INTO mater ( nombr,capac, canti, marca, fk_unids) VALUES ( '".$_POST['txtfld_nombre_material']."',".$_POST['txtfld_capacidad_material'].", ".$_POST['txtfld_cantidad_material'].", '".$_POST['txtfld_marca_material']."',".$id['id_unids'].")";
$exito=$mysqli->query($sql);
header("location:mostrarMater.php");
}


$sql="select * from unids";
$resultado=$mysqli->query($sql);
$filas= $resultado->num_rows;

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
	<form method="post" action="alta_material.php">
	<center>
				
			<table>
	<tr>
		<th>Nombre</th>
		<td><input id="txtfld_nombre_material" name="txtfld_nombre_material" type="text"  maxlength="45" required/></td>
	</tr>
	<tr>
		<th>Marca</th>
		<td><input type="text" id="txtfld_marca_material" name="txtfld_marca_material"  maxlength="45" required/></td>
	</tr>
	<tr>
		<th>Capacidad</th>
		<td><input type="number" id="txtfld_capacidad_material" name="txtfld_capacidad_material" min="0" required/></td>
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
		<td><input type="number" id="txtfld_cantidad_material" name="txtfld_cantidad_material" min="1" required/></td>
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
		<div align="center">
		<button class="btn btn-success" type="submit" value="guardae">Guardar</button>
		
		&nbsp;&nbsp;&nbsp;&nbsp;<a href="mostrarMater.php"><button class="btn btn-warning" type="button" value="cancelar">Cancelar</button></a>
			
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