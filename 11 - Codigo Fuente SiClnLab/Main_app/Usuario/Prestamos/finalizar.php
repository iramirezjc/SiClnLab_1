
<?php
session_start();
include'conect.php';
	   $prestamo=$_SESSION["conteo"];
       $cantidad=$_POST['cant_prest']; 
       $obj=$_POST['id'];
       $fk_prest=$_SESSION["conteo"];
if(@$_POST['cate']==1){ // equipos
	             $id_categ=1;
		          

	$query = "INSERT INTO `detall_prest`(`fk_prest`, `fk_categ`, `fk_objeto_id`, `cant` ) VALUES ('$fk_prest','$id_categ','$obj','$cantidad');";
		
	$exito = $conexion->query($query);
	
	$sql2="UPDATE equip SET canti_equip = canti_equip-".$cantidad." WHERE id_equip = ".$obj;
	
	$resultado = $conexion->query($sql2);
	 echo $query;
	 echo $sql2;
		if($resultado){
		
		echo"funciono";
		
	}else{
			echo"no funciono";
			
		}
	} else if ( $id_categ=@$_POST['cate']==2 ){ // materiales
		       
$id_categ=2;
	$query = "INSERT INTO `detall_prest`(`fk_prest`, `fk_categ`, `fk_objeto_id`, `cant` ) VALUES ('$fk_prest','$id_categ','$obj','$cantidad');";
	
	$exito = $conexion->query($query);
	$sql2="UPDATE mater SET canti = canti-".$cantidad." WHERE id_mater = ".$obj;
	
	$resultado = $conexion->query($sql2);
	 echo $query;
	 echo $sql2;
	if($resultado){
		
		echo"funciono";
			
	}else{
			echo"no funciono";
				
		}
	} else if ($id_categ=@$_POST['cate']==3 ){ // mobiliario
	          
		       $id_categ=3;

	$query = "INSERT INTO `detall_prest`(`fk_prest`, `fk_categ`, `fk_objeto_id`, `cant` ) VALUES ('$fk_prest','$id_categ','$obj','$cantidad');";
	
	$exito = $conexion->query($query);
	$sql2="UPDATE mobil SET canti = canti-".$cantidad." WHERE id_mobil = ".$obj;
	$resultado = $conexion->query($sql2);
	 echo $query;
	 echo $sql2;
	if($resultado){
		
		echo"funciono";
			
	}else{
			echo"no funciono";
			
		}
	
	} 

	
header("Location: detalles_prestamo.php");
 ?>
	
	
