<?php
require_once '../controllers/control.php';
require_once '../models/modelp.php';

// Logica
$alm = new product();
$model = new ProductModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
       $alm->__SET('id',              $_REQUEST['id']);
       $alm->__SET('Nombre',          $_REQUEST['Nombre']);
       $alm->__SET('Descripcion',        $_REQUEST['Descripcion']);
       $alm->__SET('Precio',            $_REQUEST['Precio']);
       $alm->__SET('Categoria_id', $_REQUEST['Categoria_id']);

       $model->Actualizar($alm);
       header('Location: product.php');
       break;

       case 'registrar':
       $alm->__SET('Nombre',          $_REQUEST['Nombre']);
       $alm->__SET('Descripcion',        $_REQUEST['Descripcion']);
       $alm->__SET('Precio',            $_REQUEST['Precio']);
       $alm->__SET('Categoria_id', $_REQUEST['Categoria_id']);

       $model->Registrar($alm);
       header('Location: product.php');
       break;

       case 'eliminar':
       $model->Eliminar($_REQUEST['id']);
       header('Location: product.php');
       break;

       case 'editar':
       $alm = $model->Obtener($_REQUEST['id']);
       break;
   }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pizza</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- my css file -->
<script type="text/javascript" src="../assets/js/ProductoPedido.js"> </script>

    <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/estil.css">
  </head>
  <body >
  <header>
      <nav class="navbar navbar-inverse fixed-top">
        <div class="container-fluid">
          <div class="navbar-header" id="barra" >

            <a  class="navbar-brand" href="../index.php" >LA PIZZA LOCA</a>
                            <br>
                        <div class="">

<a href="../index.php" >Regresar</a> &nbsp &nbsp &nbsp&nbsp
              
<input type="text" style="visibility:hidden" id="opc" name="" value="0">
                        </div>

          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->

        </div><!-- /.container-fluid -->
      </nav>
    </header>
      <div class="video-container" >
      <video class="video" src="../public/video.mp4" autoplay loop="">
      </video>
    </div>
    <div clas="front absolute card col-xs-12">

    </div>
  <div class="video-container" >
       <div clas="front absolute card col-xs-12">

            <form action="?action=<?php echo $alm->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="front " style="color:black; text-align:center" style="margin-bottom:30px; ">
                <input type="hidden" name="id" value="<?php echo $alm->__GET('id'); ?>" />

                <table style="width:500px;">
                    <tr>
                        <th style="color:white; text-align:left;">Nombre</th>
                        <td><input type="text" name="Nombre" value="<?php echo $alm->__GET('Nombre'); ?>" style="width:100%;" /></td>
                    </tr>
                    <tr>
                        <th style="color:white; text-align:left;">Descripcion</th>
                        <td><input type="text" name="Descripcion" value="<?php echo $alm->__GET('Descripcion'); ?>" style="width:100%;" /></td>
                    </tr>
                    <tr>
                        <th style="color:white; text-align:left;">Precio</th>  
                        <td><input type="text" name="Precio" value="<?php echo $alm->__GET('Precio'); ?>" style="width:100%;" /></td>

                    </tr>
                    <tr>
                        <th style="color:white; text-align:left;">categoria</th>
                        <td><input type="text" name="Categoria_id" value="<?php echo $alm->__GET('Categoria_id'); ?>" style="width:100%;" /></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </td>
                    </tr>
                </table>
            </form>
            <div class="front absolute card3 " style="color:white; text-align:center">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <th style="text-align:left;">Descripcion</th>
                            <th style="text-align:left;">Precio</th>
                            <th style="text-align:left;">categoria</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('Nombre'); ?></td>
                            <td><?php echo $r->__GET('Descripcion'); ?></td>
                            <td><?php echo $r->__GET('Precio') ; ?></td>
                            <td><?php echo $r->__GET('Categoria_id'); ?></td>
                            <td>
                                <a href="?action=editar&id=<?php echo $r->id; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table> 
            </div>
        </div>
    </div>

</body>
</html>