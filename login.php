<?php

/* -- Importar el header -- */
require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <form action="" class="formulario">
        <!-- fieldset para iniciar la sesión -->
        <fieldset>
            <legend>Identifiquese</legend>

            <label for="email" class="requerido">E-mail:</label>
            <input type="email" placeholder="correo@correo.com" id="nombre" />

            <label for="password" class="requerido">Password:</label>
            <input type="password" placeholder="Tu password" id="password" />
        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>

<?php

/* -- Importar el header -- */
incluirTemplate('footer'); ?>