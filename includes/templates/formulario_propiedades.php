<!-- Información General de la Propiedad -->
<fieldset>
    <legend>
        Información General de la Propiedad
    </legend>

    <!-- Título de la Propiedad -->
    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo" placeholder="Título de la Propiedad" value="<?php echo s($propiedad->titulo); ?>">

    <!-- Precio de la Propiedad -->
    <label for="precio">Valor:</label>
    <input type="number" id="precio" name="precio" placeholder="Valor de la Propiedad" value="<?php echo s($propiedad->precio); ?>">

    <!-- Cargar una imagen de la Propiedad -->
    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

    <!-- Descripción para la Propiedad -->
    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion" placeholder="Describe la Propiedad"><?php echo s($propiedad->descripcion); ?></textarea>
</fieldset>

<!-- Atributos o caraterísticas de la Propiedad -->
<fieldset>
    <legend>Atributos de la Propiedad</legend>

    <!-- Nº de habitaciones -->
    <label for="habitaciones">Nº de Habitaciones:</label>
    <input type="number" id="habitaciones" name="habitaciones" placeholder="Ejm: 2" min="1" max="10" value="<?php echo s($propiedad->habitaciones); ?>">

    <!-- Nº de baños -->
    <label for="wc">Nº de baños:</label>
    <input type="number" id="wc" name="wc" placeholder="Ejm: 2" min="1" max="10" value="<?php echo s($propiedad->wc); ?>">

    <!-- Nº de puestos de estacionamiento -->
    <label for="estacionamiento">Nº de puestos de estacionamiento:</label>
    <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ejm: 2" min="1" max="10" value="<?php echo s($propiedad->estacionamiento); ?>">
</fieldset>


<!-- Vendedor para la Propiedad -->
<fieldset>
    <legend>Vendedor</legend>

    <!-- Selección para el vendedor -->
</fieldset>