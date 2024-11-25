<?php
include("../usuario.php");
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>SiCInLab</title>
    <link rel="stylesheet" href="\SiClnLab\css\codeLob\bootstrap.min.css">
      <script src="\SiClnLab\css\codeLob\jquery.min.js"></script>
      <script src="\SiClnLab\css\codeLob\bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="SiCInLab\type\icons.css"/>
  </head>

<body>
<center>
<br>
<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-info">
						<div class="panel-heading ">
							<div align="center">
								<h3>Buscar Mobiliario</h3>
							</div>
							
						</div>
						<div class="panel-body">
							<div class="container">

<table class="table table-bordered table-hover alert-light" >
<thead>

<th>Nombre</th>
<th >Tipo</th>
<th >Material</th>
<th >Cantidad</th>
<th></th>
<th></th>

</thead>
<br>
<form method="post" action="consultaMobiliario.php">
<center>

<br><br>
Mobiliario:&nbsp;&nbsp;
<input type="text" name="BuscarMob" id="BuscarMob" placeholder="Ingrese el nombre."/>&nbsp;&nbsp;
<button class="btn btn-success" type="submit" value="Buscar">Buscar</button>
<!--<input type="submit" value="Buscar"/>-->
<a href="AltaMobil.php" <button class="btn btn-primary" type="submit" value="Nuevo"></button>Nuevo </a>
<!--<a href="AltaMobil.php"> <input type="button" value="Nuevo" /> </a>-->
 
</center>
</form>
<br><br>
	<?php
	$sql= "SELECT * FROM mobil";
	if(@$_POST['BuscarMob']){
	$sql .= " WHERE nombr LIKE '%".$_POST['BuscarMob']."%';";
	}
	include("conexion.php");				
	$resultado = $mysqli->query($sql);
	$filas= $resultado->num_rows;				
	while($registro= $resultado->fetch_assoc()){
	echo "<tr>
	
	<td>".$registro['nombr']."</td>
	<td>".$registro['tipo']."</td>
	<td>".$registro['mater']."</td>
	<td>".$registro['canti']."</td>
	<td>
		<form action='modificacionMobil.php' method='post'>
		<input type='hidden' name='id_mobil' id='id_mobil' value='".$registro['id_mobil']."'/>
		<input type='submit' id='modificaciones' value='Modificar'/>
		</form>
	</td>
	<td>
		<form action='deletemobil.php' method='post'>
		<input type='hidden' name='id_mobil' id='id_mobil' value='".$registro['id_mobil']."'/>
		<input type='submit' id='eliminar' value='Eliminar'/>
		</form>
	</td>";

	}				
	?>	
	
</table>
</div>	

						</div>
					</div>
				</div>
			</div>
		</div>

<div></div>
<!--<h1>SiCInLab</h1>-->
</center>
</body>
</html>