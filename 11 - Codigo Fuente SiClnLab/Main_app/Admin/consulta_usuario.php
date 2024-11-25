<?php
include("conexion.php");
$sql= "SELECT * FROM usuar inner join nivel_usuar on fk_nivel_usuar=id_nivel_usuar";
$sql2= "SELECT * FROM usuar inner join nivel_usuar on fk_nivel_usuar=id_nivel_usuar";

if(@$_POST['txtfld_buscar_usuario']){
	//sentencia 'LIKE' utilizada para el filtro de los registros, aplicada solamente en nombre y apellidos
					$sql .= " WHERE nombr LIKE '%".$_POST['txtfld_buscar_usuario']."%' OR apell LIKE '%".$_POST['txtfld_buscar_usuario']."%';";
				
				}
	//en el caso de que se realice una consulta especifica esta condicion la recibe y ejecuta
if(@$_POST['matri_usuar_consu']){
					$sql .= " WHERE id_matri=".$_POST['matri_usuar_consu'];
					$sql2 .= " WHERE id_matri=".$_POST['matri_usuar_consu'];
				
				}	
				
 

include("admin.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="/SiClnLab/css/codeLob/bootstrap.min.css">
  		<script src="/SiClnLab/css/codeLob/jquery.min.js"></script>
  		<script src="/SiClnLab/css/codeLob/codeLob/bootstrap.min.js"></script>
  		<link rel="stylesheet" type="text/css" href="/SiClnLab/css/type/icons.css"/>
		<title></title>
	</head>
	<body>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-info">
					<div class="panel-heading">
					<h2>Consulta de usuarios</h2>
					</div>
					<div class="panel-body">
					
						<div class="row">
						<form method="post" action="consulta_usuario.php">
										<div class="col-sm-12"><center><input placeholder="Buscar usuario" class="input-sm" type="text" id="txtfld_buscar_usuario" name="txtfld_buscar_usuario"  /><input type="submit" class="btn btn-success" value="Buscar"/><a href="usuarios.php"><input id="modificaciones" class="btn btn-primary" type="button" value="Nuevo"/></a></center></div>
							
						</form>
				
						</div>
						<div class="container">
								<form method="post" action="consulta_usuario.php">
									<h2>Resultados de búsqueda</h2>
									 <table id="tablas" class="table table-bordered table-hover alert-light" >
									 <thead>
					<tr>    <th></th>
      <th  id="claves">Matrícula</th>
      <th>Nombre(s)</th>
       <th>Apellido(s)</th>
	   <th>Nivel de Usuario</th>

					</tr>
				</thead>
  <tbody>
    
    <?php
    
   $resultado=$mysqli->query($sql);
    $filas= $resultado->num_rows;
	if($filas==0){
		echo "Sin resultados";
	}
		
$contador=0;	
//bucle que dibuja la tabla de los usuarios
while($registro= $resultado->fetch_assoc()){
	echo("			
	<tr>
      <td><input type='radio' name='matri_usuar_consu' value=".$registro['id_matri']." id='".$contador."' required></td>
	  <th id='claves'><label for='".$contador."'>".$registro['id_matri']."</label></th>
      <td><label for='".$contador."'>".$registro['nombr']."</label></td>
      <td><label for='".$contador."'>".$registro['apell']."</label></td>
	   <td><label for='".$contador."'>".$registro['nombr_nivel']."</label></td>	   

    </tr>
	");
	$contador++;	
				}
	
    ?>
    

 
  </tbody>
</table>
<input type="submit" class="btn btn-primary"  id="modificaciones" value="Ver detalle"/>
								</form>
							
						</div>
						
						<div  class="container">
									 
		 <?php if(@$_POST['matri_usuar_consu']){
		 	
}else{
	echo("<!-- ");
}
		 	 ?>
		<?php
		$resultado=$mysqli->query($sql2);
		$registro= $resultado->fetch_assoc();
		?>
			
		 	<br />
		 		<h2>Detalles</h2>
		 		<h4 >Nombre: <?php if(@$_POST['matri_usuar_consu']){echo $registro['nombr'];}?></h4>
		 		<h4>Apellido: <?php if(@$_POST['matri_usuar_consu']){echo $registro['apell'];}?></h4>
		 		<h4>Matrícula: <?php if(@$_POST['matri_usuar_consu']){echo $registro['id_matri'];}?></h4>
		 		<h4>Nivel: <?php if(@$_POST['matri_usuar_consu']){echo $registro['nombr_nivel'];}?></h4>
		 		<h4>Número de teléfono: <?php if(@$_POST['matri_usuar_consu']){echo $registro['num_tel'];}?></h4>
		 		<table>
	<tr>
		<td><form action='modificacion_usuario.php' method='post'>
	<input type='hidden' <?php if(@$_POST['matri_usuar_consu']){echo("value='".$registro['id_matri']."' ");} ?> id="modificar_usuario" name="modificar_usuario" />
	<input class="btn btn-success" type='submit' id="modificaciones" value='Modificar' <?php if(@$_POST['matri_usuar_consu']){}else{echo("disabled");}?>   />
</form></td>


		<td>   <form action='baja_de_usuario.php' method='post'>
	<input type='hidden' <?php if(@$_POST['matri_usuar_consu']){echo("value='".$registro['nombr']."' ");} ?> id="txt_nombre_usuario_baja" name='txt_nombre_usuario_baja' />
	<input class="btn btn-danger" type='submit' id="eliminar" value='Eliminar' <?php if(@$_POST['matri_usuar_consu']){}else{echo("disabled");}?>/> </form></td>
	</tr>
</table>

	

	 
				
		 <?php
		 if(@$_POST['matri_usuar_consu']){
		 	
}else{
	echo(" -->");
}
		 ?>
	
						</div>
						
					</div>	
				</div>
			</div>
		</div>
	</div>
	 	
		
	</body>
</html>