<?php
session_start();

?>

<?php
include'conect.php';

$solicitante = $_POST['solicitante'];
$matricula   = $_POST['matricula'];
$entrega     = $_POST['entrega'];
$devolucion  = $_POST['devolucion'];



$resultado   = $conexion->query("SELECT id_prest from prest where matri_solic ='".$matricula."';");

$datos       = array();
$cantidad = array();
$i = 0;
$j = 0;

while($row = mysqli_fetch_array ($resultado))
{

	$datos[$i] = $row["id_prest"];
	$i++;

}
$sql = $conexion->query("SELECT cant  from detall_prest where fk_prest =".$datos[$i - 1].";" );

while($row2 = mysqli_fetch_array ($sql))
{
	$j++;
	$cantidad[$j] = $row2["cant"];


}

if($cantidad[$j] == 0 || $cantidad[$j] < 0)
{

	$sql    = "INSERT INTO `prest`(`fk_usuar_matri`, `matri_solic`, `fecha_entre`, `fecha_devol` ) VALUES ('$solicitante','$matricula','$entrega','$devolucion');";

	$result = $conexion->query($sql);

	$sql1   = "select max(id_prest) as ultimo from prest";
	if($resultado = $conexion->query($sql1))
	{
		$registro = $resultado->fetch_assoc();
		$_SESSION["conteo"] = $registro["ultimo"];

	}
	else
	{
		echo "error";
	}

	if($result)
	{

		header("Location: detalles_prestamo.php");
	}


}
else
{
	echo ("<script>
		alert('El usuario tiene un prestamo en curso');
		location.href='Prestamo.php';
		</script>
		"
	);


}
//id    solicitante matricula   entrega devolucion  disponible  prestar







?>