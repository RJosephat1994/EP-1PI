<?php
include_once("../controllers/ProductsPedController.php");
session_start();

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
  <body onload="mostarcarro()">
    <!-- header -->


    <header>
      <nav class="navbar navbar-inverse fixed-top">
        <div class="container-fluid">
          <div class="navbar-header" id="barra" >

            <a  class="navbar-brand" href="../index.php" >LA PIZZA LOCA</a>
							<br>
						<div class="">

<a href="../index.php" >Regresar</a> &nbsp &nbsp &nbsp&nbsp
              <a href="Terminar.php" >Terminar Pedido</a>
              &nbsp &nbsp &nbsp &nbsp
              <a  href="carrito.php" >Mi carrito</a>
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
    <!-- FORMULARIO PARA INGRESAR PRODUCTOS -->


    </div>

		<div class="front absolute card3 " style="color:white; text-align:center">
      <?php $suma=0;?>
      <table class="table table-bordered"  style="color:white;">
        <tr>
          <th>
              Nombre
          </th>
          <th>
            Precio
          </th>
          <th>
              Cantidad

          </th>
          <th>
              Subtotal
          </th>
        </tr>

        <?php  $i=0;
         foreach ($pro as $pr){

        # code...

          ?>

        <tr>

        <td>

      <?php
        echo ($pr['nombre']);

        ?>

        </td>
        <td><?php
      echo("$".$pr['precio'].".00");

      ?>
        </td>


      <td>
<?php echo ("$listanorm[$i]");

?>

      </td>

      <td>
<?php
      echo($pr['precio']*$listanorm[$i]);
        $suma=$suma+$pr['precio']*$listanorm[$i];
?>
      </td>

  <?php $i=$i+1;  }?>


      </tr>

      </table>
<h2><?php echo("TOTAL: $".$suma.".00");?></h2>
<a href="pdf.php" type="button">Generar PDF</a>
		</div>

    <!-- container -->


    <!-- Trigger the modal with a button -->






  </body>
</html>
