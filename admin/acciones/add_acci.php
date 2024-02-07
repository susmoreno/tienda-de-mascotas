<?PHP
require_once "../../funciones/carga.php";

// Resto del código

$id = $_GET['id'] ?? FALSE;
$q = $_GET['q'] ?? 1;


if ($id) {
    (new Carrito())->add_item($id, $q);
    header('location: ../../index.php?info=carrito');
}

?>