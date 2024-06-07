<?php

$resultado = $_GET['resultado'] ?? null;
require '../../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>

    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Registro Exitoso</p>
    <?php endif ?>

    <div class="acciones">
        <a href="crear.php" class="boton boton-verde">Nueva Propiedad →</a>
        <a href="crearVendedor.php" class="boton boton-verde">Nuevo Vendedor →</a>
    </div>
</main>

<?php
incluirTemplate('footer'); ?>