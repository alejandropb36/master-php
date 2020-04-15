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

    public function getAll() {
        $sql = "SELECT * FROM productos ORDER BY id DESC";
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
            null
        )";
        $save = $this->db->query($sql);

        $result = false;
        if($save)
            $result = true;
        return $result;
    }
}