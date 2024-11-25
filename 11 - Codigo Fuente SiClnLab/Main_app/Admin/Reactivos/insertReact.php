<?php
	// insert objeto
  $nombr=$_POST["nombr"];
  $formu=$_POST["formu"];
  $salud=$_POST["salud"];
  $infla=$_POST["infla"];
  $inest=$_POST["inest"];
  $espec=$_POST["espec"];
  $unids=$_POST["unids"];
  $canti=$_POST["canti"];
  
  include("conexion.php");
  $sql= "INSERT INTO react (nombr, formu, pelig_salud, pelig_infla, pelig_ines, pelig_esp, fk_unids, cant)VALUES ('".$nombr."','".$formu."','".$salud."','".$infla."','".$inest."','".$espec."',".$unids.",".$canti.");";
   //echo $sql;
	if(!$resultado = $mysqli->query($sql)){
  		echo "ALGO HA FALLADO";
  		header("location:bajaReac.php");
	}else{
		header("location:bajaReac.php");	
 	}
  header("location:bajaReac.php");
  
  
?>