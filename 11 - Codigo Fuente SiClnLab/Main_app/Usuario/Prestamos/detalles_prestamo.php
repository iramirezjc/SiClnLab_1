<?php

include("../usuario.php");
include("conect.php");
$prestamo = $_SESSION["conteo"];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>
		</title>
		<meta charset="utf-8">
		<meta name="viewport" content="with=device-with, initial-scale=1" ><!---tamaño-->
		  <link rel="stylesheet" href="\SiClnLab\css\codeLob\bootstrap.min.css">
      <script src="\SiClnLab\css\codeLob\jquery.min.js"></script>
      <script src="\SiClnLab\css\codeLob\bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="SiCInLab\type\icons.css"/>
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
		<br><br>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-info">
						<div class="panel-heading text-center">
							<h3>Prestamo</h3>
							<p><h3 align="left">Folio: <?php echo $_SESSION['conteo']; ?></h3></p>
						</div>
						<div class="panel-body text-center">
							<form name="form1" action="detalles_prestamo.php" method="post">
							<div class="container">
								<div class="row">
									<div class="col-md-6">
										Categoria:
										<select name="cate"id="cate" onChange="document.form1.action='detalles_prestamo.php'; document.form1.submit();">
											<option  value="0">Selecionar</option>
											<?php echo @$_POST['cate'];

											$sql       = "select * FROM categ";
											$resultado = $conexion->query($sql);
											while($registros = $resultado-> fetch_assoc())
											{
												$sel = "";
												if(@$_POST['cate'] == $registros['id_categ'])
												{
													$sel = " selected ";
												}
												else
												{
													$sel = "";
												}
												echo(" <option value='".$registros['id_categ']."' ".$sel." >".$registros['nombr']."</option>");
											}
											?>
										</select>
										<a href="Prestamo.php" >
											<button class="btn btn-success" type="button" id="eliminar" value="">Finalizar Prestamo</button>
										</a>
									</div>
									<div class="col-md-6" style="text-align: center; ">
										<h4>
											Prestamos realizados:
										</h4>
									</div>
								</div>
							</div>
						</div>
						</form>
						<br><br>
						<div class="container">
							<div class="row">
								<div class="col-sm-6"  style="text-align: center; ">
									<?php
									if(@$_POST['cate'] == 1)
									{
										//Para equipos
										$sql       = "select id_equip,nombr_equip, canti_equip, tipo from equip";
										$resultado = $conexion->query($sql);
										echo "<table class='table table-bordered table-hover alert-light';>
										<thead>
										<tr>
										<th>Nombre</th>
										<th>Tipo</th>
										<th>Cantidad </th>
										<th>Cantidad a solicitar</th>
										<th> </th>
										</tr>
										</thead>";
										while($registro = $resultado->fetch_assoc())
										{
											echo "<tbody>
											<tr>
											<td>".$registro['nombr_equip']."</td>
											<td>".$registro['tipo']."</td>
											<td>".$registro['canti_equip']."</td>
											<td><form action='finalizar.php' method='post'>
											<input type='number' id='cant_prest' name='cant_prest' min='1'  max='".$registro['canti_equip']."' required/>
											<input type='hidden' id='id_equip' name='id' value='".$registro['id_equip']."'/>
											<input type='hidden' name='cate' value='".$_POST['cate']."'/>
											<td> <button class='btn btn-primary' type='submit' value=''>Agregar a prestamos</button></td>
											</form></td>
											</tr>
											</tbody>
											";
										}
									}
									else
									if(@$_POST['cate'] == 2)
									{
										// materiales
										$sql       = "select id_mater,nombr, capac, canti, fk_unids from mater";
										$resultado = $conexion->query($sql);
										echo "<table class='table table-bordered table-hover alert-light';>
										<thead>
										<tr>
										<th>Nombre</th>
										<th>Capacidad</th>
										<th>Unidad </th>
										<th>Cantidad</th>
										<th>Cantidad a prestar </th>
										<th> </th>
										</tr>
										</thead>";
										while($registros = $resultado->fetch_assoc())
										{
											$resultado2 = $conexion->query("select nombr from unids where id_unids=".$registros['fk_unids']);
											$unidades   = $resultado2->fetch_assoc();
											echo "<tbody>
											<tr>
											<td>".$registros['nombr']."</td>
											<td>".$registros['capac']."</td>
											<td>".$unidades['nombr']."</td>
											</td>
											<td>".$registros['canti']."</td>
											<td><form action='finalizar.php' method='post'>
											<input type='number' id='cant_prest' name='cant_prest' min='1'  max='".$registros['canti']."' required/>
											<input type='hidden' id='id_mater' name='id' value='".$registros['id_mater']."'/>
											<input type='hidden' name='cate' value='".$_POST['cate']."'/>
											<td> <button class='btn btn-primary' type='submit' value=''>Agregar a prestamos</button></td>
											</form></td>
											</tr>
											</tbody>
											";
										}
									}
									else
									if(@$_POST['cate'] == 3)
									{
										// mobiliarios
										$sql       = "select id_mobil,nombr, tipo, canti from mobil";
										$resultado = $conexion->query($sql);
										echo "<table class='table table-bordered table-hover alert-light';>
										<thead>
										<tr>
										<th>Nombre</th>
										<th>Tipo</th>
										<th>Cantidad</th>
										<th>Cantidad a prestar</th>
										<th> </th>
										</tr>
										</thead>";
										while($registros = $resultado->fetch_assoc())
										{
											echo "<tbody>
											<tr>
											<td>".$registros['nombr']."</td>
											<td>".$registros['tipo']."</td>
											<td>".$registros['canti']."</td>
											<td><form action='finalizar.php' method='post'>
											<input type='number' id='cant_prest' name='cant_prest' min='1'  max='".$registros['canti']."' required/>
											<input type='hidden' id='id_equip' name='id' value='".$registros['id_mobil']."'/>
											<input type='hidden' name='cate' value='".$_POST['cate']."'/>
											<td> <button class='btn btn-primary' type='submit' value=''/>Agregar a prestamos</button></td>
											</form></td>
											</tr>
											</tbody>
											";
										}
									}
									?>
									</table>
								</div>
								<div class="col-md-2">
								</div>
								<div class="col-md-2" style="text-align: center; position: left;">
									<table class="table table-bordered table-hover alert-light" >
										<thead>
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
											</tr>
										</thead>
										<?php
										$query     = "select * from detall_prest where fk_prest='$prestamo'";
										$resultado = $conexion->query($query);
										while($row2 = $resultado-> fetch_assoc())
										{
											$sql1      = "select nombr from categ where id_categ=".$row2['fk_categ'];
											$dato1     = $conexion->query($sql1);
											$cate      = $dato1->fetch_assoc();
											$categoria = $cate['nombr'];
											$cant_     = $row2['cant'];
											switch($row2['fk_categ'])
											{
												case 1:
												$sql2   = "select nombr_equip from equip where id_equip=".$row2['fk_objeto_id'];
												$dato2  = $conexion->query($sql2);
												$objeto = $dato2->fetch_assoc();
												$bjt    = $objeto['nombr_equip'];
												break;

												case 2:
												$sql2   = "select nombr from mater where id_mater=".$row2['fk_objeto_id'];
												$dato2  = $conexion->query($sql2);
												$objeto = $dato2->fetch_assoc();
												$bjt    = $objeto['nombr'];
												break;

												case 3:
												$sql2   = "select nombr from mobil where id_mobil=".$row2['fk_objeto_id'];
												$dato2  = $conexion->query($sql2);
												$objeto = $dato2->fetch_assoc();
												$bjt    = $objeto['nombr'];
												break;

												case 4:
												$sql2   = "select nombr from react where id_react=".$row2['fk_objeto_id'];
												$dato2  = $conexion->query($sql2);
												$objeto = $dato2->fetch_assoc();
												$bjt    = $objeto['nombr'];
												break;
											}

											?>
											<?php
											echo '
											<tbody>
											<tr>
											<td>'.$categoria.' </td>
											<td>'.$bjt.'</td>
											<td>'.$cant_.' </td>
											</tr>
											</tbody>
											';
										}
										?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>