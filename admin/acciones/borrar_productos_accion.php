<?php
require_once '../../funciones/carga.php';

$id = $_GET['id'] ?? FALSE;

try {
    $mascotas = (new Mascotas())->producto_id($id);

    (new Imagen())->borrarImagen(__DIR__ . "/../../img/" . $mascotas->getImagen());
    $mascotas->clear_tipo_x();
    $mascotas->borrar();

    // Crear una alerta de éxito y redirigir con la alerta
    $alertas = new Alertas();
    $alertas->incluir_alerta('success', 'El producto se ha eliminado exitosamente.');

    header('Location: ../index.php?sec=admin_productos');
    exit();
} catch (Exception $e) {
    echo "<pre>";
    print_r($e->getMessage());
    echo "<pre>";
    die("No se pudo eliminar el Producto =(");
}
?>