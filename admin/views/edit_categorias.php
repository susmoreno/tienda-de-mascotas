<?PHP
require_once "../funciones/carga.php";


$id = $_GET['id'] ?? FALSE;
$categoria = (new Categoria())->get_categoria_id($id);

?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Editar Información de Categoria</h1>
        <div class="row mb-5 d-flex align-items-center">

        <form class="row g-3" action="acciones/edit_categorias_accion.php?id=<?= $categoria->getCategoria_id() ?>" method="POST" enctype="multipart/form-data">

                <div class="col-md-6 mb-3">
                    <label for="nombre_categoria" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" value="<?= $categoria->getCategoria_nombre() ?>" required>
                </div>


                <div class="col-md-4 mb-3">
                    <label for="imagen" class="form-label">Reemplazar Imagen</label>
                    <input class="form-control" type="file" id="imagen" name="imagen">
                </div>

                
                <div class="col-md-2 mb-3">
                    <label for="imagen" class="form-label">Imágen actual</label>
                    <img src="../img/<?= $categoria->getCategoria_imagen() ?>" alt="Imágen Illustrativa de <?= $categoria->getCategoria_nombre() ?>" class="img-fluid rounded shadow-sm d-block">
                    <input class="form-control" type="hidden" id="imagen_re" name="imagen_re" value="<?= $categoria->getCategoria_imagen() ?>">
                </div>

                <button type="submit" class="btn btn-primary">Cargar</button>

            </form>

        </div>
    </div>

</div>