<?php

require 'includes/app.php';

use App\Propiedad;

/* -- Validar que el id sea correcto -- */

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
  header('Location: /bienesraices');
}

$propiedad = Propiedad::find($id);

/* -- Importa el header-- */
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
  <h1><?php echo $propiedad->titulo; ?></h1>
  <picture>
    <img loading="lazy" src="/bienesraices/imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de la propiedad" />
  </picture>

  <div class="resumen-propiedad">
    <p class="precio">$<?php echo $propiedad->precio; ?></p>
    <ul class="iconos-carcateristicas">
      <li>
        <img class="iconos" loading="lazy" src="build/img/icono_wc.svg" alt="WC" />
        <p><?php echo $propiedad->wc; ?></p>
      </li>
      <li>
        <img class="iconos" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Estacionamiento" />
        <p><?php echo $propiedad->estacionamiento; ?></p>
      </li>

      <li>
        <img class="iconos" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Cuartos" />
        <p><?php echo $propiedad->habitaciones; ?></p>
      </li>
    </ul>

    <p>
      <?php echo $propiedad->descripcion; ?>
    </p>
  </div>
  <!-- .resumen-propiedad -->
</main>

<?php
/* -- Importar el header -- */
incluirTemplate('footer');
?>