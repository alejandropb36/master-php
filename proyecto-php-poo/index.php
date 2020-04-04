<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf8">
        <title>Tienda Master</title>
        <link rel="stylesheet" href="assets/css/styles.css" />
    </head>
    
    <body>
        <div id="container">
            <!-- Cabecera -->
            <header id="header">
                <div id="logo">
                    <img src="assets/img/camiseta.png" alt="Camiseta Logo" />
                    <a href="index.php">
                        Tienda de camisetas
                    </a>
                </div>
            </header>

            <!-- Menu -->
            <nav id="menu">
                <ul>
                    <li>
                        <a href="#">Inicio</a>
                    </li>
                    <li>
                        <a href="#">Categoria 1</a>
                    </li>
                    <li>
                        <a href="#">Categoria 2</a>
                    </li>
                    <li>
                        <a href="#">Categoria 3</a>
                    </li>
                    <li>
                        <a href="#">Categoria 4</a>
                    </li>
                    <li>
                        <a href="#">Categoria 5</a>
                    </li>
                </ul>
            </nav>


            <div id="content">
                <!-- Barra lateral -->
                <aside id="lateral">
                    <div id="login" class="block_aside">
                        <form action="#" method="POST">
                            <label for="email">Email: </label>
                            <input type="email" name="email">

                            <label for="passwrod">Contraseña: </label>
                            <input type="password" name="password">

                            <input type="submit" value="Enviar">
                        </form>

                        <a href="#">Mis pedidos</a>
                        <a href="#">Gestionar pedidos</a>
                        <a href="#">Gestionar categorias</a>
                    </div>
                </aside>


                <!-- Contendo Central -->
                <section id="central">
                    <article class="product">
                        <img src="assets/img/camiseta.png" alt="Producto">
                        <h2>Camiseta Azul Ancha</h2>
                        <p>30 euros</p>
                        <a href="#">Comprar</a>
                    </article>

                    <article class="product">
                        <img src="assets/img/camiseta.png" alt="Producto">
                        <h2>Camiseta Azul Ancha</h2>
                        <p>30 euros</p>
                        <a href="#">Comprar</a>
                    </article>

                    <article class="product">
                        <img src="assets/img/camiseta.png" alt="Producto">
                        <h2>Camiseta Azul Ancha</h2>
                        <p>30 euros</p>
                        <a href="#">Comprar</a>
                    </article>
                </section>

            </div>

            <!-- Pied e pagina -->
            <footer id="footer">
                <p>Desarrollado por Alejandro Ponce &copy; <?= date('Y') ?></p>
            </footer>
        </div>
        
    </body>
    
</html>
