<?php 
    require_once 'conexion/conect.php';

    $fecha = $_POST['fecha'];
    $descripcion = $_POST['descripcion'];
    $matricula = $_POST['matricula'];

    $sql = "INSERT INTO `incid`(`fecha_incid`, `descr`, `fk_matri`) VALUES ('$fecha','$descripcion','$matricula')";
    $result = $conexion->query($sql);

if ($result) {
   header("Location: incidentes.php");
}else{

    echo "no funciono";
}
   

 ?>