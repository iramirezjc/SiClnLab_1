<?php

include("../Usuario.php");
include("conexion.php");
//
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="\SiClnLab\css\codeLob\bootstrap.min.css">
      <script src="\SiClnLab\css\codeLob\jquery.min.js"></script>
      <script src="\SiClnLab\css\codeLob\bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="\SiClnLab\type\icons.css"/>
		<style type="text/css" media="screen">
       

        label{
            display: inline-block;
            width: 150px;
        }

        input[type="text"]{
            font-size: 11px;
            height: 30px;
			width: 210px;
        }

       
    </style>
    
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-info">
						<div class="panel-heading text-center">
							<h3>Iniciar compras:</h3>
						</div>
						<div class="panel-body text-center">

							<form action="insertar_compras.php" method="post">
								<label>Matricula de Usuario:</label>

								<input type="text" value="<?php echo($matri_usuar); ?>" disabled=""> <br><br>
								<input type="hidden" name="usuario" value="<?php echo($matri_usuar);?>">
								<label>Vendedor:</label>
								<input type="text" name="vendedor" placeholder="Empresa a quien se adquirió el producto." required=""><br><br>
								<label>Monto:</label>
								<input type="text" name="monto" required=""><br><br>
								<input type="hidden" id="fecha" name="fecha" value="<?php echo date("Y/m/d"); ?>"/>
								<button class="btn btn-success" type="submit">Iniciar</button>
								<button class="btn btn-warning" type="reset">Borrar</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>