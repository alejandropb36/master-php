<?php

// $archivo = fopen("fichero_texto.txt", "a+");
// while (!feof($archivo)) {
//     $contenido = fgets($archivo);
//     echo $contenido;
//     echo "<br>";
// }

// fwrite($archivo, "Soy un texto escrito desde php");

// fclose($archivo);

// copiar
// copy("fichero_texto.txt", "fichero_copiado.txt") or die("Error al copiar");

// Renombrar
//rename ("fichero_copiado.txt", "fichero_renombrado.txt");

// Eliminar
//unlink("fichero_renombrado.txt");

if (file_exists("fichero_t2exto.txt")) {
    echo "<h1> El fichero si existe!!! </h1>";
}
else {
    echo "<h1> El fichero no existe!!! </h1>";
}