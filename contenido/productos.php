<?php
require_once "funciones/carga.php";
$id = $_GET['id'] ?? FALSE;
$miObjetoMascotas = new Mascotas();
$animales = $miObjetoMascotas->producto_id($id);

// echo "<pre>";
// print_r($animales);
// echo "</pre>";
?>

<h1 class="text-center">Toda la información</h1>

<div class="productos">
    <?php if (!empty($animales)) { ?>
        <img src="img/<?= $animales->getImagen() ?>" class="fondoproduc" alt="<?= $animales->getNombre() ?>">

        <div class="vermas">
            <h2>Producto <?= $animales->getNombre() ?></h2>
            <p><?= $animales->getDescripcion() ?></p>
                <p><strong>Color:</strong> <?= $animales->getColor() ?></p>
                <p><strong>Tamaño:</strong> <?= $animales->getTalle() ?></p>
                <p><strong>Material:</strong> <?= $animales->getMaterial() ?></p>
        
            <p><strong>Ingreso:</strong> <?= $animales->getFecha() ?></p>
            <p><strong>Tipo de mascota:</strong></p>

            <ul class="list-group list-group-flush d-flex gap-3 flex-row">
                                        <?PHP foreach ($animales->getTipo() as $tipo) { ?>
                                        <li class="list-group-item border-0 px-0 text-style"><?= $tipo->getTipo(); ?></li>
                                        <?PHP } ?>
                                    </ul>

            <h3>$<?= number_format($animales->getPrecio(), 2, ",", ".") ?></h3>
          

            <form action="admin/acciones/add_acci.php" method="GET" class="row">
          <div>
         <label for="q" class="fw-bold me-2">Cantidad: </label>
       <input type="number" class="form-control" value="1" name="q" id="q">
      </div>
    <div >
   <input type="submit" value="AGREGAR AL CARRITO" class="btn btn-primary w-100 fw-bold">
 <input type="hidden" value="<?= $id ?>" name="id" id="id">

</div>
</form>

        </div>

    <?php } else { ?>
        <div class="col">
            <h2 class="text-center m-5">No se encontró el producto deseado.</h2>
        </div>
    <?php } ?>
</div>
