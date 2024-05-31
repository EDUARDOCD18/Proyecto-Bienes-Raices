<?php
/* Base de Datos */
require '../../includes/config/database.php';
$db = conectarDB();

require '../../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>

    <a href="crear.php" class="boton boton-verde">Nueva Propiedad →</a>
</main>

<?php
incluirTemplate('footer'); ?>