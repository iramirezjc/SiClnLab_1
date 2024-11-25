<?php 


include("../admin.php");

require_once 'mysqlConeccion.php';


$matUser =$_POST['matri'];
$fnacUser = $_SESSION['fecha_'];
$texto =$_POST['apeUser'];
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

							$comprobacion = $cont + $cont2 +$cont3+$cont4+$cont5+$cont6+$cont7+$cont8+$cont9+$cont10+$cont11+$cont12;


 	echo 
					

		$resultado2=$link->query("INSERT INTO `lab`.`solicitud` ( `solicitante`, `fk_matri`) VALUES ( '".$matUser."', '".$matri_usuar."');")or die("<h2>Error </h2>");

		
							

							if($comprobacion > 0){

		
		$resultado3 =$link->query("SELECT max(id_solicitud) from solicitud;")or die("<h2>Guardando los datos</h2>");

			//	$resultado =$link->query("SELECT id_prest from prest where matri_solic =7654;");

				$datos = array();
				$i =0;
			
				while ($row = mysqli_fetch_array ($resultado3)){
				 	$i++;
					$datos[$i]= $row["max(id_solicitud)"];
									
				}

	


		$resultado=$link->query("INSERT INTO `lab`.`horario` (`fecha`, `asunt`, `h8`, `h9`, `h10`, `h11`, `h12`, `h13`, `h14`, `h15`, `h16`, `h17`, `h18`, `h19`, `fk_solicitud`) VALUES ('".$fnacUser."', '".$texto."',  '".$cont."', '".$cont2."', '".$cont3."', '".$cont4."', '".$cont5."', '".$cont6."', '".$cont7."', '".$cont8."', '".$cont9."', '".$cont10."', '".$cont11."', '".$cont12."', '".$datos[1]."');") or die("<h2>Error Guardando los datos</h2>");

		//"INSERT INTO `lab`.`horario` (`fecha`, `asunt`, `h8`, `h9`, `h10`, `h11`, `h12`, `h13`, `h14`, `h15`, `h16`, `h17`, `h18`, `h19`, `fk_solicitud`) VALUES ('".$fnacUser."', 'sdfghusedgrfhtjyd',  '".$cont."', '".$cont2."', '".$cont3."', '".$cont4."', '".$cont5."', '".$cont6."', '".$cont7."', '".$cont8."', '".$cont9."', '".$cont10."', '".$cont11."', '".$cont12."', '".$resultado3."');"

		//$resultado=$link->query("INSERT INTO `lab`.`horario` (`fk_solicitud`, `fecha`, `h8`, `h9`, `h10`, `h11`, `h12`, `h13`, `h14`, `h15`, `h16`, `h17`, `h18`, `h19`) VALUES ('".$resultado3."','".$fnacUser."', '".$cont."', '".$cont2."', '".$cont3."', '".$cont4."', '".$cont5."', '".$cont6."', '".$cont7."', '".$cont8."', '".$cont9."', '".$cont10."', '".$cont11."', '".$cont12."');") or die("<h2>Error Guardando los datos</h2>");


	}
/*
	else{
		echo("
		<script>
			alert('Selecione una hora');
			location.href='reservacion.php';
		</script>
	");
}*/
echo("
		<script>
			location.href='Accesoasala.php';
		</script>
	");




	

?>