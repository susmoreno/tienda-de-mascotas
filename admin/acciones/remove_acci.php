<?php
session_start();
require_once "../../funciones/carga.php";

$id = $_GET['id'] ?? FALSE;

if ($id !== FALSE) {
    (new Carrito())->remove_item($id);
}

header('location: ../../index.php?info=carrito');
?>
