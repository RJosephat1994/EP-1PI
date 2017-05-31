<?php
if (isset($_POST['funcion'])){
  include_once("../models/Pedido.php");
  include_once("../models/ProductoPedidos.php");



if($_POST['funcion']=='insertar'){
  $id=1;
  $prod= Pedido::ultimo();
  var_dump($prod);
  foreach ($prod as $k) {
    $id=$k['max(id)'];
  }

  $prodpedi= json_decode($_POST['pedidos']);


foreach ($prodpedi as $pr) {
$item= new  ProductoPedidoModel($id,$pr->_producto_id,$pr->_cantidad);
$item->save();
}
}
if($_POST['funcion']=='mostrarCarrito'){
  $id=1;
  $prod= Pedido::ultimo();
  var_dump($prod);
  foreach ($prod as $k) {
    $id=$k['max(id)'];
  }


$lista= ProductoPedidoModel::getProd($id);



}
$id=1;
$prod= Pedido::ultimo();
var_dump($prod);
foreach ($prod as $k) {
  $id=$k['max(id)'];
}


$lista= ProductoPedidoModel::getProd($id);




}
include_once("../models/Pedido.php");
include_once("../models/ProductoPedidos.php");



$id=1;
$prod= Pedido::ultimo();

foreach ($prod as $k) {
  $id=$k['max(id)'];
}
$listanorm=array();
$lista= ProductoPedidoModel::getProd($id);
$pro= array();
foreach ($lista as $prod) {
array_push($listanorm,$prod['cantidad']);


$p= ProductoPedidoModel::getproducto($prod['producto_id']);
foreach ($p as $key ) {

array_push($pro,$key);
}


}

?>
