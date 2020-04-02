<?php

require_once 'config/database.php';

class ModeloBase {
    public $db;
    
    public function __construct() {
        $this->db = DataBase::conectar();
    }
    
    public function conseguirTodos() {
        var_dump($this->db);
        return "Sancando todos los usuarios";
    }
}

