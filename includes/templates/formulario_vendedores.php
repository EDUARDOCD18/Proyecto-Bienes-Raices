<!-- Datos del Vendedor o de la Vendedora -->
<fieldset>
    <legend>
        Datos del Vendedor(a)
    </legend>

    <!-- Nombre del Vendedor o Vendedora -->
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre" value="<?php echo s($vendedor->nombre); ?>">

    <!-- Apellido del Vendedor o Vendedora -->
    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido" value="<?php echo s($vendedor->apellido); ?>">

</fieldset>
<fieldset>
    <legend>Información Extra</legend>
    <!-- Teléfono -->
    <label for="telefono">Teléfono:</label>
    <input type="tel" id="telefono" name="vendedor[telefono]" placeholder="Teléfono" value="<?php echo s($vendedor->telefono); ?>"></input>
</fieldset>