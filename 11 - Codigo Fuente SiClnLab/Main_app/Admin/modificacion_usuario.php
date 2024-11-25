	<?php
session_start();
 include("conexion.php");
 $matricula_="";
 $nombre_="";
 $apellido_="";
 $fecha_="";
 $nombre_usuario="";
 $numero_celular="";
 $nivel_="";
 $contrasena="";

if(@$_POST['modificar_usuario']){

$sql="select * from usuar where id_matri=".$_POST['modificar_usuario'];
$resultado=$mysqli->query($sql);
$registro= $resultado->fetch_assoc();
$matricula_=$_POST['modificar_usuario'];
 $nombre_=$registro['nombr'];
 $apellido_=$registro['apell'];
 $fecha_=$registro['fecha_nacim'];
 $nombre_usuario=$registro['user_name'];
 $numero_celular=$registro['num_tel'];
 $nivel_=$registro['fk_nivel_usuar'];
 $contrasena=$registro['contr'];
 
	
	
}

if(@$_POST['actualizar']){
 $matricula_=$_POST['matricula'];
 $nombre_=$_POST['nombre'];
 $apellido_=$_POST['apellido'];
 $fecha_=$_POST['fecha_nacimiento'];
 $nombre_usuario=$_POST['nombre_usuario'];
 $numero_celular=$_POST['numero_celular'];
 $nivel_=$_POST['nivel_usuario'];
 $contrasena=$_POST['contrasena'];
 $sql="UPDATE usuar SET nombr = '".$nombre_."', apell = '".$apellido_."', contr = '".$contrasena."', fecha_nacim = '".$fecha_."', num_tel = '".$numero_celular."', fk_nivel_usuar = '".$nivel_."', user_name = '".$nombre_usuario."' WHERE id_matri = ".$matricula_;
 if(!$resultado= $mysqli->query($sql) ){
header("location:consulta_usuario.php");
	  }else{
	  	
	  	header("location:consulta_usuario.php");
	  }
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
	
	<body >
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<H2>Modificacion de usuario</H2>
					</div>
					<div class="panel-body">
						<center>
	<form action="modificacion_usuario.php" method="post" >
	<table class="table table-bordered table-hover alert-light" border="1" id="tablas">
		 
	<tr>
		<th>Matricula</th>
		<td><input type="text" <?php echo(" value='".$matricula_."' ");?> disabled=""/>
		<input type="hidden" <?php echo(" value='".$matricula_."' ");?>  name="matricula" id="matricula"/>
		</td>
	</tr>
	<tr>
		<th>Nombre</th>
		<td><input type="text" <?php echo(" value='".$nombre_."' ");?> id="nombre" name="nombre" /></td>
	</tr>
	<tr>
		<th>Apellidos</th>
		<td><input type="text" <?php echo(" value='".$apellido_."' ");?> id="apellido" name="apellido"/></td>
	</tr>
	<tr>
		<th>Fecha de nacimiento</th>
		<td><input type="date" <?php echo(" value='".$fecha_."' ");?> id="fecha_nacimiento" name="fecha_nacimiento"/></td>
	</tr>
	<tr>
		<th>Nivel de usuario</th>
		<td>
		<select id="nivel_usuario" name="nivel_usuario">
		<?php
		$sql="select * from nivel_usuar";
$resultado=$mysqli->query($sql);

			while($registro= $resultado->fetch_assoc()){
				$nivel_usuar="";
				if($registro['id_nivel_usuar']==$nivel_){
					$nivel_usuar="selected";
				}
echo ("<option value='".$registro['id_nivel_usuar']."' ".$nivel_usuar.">".$registro['nombr_nivel']."</option>");
}
		?>
		
		</select>
		</td>
	</tr>
	<tr>
		<th>Nombre de usuario</th>
		<td><input type="text" <?php echo(" value='".$nombre_usuario."' ");?> id="nombre_usuario" name="nombre_usuario" disabled=""/>
		<input type="hidden" <?php echo(" value='".$nombre_usuario."' ");?> id="nombre_usuario" name="nombre_usuario" /></td>
	</tr>
	<tr>
		<th>Numero de celular</th>
		<td><input type="text" <?php echo(" value='".$numero_celular."' ");?> id="numero_celular" name="numero_celular"/></td>
	</tr>
	<tr>
		<th>Contraseña</th>
		<td><input type="password" <?php echo(" value='".$contrasena."' ");?> id="contrasena" name="contrasena"/></td>
	</tr>
		 
		 </table>
		 
		 <table border="0">
	<tr>
		<th colspan="2">Actualizar datos</th>
	</tr>
	<tr>
		<td><input type="checkbox" value="1" id="actualizar" name="actualizar"/></td>
		
	
	</tr>
	<td><input type="submit" class="btn btn-success" value="Actualizar"/></td>
	<td><a href="http://localhost/SiClnLab/Main_app/Admin/consulta_usuario.php"><input type="button" value="Cancelar" class="btn btn-danger" ></a> </td>
</table>

		 </form>
		 </center>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	
	
	
	
	
	
	

	</body>
</html>