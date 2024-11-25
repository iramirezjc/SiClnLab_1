<?php
include("../Usuario.php");

include("conexion.php");
$resultado=$mysqli->query("select now() as fecha");
$fecha_reg_prest= $resultado->fetch_assoc();
$sql="INSERT INTO prest_consu (`id_prest_consu`, `fecha_entre`, `fk_matri`, `matri_solic`) VALUES (NULL,'".
     $fecha_reg_prest['fecha']."',".$_POST['usuar_matri'].", ".$_POST['matri_solic'].")";
$exito=$mysqli->query($sql);

$sql= "select max(id_prest_consu) as ultimo from prest_consu";
if($resultado= $mysqli->query($sql)){
	$registro= $resultado->fetch_assoc();
	$_SESSION["prestConsNum"]= $registro["ultimo"];
	header("Location: llenar_prestamo.php");
}
else {
	echo "error";
}


?>