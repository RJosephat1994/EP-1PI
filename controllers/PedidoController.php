<?php
session_start();
	if( isset($_POST['funcion']) ) {
	 include_once("../models/Pedido.php");
	  include_once("../models/Cliente.php");

		echo 'Hola AJAX '.$_POST['funcion'];
		$pedidos= json_decode($_POST['pedidos']);

$info= array();
	foreach ($pedidos as $item) {


echo($item->_nombre);

echo($item->_direccion);
echo($item->_telefono);
echo($item->_fecha);


	array_push($info, $item->_nombre);
	array_push($info, $item->_direccion);
	array_push($info, $item->_telefono);
	array_push($info, $item->_fecha);

	$Guard=new Cliente($item->_nombre,$item->_direccion,$item->_telefono);
	$Guard->save();
	$pedido= new Pedido($item->_fecha, $GLOBALS['lastid'], $item->_direccion,$item->_telefono);

		$pedido->save();

	$_SESSION['iniciada']=true;
	$_SESSION['pedido']=$pedido;
	$_SESSION['nombre']=$item->_nombre;
	$_SESSION['direccion']=$item->_direccion;
	$_SESSION['telefono']=$item->_telefono;



	}

}?>
