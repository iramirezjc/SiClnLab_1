<?php

?>

<head>
	<meta http-equiv= "Content-Type" 
	content="charset= UTF-8" />
</head>
<center><h3>Lista de Mobiliarios</h3></center>
<tr><td>
		<hr> <!------------------------------------------------------------------------------------------>
			
<hr>
<hr>

				<table border="1" width="100%">
				<h5 style="position: absolute; left: 10px; top: 85px; width: 195px; height: 23px"></h5><br>
				<tr><td width="5%">ID</td><td width="30%">Tipo</td><td width="10%">Material</td><td width="25%">Nombre</td><td width="20%">Cantidad</td></tr>
				<form method="post" action="mostrarMobil.php" >
				
					<h4 style="position: absolute; left: 440px; top: 60px; width: 195px; height: 23px">
					Nombre del Mobiliario: </h4>
					<input type="text" name="filtro_nom" id="filtro_nom" style="position: absolute; left: 600px; top: 80px; width: 195px; height: 23px"/>
					<input type="submit" value="Buscar" style="position: absolute; left: 800px; top: 80px; width: 80px; height: 23px"/><br>
				</form>				
				<?php
				$sql= "SELECT * FROM mobil";
				if(@$_POST['filtro_nom']){
					$sql .= " WHERE nombr LIKE '%".$_POST['filtro_nom']."%';";
				}
				include("conexion.php");				
				$resultado = $mysqli->query($sql);
				$filas= $resultado->num_rows;				
				while($registro= $resultado->fetch_assoc()){
			
					echo "<tr><td>".$registro['id_mobil'].
						 "</td><td>".$registro['tipo'].
						 "</td><td>".$registro['mater'].
						 "</td><td>".$registro['nombr'].
						 "</td><td>".$registro['canti'].
						 "</td><td>";		
						echo "<form method='post' action='modificacionMobil.php'>";
						echo "<input type='hidden' name='id_mobil' id='id_mobil' value='".
						$registro['id_mobil']."'/>";
						echo "<input type='submit' value='Modificar'/></form>";			 
						echo "</td></tr>";			 
				}		
				?>			
				

		</table>
		<br> <br>
		
		<div align="right">
		<button style="width:85px" onclick="location.href='http://localhost/inicioMobiliario.php'" >Regresar</button>
		</center>
		</div>
		
		
		
