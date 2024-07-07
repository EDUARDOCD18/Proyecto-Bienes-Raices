<?php
require 'includes/app.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
  <div class="seccion contenedor">
    <h2>Casas y Departamentos</h2>

    <?php
    $limite = 10;
    include 'includes/templates/anuncio.php';
    ?>

    <div class="alinear-derecha">
      <a href="" class="boton-verde">Ver todas</a>
    </div>
  </div>
  <!-- .seccion -->
</main>

<?php
incluirTemplate('footer');
?>