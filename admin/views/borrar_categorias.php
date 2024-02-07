<?PHP

require_once "../funciones/carga.php";

$id = $_GET['id'] ?? FALSE;
$categoria = (new Categoria())->get_categoria_id($id);

$alertas = new Alertas();
echo $alertas->get_alertas();
?>

<div class="row my-5 g-3">
	<h1 class="text-center mb-5 fw-bold">¿Está seguro que desea eliminar este producto?</h1>
	<div class="col-12 col-md-6">
		<img src="../img/<?= $categoria->getCategoria_imagen() ?>" alt="Imágen Illustrativa de <?= $categoria->getCategoria_nombre() ?>" class="img-fluid rounded shadow-sm d-block mx-auto mb-3">
	</div>

	<div class="col-12 col-md-6">


		<h2 class="fs-6">Nombre</h2>
		<p>Nombre: <?= $categoria->getCategoria_nombre() ?></p>

		<a href="acciones/borrar_categorias_accion.php?id=<?= $categoria->getCategoria_id() ?>" role="button" class="d-block btn btn-sm btn-danger mt-4">Eliminar</a>
	</div>



</div>