<?php
	require_once("../controllers/PedidoController.php");

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
    <link rel="stylesheet" href="../assets/css/style.css">
  </head>
  <body>
    <!-- header -->
    <header>
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Link</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>
    <div class="video-container">
      <video class="video" src="../public/video.mp4" autoplay loop="">
      </video>
    </div>
	<div clas="front absolute card col-xs-12">

	</div>

    <!-- FORMULARIO PARA INGRESAR PRODUCTOS -->
    <br><br><br><br>
    <div class="video-container ">
      <div class="front absolute card col-xs-5">

        <h2 class ="white-text">Haz tu Pedido</h2>
        <input type="button" class="form-control" id="crearpedido" value="Presiona para Realizar tu pedido">

        <div class="container col-xs-12" style="visibility:hidden;"id="cajita">
          <p style="color:white;"> selecciona tu producto</p>
  <select class="form-control" name="producto" >

    <?php
      foreach ($productos as $producto) {
      ?>
      <option value=""><?php echo $producto['nombre']; ?></option>
      <?php }
    ?>

  </select>
  <p style="color:white;"> cantidad</p>
   <input type="number" name="cantidad" class="form-control" value="">
   <br>
        <input type="button" name="" class="form-control" value=" Guardar en el carrito">

        </div>

      </div>
    </div>

    <!-- container -->
    <script src="../assets/js/Pedido.js" charset="utf-8"></script>
    <script type="text/javascript">
guardar= document.querySelector("#asf");
try {
  guardar.addEventListener('click',function(){

    let nombre = document.querySelector("#nombre");
    let precio = document.querySelector("#precio");
    let categoria = document.querySelector("#categoria");
    let descripcion = document.querySelector("#descripcion");



    let producto = new Producto(nombre.value,precio.value,categoria.value,descripcion.value);
    let listaproductos = new Array();
    listaproductos.push(producto);
    let arregloJSON = JSON.stringify(listaproductos);
    console.log(arregloJSON);
    $.ajax({
      method: "POST",
      url: "../controllers/ProductsController.php",
      data: { productos: arregloJSON, funcion: "insertarProductos" }
    })
    .done(function() {
       console.log( "Datos guardados ");
     });
  });

} catch (e) {

} finally {

}


    </script>
<script type="text/javascript">
let   btn=document.querySelector("#crearpedido");
btn.addEventListener('click', function(){
  let cajita= document.querySelector("#cajita");
      cajita.style.visibility="visible";
});

</script>
  </body>
</html>
