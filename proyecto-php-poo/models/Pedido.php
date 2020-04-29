<?php

require_once 'models/ModelBase.php';
class Pedido extends ModelBase {
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    
    public function __construct() {
        parent::__construct();
    }
    
    function getId() {
        return $this->id;
    }

    function getUsuario_id() {
        return $this->usuario_id;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getLocalidad() {
        return $this->localidad;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCoste() {
        return $this->coste;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    function setLocalidad($localidad) {
        $this->localidad = $localidad;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setCoste($coste) {
        $this->coste = $coste;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }
    
    public function getOne() {
        $sql = "SELECT * FROM pedidos WHERE id = {$this->getId()}";
        $producto = $this->db->query($sql);
        return $producto->fetch_object();
    }

    public function getAll() {
        $sql = "SELECT * FROM pedidos ORDER BY id DESC";
        $productos = $this->db->query($sql);
        return $productos;
    }

    public function save() {
        $sql = "INSERT INTO pedidos VALUES(
            null,
            '{$this->getUsuario_id()}',
            '{$this->getProvincia()}',
            '{$this->getLocalidad()}',
            '{$this->getDireccion()}',
            {$this->getCoste()},
            'confrim',
            CURDATE(),
            CURTIME()
        )";
        $save = $this->db->query($sql);

        $result = false;
        if($save)
            $result = true;
        return $result;
    }

}