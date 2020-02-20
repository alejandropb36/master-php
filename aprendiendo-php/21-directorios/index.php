<?php

if (!is_dir('mi_carpeta')) {
    mkdir('mi_carpeta', 0777) or die("No se puede crear la carpeta");
}
else {
    echo 'La carpeta ya existe' . '<br/>';
}

// rmdir('mi_carpeta');

if ($gestor = opendir('./mi_carpeta')) {
    while (false !== ($archivo = readdir($gestor))) {
        if ($archivo != '.' &&  $archivo != '..') {
            echo $archivo . '<br/>';
        }
    }
}