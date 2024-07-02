<?php

/* --Base de Datos -- */
require 'includes/config/database.php';
$db = conectarDB();

$errores = [];

/* -- Autenticar el usuario -- */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email || !$password) {
        $errores[] = "Correo o Contraseña no válidos.";
    }
}

/* -- Importar el header -- */
require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form action="" class="formulario" method="post">
        <!-- fieldset para iniciar la sesión -->
        <fieldset>
            <legend>Identifiquese</legend>

            <label for="email" class="requerido">E-mail:</label>
            <input type="email" name="email" placeholder="correo@correo.com" id="nombre" />

            <label for="password" class="requerido">Password:</label>
            <input type="password" name="password" placeholder="Tu password" id="password" />
        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>

<?php

/* -- Importar el header -- */
incluirTemplate('footer'); ?>