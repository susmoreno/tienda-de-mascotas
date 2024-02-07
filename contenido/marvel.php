<?php
require_once "funciones/carga.php";
$especial = $_GET['info'] ?? FALSE;

$miObjetomascotas = new Mascotas();
$marvelProductos = $miObjetomascotas->productos_marvel($especial);

//  echo "<pre>";
//  print_r($marvelProductos);
//  echo "</pre>";
?>

<h1 class=" text-center">Productos Marvel</h1>
<?php if(!empty($marvelProductos)){?>
    <div class="cont">
    
    
    <?php foreach ($marvelProductos as $producto){ ?>
    
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



