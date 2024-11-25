<!DOCTYPE html>
<html>
<head>
  <title>Compras</title>
  <meta charset="utf-8">
  <meta name="viewport" content="with=device-with, initial-scale=1" ><!---tamaño-->
  
  <link rel="stylesheet" href="dist/css/bootstrap.min.css">
  <script src="dist/js/jquery.min.js"></script>
  <script src="dist/js/bootstrap.min.js"></script>
  <script src="dist/js/popper.min.js"></script>
  <style type="text/css">
    .compras {
      margin-top: 2%;
      margin-left: 15%;
      max-height: 100px;
      max-width: 400px
    }
    .btncompras {
      margin-top: -3%;
      max-width: 200px;
      margin-left: 80%
    }
    a {
      text-decoration: none;
      font-size: 14px;
      display: inline-block;
      padding: 1px;
      width: 120px;
      border: solid;
      border-radius: 10px;
      color: #000000;
    }
  </style>
</head>
<body>
  <div class="compras">
    <h1>Compras</h1>
  </div>
  <div class="btncompras">
    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ Nueva Compra</button>
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 for="psw"><span class="glyphicon glyphicon-shopping-cart"></span>Categorias</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4><span class="glyphicon glyphicon-lock"></span></h4>
            </div>
            <div class="modal-body">
              <form role="form">
              <div class="form-group text-center">
                <br>
                <a href="http://localhost/compras_actual2/AltaMobiliario.php"/>Nuevo Mobiliario</a>
                <br><br>
                <a href="http://localhost/compras_actual2/AltaReactivos.php"/>Nuevo Reactivo</a>
                <br><br>
                <a href="http://localhost/compras_actual2/AltaMateriales.php"/>Nuevo Material</a>
                <br><br>
                <a href="http://localhost/compras_actual2/altaequipos.php"/>Nuevo Equipo</a>
                <br><br>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
                  <span class="glyphicon glyphicon-remove">
                  </span> Cancelar
                </button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-------------------------FORMULARIO-------------------->
<form name="form1" action="detalles_compras.php" method="post">
  <div style="background-color: #ECF0F1; text-align: center; margin-top: 2%" >
    <br>
    <table width="100%">
      <tr>
        <th>No. de Compra:</th>
        <th>Categoria:</th>
        <th>Objeto:</th>
        <th>Cantidad:</th>
        <th width="300"></th>
      </tr>
      <tr>
        <th><?/*php echo $compras*/?></th>
        <th>
          <select name="categoria"id="categoria" onChange="document.form1.action='detalles_compras.php'; document.form1.submit();">
            <option value="0">Selecionar</option>
            <?php/* 
            echo @$_POST['categoria'];
            include("conexion.php");
            $sql="select * FROM categ";
            $resultado= $mysqli->query($sql);
            while($registros=$resultado-> fetch_assoc()){
              $sel="";
              if(@$_POST['categoria']==$registros['id_categ']){ $sel=" selected ";
              }else{ $sel="";
              } 
            echo(" <option value='".$registros['id_categ']."' ".$sel." >".$registros['nombr']."</option>");
            }
            */?>
          </select>
        </th>
        <th>
          <select name="objeto" id="objeto">
            <option selected value="0">Seleccionar</option>
            <?php 
              if(@$_POST['categoria']==1){//Para equipos
                $sql="select id_equip,nombr_equip from equip";
                $resultado=$mysqli->query($sql);
                  while($registros=$resultado->fetch_assoc()){
                    echo("<option value='".$registros['id_equip']."'>".$registros['nombr_equip']."</option>");
                  }
              } else if(@$_POST['categoria']==2){// materiales 
                  $sql="select id_mater,nombr from mater";
                  $resultado=$mysqli->query($sql);
                  while($registros=$resultado->fetch_assoc()){
                    echo("<option value='".$registros['id_mater']."'>".$registros['nombr']."</option>");
                  }
              } else if(@$_POST['categoria']==3){// mobiliarios
                  $sql="select id_mobil,nombr from mobil";
                  $resultado=$mysqli->query($sql);
                  while($registros=$resultado->fetch_assoc()){
                    echo("<option value='".$registros['id_mobil']."'>".$registros['nombr']."</option>");
                  }
              } else if(@$_POST['categoria']==4){// reactivos
                  $sql="select id_react,nombr from react";
                  $resultado=$mysqli->query($sql);
                    while($registros=$resultado->fetch_assoc()){
                    echo("<option value='".$registros['id_react']."'>".$registros['nombr']."</option>");
                  }
              }
            ?>
          </select>
        </th>
        <th>
          <input type="hidden" id="fk_compr" name="fk_compr"
            <?php /*
              $sql2="SELECT MAX(id_compr) as id_compr FROM compr";
              $id_compr_res=$mysqli->query($sql2);
              $id_compr=$id_compr_res->fetch_assoc();
              echo(" value='".$id_compr['id_compr']."'")*/
            ?>
          />
          <input type="number" name="cantidad" id="cantidad" />
        </th>
        <th>
          <input  type="submit" value="Agregar" class="btn btn-primary">
        </th>
      </tr>
    </table>
    <br>
  </div>
  <div style="margin-left: 80%">
    <br>
    <a style="border: none" class="finalizar" href="/compras_actual2/inicio_compras.php">
      <input type="button" id="eliminar" value="Finalizar Compras"/>
    </a>
  </div>
