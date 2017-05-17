class Usuario{
  constructor(nombre,direccion,telefono){
    this._nombre=nombre;
    this._direccion = direccion;
    this._telefono = telefono;
  }
  get nombre(){
    return this._nombre;
  }
  set nombre(nombre){
    this._nombre=nombre;
  }

}
