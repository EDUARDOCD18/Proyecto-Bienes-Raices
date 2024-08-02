<?php

require '../../includes/app.php';

use App\Vendedor;

estaAutenticado();

/* Base de Datos */
$db = conectarDB();

// Datos vacíos
$nombre = '';
$apellido = '';
$telefono = '';

// Arreglo con los mensajes de errores
$errores = Vendedor::getErrores();

/* Ejecutar el código después de que el usuario envía el formulario */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $vendedor = new Vendedor($_POST);
    $errores = $vendedor->validar();
    
    // Revisar que el arrglo de errores esté vacío
    if (empty($errores)) {
        $vendedor->guardar();

        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            // Redirecionar al usuario
            header('Location: ../vendedores?resultado=1');
        } 
    }
}

/* Importar el header */
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Agregar un Nuevo vendedor</h1>
    <a href="index.php" class="boton boton-amarillo">← Volver</a>

    <?php
    foreach ($errores as $error) :
    ?> <div class="alerta error">
            <?php echo $error; ?>
        </div> <?php endforeach; ?>

    <!-- Formulario para la crenación de un Nuevo Vendedor -->
    <form action="" class="formulario" method="POST" action="/admin/vendedores/crearVendedor.php" enctype="multipart/form-data">
        <!-- Datos del Vendedor o de la Vendedora -->
        <fieldset>
            <legend>
                Datos del Vendedor o de la Vendedora
            </legend>

            <!-- Nombre del Vendedor o Vendedora -->
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre del Vendedor o Vendedora" value="<?php echo $nombre; ?>">

            <!-- Apellido del Vendedor o Vendedora -->
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" placeholder="Apellido del Vendedor o Vendedora" value="<?php echo $apellido; ?>">

            <!-- Teléfono -->
            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" placeholder="Teléfono del Vendedor o Vendedora" value="<?php echo $telefono; ?>"></input>
        </fieldset>

        <input type="submit" value="Confirmar Registro" class="boton boton-verde">
    </form> <!-- .formulario -->
</main>

<!-- Importar el footer -->
<?php
incluirTemplate('footer'); ?>