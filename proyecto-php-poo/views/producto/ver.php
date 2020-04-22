<?php if(isset($pro) && is_object($pro)) : ?>
    <h1><?= $pro->nombre ?></h1>
    <article id="detail-product">
        <div class="imagen">
            <?php if($pro->imagen != null) : ?>
                <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>" alt="<?= $pro->nombre ?>">
            <?php else : ?>
                <img src="<?= base_url ?>assets/img/camiseta.png" alt="Producto">
            <?php endif; ?>
        </div>
        <div class="datos">
            <p class="description"><?= $pro->descripcion ?></p>
            <p class="price"><?= $pro->precio ?> MXN</p>
            <a href="<?= base_url ?>carrito/add?id=<?= $pro->id ?>" class="button">Comprar</a>
        </div>
    </article>
    
<?php else : ?>
    <h1>El producto no existe</h1>
<?php endif; ?>