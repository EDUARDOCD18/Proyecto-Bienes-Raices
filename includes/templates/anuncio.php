<?php

/* -- Base de Datos-- */

// Importar la Base de Datos
$db = conectarDB();

// Consultar la Base de Datos
$query = "SELECT * FROM propiedades LIMIT $limite;";

// Obtener el resultado de la consulta
$resultado = mysqli_query($db, $query);

?>

<div class="contenedor-anuncios">
    <?php while ($propiedad = mysqli_fetch_assoc($resultado)) : ?>
        <div class="anuncio">
            <picture class="imagen-anuncio">
                <img loading="lazy" src="/bienesraices/imagenes/<?php echo $propiedad['imagen']; ?>" alt="Anuncio" />
            </picture>

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad['titulo'] ?></h3>
                <p><?php echo $propiedad['descripcion'] ?></p>
                <p class="precio">$<?php echo $propiedad['precio'] ?></p>

                <ul class="iconos-carcateristicas">
                    <li>
                        <img loading="lazy" src="build/img/icono_wc.svg" alt="WC" />
                        <p><?php echo $propiedad['wc']; ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Estacionamiento" />
                        <p><?php echo $propiedad['estacionamiento']; ?></p>
                    </li>

                    <li>
                        <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="Cuartos" />
                        <p><?php echo $propiedad['habitaciones']; ?></p>
                    </li>
                </ul>
                <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Ver Propiedad</a>

            </div>
            <!-- contenido-anuncio -->
        </div>
    <?php endwhile; ?>

</div>
<!-- Contenedor de anuncios -->

<?php
/* -- Cerrar la coxión a la Base de Datos -- */
mysqli_close($db);
?>