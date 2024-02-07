<?PHP
require_once "../../funciones/carga.php";


(new Autenticarse())->log_out();
header('location: ../index.php?sec=login');