<?php
require_once '../../funciones/carga.php';

$postData = $_POST;
$datosArchivo = $_FILES['imagen'];

try {    
    $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../img/", $datosArchivo);
    
    (new Categoria())->insert(
        $postData['nombre_categoria'], 
        $imagen
    );

    // Crear una alerta de éxito y redirigir con la alerta
    $alertas = new Alertas();
    $alertas->incluir_alerta('success', 'La categoría se ha cargado exitosamente.');

    header('Location: ../index.php?sec=admin_categorias');
    exit();
} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo cargar la Categoría =(");
}
?>