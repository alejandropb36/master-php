<?php
require_once 'models/Producto.php';
class carritoController {

    public function index() {
        var_dump($_SESSION['carrito']);
        echo "Controlador de pedido, accion index";
    }

    public function add() {

        if(isset($_GET['id'])) {
            $producto_id = $_GET['id'];
            echo "<h1> Holi id: $producto_id  </h1>";
            if(!isset($_SESSION['carrito'])) {
                $_SESSION['carrito'];
            }
            $producto = new Producto();
            $producto->setId($producto_id);
            $product = $producto->getOne();

            if(is_object($product)) {
                $_SESSION['carrito'][] = array (
                    "id_producto" => $product->id,
                    "precio" => $product->precio,
                    "unidades" => 1,
                    "producto" => $product
                );
            }
        }

        header("Location:" . base_url . "carrito/index");
    }

    public function remove() {
        
    }

    public function delete() {
        Utils::deleteSesion('carrito');
        header("Location:" . base_url . "carrito/index");
    }
}