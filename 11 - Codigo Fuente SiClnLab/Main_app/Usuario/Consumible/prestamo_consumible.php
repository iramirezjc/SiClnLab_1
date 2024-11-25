<?php
include("../Usuario.php");

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>
		</title>
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
		<br><br>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-info">
						<div class="panel-heading text-center">
							<h3>Prestamo de reactivos "Consumible"</h3>
						</div>
						<div class="panel-body text-center">
							<form action="login.php" method="post">
								<label>Mi usuario:</label>
								<input type="text" value="<?php echo($nombr_usuar);?>" readonly="readonly" disabled=""/>
								<br><br>
								<label>Solicitante:</label>
								<input type="text" id="matri_solic" placeholder="Matricula" name="matri_solic" pattern="[0-9]*" required=""/>
								<br><br>
								<button type="submit" id="modificaciones" value="">Solicitar</button>
								<input type="hidden" id="usuar_matri" name="usuar_matri" value="<?php echo($matri_usuar); ?>"/>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>