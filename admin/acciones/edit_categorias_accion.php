<?php
require_once '../../funciones/carga.php';

$postData = $_POST;
$fileData = $_FILES['imagen'];
$id = $_GET['id'] ?? FALSE;

try {
    $categoria = (new Categoria)->get_categoria_id($id);

    if (!empty($fileData['tmp_name'])) {
        $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../img/", $fileData);

        if (!empty($postData['imagen_re'])) {
            (new Imagen())->borrarImagen(__DIR__ . "/../../img/" . $postData['imagen_re']);
        }
    } else {
        $imagen = $postData['imagen_re'];
    }

    // Realizar la edición de la categoría
    $categoria->edit(
        $postData['nombre'],
        $imagen
    );

    // Crear una alerta de éxito y redirigir con la alerta
    $alertas = new Alertas();
    $alertas->incluir_alerta('success', 'La categoría se ha editado exitosamente.');

    header('Location: ../index.php?sec=admin_categorias');
    exit();
} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo editar la Categoría");
}
?>
