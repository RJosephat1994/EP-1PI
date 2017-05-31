class ProductoPedido{
  constructor(pedido_id,producto_id,cantidad){

    this._pedido_id = pedido_id;
    this._producto_id = producto_id;
    this._cantidad =cantidad;
  }

  get pedido_id(){
    return this._pedido_id;
  }
  set pedido_id(precio){
    this._pedido_id=precio;
  }
  get producto_id(){
    return this._producto_id;
  }
  set producto_id(categoria){
    this._producto_id=categoria;
  }
  get cantidad(){
    return this._cantidad;
  }
  set cantidad(descripcion){
    this._cantidad=descripcion;
  }
}
