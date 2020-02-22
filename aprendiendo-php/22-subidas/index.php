<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Archivos</title>
</head>
<body>
    <h1>Subir archivos con PHP</h1>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="files">Selecciona Archivo: </label>
        <input type="file"name="files">

        <br>
        <br>

        <input type="submit" value="Enviar">
    </form>


    <h1>Listado de imagenes</h1>

    <?php
        $gestor = opendir('./images');
        if ($gestor) :
            while (($image = readdir($gestor)) != false) :
                if ($image != '.' && $image != '..') :
                    echo "<img src='images/$image' width='200px'/><br>";
                endif;
            endwhile;
        endif;
    ?>

</body>
</html>