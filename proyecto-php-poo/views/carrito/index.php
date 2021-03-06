<h1>Carrito de compra</h1>

<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
    </tr>

    <?php foreach($carrito as $indece => $elemento) : 
        $producto = $elemento['producto'];
    ?>
        <tr>
            <td>
                <?php if($producto->imagen != null) : ?>
                    <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" alt="<?= $producto->nombre ?>" class="img_carrito">
                <?php else : ?>
                    <img src="<?= base_url ?>assets/img/camiseta.png" alt="Producto" class="img_carrito">
                <?php endif; ?>
            </td>
            <td>
                <a href="<?= base_url ?>producto/ver?id=<?= $producto->id ?>">
                    <?= $producto->nombre ?></td>
                </a>
            <td><?= $producto->precio ?></td>
            <td><?= $elemento['unidades'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<br>
<div class="total_carrito">
    <?php $stats = Utils::statsCarrito(); ?>
    <h3>Precio total: $ <?= $stats['total'] ?> MXN.</h3>
    
    <a href="<?= base_url ?>pedido/hacer" class="button button-pedido">Hacer pedido</a>
</div>