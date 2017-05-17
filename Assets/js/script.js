class  Producto{
  constructor(nombre,precio,categoria){
    this._nombre=nombre;
    this._precio = precio;
    this._categoria = categoria;
  }
  get nombre(){
    return this._nombre;
  }
  set nombre(nombre){
    this._nombre=nombre;
  }
  
}
