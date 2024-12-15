<?php

use App\Propiedad;

if ($_SERVER['SCRIPT_NAME'] === '/bienesraices/anuncios.php') {
    $propiedades = Propiedad::all();
} else {
    $propiedades = Propiedad::get($limite);
}

?>

<div class="contenedor-anuncios">
    <?php foreach ($propiedades as $propiedad) {
    ?>
        <div class="anuncio">
            <picture class="imagen-anuncio">
                <img loading="lazy" src="/bienesraices/imagenes/<?php echo $propiedad->imagen; ?>" alt="Anuncio" />
            </picture>

            <div class="contenido-anuncio">
                <h3 class="anuncio-titulo"><?php echo $propiedad->titulo; ?></h3>
                <p><?php echo $propiedad->descripcion; ?></p>
                <p class="precio">$ <?php echo $propiedad->precio; ?></p>

                <ul class="iconos-carcateristicas">
                    <li>
                        <img loading="lazy" src="build/img/icono_wc.svg" alt="WC" />
                        <p><?php echo $propiedad->wc; ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Estacionamiento" />
                        <p><?php echo $propiedad->estacionamiento; ?></p>
                    </li>

                    <li>
                        <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="Cuartos" />
                        <p><?php echo $propiedad->habitaciones; ?></p>
                    </li>
                </ul>
                <a href="anuncio.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Ver Propiedad</a>

            </div>
            <!-- contenido-anuncio -->
        </div>
    <?php }; ?>

</div>
<!-- Contenedor de anuncios -->

<?php
?>