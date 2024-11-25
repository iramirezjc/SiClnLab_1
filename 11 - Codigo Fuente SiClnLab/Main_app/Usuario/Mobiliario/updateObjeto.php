<?php
	if($_POST['guardar'])
	{
	  // insert objeto
	  $id_mobil_= $_POST['idMob'];
	  $tipo_= $_POST["tipoMobil"];
	  $mater_= $_POST['materMobil'];
	  $nombr_= $_POST['nombrMobil'];
	  $canti_= $_POST["cantiMobil"];
	  
	  include("conexion.php");
	
	  
  $sql= "UPDATE mobil SET tipo= '".$tipo_."', mater= '".$mater_."', nombr= '".$nombr_."', canti= ".$canti_." WHERE id_mobil = ".$id_mobil_.";";
	  //echo $sql;
	  if(!$resultado = $mysqli->query($sql) ){ echo "ALGO HA FALLADO"; }
	  else {
	  	header("location:/SiClnLab/Main_app/Usuario/Mobiliario/consultaMobiliario.php"); 
	  	}
	}
	    header("location:/SiClnLab/Main_app/Usuario/Mobiliario/consultaMobiliario.php");
?>

