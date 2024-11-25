<?php
	if($_POST['guardar']){
	  // insert objeto
	  $id_react = $_POST["id_react"];
	  $nombr=$_POST["nombr"];
  	  $formu=$_POST["formu"];
  	  $salud=$_POST["salud"];
  	  $infla=$_POST["infla"];
  	  $inest=$_POST["inest"];
  	  $espec=$_POST["espec"];
  	  $unids=$_POST["unids"];
  	  $canti=$_POST["canti"];
	  include("conexion.php");
	  
  $sql= "UPDATE react SET nombr= '".$nombr."', formu= '".$formu."', pelig_salud= '".$salud."', pelig_infla= '".$infla."', pelig_ines= '".$inest."', pelig_esp= '".$espec."', fk_unids= ".$unids.", cant= ".$canti." WHERE id_react= ".$id_react.";";
	  echo $sql;
	  if(!$resultado= $mysqli->query($sql) ){
	  	echo "ALGO HA FALLADO";
	  }
	  else {
	  	header("location:bajaReac.php");
	  }
	}
	header("location:bajaReac.php");
?>