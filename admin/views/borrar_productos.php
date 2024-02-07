<?PHP
require_once "../funciones/carga.php";


$id = $_GET['id'] ?? FALSE;
$mascotas = (new Mascotas())->producto_id($id);

?>

<div class="row my-5 g-3">
	<h1 class="text-center mb-5 fw-bold">¿Está seguro que desea eliminar este producto?</h1>
	<div class="col-12 col-md-6">
		<img src="../img/<?= $mascotas->getImagen() ?>" alt="Imágen Illustrativa de <?= $mascotas->getNombre() ?>" class="img img-fluid rounded shadow-sm d-block mx-auto mb-3">
	</div>

	<div class="col-12 col-md-6">


		<h2>Nombre: <?= $mascotas->getNombre() ?></h2>
        <p>Descripción: <?= $mascotas->getDescripcion() ?></p>
        <p>Color: <?= $mascotas->getColor() ?></p>
        <p>Material: <?= $mascotas->getMaterial() ?></p>
        <p>Talle: <?= $mascotas->getTalle() ?></p>
        <h2>Precio: <?= $mascotas->getPrecio() ?></h2>

		<div>
			<?= $alerta = (new Alertas())->get_alertas(); ?>
		</div> 

		<a href="acciones/borrar_productos_accion.php?id=<?= $mascotas->getId() ?>" role="button" class="d-block btn btn-sm btn-danger mt-4">Eliminar</a>
	</div>



</div>