<?php if(isset($cat) && is_object($cat)) : ?>
    <h1><?= $cat->nombre ?></h1>
    <?php if($productos->num_rows == 0) : ?>
        <strong>No hay productos para mostrar</strong>
    <?php else : ?>
        <?php while($prod = $productos->fetch_object()) : ?>
            <article class="product">
                <a href="<?= base_url ?>producto/ver?id=<?= $prod->id ?>">
                    <?php if($prod->imagen != null) : ?>
                        <img src="<?= base_url ?>uploads/images/<?= $prod->imagen ?>" alt="<?= $prod->nombre ?>">
                    <?php else : ?>
                        <img src="<?= base_url ?>assets/img/camiseta.png" alt="Producto">
                    <?php endif; ?>
                    <h2><?= $prod->nombre ?></h2>
                </a>
                <p><?= $prod->precio ?> MXN</p>
                <a href="#" class="button">Comprar</a>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
<?php else : ?>
    <h1>La categoria no existe</h1>
<?php endif; ?>