<?php

include("../admin.php");
?>

<br>
        <meta charset="utf-8">
        <title></title>
     <link rel="stylesheet" href="\SiClnLab\css\codeLob\bootstrap.min.css">
        <script src="\SiClnLab\css\codeLob\jquery.min.js"></script>
        <script src="\SiClnLab\css\codeLob\bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="\SiClnLab\type\icons.css"/>
<div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-info">
                        <div class="panel-heading ">
                        <div align="center">
                            <h3>Registrar nuevo equipo</h3>
                            </div>
                        </div>
                        <div class="panel-body">
                        <center>

        <form method="post" action="InsertEquipo.php">
<table>
    <tr>    
        <td>Nombre</td>
        <td><input type="text" name="nombre" id="nombre"  /></td>
    </tr>
    
    <tr>
        <td>Cantidad</td>
        <td><input type="number" name="cantidad" id="cantidad"  /></td>
    </tr>
    
    <tr>
        <td>Descripcion</td>
        <td><textarea name="descripcion" id="descripcion"   rows="2"></textarea></td>
    </tr>
    
    <tr>
        <td>Tipo</td>
        <td><input type="text" name="tipo" id="tipo" /></td>
    </tr>
</table>
<br>

<button class="btn btn-primary">Guardar</button>
</form>
<br>
                <div align="center">
                <form method="post" action="MostrarEquipo.php">
                <button class="btn btn-danger">Cancelar</button>
                </form>
                </div>

        </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
