<?php

  $id_mobil= $_POST["id_mobil"];
  $tipo= $_POST["tipo"];
  $mater= $_POST["material"];
  $nombr= $_POST["nombre"];
  $canti= $_POST["cantidad"];

  include("conexion.php");
  
  $sql= "INSERT INTO `mobil` (id_mobil, tipo, mater, nombr, canti) VALUES (NULL, '".$tipo."', '".$mater."', '".$nombr."', ".$canti.");";
  
  echo $sql;
  if(!$resultado= $mysqli->query($sql) ){
  	echo "Algo a fallado";
  	header("location:consultaMobiliario.php");
  }
  else {
  	header("location:consultaMobiliario.php");
  }
  header("location:consultaMobiliario.php");
?>

