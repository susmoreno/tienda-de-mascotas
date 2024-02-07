<?PHP
require_once "../funciones/carga.php";



$productos = (new Mascotas())->catalogo_completo();
$categorias = (new Categoria())->getCategorias_tablas();
$tipos = (new Tipos())->lista_tipos();
?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Agregar un nueva Categoría</h1>
        <div class="row mb-5 d-flex align-items-center">

            <form class="row g-3" action="acciones/add_categorias_accion.php" method="POST" enctype="multipart/form-data">

                <div class="col-md-6 mb-3">
                    <label for="nombre_categoria" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input class="form-control" type="file" id="imagen" name="imagen" required>
                </div>

                <button type="submit" class="btn btn-primary">Cargar</button>

            </form>

        </div>
    </div>

</div>