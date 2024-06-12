<?php

$resultado = $_GET['resultado'] ?? null;
require '../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Panel de Admistración Principal</h1>

    <div class="acciones">
        <a href="propiedades/index.php" class="boton boton-verde">Administar Propiedades →</a>
        <a href="vendedores/index.php" class="boton boton-verde">Administar Vendedores →</a>
    </div>

</main>

<?php
incluirTemplate('footer'); ?>