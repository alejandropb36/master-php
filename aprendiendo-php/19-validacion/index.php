<!DOCTYPE HTML>
<html lang="es">
    <head>
        <title>Validacion formularios</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Validación de Formularios en php</h1>

        <form action="procesar_formulario.php" method="POST">
            <div>    
                <label for="nombre">Nombre: </label>
                <br>
                <input type="text" name="nombre" required="required" pattern="[A-Za-z ]+">
                <br>
            </div>

            <div>
                <label for="apellidos">Apellidos: </label>
                <br>
                <input type="text" name="apellidos"  required="required" pattern="[A-Za-z ]+">
                <br>
            </div>

            <div>
                <label for="edad">Edad: </label>
                <br>
                <input type="number" name="edad" required="required">
                <br>
            </div>

            <div>
                <label for="email">Email: </label>
                <br>
                <input type="email" name="email" required="required">
                <br>
            </div>

            <div>
                <label for="password">Password: </label>
                <br>
                <input type="password" name="passwrod" required="required">
                <br>
            </div>

            <div>
                <input type="submit" value="Enviar">
            </div>
        </form>

    </body>
</html>