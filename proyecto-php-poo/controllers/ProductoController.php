<?php 
require_once 'models/Producto.php';
class productoController {

    public function index() {

        $producto = new Producto();
        $productos = $producto->getRandom(6);

        require_once 'views/producto/index.php';
    }

    public function gestion() {
        Utils::isAdmin();
        $producto = new Producto();
        $productos = $producto->getAll();
        require_once 'views/producto/gestion.php';
    }
    
    public function crear() {
        Utils::isAdmin();
        require_once 'views/producto/crear.php';
    }

    public function save() {
        Utils::isAdmin();
        if(isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            //$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            if($nombre && $descripcion && $stock && $categoria) {
                $producto = new Producto();

                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setStok($stock);
                $producto->setCategoria_id($categoria);
                $producto->setPrecio($precio);
                //$producto->setImagen($imagen);

                if(isset($_FILES['imagen'])) {
                    // Subir imagenes
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];
    
                    if($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png') {
                        if(!is_dir('uploads/images')) {
                            mkdir('uploads/images', 0777, true);
                        }
                        move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                        $producto->setImagen($filename);
                    }
                }

                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $producto->setId($id);
                    $save = $producto->edit();
                } else {
                    $save = $producto->save();
                }
                if($save) {
                    $_SESSION['producto'] = "complete";
                } else {
                    $_SESSION['producto'] = "failed";
                }
            } else {
                $_SESSION['producto'] = "failed";
            } 
        } else {
            $_SESSION['producto'] = "failed";
        }

        header('Location:' . base_url . 'producto/gestion');
    }

    public function delete() {
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $producto = new Producto();
            $producto->setId($_GET['id']);
            $delete = $producto->delete();
            if($delete)
                $_SESSION['producto-eliminar'] = 'complete';
            else
                $_SESSION['producto-eliminar'] = 'failed';

        } else {
            $_SESSION['producto-eliminar'] = 'failed';
        }
        header('Location:' . base_url . 'producto/gestion');
    }

    public function editar() {
        Utils::isAdmin();

        if(isset($_GET['id'])) {
            $edit = true;
            $producto = new Producto();
            $producto->setId($_GET['id']);
            $pro = $producto->getOne();
            require_once 'views/producto/crear.php';
        } else {
            header('Location:' . base_url . 'producto/gestion');
        }
    }

    public function edit() {
    }
}