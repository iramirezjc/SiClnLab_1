
<?php 

include("../admin.php");

 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Servicio a sala</title>
		<link rel="stylesheet" href="\SiClnLab\css\codeLob\bootstrap.min.css">
  		<script src="\SiClnLab\css\codeLob\jquery.min.js"></script>
  		<script src="\SiClnLab\css\codeLob\bootstrap.min.js"></script>
  		<link rel="stylesheet" type="text/css" href="SiCInLab\type\icons.css"/>
	</head>
	<body>

		<table border="1" id="tablas" >
		
			<center><h3>Servicio de acceso al laboratorio</h3></center>
			<br>
		
<!--Formulario-->
		<form id="frm" action="instruciones.php" method="POST" >
		
<!-- Formato de fecha/solicitante/administrador-->	
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-6">
					
						<label>Solicita: <input type="number" min="1" name="matri"  value="Matricula o nombre" required /></label>
				</div>
				<div class="col-sm-6">
				<label>Autoriza: <input type="text" disabled value="<?php echo($matri_usuar)?>"/></label>
				</div>
			</div>
		
		<div class="row" >
			<div class="col-sm-6">
				
				
		<!-- 		<button value="" name="boton1" type="submit">Consultar</button> -->
				<label>Asunto: </label><br/><textarea cols="40" type="text" name="apeUser" required ></textarea>

			

			</div>
			<div class="col-sm-6">
				
			</div>
		</div>
		</div>
	</div> 
	
</div> 
<!-------Fin formato de fecha/solicitante/administrador------->		

<!-- Indicaciones-->
			<div class="container ">
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-info">
							<div class="panel-heading">Indicaciones</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-6">
										<label><input type="checkbox" disabled checked/>   Sala ocupada</label>
									</div>
									<div class="col-sm-6">
										<label><input type="checkbox" disabled />   Sala libre</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
<!--------------------------------------------Fin indicaciones-->	


<?php 

		
		include 'mysqlConeccion.php';
		
		ini_set('date.timezone','America/Mexico_City');
		$fecha = $_SESSION['fecha_'];
	//	$fecha =isset($_POST['fnacUser']);
		//$fecha = isset($_POST['start_date']);
		//echo $_SESSION['fecha_'];


					
					$matriz_db = $link->query("SELECT h8,h9,h10,h11,h12,h13,h14,h15,h16,h17,h18,h19 FROM horario WHERE fecha= '".$fecha."'") or die("<h2>Error Guardando los datos</h2>");



						$cont =0;
						$cont2 =0;
						$cont3 =0;
						$cont4 =0;
						$cont5 =0;
						$cont6 =0;
						$cont7 =0;
						$cont8 =0;
						$cont9 =0;
						$cont10 =0;
						$cont11 =0;
						$cont12 =0;
						
						
	
						while ($row = mysqli_fetch_array ($matriz_db))
						{
							$h8= $row['h8'];
							$h9= $row['h9'];
							$h10= $row['h10'];
							$h11= $row['h11'];
							$h12= $row['h12'];
							$h13= $row['h13'];
							$h14= $row['h14'];
							$h15= $row['h15'];
							$h16= $row['h16'];
							$h17= $row['h17'];
							$h18= $row['h18'];
							$h19= $row['h19'];
						   
						   if($h8==1){$cont +=1;}
						   if($h9==1){$cont2 +=1;}
						   if($h10==1){$cont3 +=1;}
						   if($h11==1){$cont4 +=1;}
						   if($h12==1){$cont5 +=1;}
						   if($h13==1){$cont6 +=1;}
						   if($h14==1){$cont7 +=1;}
						   if($h15==1){$cont8 +=1;}
						   if($h16==1){$cont9 +=1;}
						   if($h17==1){$cont10 +=1;}
						   if($h18==1){$cont11 +=1;}
						   if($h19==1){$cont12 +=1;}
		 
						}
							
							if($cont>0){  $hrs8 ="disabled checked"; }else{ $hrs8 ="0";  }
							if($cont2>0){  $hrs9 ="disabled checked"; }else{ $hrs9 ="0";  }
							if($cont3>0){  $hrs10 ="disabled checked"; }else{ $hrs10 ="0";  }
							if($cont4>0){  $hrs11 ="disabled checked"; }else{ $hrs11 ="0";  }
							if($cont5>0){  $hrs12 ="disabled checked"; }else{ $hrs12 ="0";  }
							if($cont6>0){  $hrs13 ="disabled checked"; }else{ $hrs13 ="0";  }
							if($cont7>0){  $hrs14 ="disabled checked"; }else{ $hrs14 ="0";  }
							if($cont8>0){  $hrs15 ="disabled checked"; }else{ $hrs15 ="0";  }
							if($cont9>0){  $hrs16 ="disabled checked"; }else{ $hrs16 ="0";  }
							if($cont10>0){  $hrs17 ="disabled checked"; }else{ $hrs17 ="0";  }
							if($cont11>0){  $hrs18 ="disabled checked"; }else{ $hrs18 ="0";  }
							if($cont12>0){  $hrs19 ="disabled checked"; }else{ $hrs19 ="0";  }
								
							
		

