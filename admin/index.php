<?php
require '../includes/app.php';
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
        $tipo = $_POST['tipo'];

        if (validarTipoContenido($tipo)) {
            if ($tipo === 'vendedor') {
                $vendedor = Vendedor::find($id);
                $vendedor->eliminar();
            } else if ($tipo === 'propiedad') {
                $propiedad = Propiedad::find($id);
                $propiedad->eliminar();
            }
        }
    }
}

/* -- Importa el header -- */
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Administrador</h1>

    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Regristro creado</p>
    <?php elseif (intval($resultado) === 2) : ?>
        <p class="alerta exito">Registro actualizado</p>
    <?php elseif (intval($resultado) === 3) : ?>
        <p class="alerta eliminado">Regisrto eliminado</p>
    <?php endif ?>

    <div class="acciones">
        <a href="../admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad →</a>
        <a href="../admin/vendedores/crear.php" class="boton boton-verde">Nuevo(a) Vendedor(a) →</a>
    </div>

    <h2>Propiedades</h2>

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
                    <td><img src="../imagenes/<?php echo $propiedad->imagen; ?>" alt="" class="imagen-tabla"></td>
                    <td><?php echo "$ " . $propiedad->precio; ?></td>
                    <td class="botones-accion">
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" value="Eliminar" class="boton-rojo-block">
                        </form>
                        <a href="../admin/propiedades/actualizarPropiedad.php?=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Vendedores</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Número</th>
                <th>Acciones</th>
            </tr>
        </thead> <!-- Mostrar los resultados de la consulta -->
        <tbody>
            <?php foreach ($vendedores as $vendedor): ?>
                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre; ?></td>
                    <td><?php echo $vendedor->apellido; ?></td>
                    <td><?php echo $vendedor->telefono; ?></td>
                    <td class="botones-accion">
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" value="Eliminar" class="boton-rojo-block">
                        </form>
                        <a href="../admin/vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
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