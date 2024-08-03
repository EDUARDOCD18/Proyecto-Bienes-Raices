<?php

require '../../includes/app.php';

use App\Vendedor;

estaAutenticado();

/* Base de Datos */
$db = conectarDB();

$vendedor = new Vendedor;

// Arreglo con los mensajes de errores
$errores = Vendedor::getErrores();

/* Ejecutar el código después de que el usuario envía el formulario */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $vendedor = new Vendedor($_POST['vendedor']);
    $errores = $vendedor->validar();

    $resultado = $vendedor->guardar();

    // Revisar que el arrglo de errores esté vacío
    if (empty($errores)) {

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
        <?php include '../../includes/templates/formulario_vendedor.php'; ?>

        <input type="submit" value="Confirmar Registro" class="boton boton-verde">
    </form> <!-- .formulario -->
</main>

<!-- Importar el footer -->
<?php
incluirTemplate('footer'); ?>