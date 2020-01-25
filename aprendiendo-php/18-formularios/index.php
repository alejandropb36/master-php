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

            <label for="boton">Boton: </label>
            <input type="button" name="boton" value="Boton"> 
            <br>
            
            <label for="sexo">Sexo: </label>
            <input type="checkbox" name="sexo" value="hombre">
            <input type="checkbox" name="sexo" value="mujer" checked="checked"> 
            <br>

            <label for="color">Color: </label>
            <input type="color" name="color" > 
            <br>

            <label for="fecha">Fecha: </label>
            <input type="date" name="fecha" > 
            <br>
            
            <label for="correo">Correo: </label>
            <input type="email" name="correo" > 
            <br>

            <label for="archivo">Archivo: </label>
            <input type="file" name="archivo" multiple="multiple"> 
            <br>

            <label for="oculto">Oculto: </label>
            <input type="hidden" name="oculto" > 
            <br>

            <label for="numero">Numero: </label>
            <input type="number" name="numjero" > 
            <br>

            <label for="contraseña">Contraseña: </label>
            <input type="password" name="contraseña" > 
            <br>

            <label for="continente">Continente: </label>
            Africa: <input type="radio" name="continente" vale="Africa"> 
            America: <input type="radio" name="continente" vale="America">
            Europa: <input type="radio" name="continente" vale="Europa"> 
            Asia: <input type="radio" name="continente" vale="Asia">
            Oceania: <input type="radio" name="continente" vale="Oceania">
            <br>

            <label for="web">Pagina web: </label>
            <input type="url" name="web" > 
            <br>

            <textarea name="texto" id="texto" cols="30" rows="10">
                Holi prro
            </textarea>
            <br>

            Peliculas: 
            <select name="peliculas" id="peliculas">
                <option value="Spidermna">Spiderman</option>
                <option value="Batman">Batman</option>
                <option value="Ironman">Ironman</option>
            </select>
            <br>
            
            <input type="submit" value="Eviar">
        </form>
    </body>
</html>