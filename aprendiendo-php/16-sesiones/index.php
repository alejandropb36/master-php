<?php

/**
 * Sesion: Almacena y persiste datos del usuario mientras navega
 * hasta que se cierra esta sesiones.
 */

//  Iniciar la sesion
session_start();

// Variable local
$variable_normal = "Soy un string";


// Variable de sesion
$_SESSION['varible_persistente'] = "hola soy una sesion activa";


echo $variable_normal . "<br/>";
echo $_SESSION['varible_persistente'];

