<?php if(Utils::isAuthenticate()) : ?>
    <h1>Hacer pedido</h1>
    <p>
        <a href="<?= base_url ?>carrito/index">Ver los productos y precio del pedido</a>
    </p>

    <br>

    <h3>Dirección para el envio: </h3>
    <form action="<?= base_url ?>pedido/add" method="POST">
        <label for="provincia">Provincia: </label>
        <input type="text" name="provincia" id="provincia" required>

        <label for="ciudad">Ciudad: </label>
        <input type="text" name="ciudad" id="ciudad" required>

        <label for="direccion">Dirección: </label>
        <input type="text" name="direccion" id="direccion" required>

        <input type="submit" value="Confirmar pedido">

    </form>

<?php else : ?>
    <h1>Necesitas estar identificado</h1>
    <p>Necesitas estar logueado para poder realizar tu pedido en la web</p>

<?php endif; ?>