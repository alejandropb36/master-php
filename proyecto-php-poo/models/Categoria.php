<?php
require_once 'models/ModelBase.php';

class Categoria extends ModelBase {

    private $id;
    private $nombre;

    public function __construct()
    {
        parent::__construct();
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getAll() {
        $sql = "SELECT * FROM categorias ORDER BY id DESC";
        return $this->db->query($sql);
    }

    public function save() {
        $sql = "INSERT INTO categorias VALUES(
            null,
            '{$this->getNombre()}'
        )";
        $save = $this->db->query($sql);

        $result = false;
        if($save)
            $result = true;
        return $result;
    }
}