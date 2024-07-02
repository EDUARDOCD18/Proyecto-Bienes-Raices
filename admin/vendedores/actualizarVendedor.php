<?php
require '../../includes/funciones.php';
$auth = estaAutenticado();

if (!$auth) {
    header('Location: ../');
}

/* -- Validar que el id sea el correcto -- */
$id = $_GET['id']; // Obtener el id desde la URL
$id = filter_var($id, FILTER_VALIDATE_INT); // Validar que sea entero

// En caso de que el id no sea entero o no se encuentre
if (!$id) {
    header('Location: ../vendedores?resultado=1'); // Redirecciona al usuario
}

/* -- Base de Datos -- */

// Importar la Base de Datos
require '../../includes/config/database.php';
$db = conectarDB();

// Consulta a la tabla de vendedores
$consulta = "SELECT * FROM vendedores WHERE id = $id";
$resultado = mysqli_query($db, $consulta);
$vendedor = mysqli_fetch_assoc($resultado);

/* -- Datos vacíos -- */
$nombre = $vendedor['nombre'];
$apellido = $vendedor['apellido'];
$telefono = $vendedor['telefono'];

/* -- Arreglo con los mensajes de errores -- */
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

    /*  echo "<pre>";
    var_dump($errores);
    echo "</pre>"; */

    // Revisar que el arrglo de errores esté vacío
    if (empty($errores)) {

        /* Insertar en la Base de Datos */
        $query = " UPDATE vendedores SET nombre = '$nombre', apellido = '$apellido', telefono = '$telefono' WHERE id = '$id' ";

        // echo $query;
        // exit;


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

        <input type="submit" value="Actualizar Registro" class="boton boton-verde">
    </form> <!-- .formulario -->
</main>

<!-- Importar el footer -->
<?php
incluirTemplate('footer'); ?>