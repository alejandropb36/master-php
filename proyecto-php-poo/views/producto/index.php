<h1>Algunos de nuestros productos</h1>

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