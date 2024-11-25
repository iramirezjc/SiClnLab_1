<?php
session_start();
   $prest_consu= $_SESSION["prestConsNum"];
   $id_react= (int) $_POST['id_react'];
   $cantidad= (int) $_POST['text_cant_consu'];
   include("conexion.php");
   // insertando
	$sql="INSERT INTO detall_prest_consu VALUES (NULL, ".$prest_consu.", ".$id_react.", ".$cantidad.")";
	echo $sql;
	$exito= $mysqli->query($sql);
	// actualizando
	$sql2="UPDATE react SET cant = cant-".$cantidad." WHERE id_react = ".$id_react;
	if($exito=$mysqli->query($sql2)){
	//echo "<a href= 'llenar_prestamo.php	'>Continuar</a>";
		header("Location: llenar_prestamo.php");
	}else{
		echo "Algo ha fallado.";
	}
?>

