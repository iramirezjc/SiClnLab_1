<?php


//peticion ajax
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest'){
	require('conexion.php');
sleep(1);

session_start();

$mysqli->set_charset('utf8');
$usuario = $mysqli->real_escape_string($_POST['usuariolg']);
$pas = $mysqli->real_escape_string($_POST['passlg']);

if ($nueva_cosulta = $mysqli->prepare("SELECT nombr,fk_nivel_usuar,id_matri,user_name From usuar Where id_matri= ? AND contr=?")) {
$nueva_cosulta->bind_param('ss',$usuario,$pas);
$nueva_cosulta-> execute();
$resultado = $nueva_cosulta->get_result();

if($resultado->num_rows == 1){
	$datos = $resultado->fetch_assoc();
	$_SESSION['usuario'] = $datos;
	 echo json_encode(array('error'=>false,'tipo'=>$datos['fk_nivel_usuar']));


}else{
 echo json_encode(array('error'=>true));
}

$nueva_cosulta ->close();

}
}
$mysqli->close();

 ?>
