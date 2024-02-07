<?php
require_once "../funciones/carga.php";


$marcas = (new Marcas())->todas_marcas();
$alertas = new Alertas();
echo $alertas->get_alertas();
?>

<div class="container my-5">
    <h1 class="text-center mb-5 fw-bold">Administración de Marcas</h1>
    <div class="row mb-5 d-flex align-items-center">
        <div class="table-responsive">
            <table class="table table-custom">
                <thead>
                    <tr>
                        <th scope="col" width="15%">Imágen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col" class="d-none d-lg-table-cell" width="45%">Descripción</th>
                        <th scope="col" class="d-none d-sm-table-cell" width="35%">Creador</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($marcas as $mc) { ?>
                        <tr>
                            <td><img src="../img/<?= $mc->getMarca_imagen() ?>" alt="Imágen Illustrativa de <?= $mc->getMarca_nombre() ?>" class="img-fluid img-fluid-custom rounded shadow-sm"></td>
                            <td ><?= $mc->getMarca_nombre() ?></td>
                            <td class="d-none d-sm-table-cell"><?= $mc->getMarca_descripcion() ?></td>
                            <td class="d-none d-lg-table-cell"><?= $mc->getMarca_creador() ?></td>
                            <td>
                                <a href="index.php?sec=edit_marcas&id=<?= $mc->getMarca_id() ?>" role="button" class="btn btn-sm btn-warning btn-action">Editar</a>
                                <a href="index.php?sec=borrar_marcas&id=<?= $mc->getMarca_id() ?>" role="button" class="btn btn-sm btn-danger btn-action">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

      
            <a href="index.php?sec=add_marcas"  class="btn btn-primary mt-5 col-12 m-4"> Cargar una nueva marca</a>
    
    
    </div>
</div>
