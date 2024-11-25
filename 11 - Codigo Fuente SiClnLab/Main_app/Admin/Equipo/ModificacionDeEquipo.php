<?php
 
include("../admin.php");
		
		
		
			if(@$_POST['id_eq']){			
			include("conexion.php");
			$sql= "SELECT * FROM equip WHERE id_equip= ".$_POST['id_eq'];
			$resultado = $mysqli->query($sql);
			//$filas= $resultado->num_rows;				
			$registro= $resultado->fetch_assoc();
			$id_= $registro['id_equip'];
			$nom_= $registro['nombr_equip'];
			$cant_= $registro['canti_equip'];
			$desc_= $registro['descr'];
			$tipo_= $registro['tipo'];
			}
		?>

<link rel="stylesheet" href="\SiClnLab\css\codeLob\bootstrap.min.css">
  		<script src="\SiClnLab\css\codeLob\jquery.min.js"></script>
  		<script src="\SiClnLab\css\codeLob\bootstrap.min.js"></script>
  		<link rel="stylesheet" type="text/css" href="\SiClnLab\type\icons.css"/>
<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<title>Modificación de equipo</title>
	</head>
	
	<body >
		<center>

	<div style="position: absolute; align-content: center; top:100px " > 
		
		<h2 style="z-index:2; position: absolute; left: 75px; top: 120px; width: 800px; height: 460px; visibility: visible;">Modificación de registros de equipos</h2>
		
			<span id="c4" style="z-index:1; position: absolute; left: 0px; top: 115px; width: 800px; height: 460px; visibility: visible; background-color: #fffde5; border: thick ridge #8f9892">
			</span>
			
				<span id="c1" style="z-index:2; position: absolute; left: 72px; top: 170px; width: 650px; height: 300px; visibility: visible; background-color: #ffffff; border: thick ridge #8f9892" >
			<span id="c2" style="z-index:3; position: absolute; left: 0px; top: 0px; width: 644px; height: 25px; visibility: visible; background-color: #f8f7e7; border: thick ridge #ffffff" ></span>
				<span id="c3" style="z-index:4; position: absolute; left: 5px; top: 38px; width: 644px; height: 260px; visibility: visible; font-family: Arial; font-size: 25;" >
				
					<form method="post" action="updateObjeto.php" >
						
						<input type="hidden" name="idEq" id="idEq"
								<?php if(@$_POST['id_eq']){echo "value= '".$id_."'"; }?>
								/>
						
						<b style="z-index:1; position: absolute; left: 5px; top: 40px; width: 165px; height: 20px">Nombre del equipo:</b>
					
						<input type="text" name="nomEquip" id="nomEquip"
								size= "20" maxlength="50" style="z-index:1; position: absolute; left: 175px; top: 35px; width: 150px; height: 20px; visibility: visible"
								<?php if(@$_POST['id_eq']){echo "value= '".$nom_."'"; }?>
								/> <br>
						
						
						<b style="z-index:2; position: absolute; left: 5px; top: 90px; width: 165px; height: 20px">Cantidad de equipos:</b><br>
						
						<input type="text" name="cantiEquip" id="cantiEquip"
								size= "20" maxlength="11" style="z-index:1; position: absolute; left: 175px; top: 84px; width: 150px; height: 20px; visibility: visible"
								<?php if(@$_POST['id_eq']){echo "value= '".$cant_."'"; }?>
								/> <br>
						
						
						<b style="z-index:1; position: absolute; left: 5px; top: 140px; width: 165px; height: 20px">Descripción:</b><br>
     <textarea name="desEq" id="desEq" rows="4" 
     cols="25" wrap="virtual" style="z-index:1; position: absolute; left: 5px; top: 160px; width: 625px; height: 80px" maxlength="200"
     ><?php if(@$_POST['id_eq']){echo $desc_; }?></textarea>
						
						
						<b style="z-index:1; position: absolute; left: 440px; top: 40px; width: 30px; height: 20px">Tipo:</b>
						
						<input type="text" name="tipo" id="tipo"
								size= "20" maxlength="30" style="z-index:1; position: absolute; left: 485px; top: 35px; width: 150px; height: 20px; visibility: visible"
								<?php if(@$_POST['id_eq']){echo "value= '".$tipo_."'"; }?>
								/>						
						
						
						<input type="checkbox" name="guardar" value="1" 
						style="z-index:2; position: absolute; left: 200px; top: 300px; width: 30px; height: 20px;"
						/> 
						<h4 style="z-index:2; position: absolute; left: 235px; top: 284px; width: 195px; height: 23px">
					Confirmar modificación </h4>
						
						<input type="submit" value="Actualizar" style="z-index:2; position: absolute; left: 450px; top: 290px; width: 150px; height: 45px" />
						<button class="btn btn-warning" style="z-index:2; position: absolute; left: 450px; top: 290px; width: 150px; height: 45px">Actualizar</button  >
					</form>
						
				</span>
				</span>
	</div>
</center>
	</body>

</html>



		



		