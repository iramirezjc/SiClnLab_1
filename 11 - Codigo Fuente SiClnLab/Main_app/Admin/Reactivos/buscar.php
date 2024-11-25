<?php
error_reporting(0);
$conexion = mysqli_connect("localhost", "root", "", "lab") or die("FALLO CONEXION");
if(isset($_GET["nombre"])){
	$buscar = $_GET["nombre"];

	$sentenciaSQL = "SELECT * from react where nombr like '%".$buscar."%'";
	$ejecutar = mysqli_query($conexion,$sentenciaSQL);
	  include("conexion.php");
	  
	while($datos = mysqli_fetch_array($ejecutar)){
		$sql2 = mysqli_query($mysqli, "SELECT nombr FROM unids WHERE id_unids = ".$datos['fk_unids']."");
						while($nomb = mysqli_fetch_array($sql2)){
							$datos['fk_unids'] = $nomb['nombr'];
						}
	        //echo "° - ID REACTIVO: <b>".$datos["id_react"]."</b><br>";
	        echo "° - NOMBRE: <b>".$datos["nombr"]."</b><br>";
	        echo "° - FORMULA: <b>".$datos["formu"]."</b><br>";
	        echo "° - PELIGRO DE SALUD: <b>".$datos["pelig_salud"]."</b><br>";
	        echo "° - PELIGRO DE INFLAMABILIDAD: <b>".$datos["pelig_infla"]."</b><br>";
	        echo "° - PELIGRO DE INESTABILIDAD: <b>".$datos["pelig_ines"]."</b><br>";
	        echo "° - PELIGRO ESPECIAL: <b>".$datos["pelig_esp"]."</b><br>";
	        echo "° - UNIDAD: <b>".$datos["fk_unids"]."</b><br>";
	        echo "° - CANTIDAD DE MEDIDA: <b>".$datos["cant"]."</b><br><hr>";
	}
		
}



echo "<a href='buscador.html'>Buscar otro elemento</a>";
mysqli_close($conexion);

?>
<br>
<a href="index.php">Menu principal</a>