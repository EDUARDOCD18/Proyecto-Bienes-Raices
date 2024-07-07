<?php

/* -- Validar que el id sea correcto -- */
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
  header('Location: /bienesraices');
}

require 'includes/app.php';

// Importar la Base de Datos
$db = conectarDB();

// Consultar la Base de Datos
$query = "SELECT * FROM propiedades WHERE id = $id;";

// Obtener el resultado de la consulta
$resultado = mysqli_query($db, $query);

if (!$resultado->num_rows) {
  header('Location: /bienesraices');
}

$propiedad = mysqli_fetch_assoc($resultado);

// En caso de que el id no sea entero o no se encuentre
if (!$id) {
  header('Location: ../propiedades?resultado=1'); // Redirecciona al usuario
}

/* -- Importa el header-- */
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
  <h1><?php echo $propiedad['titulo']; ?></h1>
  <picture>
    <img loading="lazy" src="/bienesraices/imagenes/<?php echo $propiedad['imagen']; ?>" alt="Imagen de la propiedad" />
  </picture>

  <div class="resumen-propiedad">
    <p class="precio">$<?php echo $propiedad['precio']; ?></p>
    <ul class="iconos-carcateristicas">
      <li>
        <img class="iconos" loading="lazy" src="build/img/icono_wc.svg" alt="WC" />
        <p><?php echo $propiedad['wc']; ?></p>
      </li>
      <li>
        <img class="iconos" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Estacionamiento" />
        <p><?php echo $propiedad['estacionamiento']; ?></p>
      </li>

      <li>
        <img class="iconos" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Cuartos" />
        <p><?php echo $propiedad['habitaciones']; ?></p>
      </li>
    </ul>

    <p>
      <?php echo $propiedad['descripcion']; ?>
    </p>
  </div>
  <!-- .resumen-propiedad -->
</main>

<?php
/* -- Cerrar la bdd -- */
mysqli_close($db);

/* -- Importar el header -- */
incluirTemplate('footer');
?>