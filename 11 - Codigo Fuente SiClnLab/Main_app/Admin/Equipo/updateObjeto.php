<?php
	if($_POST['guardar'])
	{
	  // insert objeto
	  $id_= $_POST['idEq'];
	  $nom_= $_POST["nomEquip"];
	  $cant_= $_POST['cantiEquip'];
	  $desc_= $_POST["desEq"];
	  $tipo_= $_POST["tipo"];
	  include("conexion.php");
	  
  $sql= "UPDATE equip SET nombr_equip= '".$nom_."', canti_equip= ".$cant_.", descr= '".$desc_."', tipo= '".$tipo_."' WHERE id_equip= ".$id_.";";
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


