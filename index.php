<?php
	include_once("controllers/ProductsController.php");
	$products = new ProductController();
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pizza</title>
    <!-- Latest compiled and minified CSS -->

    <!-- Optional theme -->
   <link rel="stylesheet" href="Assets/bootstrap/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- my css file -->
    <link rel="stylesheet" href="./Assets/css/style.css">
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
      <video class="video" src="./Public/video.mp4" autoplay loop="">
      </video>
    </div>
    <!-- FORMULARIO PARA INGRESAR PRODUCTOS -->
    <div class="video-container vertical-center">
      <div class="front absolute card col-xs-12">
        <h2 class ="white-text">Registrar nuevo producto</h2>
        <input type="text" class="form-control" id="nombre" value="" placeholder="Escribe el nombre del producto "><br>
        <input type="number" class="form-control" id="precio" value="" placeholder="Escribe el precio del producto "><br>
        <input type="text" class="form-control" id="categoria" value="" placeholder="Escribe el categoría del producto "><br>
        <button type="button" class="form-control" id="guardar">Guardar producto</button>
      </div>
    </div>

    <!-- container -->
    <script src="./Assets/js/script.js" charset="utf-8"></script>
    <script type="text/javascript">
      let guardar = document.querySelector("#guardar");
      guardar.addEventListener('click',function(){
        let nombre = document.querySelector("#nombre");
        let precio = document.querySelector("#precio");
        let categoria = document.querySelector("#categoria");



        let producto = new Producto(nombre.value,precio.value,categoria.value);
				let listaproductos= new Array();
				listaproductos.push(producto);
				listaproductos.push(producto);
				let arregloJSON=JSON.stringify(listaproductos);

	      console.log(arregloJSON);


				$.ajax({
				  method: "POST",
				  url: "controllers/ProductsController.php",
				  data: { productos: arregloJSON,  function: "insertarProductos" }
				})
				  .done(function( msg ) {
				   console.log("Datos guardados");
				  });


      });

    </script>

		<?php
			$products->index();
		?>

<script type="text/javascript" src="./Assets/js/jquery.js">

</script>
  </body>
</html>
