<?php
error_reporting(0);
$conexion = mysqli_connect("localhost", "root", "", "lab");

$nom = $_GET["nombre"];

$resultados = "SELECT * from mater where nombr = '$nom'";
$datos = mysqli_query($conexion,$resultados);
  include("conexion.php");
  
while($fila = mysqli_fetch_array($datos)){
        echo"
								
								<table width=\"100\" border=\"1\">
									<tr>
										<td><b><center>Identificador</center></b></td>
										<td><b><center>Nombre</center></b></td>
										<td><b><center>Capacidad</center></b></td>
										<td><b><center>Cantidad</center></b></td>
										<td><b><center>Marca</center></b></td>
										<td><b><center>unidades</center></b></td>
									</tr>
									<tr>
										<td>".$fila ['id_mater']."</td>
										<td>".$fila ['nombr']."</td>
										<td>".$fila ['capac']."</td>
										<td>".$fila ['canti']."</td>
										<td>".$fila ['marca']."</td>
										<td>".$fila ['fk_unids']."</td>
									</tr>
								</table>
							";
}

echo "<a href='consulta.html'>Atrás</a>";
mysqli_close($conexion);

?>