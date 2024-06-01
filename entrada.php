<?php
require 'includes/funciones.php';
incluirTemplate('header');
?>
<main class="contenedor seccion contenido-centrado">
  <h1>Guía para acabados de lujo</h1>

  <picture>
    <source srcset="./build/img/destacada2.webp" type="image/webp" />
    <source srcset="./build/img/destacada2.jpg" type="image/jpeg" />
    <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen de la propiedad" />
  </picture>
  <p class="informacion-meta">
    Escrito el <span>hoy</span> por <span>admin</span>
  </p>

  <div class="resumen-propiedad">
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

<?php
incluirTemplate('footer'); ?>
