<!-- Información General de la Propiedad -->
<fieldset>
    <legend>
        Información General de la Propiedad
    </legend>

    <!-- Título de la Propiedad -->
    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Título de la Propiedad" value="<?php echo s($propiedad->titulo); ?>">

    <!-- Precio de la Propiedad -->
    <label for="precio">Valor:</label>
    <input type="number" id="precio" name="propiedad[precio]" placeholder="Valor de la Propiedad" value="<?php echo s($propiedad->precio); ?>">

    <!-- Cargar una imagen de la Propiedad -->
    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">
    <?php if ($propiedad->imagen) : ?>
        <img src="../../imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-small">
    <?php endif; ?>

    <!-- Descripción para la Propiedad -->
    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="propiedad[descripcion]" placeholder="Describe la Propiedad"><?php echo s($propiedad->descripcion); ?></textarea>
</fieldset>

<!-- Atributos o caraterísticas de la Propiedad -->
<fieldset>
    <legend>Atributos de la Propiedad</legend>

    <!-- Nº de habitaciones -->
    <label for="habitaciones">Nº de Habitaciones:</label>
    <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Ejm: 2" min="1" max="10" value="<?php echo s($propiedad->habitaciones); ?>">

    <!-- Nº de baños -->
    <label for="wc">Nº de baños:</label>
    <input type="number" id="wc" name="propiedad[wc]" placeholder="Ejm: 2" min="1" max="10" value="<?php echo s($propiedad->wc); ?>">

    <!-- Nº de puestos de estacionamiento -->
    <label for="estacionamiento">Nº de puestos de estacionamiento:</label>
    <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Ejm: 2" min="1" max="10" value="<?php echo s($propiedad->estacionamiento); ?>">
</fieldset>


<!-- Vendedor para la Propiedad -->
<fieldset>
    <legend>Vendedor</legend>

    <!-- Selección para el vendedor -->
    <label for="vendedor">Vendedor</label>
    <select name="propiedad[vendedores_id]" id="vendedor">
        <option selected value="">--Seleccione--</option>
        <?php foreach ($vendedores as $vendedor) { ?>
            <option
                <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : ''; ?>
                value="<?php echo s($vendedor->id) ?>"><?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?>
            </option>
        <?php } ?>
    </select>
</fieldset>