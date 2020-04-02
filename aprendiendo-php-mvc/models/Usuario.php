<?php
require_once 'ModeloBase.php';

class Usuario extends ModeloBase {
    public $nombre;
    public $apellidos;
    public $email;
    public $password; 
    
    public function __construct() {
        parent::__construct();
    }
}
