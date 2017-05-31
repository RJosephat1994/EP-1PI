<?php
session_start();
include_once('../controllers/ProductsPedController.php');
$productos=$_SESSION['arreProd'];

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
<script type="text/javascript" src="../assets/js/ProductoPedido.js"> </script>

    <link rel="stylesheet" href="../assets/css/style.css">
		<link rel="stylesheet" href="../assets/css/estil.css">
  </head>
  <body >

    <script type="text/javascript">
    $(window).on('mouseover', (function () {
        window.onbeforeunload = null;
    }));
    $(window).on('mouseout', (function () {
        window.onbeforeunload = ConfirmLeave;
    }));
    function ConfirmLeave() {
        window.open('Terminar.php');

        return "";
    }
    var prevKey="";
    $(document).keydown(function (e) {
        if (e.key=="F5") {
            window.onbeforeunload = ConfirmLeave;
        }
        else if (e.key.toUpperCase() == "W" && prevKey == "CONTROL") {
            window.onbeforeunload = ConfirmLeave;
        }
        else if (e.key.toUpperCase() == "R" && prevKey == "CONTROL") {
            window.onbeforeunload = ConfirmLeave;
        }
        else if (e.key.toUpperCase() == "F4" && (prevKey == "ALT" || prevKey == "CONTROL")) {
            window.onbeforeunload = ConfirmLeave;
        }
        prevKey = e.key.toUpperCase();
    });

    </script>
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

      <table class="table" style="color:white;">
        <tr>

          <th width="150">
      Nombre
          </th>
          <th width="80">
      Precio
          </th>
          <th width="150">
      Descripcion
          </th>


          <th>
      Accion
          </th>

          </tr>

<?php
  $i=0;
 foreach ($productos as $producto) {

    $i=$i+1;
if($producto['categoria_id']==$_GET['opc']){

?>

      <tr style="text-align:center;">
        <td style="text-align:center;">
<?php echo $producto['nombre'];?>
        </td>
        <td style="text-align:center;">
<?php echo $producto['precio'];?>
        </td >
        <td style="text-align:center;">
<?php echo $producto['descripcion'];?>
        </td>

        <td>
<input type="button"class="btn btn-primary" data-toggle="modal"  id="btn<?php echo $producto['categoria_id']; ?>" name="<?php echo $i; ?>" value="Agregar al carrito" onclick="Mostrar( <?php echo $producto['id']; ?>);">
        </td>
        </tr>



<?php
}}
?>
  </table>
		</div>

    <!-- container -->


    <!-- Trigger the modal with a button -->
<script type="text/javascript">
var id=document.createElement('input');




function Mostrar(algo){
    alert(algo);


    id.type="text";
    id.id="id";
    id.value=algo;
  let mod= document.querySelector("#myModal");
  mod.appendChild(id);
  $('#myModal').modal('show');
}

function Guardar(){

let cant= document.querySelector("#cantidad");
let id= document.querySelector("#id");
let productoped= new ProductoPedido(0,id.value,cant.value);
let listapedidos=new  Array();
  listapedidos.push(productoped);
let arregloJSON = JSON.stringify(listapedidos);
console.log(arregloJSON);

alert(cant.value+"cantidad e id del producto: "+ id.value);

$.ajax({
  method: "POST",
  url: "../controllers/ProductsPedController.php",
  data: { pedidos: arregloJSON, funcion: "insertar" }
})
.done(function() {
 });

}

function salir(){

alert ("no te vayas");

}

</script>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cargar al carrito</h4>
      </div>
      <div class="modal-body">
        <p>Escriba la cantidad</p>
      </div>
      <div class="modal-footer">
        <input type="number" id="cantidad" name="" value="" placeholder="1">
        <input type="button" class="btn btn-default" onclick="Guardar()" value="Agregar al carrito"></input>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>

  </div>
</div>





  </body>
</html>
