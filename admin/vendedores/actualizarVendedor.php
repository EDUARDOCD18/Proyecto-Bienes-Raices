<?php

use App\Vendedor;

require '../../includes/app.php';
estaAutenticado();

/* -- Validar que el id sea el correcto -- */
$id = $_GET['id']; // Obtener el id desde la URL
$id = filter_var($id, FILTER_VALIDATE_INT); // Validar que sea entero

// En caso de que el id no sea entero o no se encuentre
if (!$id) {
    header('Location: ../vendedores?resultado=1'); // Redirecciona al usuario
}

/* -- Base de Datos -- */

// Importar la Base de Datos
$db = conectarDB();

// Obtener los datos del vendedor
$vendedor = Vendedor::find($id);

/* -- Arreglo con los mensajes de errores -- */
$errores = [];

/* Ejecutar el código después de que el usuario envía el formulario */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Asignar atributos 
    $args = $_POST['vendedor'];

    $vendedor->sinc($args);
    debuguear($vendedor);

    /* -- Validaciones para los campos vacíos -- */
    if (!$nombre) {
        $errores[] = "Campo Nombre no puede ir vacío.";
    }
    if (!$apellido) {
        $errores[] = "Campo Apellido no puede ir vacío.";
    }
    if (!$telefono) {
        $errores[] = "Campo Teléfono no puede ir vacío.";
    }

    // Revisar que el arrglo de errores esté vacío
    if (empty($errores)) {

        /* Insertar en la Base de Datos */
        $query = " UPDATE vendedores SET nombre = '$nombre', apellido = '$apellido', telefono = '$telefono' WHERE id = '$id' ";

        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            // Redirecionar al usuario
            header('Location: ../vendedores?resultado=1');
        } else {
            echo ("Error");
        }
    }
}

/* Importar el header */
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Editar los Datos del Vendedor</h1>
    <a href="../vendedores/index.php" class="boton boton-amarillo">← Volver</a>

    <?php
    foreach ($errores as $error) :
    ?> <div class="alerta error">
            <?php echo $error; ?>
        </div> <?php endforeach; ?>

    <!-- Formulario para la crenación de un Nuevo Vendedor -->
    <form action="" class="formulario" method="POST" action="/admin/vendedores/crearVendedor.php" enctype="multipart/form-data">
        <!-- Datos del Vendedor o de la Vendedora -->
        <?php include '../../includes/templates/formulario_vendedor.php'; ?>

        <input type="submit" value="Actualizar Registro" class="boton boton-verde">
    </form> <!-- .formulario -->
</main>

<!-- Importar el footer -->
<?php
incluirTemplate('footer'); ?>