</form>
<br>
<!-------------------------------------insertar ----->
<?php
  if(@$_POST['categoria']&&@$_POST['objeto']&&@$_POST['fk_compr']&&@$_POST['cantidad']){
    $insert="insert into detall_compr (id_detall_compr, cant,fk_compr,fk_categ,fk_objeto_id) values (NULL,".$_POST['cantidad'].
    ",".$_POST['fk_compr'].",".$_POST['categoria'].",".$_POST['objeto'].")";
    $registrar=$mysqli->query($insert);
  } 
/*---------------------- Suma de las cantidades-------------*/
  if(@$_POST['categoria']==1){
        $sql2="UPDATE equip SET canti_equip = canti_equip+".$_POST['cantidad']." WHERE id_equip = ".$_POST['objeto'];
                 $resultado = $mysqli->query($sql2);
  }else if(@$_POST['categoria']==2){
        $sql2="UPDATE mater SET canti = canti+".$_POST['cantidad']." WHERE id_mater = ".$_POST['objeto'];
                 $resultado = $mysqli->query($sql2);
    }else if(@$_POST['categoria']==3){
        $sql2="UPDATE mobil SET canti = canti+".$_POST['cantidad']." WHERE id_mobil = ".$_POST['objeto'];
                 $resultado = $mysqli->query($sql2);
      }else if(@$_POST['categoria']==4){
        $sql2="UPDATE react SET cant = cant+".$_POST['cantidad']." WHERE id_react = ".$_POST['objeto'];
                 $resultado = $mysqli->query($sql2);
      }
?>
<!-------------------------------TABLA FINAL------------------------->
<div style="text-align: center">
  <table class=" table table-bordered">
    <thead>
      <tr>
        <th>Categoria</th>
        <th>Objeto</th>
        <th>Cantidad</th>
      </tr>
    </thead>
  <?php/*
      $query = "select * from detall_compr where fk_compr='$compras'";
      $resultado = $mysqli->query($query);

    while ($row2 = $resultado-> fetch_assoc()) {
      $sql1="select nombr from categ where id_categ=".$row2['fk_categ'];
      $dato1=$mysqli->query($sql1);
      $cate=$dato1->fetch_assoc();
      $categoria=$cate['nombr'];
      $cant_=$row2['cant'];    
      switch ($row2['fk_categ']) {
        case 1:
          $sql2="select nombr_equip from equip where id_equip=".$row2['fk_objeto_id'];
          $dato2=$mysqli->query($sql2);
          $objeto=$dato2->fetch_assoc();
          $bjt=$objeto['nombr_equip'];
          break;
        case 2:
          $sql2="select nombr from mater where id_mater=".$row2['fk_objeto_id'];
          $dato2=$mysqli->query($sql2);
          $objeto=$dato2->fetch_assoc();
          $bjt=$objeto['nombr'];
          break;
        case 3:
          $sql2="select nombr from mobil where id_mobil=".$row2['fk_objeto_id'];
          $dato2=$mysqli->query($sql2);
          $objeto=$dato2->fetch_assoc();
          $bjt=$objeto['nombr'];
          break;
        case 4:
          $sql2="select nombr from react where id_react=".$row2['fk_objeto_id'];
          $dato2=$mysqli->query($sql2);
          $objeto=$dato2->fetch_assoc();
          $bjt=$objeto['nombr'];
          break;
      }
     echo '
      <tbody>
        <tr>
          <td>'.$categoria.' </td>
          <td>'.$bjt.'</td>
          <td>'.$cant_.' </td>
        </tr>       
      </tbody>
        ';
    }*/
  ?>
  </table>
</div>
</body>
</html>