
<h3><?= $nota->nombre ?></h3>
<h4><?= $nota->contenido ?></h4>

<h1>Listado de notas</h1>

<?php while($note = $notas->fetch_object()) : ?>
    <?= $note->titulo?> - <?= $note->fecha?> <br>
<?php endwhile; ?>
