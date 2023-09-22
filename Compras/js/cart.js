const contenedorTargetas = document.getElementById("productos_container");
const unidadesElement = document.getElementById("unidades");
const preciosElement = document.getElementById("precio");
const carritoVacioElemnt = document.getElementById("carrito_vacio");
const totalesElement = document.getElementById("totales");
const reniciarCarritoElement = document.getElementById("reiniciar");

function crearTargetasProductos() {
    contenedorTargetas.innerHTML = "";
  const productos = JSON.parse(localStorage.getItem("productos"));
  console.log(productos);
  if (productos && productos.length > 0) {
    productos.forEach((producto) => {
      const nuevoProducto = document.createElement("div");
      nuevoProducto.classList = "targeta-producto";
      nuevoProducto.innerHTML = `
        <img src =${producto.img}>
        <h3>${producto.nombre} </h3>
        <p>$${producto.precio}</p>
        <div>
            <button>-</button>
            <span class ="cantidad">${producto.cantidad}</span>
            <button>+</button>
        </div>
        `;
      contenedorTargetas.appendChild(nuevoProducto);
      nuevoProducto
        .getElementsByTagName("button")[1]
        .addEventListener("click", (e) => {
            const cuantaElement = e.target.parentElement.getElementsByTagName("span")[0];
            cuantaElement.innerText = agregarAlCarrito(producto);
            actualizarTotal();
        });
      nuevoProducto
        .getElementsByTagName("button")[0]
        .addEventListener("click", (e) => {
            restarAlCarrito(producto);
            crearTargetasProductos();
            actualizarTotal();
        });
    });
  }
}

crearTargetasProductos();
actualizarTotal();


function actualizarTotal() {
    const productos = JSON.parse(localStorage.getItem("productos"));
    let unidades = 0;
    let precio = 0;
    
    if(productos && productos.length > 0){
        productos.forEach(producto => {
            unidades += producto.cantidad;
            precio += producto.precio * producto.cantidad;
        })

        unidadesElement.innerText = unidades;
        preciosElement.innerText = precio
    }

 
}

function revisarMensajeVacio () {
    const productos = JSON.parse(localStorage.getItem("productos"));
    console.log(productos, productos == true)
    carritoVacioElemnt.classList.toggle("escondido",productos && productos.length > 0);
    totalesElement.classList.toggle("escondido",!(productos && productos.length > 0));
    actualizarTotal()
}

revisarMensajeVacio();

reniciarCarritoElement.addEventListener('click',reiniciarCarrito);
function reiniciarCarrito () {
    localStorage.removeItem("productos");
    actualizarTotal();
    crearTargetasProductos(); 
    revisarMensajeVacio();
}






