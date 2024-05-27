<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="preload" href="/bienesraices/build/css/app.css" as="style">
    <link rel="stylesheet" href="/bienesraices/build/css/app.css"> -->
    <link rel="preload" href="/build/css/app.css" as="style">
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
    <header class="header <?php echo isset($inicio) ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.php"><img src="build/img/logo.svg" alt="Logo" /></a>

                <div class="mobile-menu">
                    <img src="build/img/barras.svg" alt="icono menu responsive" />
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="build/img/dark-mode.svg" alt="Activar Modo Oscuro" />
                    <div class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                    </div>
                </div>
                <!-- .navegacion -->
            </div>
            <!-- .barra -->

            <?php if ($inicio) { ?>
                <h1>Venta de Casas y Departamentos exclusivos de lujo</h1><?php } ?>
        </div>
        <!-- .contenedor -->
    </header>
    <!-- .header -->
</body>

</html>