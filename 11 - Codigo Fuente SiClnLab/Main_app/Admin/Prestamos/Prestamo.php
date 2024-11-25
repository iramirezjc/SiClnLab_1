<?php

include("../admin.php");
include("conect.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>
		</title>
		  <link rel="stylesheet" href="\SiClnLab\css\codeLob\bootstrap.min.css">
      <script src="\SiClnLab\css\codeLob\jquery.min.js"></script>
      <script src="\SiClnLab\css\codeLob\bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="SiCInLab\type\icons.css"/>
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
	</head>
	<body>
		<br>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-info">
						<div class="panel-heading text-center">
							<h3>Prestamo</h3>
						</div>
						<div class="panel-body text-center">
							<div class="container">
								<div class="row">
									<div class="col-md-6">
										<form action="datos.php" method="POST" accept-charset="utf-8">
											<label>Usuario:</label>
											<input type="text"  value="<?php echo($matri_usuar);?>" disabled=""/>
											<input type="hidden" name="solicitante" value="<?php echo($matri_usuar);?>" />
											<br><br>
											<label>Matricula del prestador:</label>
											<input type="text" name="matricula" required="true"><br><br>
											<label>Fecha de entrega:</label>
											<input type="date" name="entrega" required="true"><br><br>
											<label>Fecha de devolución:</label>
											<input type="date" name="devolucion" required="true"> <br><br>
											<button class="btn btn-success" type="submit">Aceptar</button>
											<a href="../admin.php">
												<button class="btn btn-warning" type="button" name="cancelar" >Cancelar</button>
											</a>
										</form>
									</div>
									<div class="col-md-6">
										<br>  <br> <br> <br> <br>
										<a href="/SiClnLab/Main_app/admin/Consumible/prestamo_consumible.php">
											<button class="btn btn-info" type="button" value="">Prestamos consumibles</button>
										</a> <br> <br>
										<a href="/SiClnLab/Main_app/admin/Devolucion/inicio_Devol.php">
											<button class="btn btn-info" type="button" value="">Consultar Prestamo</button>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>