<h1>Gestion de productos</h1>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete') : ?>
    <strong class="alert_green">Se ha creado el producto exitosamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] == 'failed') : ?>
    <strong class="alert_red">Ha ocurrido un error al crear el producto</strong>
<?php endif; ?>
<?php if(isset($_SESSION['producto-eliminar']) && $_SESSION['producto-eliminar'] == 'complete') : ?>
    <strong class="alert_green">Se ha eliminado el producto exitosamente</strong>
<?php elseif(isset($_SESSION['producto-eliminar']) && $_SESSION['producto-eliminar'] == 'failed') : ?>
    <strong class="alert_red">Ha ocurrido un error al eliminar el producto</strong>
<?php endif; ?>
<?php Utils::deleteSesion('producto'); Utils::deleteSesion('producto-eliminar'); ?>
<a href="<?= base_url ?>producto/crear" class="button button-small">
    Crear nuevo producto
</a>

<table>
    <tr>
        <th>Id</th>
        <th>Categoria</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Oferta</th>
        <th>Fecha</th>
        <th>Imagen</th>
        
        <th>Opciones</th>
    </tr>

    <?php while($prod = $productos->fetch_object()) : ?>
        <tr>
            <td><?= $prod->id ?></td>
            <td><?= $prod->categoria_id ?></td>
            <td><?= $prod->nombre ?></td>
            <td><?= $prod->descripcion ?></td>
            <td><?= $prod->precio ?></td>
            <td><?= $prod->stok ?></td>
            <td><?= $prod->oferta ?></td>
            <td><?= $prod->fecha ?></td>
            <td><?= $prod->imagen ?></td>
            <td>
                <a href="<?= base_url ?>producto/delete?id=<?= $prod->id ?>" class="button button-small danger"> Eliminar</a>
                <a href="<?= base_url ?>producto/editar?id=<?= $prod->id ?>" class="button button-small warning"> Editar</a>
            </td>
        </tr>
    <?php endwhile; ?>

</table>