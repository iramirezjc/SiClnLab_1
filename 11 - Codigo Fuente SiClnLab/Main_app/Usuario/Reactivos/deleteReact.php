<?php
  
  if( $_POST["confirmar"] ){
	  $id_react= $_POST["id_react"];
  include("conexion.php");
 $sql= "DELETE FROM react WHERE id_react= ".$id_react.";";
   echo $sql;
	if(!$resultado = $mysqli->query($sql)){
  		echo "ALGO HA FALLADO";
	}else{
		header("location:bajaReact.php");
 	}
 	}
	header("location:bajaReac.php");
?>