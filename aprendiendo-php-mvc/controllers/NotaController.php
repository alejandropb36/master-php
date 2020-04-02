<?php

class NotaController {
    public function listar() {
        require_once 'models/Nota.php';
        
        $nota = new Nota();
        
        $nota->nombre = "Hola";
        $nota->contenido = "Hola php MVC";
        
        require_once 'views/notas/listar.php';
    }
    
    public function crear() {
        
    }
    
    public function borrar() {
        
    }
}
