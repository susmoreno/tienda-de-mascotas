
<?php 
require_once "funciones/carga.php";

$Selec = isset($_GET['pro']) ? $_GET['pro'] : FALSE;

$miobjetomascota = new Mascotas();
$catalogo = $miobjetomascota->cada_producto($Selec);

?>


<h1 class="text-center"> <?=ucwords($Selec)?></h1>



<?php if(!empty($catalogo)){?>
<div class="cont">


<?php foreach ($catalogo as $animales){ ?>

<div class="card row">
<img class="zoom" src="img/<?= $animales->getImagen() ?>" class="card-img-top" alt="<?= $animales->getNombre() ?>">
<div class="card-body">
  <h2 class="card-title"><?=$animales->getNombre() ?></h2>
  <div class="text-center">
  <span class="mb-1 mx-1 badge tag2"><?=$animales->getCategoria()->getCategoria_nombre()?></span>
      <span class="mb-1 mx-1 badge tag"><?=$animales->getMascotita()?></span>
      <span class="mb-1 mx-1 badge tag3"><?=$animales->getTalle()?></span>
      </div>
  <p class="card-text"> <?=$animales->cantidad_palabras()?></p>
  <h2 class="precio">$<?=$animales->formateoprecio()?></h2>
  <a href="index.php?info=productos&id=<?= $animales->getId() ?>" class="btn botoncolor w-100 fw-bold">VER MAS</a>
  </div>
</div>
<?php }?>

<?php } else { ?>
  <div>
    <h2>No se encontraron productos</h2>
  </div>
</div>
  <?php }?>