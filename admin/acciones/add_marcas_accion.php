<?php
require_once '../../funciones/carga.php';

$postData = $_POST;
$datosArchivo = $_FILES['imagen'];

try {    
    $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../img/", $datosArchivo);
    
    (new Marcas())->insert(
        $postData['nombre'], 
        $postData['descripcion'], 
        $postData['creador'], 
        $imagen
    );

    // Crear una alerta de éxito y redirigir con la alerta
    $alertas = new Alertas();
    $alertas->incluir_alerta('success', 'La marca se ha cargado exitosamente.');

    header('Location: ../index.php?sec=admin_marcas');
    exit();
} catch (Exception $e) {
    // Manejar errores
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo cargar la marca =(");
}