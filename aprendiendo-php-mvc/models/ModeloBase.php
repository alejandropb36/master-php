<?php

require_once 'config/database.php';

class ModeloBase {
    public $db;
    
    public function __construct() {
        $this->db = DataBase::conectar();
    }
    
    public function conseguirTodos($tabla) {
        return $this->db->query("select * from $tabla order by id desc");
    }
}

