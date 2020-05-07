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

    public function getOneByUser() {
        $sql = "SELECT p.id, p.coste
            FROM pedidos p
            WHERE p.usuario_id = {$this->getUsuario_id()}
            ORDER BY id DESC limit 1
        ";
        $pedido = $this->db->query($sql);
        return $pedido->fetch_object();
    }

    public function getProductosByPedido($id) {
        // $sql = "SELECT * FROM productos WHERE id in 
        //     (SELECT producto_id FROM lineas_pedidos WHERE pedido_id = {$id})
        // ";

        $sql = "SELECT pr.*, lp.unidades
            FROM productos pr
            INNER JOIN lineas_pedidos lp
                ON lp.producto_id = pr.id
            WHERE lp.pedido_id = {$id}
        ";

        $productos = $this->db->query($sql);
        return $productos;
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

    public function saveLinea() {
        $sql = "SELECT LAST_INSERT_ID() as pedido";

        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;

        foreach($_SESSION['carrito'] as $elemento) {
            $producto = $elemento['producto'];
            $insert = "INSERT INTO lineas_pedidos VALUES (null, {$pedido_id}, {$producto->id}, {$elemento['unidades']})";
            $save = $this->db->query($insert);
        }

        $result = false;
        if($save)
            $result = true;
        return $result;
    }

}