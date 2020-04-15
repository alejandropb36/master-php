<h1>Gestion de productos</h1>

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
            <td></td>
        </tr>
    <?php endwhile; ?>

</table>