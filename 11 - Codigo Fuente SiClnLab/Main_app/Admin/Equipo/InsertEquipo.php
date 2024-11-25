
<?php

  $id_equip= $_POST['id_equip'];
  $nombr_equip= $_POST["nombre"];
  $canti_equip= $_POST["cantidad"];
  $descr= $_POST["descripcion"];
  $tipo= $_POST["tipo"];

  include("conexion.php");
  
  $sql= "INSERT INTO `equip`(id_equip, nombr_equip, canti_equip, descr, tipo) 
  VALUES (NULL, '".$nombr_equip."', '".$canti_equip."', '".$descr."', '".$tipo."');";
  
  echo $sql;
  if(!$resultado= $mysqli->query($sql) ){
  	echo "Algo a fallado";
  }
  else {
  	header("location:MostrarEquipo.php");
  }
?>

