<?php
require_once 'models/Producto.php';
class carritoController {

    public function index() {
        var_dump($_SESSION['carrito']);
    }

    public function add(){
        if(isset($_GET['id'])){
            $producto_id = $_GET['id'];
        }else{
            header('Location:'.base_url);
        }
        
        if(isset($_SESSION['carrito'])){
            $counter = 0;
            foreach($_SESSION['carrito'] as $indice => $elemento){
                if($elemento['id_producto'] == $producto_id){
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }   
        }
        
        if(!isset($counter) || $counter == 0){
            // Conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();
 
            // Añadir al carrito
            if(is_object($producto)){
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }
        
        header("Location:".base_url."carrito/index");
    } 

    public function remove() {
        
    }

    public function delete() {
        Utils::deleteSesion('carrito');
        header("Location:" . base_url . "carrito/index");
    }
}