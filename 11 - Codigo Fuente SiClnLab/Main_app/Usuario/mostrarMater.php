<?php
include("usuario.php");
?>

<!DOCTYPE html> 
<html>
<head>
	<meta http-equiv= "Content-Type" 
	content="charset= UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
							<h3>Materiales</h3>
							</div>
						</div>
						<div class="panel-body">
						<div class="container">
							<table class="table table-bordered table-hover alert-light" >
							<thead>
							<tr>
							
							<th >Nombre del material</th>
							<th >Cantidad</th><th >Marca</th>
							<th >Capacidad</th>
							<th >Unidades</th>
							<th></th><th>
									
							</th></tr>
							</thead>
							<tbody>
								<form method="post" action="mostrarMater.php" >
				<div align="center">
					<h4>
					Nombre del material: <input type="text" name="filtro_nom" id="filtro_nom" />
					<button class="btn btn-success" type="submit" value="Buscar">Buscar</button>
					<!--<input type="submit" value="Buscar" />-->
					<a href="alta_material.php"><button class="btn btn-primary" type="button" value="Nuevo">Nuevo</button></a>
					
					<!--<a href='alta_material.php'><input type="button" value="Nuevo" /></a><br>-->
			
			</h4>
				</div>
					
					
					
				</form >	
				
				<?php
				$sql= "SELECT * FROM mater ";
				if(@$_POST['filtro_nom']){
					$sql .= " WHERE nombr LIKE '%".$_POST['filtro_nom']."%';";
				}
				include("conexion.php");				
				$resultado = $mysqli->query($sql);
				$filas= $resultado->num_rows;				
				while($registro= $resultado->fetch_assoc()){
					$unids_result = $mysqli->query("select nombr from unids where id_unids=".$registro['fk_unids']);
					$unids= $unids_result->fetch_assoc();
					echo "<tr  ><td>".$registro['nombr'].
						 "</td><td    >".$registro['canti'].
						 "</td><td>".$registro['marca'].
						  "</td><td  '>".$registro['capac'].
						 "</td><td>".$unids['nombr'].
						 "</td><td>";		
						echo "<form method='post' action='modificacionMater.php'>";
						echo "<input type='hidden' name='id_mat' id='id_mat' value='".
						$registro['id_mater']."'/>";
						
						echo "<input type='submit' id='modificaciones' value='Modificar'/></form>";	
						echo "<td>
						<form method='post' action='deletematerial.php'>
						<input type='hidden' name='id_mat' id='id_mat' value='".
						$registro['id_mater']."'/>
						<input type='submit'id='eliminar' value='Eliminar'/>
						</form>
						</td>
						
						
						</tr>";			
			
				}		
				?>	
								
							</tbody>
							
						
							
				<table  id="tablas" border="1">
				<h5 style="position: absolute; left: 10px; top: 85px; width: 195px; height: 23px"></h5><br>
				
				
				</table>			
		</table>
		</div>
			
						</div>
					</div>
				</div>
			</div>
		</div>
<!--<center><h3>Lista de materiales</h3></center>-->


	</body>
</html>		
