<?php

header('Access-Control-Allow-Origin: *');

$productos = [
    [
        "id" => 1,
        "nombre" => "Camiseta básica",
        //He añadido img y categoria
        "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThFPRpaSFwG6zvmoF_jO7C-btkJYSIeKZnIw&s",
        "categoria" => "Ropa",
        "descripcion" => "Camiseta de algodón 100% en varios colores.",
        "precio" => 12.99
    ],
    [
        "id" => 2,
        "nombre" => "Pantalón vaquero",
        //He añadido img y categoria
        "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQho-ssS7QeZDcRyMi-sV4FEChBIDzaN5Z2TA&s",
        "categoria" => "Ropa",
        "descripcion" => "Pantalón de mezclilla azul clásico.",
        "precio" => 29.95
    ],
    [
        "id" => 3,
        "nombre" => "Zapatillas deportivas",
        //He añadido img y categoria
        "img" =>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3ICaslxZc11k7GhXTpbnsL3OhWh8K9P_z6Q&s",
        "categoria" => "Ropa",
        "descripcion" => "Zapatillas ligeras y cómodas para el día a día.",
        "precio" => 45.50
    ],
    [
        //He añadido los siguientes productos hasta el id 9
        "id" => 4,
        "nombre" => "sudadera",
        "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGvlaXiW04hwokPy5s21enKo8ij7xzw56rAg&s",
        "categoria" => "Ropa",
        "descripcion" => "Sudadera comoda",
        "precio" => 50
    ],
    [
        "id" => 5,
        "nombre" => "calcetines",
        "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtQe4yFzk0SB7NbK8Zq0E41a1uJ4IzGRO6PQ&s",
        "categoria" => "Ropa",
        "descripcion" => "calcetines comodos normales",
        "precio" => 6
    ],
    [
        "id" => 6,
        "nombre" => "camiseta Real Madrid",
        "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWGnlE2ubTSpJtSECYBkZjT8tV7vb1POnE1A&s",
        "categoria" => "Ropa",
        "descripcion" => "Camiseta del mejor club del mundo",
        "precio" => 80
    ],
    [
        "id" => 7,
        "nombre" => "camiseta Real Betis",
        "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgAXthoYk2-9966-tTQ7i7AHYIzyLliru11w&s",
        "categoria" => "Ropa",
        "descripcion" => "Camiseta del mejor club de Sevilla",
        "precio" => 80
    ],
    [
        "id" => 8,
        "nombre" => "bufanda Real Betis",
        "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDDVs6aw0YR8jq6Iz3TeijXlFpI2mYds20eg&s",
        "categoria" => "Ropa",
        "descripcion" => "bufanda del mejor club de Sevilla",
        "precio" => 14
    ],
    [
        "id" => 9,
        "nombre" => "bufanda Real Madrid",
        "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTc1JN2_u3QLyNXn5dGuZk5qbkD-BIcIDD9sg&s",
        "categoria" => "Ropa",
        "descripcion" => "bufanda del mejor club del mundo",
        "precio" => 15
    ],
];



   
if (isset($_GET['id'])) {
    header('Content-Type: application/json');
    $id = intval($_GET['id']);
    foreach ($productos as $p) {
        if ($p['id'] === $id) {
            echo json_encode($p);
            exit;
        }
    }
    echo json_encode(["error" => "Producto no encontrado"]);
 }else if (isset($_GET['modo']) && $_GET['modo'] === 'texto') {
    header('Content-Type: text/html; charset=UTF-8');
    mostrarProductosJSON($productos);
//Hecho el filtro de precio como máximo 30
}else if (isset($_GET['max'])){
    $productosFiltrados = array_filter($productos, fn($p) => $p['precio'] <= 30);
    echo json_encode($productosFiltrados);
}
//Pista debes detectar el max con  el get para el ejercicio--> Ejercicio 4: Filtrado de productos por GET
else {
    echo json_encode($productos);
}


///Función que muestra por pantalla un listado de productos.
//http://localhost/ra1clienteservidorexmamen/servidor/api.php?modo=texto
function mostrarProductosJSON($productos) {
    echo "--- Lista de productos ---<br>";
    $json = json_encode($productos);
    $array = json_decode($json, true);
    //Crear un foreach para recorrerlo  y pintar por pantalla, el id, nombre y precio del producto
    foreach ($array as $producto) {
        echo "ID: " . $producto['id'] . "<br>";
        echo "Nombre: " . $producto['nombre'] . "<br>";
        echo "Precio: $" . $producto['precio'] . "<br>";
        echo "-----------------------<br>";
    }
    
}
