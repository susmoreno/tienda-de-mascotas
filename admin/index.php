<?PHP
require_once "../funciones/carga.php";

$secciones_validas = [
    "login" => [
        "titulo" => "Inicio de Sesión",
        "restringido" => FALSE
    ],
    "dashboard" => [
        "titulo" => "Panel de administración",
        "restringido" => TRUE
    ],
    "admin_productos" => [
        "titulo" => "Administrar Productos",
        "restringido" => TRUE
    ],
    "admin_marcas" => [
        "titulo" => "Administrar Marcas",
        "restringido" => TRUE
    ],
    "admin_categorias" => [
        "titulo" => "Administrar Categorias",
        "restringido" => TRUE
    ],
    "add_categorias" => [
        "titulo" => "Agregar Categorias",
        "restringido" => TRUE
    ],
    "add_productos" => [
        "titulo" => "Agregar Productos",
        "restringido" => TRUE
    ],
    "add_marcas" => [
        "titulo" => "Agregar Marcas",
        "restringido" => TRUE
    ],
    "edit_categorias" => [
        "titulo" => "Editar Categorias",
        "restringido" => TRUE
    ],
    "edit_marcas" => [
        "titulo" => "Editar datos de las Marcas",
        "restringido" => TRUE
    ],
    "edit_productos" => [
        "titulo" => "Editar datos de los productos",
        "restringido" => TRUE
    ],
    "borrar_marcas" => [
        "titulo" => "Eliminar datos de Marcas",
        "restringido" => TRUE
    ],
    "borrar_productos" => [
        "titulo" => "Eliminar datos de un Producto",
        "restringido" => TRUE
    ],
    "borrar_categorias" => [
        "titulo" => "Eliminar Categorias",
        "restringido" => TRUE
    ]
];


$seccion = $_GET['sec'] ?? "dashboard";

if (!array_key_exists($seccion, $secciones_validas)) {
    $vista = "error_404";
    $titulo = "error_404 - Página no encontrada";
} else {
    $vista = $seccion;

    if($secciones_validas[$seccion]['restringido']){
        (new Autenticarse())->verify();    
    }

    $titulo = $secciones_validas[$seccion]['titulo'];
}

$userData = $_SESSION['loggedIn'] ?? FALSE;

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petplanet :: <?= $titulo ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link href="../estilo/admin.css" rel="stylesheet">
</head>

<body>

    <nav class=" navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Panel de Administración | PetPlanet</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                        <a class="nav-link active <?= $userData ? "" : "d-none" ?>" href="index.php?sec=dashboard">Inicio </a>
                    </li>

                    <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                        <a class="nav-link" href="index.php?sec=admin_productos">Productos</a>
                    </li>

                    <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                        <a class="nav-link" href="index.php?sec=admin_marcas">Marcas</a>
                    </li>
                    <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                        <a class="nav-link" href="index.php?sec=admin_categorias">Categorías</a>
                    </li>

                    <li class="nav-item <?= $userData ? "d-none" : "" ?>">
                        <a class="nav-link fw-bold" href="index.php?sec=login">Acceso</a>
                    </li>  

                   <li class="nav-item">
                   <a class="nav-link" aria-current="page" href="../index.php">Tienda</a>
                   </li>   
     
                    

                    <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                        <a class="nav-link fw-bold" href="acciones/auth_logout.php">Cerrar sesión</a>
                    </li>

         

                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5">

        <?PHP

        //Verifiquemos que el archivo exista.
        require_once file_exists("views/$vista.php") ? "views/$vista.php" : "views/error_404.php";

        ?>
    </main>


    <footer class="row">
  <div class="col-12 col-md-6 d-flex align-items-center px-4 pt-3">
    <p class="p-2 mb-0">Olazábal 5480 | Villa Urquiza</p>
    <img class="p-2 img-fluid" src="../img/footer/ig.png" alt="logo de Instagram">
    <img class="p-2 img-fluid" src="../img/footer/gmail.png" alt="logo de Gmail">
    <img class="p-2 img-fluid" src="../img/footer/wpp.png" alt="logo de Whatsapp">
  </div>
  <div class="col-12 col-md-6 d-flex justify-content-end align-items-center">
    <img class="pr img-fluid" src="../img/logo.png" alt="logo de la tienda">
    <p class="pr mb-0">&copy;2023 por PetPlanet | </p>
    <p class="pr mb-0">Carolina Cacciagiu | </p>
    <p class="pr mb-0">Jesús Moreno </p>
  </div>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

</body>

</html>