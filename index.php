<?php

/* -- Importar el header -- */
require 'includes/funciones.php';
incluirTemplate('header', $inicio = true);
?>

<main class="contenedor seccion">
  <h1>Más sobre Nosotros</h1>
  <div class="iconos-nosotros">
    <div class="icono">
      <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy" />
      <h3>Seguridad</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa nobis
        esse sed recusandae totam in. Ut odit voluptatibus officiis magni ex
        iure dolorum? Sequi hic quasi veritatis totam, atque omnis! Lorem,
        ipsum dolor sit amet consectetur adipisicing elit. Quaerat nihil
        alias vitae quam animi cupiditate odio cumque, temporibus, facere id
        quia, consequatur unde soluta saepe modi aliquam sit asperiores
        consectetur.
      </p>
    </div>
    <!-- .icono -->
    <div class="icono">
      <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy" />
      <h3>Precio</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa nobis
        esse sed recusandae totam in. Ut odit voluptatibus officiis magni ex
        iure dolorum? Sequi hic quasi veritatis totam, atque omnis! Lorem,
        ipsum dolor sit amet consectetur adipisicing elit. Quaerat nihil
        alias vitae quam animi cupiditate odio cumque, temporibus, facere id
        quia, consequatur unde soluta saepe modi aliquam sit asperiores
        consectetur.
      </p>
    </div>
    <!-- .icono -->
    <div class="icono">
      <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy" />
      <h3>A tiempo</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa nobis
        esse sed recusandae totam in. Ut odit voluptatibus officiis magni ex
        iure dolorum? Sequi hic quasi veritatis totam, atque omnis! Lorem,
        ipsum dolor sit amet consectetur adipisicing elit. Quaerat nihil
        alias vitae quam animi cupiditate odio cumque, temporibus, facere id
        quia, consequatur unde soluta saepe modi aliquam sit asperiores
        consectetur.
      </p>
    </div>
    <!-- .icono -->
  </div>
  <!-- .iconos-nosotros -->
</main>
<!-- main -->

<div class="seccion contenedor">
  <h2>Casas y Departamentos</h2>

  <?php
  $limite = 3;
  include 'includes/templates/anuncio.php';
  ?>

  <!-- Contenedor de anuncios -->
  <div class="alinear-derecha">
    <a href="anuncios.php" class="boton-verde">Ver todas</a>
  </div>
</div>
<!-- .seccion -->

<section class="imagen-contacto">
  <h2>Encuentra la casa de tus sueños</h2>
  <p>
    Llena el formulario de contacto y un asesor se pondrá a tu disposición
    lo más pronto posible
  </p>
  <a href="contacphp" class="boton-amarillo">Contacta ahora</a>
</section>
<!-- .imagen-contacto -->

<div class="contenedor seccion seccion-inferior">
  <section class="blog">
    <h3>Nuestro Blog</h3>

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
        <a href="entraphp">
          <h4>Terraza en el techo de tu casa</h4>
          <p class="informacion-meta">
            Escrito el <span>18/06/1999</span> por : <span>Admin</span>
          </p>

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
          <p class="informacion-meta">
            Escrito el <span>18/06/2024</span> por : <span>Javi</span>
          </p>

          <p>Decora bien tu casa con los mejores tips</p>
        </a>
      </div>
      <!-- .texto-entrada -->
    </article>
  </section>
  <!-- .blog -->

  <section class="testimoniales">
    <h3>Testimoniales</h3>
    <div class="testimonial">
      <blockquote>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab dolores
        fuga necessitatibus perspiciatis quod porro. Ad aut sit commodi
        doloribus laudantium, voluptas libero tempora dignissimos minus fuga
        excepturi iste incidunt?
      </blockquote>
      <p>Javier C</p>
    </div>
    <!-- .testimonial -->
  </section>
  <!-- .testimoniales -->
</div>
<!-- .contenedor de blog -->


<?php
/* -- Importar el footer -- */
incluirTemplate('footer');
?>