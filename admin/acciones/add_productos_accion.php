<?php
require_once "../../funciones/carga.php";

$postData = $_POST;
$fileData = $_FILES['imagen'];

try {
    $mascotas = new Mascotas();

    // Manejo de la imagen
    $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../img/", $fileData);

    // Insertar el producto
    $producto_id = $mascotas->insertarProducto(
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

    if (isset($postData['tipos'])) {
        foreach ($postData['tipos'] as $tipo_id) {
            $mascotas->add_tipo($producto_id, $tipo_id);
        }
    }

    // Crear una alerta de éxito y redirigir con la alerta
    $alertas = new Alertas();
    $alertas->incluir_alerta('success', 'El producto se ha cargado exitosamente.');

    header('Location: ../index.php?sec=admin_productos');
    exit();
} catch (Exception $error) {
    echo "<pre>";
    print_r($error->getMessage());
    echo "<pre>";
    die("No hemos podido cargar su Producto");
}
?>