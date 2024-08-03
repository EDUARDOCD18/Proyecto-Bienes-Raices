<!-- Datos del Vendedor o de la Vendedora -->
<fieldset>
    <legend>
        Datos del Vendedor o de la Vendedora
    </legend>

    <!-- Nombre del Vendedor o Vendedora -->
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" placeholder="Nombre del Vendedor o Vendedora" value="<?php echo s($vendedor->nombre); ?>">

    <!-- Apellido del Vendedor o Vendedora -->
    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" placeholder="Apellido del Vendedor o Vendedora" value="<?php echo s($vendedor->apellido); ?>">

    <!-- Teléfono -->
    <label for="telefono">Teléfono:</label>
    <input type="tel" id="telefono" name="telefono" placeholder="Teléfono del Vendedor o Vendedora" value="<?php echo s($vendedor->telefono); ?>"></input>
</fieldset>