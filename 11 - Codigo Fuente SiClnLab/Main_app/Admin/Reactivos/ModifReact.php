<?php
include("../admin.php");
if(@$_POST['id_react']){			
	include("conexion.php");
	$sql= "SELECT * FROM react WHERE id_react= ".$_POST['id_react'];
	$resultado = $mysqli->query($sql);
 	//$filas= $resultado->num_rows;				
  	$registro= $resultado->fetch_assoc();
 	$id_react= $registro['id_react'];
  	$nombr=$registro['nombr'];
  	$formu=$registro['formu'];
  	$salud=$registro['pelig_salud'];
  	$infla=$registro['pelig_infla'];
  	$inest=$registro['pelig_ines'];
  	$espec=$registro['pelig_esp'];
  	$unids=$registro['fk_unids'];
  	$canti=$registro['cant'];
			}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Modificación de Reactivos</title>
	</head>
	<body>
<div style="position: relative;top: -100px; left: 18%; ">
		<h2 style="z-index:2; position: absolute; left: 250px; top: 120px; width: 800px; height: 460px; visibility: visible;">Modificación de Reactivos</h2>
			<span id="c4" style="z-index:1; position: absolute; left: 0px; top: 115px; width: 800px; height: 460px; visibility: visible; border: 1px solid black">
			</span>
			
				<span id="c1" style="z-index:2; position: absolute; left: 72px; top: 170px; width: 650px; height: 300px; visibility: visible; border: 1px solid black" >
			
				<span id="c3" style="z-index:4; position: absolute; left: 5px; top: 38px; width: 644px; height: 260px; visibility: visible; font-family: Arial; font-size: 25;" >
				
					<form method="post" action="updateReact.php" >
						
						<input type="hidden" name="id_react" id="id_react"
								<?php if(@$_POST['id_react']){echo "value= '".$id_react."'"; }?>
								/>
						
						
						<b style="z-index:1; position: absolute; left: 5px; top: 5px; width: 165px; height: 20px">Nombre</b>
					
						<input type="text" name="nombr" id="nombr" required
								size= "20" maxlength="50" style="z-index:1; position: absolute; left: 170px; top: 0px; width: 150px; height: 20px; visibility: visible"
								<?php if(@$_POST['id_react']){echo "value= '".$nombr."'"; }?>
								/> <br>
						
						<b style="z-index:1; position: absolute; left: 5px; top: 35px; width: 165px; height: 20px">Cantidad</b>
					
						<input type="text" name="canti" id="canti" required
								size= "20" maxlength="50" style="z-index:1; position: absolute; left: 170px; top: 30px; width: 150px; height: 20px; visibility: visible"
								<?php if(@$_POST['id_react']){echo "value= $canti"; }?>
								/> <br>
								
						<b style="z-index:1; position: absolute; left: 5px; top: 65px; width: 165px; height: 20px">Unidad de medida</b>
						
						<select name="unids" id="unids" style="z-index:1; position: absolute; left: 170px; top: 60px; width: 154px; height: 25px; visibility: visible">
									<option <?php if(@$_POST['id_react']){?>value= "<?php echo "$unids"; }?>">
										<?php
											$sql1 = mysqli_query($mysqli, "SELECT nombr FROM unids WHERE id_unids = ".$registro['fk_unids']."");
											while($nomb = mysqli_fetch_array($sql1)){
											$registro['fk_unids'] = $nomb['nombr'];
											}echo "".$registro['fk_unids'];
										?>
									</option>
									<?php
									include'conexion.php';
									$query = 'SELECT * FROM unids';
									$result = $mysqli->query($query);
									while($row= $result->fetch_array()){?>
								<option value="<?php echo $row['id_unids']?>"><?php echo $row["nombr"]; ?></option>
								<?php } ?>
								</select> <br>
						
						<b style="z-index:2; position: absolute; left: 5px; top: 95px; width: 165px; height: 20px">Formula</b><br>
						
						<input type="text" name="formu" id="formu"
								size= "20" maxlength="11" style="z-index:1; position: absolute; left: 170px; top: 90px; width: 150px; height: 20px; visibility: visible"
								<?php if(@$_POST['id_react']){echo "value= '".$formu."'"; }?>
								/> <br>
						
						<b style="z-index:1; position: absolute; left: 5px; top: 125px; width: 165px; height: 20px">Riesgo a la Salud</b>
						
						<input type="number" name="salud" id="salud" maxlength="1" max="4" min="0"
								size= "20" maxlength="30" style="z-index:1; position: absolute; left: 170px; top: 120px; width: 150px; height: 20px; visibility: visible"
								<?php if(@$_POST['id_react']){echo "value= '".$salud."'"; }?>
								/>	
						
						<b style="z-index:1; position: absolute; left: 5px; top: 155px; width: 165px; height: 20px">Inflamabilidad</b>
						
						<input type="number" name="infla" id="infla" maxlength="1" max="4" min="0"
								size= "20" maxlength="30" style="z-index:1; position: absolute; left: 170px; top: 150px; width: 150px; height: 20px; visibility: visible"
								<?php if(@$_POST['id_react']){echo "value= '".$infla."'"; }?>
								/>					
						
						<b style="z-index:1; position: absolute; left: 5px; top: 185px; width: 165px; height: 20px">Inestabilidad</b>
						
						<input type="number" name="inest" id="inest" maxlength="1" max="4" min="0"
								size= "20" maxlength="30" style="z-index:1; position: absolute; left: 170px; top: 180px; width: 150px; height: 20px; visibility: visible"
								<?php if(@$_POST['id_react']){echo "value= '".$inest."'"; }?>
								/>	
						
						<b style="z-index:2; position: absolute; left: 5px; top: 215px; width: 165px; height: 20px">Riesgo Especifico</b><br>
						
						<input type="text" name="espec" id="espec"
								size= "20" maxlength="11" style="z-index:1; position: absolute; left: 170px; top: 210px; width: 150px; height: 20px; visibility: visible"
								<?php if(@$_POST['id_react']){echo "value= '".$espec."'"; }?>
								/> <br>
						
						<input type="checkbox" name="guardar" value="1" 
						style="z-index:2; position: absolute; left: 200px; top: 290px; width: 30px; height: 20px;"
						/> 
						<h4 style="z-index:2; position: absolute; left: 235px; top: 275px; width: 195px; height: 23px">
					Confirmar modificación </h4>
						
						<input type="submit" value="Actualizar" style="z-index:2; position: absolute; left: 450px; top: 290px; width: 100px; height: 30px"/>
					</form>
						
				</span>
				</span>
				</div>
	</body>
</html>