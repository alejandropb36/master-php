<?php
if (isset($_POST)) {
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $surname = isset($_POST['surname']) ? $_POST['surname'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    
    $errors = array();
    
    if (!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)) {
        $validName = true;
    } else {
        $validName = false;
        $errors['name'] = "El nombre no es valido";  
    }
    
    if (!empty($surname) && !is_numeric($surname) && !preg_match("/[0-9]/", $surname)) {
        $validSurname = true;
    } else {
        $validSurname = false;
        $errors['surname'] = "El apellido no es valido";  
    }
    
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $validEmail = true;
    } else {
        $validEmail = false;
        $errors['email'] = "El email no es valido";  
    }
    
    if (!empty($password)) {
        $validPassword = true;
    } else {
        $validPassword = false;
        $errors['password'] = "El password no es valido";  
    }
    
    $guardar_usuario = false;
    if(count($errors) == 0) {
        $guardar_usuario = true;
        
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
    } else {
        $_SESSION['errors'] = $errors;
        header('Location: index.php');
    }
}

