<?php
include("../usuario.php");
$id_mob="";
if(@$_POST['id_mobil']){
	$id_mob=$_POST['id_mobil'];
	
}
?>
<!DOCTYPE html> 
<html>
	<head>
		<meta charset="utf-8">
		<title>mobiliario</title>
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
					<div class="panel panel-danger">
						<div class="panel-heading ">
						<div align="center">
							<h3>Eliminar Mobiliario</h3>
						</div>
						</div>
						<div class="panel-body">
							<center>
 
		<form method="post" action="eliminarmobil.php">
			ID del mobiliario a borrar:
			<input type="text" size="26" name="id_mobiliario" id="id_mobiliario" <?php echo(" value='".$id_mob."' ");?>/><br><br>
			<div align="center">
			<input type="checkbox" name="confirmar" value="1"/> Confirmar borrado
			<button class="btn btn-danger" type="submit" value="Eliminar">Eliminar</button>
			<!--<input type="submit" value="Borrar"/>-->
			<a href="consultaMobiliario.php"><button class="btn btn-warning" type="button" value="Cancelar"> Regresar</button></a>
			</div>
			<br>
			
		</form>
	</center>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</body>
</html>