<?php
// if (strcmp ($cadena1 , $cadena2 ) !== 0)
include("admin.php");
include("conexion.php");
	
if(@$_POST['matri_usuar_del']){
$matricula=$_POST['matri_usuar_del'];
$sql="select id_matri,nombr,apell,contr from usuar where id_matri=".$matricula."";
$resultado=$mysqli->query($sql);
$registro= $resultado->fetch_assoc();


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
		<script language="javascript"> 
function funcion_usaurio_eliminado(){ 
   alert ("Usuario eliminado"); 
} 

function funcion_error_contraseña(){ 
   alert ("Contraseña incorrecta"); 
} 
x
function salir(){ 
  location.href ="consulta_usuario.php";
} 
</script> 
		<title></title>
	</head>
	<body>
	
	<?php
	include("conexion.php");

if(@$_POST['contrasena_confirmar']){
$matricula= $_SESSION['usuario']['id_matri'];
$sql="select id_matri,nombr,apell,contr from usuar where id_matri=".$matricula."";
$resultado=$mysqli->query($sql);
$registro= $resultado->fetch_assoc();

if (strcmp ($registro['contr'] , $_POST['contrasena_confirmar'] ) == 0){
	$matricula=$_POST['id'];
$sql="delete from usuar where id_matri=".$matricula."";
$resultado=$mysqli->query($sql);
?>
<script language="javascript"> 

funcion_usaurio_eliminado(); 
location.href ="consulta_usuario.php";

</script>
<?php
}else{
	?>
<script language="javascript"> 
funcion_error_contraseña(); 
</script>
<?php
 
}

}
	?>


<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-danger">
				<div class="panel panel-heading">
						<h2>Seguridad</h2>
				</div>
				<div class="panel panel-body">
				<form method="post" action="seguridad.php"  >
					<p>		<?php
			echo "¿Está seguro que desea eliminar a ".$registro['nombr']." ".$registro['apell']."?<br>";
		echo "	<input type='hidden' id='id_mater' name='id' value='".$registro['id_matri']."'/>"
?></p>
<center>
<label >Para llevar a cabo la baja de usuario, es necesario</label><br>
			<label>ingresar su contraseña.</label> <br>
				Contraseña: <input type="password" class="input-sm" size="20" id="contrasena_confirmar" name="contrasena_confirmar" />
				<input type="submit" value="Aceptar" class="btn btn-success"/>
			<input type="button" id="eliminar" class="btn btn-warning" onclick="salir()" value="Cancelar"/>
			</center>
			</form>
				</div>
			</div>
		</div>
	</div>
</div>

	</body>
</html>