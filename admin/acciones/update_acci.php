<?PHP
require_once "../../funciones/carga.php";


$informacion = $_POST;

if(!empty($informacion)){
    (new Carrito())->update_quantities($informacion['q']);
    header('location: ../../index.php?info=carrito');
}
?>