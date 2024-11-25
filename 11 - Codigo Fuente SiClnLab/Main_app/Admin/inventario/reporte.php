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
		<link rel="stylesheet" href="codeLob/bootstrap.min.css">
  		<script src="codeLob/jquery.min.js"></script>
  		<script src="codeLob/bootstrap.min.js"></script>
  		<link rel="stylesheet" type="text/css" href="type/icons.css"/>
	</head>

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
		<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-info">
							<div class="panel-heading ">
						<h2>Reporte de inventario  </h2> 
							</div>
							<div class="panel-body">
								<center> <!--//el archivo pdf.php aun no se hace en todo caso cuando se le de clic al boton PDF debe de enviarte ahi para que se gen					//ere el PDF o en su caso tu ves que nombre ponerle solo que aqui es donde se debe de imprimir el PDF-->
			
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



<br>

<table class="table table-bordered table-hover alert-light">
	         <thead>
					<tr>
					  
						<th> Cantidad en Sistema </th>
						<th> Cantidad en existencia </th>
					    <th>Categoria</th>
					    <th>Nombre</th>
					    

					</tr>
					</thead>

			<?php
				if($filter){
						$_SESSION['_fecha']= $filter;
						$_SESSION['nombre'] = $nombr_usuar;
						//echo $_SESSION['_fecha'];
						$query = "select * from desgl_inven where fk_inven='$filter'";
						
						}else{
						$query = "select * from desgl_inven";
						}
						if(mysqli_num_rows($sql) == 0){
						echo '<tr><td colspan="8">No hay datos disponibles.</td></tr>';
						}else{
							$no = 1;

$resultado = $mysqli->query($query);
   

   while ($row2 = $resultado-> fetch_assoc()) {

       $cant_=$row2['canti_exist'];
       $canti_sis=$row2['canti_siste'];
       $sql1="select nombr from categ where id_categ=".$row2['fk_categ'];
       $dato1=$mysqli->query($sql1);
       $cate=$dato1->fetch_assoc();
       $categoria=$cate['nombr'];

          
   switch ($row2['fk_categ']) {
   	case 1:
   		$sql2="select nombr_equip from equip where id_equip=".$row2['fk_objeto_id'];
   		$dato2=$mysqli->query($sql2);
        $objeto=$dato2->fetch_assoc();
        $bjt=$objeto['nombr_equip'];
   		break;
   	
   case 2:
        $sql2="select nombr from mater where id_mater=".$row2['fk_objeto_id'];
   		$dato2=$mysqli->query($sql2);
        $objeto=$dato2->fetch_assoc();
        $bjt=$objeto['nombr'];
   		break;

   		case 3:
        $sql2="select nombr from mobil where id_mobil=".$row2['fk_objeto_id'];
   		$dato2=$mysqli->query($sql2);
        $objeto=$dato2->fetch_assoc();
        $bjt=$objeto['nombr'];
   		break;

   		case 4:
        $sql2="select nombr from react where id_react=".$row2['fk_objeto_id'];
   		$dato2=$mysqli->query($sql2);
        $objeto=$dato2->fetch_assoc();
        $bjt=$objeto['nombr'];
   		break;
   }

								echo '<tbody>
								<tr>
								
								<td>'.$canti_sis.'</td>
								<td>'.$cant_.'</td>
								
								<td>'.$categoria.'</td>
								<td>'.$bjt.'</td> 
								</tr>   		
    	                          </tbody>
								';

								
						}
					}
		   ?>
					</table>
					



							</div>
						</div>
					</div>
				</div>
			</div>


		<div class="container " text center>
		<div class="content">
		

			
			<br />
			<br />

						<center>
			<div class="table-responsive">
					
			</div>
		</div>
	</div>
<br>
<br>

	</center>
		
		
	</body>
</html>