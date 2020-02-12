<!DOCTYPE HTML>
<html lang="es">
    <head>
        <title>Validacion formularios</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Validación de Formularios en php</h1>

        <?php 
            if (isset($_GET['error'])) :
                $error = $_GET['error'];
        ?>
            <div>
                <h2 style="color: red;"> <?= $error ?> </h2>
            </div>
        <?php 
            endif;
        ?>

        <form action="procesar_formulario.php" method="POST">
            <div>    
                <label for="nombre">Nombre: </label>
                <br>
                <input type="text" name="nombre">
                <br>
            </div>

            <div>
                <label for="apellidos">Apellidos: </label>
                <br>
                <input type="text" name="apellidos">
                <br>
            </div>

            <div>
                <label for="edad">Edad: </label>
                <br>
                <input type="number" name="edad">
                <br>
            </div>

            <div>
                <label for="email">Email: </label>
                <br>
                <input type="email" name="email">
                <br>
            </div>

            <div>
                <label for="password">Password: </label>
                <br>
                <input type="password" name="password" >
                <br>
            </div>

            <div>
                <input type="submit" value="Enviar">
            </div>
        </form>

    </body>
</html>