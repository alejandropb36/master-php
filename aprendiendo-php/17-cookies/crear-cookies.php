<?php

/**
 * Cookie es un fichero que se almacena en el ordenador del usuario
 * que visat la web, con el fin de recordar datos.
 */

 // Crear cookie
 //setcookie("nombre", "valor que solo puede ser texto", caducidad, ruta, dominio);
 
//  Cookie basica
 setcookie("micookie", "valor de mi galleta");

 
// Cookie con expiracion
setcookie("unyear", "valor de la cookie de 365 dias", time() + (60 * 60 * 24 * 365));


?>

<a href="ver-cookies.php"> Ver cookies</a>