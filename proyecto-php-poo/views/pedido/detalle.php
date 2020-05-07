<?php if(isset($pedido)) : ?>
    <h1>Detalle del pedido No. </h1>
    
    <?php if(isset($_SESSION['admin'])) : ?>
        <h3>Cambiar estado</h3>
        <form action="<?= base_url ?>pedido/estado" method="POST">
            <input type="hidden" value="<?=$pedido->id?>" name="id">
            <select name="estado">
                <option value="confirm" <?= $pedido->estado == 'confirm' ? 'selected' : ''; ?>>Pendiente</option>
                <option value="preparation" <?= $pedido->estado == 'preparation' ? 'selected' : ''; ?>>En preparacion</option>
                <option value="ready" <?= $pedido->estado == 'ready' ? 'selected' : ''; ?>>Preaparado</option>
                <option value="sended" <?= $pedido->estado == 'sended' ? 'selected' : ''; ?>>Enviado</option>
            </select>
            <input type="submit" value="Enviar">
        </form>
        <br>
    <?php endif; ?>
    <h3>Direccion de envio</h3>
    Provincia : <?= $pedido->provincia ?> <br>
    Ciudad : <?= $pedido->localidad ?> <br>
    Direccion : <?= $pedido->direccion ?> <br>
    <h3>Datos del pedido</h3>
    Estado: <?= Utils::showStatus($pedido->estado) ?> <br>
    Numero de pedido: <?= $pedido->id ?> <br>
    Total a pagar: <?= $pedido->coste ?> <br>
    Productos: <br>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
        <?php while ($producto = $productos->fetch_object()) : ?>
            <tr>
                <td>
                    <?php if ($producto->imagen != null) : ?>
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
                <td><?= $producto->unidades ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <h1>El pedido no existe</h1>
<?php endif; ?>
