<?php

$error = true;

if (empty($_POST['nombre']) && empty($_POST['apellidos'])
    && empty($_POST['edad']) && empty($_POST['email'])
    && empty($_POST['passsword'])) 
{
    $error = false;
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];
    $password = $_POST['password'];
}
else
{
    $error = true;
    $message  = "Faltan varibles del formulario";
    header("Location:index.php?error=$message");
}


?>

<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Validación de formulario</title>
    </head>
    <body>
        
    </body>
</html>