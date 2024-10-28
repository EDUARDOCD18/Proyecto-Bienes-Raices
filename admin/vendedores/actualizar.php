<?php

require '../../includes/app.php';

use App\Vendedor;

estaAutenticado();


// Validar que sea un ID válido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}

// Obtener el arreglo de vendedor
$vendedor = Vendedor::find($id);

// Arreglo con los mensajes de errores
$errores = Vendedor::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Asignar los valores
    $args = $_POST['vendedor'];

    // Sincronizar el objeto en memoria con lo que el usuario escribió
    $vendedor->sinc($args);

    // Validación
    $errores = $vendedor->validar();

    if (empty($errores)) {
        $vendedor->guardar();
    }
}

incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Actualizar Vendedor(a)</h1>

    <a href="../index.php" class="boton boton-amarillo">← Volver</a>

    <?php
    foreach ($errores as $error) :
    ?> <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form action="" class="formulario" method="POST" action="/admin/vendedores/actaulizar.php">
        <?php include '../../includes/templates/formulario_vendedores.php'; ?>

        <input type="submit" value="Actualizar" class="boton boton-verde">
    </form> <!-- .formulario -->
</main>

<?php incluirTemplate('footer'); ?>