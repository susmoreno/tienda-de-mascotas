<?PHP
require_once "../funciones/carga.php";


$id = $_GET['id'] ?? FALSE;
$marcas = (new Marcas())->get_marca_id($id);

?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Editar Información de Marca</h1>
        <div class="row mb-5 d-flex align-items-center">

        <form class="row g-3" action="acciones/edit_marcas_accion.php?id=<?= $marcas->getMarca_id() ?>" method="POST" enctype="multipart/form-data">

                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $marcas->getMarca_nombre() ?>" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="imagen" class="form-label">Reemplazar Imagen</label>
                    <input class="form-control" type="file" id="imagen" name="imagen">
                </div>

                
                <div class="col-md-2 mb-3">
                    <label for="imagen" class="form-label">Imágen actual</label>
                    <img src="../img/<?= $marcas->getMarca_imagen() ?>" alt="Imágen Illustrativa de <?= $marcas->getMarca_nombre() ?>" class="img-fluid rounded shadow-sm d-block">
                    <input class="form-control" type="hidden" id="imagen_re" name="imagen_re" value="<?= $marcas->getMarca_imagen() ?>">
                </div>


                <div class="col-md-6 mb-3">
					<label for="descripcion" class="form-label">Descripción</label>
					<textarea class="form-control" id="descripcion" name="descripcion" rows="7"><?= $marcas->getMarca_descripcion() ?></textarea>
				</div>

                <div class="col-md-6 mb-3">
					<label for="creador" class="form-label">Creador</label>
					<textarea class="form-control" id="creador" name="creador" rows="7"><?= $marcas->getMarca_creador() ?></textarea>
				</div>

                <button type="submit" class="btn btn-primary">Cargar</button>

            </form>

        </div>
    </div>

</div>