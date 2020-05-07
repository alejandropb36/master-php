<?php if(isset($gestion)) : ?>
    <h1>Gestion de pedidos</h1>
<?php else: ?>
     <h1>Mis pedidos</h1>
<?php endif; ?>
<table>
    <tr>
        <th>Numero de pedido</th>
        <th>Coste</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Estado</th>
    </tr>
    <?php while ($pedido = $pedidos->fetch_object()) : ?>
        <tr>
            <td>
                <a href="<?= base_url ?>pedido/detalle?id=<?= $pedido->id ?>">
                    <?= $pedido->id ?>
                </a>
            </td>
            <td>$<?= $pedido->coste ?> MXN</td>
            <td><?= $pedido->fecha ?></td>
            <td><?= $pedido->hora ?></td>
            <td><?= Utils::showStatus($pedido->estado) ?></td>
        </tr>
    <?php endwhile; ?>
</table>