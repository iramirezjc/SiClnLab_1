<?php
  session_start();
  if (isset($_SESSION['usuario'])) {

       if ($_SESSION['usuario']['fk_nivel_usuar'] != '2') {
          
            header('Location: ../Usuario/usuario.php');
          
       }
  }else{

    header('Location: ../../');


  }
    $nombr_usuar=$_SESSION['usuario']['user_name'];
  $matri_usuar=$_SESSION['usuario']['id_matri'];
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SiCInlab</title>
  <link rel="stylesheet" href="\SiClnLab\css\codeLob\bootstrap.min.css">
      <script src="\SiClnLab\css\codeLob\jquery.min.js"></script>
      <script src="\SiClnLab\css\codeLob\bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="SiCInLab\type\icons.css"/>
  </head>
  <body>
    <center>
    <h1>¡Bienvenido  <?php echo($_SESSION['usuario']['user_name']);?> !</h1>
  </center>
     <a href="/SiClnLab/Main_app/salir.php"><button class="btn btn-danger" id="eliminar">CERRAR SESIÓN</button></a> 
     <img src="\SiClnLab\img\fondo1.png"  style="top:0%; position:  fixed;height: 750px; width: 925px; "/>
     
    <?php include("Opciones.html");?>
      
    
  </body>
</html>
