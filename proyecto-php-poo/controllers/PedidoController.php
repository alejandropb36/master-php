<?php 

require_once 'models/Pedido.php';

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
                $usuario_id = $_SESSION['identity']->id;
                $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
                $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : false;
                $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
                $stats = Utils::statsCarrito();
                
                if($provincia && $ciudad && $direccion) {
                    $pedido = new Pedido();
                    $pedido->setProvincia($provincia);
                    $pedido->setLocalidad($ciudad);
                    $pedido->setDireccion($direccion);
                    $pedido->setUsuario_id($usuario_id);
                    $pedido->setCoste($stats['total']);
                    $save = $pedido->save();
                    
                    if($save){
                        $_SESSION['pedido'] = "complete";
                    } else {
                        $_SESSION['pedido'] = "failed";
                    }
                } else {
                    $_SESSION['pedido'] = "failed";
                }
            }

        } else {
            header("Location:" . base_url);
        }
    }
}