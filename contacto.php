<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contacto</title>
  <link rel="preload" href="build/css/app.css" as="style" />
  <link rel="stylesheet" href="build/css/app.css" />
</head>

<body>
<?php
  include './includes/templates/header.php';
  ?>

  <main class="contenedor seccion">
    <h1>Contacto</h1>
    <picture>
      <source srcset="/build/img/destacada3.webp" type="image/webp" />
      <source srcset="/build/img/destacada3.jpg" type="image/jpeg" />
      <img src="/build/img/destacada3.jpg" alt="Destacada 3" />
    </picture>
    <h2>Llene el siguente formulario de contacto</h2>

    <!-- Formulario para el contacto -->
    <form action="" class="formulario">
      <!-- fieldset para la información personal -->
      <fieldset>
        <legend>Información Personal</legend>

        <label for="nombre">Nombre y Apellido:</label>
        <input type="text" placeholder="Juana Pérez" id="nombre" />

        <label for="email">E-mail:</label>
        <input type="email" placeholder="correo@correo.com" id="nombre" />

        <label for="telefono">Teléfono:</label>
        <input type="tel" placeholder="12345678900" id="telefono" />

        <label for="mensaje">Mensaje:</label>
        <textarea name="" id="mensaje" placeholder="Mensaje aquí"></textarea>
      </fieldset>

      <!-- fieldset para la propiedad -->
      <fieldset>
        <legend>Información de la Propiedad</legend>

        <label for="opciones">Comprar o Vender:</label>
        <select name="" id="opciones">
          <option value="" disabled selected>-- Seleccione --</option>
          <option value="Compra">Comprar</option>
          <option value="Vende">Vender</option>
        </select>

        <label for="presupuesto">Presupuesto: </label>
        <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto" />
      </fieldset>

      <!-- fieldseto para el contacto -->
      <fieldset>
        <legend>Contacto</legend>

        <p>Como desea ser contactado:</p>
        <div class="forma-contacto">
          <label for="contactar-telefono">Teléfono</label>
          <input name="contacto" type="radio" value="telefono" id="contactar-telefono" />

          <label for="contactar-email">E-mail</label>
          <input name="contacto" type="radio" value="email" id="contactar-email" />
        </div>

        <p>
          Eliga fecha y hora para ser contactado (solo si escogió teléfono)
        </p>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" />

        <label for="hora">hora:</label>
        <input type="time" name="hora" id="hora" min="09:00" max="18:00" />
      </fieldset>

      <input type="submit" value="Enviar" class="boton-verde" />
    </form>
    <!-- .formulario -->
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