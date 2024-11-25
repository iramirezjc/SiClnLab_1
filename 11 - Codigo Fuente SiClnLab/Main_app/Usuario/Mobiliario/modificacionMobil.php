<?php
include("../usuario.php");
			if(@$_POST['id_mobil']){			
			include("conexion.php");
			$sql= "SELECT * FROM mobil WHERE id_mobil= ".$_POST['id_mobil'];
			$resultado = $mysqli->query($sql);
			$filas= $resultado->num_rows;				
			$registro= $resultado->fetch_assoc();
			$id_mobil_= $registro['id_mobil'];
			$tipo_= $registro['tipo'];
			$mater_= $registro['mater'];
			$nombr_= $registro['nombr'];
			$canti_= $registro['canti'];
			
			}
		?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Modificacion de Mobiliario</title>
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
							<h3>Modificar Mobiliario</h3>
							</div>
						</div>
						<div class="panel-body">
							<form method="post" action="updateObjeto.php" >
			
			<center>
<table>
	<tr>
		<td><input type="hidden" name="idMob" id="idMobi"<?php if(@$_POST['id_mobil']){echo "value= '".$id_mobil_."'"; }?>/><strong><p>IdMobil:</p></strong> </td>
		<td><input type="text" name="nomMobil" id="nomMobil" size= "20" maxlength="30"  <?php if(@$_POST['id_mobil']){echo "value= '".$id_mobil_."'"; }?> disabled /> </td>
	</tr>
	
	<tr>
		<td><strong <p>Tipo </p></strong> </td>
		
		<td><input type="text" name="tipoMobil" id="tipoMobil" size= "20" maxlength="50" <?php if(@$_POST['id_mobil']){echo "value= '".$tipo_."'"; }?> /></td>
	</tr>
	
	<tr>
		<td><strong <p>Materiales</p></strong> </td>
		
		<td><input type="text" name="materMobil" id="materMobil" size= "20" maxlength="11"  <?php if(@$_POST['id_mobil']){echo "value= '".$mater_."'"; }?> /></td>
	</tr>
	
	<tr>
		<td><strong <p>Nombre: </p></strong> </td>
		<td><input type="text" name="nombrMobil" id="nombrMobil" size= "20" maxlength="30" <?php if(@$_POST['id_mobil']){echo "value= '".$nombr_."'"; }?>/></td>
	</tr>
	
	<tr>
		<td><strong <p>Cantidad: </p></strong> </td>
		
		<td><input type="number" name="cantiMobil" id="cantiMobil" size= "20" maxlength="30"  <?php if(@$_POST['id_mobil']){echo "value= '".$canti_."'"; }?> /></td>
	</tr>
	<tr>
		<td>
		<p "></p>
		</td>
	</tr>
	 <br>
	 <br>
</table>
</center>
		<div align="center">
		  
		Confirmar Actualizacion&nbsp;&nbsp;<input type="checkbox" name="guardar" value="1" />
		&nbsp;&nbsp;<td><button  class="btn btn-success" type="submit" value="Buscar" >Actualizar</button></td>
		</div>
		
	 
			<br>					
			<b ></b>
			<br>
			<br> 
				</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	</body>
</html>
