<?php 
if(@$_POST['iniciocostos'] && @$_POST['fincostos']){
	$fecha_inicio_costos=$_POST['iniciocostos'];
	$fecha_fin_costos=$_POST['fincostos'];
	
	$formato_inicio_costos=new DateTime($fecha_inicio_costos);
	$formato_fin_costos=new DateTime($fecha_fin_costos);
	
	
	$y_inicio_costos=$formato_inicio_costos->format("Y");
	$y_fin_costos=$formato_fin_costos->format("Y");
	
	$m_inicio_costos=$formato_inicio_costos->format("m");
	$m_fin_costos=$formato_fin_costos->format("m");
	
	//echo($y_inicio_costos);
	//echo($y_fin_costos);	
	
	$dif_years=$y_fin_costos-$y_inicio_costos;
	
	if($dif_years<0){
		header('Location: index.php');
	}
	if($dif_years==0){
		$dif_meses=$m_fin_costos-$m_inicio_costos;
		if($dif_meses<0){
			header('Location: index.php');
		}
		//un solo añoconun solo mes  seleccionado
		if($dif_meses==0){
			$file = fopen("costos.php", "w");
			fwrite($file, '<?php
			require("lib.php");
			include("conexion.php");
			$tiempo=array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
			$escalatiempo=array();
			$datos=array();
			for ($k='.($m_fin_costos-1).'; $k <='.(($m_fin_costos-1)+1).'; $k++) {
				$resultado =$mysqli->query("SELECT sum(monto) from compr where MONTH(fecha)=".$k." and YEAR(fecha)='.$y_fin_costos.'");
				$row = mysqli_fetch_array ($resultado);
				if($row["sum(monto)"]==null){
					array_push($datos, 0);
					array_push($escalatiempo, $tiempo[$k-1]);
					}
					else{
						array_push($escalatiempo, $tiempo[$k-1]);
						array_push($datos, $row["sum(monto)"]);
						}
			}
			$rl=new Grafica_de_lineas;
$rl->definir(500,700,"","MXN","MESES");
$rl->escalatiempo=$escalatiempo;
$rl->Agregar_linea("Compras",$datos,"#F00");
$rl->imprimir_grafica();

			?>
			' . PHP_EOL);
			fclose($file);
			
		}
		
		if($dif_meses>0){
			$file = fopen("costos.php", "w");
			fwrite($file, '<?php
			require("lib.php");
			include("conexion.php");
			$tiempo=array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
			$escalatiempo=array();
			$datos=array();
			for ($k='.$m_inicio_costos.'; $k <='.$m_fin_costos.'; $k++) {
				$resultado =$mysqli->query("SELECT sum(monto) from compr where MONTH(fecha)=".$k." and YEAR(fecha)='.$y_fin_costos.'");
				$row = mysqli_fetch_array ($resultado);
				if($row["sum(monto)"]==null){
					array_push($datos, 0);
					array_push($escalatiempo, $tiempo[$k-1]);
					}
					else{
						array_push($escalatiempo, $tiempo[$k-1]);
						array_push($datos, $row["sum(monto)"]);
						}
			}
			$rl=new Grafica_de_lineas;
$rl->definir(500,700,"","MXN","MESES");
$rl->escalatiempo=$escalatiempo;
$rl->Agregar_linea("Compras",$datos,"#F00");
$rl->imprimir_grafica();

			?>
			' . PHP_EOL);
			fclose($file);
			
		}
		
	
	}
	
	if($dif_years>0){
		$file = fopen("costos.php", "w");
		fwrite($file, '<?php
			require("lib.php");
			include("conexion.php");
			$tiempo=array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
			$escalatiempo=array();
			$datos=array();
			$inicio='.$y_inicio_costos.';
			for($y=0;$y<='.$dif_years.';$y++){
				for ($k='.$m_inicio_costos.'; $k <='.$m_fin_costos.'; $k++) {
	$resultado =$mysqli->query("SELECT sum(monto) from compr where MONTH(fecha)=".$k." and YEAR(fecha)=".($inicio+$y));
				$row = mysqli_fetch_array ($resultado);
				if($row["sum(monto)"]==null){
					array_push($datos, 0);
					array_push($escalatiempo, $tiempo[$k-1]."/'.($y_fin_costos+$y).'");
					}
					else{
						array_push($escalatiempo, $tiempo[$k-1]);
						array_push($datos, $row["sum(monto)"]);
						}
			}
			}
			$rl=new Grafica_de_lineas;
$rl->definir(500,700,"","MXN","MESES");
$rl->escalatiempo=$escalatiempo;
$rl->Agregar_linea("Compras",$datos,"#F00");
$rl->imprimir_grafica();

			?>
			' . PHP_EOL);
			fclose($file);
	}
	
	
	
	
}



/*
$file = fopen("archivo.php", "w");

fwrite($file, '<?php echo("hola"); ?>' . PHP_EOL);

fwrite($file, "Otra más" . PHP_EOL);

fclose($file);

*/
header('Location: index.php');
?>

