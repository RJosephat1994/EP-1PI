<?php
require_once('Database.php');
class Cliente {
	public $name;
	public $address;
	public $phone;


	public function __construct($name, $address, $phone) {
      $this->name = $name;
			$this->address = $address;
	    $this->phone = $phone;

  }

  public function save(){

  $db = new Database();
  $sql="INSERT INTO cliente (nombre,direccion,telefono) VALUES('$this->name','$this->address', '$this->phone')";
  				$db->query($sql);

  				$lastcliente=(int )$db->mysqli->insert_id;
					$GLOBALS['lastid']=$lastcliente;
  				echo $lastcliente;
  				$db->close();


  }

	static function get(){

		$db = new Database();
		$sql="SELECT *from  cliente where id=(select max(id) from cliente); ";
						$db->query($sql);

						$lastid=(int )$db->mysqli->insert_id;
						if($rows=$db->query($sql)){

		return $rows;

						}return false;

	}

}
