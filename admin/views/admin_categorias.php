<?php
require_once "../funciones/carga.php";

$categoria = (new Categoria())->getCategorias_tablas();
$alertas = new Alertas();
echo $alertas->get_alertas();
?>

<div class="container my-5">
    <h1 class="text-center mb-5 fw-bold">Administración de Categorías</h1>
    <div class="row mb-5 d-flex align-items-center">
        <div class="table-responsive">
            <table class="table table-custom">
                <thead>
                    <tr>
                        <th scope="col" width="40%">Imágen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categoria as $c) { ?>
                        <tr>
                            <td><img src="../img/<?= $c->getCategoria_imagen() ?>" alt="Imágen Illustrativa de <?= $c->getCategoria_nombre() ?>" class="img-fluid img-fluid-custom rounded shadow-sm"></td>
                            <td><?= $c->getCategoria_nombre() ?></td>
                            <td>
                                <a href="index.php?sec=edit_categorias&id=<?= $c->getCategoria_id() ?>" role="button" class="btn btn-sm btn-warning btn-action">Editar</a>
                                <a href="index.php?sec=borrar_categorias&id=<?= $c->getCategoria_id() ?>" role="button" class="btn btn-sm btn-danger btn-action">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

            <a href="index.php?sec=add_categorias"  class="btn btn-primary mt-5 col-12 m-4"> Cargar una nueva Categoría</a>
       
    </div>
</div>
