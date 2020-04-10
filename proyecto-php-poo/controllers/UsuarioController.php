<?php

require_once 'models/Usuario.php';

class usuarioController {

    public function index() {
        echo "Controlador de usuarios, accion index";
    }

    public function registro() {
        require_once 'views/usuario/registro.php';
    }

    public function save() {
        if(isset($_POST)) {
            $name = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if($name && $apellidos && $email && $password) {
                $usuario = new Usuario();
    
                $usuario->setNombre($name);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                $save = $usuario->save();
                if($save) {
                    $_SESSION['register'] = "complete";
                    
                } else {
                    $_SESSION['register'] = "failed";
                }
            } else {
                $_SESSION['register'] = "failed";
            }
        } else {
            $_SESSION['register'] = "failed";
        }
        header("Location:" . base_url . 'usuario/registro');
    }

    public function login() {
        if(isset($_POST)) {
            $usuario = new Usuario();
            $identity = $usuario->login($_POST['email'], $_POST['password']);

            if($identity &&  is_object($identity)) {
                $_SESSION['identity'] = $identity;

                if($identity->rol == 'admin') {
                    $_SESSION['admin'] = true; 
                }
            } else {
                $_SESSION['error_login'] = 'Identificacion fallida';
            }
        }
        header("Location:" .base_url);
    }

    public function logout() {
        Utils::deleteSesion('identity');
        Utils::deleteSesion('error_login');
        Utils::deleteSesion('admin');
        header("Location:" .base_url);
    }
}