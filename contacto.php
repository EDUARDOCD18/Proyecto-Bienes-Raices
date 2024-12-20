<?php
require 'includes/app.php';
incluirTemplate('header');;
?>

<main class="contenedor seccion">
  <h1>Contacto</h1>
  <picture>
    <source srcset="/bienesraices/build/img/destacada3.webp" type="image/webp" />
    <source srcset="/bienesraices/build/img/destacada3.jpg" type="image/jpeg" />
    <img src="/build/img/destacada3.jpg" alt="Destacada 3" />
  </picture>
  <h2>Llene el siguente formulario de contacto</h2>

  <!-- Formulario para el contacto -->
  <form action="" class="formulario">
    <!-- fieldset para la información personal -->
    <fieldset>
      <legend>Información Personal</legend>

      <label class="requerido" for="nombre">Nombre y Apellido:</label>
      <input type="text" placeholder="Juana Pérez" id="nombre" />

      <label class="requerido" for="email">E-mail:</label>
      <input type="email" placeholder="correo@correo.com" id="nombre" />

      <label class="requerido" for="telefono">Teléfono:</label>
      <input type="tel" placeholder="12345678900" id="telefono" />

      <label for="mensaje">Mensaje:</label>
      <textarea name="" id="mensaje" placeholder="Mensaje aquí"></textarea>
    </fieldset>

    <!-- fieldset para la propiedad -->
    <fieldset>
      <legend>Información de la Propiedad</legend>

      <label class="requerido" for="opciones">Comprar o Vender:</label>
      <select name="" id="opciones">
        <option value="" disabled selected>-- Seleccione --</option>
        <option value="Compra">Comprar</option>
        <option value="Vende">Vender</option>
      </select>

      <label class="requerido" for="presupuesto">Presupuesto: </label>
      <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto" />
    </fieldset>

    <!-- fieldseto para el contacto -->
    <fieldset>
      <legend>Contacto</legend>

      <p>Como desea ser contactado:</p>
      <div class="forma-contacto requerido">
        <label for="contactar-telefono">Teléfono</label>
        <input name="contacto" type="radio" value="telefono" id="contactar-telefono" />

        <label for="contactar-email">E-mail</label>
        <input name="contacto" type="radio" value="email" id="contactar-email" />
      </div>

      <p>
        Eliga fecha y hora para ser contactado (solo si escogió teléfono)
      </p>

      <label class="requerido" for="fecha">Fecha:</label>
      <input type="date" name="fecha" id="fecha" />

      <label for="hora">hora:</label>
      <input type="time" name="hora" id="hora" min="09:00" max="18:00" />
    </fieldset>

    <input type="submit" value="Enviar" class="boton-verde" />
  </form>
  <!-- .formulario -->
</main>

<?php
incluirTemplate('footer');
?>
