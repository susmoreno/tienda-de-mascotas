<?PHP

require_once "../../funciones/carga.php";


(new Carrito())->clear_items();
header('location: ../../index.php?info=carrito');
?>