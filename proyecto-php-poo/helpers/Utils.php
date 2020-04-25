<?php

class Utils {
    public static function deleteSesion($name) {
        if(isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
    }

    public static function isAdmin() {
        if(!isset($_SESSION['admin'])) {
            header("Location:" . base_url);
        } else {
            return true;
        }
    }

    public static function isAuthenticate() {
        if(isset($_SESSION['identity']))
            return true;
        return false;
    }

    public static function showCategorias() {
        require_once 'models/Categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        return $categorias;
    }

    public static function statsCarrito() {
        $stats = array(
            'count' => 0,
            'total' => 0
        );
        if(isset($_SESSION['carrito'])) {
            $stats['count'] = count($_SESSION['carrito']);
            foreach($_SESSION['carrito'] as $index => $producto) {
                $stats['total'] += $producto['precio'] * $producto['unidades'];
            }
        }

        return $stats;
    }
}