<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blog</title>
  <link rel="preload" href="build/css/app.css" as="style" />
  <link rel="stylesheet" href="build/css/app.css" />
</head>

<body>
<?php
  include './includes/templates/header.php';
  ?>

  <main class="contenedor seccion contenido-centrado">
    <h1>Nuestro Blog</h1>
    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog1.webp" type="image/webp" />
          <source srcset="build/img/blog1.jpg" type="image/jpeg" />
          <img loading="lazy" src="build/img/blog1.jpg" alt="Entrada Blog Texto" />
        </picture>
      </div>
      <!-- .imagen -->

      <div class="texto-entrada">
        <a href="entrada.html">
          <h4>Terraza en el techo de tu casa</h4>
          <p>Escrito el <span>18/06/1999</span> por : <span>Admin</span></p>

          <p>Consejos para construir una tarraza en el techo de tu casa</p>
        </a>
      </div>
      <!-- .texto-entrada -->
    </article>

    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog2.webp" type="image/webp" />
          <source srcset="build/img/blog2.jpg" type="image/jpeg" />
          <img loading="lazy" src="build/img/blog2.jpg" alt="Entrada Blog Texto" />
        </picture>
      </div>
      <!-- .imagen -->

      <div class="texto-entrada">
        <a href="entrada.html">
          <h4>Guía para la decoración de tu hogar</h4>
          <p>Escrito el <span>18/06/2024</span> por : <span>Javi</span></p>

          <p>Decora bien tu casa con los mejores tips</p>
        </a>
      </div>
      <!-- .texto-entrada -->
    </article>
    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog3.webp" type="image/webp" />
          <source srcset="build/img/blog3.jpg" type="image/jpeg" />
          <img loading="lazy" src="build/img/blog3.jpg" alt="Entrada Blog Texto" />
        </picture>
      </div>
      <!-- .imagen -->

      <div class="texto-entrada">
        <a href="entrada.html">
          <h4>Guía para la decoración de tu hogar</h4>
          <p>Escrito el <span>18/06/2024</span> por : <span>Javi</span></p>

          <p>Decora bien tu casa con los mejores tips</p>
        </a>
      </div>
      <!-- .texto-entrada -->
    </article>

    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog4.webp" type="image/webp" />
          <source srcset="build/img/blog4.jpg" type="image/jpeg" />
          <img loading="lazy" src="build/img/blog4.jpg" alt="Entrada Blog Texto" />
        </picture>
      </div>
      <!-- .imagen -->

      <div class="texto-entrada">
        <a href="entrada.html">
          <h4>Guía para la decoración de tu hogar</h4>
          <p>Escrito el <span>18/06/2024</span> por : <span>Javi</span></p>

          <p>Decora bien tu casa con los mejores tips</p>
        </a>
      </div>
      <!-- .texto-entrada -->
    </article>

    <!-- .blog -->
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