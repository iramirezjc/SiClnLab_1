<?php
	if( $_POST["confirmar"] ){
	  $id_equip= $_POST["id_equip"];
	  include("conexion.php");
	  $sql= "DELETE FROM equip WHERE id_equip= ".$id_equip.";";
	  echo $sql;
	  if(!$resultado= $mysqli->query($sql) ){
	  	echo "ALGO HA FALLADO";
	  }
	  else {
	  	header("location:MostrarEquipo.php");
	  }
	}
	header("location:MostrarEquipo.php");
?>