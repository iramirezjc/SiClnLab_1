<body>
<center>
<table border="0"> 
<tr><td>
<center>
<br><br>
<h1>SiCInLab</h1>
</center>

<table border="2" width="700">
<tr>
<td width="10%"><center>Clave identificador</td>
<td width="15%"><center>Tipo</td>
<td width="15%"><center>Material</td>
<td width="50%"><center>Nombre</td>
<td width="10%"><center>Cantidad</td>
<br>
<form method="post" action="consultaMobiliario.php">
<center>
Ingrese el nombre.
<br><br>
Mobiliario:&nbsp;&nbsp;
<input type="text" name="BuscarMob" id="BuscarMob"/>&nbsp;&nbsp;
<input type="submit" value="Buscar"/>
</center>
</form>
<br><br>
	<?php
	$sql= "SELECT * FROM mobil";
	if(@$_POST['BuscarMob']){
	$sql .= " WHERE nombr LIKE '%".$_POST['BuscarMob']."%';";
	}
	include("conexion.php");				
	$resultado = $mysqli->query($sql);
	$filas= $resultado->num_rows;				
	while($registro= $resultado->fetch_assoc()){
	echo "<tr><td>".$registro['id_mobil'].
	"</td><td>".$registro['tipo'].
	"</td><td>".$registro['mater'].
	"</td><td>".$registro['nombr'].
	"</td><td>".$registro['canti']."";
	}				
	?>		
</table>
<br> <br>	
<button style="width:85px" onclick="location.href='http://localhost/inicioMobiliario.php'" >Regresar</button>	
</td></tr>
</table>
</body>