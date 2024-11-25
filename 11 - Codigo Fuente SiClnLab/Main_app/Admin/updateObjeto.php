<?php
	if($_POST['guardar'])
	{
	  // insert objeto
	  $id_= $_POST['idMat'];
	  $nom_= $_POST["nomMater"];
	  $cap_= $_POST['capaciMater'];
	  $cant_= $_POST['cantiMater'];
	  $marc_= $_POST["marcMater"];
	 // $fk_= $_POST['fkUnidad'];
	  include("conexion.php");
	  
  $sql= "UPDATE mater SET nombr= '".$nom_."', capac= ".$cap_.", canti= '".$cant_."', marca= '".$marc_."' WHERE id_mater= ".$id_.";";
	  echo $sql;
	  if(!$resultado= $mysqli->query($sql) ){
	  	echo "ALGO HA FALLADO";
	  }
	  else {
	  	header("location:mostrarMater.php");
	  }
	}
	//header("location:mostrarMater.php");
?>


