<?php 

require_once "funciones/carga.php";

$validacion = [

  "inicio" => [
    "titulo" => "Bienvenidos",
  ],
  "total" => [
    "titulo" => "Total Productos",
  ],
  "mascotas" => [
    "titulo" => "Productos",
  ],
  "productos" => [
    "titulo" => "Detalle",
  ],
  "marvel" =>[
    "titulo" => "Marvel",
  ],
  "perros" =>[
    "titulo" => "Perritos",
  ],
  "gatos" =>[
    "titulo" => "Gatitos"
  ],
  "menor" => [
    "titulo" => "Precio menor",
  ],
  "talle" => [
    "titulo" => "Talle S",
  ],
  "formulario" => [
    "titulo" => "Formulario",
  ],
  "alumnos" => [
    "titulo" => "Alumnos",
  ],
  "carrito" => [
    "titulo" => "Carrito de compras",
    
  ],
  "finalizar" =>[
    "titulo" => "Finalizar pago"
  ],
  "resultbuscador" =>[
    "titulo" => "buscador"
  ]
  ];
//entra en el incio
$seccion = isset($_GET['info']) ? $_GET['info'] : 'inicio';

if (!array_key_exists($seccion, $validacion)) {
    $vista = "404";
    $titulo = "Página no encontrada";
} else {
    $vista = $seccion;
    $titulo = $validacion[$seccion]['titulo'];

    // Verificar si es la sección de resultados y ejecutar la búsqueda
    // if ($seccion === 'resultados' && isset($_GET['busqueda'])) {
    //     $busqueda = $_GET['busqueda'];
    //     $mascotas = new Mascotas();
    //     $resultados = $mascotas->buscador($busqueda);
    // }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetPlanet <?=$titulo?> </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lora:wght@600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<link rel="stylesheet" href="estilo/estilo.css">


</head>
<body>
<header>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <img class="logo" src="img/logo.png" alt="logo de la tienda" >
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php?info=inicio">Inicio</a>
        </li>   
      </ul>
      <ul class="navbar-nav">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Productos</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?info=total">Todos los productos</a></li>
            
            <?php
            $mascotas = new Mascotas();
            $categorias = $mascotas->obtener_categorias();

            foreach ($categorias as $categoria) {
                echo '<li><a class="dropdown-item" href="index.php?info=mascotas&pro=' . strtolower($categoria) . '">' . $categoria . '</a></li>';
            }
            ?>
            
        </ul>    
    </li>
</ul>
      <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class=" nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Filtrar por..</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?info=marvel&es">Marvel</a></li>
            <li><a class="dropdown-item" href="index.php?info=perros&es">Perritos</a></li>
            <li><a class="dropdown-item" href="index.php?info=gatos&es">Gatitos</a></li>
            <li><a class="dropdown-item" href="index.php?info=menor&es">Precios Bajos</a></li>
            <li><a class="dropdown-item" href="index.php?info=talle&es">Talle S</a></li>
          </ul>    
      </li>
      </ul>
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link" href="index.php?info=formulario">Formulario</a>
        </li>
      </ul>
         <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="admin/index.php">Admin</a>
        </li> 

      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php?info=alumnos">Alumnos</a>
        </li> 
      </ul>
      <li class="nav-item">
          <a class="nav-link " href="index.php?info=carrito">Carrito</a>
    </li>
    </div>
    
    <form action="index.php?info=resultbuscador" method="POST">
            <input type="text" id="busqueda" name="busqueda" required>
            <button class="btn btn-primary" type="submit">Buscar</button>
        </form>

    
  </div>
</nav>
</header>

<section>
<?php
require_once "contenido/$vista.php";
?>
</section>

<footer class="row">
  <div class="col-12 col-md-6 d-flex align-items-center px-4 pt-3">
    <p class="p-2 mb-0">Olazábal 5480 | Villa Urquiza</p>
    <img class="p-2 img-fluid" src="img/footer/ig.png" alt="logo de Instagram">
    <img class="p-2 img-fluid" src="img/footer/gmail.png" alt="logo de Gmail">
    <img class="p-2 img-fluid" src="img/footer/wpp.png" alt="logo de Whatsapp">
  </div>
  <div class="col-12 col-md-6 d-flex justify-content-end align-items-center">
    <img class="pr img-fluid" src="img/logo.png" alt="logo de la tienda">
    <p class="pr mb-0">&copy;2023 por PetPlanet | </p>
    <p class="pr mb-0">Carolina Cacciagiu | </p>
    <p class="pr mb-0">Jesús Moreno </p>
  </div>
</footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>