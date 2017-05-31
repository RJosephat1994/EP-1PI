<?php
require_once('Database.php');
class Pedido {
	public $date;
	public $name;
	public $address;
public $phone;
	public $estate;


	public function __construct($date, $name, $address,$phone) {
      $this->date = $date;
			$this->name = $name;
			$this->address=$address;
			$this->phone=$phone;
	    $this->estate = false;

  }
	//mysqli->insert_id
	// return rows


public function save(){

$db = new Database();
$sql="INSERT INTO pedido (fecha,cliente_id,estado) VALUES(now(),$this->name,'pendiente')";
				$db->query($sql);

				$lastid=(int )$db->mysqli->insert_id;

				echo $lastid;
				$db->close();


}
static function ultimo(){

$db = new Database();
$sql="SELECT max(id) from pedido as id; ";
				$db->query($sql);

				$lastid=(int )$db->mysqli->insert_id;
				if($rows=$db->query($sql)){

return $rows;

				}return false;
}
static function get(){

$sql="SELECT * FROM
			pedido";
			$db= new Database();
				$db->query($sql);

				if($rows=$db->query($sql)){

return $rows;

				}return false;
}}
