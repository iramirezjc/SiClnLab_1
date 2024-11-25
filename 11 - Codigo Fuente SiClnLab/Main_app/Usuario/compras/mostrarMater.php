<?php

?>

<head>
	<meta http-equiv= "Content-Type" 
	content="charset= UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<center><h3>Lista de materiales</h3></center>
<tr><td>
		<hr> <!------------------------------------------------------------------------------------------>
			
<hr>
<hr>
<center>
				<table border="1" >
				<h5 style="position: absolute; left: 10px; top: 85px; width: 195px; height: 23px"></h5><br>
				<tr><td>ID</td><td >Nombre del material</td><td >Cantidad</td><td >Marca</td><td >Capacidad</td><td >Unidades</td><td></td><td></td></tr>
				<form method="post" action="mostrarMater.php" >
				
					<h4>
					Nombre del material: <input type="text" name="filtro_nom" id="filtro_nom" />
					<input type="submit" value="Buscar" />
			<a href='alta_material.php'><input type="button" value="Nuevo" /></a><br>
			</h4>
					
					
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
					echo "<tr><td>".$registro['id_mater'].
						 "</td><td>".$registro['nombr'].
						 "</td><td>".$registro['canti'].
						 "</td><td>".$registro['marca'].
						  "</td><td>".$registro['capac'].
						 "</td><td>".$unids['nombr'].
						 "</td><td>";		
						echo "<form method='post' action='modificacionMater.php'>";
						echo "<input type='hidden' name='id_mat' id='id_mat' value='".
						$registro['id_mater']."'/>";
						
						echo "<input type='submit' value='Modificar'/></form>";	
						echo "<td>
						<form method='post' action='deletematerial.php'>
						<input type='hidden' name='id_mat' id='id_mat' value='".
						$registro['id_mater']."'/>
						<input type='submit' value='Eliminar'/>
						</form>
						</td>
						
						
						</tr>";			
//echo "<td><input type='button' value='Eliminar' /></td>						
				}		
				?>				
			</table>
			</center>