<?php if(isset($edit)) : ?>
    <h1>Editar producto</h1>
<?php else : ?>
    <h1>Crear producto</h1>
<?php endif; ?>


<div class="form_container">
    <form action="<?= base_url ?>producto/save" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" required>
    
        <label for="descripcion">Descripcion: </label>
        <textarea type="text" name="descripcion"></textarea> 
    
        <label for="precio">Precio: </label>
        <input type="text" name="precio" required> 
    
        <label for="stock">Stok: </label>
        <input type="number" name="stock" required> 
    
        <label for="categoria">Categoria: </label>
        <?php $categorias = Utils::showCategorias(); ?>
        <select name="categoria" id="categoria">
            <?php while($cat = $categorias->fetch_object()) : ?>
                <option value="<?= $cat->id ?>"><?= $cat->nombre ?></option>
            <?php endwhile; ?>
        </select>
    
        <label for="imagen">Imagen: </label>
        <input type="file" name="imagen" > 
    
        <input type="submit" value="Guardar">
    </form>
</div>
