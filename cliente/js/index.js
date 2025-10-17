document.addEventListener("DOMContentLoaded", async () => {
  const contenedor = document.getElementById("contenedor-destacados");

  try {
    const productos = await obtenerProductos(); // Usa la misma función de api.js
    let contador = 0;

    for (const prod of productos) {
      if (contador >= 3) break; // Solo mostramos 3 productos

      const card = document.createElement("div");
      card.classList.add("col-md-4", "col-lg-3");

      card.innerHTML = `
        <div class="card h-100 shadow-sm">
          <img src="${prod.img}" class="card-img-top" alt="${prod.nombre}">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">${prod.nombre}</h5>
            <p class="fw-bold fs-5 text-success mt-auto">${prod.precio.toFixed(2)} €</p>
            <a href="productos.html" class="btn btn-primary mt-2">Ver más</a>
          </div>
        </div>
      `;

      contenedor.appendChild(card);
      contador++;
    }

  } catch (error) {
    console.error("Error al cargar los productos destacados:", error);
    contenedor.innerHTML = `<div class="alert alert-danger text-center">No se pudieron cargar los productos destacados.</div>`;
  }
});