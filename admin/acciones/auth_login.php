<?PHP
require_once "../../funciones/carga.php";


$postData = $_POST;

$login = (new Autenticarse())->log_in($postData['username'], $postData['pass']);

if($login == "username"){ 

    header('location: ../index.php?sec=dashboard');
} else {
    header('location: ../index.php?sec=login');
}