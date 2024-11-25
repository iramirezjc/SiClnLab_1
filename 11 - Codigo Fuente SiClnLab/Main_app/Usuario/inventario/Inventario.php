<?php
include("../admin.php");
//session_start();
  if (isset($_SESSION['usuario'])) {
  $usuario_nombre=$_SESSION['usuario']['nombr'];
       if ($_SESSION['usuario']['fk_nivel_usuar'] != '1') {
            header('Location: ../Admin/admin.php');
       }
  }else{
    header('Location: ../../');
  }
  $nombr_usuar=$_SESSION['usuario']['user_name'];
  $matri_usuar=$_SESSION['usuario']['id_matri'];
   $ID = "";
   	
	/*session_start();
	include("conexion.php");
	$matricula = $_SESSION['name'];
	$hoy = date("Y-m-d");
	$ID = "";
	
	$query = "SELECT id_inven FROM inven WHERE fecha='$hoy' AND fk_usuar_matri='$matricula'";
	$result = $mysqli->query($query);


		while($row = $result->fetch_array()) {
			$ID=$row['id_inven'];		
		}	*/
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Levantamiento de inventario</title>
	</head>
	<style type="text/css">
	table, th, td {
		border:1px solid black;
		border-collapse:collapse;	
					
	}

	table{
		width: 80%;
	}

	form{
		width: auto;
		height: auto;
		display: inline-block;
	}
	#boton-btn {
  background-color: #bdb3c8;
  color: #000000;
  padding: 10px;
  border-radius: 10px;
  text-decoration: none;
  cursor: pointer;
}
	</style>
	<body>
		<?php 
			include'conexion.php';
			$id_categoria = 0;
			$id_objeto = 0;
			$max = 0;
			$queryMax = "SELECT MAX(id_inven) AS maximo FROM inven";
			$resultMax = $mysqli->query($queryMax);
			if ($row2 = $resultMax->fetch_array()) {
				$max = $row2['maximo'];		
				$ID = $max;				
			}

		 ?>
		 <center>
		<h1>Levantamiento de inventario <span>número: </span> <span> </span>
			<input type = "text"  id = "Inventario" name = "Inventario" value=" <?php echo $max; ?>" disabled></h1>
		<br></br>
		<!--<span>&nbsp;&nbsp;Inventario número: </span> 
			<input type = "text"  id = "Inventario" name = "Inventario" value=" <?php echo $max; ?>" disabled>
		<br></br>-->
		</center>
		<!--<a href="agregar_inventario.php">Agregar inventario</a>-->
		
		<br></br>
		
		<center>
        <span>Categoría:</span>
        <form action="Inventario.php?nivel=1" method="get">
	        <select onchange="this.form.submit()" name="nivel" id="categ" required >
			<option value="0">Seleccionar</option>
	        <?php
	        	$seleccionar = 0;
				if (isset($_GET['nivel'])) {
					$seleccionar = $_GET['nivel'];
				}			 
						// cargado de categorias (select)
						$query = 'SELECT * FROM categ';
						$result = $mysqli->query($query);
						while($row = $result->fetch_array()){?>
					<option value="<?php echo $row['id_categ']?>"
					<?php if($row['id_categ']==$seleccionar && $seleccionar > 0) echo "SELECTED"; ?>
						><?php echo $row["nombr"]; ?></option>
					<?php } ?>
				</select>
			</form>
			

			<?php 
				if(isset($_GET['nivel'])){
					$nivel = $_GET['nivel'];
					$objeto3 = "";
					
					if (isset($_GET['objeto'])) {
						$objeto3 = $_GET['objeto'];
					}

					if ($nivel > 0) {
						$id_categoria = $nivel;

						$tablas = ['equip', 'mater', 'mobil', 'react'];
						$lbl = "nombr";

						if ($tablas[$nivel-1]=='equip') {
							$lbl = "nombr_equip";
						}

						$queryNivel2 = "SELECT * FROM ".$tablas[$nivel-1];

						$resultNivel2 = $mysqli->query($queryNivel2);
						echo '<FORM action="">';
						echo '<input type="hidden" name="nivel" value="'.$nivel.'"/>';
						echo '<select onchange=" this.form.submit()" name="objeto">';
						echo "<option value=0>Seleccionar</option>";
						//echo "<select>";
						
						while($row = $resultNivel2->fetch_array()){
							$id = 0;
							$nombre = "";
							$id = $row['id_'.$tablas[$nivel-1]];

							if ($tablas[$nivel-1]==$tablas[0]) {
								$nombre = $row['nombr_equip'];
							}else{
								$nombre = $row['nombr'];
							}

							$tx = "";

							if ($objeto3==$id) {
								$tx = "selected";
							}

							echo '<option '.$tx.' value="'.$id.'">'.$nombre.'</option>';
						}
						echo "</select>";
					}else{
						echo "<select>";
						echo "<option>Sin opciones</option>";
						echo "</select>";
					}
					
					echo "</form>";
				}
			 ?>
		<datalist id="Categoría">
		<option value="Materiales">
		<option value="Equipo">
		<option value="Reactivo">
		<option value="Mobiliario">
		</datalist>
		
		<!--<select>
			<option value="$id">Nombre</option>
		</select>-->
		
		<!--<span>Objetos:</span>
		 <select name="obj" id="obj" required>
		<option value="">Seleccionar</option>-->
        <?php
		 /*
		include'conexion.php';
					$query = 'SELECT * FROM desgl_inven';
					$result = $mysqli->query($query);
					while($row= $result->fetch_array()){?>
				<option value="<?php echo $row['id_objeto']?>"><?php //echo $row["id_objeto"]; ?></option>
				<?php } */?>
			
		
		
		<form action="inventario_agregar.php" method="POST">
			<?php 
				$nivel1 = 0;
				$objeto1 = 0;
				if (isset($_GET['nivel']) && isset($_GET['objeto'])) {
					$nivel1 = $_GET['nivel'];
					$objeto1 = $_GET['objeto'];
				}

			 ?>
			 <input value=" <?php echo $max; ?> " name="fk_inven" type="hidden">
			<input value=" <?php echo $nivel1; ?> " name="nivel" type="hidden">
			<input value=" <?php echo $objeto1; ?> " name="objeto" type="hidden">

			<span>Cantidad:</span>
			<input type = "text" id = "Cantidad" name = "agregar">
			<span>Agregar</span>
			<input type = "submit" id = "+" value = "+">	
			<span><a href="inicio.php"><input type="button" name="Fin" value="Finalizar" /></a></span>
		</form>

		<br></br>
		<br></br>
		
		<table>
        <tr>
		    <th width="16%">No.</th>
		    <th width="16%">Categoría</th>
		    <th width="16%">Objeto</th>
		    <th width="16%">Cantidad</th>
	    </tr>
	    
		<?php 
			//$query = "SELECT * FROM desgl_inven WHERE fk_inven='$ID'";
			$query = "SELECT * FROM desgl_inven WHERE fk_inven= '$ID'";
			$result = $mysqli->query($query);
			$no = 1;
			while($row2 = $result->fetch_array()) {
				
				$categoria = $row2['fk_categ'];
				$objeto = $row2['fk_objeto_id'];
				$cantidad = $row2['canti_exist'];

				//Obteniendo categoría
				$query = "SELECT * FROM categ WHERE id_categ='$categoria'";
				$result3 = $mysqli->query($query);
				if($row3 = $result3->fetch_array()) {
					$categoria = $row3['nombr'];
				}

				//Obteniendo objeto
				$tabla = "";
				$label = "nombr";

				switch ($categoria) {
					case 'Equipos':
						$tabla = "equip";
						$label = "nombr_equip";
						break;
					case 'Materiales':
						$tabla = "mater";
						break;
					case 'Mobiliario':
						$tabla = "mobil";
						break;
					case 'Reactivos':
						$tabla = "react";
						break;
					default:
						$tabla = "equip";
						break;
				}
				

				$query = "SELECT * FROM ".$tabla." WHERE id_".$tabla."='$objeto'";
				$result3 = $mysqli->query($query);
				if($row3 = $result3->fetch_array()) {
					$objeto = $row3[$label];
				}

				echo '<tr>
						<td>'.$no.'</td>
						<td>'.$categoria.'</td>
						<td>'.$objeto.'</td>
						<td>'.$cantidad.'</td>
					</tr>';

				$no++;
			}

		 ?>
		</table>
		<br><br>
		
		
		
		
		
	</body>
</html>