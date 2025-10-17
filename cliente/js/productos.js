document.addEventListener('DOMContentLoaded', async () => {
  const contenedor = document.getElementById('contenedor-productos');
  const productos = await obtenerProductos();

  productos.forEach(p => {
    const card = document.createElement('div');
    card.className = "col-md-4";
    card.innerHTML = `
      <div class="card h-100 shadow-sm" style="color: blue; border-radius: 15px;">
        <img src="${p.img}" class="card-img-top" alt="${p.nombre}" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
        <div class="card-body text-center">
          <h5 class="card-title" style="color: black;">${p.nombre}</h5>
          <p class="card-text" style="color: blue;">${p.descripcion}</p>
          <p class="fw-bold">${p.precio.toFixed(2)} €</p>
          <a href="producto.html?id=${p.id}" class="btn btn-primary">Ver detalle</a>
        </div>
      </div>
    `;
    contenedor.appendChild(card);
  });
});
