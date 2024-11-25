<?php
	//include("index.php");
include("../Usuario.php");
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
	</head>
	<body>
		<?php
		echo("<h1> Alta Reactivos </h1>");
		?>
		<form method="post" action="InsertarReactivo.php" >
		<table border="0">
		<tr>
			<td>Nombre</td>
			<td><input type="text" required name="nombr" id="nombre" value="" size="20" maxlength="100" />
			</td>
		</tr>
		<tr>
			<td>Cantidad</td>
			<td><input type="number" value="0" readonly="readonly" required name="canti" disabled="" id="canti" value="" size="20" maxlength="11" min="0" /></td>
		</tr>
		<tr>
			<td>Unidad de medida</td>
			<td>
			<select name="unids" id="unids" required>
				<option value="">Selecione la unidad</option>
				<?php
					include'conexion.php';
					$query = 'SELECT * FROM unids';
					$result = $mysqli->query($query);
					while($row= $result->fetch_array()){?>
				<option value="<?php echo $row['id_unids']?>"><?php echo $row["nombr"]; ?></option>
				<?php } ?>
			</select>
			</td>
		</tr>
		<tr>
			<td>Formula</td>
			<td><input type="text" name="formu" id="formu" value="" size="20" maxlength="100" /></td>
		</tr>
		<tr>
			<td>Riesgo a la Salud</td>
			<td><input type="number" name="salud" id="salud" value="0" maxlength="1" max="4" min="0" /><br></td>
		</tr>
		<tr>
			<td>Inflamabilidad</td>
			<td><input type="number" name="infla" id="infla" value="0" maxlength="1" max="4" min="0" /></td>
		</tr>
		<tr>
			<td>Inestabilidad</td>
			<td><input type="number" name="inest" id="inest" value="0" maxlength="1" max="4" min="0" /></td>
		</tr>
		<tr>
			<td>Riesgo Especifico</td>
			<td><input type="text" name="espec" id="espec" value="" size="20" maxlength="10" /></td>
		</tr>
		<tr>
			<td><input type="submit" value="Guardar"/></td>
			<td><input type="reset" id="eliminar" value="Cancelar"/></td>
			<td><button style="width:100px" id="eliminar" onclick="location.href='detalles_compras.php'">Regresar</button></td>
		</tr>
		</table>
		</form>
	</body>
</html>