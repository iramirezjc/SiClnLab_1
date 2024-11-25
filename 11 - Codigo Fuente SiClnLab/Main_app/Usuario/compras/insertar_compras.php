<?php

include("../Usuario.php");
	include("conexion.php");
	
	$vendedor=$_POST['vendedor'];
	$monto=$_POST['monto'];
	$fecha= $_POST["fecha"];
	 //$_SESSION["user"]; <-- recordar que es una fk y por tanto debe ser una matricula registrada.
$sql=  "insert into compr (id_compr, fk_usuar_matri, fecha, vendr, monto) values (NULL, ".$matri_usuar.", (select now()), '".$vendedor."', ".$monto.")";
	
	$result= $mysqli->query($sql);

$sql1= "select max(id_compr) as ultimo from compr";
if($resultado= $mysqli->query($sql1)){
	$registro= $resultado->fetch_assoc();
	$_SESSION["compraNo"]= $registro["ultimo"];
	header("Location: detalles_compras.php");
}
else {
	echo "error";
}

?>
