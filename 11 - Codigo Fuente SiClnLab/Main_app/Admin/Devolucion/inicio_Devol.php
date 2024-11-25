<?php
include("../admin.php");
include 'conexion.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>inicio Devolucion</title>
	<link rel="stylesheet" href="\SiClnLab\css\codeLob\bootstrap.min.css">
  		<script src="\SiClnLab\css\codeLob\jquery.min.js"></script>
  		<script src="\SiClnLab\css\codeLob\bootstrap.min.js"></script>
  		<link rel="stylesheet" type="text/css" href="\SiClnLab\type\icons.css"/>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-info">
						<div class="panel-heading text-center">
							<h3>Consulta de prestamo</h3>
						</div>
						<div class="panel-body text-center">
							<form method="POST" action="inicio_Devol.php">
								<br><br><br>
								Matricula:
								<input type="text" name="Matricula">
								<button type="submit" value="" class="btn btn-success">consultar</button>
							</form>
							<div class="container">
								<center>
									<table class="table table-bordered table-hover alert-light">
										<tr>
										<td width="10%">
											No. de prestamo
										</td>
										<td width="15%">
											Fecha de prestamo
										</td>
										<td width="10%">
											Detalles
										</td>
										<br>
										<?php
										if(@$_POST['Matricula'])
										{
											$sql       = "SELECT * FROM prest WHERE matri_solic =".$_POST['Matricula'];
											$resultado = $mysqli->query($sql);
											if(mysqli_num_rows($resultado) == 0)
											{
												echo '<tr><td colspan="8"><h2>No tiene prestamos en curso.</h2></td></tr>';
											}
											else
											{
												while($registro = $resultado->fetch_assoc())
												{
													echo "<tr><td>".$registro['id_prest'].
													"</td><td>".$registro['fecha_entre'].
													"</td><td>";
													echo "<form method='post' action='detall_devol.php'>";
													echo "<input type='hidden' name='Ver_detalles' id='Ver_detalles' value='".
													$registro['id_prest']."'/>";
													echo "<button type='submit' value='' class='btn btn-success'>Ver detalles</button></form>";
													echo "</td></tr>";
												}
											}
										}
										?>
									</table>
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>