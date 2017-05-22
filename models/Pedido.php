<?php
require_once('Database.php');
class Pedido {
	public $date;
	public $client;
	public $estate;


	public function __construct($date, $client, $estate) {
      $this->date = $date;
			$this->client = $client;
	    $this->estate = $estate;

  }
	//mysqli->insert_id
	// return rows


public function save(){

$db = new Database();
$sql="INSERT INTO pedido (fecha,cliente_id,estado) VALUES('".$this->date."',$this->client,$this->estate)";
				$db->query($sql);

				$lastid=(int )$db->mysqli->insert_id;
				echo $lastid;
				$db->close();
}

static function get(){

$sql="SELECT * FROM
			pedido";
			$db= new Database();
				$db->query($sql);

				if($rows=$db->query($sql)){

return $rows;

				}return false;
}
}
