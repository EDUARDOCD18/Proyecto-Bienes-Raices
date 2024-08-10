<?php

use App\Propiedad;

require '../../includes/app.php';
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
    $errores = $propiedad->validar();

    // Revisar que el arrglo de errores esté vacío
    if (empty($errores)) {

        /* -- Subida de archivos -- */

        // Crear carpeta
        $carpetaImagenes = '../../imagenes/';

        // Comprobar si la carpeta existe o no
        if (!is_dir($carpetaImagenes)) { // En caso de que NO exista...
            mkdir($carpetaImagenes); // se crea la carpera
        }

        // Comprobar si una imagen ha sido reemplazada por otra en la bdd
        if ($imagen['name']) {

            // Eliminar la imagen anterior
            unlink($carpetaImagenes . $propiedad['imagen']); // Borrar la imagen anterior

            // Generar un nombre único para cada imagen
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            // Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
        } else {
            $nombreImagen = $propiedad['imagen'];
        }

        /* Insertar en la Base de Datos */
        $query = " UPDATE propiedades SET titulo = '$titulo', precio = '$precio', imagen = '$nombreImagen', descripcion = '$descripcion', habitaciones = $habitaciones, wc = $wc, estacionamiento = $estacionamiento, vendedores_id = $vendedores_id  WHERE id = $id";


        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            // Redirecionar al usuario
            header('Location: ../propiedades?resultado=2');
        } else {
            echo ("Error");
        }
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