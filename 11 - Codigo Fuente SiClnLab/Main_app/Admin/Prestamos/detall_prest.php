<?php
include("../admin.php");
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
		<style type="text/css" media="screen">
			textarea
			{
				max-width: 200px;
				max-height: 100px;
				height: 100px;
				width: 200px;
				min-height: 100px;
				min-width: 200px;

			}

			label
			{
				display: inline-block;
				width: 150px;
			}

			input[type="text"]
			{
				font-size: 11px;
				height: 15px;
			}

			.nada
			{

				width: 350px;
				height: 140px;
				position: absolute;
				left: 260px;
				top: 45%;

			}

			.respuesta
			{
				width: 600px;
				height: 30px;
			}
		</style>
	</head>
	<body>


		<form action=" detall_prest.php" method="POST" >
			<legend style="margin: 10px 0; font-size: 30px;">
				Realización de prestamo  <?php echo $_SESSION["prestConsNum"];?>
			</legend>

			<input type="radio" name="act" id="act" value="mob"/>
			<b>Mobiliario</b>

			<input type="radio" name="act" id="act" value="equi"/>
			<b>
				Equipo
			</b>

			<input type="radio" name="act" id="act" value="mater"/>
			<b>
				Materiales
			</b>
			<br>
			<br>
			<input type="submit" name="aceptar" value="Aceptar"/>
			<a href="Prestamo.php" >
				Finalizar prestamo
			</a>
		</form>
		<br>
		</br>
		<table border="1">
			<?php

			include 'conect.php';
			$actividad = @$_POST["act"];

			if($actividad == "mob")
			{
				$sql      = "select id_mobil, tipo, nombr, canti from mobil;";

				$contador = 0;
				echo        "<tr><th><center>Nombre</center></th>
				<th> <center>Tipo </center></th>
				<th> <center>Cantidad</center> </th>
				<th> <center>Cantidad a <br>
				solicitar</center></th>
				<th> </th> </tr>";
				$resultado1 = $conexion->query($sql);
				while($registro = $resultado1->fetch_assoc())
				{
					echo "<tr>";
					echo "<td>".$registro['nombr']."</td>";
					echo "<td>".$registro['tipo']."</td>";
					echo "<td>".$registro['canti']."</td>";
					echo "<td><form action='finalizar.php' method='post'>";
					echo "<input type='number' id='cant_prest' name='cant_prest' min='1' maxlength='3' max='".$registro['canti']."' required/>";
					echo "<input type='hidden' id='id_mobil' name='id_mobil' value='".$registro['id_mobil']."'/>";
					echo "<input type='hidden' name='act' value='".$actividad."'/>";
					echo "<td> <input type='submit' value='Agregar a prestamos'/></td>";
					echo "</form></td>";
					//	echo " < td > ".$unidades['nombr']."</td > ";
					echo "</tr>";
					$contador++;
				}
			}
			if($actividad == "equi")
			{
				$sql      = "select id_equip, nombr_equip, canti_equip, tipo from equip";
				$contador = 0;
				echo "<tr><th><center>Nombre</center></th>
				<th> <center>Tipo </center></th>
				<th><center>Cantidad</center> </th>
				<th> <center>Cantidad a <br>
				solicitar</center></th>
				<th> </th></tr>";
				$resultado1 = $conexion->query($sql);
				while($registro = $resultado1->fetch_assoc())
				{
					echo "<tr>";
					echo "<td>".$registro['nombr_equip']."</td>";
					echo "<td>".$registro['tipo']."</td>";
					echo "<td>".$registro['canti_equip']."</td>";
					echo "<td><form action='finalizar.php' method='post'>";
					echo "<input type='number' id='cant_prest' name='cant_prest' min='1'  max='".$registro['canti_equip']."' required/>";
					echo "<input type='hidden' id='id_equip' name='id_equip' value='".$registro['id_equip']."'/>";
					echo "<input type='hidden' name='act' value='".$actividad."'/>";
					echo "<td> <input type='submit' value='Agregar a prestamos'/></td>";
					echo "</form></td>";
					//	echo " < td > ".$unidades['nombr']."</td > ";
					echo "</tr>";
					$contador++;
				}
			}
			if($actividad == "mater")
			{
				$sql      = "select id_mater, nombr, capac, canti, fk_unids from mater";
				$contador = 0;
				echo "<tr><th><center>Nombre</center></th>
				<th> <center>Capacidad </center></th>
				<th><center>Unidad</center> </th>
				<th> <center>Cantidad </center></th>
				<th>Cantidad a <br>
				prestar </th>
				<th> </th></tr>";
				$resultado1 = $conexion->query($sql);

				while($registro = $resultado1->fetch_assoc())
				{
					$resultado2 = $conexion->query("select nombr from unids WHERE id_unids=".$registro['fk_unids']);
					$unidades   = $resultado2->fetch_assoc();
					echo "<tr>";
					echo "<td>".$registro['nombr']."</td>";
					echo "<td>".$registro['capac']."</td>";
					echo "<td>".$unidades['nombr']."</td>";
					echo "<td>".$registro['canti']."</td>";

					echo "<td><form action='finalizar.php' method='post'>";
					echo "<input type='number' id='cant_prest' name='cant_prest' min='1'  max='".$registro['canti']."' required/>";
					echo "<input type='hidden' id='id_mater' name='id_mater' value='".$registro['id_mater']."'/>";
					echo "<input type='hidden' name='act' value='".$actividad."'/>";

					echo "<td> <input type='submit' value='Agregar a prestamos'/></td>";
					echo "</form></td>";
					echo "</tr>";
					$contador++;
				}
			}
			?>
		</table>
	</body>
</html>