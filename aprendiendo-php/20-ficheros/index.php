<?php

$archivo = fopen("fichero_texto.txt", "a+");
while (!feof($archivo)) {
    $contenido = fgets($archivo);
    echo $contenido;
    echo "<br>";
}

fwrite($archivo, "Soy un texto escrito desde php");

fclose($archivo);