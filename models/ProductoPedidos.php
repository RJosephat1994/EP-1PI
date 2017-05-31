<?php require_once('Database.php');
class ProductoPedidoModel {
	public $id_pedido;
	public $id_producto;
	public $cantidad;


	public function __construct( $id_pedido, $id_producto, $cantidad) {
      $this->id_pedido = $id_pedido;
			$this->id_producto = $id_producto;
	    $this->cantidad = $cantidad;

  }
	//mysqli->insert_id
	// return rows}

  public function save(){

  $db = new Database();
  $sql="INSERT INTO pedido_producto (pedido_id,producto_id,cantidad) VALUES($this->id_pedido,$this->id_producto,$this->cantidad)";
  				$db->query($sql);

  				$lastid=(int )$db->mysqli->insert_id;

  				echo $lastid;
  				$db->close();
  }




  static function getProd($id){
      $db= new Database();
      $sql="SELECT * from pedido_producto where pedido_id=$id";
	$db->query($sql);
      if($rows=$db->query($sql)){

      return $rows;

  }return false;


  }

  static function ultimopedido(){

  $db = new Database();
  $sql="SELECT max(id) from pedido; ";
  				$db->query($sql);

  				$lastid=(int )$db->mysqli->insert_id;
  				if($rows=$db->query($sql)){

  return $rows;

  				}return false;
  }


static function getproducto($id){

	$db = new Database();
	$sql="SELECT *FROM  producto where id=$id; ";
					$db->query($sql);

			
					if($rows=$db->query($sql)){

	return $rows;

					}return false;
	}
}
 ?>
