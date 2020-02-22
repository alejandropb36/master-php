<?php


if(isset($_GET['titulo']) && isset($_GET['descripcion'])) {
    echo "<h1>" . $_GET['titulo'] . "</h1>";
    echo $_GET['descripcion'];
}

if(isset($_POST['titulo']) && isset($_POST['descripcion'])) {
    echo "<h1>" . $_POST['titulo'] . "</h1>";
    echo $_POST['descripcion'];
}