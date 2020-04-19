<?php 

require_once 'models/Categoria.php';
require_once 'models/Producto.php';

class categoriaController {

    public function index() {
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        require_once 'views/categoria/index.php';
    }

    public function ver() {
        if(isset($_GET)) {
            $id = $_GET['id'] ? $_GET['id'] : null;
            $categoria = new Categoria();
            $categoria->setId($id);
            $cat = $categoria->getOne();

            $producto = new Producto();
            $producto->setCategoria_id($cat->id);
            $productos = $producto->getAllCategory();
        }

        require_once 'views/categoria/ver.php';

    }

    public function crear() {
        Utils::isAdmin();
        require_once 'views/categoria/create.php';
    }

    public function save() {
        Utils::isAdmin();
        if(isset($_POST)) {
            $name = isset($_POST['nombre']) ? $_POST['nombre'] : false;

            if($name) {
                $categoria = new Categoria();
    
                $categoria->setNombre($name);
                $save = $categoria->save();
            }
        }
        header("Location:" . base_url . 'categoria/index');
    }
}