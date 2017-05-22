class  Producto{
  constructor(fecha,cliente,estado){
    this._fecha=fecha;
    this._cliente = cliente;
    this._estado = estado;

  }
  get fecha(){
    return this._fecha;
  }
  set fecha(fecha){
    this._fecha=fecha;
  }
  get cliente(){
    return this._cliente;
  }
  set cliente(cliente){
    this._cliente=cliente;
  }
  get estado(){
    return this._estado;
  }
  set estado(estado){
    this._estado=estado;
  }

}
