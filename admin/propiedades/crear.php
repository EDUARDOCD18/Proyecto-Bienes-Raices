<?php
require '../../includes/app.php';

use App\Propiedad;
use App\Vendedor;

//Importar Intervention Image
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;

estaAutenticado();

/* Base de Datos */
$db = conectarDB();

$propiedad = new Propiedad;

// Consultar los vendedores en la BDD
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

// Arreglo con los mensajes de errores
$errores = Propiedad::getErrores();

/* Ejecutar el código después de que el usuario envía el formulario */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Instancia el objeto
    $propiedad = new Propiedad($_POST['propiedad']);

    // Generar un nombre único para cada imagen
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    // Setea la imagen
    // Realizar un resize con Intervention Image
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $manager = new Image(Driver::class);
        $imagenSubir = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
        $propiedad->setImage($nombreImagen);
    }

    // Validar
    $errores = $propiedad->validar();

    // Revisar que el arrglo de errores esté vacío
    if (empty($errores)) {

        // Crear carpeta
        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }

        // Guarda la imagen
        $imagenSubir->save(CARPETA_IMAGENES . $nombreImagen);

        $resultado = $propiedad->guardar(); // Llamar función para guardar en la BD

        if ($resultado) {
            // Redirecionar al usuario
            header('Location: ../propiedades?resultado=1');
        }
    }
}

/* Importar el header */
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Crear una nueva Propiedad</h1>
    <a href="index.php" class="boton boton-amarillo">← Volver</a>

    <?php
    foreach ($errores as $error) :
    ?> <div class="alerta error">
            <?php echo $error; ?>
        </div> <?php endforeach; ?>

    <!-- Formulario para la crenación de una nueva Propiedad -->
    <form action="" class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario_propiedades.php'; ?>

        <input type="submit" value="Crear Anuncio de Propiedad" class="boton boton-verde">
    </form> <!-- .formulario -->
</main>

<!-- Importar el footer -->
<?php
incluirTemplate('footer'); ?>