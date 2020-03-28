<?php
$conexion = mysqli_connect("localhost", "root", "", "phpmysql");

if(mysqli_connect_errno()) {
    echo "La conexion a la base de datos mysql ha fallado" . mysqli_connect_error();
} else {
    echo "Conexion realizada correctamente!";
}

// Consulta para configurar la codificacion de caracteres
mysqli_query($conexion, "SET NAMES 'utf8'");

// COnsulta select desde php
$query  = mysqli_query($conexion, "SELECT * FROM notas");

while($nota = mysqli_fetch_assoc($query)) {
    var_dump($nota);
}


// Insertar en la base de datos desde php
$sql = "INSERT INTO notas values(null, 'Nota desde php', 'Esto es una nota de php', 'green')";
$insert = mysqli_query($conexion, $sql);

if($insert) {
    echo "Datos insertados correctamente";
} else {
    echo "Error" . mysqli_error($conexion);
}