<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nosotros</title>
  <link rel="preload" href="build/css/app.css" as="style" />
  <link rel="stylesheet" href="build/css/app.css" />
</head>

<body>
<?php
  include './includes/templates/header.php';
  ?>

  <section class="contenedor seccion">
    <h1>Conócenos más de cerca</h1>

    <div class="contenido-nosotros">
      <div class="imagen">
        <picture>
          <source srcset="./build/img/nosotros.webp" type="image/webp" />
          <source srcset="./build/img/nosotros.jpg" type="image/jpeg" />
          <img loading="lazy" src="build/img/nosotros.jpg" alt="Imagen de Nosotros" />
        </picture>
      </div>
      <!-- .imagen -->

      <div class="texto-nosotros">
        <blockquote>25 años de experiencia</blockquote>
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut
          cupiditate provident tenetur, praesentium obcaecati, culpa deleniti
          voluptates perferendis consectetur reprehenderit nobis soluta
          officia neque possimus, dolore illum inventore consequuntur natus.
          Fugiat, odit culpa aspernatur natus, ipsa sunt maxime unde harum
          doloremque nulla molestias facilis ut, tempore autem veritatis
          laudantium dolores! Sunt quas id molestiae accusamus velit expedita
        </p>

        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt
          quibusdam maiores est nesciunt quam amet accusamus officiis, sit
          laudantium saepe! Fugit vitae ratione nisi amet? Aspernatur ad quas
          voluptatibus illum. Cumque voluptatibus excepturi accusantium qui
          fuga nisi nostrum, magni, quisquam tempora adipisci at aliquam unde
          molestiae eos culpa incidunt. Animi, dolor ipsa commodi ea quis
          velit assumenda sapiente quos iste.
        </p>
      </div>
    </div>
    <!-- .contenido-nosotros -->
  </section>

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