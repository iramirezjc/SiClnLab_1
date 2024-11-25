<?php
include("admin.php");

$sql= "SELECT id_matri,nombr,apell,nombr_nivel FROM usuar inner join nivel_usuar on fk_nivel_usuar=id_nivel_usuar";
if(@$_POST['txt_nombre_usuario_baja']){
					$sql .= " WHERE nombr LIKE '%".$_POST['txt_nombre_usuario_baja']."%' OR apell LIKE '%".$_POST['txt_nombre_usuario_baja']."%';";
				}		
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
	
	
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-warning">
					<div class="panel panel-heading">
						<h2>Baja de usuario</h2>
					</div>
					<div class="panel panel-body">
						<p>Seleccione el usuario para eliminar</p>
						<form method="post" action="seguridad.php" >
							<table id="tablas"  class="table table-bordered table-hover alert-light">
  <tbody>
    <tr>
    <th></th>
      <th>Matrícula</th>
      <th>Nombre(s)</th>
       <th>Apellido(s)</th>
	   <th>Nivel de Usuario</th>
    </tr>
    
    <?php
    include("conexion.php");
    $resultado=$mysqli->query($sql);
    $filas= $resultado->num_rows;
	if($filas==0){
		echo "Sin resultados";
	}
		
$contador=0;	
while($registro= $resultado->fetch_assoc()){
	echo("			
	<tr>
      <td><input type='radio' name='matri_usuar_del' value=".$registro['id_matri']." id='".$contador."' required></td>
	  <td><label for='".$contador."'>".$registro['id_matri']."</label></td>
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
<input type="submit" value="Aceptar" class="btn btn-success" />
			<a href="consulta_usuario.php" ><input id="eliminar" type="button" value="Cancelar" class="btn btn-warning"/></a>
						</form>	
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	

	</body>
</html>