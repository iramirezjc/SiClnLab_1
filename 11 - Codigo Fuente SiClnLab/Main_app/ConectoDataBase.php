


<?php
	//conexion con la base de datos y el servidor
	include("conexion.php");
	//obtenemos los valores del formulario


$nomUser = $_POST['nomUser'];
$apeUser =$_POST['apeUser'];
$matUser =$_POST['matUser'];
$ncelUser =$_POST['ncelUser'];
$fnacUser =$_POST['fnacUser'];
$NivelUsar =$_POST['NivelUsar'];
$userName =$_POST['userName'];
$contUser =$_POST['contUser'];
$contUser2 = $_POST['contUser2'];

	//Obtiene la longitus de un string
	//$req = (strlen($nomUser)*strlen($apeUser)*strlen($matUser)*strlen($ncelUser)*strlen($fnacUser)*strlen($NivelUsar)*strlen($userName)*strlen($contUser)*strlen($contUser)*strlen($contUser2)) or die("No se han llenado todos los campos");


	//se confirma la contraseña
	if ($contUser != $contUser2) {
		echo('Las contraseñas no coinciden, Verifique <br /> <a href="usuarios.html">Volver</a>');
	}

	//se encripta la contraseña
	//$contraseñaUser = md5($pass);

	//ingresamos la informacion a la base de datos
	$resultado=$mysqli->query("INSERT INTO usuar VALUES ('$matUser', '$nomUser', '$apeUser', '$contUser', '$fnacUser', '$ncelUser', '$NivelUsar', '$userName')",$link) or die("<h2>Error Guardando los datos</h2>");
	echo("
		<script>
			alert('Registro Exitoso');
			location.href='usuarios.html';
		</script>
	");


?>
