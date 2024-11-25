<?php 
    $conexion = new mysqli('localhost','root','','lab');

    if($conexion->connect_errno){
        echo "Fallo al conectar la base de datos";
    }else{
        echo "Conexion exitosa";
    }