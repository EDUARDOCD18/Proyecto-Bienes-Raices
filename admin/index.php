<?php
require '../includes/funciones.php';
$auth = estaAutenticado();

if (!$auth) {
    header('Location: ../');
}

/* -- Importa el header -- */
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Panel de Admistración Principal</h1>

    <div class="acciones">
        <a href="propiedades/index.php" class="boton boton-verde">Administar Propiedades →</a>
        <a href="vendedores/index.php" class="boton boton-verde">Administar Vendedores →</a>
    </div>
    <picture class="imagen-admin">
        <source srcset="/bienesraices/build/img/destacada3.webp" type="image/webp" />
        <source srcset="/bienesraices/build/img/destacada3.jpg" type="image/jpeg" />
        <img src="/build/img/destacada3.jpg" alt="Destacada 3" />
    </picture>

</main>

<?php
/* -- Importa el footer -- */
incluirTemplate('footer'); ?>