<?php
require_once '../../funciones/carga.php';

$postData = $_POST;
$fileData = $_FILES['imagen'] ?? FALSE;
$id = $_GET['id'] ?? FALSE;

try {
    $mascotas = (new Mascotas())->producto_id($id);
    $mascotas->clear_tipo_x();

    if (isset($postData['tipos'])) {
        foreach ($postData['tipos'] as $tipo_id) {
            $mascotas->add_tipo($id, $tipo_id);
        }
    }

    if (!empty($fileData['tmp_name'])) {
        $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../img/", $fileData);
        (new Imagen())->borrarImagen(__DIR__ . "/../../img/" . $postData['imagen_re']);
    } else {
        $imagen = $postData['imagen_re'];
    }

    // Realizar la edición del producto
    $mascotas->edit(
        $postData['categoria_id'],
        $postData['marca_id'],
        $postData['nombre'],
        $postData['descripcion'],
        $postData['material'],
        $postData['talle'],
        $postData['fecha'],
        $postData['color'],
        $imagen,
        $postData['especial'],
        $postData['precio']
    );

    // Crear una alerta de éxito y redirigir con la alerta
    $alertas = new Alertas();
    $alertas->incluir_alerta('success', 'El producto se ha editado exitosamente.');

    header('Location: ../index.php?sec=admin_productos');
    exit();
} catch (Exception $e) {
    echo "<pre>";
    print_r($e->getMessage());
    echo "<pre>";
    die("No se pudo editar el Producto =(");
}
?>