<?php
include("../admin.php");
$prest_         = @$_POST['devol_'];
$obj            = @$_POST['obj'];
$cate           = @$_POST['cate'];
$cantidad_prest = @$_POST['cantidad'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>
		</title>
		<link rel="stylesheet" href="\SiClnLab\css\codeLob\bootstrap.min.css">
  		<script src="\SiClnLab\css\codeLob\jquery.min.js"></script>
  		<script src="\SiClnLab\css\codeLob\bootstrap.min.js"></script>
  		<link rel="stylesheet" type="text/css" href="\SiClnLab\type\icons.css"/>
	</head>
	<style>
		label
		{
			display: inline-block;
			width: 150px;
		}
		input
		{
			width: 130px;
		}
		select
		{
			width: 130px;
			height: 28px;
		}
	</style>
<body>
	<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-info">
							<div class="panel-heading ">
								<h1>Devolución de préstamo </h1>
							</div>
							<center>
							<div class="panel-body">
								<form  
	 method="POST" action="devol_id.php">
Fecha de devolución:
        <input  type="date" name="devol" placeholder="Fecha" required>	<br><br>

Cantidad a devolver:
<?php echo "<input type='number' id='cant_prest' name='cant_prest' min='1'  max='".$cantidad_prest."' required/>";?>

        <br><br>


        Observaciones: <br>
         <textarea  name="obse" placeholder="Observaciones" 
            rows="5" ></textarea> <br><br>

            <input type="submit" name="dev" value="Devolver" >
            </center>
 <?php
 echo "<input type='hidden' name='prestamo' id='prestamo' value='".
		$prest_."'/>";

echo "<input type='hidden' name='objeto' id='objeto' value='".
		$obj."'/>";

echo "<input type='hidden' name='categoria' id='categoria' value='".
		$cate."'/>";
		 ?> 

 <?php
  include 'conexion.php';
 
if (@$_POST['dev']) {
/*---------------------- variables de devol--------------------------*/
$Fecha=$_POST['devol'];
$obs=$_POST['obse'];
$prest__=$_POST['prestamo'];
/*---------------------- variables de detall_devol--------------------------*/
$cant=$_POST['cant_prest'];
$obj_=$_POST['objeto'];
$cate_=$_POST['categoria'];
/*---------------------- insecion de devol--------------------------*/

  $sql="INSERT INTO `devol` (`id_devol`, `fecha_devol`, `obser_devol`, `fk_prest`) VALUES (NULL, '$Fecha', '$obs', '$prest__');";

  $resultado= $mysqli->query($sql);



/*---------------------- Buscando la ultima id de devol--------------------------*/

$sql2= "select max(id_devol) as end from devol";
$resultado= $mysqli->query($sql2);
	$registro= $resultado->fetch_assoc();
	$fk_devol= $registro["end"];
/*---------------------- insercion de detall_devol--------------------------*/

$sql1="INSERT INTO `detall_devol` (`id_detall_devol`, `fk_devol`, `fk_categ`, `fk_objeto_id`, `cant`) VALUES (NULL, '$fk_devol', '$cate_', '$obj_', '$cant');";

$resultado= $mysqli->query($sql1);


/*---------------------- Resta de la tabla detalles_prest--------------------------*/
$sql3="UPDATE detall_prest SET cant = cant-".$cant." WHERE fk_objeto_id = ".$obj_;
	
	$resultado = $mysqli->query($sql3);
/*---------------------- Suma de las tablas mob, mate,equip--------------------------*/

if(@$cate_==1){
				$sql2="UPDATE equip SET canti_equip = canti_equip+".$cant." WHERE id_equip = ".$obj_;
	               $resultado = $mysqli->query($sql2);
	
		}else if(@$cate_==2){
				$sql2="UPDATE mater SET canti = canti+".$cant." WHERE id_mater = ".$obj_;
	               $resultado = $mysqli->query($sql2);

		}else if(@$cate_==3){
				$sql2="UPDATE mobil SET canti = canti+".$cant." WHERE id_mobil = ".$obj_;
	               $resultado = $mysqli->query($sql2);
	
		}else if(@$cate_==4){
				$sql2="UPDATE react SET cant = cant+".$cant." WHERE id_react = ".$obj_;
	               $resultado = $mysqli->query($sql2);
	
	 }


}
   ?>
            </form>

          
<button onclick="location.href='inicio_Devol.php'"  class="btn btn-success">Finalizar</button>
   <!------------------------------------------------------------->
  
							</div>
						</div>
					</center>
					</div>
				</div>
			</div>
</body>
</html>