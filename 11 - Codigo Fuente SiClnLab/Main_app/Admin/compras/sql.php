<?php
 	include("conexion.php");	
	$fk_categ = $_POST["nivel1"];
	$fk_objeto = $_POST["objeto1"];
	$cant=$_POST["cant"];
	$fk_com=1;
	
	
	$sql="INSERT INTO detall_compr (cant, fk_compr, fk_categ, fk_objeto_id)
	 VALUES(".$cant.", ".$fk_com.", ".$fk_categ.", ".$fk_objeto.");";

   echo $sql;
	if(!$resultado = $mysqli->query($sql)){
  		echo "ALGO HA FALLADO";
	}else{
	//	header("location:Inventario.php");
		echo "se regitro los datos";
 	}

//	header("location: Inventario.php");




?>