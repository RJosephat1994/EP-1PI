<?php
session_start();
  include_once("../controllers/ProductsController.php");
  include_once("../controllers/Catego.php");
$_SESSION['arreProd']=$productos;




$saldo=0;
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
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/estil.css">
  </head>
  <body >
    <!-- header -->
    <header>
      <nav class="navbar navbar-inverse fixed-top">
        <div class="container-fluid">
          <div class="navbar-header" id="barra" >
            <a  class="navbar-brand" href="index.php" >LA PIZZA LOCA</a>
              <br>
            <div class="">
              <a href="#" id="info" style="visibility:hidden;"> Mi informacion</a>
              <a href="#" id="Pedido"  style="visibility:hidden;"> Mi pedido</a>
<input type="text" style="visibility:hidden" id="opc" name="" value="0">
            </div>

          </div>
          <div>
             <ul class="nav navbar-nav navbar-right">
          <li><a href="views/product.php" class="btn btn-link" >Administrador</a></li>
         
        </ul>
      </div>

          <!-- Collect the nav links, forms, and other content for toggling -->

        </div><!-- /.container-fluid -->
      </nav>
    </header>
    <div class="video-container" >
      <video class="video" src="./public/video.mp4" autoplay loop="">
      </video>
    </div>


  <div clas="front absolute card col-xs-12">

  </div>
    <!-- FORMULARIO PARA INGRESAR PRODUCTOS -->
<?php
    if(isset($_SESSION['iniciada'])){

?>
<div class="video-container vertical-center" id="cajaPrinc">
      <div class="front absolute card2 col-xs-8" id="tablaPedidos" style="visibility:visible;">

        <h2 class ="white-text"> Elije una categoria</h2>


        <ul class="caption-style-1">

        <li>
          <a href="views/Categorias.php?opc=1" id="pizzascate">
            <img src="public/pizza.png" alt=""width="250" height="250">
            <div class="caption">
              <div class="blur"></div>
              <div class="caption-text">
                <h1>Pizzas </h1>
                <p>Variedad de especialidades</p>
              </div>
            </div>
          </a>

        </li>
        <li>
          <a href="views/Categorias.php?opc=2" id="hamcate">
          <img src="public/hamburguesa.png" alt=""width="250" height="250">
          <div class="caption">
            <div class="blur"></div>
            <div class="caption-text">
              <h1>Hamburguesas  </h1>
              <p>Conoce La megaHam!</p>
            </div>
          </div>
        </a>
        </li>
        <li>
          <a href="views/Categorias.php?opc=4" id="bebidascate">
          <img src="public/bebidas.png" alt=""width="250" height="250">
          <div class="caption">
            <div class="blur"></div>
            <div class="caption-text">
              <h1>Bebidas  </h1>
              <p>Refrescánte!</p>
            </div>
          </div>
        </a>
        </li>
        <li>
          <a href="views/Categorias.php?opc=3" id="postrescate">
          <img src="public/postre.png" alt=""width="250" height="250">
          <div class="caption">
            <div class="blur"></div>
            <div class="caption-text">
              <h1>Postres </h1>
              <p>Un toque de dulce</p>
            </div>
          </div>
        </a>
        </li>
      </ul>

      </div>
    </div>
<?php

    }else{


?>



    <div class="video-container vertical-center" id="cajaPrinc">
      <div class="front absolute card col-xs-12" id="cajaRegPed">


        <h2 class ="white-text">La Pizza-Loca</h2>
        <input type="text" class="form-control" id="nombre" value="" placeholder="Ingresa tu nombre"><br>
        <input type="text" class="form-control" id="direccion" value="" placeholder="Escribe Tu dirección "><br>
    <p style="color:white;">Ingresa tu telefono</p>
          <input type="number" class="form-control" id="telefono" value="" placeholder="777- "><br>
      <br>

        <button type="button" class="form-control" id="guardar">Comenzar Pedido :)</button>

      </div>
      <?php
    }
        $_SESSION['iniciada']=true;


    ?>

<!-- Tabla de pedidos-->
      <div class="front absolute card2 col-xs-8" id="tablaPedidos" style="visibility:hidden;">

        <h2 class ="white-text"><?php if(isset($_SESSION['info'])){  $cliente= $_SESSION['info']; echo $cliente[0]."hola"; } ?> Elije una categoria</h2>


        <ul class="caption-style-1">

        <li>
          <a href="views/Categorias.php?opc=1" id="pizzascate">
            <img src="public/pizza.png" alt=""width="250" height="250">
            <div class="caption">
              <div class="blur"></div>
              <div class="caption-text">
                <h1>Pizzas </h1>
                <p>Variedad de especialidades</p>
              </div>
            </div>
          </a>

        </li>
        <li>
          <a href="views/Categorias.php?opc=2" id="hamcate">
          <img src="public/hamburguesa.png" alt=""width="250" height="250">
          <div class="caption">
            <div class="blur"></div>
            <div class="caption-text">
              <h1>Hamburguesas  </h1>
              <p>Conoce La megaHam!</p>
            </div>
          </div>
        </a>
        </li>
        <li>
          <a href="views/Categorias.php?opc=4" id="bebidascate">
          <img src="public/bebidas.png" alt=""width="250" height="250">
          <div class="caption">
            <div class="blur"></div>
            <div class="caption-text">
              <h1>Bebidas  </h1>
              <p>Refrescánte!</p>
            </div>
          </div>
        </a>
        </li>
        <li>
          <a href="views/Categorias.php?opc=3" id="postrescate">
          <img src="public/postre.png" alt=""width="250" height="250">
          <div class="caption">
            <div class="blur"></div>
            <div class="caption-text">
              <h1>Postres </h1>
              <p>Un toque de dulce</p>
            </div>
          </div>
        </a>
        </li>
</ul>

      </div>




    </div>



    <!-- container -->
    <script src="./assets/js/Pedido.js" charset="utf-8"></script>
    <script type="text/javascript">
      let guardar = document.querySelector("#guardar");
      guardar.addEventListener('click',function(){
        let nombre = document.querySelector("#nombre");
        let direccion = document.querySelector("#direccion");
        let telefono= document.querySelector('#telefono');
        let hoy= new Date().toJSON().slice(0,10);


        let pedido = new Pedido(nombre.value,direccion.value,telefono.value,hoy);
        let listapedidos= new Array();
        listapedidos.push(pedido);
        let arregloJSON = JSON.stringify(listapedidos);
        console.log(arregloJSON);
        $.ajax({
          method: "POST",
          url: "controllers/PedidoController.php",
          data: { pedidos: arregloJSON, funcion: "insertarProductos" }
        })
        .done(function() {
            alert(" ya ha iniciado un pedido nuevo");
            let barra= document.querySelector("#barra");
            let saldo= document.createElement('input');
            saldo.type='button';
            saldo.id="saldo";
            saldo.class="btn-primary";
            saldo.disabled=true;
            saldo.value="El saldo de tu pedido es:$0";
            barra.appendChild(saldo);
            let caja1= document.querySelector("#cajaPrinc");
            let caja2= document.querySelector("#cajaRegPed");
            caja1.removeChild(caja2);
          let menu2= document.querySelector("#tablaPedidos");
          menu2.style.visibility="visible";


         });
      });


    </script>
  </body>
</html>
