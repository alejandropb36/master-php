<?php

$file = $_FILES['files'];

$nombre = $file['name'];
$tipo = $file['type'];


if ($tipo == 'image/jpg' || $tipo == 'image/jpeg' || $tipo == 'image/png') {
    if (!is_dir('images')) {
        mkdir('images', 0777);
    }

    move_uploaded_file($file['tmp_name'], 'images/' . $nombre);

    header("Refresh: 5; URL=index.php");
    if (file_exists('images/' . $nombre)) {
        echo "<h1>El archivo se subio correctamente</h1>";
    }
    else {
        echo "<h1>El archivo no se subio correctamente</h1>";
    }
}
else {
    header("Refresh: 5; URL=index.php");
    echo "<h1>No es un archivo valido ...</h1>";
}
