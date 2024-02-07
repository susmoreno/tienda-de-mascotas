<?PHP

require_once "../funciones/carga.php";

$id = $_GET['id'] ?? FALSE;
$marca = (new Marcas())->get_marca_id($id);

$alertas = new Alertas();
echo $alertas->get_alertas();
?>

<div class="row my-5 g-3">
	<h1 class="text-center mb-5 fw-bold">¿Está seguro que desea eliminar este producto?</h1>
	<div class="col-12 col-md-6">
		<img src="../img/<?= $marca->getMarca_imagen() ?>" alt="Imágen Illustrativa de <?= $marca->getMarca_nombre() ?>" class=" img img-fluid rounded shadow-sm d-block mx-auto mb-3">
	</div>

	<div class="col-12 col-md-6">


		<h2 class="fs-6">Nombre</h2>
		<p>Nombre: <?= $marca->getMarca_nombre() ?></p>
        <p>Descripción: <?= $marca->getMarca_descripcion() ?></p>
        <p>Color: <?= $marca->getMarca_creador() ?></p>

		<a href="acciones/borrar_marcas_accion.php?id=<?= $marca->getMarca_id() ?>" role="button" class="d-block btn btn-sm btn-danger mt-4">Eliminar</a>
	</div>



</div>