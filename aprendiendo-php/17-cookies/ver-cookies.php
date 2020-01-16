<?php



if(isset($_COOKIE['micookie'])) {
    echo $_COOKIE['micookie'];
}
else {
    echo "No existe la cookie";
}


echo "<br/>";


if(isset($_COOKIE['unyear'])) {
    echo $_COOKIE['unyear'];
}
else {
    echo "No existe la cookie";
}
?>

<a href="borrar-cookies.php"> Borrar cookies</a>
<a href="crear-cookies.php"> Crear cookies</a>