<?php

function autocargar($classname) {
    require_once 'controllers/' . $classname . '.php';
}

spl_autoload_register('autocargar');

