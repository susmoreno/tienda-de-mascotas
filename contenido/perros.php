<?php
require_once "funciones/carga.php";

$perros = 'Perros';  // Cambia esto según tu lógica para obtener el tipo 'Perros'
$miObjetoMascotas = new Mascotas();
$catalogo = $miObjetoMascotas->filtrarPorTipo($perros);

?>
<h1 class="text-center">Productos para Perritos</h1>

<?php if (!empty($catalogo)): ?>
    <div class="cont">
        <?php foreach ($catalogo as $producto): ?>
            <div class="card row">
                <img class="position-relative zoom" src="img/<?= $producto->getImagen() ?>" class="card-img-top" alt="<?= $producto->getNombre() ?>">
                <div class="card-body">
                    <h2 class="card-title"><?= $producto->getNombre() ?></h2>
                    <div class="text-center">
                    <span class="mb-1 mx-1 badge tag2"><?=$producto->getCategoria()->getCategoria_nombre()?></span>
                        <span class="mb-1 mx-1 badge tag"><?= $producto->getMascotita() ?></span>
                        <span class="mb-1 mx-1 badge tag3"><?= $producto->getTalle() ?></span>
                    </div>
                    <p class="card-text p-1"><?= $producto->cantidad_palabras() ?></p>
                    <h2 class="precio">$<?= $producto->formateoprecio() ?></h2>
                    <a href="index.php?info=productos&id=<?= $producto->getId() ?>" class="btn botoncolor w-100 fw-bold">VER MAS</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div>
        <h2>No se encontraron productos</h2>
        
    </div>
<?php endif; ?>
