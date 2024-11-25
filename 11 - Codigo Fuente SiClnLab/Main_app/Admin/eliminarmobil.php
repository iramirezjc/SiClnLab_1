<?php
  // Eliminar mobiliarios
  if( $_POST["confirmar"] ){
	  $id_mobil= $_POST["id_mobiliario"];
	  include("conexion.php");
	  $sql= "DELETE FROM mobil WHERE id_mobil= '".$id_mobil."';";
	  echo $sql;
	  if(!$resultado= $mysqli->query($sql) ){
	  	echo "ALGO HA FALLADO";
	  }
	  else 
	  
	  {
	  	header("location:deletemobil.php");
	  }
	}
	header("location:deletemobil.php");
?>