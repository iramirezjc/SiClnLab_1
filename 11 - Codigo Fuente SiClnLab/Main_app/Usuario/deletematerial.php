<?php
include("usuario.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Eliminar Material</title>
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
					<div class="panel panel-danger">
						<div class="panel-heading ">
							<div align="center">
								<h3>Eliminar Material</h3>
							</div>
							
						</div>
						<div class="panel-body">
							<center>
<table > 
		
	
		<form method="post" action="eliminarmater.php">
			ID del material a borrar:
			<input type="text" size="26" name="id_material" id="id_material" value="  <?php
			if(@$_POST['id_mat']){			
			echo($_POST['id_mat']);
			}
		?>" /><br><br>
			
			<div align="center">
			<input type="checkbox" name="confirmar" value="1"/> Confirmar borrado
			<button class="btn btn-danger" type="submit" value="Eliminar">Eliminar</button>
		<a href="mostrarMater.php"><button class="btn btn-warning" type="button" value="Regresar">Cancelar</button></a>
		<!--<input type="submit" id="eliminar" value="Borrar"/>-->
			</div>
			
		</form>
		<!--</td></tr>-->
		</table>
		</center>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
	</body>
</html>




