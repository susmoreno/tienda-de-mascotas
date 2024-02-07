<?php
require_once "../funciones/carga.php";

$mascotas = (new Mascotas())->catalogo_completo();
$alertas = new Alertas();
echo $alertas->get_alertas();
?>

<div class="row my-5">
    <div class="col">

        <h1 class="text-center mb-5 fw-bold">Administración de Productos</h1>
        
        <div class="row mb-5 d-flex align-items-center">
            <table class="table table-custom">
                <!-- Encabezado de la tabla -->
                <thead>
                    <tr>
                        <th scope="col" width="15%">Imagen</th>
                        <th scope="col" width="15%">Nombre</th>
                        <th scope="col" class="d-none d-lg-table-cell">Marca</th>
                        <th scope="col" class="d-none d-sm-table-cell">Descripción</th>
                        <th scope="col" class="d-none d-lg-table-cell">Tipo</th>
                        <th scope="col" class="d-none d-lg-table-cell">Material</th>
                        <th scope="col" class="d-none d-lg-table-cell">Color</th>
                        <th scope="col" class="d-none d-sm-table-cell">Precio</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mascotas as $m) { ?>
                        <tr>
                            <td><img src="../img/<?= $m->getImagen() ?>" alt="Imágen Illustrativa de <?= $m->getNombre() ?>" class="img-fluid img-fluid-custom rounded shadow-sm"></td>
                            <td><?= $m->getNombre() ?></td>
                            <td class="d-none d-lg-table-cell"><?= $m->getMarca()->getMarca_nombre()?></td>
                            <td class="d-none d-sm-table-cell d-lg-table-cell"><?= $m->getDescripcion() ?></td>
                            <td class="d-none d-lg-table-cell"> <!-- Agrega tu diseño personalizado aquí --> hola </td>
                            <td class="d-none d-lg-table-cell"><?= $m->getMaterial() ?></td>
                            <td class="d-none d-lg-table-cell"><?= $m->getColor() ?></td>
                            <td class="d-none d-sm-table-cell">$<?= $m->getPrecio() ?></td>
                            <td>
                                <a href="index.php?sec=edit_productos&id=<?= $m->getId() ?>" role="button" class="btn btn-sm btn-warning btn-action">Editar</a>
                                <a href="index.php?sec=borrar_productos&id=<?= $m->getId() ?>" role="button" class="btn btn-sm btn-danger btn-action">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <a href="index.php?sec=add_productos" class="btn btn-primary mt-5 col-12 m-4"> Cargar Producto</a>

        </div>
    </div>
</div>
