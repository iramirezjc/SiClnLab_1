<?php
	// insert objeto
  
  $canti=$_POST["canti"];
  $cantid=$_POST["cantid"];
  $categ=$_POST["categ"];
  $objeto=$_POST["objeto"];
  $inven=$_POST["inven"];
  
  
  include("conexion.php");
  $sql= "INSERT INTO desgl_inven (canti_sist, canti_exist, fk_categ, fk_objeto_id, fk_inven)VALUES ('.$canti.','.$cantid.','.$categ.','.$objeto.','.$inven.);";
   //echo $sql;
	if(!$resultado = $mysqli->query($sql)){
  		echo "ALGO HA FALLADO";
	}else{
		header("location:Inventario.php");
 	}
  
  
?>
