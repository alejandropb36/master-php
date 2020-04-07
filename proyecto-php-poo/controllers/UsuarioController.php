<?php 

class usuarioController {

    public function index() {
        echo "Controlador de usuarios, accion index";
    }

    public function registro() {
        require_once 'views/usuario/registro.php';
    }
}