
<?php
  // eliminar objeto
  if( $_POST["confirmar"] ){
	  $id_mater= $_POST["id_material"];
	  
	  include("conexion.php");
	  
	  $sql= "DELETE FROM mater WHERE id_mater= '".$id_mater."';";
	  
	  
	  echo $sql;
	  if(!$resultado= $mysqli->query($sql) ){
	  	echo "Algo ha fallado";
	  }
	  else 
	  {
	  	header("location:mostrarMater.php");
	  }
	}
	header("location:mostrarMater.php");
?>