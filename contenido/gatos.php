<?php
require_once "funciones/carga.php";
$gatos = $_GET['info'] ?? FALSE;

$gatosproductos = (new Mascotas())->filtrarPorTipo($gatos);



?>

<h1 class="text-center">Productos para Gatitos</h1>


<?php if(!empty($gatosproductos)){?>
    <div class="cont">
    
    
    <?php foreach ($gatosproductos as $producto){ ?>
    
      <div class="card row">
    <img class="zoom" src="img/<?= $producto->getImagen()?>" class="card-img-top" alt="<?= $producto->getNombre() ?>">
      <div class="card-body">
      <h2 class="card-title"><?=$producto->getNombre()?></h2>
      <div class="text-center">
      <span class="mb-1 mx-1 badge tag2"><?=$producto->getCategoria()->getCategoria_nombre()?></span>
      <span class="mb-1 mx-1 badge tag"><?=$producto->getMascotita()?></span>
      <span class="mb-1 mx-1 badge tag3"><?=$producto->getTalle()?></span>
      </div>
      <p class="card-text"> <?=$producto->cantidad_palabras()?></p>
      <h2 class="card-title">$<?=$producto->formateoprecio()?></h2>
      <a href="index.php?info=productos&id=<?= $producto->getId()?>" class="btn botoncolor w-100 fw-bold">VER MAS</a>
      </div>
    </div>
    <?php }?>
    
    <?php } else { ?>
      <div>
        <h2>No se encontraron producto</h2>
      </div>
    </div>
      <?php }?>
