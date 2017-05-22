<?php

if( isset($_POST['funcion']) ) {
  include_once("../models/Product.php");
	echo 'Hola AJAX '.$_POST['funcion'];
	$productos= json_decode($_POST['productos']);


foreach ($productos as $item) {



$producto= new Product($item->_nombre,$item->_precio,$item->_categoria,$item->_descripcion);
	//$producto->save();

	var_dump($list);
}

} else {
	include_once("models/Product.php");
$productos= Product::get();
}
