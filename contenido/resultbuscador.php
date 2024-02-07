    <?php
    
require_once "funciones/carga.php";

$datosPOST = $_POST;
$resultados = (new Mascotas())->buscador($datosPOST['busqueda']);

?>
         <div class="d-flex justify-content-center pt-4">
                        <a href="index.php" class="btn btn-primary">Volver a la página principal</a>
                    </div>

            <?php if (!empty($resultados)) { ?>
                <div class="cont">
                    <?php foreach ($resultados as $animales) { ?>
                        <div class="card row">
                            <div class="card-body">
                            <img class="position-relative zoom" src="img/<?= $animales->getImagen() ?>" alt="Imagen del producto" class="img-fluid">
                                <h2 class="card-title"><?= $animales->getNombre() ?></h2>
                                <div class="text-center">
                                <span class="mb-1 mx-1 badge tag2"><?=$animales->getCategoria()->getCategoria_nombre()?></span>
                                    <span class="mb-1 mx-1 badge tag"><?= $animales->getMascotita() ?></span>
                                    <span class="mb-1 mx-1 badge tag3"><?= $animales->getTalle() ?></span>
                                </div>
                                <p class="card-text"> <?= $animales->cantidad_palabras() ?></p>
                                <h2 class="card-title">$<?= $animales->formateoprecio() ?></h2>
                                
                                <a href="index.php?info=productos&id=<?= $animales->getId() ?>" class="btn botoncolor btn-primary w-100 fw-bold">VER MAS</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <?php } else {?>
                <div>
                    <h2>No se encontraron productos</h2>
                </div>
                <?php } ?>