<?php
include("../usuario.php");
include 'conexion.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Detalles_devolucion</title>
		<link rel="stylesheet" href="\SiClnLab\css\codeLob\bootstrap.min.css">
  		<script src="\SiClnLab\css\codeLob\jquery.min.js"></script>
  		<script src="\SiClnLab\css\codeLob\bootstrap.min.js"></script>
  		<link rel="stylesheet" type="text/css" href="\SiClnLab\type\icons.css"/>
	</head>
	<style>
		label
		{
			display: inline-block;
			width: 150px;
		}
		input
		{
			width: 130px;
		}
		select
		{
			width: 130px;
			height: 28px;
		}
	</style>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-info">
						<div class="panel-heading text-center">
							<h3>Detalles de prestamo</h3>
						</div>
						<div class="panel-body text-center">
							<table class="table table-bordered table-hover alert-light">
								<tr>
									<th>
										Categoria
									</th>
									<th>
										Objeto
									</th>
									<th>
										Cantidad
									</th>
									<th>
										Devolver
									</th>

								</tr>
								<?php

								$fk= @$_POST['Ver_detalles'];
								$query = "SELECT * FROM detall_prest where fk_prest= ".$fk;
								$resultado = $mysqli->query($query);
								while($row2 = $resultado->fetch_assoc())
								{
									$sql1      = "select nombr from categ where id_categ=".$row2['fk_categ'];
									$dato1     = $mysqli->query($sql1);
									$cate      = $dato1->fetch_assoc();
									$categoria = $cate['nombr'];
									$cant_     = $row2['cant'];
									switch($row2['fk_categ'])
									{
										case 1:
										$sql2   = "select nombr_equip from equip where id_equip=".$row2['fk_objeto_id'];
										$dato2  = $mysqli->query($sql2);
										$objeto = $dato2->fetch_assoc();
										$bjt    = $objeto['nombr_equip'];
										break;

										case 2:
										$sql2   = "select nombr from mater where id_mater=".$row2['fk_objeto_id'];
										$dato2  = $mysqli->query($sql2);
										$objeto = $dato2->fetch_assoc();
										$bjt    = $objeto['nombr'];
										break;

										case 3:
										$sql2   = "select nombr from mobil where id_mobil=".$row2['fk_objeto_id'];
										$dato2  = $mysqli->query($sql2);
										$objeto = $dato2->fetch_assoc();
										$bjt    = $objeto['nombr'];
										break;

										case 4:
										$sql2   = "select nombr from react where id_react=".$row2['fk_objeto_id'];
										$dato2  = $mysqli->query($sql2);
										$objeto = $dato2->fetch_assoc();
										$bjt    = $objeto['nombr'];
										break;
									}
									?>
									<?php
									echo '
									<tr>
									<td>'.$categoria.' </td>
									<td>'.$bjt.'</td>
									<td>'.$cant_.' </td>
									<td>
									';
									echo "<form method='POST' action='devol_id.php'>
									<input type='hidden' name='devol_' id='devol_' value='".
									$row2['fk_prest']."'/>
									<input type='hidden' name='obj' id='obj' value='".
									$row2['fk_objeto_id']."'/>
									<input type='hidden' name='cate' id='cate' value='".
									$row2['fk_categ']."'/>
									<input type='hidden' name='cantidad' id='cantidad' value='".
									$row2['cant']."'/>
									<button type='submit' class='btn btn-warning' value=''>devolver</button></form>
									</td>

									</tr>";
								}
								?>
							</table>
							<br>
							<button class="btn btn-info" style="width:85px" onclick="location.href='inicio_Devol.php'" >Regresar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

