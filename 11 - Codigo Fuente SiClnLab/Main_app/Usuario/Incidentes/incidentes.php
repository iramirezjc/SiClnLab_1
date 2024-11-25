<?php 
include("../Usuario.php");
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Incidentes</title>
    <link rel="stylesheet" href="\SiClnLab\css\codeLob\bootstrap.min.css">
        <script src="\SiClnLab\css\codeLob\jquery.min.js"></script>
        <script src="\SiClnLab\css\codeLob\bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="SiCInLab\type\icons.css"/>
</head> 

<style type="text/css" media="screen">
    textarea{
            max-width: 200px;
            max-height: 100px;
            height: 100px;
            width: 400px;
            min-height: 100px;
            min-width: 400px;

        }

        label{
            display: inline-block;
            width: 150px;
        }

        input[type="text"]{
            font-size: 14px;
            height: 20px;
        }

        img{

            width: 100%;
            height: 100%
        }

        .mensaje{
            margin:10px 10px 10px 0px;
            text-align: center;

        }

</style>

<body>
    <br>
<div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-info">
                        <div class="panel-heading ">
                           <h1>Reporte de incidencias</h1>


                        </div>
                        <div class="panel-body">
                            <form action="datos.php" method="POST" accept-charset="utf-8">


        <label> Fecha de incidencias:</label>
        <input type="date" name="fecha" required="true"> <br><br>

        <label>Descripcion:</label>
        <textarea name="descripcion"></textarea><br><br>

        <label>Matricula:</label> <br>
        <input type="text" name="matricula" value="<?php echo($matri_usuar)?>" disabled=""> <br> <br>
        <?php echo "<input type='hidden' id='matricula' name='matricula' value='".$matri_usuar."' />";

    
        ?>



        <div class="botones">

            
            <button  type="submit" name="generar" class="btn btn-primary">Generar</button>

           <a href="\SiClnLab\Main_app\Admin\admin.php"><button class="btn btn-warning" id="eliminar">Cancelar</button></a>

        </div>
  </form> 


                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>