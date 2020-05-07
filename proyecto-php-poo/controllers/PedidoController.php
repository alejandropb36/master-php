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

                    $saveLineas = $pedido->saveLinea();
                    
                    if($save && $saveLineas){
                        $_SESSION['pedido'] = "complete";
                    } else {
                        $_SESSION['pedido'] = "failed";
                    }
                } else {
                    $_SESSION['pedido'] = "failed";
                }
            }
            header("Location:" . base_url . "pedido/confirmado");
        } else {
            header("Location:" . base_url);
        }
    }

    public function confirmado() {
        Utils::isAuthenticate();
        if(isset($_SESSION['identity'])) {
            $identity = $_SESSION['identity'];
            $pedido = new Pedido();
            $pedido->setUsuario_id($identity->id);
            $pedido = $pedido->getOneByUser();

            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($pedido->id);
            
        }

        require_once 'views/pedido/confirmado.php';
    }
    
    public function mispedidos() {
        Utils::isAuthenticate();
        $identity = $_SESSION['identity'];
        $pedido = new Pedido();
        $pedido->setUsuario_id($identity->id);
        $pedidos = $pedido->getAllByUser();
        require_once 'views/pedido/mis_pedidos.php';
    }
    
    public function detalle() {
        Utils::isAuthenticate();
        
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido = $pedido->getOne();

            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($pedido->id);
            
            require_once 'views/pedido/detalle.php';
        } else {
            header('Location:' . base_url . 'pedido/mispedidos');
        }
    }
    
    public function gestion() {
        Utils::isAdmin();
        $gestion = true;
        $pedido = new Pedido();
        $pedidos = $pedido->getAll();
        require_once 'views/pedido/mis_pedidos.php';
    }
    
    public function estado() {
        Utils::isAdmin();
        if(isset($_POST)) {
            $id = $_POST['id'];
            $estado = $_POST['estado'];
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setEstado($estado);
            $pedido->edit();
            header('Location:' . base_url . 'pedido/detalle?id=' . $id);
        } else {
            header('Location:' . base_url);
        }
    }
}