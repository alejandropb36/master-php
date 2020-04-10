
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf8">
        <title>Tienda Master</title>
        <link rel="stylesheet" href="<?= base_url ?>assets/css/styles.css" />
    </head>
    
    <body>
        <div id="container">
            <!-- Cabecera -->
            <header id="header">
                <div id="logo">
                    <img src="<?= base_url ?>assets/img/camiseta.png" alt="Camiseta Logo" />
                    <a href="index.php">
                        Tienda de camisetas
                    </a>
                </div>
            </header>

            <!-- Menu -->
            <nav id="menu">
                <ul>
                    <li>
                        <a href="<?= base_url ?>">Inicio</a>
                    </li>
                    <?php $categorias = Utils::showCategorias(); ?>
                    <?php while($cat = $categorias->fetch_object()) :?>
                        <li>
                            <a href="#"><?= $cat->nombre ?></a>
                        </li>
                    <?php endwhile; ?>    
                </ul>
            </nav>


            <div id="content">