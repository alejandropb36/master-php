<?php 

class pedidoController {

    public function index() {
        echo "Controlador de pedido, accion index";
    }

    public function hacer() {
        require_once 'views/pedido/hacer.php';
    }

    public function add() {
        if(Utils::isAuthenticate()) {
            if(isset($_POST)) {
                
            }

        } else {
            header("Location:" . base_url);
        }
    }
}