<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Archivos</title>
</head>
<body>
    <h1>Subir archivos con PHP</h1>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="files">Selecciona Archivo: </label>
        <input type="file"name="files">

        <br>
        <br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>