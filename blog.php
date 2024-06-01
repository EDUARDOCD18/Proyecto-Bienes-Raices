<?php
require 'includes/funciones.php';
incluirTemplate('header');
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
      <a href="entrada.php">
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
      <a href="entrada.php">
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
      <a href="entrada.php">
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
      <a href="entrada.php">
        <h4>Guía para la decoración de tu hogar</h4>
        <p>Escrito el <span>18/06/2024</span> por : <span>Javi</span></p>

        <p>Decora bien tu casa con los mejores tips</p>
      </a>
    </div>
    <!-- .texto-entrada -->
  </article>

  <!-- .blog -->
</main>

<?php
incluirTemplate('footer');
?>