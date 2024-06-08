<?php
// En caso de error 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* Base de Datos */
require '../../includes/config/database.php';
$db = conectarDB();

// Datos vacíos
$nombre = '';
$apellido = '';
$telefono = '';

// Arreglo con los mensajes de errores
$errores = [];

/* Ejecutar el código después de que el usuario envía el formulario */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        /*  echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
    echo "<pre>";
    var_dump($_FILES);
    echo "</pre>" */;

    $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($db, $_POST['apellido']);
    $telefono = mysqli_real_escape_string($db, $_POST['telefono']);

    /* Validaciones para los campos vacíos */
    if (!$nombre) {
        $errores[] = "Campo Nombre no puede ir vacío.";
    }
    if (!$apellido) {
        $errores[] = "Campo Apellido no puede ir vacío.";
    }
    if (!$telefono) {
        $errores[] = "Campo Teléfono no puede ir vacío.";
    }

    /*  echo "<pre>";
    var_dump($errores);
    echo "</pre>"; */

    // Revisar que el arrglo de errores esté vacío
    if (empty($errores)) {

        /* Insertar en la Base de Datos */
        $query = " INSERT INTO vendedores (nombre, apellido, telefono ) VALUES ( '$nombre', '$apellido', '$telefono') ";


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
require '../../includes/funciones.php';
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
            <input type="text" id="nombre" name="nombre" placeholder="Nombre del Vendedor o Vendedora" value="<?php echo $nombre ?>">

            <!-- Apellido del Vendedor o Vendedora -->
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" placeholder="Apellido del Vendedor o Vendedora" value="<?php echo $apellido ?>">

            <!-- Teléfono -->
            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" placeholder="Teléfono del Vendedor o Vendedora"><?php echo $telefono ?></input>
        </fieldset>

        <input type="submit" value="Confirmar Registro" class="boton boton-verde">
    </form> <!-- .formulario -->
</main>

<!-- Importar el footer -->
<?php
incluirTemplate('footer'); ?>