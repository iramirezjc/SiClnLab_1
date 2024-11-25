<?php
			require("lib.php");
			include("conexion.php");
			$tiempo=array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
			$escalatiempo=array();
			$datos=array();
			for ($k=10; $k <=12; $k++) {
				$resultado =$mysqli->query("SELECT sum(monto) from compr where MONTH(fecha)=".$k." and YEAR(fecha)=2019");
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
			
