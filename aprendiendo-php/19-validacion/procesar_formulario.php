<?php

$error = true;

if (!empty($_POST['nombre']) && !empty($_POST['apellidos'])
    && !empty($_POST['edad']) && !empty($_POST['email'])
    && !empty($_POST['password'])) 
{
    $error = false;
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!is_string($nombre) || !preg_match("/[A-Za-z]+/", $nombre)) {
        $error = true;
        $message = 'Nombre';    
    }
    if (!is_string($apellidos) || !preg_match("/[A-Za-z]+/", $apellidos)) {
        $error = true;
        $message = 'Apellidos';    
    }
    if (!is_numeric($edad) || !filter_var($edad, FILTER_VALIDATE_INT)) {
        $error = true;
        $message = 'Edad';    
    }
    if (!is_int($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $message = 'Email';    
    }
    if (strlen($password) < 5) {
        $error = true;
        $message = 'Password';    
    }
}
else
{
    $error = true;
    $message  = "Faltan varibles del formulario";
}

if ($error) {
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
        <?php if (!$error) : ?>
            <h1>Datos validados correctamente</h1>
            <p> <?= $nombre ?> </p>
            <p> <?= $apellidos ?> </p>
            <p> <?= $edad ?> </p>
            <p> <?= $email ?> </p>
        <?php endif; ?>
        
    </body>
</html>