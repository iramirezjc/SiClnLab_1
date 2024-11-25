<?php 
  session_start();
  if (isset($_SESSION['usuario'])) {

    if ($_SESSION['usuario']['fk_nivel_usuar'] == '1') {
    
    header('Location: Main_app/Admin/admin.php');
  }else if($_SESSION['usuario']['fk_nivel_usuar'] == '2'){
    header('Location: Main_app/Usuario/usuario.php');

  }
  }
 ?>


<!DOCTYPE html>
<html lang="es">
<style type="text/css">
  

</style>

  <head>
    <meta charset="utf-8">
    <title >SiCInLab</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" type="image/png" href="img/icono.png" />
  </head>
  <body  >
   <img src="img/logo.png"  style="top:0%; position:  fixed;left: 30%; width: 40%; "/>
    <div class="error">
      <span>Datos de ingreso no válidos, inténtelo de nuevo  por favor</span>
    </div>
    <div class="main" >
   
     <form action="" id="formLg" >
     
     <p><b><h1>SiCInLab</h1></b></p>
        <input type="text" name="usuariolg"  placeholder="Matricula"  required>
        <input type="password" name="passlg"  placeholder="Contraseña" required>
        <input type="submit" class="botonlg"  value="Iniciar sesion" >
     </form>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
