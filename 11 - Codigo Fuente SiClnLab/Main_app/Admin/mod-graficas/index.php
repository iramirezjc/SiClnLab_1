
 <?php
 include("../admin.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Graficas</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="/SiClnLab/css/codeLob/bootstrap.min.css">
  		<script src="/SiClnLab/css/codeLob/jquery.min.js"></script>
  		<script src="/SiClnLab/css/codeLob/codeLob/bootstrap.min.js"></script>
  		<link rel="stylesheet" type="text/css" href="/SiClnLab/css/type/icons.css"/>
	</head>
	<body> 
		<div class="container">
			<h1>Graficas</h1>
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-info">
						<div class="panel-heading ">
							<h3>Costos</h3>
						</div>
						<div class="panel-body">
							<div class="container-fluid">
								<h4>Plazo</h4>
								<form action="acciones.php" method="post">
									<label for="iniciocostos">Inicio</label>
								<input class="input input-sm" type="month"  date="fecha" id="iniciocostos" name="iniciocostos"  required>
								<label for="fincostos">Final</label>
								<input class="input input-sm" type="month"  date="fecha" id="fincostos" name="fincostos" required>
								 <button class="btn btn-success" type="submit">Mostrar	</button>
								</form>
							</div>
							<div class="row">
				<div class="col-sm-12 text-center">
				<img src="costos.php" >
				</div>
			</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>