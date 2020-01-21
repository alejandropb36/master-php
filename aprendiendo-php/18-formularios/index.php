<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Formularios PHP y HTML5</title>
    </head>
    <body>
        <h1>Formulario</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" required="required" placeholder="Escribe tu nombre" />
            <br>
            <label for="apellido">Apellido: </label>
            <input type="text" name="apellido" pattern="[A-Za-z ]+"> 
            <br>
            <input type="submit" value="Eviar">
        </form>
    </body>
</html>