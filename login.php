<?php

require 'includes/app.php';

/* --Base de Datos -- */
$db = conectarDB();

$errores = [];
$email = "";

/* -- Autenticar el usuario -- */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email || !$password) {
        $errores[] = "Correo o Contraseña no válidos.";
    }

    if (empty($errores)) {
        // Revisar si el usuario existe.
        $query = "SELECT * FROM usuarios WHERE email = '$email' ";
        $resultado = mysqli_query($db, $query);

        if ($resultado->num_rows) {
            // Revisar que el password sea correcto
            $usuario = mysqli_fetch_assoc($resultado);

            // Vereficar si el password es correcto o no
            $auth = password_verify($password, $usuario['password']);

            if ($auth) {
                // Password correcto
                session_start();
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('Location: /bienesraices/admin');

            } else {
                $errores[] = "Contraseña incorrecta";
            }
        } else {
            $errores[] = "Usuario no existe";
        }
    }
}

/* -- Importar el header -- */
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
            <input type="email" name="email" placeholder="correo@correo.com" id="nombre" value="<?php echo $email; ?>" />
            <label for="password" class="requerido">Password:</label>
            <input type="password" name="password" placeholder="Tu password" id="password" />
        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>

<?php

/* -- Importar el header -- */
incluirTemplate('footer'); ?>