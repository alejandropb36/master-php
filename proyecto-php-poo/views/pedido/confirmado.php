<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') : ?>
    <h1>Tu pedido se ha confirmado</h1>
    <p>
        Tu pedidoha sido guardado con exito, una vez que realices la transferencia bancaria
        sera procesado y enviado.
    </p>

    <h3>Datos del pedido</h3>
<?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete') : ?>
    <h1>Tu pedido no ha podido completarse</h1>

<?php endif; ?>