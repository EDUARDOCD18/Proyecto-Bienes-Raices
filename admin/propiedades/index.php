<?php
require '../../includes/app.php';
estaAutenticado();

use App\Propiedad;
use App\Vendedor;

// Método para obtener los registros con Active Record
$propiedades = Propiedad::all();
$vendedores = Vendedor::all();

/* -- Muestra mensaje condiconal -- */
$resultado = $_GET['resultado'] ?? null;

/* -- Revisar el request method -- */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id']; // Obtener el id y guardarlo
    $id = filter_var($id, FILTER_VALIDATE_INT); // Validar que el id es entero

    // En caso de que el id exista
    if ($id) {
        $propiedad = Propiedad::find($id);
        $propiedad->eliminar();
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
            <?php foreach ($propiedades as $propiedad): ?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td><img src="../../imagenes/<?php echo $propiedad->imagen; ?>" alt="" class="imagen-tabla"></td>
                    <td><?php echo "$ " . $propiedad->precio; ?></td>
                    <td class="botones-accion">
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id ?>">
                            <input type="submit" value="Eliminar" class="boton-rojo-block">
                        </form>
                        <a href="actualizarPropiedad.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php

/* -- cerra la conexión -- */
mysqli_close($db);

/* -- Importar el footer -- */
incluirTemplate('footer'); ?>