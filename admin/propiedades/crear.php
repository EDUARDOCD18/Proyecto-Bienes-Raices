<?php
// En caso de error 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* Base de Datos */
require '../../includes/config/database.php';
$db = conectarDB();

// Consultar los vendedores en la BDD
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

// Datos vacíos
$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedores_id = '';

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

    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedores_id = mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado = date('Y/m/d');

    // Asignar una variable a files
    $imagen = $_FILES['imagen'];

    /* Validaciones para los campos vacíos */
    if (!$titulo) {
        $errores[] = "Debe agregar un título.";
    }
    if (!$precio) {
        $errores[] = "Debe agregar un precio de venta.";
    }
    if (!$imagen['name'] || $imagen['error']) {
        $errores[] = "La imagen es obligatoria.";
    }
    // Validar el tamaño de la imagen
    $medida = 1000 * 1000;
    if ($imagen['size'] > $medida) {
        $errores[] = "La imagene es muy pesada.";
    }
    if (strlen($descripcion) < 50) {
        $errores[] = "Debe agregar una descripción o esta es muy corta. 50 Caracteres mínimo.";
    }
    if (!$habitaciones) {
        $errores[] = "Debe agregar mínimo una habitación.";
    }
    if (!$wc) {
        $errores[] = "Debe agregar mínimo un baño.";
    }
    if (!$estacionamiento) {
        $errores[] = "Debe agregar mínimo un puesto de estacionamiento.";
    }
    if (!$vendedores_id) {
        $errores[] = "Debe elegir al vendedor o vendedora.";
    }


    /*  echo "<pre>";
    var_dump($errores);
    echo "</pre>"; */

    // Revisar que el arrglo de errores esté vacío
    if (empty($errores)) {
        /* Subida de archivos */

        // Crear carpeta
        $carpetaImagenes = '../../imagenes/';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        // Generar un nombre único para cada imagen
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

        // Subir la imagen
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

        /* Insertar en la Base de Datos */
        $query = " INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id ) VALUES ( '$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado','$vendedores_id' ) ";


        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            // Redirecionar al usuario
            header('Location: ../propiedades?resultado=1');
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
    <h1>Crear una nueva Propiedad</h1>
    <a href="index.php" class="boton boton-amarillo">← Volver</a>

    <?php
    foreach ($errores as $error) :
    ?> <div class="alerta error">
            <?php echo $error; ?>
        </div> <?php endforeach; ?>

    <!-- Formulario para la crenación de una nueva Propiedad -->
    <form action="" class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
        <!-- Información General de la Propiedad -->
        <fieldset>
            <legend>
                Información General de la Propiedad
            </legend>

            <!-- Título de la Propiedad -->
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Título de la Propiedad" value="<?php echo $titulo ?>">

            <!-- Precio de la Propiedad -->
            <label for="precio">Valor:</label>
            <input type="number" id="precio" name="precio" placeholder="Valor de la Propiedad" value="<?php echo $precio ?>">

            <!-- Cargar una imagen de la Propiedad -->
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

            <!-- Descripción para la Propiedad -->
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" placeholder="Describe la Propiedad"><?php echo $descripcion ?></textarea>
        </fieldset>

        <!-- Atributos o caraterísticas de la Propiedad -->
        <fieldset>
            <legend>Atributos de la Propiedad</legend>

            <!-- Nº de habitaciones -->
            <label for="habitaciones">Nº de Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ejm: 2" min="1" max="10" value="<?php echo $habitaciones ?>">

            <!-- Nº de baños -->
            <label for="wc">Nº de baños:</label>
            <input type="number" id="wc" name="wc" placeholder="Ejm: 2" min="1" max="10" value="<?php echo $wc ?>">

            <!-- Nº de puestos de estacionamiento -->
            <label for="estacionamiento">Nº de puestos de estacionamiento:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ejm: 2" min="1" max="10" value="<?php echo $estacionamiento ?>">
        </fieldset>


        <!-- Vendedor para la Propiedad -->
        <fieldset>
            <legend>Vendedor</legend>

            <!-- Selección para el vendedor -->
            <select name="vendedor">
                <option value="">-- Seleccione --</option>
                <?php while ($vendedor =  mysqli_fetch_assoc($resultado)) : ?>
                    <option <?php echo $vendedores_id === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"> <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?> </option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Crear Anuncio de Propiedad" class="boton boton-verde">
    </form> <!-- .formulario -->
</main>

<!-- Importar el footer -->
<?php
incluirTemplate('footer'); ?>