<h1 class="text-center">Compra Exitosa</h1>


<?php
require_once "funciones/carga.php";

$carrito = new Carrito();
$items = $carrito->get_carrito();
$carrito->clear_items();
?>

<div class="container-pago text-center">

    <p>¡Gracias por su compra! Su pedido ha sido procesado con éxito.</p>

    <h2>Detalles de la compra:</h2>
    <ul class="product-list">
        <?php foreach ($items as $item) : ?>
            <li class="product-item">
                <strong>Producto:</strong> <?= $item['nombre'] ?>, 
                <strong>Cantidad:</strong> <?= $item['cantidad'] ?>, 
                <strong>Precio Unitario:</strong> $<?= number_format($item['precio'], 2, ",", ".") ?>, 
                <strong>Subtotal:</strong> $<?= number_format($item['cantidad'] * $item['precio'], 2, ",", ".") ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <p>Se le enviará un correo electrónico con la factura de su compra.</p>

    <div class="d-flex justify-content-center">
        <a href="index.php" class="btn btn-primary">Volver a la página principal</a>
    </div>
</div>

