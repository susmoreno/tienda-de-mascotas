<?php
require_once '../../funciones/carga.php';

$id = $_GET['id'] ?? FALSE;

try {
    $marca = (new Marcas)->get_marca_id($id);

    // Verificar si la marca puede eliminarse (si no tiene productos asociados)
    if ($marca->puedeEliminarse()) {
        $marca->delete();
        if (!empty($marca->getMarca_imagen())) {
            (new Imagen())->borrarImagen(__DIR__ . "/../../img/" . $marca->getMarca_imagen());
        }

        // Crear una alerta de éxito y redirigir con la alerta
        $alertas = new Alertas();
        $alertas->incluir_alerta('success', 'La marca se ha eliminado exitosamente.');

        header('Location: ../index.php?sec=admin_marcas');
        exit();
    } else {
        // Si no es posible eliminar, mostrar una alerta y redirigir
        $alertas = new Alertas();
        $alertas->incluir_alerta('warning', 'No es posible eliminar la marca, ya que está siendo utilizada por algunos de tus productos.');

        header('Location: ' . $_SERVER['HTTP_REFERER']); // Redirigir a la página anterior
        exit();
    }
} catch (Exception $e) {
    die("No es posible eliminar la Marca");
}
?>
