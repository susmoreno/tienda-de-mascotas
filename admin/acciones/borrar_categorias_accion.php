<?php
require_once '../../funciones/carga.php';

$id = $_GET['id'] ?? FALSE;

try {
    $categoria = (new Categoria)->get_categoria_id($id);

    // Verificar si la categoría puede eliminarse (por ejemplo, si no tiene productos asociados)
    // Puedes implementar la lógica específica según tus necesidades
    if ($categoria->puedeEliminarse()) {
        $categoria->delete();

        // Crear una alerta de éxito y redirigir con la alerta
        $alertas = new Alertas();
        $alertas->incluir_alerta('success', 'La categoría se ha eliminado exitosamente.');

        header('Location: ../index.php?sec=admin_categorias');
        exit();
    } else {
        // Si no es posible eliminar, mostrar una alerta y redirigir
        $alertas = new Alertas();
        $alertas->incluir_alerta('warning', 'No es posible eliminar la categoría, ya que está siendo utilizada por algunos de tus productos.');

        header('Location: ' . $_SERVER['HTTP_REFERER']); // Redirigir a la página anterior
        exit();
    }
} catch (Exception $e) {
    die("No es posible eliminar la Categoria");
}
?>