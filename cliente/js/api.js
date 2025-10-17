const API_URL = 'http://localhost/Examen/Servidor/ra1clienteservidorexmamen/servidor/api.php';

async function obtenerProductos() {
  const respuesta = await fetch(API_URL);
  return await respuesta.json();
}

async function obtenerProducto(id) {
  const respuesta = await fetch(`${API_URL}?id=${id}`);
  return await respuesta.json();
}
