class  Pedido{
  constructor(nombre,direccion,telefono,fecha){
    this._nombre=nombre;
    this._direccion=direccion
    this._telefono=telefono;
    this._fecha=fecha;


  }
  get fecha(){
    return this._fecha;
  }
  set fecha(fecha){
    this._fecha=fecha;
  }
  get nombre(){
    return this._nombre;
  }
  set cliente(nombre){
    this._nombre=nombre;
  }
  get direccion(){
    return this._direccion;
  }
  set estado(direccion){
    this._direccion=direccion;
  }
  get telefono(){

    return this._telefono;
  }
  set telefono(telefono){

    this._telefono=telefono;
  }

}
