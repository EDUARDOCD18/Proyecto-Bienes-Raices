<?php
require '../../includes/app.php';
$auth = estaAutenticado();

if (!$auth) {
    header('Location: ../');
}

/* -- Base de Datos -- */

// Importar la Base de Datos
$db = conectarDB();

// Escribir el query 
$query = "SELECT * FROM propiedades";

// Consultar la base de datos
$resultadoConsulta = mysqli_query($db, $query);

/* -- Muestra mensaje condiconal -- */
$resultado = $_GET['resultado'] ?? null;

/* -- Revisar el request method -- */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id']; // Obtener el id y guardarlo
    $id = filter_var($id, FILTER_VALIDATE_INT); // Validar que el id es entero

    // En caso de que el id exista
    if ($id) {
        // Eliminar el archivo
        $query = "SELECT imagen FROM propiedades WHERE id = $id;"; // Selecciona la img según el id
        $resultado = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultado);

        // Borrar la imagen
        unlink('../../imagenes/' . $propiedad['imagen']); // Borra la img del servidor

        // Realizar la consulta a la bdd para eliminar
        $query = "DELETE FROM propiedades WHERE id = $id; "; // Elimina la propiedad 

        $resultado = mysqli_query($db, $query); // Manda el script a la bdd

        if ($resultado) {
            // Redirecionar al usuario
            header('Location: ../propiedades?resultado=3');
        } else {
            echo ("Error");
        }
    }
}

/* -- Importa el header -- */
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Administrar Propiedades</h1>

    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Propiedad Registrada</p>
    <?php elseif (intval($resultado) === 2) : ?>
        <p class="alerta exito">Propiedad Actualizada</p>
    <?php elseif (intval($resultado) === 3) : ?>
        <p class="alerta eliminado">Propiedad Eliminada</p>
    <?php endif ?>

    <div class="acciones">
        <a href="../" class="boton boton-amarillo">← Volver Atrás</a>
        <a href="crear.php" class="boton boton-verde">Nueva Propiedad →</a>
    </div>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead> <!-- Mostrar los resultados de la consulta -->
        <tbody>
            <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)) : ?>
                <tr>
                    <td><?php echo $propiedad['id']; ?></td>
                    <td><?php echo $propiedad['titulo']; ?></td>
                    <td><img src="../../imagenes/<?php echo $propiedad['imagen']; ?>" alt="" class="imagen-tabla"></td>
                    <td><?php echo "$ " . $propiedad['precio']; ?></td>
                    <td class="botones-accion">
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad['id'] ?>">
                            <input type="submit" value="Eliminar" class="boton-rojo-block">
                        </form>
                        <a href="actualizarPropiedad.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>

<?php

/* -- cerra la conexión -- */
mysqli_close($db);

/* -- Importar el footer -- */
incluirTemplate('footer'); ?>