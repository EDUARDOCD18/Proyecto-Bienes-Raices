<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Anuncios</title>
  <link rel="preload" href="build/css/app.css" as="style" />
  <link rel="stylesheet" href="build/css/app.css" />
</head>

<body>
  <?php
  include './includes/templates/header.php';
  ?>

  <main class="contenedor seccion contenido-centrado">
    <h1>Casa en el Lago de Maracaibo</h1>
    <picture>
      <source srcset="./build/img/destacada.webp" type="image/webp" />
      <source srcset="./build/img/destacada.jpg" type="image/jpeg" />
      <img loading="lazy" src="build/img/destacada.jpg" alt="Imagen de la propiedad" />
    </picture>

    <div class="resumen-propiedad">
      <p class="precio">$4.000.000</p>
      <ul class="iconos-carcateristicas">
        <li>
          <img class="iconos" loading="lazy" src="build/img/icono_wc.svg" alt="WC" />
          <p>3</p>
        </li>
        <li>
          <img class="iconos" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Estacionamiento" />
          <p>3</p>
        </li>

        <li>
          <img class="iconos" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Cuartos" />
          <p>5</p>
        </li>
      </ul>

      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Architecto
        molestiae unde similique voluptatibus, obcaecati, labore iste
        assumenda quod, perspiciatis praesentium illo suscipit ullam nobis
        deserunt dolores omnis soluta vitae nemo? Lorem ipsum, dolor sit amet
        consectetur adipisicing elit. Cum culpa perferendis quidem, dicta
        nulla sunt id eveniet quae, doloribus facere dolore pariatur sequi
        voluptatum voluptatibus reiciendis iste iusto temporibus praesentium!
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam dolores
        eius quae ab aliquid? Ratione perferendis quod, debitis magni, magnam
        ducimus consectetur aperiam voluptatem alias dignissimos sed. Ea,
        eligendi voluptas!
      </p>
    </div>
    <!-- .resumen-propiedad -->
  </main>

  <footer class="footer seccion">
    <div class="contenedor contenedor-footer">
      <div class="navegacion">
        <a href="nosotros.html">Nosotros</a>
        <a href="anuncios.html">Anuncios</a>
        <a href="blog.html">Blog</a>
        <a href="contacto.html">Contacto</a>
      </div>
      <!-- .navegacion -->
    </div>
    <!-- .contenedor .contenedor-footer -->
    <p class="copyright">Todos los derechos reservados. 2024</p>
  </footer>
  <!-- .footer -->
  <script src="build/js/bundle.min.js"></script>
</body>

</html>