<?php
require_once "funciones/carga.php";


$carrito = new Carrito();
$items = $carrito->get_carrito();
?>

<h1 class="text-center fs-2 my-5"> Carrito de Compras</h1>
<div class="container my-4">

    <?php if (count($items)) { ?>
        <form action="admin/acciones/update_acci.php" method="POST">

            <table class="table">

                <thead>
                    <tr>
                        <th scope="col" width="15%">Imagen</th>
                        <th scope="col">Datos del producto</th>
                        <th scope="col" width="15%">Cantidad</th>
                        <th class="text-end" scope="col" width="15%">Precio</th>
                        <th class="text-end" scope="col" width="15%">Subtotal</th>
                        <th class="text-end" scope="col" width="10%">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $key => $item) { ?>
                        <tr>
                            <td><img class="zoom" src="img/<?= $item['imagen'] ?>" class="card-img-top" alt="<?= $item['nombre'] ?>"></td>

                            <td class="align-middle">
                                <h2 class="card-title"><?= $item['nombre'] ?></h2>
                            </td>
                            <td class="align-middle">
                                <label for="q_<?= $key ?>" class="visually-hidden">Cantidad</label>
                                <input type="number" class="form-control" value="<?= $item['cantidad'] ?>" id="q_<?= $key ?>" name="q[<?= $key ?>]">
                            </td>
                            <td class="text-end align-middle">
                                <p class="h5 py-3">$<?= number_format($item['precio'], 2, ",", ".") ?></p>
                            </td>
                            <td class="text-end align-middle">
                                <p class="h5 py-3">$<?= number_format($item['cantidad'] * $item['precio'], 2, ",", ".") ?></p>
                            </td>
                            <td class="text-end align-middle">
                                <a href="admin/acciones/remove_acci.php?id=<?= $key ?>" class="btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>

                    <tr>
                        <td colspan="4" class="text-end">
                            <h2 class="h5 py-3">Total:</h2>
                        </td>
                        <td class="text-end">

                            <p class="h5 py-3">$<?= number_format($carrito->precio_total(), 2, ",", ".") ?></p>

                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <div class="d-flex justify-content-end gap-2">
                <input type="submit" value="Actualizar Cantidades" class="btn btn-warning">
                <a href="index.php?info=total" role="button" class="btn btn-warning">Seguir comprando</a>
                <a href="admin/acciones/clear_acci.php" role="button" class="btn btn-danger">Vaciar Carrito</a>
                <a href="index.php?info=finalizar" role="button" class="btn btn-primary">Comprar</a>
            </div>

        </form>
    <?php } else { ?>
        <h2 class="text-center mb-5 text-danger">Su carrito está vacío</h2>
    <?php } ?>

</div>
