<?php
require_once('Database.php');
class Product {
	public $name;
	public $price;
	public $category;
	public $description;

	public function __construct($name, $price, $category, $description) {
      $this->name = $name;
			$this->price = $price;
	    $this->category = $category;
	    $this->description = $description;
  }
	//mysqli->insert_id
	// return rows


public function save(){

$db = new Database();
$sql="INSERT INTO producto (nombre,precio,categoria_id,descripcion) VALUES('".$this->name."',$this->price,$this->category,'".$this->description."')";
				$db->query($sql);

				$lastid=(int )$db->mysqli->insert_id;

				echo $lastid;
				$db->close();
}


static function ultimo(){

$db = new Database();
$sql="SELECT max(id) from pedido; ";
				$db->query($sql);

				$lastid=(int )$db->mysqli->insert_id;
				if($rows=$db->query($sql)){

return $rows;

				}return false;
}

static function get(){

$sql="SELECT * FROM
			producto";
			$db= new Database();
				$db->query($sql);

				if($rows=$db->query($sql)){

return $rows;

				}return false;
}

static function getPizzas(){

$sql="SELECT * FROM
			producto where categoria_id=1";
			$db= new Database();
				$db->query($sql);

				if($rows=$db->query($sql)){

return $rows;

				}return false;
}
}
