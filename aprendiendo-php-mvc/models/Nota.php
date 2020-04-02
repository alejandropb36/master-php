<?php

require_once 'ModeloBase.php';

class Nota extends ModeloBase{
    public $nombre;
    public $contenido;
    
    public function __construct() {
        parent::__construct();
    }
}
