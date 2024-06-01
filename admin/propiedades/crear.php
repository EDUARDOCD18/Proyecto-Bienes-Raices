<?php
/* Base de Datos */
require '../../includes/config/database.php';
$db = conectarDB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /*   echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
 */
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $habitaciones = $_POST['habitaciones'];
    $wc = $_POST['wc'];
    $estacionamiento = $_POST['estacionamiento'];
    $vendedores_id = $_POST['vendedor'];

    /* Insertar en la Base de Datos */
    $query = " INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedores_id ) VALUES ( '$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$vendedores_id' ) ";


    $resultado = mysqli_query($db, $query);
    /* if ($resultado) {
        echo ("OK");
        exit;
    } else {
        echo ("Error");
    } */
}

/* Importar el header */
require '../../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="index.php" class="boton boton-amarillo">← Volver</a>

    <!-- Formulario para la crenación de una nueva Propiedad -->
    <form action="" class="formulario" method="POST" action="/admin/propiedades/crear.php">
        <!-- Información General de la Propiedad -->
        <fieldset>
            <legend>
                Información General de la Propiedad
            </legend>

            <!-- Título de la Propiedad -->
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Título de la Propiedad">

            <!-- Precio de la Propiedad -->
            <label for="precio">Valor:</label>
            <input type="number" id="precio" name="precio" placeholder="Valor de la Propiedad">

            <!-- Cargar una imagen de la Propiedad -->
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png">

            <!-- Descripción para la Propiedad -->
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" placeholder="Describe la Propiedad"></textarea>
        </fieldset>

        <!-- Atributos o caraterísticas de la Propiedad -->
        <fieldset>
            <legend>Atributos de la Propiedad</legend>

            <!-- Nº de habitaciones -->
            <label for="habitaciones">Nº de Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ejm: 2" min="1" max="10">

            <!-- Nº de baños -->
            <label for="wc">Nº de baños:</label>
            <input type="number" id="wc" name="wc" placeholder="Ejm: 2" min="1" max="10">

            <!-- Nº de puestos de estacionamiento -->
            <label for="estacionamiento">Nº de puestos de estacionamiento:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ejm: 2" min="1" max="10">
        </fieldset>


        <!-- Vendedor para la Propiedad -->
        <fieldset>
            <legend>Vendedor</legend>

            <!-- Selección para el vendedor -->
            <select name="vendedor" id="">
                <option value="1">Javier</option>
                <option value="2">Caliope</option>
            </select>
        </fieldset>

        <input type="submit" value="Crear Anuncio de Propiedad" class="boton boton-verde">
    </form> <!-- .formulario -->
</main>

<!-- Importar el footer -->
<?php
incluirTemplate('footer'); ?>