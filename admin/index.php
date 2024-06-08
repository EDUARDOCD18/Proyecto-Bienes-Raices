<?php

$resultado = $_GET['resultado'] ?? null;
require '../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Panel de Admistración Principal</h1>

    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Registro Exitoso</p>
    <?php endif ?>

    <div class="acciones">
        <a href="propiedades/index.php" class="boton boton-verde">Administar Propiedades →</a>
        <a href="vendedores/index.php" class="boton boton-verde">Administar Vendedores →</a>
    </div>

</main>

<?php
incluirTemplate('footer'); ?>