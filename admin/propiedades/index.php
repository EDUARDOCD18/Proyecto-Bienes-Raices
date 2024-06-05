<?php
/* Base de Datos */
require '../../includes/config/database.php';
$db = conectarDB();

require '../../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>

    <div class="acciones">
        <a href="crear.php" class="boton boton-verde">Nueva Propiedad →</a>
        <a href="crearVendedor.php" class="boton boton-verde">Nuevo Vendedor →</a>
    </div>
</main>

<?php
incluirTemplate('footer'); ?>