?>

			<div class="container text-center">
					<div class="panel panel-primary">
						<div class="panel-heading">Horario del <?php echo $_SESSION['fecha_']; ?></div>
						<div class="panel-body">
							<div class="row" >
								<div class="col-sm-4" >
									<label><input type="checkbox" name="hrs8" value=<?php print $hrs8 ?> <?php print $hrs8 ?> />   08:00 a.m - 09:00 a.m</label>
									<br />
									<label><input type="checkbox" name="hrs9"  value=<?php print $hrs9 ?> <?php print $hrs9 ?> />   09:00 a.m - 10:00 a.m</label>
									<br />
									<label><input type="checkbox" name="hrs10"  value=<?php print $hrs10 ?>  <?php print $hrs10 ?> />   10:00 a.m - 11:00 a.m</label>
									<br />
									<label><input type="checkbox" name="hrs11" value=<?php print $hrs11 ?> <?php print $hrs11 ?> />   11:00 a.m - 12:00 p.m</label>
								</div>
								<div class="col-sm-4">
									<label><input type="checkbox" name="hrs12" value=<?php print $hrs12 ?> <?php print $hrs12 ?> />   12:00 p.m - 13:00 p.m</label>
									<br />
									<label><input type="checkbox" name="hrs13" value=<?php print $hrs13 ?> <?php print $hrs13 ?> />   13:00 p.m - 14:00 p.m</label>
									<br />
									<label><input type="checkbox" name="hrs14" value=<?php print $hrs14 ?> <?php print $hrs14 ?> />   14:00 p.m - 15:00 p.m</label>
									<br />
									<label><input type="checkbox" name="hrs15" value=<?php print $hrs15 ?> <?php print $hrs15 ?> />   15:00 p.m - 16:00 p.m</label>
								</div>
								<div class="col-sm-4">
									<label><input type="checkbox" name="hrs16" value=<?php print $hrs16 ?> <?php print $hrs16 ?> />   16:00 p.m - 17:00 p.m</label>
									<br />
									<label><input type="checkbox" name="hrs17" value=<?php print $hrs17 ?> <?php print $hrs17 ?> />   17:00 p.m - 18:00 p.m</label>
									<br />
									<label><input type="checkbox" name="hrs18" value=<?php print $hrs18 ?> <?php print $hrs18 ?> />   18:00 p.m - 19:00 p.m</label>
									<br />
									<label><input type="checkbox" name="hrs19" value=<?php print $hrs19 ?> <?php print $hrs19 ?>/>   19:00 p.m - 20:00 p.m</label>

								</div>
							</div>
						</div>
						
						

						
						<button type="submit" name="boton2" value="Registrar" >Reservar</button>
					
					
					</div>
			</div>
	
		</form>

	</table>
<!-----Fin Formulario---------------------------->
	</body>
</html>