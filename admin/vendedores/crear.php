<?php
require '../../includes/app.php';

use App\Vendedor;

estaAutenticado();

$vendedor = new Vendedor;

// Arreglo con los mensajes de errores
$errores = Vendedor::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
}

incluirTemplate('header');

?>

<main class="contenedor seccion">
    <h1>Registrar Vendedor(a)</h1>

    <a href="../index.php" class="boton boton-amarillo">← Volver</a>

    <?php
    foreach ($errores as $error) :
    ?> <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form action="" class="formulario" method="POST" action="/admin/vendedores/crear.php">
        <?php include '../../includes/templates/formulario_vendedores.php'; ?>

        <input type="submit" value="Registrar vendedor(a)" class="boton boton-verde">
    </form> <!-- .formulario -->
</main>

<?php incluirTemplate('footer'); ?>