<?php 

//session_start();
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
	
		<center>	<h3>Consulta del laboratorio</h3></center>
	<br>
<!--Formulario-->
		<form id="frm" action="Accesoasala.php"  method="POST"  >
		
<!-- Formato de fecha/solicitante/administrador-->	
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				
			</div>
		
		<div class="row" >
			<div class="col-sm-6">
				
				<label>Fecha: <input type="Date" id="start_date" name="start_date" onchange="submit()" value="0000-00-00"></label>
				<input type="hidden" id="form_sent" name="form_sent" value="true">

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
</form>





<?php 
if (isset($_POST['form_sent']) && $_POST['form_sent'] == "true") {

	 $fecha = $_POST['start_date'];
	 $_SESSION['fecha_'] = $fecha;

	}else{

		ini_set('date.timezone','America/Mexico_City');
		$fecha = date('Y-m-d',time());
		$_SESSION['fecha_'] = $fecha;
		
	}

	

		include 'mysqlConeccion.php';
		
				
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
						<div class="panel-heading">Horario del dia <?php echo $_SESSION['fecha_']; ?></div>
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
						<form id="frm2" action="Accesoasala.php" method="POST">
							<?php 

								$matUser =isset($_POST['matri']);
								$fnacUser =isset($_POST['start_date']);
								$hrs8 =isset($_POST['hrs8']);
								$hrs9 =isset($_POST['hrs9']);
								$hrs10 =isset($_POST['hrs10']);
								$hrs11 =isset($_POST['hrs11']);
								$hrs12 =isset($_POST['hrs12']);
								$hrs13 =isset($_POST['hrs13']);
								$hrs14 =isset($_POST['hrs14']);
								$hrs15 =isset($_POST['hrs15']);
								$hrs16 =isset($_POST['hrs16']);
								$hrs17 =isset($_POST['hrs17']);
								$hrs18 =isset($_POST['hrs18']);
								$hrs19 =isset($_POST['hrs19']);


					
					


							if($hrs8 == "disabled checked"){  	$cont =1;  }else if($hrs8 == "0"){ 	$cont =0;  }
							if($hrs9 == "disabled checked"){  	$cont2 =1;  }else if($hrs9 == "0"){ 	$cont2 =0;  }
							if($hrs10 == "disabled checked"){  	$cont3 =1;  }else if($hrs10 == "0"){ 	$cont3 =0;  }
							if($hrs11 == "disabled checked"){  	$cont4 =1;  }else if($hrs11 == "0"){ 	$cont4 =0;  }
							if($hrs12 == "disabled checked"){  	$cont5 =1;  }else if($hrs12 == "0"){ 	$cont5 =0;  }
							if($hrs13 == "disabled checked"){  	$cont6 =1;  }else if($hrs13 == "0"){ 	$cont6 =0;  }
							if($hrs14 == "disabled checked"){  	$cont7 =1;  }else if($hrs14 == "0"){ 	$cont7 =0;  }
							if($hrs15 == "disabled checked"){  	$cont8 =1;  }else if($hrs15 == "0"){ 	$cont8 =0;  }
							if($hrs16 == "disabled checked"){  	$cont9 =1;  }else if($hrs16 == "0"){ 	$cont9 =0;  }
							if($hrs17 == "disabled checked"){  	$cont10 =1;  }else if($hrs17 == "0"){ 	$cont10 =0;  }
							if($hrs18 == "disabled checked"){  	$cont11 =1;  }else if($hrs18 == "0"){ 	$cont11 =0;  }
							if($hrs19 == "disabled checked"){  	$cont12 =1;  }else if($hrs19 == "0"){ 	$cont12 =0;  }

						

							 ?>

					
					
					
					</form>
						<form name="formulario" method="post" action="reservacion.php">

						<button type="submit"  >Generar solicitud</button>


						</form>
						
						 
					
					</div>
			</div>
			</table>
		
	<!-- 	</form> -->
<!-----Fin Formulario---------------------------->
	</body>
</html>