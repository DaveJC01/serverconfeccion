function agregarAlCarrito(producto) {
  const memoria = JSON.parse(localStorage.getItem("productos"));
  console.log(memoria);
  let cuenta = 0
  if (!memoria) {
    const nuevoProducto = getNuevoProductoParaMemoria(producto);
    nuevoProducto.cantidad = 1;
    localStorage.setItem("productos", JSON.stringify([nuevoProducto]));
    cuenta = 1;
  } else {
    const indicePruducto = memoria.findIndex(
      (produccto) => produccto.id === producto.id
    );
    console.log(indicePruducto);
    const nuevaMemoria = memoria;
    if (indicePruducto === -1) {
      nuevaMemoria.push(getNuevoProductoParaMemoria(producto));
      cuenta = 1;
    } else {
      nuevaMemoria[indicePruducto].cantidad++;
      cuenta = nuevaMemoria[indicePruducto].cantidad;
    }
    localStorage.setItem("productos", JSON.stringify(nuevaMemoria));
    actualizarNumeroCarrito();

    return cuenta;
  }
  actualizarNumeroCarrito();
}

function restarAlCarrito (producto) {
    const memoria = JSON.parse(localStorage.getItem("productos"));
    const indicePruducto = memoria.findIndex(
        (produccto) => produccto.id === producto.id
      );
      if(memoria[indicePruducto].cantidad === 1 ){
        memoria.splice(indicePruducto,1);
        
      }else{
        memoria[indicePruducto].cantidad--;
      }
      localStorage.setItem("productos", JSON.stringify(memoria));
      actualizarNumeroCarrito();
      revisarMensajeVacio();
      

}

/* Toma un producto, le agrega cantidad 1 y lo devuelve */
function getNuevoProductoParaMemoria(producto) {
  const nuevoProducto = producto;
  nuevoProducto.cantidad = 1;
  actualizarNumeroCarrito();
  return nuevoProducto;
}

const CuentaCarrito = document.getElementById("cuenta_carrito");
function actualizarNumeroCarrito() {
  const memoria = JSON.parse(localStorage.getItem("productos"));
  if(memoria && memoria.length > 0){
    const cuenta = memoria.reduce((acum, current) => acum + current.cantidad, 0);
    CuentaCarrito.innerText = cuenta;
  }else{ 
     CuentaCarrito.innerText = 0;
  } 
  
}

actualizarNumeroCarrito();



