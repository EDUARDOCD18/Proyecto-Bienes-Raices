<?php
require '../../includes/app.php';

use App\Propiedad;

//Importar Intervention Image
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;

estaAutenticado();

/* -- Validar que el id sea correcto -- */
$id = $_GET['id']; // Se optiene el id
$id = filter_var($id, FILTER_VALIDATE_INT); // Se valida que sea entero

// En caso de que el id no sea entero o no se encuentre
if (!$id) {
    header('Location: ../propiedades?resultado=1'); // Redirecciona al usuario
}

/* -- Base de Datos -- */

// Importa la Base de Datos
$db = conectarDB();

// Obtener los datos de la propiedad
$propiedad = Propiedad::find($id);

// Consultar la tabla vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

// Arreglo con los mensajes de errores
$errores = Propiedad::getErrores();

/* Ejecutar el código después de que el usuario envía el formulario */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Asignar los atributos
    $args = $_POST['propiedad'];

    $propiedad->sinc($args);

    // Validación
    $errores = $propiedad->validar();

    // Generar un nombre único para cada imagen
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    // Subida de archivos
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $manager = new Image(Driver::class);
        $imagenSubir = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
        $propiedad->setImage($nombreImagen);
    }

    // Revisar que el arrglo de errores esté vacío
    if (empty($errores)) {
        // Guardar la imagen
        $imagenSubir->save(CARPETA_IMAGENES . $nombreImagen);
        $propiedad->guardar();
    }
}

/* Importar el header */
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Editar el Registro de la Propiedad</h1>
    <a href="../propiedades/index.php" class="boton boton-amarillo">← Volver</a>

    <?php
    foreach ($errores as $error) :
    ?> <div class="alerta error">
            <?php echo $error; ?>
        </div> <?php endforeach; ?>

    <!-- Formulario para la crenación de una nueva Propiedad -->
    <form action="" class="formulario" method="POST" enctype="multipart/form-data">
        <!-- Información General de la Propiedad -->
        <?php include '../../includes/templates/formulario_propiedades.php'; ?>

        <input type="submit" value="Actualizar Registro" class="boton boton-verde">
    </form> <!-- .formulario -->
</main>

<!-- Importar el footer -->
<?php
incluirTemplate('footer'); ?>