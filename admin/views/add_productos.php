<?PHP
require_once "../funciones/carga.php";



$productos = (new Mascotas())->catalogo_completo();
$categorias = (new Categoria())->getCategorias_tablas();
$marcas = (new Marcas())->todas_marcas();
$tipos = (new Tipos())->lista_tipos();
?>

<div class="row my-5">
        <div class="col">
            <h1 class="text-center mb-5 fw-bold">Agregá un nuevo Producto</h1>
            <div class="row mb-5 d-flex align-items-center">
                <form class="row g-3" action="acciones/add_productos_accion.php" method="POST" enctype="multipart/form-data">
                    <div class="col-md-6 mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="col-md-6 mb-3">
    <label for="categoria_id" class="form-label">Categoria</label>
    <select class="form-select" name="categoria_id" id="categoria_id" required>
        <option value="" selected disabled>Elija una opción</option>
        <?php foreach ($categorias as $categoria) { ?>
			<option value="<?= $categoria->getCategoria_id() ?>"><?= $categoria->getCategoria_nombre() ?></option>
        <?php } ?>
    </select>
</div>


<div class="col-md-6 mb-3">
					<label for="imagen" class="form-label">Imagen</label>
					<input class="form-control" type="file" id="imagen" name="imagen" required multiple>
				</div>

				<div class="col-md-6 mb-3">
					<label for="material" class="form-label">Material</label>
					<input type="text" class="form-control" id="material" name="material" required>
				</div>

				<div class="col-md-12 mb-3">
					<label class="form-label d-block">Tipo</label>
					<?PHP foreach ($tipos as $t) {	?>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" name="tipos[]" id="tipos_<?= $t->getTipo_id() ?>" value="<?= $t->getTipo_id() ?>" >
							<label class="form-check-label mb-2" for="tipos_<?= $t->getTipo_id() ?>"><?= $t->getTipo() ?></label>
						</div>
					<?PHP } ?>
				</div>

				<div class="col-md-4 mb-3">
					<label for="talle" class="form-label">Talle</label>
					<input type="text" class="form-control" id="talle" name="talle" required>
				</div>

				<div class="col-md-4 mb-3">
					<label for="color" class="form-label">Color</label>
					<input type="text" class="form-control" id="color" name="color" required>
				</div>


                <div class="col-md-6 mb-3">
					<label for="fecha" class="form-label">Ingreso</label>
					<input type="date" class="form-control" id="fecha" name="fecha" required>
				</div>

				<div class="col-md-4 mb-3">
					<label for="especial" class="form-label">Especial</label>
					<select class="form-select" name="especial" id="especial" required>
						<option value="" selected disabled>Elija una opción</option>
						<option>no</option>
						<option>Marvel</option>
					</select>
				</div>
				
				<div class="col-md-4 mb-3">
					<label for="marca_id" class="form-label">Marca</label>
					<select class="form-select" name="marca_id" id="marca_id" required>
						<option value="" selected disabled>Elija una opción</option>
						<?PHP foreach ($marcas as $marca) { ?>
							<option value="<?= $marca->getMarca_id() ?>"><?= $marca->getMarca_nombre() ?></option>
						<?PHP } ?>
					</select>
				</div>

				<div class="col-md-4 mb-3">
					<label for="precio" class="form-label">Precio</label>
					<input type="number" class="form-control" id="precio" name="precio" required>
				</div>



				<div class="col-md-12 mb-3">
					<label for="descripcion" class="form-label">Descripción</label>
					<textarea class="form-control" id="descripcion" name="descripcion" rows="7"></textarea>
				</div>




				<button type="submit" class="btn btn-primary">Cargar</button>
			</form>
		</div>
	</div>
</div>