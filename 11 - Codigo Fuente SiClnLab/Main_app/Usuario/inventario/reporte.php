<?php
	//session_start();
	include("../admin.php");
	
	include("conexion.php");
	//$matricula = $_SESSION['name'];
	$matricula= $_SESSION['usuario']['id_matri'];
	$hoy = date("Y-m-d");
	$ID = "";
	
	$query = "SELECT id_inven FROM inven WHERE fecha='$hoy' AND fk_usuar_matri='$matricula'";
	$result = $mysqli->query($query);


		while($row = $result->fetch_array()) {
			$ID=$row['id_inven'];		
		}	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		
		<title>Historial de inventario</title>
	</head>
	<style type="text/css">
	table, th, td {
		border:1px solid black;
		border-collapse:collapse;
		padding: 5px;
		text-align: center;
					
	}
	

	table{
		width: 100%;
		
	}
	

	form{
		width: auto;
		height: auto;
		display: inline-block;
	}
	#boton-btn {
  background-color: #bdb3c8;
  color: #000000;
  padding: 10px;
  border-radius: 10px;
  text-decoration: none;
  cursor: pointer;
}
	</style>
	<body>
		<?php 
			include'conexion.php';
			$id_categoria = 0;
			$id_objeto = 0;

			$max = 0;
			$queryMax = "SELECT MAX(id_inven) AS maximo FROM inven";
			$resultMax = $mysqli->query($queryMax);

			if ($row2 = $resultMax->fetch_array()) {
				$max = $row2['maximo'];			
			}

		 ?>
		
		

		<div class="container " text center>
		<div class="content">
		<center> <!--//el archivo pdf.php aun no se hace en todo caso cuando se le de clic al boton PDF debe de enviarte ahi para que se gen					//ere el PDF o en su caso tu ves que nombre ponerle solo que aqui es donde se debe de imprimir el PDF-->
			<h2>Reporte de inventario  </h2> 
			<hr /><a href="ReporteDeInventario.php"><input type="button" style="danger" align="right" name="cancelar" value="Generar PDF" /></a>
			</center>

			<form class="form-inline" method="get">
				<div class="form-group">
						<select name="filter" class="form-control" onchange="form.submit()">

						<option value="0">Seleccione Fecha</option>
						
			<?php 
						$filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL); 

						$sql = mysqli_query($mysqli , "SELECT * FROM inven");
						while ($row2 = mysqli_fetch_array ($sql))
						{
						    $options = $options."<option value='$row2[0]' > $row2[1] </option>";
						}

						echo $options; 
			?>

						</select>

				</div>
			</form>
			<br />
			<br />
					<!--<center>
							&nbsp;
				<input type="button" name="iniciar" value="Inciar inventario" />
 <b>&nbsp;</b><a href="inicio.php"><input type="button" name="iniciar" value="Inicio" /></a>

						<br/>
						<br/>
						
						</center>-->
			<div class="table-responsive">
					<table class="table table-striped">
					<tr>
					    <th>No</th>
						<th> Cantidad en Sistema </th>
						<th> Cantidad en existencia </th>
					    <th>Categoria</th>
					    <th>Nombre</th>

					</tr>

			<?php
				if($filter){
						$_SESSION['_fecha']= $filter;
						//echo $_SESSION['_fecha'];
						$sql = mysqli_query($mysqli , "SELECT * FROM desgl_inven WHERE fk_inven='$filter' ");
						}else{
						$sql = mysqli_query($mysqli , "SELECT * FROM desgl_inven");
						}
						if(mysqli_num_rows($sql) == 0){
						echo '<tr><td colspan="8">No hay datos disponibles.</td></tr>';
						}else{
							$no = 1;

							while($row = mysqli_fetch_assoc($sql)){

								if($row['fk_categ'] == '4'){
								$dato = "Reactivos";
													
								$sql3 = mysqli_query($mysqli , "SELECT * FROM react");		    
							    while($nomb = mysqli_fetch_array($sql3)){
							    $row['fk_objeto_id']= $nomb [1];
							           }
									}
							 	else if ($row['fk_categ'] == '2' ){
							    $dato ="Materiales";
							    $sql3 = mysqli_query($mysqli , "SELECT * FROM mater");
							    while($nomb = mysqli_fetch_array($sql3)){
							    $row['fk_objeto_id']= $nomb [1];
							        	}               							
									}
									
						   		else if ($row['fk_categ'] == '1' ){
							    $dato ="Equipos";
							    $sql3 = mysqli_query($mysqli , "SELECT * FROM equip");
							    while($nomb = mysqli_fetch_array($sql3)){
							    $row['fk_objeto_id']= $nomb [1];
							        
							        }	
							        				
								}else if ($row['fk_categ'] == '3' ){
								$dato ="Mobiliario";
								$sql3 = mysqli_query($mysqli , "SELECT * FROM mobil");
							    while($nomb = mysqli_fetch_array($sql3)){
							  	$row['fk_objeto_id']= $nomb [3];
							    	}
							    	
								}
								echo '<tr>
								<td>'.$no.'</td>
								<td>'.$row['canti_siste'].'</td>
								<td>'.$row['canti_exist'].'</td>
								
								<td>'.$dato.'</td>
								<td>'.$row['fk_objeto_id'].'</td>
								<td>';

								$no++;
						}
					}
		   ?>
					</table>
					
			</div>
		</div>
	</div>
<br>
<br>

	
		
		
	</body>
</html>