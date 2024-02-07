<?PHP
require_once "../funciones/carga.php";



$productos = (new Mascotas())->catalogo_completo();
$categorias = (new Categoria())->getCategorias_tablas();
$marcas = (new Marcas())->todas_marcas();
$tipos = (new Tipos())->lista_tipos();
?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Agregar un nueva Nueva Marca</h1>
        <div class="row mb-5 d-flex align-items-center">

            <form class="row g-3" action="acciones/add_marcas_accion.php" method="POST" enctype="multipart/form-data">

                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input class="form-control" type="file" id="imagen" name="imagen" required>
                </div>

                <div class="col-md-6 mb-3">
					<label for="descripcion" class="form-label">Descripción</label>
					<textarea class="form-control" id="descripcion" name="descripcion" rows="7"></textarea>
				</div>

                <div class="col-md-6 mb-3">
					<label for="creador" class="form-label">Creador</label>
					<textarea class="form-control" id="creador" name="creador" rows="7"></textarea>
				</div>


                <button type="submit" class="btn btn-primary">Cargar</button>

            </form>

        </div>
    </div>

</div>