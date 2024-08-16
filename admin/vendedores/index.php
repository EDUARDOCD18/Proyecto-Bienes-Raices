<?php
require '../../includes/app.php';
estaAutenticado();

use App\Vendedor;

// Método para obtener las propiedades con Active Record
$vendedores = Vendedor::all();

/* -- Muestra mensaje condiconal -- */
$resultado = $_GET['resultado'] ?? null;

/* -- Revisar el request method -- */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id']; // Obtener el id y guardarlo
    $id = filter_var($id, FILTER_VALIDATE_INT); // Validar que el id es entero

    // En caso de que el id exista
    if ($id) {
        // Realizar la consulta a la bdd para eliminar
        $query = "DELETE FROM vendedores WHERE id = $id; "; // Elimina el registro
        $resultado = mysqli_query($db, $query); // Manda el script a la bdd

        if ($resultado) {
            // Redirecionar al usuario
            header('Location: ../vendedores?resultado=3');
        } else {
            echo ("Error");
        }
    }
}

/* -- Importa el header -- */
$resultado = $_GET['resultado'] ?? null;
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Administrar Vendedores</h1>

    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Vendedor Registrado</p>
    <?php elseif (intval($resultado) === 2) : ?>
        <p class="alerta exito">Vendedor Actualizado</p>
    <?php elseif (intval($resultado) === 3) : ?>
        <p class="alerta eliminado">Vendedor Eliminado</p>
    <?php endif ?>

    <div class="acciones">
        <a href="../" class="boton boton-amarillo">← Volver Atrás</a>
        <a href="crearVendedor.php" class="boton boton-verde">Nuevo(a) Vendedor(a) →</a>
    </div>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($vendedores as $vendedor) : ?>
                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre; ?></td>
                    <td><?php echo $vendedor->apellido; ?></td>
                    <td><?php echo $vendedor->telefono; ?></td>
                    <td class="botones-accion">
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id ?>">
                            <input type="submit" value="Eliminar" class="boton-rojo-block">
                        </form>
                        <a href="actualizarVendedor.php?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>

<?php
/* -- cerra la conexión -- */
mysqli_close($db);

/* -- Importar el footer -- */
incluirTemplate('footer'); ?>