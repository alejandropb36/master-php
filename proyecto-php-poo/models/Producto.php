<?php 
require_once 'models/ModelBase.php';
class Producto extends ModelBase {

    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stok;
    private $oferta;
    private $fecha;
    private $imagen;


    public function __construct() {
        parent::__construct();
    }

    function getId() {
        return $this->id;
    }

    function getCategoria_id() {
        return $this->categoria_id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStok() {
        return $this->stok;
    }

    function getOferta() {
        return $this->oferta;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCategoria_id($categoria_id) {
        $this->categoria_id = $categoria_id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    function setPrecio($precio) {
        $this->precio = $this->db->real_escape_string($precio);
    }

    function setStok($stok) {
        $this->stok = $this->db->real_escape_string($stok);
    }

    function setOferta($oferta) {
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }
    
    public function getOne() {
        $sql = "SELECT * FROM productos WHERE id = {$this->getId()}";
        $producto = $this->db->query($sql);
        return $producto->fetch_object();
    }

    public function getAll() {
        $sql = "SELECT * FROM productos ORDER BY id DESC";
        $productos = $this->db->query($sql);
        return $productos;
    }

    public function getAllCategory() {
        $sql = "SELECT p.*, c.nombre categorianombre
            FROM productos p
                INNER JOIN categorias c ON c.id = p.categoria_id
            WHERE p.categoria_id = {$this->getCategoria_id()}
            ORDER BY id DESC
        ";
        $productos = $this->db->query($sql);
        return $productos;
    }

    public function getRandom($limit) {
        $sql = "SELECT * FROM productos ORDER BY RAND() LIMIT $limit";
        $productos = $this->db->query($sql);
        return $productos;
    }

    public function save() {
        $sql = "INSERT INTO productos VALUES(
            null,
            '{$this->getCategoria_id()}',
            '{$this->getNombre()}',
            '{$this->getDescripcion()}',
            '{$this->getPrecio()}',
            {$this->getStok()},
            null,
            CURDATE(),
            '{$this->getImagen()}'
        )";
        $save = $this->db->query($sql);

        $result = false;
        if($save)
            $result = true;
        return $result;
    }

    public function edit() {
        $sql = "UPDATE productos SET
            categoria_id = '{$this->getCategoria_id()}',
            nombre = '{$this->getNombre()}',
            descripcion = '{$this->getDescripcion()}',
            precio = '{$this->getPrecio()}',
            stok = {$this->getStok()}
        ";
        if($this->getImagen() != '' && $this->getImagen() != null) 
            $sql .= ", imagen = '{$this->getImagen()}'";
        
        $sql .= " WHERE id = {$this->getId()}";
        $save = $this->db->query($sql);

        $result = false;
        if($save)
            $result = true;
        return $result;
    }

    public function delete() {
        $sql = "DELETE FROM productos
            WHERE id = {$this->getId()};  
        ";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete)
            $result = true;
        return $result;
    }
}