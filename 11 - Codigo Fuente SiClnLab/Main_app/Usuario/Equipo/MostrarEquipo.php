<?php
include("../Usuario.php");
?>
<head>
    <meta http-equiv= "Content-Type" 
    content="charset= UTF-8" />
    <meta charset="utf-8">
   <link rel="stylesheet" href="\SiClnLab\css\codeLob\bootstrap.min.css">
        <script src="\SiClnLab\css\codeLob\jquery.min.js"></script>
        <script src="\SiClnLab\css\codeLob\bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="\SiClnLab\type\icons.css"/>
</head>
<body >
<br>
<div class="container-fuil">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-info">
                        <div class="panel-heading ">

                <div align="center">
                <h3>Equipos</h3>    
                </div>
                        </div>
                        <div class="panel-body">
<form method="post" action="MostrarEquipo.php" >
                <div align="center">
                    <h3 > Nombre de equipo: <input type="text" name="filtro_nom" id="filtro_nom" />
                    <button class="btn btn-success">Buscar</button>
                    <a href="AltaEquipo.php"> <button class="btn btn-primary" type="button" value="Agrgar">Agregar equipos</button> </a> </h3> 
                </div>
                <div>
                  </form>
                <div class="container">
                    <table class="table table-bordered table-hover alert-light">
                
                <!--<table border="1" id="tablas">-->
                <thead>
                <tr  >
                <th >Nombre de equipo</th><th >Cantidad</th>
                <th >Descripcion</th><th >Tipo</th><th >Operaciones</th>
                </tr>
                
                <!--Alta Equipos-->
            </thead>
                     <tbody>                        
                <?php
$sql = "SELECT * FROM equip";
if (@$_POST['filtro_nom']) {
    $sql .= " WHERE nombr_equip LIKE '%" . $_POST['filtro_nom'] . "%';";
}
include("conexion.php");
$resultado = $mysqli->query($sql);
$filas     = $resultado->num_rows;
while ($registro = $resultado->fetch_assoc()) {
    echo "<tr><td>" . $registro['nombr_equip'] . "</td><td>" . $registro['canti_equip'] . "</td><td>" . $registro['descr'] . "</td><td>" . $registro['tipo'] . "</td><td>";
?>
                       <table border="0">
                            <tr >
                            <td >
                            <?php
    echo "<form method='post' action='ModificacionDeEquipo.php'>";
    echo "<input type='hidden' name='id_eq' id='id_eq' value='" . $registro['id_equip'] . "'/>";
    echo "<input type='submit' id='modificaciones' value='Modificar'/></form>";
    echo "</td>";
?>
                       </td>   
                                <td >
                        <?php
    echo "<form method='post' action='DeleteEquip.php'>";
    echo "<input type='hidden' name='id_equip' id='id_equip' value='" . $registro['id_equip'] . "'/>";
    echo "<input type='Checkbox' name='confirmar' id='confirmar'/>";
    echo "<input type='submit' id='eliminar' value='Eliminar' /></form>";
?>                        
                        </td>
                            </tr>
                        </table>    
                    <?php
}
?>          
            </table>
            <p align="justify"> Se han encontrado <?php
echo $filas;
?> registros.</p>    
</center>
</tbody>
            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
    
        
</body>