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

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Casa en la Playa</td>
                <td><img src="../../imagenes/54a02849a70eb17d06bd44b162c94c35.jpg" alt="" class="imagen-tabla"></td>
                <td>$345</td>
                <td>
                    <a href="#" class="boton-rojo-block">Eliminar</a>
                    <a href="#" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
        </tbody>
    </table>
</main>

<?php
incluirTemplate('footer'); ?>