<?php
class Product
{
	private $id;
	private $Nombre;
	private $Descripcion;
	private $Precio;
	private $Categoria_id;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}