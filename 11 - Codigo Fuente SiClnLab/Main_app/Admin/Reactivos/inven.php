<?php
 
 //incia un inventario nuevo
 $fecha=$_POST["fecha"];
 $usuario=$_POST["usuario"];
   
 include("conexion.php");
  $sql= "INSERT INTO inven (fecha, fk_objeto_id)VALUES ('.$fecha.','.$usuario.'.);";
   //echo $sql;
	if(!$resultado = $mysqli->query($sql)){
  		echo "ALGO HA FALLADO";
	}else{
		header("location:Inventario.php");
 	}
  

?>

