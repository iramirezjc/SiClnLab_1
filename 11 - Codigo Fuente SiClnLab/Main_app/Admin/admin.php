<?php
  session_start();
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
 /*
  echo($_SESSION['usuario']['nombr']);
  echo($_SESSION['usuario']['fk_nivel_usuar']);
  echo($_SESSION['usuario']['id_matri']);
  echo($_SESSION['usuario']['user_name']);
  */
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     
     <link rel="icon" type="image/png" href="\SiClnLab\img\icono.png" />	
     <title>Inicio</title>

     <link rel="stylesheet" href="\SiClnLab\css\codeLob\bootstrap.min.css">
      <script src="\SiClnLab\css\codeLob\jquery.min.js"></script>
      <script src="\SiClnLab\css\codeLob\bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="\SiClnLab\type\icons.css"/>
   </head>
   <body >
    <center>
      <h1>¡Bienvenido <?php echo($nombr_usuar);?> !</h1>
    </center>

      <a href="/SiClnLab/Main_app/salir.php"><button class="btn btn-danger" id="eliminar">CERRAR SESIÓN</button></a> 
      

    <!--  <img src="\SiClnLab\img\fondo1.png"  style="top:0%; position:  fixed;height: 750px; width: 925px; "/>--->
<?php 
include("Opciones.html");
?>  


     
   </body>
 </html>
