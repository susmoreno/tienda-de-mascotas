<?PHP
require_once "../funciones/carga.php";

$id = $_GET['id'] ?? FALSE;
$mascotas = (new Mascotas())->producto_id($id);
$seleccion = $mascotas->getTipos_ids();
$productos = (new Mascotas())->catalogo_completo();
$categorias = (new Categoria())->getCategorias_tablas();
$marcas = (new Marcas())->todas_marcas();
$tipos = (new Tipos())->lista_tipos();

?>


<div class="row my-5">
    <div class="col">

        <h1 class="text-center mb-5 fw-bold">Edición de datos de: <span class="text-danger"><?= $mascotas->getNombre() ?><span></h1>
        <div class="row mb-5 d-flex align-items-center">

            <form class="row g-3" action="acciones/edit_productos_accion.php?id=<?= $mascotas->getId() ?>" method="POST" enctype="multipart/form-data">

            <div class="col-md-4 mb-3">
                    <label for="imagen_re" class="form-label">Imagen</label>
                    <img src="../img/<?= $mascotas->getImagen() ?>" alt="Imágen Illustrativa de <?= $mascotas->getImagen() ?>" class="img-fluid rounded shadow-sm d-block">
                    <input class="form-control" type="hidden" id="imagen_re" name="imagen_re" required value="<?= $mascotas->getImagen() ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required value="<?= $mascotas->getNombre() ?>">
                </div>



                <div class="col-md-6 mb-3">
                    <label for="categoria_id" class="form-label">Categoría</label>
                    <select class="form-select" name="categoria_id" id="categoria_id" required>
                        <option value="" selected disabled>Elija una opción</option>
                        <?PHP foreach ($categorias as $c) { ?>
                            <option 
                            value="<?= $c->getCategoria_id()?>" <?= $c->getCategoria_id() == $mascotas->getCategoria()->getCategoria_id() ? "selected" : "" ?>>
                                <?= $c->getCategoria_nombre() ?></option>
                        <?PHP } ?>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
    <label for="marca_id" class="form-label">Marca</label>
    <select class="form-select" name="marca_id" id="marca_id" required>
        <option value="" selected disabled>Elija una opción</option>
        <?php foreach ($marcas as $m) { ?>
            <option value="<?= $m->getMarca_id() ?>" <?= $m->getMarca_id() == $mascotas->getMarca()->getMarca_id() ? "selected" : "" ?>>
                <?= $m->getMarca_nombre() ?>
            </option>
        <?php } ?>
    </select>
</div>

<div class="col-md-12 mb-3">
    <label class="form-label d-block">Tipos</label>
    <?PHP
    foreach ($tipos as $t) {
    ?>
        <div class="form-check form-check-inline">
            <input 
            class="form-check-input" 
            type="checkbox" 
            name="tipos[]" 
            id="tipos_<?= $t->getTipo_id() ?>" 
            value="<?= $t->getTipo_id() ?>"                             
            <?= in_array($t->getTipo_id(), $seleccion) ? "checked" : "" ?>>
            <label class="form-check-label mb-2" for="tipos_<?= $t->getTipo_id() ?>"><?= $t->getTipo() ?></label>
        </div>
    <?PHP } ?>
</div>

                <div class="col-md-4 mb-3">
                    <label for="talle" class="form-label">Talle</label>
                    <input type="text" class="form-control" id="talle" name="talle" required value="<?= $mascotas->getTalle() ?>">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" class="form-control" id="color" name="color" required value="<?= $mascotas->getColor() ?>">
                </div>


                <div class="col-md-4 mb-3">
                    <label for="imagen" class="form-label">Reemplazar Imagen</label>
                    <input class="form-control" type="file" id="imagen" name="imagen">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="material" class="form-label">Material</label>
                    <input type="text" class="form-control" id="material" name="material" required value="<?= $mascotas->getMaterial() ?>">
                </div>


                <div class="col-md-4 mb-3">
                    <label for="fecha" class="form-label">Ingreso</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" required value="<?= $mascotas->getFecha() ?>">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="especial" class="form-label">Especial</label>
                    <select class="form-select" name="especial" id="especial" required>
                        <option value="" selected disabled>Elija una opción</option>
                        <option <?= $mascotas->getEspecial() == "" ? "selected" : "" ?>>No</option>
                        <option <?= $mascotas->getEspecial() == "marvel" ? "selected" : "" ?>>marvel</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" required value="<?= $mascotas->getPrecio() ?>">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="7"><?= $mascotas->getDescripcion() ?></textarea>
                </div>




                <button type="submit" class="btn btn-warning">Editar</button>
            </form>
        </div>
    </div>
</div>