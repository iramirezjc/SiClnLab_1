<?php
session_start();
include("conexion.php");

if(@$_POST['Guardar']){
$id_unid=$mysqli->query("SELECT id_unids FROM unids WHERE nombr='".$_POST['opcion_unidades']."'");	
	$id=$id_unid->fetch_assoc();
$sql="INSERT INTO mater ( nombr,capac, canti, marca, fk_unids) VALUES ( '".$_POST['txtfld_nombre_material']."',".$_POST['txtfld_capacidad_material'].", ".$_POST['txtfld_cantidad_material'].", '".$_POST['txtfld_marca_material']."',".$id['id_unids'].")";
$exito=$mysqli->query($sql);
header("location:alta_material.php");
}
?>