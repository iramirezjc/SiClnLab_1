<?php
			if(@$_POST['id_mobil']){			
			include("conexion.php");
			$sql= "SELECT * FROM mobil WHERE id_mobil= ".$_POST['id_mobil'];
			$resultado = $mysqli->query($sql);
			$filas= $resultado->num_rows;				
			$registro= $resultado->fetch_assoc();
			$id_mobil_= $registro['id_mobil'];
			$tipo_= $registro['tipo'];
			$mater_= $registro['mater'];
			$nombr_= $registro['nombr'];
			$canti_= $registro['canti'];
			
			}
		?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Modificacion de Mobiliario</title>
	</head>
	<body>
		<h2 style="z-index: 2; position: absolute; left: 75px; top: 2px; width: 800px; height: 578px; visibility: visible;">
		</h2>
		<span id="c1" style="z-index: 2; position: absolute; left: 72px; top: 52px; width: 650px; height: 506px; visibility: visible; background-color: #ffffff; border: thick ridge #8f9892" ><span id="c3" style="z-index:4; position: absolute; left: 5px; top: 38px; width: 644px; height: 260px; visibility: visible; font-family: Arial; font-size: 25;" >
				
			<form method="post" action="updateObjeto.php" >
						
						<p>
						  <input type="hidden" name="idMob" id="idMobi"
								<?php if(@$_POST['id_mobil']){echo "value= '".$id_mobil_."'"; }?>
								/> 
						  <br>
						
			 <b style="z-index: 1; position: absolute; left: 9px; top: 43px; width: 30px; height: 20px">IdMobil:</b><br>
			<input type="text" name="nomMobil" id="nomMobil" size= "20" maxlength="30"  disabled style="z-index: 1; position: absolute; left: 82px; top: 43px; width: 150px; height: 20px; visibility: visible;"
								<?php if(@$_POST['id_mobil']){echo "value= '".$id_mobil_."'"; }?>
								/>	<br>
						
			 <b style="z-index: 2; position: absolute; left: 3px; top: 103px; width: 165px; height: 50px">Tipo:</b><br>
			 <input type="text" name="tipoMobil" id="tipoMobil"
			size= "20" maxlength="50" style="z-index: 1; position: absolute; left: 56px; top: 103px; width: 150px; height: 20px; visibility: visible"
			 <?php if(@$_POST['id_mobil']){echo "value= '".$tipo_."'"; }?>
			/> <br>
								
			<b style="z-index: 2; position: absolute; left: 2px; top: 161px; width: 165px; height: 20px">Materiales:</b><br>
			<input type="text" name="materMobil" id="materMobil" size= "20" maxlength="11" style="z-index: 1; position: absolute; left: 101px; top: 160px; width: 150px; height: 20px; visibility: visible"
			<?php if(@$_POST['id_mobil']){echo "value= '".$mater_."'"; }?>
			/> <br>
						
			<b style="z-index: 1; position: absolute; left: 7px; top: 208px; width: 30px; height: 20px">Nombre:</b>
			<input type="text" name="nombrMobil" id="nombrMobil" size= "20" maxlength="30" style="z-index: 1; position: absolute; left: 90px; top: 209px; width: 150px; height: 20px; visibility: visible"
			<?php if(@$_POST['id_mobil']){echo "value= '".$nombr_."'"; }?>
			/> <br>
								
			<b style="z-index: 1; position: absolute; left: 5px; top: 250px; width: 30px; height: 20px">Cantidad:</b>
			<input type="number" name="cantiMobil" id="cantiMobil"
		    size= "20" maxlength="30" style="z-index: 1; position: absolute; left: 94px; top: 247px; width: 150px; height: 20p                  x; visibility: visible"
				<?php if(@$_POST['id_mobil']){echo "value= '".$canti_."'"; }?>
				/>	<br>	
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
			  <p><br>
						
			<input type="submit" value="Actualizar" style="z-index:2; position: absolute; left: 450px; top: 290px; width: 150px; height: 45px" />
						<br><input type="checkbox" name="guardar" value="1" style="z-index: 2; position: 9; left: 185px; to                        p: 288px; width: 30px; height: 20px;"/>
					    Confirmar Actualizacion </h5>
				</p>
				</form>
						
				</span>
				</span>
	
	</body>
</html>



		